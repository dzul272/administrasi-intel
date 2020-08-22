<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Din2 extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Din2s6_model", "din2s6");
    }

    public function index()
    {
        $this->loadViewKejari("din2/index");
    }

    public function getData()
    {
        $listDin2 = $this->din2s6
            ->where(["jenis_din" => 2])
            ->with_user()
            ->as_array()
            ->order_by("id", "DESC")
            ->get_all();

        if ($listDin2) {
            for ($i  = 0; $i < sizeof($listDin2); $i++) {
                $listDin2[$i]["simbol"] = asset("kejari/upload/din2/") . $listDin2[$i]["simbol"];
            }
            echo json_encode([
                "status"    => 200,
                "message"   => "Data ditemukan",
                "data"      => $listDin2
            ]);
        } else {
            echo json_encode([
                "status"    => 400,
                "message"   => "Data tidak ditemukan",
                "data"      => []
            ]);
        }
    }

    public function getDataById()
    {
        $id = $this->input->get("id");
        $listDin2 = $this->din2s6
            ->where([
                "jenis_din" => 2,
                "id"        => $id
            ])
            ->with_user()
            ->as_array()
            ->order_by("id", "DESC")
            ->get();

        if ($listDin2) {
            $listDin2["simbol"] = asset("kejari/upload/din2/") . $listDin2["simbol"];
            echo json_encode([
                "status"    => 200,
                "message"   => "Data ditemukan",
                "data"      => $listDin2
            ]);
        } else {
            echo json_encode([
                "status"    => 400,
                "message"   => "Data tidak ditemukan",
                "data"      => NULL
            ]);
        }
    }

    public function prosesTambahData()
    {
        $input  = (object) $this->input->post();

        $lokasiArsip = "assets/kejari/upload/din2";

        $namafilebaru = time() . "." . pathinfo($_FILES["foto_simbol"]["name"], PATHINFO_EXTENSION);

        $config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'gif|jpg|jpeg|png|jiff|webp',
            "max_size"          => 5120,
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $namafilebaru
        ];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($_FILES["foto_simbol"]["name"] != '') {
            if ($this->upload->do_upload("foto_simbol")) {
                $dataInput = [
                    "simbol"        => $namafilebaru,
                    "sektor"        => $input->sektor,
                    "keterangan"    => $input->keterangan,
                    "jenis_din"     => 2,
                    "created_by"    => $this->userData->id
                ];

                $insert = $this->din2s6->insert($dataInput);
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
            } else {
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
            }
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Data Gagal Ditambahkan',
                'output'            => NULL
            ]);
        }
    }

    public function prosesUpdateData()
    {
        $input  = (object) $this->input->post();

        $lokasiArsip = "assets/kejari/upload/din2";

        $namafilebaru = time() . "." . pathinfo($_FILES["foto_simbol"]["name"], PATHINFO_EXTENSION);

        $config  = [
            "upload_path"       => $lokasiArsip,
            "allowed_types"     => 'gif|jpg|jpeg|png|jiff|webp',
            "max_size"          => 5120,
            "file_ext_tolower"  => FALSE,
            "overwrite"         => TRUE,
            "remove_spaces"     => TRUE,
            "file_name"         => $namafilebaru
        ];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($_FILES["foto_simbol"]["name"] != '') {
            if ($this->upload->do_upload("foto_simbol")) {
                $dataUpdate = [
                    "simbol"        => $namafilebaru,
                    "sektor"        => $input->sektor,
                    "keterangan"    => $input->keterangan
                ];

                $update = $this->din2s6->update($dataUpdate, $input->id_data);
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
                $error = array('error' => $this->upload->display_errors("", ""));
                echo json_encode([
                    'response_code'     => 400,
                    'response_message'  => implode("<br>", $error)
                ]);
            }
        } else {
            $dataUpdate = [
                "sektor"        => $input->sektor,
                "keterangan"    => $input->keterangan,
            ];

            $update = $this->din2s6->update($dataUpdate, $input->id_data);
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
    }

    public function prosesHapusData()
    {
        $id = $this->input->post("id_data");

        $delete = $this->din2s6->delete(["id" => $id]);
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

    public function export()
    {
        //TODO : GET DATA
        $listDin2 = $this->din2s6
            ->where(["jenis_din" => 2])
            ->with_user()
            ->as_array()
            ->order_by("id", "DESC")
            ->get_all();
        for ($i  = 0; $i < sizeof($listDin2); $i++) {
            $listDin2[$i]["simbol"] = "assets/kejari/upload/din2/" . $listDin2[$i]["simbol"];
        }

        $mpdf = new \Mpdf\Mpdf();
        $data["list"] = $listDin2;        
        // $this->load->view('din2/export', $data, FALSE);

        $mpdf->WriteHTML($this->load->view('din2/export', $data, TRUE));        
        $filename = "D.IN.2_" . date("d_m_Y_H_i_s") . ".pdf";
        // $mpdf->Output($filename, 'D');
        $mpdf->Output($filename, 'I');
    }
}