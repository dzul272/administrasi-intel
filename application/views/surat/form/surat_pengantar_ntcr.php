<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Keterangan Untuk Nikah</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Keterangan Untuk Nikah</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= $form_action ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php
                                    include 'form-nomor-surat.php';
                                    ?>
                                </div>
                            </div>

                            <!-- MEMPELAI PRIA -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- DATA CALON PASANGAN PRIA -->
                                    <div class="form-group row mb-0">
                                        <div class="card-header bg-info col-12">
                                            <h5 class="mb-0 text-white">A. Calon Pasangan Pria</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- BIODATA PASANGAN PRIA -->
                            <div class="row" id="data_pasangan_pria">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">A.1 Data Calon Pasangan Pria</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_pria" id="cek_nik_pria" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP Pria" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_pria" type="button" onclick="cari_pria();"><i class="fa fa-search"></i> Cari NIK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 float-right">
                                                    <button type="button" class="btn waves-effect waves-light btn-success" style="width: 100%;" onclick="manual()">Input Manual</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_pria" id="nama_pria" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_pria" id="tempat_lahir_pria" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_pria" id="datepicker-autoclose" name="tgl_kelahiran_pria" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control" id="tgl_kelahiran3_pria" name="tgl_kelahiran_pria">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_pria" name="ALAMAT" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT" id="rt_pria" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW" id="rw_pria" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Agama/ Warganegara </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_pria" id="pekerjaan_pria" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="agama_pria" id="agama_pria" disabled>
                                                        <option value="">Pilih Agama</option>
                                                        <?php foreach (daftar_agama() as $agama) : ?>
                                                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="agama_pria" id="agama3_pria">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_pria" id="warga_negara_pria" disabled>
                                                        <option value="">Pilih Warganegara</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_pria" id="warga_negara3_pria" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Status Perkawinan</label>
                                        <div class="col-9">
                                            <select class="select2 form-control custom-select" style="width: 100%;" name="status_kawin_pria" id="status_kawin_pria" required>
                                                <option value="">Pilih Status Perkawinan</option>
                                                <option value="jejaka">Jejaka</option>
                                                <option value="duda">Duda</option>
                                                <option value="beristri">Beristri</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="div_beristri" style="display: none;">
                                        <label for="example-search-input" class="col-3 col-form-label">Jika beristri, istri ke-</label>
                                        <div class="col-9" id="div_beristri2" style="display: none;">
                                            <input class="form-control" type="text" value="" name="istri_keberapa" id="istri_keberapa" placeholder="Istri Keberapa">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA AYAH PRIA -->
                            <div class="row" id="data_ayah_pria">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">A.2 Data Ayah Pasangan Pria</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ayah" id="cek_nik_ayah" maxlength="16" placeholder="Masukkan Nomor KTP Ayah Pria" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ayah" type="button" onclick="cari_ayah_pria()"><i class="fa fa-search"></i> Cari NIK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 float-right">
                                                    <button type="button" class="btn waves-effect waves-light btn-success" style="width: 100%;" onclick="manual2()">Input Manual</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap/ Bin</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_ayah" id="nama_ayah" placeholder="Nama Lengkap Ayah Pria" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="bin_ayah" id="bin_ayah" placeholder="Bin Ayah Pria" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ayah" id="tempat_lahir_ayah" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ayah" id="datepicker-autoclose2" name="tgl_kelahiran_ayah" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_ayah" id="tgl_kelahiran3_ayah">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ayah" name="ALAMAT_AYAH" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_AYAH" id="rt_ayah" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_AYAH" id="rw_ayah" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Agama/ Warganegara </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_ayah" id="pekerjaan_ayah" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="agama_ayah" id="agama_ayah" disabled>
                                                        <option value="">Pilih Agama</option>
                                                        <?php foreach (daftar_agama() as $agama) : ?>
                                                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="agama_ayah" id="agama3_ayah">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_ayah" id="warga_negara_ayah" disabled>
                                                        <option value="">Pilih Warganegara</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_ayah" id="warga_negara3_ayah" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- BIODATA IBU PRIA -->
                            <div class="row" id="data_ibu_pria">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">A.3 Data Ibu Pasangan Pria</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ibu" id="cek_nik_ibu" maxlength="16" placeholder="Masukkan Nomor KTP Ibu Pria" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ibu" type="button" onclick="cari_ibu_pria();"><i class="fa fa-search"></i> Cari NIK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 float-right">
                                                    <button type="button" class="btn waves-effect waves-light btn-success" style="width: 100%;" onclick="manual3()">Input Manual</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap/ Binti</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_ibu" id="nama_ibu" placeholder="Nama Lengkap Ibu Pria" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="bin_ibu" id="bin_ibu" placeholder="Binti Ibu Pria" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ibu" id="tempat_lahir_ibu" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ibu" id="datepicker-autoclose3" name="tgl_kelahiran_ibu" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_ibu" id="tgl_kelahiran3_ibu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ibu" name="ALAMAT_IBU_PRIA" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_IBU_PRIA" id="rt_ibu_pria" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_IBU_PRIA" id="rw_ibu_pria" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Agama/ Warganegara </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_ibu" id="pekerjaan_ibu" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="agama_ibu" id="agama_ibu" disabled>
                                                        <option value="">Pilih Agama</option>
                                                        <?php foreach (daftar_agama() as $agama) : ?>
                                                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="agama_ibu" id="agama3_ibu">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_ibu" id="warga_negara_ibu" disabled>
                                                        <option value="">Pilih Warganegara</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_ibu" id="warga_negara3_ibu" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- BIODATA ISTRI TERDAHULU PRIA -->
                            <div class="row" id="data_istri_terdahulu_pria">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">A.4 Data Istri Terdahulu</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_istri_terdahulu" maxlength="16" id="cek_nik_istri_terdahulu" placeholder="Masukkan Nomor KTP Istri Terdahulu" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_istri_terdahulu" type="button" onclick="cari_istri_terdahulu();"><i class="fa fa-search"></i> Cari NIK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 float-right">
                                                    <button type="button" class="btn waves-effect waves-light btn-success" style="width: 100%;" onclick="manual4()">Input Manual</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap/ Binti</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_istri_terdahulu" id="nama_istri_terdahulu" placeholder="Nama Lengkap Istri Terdahulu" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="bin_istri_terdahulu" id="bin_istri_terdahulu" placeholder="Binti" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_istri_terdahulu" id="tempat_lahir_istri_terdahulu" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_istri_terdahulu" id="datepicker-autoclose4" name="tgl_kelahiran_istri_terdahulu" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_istri_terdahulu" id="tgl_kelahiran3_istri_terdahulu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_istri_terdahulu" name="ALAMAT_ISTRI_TERDAHULU" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_ISTRI_TERDAHULU" id="rt_istri_terdahulu" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_ISTRI_TERDAHULU" id="rw_istri_terdahulu" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Agama/ Warganegara </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_istri_terdahulu" id="pekerjaan_istri_terdahulu" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="agama_istri_terdahulu" id="agama_istri_terdahulu" disabled>
                                                        <option value="">Pilih Agama</option>
                                                        <?php foreach (daftar_agama() as $agama) : ?>
                                                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="agama_istri_terdahulu" id="agama3_istri_terdahulu">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_istri_terdahulu" id="warga_negara_istri_terdahulu" disabled>
                                                        <option value="">Pilih Warganegara</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_istri_terdahulu" id="warga_negara3_istri_terdahulu" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Meninggal Dunia Pada Tanggal / Tempat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_meninggal_istri_terdahulu" id="datepicker-autoclose5" name="tgl_meninggal_istri_terdahulu" placeholder="mm/dd/yyyy">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <input class="form-control" type="text" value="" name="tempat_meninggal_istri_terdahulu" id="tempat_meinggal_istri_terdahulu" placeholder="Tempat Meninggal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- MEMPELAI WANITA -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- DATA CALON PASANGAN PRIA -->
                                    <div class="form-group row mb-0">
                                        <div class="card-header bg-info col-12">
                                            <h5 class="mb-0 text-white">B. Calon Pasangan Wanita</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- BIODATA PASANGAN WANITA -->
                            <div class="row" id="data_pasangan_wanita">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">B.1 Data Calon Pasangan Wanita</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_wanita" id="cek_nik_wanita" maxlength="16" placeholder="Masukkan Nomor KTP Wanita" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_wanita" type="button" onclick="cari_wanita();"><i class="fa fa-search"></i> Cari NIK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 float-right">
                                                    <button type="button" class="btn waves-effect waves-light btn-success" style="width: 100%;" onclick="manual5()">Input Manual</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_wanita" id="nama_wanita" placeholder="Nama Lengkap Wanita" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_wanita" id="tempat_lahir_wanita" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_wanita" id="datepicker-autoclose6" name="tgl_kelahiran_wanita" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_wanita" id="tgl_kelahiran3_wanita">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_wanita" name="ALAMAT_WANITA" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_WANITA" id="rt_wanita" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_WANITA" id="rw_wanita" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Agama/ Warganegara </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_wanita" id="pekerjaan_wanita" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="agama_wanita" id="agama_wanita" disabled>
                                                        <option value="">Pilih Agama</option>
                                                        <?php foreach (daftar_agama() as $agama) : ?>
                                                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="agama_wanita" id="agama3_wanita">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_wanita" id="warga_negara_wanita" disabled>
                                                        <option value="">Pilih Warganegara</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_wanita" id="warga_negara3_wanita" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Status Perkawinan</label>
                                        <div class="col-9">
                                            <select required class="select2 form-control custom-select" style="width: 100%;" name="status_kawin_wanita" id="status_kawin_wanita">
                                                <option value="">Pilih Status Perkawinan</option>
                                                <option value="perawan">Perawan</option>
                                                <option value="janda">Janda</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA AYAH WANITA -->
                            <div class="row" id="data_ayah_wanita">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">B.2 Data Ayah Pasangan Wanita</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ayah_wanita" maxlength="16" id="cek_nik_ayah_wanita" placeholder="Masukkan Nomor KTP Ayah Wanita" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ayah_wanita" type="button" onclick="cari_ayah_wanita();"><i class="fa fa-search"></i> Cari NIK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 float-right">
                                                    <button type="button" class="btn waves-effect waves-light btn-success" style="width: 100%;" onclick="manual6()">Input Manual</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap/ Bin</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_ayah_wanita" id="nama_ayah_wanita" placeholder="Nama Lengkap Ayah Wanita" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="bin_ayah_wanita" id="bin_ayah_wanita" placeholder="Bin Ayah Wanita" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ayah_wanita" id="tempat_lahir_ayah_wanita" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ayah_wanita" id="datepicker-autoclose7" name="tgl_kelahiran_ayah_wanita" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_ayah_wanita" id="tgl_kelahiran3_ayah_wanita">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ayah_wanita" name="ALAMAT_AYAH_WANITA" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_AYAH_WANITA" id="rt_ayah_wanita" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_AYAH_WANITA" id="rw_ayah_wanita" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Agama/ Warganegara </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_ayah_wanita" id="pekerjaan_ayah_wanita" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="agama_ayah_wanita" id="agama_ayah_wanita" disabled>
                                                        <option value="">Pilih Agama</option>
                                                        <?php foreach (daftar_agama() as $agama) : ?>
                                                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="agama_ayah_wanita" id="agama3_ayah_wanita">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_ayah_wanita" id="warga_negara_ayah_wanita" disabled>
                                                        <option value="">Pilih Warganegara</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_ayah_wanita" id="warga_negara3_ayah_wanita" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- BIODATA IBU WANITA -->
                            <div class="row" id="data_ibu_wanita">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">B.3 Data Ibu Pasangan Wanita</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ibu_wanita" maxlength="16" id="cek_nik_ibu_wanita" placeholder="Masukkan Nomor KTP Ibu Wanita" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ibu_wanita" type="button" onclick="cari_ibu_wanita();"><i class="fa fa-search"></i> Cari NIK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 float-right">
                                                    <button type="button" class="btn waves-effect waves-light btn-success" style="width: 100%;" onclick="manual7()">Input Manual</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap/ Binti</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_ibu_wanita" id="nama_ibu_wanita" placeholder="Nama Lengkap Ibu Wanita" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="bin_ibu_wanita" id="bin_ibu_wanita" placeholder="Binti Ibu Wanita" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ibu_wanita" id="tempat_lahir_ibu_wanita" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ibu_wanita" id="datepicker-autoclose8" name="tgl_kelahiran_ibu_wanita" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_ibu_wanita" id="tgl_kelahiran3_ibu_wanita">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ibu_wanita" name="ALAMAT_IBU_WANITA" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_IBU_WANITA" id="rt_ibu_wanita" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_IBU_WANITA" id="rw_ibu_wanita" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Agama/ Warganegara </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_ibu_wanita" id="pekerjaan_ibu_wanita" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="agama_ibu_wanita" id="agama_ibu_wanita" disabled>
                                                        <option value="">Pilih Agama</option>
                                                        <?php foreach (daftar_agama() as $agama) : ?>
                                                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="agama_ibu_wanita" id="agama3_ibu_wanita">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_ibu_wanita" id="warga_negara_ibu_wanita" disabled>
                                                        <option value="">Pilih Warganegara</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_ibu_wanita" id="warga_negara3_ibu_wanita" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- BIODATA SUAMI TERDAHULU WANITA -->
                            <div class="row" id="data_suami_terdahulu_wanita">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">B.4 Data Suami Terdahulu</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_suami_terdahulu" maxlength="16" id="cek_nik_suami_terdahulu" placeholder="Masukkan Nomor KTP Suami Terdahulu" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_suami_terdahulu" type="button" onclick="cari_suami_terdahulu();"><i class="fa fa-search"></i> Cari NIK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 float-right">
                                                    <button type="button" class="btn waves-effect waves-light btn-success" style="width: 100%;" onclick="manual8()">Input Manual</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap/ Bin</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_suami_terdahulu" id="nama_suami_terdahulu" placeholder="Nama Lengkap Suami Terdahulu" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="bin_suami_terdahulu" id="bin_suami_terdahulu" placeholder="Bin" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_suami_terdahulu" id="tempat_lahir_suami_terdahulu" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_suami_terdahulu" id="datepicker-autoclose9" name="tgl_kelahiran_suami_terdahulu" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_suami_terdahulu" id="tgl_kelahiran3_suami_terdahulu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_suami_terdahulu" name="ALAMAT_SUAMI_TERDAHULU" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_SUAMI_TERDAHULU" id="rt_suami_terdahulu" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_SUAMI_TERDAHULU" id="rw_suami_terdahulu" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Agama/ Warganegara </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_suami_terdahulu" id="pekerjaan_suami_terdahulu" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="agama_suami_terdahulu" id="agama_suami_terdahulu" disabled>
                                                        <option value="">Pilih Agama</option>
                                                        <?php foreach (daftar_agama() as $agama) : ?>
                                                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="agama_suami_terdahulu" id="agama3_suami_terdahulu">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_suami_terdahulu" id="warga_negara_suami_terdahulu" disabled>
                                                        <option value="">Pilih Warganegara</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_suami_terdahulu" id="warga_negara3_suami_terdahulu" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Meninggal Dunia Pada Tanggal / Tempat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_meninggal_suami_terdahulu" id="datepicker-autoclose10" name="tgl_meninggal_suami_terdahulu" placeholder="mm/dd/yyyy">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <input class="form-control" type="text" value="" name="tempat_meninggal_suami_terdahulu" id="tempat_meinggal_suami_terdahulu" placeholder="Tempat Meninggal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- BIODATA WALI NIKAH -->
                            <div class="row" id="data_wali_nikah">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">B.5 Data Wali Nikah</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_wali_nikah" maxlength="16" id="cek_nik_wali_nikah" placeholder="Masukkan Nomor KTP Wali Nikah" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_wali_nikah" type="button" onclick="cari_wali_nikah();"><i class="fa fa-search"></i> Cari NIK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 float-right">
                                                    <button type="button" class="btn waves-effect waves-light btn-success" style="width: 100%;" onclick="manual9()">Input Manual</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap/ Bin</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_wali_nikah" id="nama_wali_nikah" placeholder="Nama Lengkap Wali Nikah" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="bin_wali_nikah" id="bin_wali_nikah" placeholder="Bin" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_wali_nikah" id="tempat_lahir_wali_nikah" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_wali_nikah" id="datepicker-autoclose10" name="tgl_kelahiran_wali_nikah" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_wali_nikah" id="tgl_kelahiran3_wali_nikah">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_wali_nikah" name="ALAMAT_WALI_NIKAH" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_WALI_NIKAH" id="rt_wali_nikah" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_WALI_NIKAH" id="rw_wali_nikah" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Agama/ Warganegara </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_wali_nikah" id="pekerjaan_wali_nikah" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="agama_wali_nikah" id="agama_wali_nikah" disabled>
                                                        <option value="">Pilih Agama</option>
                                                        <?php foreach (daftar_agama() as $agama) : ?>
                                                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="agama_wali_nikah" id="agama3_wali_nikah">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_wali_nikah" id="warga_negara_wali_nikah" disabled>
                                                        <option value="">Pilih Warganegara</option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_wali_nikah" id="warga_negara3_wali_nikah" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Hubungan Wali Nikah </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="hubungan_wali_nikah" id="hubungan_wali_nikah" required>
                                                        <option value="">Pilih Hubungan Wali Nikah</option>
                                                        <option value="AYAH KANDUNG">AYAH KANDUNG</option>
                                                        <option value="LAINNYA">LAINNYA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="div_hub_wali" style="display: none;">
                                        <label for="example-search-input" class="col-3 col-form-label">Hubungan Bila Bukan Wali Ayah</label>
                                        <div class="col-9" id="div_hub_wali2" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="hub_wali_bukan_ayah" id="hub_wali_bukan_ayah" placeholder="Status Hubungan Bila Bukan Wali Ayah (Contoh: Paman, Kakak, Dll)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="div_alasan" style="display: none;">
                                        <label for="example-search-input" class="col-3 col-form-label">Alasan Bila Bukan Wali Ayah</label>
                                        <div class="col-9" id="div_alasan2" style="display: none;">
                                            <input class="form-control" type="text" value="" name="alasan_bukan_wali_ayah" id="alasan_bukan_wali_ayah" placeholder="Alasan Bila Bukan Wali Ayah">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <div class="card-header bg-info col-12">
                                            <h5 class="mb-0 text-white">C. Pengantar Numpang Nikah</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Kabupaten</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="Banjarnegara" id="kabupaten" name="kabupaten">
                                        </div>
                                    </div>
                                    <?php
                                    include 'form-keperluan.php';
                                    ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <div class="card-header bg-info col-12">
                                            <h5 class="mb-0 text-white">D. Data Pernikahan</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Hari/ Tanggal/ Jam </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="hari_nikah" id="hari" readonly placeholder="Hari Nikah">
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_nikah" id="datepicker-autoclose11" name="tgl_nikah" placeholder="mm/dd/yyyy">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="time" class="form-control jam_nikah" id="jam_nikah" name="jam_nikah" placeholder="Jam Nikah">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="ti-alarm-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Tempat Nikah</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" id="tempat_nikah" name="tempat_nikah" placeholder="Tempat Nikah">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- DATA CALON PASANGAN PRIA -->
                                    <div class="form-group row">
                                        <div class="card-header bg-info col-12">
                                            <h5 class="mb-0 text-white">E. Penanda Tangan</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php
                                    include 'form-button.php';
                                    ?>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
    </div>
    <!-- End Container fluid "<?= urlNik(); ?>" -->
    <script src="<?= asset('surat/js/cek_nik.js'); ?>"></script>
    <script>
        function cari_pria() {
            if ($('#cek_nik_pria').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_pria").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_pria").attr("disabled", true);
                let nik_ = $("#cek_nik_pria").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        // alert('aw')
                        // //START AJAX 
                        $.ajax({
                            type: "GET", // Method pengiriman data bisa dengan GET atau POST
                            url: "<?= urlNik(); ?>", // Isi dengan url/path file php yang dituju
                            data: {
                                "nik": nik_
                            }, // data yang akan dikirim ke file yang dituju
                            dataType: "json",

                            success: function(response) { // Ketika proses pengiriman berhasil

                                // alert(response.response.co);
                                if (response.respon_code == 1) {
                                    // alert("asu");
                                    let data = response.content[0];


                                    $("#nama_pria").val(data.NAMA_LGKP);
                                    $("#nama_pria").attr("readonly", true);

                                    $("#tempat_lahir_pria").val(data.TMPT_LHR);
                                    $("#tempat_lahir_pria").attr("readonly", true);

                                    $(".tgl_kelahiran_pria").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_pria").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_pria").attr("disabled", true);
                                    $("#tgl_kelahiran3_pria").attr("disabled", false);

                                    $("#warga_negara_pria").val("WNI");
                                    $("#warga_negara3_pria").val("WNI");
                                    $("#warga_negara_pria").attr("disabled", true);
                                    $("#warga_negara3_pria").attr("disabled", false);

                                    $("#agama_pria").val(data.AGAMA);
                                    $("#agama3_pria").val(data.AGAMA);
                                    $("#agama_pria").attr("disabled", true);
                                    $("#agama3_pria").attr("disabled", false);


                                    $("#pekerjaan_pria").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_pria").attr("readonly", true);

                                    $("#alamat_pria").val(data.ALAMAT);
                                    $("#alamat_pria").attr("readonly", true);
                                    $("#rt_pria").val(data.NO_RT);
                                    $("#rt_pria").attr("readonly", true);
                                    $("#rw_pria").val(data.NO_RW);
                                    $("#rw_pria").attr("readonly", true);


                                    $("select").trigger('change');




                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_pria").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_pria").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('form').trigger("reset");
                                    $('select').trigger('change');
                                    $("#btn_nik_pria").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_pria").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_pria").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_pria").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_ayah_pria() {
            if ($('#cek_nik_ayah').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_ayah").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_ayah").attr("disabled", true);
                let nik_ = $("#cek_nik_ayah").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        // alert('aw')
                        // //START AJAX 
                        $.ajax({
                            type: "GET", // Method pengiriman data bisa dengan GET atau POST
                            url: "<?= urlNik(); ?>", // Isi dengan url/path file php yang dituju
                            data: {
                                "nik": nik_
                            }, // data yang akan dikirim ke file yang dituju
                            dataType: "json",

                            success: function(response) { // Ketika proses pengiriman berhasil

                                // alert(response.response.co);
                                if (response.respon_code == 1) {
                                    // alert("asu");
                                    let data = response.content[0];


                                    $("#nama_ayah").val(data.NAMA_LGKP);
                                    $("#nama_ayah").attr("readonly", true);

                                    $("#tempat_lahir_ayah").val(data.TMPT_LHR);
                                    $("#tempat_lahir_ayah").attr("readonly", true);

                                    $(".tgl_kelahiran_ayah").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_ayah").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_ayah").attr("disabled", true);
                                    $("#tgl_kelahiran3_ayah").attr("disabled", false);

                                    $("#warga_negara_ayah").val("WNI");
                                    $("#warga_negara3_ayah").val("WNI");
                                    $("#warga_negara_ayah").attr("disabled", true);
                                    $("#warga_negara3_ayah").attr("disabled", false);

                                    $("#agama_ayah").val(data.AGAMA);
                                    $("#agama3_ayah").val(data.AGAMA);
                                    $("#agama_ayah").attr("disabled", true);
                                    $("#agama3_ayah").attr("disabled", false);


                                    $("#pekerjaan_ayah").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ayah").attr("readonly", true);

                                    $("#alamat_ayah").val(data.ALAMAT);
                                    $("#alamat_ayah").attr("readonly", true);

                                    $("#rt_ayah").val(data.NO_RT);
                                    $("#rt_ayah").attr("readonly", true);
                                    $("#rw_ayah").val(data.NO_RW);
                                    $("#rw_ayah").attr("readonly", true);

                                    $("#bin_ayah").val(data.NAMA_LGKP_AYAH);
                                    $("#bin_ayah").attr("readonly", true);


                                    $("select").trigger('change');

                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_ayah").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ayah").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('form').trigger("reset");
                                    $('select').trigger('change');
                                    $("#btn_nik_ayah").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ayah").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_ayah").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_ayah").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_ibu_pria() {
            if ($('#cek_nik_ibu').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_ibu").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_ibu").attr("disabled", true);
                let nik_ = $("#cek_nik_ibu").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        // alert('aw')
                        // //START AJAX 
                        $.ajax({
                            type: "GET", // Method pengiriman data bisa dengan GET atau POST
                            url: "<?= urlNik(); ?>", // Isi dengan url/path file php yang dituju
                            data: {
                                "nik": nik_
                            }, // data yang akan dikirim ke file yang dituju
                            dataType: "json",

                            success: function(response) { // Ketika proses pengiriman berhasil

                                // alert(response.response.co);
                                if (response.respon_code == 1) {
                                    // alert("asu");
                                    let data = response.content[0];


                                    $("#nama_ibu").val(data.NAMA_LGKP);
                                    $("#nama_ibu").attr("readonly", true);

                                    $("#tempat_lahir_ibu").val(data.TMPT_LHR);
                                    $("#tempat_lahir_ibu").attr("readonly", true);

                                    $(".tgl_kelahiran_ibu").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_ibu").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_ibu").attr("disabled", true);
                                    $("#tgl_kelahiran3_ibu").attr("disabled", false);

                                    $("#warga_negara_ibu").val("WNI");
                                    $("#warga_negara3_ibu").val("WNI");
                                    $("#warga_negara_ibu").attr("disabled", true);
                                    $("#warga_negara3_ibu").attr("disabled", false);

                                    $("#agama_ibu").val(data.AGAMA);
                                    $("#agama3_ibu").val(data.AGAMA);
                                    $("#agama_ibu").attr("disabled", true);
                                    $("#agama3_ibu").attr("disabled", false);


                                    $("#pekerjaan_ibu").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ibu").attr("readonly", true);

                                    $("#alamat_ibu").val(data.ALAMAT);
                                    $("#alamat_ibu").attr("readonly", true);

                                    $("#rt_ibu_pria").val(data.NO_RT);
                                    $("#rt_ibu_pria").attr("readonly", true);
                                    $("#rw_ibu_pria").val(data.NO_RW);
                                    $("#rw_ibu_pria").attr("readonly", true);

                                    $("#bin_ibu").val(data.NAMA_LGKP_AYAH);
                                    $("#bin_ibu").attr("readonly", true);

                                    $("select").trigger('change');
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_ibu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ibu").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('form').trigger("reset");
                                    $('select').trigger('change');
                                    $("#btn_nik_ibu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ibu").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_ibu").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_ibu").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_istri_terdahulu() {
            if ($('#cek_nik_istri_terdahulu').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_istri_terdahulu").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_istri_terdahulu").attr("disabled", true);
                let nik_ = $("#cek_nik_istri_terdahulu").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        // alert('aw')
                        // //START AJAX 
                        $.ajax({
                            type: "GET", // Method pengiriman data bisa dengan GET atau POST
                            url: "<?= urlNik(); ?>", // Isi dengan url/path file php yang dituju
                            data: {
                                "nik": nik_
                            }, // data yang akan dikirim ke file yang dituju
                            dataType: "json",

                            success: function(response) { // Ketika proses pengiriman berhasil

                                // alert(response.response.co);
                                if (response.respon_code == 1) {
                                    // alert("asu");
                                    let data = response.content[0];


                                    $("#nama_istri_terdahulu").val(data.NAMA_LGKP);
                                    $("#nama_istri_terdahulu").attr("readonly", true);

                                    $("#tempat_lahir_istri_terdahulu").val(data.TMPT_LHR);
                                    $("#tempat_lahir_istri_terdahulu").attr("readonly", true);

                                    $(".tgl_kelahiran_istri_terdahulu").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_istri_terdahulu").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_istri_terdahulu").attr("disabled", true);
                                    $("#tgl_kelahiran3_istri_terdahulu").attr("disabled", false);

                                    $("#warga_negara_istri_terdahulu").val("WNI");
                                    $("#warga_negara3_istri_terdahulu").val("WNI");
                                    $("#warga_negara_istri_terdahulu").attr("disabled", true);
                                    $("#warga_negara3_istri_terdahulu").attr("disabled", false);

                                    $("#agama_istri_terdahulu").val(data.AGAMA);
                                    $("#agama3_istri_terdahulu").val(data.AGAMA);
                                    $("#agama_istri_terdahulu").attr("disabled", true);
                                    $("#agama3_istri_terdahulu").attr("disabled", false);


                                    $("#pekerjaan_istri_terdahulu").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_istri_terdahulu").attr("readonly", true);

                                    $("#alamat_istri_terdahulu").val(data.ALAMAT);
                                    $("#alamat_istri_terdahulu").attr("readonly", true);

                                    $("#rt_istri_terdahulu").val(data.NO_RT);
                                    $("#rt_istri_terdahulu").attr("readonly", true);
                                    $("#rw_istri_terdahulu").val(data.NO_RW);
                                    $("#rw_istri_terdahulu").attr("readonly", true);

                                    $("#bin_istri_terdahulu").val(data.NAMA_LGKP_AYAH);
                                    $("#bin_istri_terdahulu").attr("readonly", true);


                                    $("select").trigger('change');
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_istri_terdahulu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_istri_terdahulu").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('form').trigger("reset");
                                    $('select').trigger('change');
                                    $("#btn_nik_istri_terdahulu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_istri_terdahulu").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_istri_terdahulu").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_istri_terdahulu").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_wanita() {
            if ($('#cek_nik_wanita').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_wanita").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_wanita").attr("disabled", true);
                let nik_ = $("#cek_nik_wanita").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        // alert('aw')
                        // //START AJAX 
                        $.ajax({
                            type: "GET", // Method pengiriman data bisa dengan GET atau POST
                            url: "<?= urlNik(); ?>", // Isi dengan url/path file php yang dituju
                            data: {
                                "nik": nik_
                            }, // data yang akan dikirim ke file yang dituju
                            dataType: "json",

                            success: function(response) { // Ketika proses pengiriman berhasil

                                // alert(response.response.co);
                                if (response.respon_code == 1) {
                                    // alert("asu");
                                    let data = response.content[0];


                                    $("#nama_wanita").val(data.NAMA_LGKP);
                                    $("#nama_wanita").attr("readonly", true);

                                    $("#tempat_lahir_wanita").val(data.TMPT_LHR);
                                    $("#tempat_lahir_wanita").attr("readonly", true);

                                    $(".tgl_kelahiran_wanita").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_wanita").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_wanita").attr("disabled", true);
                                    $("#tgl_kelahiran3_wanita").attr("disabled", false);

                                    $("#warga_negara_wanita").val("WNI");
                                    $("#warga_negara3_wanita").val("WNI");
                                    $("#warga_negara_wanita").attr("disabled", true);
                                    $("#warga_negara3_wanita").attr("disabled", false);

                                    $("#agama_wanita").val(data.AGAMA);
                                    $("#agama3_wanita").val(data.AGAMA);
                                    $("#agama_wanita").attr("disabled", true);
                                    $("#agama3_wanita").attr("disabled", false);


                                    $("#pekerjaan_wanita").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_wanita").attr("readonly", true);

                                    $("#alamat_wanita").val(data.ALAMAT);
                                    $("#alamat_wanita").attr("readonly", true);

                                    $("#rt_wanita").val(data.NO_RT);
                                    $("#rt_wanita").attr("readonly", true);
                                    $("#rw_wanita").val(data.NO_RW);
                                    $("#rw_wanita").attr("readonly", true);

                                    $("#bin_wanita").val(data.NAMA_LGKP_AYAH);
                                    $("#bin_wanita").attr("readonly", true);


                                    $("select").trigger('change');
                                    $("#btn_nik_wanita").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_wanita").attr("disabled", false);
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('form').trigger("reset");
                                    $('select').trigger('change');
                                    $("#btn_nik_wanita").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_wanita").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_wanita").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_wanita").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_ayah_wanita() {
            if ($('#cek_nik_ayah_wanita').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_ayah_wanita").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_ayah_wanita").attr("disabled", true);
                let nik_ = $("#cek_nik_ayah_wanita").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        // alert('aw')
                        // //START AJAX 
                        $.ajax({
                            type: "GET", // Method pengiriman data bisa dengan GET atau POST
                            url: "<?= urlNik(); ?>", // Isi dengan url/path file php yang dituju
                            data: {
                                "nik": nik_
                            }, // data yang akan dikirim ke file yang dituju
                            dataType: "json",

                            success: function(response) { // Ketika proses pengiriman berhasil

                                // alert(response.response.co);
                                if (response.respon_code == 1) {
                                    // alert("asu");
                                    let data = response.content[0];


                                    $("#nama_ayah_wanita").val(data.NAMA_LGKP);
                                    $("#nama_ayah_wanita").attr("readonly", true);

                                    $("#tempat_lahir_ayah_wanita").val(data.TMPT_LHR);
                                    $("#tempat_lahir_ayah_wanita").attr("readonly", true);

                                    $(".tgl_kelahiran_ayah_wanita").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_ayah_wanita").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_ayah_wanita").attr("disabled", true);
                                    $("#tgl_kelahiran3_ayah_wanita").attr("disabled", false);

                                    $("#warga_negara_ayah_wanita").val("WNI");
                                    $("#warga_negara3_ayah_wanita").val("WNI");
                                    $("#warga_negara_ayah_wanita").attr("disabled", true);
                                    $("#warga_negara3_ayah_wanita").attr("disabled", false);

                                    $("#agama_ayah_wanita").val(data.AGAMA);
                                    $("#agama3_ayah_wanita").val(data.AGAMA);
                                    $("#agama_ayah_wanita").attr("disabled", true);
                                    $("#agama3_ayah_wanita").attr("disabled", false);


                                    $("#pekerjaan_ayah_wanita").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ayah_wanita").attr("readonly", true);

                                    $("#alamat_ayah_wanita").val(data.ALAMAT);
                                    $("#alamat_ayah_wanita").attr("readonly", true);
                                    $("#rt_ayah_wanita").val(data.NO_RT);
                                    $("#rt_ayah_wanita").attr("readonly", true);
                                    $("#rw_ayah_wanita").val(data.NO_RW);
                                    $("#rw_ayah_wanita").attr("readonly", true);

                                    $("#bin_ayah_wanita").val(data.NAMA_LGKP_AYAH);
                                    $("#bin_ayah_wanita").attr("readonly", true);
                                    $("select").trigger('change');
                                    $("#btn_nik_ayah_wanita").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ayah_wanita").attr("disabled", false);
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('form').trigger("reset");
                                    $('select').trigger('change');
                                    $("#btn_nik_ayah_wanita").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ayah_wanita").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_ayah_wanita").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_ayah_wanita").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_ibu_wanita() {
            if ($('#cek_nik_ibu_wanita').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_ibu_wanita").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_ibu_wanita").attr("disabled", true);
                let nik_ = $("#cek_nik_ibu_wanita").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        // alert('aw')
                        // //START AJAX 
                        $.ajax({
                            type: "GET", // Method pengiriman data bisa dengan GET atau POST
                            url: "<?= urlNik(); ?>", // Isi dengan url/path file php yang dituju
                            data: {
                                "nik": nik_
                            }, // data yang akan dikirim ke file yang dituju
                            dataType: "json",

                            success: function(response) { // Ketika proses pengiriman berhasil

                                // alert(response.response.co);
                                if (response.respon_code == 1) {
                                    // alert("asu");
                                    let data = response.content[0];


                                    $("#nama_ibu_wanita").val(data.NAMA_LGKP);
                                    $("#nama_ibu_wanita").attr("readonly", true);

                                    $("#tempat_lahir_ibu_wanita").val(data.TMPT_LHR);
                                    $("#tempat_lahir_ibu_wanita").attr("readonly", true);

                                    $(".tgl_kelahiran_ibu_wanita").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_ibu_wanita").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_ibu_wanita").attr("disabled", true);
                                    $("#tgl_kelahiran3_ibu_wanita").attr("disabled", false);

                                    $("#warga_negara_ibu_wanita").val("WNI");
                                    $("#warga_negara3_ibu_wanita").val("WNI");
                                    $("#warga_negara_ibu_wanita").attr("disabled", true);
                                    $("#warga_negara3_ibu_wanita").attr("disabled", false);

                                    $("#agama_ibu_wanita").val(data.AGAMA);
                                    $("#agama3_ibu_wanita").val(data.AGAMA);
                                    $("#agama_ibu_wanita").attr("disabled", true);
                                    $("#agama3_ibu_wanita").attr("disabled", false);


                                    $("#pekerjaan_ibu_wanita").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ibu_wanita").attr("readonly", true);

                                    $("#alamat_ibu_wanita").val(data.ALAMAT);
                                    $("#alamat_ibu_wanita").attr("readonly", true);

                                    $("#rt_ibu_wanita").val(data.NO_RT);
                                    $("#rt_ibu_wanita").attr("readonly", true);
                                    $("#rw_ibu_wanita").val(data.NO_RW);
                                    $("#rw_ibu_wanita").attr("readonly", true);

                                    $("#bin_ibu_wanita").val(data.NAMA_LGKP_AYAH);
                                    $("#bin_ibu_wanita").attr("readonly", true);


                                    $("select").trigger('change');
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_ibu_wanita").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ibu_wanita").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('form').trigger("reset");
                                    $('select').trigger('change');
                                    $("#btn_nik_ibu_wanita").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ibu_wanita").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_ibu_wanita").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_ibu_wanita").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_suami_terdahulu() {
            if ($('#cek_nik_suami_terdahulu').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_suami_terdahulu").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_suami_terdahulu").attr("disabled", true);
                let nik_ = $("#cek_nik_suami_terdahulu").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        // alert('aw')
                        // //START AJAX 
                        $.ajax({
                            type: "GET", // Method pengiriman data bisa dengan GET atau POST
                            url: "<?= urlNik(); ?>", // Isi dengan url/path file php yang dituju
                            data: {
                                "nik": nik_
                            }, // data yang akan dikirim ke file yang dituju
                            dataType: "json",

                            success: function(response) { // Ketika proses pengiriman berhasil

                                // alert(response.response.co);
                                if (response.respon_code == 1) {
                                    // alert("asu");
                                    let data = response.content[0];


                                    $("#nama_suami_terdahulu").val(data.NAMA_LGKP);
                                    $("#nama_suami_terdahulu").attr("readonly", true);

                                    $("#tempat_lahir_suami_terdahulu").val(data.TMPT_LHR);
                                    $("#tempat_lahir_suami_terdahulu").attr("readonly", true);

                                    $(".tgl_kelahiran_suami_terdahulu").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_suami_terdahulu").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_suami_terdahulu").attr("disabled", true);
                                    $("#tgl_kelahiran3_suami_terdahulu").attr("disabled", false);

                                    $("#warga_negara_suami_terdahulu").val("WNI");
                                    $("#warga_negara3_suami_terdahulu").val("WNI");
                                    $("#warga_negara_suami_terdahulu").attr("disabled", true);
                                    $("#warga_negara3_suami_terdahulu").attr("disabled", false);

                                    $("#agama_suami_terdahulu").val(data.AGAMA);
                                    $("#agama3_suami_terdahulu").val(data.AGAMA);
                                    $("#agama_suami_terdahulu").attr("disabled", true);
                                    $("#agama3_suami_terdahulu").attr("disabled", false);


                                    $("#pekerjaan_suami_terdahulu").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_suami_terdahulu").attr("readonly", true);

                                    $("#alamat_suami_terdahulu").val(data.ALAMAT);
                                    $("#alamat_suami_terdahulu").attr("readonly", true);

                                    $("#rt_suami_terdahulu").val(data.NO_RT);
                                    $("#rt_suami_terdahulu").attr("readonly", true);
                                    $("#rw_suami_terdahulu").val(data.NO_RW);
                                    $("#rw_suami_terdahulu").attr("readonly", true);

                                    $("#bin_suami_terdahulu").val(data.NAMA_LGKP_AYAH);
                                    $("#bin_suami_terdahulu").attr("readonly", true);


                                    $("select").trigger('change');
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_suami_terdahulu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_suami_terdahulu").attr("disabled", true);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('form').trigger("reset");
                                    $('select').trigger('change');
                                    $("#btn_nik_suami_terdahulu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_suami_terdahulu").attr("disabled", true);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_suami_terdahulu").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_suami_terdahulu").attr("disabled", true);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_wali_nikah() {
            if ($('#cek_nik_wali_nikah').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_wali_nikah").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_wali_nikah").attr("disabled", true);
                let nik_ = $("#cek_nik_wali_nikah").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        // alert('aw')
                        // //START AJAX 
                        $.ajax({
                            type: "GET", // Method pengiriman data bisa dengan GET atau POST
                            url: "<?= urlNik(); ?>", // Isi dengan url/path file php yang dituju
                            data: {
                                "nik": nik_
                            }, // data yang akan dikirim ke file yang dituju
                            dataType: "json",

                            success: function(response) { // Ketika proses pengiriman berhasil

                                // alert(response.response.co);
                                if (response.respon_code == 1) {
                                    // alert("asu");
                                    let data = response.content[0];
                                    $("#nama_wali_nikah").val(data.NAMA_LGKP);
                                    $("#nama_wali_nikah").attr("readonly", true);

                                    $("#tempat_lahir_wali_nikah").val(data.TMPT_LHR);
                                    $("#tempat_lahir_wali_nikah").attr("readonly", true);

                                    $(".tgl_kelahiran_wali_nikah").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_wali_nikah").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_wali_nikah").attr("disabled", true);
                                    $("#tgl_kelahiran3_wali_nikah").attr("disabled", false);

                                    $("#warga_negara_wali_nikah").val("WNI");
                                    $("#warga_negara3_wali_nikah").val("WNI");
                                    $("#warga_negara_wali_nikah").attr("disabled", true);
                                    $("#warga_negara3_wali_nikah").attr("disabled", false);

                                    $("#agama_wali_nikah").val(data.AGAMA);
                                    $("#agama3_wali_nikah").val(data.AGAMA);
                                    $("#agama_wali_nikah").attr("disabled", true);
                                    $("#agama3_wali_nikah").attr("disabled", false);


                                    $("#pekerjaan_wali_nikah").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_wali_nikah").attr("readonly", true);

                                    $("#alamat_wali_nikah").val(data.ALAMAT);
                                    $("#alamat_wali_nikah").attr("readonly", true);

                                    $("#rt_wali_nikah").val(data.NO_RT);
                                    $("#rt_wali_nikah").attr("readonly", true);
                                    $("#rw_wali_nikah").val(data.NO_RW);
                                    $("#rw_wali_nikah").attr("readonly", true);

                                    $("#bin_wali_nikah").val(data.NAMA_LGKP_AYAH);
                                    $("#bin_wali_nikah").attr("readonly", true);

                                    $("select").trigger('change');

                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_wali_nikah").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_wali_nikah").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('form').trigger("reset");
                                    $('select').trigger('change');
                                    $("#btn_nik_wali_nikah").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_wali_nikah").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_wali_nikah").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_wali_nikah").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }
    </script>
    <script>
        // var baseURL = "<?= urlNik(); ?>";
        function manual() {
            $('#data_pasangan_pria').find('input').val('');
            $('#data_pasangan_pria').find('select').prop('selectedIndex', 0);
            $("#nama_pria").attr("readonly", false);
            $("#tempat_lahir_pria").attr("readonly", false);
            $(".tgl_kelahiran_pria").attr("disabled", false);
            $("#alamat_pria").attr("readonly", false);
            $("#rt_pria").attr("readonly", false);
            $("#rw_pria").attr("readonly", false);
            $("#pekerjaan_pria").attr("readonly", false);
            $("#agama_pria").attr("disabled", false);
            $("#warga_negara_pria").attr("disabled", false);


            $("#warga_negara3_pria").attr("disabled", true);
            $("#tgl_kelahiran3_pria").attr("disabled", true);
            $("#agama3_pria").attr("disabled", true);
            $('select').trigger('change');

        }

        function manual2() {
            $('#data_ayah_pria').find('input').val('');
            $('#data_ayah_pria').find('select').prop('selectedIndex', 0);
            $("#nama_ayah").attr("readonly", false);
            $("#bin_ayah").attr("readonly", false);
            $("#tempat_lahir_ayah").attr("readonly", false);
            $(".tgl_kelahiran_ayah").attr("disabled", false);
            $("#alamat_ayah").attr("readonly", false);
            $("#rt_ayah").attr("readonly", false);
            $("#rw_ayah").attr("readonly", false);
            $("#pekerjaan_ayah").attr("readonly", false);
            $("#agama_ayah").attr("disabled", false);
            $("#warga_negara_ayah").attr("disabled", false);


            $("#warga_negara3_ayah").attr("disabled", true);
            $("#tgl_kelahiran3_ayah").attr("disabled", true);
            $("#agama3_ayah").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual3() {
            $('#data_ibu_pria').find('input').val('');
            $('#data_ibu_pria').find('select').prop('selectedIndex', 0);
            $("#nama_ibu").attr("readonly", false);
            $("#bin_ibu").attr("readonly", false);
            $("#tempat_lahir_ibu").attr("readonly", false);
            $(".tgl_kelahiran_ibu").attr("disabled", false);
            $("#alamat_ibu").attr("readonly", false);
            $("#rt_ibu_pria").attr("readonly", false);
            $("#rw_ibu_pria").attr("readonly", false);
            $("#pekerjaan_ibu").attr("readonly", false);
            $("#agama_ibu").attr("disabled", false);
            $("#warga_negara_ibu").attr("disabled", false);


            $("#warga_negara3_ibu").attr("disabled", true);
            $("#tgl_kelahiran3_ibu").attr("disabled", true);
            $("#agama3_ibu").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual4() {
            $('#data_istri_terdahulu_pria').find('input').val('');
            $('#data_istri_terdahulu_pria').find('select').prop('selectedIndex', 0);
            $("#nama_istri_terdahulu").attr("readonly", false);
            $("#bin_istri_terdahulu").attr("readonly", false);
            $("#tempat_lahir_istri_terdahulu").attr("readonly", false);
            $(".tgl_kelahiran_istri_terdahulu").attr("disabled", false);
            $("#alamat_istri_terdahulu").attr("readonly", false);
            $("#rt_istri_terdahulu").attr("readonly", false);
            $("#rw_istri_terdahulu").attr("readonly", false);
            $("#pekerjaan_istri_terdahulu").attr("readonly", false);
            $("#agama_istri_terdahulu").attr("disabled", false);
            $("#warga_negara_istri_terdahulu").attr("disabled", false);


            $("#warga_negara3_istri_terdahulu").attr("disabled", true);
            $("#tgl_kelahiran3_istri_terdahulu").attr("disabled", true);
            $("#agama3_istri_terdahulu").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual5() {
            $('#data_pasangan_wanita').find('input').val('');
            $('#data_pasangan_wanita').find('select').prop('selectedIndex', 0);
            $("#nama_wanita").attr("readonly", false);
            $("#tempat_lahir_wanita").attr("readonly", false);
            $(".tgl_kelahiran_wanita").attr("disabled", false);
            $("#alamat_wanita").attr("readonly", false);
            $("#rt_wanita").attr("readonly", false);
            $("#rw_wanita").attr("readonly", false);
            $("#pekerjaan_wanita").attr("readonly", false);
            $("#agama_wanita").attr("disabled", false);
            $("#warga_negara_wanita").attr("disabled", false);


            $("#warga_negara3_wanita").attr("disabled", true);
            $("#tgl_kelahiran3_wanita").attr("disabled", true);
            $("#agama3_wanita").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual6() {
            $('#data_ayah_wanita').find('input').val('');
            $('#data_ayah_wanita').find('select').prop('selectedIndex', 0);
            $("#nama_ayah_wanita").attr("readonly", false);
            $("#bin_ayah_wanita").attr("readonly", false);
            $("#tempat_lahir_ayah_wanita").attr("readonly", false);
            $(".tgl_kelahiran_ayah_wanita").attr("disabled", false);
            $("#alamat_ayah_wanita").attr("readonly", false);
            $("#rt_ayah_wanita").attr("readonly", false);
            $("#rw_ayah_wanita").attr("readonly", false);
            $("#pekerjaan_ayah_wanita").attr("readonly", false);
            $("#agama_ayah_wanita").attr("disabled", false);
            $("#warga_negara_ayah_wanita").attr("disabled", false);


            $("#warga_negara3_ayah_wanita").attr("disabled", true);
            $("#tgl_kelahiran3_ayah_wanita").attr("disabled", true);
            $("#agama3_ayah_wanita").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual7() {
            $('#data_ibu_wanita').find('input').val('');
            $('#data_ibu_wanita').find('select').prop('selectedIndex', 0);
            $("#nama_ibu_wanita").attr("readonly", false);
            $("#bin_ibu_wanita").attr("readonly", false);
            $("#tempat_lahir_ibu_wanita").attr("readonly", false);
            $(".tgl_kelahiran_ibu_wanita").attr("disabled", false);
            $("#alamat_ibu_wanita").attr("readonly", false);
            $("#rt_ibu_wanita").attr("readonly", false);
            $("#rw_ibu_wanita").attr("readonly", false);
            $("#pekerjaan_ibu_wanita").attr("readonly", false);
            $("#agama_ibu_wanita").attr("disabled", false);
            $("#warga_negara_ibu_wanita").attr("disabled", false);


            $("#warga_negara3_ibu_wanita").attr("disabled", true);
            $("#tgl_kelahiran3_ibu_wanita").attr("disabled", true);
            $("#agama3_ibu_wanita").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual8() {
            $('#data_suami_terdahulu_wanita').find('input').val('');
            $('#data_suami_terdahulu_wanita').find('select').prop('selectedIndex', 0);
            $("#nama_suami_terdahulu").attr("readonly", false);
            $("#bin_suami_terdahulu").attr("readonly", false);
            $("#tempat_lahir_suami_terdahulu").attr("readonly", false);
            $(".tgl_kelahiran_suami_terdahulu").attr("disabled", false);
            $("#alamat_suami_terdahulu").attr("readonly", false);
            $("#rt_suami_terdahulu").attr("readonly", false);
            $("#rw_suami_terdahulu").attr("readonly", false);
            $("#pekerjaan_suami_terdahulu").attr("readonly", false);
            $("#agama_suami_terdahulu").attr("disabled", false);
            $("#warga_negara_suami_terdahulu").attr("disabled", false);


            $("#warga_negara3_suami_terdahulu").attr("disabled", true);
            $("#tgl_kelahiran3_suami_terdahulu").attr("disabled", true);
            $("#agama3_suami_terdahulu").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual9() {
            $('#data_wali_nikah').find('input').val('');
            $('#data_wali_nikah').find('select').prop('selectedIndex', 0);
            $("#nama_wali_nikah").attr("readonly", false);
            $("#bin_wali_nikah").attr("readonly", false);
            $("#tempat_lahir_wali_nikah").attr("readonly", false);
            $(".tgl_kelahiran_wali_nikah").attr("disabled", false);
            $("#alamat_wali_nikah").attr("readonly", false);
            $("#rt_wali_nikah").attr("readonly", false);
            $("#rw_wali_nikah").attr("readonly", false);
            $("#pekerjaan_wali_nikah").attr("readonly", false);
            $("#agama_wali_nikah").attr("disabled", false);
            $("#warga_negara_wali_nikah").attr("disabled", false);


            $("#warga_negara3_wali_nikah").attr("disabled", true);
            $("#tgl_kelahiran3_wali_nikah").attr("disabled", true);
            $("#agama3_wali_nikah").attr("disabled", true);
            $('select').trigger('change');
        }


        $(document).ready(function() {
            $("#status_kawin_pria").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'beristri') {
                        $("#div_beristri").show();
                        $("#div_beristri2").show();
                        $("#data_istri_terdahulu_pria").hide();
                    } else if (optionValue == 'duda') {
                        $("#data_istri_terdahulu_pria").show();
                        $("#div_beristri").hide();
                        $("#div_beristri2").hide();
                    } else {
                        $("#div_beristri").hide();
                        $("#div_beristri2").hide();
                        $("#data_istri_terdahulu_pria").hide();
                    }
                });
            }).change();

            $("#status_kawin_wanita").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'janda') {
                        $("#data_suami_terdahulu_wanita").show();
                    } else {
                        $("#data_suami_terdahulu_wanita").hide();
                    }
                });
            }).change();

            $("#hubungan_wali_nikah").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'LAINNYA') {
                        $("#div_hub_wali").show();
                        $("#div_hub_wali2").show();
                        $("#div_alasan").show();
                        $("#div_alasan2").show();
                    } else {
                        $("#div_hub_wali").hide();
                        $("#div_hub_wali2").hide();
                        $("#div_alasan").hide();
                        $("#div_alasan2").hide();
                        $("#hub_wali_bukan_ayah").val("");
                        $("#alasan_bukan_wali_ayah").val("");
                    }
                });
            }).change();
        });
    </script>