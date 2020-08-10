<div class="table-responsive p-0">
    <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            <tr>
                <th style="width: 5%; padding: 10px;">No</th>
                <th style="width: 25%; padding: 10px">Aksi</th>
                <th style="width: 45%;padding: 10px">Nama Kontak</th>
                <th style="width: 35%; padding: 10px">No Handphone</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($kontak) : ?>
                <?php $no = 1;
                foreach ($kontak as $k) : ?>
                    <tr>
                        <td style="padding: 10px;"><?= $no++ ?></td>
                        <td style="padding: 10px;">
                            <button data-detail='<?= json_encode($k) ?>' data-toggle="modal" data-target="#editKontak" class="btnEditKontak btn btn-info btn-sm waves-effect waves-light">Edit</button>
                            <button data-detail='<?= json_encode($k) ?>' class="btnHapusKontak btn btn-danger btn-sm waves-effect waves-light">Hapus</button>
                            <button title="<?= ($k->is_favorite == 1 ? "Hapus dari" : "Masukan ke") . " daftar kontak favorite" ?>" data-detail='<?= json_encode($k) ?>' class="favoriteButton btn btn-primary btn-sm waves-effect waves-light"><i class="mdi <?= $k->is_favorite == 1 ? "mdi-star" : "mdi-star-outline" ?>"></i></button>
                        </td>
                        <td style="padding: 10px;"><?= $k->nama_kontak ?></td>
                        <td style="padding: 10px;"><?= $k->nomor_kontak ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<!-- MODAL TAMBAH KONTAK -->
<div class="modal fade myModal" id="tambahKontak" tabindex="-1" role="dialog" aria-labelledby="tambahRole">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Kontak Penting</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-tambah-kontak" method="POST" action="<?= base_url("website/proses_tambah_kontak") ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Kontak <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_kontak" id="nama_kontak" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nomor Kontak <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nomor_kontak" id="nomor_kontak" required>
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
<!-- END MODAL TAMBAH KONTAK -->

<!-- MODAL EDIT KONTAK -->
<div class="modal fade myModal" id="editKontak" tabindex="-1" role="dialog" aria-labelledby="tambahRole">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Edit Kontak Penting</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-kontak" method="POST" action="<?= base_url("website/proses_edit_kontak") ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Kontak <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_kontak" id="edit_nama_kontak" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nomor Kontak <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nomor_kontak" id="edit_nomor_kontak" required>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_kontak" id="id_kontak">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="edit-btn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL TAMBAH KONTAK -->


<script>
    $(".btnEditKontak").click(function() {
        let data = $(this).data('detail');
        $("#id_kontak").val(data.id_kontak);
        $("#edit_nama_kontak").val(data.nama_kontak);
        $("#edit_nomor_kontak").val(data.nomor_kontak);
    });

    $("#form-tambah-kontak").on('submit', (function(event) {
        event.preventDefault();
        $("#add-btn").html("Sedang Menyimpan...");
        $("#add-btn").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/proses_tambah_kontak') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function(e) { // Ketika proses pengiriman berhasil
                $(".myModal").hide();
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
                    Swal.fire("Oops", e.response_message, "error").then((result) => {
                        window.location.href = "<?= current_url() ?>";
                    });
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

    $("#form-edit-kontak").on('submit', (function(event) {
        event.preventDefault();
        $("#edit-btn").html("Sedang Menyimpan...");
        $("#edit-btn").attr("disabled", true);
        $.ajax({
            url: "<?= base_url('website/proses_edit_kontak') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function(e) {
                $(".myModal").hide();
                $("#edit-btn").html("Simpan");
                $("#edit-btn").attr("disabled", false);
                if (e.response_code == 200) {
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        window.location.href = "<?= current_url() ?>";
                    });

                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error").then((result) => {
                        window.location.href = "<?= current_url() ?>";
                    });
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

    $(".btnHapusKontak").click(function() {
        let data = $(this).data('detail');
        let id_kontak = data.id_kontak;
        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data kontak " + data.nama_kontak + " Akan terhapus.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('website/hapus_kontak') ?>",
                    data: {
                        "id_kontak": id_kontak
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
    })

    $(".favoriteButton").click(function() {
        let detail = $(this).data('detail');
        let thenStatus = (detail.is_favorite == 1 ? "Hapus dari" : "Masukan ") + " daftar kontak favorite ";
        let confirmButton = detail.is_favorite == 1 ? "Hapus dari Favorite" : "Masukan Ke Favorite";
        let warna = detail.is_favorite == 1 ? "#f43742" : "#37a0f4";
        Swal.fire({
            title: 'Peringatan!',
            text: "Apakah anda ingin " + thenStatus + detail.nama_kontak + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: warna,
            cancelButtonText: 'Batal',
            confirmButtonText: confirmButton
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('website/ubah_status_kontak') ?>",
                    data: {
                        "id_kontak": detail.id_kontak
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