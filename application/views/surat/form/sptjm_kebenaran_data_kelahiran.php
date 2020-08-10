<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Pernyataan Tanggung Jawab Mutlak Kebenaran Data Kelahiran</h4>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- <h6 class="card-title">Nomor Surat Terakhir : 400/1/Ds. Beji/2019 </h6> -->
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="mb-0 text-white">Form SPTJM Kebenaran Data Kelahiran</h4>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nama_pemohon" id="nama_pemohon" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_pemohon" id="tempat_lahir_pemohon" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_pemohon" id="datepicker-autoclose" name="tgl_kelahiran_pemohon" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_pemohon" id="tgl_kelahiran3_pemohon">
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
                                </div>
                            </div>

                            <!-- BIODATA Anak -->
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
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_anak"" type=" button" onclick="cari_anak();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Anak Ke-</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="anak_keberapa" id="anak_keberapa" placeholder="Anak Kelahian Keberapa" required>
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
                                                        <input type="text" class="form-control" name="cek_nik_ibu" id="cek_nik_ibu" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP Ibu" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ibu"" type=" button" onclick="cari_ibu();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_ibu" id="nama_ibu" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ibu" id="tempat_lahir_ibu" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ibu" id="datepicker-autoclose" name="tgl_kelahiran_ibu" placeholder="mm/dd/yyyy" disabled>
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
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_ibu" id="pekerjaan_ibu" readonly placeholder="Pekerjaan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA PENOLONG KELAHIRAN -->
                            <div class="row" id="data_penolong_kelahiran">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Penolong Kelahiran</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_penolong_kelahiran" id="cek_nik_penolong_kelahiran" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP Penolong Kelahiran" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_penolong"" type=" button" onclick="cari_penolong_kelahiran();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_penolong_kelahiran" id="nama_penolong_kelahiran" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_penolong_kelahiran" name="alamat_penolong_kelahiran" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_PENOLONG_KELAHIRAN" id="rt_penolong_kelahiran" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_PENOLONG_KELAHIRAN" id="rw_penolong_kelahiran" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_penolong_kelahiran" id="pekerjaan_penolong_kelahiran" readonly placeholder="Pekerjaan" required>
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

            $("#tgl_kelahiran3_pemohon").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual2() {
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

        function manual3() {
            $('#data_ibu').find('input').val('');
            $('#data_ibu').find('select').prop('selectedIndex', 0);
            $("#nama_ibu").attr("readonly", false);
            $("#tempat_lahir_ibu").attr("readonly", false);
            $(".tgl_kelahiran_ibu").attr("disabled", false);
            $("#alamat_ibu").attr("readonly", false);
            $("#rt_ibu").attr("readonly", false);
            $("#rw_ibu").attr("readonly", false);
            $("#pekerjaan_ibu").attr("readonly", false);

            $("#tgl_kelahiran3_ibu").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual4() {
            $('#data_penolong_kelahiran').find('input').val('');
            $('#data_penolong_kelahiran').find('select').prop('selectedIndex', 0);
            $("#nama_penolong_kelahiran").attr("readonly", false);
            $("#alamat_penolong_kelahiran").attr("readonly", false);
            $("#rt_penolong_kelahiran").attr("readonly", false);
            $("#rw_penolong_kelahiran").attr("readonly", false);
            $("#pekerjaan_penolong_kelahiran").attr("readonly", false);

            $('select').trigger('change');
        }
    </script>
    <script>
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

                                    $(".tgl_kelahiran_pemohon").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_pemohon").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_pemohon").attr("disabled", true);
                                    $("#tgl_kelahiran3_pemohon").attr("disabled", false);

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

        function cari_penolong_kelahiran() {
            if ($('#cek_nik_penolong_kelahiran').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_penolong").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_penolong").attr("disabled", true);
                let nik_ = $("#cek_nik_penolong_kelahiran").val();
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

                                    $("#nama_penolong_kelahiran").val(data.NAMA_LGKP);
                                    $("#nama_penolong_kelahiran").attr("readonly", true);

                                    $("#pekerjaan_penolong_kelahiran").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_penolong_kelahiran").attr("readonly", true);

                                    $("#alamat_penolong_kelahiran").val(data.ALAMAT);
                                    $("#alamat_penolong_kelahiran").attr("readonly", true);
                                    $("#rt_penolong_kelahiran").val(data.NO_RT);
                                    $("#rt_penolong_kelahiran").attr("readonly", true);
                                    $("#rw_penolong_kelahiran").val(data.NO_RW);
                                    $("#rw_penolong_kelahiran").attr("readonly", true);
                                    $("select").trigger('change');
                                    // $("select").select2({disabled:readonly});
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_penolong").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_penolong").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_penolong_kelahiran').find('input').val('');
                                    $('#data_penolong_kelahiran').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_penolong").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_penolong").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error"); // Munculkan alert error
                                $("#btn_nik_penolong").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_penolong").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }
    </script>