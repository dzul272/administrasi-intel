<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Tambah Artikel</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form id="form-tambah-artikel" enctype="multipart/form-data" action="<?= base_url('website/tambah-artikel') ?>" method="post">
            <div class="row">
                <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-light">
                                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url("website/artikel") ?>" class="btn btn-sm btn-info"><i class="mdi mdi-arrow-left-bold"></i> Kembali ke daftar artikel</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Judul Artikel<span class="text-danger"> *</span></label>
                                            <input required type="text" class="form-control" name="judul_artikel" id="judul_artikel " required>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Isi Artikel<span class="text-danger"> *</span></label>
                                            <textarea class="summernote" id="summernote" name="isi_artikel"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                Unggah Gambar Headline <span class="text-danger"> *</span>
                            </div>
                            <div class="card-body">
                                <div class="m-b-10">
                                    <img style="width: 100%" id="imgPreview" src="<?= asset("website/img/ukuran-banner.jpg") ?>" alt="">
                                </div>
                                <div class="input-group">
                                    <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                                    <div class="custom-file">
                                        <input required accept="image/*" type="file" class="custom-file-input" id="file_gambar_headline" name="file_gambar_headline">
                                        <label class="custom-file-label" for="inputGroupFile">Pilih File Gambar Headline</label>
                                    </div>
                                    <div class="col-12 p-r-0 p-l-0">
                                        <small class="text-info">Max Size : 5 Mb (.jpg, .jpeg, .png, .gif)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                Pilih Kategori Artikel <span class="text-danger"> *</span>
                            </div>

                            <div class="card-body">
                                <select required class="select2 form-control custom-select" style="width: 100%;" name="id_kategori" id="id_kategori">
                                    <option value="">Pilih Kategori Artikel</option>
                                    <?php foreach ($kategori_artikel as $kategori) : ?>
                                        <option value="<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                Unggah Lampiran (opsional)
                            </div>
                            <div class="card-body">
                                <div class="input-group">
                                    <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_lampiran" name="file_lampiran">
                                        <label class="custom-file-label" for="inputGroupFile">Pilih Dokumen Lampiran</label>
                                    </div>
                                    <div class="col-12 p-r-0 p-l-0">
                                        <small class="text-info">Max Size : 5 Mb </small>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-2">
                                    <label for="recipient-name" class="control-label mb-0">Nama Dokumen</label>
                                    <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen">
                                    <small class="text-info">Nantinya akan menjadi link unduh/download</small>
                                </div>
                            </div>
                            <div class="card-footer bg-secondary pt-2 pb-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?= base_url("website/artikel") ?>" class="btn pull-left btn-danger">Batal</a>
                                        <button type="submit" class="btn pull-right btn-info ultra-disabled" id="add-btn">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

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

    $("#form-tambah-artikel").submit(function(event) {
        event.preventDefault();
        $("#add-btn").html("Sedang Menyimpan...");
        $("#add-btn").attr("disabled", true);
        Swal.fire({
            title: 'Mohon Tunggu Beberapa Saat',
            text: 'Proses Menambah Artikel...',
            onBeforeOpen: () => {
                Swal.showLoading();
                $.ajax({
                    url: "<?= base_url('website/proses_tambah_artikel') ?>",
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
    });
</script>