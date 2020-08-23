<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('website/css/bootstrap.min.css') ?>">
    <title>Export D.IN.7 - Jaksa Masuk Sekolah </title>
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

                </h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-center" style="margin-top: 20px">
            <h5 style="font-family: Times New Roman;font-weight: bold; padding-bottom:0px;">
                DATA HASIL PELAKSANAAN KEGIATAN PROGRAM JAKSA MASUK SEKOLAH (JMS) <br>
                KEJAKSAAN NEGERI PURWOKERTO <br>
                TAHUN <?= $this->input->get("tahun") ?>
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="table" style="margin-top: 20px;">
            <table class="table table-bordered" style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th style="padding: 10px;" rowspan="2" class="align-middle text-center">No</th>
                        <th style="padding: 10px;" rowspan="2" class="align-middle text-center">Kejari</th>
                        <th style="padding: 10px;" colspan="6" class="align-middle text-center">Pelaksanaan Program Jaksa Masuk Sekolah (JMS) Secara Langsung</th>
                        <th style="padding: 10px;" colspan="4" class="align-middle text-center">Pelaksanaan Program Jaksa Masuk Sekolah (JMS) Secara Tidak Langsung</th>
                    </tr>
                    <tr>
                        <th style="padding: 10px;" class="align-middle text-center">Sasaran Peserta Program JMS</th>
                        <th style="padding: 10px;" class="align-middle text-center">Materi</th>
                        <th style="padding: 10px;" class="align-middle text-center">Jumlah Peserta</th>
                        <th style="padding: 10px;" class="align-middle text-center">Waktu Pelaksanaan kegiatan</th>
                        <th style="padding: 10px;" class="align-middle text-center">Tempat / Lokasi Kegiatan</th>
                        <th style="padding: 10px;" class="align-middle text-center">Ket</th>
                        <th style="padding: 10px;" class="align-middle text-center">Media Yang Digunakan</th>
                        <th style="padding: 10px;" class="align-middle text-center">Materi</th>
                        <th style="padding: 10px;" class="align-middle text-center">Waktu Pelaksanaan Kegiatan</th>
                        <th style="padding: 10px;" class="align-middle text-center">Ket</th>
                    </tr>
                    <tr>
                        <th class="align-middle text-center">1</th>
                        <th class="align-middle text-center">2</th>
                        <th class="align-middle text-center">3</th>
                        <th class="align-middle text-center">4</th>
                        <th class="align-middle text-center">5</th>
                        <th class="align-middle text-center">6</th>
                        <th class="align-middle text-center">7</th>
                        <th class="align-middle text-center">8</th>
                        <th class="align-middle text-center">9</th>
                        <th class="align-middle text-center">10</th>
                        <th class="align-middle text-center">11</th>
                        <th class="align-middle text-center">12</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data) : $no = 1; ?>
                        <?php foreach ($data as $d) : ?>
                            <tr>
                                <td class="text-center align-middle" style="padding: 4px;"><?= $no++ ?></td>
                                <td class="text-center align-top" style="padding: 5px;">PWT</td>
                                <td class="text-center align-top" style="padding: 5px;"><?= $d->peserta ?></td>
                                <td class="text-center align-top" style="padding: 5px;"><?= $d->materi_tema ?></td>
                                <td class="text-center align-top" style="padding: 5px;"><?= $d->jml_peserta ?> Orang</td>
                                <td class="text-center align-top" style="padding: 5px;"><?= $d->waktu_indo ?></td>
                                <td class="text-center align-top" style="padding: 5px;"><?= $d->tempat_detail . " " . $d->kelurahan->nama . ", Kec. " . $d->kecamatan->nama   ?></td>
                                <td class="text-center align-top" style="padding: 5px;">Triwulan <?= $d->triwulan ?></td>
                                <td class="text-center align-top" style="padding: 5px;"><?= $d->media ?></td>
                                <td class="text-center align-top" style="padding: 5px;"><?= $d->materi ?></td>
                                <td class="text-center align-top" style="padding: 5px;"><?= $d->waktu_pelaksanaan_indo ?></td>
                                <td class="text-center align-top" style="padding: 5px;"><?= $d->keterangan ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>

        <div class="row" style="height: 10px;">
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
        </div>
    </div>


</body>

</html>