<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Slider Website</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center pull-right">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success" style="width: 180px;" data-toggle="modal" data-target="#tambahSlider">+ Tambah Slider</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style="width: 20%; padding: 10px" class="text-center align-middle">Aksi</th>
                                        <th style="width: 30%; padding: 10px">Judul</th>
                                        <th style="width: 55%;padding: 10px">Isi Slider</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-tipesurat">
                                    <?php if ($slider) : ?>
                                        <?php $no = 1;
                                        foreach ($slider as $data) : ?>
                                            <tr>
                                                <td style="padding: 5px" class="text-center align-middle"><?= $no++ ?></td>
                                                <td style="padding: 5px" class="text-center align-middle">
                                                    <button title="Lihat Detail" class="btn btn-sm btn-info waves-effect waves-light btnDetail" type="button" data-toggle="modal" data-target="#detailSlider" data-detail='<?= json_encode($data, JSON_HEX_APOS) ?>'>
                                                        <span class="btn-label"><i class="fa fa-file-alt"></i></span>
                                                    </button>
                                                    <button title="Ubah Data" class="btn btn-sm btn-warning waves-effect waves-light btnUbah" type="button" data-toggle="modal" data-target="#ubahSlider" data-detail='<?= json_encode($data, JSON_HEX_APOS) ?>'>
                                                        <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    </button>
                                                    <button title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light btnHapus" type="button" data-id="<?= $data->id_slider ?>">
                                                        <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
                                                    </button>
                                                    <button title="<?= $data->is_active == 1 ? "Non Aktifkan Slider" : "Aktifkan Slider" ?>" class="btn btn-sm btn-primary waves-effect waves-light ubahStatusSlider" type="button" data-detail='<?= json_encode($data, JSON_HEX_APOS) ?>'>
                                                        <span class="btn-label"><i class="mdi <?= $data->is_active == 1 ? "mdi-close" : "mdi-check" ?>"></i></span>
                                                    </button>
                                                </td>
                                                <td style="padding: 5px" class="align-middle"><?= $data->judul_slider ?></td>
                                                <td style="padding: 5px" class="align-middle"><?= $data->isi_slider ?></td>
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

<!-- MODAL TAMBAH SLIDER-->
<div class="modal fade myModal" id="tambahSlider" tabindex="-1" role="dialog" aria-labelledby="tambahSlider">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Slider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-insert" method="POST" enctype="multipart/form-data" action="<?= base_url('website/tambah-slider') ?>">
                    <div class="row col-12 m-b-10">
                        <img id="imgPreview" class="col-md-12" src="<?= asset("website/img/ukuran-banner.jpg") ?>" alt="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Gambar Slider <span class="text-danger">*</span></label>
                        <input accept="image/*" required type="file" class="form-control-file" name="file_slider" id="file_slider" accept="image/*">
                        <small id="name1" class="text-info">Maximum Size : 5 Mb</small>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Judul Slider <span class="text-danger">*</span></label>
                        <input required type="text" class="form-control" name="judul_slider" id="judul_slider">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Isi Slider <span class="text-danger">*</span></label>
                        <textarea required type="text" class="form-control" name="isi_slider" id="isi_slider"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="add-btn">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- MODAL DETAIL SLIDER-->
<div class="modal fade myModal" id="detailSlider" tabindex="-1" role="dialog" aria-labelledby="detailSlider">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Detail Slider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row col-12 m-b-10">
                    <img id="imgPreviewDetail" class="col-md-12" src="<?= asset("website/img/ukuran-banner.jpg") ?>" alt="">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Judul Slider <span class="text-danger">*</span></label>
                    <input readonly required type="text" class="form-control" name="judul_slider" id="judulSliderDetail">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Isi Slider <span class="text-danger">*</span></label>
                    <textarea readonly required type="text" class="form-control" name="isi_slider" id="isiSliderDetail"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- MODAL UBAH SLIDER-->
