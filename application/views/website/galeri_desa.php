<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Daftar Galeri : <?= ce($current_kategori->nama_kategori) ?></h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center pull-right">
                    <div class="ml-auto">
                        <button type="button" data-toggle="modal" data-target="#tambahGaleriFoto" id="btn-add-foto" class="btn waves-effect waves-light btn-primary ultra-disabled" style="width: 130px;">+ Tambah Foto</button>
                        <button type="button" data-toggle="modal" data-target="#tambahGaleriVideo" id="btn-add-video" class="btn waves-effect waves-light btn-info ultra-disabled" style="width: 130px;">+ Tambah Video</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="row col-md-12">
                <div class="col-md-4">
                    <div class="card list-group">
                        <div class="card-header text-white bg-dark">
                            <span>Kategori Galeri</span>
                            <div class="pull-right">
                                <button title="Tambah Kategori" type="button" class="btn btn-sm waves-effect waves-light btn-success ultra-disabled" id="btn-add-kategori" data-toggle="modal" data-target="#tambahKategori">+</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table>
                                <?php
                                foreach ($kategori_galeri as $dataKategori) : ?>
                                    <tr>
                                        <td style="width: 75%">
                                            <a href="<?= base_url("website/galeri_desa/" . $dataKategori->route_kategori) ?>" style="width: 100%" class="col-md-12 list-group-item waves-effect waves-dark <?= $current_kategori->id_kategori == $dataKategori->id_kategori ? "active" : "text-dark" ?>">
                                                <?= $dataKategori->nama_kategori ?>
                                                <span class="badge badge-pill badge-danger pull-right"><?= $dataKategori->total_galeri ?></span>
                                            </a>
                                        </td>
                                        <td>
                                            <div>
                                                <?php
                                                $canDelete = TRUE;
                                                if ($dataKategori->total_galeri > 0) {
                                                    $canDelete = FALSE;
                                                }
                                                ?>
                                                <button data-toggle="modal" data-target="#editKategori" data-detail='<?= json_encode($dataKategori) ?>' title="Edit Kategori" style="height: 100%;" class="btn btn-primary btnEditKategori"><i class="mdi mdi-lead-pencil"></i></button>
                                                <button data-toggle="modal" data-target="#hapusKategori" data-detail='<?= json_encode($dataKategori) ?>' <?= $canDelete ? "" : " disabled " ?> title="<?= $canDelete ? "Hapus Kategori" : "Kategori Tidak Dapat Di Hapus" ?>" style="height: 100%;" class="btn btn-danger ultra-disabled btnHapusKategori"><i class="mdi mdi-delete"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- batas -->
                <div class="card col-md-8">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style="width: 20%; padding: 10px" class="text-center align-middle">Aksi</th>
                                        <th style="width: 30%; padding: 10px">Keterangan</th>
                                        <!-- <th style="padding: 10px">Oleh</th> -->
                                        <th style="padding: 10px">Tipe</th>
                                        <th style="padding: 10px">Aktif</th>
                                        <th style="padding: 10px">Di Posting Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($galeri) : ?>
                                        <?php $no = 1;
                                        foreach ($galeri as $dataGaleri) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td class="text-center">
                                                    <button data-id="<?= $dataGaleri->id_galeri ?>" class="btn btn-sm btn-success <?= $dataGaleri->tipe_galeri == 1 ? "edit_galeri" : "edit_video"; ?>"><i class="far fa-edit"></i></button>
                                                    <button data-is_active='<?= $dataGaleri->is_active ?>' data-id='<?= $dataGaleri->id_galeri ?>' data-ket="<?= $dataGaleri->keterangan_galeri ?>" href="#" data-toggle="tooltip" data-placement="top" title="Hapus Galeri" class="btn btn-sm btn-danger hapusGaleri"><i class="far fa-trash-alt"></i></button>
                                                    <span data-toggle="modal" data-target="#ubahKategoriGaleri">
                                                        <a data-is_active='<?= $dataGaleri->is_active ?>' data-id='<?= $dataGaleri->id_galeri ?>' data-ket="<?= $dataGaleri->keterangan_galeri ?>" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Ubah Kategori" class="btn btn-sm btn-primary ubahGaleri"><i class="fas fa-pencil-alt"></i></a>
                                                    </span>
                                                    <button data-is_active='<?= $dataGaleri->is_active ?>' data-id='<?= $dataGaleri->id_galeri ?>' data-ket="<?= $dataGaleri->keterangan_galeri ?>" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="<?= $dataGaleri->is_active == 1 ? "Non" : "" ?> Aktifkan Galeri" class="btn btn-sm btn-info lockUnlockGaleri"><i class="fas <?= $dataGaleri->is_active == 1 ? "fa-unlock" : "fa-lock" ?>"></i></button>
                                                </td>
                                                <td>
                                                    <?= $dataGaleri->keterangan_galeri ?>
                                                </td>
                                                <!-- <td><?= $dataGaleri->user->nama_user ?></td> -->
                                                <td><?= $dataGaleri->tipe_galeri == 1 ? "Foto" : "Video" ?></td>
                                                <td><?= $dataGaleri->is_active == 1 ? "Ya" : "Tidak" ?></td>
                                                <td><?= datetime_indo($dataGaleri->created_at) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- HALAMAN  -->

            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH GALERI FOTO-->
