<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Pengantar KTP Elektronik</h4>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="mb-0 text-white">Form Surat Keterangan KTP Elektronik</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= $form_action ?>" method="POST">
                            <?php
                            include 'form-nik.php';
                            include 'form-nomor-surat.php';
                            ?>

                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Keperluan (Opsional - Boleh Dikosongi)</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="3" name="KEPERLUAN_KTP" id="keperluan"></textarea>
                                </div>
                            </div>

                            <?php
                            include 'form-button.php';
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>