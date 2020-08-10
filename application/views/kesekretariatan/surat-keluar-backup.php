<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Daftar Surat Keluar</h4>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <select class="select2 form-control custom-select" style="width: 250px;" name="id_tipesurat" id="pilih_tipesurat">
                            <option value="">Pilih Tipe Surat</option>
                            <option <?= $this->input->get('id_tipesurat') == "semua" ? "selected" : "" ?> value="semua">Semua</option>
                            <?php foreach ($tipesurat as $tipe) : ?>
                                <option <?= $this->input->get('id_tipesurat') == $tipe->id_tipesurat ? "selected" : "" ?> value="<?= $tipe->id_tipesurat ?>"><?= $tipe->nama_tipesurat ?></option>
                            <?php endforeach ?>
                        </select>
                        <select class="select2 form-control custom-select" style="width: 150px;" name="bulan" id="bulan">
                            <option value="">Pilih Bulan</option>
                            <option <?= $this->input->get('bulan') == "semua" ? "selected" : "" ?> value="semua">Semua</option>
                            <?php foreach (bulan_array() as $bln) : ?>
                                <option <?= $this->input->get('bulan') == $bln["urut"] ? "selected" : "" ?> value="<?= $bln["urut"] ?>"><?= $bln["nama_panjang"] ?></option>
                            <?php endforeach ?>
                        </select>
                        <select class="select2 form-control custom-select" style="width: 150px;" name="tahun" id="tahun">
                            <option value="">Pilih Tahun</option>
                            <option <?= $this->input->get('tahun') == "semua" ? "selected" : "" ?> value="semua">Semua</option>
                            <?php foreach ($dataTahun as $data) : ?>
                                <option <?= $this->input->get('tahun') == $data->tahun ? "selected" : "" ?> value="<?= $data->tahun ?>"><?= $data->tahun ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" id="btnCari" class="btn waves-effect waves-light btn-info" style="width: 120px;"><i class="fa fa-search"></i> Cari</button>

                        <div class="float-right">
                            <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" style="width: 120px;" data-toggle="modal" data-target="#tambahSuratKeluar" id="tombol-tambah">Tambah</button>
                            <a href="<?= $linkExport ?>" type="button" class="btn waves-effect waves-light btn-danger" style="width: 120px;">Export</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade myModal" id="tambahSuratKeluar" tabindex="-1" role="dialog" aria-labelledby="tambahSuratKeluar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Surat Keluar</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-insert">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Tipe Surat</label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="id_tipesurat" id="id_tipesurat" required>
                                    <option value="">Pilih Tipe Surat</option>
                                    <?php foreach ($tipesurat as $tipe) : ?>
                                        <option value="<?= $tipe->id_tipesurat ?>"><?= $tipe->nama_tipesurat ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Tanggal Surat</label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" class="form-control tanggal_surat" id="datepicker-autoclose" name="tanggal_surat" placeholder="mm/dd/yyyy" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Nomor Surat</label>
                                <!-- <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Nomor Surat" required> -->
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><b id="tampil_kodesurat">-</b></span>
                                    </div>
                                    <input value="" type="number" min="1" class="form-control" name="nomor_surat" id="nomor_surat" required>
                                    <div class="input-group-append" style="background-color: blue;">
                                        <span class="input-group-text"><b id="tampil_nomorsurat"> - </b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">NIK Peminta</label>
                                <input type="text" class="form-control" name="nikpeminta_surat" id="nikpeminta_surat" onkeyup="validate()" placeholder="NIK Peminta Surat (Panjang 16 Karakter)" maxlength="16" minlength="16" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Nama Peminta</label>
                                <input type="text" class="form-control" name="namapeminta_surat" id="namapeminta_surat" placeholder="Nama Peminta Surat" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Perihal</label>
                                <textarea class="form-control" id="perihal_surat" name="perihal_surat" rows="3" required placeholder="Perihal Surat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Pilih Pamong</label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="id_pamong" id="id_pamong" required>
                                    <option value="">Pilih Salah Satu</option>
                                    <?php foreach ($pamong as $ttd) : ?>
                                        <option value="<?= $ttd->id_pamong ?>"><?= $ttd->nama_pamong ?> (<?= $ttd->nama_jabatan ?>)</option>
                                    <?php endforeach ?>
                                </select>
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
                                        <th style="width: 4%; padding: 10px;">No</th>
                                        <th style="width: 28%; padding: 10px;">Nomor Surat</th>
                                        <th style="width: 40%; padding: 10px;">Perihal</th>
                                        <th style="width: 15%; padding: 10px;">Tanggal Surat</th>
                                        <th style="width: 13%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-surat-keluar">
                                    <?php
                                    $no = 1;
                                    foreach ($surat_keluar as $data) : ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->kode_tipesurat . ' / ' . $data->nomor_surat . ' / ' . $data->nama_desa . ' / ' . bulantahun_surat(tanggal_tampil($data->tanggal_surat)) ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->perihal_surat ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->tanggal_surat ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button title="Lihat Detail" class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="<?= $data->id_surat ?>">
                                                    <span class="btn-label"><i class="fa fa-file-alt"></i></span>
                                                </button>
                                                <button title="Ubah Data" class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="<?= $data->id_surat ?>">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                </button>
                                                <button title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="<?= $data->id_surat ?>">
                                                    <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
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

