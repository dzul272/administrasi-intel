Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Keterangan Kematian</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Keterangan Kematian</h4>
                    </div>
                    <div class="card-body">
                          <form action="<?= $form_action ?>" method="POST">
                            <?php 
                            include 'form-nik.php';
                            include 'form-nomor-surat.php';
                            ?>

                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Hari / Tanggal / Pukul Kematian</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input class="form-control" type="text" value="" name="HARI_KEMATIAN" id="hari" readonly required>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group" style="width: 100%;">
                                                <input type="text" class="form-control" id="datepicker-autoclose11" name="TGL_KEMATIAN" placeholder="mm/dd/yyyy" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-1" style="width: 100%;">
                                                <input type="time" class="form-control" name="PUKUL" id="pukul" required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><b> WIB</b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Penyebab Kematian</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" name="PENYEBAB" id="penyebab" required>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Tempat Kematian</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" name="TEMPAT_KEMATIAN" id="tempat_kematian" required>
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
    <!-- ==============================================================