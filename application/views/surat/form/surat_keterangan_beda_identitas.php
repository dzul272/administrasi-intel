
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Keterangan Beda Identitas</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Keterangan Beda Identitas</h4>
                    </div>
                    <div class="card-body">
                          <form action="<?= $form_action ?>" method="POST">
                            <?php 
                            include 'form-nik.php';
                            include 'form-nomor-surat.php';
                            ?>

                            <div class="form-group row">
                                <label for="example-email-input" class="col-12 col-form-label"><b>Isi data dibawah ini dengan data yang benar</b></label>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">NIK</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" value="" name="NIKBENAR" id="nik_baru" onblur="cek_nik_baru();" maxlength="16" onkeyup="validate();" placeholder="NIK Baru" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Nama</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" value="" name="NAMABENAR" id="nama_baru" placeholder="Nama Lengkap" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Tempat Lahir / Tanggal Lahir</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="BENARTEMPATLAHIR" id="tempat_lahir_baru" placeholder="Tempat Lahir" required>
                                       </div>
                                        <div class="col-md-4">
                                            <div class="input-group" style="width: 100%;">
                                                <input type="text" class="form-control tanggal_lahir_baru" id="datepicker-autoclose" name="BENARTGLLAHIR" placeholder="mm/dd/yyyy" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                       </div>
                                   </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Status Perkawinan</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <select class="select2 form-control custom-select" style="width: 100%;" name="BENARSTATUSKAWIN" id="status_kawin_baru" required>
                                                <option value="">Pilih Status Perkawinan</option>
                                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                                <option value="KAWIN">SUDAH KAWIN</option>
                                            </select>
                                       </div>
                                        <div class="col-md-4">
                                            <select class="select2 form-control custom-select" style="width: 100%;" name="BENARJENISKELAMIN" id="jk_baru" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                                <option value="PEREMPUAN">PEREMPUAN</option>
                                            </select>
                                       </div>
                                   </div>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Warga Indonesia / Agama</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <select class="select2 form-control custom-select" style="width: 100%;" name="WARGANEGARABENAR" id="warga_negara_baru" required>
                                                <!-- <option value="">Pilih Kewarganegaraan</option> -->
                                                <option value="INDONESIA">WNI</option>
                                                <option value="WARGA NEGARA ASING">WNA</option>
                                                <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                           <select class="select2 form-control custom-select" style="width: 100%;" name="BENARAGAMA" id="agama_baru" required>
                                                <option value="">Pilih Agama</option>
                                                <?php foreach (daftar_agama() as $agama) : ?>
                                                    <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                       </div>
                                   </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Pekerjaan</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" value="" name="BENARPEKERJAAN" id="pekerjaan_baru" placeholder="Pekerjaan" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Alamat / RT / RW</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                                <input type="text" class="form-control" name="BENARALAMATTINGGAL" id="alamattinggal_baru" placeholder="Alamat Tempat Tinggal" required>
                                       </div>
                                       <div class="col-md-2">
                                           <div class="input-group mb-1" style="width: 100%;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><b>RT </b></span>
                                                </div>
                                                <input type="text" class="form-control" name="RTBENAR" id="rt_baru" onkeyup="validate()" required>
                                            </div>
                                       </div>
                                        <div class="col-md-2">
                                            <div class="input-group mb-1" style="width: 100%;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><b>RW </b></span>
                                                </div>
                                                <input type="text" class="form-control" name="RWBENAR" id="rw_baru" onkeyup="validate()" required>
                                            </div>
                                       </div>
                                   </div>
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="example-email-input" class="col-3 col-form-label">Perbedaan</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" value="" name="perbedaan" id="perbedaan">
                                </div>
                            </div> -->



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
    <script>
        function cek_nik_baru(){
            if ($('#nik_baru').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            }
        }
    </script>