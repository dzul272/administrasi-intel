<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Daftar Role</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" style="width: 180px;" data-toggle="modal" data-target="#tambahRole" id="tombol-tambah">+ Tambah Role</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid">

        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade myModal" id="tambahRole" tabindex="-1" role="dialog" aria-labelledby="tambahRole">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Role</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-insert">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Silahkan isi data role baru disini</label>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Role <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_role" id="nama_role" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Hak Akses (Bisa pilih lebih dari satu) <span class="text-danger">*</span></label>
                                <?php foreach ($akses as $key) : ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck<?= $key->id_akses; ?>" name="hak_akses[]" value="<?= $key->id_akses; ?>">
                                        <label class="custom-control-label" for="customCheck<?= $key->id_akses; ?>"><?= $key->nama_akses ?></label>
                                    </div>
                                <?php endforeach ?>
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

        <div class="row">
            <div class="col-12">
                <?php if ($this->session->flashdata("sukses")) : ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        <h3 class="text-success"><i class="fa fa-check-circle"></i> Sukses</h3> <?= $this->session->flashdata("sukses") ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata("gagal")) : ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Gagal</h3> <?= $this->session->flashdata("gagal") ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- tabel surat keluar -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style="width: 15%; padding: 10px;">Nama Role</th>
                                        <th style="width: 65%; padding: 10px;">Hak Akses</th>
                                        <th style="width: 15%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($role as $data) : ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++; ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= ce($data->nama_role) ?></td>
                                            <td style="padding: 5px;" class="align-middle">
                                                <?php
                                                $size = count($data->detail);
                                                $i = 0;
                                                $id_roledetail = [];
                                                foreach ($data->detail as $detail) : ?>
                                                    <?php array_push($id_roledetail, $detail->id_akses) ?>
                                                    <?= ce($detail->nama_akses) ?>
                                                    <?php if (++$i !== $size) : ?>
                                                        <?= ", " ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button class="btn btn-sm btn-warning waves-effect waves-light" style="width: 60px;" type="button" data-toggle="modal" data-target="#ubahdata<?= $data->id_role ?>">Ubah</button>
                                                <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" style="width: 60px;" type="button" data-id="<?= $data->id_role ?>">Hapus</button>
                                            </td>

                                            <!-- MODAL UBAH DATA -->
                                            <div class="modal fade" id="ubahdata<?= $data->id_role ?>" tabindex="-1" role="dialog" aria-labelledby="ubahdata<?= $data->id_role ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Role</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- <form class="formEdit" action="<?= base_url("akses/ubah-role") ?>" method="post"> -->
                                                            <form class="form-edit">
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Silahkan isi data role baru disini</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Nama Role <span class="text-danger">*</span></label>
                                                                    <input type="text" value="<?= $data->nama_role ?>" class="form-control" name="nama_role" id="nama_role" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Hak Akses (Bisa pilih lebih dari satu) <span class="text-danger">*</span></label>
                                                                    <?php foreach ($akses as $key) : ?>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" <?= in_array($key->id_akses, $id_roledetail) ? "checked" : "" ?> class="custom-control-input" id="editCustomCheck<?= $key->id_akses . "_" . $no ?>" name="hak_akses[]" value="<?= $key->id_akses; ?>">
                                                                            <label class="custom-control-label" for="editCustomCheck<?= $key->id_akses . "_" . $no ?>"><?= $key->nama_akses ?></label>
                                                                        </div>
                                                                    <?php endforeach ?>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id_role" value="<?= $data->id_role ?>">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success ultra-disabled" id="edit-btn">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END MODAL -->

                                            <!-- MODAL HAPUS PENGGUNA -->
                                            <div class="modal fade" id="hapusdata<?= $data->id_role ?>" tabindex="-1" role="dialog" aria-labelledby="hapusdata<?= $data->id_role ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Hapus Pengguna</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="<?= base_url("akses/hapus-role") ?>">
                                                                <p>Apakah anda yakin ingin menghapus Role <b><?= ce($data->nama_role) ?></b> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id_role" value="<?= $data->id_role ?>">
                                                            <input type="hidden" name="nama_role" value="<?= $data->nama_role ?>">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END MODAL -->
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


<script>
    let base_url = "<?= base_url('dokumen/downloadFile'); ?>";

    $(document).ready(function() {
        $(document).on('click', '.edit_data', function(e) {
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url('akses/getdata_pengguna') ?>',
                dataType: "json",
                data: {
                    "id_user": id
                },

                success: function(data) {
                    // $('.tampil-data').html(data);//menampilkan data ke dalam modal

                    $('#modal_ubah').modal('show');
                    $('#id_user2').val(data.id_user);
                    $('#nama_user2').val(data.nama_user);
                    $('#username_user2').val(data.username_user);
                    $('#akses2').html(data.id_role).show();
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
                        url: "<?= base_url('akses/hapus_role') ?>", // Isi dengan url/path file php yang dituju
                        data: {
                            "id_role": id
                        }, // data yang akan dikirim ke file yang dituju
                        dataType: "json",

                        success: function(data) { // Ketika proses pengiriman berhasil
                            if (data.response_code == 200) {
                                Swal.fire(
                                    'Terhapus',
                                    data.response_message,
                                    'success'
                                ).then((result) => {
                                    // $('#tabel-user').empty();
                                    // $('#tabel-user').html(data.output);
                                    window.location.href = "<?= base_url('akses/role') ?>";
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
        $(".form-edit").on('submit', (function(event) {
            event.preventDefault();
            $('#edit-btn').html("Sedang Menyimpan...");
            $('#edit-btn').attr("disabled", true);
            $.ajax({
                url: "<?= base_url('akses/ubah_role') ?>",
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('#edit-btn').html("Simpan");
                        $('#edit-btn').attr("disabled", false);
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            window.location.href = "<?= base_url('akses/role') ?>";
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
            $('#tombol-tambah').html("Sedang Menyimpan...");
            $('#tombol-tambah').attr("disabled", true);
            $.ajax({
                url: "<?= base_url('akses/tambah_role') ?>",
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
                        $('#tombol-tambah').html("+ Tambah Role");
                        $('#tombol-tambah').attr("disabled", false);
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            window.location.href = "<?= base_url('akses/role') ?>";
                        });

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah Role");
                        $('#tombol-tambah').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("+ Tambah Role");
                    $('#tombol-tambah').attr("disabled", false);
                }
            });
        }));

    });
</script>