<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Permohonan Akta Kelahiran</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Permohonan Akta Kelahiran</h4>
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

                            <!-- BIODATA KEPALA KELUARGA -->
                            <div class="row" id="data_kepala_keluarga">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Kepala Keluarga</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_kepala_keluarga" id="cek_nik_kepala_keluarga" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP Kepala Keluarga" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_kepala" type="button" onclick="cari_kepala_keluarga();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap / Nomor KK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_kepala_keluarga" id="nama_kepala_keluarga" placeholder="Nama Lengkap" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="no_kk_kepala_keluarga" id="no_kk_kepala_keluarga" placeholder="Nomor Kartu Keluarga" maxlength="16" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- BIODATA PEMOHON -->
                            <div class="row" id="data_pemohon">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Pemohon atau Pelapor</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_pemohon" id="cek_nik_pemohon" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP Pemohon" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_pemohon" type="button" onclick="cari_pemohon();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap / Jenis Kelamin</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_pemohon" id="nama_pemohon" placeholder="Nama Lengkap" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="jk_pemohon" id="jk_pemohon" disabled required>
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" name="jk_pemohon" id="jk3_pemohon">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir / Umur</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_pemohon" id="tempat_lahir_pemohon" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_pemohon" id="datepicker-autoclose" name="tgl_kelahiran_pemohon" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_pemohon" id="tgl_kelahiran3_pemohon">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <input type="text" class="form-control" name="umur_pemohon" id="umur_pemohon" readonly required>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>Tahun</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_pemohon" name="alamat_pemohon" placeholder="Alamat Tempat Tinggal Pemohon" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_PEMOHON" id="rt_pemohon" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_PEMOHON" id="rw_pemohon" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan / Agama</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_pemohon" id="pekerjaan_pemohon" readonly placeholder="Pekerjaan" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select " style="width: 100%;" name="agama_pemohon" id="agama_pemohon" disabled required>
                                                        <option value="">Pilih Agama</option>
                                                        <?php foreach (daftar_agama() as $agama) : ?>
                                                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="agama_pemohon" id="agama3_pemohon">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Status Kawin / Gol. Darah / Kewarganegaraan </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="status_kawin_pemohon" id="status_kawin_pemohon" disabled required>
                                                        <option value="">Pilih Status Perkawinan</option>
                                                        <option value="KAWIN">SUDAH KAWIN</option>
                                                        <option value="BELUM KAWIN">BELUM KAWIN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="status_kawin_pemohon" id="status_kawin3_pemohon">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="gol_darah_pemohon" id="gol_darah_pemohon" disabled>
                                                        <option value="">Pilih Golongan Darah</option>
                                                        <?php foreach (daftar_goldar() as $goldar) : ?>
                                                            <option value="<?= $goldar ?>"><?= $goldar ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="gol_darah_pemohon" id="gol_darah3_pemohon">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_pemohon" id="warga_negara_pemohon" disabled>
                                                        <option value="WNI">WARGA NEGARA INDONESIA</option>
                                                        <option value="WNA">WARGA NEGARA ASING</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_pemohon" id="warga_negara3_pemohon" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nomor HP </label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nomor_hp_pemohon" id="nomor_hp" required placeholder="Nomor HP">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA ANAK -->
                            <div class="row" id="data_anak">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Bayi / Anak</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_anak" id="cek_nik_anak" maxlength="16" placeholder="Masukkan NIK anak" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_anak" type="button" onclick="cari_anak()"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_anak" id="nama_anak" placeholder="Nama Lengkap Bayi atau Anak" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_anak" id="tempat_lahir_anak" placeholder="Tempat Lahir" required readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_anak" id="datepicker-autoclose11" name="tgl_kelahiran_anak" placeholder="mm/dd/yyyy" required disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input class="form-control" type="hidden" name="tgl_kelahiran_anak" id="tgl_kelahiran3_anak">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Hari Kelahiran/ Jam Kelahiran</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="hari_kelahiran" id="hari" readonly placeholder="Hari Kelahiran" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="time" class="form-control jam_lahir_anak" id="jam_lahir_anak" name="jam_lahir_anak" placeholder="Jam kelahiran" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="ti-alarm-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Agama</label>
                                        <div class="col-9">
                                            <select class="select2 form-control custom-select" style="width: 100%;" name="agama_anak" id="agama_anak" disabled>
                                                <option value="">Pilih Agama</option>
                                                <?php foreach (daftar_agama() as $agama) : ?>
                                                    <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input class="form-control" type="hidden" value="" name="agama_anak" id="agama3_anak">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Jenis Kelamin/ Anak ke-</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="jenis_kelamin_anak" id="jk_anak" required disabled>
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" name="jenis_kelamin_anak" id="jk3_anak">
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="anak_keberapa" id="anak_keberapa" placeholder="Anak Kelahiran Keberapa" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Tinggi / Berat Badan</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <input type="text" class="form-control" name="tinggi_anak" id="tinggi_anak" onkeyup="validate()" required placeholder="Tinggi Badan">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>cm </b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <input type="text" class="form-control" name="berat_anak" id="berat_anak" onkeyup="validate()" required placeholder="Berat Badan">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>kg</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Tempat Dilahirkan / Jenis Kelahiran / Penolong Kelahiran</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="tempat_dilahirkan" id="tempat_dilahirkan" required>
                                                        <option value="">Pilih Tempat Dilahirkan</option>
                                                        <?php foreach (tempat_dilahirkan() as $tempat) : ?>
                                                            <option value="<?= $tempat ?>"><?= $tempat; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="jenis_kelahiran" id="jenis_kelahiran" required>
                                                        <option value="">Pilih Jenis Kelahiran</option>
                                                        <?php foreach (jenis_kelahiran() as $jenis) : ?>
                                                            <option value="<?= $jenis ?>"><?= $jenis; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="penolong_kelahiran" id="penolong_kelahiran" required>
                                                        <option value="">Pilih Penolong Kelahiran</option>
                                                        <?php foreach (penolong_kelahiran() as $penolong) : ?>
                                                            <option value="<?= $penolong ?>"><?= $penolong; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tgl. Perkawinan ORTU</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_perkawinan_ortu" id="datepicker-autoclose3" name="tgl_perkawinan_ortu" placeholder="mm/dd/yyyy" required>
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

                            <!-- BIODATA AYAH -->
                            <div class="row" id="data_ayah">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Ayah</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ayah" id="cek_nik_ayah" maxlength="16" placeholder="Masukkan Nomor KTP Ayah" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ayah" type="button" onclick="cari_ayah()"><i class="fa fa-search"></i> Cari NIK</button>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap / Kewarganegaraan</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_ayah_anak" id="nama_ayah" placeholder="Nama Lengkap Ayah" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_ayah" id="warga_negara_ayah" disabled>
                                                        <option value="WNI">WARGA NEGARA INDONESIA</option>
                                                        <option value="WNA">WARGA NEGARA ASING</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_ayah" id="warga_negara3_ayah" readonly>
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
                                                        <input type="text" class="form-control tgl_kelahiran_ayah date" id="datepicker-autoclose2" name="tgl_kelahiran_ayah" placeholder="mm/dd/yyyy" disabled>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Umur </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_ayah" id="pekerjaan_ayah" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <input type="text" class="form-control" name="umur_ayah" id="umur_ayah" readonly required>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>Tahun</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ayah" name="alamat_ayah" placeholder="Alamat Tempat Tinggal" readonly required>
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


                                </div>
                            </div>

                            <!-- BIODATA IBU -->
                            <div class="row" id="data_ibu">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Ibu</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_ibu" id="cek_nik_ibu" maxlength="16" placeholder="Masukkan Nomor KTP Ibu" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ibu" type="button" onclick="cari_ibu()"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_ibu_anak" id="nama_ibu" placeholder="Nama Lengkap Ibu" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="warga_negara_ibu" id="warga_negara_ibu" disabled>
                                                        <option value="WNI">WARGA NEGARA INDONESIA</option>
                                                        <option value="WNA">WARGA NEGARA ASING</option>
                                                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" value="" name="warga_negara_ibu" id="warga_negara3_ibu" readonly>
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
                                                        <input type="text" class="form-control tgl_kelahiran_ibu date" id="datepicker-autoclose3" name="tgl_kelahiran_ibu" placeholder="mm/dd/yyyy" disabled>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Umur </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_ibu" id="pekerjaan_ibu" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <input type="text" class="form-control" name="umur_ibu" id="umur_ibu" readonly required>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>Tahun</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_ibu" name="alamat_ibu" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_IBU" id="rt_ibu" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_IBU" id="rw_ibu" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <!-- BIODATA SAKSI 1 -->
                            <div class="row" id="data_saksi_satu">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Saksi Satu</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_saksi_satu" id="cek_nik_saksi_satu" maxlength="16" placeholder="Masukkan Nomor KTP Saksi Satu" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_saksi_satu" type="button" onclick="cari_saksi_satu()"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_saksi_satu" id="nama_saksi_satu" placeholder="Nama Lengkap Saksi Satu" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_saksi_satu" id="tempat_lahir_saksi_satu" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_saksi_satu date" id="datepicker-autoclose4" name="tgl_kelahiran_saksi_satu" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran3_saksi_satu" id="tgl_kelahiran3_saksi_satu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Umur </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_saksi_satu" id="pekerjaan_saksi_satu" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <input type="text" class="form-control" name="umur_saksi_satu" id="umur_saksi_satu" readonly required>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>Tahun</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_saksi_satu" name="alamat_saksi_satu" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_SAKSI_SATU" id="rt_saksi_satu" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_SAKSI_SATU" id="rw_saksi_satu" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <!-- BIODATA SAKSI 2 -->
                            <div class="row" id="data_saksi_dua">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Saksi Dua</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_saksi_dua" id="cek_nik_saksi_dua" maxlength="16" placeholder="Masukkan Nomor KTP Saksi Dua" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_saksi_dua" type="button" onclick="cari_saksi_dua()"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_saksi_dua" id="nama_saksi_dua" placeholder="Nama Lengkap Saksi Dua" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat/ Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_saksi_dua" id="tempat_lahir_saksi_dua" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_saksi_dua date" id="datepicker-autoclose6" name="tgl_kelahiran_saksi_dua" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran3_saksi_dua" id="tgl_kelahiran3_saksi_dua">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan/ Umur </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="pekerjaan_saksi_dua" id="pekerjaan_saksi_dua" readonly placeholder="Pekerjaan">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <input type="text" class="form-control" name="umur_saksi_dua" id="umur_saksi_dua" readonly required>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>Tahun</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_saksi_dua" name="alamat_saksi_dua" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_SAKSI_DUA" id="rt_saksi_dua" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_SAKSI_DUA" id="rw_saksi_dua" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="card-title"><b>Sebagai Kelengkapan Persyaratan Khusus :</b></h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="padding: 5px;">#</th>
                                                    <th scope="col" style="padding: 5px;">Nama Surat</th>
                                                    <th scope="col" style="padding: 5px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row" style="padding: 5px;">1</th>
                                                    <td style="padding: 5px;">Surat Kuasa</td>
                                                    <td style="padding: 5px;">
                                                        <a href="<?= base_url('surat/cetak/surat_kuasa') ?>" class="btn btn-sm btn-info waves-effect waves-light" target="_blank" type="button">
                                                            <span class="btn-label text-white"><i class="far fa-file"></i> Buat Surat</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="padding: 5px;">2</th>
                                                    <td style="padding: 5px;">Surat Pernyataan Nama Ayah</td>
                                                    <td style="padding: 5px;">
                                                        <a href="<?= base_url('surat/cetak/surat_pernyataan_nama_ayah') ?>" class="btn btn-sm btn-info waves-effect waves-light" target="_blank" type="button">
                                                            <span class="btn-label text-white"><i class="far fa-file"></i> Buat Surat</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="padding: 5px;">3</th>
                                                    <td style="padding: 5px;">Surat Pernyataan Lahir Luar Nikah</td>
                                                    <td style="padding: 5px;">
                                                        <a href="<?= base_url('surat/cetak/surat_pernyataan_lahir_luar_nikah') ?>" class="btn btn-sm btn-info waves-effect waves-light" target="_blank" type="button">
                                                            <span class="btn-label text-white"><i class="far fa-file"></i> Buat Surat</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="padding: 5px;">4</th>
                                                    <td style="padding: 5px;">SPTJM Kebenaran Data Kelahiran</td>
                                                    <td style="padding: 5px;">
                                                        <a href="<?= base_url('surat/cetak/sptjm_kebenaran_data_kelahiran') ?>" class="btn btn-sm btn-info waves-effect waves-light" target="_blank" type="button">
                                                            <span class="btn-label text-white"><i class="far fa-file"></i> Buat Surat</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="padding: 5px;">5</th>
                                                    <td style="padding: 5px;">SPTJM Kebenaran Sebagai Pasangan Suami Istri</td>
                                                    <td style="padding: 5px;">
                                                        <a href="<?= base_url('surat/cetak/sptjm_kebenaran_sebagai_pasangan_suami_istri') ?>" class="btn btn-sm btn-info waves-effect waves-light" target="_blank" type="button">
                                                            <span class="btn-label text-white"><i class="far fa-file"></i> Buat Surat</span>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
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
            $('#data_pemohon').find('input').val('');
            $('#data_pemohon').find('select').prop('selectedIndex', 0);
            $("#nama_pemohon").attr("readonly", false);
            $("#tempat_lahir_pemohon").attr("readonly", false);
            $(".tgl_kelahiran_pemohon").attr("disabled", false);
            $("#alamat_pemohon").attr("readonly", false);
            $("#rt_pemohon").attr("readonly", false);
            $("#rw_pemohon").attr("readonly", false);
            $("#pekerjaan_pemohon").attr("readonly", false);
            $("#agama_pemohon").attr("disabled", false);
            $("#warga_negara_pemohon").attr("disabled", false);
            $("#jk_pemohon").attr("disabled", false);
            $("#umur_pemohon").attr("readonly", false);
            $("#agama_pemohon").attr("disabled", false);
            $("#status_kawin_pemohon").attr("disabled", false);
            $("#gol_darah_pemohon").attr("disabled", false);

            $("#agama3_pemohon").attr("disabled", true);
            $("#status_kawin3_pemohon").attr("disabled", true);
            $("#gol_darah3_pemohon").attr("disabled", true);
            $("#jk3_pemohon").attr("disabled", true);
            $("#warga_negara3_pemohon").attr("disabled", true);
            $("#tgl_kelahiran3_pemohon").attr("disabled", true);
            $("#agama3_pemohon").attr("disabled", true);
            $('select').trigger('change');

        }

        function manual2() {
            $('#data_anak').find('input').val('');
            $('#data_anak').find('select').prop('selectedIndex', 0);
            $("#nama_anak").attr("readonly", false);
            $("#tempat_lahir_anak").attr("readonly", false);
            $(".tgl_kelahiran_anak").attr("disabled", false);
            $("#agama_anak").attr("disabled", false);
            $("#jk_anak").attr("disabled", false);


            $("#jk3_anak").attr("disabled", true);
            $("#tgl_kelahiran3_anak").attr("disabled", true);
            $("#agama3_anak").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual3() {
            $('#data_ayah').find('input').val('');
            $('#data_ayah').find('select').prop('selectedIndex', 0);
            $("#nama_ayah").attr("readonly", false);
            $("#tempat_lahir_ayah").attr("readonly", false);
            $(".tgl_kelahiran_ayah").attr("disabled", false);
            $("#alamat_ayah").attr("readonly", false);
            $("#rt_ayah").attr("readonly", false);
            $("#rw_ayah").attr("readonly", false);
            $("#pekerjaan_ayah").attr("readonly", false);
            $("#umur_ayah").attr("readonly", false);
            $("#warga_negara_ayah").attr("disabled", false);

            $("#warga_negara3_ayah").attr("disabled", true);
            $("#tgl_kelahiran3_ayah").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual4() {
            $('#data_ibu').find('input').val('');
            $('#data_ibu').find('select').prop('selectedIndex', 0);
            $("#nama_ibu").attr("readonly", false);
            $("#tempat_lahir_ibu").attr("readonly", false);
            $(".tgl_kelahiran_ibu").attr("disabled", false);
            $("#alamat_ibu").attr("readonly", false);
            $("#rt_ibu").attr("readonly", false);
            $("#rw_ibu").attr("readonly", false);
            $("#pekerjaan_ibu").attr("readonly", false);
            $("#umur_ibu").attr("readonly", false);
            $("#warga_negara_ibu").attr("disabled", false);

            $("#warga_negara3_ibu").attr("disabled", true);
            $("#tgl_kelahiran3_ibu").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual5() {
            $('#data_saksi_satu').find('input').val('');
            $('#data_saksi_satu').find('select').prop('selectedIndex', 0);
            $("#nama_saksi_satu").attr("readonly", false);
            $("#tempat_lahir_saksi_satu").attr("readonly", false);
            $(".tgl_kelahiran_saksi_satu").attr("disabled", false);
            $("#alamat_saksi_satu").attr("readonly", false);
            $("#rt_saksi_satu").attr("readonly", false);
            $("#rw_saksi_satu").attr("readonly", false);
            $("#pekerjaan_saksi_satu").attr("readonly", false);
            $("#umur_saksi_satu").attr("readonly", false);

            $("#tgl_kelahiran3_saksi_satu").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual6() {
            $('#data_saksi_dua').find('input').val('');
            $('#data_saksi_dua').find('select').prop('selectedIndex', 0);
            $("#nama_saksi_dua").attr("readonly", false);
            $("#tempat_lahir_saksi_dua").attr("readonly", false);
            $(".tgl_kelahiran_saksi_dua").attr("disabled", false);
            $("#alamat_saksi_dua").attr("readonly", false);
            $("#rt_saksi_dua").attr("readonly", false);
            $("#rw_saksi_dua").attr("readonly", false);
            $("#pekerjaan_saksi_dua").attr("readonly", false);
            $("#umur_saksi_dua").attr("readonly", false);

            $("#tgl_kelahiran3_saksi_dua").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual7() {
            $('#data_kepala_keluarga').find('input').val('');
            $("#nama_kepala_keluarga").attr("readonly", false);
            $("#no_kk_kepala_keluarga").attr("readonly", false);

        }


        window.onload = function() {
            $('.tgl_kelahiran_pemohon').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur_pemohon').val(age);
            });
            $('.tgl_kelahiran_ayah').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur_ayah').val(age);
            });
            $('.tgl_kelahiran_ibu').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur_ibu').val(age);
            });
            $('.tgl_kelahiran_saksi_satu').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur_saksi_satu').val(age);
            });
            $('.tgl_kelahiran_saksi_dua').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur_saksi_dua').val(age);
            });
        }
    </script>
    <script>
        function cari_kepala_keluarga() {
            if ($('#cek_nik_kepala_keluarga').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                $("#btn_nik_kepala").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_kepala").attr("disabled", true);
                // let timerInterval
                let nik_ = $("#cek_nik_kepala_keluarga").val();
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


                                    $("#nama_kepala_keluarga").val(data.NAMA_LGKP);
                                    $("#nama_kepala_keluarga").attr("readonly", true);
                                    $("#no_kk_kepala_keluarga").val(data.NO_KK);
                                    $("#no_kk_kepala_keluarga").attr("readonly", true);

                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_kepala").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_kepala").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_kepala_keluarga').find('input').val('');
                                    $("#btn_nik_kepala").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_kepala").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_kepala").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_kepala").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_pemohon() {
            if ($('#cek_nik_pemohon').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_pemohon").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_pemohon").attr("disabled", true);
                let nik_ = $("#cek_nik_pemohon").val();
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
                                    $("#nama_pemohon").val(data.NAMA_LGKP);
                                    $("#nama_pemohon").attr("readonly", true);

                                    $("#tempat_lahir_pemohon").val(data.TMPT_LHR);
                                    $("#tempat_lahir_pemohon").attr("readonly", true);

                                    $("#jk_pemohon").val(data.JENIS_KLMIN);
                                    $("#jk3_pemohon").val(data.JENIS_KLMIN);
                                    $("#jk_pemohon").attr("disabled", true);
                                    $("#jk3_pemohon").attr("disabled", false);

                                    $(".tgl_kelahiran_pemohon").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_pemohon").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_pemohon").attr("disabled", true);
                                    $("#tgl_kelahiran3_pemohon").attr("disabled", false);

                                    let dob = new Date(data.TGL_LHR);
                                    let today = new Date();
                                    let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                                    $('#umur_pemohon').val(age);
                                    $('#umur_pemohon').attr("readonly", true);

                                    $("#warga_negara_pemohon").val("WNI");
                                    $("#warga_negara3_pemohon").val("WNI");
                                    $("#warga_negara_pemohon").attr("disabled", true);
                                    $("#warga_negara3_pemohon").attr("disabled", false);

                                    $("#agama_pemohon").val(data.AGAMA);
                                    $("#agama3_pemohon").val(data.AGAMA);
                                    $("#agama_pemohon").attr("disabled", true);
                                    $("#agama3_pemohon").attr("disabled", false);

                                    $("#status_kawin_pemohon").val(data.STATUS_KAWIN);
                                    $("#status_kawin3_pemohon").val(data.STATUS_KAWIN);
                                    $("#status_kawin_pemohon").attr("disabled", true);
                                    $("#status_kawin3_pemohon").attr("disabled", false);
                                    $("#gol_darah_pemohon").val(data.GOL_DARAH);
                                    $("#gol_darah3_pemohon").val(data.GOL_DARAH);
                                    $("#gol_darah_pemohon").attr("disabled", true);
                                    $("#gol_darah3_pemohon").attr("disabled", false);


                                    $("#pekerjaan_pemohon").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_pemohon").attr("readonly", true);

                                    $("#alamat_pemohon").val(data.ALAMAT);
                                    $("#alamat_pemohon").attr("readonly", true);
                                    $("#rt_pemohon").val(data.NO_RT);
                                    $("#rt_pemohon").attr("readonly", true);
                                    $("#rw_pemohon").val(data.NO_RW);
                                    $("#rw_pemohon").attr("readonly", true);
                                    $("select").trigger('change');
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_pemohon").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_pemohon").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_pemohon').find('input').val('');
                                    $('#data_pemohon').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_pemohon").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_pemohon").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_pemohon").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_pemohon").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

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
                                if (response.respon_code == 1) {
                                    // alert("asu");
                                    let data = response.content[0];

                                    $("#nama_anak").val(data.NAMA_LGKP);
                                    $("#nama_anak").attr("readonly", true);

                                    $("#tempat_lahir_anak").val(data.TMPT_LHR);
                                    $("#tempat_lahir_anak").attr("readonly", true);

                                    $(".tgl_kelahiran_anak").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_anak").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_anak").attr("disabled", true);
                                    $("#tgl_kelahiran3_anak").attr("disabled", false);

                                    let tanggal_lama = data.TGL_LHR;
                                    let date1 = tanggal_lama.split("-");
                                    let newdate = date1[1] + '/' + date1[2] + '/' + date1[0];
                                    let local = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

                                    let today = new Date(newdate);
                                    let dd = today.getDay();

                                    //alert(local[today.getDay()]);
                                    // $('#hari').val(local[today.getDay()]);
                                    $('#hari').val(local[dd]);

                                    $("#agama_anak").val(data.AGAMA);
                                    $("#agama3_anak").val(data.AGAMA);
                                    $("#agama_anak").attr("disabled", true);
                                    $("#agama3_anak").attr("disabled", false);

                                    $("#jk_anak").val(data.JENIS_KLMIN);
                                    $("#jk3_anak").val(data.JENIS_KLMIN);
                                    $("#jk3_anak").attr("disabled", false);
                                    $("#jk_anak").attr("disabled", true);
                                    $("select").trigger('change');

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

        function cari_ayah() {
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

                                    let dob = new Date(data.TGL_LHR);
                                    let today = new Date();
                                    let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                                    $('#umur_ayah').val(age);
                                    $('#umur_ayah').attr("readonly", true);
                                    $("#pekerjaan_ayah").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ayah").attr("readonly", true);

                                    $("#warga_negara_ayah").val("WNI");
                                    $("#warga_negara3_ayah").val("WNI");
                                    $("#warga_negara_ayah").attr("disabled", true);
                                    $("#warga_negara3_ayah").attr("disabled", false);

                                    $("#alamat_ayah").val(data.ALAMAT);
                                    $("#alamat_ayah").attr("readonly", true);

                                    $("#rt_ayah").val(data.NO_RT);
                                    $("#rt_ayah").attr("readonly", true);
                                    $("#rw_ayah").val(data.NO_RW);
                                    $("#rw_ayah").attr("readonly", true);


                                    $("select").trigger('change');

                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_ayah").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ayah").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_ayah').find('input').val('');
                                    $('#data_ayah').find('select').prop('selectedIndex', 0);
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

        function cari_ibu() {
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

                                    let dob = new Date(data.TGL_LHR);
                                    let today = new Date();
                                    let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                                    $('#umur_ibu').val(age);
                                    $('#umur_ibu').attr("readonly", true);
                                    $("#pekerjaan_ibu").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_ibu").attr("readonly", true);

                                    $("#alamat_ibu").val(data.ALAMAT);
                                    $("#alamat_ibu").attr("readonly", true);

                                    $("#rt_ibu").val(data.NO_RT);
                                    $("#rt_ibu").attr("readonly", true);
                                    $("#rw_ibu").val(data.NO_RW);
                                    $("#rw_ibu").attr("readonly", true);


                                    $("select").trigger('change');

                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_ibu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_ibu").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_ibu').find('input').val('');
                                    $('#data_ibu').find('select').prop('selectedIndex', 0);
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

        function cari_saksi_satu() {
            if ($('#cek_nik_saksi_satu').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_saksi_satu").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_saksi_satu").attr("disabled", true);
                let nik_ = $("#cek_nik_saksi_satu").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
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

                                    $("#nama_saksi_satu").val(data.NAMA_LGKP);
                                    $("#nama_saksi_satu").attr("readonly", true);

                                    $("#tempat_lahir_saksi_satu").val(data.TMPT_LHR);
                                    $("#tempat_lahir_saksi_satu").attr("readonly", true);

                                    $(".tgl_kelahiran_saksi_satu").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_saksi_satu").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_saksi_satu").attr("disabled", true);
                                    $("#tgl_kelahiran3_saksi_satu").attr("disabled", false);

                                    let dob = new Date(data.TGL_LHR);
                                    let today = new Date();
                                    let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                                    $('#umur_saksi_satu').val(age);
                                    $('#umur_saksi_satu').attr("readonly", true);
                                    $("#pekerjaan_saksi_satu").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_saksi_satu").attr("readonly", true);

                                    $("#alamat_saksi_satu").val(data.ALAMAT);
                                    $("#alamat_saksi_satu").attr("readonly", true);

                                    $("#rt_saksi_satu").val(data.NO_RT);
                                    $("#rt_saksi_satu").attr("readonly", true);
                                    $("#rw_saksi_satu").val(data.NO_RW);
                                    $("#rw_saksi_satu").attr("readonly", true);
                                    $("select").trigger('change');

                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_saksi_satu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_saksi_satu").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_saksi_satu').find('input').val('');
                                    $('#data_saksi_satu').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_saksi_satu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_saksi_satu").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_saksi_satu").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_saksi_satu").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_saksi_dua() {
            if ($('#cek_nik_saksi_dua').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_saksi_dua").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_saksi_dua").attr("disabled", true);
                let nik_ = $("#cek_nik_saksi_dua").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
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

                                    $("#nama_saksi_dua").val(data.NAMA_LGKP);
                                    $("#nama_saksi_dua").attr("readonly", true);

                                    $("#tempat_lahir_saksi_dua").val(data.TMPT_LHR);
                                    $("#tempat_lahir_saksi_dua").attr("readonly", true);

                                    $(".tgl_kelahiran_saksi_dua").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_saksi_dua").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_saksi_dua").attr("disabled", true);
                                    $("#tgl_kelahiran3_saksi_dua").attr("disabled", false);

                                    let dob = new Date(data.TGL_LHR);
                                    let today = new Date();
                                    let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                                    $('#umur_saksi_dua').val(age);
                                    $('#umur_saksi_dua').attr("readonly", true);
                                    $("#pekerjaan_saksi_dua").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_saksi_dua").attr("readonly", true);

                                    $("#alamat_saksi_dua").val(data.ALAMAT);
                                    $("#alamat_saksi_dua").attr("readonly", true);

                                    $("#rt_saksi_dua").val(data.NO_RT);
                                    $("#rt_saksi_dua").attr("readonly", true);
                                    $("#rw_saksi_dua").val(data.NO_RW);
                                    $("#rw_saksi_dua").attr("readonly", true);
                                    $("select").trigger('change');

                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_saksi_dua").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_saksi_dua").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_saksi_dua').find('input').val('');
                                    $('#data_saksi_dua').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_saksi_dua").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_saksi_dua").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_saksi_dua").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_saksi_dua").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }
    </script>