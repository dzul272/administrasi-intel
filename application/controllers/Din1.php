<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Din1 extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Din2s6_model", "din2s6");
        $this->load->model("Din1_model", "din1");
    }

    public function index()
    {
        $tahun  = $this->input->get("tahun");
        $bulan  = $this->input->get("bulan");

        if ($tahun == NULL || $bulan == NULL || !is_numeric($tahun) || !is_numeric($bulan)) {
            redirect(base_url("din1/?bulan=" . date("n") . "&tahun=" . date("Y")));
        }

        $listDin = $this->din2s6
            ->with_user()
            ->as_array()
            ->order_by("jenis_din", "ASC")
            ->order_by("sektor", "ASC")
            ->get_all();

        if ($listDin) {
            for ($i  = 0; $i < sizeof($listDin); $i++) {
                $listDin[$i]["simbol"] = asset("kejari/upload/din" . $listDin[$i]["jenis_din"] . "/") . $listDin[$i]["simbol"]; //! GANTI
            }
        }

        $listTahun = $this->din2s6
            ->fields()
            ->select("DISTINCT(YEAR(created_at)) as tahun")
            ->get_all();

        $data = [
            "listDin"       => $listDin,
            "listTahun"     => $listTahun
        ];
        $this->loadViewKejari("din1/index", $data);
    }

    public function getDataX($tahun = NULL, $bulan = NULL)
    {
        $listDinAll = $this->din1
            ->with_user()
            ->with_din2s6()
            ->as_array()
            ->get_all();

        $listDin = $this->din1
            ->where([
                "YEAR(created_at)"  => $tahun,
                "MONTH(created_at)" => $bulan
            ])
            ->with_user()
            ->with_din2s6()
            ->as_array()
            ->order_by("id", "DESC")
            ->get_all();

        if ($listDin) {
            for ($a  = 0; $a < sizeof($listDinAll); $a++) {
                $listDinAll[$a]["no_urut"] = ($a + 1);
                for ($i  = 0; $i < sizeof($listDin); $i++) {
                    if ($listDin[$i]["id"] == $listDinAll[$a]["id"]) {
                        $listDin[$i]["no_urut"] = $listDinAll[$a]["no_urut"];
                        $listDin[$i]["din2s6"]["simbol"] = asset("kejari/upload/din" . $listDin[$i]["din2s6"]["jenis_din"] . "/") . $listDin[$i]["din2s6"]["simbol"]; //! GANTI
                    }
                }
            }

            return json_encode([
                "status"    => 200,
                "message"   => "Data ditemukan",
                "data"      => $listDin
            ]);
        } else {
            return json_encode([
                "status"    => 400,
                "message"   => "Data tidak ditemukan",
                "data"      => []
            ]);
        }
    }

    public function getData($tahun = NULL, $bulan = NULL)
    {
        echo $this->getDataX($tahun, $bulan);
    }

    public function getDataById()
    {
        $id = $this->input->get("id");

        $listDinAll = $this->din1
            ->with_user()
            ->with_din2s6()
            ->as_array()
            ->get_all();

        $listDin = $this->din1
            ->where([
                "id"        => $id
            ])
            ->with_user()
            ->with_din2s6()
            ->as_array()
            ->get_all();

        if ($listDin) {
            for ($a  = 0; $a < sizeof($listDinAll); $a++) {
                $listDinAll[$a]["no_urut"] = ($a + 1);
                for ($i  = 0; $i < sizeof($listDin); $i++) {
                    if ($listDin[$i]["id"] == $listDinAll[$a]["id"]) {
                        $listDin[$i]["no_urut"] = $listDinAll[$a]["no_urut"];
                        $listDin[$i]["din2s6"]["simbol"] = asset("kejari/upload/din" . $listDin[$i]["din2s6"]["jenis_din"] . "/") . $listDin[$i]["din2s6"]["simbol"]; //! GANTI
                    }
                }
            }
            echo json_encode([
                "status"    => 200,
                "message"   => "Data ditemukan",
                "data"      => $listDin
            ]);
        } else {
            echo json_encode([
                "status"    => 400,
                "message"   => "Data tidak ditemukan",
                "data"      => []
            ]);
        }
    }

    public function prosesTambahData()
    {
        $input  = (object) $this->input->post();
        $dataInput = [
            "din_id"        => $input->din_id,
            "siabidibam"    => $input->siabidibam,
            "keterangan"    => $input->keterangan,
            "created_by"    => $this->userData->id
        ];
        $insert = $this->din1->insert($dataInput);

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

    public function prosesUpdateData()
    {
        $input  = (object) $this->input->post();
        $dataUpdate = [
            "din_id"        => $input->din_id,
            "siabidibam"    => $input->siabidibam,
            "keterangan"    => $input->keterangan,
        ];

        $update = $this->din1->update($dataUpdate, $input->id_data);
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

    public function export()
    {
        $tahun  = $this->input->get("tahun");
        $bulan  = $this->input->get("bulan");

        if ($tahun == NULL || $bulan == NULL || !is_numeric($tahun) || !is_numeric($bulan)) {
            redirect(base_url("din1/export?bulan=" . date("n") . "&tahun=" . date("Y")));
        }

        $data = json_decode($this->getDataX($tahun, $bulan));
                    
        // $this->load->view('din2/export', $data, FALSE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('din1/export', $data, TRUE));
        $filename = "D.IN.1" . "_" . date("d_m_Y_H_i_s") . ".pdf";
        // $mpdf->Output($filename, 'D');
        $mpdf->Output($filename, 'I');
    }
}
