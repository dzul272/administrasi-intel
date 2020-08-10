<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Keterangan Usaha</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Keterangan Usaha</h4>
                    </div>
                    <div class="card-body">
                          <form action="<?= $form_action ?>" method="POST">
                            <?php 
                            include 'form-nik.php';
                            include 'form-nomor-surat.php'; 
                            ?>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Bidang Usaha</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" name="USAHABIDANG" id="bidang_usaha" placeholder="Bidang Usaha" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Jenis Usaha</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" name="JENISUSAHA" id="jenis_usaha" placeholder="Jenis Usaha" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Tahun Mulai Usaha</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" name="TAHUNUSAHA" id="tahun_mulai_usaha" placeholder="Tahun Mulai Usaha" onkeyup="tahun()" required>
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
    <script type="text/javascript">
        function tahun() {
            var element = document.getElementById('tahun_mulai_usaha');
            element.value = element.value.replace(/[^0-9]/, '');
        };
    </script>