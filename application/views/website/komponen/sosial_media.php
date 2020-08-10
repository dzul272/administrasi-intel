<form id="form-sosmed" action="<?= base_url("website/update_sosmed") ?>" enctype="multipart/form-data" method="post">
    <div class="input-group mb-2">
        <label for="fname" class="row col-md-12 control-label col-form-label">Link facebook <span class="text-danger"> *</span></label>
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
        </div>
        <input value="<?= $sosmed ? $sosmed->facebook_sosmed : "" ?>" type="text" placeholder="Contoh : https://facebook.com/<?= underscore($this->userData->nama_desa) ?>" class="form-control" name="facebook" id="facebook">
    </div>
    <div class="input-group mb-2">
        <label for="fname" class="row col-md-12 control-label col-form-label">Link Twitter <span class="text-danger"> *</span></label>
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
        </div>
        <input value="<?= $sosmed ? $sosmed->twitter_sosmed : "" ?>" type="text" class="form-control" placeholder="Contoh : https://twitter.com/<?= underscore($this->userData->nama_desa) ?>" name="twitter" id="twitter">
    </div>
    <div class="input-group mb-2">
        <label for="fname" class="row col-md-12 control-label col-form-label">Link Instagram <span class="text-danger"> *</span></label>
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
        </div>
        <input value="<?= $sosmed ? $sosmed->instagram_sosmed : "" ?>" type="text" class="form-control" placeholder="Contoh : http://instagram.com/<?= underscore($this->userData->nama_desa) ?>" name="instagram" id="instagram">
    </div>
    <div class="input-group mb-2">
        <label for="fname" class="row col-md-12 control-label col-form-label">Link Youtube <span class="text-danger"> *</span></label>
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="mdi mdi-youtube-play"></i></span>
        </div>
        <input value="<?= $sosmed ? $sosmed->youtube_sosmed : "" ?>" type="text" class="form-control" placeholder="Contoh : https://www.youtube.com/channel/<?= underscore($this->userData->nama_desa) ?>" name="youtube" id="youtube">
    </div>
    <div class="input-group mb-2">
        <label for="fname" class="row col-md-12 control-label col-form-label">No Whatsapp <span class="text-danger"> *</span></label>
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="mdi mdi-whatsapp"></i></span>
        </div>
        <input value="<?= $sosmed ? $sosmed->whatsapp_sosmed : "" ?>" type="text" class="form-control" name="whatsapp" placeholder="Contoh : +628512345678" id="whatsapp">
    </div>
    <div class="input-group mb-2">
        <label for="fname" class="row col-md-12 control-label col-form-label">Username Telegram <span class="text-danger"> *</span></label>
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="mdi mdi-telegram"></i></span>
        </div>
        <input value="<?= $sosmed ? $sosmed->telegram_sosmed : "" ?>" type="text" class="form-control" name="telegram" placeholder="Contoh : <?= underscore($this->userData->nama_desa) ?>" id="telegram">
    </div>
    <label for="fname" class="row col-md-12 control-label col-form-label"><span class="text-danger">*) Kosongi jika tidak ada</span></label>
    <div class="row">
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-info pull-right ml-2 ultra-disabled" id="add-btn">Simpan</button>
            <a href="<?= current_url() ?>" type="button" class="btn pull-right btn-secondary text-white" data-dismiss="modal">Batal</a>
        </div>
    </div>
</form>

<script>
    $("#form-sosmed").on('submit', (function(event) {
        event.preventDefault();
        $("#add-btn").html("Sedang Menyimpan...");
        $("#add-btn").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/update_sosmed') ?>",
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
    }));
</script>