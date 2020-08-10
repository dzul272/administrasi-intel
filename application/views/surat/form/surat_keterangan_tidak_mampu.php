<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Keterangan Tidak Mampu</h4>
            </div>
         
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- <h6 class="card-title">Nomor Surat Terakhir : 400/1/Ds. Beji/2019 </h6> -->
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="mb-0 text-white">Form Surat Keterangan Tidak Mampu</h4>
                    </div>
                    <div class="card-body">
                          <form action="<?= $form_action ?>" method="POST">
                            <?php 
                            include 'form-nik.php';
                            include 'form-nomor-surat.php';
                            ?>

                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Keterangan (Opsional-Boleh Dikosongi)</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="3" name="KETERANGAN_SKTM" id="keterangan"></textarea>
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
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->


