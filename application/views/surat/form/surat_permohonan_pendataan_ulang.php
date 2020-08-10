<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Permohonan Pendataan Ulang</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Permohonan Pendataan Ulang</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= $form_action ?>" method="POST">
                            <?php
                            include 'form-nomor-surat.php';
                            ?>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-3 col-form-label">NIK / No. Kartu Keluarga</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control maxlength" name="NIK" id="nik" maxlength="16" placeholder="Masukkan Nomor Induk Pemohon" onkeyup="validate();" onblur="cek_nik();" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control maxlength" type="text" name="NO_KK" id="no_kk" placeholder="Nomor Kartu Keluarga" maxlength="16" onkeyup="validate();" onblur="cek_kk();" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Nama / Status Hubungan Keluarga</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" value="" name="NAMA_LGKP" id="nama" placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="select2 form-control custom-select " style="width: 100%;" name="STAT_HBKEL" id="status_Hubungan" placeholder="Hubungan Dengan Keluarga" required>
                                                <option value="">Pilih Hubungan Keluarga</option>
                                                <?php foreach (hubungan_keluarga() as $hubungan) : ?>
                                                    <option value="<?= $hubungan ?>"><?= $hubungan; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Jenis Kelamin / Tempat / Tanggal Lahir</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="select2 form-control custom-select" style="width: 100%;" name="JENIS_KLMIN" id="jk" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                                <option value="PEREMPUAN">PEREMPUAN</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text" value="" name="TMPT_LHR" id="tempat_lahir" placeholder="Tempat Lahir" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group" style="width: 100%;">
                                                <input type="text" class="form-control tgl_kelahiran" id="datepicker-autoclose2" name="TGL_LHR" placeholder="mm/dd/yyyy" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-3 col-form-label">Alamat / No RT / No RW</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" value="" id="alamat" name="ALAMAT" placeholder="Alamat Tempat Tinggal" required>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group mb-1" style="width: 100%;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><b>RT </b></span>
                                                </div>
                                                <input type="text" class="form-control" name="NO_RT" id="NO_RT" onkeyup="validate()" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group mb-1" style="width: 100%;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><b>RW </b></span>
                                                </div>
                                                <input type="text" class="form-control" name="NO_RW" id="NO_RW" onkeyup="validate()" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Pekerjaan / Agama / Warga Negara </label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" value="" name="JENIS_PKRJN" id="pekerjaan" placeholder="Pekerjaan" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="div_warga">
                                                <select class="select2 form-control custom-select" style="width: 100%;" name="WARGA_NEGARA" id="warga_negara">
                                                    <option value="INDONESIA">WARGA NEGARA INDONESIA</option>
                                                    <option value="WARGA NEGARA ASING">WARGA NEGARA ASING</option>
                                                    <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Agama / Gol. Darah </label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <select class="select2 form-control custom-select " style="width: 100%;" name="AGAMA" id="agama" required>
                                                <option value="">Pilih Agama</option>
                                                <?php foreach (daftar_agama() as $agama) : ?>
                                                    <option value="<?= $agama ?>"><?= $agama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="div_goldar">
                                                <select class="select2 form-control custom-select" style="width: 100%;" name="GOL_DARAH" id="gol_darah" required>
                                                    <option value="">Pilih Golongan Darah</option>
                                                    <?php foreach (daftar_goldar() as $goldar) : ?>
                                                        <option value="<?= $goldar ?>"><?= $goldar ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap Ayah / Nama Lengkap Ibu </label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="NAMA_LGKP_AYAH" placeholder="Nama Lengkap Ayah" id="NAMA_LGKP_AYAH" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text" name="NAMA_LGKP_IBU" id="NAMA_LGKP_IBU" placeholder="Nama Lengkap Ibu" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Status Perkawinan / Tanggal Kawin </label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <select class="select2 form-control custom-select" style="width: 100%;" name="STATUS_KAWIN" id="status_kawin" required>
                                                <option value="">Pilih Status Perkawinan</option>
                                                <option value="KAWIN">SUDAH KAWIN</option>
                                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" id="div_tgl_kawin">
                                            <div class="input-group" style="width: 100%;">
                                                <input type="text" class="form-control tgl_kawin" id="datepicker-autoclose" name="TGL_KWN" placeholder="mm/dd/yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Nomor Akta Lahir / Pendidikan Terakhir</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="NO_AKTA_LHR" id="no_akta" placeholder="Nomor Akta Lahir">
                                        </div>
                                        <div class="col-md-4">
                                            <select class="select2 form-control custom-select" style="width: 100%;" name="PDDK_AKH" id="pendidikan_terakhir" required>
                                                <option value="">Pilih Pendidikan Terakhir</option>
                                                <?php foreach (pendidikan_terakhir() as $pendidikan) : ?>
                                                    <option value="<?= $pendidikan ?>"><?= $pendidikan; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
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

    <script>
        $(document).ready(function() {
            $("#status_kawin").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'BELUM KAWIN') {
                        $("#div_tgl_kawin").hide();
                    } else {
                        $("#div_tgl_kawin").show();
                    }
                });
            }).change();
        });

        function validate() {
            let nik = document.getElementById("nik");
            nik.value = nik.value.replace(/[^0-9]/, '');
            let kk = document.getElementById("no_kk");
            kk.value = kk.value.replace(/[^0-9]/, '');
        }

        function cek_nik() {
            if ($('#nik').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                return true;
            }
        }

        function cek_kk() {
            if ($('#no_kk').val().length != 16) {
                Swal.fire("INFO", "Panjang Nomor KK harus 16 karakter", "warning")
            } else {
                return true;
            }
        }
    </script>