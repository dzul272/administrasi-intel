<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Daftar Artikel : <?= ce($current_kategori->nama_kategori) ?></h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center pull-right">
                    <div class="ml-auto">
                        <a href="<?= base_url('website/tambah-artikel') ?>" class="btn waves-effect waves-light btn-success" style="width: 180px;">+ Tambah Artikel</a>
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
                            <span>Kategori Artikel</span>
                            <div class="pull-right">
                                <button title="Tambah Kategori" type="button" class="btn btn-sm waves-effect waves-light btn-success" data-toggle="modal" data-target="#tambahKategori">+</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table>
                                <?php
                                foreach ($kategori_artikel as $dataKategori) : ?>
                                    <tr>
                                        <td style="width: 75%">
                                            <a href="<?= base_url("website/artikel/" . $dataKategori->route_kategori) ?>" style="width: 100%" class="col-md-12 list-group-item waves-effect waves-dark <?= $current_kategori->id_kategori == $dataKategori->id_kategori ? "active" : "text-dark" ?>">
                                                <?= $dataKategori->nama_kategori ?>
                                                <span class="badge badge-pill badge-danger pull-right"><?= $dataKategori->total_artikel ?></span>
                                            </a>
                                        </td>
                                        <td>
                                            <div>
                                                <?php
                                                $canDelete = TRUE;
                                                if ($dataKategori->isprotect_kategori == 1 || $dataKategori->total_artikel > 0) {
                                                    $canDelete = FALSE;
                                                }
                                                ?>
                                                <button data-toggle="modal" data-target="#editKategori" data-detail='<?= json_encode($dataKategori) ?>' <?= $dataKategori->isprotect_kategori == 1 ? "disabled" : "" ?> title="<?= $dataKategori->isprotect_kategori == 1 ? "Kategori Tidak Dapat Diedit" : "Edit Kategori" ?>" style="height: 100%;" class="btn btn-primary btnEditKategori <?= $canDelete ? "" : "ultra-disabled" ?>"><i class="mdi mdi-lead-pencil"></i></button>
                                                <button data-toggle="modal" data-target="#hapusKategori" data-detail='<?= json_encode($dataKategori) ?>' <?= $canDelete ? "" : "disabled" ?> title="<?= $canDelete ? "Hapus Kategori" : "Kategori Tidak Dapat Di Hapus" ?>" style="height: 100%;" class="btn btn-danger btnHapusKategori <?= $canDelete ? "" : "ultra-disabled" ?>"><i class="mdi mdi-delete"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card col-md-8">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style="width: 25%; padding: 10px" class="text-center align-middle">Aksi</th>
                                        <th style="width: 30%; padding: 10px">Judul</th>
                                        <th style="padding: 10px">Oleh</th>
                                        <th style="padding: 10px">Aktif</th>
                                        <th style="padding: 10px">Di Posting Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($artikel) : ?>
                                        <?php $no = 1;
                                        foreach ($artikel as $dataArtikel) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>
                                                    <a href="<?= base_url('website/ubah-artikel/' . $dataArtikel->slug_artikel) ?>" data-toggle="tooltip" data-placement="top" title="Ubah Artikel" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    <button data-id='<?= $dataArtikel->id_artikel ?>' data-judul='<?= $dataArtikel->judul_artikel ?>' href="#" data-toggle="tooltip" data-placement="top" title="Hapus Artikel" class="btn btn-sm btn-danger hapusArtikel"><i class="far fa-trash-alt"></i></button>
                                                    <span data-toggle="modal" data-target="#ubahKategoriArtikel">
                                                        <a data-id='<?= $dataArtikel->id_artikel ?>' data-judul='<?= $dataArtikel->judul_artikel ?>' href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Ubah Kategori" class="btn btn-sm btn-primary ubahArtikel"><i class="fas fa-pencil-alt"></i></a>
                                                    </span>
                                                    <button data-is_active='<?= $dataArtikel->is_active ?>' data-id='<?= $dataArtikel->id_artikel ?>' data-judul='<?= $dataArtikel->judul_artikel ?>' href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="<?= $dataArtikel->is_active == 1 ? "Non" : "" ?> Aktifkan Artikel" class="btn btn-sm btn-info lockUnlockArtikel"><i class="fas <?= $dataArtikel->is_active == 1 ? "fa-unlock" : "fa-lock" ?>"></i></button>
                                                </td>
                                                <td>
                                                    <?php if ($dataArtikel->is_active == 1) : ?>
                                                        <a href="<?= "https://" . $this->userData->website_desa . "berita/" . $dataArtikel->kategori->route_kategori . "/" .  $dataArtikel->slug_artikel ?>" target="_blank" rel="noopener noreferrer">
                                                            <?= $dataArtikel->judul_artikel ?>
                                                        </a>
                                                    <?php else : ?>
                                                        <?= $dataArtikel->judul_artikel ?>
                                                    <?php endif ?>
                                                </td>
                                                <td><?= $dataArtikel->user->nama_user ?></td>
                                                <td><?= $dataArtikel->is_active == 1 ? "Ya" : "Tidak" ?></td>
                                                <td><?= datetime_indo($dataArtikel->created_at) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH KATEGORI -->