<div class="modal fade myModal" id="ubahSlider" tabindex="-1" role="dialog" aria-labelledby="ubahSlider">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Ubah Data Slider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-ubah" method="POST" enctype="multipart/form-data" action="<?= base_url('website/ubah-slider') ?>">
                    <div class="row col-12 m-b-10">
                        <img id="ubah_imgPreview" class="col-md-12" src="<?= asset("website/img/ukuran-banner.jpg") ?>" alt="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Gambar Slider <span class="text-danger">*</span></label>
                        <input type="file" class="form-control-file" name="file_slider" id="ubah_file_slider" accept="image/*">
                        <small class="text-info">Maximum Size : 5 Mb</small>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Judul Slider <span class="text-danger">*</span></label>
                        <input required type="text" class="form-control" name="judul_slider" id="ubah_judul_slider">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Isi Slider <span class="text-danger">*</span></label>
                        <textarea required type="text" class="form-control" name="isi_slider" id="ubah_isi_slider"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_slider" id="ubah_id_slider">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="edit-btn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<script>
    $(".btnUbah").click(function() {
        let dataUbah = $(this).data('detail');
        $("#ubah_id_slider").val(unescape(dataUbah.id_slider));
        $('#ubah_imgPreview').attr('src', "<?= asset("website/desa/") ?>" + unescape(dataUbah.foto_slider));
        $("#ubah_judul_slider").val(unescape(dataUbah.judul_slider));
        $("#ubah_isi_slider").val(unescape(dataUbah.isi_slider));
        $("#ubah_file_slider").val('');
    });

    $(".btnDetail").click(function() {
        let data = $(this).data('detail');
        $('#imgPreviewDetail').attr('src', "<?= asset("website/desa/") ?>" + unescape(data.foto_slider));
        $("#judulSliderDetail").val(unescape(data.judul_slider));
        $("#isiSliderDetail").val(unescape(data.isi_slider));
    });

    $("#file_slider").change(function() {
        readURL(this, true);
    });

    $("#ubah_file_slider").change(function() {
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

    $("#form-insert").on('submit', (function(event) {
        event.preventDefault();
        $("#add-btn").html("Sedang Menyimpan...");
        $("#add-btn").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/tambah-slider') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,

            success: function(e) { // Ketika proses pengiriman berhasil
                if (e.response_code == 200) {
                    $('.myModal').modal('hide');
                    $("#form-insert")[0].reset();
                    $("#add-btn").html("Simpan");
                    $("#add-btn").attr("disabled", false);
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        window.location.href = "<?= base_url('website/slider') ?>";
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

    $("#form-ubah").on('submit', (function(event) {
        event.preventDefault();
        $("#edit-btn").html("Sedang Menyimpan...");
        $("#edit-btn").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/ubah-slider') ?>",
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
                        window.location.href = "<?= base_url('website/slider') ?>";
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

    $(".btnHapus").click(function() {
        let id_slider = $(this).data('id');
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
                    url: "<?= base_url('website/hapus-slider') ?>",
                    data: {
                        "id_slider": id_slider
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.response_code == 200) {
                            Swal.fire(
                                'Terhapus',
                                data.response_message,
                                'success'
                            ).then((result) => {
                                window.location.href = "<?= base_url('website/slider') ?>";
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

    $(".ubahStatusSlider").click(function() {
        let detail = $(this).data('detail');
        let swalText = (detail.is_active == 1 ? 'Menonaktifkan ' : "Mengaktifkan ") + "Slider " + detail.judul_slider;
        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: swalText,
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#2196f3',
            cancelButtonText: 'Batal',
            confirmButtonText: detail.is_active == 1 ? 'Non Aktifkan' : "Aktifkan"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('website/ubah-status-slider') ?>",
                    data: {
                        "id_slider": detail.id_slider
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.response_code == 200) {
                            Swal.fire(
                                'Berhasil',
                                data.response_message,
                                'success'
                            ).then((result) => {
                                window.location.href = "<?= base_url('website/slider') ?>";
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
</script>