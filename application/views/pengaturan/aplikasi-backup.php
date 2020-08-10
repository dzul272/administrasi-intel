<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Pengaturan</h4>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" id="form-aplikasi">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Provinsi</label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="provinsi_desa" id="provinsi" disabled>
                                    <option value="">Pilih Salah Satu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kabupaten</label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="kabupaten_desa" id="kabupaten" disabled required>
                                    <option value="">Pilih Salah Satu</option>
                                    <option value="<?= $desa->kabupaten_desa ?>" selected><?= $desa->kabupaten_desa ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kecamatan</label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="kecamatan_desa" id="kecamatan" disabled required>
                                    <option value="">Pilih Salah Satu</option>
                                    <option value="<?= $desa->kecamatan_desa ?>" selected><?= $desa->kecamatan_desa ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kelurahan / Desa</label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="nama_desa" id="desa" disabled required>
                                    <option value="">Pilih Salah Satu</option>
                                    <option value="<?= $desa->nama_desa ?>" selected><?= $desa->nama_desa ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Dusun</label>
                                <input type="text" class="form-control" name="dusun_desa" id="nama_dusun" value="<?= $desa->dusun_desa ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Kantor</label>
                                <input type="text" class="form-control" name="namakantor_desa" id="sebutan_kantor" value="<?= $desa->namakantor_desa ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Alamat Kantor</label>
                                <textarea name="alamatkantor_desa" id="alamat_kantor" class="form-control" rows="4" disabled><?= $desa->alamatkantor_desa ?></textarea>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Logo Desa</label>
                        </div>
                        <div class="form-group">
                            <div class="avatar-upload">
                                <div class="avatar-edit" data-tip="Upload Logo Desa">
                                    <input type='file' name="logo_desa" id="imageUpload" accept=".png, .jpg, .jpeg" disabled />
                                    <label for="imageUpload"></label>                                
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(<?= asset('website/desa/' . $desa->logo_desa . ''); ?>);">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Kode Pos</label>
                            <input type="text" class="form-control" name="kodepos_desa" id="kode_pos" value="<?= $desa->kodepos_desa ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nomor Telepon</label>
                            <input type="text" class="form-control" name="notelp_desa" id="no_telpon" value="<?= $desa->notelp_desa ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Email</label>
                            <input type="text" class="form-control" name="email_desa" id="email" value="<?= $desa->email_desa ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Website Desa</label>
                            <div class="input-group mb-1" style="width: 100%;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><b>https://</b></span>
                                </div>
                                <input type="text" class="form-control" name="website_desa" id="website_desa" value="<?= $desa->website_desa ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Deskripsi</label>
                            <textarea name="deskripsi_desa" id="deskripsi" class="form-control" rows="4" disabled><?= $desa->deskripsi_desa ?></textarea>
                        </div>
                        <div class="form-group float-right" id="simpan_data" style="display: none;">
                            <button type="submit" class="btn btn-success" onclick="proses_simpan();"> <i class="fa fa-check"></i> Simpan Data</button>
                            <button type="button" class="btn btn-secondary" onclick="batal_simpan();">batal</button>
                        </div>

                        </form>

                        <div class="form-group float-right" id="ubah_data">
                            <button class="btn btn-warning waves-effect waves-light" onclick="ubah_data();">Ubah Data</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        $("#form-aplikasi").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('pengaturan/update_desa') ?>",
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data.response_code == '200') {
                        Swal.close();
                        Swal.fire("Berhasil", data.response_message, "success");
                        $("#provinsi").attr("disabled", true);
                        $("#kabupaten").attr("disabled", true);
                        $("#kecamatan").attr("disabled", true);
                        $("#desa").attr("disabled", true);


                        $("#nama_aplikasi").attr("disabled", true);
                        $("#nama_dusun").attr("disabled", true);
                        $("#foto").attr("disabled", true);
                        $("#sebutan_kantor").attr("disabled", true);
                        $("#alamat_kantor").attr("disabled", true);
                        $("#kode_pos").attr("disabled", true);
                        $("#no_telpon").attr("disabled", true);
                        $("#email").attr("disabled", true);
                        $("#deskripsi").attr("disabled", true);
                        $("#website_desa").attr("disabled", true);
                        $("#imageUpload").attr("disabled", true);
                        $("#ubah_data").show();
                        $("#simpan_data").hide();
                        $("#imageProfile").attr('src', data.image);
                        $("#imageProfile2").attr('src', data.image);
                    } else {
                        Swal.close();
                        Swal.fire("Oops", data.response_message, "error");
                    }

                },
                error: function() {}
            });
        }));
    });


    function ubah_data() {
        $("#ubah_data").hide();
        $("#simpan_data").show();
        $("#nama_aplikasi").attr("disabled", false);
        // $("#provinsi").attr("disabled", false);
        $("#nama_dusun").attr("disabled", false);
        $("#foto").attr("disabled", false);
        $("#sebutan_kantor").attr("disabled", false);
        $("#alamat_kantor").attr("disabled", false);
        $("#kode_pos").attr("disabled", false);
        $("#no_telpon").attr("disabled", false);
        $("#email").attr("disabled", false);
        $("#deskripsi").attr("disabled", false);
        $("#website_desa").attr("disabled", false);
        $("#imageUpload").attr("disabled", false);
        // $("#kabupaten").val("");
        // $("#kabupaten").attr("disabled", true);
        // $("#kecamatan").attr("disabled", true);
        // $("#kecamatan").val("");
        // $("#desa").attr("disabled", true);
        // $("#desa").val("");

        $("select").trigger("change");

    }

    function batal_simpan() {
        $("#form-aplikasi")[0].reset();

        // $('#provinsi').prop('selected', function() {
        //     return this.defaultSelected;
        // });
        // $('#kabupaten').prop('selected', function() {
        //     return this.defaultSelected;
        // });
        // $('#kecamatan').prop('selected', function() {
        //     return this.defaultSelected;
        // });
        // $('#desa').prop('selected', function() {
        //     return this.defaultSelected;
        // });

        $('input').on('focusin', function() {
            $(this).data('val', $(this).val());
        });

        $('input').on('change', function() {
            $(this).data('val');
        });

        $("#hidden_kabupaten").show();
        $("#tampil_kabupaten").hide();
        $("#hidden_kecamatan").show();
        $("#tampil_kecamatan").hide();
        $("#hidden_desa").show();
        $("#tampil_desa").hide();
        $("#ubah_data").show();
        $("#simpan_data").hide();

        $("#provinsi").attr("disabled", true);
        $("#kabupaten").attr("disabled", true);
        $("#kecamatan").attr("disabled", true);
        $("#desa").attr("disabled", true);


        $("#nama_aplikasi").attr("disabled", true);
        $("#nama_dusun").attr("disabled", true);
        $("#foto").attr("disabled", true);
        $("#sebutan_kantor").attr("disabled", true);
        $("#alamat_kantor").attr("disabled", true);
        $("#kode_pos").attr("disabled", true);
        $("#no_telpon").attr("disabled", true);
        $("#email").attr("disabled", true);
        $("#deskripsi").attr("disabled", true);
        $("#website_desa").attr("disabled", true);
        $("#imageUpload").attr("disabled", true);

        var imageUrl = "<?= asset('website/desa/' . $desa->logo_desa . ''); ?>";
        $('#imagePreview').css('background-image', 'url(' + imageUrl + ')');

        $("select").trigger("change");


    }

    $(document).ready(function() {
        $("#kabupaten").attr("disabled", true);
        $("#kecamatan").attr("disabled", true);
        $("#desa").attr("disabled", true);
        var nama_provinsi = "<?= $desa->provinsi_desa ?>";

        // $("#nama-desa").change(function(){ // Ketika user mengganti atau memilih data provinsi
        $.ajax({
            type: "GET", // Method pengiriman data bisa dengan GET atau POST
            url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi", // Isi dengan url/path file php yang dituju
            dataType: "json",

            success: function(response) { // Ketika proses pengiriman berhasil
                // alert(response.semuaprovinsi[0]['nama']);
                // $("#rw").html(response.rw).show();
                // alert("<?= $desa->provinsi_desa ?>");
                // $("#provinsi").val(nama_provinsi);
                var len = response.semuaprovinsi.length;
                for (var i = 0; i < len; i++) {
                    var id = response.semuaprovinsi[i]['id'];
                    var name = response.semuaprovinsi[i]['nama'];


                    // $("#provinsi").append("<option value='" + id + "|" + name + '"'+ (nama_provinsi == name ? ' selected ' : '') +>" + name + "</option>");

                    $('#provinsi').append('<option value="' + id + "|" + name + '" ' + (nama_provinsi == name ? ' selected ' : '') + '>' + name + '</option>');

                    // $("#provinsi").filter(function() {
                    //   //may want to use $.trim in here
                    //   return $(this).val() == nama_provinsi;
                    // }).prop('selected', true);

                    // $("#provinsi").trigger("change");



                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(thrownError); // Munculkan alert error
            }
        });
        // });
    });


    $(document).ready(function() {
        $("#provinsi").change(function() { // Ketika user mengganti atau memilih data provinsi
            var dd = document.getElementById("provinsi");
            var data = dd.options[dd.selectedIndex].value;
            var pecah = data.split('|');
            var id_provinsi = Number(pecah[0]);
            var nama_kabupaten = "<?= $desa->kabupaten_desa ?>";
            $("#kabupaten").attr("disabled", false);
            $("#kecamatan").attr("disabled", true);
            $("#desa").attr("disabled", true);
            $("#kabupaten").empty();
            $("#kecamatan").empty();
            $("#desa").empty();
            $("#kecamatan").append("<option value=''>Pilih Kecamatan</option>");
            $("#desa").append("<option value=''>Pilih Kelurahan / Desa</option>");
            // let id_provinsi = $("#provinsi").val();
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi/" + id_provinsi + "/kabupaten", // Isi dengan url/path file php yang dituju
                dataType: "json",

                success: function(response) { // Ketika proses pengiriman berhasil
                    // alert(response.semuaprovinsi[0]['nama']);
                    // $("#rw").html(response.rw).show();
                    var len = response.kabupatens.length;
                    $("#kabupaten").append("<option value=''>Pilih Kabupaten</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response.kabupatens[i]['id'];
                        var name = response.kabupatens[i]['nama'];

                        $('#kabupaten').append('<option value="' + id + "|" + name + '" ' + (nama_kabupaten == name ? ' selected ' : '') + '>' + name + '</option>');


                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
    });

    $(document).ready(function() {
        $("#kabupaten").change(function() { // Ketika user mengganti atau memilih data provinsi
            var dd = document.getElementById("kabupaten");
            var data = dd.options[dd.selectedIndex].value;
            var pecah = data.split('|');
            var id_kabupaten = Number(pecah[0]);
            var nama_kecamatan = "<?= $desa->kecamatan_desa ?>";
            $("#kecamatan").attr("disabled", false);
            $("#desa").attr("disabled", true);
            $("#kecamatan").empty();
            $("#desa").empty();
            $("#kecamatan").append("<option value=''>Pilih Kecamatan</option>");
            $("#desa").append("<option value=''>Pilih Kelurahan / Desa</option>");
            // let id_kabupaten = $("#kabupaten").val();
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/" + id_kabupaten + "/kecamatan", // Isi dengan url/path file php yang dituju
                dataType: "json",

                success: function(response) { // Ketika proses pengiriman berhasil
                    // alert(response.semuaprovinsi[0]['nama']);
                    // $("#rw").html(response.rw).show();
                    var len = response.kecamatans.length;
                    // $("#kecamatan").append("<option value=''>Pilih Kecamatan</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response.kecamatans[i]['id'];
                        var name = response.kecamatans[i]['nama'];

                        $('#kecamatan').append('<option value="' + id + "|" + name + '"' + (nama_kecamatan == name ? ' selected ' : '') + '>' + name + '</option>');


                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
    });

    $(document).ready(function() {
        $("#kecamatan").change(function() { // Ketika user mengganti atau memilih data provinsi
            let dd = document.getElementById("kecamatan");
            let data = dd.options[dd.selectedIndex].value;
            let pecah = data.split('|');
            let id_kecamatan = Number(pecah[0]);
            var nama_desa = "<?= $desa->nama_desa ?>";
            $("#desa").attr("disabled", false);
            // let id_kecamatan = $("#kecamatan").val();
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/kecamatan/" + id_kecamatan + "/desa", // Isi dengan url/path file php yang dituju
                dataType: "json",

                success: function(response) { // Ketika proses pengiriman berhasil
                    // alert(response.semuaprovinsi[0]['nama']);
                    // $("#rw").html(response.rw).show();
                    var len = response.desas.length;
                    // $("#desa").append("<option value=''>Pilih Kelurahan / Desa</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response.desas[i]['id'];
                        var name = response.desas[i]['nama'];
                        $('#desa').append('<option value="' + id + "|" + name + '" ' + (nama_desa == name ? ' selected ' : '') + '>' + name + '</option>');


                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
</script>