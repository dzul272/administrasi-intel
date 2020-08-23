<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Din7 extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Din7_model", "din7");
        $this->load->model("Kelurahan_model", "kelurahan");
    }

    public function getKelurahan($id_kec = NULL)
    {
        $kelurahan = $this->kelurahan
            ->where("id_kec", $id_kec)
            ->order_by("nama", "ASC")
            ->get_all();

        if ($kelurahan) {
            echo json_encode([
                "status"    => 200,
                "message"   => "Data ditemukan",
                "data"      => $kelurahan
            ]);
        } else {
            echo json_encode([
                "status"    => 400,
                "message"   => "Data tidak ditemukan",
                "data"      => []
            ]);
        }
    }

    public function index()
    {
        redirect(base_url("din7/penerangan-hukum"));
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
            ->order_by("id", "DESC")
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

    //! PENERANGAN HUKUM ================================================================

    public function penerangan_hukum()
    {
        $tahun      = $this->input->get("tahun");
        $triwulan   = $this->input->get("triwulan");

        if ($tahun == NULL || $triwulan == NULL || !is_numeric($tahun)) {
            $tahun      =  date("Y");
            $triwulan   = triwulan(date("Y-m-d"));
            redirect(base_url("din7/penerangan-hukum?tahun=" . $tahun . "&triwulan=" . $triwulan));
        } else {
            if (is_numeric($triwulan)) {
                if ($triwulan < 1 || $triwulan > 4) {
                    $triwulan = triwulan(date("Y-m-d"));
                    redirect(base_url("din7/penerangan-hukum?tahun=" . $tahun . "&triwulan=" . $triwulan));
                }
            } else if ($triwulan !== "semua") {
                $triwulan = triwulan(date("Y-m-d"));
                redirect(base_url("din7/penerangan-hukum?tahun=" . $tahun . "&triwulan=" . $triwulan));
            }
        }

        $listTahun = $this->din7
            ->fields()
            ->select("DISTINCT(YEAR(created_at)) as tahun")
            ->get_all();

        // d($this->getDataPeneranganHukum($tahun, $triwulan));        

        $data = [
            "SidebarType"   => "mini-sidebar",
            "kecamatan"     => $this->getKecamatan(),
            "listTahun"     => $listTahun
        ];

        $this->loadViewKejari("din7/penerangan_hukum/index", $data);
    }

    public function getDataPeneranganHukum($tahun = NULL, $triwulan = NULL)
    {
        echo $this->getDataX($tahun, $triwulan, 1);
    }

    public function addPeneranganHukum()
    {
        $input  = (object) $this->input->post();

        $dataInput = [
            "peserta"               => $input->peserta,
            "materi_tema"           => $input->materi_tema,
            "jml_peserta"           => $input->jml_peserta,
            "waktu"                 => $input->waktu,
            "tempat_prov"           => 33,
            "tempat_kab"            => 3302,
            "tempat_kec"            => $input->tempat_kec,
            "tempat_kel"            => $input->tempat_kel,
            "tempat_detail"         => $input->tempat_detail,
            "media"                 => $input->media,
            "materi"                => $input->materi,
            "waktu_pelaksanaan"     => $input->waktu_pelaksanaan,
            "keterangan"            => $input->keterangan,

            "jenis"                 => 1,
            "triwulan"              => triwulan($input->waktu),
            "created_by"            => $this->userData->id,
        ];

        $insert = $this->din7->insert($dataInput);

        if ($insert) {
            //TODO : GET OUTPUT               
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Berhasil Ditambahkan',
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Ditambahkan'
            ]);
        }
    }

    public function updatePeneranganHukum()
    {
        $input  = (object) $this->input->post();

        $dataUpdate = [
            "peserta"               => $input->peserta,
            "materi_tema"           => $input->materi_tema,
            "jml_peserta"           => $input->jml_peserta,
            "waktu"                 => $input->waktu,
            "tempat_prov"           => 33,
            "tempat_kab"            => 3302,
            "tempat_kec"            => $input->tempat_kec,
            "tempat_kel"            => $input->tempat_kel,
            "tempat_detail"         => $input->tempat_detail,
            "media"                 => $input->media,
            "materi"                => $input->materi,
            "waktu_pelaksanaan"     => $input->waktu_pelaksanaan,
            "keterangan"            => $input->keterangan,

            "jenis"                 => 1,
            "triwulan"              => triwulan($input->waktu),
        ];

        $update = $this->din7->update($dataUpdate, $input->id_data);
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
    }

    public function deletePeneranganHukum()
    {
        $id = $this->input->post("id_data");
        $delete = $this->din7->delete(["id" => $id]);
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

    public function penerangan_hukum_export_lengkap()
    {
        $tahun  = $this->input->get("tahun");

        if ($tahun == NULL || !is_numeric($tahun)) {
            redirect(base_url("din7/penerangan-hukum-export-lengkap?tahun=" . date("Y")));
        }

        $data   = json_decode($this->getDataX($tahun, "semua", 1));
        // d($data);
        // $this->load->view('din7/penerangan_hukum/export_lengkap', $data, FALSE);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('din7/penerangan_hukum/export_lengkap', $data, TRUE));
        $filename = "D.IN.7_PENERANGAN_HUKUM_LENGKAP_" . date("d_m_Y_H_i_s") . ".pdf";
        // $mpdf->Output($filename, 'D');
        $mpdf->Output($filename, 'I');
    }


    public function penerangan_hukum_export_sederhana()
    {
        $tahun  = $this->input->get("tahun");

        if ($tahun == NULL || !is_numeric($tahun)) {
            redirect(base_url("din7/penerangan-hukum-export-sederhana?tahun=" . date("Y")));
        }
        $triwulan1  = json_decode($this->getDataX($tahun, 1, 1))->data;
        $triwulan2  = json_decode($this->getDataX($tahun, 2, 1))->data;
        $triwulan3  = json_decode($this->getDataX($tahun, 3, 1))->data;
        $triwulan4  = json_decode($this->getDataX($tahun, 4, 1))->data;
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

        // d($result);
        // $this->load->view('din7/penerangan_hukum/export_sederhana', $result, FALSE);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('din7/penerangan_hukum/export_sederhana', $result, TRUE));
        $filename = "D.IN.7_PENERANGAN_HUKUM_SEDERHANA_" . date("d_m_Y_H_i_s") . ".pdf";
        $mpdf->Output($filename, 'I');
    }

    //! PENYULUHAN HUKUM ================================================================

    public function penyuluhan_hukum()
    {
        $tahun      = $this->input->get("tahun");
        $triwulan   = $this->input->get("triwulan");

        if ($tahun == NULL || $triwulan == NULL || !is_numeric($tahun)) {
            $tahun      =  date("Y");
            $triwulan   = triwulan(date("Y-m-d"));
            redirect(base_url("din7/penyuluhan-hukum?tahun=" . $tahun . "&triwulan=" . $triwulan));
        } else {
            if (is_numeric($triwulan)) {
                if ($triwulan < 1 || $triwulan > 4) {
                    $triwulan = triwulan(date("Y-m-d"));
                    redirect(base_url("din7/penyuluhan-hukum?tahun=" . $tahun . "&triwulan=" . $triwulan));
                }
            } else if ($triwulan !== "semua") {
                $triwulan = triwulan(date("Y-m-d"));
                redirect(base_url("din7/penyuluhan-hukum?tahun=" . $tahun . "&triwulan=" . $triwulan));
            }
        }

        $listTahun = $this->din7
            ->fields()
            ->select("DISTINCT(YEAR(created_at)) as tahun")
            ->get_all();

        // d($this->getDataPeneranganHukum($tahun, $triwulan));        

        $data = [
            "SidebarType"   => "mini-sidebar",
            "kecamatan"     => $this->getKecamatan(),
            "listTahun"     => $listTahun
        ];

        $this->loadViewKejari("din7/penyuluhan_hukum/index", $data);
    }

    public function getDataPenyuluhanHukum($tahun = NULL, $triwulan = NULL)
    {
        echo $this->getDataX($tahun, $triwulan, 2);
    }

    public function addPenyuluhanHukum()
    {
        $input  = (object) $this->input->post();

        $dataInput = [
            "peserta"               => $input->peserta,
            "materi_tema"           => $input->materi_tema,
            "jml_peserta"           => $input->jml_peserta,
            "waktu"                 => $input->waktu,
            "tempat_prov"           => 33,
            "tempat_kab"            => 3302,
            "tempat_kec"            => $input->tempat_kec,
            "tempat_kel"            => $input->tempat_kel,
            "tempat_detail"         => $input->tempat_detail,
            "media"                 => $input->media,
            "materi"                => $input->materi,
            "waktu_pelaksanaan"     => $input->waktu_pelaksanaan,
            "keterangan"            => $input->keterangan,

            "jenis"                 => 2,
            "triwulan"              => triwulan($input->waktu),
            "created_by"            => $this->userData->id,
        ];

        $insert = $this->din7->insert($dataInput);

        if ($insert) {
            //TODO : GET OUTPUT               
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Berhasil Ditambahkan',
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Ditambahkan'
            ]);
        }
    }

    public function updatePenyuluhanHukum()
    {
        $input  = (object) $this->input->post();

        $dataUpdate = [
            "peserta"               => $input->peserta,
            "materi_tema"           => $input->materi_tema,
            "jml_peserta"           => $input->jml_peserta,
            "waktu"                 => $input->waktu,
            "tempat_prov"           => 33,
            "tempat_kab"            => 3302,
            "tempat_kec"            => $input->tempat_kec,
            "tempat_kel"            => $input->tempat_kel,
            "tempat_detail"         => $input->tempat_detail,
            "media"                 => $input->media,
            "materi"                => $input->materi,
            "waktu_pelaksanaan"     => $input->waktu_pelaksanaan,
            "keterangan"            => $input->keterangan,

            "jenis"                 => 2,
            "triwulan"              => triwulan($input->waktu),
        ];

        $update = $this->din7->update($dataUpdate, $input->id_data);
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
    }

    public function deletePenyuluhanHukum()
    {
        $id = $this->input->post("id_data");
        $delete = $this->din7->delete(["id" => $id]);
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

    public function penyuluhan_hukum_export_lengkap()
    {
        $tahun  = $this->input->get("tahun");

        if ($tahun == NULL || !is_numeric($tahun)) {
            redirect(base_url("din7/penyuluhan-hukum-export-lengkap?tahun=" . date("Y")));
        }

        $data   = json_decode($this->getDataX($tahun, "semua", 2));
        // d($data);
        // $this->load->view('din7/penyuluhan_hukum/export_lengkap', $data, FALSE);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('din7/penyuluhan_hukum/export_lengkap', $data, TRUE));
        $filename = "D.IN.7_PENYULUHAN_HUKUM_LENGKAP_" . date("d_m_Y_H_i_s") . ".pdf";
        // $mpdf->Output($filename, 'D');
        $mpdf->Output($filename, 'I');
    }

    public function penyuluhan_hukum_export_sederhana()
    {
        $tahun  = $this->input->get("tahun");

        if ($tahun == NULL || !is_numeric($tahun)) {
            redirect(base_url("din7/penyuluhan-hukum-export-sederhana?tahun=" . date("Y")));
        }
        $triwulan1  = json_decode($this->getDataX($tahun, 1, 2))->data;
        $triwulan2  = json_decode($this->getDataX($tahun, 2, 2))->data;
        $triwulan3  = json_decode($this->getDataX($tahun, 3, 2))->data;
        $triwulan4  = json_decode($this->getDataX($tahun, 4, 2))->data;
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

        // d($result);
        // $this->load->view('din7/penyuluhan_hukum/export_sederhana', $result, FALSE);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('din7/penyuluhan_hukum/export_sederhana', $result, TRUE));
        $filename = "D.IN.7_PENYULUHAN_HUKUM_SEDERHANA_" . date("d_m_Y_H_i_s") . ".pdf";
        $mpdf->Output($filename, 'I');
    }

    //! JAKSA MASUK SEKOLAH ================================================================

    public function jaksa_masuk_sekolah()
    {
        $tahun      = $this->input->get("tahun");
        $triwulan   = $this->input->get("triwulan");

        if ($tahun == NULL || $triwulan == NULL || !is_numeric($tahun)) {
            $tahun      =  date("Y");
            $triwulan   = triwulan(date("Y-m-d"));
            redirect(base_url("din7/jaksa-masuk-sekolah?tahun=" . $tahun . "&triwulan=" . $triwulan));
        } else {
            if (is_numeric($triwulan)) {
                if ($triwulan < 1 || $triwulan > 4) {
                    $triwulan = triwulan(date("Y-m-d"));
                    redirect(base_url("din7/jaksa-masuk-sekolah?tahun=" . $tahun . "&triwulan=" . $triwulan));
                }
            } else if ($triwulan !== "semua") {
                $triwulan = triwulan(date("Y-m-d"));
                redirect(base_url("din7/jaksa-masuk-sekolah?tahun=" . $tahun . "&triwulan=" . $triwulan));
            }
        }

        $listTahun = $this->din7
            ->fields()
            ->select("DISTINCT(YEAR(created_at)) as tahun")
            ->get_all();

        // d($this->getDataPeneranganHukum($tahun, $triwulan));        

        $data = [
            "SidebarType"   => "mini-sidebar",
            "kecamatan"     => $this->getKecamatan(),
            "listTahun"     => $listTahun
        ];

        $this->loadViewKejari("din7/jaksa_masuk_sekolah/index", $data);
    }

    public function getDataJaksaMasukSekolah($tahun = NULL, $triwulan = NULL)
    {
        echo $this->getDataX($tahun, $triwulan, 3);
    }

    public function addJaksaMasukSekolah()
    {
        $input  = (object) $this->input->post();

        $dataInput = [
            "peserta"               => $input->peserta,
            "materi_tema"           => $input->materi_tema,
            "jml_peserta"           => $input->jml_peserta,
            "waktu"                 => $input->waktu,
            "tempat_prov"           => 33,
            "tempat_kab"            => 3302,
            "tempat_kec"            => $input->tempat_kec,
            "tempat_kel"            => $input->tempat_kel,
            "tempat_detail"         => $input->tempat_detail,
            "media"                 => $input->media,
            "materi"                => $input->materi,
            "waktu_pelaksanaan"     => $input->waktu_pelaksanaan,
            "keterangan"            => $input->keterangan,

            "jenis"                 => 3,
            "triwulan"              => triwulan($input->waktu),
            "created_by"            => $this->userData->id,
        ];

        $insert = $this->din7->insert($dataInput);

        if ($insert) {
            //TODO : GET OUTPUT               
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Data Berhasil Ditambahkan',
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Ditambahkan'
            ]);
        }
    }

    public function updateJaksaMasukSekolah()
    {
        $input  = (object) $this->input->post();

        $dataUpdate = [
            "peserta"               => $input->peserta,
            "materi_tema"           => $input->materi_tema,
            "jml_peserta"           => $input->jml_peserta,
            "waktu"                 => $input->waktu,
            "tempat_prov"           => 33,
            "tempat_kab"            => 3302,
            "tempat_kec"            => $input->tempat_kec,
            "tempat_kel"            => $input->tempat_kel,
            "tempat_detail"         => $input->tempat_detail,
            "media"                 => $input->media,
            "materi"                => $input->materi,
            "waktu_pelaksanaan"     => $input->waktu_pelaksanaan,
            "keterangan"            => $input->keterangan,

            "jenis"                 => 3,
            "triwulan"              => triwulan($input->waktu),
        ];

        $update = $this->din7->update($dataUpdate, $input->id_data);
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
    }

    public function deleteJaksaMasukSekolah()
    {
        $id = $this->input->post("id_data");
        $delete = $this->din7->delete(["id" => $id]);
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

    public function jaksa_masuk_sekolah_export_lengkap()
    {
        $tahun  = $this->input->get("tahun");

        if ($tahun == NULL || !is_numeric($tahun)) {
            redirect(base_url("din7/jaksa-masuk-sekolah-export-lengkap?tahun=" . date("Y")));
        }

        $data   = json_decode($this->getDataX($tahun, "semua", 3));
        // d($data);
        // $this->load->view('din7/jaksa_masuk_sekolah/export_lengkap', $data, FALSE);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('din7/jaksa_masuk_sekolah/export_lengkap', $data, TRUE));
        $filename = "D.IN.7_JAKSA_MASUK_SEKOLAH_LENGKAP_" . date("d_m_Y_H_i_s") . ".pdf";
        // $mpdf->Output($filename, 'D');
        $mpdf->Output($filename, 'I');
    }

    public function jaksa_masuk_sekolah_export_sederhana()
    {
        $tahun  = $this->input->get("tahun");

        if ($tahun == NULL || !is_numeric($tahun)) {
            redirect(base_url("din7/jaksa-masuk-sekolah-export-sederhana?tahun=" . date("Y")));
        }
        $triwulan1  = json_decode($this->getDataX($tahun, 1, 3))->data;
        $triwulan2  = json_decode($this->getDataX($tahun, 2, 3))->data;
        $triwulan3  = json_decode($this->getDataX($tahun, 3, 3))->data;
        $triwulan4  = json_decode($this->getDataX($tahun, 4, 3))->data;
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

        // d($result);
        // $this->load->view('din7/jaksa_masuk_sekolah/export_sederhana', $result, FALSE);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('din7/jaksa_masuk_sekolah/export_sederhana', $result, TRUE));
        $filename = "D.IN.7_JAKSA_MASUK_SEKOLAH_SEDERHANA_" . date("d_m_Y_H_i_s") . ".pdf";
        $mpdf->Output($filename, 'I');
    }
}
