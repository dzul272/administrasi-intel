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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" id="form-aplikasi">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Provinsi</label>
                                <input type="text" class="form-control" name="provinsi_desa" id="provinsi" value="<?= $desa->provinsi_desa ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kabupaten</label>
                                <input type="text" class="form-control" name="kabupaten_desa" id="kabupaten" value="<?= $desa->kabupaten_desa ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan_desa" id="kecamatan" value="<?= $desa->kecamatan_desa ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kelurahan / Desa</label>
                                <input type="text" class="form-control" name="nama_desa" id="desa" value="<?= $desa->nama_desa ?>" readonly>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group m-b-0">
                            <label for="recipient-name" class="control-label">Logo <?= ce($this->userData->jenis_desa) ?></label>
                        </div>
                        <div class="row col-12 m-b-10">
                            <img id="imgPreview" src="<?= asset("website/desa/" . $desa->logo_desa) ?>" class="col-md-12" alt="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Pilih Gambar <span class="text-danger">*</span></label>
                            <input accept="image/*" type="file" class="form-control-file ultra-disabled" name="logo_desa" id="logo_desa" disabled>
                            <small id="name1" class="text-info">Maximum Size : 5 Mb</small>
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
                            <label for="recipient-name" class="control-label">Website Domain <?= ce($this->userData->jenis_desa) ?></label>
                            <div class="input-group mb-1" style="width: 100%;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><b>https://</b></span>
                                </div>
                                <!-- <input type="text" class="form-control" placeholder="Add URL" data-validation-regex-regex="((http[s]?|ftp[s]?):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*" data-validation-regex-message="Only Valid URL's"> -->
                                <input type="text" class="form-control inputmask-url" name="website_desa" id="website_desa" value="<?= $desa->website_desa ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Deskripsi</label>
                            <textarea name="deskripsi_desa" id="deskripsi" class="form-control" rows="4" disabled><?= $desa->deskripsi_desa ?></textarea>
                        </div>
                        <div class="form-group float-right" id="simpan_data" style="display: none;">
                            <button type="submit" class="btn btn-success ultra-disabled" onclick="proses_simpan();" id="edit-btn"> <i class="fa fa-check"></i> Simpan Data</button>
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
            $('#edit-btn').html("<i class='fa fa-clock'></i> Sedang Menyimpan...");
            $('#edit-btn').attr("disabled", true);
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
                        $("#logo_desa").attr("disabled", true);
                        $("#ubah_data").show();
                        $("#simpan_data").hide();
                        $("#imgPreview").attr('src', data.image);
                        // $("#imageProfile2").attr('src', data.image);
                        $('#edit-btn').html("<i class='fa fa-check'></i> Simpan Data");
                        $('#edit-btn').attr("disabled", false);
                    } else {
                        Swal.close();
                        Swal.fire("Oops", data.response_message, "error");
                        $('#edit-btn').html("<i class='fa fa-check'></i> Simpan Data");
                        $('#edit-btn').attr("disabled", false);
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#edit-btn').html("<i class='fa fa-check'></i> Simpan Data");
                    $('#edit-btn').attr("disabled", false);
                }
            });
        }));
    });


    function ubah_data() {
        $("#ubah_data").hide();
        $("#simpan_data").show();
        $("#nama_aplikasi").attr("disabled", false);
        $("#nama_dusun").attr("disabled", false);
        $("#foto").attr("disabled", false);
        $("#sebutan_kantor").attr("disabled", false);
        $("#alamat_kantor").attr("disabled", false);
        $("#kode_pos").attr("disabled", false);
        $("#no_telpon").attr("disabled", false);
        $("#email").attr("disabled", false);
        $("#deskripsi").attr("disabled", false);
        $("#website_desa").attr("disabled", false);
        // $("#imageUpload").attr("disabled", false);
        $("#logo_desa").attr("disabled", false);

        $("select").trigger("change");

    }

    function batal_simpan() {
        window.location.href = "<?= base_url('pengaturan/aplikasi') ?>";
    }

    $("#logo_desa").change(function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>