<form id="form-headline-footer" action="<?= base_url("website/update_headline_footer") ?>" enctype="multipart/form-data" method="post">
    <div class="col-md-12 mb-4">
        <img style="width: 100%" id="imgPreview" src="<?= isset($headlineFooter->gambar_headline) ? asset_file_desa($headlineFooter->gambar_headline) : asset("website/img/1920x415.jpg") ?>" alt="">
    </div>
    <div class="row col-md-12 mr-0 pr-0">
        <div class="input-group">
            <label for="fname" class="row col-md-12 control-label col-form-label">Foto Footer <span class="text-danger"> *</span></label>
            <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
            <div class="custom-file">
                <input required accept="image/*" type="file" class="custom-file-input" id="headline" name="file_gambar_headline">
                <label class="custom-file-label" for="inputGroupFile"><?= "Pilih File Foto Footer" ?></label>
            </div>
            <div class="col-12 p-r-0 p-l-0">
                <small class="text-info">Max Size : 5 Mb (.jpg, .jpeg, .png, .gif)</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-info pull-right ml-2 ultra-disabled" id="add-btn">Simpan</button>
            <a href="#" data-id='<?= set($headlineFooter->id_headline) ?>' id="btnReset" type="button" class="btn pull-right btn-danger text-white ml-2 ultra-disabled">Reset Default</a>
            <a href="<?= current_url() ?>" type="button" class="btn pull-right btn-secondary text-white">Batal</a>
        </div>
    </div>
</form>

<script>
    $("#headline").change(function() {
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

    $("#btnReset").click(function(event) {
        event.preventDefault();
        $("#btnReset").html("Sedang Memproses...");
        $("#btnReset").attr("disabled", true);
        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Footer akan di reset ke setelan awal !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                var data = new FormData();
                data.append("id_headline", $(this).data('id'));
                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    text: 'Proses Memperbaharui Footer...',
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        $.ajax({
                            url: "<?= base_url('website/reset_headline') ?>",
                            type: "POST",
                            data: data,
                            dataType: "JSON",
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(e) { // Ketika proses pengiriman berhasil
                                if (e.response_code == 200) {
                                    $("#btnReset").html("Reset Default");
                                    $("#btnReset").attr("disabled", false);
                                    Swal.fire(
                                        'Berhasil',
                                        e.response_message,
                                        'success'
                                    ).then((result) => {
                                        window.location.href = "<?= current_url() ?>";
                                    });

                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", e.response_message, "error");
                                    $("#btnReset").html("Reset Default");
                                    $("#btnReset").attr("disabled", false);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                                Swal.fire("Oops", xhr.responseText, "error");
                                $("#btnReset").html("Reset Default");
                                $("#btnReset").attr("disabled", false);
                            }
                        });
                    }
                });
            }
        });
    })

    $("#form-headline-footer").on('submit', (function(event) {
        event.preventDefault();
        $("#add-btn").html("Sedang Menyimpan...");
        $("#add-btn").attr("disabled", true);
        Swal.fire({
            title: 'Mohon Tunggu Beberapa Saat',
            text: 'Proses Memperbaharui Footer...',
            onBeforeOpen: () => {
                Swal.showLoading();
                $.ajax({
                    url: "<?= base_url('website/update_headline_footer') ?>",
                    type: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(e) { // Ketika proses pengiriman berhasil
                        if (e.response_code == 200) {
                            $("#add-btn").html("Simpan");
                            $("#add-btn").attr("disabled", false);
                            Swal.fire(
                                'Berhasil',
                                e.response_message,
                                'success'
                            ).then((result) => {
                                window.location.href = "<?= current_url() ?>";
                            });

                        } else {
                            Swal.close();
                            Swal.fire("Oops", e.response_message, "error");
                            $("#add-btn").html("Simpan");
                            $("#add-btn").attr("disabled", false);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                        Swal.fire("Oops", xhr.responseText, "error");
                        $("#add-btn").html("Simpan");
                        $("#add-btn").attr("disabled", false);
                    }
                });
            }
        });
    }));
</script>