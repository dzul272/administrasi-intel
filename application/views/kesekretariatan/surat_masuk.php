<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Daftar Surat Masuk</h4>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class='input-group'>
                                    <input readonly type='text' class="form-control daterange" name="jarak_tgl" id="jarak_tgl">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button id="btnCari" type="button" class="btn waves-effect waves-light btn-info" style="width: 120px;"><i class="fa fa-search"></i> Cari</button>
                                <a href="<?= base_url('kesekretariatan/surat-masuk') ?>" class="text-light btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i> Lihat Semua</a>
                            </div>
                            <div class="col-md-4">
                                <div class="float-right">
                                    <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" id="tombol-tambah" style="width: 120px;" data-toggle="modal" data-target="#tambahSuratMasuk">Tambah</button>
                                    <a href="<?= $linkExport ?>" type="button" class="btn waves-effect waves-light btn-danger" style="width: 120px;">Export</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade myModal" id="tambahSuratMasuk" tabindex="-1" role="dialog" aria-labelledby="tambahSuratMasuk">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Surat Masuk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-insert">
                            <div class="form-group">
                                <label for="message-text" class="control-label">Nomor Surat</label>
                                <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" placeholder="Nomor Surat" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Pengirim</label>
                                <input type="text" name="asal_surat" class="form-control" id="pengirim" placeholder="Asal Surat" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Tanggal Surat</label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" class="form-control" id="datepicker-autoclose2" name="tanggal_surat" placeholder="mm/dd/yyyy" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Perihal</label>
                                <textarea class="form-control" id="perihal" name="perihal_surat" rows="3" placeholder="Perihal Surat" required></textarea>
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

        <!-- tabel surat Masuk -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style="width: 23%; padding: 10px;">Nomor Surat</th>
                                        <th style="width: 32%; padding: 10px;">Perihal</th>
                                        <th style="width: 15%; padding: 10px;">Pengirim</th>
                                        <th style="width: 12%; padding: 10px;">Tanggal</th>
                                        <th style="width: 13%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-surat">
                                    <?php
                                    $no = 1;
                                    foreach ($surat_masuk as $data) : ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->nomor_surat ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->perihal_surat ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->asal_surat ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->tanggal_surat ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="<?= $data->id_surat ?>">Ubah</button>
                                                <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="<?= $data->id_surat ?>">Hapus</button>
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

<!-- MODAL UBAH SURAT MASUK -->
<div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="ubah_surat">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Surat Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-edit">
                    <input type="hidden" name="id_surat" id="id_surat_tampil">
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nomor Surat</label>
                        <input type="text" name="nomor_surat" class="form-control" id="nomor_surat_tampil" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Pengirim</label>
                        <input type="text" name="asal_surat" class="form-control" id="asal_surat_tampil" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Tanggal Surat</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control tanggal_surat_tampil" id="datepicker-autoclose" name="tanggal_surat" placeholder="mm/dd/yyyy" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Perihal</label>
                        <textarea class="form-control" id="perihal_surat_tampil" name="perihal_surat" rows="3" required></textarea>
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
    $("#btnCari").click(function() {
        let tanggal = $("#jarak_tgl").val().replace(/ /g, "").split('-');
        let awal = tanggal[0];
        let akhir = tanggal[1];
        window.location.replace("<?= base_url('kesekretariatan/surat-masuk/?awal=') ?>" + awal + '&akhir=' + akhir);
    })

    $(document).ready(function() {

        $(document).on('click', '.edit_data', function(e) {
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url('kesekretariatan/getdata_suratmasuk') ?>',
                dataType: "json",
                data: {
                    "id_surat": id
                },
                success: function(data) {
                    // alert(data);
                    $('#modal_ubah').modal('show');
                    $('#id_surat_tampil').val(data.id_surat);
                    $('#nomor_surat_tampil').val(data.nomor_surat);
                    $('#asal_surat_tampil').val(data.asal_surat);
                    $('.tanggal_surat_tampil').val(data.tanggal_surat);
                    $('#perihal_surat_tampil').val(data.perihal_surat);
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
                        url: "<?= base_url('kesekretariatan/hapus_surat_masuk') ?>", // Isi dengan url/path file php yang dituju
                        data: {
                            "id_surat": id
                        }, // data yang akan dikirim ke file yang dituju
                        dataType: "json",

                        success: function(data) { // Ketika proses pengiriman berhasil
                            if (data.response_code == 200) {
                                Swal.fire(
                                    'Terhapus',
                                    data.response_message,
                                    'success'
                                ).then((result) => {
                                    $('#tabel-surat').empty();
                                    $('#tabel-surat').html(data.output);
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
                url: "<?= base_url('kesekretariatan/ubah_surat_masuk') ?>",
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
                            $('#tabel-surat').empty();
                            $('#tabel-surat').html(e.output);
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
                url: "<?= base_url('kesekretariatan/tambah_surat_masuk') ?>",
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
                        $('#tombol-tambah').html("Tambah");
                        $('#tombol-tambah').attr("disabled", false);
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            $('#tabel-surat').empty();
                            $('#tabel-surat').html(e.output);
                        });

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("Tambah");
                        $('#tombol-tambah').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("Tambah");
                    $('#tombol-tambah').attr("disabled", false);
                }
            });
        }));

    });
</script>