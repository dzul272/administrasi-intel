<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Pernyataan Tanggung Jawab Mutlak Kebenaran Sebagai Pasangan Suami Istri</h4>
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
                        <h4 class="mb-0 text-white">Form SPTJM Kebenaran Sebagai Pasangan Suami Istri</h4>
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

                            <!-- BIODATA PIHAK SATU -->
                            <div class="row" id="data_pihak_satu">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Suami</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_pihak_satu" id="cek_nik_pihak_satu" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_pihak_satu" type="button" onclick="cari_pihak_satu();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                        <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap / Nomor KK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="nama_pihak_satu" id="nama_pihak_satu" placeholder="Nama Lengkap" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" value="" name="no_kk_pihak_satu" id="no_kk_pihak_satu" placeholder="Nomor Kartu Keluarga" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_pihak_satu" id="tempat_lahir_pihak_satu" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_pihak_satu" id="datepicker-autoclose" name="tgl_kelahiran_pihak_satu" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_pihak_satu" id="tgl_kelahiran3_pihak_satu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_pihak_satu" name="alamat_pihak_satu" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_PIHAK_SATU" id="rt_pihak_satu" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_PIHAK_SATU" id="rw_pihak_satu" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_pihak_satu" id="pekerjaan_pihak_satu" readonly placeholder="Pekerjaan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BIODATA PIHAK DUA -->
                            <div class="row" id="data_pihak_dua">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Istri</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-2" style="width: 100%;">
                                                        <input type="text" class="form-control" name="cek_nik_pihak_dua" id="cek_nik_pihak_dua" maxlength="16" onkeyup="validate()" placeholder="Masukkan Nomor KTP" aria-label="" aria-describedby="basic-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_pihak_dua" type="button" onclick="cari_pihak_dua();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_pihak_dua" id="nama_pihak_dua" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_pihak_dua" id="tempat_lahir_pihak_dua" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_pihak_dua" id="datepicker-autoclose" name="tgl_kelahiran_pihak_dua" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_pihak_dua" id="tgl_kelahiran3_pihak_dua">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="" id="alamat_pihak_dua" name="alamat_pihak_dua" placeholder="Alamat Tempat Tinggal" readonly required>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RT </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RT_PIHAK_DUA" id="rt_pihak_dua" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group mb-1" style="width: 100%;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>RW </b></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="NO_RW_PIHAK_DUA" id="rw_pihak_dua" onkeyup="validate()" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Pekerjaan</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="pekerjaan_pihak_dua" id="pekerjaan_pihak_dua" readonly placeholder="Pekerjaan" required>
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
            $('#data_pihak_satu').find('input').val('');
            $('#data_pihak_satu').find('select').prop('selectedIndex', 0);
            $("#nama_pihak_satu").attr("readonly", false);
            $("#tempat_lahir_pihak_satu").attr("readonly", false);
            $(".tgl_kelahiran_pihak_satu").attr("disabled", false);
            $("#alamat_pihak_satu").attr("readonly", false);
            $("#rt_pihak_satu").attr("readonly", false);
            $("#rw_pihak_satu").attr("readonly", false);
            $("#pekerjaan_pihak_satu").attr("readonly", false);
            $("#no_kk_pihak_satu").attr("readonly", false);

            $("#tgl_kelahiran3_pihak_satu").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual3() {
            $('#data_pihak_dua').find('input').val('');
            $('#data_pihak_dua').find('select').prop('selectedIndex', 0);
            $("#nama_pihak_dua").attr("readonly", false);
            $("#tempat_lahir_pihak_dua").attr("readonly", false);
            $(".tgl_kelahiran_pihak_dua").attr("disabled", false);
            $("#alamat_pihak_dua").attr("readonly", false);
            $("#rt_pihak_dua").attr("readonly", false);
            $("#rw_pihak_dua").attr("readonly", false);
            $("#pekerjaan_pihak_dua").attr("readonly", false);

            $("#tgl_kelahiran3_pihak_dua").attr("disabled", true);
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
                                Swal.fire("Oops", xhr.responseText, "error");  // Munculkan alert error
                                $("#btn_nik_pemohon").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_pemohon").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_pihak_satu() {
            if ($('#cek_nik_pihak_satu').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_pihak_satu").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_pihak_satu").attr("disabled", true);
                let nik_ = $("#cek_nik_pihak_satu").val();
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

                                    $("#nama_pihak_satu").val(data.NAMA_LGKP);
                                    $("#nama_pihak_satu").attr("readonly", true);

                                    $("#tempat_lahir_pihak_satu").val(data.TMPT_LHR);
                                    $("#tempat_lahir_pihak_satu").attr("readonly", true);

                                    $(".tgl_kelahiran_pihak_satu").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_pihak_satu").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_pihak_satu").attr("disabled", true);
                                    $("#tgl_kelahiran3_pihak_satu").attr("disabled", false);

                                    $("#pekerjaan_pihak_satu").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_pihak_satu").attr("readonly", true);
                                    $("#no_kk_pihak_satu").val(data.NO_KK);
                                    $("#no_kk_pihak_satu").attr("readonly", true);

                                    $("#alamat_pihak_satu").val(data.ALAMAT);
                                    $("#alamat_pihak_satu").attr("readonly", true);
                                    $("#rt_pihak_satu").val(data.NO_RT);
                                    $("#rt_pihak_satu").attr("readonly", true);
                                    $("#rw_pihak_satu").val(data.NO_RW);
                                    $("#rw_pihak_satu").attr("readonly", true);


                                    $("select").trigger('change');
                                    // $("select").select2({disabled:readonly});
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_pihak_satu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_pihak_satu").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_pihak_satu').find('input').val('');
                                    $('#data_pihak_satu').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_pihak_satu").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_pihak_satu").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error");  // Munculkan alert error
                                $("#btn_nik_pihak_satu").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_pihak_satu").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        function cari_pihak_dua() {
            if ($('#cek_nik_pihak_dua').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
                // let timerInterval
                $("#btn_nik_pihak_dua").html("<i class='fa fa-search'></i> Sedang Mencari...");
                $("#btn_nik_pihak_dua").attr("disabled", true);
                let nik_ = $("#cek_nik_pihak_dua").val();
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

                                    $("#nama_pihak_dua").val(data.NAMA_LGKP);
                                    $("#nama_pihak_dua").attr("readonly", true);

                                    $("#tempat_lahir_pihak_dua").val(data.TMPT_LHR);
                                    $("#tempat_lahir_pihak_dua").attr("readonly", true);

                                    $(".tgl_kelahiran_pihak_dua").val(data.TGL_LHR);
                                    $("#tgl_kelahiran3_pihak_dua").val(data.TGL_LHR);
                                    $(".tgl_kelahiran_pihak_dua").attr("disabled", true);
                                    $("#tgl_kelahiran3_pihak_dua").attr("disabled", false);

                                    $("#pekerjaan_pihak_dua").val(data.JENIS_PKRJN);
                                    $("#pekerjaan_pihak_dua").attr("readonly", true);

                                    $("#alamat_pihak_dua").val(data.ALAMAT);
                                    $("#alamat_pihak_dua").attr("readonly", true);
                                    $("#rt_pihak_dua").val(data.NO_RT);
                                    $("#rt_pihak_dua").attr("readonly", true);
                                    $("#rw_pihak_dua").val(data.NO_RW);
                                    $("#rw_pihak_dua").attr("readonly", true);

                                    $("select").trigger('change');
                                    // $("select").select2({disabled:readonly});
                                    Swal.close();
                                    Swal.fire("Berhasil", "Data Ditemukan", "success");
                                    $("#btn_nik_pihak_dua").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_pihak_dua").attr("disabled", false);

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", "Data Tidak Ditemukan", "error");
                                    $('#data_pihak_dua').find('input').val('');
                                    $('#data_pihak_dua').find('select').prop('selectedIndex', 0);
                                    $('select').trigger('change');
                                    $("#btn_nik_pihak_dua").html("<i class='fa fa-search'></i> Cari NIK");
                                    $("#btn_nik_pihak_dua").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error");  // Munculkan alert error
                                $("#btn_nik_pihak_dua").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_pihak_dua").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }
    </script>