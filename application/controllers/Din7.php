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

    public function index()
    {
        redirect(base_url("din7/penerangan-hukum"));
    }

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

        $this->loadViewKejari("din7/pelaksanaan_hukum", $data);
    }

    public function getDataPeneranganHukum($tahun = NULL, $triwulan = NULL)
    {
        $kondisi["YEAR(waktu)"] = $tahun;
        $kondisi["jenis"]       = 1;
        if ($triwulan !== "semua") {
            $kondisi["triwulan"] = $triwulan;
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
                $data[$i]["waktu_indo"] = longdate_indo($data[$i]["waktu"], TRUE);
                $data[$i]["waktu_pelaksanaan_indo"] = longdate_indo($data[$i]["waktu_pelaksanaan"], TRUE);
            }
            echo json_encode([
                "status"    => 200,
                "message"   => "Data ditemukan",
                "data"      => $data
            ]);
        } else {
            echo json_encode([
                "status"    => 400,
                "message"   => "Data tidak ditemukan",
                "data"      => []
            ]);
        }
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
}
