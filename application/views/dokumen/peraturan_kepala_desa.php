<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Data Peraturan Kepala <?= ce($this->userData->jenis_desa) ?></h4>
            </div>

        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <select class="select2 form-control custom-select" style="width: 150px;" name="tahun" id="tahun">
                            <option value="">Pilih Tahun</option>
                            <option <?= $this->input->get('tahun') == "semua" ? "selected" : "" ?> value="semua">Semua</option>
                            <?php foreach ($dataTahun as $data) : ?>
                                <option <?= $this->input->get('tahun') == $data->tahun ? "selected" : "" ?> value="<?= $data->tahun ?>"><?= $data->tahun ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button id="btnCari" type="button" class="btn waves-effect waves-light btn-info" style="width: 120px;"><i class="fa fa-search"></i> Cari</button>

                        <div class="float-right">
                            <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" id="tombol-tambah" style="width: 120px;" data-toggle="modal" data-target="#tambahPerdes">Tambah Data</button>
                            <?php $thn = $this->input->get("tahun") == "" ? "semua" : $this->input->get("tahun"); ?>
                            <a href="<?= base_url('dokumen/export-peraturan-kepala-desa/?tahun=' . $thn) ?>" id="export" type="button" class="btn waves-effect waves-light btn-danger" style="width: 120px;">Export</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade myModal" id="tambahPerdes" tabindex="-1" role="dialog" aria-labelledby="tambahPerdes">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Peraturan Kepala <?= ce($this->userData->jenis_desa) ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-insert" enctype='multipart/form-data'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Nomor peraturan kepala <?= ce($this->userData->jenis_desa) ?></label>
                                        <input type="text" class="form-control" name="no_perkades" id="nomor_perkades" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Tanggal peraturan kepala <?= ce($this->userData->jenis_desa) ?></label>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" class="form-control tgl_perkades" id="datepicker-autoclose5" name="tgl_perkades" placeholder="mm/dd/yyyy" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Tentang</label>
                                <input type="text" class="form-control" name="tentang" id="tentang" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Uraian singkat</label>
                                <input type="text" class="form-control" name="uraian" id="uraian_singkat" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Nomor Dilaporkan</label>
                                        <input type="text" class="form-control" name="no_dilaporkan" id="nomor_dilaporkan" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Tanggal Dilaporkan</label>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" class="form-control tgl_dilaporkan" id="datepicker-autoclose2" name="tgl_dilaporkan" placeholder="mm/dd/yyyy" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Pilih Dokumen</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="file_lampiran">
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih File Dokumen</label>
                                    </div>
                                </div>
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

        <!-- tabel surat keluar -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 3%; padding: 10px;" class="align-middle text-center" rowspan="2">No</th>
                                        <th style="width: 30%; padding: 10px;" class="align-middle text-center" colspan="2">Peraturan Kepala <?= ce($this->userData->jenis_desa) ?></th>
                                        <th style="width: 23%; padding: 10px;" class="align-middle text-center" rowspan="2">Tentang</th>
                                        <th style="width: 30%; padding: 10px;" class="align-middle text-center" colspan="2">Dilaporkan</th>
                                        <th style="width: 14%; padding: 10px;" class="align-middle text-center" rowspan="2">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%; padding: 10px;" class="align-middle text-center">Nomor</th>
                                        <th style="width: 15%; padding: 10px;" class="align-middle text-center">Tanggal</th>
                                        <th style="width: 15%; padding: 10px;" class="align-middle text-center">Nomor</th>
                                        <th style="width: 15%; padding: 10px;" class="align-middle text-center">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($sk_perkades as $data) : ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++; ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $data->no_perkades ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $data->tgl_perkades ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= sc($data->tentang) ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $data->no_dilaporkan ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $data->tgl_dilaporkan ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button title="Lihat Detail" class="btn btn-sm btn-info waves-effect waves-light" type="button" data-toggle="modal" data-target="#lihat_data<?= $data->id_sk_perkades ?>">
                                                    <span class="btn-label"><i class="fa fa-file-alt"></i></span>
                                                </button>
                                                <button title="Ubah Data" class="btn btn-sm btn-warning waves-effect waves-light" type="button" data-toggle="modal" data-target="#ubah_data<?= $data->id_sk_perkades ?>">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                </button>
                                                <button title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="<?= $data->id_sk_perkades ?>">
                                                    <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
                                                </button>
                                            </td>

                                            <!-- MODAL LIHAT DATA-->
                                            <div class="modal fade" id="lihat_data<?= $data->id_sk_perkades ?>" tabindex="-1" role="dialog" aria-labelledby="lihat_data">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-info">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Detail Peraturan Kepala <?= ce($this->userData->jenis_desa) ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="control-label">Nomor peraturan kepala <?= ce($this->userData->jenis_desa) ?></label>
                                                                        <input type="text" class="form-control" name="no_perkades" id="nomor_perkades" value="<?= $data->no_perkades ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="control-label">Tanggal peraturan kepala <?= ce($this->userData->jenis_desa) ?></label>
                                                                        <div class="input-group" style="width: 100%;">
                                                                            <input type="text" class="form-control tgl_perkades" id="datepicker-autoclose5" name="tgl_perkades" placeholder="mm/dd/yyyy" value="<?= tanggal_tampil($data->tgl_perkades) ?>" readonly>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="control-label">Tentang</label>
                                                                <input type="text" class="form-control" name="tentang" id="tentang" value="<?= $data->tentang ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="control-label">Uraian singkat</label>
                                                                <input type="text" class="form-control" name="uraian" id="uraian_singkat" value="<?= $data->uraian ?>" readonly>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="control-label">Nomor Dilaporkan</label>
                                                                        <input type="text" class="form-control" name="no_dilaporkan" id="nomor_dilaporkan" value="<?= $data->no_dilaporkan ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="control-label">Tanggal Dilaporkan</label>
                                                                        <div class="input-group" style="width: 100%;">
                                                                            <input type="text" class="form-control tgl_dilaporkan" id="datepicker-autoclose2" name="tgl_dilaporkan" placeholder="mm/dd/yyyy" value="<?= tanggal_tampil($data->tgl_dilaporkan) ?>" readonly>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="message-text" class="control-label">Keterangan</label>
                                                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3" readonly><?= $data->keterangan ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="control-label">Dokumen Lampiran</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text bg-info"><i class="fa fa-file-alt text-white"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?= $data->file_lampiran == NULL ? 'Tidak Ada File Lampiran' : $data->file_lampiran ?>" class="form-control file_lampiran" id="lampiran" name="file_lampiran" readonly>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <?php if ($data->file_lampiran == NULL) : ?>
                                                                <button type="button" class="btn btn-success download_file"><i class="fa fa-download"></i> Unduh Lampiran Dokumen</button>
                                                            <?php endif; ?>
                                                            <?php if ($data->file_lampiran != NULL) : ?>
                                                                <a target="_blank" href="<?= base_url(ASSET_DESA . $data->file_lampiran); ?>">
                                                                    <button type="button" class="btn btn-success ada_file"><i class="fa fa-download"></i> Unduh Lampiran Dokumen</button>
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END MODAL -->

                                            <!-- MODAL TAMBAH SURAT KELUAR -->
                                            <div class="modal fade modal_ubah" id="ubah_data<?= $data->id_sk_perkades; ?>" tabindex="-1" role="dialog" aria-labelledby="ubah_data">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Peraturan Kepala <?= ce($this->userData->jenis_desa) ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-edit" enctype='multipart/form-data'>
                                                                <input type="hidden" name="id_sk_perkades" value="<?= $data->id_sk_perkades; ?>">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="control-label">Nomor peraturan kepala <?= ce($this->userData->jenis_desa) ?></label>
                                                                            <input type="text" class="form-control" name="no_perkades" id="nomor_perkades" value="<?= $data->no_perkades ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="control-label">Tanggal peraturan kepala <?= ce($this->userData->jenis_desa) ?></label>
                                                                            <div class="input-group" style="width: 100%;">
                                                                                <input type="text" class="form-control tgl_perkades" id="datepicker-autoclose5" name="tgl_perkades" placeholder="mm/dd/yyyy" value="<?= tanggal_tampil($data->tgl_perkades) ?>" required>
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Tentang</label>
                                                                    <input type="text" class="form-control" name="tentang" id="tentang" value="<?= $data->tentang ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Uraian singkat</label>
                                                                    <input type="text" class="form-control" name="uraian" id="uraian_singkat" value="<?= $data->uraian ?>" required>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="control-label">Nomor Dilaporkan</label>
                                                                            <input type="text" class="form-control" name="no_dilaporkan" id="nomor_dilaporkan" value="<?= $data->no_dilaporkan ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="control-label">Tanggal Dilaporkan</label>
                                                                            <div class="input-group" style="width: 100%;">
                                                                                <input type="text" class="form-control tgl_dilaporkan" id="datepicker-autoclose2" name="tgl_dilaporkan" placeholder="mm/dd/yyyy" value="<?= tanggal_tampil($data->tgl_dilaporkan) ?>" required>
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Keterangan</label>
                                                                    <textarea class="form-control" name="keterangan" id="keterangan" rows="3" required><?= $data->keterangan ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Pilih Dokumen</label>
                                                                    <div class="input-group mb-3">
                                                                        <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="inputGroupFile<?= $data->id_sk_perkades; ?>" name="file_lampiran">
                                                                            <label class="custom-file-label" for="inputGroupFile<?= $data->id_sk_perkades; ?>">Pilih File Dokumen</label>
                                                                        </div>
                                                                    </div>
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

