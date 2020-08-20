<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('website/css/bootstrap.min.css') ?>">
    <title>Export D.IN.2</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
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
                    D.IN.1
                </h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-center" style="margin-top: 20px">
            <h5 style="font-family: Times New Roman;font-weight: bold; padding-bottom:0px;">
                DATA PETA <br>
                IDEOLOGI, POLITIK, PERTAHANAN DAN KEAMANAN / <br>
                SOSIAL BUDAYA DAN KEMASYARAKATAN / <br>
                EKONOMI DAN KEUANGAN / <br>
                PENGAMANAN PEMBANGUNAN STRATEGIS / <br>
                TEKONOLOGI INFORMASI DAN PRODUKSI INTELIJEN <br>
            </h5>            
        </div>
    </div>

    <div class="row">
        <div class="table" style="margin-top: 20px;">
            <table class="table table-bordered" style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th style="padding: 5px;" class="text-center" width="5%">NO</th>
                        <th style="padding: 5px;" class="text-center">SIMBOL SEKTOR</th>
                        <th style="padding: 5px;" class="text-center">SIABIDIBAM / 5 W + 1 H</th>
                        <th style="padding: 5px;" class="text-center">KETERANGAN</th>
                    </tr>
                    <tr>
                        <th style="padding: 0px;" class="text-center" width="5%">1</th>
                        <th style="padding: 0px;" class="text-center">2</th>
                        <th style="padding: 0px;" class="text-center">3</th>
                        <th style="padding: 0px;" class="text-center">4</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $l) : ?>
                        <tr>
                            <td style="padding: 5px;" class="text-center"><?= $l->no_urut ?></td>
                            <td  style="padding: 5px;" class="text-center">
                                <img src="<?= $l->din2s6->simbol ?>" height="60px" alt="<?= $l->din2s6->sektor ?>">
                            </td>
                            <td style="padding: 5px;">
                                <?= $l->siabidibam ?>
                            </td>
                            <td style="padding: 5px;">
                                <?= $l->keterangan?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>