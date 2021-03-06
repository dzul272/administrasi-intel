<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Data Foto Dokumentasi Jaksa Masuk Sekolah</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="" method="get">
                        <div class="card-body">
                            <select class="select2 form-control custom-select" style="width: 150px;" name="tahun" id="tahun">
                                <option value="">Pilih Tahun</option>
                                <?php if ($listTahun) : ?>
                                    <?php foreach ($listTahun as $data) : ?>
                                        <option <?= $this->input->get('tahun') == $data["tahun"] ? "selected" : "" ?> value="<?= $data["tahun"] ?>"><?= $data["tahun"] ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                            <button type="submit" id="btnCari" type="button" class="btn waves-effect waves-light btn-info" style="width: 120px;"><i class="fa fa-search"></i> Cari</button>

                            <div class="float-right">
                                <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" id="tombol-tambah" style="width: 150px;" data-toggle="modal" data-target="#tambahData">+ Tambah Data</button>
                                <?php
                                $thn = $this->input->get("tahun") == "" ? "semua" : $this->input->get("tahun");
                                ?>
                                <a target="_blank" href="<?= base_url('din8/jaksa-masuk-sekolah-export/?tahun=' . $this->input->get("tahun")) ?>" id="export" type="button" class="btn waves-effect waves-light btn-danger" style="width: 120px;">Export</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL TAMBAH DATA -->
        <div class="modal fade myModal" id="tambahData" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-white" id="exampleModalLabel1">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="form-insert" method="POST" action="<?= base_url("din8/addJaksaMasukSekolah") ?>" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kegiatan Jaksa Masuk Sekolah <span class="text-danger">*</span></label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="din7_id" id="din7_id" required>
                                    <option value="">Pilih Kegiatan</option>
                                    <?php if ($din7) : ?>
                                        <?php foreach ($din7 as $d7) : ?>
                                            <option value="<?= $d7->id ?>"><?= $d7->materi_tema . " (Triwulan " . $d7->triwulan . ")" ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Foto / Video Kegiatan <span class="text-danger">*</span></label>
                                <input accept="video/mp4,video/x-m4v,video/*,image/*" type="file" class="form-control-file" name="foto_video" id="foto_video" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Jenis File <span class="text-danger">*</span></label>
                                <div class="row">
                                    <fieldset class="radio col-md-2">
                                        <label>
                                            <input type="radio" name="jenis_file" value="1" checked> Foto
                                        </label>
                                    </fieldset>
                                    <fieldset class="radio col-md-2">
                                        <label>
                                            <input type="radio" name="jenis_file" value="2"> Video
                                        </label>
                                    </fieldset>
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

        <!-- MODAL EDIT DATA -->
        <div class="modal fade myModal" id="modal_ubah" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="form-edit" method="POST" action="<?= base_url("din8/updateJaksaMasukSekolah") ?>" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kegiatan Jaksa Masuk Sekolah <span class="text-danger">*</span></label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="din7_id" id="din7_id_edit" required>
                                    <option value="">Pilih Kegiatan</option>
                                    <?php if ($din7) : ?>
                                        <?php foreach ($din7 as $d7) : ?>
                                            <option value="<?= $d7->id ?>"><?= $d7->materi_tema . " (Triwulan " . $d7->triwulan . ")" ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Foto / Video Kegiatan <span class="text-danger">*</span></label>
                                <input accept="video/mp4,video/x-m4v,video/*,image/*" type="file" class="form-control-file" name="foto_video" id="foto_video_edit">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Jenis File <span class="text-danger">*</span></label>
                                <div class="row">
                                    <fieldset class="radio col-md-2">
                                        <label>
                                            <input type="radio" name="jenis_file" id="radio_foto_edit" value="1" checked> Foto
                                        </label>
                                    </fieldset>
                                    <fieldset class="radio col-md-2">
                                        <label>
                                            <input type="radio" name="jenis_file" id="radio_video_edit" value="2"> Video
                                        </label>
                                    </fieldset>
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

        <!-- tabel -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_data" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 30px; padding: 10px;" class="align-middle text-center">No</th>
                                        <th style="width: 200px; padding: 10px;" class="align-middle text-center">Kegiatan</th>
                                        <th style="width: 200px; padding: 10px;" class="align-middle text-center">Foto / Video</th>
                                        <th style="width: 200px; padding: 10px;" class="align-middle text-center">Keterangan</th>
                                        <th style="width: 80px; padding: 10px;" class="align-middle text-center">Triwulan</th>
                                        <th style="width: 180px; padding: 10px;" class="align-middle text-center">Waktu Input</th>
                                        <th style="width: 150px; padding: 10px;" class="align-middle text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-6">
                <div class="card">
                    <div>
                        <canvas id="bar-chart" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div> -->


    </div>