<script type="text/javascript" src="<?= asset('surat/js/custom.js'); ?>"></script>
<script>
    $("#btnCari").click(function() {
        window.location.replace("<?= base_url('dokumen/peraturan-kepala-desa/?tahun=') ?>" + $("#tahun").val());
    });
    let base_url = "<?= base_url('dokumen/downloadFile'); ?>";

    $(document).ready(function() {

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
                        url: "<?= base_url('dokumen/hapus_sk_perkades') ?>", // Isi dengan url/path file php yang dituju
                        data: {
                            "id_sk_perkades": id
                        }, // data yang akan dikirim ke file yang dituju
                        dataType: "json",

                        success: function(data) { // Ketika proses pengiriman berhasil
                            if (data.response_code == 200) {
                                Swal.fire(
                                    'Terhapus',
                                    data.response_message,
                                    'success'
                                ).then((result) => {
                                    window.location.href = "<?= base_url('dokumen/peraturan-kepala-desa') ?>";
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
                url: "<?= base_url('dokumen/ubah_sk_perkades') ?>",
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('.modal_ubah').modal("hide");
                        $('#edit-btn').html("Simpan");
                        $('#edit-btn').attr("disabled", false);
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            window.location.href = "<?= base_url('dokumen/peraturan-kepala-desa') ?>";
                        })

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
                url: "<?= base_url('dokumen/tambah_sk_perkades') ?>",
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('.myModal').modal('hide');
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("Tambah Data");
                        $('#tombol-tambah').attr("disabled", false);
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            window.location.href = "<?= base_url('dokumen/peraturan-kepala-desa') ?>";
                        })

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("Tambah Data");
                        $('#tombol-tambah').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("Tambah Data");
                    $('#tombol-tambah').attr("disabled", false);
                }
            });
        }));

    });
</script>