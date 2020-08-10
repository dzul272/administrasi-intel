<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Keterangan Tanah</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Keterangan Tanah</h4>
                    </div>
                    <div class="card-body">
                          <form action="<?= $form_action ?>" method="POST">
                            <?php 
                            include 'form-nik.php';
                            include 'form-nomor-surat.php'; 
                            ?>
                             
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Blok / Persil</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="BLOK" id="blok" placeholder="Blok" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text" name="PERSIL" id="persil" placeholder="Persil" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Luas Tanah / Luas Bangunan</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group mb-1" style="width: 100%;">
                                                <input type="text" class="form-control" name="LUASTANAH" id="luas_tanah" placeholder="Luas Tanah" required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><b>M<sup>2</sup></b></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-1" style="width: 100%;">
                                                <input type="text" class="form-control" name="LUASBANGUNAN" id="luas_bangunan" placeholder="Luas Bangunan" required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><b>M<sup>2</sup></b></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Keterangan (Opsional-Boleh Dikosongi)</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="3" name="KETERANGAN_TNH" id="keterangan" placeholder="Keterangan"></textarea>
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
