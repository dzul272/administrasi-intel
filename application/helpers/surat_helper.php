<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('lokasiSurat')) {
    function lokasiSurat($surat = "")
    {
        $CI = &get_instance();
        $CI->load->model("User_model", "user");

        $user       = $CI->user->userData;
        $nama_desa  = $user->nama_desa;

        $lokasiRtf  = LOKASI_TEMPLATE . $nama_desa . "/" . $surat . ".rtf";
        $cekLokasi  = FCPATH . $lokasiRtf;
        if (file_exists($cekLokasi)) {
            return $lokasiRtf;
        } else {
            $lokasiRtf  =  LOKASI_TEMPLATE . "default/" . $surat . ".rtf";
            $cekLokasi  = FCPATH . $lokasiRtf;
            if (file_exists($lokasiRtf)) {
                return $lokasiRtf;
            } else {
                return NULL;
            }
        }
    }
}

if (!function_exists('exportExcel')) {
    function exportExcel($spreadsheet = NULL, $filename = NULL, $modeDefault = TRUE, $awal = 7, $modeDokumen = TRUE)
    {
        $CI = &get_instance(); //? Pengganti $this
        $CI->load->model("Pamong_model", "pamong");        

        $styleBorder = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'alignment' => [
                'vertical'      => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText'      => TRUE
            ]
        ];

        $styleCenter = [
            'alignment' => [
                'horizontal'    => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'      => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];

        $keteranganDesa = ($CI->userData->jenis_desa == "desa" ? "Desa " : "Kelurahan ") . $CI->userData->nama_desa;
        $keteranganDesa .= ", Kec. " . $CI->userData->kecamatan_desa;
        $keteranganDesa .= ", " . $CI->userData->kabupaten_desa;

        $worksheet      = $spreadsheet->getActiveSheet();

        $worksheet->getCell('A2')->setValue($keteranganDesa);

        $worksheet->getStyle('A' . $awal . ':' .
            $worksheet->getHighestDataColumn() .
            $worksheet->getHighestRow())
            ->applyFromArray($styleBorder);

        //TODO : AMBIL KOLOM DAN BARIS TERAKHIR
        $kolomTerakhir = $worksheet->getHighestDataColumn();
        $barisTerakhir = $worksheet->getHighestRow();

        if ($modeDokumen) {
            //TODO : SET TEMPAT DAN TANGGAL
            $worksheet->getCell(
                chr(ord($kolomTerakhir) - 1) .
                    ($barisTerakhir + 2)
            )->setValue(
                $CI->userData->nama_desa . ", " .
                    longdate_indo(date("Y-m-d"))
            );
        } else {
            //TODO : SET TEMPAT DAN TANGGAL
            $worksheet->getCell(
                chr(ord($kolomTerakhir)) .
                    ($barisTerakhir + 2)
            )->setValue(
                $CI->userData->nama_desa . ", " .
                    longdate_indo(date("Y-m-d"))
            );        
        }

        //TODO : Mode Desa
        if ($modeDefault) {
            if ($modeDokumen) {
                $worksheet->getCell(
                    chr(ord($kolomTerakhir) - 1) .
                        ($barisTerakhir + 3)
                )->setValue("Sekretaris " . ($CI->userData->jenis_desa == "desa" ? "Desa " : "Kelurahan "));
            } else {
                $worksheet->getCell(
                    chr(ord($kolomTerakhir)) .
                        ($barisTerakhir + 3)
                )->setValue("Sekretaris " . ($CI->userData->jenis_desa == "desa" ? "Desa " : "Kelurahan " ));
            }
            $worksheet->getCell("B" . ($barisTerakhir + 3))
                ->setValue("Mengetahui,");

            $worksheet->getCell("B" . ($barisTerakhir + 4))
                ->setValue("Kepala " . ($CI->userData->jenis_desa == "desa" ? "Desa " : "Kelurahan " ) . $CI->userData->nama_desa);


            $kades  = $CI->pamong->findPamong("kepala_desa") ? $CI->pamong->findPamong("kepala_desa")->nama_pamong : "............................";
            $sekdes = $CI->pamong->findPamong("sekretaris_desa") ? $CI->pamong->findPamong("sekretaris_desa")->nama_pamong : "............................";

            $worksheet->getCell("B" . ($barisTerakhir + 8))->setValue($kades);
            $worksheet->getStyle("B" . ($barisTerakhir + 8))->getFont()->setBold(true);
            $worksheet->getStyle("B" . ($barisTerakhir + 8))->getFont()->setUnderline(true);

            if ($modeDokumen) {
                $worksheet->getCell(
                    chr(ord($kolomTerakhir) - 1) .
                        ($barisTerakhir + 8)
                )->setValue($sekdes);
                $worksheet->getStyle(chr(ord($kolomTerakhir) - 1) . ($barisTerakhir + 8))->getFont()->setBold(true);
                $worksheet->getStyle(chr(ord($kolomTerakhir) - 1) . ($barisTerakhir + 8))->getFont()->setUnderline(true);
            } else {
                $worksheet->getCell(
                    chr(ord($kolomTerakhir)) .
                        ($barisTerakhir + 8)
                )->setValue($sekdes);
                $worksheet->getStyle(chr(ord($kolomTerakhir)) . ($barisTerakhir + 8))->getFont()->setBold(true);
                $worksheet->getStyle(chr(ord($kolomTerakhir)) . ($barisTerakhir + 8))->getFont()->setUnderline(true);
            }           
        } else {
            //TODO : Tambahin kalo mode BPD
            $worksheet->getCell("B" . ($barisTerakhir + 3))->setValue("Ketua BPD");
            $worksheet->getCell("B" . ($barisTerakhir + 7))->setValue("............................");

            $worksheet->getCell(
                chr(ord($kolomTerakhir) - 1) .
                    ($barisTerakhir + 3)
            )->setValue("Sekretaris");

            $worksheet->getCell(
                chr(ord($kolomTerakhir) - 1) .
                    ($barisTerakhir + 7)
            )->setValue("............................");
        }

        //TODO : BIAR RATA TENGAH SEMUA TANDATANGANYA
        $worksheet->getStyle('A' . ($barisTerakhir + 1) . ':' .
            $worksheet->getHighestDataColumn() .
            $worksheet->getHighestRow())
            ->applyFromArray($styleCenter);

        //TODO : WRITE AND DOWNLOAD
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
