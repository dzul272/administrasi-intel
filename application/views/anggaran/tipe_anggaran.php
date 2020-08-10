<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Tipe Anggaran</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" id="tombol-tambah" style="width: 180px;" data-toggle="modal" data-target="#tambahAnggaran">+ Tambah</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid">


        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade myModal" id="tambahAnggaran" tabindex="-1" role="dialog" aria-labelledby="tambahAnggaran">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Tipe Anggaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-insert">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Tipe <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_tipeanggaran" id="nama_tipeanggaran" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Jenis Tipe Anggaran <span class="text-danger">*</span></label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="jenis_tipeanggaran" id="jenis_tipeanggaran" required>
                                    <option value="">Pilih Jenis Tipe Anggaran</option>
                                    <option value="1">Pemasukan</option>
                                    <option value="2">Pengeluaran</option>
                                </select>
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
                                        <th style="width: 45%; padding: 10px;">Nama Tipe Anggaran</th>
                                        <th style="width: 20%; padding: 10px;">Jenis Tipe Anggaran</th>
                                        <th style="width: 30%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-data">
                                    <?php $no = 1;
                                    foreach ($tipe_anggaran as $data) : ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++; ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= ce($data->nama_tipeanggaran) ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->jenis_tipeanggaran == 1 ? "Pemasukan" : "Pengeluaran" ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="<?= $data->id_tipeanggaran ?>">Ubah</button>
                                                <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" value="<?= ce($data->nama_tipeanggaran) ?>" data-id="<?= $data->id_tipeanggaran ?>">Hapus</button>
                                            </td>
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
                <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Tipe Anggaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-edit" method="POST" action="<?= base_url('anggaran/ubah_tipeanggaran') ?>">
                    <input type="hidden" class="form-control" name="id_tipeanggaran" id="id_tipeanggaran_ubah">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Tipe Anggaran <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_tipeanggaran" id="nama_tipeanggaran_ubah" val="" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Jenis Tipe Anggaran <span class="text-danger">*</span></label>
                        <select class="select2 form-control custom-select" style="width: 100%;" name="jenis_tipeanggaran" id="jenis_tipeanggaran_ubah" required>
                            
                        </select>
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
            $.ajax({
                type: 'POST',
                url: '<?= base_url('anggaran/getdata_tipeanggaran') ?>',
                data: {
                    "id_tipeanggaran": id
                },
                dataType: "JSON",
                success: function(data) { //menampilkan data ke dalam modal
                    $('#id_tipeanggaran_ubah').val(data.id_tipeanggaran);
                    $('#nama_tipeanggaran_ubah').val(data.nama_tipeanggaran);
                    $('#jenis_tipeanggaran_ubah').html(data.jenis_tipeanggaran).show();
                    $('#modal_ubah').modal('show');
                }
            });
        });

        //AJAX HAPUS DATA
        $(document).on('click', '.delete_data', function(e) {
            let id = $(this).attr('data-id');
            let namatipeanggaran = $(this).val();

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus Tipe Anggaran " + namatipeanggaran,
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
                        url: "<?= base_url('anggaran/hapus_anggaran') ?>", // Isi dengan url/path file php yang dituju
                        data: {
                            "id_tipeanggaran": id
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
                url: "<?= base_url('anggaran/ubah_tipeanggaran') ?>",
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
                url: "<?= base_url('anggaran/tambah_tipeanggaran') ?>",
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
                            $('#tombol-tambah').html("+ Tambah");
                            $('#tombol-tambah').attr("disabled", false);
                        });

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah");
                        $('#tombol-tambah').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("+ Tambah");
                    $('#tombol-tambah').attr("disabled", false);
                }
            });
        }));

    });
</script>