</div>

<script>
    $(document).ready(function() {

    });

    var table_data = $('#table_data').DataTable({
        "ajax": {
            "url": "<?= base_url('din8/getDataJaksaMasukSekolah/' . $this->input->get("tahun")) ?>",
            "dataSrc": "data",
        },
        "order": [
            [0, "asc"]
        ],
        "columns": [{
            data: null,
            className: "text-center align-middle",
            render: function(data, type, row, meta) {
                return meta.row + 1;
            }
        }, {
            data: "din7.materi_tema",
            className: "align-top",
        }, {
            data: "nama_file",
            className: "align-top",
            render: function(data, type, row, meta) {
                return "<a target='_blank' href='<?= asset("kejari/upload/din8/") ?>" + row.foto_video + "'>" + data + "</a>"
            }
        }, {
            data: "keterangan",
            className: "align-top",
        }, {
            data: "din7.triwulan",
            className: "align-top",
            render: function(data, type, row, meta) {
                return "Triwulan " + data;
            }
        }, {
            data: "created_at",
            className: "align-top",
        }, {
            data: "id",
            className: "text-center align-top",
            render: function(data, type, row, meta) {
                $data = '<button onclick="edit(' + data + ');" class="btn btn-sm btn-primary waves-effect waves-light edit_data" type="button" data-id="1">Ubah</button> ';
                $data += '<button onclick="hapus(' + data + ');" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="1">Hapus</button>';
                return $data;
            }
        }]
    });

    //TODO : FORM INSERT
    $("#form-insert").on('submit', (function(event) {
        event.preventDefault();
        $('#add-btn').html("Sedang Menyimpan...");
        $('#add-btn').attr("disabled", true);
        $('#tombol-tambah').attr("disabled", true);

        $.ajax({
            url: "<?= base_url('din8/addJaksaMasukSekolah') ?>",
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
            url: "<?= base_url('din8/updateJaksaMasukSekolah') ?>",
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
                        $('#add-btn_edit').html("Simpan");
                        $('#add-btn_edit').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah Data");
                        $('#tombol-tambah').attr("disabled", false);
                    })

                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $('#add-btn_edit').html("Simpan");
                    $('#add-btn_edit').attr("disabled", false);
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
                    url: '<?= base_url('din8/getDataJaksaMasukSekolah/') ?>',
                    dataType: "json",
                    data: {
                        "id": id
                    },
                    success: function(e) {
                        console.log(JSON.stringify(e));
                        console.log(e.data[0].jenis_file);

                        $('#din7_id_edit').val(e.data[0].din7_id);
                        $('#din7_id_edit').trigger('change');

                        if (e.data[0].jenis_file == 1) {
                            $("#radio_foto_edit").prop("checked", true);
                            $("#radio_video_edit").prop("checked", false);
                        } else {
                            $("#radio_foto_edit").prop("checked", false);
                            $("#radio_video_edit").prop("checked", true);
                        }

                        $('#keterangan_edit').val(e.data[0].keterangan);
                        $('#id_data').val(e.data[0].id);

                        Swal.close();
                        $('#modal_ubah').modal('show');
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
                            url: "<?= base_url('din8/deleteJaksaMasukSekolah') ?>",
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

<!-- <script>
    $(function() {
        "use strict";
        // Bar chart
        new Chart(document.getElementById("bar-chart"), {
            type: "bar",
            data: {
                labels: ["Target", "Penerangan Hukum"],
                datasets: [{
                    label: "Population (millions)",
                    minBarLength : 5,
                    backgroundColor: [
                        "#03a9f4",
                        "#e40503",
                        "#e40503",
                    ],
                    data: [10.3, 6],
                }, ],
            },
            options: {
                legend: {
                    display: false
                },
                // title: {
                //     display: true,
                //     fontColor: "#b2b9bf",
                //     text: "Predicted world population (millions) in 2050",
                // },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "#b2b9bf",
                            fontSize: 12,
                            max : 20,
                            min : 0
                        },
                    }, ],
                    xAxes: [{
                        ticks: {
                            fontColor: "#b2b9bf",
                            fontSize: 12,
                        },
                    }, ],
                },
            },
        });
    });
</script> -->