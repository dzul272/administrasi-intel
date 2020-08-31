<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('website/css/bootstrap.min.css') ?>">
    <title>Export D.IN.8 - Penyuluhan Hukum </title>
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
                    D.IN.8
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
                FOTO DOKUMENTASI <br>
                KEGIATAN PENYULUHAN HUKUM
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="table" style="margin-top: 20px;">
            <table class="table table-bordered" style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th style="padding: 5px; width: 5% " class="align-middle text-center">No</th>
                        <th style="padding: 5px; width:15%;" class="align-middle text-center">Jenis</th>
                        <th style="padding: 5px; width:20%;" class="align-middle text-center">Triwulan I</th>
                        <th style="padding: 5px; width:20%;" class="align-middle text-center">Triwulan II</th>
                        <th style="padding: 5px; width:20%;" class="align-middle text-center">Triwulan III</th>
                        <th style="padding: 5px; width:20%;" class="align-middle text-center">Triwulan IV</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $max; $i++) : ?>
                        <tr>
                            <td class="text-center align-top" rowspan="3" style="padding: 4px;"><?= ($i + 1) ?></td>
                            <td class="align-top" style="padding: 4px;">Kegiatan</td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan1"][$i]) ? $data["triwulan1"][$i]->din7->materi_tema : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan2"][$i]) ? $data["triwulan2"][$i]->din7->materi_tema : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan3"][$i]) ? $data["triwulan3"][$i]->din7->materi_tema : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan4"][$i]) ? $data["triwulan4"][$i]->din7->materi_tema : ""  ?></td>
                        </tr>
                        <tr>
                            <td class="align-top" style="padding: 4px;">Foto / Video</td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan1"][$i]) ? $data["triwulan1"][$i]->nama_file : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan2"][$i]) ? $data["triwulan2"][$i]->nama_file : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan3"][$i]) ? $data["triwulan3"][$i]->nama_file : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan4"][$i]) ? $data["triwulan4"][$i]->nama_file : ""  ?></td>
                        </tr>
                        <tr>
                            <td class="align-top" style="padding: 4px;">Keterangan</td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan1"][$i]) ? $data["triwulan1"][$i]->keterangan : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan2"][$i]) ? $data["triwulan2"][$i]->keterangan : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan3"][$i]) ? $data["triwulan3"][$i]->keterangan : ""  ?></td>
                            <td class="align-top" style="padding: 4px;"><?= isset($data["triwulan4"][$i]) ? $data["triwulan4"][$i]->keterangan : ""  ?></td>
                        </tr>                       
                    <?php endfor ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>