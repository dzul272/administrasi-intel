<form id="form-profile-desa" action="<?= base_url("website/update_profile_desa") ?>" enctype="multipart/form-data" method="post">
    <div class="col-md-8 offset-md-2 mb-4">
        <img style="width: 100%" id="imgPreview" src='<?= !empty($profile->headline_halaman) ? asset_file_desa($profile->headline_halaman) :  asset("website/img/ukuran-banner.jpg") ?>' alt="">
    </div>
    <div class="input-group">
        <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
        <div class="custom-file">
            <input accept="image/*" type="file" class="custom-file-input" id="file_gambar_headline" name="file_gambar_headline">
            <label class="custom-file-label" for="inputGroupFile"><?= !empty($profile->headline_halaman) ? $profile->headline_halaman : "Pilih File Gambar Headline Profile " . ce($this->userData->jenis_desa) ?></label>
        </div>
        <div class="col-12 p-r-0 p-l-0">
            <small class="text-info">Max Size : 5 Mb (.jpg, .jpeg, .png, .gif)</small>
        </div>
    </div>
    <div class="form-group mt-3">
        <label for="recipient-name" class="control-label">Isi Profile <?= ce($this->userData->jenis_desa) ?><span class="text-danger"> *</span></label>
        <textarea class="summernote2" id="summernote2" name="isi_artikel"></textarea>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn pull-right btn-info ultra-disabled" id="add-btn">Simpan</button>
        <a href='<?= current_url() ?>' class="btn pull-right btn-dark mr-2">Batal</a>
    </div>
</form>

<!-- <script src="<?= asset('website/nice/assets/libs/summernote/dist/summernote-bs4.min.js'); ?>"></script> -->
<script>
    $("#file_gambar_headline").change(function() {
        readURL(this, false);
    });

    function readURL(input, modeInsert) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#form-profile-desa").submit(function(e) {
        e.preventDefault();
        $("#add-btn").html("Sedang Menyimpan...");
        $("#add-btn").attr("disabled", true);
        Swal.fire({
            title: 'Mohon Tunggu Beberapa Saat',
            text: 'Proses Mengubah Profile <?= ce($this->userData->jenis_desa) ?>...',
            onBeforeOpen: () => {
                Swal.showLoading();
                $.ajax({
                    url: "<?= base_url('website/update_profile_desa') ?>",
                    type: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(e) { // Ketika proses pengiriman berhasil
                        Swal.close();
                        if (e.response_code == 200) {
                            $('.myModal').modal('hide');
                            $("#add-btn").html("Simpan");
                            $("#add-btn").attr("disabled", false);
                            Swal.fire(
                                'Berhasil',
                                e.response_message,
                                'success'
                            ).then((result) => {
                                window.location.href = e.redirect;
                            });

                        } else {
                            Swal.close();
                            Swal.fire("Oops", e.response_message, "error");
                            $("#add-btn").html("Simpan");
                            $("#add-btn").attr("disabled", false);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                        Swal.close();
                        Swal.fire("Oops", xhr.responseText, "error");
                        $("#add-btn").html("Simpan");
                        $("#add-btn").attr("disabled", false);
                    }
                });
            }
        });
    })
</script>