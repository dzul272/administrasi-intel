<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Kuasa</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Kuasa</h4>
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

                            <!-- BIODATA PEMBERI -->
                            <div class="row" id="data_pemberi">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Pemberi Kuasa</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_pemberi" id="cek_nik_pemberi" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP Pemberi Kuasa" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_pemberi" type="button" onclick="cari_pemberi();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_pemberi" id="nama_pemberi" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir / Umur</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_pemberi" id="tempat_lahir_pemberi" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_pemberi" id="datepicker-autoclose" name="tgl_kelahiran_pemberi" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_pemberi" id="tgl_kelahiran3_pemberi">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <input type="text" class="form-control" name="umur_pemberi" id="umur_pemberi" readonly required>
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
                                                    <input class="form-control" type="text" value="" id="alamat_pemberi" name="alamat_pemberi" placeholder="Alamat Tempat Tinggal Pemberi" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_PEMBERI" id="rt_pemberi" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_PEMBERI" id="rw_pemberi" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_pemberi" id="pekerjaan_pemberi" readonly placeholder="Pekerjaan" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nomor HP </label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nomor_hp_pemberi" id="nomor_hp" required placeholder="Nomor HP">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA PENERIMA -->
                            <div class="row" id="data_penerima">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Penerima Kuasa</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_penerima" id="cek_nik_penerima" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP Penerima Kuasa" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_penerima" type="button" onclick="cari_penerima();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_penerima" id="nama_penerima" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir / Umur</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_penerima" id="tempat_lahir_penerima" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_penerima" id="datepicker-autoclose" name="tgl_kelahiran_penerima" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_penerima" id="tgl_kelahiran3_penerima">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <input type="text" class="form-control" name="umur_penerima" id="umur_penerima" readonly required>
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
                                                    <input class="form-control" type="text" value="" id="alamat_penerima" name="alamat_penerima" placeholder="Alamat Tempat Tinggal Penerima" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_PENERIMA" id="rt_penerima" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_PENERIMA" id="rw_penerima" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_penerima" id="pekerjaan_penerima" readonly placeholder="Pekerjaan" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nomor HP </label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nomor_hp_penerima" id="nomor_hp" required placeholder="Nomor HP">
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
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_anak" id="cek_nik_anak" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP Anak" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_anak" type="button" onclick="cari_anak();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_anak" id="nama_anak" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_anak" id="tempat_lahir_anak" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_anak" id="datepicker-autoclose" name="tgl_kelahiran_anak" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_anak" id="tgl_kelahiran3_anak">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_anak" name="alamat_anak" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_ANAK" id="rt_anak" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_ANAK" id="rw_anak" onkeyup="validate()" readonly required>
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
            $('#data_pemberi').find('input').val('');
            $('#data_pemberi').find('select').prop('selectedIndex', 0);
            $("#nama_pemberi").attr("readonly", false);
            $("#tempat_lahir_pemberi").attr("readonly", false);
            $(".tgl_kelahiran_pemberi").attr("disabled", false);
            $("#alamat_pemberi").attr("readonly", false);
            $("#rt_pemberi").attr("readonly", false);
            $("#rw_pemberi").attr("readonly", false);
            $("#pekerjaan_pemberi").attr("readonly", false);
            $("#umur_pemberi").attr("readonly", false);

            $("#tgl_kelahiran3_pemberi").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual2() {
            $('#data_penerima').find('input').val('');
            $('#data_penerima').find('select').prop('selectedIndex', 0);
            $("#nama_penerima").attr("readonly", false);
            $("#tempat_lahir_penerima").attr("readonly", false);
            $(".tgl_kelahiran_penerima").attr("disabled", false);
            $("#alamat_penerima").attr("readonly", false);
            $("#rt_penerima").attr("readonly", false);
            $("#rw_penerima").attr("readonly", false);
            $("#pekerjaan_penerima").attr("readonly", false);
            $("#umur_penerima").attr("readonly", false);

            $("#tgl_kelahiran3_penerima").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual3() {
            $('#data_anak').find('input').val('');
            $('#data_anak').find('select').prop('selectedIndex', 0);
            $("#nama_anak").attr("readonly", false);
            $("#tempat_lahir_anak").attr("readonly", false);
            $(".tgl_kelahiran_anak").attr("disabled", false);
            $("#alamat_anak").attr("readonly", false);
            $("#rt_anak").attr("readonly", false);
            $("#rw_anak").attr("readonly", false);

            $("#tgl_kelahiran3_anak").attr("disabled", true);
            $('select').trigger('change');
        }


        window.onload = function() {
            $('.tgl_kelahiran_pemberi').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur_pemberi').val(age);
            });
            $('.tgl_kelahiran_penerima').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur_penerima').val(age);
            });
        }
    </script>
    <script>
        function cari_pemberi() {
            if ($('#cek_nik_pemberi').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_pemberi").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_pemberi").attr("disabled", true);
                let nik_ = $("#cek_nik_pemberi").val();
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

                                    $("#nama_pemberi").val(data.NAMA_LGKP);
                                    $("#nama_pemberi").attr("readonly", true);

                                    $("#tempat_lahir_pemberi").val(data.TMPT_LHR);
                                    $("#tempat_lahir_pemberi").attr("readonly", true);

                                    $(".tgl_kelahiran_pemberi").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_pemberi").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_pemberi").attr("disabled", true);
                                    $("#tgl_kelahiran3_pemberi").attr("disabled", false);

                                    let dob = new Date(data.TGL_LHR);
                                    let today = new Date();
                                    let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                                    $('#umur_pemberi').val(age);
                                    $('#umur_pemberi').attr("readonly", true);
                                    $("#pekerjaan_pemberi").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_pemberi").attr("readonly", true);

                                    $("#alamat_pemberi").val(data.ALAMAT);
                                    $("#alamat_pemberi").attr("readonly", true);
                                    $("#rt_pemberi").val(data.NO_RT);
                                    $("#rt_pemberi").attr("readonly", true);
                                    $("#rw_pemberi").val(data.NO_RW);
                                    $("#rw_pemberi").attr("readonly", true);


                                    $("select").trigger('change');
                                    // $("select").select2({disabled:readonly});
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_pemberi").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_pemberi").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_pemberi').find('input').val('');
                                    $('#data_pemberi').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_pemberi").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_pemberi").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_pemberi").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_pemberi").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_penerima() {
            if ($('#cek_nik_penerima').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_penerima").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_penerima").attr("disabled", true);
                let nik_ = $("#cek_nik_penerima").val();
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

                                    $("#nama_penerima").val(data.NAMA_LGKP);
                                    $("#nama_penerima").attr("readonly", true);

                                    $("#tempat_lahir_penerima").val(data.TMPT_LHR);
                                    $("#tempat_lahir_penerima").attr("readonly", true);

                                    $(".tgl_kelahiran_penerima").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_penerima").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_penerima").attr("disabled", true);
                                    $("#tgl_kelahiran3_penerima").attr("disabled", false);

                                    let dob = new Date(data.TGL_LHR);
                                    let today = new Date();
                                    let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                                    $('#umur_penerima').val(age);
                                    $('#umur_penerima').attr("readonly", true);
                                    $("#pekerjaan_penerima").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_penerima").attr("readonly", true);

                                    $("#alamat_penerima").val(data.ALAMAT);
                                    $("#alamat_penerima").attr("readonly", true);
                                    $("#rt_penerima").val(data.NO_RT);
                                    $("#rt_penerima").attr("readonly", true);
                                    $("#rw_penerima").val(data.NO_RW);
                                    $("#rw_penerima").attr("readonly", true);


                                    $("select").trigger('change');
                                    // $("select").select2({disabled:readonly});
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_penerima").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_penerima").attr("disabled", false);
                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_penerima').find('input').val('');
                                    $('#data_penerima').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_penerima").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_penerima").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_penerima").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_penerima").attr("disabled", false);
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

                                // alert(response.response.co);
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


                                    $("#alamat_anak").val(data.ALAMAT);
                                    $("#alamat_anak").attr("readonly", true);
                                    $("#rt_anak").val(data.NO_RT);
                                    $("#rt_anak").attr("readonly", true);
                                    $("#rw_anak").val(data.NO_RW);
                                    $("#rw_anak").attr("readonly", true);
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
    </script>