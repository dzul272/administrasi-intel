<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Pengaturan Surat</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" id="tombol-tambah" style="width: 180px;" data-toggle="modal" data-target="#tambahTipeSurat">+ Tambah Tipe Surat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade myModal" id="tambahTipeSurat" tabindex="-1" role="dialog" aria-labelledby="tambahTipeSurat">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Tipe Surat</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <!-- <form enctype="multipart/form-data" action="<?= base_url('pengaturan/tambah_jabatan') ?>" method="post"> -->
                        <form id="form-insert">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kode Tipe Surat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kode_tipesurat" id="kode_tipesurat" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Tipe Surat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_tipesurat" id="nama_tipesurat" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success ultra-disabled" id="add-btn">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style="width: 60%; padding: 10px">Nama Surat</th>
                                        <th style="width: 15%;padding: 10px">Kode Surat</th>
                                        <th style="width: 20%; padding: 10px" class="text-center align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-tipesurat">
                                    <?php
                                    $no = 1;
                                    foreach ($tipesurat as $data) : ?>
                                        <tr>
                                            <td style="padding: 5px" class="text-center align-middle"><?= $no++ ?></td>
                                            <td style="padding: 5px" class="align-middle"><?= $data->nama_tipesurat ?></td>
                                            <td style="padding: 5px" class="align-middle"><?= $data->kode_tipesurat ?></td>
                                            <td style="padding: 5px" class="text-center align-middle">
                                                <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" style="width: 70px;" type="button" data-id="<?= $data->id_tipesurat ?>">
                                                    <span class="btn-label"><i class="far fa-edit"></i></span> ubah
                                                </button>
                                                <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" style="width: 70px;" type="button" data-id="<?= $data->id_tipesurat ?>">
                                                    <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span> Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL UBAH DATA -->
<div class="modal fade myModal" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="modal_ubah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Ubah Kode Surat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-edit">
                    <input type="hidden" name="id_tipesurat" id="id_tipesurat">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kode Tipe Surat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="kode_tipesurat" id="kode_tipesurat2" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Tipe Surat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_tipesurat" id="nama_tipesurat2" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="edit-btn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<script>
    $(document).ready(function() {

        $(document).on('click', '.edit_data', function(e) {
            let id = $(this).attr('data-id');
            // alert(id);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('surat/getdata_tipesurat') ?>',
                dataType: "json",
                data: {
                    "id_tipesurat": id
                },
                success: function(data) {
                    // alert(data);
                    $('#modal_ubah').modal('show');
                    $('#id_tipesurat').val(data.id_tipesurat);
                    $('#kode_tipesurat2').val(data.kode_tipesurat);
                    $('#nama_tipesurat2').val(data.nama_tipesurat);
                }
            });
        });

        //AJAX HAPUS DATA
        $(document).on('click', '.delete_data', function(e) {
            let id = $(this).attr('data-id');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data Akan Terhapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    // //START AJAX 
                    $.ajax({
                        type: "POST", // Method pengiriman data bisa dengan GET atau POST
                        url: "<?= base_url('surat/hapus_tipesurat') ?>", // Isi dengan url/path file php yang dituju
                        data: {
                            "id_tipesurat": id
                        }, // data yang akan dikirim ke file yang dituju
                        dataType: "json",

                        success: function(data) { // Ketika proses pengiriman berhasil
                            if (data.response_code == 200) {
                                Swal.fire(
                                    'Terhapus',
                                    data.response_message,
                                    'success'
                                ).then((result) => {
                                    $('#tabel-tipesurat').empty();
                                    $('#tabel-tipesurat').html(data.output);
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
                    //  // END AJAX

                }
            });
        });

        // AJAX UPDATE DATA
        $("#form-edit").on('submit', (function(event) {
            event.preventDefault();
            $('#edit-btn').html("Sedang Menyimpan...");
            $('#edit-btn').attr("disabled", true);
            $.ajax({
                url: "<?= base_url('surat/ubah_tipesurat') ?>",
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('#modal_ubah').modal('hide');
                        $('#edit-btn').html("Simpan");
                        $('#edit-btn').attr("disabled", false);
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            $('#tabel-tipesurat').empty();
                            $('#tabel-tipesurat').html(e.output);
                        });

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#edit-btn').html("Simpan");
                        $('#edit-btn').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#edit-btn').html("Simpan");
                    $('#edit-btn').attr("disabled", false);
                }
            });
        }));

        // AJAX TAMBAH DATA
        $("#form-insert").on('submit', (function(event) {
            event.preventDefault();
            $('#add-btn').html("Sedang Menyimpan...");
            $('#add-btn').attr("disabled", true);
            $('#tombol-tambah').html("Menyimpan...");
            $('#tombol-tambah').attr("disabled", true);
            $.ajax({
                url: "<?= base_url('surat/tambah_tipesurat') ?>",
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
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah Tipe Surat");
                        $('#tombol-tambah').attr("disabled", false);
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            $('#tabel-tipesurat').empty();
                            $('#tabel-tipesurat').html(e.output);
                        });

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah Tipe Surat");
                        $('#tombol-tambah').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("+ Tambah Tipe Surat");
                    $('#tombol-tambah').attr("disabled", false);
                }
            });
        }));

    });
</script>