<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Pernyataan Lahir Luar Nikah</h4>
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
                        <h4 class="mb-0 text-white">Form Surat Pernyataan Lahir Luar Nikah</h4>
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

                            <!-- BIODATA IBU -->
                            <div class="row" id="data_ibu">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <div class="card-header bg-danger col-12">
                                            <h6 class="mb-0 text-white">Data Ibu Kandung</h6>
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
                                                            <button class="btn btn-info ultra-disabled" id="btn_nik_ibu" type="button" onclick="cari_ibu();"><i class="fa fa-search"></i> Cari NIK</button>
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
                                            <input class="form-control" type="text" value="" name="nama_ibu" id="nama_ibu" placeholder="Nama Lengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir / Umur</label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input class="form-control" type="text" value="" name="tempat_lahir_ibu" id="tempat_lahir_ibu" placeholder="Tempat Lahir" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" class="form-control tgl_kelahiran_ibu" id="datepicker-autoclose" name="tgl_kelahiran_ibu" placeholder="mm/dd/yyyy" disabled>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" type="hidden" value="" name="tgl_kelahiran_ibu" id="tgl_kelahiran3_ibu">
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
                                                    <input class="form-control" type="text" value="" id="alamat_ibu" name="alamat_ibu" placeholder="Alamat Tempat Tinggal Ibu" readonly required>
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
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-3 col-form-label">Nomor HP </label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="" name="nomor_hp_ibu" id="nomor_hp" required placeholder="Nomor HP">
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
                                                    <!-- <input class="form-control" type="hidden" value="" name="tgl_kelahiran_anak" id="tgl_kelahiran3_anak"> -->
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

            $("#tgl_kelahiran3_ibu").attr("disabled", true);
            $('select').trigger('change');
        }

        function manual3() {
            $('#data_anak').find('input').val('');
            $('#data_anak').find('select').prop('selectedIndex', 0);
            $("#nama_anak").attr("readonly", false);
            $("#tempat_lahir_anak").attr("readonly", false);
            $(".tgl_kelahiran_anak").attr("disabled", false);

            $("#tgl_kelahiran3_anak").attr("disabled", true);
            $('select').trigger('change');
        }


        window.onload = function() {
            $('.tgl_kelahiran_ibu').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur_ibu').val(age);
            });
        }
    </script>
    <script>
        function cari_ibu() {
            if ($('#cek_nik_ibu').val().length != 16) {
                Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
            } else {
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
                                    // $("select").select2({disabled:readonly});
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
                                Swal.fire("Oops", xhr.responseText, "error");// Munculkan alert error
                                $("#btn_nik_ibu").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_ibu").attr("disabled", false);
                            }
                        });
                        //  // END AJAX
                    }

                });
            }
        }

        // function cari_anak() {
        //     if ($('#cek_nik_anak').val().length != 16) {
        //         Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
        //     } else {


        //         // let timerInterval
        //         let nik_ = $("#cek_nik_anak").val();
        //         Swal.fire({
        //             title: 'Mohon Tunggu Beberapa Saat',
        //             html: 'Proses Mencari Data Pada Dindukcapil',
        //             // timer: 2000,
        //             onBeforeOpen: () => {
        //                 Swal.showLoading();
        //                 // alert('aw')
        //                 // //START AJAX 
        //                 $.ajax({
        //                     type: "GET", // Method pengiriman data bisa dengan GET atau POST
        //                     url: "<?= urlNik(); ?>", // Isi dengan url/path file php yang dituju
        //                     data: {
        //                         "nik": nik_
        //                     }, // data yang akan dikirim ke file yang dituju
        //                     dataType: "json",

        //                     success: function(response) { // Ketika proses pengiriman berhasil

        //                         // alert(response.response.co);
        //                         if (response.respon_code == 1) {
        //                             // alert("asu");
        //                             let data = response.content[0];

        //                             $("#nama_anak").val(data.NAMA_LGKP);
        //                             $("#nama_anak").attr("readonly", true);

        //                             $("#tempat_lahir_anak").val(data.TMPT_LHR);
        //                             $("#tempat_lahir_anak").attr("readonly", true);

        //                             $(".tgl_kelahiran_anak").val(data.TGL_LHR);
        //                             $("#tgl_kelahiran3_anak").val(data.TGL_LHR);
        //                             $(".tgl_kelahiran_anak").attr("disabled", true);
        //                             $("#tgl_kelahiran3_anak").attr("disabled", false);


        //                             $("select").trigger('change');
        //                             // $("select").select2({disabled:readonly});
        //                             Swal.close();
        //                             Swal.fire("Berhasil", "Data Ditemukan", "success");

        //                         } else {
        //                             Swal.close();
        //                             Swal.fire("Oops", "Data Tidak Ditemukan", "error");
        //                             $('#data_anak').find('input').val('');
        //                             $('#data_anak').find('select').prop('selectedIndex', 0);
        //                             $('select').trigger('change');
        //                         }
        //                     },
        //                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
        //                         Swal.fire("Oops", xhr.responseText, "error");// Munculkan alert error
        //                     }
        //                 });
        //                 //  // END AJAX
        //             }

        //         });
        //     }
        // }
    </script>