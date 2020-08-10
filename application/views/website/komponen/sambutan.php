<form id="form-sambutan" action="<?= base_url("website/update_sambutan") ?>" enctype="multipart/form-data" method="post">
    <div class="col-md-6 offset-md-3 mb-4">
        <img style="width: 100%" id="imgPreview" src="<?= isset($sambutan->foto_sambutan) ? asset("website/desa/" . $sambutan->foto_sambutan) : asset("website/img/720x586.png") ?>" alt="">
    </div>

    <div class="row col-md-12 mr-0 pr-0">
        <div class="input-group">
            <label for="fname" class="row col-md-12 control-label col-form-label">Foto Sambutan <span class="text-danger"> *</span></label>
            <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
            <div class="custom-file">
                <input accept="image/*" type="file" class="custom-file-input" id="foto_sambutan" name="foto_sambutan">
                <label class="custom-file-label" for="inputGroupFile"><?= isset($sambutan->foto_sambutan) ? $sambutan->foto_sambutan : "Pilih File Foto Sambutan" ?></label>
            </div>
            <div class="col-12 p-r-0 p-l-0">
                <small class="text-info">Max Size : 5 Mb (.jpg, .jpeg, .png, .gif)</small>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="form-group">
                <label for="recipient-name" class="control-label mb-0">Keterangan Foto<span class="text-danger"> *</span></label>
                <input required value="<?= set($sambutan->ketfoto_sambutan) ?>" type="text" class="form-control" name="ket_foto" id="ket_foto" placeholder="Contoh : Kepala <?= ce($this->userData->jenis_desa) ?>" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="recipient-name" class="control-label mb-0">URL Video Youtube Profile <?= ce($this->userData->jenis_desa) ?> (opsional)</label>
                <input value="<?= set($sambutan->video_sambutan) ?>" type="text" class="form-control" name="video_sambutan" id="video_sambutan" placeholder="Contoh : https://www.youtube.com/watch?v=DhyDhaCynGw">
                <small class="text-info">Kosongi jika tidak ada</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="recipient-name" class="control-label mb-0">Judul Sambutan<span class="text-danger"> *</span></label>
                <input value="<?= set($sambutan->judul_sambutan) ?>" required type="text" class="form-control" name="judul_sambutan" id="judul_sambutan" placeholder="Contoh : Selamat Datang di <?= ce($this->userData->jenis_desa) ?> <?= ce($this->userData->nama_desa) ?>" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="recipient-name" class="control-label mb-0">Isi Sambutan<span class="text-danger"> *</span></label>
                <textarea rows="3" required class="form-control" name="isi_sambutan" id="isi_sambutan" required><?= set($sambutan->isi_sambutan) ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="recipient-name" class="control-label mb-0">Nama Penyambut<span class="text-danger"> *</span></label>
                <input value="<?= set($sambutan->penyambut_sambutan) ?>" required type="text" class="form-control" name="nama_penyambut" id="nama_penyambut" placeholder="Contoh : Rafli Firdausy" required></input>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="recipient-name" class="control-label mb-0">Jabatan<span class="text-danger"> *</span></label>
                <input value="<?= set($sambutan->jabatan_sambutan) ?>" required type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Contoh : Kepala <?= ce($this->userData->jenis_desa) ?>" required></input>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-info pull-right ml-2 ultra-disabled" id="add-btn">Simpan</button>
            <a href="<?= current_url() ?>" type="button" class="btn pull-right btn-secondary text-white" data-dismiss="modal">Batal</a>
        </div>
    </div>
</form>

<script>
    $("#foto_sambutan").change(function() {
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

    $("#form-sambutan").on('submit', (function(event) {
        event.preventDefault();
        $("#add-btn").html("Sedang Menyimpan...");
        $("#add-btn").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/update_sambutan') ?>",
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