<!-- MODAL TAMBAH SURAT KELUAR -->
<div class="modal fade myModal" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="ubah_surat">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Surat Keluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-edit">
                    <input type="hidden" name="id_surat" id="id_surat_tampil">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Tipe Surat</label>
                        <select class="select2 form-control custom-select" style="width: 100%;" name="id_tipesurat" id="id_tipesurat_tampil" required>
                            <option value="">Pilih Tipe Surat</option>
                        </select>
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
                        <label for="message-text" class="control-label">Nomor Surat</label>
                        <!-- <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Nomor Surat" required> -->
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b id="tampil_kodesurat2">-</b></span>
                            </div>
                            <input value="" type="number" min="1" class="form-control" name="nomor_surat" id="nomor_surat_tampil" required>
                            <div class="input-group-append" style="background-color: blue;">
                                <span class="input-group-text"><b id="tampil_nomorsurat2"> - </b></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">NIK Peminta</label>
                        <input type="text" class="form-control" name="nikpeminta_surat" id="nikpeminta_surat_tampil" onkeyup="validate()" placeholder="NIK Peminta Surat (Panjang 16 Karakter)" maxlength="16" minlength="16" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nama Peminta</label>
                        <input type="text" class="form-control" name="namapeminta_surat" id="namapeminta_surat_tampil" placeholder="Nama Peminta Surat" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Perihal</label>
                        <textarea class="form-control" id="perihal_surat_tampil" name="perihal_surat" rows="3" placeholder="Perihal Surat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Pilih Pamong</label>
                        <select class="select2 form-control custom-select" style="width: 100%;" name="id_pamong" id="id_pamong_tampil" required>
                            <option value="">Pilih Salah Satu</option>
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
<!-- MODAL TAMBAH SURAT KELUAR -->
<div class="modal fade" id="modal_lihat" tabindex="-1" role="dialog" aria-labelledby="lihat_data">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="exampleModalLabel1">Lihat Detail Surat Keluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Tipe Surat</label>
                    <select class="select2 form-control custom-select" style="width: 100%;" name="id_tipesurat" id="id_tipesurat_tampil2" disabled>
                        <option value="">Pilih Tipe Surat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Tanggal Surat</label>
                    <div class="input-group" style="width: 100%;">
                        <input type="text" class="form-control tanggal_surat_tampil2" id="datepicker-autoclose" name="tanggal_surat" placeholder="mm/dd/yyyy" disabled>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Nomor Surat</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><b id="tampil_kodesurat22">-</b></span>
                        </div>
                        <input value="" type="number" min="1" class="form-control" name="nomor_surat" id="nomor_surat_tampil2" disabled>
                        <div class="input-group-append" style="background-color: blue;">
                            <span class="input-group-text"><b id="tampil_nomorsurat22"> - </b></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">NIK Peminta</label>
                    <input type="text" class="form-control" name="nikpeminta_surat" id="nikpeminta_surat_tampil2" onkeyup="validate()" placeholder="NIK Peminta Surat (Panjang 16 Karakter)" maxlength="16" minlength="16" disabled>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Nama Peminta</label>
                    <input type="text" class="form-control" name="namapeminta_surat" id="namapeminta_surat_tampil2" placeholder="Nama Peminta Surat" disabled>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Perihal</label>
                    <textarea class="form-control" id="perihal_surat_tampil2" name="perihal_surat" rows="3" placeholder="Perihal Surat" disabled></textarea>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Pamong</label>
                    <select class="select2 form-control custom-select" style="width: 100%;" name="id_pamong" id="id_pamong_tampil2" disabled>
                        <option value="">Pilih Salah Satu</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<script>
    function validate() {
        var nik = document.getElementById('nikpeminta_surat');
        nik.value = nik.value.replace(/[^0-9]/, '');
        var nik2 = document.getElementById('nikpeminta_surat_tampil');
        nik2.value = nik2.value.replace(/[^0-9]/, '');
    };
</script>

