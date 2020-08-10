<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Layanan Kependudukan</h4>
            </div>

        </div>
    </div>
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Cek Data Penduduk</h4>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="cek_nik" id="cek_nik" onkeyup="validate()" placeholder="Masukkan Nomor Induk Pemohon" maxlength="16" aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-info ultra-disabled" type="button" onclick="klik();" id="cari-btn"><i class="fa fa-search"></i> Cari NIK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" id="bodyGagal" style="display: none;">
                <div id="alert"></div>
                <div id="btn-surat">
                    <a href="<?= base_url('surat/cetak/surat_permohonan_pendataan_ulang') ?>">
                        <button type="button" class="btn btn-info">Buat Surat Permohonan Pendataan Ulang</button>
                    </a>
                </div>
            </div>
            <div class="col-12" id="bodyid" style="display: none;">
                <h4 class="card-title">Hasil Pencarian : </h4>
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="mb-0" id="judul"></h4>
                    </div>
                    <div class="card-body">
                        <form id="biodata">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input class="form-control" type="text" name="NIK" id="nik" placeholder="Nomor Induk Kependudukan" required>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. KK</label>
                                        <input class="form-control" type="text" name="NO_KK" id="no_kk" placeholder="Nomor Kartu Keluarga" required>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" type="text" name="NAMA_LGKP" id="nama_lengkap" placeholder="Nama Lengkap" required>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hubungan Dengan Keluarga</label>
                                        <input class="form-control" type="text" name="STAT_HBKEL" id="hubungan" placeholder="Hubungan Keluarga" required>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="JENIS_KLMIN" id="jk" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                                            <option value="PEREMPUAN">PEREMPUAN</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat lahir</label>
                                        <input class="form-control" type="text" name="TMPT_LHR" id="tempat_lahir" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" class="form-control tgl_lahir" id="datepicker-autoclose2" name="TGL_LHR" placeholder="mm/dd/yyyy">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Golongan Darah</label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="GOL_DARAH" id="gol_darah">
                                            <option value="">Pilih Golongan Darah</option>
                                            <?php foreach (daftar_goldar() as $goldar) : ?>
                                                <option value="<?= $goldar ?>"><?= $goldar ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kewarganegaraan</label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="WARGA_NEGARA" id="warga_negara">
                                            <option value="INDONESIA">WARGA NEGARA INDONESIA</option>
                                            <option value="WARGA NEGARA ASING">WARGA NEGARA ASING</option>
                                            <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="select2 form-control custom-select " style="width: 100%;" name="AGAMA" id="agama" required>
                                            <option value="">Pilih Agama</option>
                                            <?php foreach (daftar_agama() as $agama) : ?>
                                                <option value="<?= $agama ?>"><?= $agama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status Perkawinan</label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="STATUS_KAWIN" id="status_kawin" required>
                                            <option value="">Pilih Status Perkawinan</option>
                                            <option value="KAWIN BELUM TERCATAT">KAWIN BELUM TERCATAT</option>
                                            <option value="KAWIN TERCATAT">KAWIN TERCATAT</option>
                                            <option value="BELUM KAWIN">BELUM KAWIN</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Kawin</label>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" class="form-control tgl_kawin" id="datepicker-autoclose" name="tgl_kawin" placeholder="mm/dd/yyyy">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input class="form-control" type="text" name="JENIS_PKRJN" id="pekerjaan" required placeholder="Jenis Pekerjaan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap Ayah</label>
                                        <input class="form-control" type="text" name="NAMA_LGKP_AYAH" id="nama_ayah" required placeholder="Nama Lengkap Ayah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap Ibu</label>
                                        <input class="form-control" type="text" name="NAMA_LGKP_IBU" id="nama_ibu" required placeholder="Nama Lengkap Ibu">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input class="form-control" type="text" name="ALAMAT" id="alamat" required placeholder="Alamat Tempat Tinggal">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>RT</label>
                                                <input class="form-control" type="text" name="NO_RT" id="rt" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>RW</label>
                                                <input class="form-control" type="text" name="NO_RW" id="rw" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Akta Lahir</label>
                                        <input class="form-control" type="text" name="NO_AKTA_LHR" id="no_akta" placeholder="Nomor Akta Lahir">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="PDDK_AKH" id="pendidikan_terakhir" required>
                                            <option value="">Pilih Pendidikan Terakhir</option>
                                            <?php foreach (pendidikan_terakhir() as $pendidikan) : ?>
                                                <option value="<?= $pendidikan ?>"><?= $pendidikan; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->

                            </div>
                            <div class="row" id="pamong">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pamong</label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="pamong" id="pamong">
                                            <option value="">Pilih Salah Satu</option>
                                            <?php foreach ($pamong as $data) : ?>
                                                <option value="<?= $data->id_pamong ?>"><?= $data->nama_pamong ?> (<?= $data->nama_jabatan ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Cetak</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validate() {
        var element = document.getElementById('cek_nik');
        element.value = element.value.replace(/[^0-9]/, '');
    };

    function klik() {
        if ($('#cek_nik').val().length != 16) {
            Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
        } else {
            $('#cari-btn').html("<i class='fa fa-search'></i> Sedang Mencari...");
            $('#cari-btn').attr("disabled", true);
            let nik_ = $("#cek_nik").val();
            Swal.fire({
                title: 'Mohon Tunggu Beberapa Saat',
                html: 'Proses Mencari Data Pada Dindukcapil',
                onBeforeOpen: () => {
                    Swal.showLoading();
                    $.ajax({
                        type: "GET",
                        url: "<?= urlNik(); ?>",
                        data: {
                            "nik": nik_
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.respon_code == 1) {
                                $('#cari-btn').html("<i class='fa fa-search'></i> Cari NIK");
                                $('#cari-btn').attr("disabled", false);
                                let data = response.content[0];
                                $('#biodata input').attr('readonly', 'readonly');
                                $("#judul").html("Detail Data Penduduk");
                                $("#nik").val(data.NIK);
                                $("#no_kk").val(data.NO_KK);
                                $("#nama_lengkap").val(data.NAMA_LGKP);
                                $("#jk").val(data.JENIS_KLMIN);
                                $("#jk").attr("disabled", true);

                                $("#tempat_lahir").val(data.TMPT_LHR);
                                $(".tgl_lahir").val(data.TGL_LHR);
                                $(".tgl_lahir").attr('disabled', true);

                                $("#gol_darah").val(data.GOL_DARAH);
                                $("#gol_darah").attr("disabled", true);

                                $("#hubungan").val(data.STAT_HBKEL);
                                $("#warga_negara").val("INDONESIA");
                                $("#warga_negara").attr("disabled", true);

                                $("#agama").val(data.AGAMA);
                                $("#agama").attr("disabled", true);

                                $("#status_kawin").val(data.STATUS_KAWIN);
                                $("#status_kawin").attr("disabled", true);

                                $("#pendidikan_terakhir").val(data.PDDK_AKH);
                                $("#pendidikan_terakhir").attr("disabled", true);

                                $("#pekerjaan").val(data.JENIS_PKRJN);
                                $("#nama_ibu").val(data.NAMA_LGKP_IBU);
                                $("#nama_ayah").val(data.NAMA_LGKP_AYAH);
                                $("#alamat").val(data.ALAMAT);
                                $("#rt").val(data.NO_RT);
                                $("#rw").val(data.NO_RW);
                                $("#no_akta").val(data.NO_AKTA_LHR);
                                $("#pamong").hide();

                                //TGL KAWIN
                                if (data.TGL_KWN == null) {
                                    $(".tgl_kawin").val("-");
                                } else {
                                    $(".tgl_kawin").val(data.TGL_KWN);
                                }
                                // NO AKTA
                                if (data.NO_AKTA_LHR == null) {
                                    $("#no_akta").val("-");
                                } else {
                                    $("#no_akta").val(data.NO_AKTA_LHR);
                                }
                                // STATUS_KAWIN
                                if (data.STATUS_KAWIN == "KAWIN" && data.TGL_KWN == null) {
                                    $("#status_kawin").val("KAWIN BELUM TERCATAT");
                                    $("#status_kawin3").val("KAWIN BELUM TERCATAT");
                                } else if (data.STATUS_KAWIN == "KAWIN" && data.TGL_KWN != null) {
                                    $("#status_kawin").val("KAWIN TERCATAT");
                                    $("#status_kawin3").val("KAWIN TERCATAT");
                                } else {
                                    $("#status_kawin").val("BELUM KAWIN");
                                    $("#status_kawin3").val("BELUM KAWIN");
                                }
                                $("select").trigger('change');
                                $("#alert").html("");

                                Swal.close();
                                Swal.fire("Berhasil", response.respon_message, "success").then((result) => {
                                    if (result.value) {
                                        $('#bodyid').show();
                                        $('#bodyGagal').hide();

                                    }
                                })
                            } else {
                                $("#alert").html("<div class='alert alert-danger alert-rounded'><i class='far fa-times-circle'></i> Oops, mohon maaf data tidak ditemukan, Silahkan membuat pengajuan permohonan pendataan ulang dengan klik tombol dibawah ini.<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span></button></div>");
                                Swal.close();
                                Swal.fire("Oops", "Data Tidak Ditemukan", "error").then((result) => {
                                    if (result.value) {
                                        $('#cari-btn').html("<i class='fa fa-search'></i> Cari NIK");
                                        $('#cari-btn').attr("disabled", false);
                                        $('#bodyGagal').show();
                                        $('#bodyid').hide();
                                    }
                                })
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                            Swal.fire("Oops", xhr.responseText, "error");
                            $('#cari-btn').html("<i class='fa fa-search'></i> Cari NIK");
                            $('#cari-btn').attr("disabled", false);
                        }
                    });
                }
            });
        }
    }
</script>