<div class="modal fade myModal" id="tambahGaleriFoto" tabindex="-1" role="dialog" aria-labelledby="tambahGaleriFoto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Galeri Foto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-insert-foto" method="POST" enctype="multipart/form-data" action="<?= base_url('website/tambah-galeri-foto') ?>">
                    <div class="row col-12 m-b-10">
                        <img id="imgPreview" class="col-md-12" src="<?= asset("website/img/default-galeri.jpg") ?>" alt="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Pilih Gambar <span class="text-danger">*</span></label>
                        <input accept="image/*" required type="file" class="form-control-file" name="isi_galeri" id="file_galeri_foto">
                        <small id="name1" class="text-info">Maximum Size : 5 Mb</small>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kategori Galeri <span class="text-danger">*</span></label>
                        <select required class="select2 form-control custom-select" style="width: 100%;" name="id_kategori" id="id_kategori_insert">
                            <option value="">Pilih Kategori Galeri</option>
                            <?php foreach ($kategori_galeri as $kategori) : ?>
                                <option value='<?= $kategori->id_kategori ?>'><?= $kategori->nama_kategori ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Keterangan <span class="text-danger">*</span></label>
                        <textarea required type="text" class="form-control" name="keterangan_galeri" id="keterangan_galeri"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="add-foto-btn">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- MODAL TAMBAH GALERI VIDEO-->
<div class="modal fade myModal" id="tambahGaleriVideo" tabindex="-1" role="dialog" aria-labelledby="tambahGaleriVideo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Galeri Video</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-insert-video" method="POST" enctype="multipart/form-data" action="<?= base_url('website/tambah-galeri-foto') ?>">
                    <div class="row col-12 m-b-10">
                        <iframe id="show_video" class="col-md-12" frameborder="0" src="" scrolling="no" style="display: none; width:100%; height: 240px;"></iframe>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Video URL <span class="text-danger">*</span> <small>(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)</small></label>
                        <input type="url" class="form-control" id="video_url" name="isi_galeri" placeholder="Masukkan link URL video" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kategori Galeri <span class="text-danger">*</span></label>
                        <select required class="select2 form-control custom-select" style="width: 100%;" name="id_kategori" id="id_kategori2">
                            <option value="">Pilih Kategori Galeri</option>
                            <?php foreach ($kategori_galeri as $kategori) : ?>
                                <option value='<?= $kategori->id_kategori ?>'><?= $kategori->nama_kategori ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Keterangan <span class="text-danger">*</span></label>
                        <textarea required type="text" class="form-control" name="keterangan_galeri" id="keterangan_galeri2" placeholder="Keterangan Video"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="add-video-btn">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- MODAL UBAH GALERI FOTO-->
<div class="modal fade ubah_modal" id="modal_ubah_galeri" tabindex="-1" role="dialog" aria-labelledby="ubah_galeri">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Ubah Galeri Foto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-foto" method="POST" enctype="multipart/form-data">
                    <div class="row col-12 m-b-10">
                        <img id="ubah_imgPreview" src="" class="col-md-12" alt="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Pilih Gambar <span class="text-danger">*</span></label>
                        <input accept="image/*" required type="file" class="form-control-file" name="isi_galeri" id="ubah_file_galeri_foto">
                        <small id="name1" class="text-info">Maximum Size : 5 Mb</small>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kategori Galeri <span class="text-danger">*</span></label>
                        <select required class="select2 form-control custom-select" style="width: 100%;" name="id_kategori" id="ubah_kategori_galeri">
                            <option value="">Pilih Kategori Galeri</option>

                        </select>
                    </div>
                    <input type="hidden" name="id_galeri" class="form-control" id="ubah_id_galeri">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Keterangan <span class="text-danger">*</span></label>
                        <textarea required type="text" class="form-control" name="keterangan_galeri" id="ubah_keterangan_galeri"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="edit-foto-btn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- MODAL TAMBAH GALERI VIDEO-->