<div class="modal fade myModal" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="tambahKategori">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Kategori Artikel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form-tambah-kategori-artikel" enctype="multipart/form-data" action="<?= base_url('website/tambah-kategori-artikel') ?>" method="post">
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
                <h4 class="modal-title" id="exampleModalLabel1">Edit Kategori Artikel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form-edit-kategori-artikel" enctype="multipart/form-data" action="<?= base_url('website/edit-kategori-artikel') ?>" method="post">
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
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL EDIT KATEGORI -->

<!-- MODAL UBAH ARTIKEL -->
<div class="modal fade myModal" id="ubahKategoriArtikel" tabindex="-1" role="dialog" aria-labelledby="editKategori">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Ubah Kategori Artikel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form-ubah-kategori-artikel" enctype="multipart/form-data" action="<?= base_url('website/ubah_kategori_artikel') ?>" method="post">
                <div class="modal-body">
                    <span id="textJudul"></span>
                    <select required class="select2 form-control custom-select" style="width: 100%;" name="id_kategori" id="id_kategori">
                        <option value="">Pilih Kategori Artikel</option>
                        <?php foreach ($kategori_artikel as $kategori) : ?>
                            <option value='<?= $kategori->id_kategori ?>'><?= $kategori->nama_kategori ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_artikel" id="id_kategori_artikel">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info ultra-disabled" id="simpan-ktgri">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL EDIT KATEGORI -->



<script>
    $("#form-tambah-kategori-artikel").submit(function(event) {
        event.preventDefault();
        $("#add-btn").html("Sedang Menyimpan...");
        $("#add-btn").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/tambah-kategori-artikel') ?>",
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
                    Swal.fire('Berhasil', e.response_message, 'success').then((result) => {
                        window.location.href = "<?= base_url('website/artikel/') ?>" + e.slug;
                    });
                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $("#add-btn").html("Simpan");
                    $("#add-btn").attr("disabled", false);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                Swal.fire("Oops", xhr.responseText, "error");
                $("#add-btn").html("Simpan");
                $("#add-btn").attr("disabled", false);
            }
        });
    });

    $(".btnEditKategori").click(function() {
        let data = $(this).data('detail');
        $("#id_kategori").val(data.id_kategori);
        $("#editWarna").val(data.warna_kategori);
        $("#edit_nama_kategori").val(data.nama_kategori);
    });

    $("#form-edit-kategori-artikel").on('submit', (function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?= base_url('website/edit-kategori-artikel') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function(e) { // Ketika proses pengiriman berhasil
                if (e.response_code == 200) {
                    $('.myModal').modal('hide');
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        window.location.href = "<?= base_url('website/artikel/') ?>" + e.slug;
                    });

                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                Swal.fire("Oops", xhr.responseText, "error");
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
                    url: "<?= base_url('website/hapus-kategori-artikel') ?>",
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
                                window.location.href = "<?= base_url('website/artikel') ?>";
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

    $(".hapusArtikel").click(function() {
        let id = $(this).data('id');
        let judul = $(this).data('judul');
        Swal.fire({
            title: 'Peringatan!',
            text: "Apakah anda ingin menghapus artikel " + judul + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('website/hapus_artikel') ?>",
                    data: {
                        "id_artikel": id
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

    $(".ubahArtikel").click(function() {
        let id = $(this).data('id');
        let judul = $(this).data('judul');
        $("#id_kategori_artikel").val(id);
        $("#textJudul").html("Silahkan pilih kategori di bawah ini untuk artikel <b>" + judul + "</b>");
    });

    $("#form-ubah-kategori-artikel").on('submit', (function(event) {
        event.preventDefault();
        $("#simpan-ktgri").html("Sedang Menyimpan...");
        $("#simpan-ktgri").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/ubah_kategori_artikel') ?>",
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

    $(".lockUnlockArtikel").click(function() {
        let id = $(this).data('id');
        let judul = $(this).data('judul');
        let is_active = $(this).data('is_active');
        let thenStatus = (is_active == 1 ? "Menonaktifkan" : "Mengaktifkan") + " Artikel ";
        let confirmButton = is_active == 1 ? "Non Aktifkan" : "Aktifkan";
        let warna = is_active == 1 ? "#f43742" : "#37a0f4";
        Swal.fire({
            title: 'Peringatan!',
            text: "Apakah anda ingin " + thenStatus + judul + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: warna,
            cancelButtonText: 'Batal',
            confirmButtonText: confirmButton
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('website/ubah_status_artikel') ?>",
                    data: {
                        "id_artikel": id
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