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

    public function getDataDin8X($jenis = 1, $tahun = NULL, $id = null)
    {
        $kondisi = [];
        $kondisi["jenis"] = $jenis;

        if ($id) {
            $kondisi["id"]  = $id;
        }

        if ($tahun) {
            $kondisi["YEAR(created_at)"] = $tahun;
        }

        $data = $this->din8
            ->where($kondisi)
            ->with_din7()
            ->with_user("fields:username,nama")
            ->get_all();

        if ($data) {
            return [
                "status"    => 200,
                "message"   => "Data ditemukan",
                "data"      => $data
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
        $triwulan   = $this->input->get("triwulan");

        if ($tahun == NULL || $triwulan == NULL || !is_numeric($tahun)) {
            $tahun      =  date("Y");
            $triwulan   = triwulan(date("Y-m-d"));
            redirect(base_url("din8/penerangan-hukum?tahun=" . $tahun . "&triwulan=" . $triwulan));
        } else {
            if (is_numeric($triwulan)) {
                if ($triwulan < 1 || $triwulan > 4) {
                    $triwulan = triwulan(date("Y-m-d"));
                    redirect(base_url("din8/penerangan-hukum?tahun=" . $tahun . "&triwulan=" . $triwulan));
                }
            } else if ($triwulan !== "semua") {
                $triwulan = triwulan(date("Y-m-d"));
                redirect(base_url("din8/penerangan-hukum?tahun=" . $tahun . "&triwulan=" . $triwulan));
            }
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

    public function getDataPeneranganHukum($tahun = NULL)
    {
        echo json_encode($this->getDataDin8X(1, $tahun, null));
    }
}
