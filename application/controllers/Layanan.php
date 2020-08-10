<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Lapormudik_model", "laporan");
        $this->load->model("Laporanmudik_format_model", "laporan_format");
    }

    public function index()
    {
        redirect(base_url($this->router->fetch_class() . '/laporan-mudik'));
    }

    public function laporan_mudik()
    {
        $data_laporan_mudik = $this->laporan
            ->where(["id_desa" => $this->userData->id_desa])
            ->order_by("created_at", "DESC")
            ->get_all();

        $laporan_format = $this->laporan_format
            ->where(["id_desa" => $this->userData->id_desa])
            ->get();

        $data = [
            "SidebarType"       => "mini-sidebar",
            "laporan_mudik"     => $data_laporan_mudik,
            "laporan_format"    => $laporan_format
        ];

        $this->loadViewAdmin('layanan/laporan_mudik', $data);
    }

    public function export_laporan_mudik()
    {
        $data_laporan_mudik = $this->laporan
            ->where(["id_desa" => $this->userData->id_desa])
            ->order_by("created_at", "DESC")
            ->get_all();

        $inputFileType  = 'Xlsx';
        $inputFileName  = LOKASI_TEMPLATE . "default/layanan/laporan_mudik.xlsx";
        $reader         = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $spreadsheet    = $reader->load($inputFileName);
        $worksheet      = $spreadsheet->getActiveSheet();

        $worksheet->getCell('A4')->setValue("Tanggal Export : " . longdate_indo(date("Y-m-d")));
        $baris  = 6;
        $no     = 1;
        if ($data_laporan_mudik) {
            foreach ($data_laporan_mudik as $data) {
                $worksheet->getCell('A' . $baris)->setValue($no++);
                $worksheet->getCell('B' . $baris)->setValue(" " . $data->nik_lapormudik);
                $worksheet->getCell('C' . $baris)->setValue($data->nama_lapormudik);
                $worksheet->getCell('D' . $baris)->setValue($data->alamat_lapormudik);
                $worksheet->getCell('E' . $baris)->setValue($data->umur_lapormudik);
                $worksheet->getCell('F' . $baris)->setValue($data->asal_lapormudik);
                $worksheet->getCell('G' . $baris)->setValue(longdate_indo($data->tanggalsampai_lapormudik));
                $worksheet->getCell('H' . $baris)->setValue($data->keluhan_lapormudik);
                $worksheet->getCell('I' . $baris)->setValue(" " . $data->nohp_lapormudik);
                $worksheet->getCell('J' . $baris)->setValue(longdate_indo($data->created_at));
                $baris++;
            }
        }
        $fileName   = "BUKU_AGENDA_LAPORAN_MUDIK" .  "_" . strtoupper($this->userData->nama_desa) . "_" . date("Y.m.d.H.i.s");
        exportExcel($spreadsheet, $fileName, TRUE, 6, TRUE);
    }

    public function proses_ubah_format_himbauan()
    {
        $isiFormat = $this->input->post("format_himbauan", TRUE);
        $update = $this->laporan_format
            ->where(["id_desa" => $this->userData->id_desa])
            ->update(["isi_format" => $isiFormat]);
        if ($update) {
            echo json_encode([
                'response_code'     => 200,
                'response_message'  => 'Format Himbauan Berhasil Di Ubah',
            ]);
        } else {
            echo json_encode([
                'response_code'     => 400,
                'response_message'  => 'Format Himbauan Gagal Di Ubah',
            ]);
        }
    }
}
