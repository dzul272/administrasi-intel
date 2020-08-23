<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('website/css/bootstrap.min.css') ?>">
    <title>Export D.IN.7 - Penyuluhan Hukum </title>
</head>

<body style="font-family: Times New Roman">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-left col-xs-6" style="margin-top: 0px; padding-left: 0px;">
                <h5 style="font-size: 12px; font-family: Times New Roman;font-weight: bold; padding-bottom:0px;">
                    <u>
                        KEJAKSAAN NEGERI PURWOKERTO
                    </u>
                </h5>
            </div>
            <div class="text-right" style="margin-top: 0px">
                <h5 style="font-size: 12px; font-family: Times New Roman;font-weight: bold; padding-bottom:0px;">
                    D.IN.7
                </h5>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-2">
            <img src="<?= asset("kejari/img/logo.png") ?>" height="60px" style="margin-left: 20px; margin-top: 10px;" alt="Logo Kejari">
        </div>
        <div class="text-center" style="margin-top: 20px">
            <h5 style="font-family: Times New Roman;font-weight: bold; padding-bottom:0px; font-size:large">
                PELAKSANAAN KEGIATAN <br>
                PENYULUHAN HUKUM
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="table" style="margin-top: 20px;">
            <table class="table table-bordered" style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th style="padding: 5px;" class="align-middle text-center">No</th>
                        <th style="padding: 5px;" class="align-middle text-center">Jenis</th>
                        <th style="padding: 5px;" class="align-middle text-center">Triwulan I</th>
                        <th style="padding: 5px;" class="align-middle text-center">Triwulan II</th>
                        <th style="padding: 5px;" class="align-middle text-center">Triwulan III</th>
                        <th style="padding: 5px;" class="align-middle text-center">Triwulan IV</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $max; $i++) : ?>
                        <tr>
                            <td class="text-center align-top" rowspan="4" style="padding: 4px;"><?= ($i + 1) ?></td>
                            <td class="align-top" style="padding: 4px;">Tema Kegiatan</td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan1"][$i]) ? $data["triwulan1"][$i]->materi_tema : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan2"][$i]) ? $data["triwulan2"][$i]->materi_tema : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan3"][$i]) ? $data["triwulan3"][$i]->materi_tema : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan4"][$i]) ? $data["triwulan4"][$i]->materi_tema : ""  ?></td>
                        </tr>
                        <tr>
                            <td class="align-top" style="padding: 4px;">Waktu</td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan1"][$i]) ? $data["triwulan1"][$i]->waktu_indo : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan2"][$i]) ? $data["triwulan2"][$i]->waktu_indo : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan3"][$i]) ? $data["triwulan3"][$i]->waktu_indo : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan4"][$i]) ? $data["triwulan4"][$i]->waktu_indo : ""  ?></td>
                        </tr>
                        <tr>
                            <td class="align-top" style="padding: 4px;">Tempat</td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan1"][$i]) ? $data["triwulan1"][$i]->tempat_detail . " " . $data["triwulan1"][$i]->kelurahan->nama . ", Kec. " . $data["triwulan1"][$i]->kecamatan->nama   : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan2"][$i]) ? $data["triwulan2"][$i]->tempat_detail . " " . $data["triwulan2"][$i]->kelurahan->nama . ", Kec. " . $data["triwulan2"][$i]->kecamatan->nama   : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan3"][$i]) ? $data["triwulan3"][$i]->tempat_detail . " " . $data["triwulan3"][$i]->kelurahan->nama . ", Kec. " . $data["triwulan3"][$i]->kecamatan->nama   : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan4"][$i]) ? $data["triwulan4"][$i]->tempat_detail . " " . $data["triwulan4"][$i]->kelurahan->nama . ", Kec. " . $data["triwulan4"][$i]->kecamatan->nama   : ""  ?></td>
                        </tr>
                        <tr>
                            <td class="align-top" style="padding: 4px;">Jumlah Peserta</td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan1"][$i]) ? $data["triwulan1"][$i]->jml_peserta . " Orang" : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan2"][$i]) ? $data["triwulan2"][$i]->jml_peserta . " Orang" : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan3"][$i]) ? $data["triwulan3"][$i]->jml_peserta . " Orang" : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan4"][$i]) ? $data["triwulan4"][$i]->jml_peserta . " Orang" : ""  ?></td>
                        </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </div>

        <!-- <div class="row" style="height: 10px;">
            <div class="col-xs-12">
                <div class="text-left col-xs-6" style="margin-top: 0px; padding-left: 0px;;">
                    <h5 style="font-size: 12px; font-family: Times New Roman;font-weight: bold; padding-bottom:0px;">

                    </h5>
                </div>
                <div class="text-right" style="margin-top: 0px;">
                    <div class="text-center" style="font-size: 12px; font-family: Times New Roman; padding-bottom:0px;">
                        AN. KEPALA KEJAKSAAN NEGERI PURWOKERTO <br>
                        KEPALA SEKSI INTELIJEN <br> <br> <br><br>
                        <b><u>SURAYADI SEMBIRING, SH. MH.</u></b> <br>
                        JAKSA MUDA NIP 19751110 200012 1 001
                    </div>
                </div>
            </div>
        </div> -->
    </div>


</body>

</html>