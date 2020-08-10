<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Pernyataan Nama Ayah</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Pernyataan Nama Ayah</h4>
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

                            <!-- BIODATA Pemohon -->
                            <div class="row" id="data_pemohon">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Pemohon</h6>
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
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_pemohon" onclick="cari_pemohon();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_pemohon" id="nama_pemohon" placeholder="Nama Lengkap" readonly>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_pemohon" id="pekerjaan_pemohon" readonly placeholder="Pekerjaan" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nomor HP </label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nomor_hp_pemohon" id="nomor_hp_pemohon" required placeholder="Nomor HP">
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
                                        <label for="example-search-input" class="col-3 col-form-label">Nama pada Buku Nikah / Akta Perkawinan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_ayah_buku_nikah" id="nama_ayah_buku_nikah" placeholder="Nama Lengkap Ayah pada Buku Nikah / Akta Perkawinan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama pada KTP</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_ayah_ktp" id="nama_ayah_ktp" placeholder="Nama Lengkap Ayah pada KTP">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama pada KK</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_ayah_kk" id="nama_ayah_kk" placeholder="Nama Lengkap Ayah pada KK">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama pada Ijazah Termohon</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_ayah_ijazah" id="nama_ayah_ijazah" placeholder="Nama Lengkap Ayah pada Ijazah Termohon">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama pada Akta Kelahiran</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_ayah_akta" id="nama_ayah_akta" placeholder="Nama Lengkap Ayah pada Akta Kelahiran">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA ANAK -->
                            <div class="row" id="data_anak">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Anak</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_anak" id="nama_anak" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_anak" id="tempat_lahir_anak" placeholder="Tempat Lahir">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_anak" id="datepicker-autoclose" name="tgl_kelahiran_anak" placeholder="mm/dd/yyyy">
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
            $('#data_pemohon').find('input').val('');
            $('#data_pemohon').find('select').prop('selectedIndex', 0);
            $("#nama_pemohon").attr("readonly", false);
            $("#tempat_lahir_pemohon").attr("readonly", false);
            $(".tgl_kelahiran_pemohon").attr("disabled", false);
            $("#alamat_pemohon").attr("readonly", false);
            $("#rt_pemohon").attr("readonly", false);
            $("#rw_pemohon").attr("readonly", false);
            $("#pekerjaan_pemohon").attr("readonly", false);
            $("#umur_pemohon").attr("readonly", false);

            $("#tgl_kelahiran3_pemohon").attr("disabled", true);
            $('select').trigger('change');
        }


        window.onload = function() {
            $('.tgl_kelahiran_pemohon').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur_pemohon').val(age);
            });
        }
    </script>
    <script>
        function cari_pemohon() {
            if ($('#cek_nik_pemohon').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                $("#btn_nik_pemohon").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_pemohon").attr("disabled", true);
                let nik_ = $("#cek_nik_pemohon").val();
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    html: 'Proses Mencari Data Pada Dindukcapil',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
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

                                    $(".tgl_kelahiran_pemohon").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_pemohon").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_pemohon").attr("disabled", true);
                                    $("#tgl_kelahiran3_pemohon").attr("disabled", false);

                                    let dob = new Date(data.TGL_LHR);
                                    let today = new Date();
                                    let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                                    $('#umur_pemohon').val(age);
                                    $('#umur_pemohon').attr("readonly", true);
                                    $("#pekerjaan_pemohon").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_pemohon").attr("readonly", true);

                                    $("#alamat_pemohon").val(data.ALAMAT);
                                    $("#alamat_pemohon").attr("readonly", true);
                                    $("#rt_pemohon").val(data.NO_RT);
                                    $("#rt_pemohon").attr("readonly", true);
                                    $("#rw_pemohon").val(data.NO_RW);
                                    $("#rw_pemohon").attr("readonly", true);


                                    $("select").trigger('change');
                                    // $("select").select2({disabled:readonly});
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
    </script>