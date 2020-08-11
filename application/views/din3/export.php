<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('website/css/bootstrap.min.css') ?>">
    <title>Export D.IN.<?= $jenis_din ?></title>
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
                    D.IN.<?= $jenis_din ?>
                </h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-center" style="margin-top: 20px">
            <h5 style="font-family: Times New Roman;font-weight: bold; padding-bottom:0px;">
                SIMBOL SEKTOR<br>
                <?= strtoupper($keterangan_din) ?>
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="table" style="margin-top: 20px;">
            <table class="table table-bordered" style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th style="padding: 5px;" class="text-center" width="5%">NO</th>
                        <th style="padding: 5px;" class="text-center">SIMBOL</th>
                        <th style="padding: 5px;" class="text-center">SEKTOR</th>
                        <th style="padding: 5px;" class="text-center">KET</th>
                    </tr>
                    <tr>
                        <th style="padding: 0px;" class="text-center" width="5%">1</th>
                        <th style="padding: 0px;" class="text-center">2</th>
                        <th style="padding: 0px;" class="text-center">3</th>
                        <th style="padding: 0px;" class="text-center">4</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($list) : ?>
                        <?php $no = 1;
                        foreach ($list as $l) : ?>
                            <tr>
                                <td style="padding: 5px;" class="text-center"><?= $no++ ?></td>
                                <td style="padding: 5px;" class="text-center">
                                    <img src="<?= $l['simbol'] ?>" height="60px" alt="<?= $l["sektor"] ?>">
                                </td>
                                <td style="padding: 5px;">
                                    <?= $l["sektor"] ?>
                                </td>
                                <td style="padding: 5px;">
                                    <?= $l["keterangan"] ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>