<script>
    $("#btnCari").click(function() {
        window.location.replace("<?= base_url('kesekretariatan/surat_keluar/?id_tipesurat=') ?>" + $("#pilih_tipesurat").val() + '&bulan=' + $("#bulan").val() + '&tahun=' + $("#tahun").val());
    });

    $(document).ready(function() {

        $("#id_tipesurat").change(function() {
            let id_tipesurat = $(this).val();
            // alert(id_tipesurat);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('kesekretariatan/getkode_surat') ?>',
                dataType: "json",
                data: {
                    "id_tipesurat": id_tipesurat
                },
                success: function(data) {
                    // alert(data);
                    $('#tampil_kodesurat').html(data.kode_tipesurat);
                }
            });
        });

        $(".tanggal_surat").change(function() {
            let tanggal_surat = $(this).val();
            // alert(tanggal_surat);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('kesekretariatan/getbulantahun_surat') ?>',
                dataType: "json",
                data: {
                    "tanggal_surat": tanggal_surat
                },
                success: function(data) {
                    $('#tampil_nomorsurat').html(data.output);
                }
            });
        });

        $("#id_tipesurat_tampil").change(function() {
            let id_tipesurat = $(this).val();
            // alert(id_tipesurat);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('kesekretariatan/getkode_surat') ?>',
                dataType: "json",
                data: {
                    "id_tipesurat": id_tipesurat
                },
                success: function(data) {
                    $('#tampil_kodesurat2').html(data.kode_tipesurat);
                }
            });
        });

        $(".tanggal_surat_tampil").change(function() {
            let tanggal_surat = $(this).val();
            // alert(tanggal_surat);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('kesekretariatan/getbulantahun_surat') ?>',
                dataType: "json",
                data: {
                    "tanggal_surat": tanggal_surat
                },
                success: function(data) {
                    $('#tampil_nomorsurat2').html(data.output);
                }
            });
        });

        $(document).on('click', '.edit_data', function(e) {
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url('kesekretariatan/getdata_suratkeluar') ?>',
                dataType: "json",
                data: {
                    "id_surat": id
                },
                success: function(data) {
                    // alert(data);
                    $('#modal_ubah').modal('show');
                    $('#id_surat_tampil').val(data.id_surat);
                    $('#id_tipesurat_tampil').html(data.id_tipesurat);
                    $('.tanggal_surat_tampil').val(data.tanggal_surat);
                    $('#nomor_surat_tampil').val(data.nomor_surat);
                    $('#tampil_kodesurat2').html(data.kode_tipesurat);
                    $('#tampil_nomorsurat2').html(data.output_nomorsurat);
                    $('#nikpeminta_surat_tampil').val(data.nikpeminta_surat);
                    $('#namapeminta_surat_tampil').val(data.namapeminta_surat);
                    $('#perihal_surat_tampil').val(data.perihal_surat);
                    $('#id_pamong_tampil').html(data.pamong);
                }
            });
        });

        $(document).on('click', '.lihat_data', function(e) {
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url('kesekretariatan/getdata_suratkeluar') ?>',
                dataType: "json",
                data: {
                    "id_surat": id
                },
                success: function(data) {
                    // alert(data);
                    $('#modal_lihat').modal('show');
                    $('#id_surat_tampil2').val(data.id_surat);
                    $('#id_tipesurat_tampil2').html(data.id_tipesurat);
                    $('.tanggal_surat_tampil2').val(data.tanggal_surat);
                    $('#nomor_surat_tampil2').val(data.nomor_surat);
                    $('#tampil_kodesurat22').html(data.kode_tipesurat);
                    $('#tampil_nomorsurat22').html(data.output_nomorsurat);
                    $('#nikpeminta_surat_tampil2').val(data.nikpeminta_surat);
                    $('#namapeminta_surat_tampil2').val(data.namapeminta_surat);
                    $('#perihal_surat_tampil2').val(data.perihal_surat);
                    $('#id_pamong_tampil2').html(data.pamong);
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
                        url: "<?= base_url('kesekretariatan/hapus_surat_keluar') ?>", // Isi dengan url/path file php yang dituju
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
                                    $('#tabel-surat-keluar').empty();
                                    $('#tabel-surat-keluar').html(data.output);
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
                url: "<?= base_url('kesekretariatan/ubah_surat_keluar') ?>",
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
                            $('#tabel-surat-keluar').empty();
                            $('#tabel-surat-keluar').html(e.output);
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
                url: "<?= base_url('kesekretariatan/tambah_surat_keluar') ?>",
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
                            $('#tabel-surat-keluar').empty();
                            $('#tabel-surat-keluar').html(e.output);
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