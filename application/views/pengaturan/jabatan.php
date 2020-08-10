<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Jabatan</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" id="tombol-tambah" style="width: 180px;" data-toggle="modal" data-target="#tambahJabatan">+ Tambah Jabatan</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid">


        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade myModal" id="tambahJabatan" tabindex="-1" role="dialog" aria-labelledby="tambahJabatan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Jabatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <!-- <form enctype="multipart/form-data" action="<?= base_url('pengaturan/tambah_jabatan') ?>" method="post"> -->
                        <form id="form-insert">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Jabatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_jabatan" id="jabatan" required>
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
                                        <th style="width: 65%; padding: 10px;">Nama Jabatan</th>
                                        <th style="width: 30%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-data">
                                    <?php $no = 1;
                                    foreach ($jabatan as $data) : ?>
                                        <?php if ($this->userData->jenis_desa == "kelurahan") : ?>
                                            <?php $data->nama_jabatan = str_replace("desa", $this->userData->jenis_desa, strtolower($data->nama_jabatan)) ?>
                                        <?php endif ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++; ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= ce($data->nama_jabatan) ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="<?= $data->id_jabatan ?>">Ubah</button>
                                                <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" value="<?= ce($data->nama_jabatan) ?>" data-id="<?= $data->id_jabatan ?>">Hapus</button>
                                            </td>

                                            <!-- MODAL HAPUS PENGGUNA -->
                                            <div class="modal fade" id="hapus_data<?= $data->id_jabatan ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_data">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Hapus Jabatan</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('pengaturan/hapus_jabatan') ?>" id="form-hapus" method="post">
                                                                <!-- <form action="#" id="form-hapus"> -->
                                                                <p>Apakah anda yakin ingin menghapus nama jabatan <?= ce($data->nama_jabatan) ?>?</p>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger" name="id_jabatan" value="<?= $data->id_jabatan ?>">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END MODAL -->
                                        </tr>
                                    <?php endforeach; ?>

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
<div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="ubahdata">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form-edit">
                <div class="tampil-data"></div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL -->

<script>
    let base_url = "<?= base_url('dokumen/downloadFile'); ?>";

    $(document).ready(function() {

        $(document).on('click', '.edit_data', function(e) {
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url('pengaturan/getdata_jabatan') ?>',
                data: {
                    "id_jabatan": id
                },
                success: function(data) {
                    $('.tampil-data').html(data); //menampilkan data ke dalam modal
                    $('#modal_ubah').modal('show');
                }
            });
        });

        //AJAX HAPUS DATA
        $(document).on('click', '.delete_data', function(e) {
            let id = $(this).attr('data-id');
            let namajabatan = $(this).val();

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus Jabatan " + namajabatan,
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
                        url: "<?= base_url('pengaturan/hapus_jabatan') ?>", // Isi dengan url/path file php yang dituju
                        data: {
                            "id_jabatan": id
                        }, // data yang akan dikirim ke file yang dituju
                        dataType: "json",

                        success: function(data) { // Ketika proses pengiriman berhasil
                            if (data.response_code == 200) {
                                Swal.fire(
                                    'Terhapus',
                                    data.response_message,
                                    'success'
                                ).then((result) => {
                                    $('#tabel-data').empty();
                                    $('#tabel-data').html(data.output);
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
                url: "<?= base_url('pengaturan/ubah_jabatan') ?>",
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('#modal_ubah').modal('hide');
                        $("#form-edit")[0].reset();
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            $('#tabel-data').empty();
                            $('#tabel-data').html(e.output);
                            $('#edit-btn').html("Simpan");
                            $('#edit-btn').attr("disabled", false);
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
                url: "<?= base_url('pengaturan/tambah_jabatan') ?>",
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
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            $('#tabel-data').empty();
                            $('#tabel-data').html(e.output);
                            $('#add-btn').html("Simpan");
                            $('#add-btn').attr("disabled", false);
                            $('#tombol-tambah').html("+ Tambah Jabatan");
                            $('#tombol-tambah').attr("disabled", false);
                        });

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah Jabatan");
                        $('#tombol-tambah').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("+ Tambah Jabatan");
                    $('#tombol-tambah').attr("disabled", false);
                }
            });
        }));

    });
</script>