<div class="modal fade myModal" id="modal_ubah_video" tabindex="-1" role="dialog" aria-labelledby="tambahGaleriVideo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Ubah Galeri Video</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-video" method="POST" enctype="multipart/form-data">
                    <div class="row col-12 m-b-10">
                        <iframe id="show_ubah_video" class="col-md-12" frameborder="0" src="" scrolling="no" height="240"></iframe>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Video URL <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="ubah_video_url" name="isi_galeri" placeholder="Masukkan link URL video" required>
                    </div>
                    <input type="hidden" name="id_galeri" id="ubah_id_galeri2" class="form-control">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kategori Galeri <span class="text-danger">*</span></label>
                        <select required class="select2 form-control custom-select" style="width: 100%;" name="id_kategori" id="ubah_id_kategori2">
                            <option value="">Pilih Kategori Galeri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Keterangan <span class="text-danger">*</span></label>
                        <textarea required type="text" class="form-control" name="keterangan_galeri" id="ubah_keterangan_galeri2" placeholder="Keterangan Video"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="edit-video-btn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- MODAL TAMBAH KATEGORI -->
<div class="modal fade myModal" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="tambahKategori">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Kategori Galeri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form-tambah-kategori-galeri" enctype="multipart/form-data" action="<?= base_url('website/tambah-kategori-galeri') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Kategori<span class="text-danger">*</span></label>
                        <input required type="text" class="form-control" name="nama_kategori" id="nama_kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Pilih Warna Kategori<span class="text-danger">*</span></label>
                        <input name="warna" type="color" id="hue-demo" class="form-control demo" data-control="hue" value="#d84148">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success ultra-disabled" id="add-btn">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL TAMBAH KATEGORI -->

<!-- MODAL EDIT KATEGORI -->
<div class="modal fade myModal" id="editKategori" tabindex="-1" role="dialog" aria-labelledby="editKategori">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Edit Kategori Galeri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form-edit-kategori-galeri" enctype="multipart/form-data" action="<?= base_url('website/edit-kategori-galeri') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Kategori<span class="text-danger">*</span></label>
                        <input required type="text" class="form-control" name="nama_kategori" id="edit_nama_kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Pilih Warna Kategori<span class="text-danger">*</span></label>
                        <input name="warna" type="color" class="form-control demo" id="editWarna">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_kategori" id="id_kategori">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info ultra-disabled" id="edit-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL EDIT KATEGORI -->

<!-- MODAL UBAH ARTIKEL -->
<div class="modal fade myModal" id="ubahKategoriGaleri" tabindex="-1" role="dialog" aria-labelledby="editKategori">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Ubah Kategori Galeri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form-ubah-kategori-galeri" enctype="multipart/form-data" action="<?= base_url('website/ubah_kategori_galeri') ?>" method="post">
                <div class="modal-body">
                    <span id="textJudul"></span>
                    <select required class="select2 form-control custom-select" style="width: 100%;" name="id_kategori" id="id_kategori">
                        <option value="">Pilih Kategori Galeri</option>
                        <?php foreach ($kategori_galeri as $kategori) : ?>
                            <option value='<?= $kategori->id_kategori ?>'><?= $kategori->nama_kategori ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_galeri" id="id_kategori_galeri">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info ultra-disabled" id="simpan-ktgri">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL EDIT KATEGORI -->



