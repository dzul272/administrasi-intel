<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">D.IN.7 - Data Pelaksanaan Penyuluhan Hukum</h4>
                <!-- <h5>Data Hasil Pelaksanaan Kegiatan Penyuluhan</h5> -->
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left">
                            <form method="get">
                                <select class="select2 form-control custom-select" style="width: 150px;" name="tahun" id="tahun" required>
                                    <option value="">Pilih Tahun</option>
                                    <?php if ($listTahun) : ?>
                                        <?php foreach ($listTahun as $data) : ?>
                                            <option <?= $this->input->get('tahun') == $data["tahun"] ? "selected" : "" ?> value="<?= $data["tahun"] ?>"><?= $data["tahun"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>

                                <select class="select2 form-control custom-select" style="width: 150px;" name="triwulan" id="triwulan" required>
                                    <option value="">Pilih Triwulan</option>
                                    <option <?= $this->input->get('triwulan') == "1" ? "selected" : "" ?> value="1">Triwulan 1</option>
                                    <option <?= $this->input->get('triwulan') == "2" ? "selected" : "" ?> value="2">Triwulan 2</option>
                                    <option <?= $this->input->get('triwulan') == "3" ? "selected" : "" ?> value="3">Triwulan 3</option>
                                    <option <?= $this->input->get('triwulan') == "4" ? "selected" : "" ?> value="4">Triwulan 4</option>
                                    <option <?= $this->input->get('triwulan') == "semua" ? "selected" : "" ?> value="semua">Semua Triwulan</option>
                                </select>
                                <button type="submit" id="btnCari" type="button" class="btn waves-effect waves-light btn-info" style="width: 120px;"><i class="fa fa-search"></i> Cari</button>
                            </form>
                        </div>
                        <div class="float-right">
                            <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" id="tombol-tambah" style="width: 150px;" data-toggle="modal" data-target="#tambahData">+ Tambah Data</button>
                            <!-- <a target="_blank" href="<?= base_url('din7/penyuluhan-hukum/export') ?>" id="export" type="button" class="btn waves-effect waves-light btn-danger" style="width: 120px;">Export</a> -->
                            <button type="button" class="btn waves-effect waves-light btn-danger ultra-disabled" id="tombol-tambah" style="width: 150px;" data-toggle="modal" data-target="#exportData"># Export Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL TAMBAH DATA -->
        <div class="modal fade myModal" id="tambahData" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-white" id="exampleModalLabel1">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="form-insert" method="POST" action="<?= base_url("din7/addPenyuluhanHukum") ?>" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <label for="recipient-name" class="control-label text-info">Pelaksanaan Penyuluhan Hukum Secara Langsung</label>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Sasaran Peserta Penyuluhan Hukum <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="peserta" id="peserta" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Materi / Tema Kegiatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="materi_tema" id="materi_tema" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Jumlah Peserta (Orang) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="jml_peserta" id="jml_peserta" min="0" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Waktu Pelaksanaan Kegiatan <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="waktu" id="waktu" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kecamatan Kegiatan <span class="text-danger">*</span></label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="tempat_kec" id="tempat_kec" required>
                                            <option value="">Pilih Kecamatan</option>
                                            <?php if ($kecamatan) : ?>
                                                <?php foreach ($kecamatan as $kec) : ?>
                                                    <option value="<?= $kec["id_kec"] ?>"><?= $kec["nama"] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Desa / Kelurahan Kegiatan <span class="text-danger">*</span></label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="tempat_kel" id="tempat_kel" disabled required>
                                            <option value="">Pilih kecamatan terlebih dahulu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Detail Tempat Kegiatan</label>
                                <input type="text" class="form-control" name="tempat_detail" id="tempat_detail">
                            </div>
                            <label for="recipient-name" class="control-label text-info">Pelaksanaan Penyuluhan Hukum Secara Tidak Langsung</label>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Media Yang Digunakan</label>
                                <input type="text" class="form-control" name="media" id="media">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Materi</label>
                                        <input type="text" class="form-control" name="materi" id="materi">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Waktu Pelaksanaan Kegiatan</label>
                                        <input type="date" class="form-control" name="waktu_pelaksanaan" id="waktu_pelaksanaan">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Keterangan</span></label>
                                <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success ultra-disabled" id="add-btn">Simpan</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END MODAL -->

        <!-- MODAL UBAH-->
        <div class="modal fade myModal" id="modal_ubah" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-white" id="exampleModalLabel1">Edit Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="form-edit" method="POST" action="<?= base_url("din7/updatePenyuluhanHukum") ?>" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <label for="recipient-name" class="control-label text-info">Pelaksanaan Penyuluhan Hukum Secara Langsung</label>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Sasaran Peserta Penyuluhan Hukum <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="peserta" id="peserta_edit" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Materi / Tema Kegiatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="materi_tema" id="materi_tema_edit" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Jumlah Peserta (Orang) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="jml_peserta" id="jml_peserta_edit" min="0" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Waktu Pelaksanaan Kegiatan <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="waktu" id="waktu_edit" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Kecamatan Kegiatan <span class="text-danger">*</span></label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="tempat_kec" id="tempat_kec_edit" required>
                                            <option value="">Pilih Kecamatan</option>
                                            <?php if ($kecamatan) : ?>
                                                <?php foreach ($kecamatan as $kec) : ?>
                                                    <option value="<?= $kec["id_kec"] ?>"><?= $kec["nama"] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Desa / Kelurahan Kegiatan <span class="text-danger">*</span></label>
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="tempat_kel" id="tempat_kel_edit" disabled required>
                                            <option value="">Pilih kecamatan terlebih dahulu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Detail Tempat Kegiatan</label>
                                <input type="text" class="form-control" name="tempat_detail" id="tempat_detail_edit">
                            </div>
                            <label for="recipient-name" class="control-label text-info">Pelaksanaan Penyuluhan Hukum Secara Tidak Langsung</label>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Media Yang Digunakan</label>
                                <input type="text" class="form-control" name="media" id="media_edit">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Materi</label>
                                        <input type="text" class="form-control" name="materi" id="materi_edit">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Waktu Pelaksanaan Kegiatan</label>
                                        <input type="date" class="form-control" name="waktu_pelaksanaan" id="waktu_pelaksanaan_edit">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Keterangan</span></label>
                                <textarea class="form-control" name="keterangan" id="keterangan_edit"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_data" id="id_data">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success ultra-disabled" id="add-btn_edit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END MODAL -->

        <!-- MODAL EXPORT -->
        <div class="modal fade myModal" id="exportData" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title text-white" id="exampleModalLabel1">Export Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">                        
                        <div class="form-group">
                            <label for="recipient-name" class="control-label text-primary">Export Data Sederhana</label>
                            <form action="<?= base_url("din7/penyuluhan-hukum-export-sederhana") ?>" method="get" target="_blank">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="tahun" required>
                                            <option value="">Pilih Tahun</option>
                                            <?php if ($listTahun) : ?>
                                                <?php foreach ($listTahun as $data) : ?>
                                                    <option <?= $this->input->get('tahun') == $data["tahun"] ? "selected" : "" ?> value="<?= $data["tahun"] ?>"><?= $data["tahun"] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <button style="width: 100%;" type="submit" class="btn btn-danger ultra-disabled" id="add-btn_edit">Export</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label text-primary">Export Data Lengkap</label>
                            <form action="<?= base_url("din7/penyuluhan-hukum-export-lengkap") ?>" method="get" target="_blank">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="select2 form-control custom-select" style="width: 100%;" name="tahun" required>
                                            <option value="">Pilih Tahun</option>
                                            <?php if ($listTahun) : ?>
                                                <?php foreach ($listTahun as $data) : ?>
                                                    <option <?= $this->input->get('tahun') == $data["tahun"] ? "selected" : "" ?> value="<?= $data["tahun"] ?>"><?= $data["tahun"] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <button style="width: 100%;" type="submit" class="btn btn-danger ultra-disabled" id="add-btn_edit">Export</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->

        <!-- tabel -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_data" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>
                                        <th style="padding: 10px;" rowspan="2" class="align-middle text-center">No</th>
                                        <th style="padding: 10px; width: 80px" rowspan="2" class="align-middle text-center">Aksi</th>
                                        <!-- <th style="padding: 10px;" rowspan="2" class="align-middle text-center">Kejari</th> -->
                                        <th style="padding: 10px;" colspan="6" class="align-middle text-center">Pelaksanaan Penyuluhan Hukum Secara Langsung</th>
                                        <th style="padding: 10px;" colspan="4" class="align-middle text-center">Pelaksanaan Penyuluhan Hukum Secara Tidak Langsung</th>
                                    </tr>
                                    <tr>
                                        <th style="padding: 10px; width: 200px" class="align-middle text-center">Sasaran Peserta Penyuluhan Hukum</th>
                                        <th style="padding: 10px; width: 150px" class="align-middle text-center">Materi</th>
                                        <th style="padding: 10px; width: 80px" class="align-middle text-center">Jumlah Peserta</th>
                                        <th style="padding: 10px; width: 160px" class="align-middle text-center">Waktu Pelaksanaan kegiatan</th>
                                        <th style="padding: 10px; width: 250px" class="align-middle text-center">Tempat / Lokasi Kegiatan</th>
                                        <th style="padding: 10px; width: 75px" class="align-middle text-center">Ket</th>
                                        <th style="padding: 10px; width: 150px" class="align-middle text-center">Media Yang Digunakan</th>
                                        <th style="padding: 10px; width: 150px" class="align-middle text-center">Materi</th>
                                        <th style="padding: 10px; width: 160px" class="align-middle text-center">Waktu Pelaksanaan Kegiatan</th>
                                        <th style="padding: 10px; width: 150px" class="align-middle text-center">Ket</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#tempat_kec").change(function(e) {
            $("#tempat_kel").attr("disabled", true);
            $("#tempat_kel").empty();
            $("#tempat_kel").append("<option value=''>Loading...</option>");
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "<?= base_url("din7/getKelurahan/") ?>" + this.value,
                success: function(response) {
                    $("#tempat_kel").attr("disabled", false);
                    $("#tempat_kel").empty();
                    $("#tempat_kel").append("<option value=''>Pilih Desa / Kelurahan</option>");
                    var len = response.data.length;
                    for (var i = 0; i < len; i++) {
                        var id = response.data[i]['id_kel'];
                        var nama = response.data[i]['nama'];
                        console.log(nama);
                        $('#tempat_kel').append('<option value="' + id + '">' + nama + '</option>')
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        });

        $("#tempat_kec_edit").change(function(e) {
            $("#tempat_kel_edit").attr("disabled", true);
            $("#tempat_kel_edit").empty();
            $("#tempat_kel_edit").append("<option value=''>Loading...</option>");
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "<?= base_url("din7/getKelurahan/") ?>" + this.value,
                success: function(response) {
                    $("#tempat_kel_edit").attr("disabled", false);
                    $("#tempat_kel_edit").empty();
                    $("#tempat_kel_edit").append("<option value=''>Pilih Desa / Kelurahan</option>");
                    var len = response.data.length;
                    for (var i = 0; i < len; i++) {
                        var id = response.data[i]['id_kel'];
                        var nama = response.data[i]['nama'];
                        // console.log(nama);
                        $('#tempat_kel_edit').append('<option value="' + id + '">' + nama + '</option>')
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        });
    });

    var table_data = $('#table_data').DataTable({
        "ajax": {
            "url": "<?= base_url('din7/getDataPenyuluhanHukum/' . $this->input->get("tahun") . "/" . $this->input->get("triwulan")) ?>",
            "dataSrc": "data",
        },
        "order": [
            [0, "asc"]
        ],
        "scrollX": true,
        "columns": [{
                data: null,
                className: "text-center align-middle",
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: "id",
                className: "text-center align-top",
                render: function(data, type, row, meta) {
                    $data = '<button onclick="edit(' + data + ');" data-toggle="tooltip" data-placement="top" title="Edit Data" class="btn btn-sm btn-primary waves-effect waves-light edit_data" type="button"><i class="fas fa-edit"></i></button> ';
                    $data += '<button onclick="hapus(' + data + ');" data-toggle="tooltip" data-placement="top" title="Hapus Data" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button"><i class="fas fa-trash-alt"></i></button>';
                    return $data;
                }
            },
            {
                data: "peserta",
                className: "align-top",
            },
            {
                data: "materi_tema",
                className: "align-top",
            },
            {
                data: "jml_peserta",
                className: "align-top",
                render: function(data, type, row, meta) {
                    return data + " Orang";
                }
            },
            {
                data: "waktu_indo",
            },
            {
                data: "tempat_detail",
                className: "align-top",
                render: function(data, type, row, meta) {
                    return row.tempat_detail + ",  " + row.kelurahan.nama + ", Kec. " + row.kecamatan.nama
                }
            },
            {
                data: "triwulan",
                className: "align-top",
                render: function(data, type, row, meta) {
                    return "Triwulan " + data;
                }
            },
            {
                data: "media",
                className: "align-top",
            },
            {
                data: "materi",
                className: "align-top",
            },
            {
                data: "waktu_pelaksanaan_indo",
                className: "align-top",
            },
            {
                data: "keterangan",
                className: "align-top",
            },
        ]
    });

    //TODO : FORM INSERT
    $("#form-insert").on('submit', (function(event) {
        event.preventDefault();
        $('#add-btn').html("Sedang Menyimpan...");
        $('#add-btn').attr("disabled", true);
        $('#tombol-tambah').attr("disabled", true);

        $.ajax({
            url: "<?= base_url('din7/addPenyuluhanHukum') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function(e) { // Ketika proses pengiriman berhasil                
                if (e.response_code == 200) {
                    table_data.ajax.reload(null, true);
                    $('.myModal').modal('hide');
                    $("#form-insert")[0].reset();
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        // $('#table_body').empty();
                        // $('#table_body').html(e.output);
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah Data");
                        $('#tombol-tambah').attr("disabled", false);
                    })

                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("+ Tambah Data");
                    $('#tombol-tambah').attr("disabled", false);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                Swal.fire("Oops", xhr.responseText, "error");
                $('#add-btn').html("Simpan");
                $('#add-btn').attr("disabled", false);
                $('#tombol-tambah').html("+ Tambah Data");
                $('#tombol-tambah').attr("disabled", false);
            }
        });
    }));

    //TODO : FORM EDIT
    $("#form-edit").on('submit', (function(event) {
        event.preventDefault();
        $('#add-btn_edit').html("Sedang Menyimpan...");
        $('#add-btn_edit').attr("disabled", true);
        $('#tombol-tambah').attr("disabled", true);

        $.ajax({
            url: "<?= base_url('din7/updatePenyuluhanHukum') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function(e) { // Ketika proses pengiriman berhasil                
                if (e.response_code == 200) {
                    table_data.ajax.reload(null, true);
                    $('.myModal').modal('hide');
                    $("#form-edit")[0].reset();
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        // $('#table_body').empty();
                        // $('#table_body').html(e.output);
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah Data");
                        $('#tombol-tambah').attr("disabled", false);
                    })

                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("+ Tambah Data");
                    $('#tombol-tambah').attr("disabled", false);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                Swal.fire("Oops", xhr.responseText, "error");
                $('#add-btn').html("Simpan");
                $('#add-btn').attr("disabled", false);
                $('#tombol-tambah').html("+ Tambah Data");
                $('#tombol-tambah').attr("disabled", false);
            }
        });
    }));

    function edit(id) {
        Swal.fire({
            title: 'Mohon Tunggu Beberapa Saat',
            text: 'Sedang Mengambil data...',
            onBeforeOpen: () => {
                Swal.showLoading();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('din7/getDataPenyuluhanHukum/') ?>',
                    dataType: "json",
                    data: {
                        "id": id
                    },
                    success: function(e) {
                        console.log(JSON.stringify(e));

                        $('#peserta_edit').val(e.data[0].peserta);
                        $('#materi_tema_edit').val(e.data[0].materi_tema);
                        $('#jml_peserta_edit').val(e.data[0].jml_peserta);
                        $('#waktu_edit').val(e.data[0].waktu);
                        $('#waktu_edit').val(e.data[0].waktu);

                        $('#tempat_kec_edit').val(e.data[0].tempat_kec);
                        $('#tempat_kec_edit').trigger('change');

                        $('#tempat_detail_edit').val(e.data[0].tempat_detail);
                        $('#media_edit').val(e.data[0].media);
                        $('#materi_edit').val(e.data[0].materi);
                        $('#waktu_pelaksanaan_edit').val(e.data[0].waktu_pelaksanaan);
                        $('#keterangan_edit').val(e.data[0].keterangan);

                        $('#id_data').val(e.data[0].id);

                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "<?= base_url("din7/getKelurahan/") ?>" + e.data[0].tempat_kec,
                            success: function(response) {
                                Swal.close();
                                $('#modal_ubah').modal('show');
                                $("#tempat_kel_edit").attr("disabled", false);
                                $("#tempat_kel_edit").empty();
                                $("#tempat_kel_edit").append("<option value=''>Pilih Desa / Kelurahan</option>");
                                var len = response.data.length;
                                for (var i = 0; i < len; i++) {
                                    var id = response.data[i]['id_kel'];
                                    var nama = response.data[i]['nama'];
                                    console.log(nama);
                                    $('#tempat_kel_edit').append('<option value="' + id + '">' + nama + '</option>')
                                }
                                $('#tempat_kel_edit').val(e.data[0].tempat_kel);
                                $('#tempat_kel_edit').trigger('change');
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                Swal.close();
                                alert(xhr.responseText);
                            }
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                        Swal.close();
                        Swal.fire("Oops", xhr.responseText, "error");
                    }
                });
            }
        });
    }

    function hapus(id) {
        swal.fire({
            title: 'Hapus Data ?',
            text: "Data akan terhapus secara permanent",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {

                Swal.fire({
                    title: 'Mohon Tunggu Beberapa Saat',
                    text: 'Proses Menghapus data...',
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url('din7/deletePenyuluhanHukum') ?>",
                            data: {
                                "id_data": id
                            },
                            dataType: "json",
                            success: function(data) {
                                Swal.close();
                                if (data.response_code == 200) {
                                    table_data.ajax.reload(null, true);
                                    Swal.fire(
                                        'Terhapus',
                                        data.response_message,
                                        'success'
                                    );
                                } else {
                                    Swal.close();
                                    Swal.fire("Oops aw", data.response_message, "error");
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                Swal.fire("Oops", xhr.responseText, "error");
                            }
                        });
                    }
                });
            }
        });
    }
</script>