<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Keterangan Ahli Waris</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Keterangan Ahli Waris</h4>
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
                            <!-- BIODATA ANAK -->
                            <div class="row" id="data_anak">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Almarhum / Almarhumah</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_anak" id="cek_nik_anak" maxlength="16" placeholder="Masukkan NIK Anak / Jenazah" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_anak" type="button" onclick="cari_anak()"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_anak" id="nama_anak" placeholder="Nama Lengkap Anak / Jenazah" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Ayah / Ibu Kandung</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="ayah_kandung_anak" id="ayah_kandung_anak" placeholder="Nama Ayah Kandung" required readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="ibu_kandung_anak" id="ibu_kandung_anak" placeholder="Nama Ibu Kandung" required readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Anak ke-</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="anak_keberapa" id="anak_keberapa" placeholder="Anak Kelahiran Keberapa" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat Kematian / Tgl Kematian</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_kematian_anak" id="tempat_kematian_anak" placeholder="Tempat Kematian" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kematian_anak" id="datepicker-autoclose11" name="TGL_MATI_ANAK" placeholder="mm/dd/yyyy" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- BIODATA AHLI WARIS SATU -->
                            <div class="row" id="data_ahli_waris1">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Ahli Waris 1</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ahli_waris1" id="cek_nik_ahli_waris1" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ahli_waris1" type="button" onclick="cari_ahli_waris1();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_ahli_waris1" id="nama_ahli_waris1" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ahli_waris1" id="tempat_lahir_ahli_waris1" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ahli_waris1" id="datepicker-autoclose" name="tgl_kelahiran_ahli_waris1" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_ahli_waris1" id="tgl_kelahiran3_ahli_waris1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ahli_waris1" name="alamat_ahli_waris1" placeholder="Alamat Tempat Tinggal" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="no_rt_ahli_waris1" id="rt_ahli_waris1" onkeyup="validate()" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="no_rw_ahli_waris1" id="rw_ahli_waris1" onkeyup="validate()" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_ahli_waris1" id="pekerjaan_ahli_waris1" readonly placeholder="Pekerjaan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Hubungan Ahli Waris</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="hub_ahli_waris1" id="hub_ahli_waris1" placeholder="Hubungan Dengan Ahli Waris">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA AHLI WARIS DUA -->
                            <div class="row" id="data_ahli_waris2">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Ahli Waris 2</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ahli_waris2" id="cek_nik_ahli_waris2" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ahli_waris2" type="button" onclick="cari_ahli_waris2();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_ahli_waris2" id="nama_ahli_waris2" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ahli_waris2" id="tempat_lahir_ahli_waris2" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ahli_waris2" id="datepicker-autoclose" name="tgl_kelahiran_ahli_waris2" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_ahli_waris2" id="tgl_kelahiran3_ahli_waris2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ahli_waris2" name="alamat_ahli_waris2" placeholder="Alamat Tempat Tinggal" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="no_rt_ahli_waris2" id="rt_ahli_waris2" onkeyup="validate()" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="no_rw_ahli_waris2" id="rw_ahli_waris2" onkeyup="validate()" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_ahli_waris2" id="pekerjaan_ahli_waris2" readonly placeholder="Pekerjaan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Hubungan Ahli Waris</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="hub_ahli_waris2" id="hub_ahli_waris2" placeholder="Hubungan Dengan Ahli Waris">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA AHLI WARIS TIGA -->
                            <div class="row" id="data_ahli_waris3">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Ahli Waris 3</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ahli_waris3" id="cek_nik_ahli_waris3" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ahli_waris3" type="button" onclick="cari_ahli_waris3();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_ahli_waris3" id="nama_ahli_waris3" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ahli_waris3" id="tempat_lahir_ahli_waris3" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ahli_waris3" id="datepicker-autoclose" name="tgl_kelahiran_ahli_waris3" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_ahli_waris3" id="tgl_kelahiran3_ahli_waris3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ahli_waris3" name="alamat_ahli_waris3" placeholder="Alamat Tempat Tinggal" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="no_rt_ahli_waris3" id="rt_ahli_waris3" onkeyup="validate()" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="no_rw_ahli_waris3" id="rw_ahli_waris3" onkeyup="validate()" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_ahli_waris3" id="pekerjaan_ahli_waris3" readonly placeholder="Pekerjaan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Hubungan Ahli Waris</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="hub_ahli_waris3" id="hub_ahli_waris3" placeholder="Hubungan Dengan Ahli Waris">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA AHLI WARIS EMPAT -->
                            <div class="row" id="data_ahli_waris4">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Ahli Waris 4</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ahli_waris4" id="cek_nik_ahli_waris4" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ahli_waris4" type="button" onclick="cari_ahli_waris4();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_ahli_waris4" id="nama_ahli_waris4" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ahli_waris4" id="tempat_lahir_ahli_waris4" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ahli_waris4" id="datepicker-autoclose" name="tgl_kelahiran_ahli_waris4" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_ahli_waris4" id="tgl_kelahiran3_ahli_waris4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ahli_waris4" name="alamat_ahli_waris4" placeholder="Alamat Tempat Tinggal" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="no_rt_ahli_waris4" id="rt_ahli_waris4" onkeyup="validate()" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="no_rw_ahli_waris4" id="rw_ahli_waris4" onkeyup="validate()" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_ahli_waris4" id="pekerjaan_ahli_waris4" readonly placeholder="Pekerjaan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Hubungan Ahli Waris</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="hub_ahli_waris4" id="hub_ahli_waris4" placeholder="Hubungan Dengan Ahli Waris">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA AHLI WARIS lima -->
                            <div class="row" id="data_ahli_waris5">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Ahli Waris 5</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ahli_waris5" id="cek_nik_ahli_waris5" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ahli_waris5" type="button" onclick="cari_ahli_waris5();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_ahli_waris5" id="nama_ahli_waris5" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ahli_waris5" id="tempat_lahir_ahli_waris5" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ahli_waris5" id="datepicker-autoclose" name="tgl_kelahiran_ahli_waris5" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_ahli_waris5" id="tgl_kelahiran3_ahli_waris5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ahli_waris5" name="alamat_ahli_waris5" placeholder="Alamat Tempat Tinggal" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="no_rt_ahli_waris5" id="rt_ahli_waris5" onkeyup="validate()" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="no_rw_ahli_waris5" id="rw_ahli_waris5" onkeyup="validate()" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_ahli_waris5" id="pekerjaan_ahli_waris5" readonly placeholder="Pekerjaan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Hubungan Ahli Waris</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="hub_ahli_waris5" id="hub_ahli_waris5" placeholder="Hubungan Dengan Ahli Waris">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h5 class="mb-0 text-white">Penanda Tangan</h5>
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

    </div>
    <!-- End Container fluid  -->


    <script src="<?= asset('surat/js/cek_nik_akta_kelahiran.js'); ?>"></script>

    <script>
        var baseURL = "<?= urlNik(); ?>";

        function manual() {
            $('#data_anak').find('input').val('');
            $("#nama_anak").attr("readonly", false);
            $("#ayah_kandung_anak").attr("readonly", false);
            $("#ibu_kandung_anak").attr("readonly", false);
        }

        function manual2() {
            $('#data_ahli_waris1').find('input').val('');
            $('#data_ahli_waris1').find('select').prop('selectedIndex', 0);
            $("#nama_ahli_waris1").attr("readonly", false);
            $("#tempat_lahir_ahli_waris1").attr("readonly", false);
            $(".tgl_kelahiran_ahli_waris1").attr("disabled", false);
            $("#alamat_ahli_waris1").attr("readonly", false);
            $("#rt_ahli_waris1").attr("readonly", false);
            $("#rw_ahli_waris1").attr("readonly", false);
            $("#pekerjaan_ahli_waris1").attr("readonly", false);

            $("#tgl_kelahiran3_ahli_waris1").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual3() {
            $('#data_ahli_waris2').find('input').val('');
            $('#data_ahli_waris2').find('select').prop('selectedIndex', 0);
            $("#nama_ahli_waris2").attr("readonly", false);
            $("#tempat_lahir_ahli_waris2").attr("readonly", false);
            $(".tgl_kelahiran_ahli_waris2").attr("disabled", false);
            $("#alamat_ahli_waris2").attr("readonly", false);
            $("#rt_ahli_waris2").attr("readonly", false);
            $("#rw_ahli_waris2").attr("readonly", false);
            $("#pekerjaan_ahli_waris2").attr("readonly", false);

            $("#tgl_kelahiran3_ahli_waris2").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual4() {
            $('#data_ahli_waris3').find('input').val('');
            $('#data_ahli_waris3').find('select').prop('selectedIndex', 0);
            $("#nama_ahli_waris3").attr("readonly", false);
            $("#tempat_lahir_ahli_waris3").attr("readonly", false);
            $(".tgl_kelahiran_ahli_waris3").attr("disabled", false);
            $("#alamat_ahli_waris3").attr("readonly", false);
            $("#rt_ahli_waris3").attr("readonly", false);
            $("#rw_ahli_waris3").attr("readonly", false);
            $("#pekerjaan_ahli_waris3").attr("readonly", false);

            $("#tgl_kelahiran3_ahli_waris3").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual5() {
            $('#data_ahli_waris4').find('input').val('');
            $('#data_ahli_waris4').find('select').prop('selectedIndex', 0);
            $("#nama_ahli_waris4").attr("readonly", false);
            $("#tempat_lahir_ahli_waris4").attr("readonly", false);
            $(".tgl_kelahiran_ahli_waris4").attr("disabled", false);
            $("#alamat_ahli_waris4").attr("readonly", false);
            $("#rt_ahli_waris4").attr("readonly", false);
            $("#rw_ahli_waris4").attr("readonly", false);
            $("#pekerjaan_ahli_waris4").attr("readonly", false);

            $("#tgl_kelahiran3_ahli_waris4").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual6() {
            $('#data_ahli_waris5').find('input').val('');
            $('#data_ahli_waris5').find('select').prop('selectedIndex', 0);
            $("#nama_ahli_waris5").attr("readonly", false);
            $("#tempat_lahir_ahli_waris5").attr("readonly", false);
            $(".tgl_kelahiran_ahli_waris5").attr("disabled", false);
            $("#alamat_ahli_waris5").attr("readonly", false);
            $("#rt_ahli_waris5").attr("readonly", false);
            $("#rw_ahli_waris5").attr("readonly", false);
            $("#pekerjaan_ahli_waris5").attr("readonly", false);

            $("#tgl_kelahiran3_ahli_waris5").attr("disabled", true);
            $('select').trigger('change');
        }
    </script>
    <script>
        function cari_anak() {
            if ($('#cek_nik_anak').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_anak").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_anak").attr("disabled", true);
                let nik_ = $("#cek_nik_anak").val();
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

                                    $("#nama_anak").val(data.NAMA_LGKP);
                                    $("#nama_anak").attr("readonly", true);

                                    $("#ayah_kandung_anak").val(data.NAMA_LGKP_AYAH);
                                    $("#ayah_kandung_anak").attr("readonly", true);
                                    $("#ibu_kandung_anak").val(data.NAMA_LGKP_IBU);
                                    $("#ibu_kandung_anak").attr("readonly", true);

                                    $("select").trigger('change');
                                    // $("select").select2({disabled:readonly});
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_anak").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_anak").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_anak').find('input').val('');
                                    $('#data_anak').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_anak").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_anak").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_anak").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_anak").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_ahli_waris1() {
            if ($('#cek_nik_ahli_waris1').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_ahli_waris1").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_ahli_waris1").attr("disabled", true);
                let nik_ = $("#cek_nik_ahli_waris1").val();
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

                                    $("#nama_ahli_waris1").val(data.NAMA_LGKP);
                                    $("#nama_ahli_waris1").attr("readonly", true);

                                    $("#tempat_lahir_ahli_waris1").val(data.TMPT_LHR);
                                    $("#tempat_lahir_ahli_waris1").attr("readonly", true);

                                    $(".tgl_kelahiran_ahli_waris1").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_ahli_waris1").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_ahli_waris1").attr("disabled", true);
                                    $("#tgl_kelahiran3_ahli_waris1").attr("disabled", false);

                                    $("#pekerjaan_ahli_waris1").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ahli_waris1").attr("readonly", true);

                                    $("#alamat_ahli_waris1").val(data.ALAMAT);
                                    $("#alamat_ahli_waris1").attr("readonly", true);
                                    $("#rt_ahli_waris1").val(data.NO_RT);
                                    $("#rt_ahli_waris1").attr("readonly", true);
                                    $("#rw_ahli_waris1").val(data.NO_RW);
                                    $("#rw_ahli_waris1").attr("readonly", true);

                                    $("select").trigger('change');
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_ahli_waris1").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ahli_waris1").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_ahli_waris1').find('input').val('');
                                    $('#data_ahli_waris1').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_ahli_waris1").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ahli_waris1").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_ahli_waris1").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_ahli_waris1").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_ahli_waris2() {
            if ($('#cek_nik_ahli_waris2').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_ahli_waris2").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_ahli_waris2").attr("disabled", true);
                let nik_ = $("#cek_nik_ahli_waris2").val();
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

                                    $("#nama_ahli_waris2").val(data.NAMA_LGKP);
                                    $("#nama_ahli_waris2").attr("readonly", true);

                                    $("#tempat_lahir_ahli_waris2").val(data.TMPT_LHR);
                                    $("#tempat_lahir_ahli_waris2").attr("readonly", true);

                                    $(".tgl_kelahiran_ahli_waris2").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_ahli_waris2").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_ahli_waris2").attr("disabled", true);
                                    $("#tgl_kelahiran3_ahli_waris2").attr("disabled", false);

                                    $("#pekerjaan_ahli_waris2").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ahli_waris2").attr("readonly", true);

                                    $("#alamat_ahli_waris2").val(data.ALAMAT);
                                    $("#alamat_ahli_waris2").attr("readonly", true);
                                    $("#rt_ahli_waris2").val(data.NO_RT);
                                    $("#rt_ahli_waris2").attr("readonly", true);
                                    $("#rw_ahli_waris2").val(data.NO_RW);
                                    $("#rw_ahli_waris2").attr("readonly", true);

                                    $("select").trigger('change');
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_ahli_waris2").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ahli_waris2").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_ahli_waris2').find('input').val('');
                                    $('#data_ahli_waris2').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_ahli_waris2").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ahli_waris2").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_ahli_waris2").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_ahli_waris2").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_ahli_waris3() {
            if ($('#cek_nik_ahli_waris3').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_ahli_waris3").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_ahli_waris3").attr("disabled", true);
                let nik_ = $("#cek_nik_ahli_waris3").val();
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

                                    $("#nama_ahli_waris3").val(data.NAMA_LGKP);
                                    $("#nama_ahli_waris3").attr("readonly", true);

                                    $("#tempat_lahir_ahli_waris3").val(data.TMPT_LHR);
                                    $("#tempat_lahir_ahli_waris3").attr("readonly", true);

                                    $(".tgl_kelahiran_ahli_waris3").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_ahli_waris3").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_ahli_waris3").attr("disabled", true);
                                    $("#tgl_kelahiran3_ahli_waris3").attr("disabled", false);

                                    $("#pekerjaan_ahli_waris3").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ahli_waris3").attr("readonly", true);

                                    $("#alamat_ahli_waris3").val(data.ALAMAT);
                                    $("#alamat_ahli_waris3").attr("readonly", true);
                                    $("#rt_ahli_waris3").val(data.NO_RT);
                                    $("#rt_ahli_waris3").attr("readonly", true);
                                    $("#rw_ahli_waris3").val(data.NO_RW);
                                    $("#rw_ahli_waris3").attr("readonly", true);
                                    $("select").trigger('change');
                                    // $("select").select2({disabled:readonly});
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_ahli_waris3").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ahli_waris3").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_ahli_waris3').find('input').val('');
                                    $('#data_ahli_waris3').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_ahli_waris3").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ahli_waris3").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_ahli_waris3").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_ahli_waris3").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_ahli_waris4() {
            if ($('#cek_nik_ahli_waris4').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_ahli_waris4").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_ahli_waris4").attr("disabled", true);
                let nik_ = $("#cek_nik_ahli_waris4").val();
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

                                    $("#nama_ahli_waris4").val(data.NAMA_LGKP);
                                    $("#nama_ahli_waris4").attr("readonly", true);

                                    $("#tempat_lahir_ahli_waris4").val(data.TMPT_LHR);
                                    $("#tempat_lahir_ahli_waris4").attr("readonly", true);

                                    $(".tgl_kelahiran_ahli_waris4").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_ahli_waris4").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_ahli_waris4").attr("disabled", true);
                                    $("#tgl_kelahiran3_ahli_waris4").attr("disabled", false);

                                    $("#pekerjaan_ahli_waris4").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ahli_waris4").attr("readonly", true);

                                    $("#alamat_ahli_waris4").val(data.ALAMAT);
                                    $("#alamat_ahli_waris4").attr("readonly", true);
                                    $("#rt_ahli_waris4").val(data.NO_RT);
                                    $("#rt_ahli_waris4").attr("readonly", true);
                                    $("#rw_ahli_waris4").val(data.NO_RW);
                                    $("#rw_ahli_waris4").attr("readonly", true);
                                    $("select").trigger('change');
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_ahli_waris4").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ahli_waris4").attr("disabled", false);
                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_ahli_waris4').find('input').val('');
                                    $('#data_ahli_waris4').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_ahli_waris4").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ahli_waris4").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_ahli_waris4").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_ahli_waris4").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_ahli_waris5() {
            if ($('#cek_nik_ahli_waris5').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_ahli_waris5").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_ahli_waris5").attr("disabled", true);
                let nik_ = $("#cek_nik_ahli_waris5").val();
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

                                    $("#nama_ahli_waris5").val(data.NAMA_LGKP);
                                    $("#nama_ahli_waris5").attr("readonly", true);

                                    $("#tempat_lahir_ahli_waris5").val(data.TMPT_LHR);
                                    $("#tempat_lahir_ahli_waris5").attr("readonly", true);

                                    $(".tgl_kelahiran_ahli_waris5").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_ahli_waris5").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_ahli_waris5").attr("disabled", true);
                                    $("#tgl_kelahiran3_ahli_waris5").attr("disabled", false);

                                    $("#pekerjaan_ahli_waris5").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ahli_waris5").attr("readonly", true);

                                    $("#alamat_ahli_waris5").val(data.ALAMAT);
                                    $("#alamat_ahli_waris5").attr("readonly", true);
                                    $("#rt_ahli_waris5").val(data.NO_RT);
                                    $("#rt_ahli_waris5").attr("readonly", true);
                                    $("#rw_ahli_waris5").val(data.NO_RW);
                                    $("#rw_ahli_waris5").attr("readonly", true);

                                    $("select").trigger('change');
                                    // $("select").select2({disabled:readonly});
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_ahli_waris5").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ahli_waris5").attr("disabled", false);
                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_ahli_waris5').find('input').val('');
                                    $('#data_ahli_waris5').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_ahli_waris5").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ahli_waris5").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_ahli_waris5").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_ahli_waris5").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }
    </script>