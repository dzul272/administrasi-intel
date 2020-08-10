<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Keterangan Domisili Lembaga</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Keterangan Domisili Lembaga</h4>
                    </div>
                    <div class="card-body">
                          <form action="<?= $form_action ?>" method="POST">
                            <?php 
                            include 'form-nik.php';
                            include 'form-nomor-surat.php';
                            ?>

                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Nama Lembaga</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" value="" name="NAMA_LEMBAGA" id="nama_lembaga" placeholder="Nama Lembaga" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Alamat Lembaga</label>
                                <div class="col-9">
                                   <div class="row">
                                    <div class="col-md-8">
                                        <div class="input-group mb-1" style="width: 100%;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b><?= ce($this->userData->jenis_desa) ?> </b></span>
                                            </div>
                                            <input type="text" class="form-control" name="DESA" id="desa" required>
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                       <div class="input-group mb-1" style="width: 100%;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>RT </b></span>
                                            </div>
                                            <input type="text" class="form-control" name="RT_LEMBAGA" id="rt" onkeyup="validate()" required>
                                        </div>
                                   </div>
                                    <div class="col-md-2">
                                        <div class="input-group mb-1" style="width: 100%;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>RW </b></span>
                                            </div>
                                            <input type="text" class="form-control" name="RW_LEMBAGA" id="rw" onkeyup="validate()" required>
                                        </div>
                                   </div>
                               </div>
                            </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Keterangan (Opsional-Boleh Dikosongi)</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="3" name="KETERANGAN_DL" id="keperluan" placeholder="Keterangan"></textarea>
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