<script>
    $(document).ready(function($) {
        $('#video_url').on('keyup', function() {
            if ($(this).val() === "") {
                $('#show_video').hide();
            } else {
                var url = $(this).val();
                let url_baru = (!url.includes('vimeo')) ? "//www.youtube.com/embed/" + url.split("=")[1] : "//player.vimeo.com/video/" + url.split("/")[3];
                $('#show_video').attr('src', url_baru);
                $('#show_video').show();
            }
        });
        $('#ubah_video_url').on('keyup', function() {
            if ($(this).val() === "") {
                $('#show_ubah_video').hide();
            } else {
                var url = $(this).val();
                let url_baru = (!url.includes('vimeo')) ? "//www.youtube.com/embed/" + url.split("=")[1] : "//player.vimeo.com/video/" + url.split("/")[3];
                $('#show_ubah_video').attr('src', url_baru);
                $('#show_ubah_video').show();
            }
        });
    })

    $("#file_galeri_foto").change(function() {
        readURL(this, true);
    });

    $("#ubah_file_galeri_foto").change(function() {
        readURL(this, false);
    });

    function readURL(input, modeInsert) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if (modeInsert) {
                    $('#imgPreview').attr('src', e.target.result);
                } else {
                    $('#ubah_imgPreview').attr('src', e.target.result);
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#form-insert-foto").on('submit', (function(event) {
        event.preventDefault();
        $("#add-foto-btn").html("Sedang Menyimpan...");
        $("#add-foto-btn").attr("disabled", true);
        $("#btn-add-foto").html("Menyimpan...");
        $("#btn-add-foto").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/tambah-galeri-foto') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function(e) { // Ketika proses pengiriman berhasil
                if (e.response_code == 200) {
                    $('.myModal').modal('hide');
                    $("#form-insert-foto")[0].reset();
                    $("#add-foto-btn").html("Tambah");
                    $("#add-foto-btn").attr("disabled", false);
                    $("#btn-add-foto").html("+ Tambah Foto");
                    $("#btn-add-foto").attr("disabled", false);
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        window.location.href = "<?= base_url('website/galeri_desa/') ?>" + e.route_kategori;
                    });

                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $("#add-foto-btn").html("Tambah");
                    $("#add-foto-btn").attr("disabled", false);
                    $("#btn-add-foto").html("+ Tambah Foto");
                    $("#btn-add-foto").attr("disabled", false);
                    $('.myModal').modal('hide');
                    $("#form-insert-foto")[0].reset();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                Swal.fire("Oops", xhr.responseText, "error");
                $("#add-foto-btn").html("Tambah");
                $("#add-foto-btn").attr("disabled", false);
                $("#btn-add-foto").html("+ Tambah Foto");
                $("#btn-add-foto").attr("disabled", false);
                $('.myModal').modal('hide');
                $("#form-insert-foto")[0].reset();
            }
        });
    }));

    $("#form-insert-video").on('submit', (function(event) {
        event.preventDefault();
        $("#add-video-btn").html("Sedang Menyimpan...");
        $("#add-video-btn").attr("disabled", true);
        $("#btn-add-video").html("Menyimpan...");
        $("#btn-add-video").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/tambah-galeri-video') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function(e) { // Ketika proses pengiriman berhasil
                if (e.response_code == 200) {
                    $('.myModal').modal('hide');
                    $("#form-insert-video")[0].reset();
                    $("#add-video-btn").html("Tambah");
                    $("#add-video-btn").attr("disabled", false);
                    $("#btn-add-video").html("+ Tambah Video");
                    $("#btn-add-video").attr("disabled", false);
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        window.location.href = "<?= base_url('website/galeri_desa/') ?>" + e.route_kategori;
                    });

                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $("#add-video-btn").html("Tambah");
                    $("#add-video-btn").attr("disabled", false);
                    $("#btn-add-video").html("+ Tambah Video");
                    $("#btn-add-video").attr("disabled", false);
                    $('.myModal').modal('hide');
                    $("#form-insert-video")[0].reset();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                Swal.fire("Oops", xhr.responseText, "error");
                $("#add-video-btn").html("Tambah");
                $("#add-video-btn").attr("disabled", false);
                $("#btn-add-video").html("+ Tambah Video");
                $("#btn-add-video").attr("disabled", false);
                $('.myModal').modal('hide');
                $("#form-insert-video")[0].reset();
            }
        });
    }));

    $("#form-edit-foto").on('submit', (function(event) {
        event.preventDefault();
        $("#edit-foto-btn").html("Sedang Menyimpan...");
        $("#edit-foto-btn").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/ubah-galeri-foto') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function(e) { // Ketika proses pengiriman berhasil
                if (e.response_code == 200) {
                    $('.myModal').modal('hide');
                    $("#edit-foto-btn").html("Simpan");
                    $("#edit-foto-btn").attr("disabled", false);
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        window.location.href = "<?= base_url('website/galeri_desa/') ?>" + e.route_kategori;
                    });

                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $("#edit-foto-btn").html("Simpan");
                    $("#edit-foto-btn").attr("disabled", false);
                    $('.myModal').modal('hide');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                Swal.fire("Oops", xhr.responseText, "error");
                $("#edit-foto-btn").html("Simpan");
                $("#edit-foto-btn").attr("disabled", false);
                $('.myModal').modal('hide');
            }
        });
    }));

    $("#form-edit-video").on('submit', (function(event) {
        event.preventDefault();
        $("#edit-video-btn").html("Sedang Menyimpan...");
        $("#edit-video-btn").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/ubah-galeri-video') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function(e) { // Ketika proses pengiriman berhasil
                if (e.response_code == 200) {
                    $('.myModal').modal('hide');
                    $("#edit-video-btn").html("Simpan");
                    $("#edit-video-btn").attr("disabled", false);
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        window.location.href = "<?= base_url('website/galeri_desa/') ?>" + e.route_kategori;
                    });

                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $("#edit-video-btn").html("Simpan");
                    $("#edit-video-btn").attr("disabled", false);
                    $('.myModal').modal('hide');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                Swal.fire("Oops", xhr.responseText, "error");
                $("#edit-video-btn").html("Simpan");
                $("#edit-video-btn").attr("disabled", false);
                $('.myModal').modal('hide');
            }
        });
    }));

    $(".edit_galeri").click(function() {
        let id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: '<?= base_url('website/getdata_galeri') ?>',
            dataType: "json",
            data: {
                "id_galeri": id
            },
            success: function(data) {
                // alert(data.isi_galeri);
                $('.ubah_modal').modal('show');
                $("#ubah_id_galeri").val(data.id_galeri);
                $('#ubah_imgPreview').attr('src', data.isi_galeri);
                $("#ubah_kategori_galeri").html(data.id_kategori).show();
                $("#ubah_keterangan_galeri").val(data.keterangan_galeri);
            }
        });
    });

    $(".edit_video").click(function() {
        let id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: '<?= base_url('website/getdata_video') ?>',
            dataType: "json",
            data: {
                "id_galeri": id
            },
            success: function(data) {
                // alert(data.isi_galeri);
                $('#modal_ubah_video').modal('show');
                $("#ubah_id_galeri2").val(data.id_galeri);
                $("#ubah_video_url").val(data.isi_galeri);
                let url = data.isi_galeri;
                let url_baru = (!url.includes('vimeo')) ? "//www.youtube.com/embed/" + url.split("=")[1] : "//player.vimeo.com/video/" + url.split("/")[3];
                $('#show_ubah_video').attr('src', url_baru);
                $("#ubah_id_kategori2").html(data.id_kategori).show();
                $("#ubah_keterangan_galeri2").val(data.keterangan_galeri);
            }
        });
    });

    $("#form-tambah-kategori-galeri").submit(function(event) {
        event.preventDefault();
        $("#add-btn").html("Sedang Menyimpan...");
        $("#add-btn").attr("disabled", true);
        $("#btn-add-kategori").html("Sedang Menyimpan...");
        $("#btn-add-kategori").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/tambah-kategori-galeri') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function(e) {
                if (e.response_code == 200) {
                    $('.myModal').modal('hide');
                    $("#add-btn").html("Simpan");
                    $("#add-btn").attr("disabled", false);
                    $("#btn-add-kategori").html("+");
                    $("#btn-add-kategori").attr("disabled", false);
                    Swal.fire('Berhasil', e.response_message, 'success').then((result) => {
                        window.location.href = "<?= base_url('website/galeri_desa/') ?>" + e.route_kategori;
                    });
                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $("#add-btn").html("Simpan");
                    $("#add-btn").attr("disabled", false);
                    $("#btn-add-kategori").html("+");
                    $("#btn-add-kategori").attr("disabled", false);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                Swal.fire("Oops", xhr.responseText, "error");
                $("#add-btn").html("Simpan");
                $("#add-btn").attr("disabled", false);
                $("#btn-add-kategori").html("+");
                $("#btn-add-kategori").attr("disabled", false);
            }
        });
    });

    $(".btnEditKategori").click(function() {
        let data = $(this).data('detail');
        $("#id_kategori").val(data.id_kategori);
        $("#editWarna").val(data.warna_kategori);
        $("#edit_nama_kategori").val(data.nama_kategori);
    });

    $("#form-edit-kategori-galeri").on('submit', (function(event) {
        event.preventDefault();
        $("#edit-btn").html("Sedang Menyimpan...");
        $("#edit-btn").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/edit-kategori-galeri') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function(e) { // Ketika proses pengiriman berhasil
                if (e.response_code == 200) {
                    $('.myModal').modal('hide');
                    $("#edit-btn").html("Simpan");
                    $("#edit-btn").attr("disabled", false);
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        window.location.href = "<?= base_url('website/galeri_desa/') ?>" + e.route_kategori;
                    });

                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $("#edit-btn").html("Simpan");
                    $("#edit-btn").attr("disabled", false);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                Swal.fire("Oops", xhr.responseText, "error");
                $("#edit-btn").html("Simpan");
                $("#edit-btn").attr("disabled", false);
            }
        });
    }));

    $(".btnHapusKategori").click(function() {
        let data = $(this).data('detail');
        let id_kategori = data.id_kategori;
        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data Akan Terhapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('website/hapus-kategori-galeri') ?>",
                    data: {
                        "id_kategori": id_kategori
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.response_code == 200) {
                            Swal.fire(
                                'Terhapus',
                                data.response_message,
                                'success'
                            ).then((result) => {
                                window.location.href = "<?= base_url('website/galeri_desa') ?>";
                            })
                        } else {
                            Swal.close();
                            Swal.fire("Oops", data.response_message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                        Swal.fire("Oops", xhr.responseText, "error");
                    }
                });
            }
        });
    });

    $(".hapusGaleri").click(function() {
        let id = $(this).data('id');
        let ket = $(this).data('ket');
        Swal.fire({
            title: 'Peringatan!',
            text: "Apakah anda ingin menghapus galeri " + ket + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('website/hapus_galeri') ?>",
                    data: {
                        "id_galeri": id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.response_code == 200) {
                            Swal.fire(
                                'Terhapus',
                                data.response_message,
                                'success'
                            ).then((result) => {
                                window.location.href = "<?= current_url() ?>";
                            })
                        } else {
                            Swal.close();
                            Swal.fire("Oops", data.response_message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire("Oops", xhr.responseText, "error");
                    }
                });
            }
        });
    });

    $(".ubahGaleri").click(function() {
        let id = $(this).data('id');
        let ket = $(this).data('ket');
        $("#id_kategori_galeri").val(id);
        $("#textJudul").html("Silahkan pilih kategori di bawah ini untuk galeri <b>" + ket + "</b>");
    });

    $("#form-ubah-kategori-galeri").on('submit', (function(event) {
        event.preventDefault();
        $("#simpan-ktgri").html("Sedang Menyimpan...");
        $("#simpan-ktgri").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/ubah_kategori_galeri') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function(e) {
                if (e.response_code == 200) {
                    $('.myModal').modal('hide');
                    $("#simpan-ktgri").html("Simpan");
                    $("#simpan-ktgri").attr("disabled", false);
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
                    $("#simpan-ktgri").html("Simpan");
                    $("#simpan-ktgri").attr("disabled", false);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                Swal.fire("Oops", xhr.responseText, "error");
                $("#simpan-ktgri").html("Simpan");
                $("#simpan-ktgri").attr("disabled", false);
            }
        });
    }));

    $(".lockUnlockGaleri").click(function() {
        let id = $(this).data('id');
        let ket = $(this).data('ket');
        let is_active = $(this).data('is_active');
        let thenStatus = (is_active == 1 ? "Menonaktifkan" : "Mengaktifkan") + " Galeri ";
        let confirmButton = is_active == 1 ? "Non Aktifkan" : "Aktifkan";
        let warna = is_active == 1 ? "#f43742" : "#37a0f4";
        Swal.fire({
            title: 'Peringatan!',
            text: "Apakah anda ingin " + thenStatus + ket + " ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: warna,
            cancelButtonText: 'Batal',
            confirmButtonText: confirmButton
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('website/ubah_status_galeri') ?>",
                    data: {
                        "id_galeri": id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.response_code == 200) {
                            Swal.fire(
                                'Berhasil',
                                data.response_message,
                                'success'
                            ).then((result) => {
                                window.location.href = "<?= current_url() ?>";
                            })
                        } else {
                            Swal.close();
                            Swal.fire("Oops", data.response_message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire("Oops", xhr.responseText, "error");
                    }
                });
            }
        });
    })
</script>