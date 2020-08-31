<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Din8 extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Din8_model", "din8");
        $this->load->model("Din7_model", "din7");
        $this->load->model("Kelurahan_model", "kelurahan");
    }

    public function index()
    {
        redirect(base_url("din8/penerangan-hukum"));
    }

    public function getDataX($tahun = NULL, $triwulan = NULL, $jenis = 1)
    {
        $id = $this->input->get("id");
        $kondisi["jenis"]       = $jenis;

        if ($tahun) {
            $kondisi["YEAR(waktu)"] = $tahun;
        }

        if ($triwulan) {
            if ($triwulan !== "semua") {
                $kondisi["triwulan"] = $triwulan;
            }
        }

        if ($id) {
            $kondisi["id"]  = $id;
        }


        $data = $this->din7
            ->where($kondisi)
            ->with_provinsi()
            ->with_kabupaten()
            ->with_kecamatan()
            ->with_kelurahan()
            ->with_user("fields:username,nama")
            ->order_by("triwulan", "ASC")
            ->order_by("materi_tema", "ASC")
            ->get_all();

        if ($data) {
            for ($i = 0; $i < sizeof($data); $i++) {
                $data[$i]["waktu_indo"] = $data[$i]["waktu"] != "000-00-00" ?  longdate_indo($data[$i]["waktu"], TRUE) : "";
                $data[$i]["waktu_pelaksanaan_indo"] = $data[$i]["waktu_pelaksanaan"] != "0000-00-00" ? longdate_indo($data[$i]["waktu_pelaksanaan"], TRUE) : "";
            }
            return json_encode([
                "status"    => 200,
                "message"   => "Data ditemukan",
                "data"      => $data
            ]);
        } else {
            return json_encode([
                "status"    => 400,
                "message"   => "Data tidak ditemukan",
                "data"      => []
            ]);
        }
    }

    public function getDataDin8X($jenis = 1, $tahun = NULL, $triwulan = "semua", $id = null,  $mode_cetak = FALSE)
    {
        $kondisi = [];
        $kondisi["jenis"] = $jenis;

        if ($id) {
            $kondisi["id"]  = $id;
        } else {
            if ($this->input->get("id")) {
                $kondisi["id"]  = $this->input->get("id");
            }
        }

        if ($tahun) {
            $kondisi["YEAR(created_at)"] = $tahun;
        }

        $data = $this->din8
            ->where($kondisi)
            ->with_din7()
            ->with_user("fields:username,nama")
            ->order_by("id", $mode_cetak ? "ASC" : "DESC")
            ->get_all();

        $dataFix = [];

        if ($triwulan != "semua") {
            for ($i = 0; $i < sizeof($data); $i++) {
                if ($data[$i]["din7"]["triwulan"] == $triwulan) {
                    // $dataFix[$i] = $data[$i];

                    array_push($dataFix, $data[$i]);
                }
            }
        } else {
            $dataFix = $data;
        }

        // d($dataFix);


        if ($data) {
            return [
                "status"    => 200,
                "message"   => "Data ditemukan",
                "data"      => $dataFix
            ];
        } else {
            return [
                "status"    => 400,
                "message"   => "Data tidak ditemukan",
                "data"      => []
            ];
        }
    }


    //! PENERANGAN HUKUM ===============================================
    public function penerangan_hukum()
    {
        $tahun      = $this->input->get("tahun");
        // $triwulan   = $this->input->get("triwulan");

        if ($tahun == NULL || !is_numeric($tahun)) {
            $tahun      =  date("Y");
            $triwulan   = triwulan(date("Y-m-d"));
            redirect(base_url("din8/penerangan-hukum?tahun=" . $tahun));
        }

        $listTahun = $this->din8
            ->fields()
            ->select("DISTINCT(YEAR(created_at)) as tahun")
            ->where("jenis", "1")
            ->get_all();

        // d($this->getDataPeneranganHukum($tahun, $triwulan));        

        $data = [
            "SidebarType"   => "mini-sidebar",
            "kecamatan"     => $this->getKecamatan(),
            "listTahun"     => $listTahun,
            "din7"          => json_decode($this->getDataX(NULL, NULL, 1))->data
        ];

        // d($data);

        $this->loadViewKejari("din8/penerangan_hukum/index", $data);
    }

    public function getDataPeneranganHukum($tahun = NULL, $triwulan = "semua")
    {
        echo json_encode($this->getDataDin8X(1, $tahun, $triwulan));
    }

    public function addPeneranganHukum()
    {
        $input  = (object) $this->input->post();
        if ($_FILES["foto_video"]["name"] != '') {

            $namaFile = $_FILES["foto_video"]["name"];
            $namafilebaru = date("YmdHis") . "." . pathinfo($namaFile, PATHINFO_EXTENSION);

            $config  = [
                "upload_path"       => "assets/kejari/upload/din8",
                "allowed_types"     => 'gif|jpg|jpeg|png|mp4|avi|mov|mpeg|mpg|mpe',
                "max_size"          => 51200,               //? 50 MB
                "file_ext_tolower"  => FALSE,
                "overwrite"         => TRUE,
                "remove_spaces"     => TRUE,
                "file_name"         => $namafilebaru
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("foto_video")) {
                $dataInput = [
                    "din7_id"       => $input->din7_id,
                    "foto_video"    => $namafilebaru,
                    "nama_file"     => $namaFile,
                    "jenis_file"    => $input->jenis_file,
                    "keterangan"    => $input->keterangan,
                    "jenis"         => 1,
                    "created_by"    => $this->userData->id,
                ];

                $insert = $this->din8->insert($dataInput);
                if ($insert) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Ditambahkan',
                    ]);
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data gagal Ditambahkan (Error Code : 403)',
                    ]);
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error),
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Foto atau video tidak ditemukan, pastikan sudah menambahkan foto atau video',
            ]);
        }
    }

    public function updatePeneranganHukum()
    {
        $input  = (object) $this->input->post();


        $dataInput = [
            "din7_id"       => $input->din7_id,
            // "foto_video"    => $namafilebaru,
            // "nama_file"     => $namaFile,
            "jenis_file"    => $input->jenis_file,
            "keterangan"    => $input->keterangan,
            "jenis"         => 1,
            // "created_by"    => $this->userData->id,
        ];


        $sukses = TRUE;
        if ($_FILES["foto_video"]["name"] != '') {
            $namaFile = $_FILES["foto_video"]["name"];
            $namafilebaru = date("YmdHis") . "." . pathinfo($namaFile, PATHINFO_EXTENSION);

            $config  = [
                "upload_path"       => "assets/kejari/upload/din8",
                "allowed_types"     => 'gif|jpg|jpeg|png|mp4|avi|mov|mpeg|mpg|mpe',
                "max_size"          => 51200,               //? 50 MB
                "file_ext_tolower"  => FALSE,
                "overwrite"         => TRUE,
                "remove_spaces"     => TRUE,
                "file_name"         => $namafilebaru
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $error  = "";
            if ($this->upload->do_upload("foto_video")) {
                $dataInput["foto_video"]    = $namafilebaru;
                $dataInput["nama_file"]     = $namaFile;
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                $sukses = FALSE;
            }
        }

        if ($sukses) {
            $update = $this->din8->update($dataInput, $input->id_data);
            if ($update) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil diupdate',
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Gagal diupdate',
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => $error,
            ]);
        }
    }

    public function deletePeneranganHukum()
    {
        $id = $this->input->post("id_data");
        $delete = $this->din8->delete(["id" => $id]);
        if ($delete) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Berhasil Dihapus',
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus',
            ]);
        }
    }

    public function penerangan_hukum_export()
    {
        
        $tahun  = $this->input->get("tahun");

        if ($tahun == NULL || !is_numeric($tahun)) {
            redirect(base_url("din8/penerangan-hukum-export?tahun=" . date("Y")));
        }        

        $triwulan1  = json_decode(json_encode($this->getDataDin8X(1, $tahun, 1, null, TRUE)))->data;
        $triwulan2  = json_decode(json_encode($this->getDataDin8X(1, $tahun, 2, null, TRUE)))->data;
        $triwulan3  = json_decode(json_encode($this->getDataDin8X(1, $tahun, 3, null, TRUE)))->data;
        $triwulan4  = json_decode(json_encode($this->getDataDin8X(1, $tahun, 4, null, TRUE)))->data;
        $max        = max(sizeof($triwulan1), sizeof($triwulan2), sizeof($triwulan3), sizeof($triwulan4));

        $data["triwulan1"] = [];
        $data["triwulan2"] = [];
        $data["triwulan3"] = [];
        $data["triwulan4"] = [];

        for ($i = 0; $i < $max; $i++) {
            if (isset($triwulan1[$i])) {
                $data["triwulan1"][$i] = $triwulan1[$i];
            }

            if (isset($triwulan2[$i])) {
                $data["triwulan2"][$i] = $triwulan2[$i];
            }

            if (isset($triwulan3[$i])) {
                $data["triwulan3"][$i] = $triwulan3[$i];
            }

            if (isset($triwulan4[$i])) {
                $data["triwulan4"][$i] = $triwulan4[$i];
            }
        }

        $result = [
            "max"   => $max,
            "data"  => $data
        ];

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('din8/penerangan_hukum/export_sederhana', $result, TRUE));
        $filename = "D.IN.8_DOKUMENTASI_PENERANGAN_HUKUM_" . date("d_m_Y_H_i_s") . ".pdf";
        $mpdf->Output($filename, 'I');
    }

    //! PENYULUHAN HUKUM =================================================================
    public function penyuluhan_hukum()
    {
        $tahun      = $this->input->get("tahun");
        // $triwulan   = $this->input->get("triwulan");

        if ($tahun == NULL || !is_numeric($tahun)) {
            $tahun      =  date("Y");
            $triwulan   = triwulan(date("Y-m-d"));
            redirect(base_url("din8/penyuluhan-hukum?tahun=" . $tahun));
        }

        $listTahun = $this->din8
            ->fields()
            ->select("DISTINCT(YEAR(created_at)) as tahun")
            ->where("jenis", "2")
            ->get_all();

        // d($this->getDataPeneranganHukum($tahun, $triwulan));        

        $data = [
            "SidebarType"   => "mini-sidebar",
            "kecamatan"     => $this->getKecamatan(),
            "listTahun"     => $listTahun,
            "din7"          => json_decode($this->getDataX(NULL, NULL, 2))->data
        ];

        // d($data);

        $this->loadViewKejari("din8/penyuluhan_hukum/index", $data);
    }

    public function getDataPenyuluhanHukum($tahun = NULL, $triwulan = "semua")
    {
        echo json_encode($this->getDataDin8X(2, $tahun, $triwulan));
    }

    public function addPenyuluhanHukum()
    {
        $input  = (object) $this->input->post();
        if ($_FILES["foto_video"]["name"] != '') {

            $namaFile = $_FILES["foto_video"]["name"];
            $namafilebaru = date("YmdHis") . "." . pathinfo($namaFile, PATHINFO_EXTENSION);

            $config  = [
                "upload_path"       => "assets/kejari/upload/din8",
                "allowed_types"     => 'gif|jpg|jpeg|png|mp4|avi|mov|mpeg|mpg|mpe',
                "max_size"          => 51200,               //? 50 MB
                "file_ext_tolower"  => FALSE,
                "overwrite"         => TRUE,
                "remove_spaces"     => TRUE,
                "file_name"         => $namafilebaru
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("foto_video")) {
                $dataInput = [
                    "din7_id"       => $input->din7_id,
                    "foto_video"    => $namafilebaru,
                    "nama_file"     => $namaFile,
                    "jenis_file"    => $input->jenis_file,
                    "keterangan"    => $input->keterangan,
                    "jenis"         => 2,
                    "created_by"    => $this->userData->id,
                ];

                $insert = $this->din8->insert($dataInput);
                if ($insert) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Ditambahkan',
                    ]);
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data gagal Ditambahkan (Error Code : 403)',
                    ]);
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error),
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Foto atau video tidak ditemukan, pastikan sudah menambahkan foto atau video',
            ]);
        }
    }

    public function updatePenyuluhanHukum()
    {
        $input  = (object) $this->input->post();


        $dataInput = [
            "din7_id"       => $input->din7_id,
            // "foto_video"    => $namafilebaru,
            // "nama_file"     => $namaFile,
            "jenis_file"    => $input->jenis_file,
            "keterangan"    => $input->keterangan,
            "jenis"         => 2,
            // "created_by"    => $this->userData->id,
        ];


        $sukses = TRUE;
        if ($_FILES["foto_video"]["name"] != '') {
            $namaFile = $_FILES["foto_video"]["name"];
            $namafilebaru = date("YmdHis") . "." . pathinfo($namaFile, PATHINFO_EXTENSION);

            $config  = [
                "upload_path"       => "assets/kejari/upload/din8",
                "allowed_types"     => 'gif|jpg|jpeg|png|mp4|avi|mov|mpeg|mpg|mpe',
                "max_size"          => 51200,               //? 50 MB
                "file_ext_tolower"  => FALSE,
                "overwrite"         => TRUE,
                "remove_spaces"     => TRUE,
                "file_name"         => $namafilebaru
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $error  = "";
            if ($this->upload->do_upload("foto_video")) {
                $dataInput["foto_video"]    = $namafilebaru;
                $dataInput["nama_file"]     = $namaFile;
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                $sukses = FALSE;
            }
        }

        if ($sukses) {
            $update = $this->din8->update($dataInput, $input->id_data);
            if ($update) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil diupdate',
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Gagal diupdate',
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => $error,
            ]);
        }
    }

    public function deletePenyuluhanHukum()
    {
        $id = $this->input->post("id_data");
        $delete = $this->din8->delete(["id" => $id]);
        if ($delete) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Berhasil Dihapus',
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus',
            ]);
        }
    }

    public function penyuluhan_hukum_export()
    {
        
        $tahun  = $this->input->get("tahun");

        if ($tahun == NULL || !is_numeric($tahun)) {
            redirect(base_url("din8/penyuluhan-hukum-export?tahun=" . date("Y")));
        }        

        $triwulan1  = json_decode(json_encode($this->getDataDin8X(2, $tahun, 1, null, TRUE)))->data;
        $triwulan2  = json_decode(json_encode($this->getDataDin8X(2, $tahun, 2, null, TRUE)))->data;
        $triwulan3  = json_decode(json_encode($this->getDataDin8X(2, $tahun, 3, null, TRUE)))->data;
        $triwulan4  = json_decode(json_encode($this->getDataDin8X(2, $tahun, 4, null, TRUE)))->data;
        $max        = max(sizeof($triwulan1), sizeof($triwulan2), sizeof($triwulan3), sizeof($triwulan4));

        $data["triwulan1"] = [];
        $data["triwulan2"] = [];
        $data["triwulan3"] = [];
        $data["triwulan4"] = [];

        for ($i = 0; $i < $max; $i++) {
            if (isset($triwulan1[$i])) {
                $data["triwulan1"][$i] = $triwulan1[$i];
            }

            if (isset($triwulan2[$i])) {
                $data["triwulan2"][$i] = $triwulan2[$i];
            }

            if (isset($triwulan3[$i])) {
                $data["triwulan3"][$i] = $triwulan3[$i];
            }

            if (isset($triwulan4[$i])) {
                $data["triwulan4"][$i] = $triwulan4[$i];
            }
        }

        $result = [
            "max"   => $max,
            "data"  => $data
        ];

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('din8/penyuluhan_hukum/export_sederhana', $result, TRUE));
        $filename = "D.IN.8_DOKUMENTASI_PENYULUHAN_HUKUM_" . date("d_m_Y_H_i_s") . ".pdf";
        $mpdf->Output($filename, 'I');
    }

    //! JAKSA MASUK SEKOLAH =================================================================
    public function jaksa_masuk_sekolah()
    {
        $tahun      = $this->input->get("tahun");
        // $triwulan   = $this->input->get("triwulan");

        if ($tahun == NULL || !is_numeric($tahun)) {
            $tahun      =  date("Y");
            $triwulan   = triwulan(date("Y-m-d"));
            redirect(base_url("din8/jaksa-masuk-sekolah?tahun=" . $tahun));
        }

        $listTahun = $this->din8
            ->fields()
            ->select("DISTINCT(YEAR(created_at)) as tahun")
            ->where("jenis", "3")
            ->get_all();

        // d($this->getDataPeneranganHukum($tahun, $triwulan));        

        $data = [
            "SidebarType"   => "mini-sidebar",
            "kecamatan"     => $this->getKecamatan(),
            "listTahun"     => $listTahun,
            "din7"          => json_decode($this->getDataX(NULL, NULL, 3))->data
        ];

        // d($data);

        $this->loadViewKejari("din8/jaksa_masuk_sekolah/index", $data);
    }

    public function getDataJaksaMasukSekolah($tahun = NULL, $triwulan = "semua")
    {
        echo json_encode($this->getDataDin8X(3, $tahun, $triwulan));
    }

    public function addJaksaMasukSekolah()
    {
        $input  = (object) $this->input->post();
        if ($_FILES["foto_video"]["name"] != '') {

            $namaFile = $_FILES["foto_video"]["name"];
            $namafilebaru = date("YmdHis") . "." . pathinfo($namaFile, PATHINFO_EXTENSION);

            $config  = [
                "upload_path"       => "assets/kejari/upload/din8",
                "allowed_types"     => 'gif|jpg|jpeg|png|mp4|avi|mov|mpeg|mpg|mpe',
                "max_size"          => 51200,               //? 50 MB
                "file_ext_tolower"  => FALSE,
                "overwrite"         => TRUE,
                "remove_spaces"     => TRUE,
                "file_name"         => $namafilebaru
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("foto_video")) {
                $dataInput = [
                    "din7_id"       => $input->din7_id,
                    "foto_video"    => $namafilebaru,
                    "nama_file"     => $namaFile,
                    "jenis_file"    => $input->jenis_file,
                    "keterangan"    => $input->keterangan,
                    "jenis"         => 3,
                    "created_by"    => $this->userData->id,
                ];

                $insert = $this->din8->insert($dataInput);
                if ($insert) {
                    echo json_encode([
                        'response_code'     => 200,
                        'response_message'  => 'Data Berhasil Ditambahkan',
                    ]);
                } else {
                    echo json_encode([
                        'response_code'     => 400,
                        'response_message'  => 'Data gagal Ditambahkan (Error Code : 403)',
                    ]);
                }
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error),
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Foto atau video tidak ditemukan, pastikan sudah menambahkan foto atau video',
            ]);
        }
    }

    public function updateJaksaMasukSekolah()
    {
        $input  = (object) $this->input->post();


        $dataInput = [
            "din7_id"       => $input->din7_id,
            // "foto_video"    => $namafilebaru,
            // "nama_file"     => $namaFile,
            "jenis_file"    => $input->jenis_file,
            "keterangan"    => $input->keterangan,
            "jenis"         => 3,
            // "created_by"    => $this->userData->id,
        ];


        $sukses = TRUE;
        if ($_FILES["foto_video"]["name"] != '') {
            $namaFile = $_FILES["foto_video"]["name"];
            $namafilebaru = date("YmdHis") . "." . pathinfo($namaFile, PATHINFO_EXTENSION);

            $config  = [
                "upload_path"       => "assets/kejari/upload/din8",
                "allowed_types"     => 'gif|jpg|jpeg|png|mp4|avi|mov|mpeg|mpg|mpe',
                "max_size"          => 51200,               //? 50 MB
                "file_ext_tolower"  => FALSE,
                "overwrite"         => TRUE,
                "remove_spaces"     => TRUE,
                "file_name"         => $namafilebaru
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $error  = "";
            if ($this->upload->do_upload("foto_video")) {
                $dataInput["foto_video"]    = $namafilebaru;
                $dataInput["nama_file"]     = $namaFile;
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                $sukses = FALSE;
            }
        }

        if ($sukses) {
            $update = $this->din8->update($dataInput, $input->id_data);
            if ($update) {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Berhasil diupdate',
                ]);
            } else {
                echo json_encode([
                    'response_code'     => 200,
                    'response_message'  => 'Data Gagal diupdate',
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => $error,
            ]);
        }
    }

    public function deleteJaksaMasukSekolah()
    {
        $id = $this->input->post("id_data");
        $delete = $this->din8->delete(["id" => $id]);
        if ($delete) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Berhasil Dihapus',
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Dihapus',
            ]);
        }
    }

    public function jaksa_masuk_sekolah_export()
    {
        
        $tahun  = $this->input->get("tahun");

        if ($tahun == NULL || !is_numeric($tahun)) {
            redirect(base_url("din8/jaksa-masuk-sekolah-export?tahun=" . date("Y")));
        }        

        $triwulan1  = json_decode(json_encode($this->getDataDin8X(3, $tahun, 1, null, TRUE)))->data;
        $triwulan2  = json_decode(json_encode($this->getDataDin8X(3, $tahun, 2, null, TRUE)))->data;
        $triwulan3  = json_decode(json_encode($this->getDataDin8X(3, $tahun, 3, null, TRUE)))->data;
        $triwulan4  = json_decode(json_encode($this->getDataDin8X(3, $tahun, 4, null, TRUE)))->data;
        $max        = max(sizeof($triwulan1), sizeof($triwulan2), sizeof($triwulan3), sizeof($triwulan4));

        $data["triwulan1"] = [];
        $data["triwulan2"] = [];
        $data["triwulan3"] = [];
        $data["triwulan4"] = [];

        for ($i = 0; $i < $max; $i++) {
            if (isset($triwulan1[$i])) {
                $data["triwulan1"][$i] = $triwulan1[$i];
            }

            if (isset($triwulan2[$i])) {
                $data["triwulan2"][$i] = $triwulan2[$i];
            }

            if (isset($triwulan3[$i])) {
                $data["triwulan3"][$i] = $triwulan3[$i];
            }

            if (isset($triwulan4[$i])) {
                $data["triwulan4"][$i] = $triwulan4[$i];
            }
        }

        $result = [
            "max"   => $max,
            "data"  => $data
        ];

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('din8/jaksa_masuk_sekolah/export_sederhana', $result, TRUE));
        $filename = "D.IN.8_DOKUMENTASI_JAKSA_MASUK_SEKOLAH_" . date("d_m_Y_H_i_s") . ".pdf";
        $mpdf->Output($filename, 'I');
    }
}
