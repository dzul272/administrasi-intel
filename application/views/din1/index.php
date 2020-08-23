<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Data Peta</h4>
                <h5>Ideologi, Politik, Pertahanan dan Keamanan/Sosial Budaya dan Kemasyarakatan/ Ekonomi dan Keuangan/Pengamanan pembangunan Strategis/Teknologi Informasi dan Produksi Intelijen</h5>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="" method="get">
                        <div class="card-body">
                            <select class="select2 form-control custom-select" style="width: 150px;" name="bulan" id="bulan">
                                <option value="">Pilih Bulan</option>
                                <?php foreach (bulan_array() as $data) : ?>
                                    <option <?= $this->input->get('bulan') == $data["urut"] ? "selected" : "" ?> value="<?= $data["urut"] ?>"><?= $data["nama_panjang"]  ?></option>
                                <?php endforeach; ?>
                            </select>
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
                                <a target="_blank" href="<?= base_url('din1/export/?bulan=' . $this->input->get("bulan") . "&tahun=" . $this->input->get("tahun")) ?>" id="export" type="button" class="btn waves-effect waves-light btn-danger" style="width: 120px;">Export</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL TAMBAH DATA -->
        <div class="modal fade myModal" id="tambahData" role="dialog" aria-labelledby="tambahPerdes">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-white" id="exampleModalLabel1">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="POST" action="<?= base_url('din1/prosesTambahData') ?>" id="form-insert" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="box-foto-pamong">
                                    <div class="bg-foto-profil-pamong">
                                        <div id="imgPreview" class="foto-profil-pamong" style="background-image: url('<?= asset("kejari/img/add.png") ?>')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Pilih Sektor <span class="text-danger">*</span></label>
                                <select required class="select2 form-control custom-select" style="width: 100%;" name="din_id" id="din_id">
                                    <option value="">Pilih Sektor</option>
                                    <?php if ($listDin) : ?>
                                        <?php foreach ($listDin as $data) : ?>
                                            <option simbol="<?= $data["simbol"] ?>" value="<?= $data["id"] ?>"><?= $data["sektor"] . " - D.IN." . $data["jenis_din"]  ?></option>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">SIABIDIBAM / 5W + 1H <span class="text-danger">*</span></label>
                                <textarea required class="form-control" name="siabidibam" id="siabidibam"></textarea>
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

        <!-- MODAL UBAH DATA -->
        <div class="modal fade myModal" id="modal_ubah" role="dialog" aria-labelledby="modal_ubah">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="POST" id="form-edit" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="box-foto-pamong">
                                    <div class="bg-foto-profil-pamong">
                                        <div id="imgPreview_edit" class="foto-profil-pamong" style="background-image: url('<?= asset("kejari/img/add.png") ?>')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Pilih Sektor <span class="text-danger">*</span></label>
                                <select required class="select2 form-control custom-select" style="width: 100%;" name="din_id" id="din_id_edit">
                                    <option value="">Pilih Sektor</option>
                                    <?php if ($listDin) : ?>
                                        <?php foreach ($listDin as $data) : ?>
                                            <option simbol="<?= $data["simbol"] ?>" value="<?= $data["id"] ?>"><?= $data["sektor"] . " - D.IN." . $data["jenis_din"]  ?></option>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">SIABIDIBAM / 5W + 1H <span class="text-danger">*</span></label>
                                <textarea required class="form-control" name="siabidibam" id="siabidibam_edit"></textarea>
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

        <!-- tabel surat keluar -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_data" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;" class="align-middle text-center">No</th>
                                        <th style="width: 15%; padding: 10px;" class="align-middle text-center">Simbol Sektor</th>
                                        <th style="width: 45%; padding: 10px;" class="align-middle text-center">SIABIDIBAM/ 5W + 1H</th>
                                        <th style="width: 20%; padding: 10px;" class="align-middle text-center">Keterangan</th>
                                        <th style="width: 15%; padding: 10px;" class="align-middle text-center">Aksi</th>
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
        $("#din_id").change(function(e) {
            var element = $(this).find('option:selected');
            var simbol = element.attr("simbol");
            $('#imgPreview').css('background-image', 'url(' + simbol + ')');
        });

        $("#din_id_edit").change(function(e) {
            var element = $(this).find('option:selected');
            var simbol = element.attr("simbol");
            $('#imgPreview_edit').css('background-image', 'url(' + simbol + ')');
        });

        //TODO : FORM INSERT
        $("#form-insert").on('submit', (function(event) {
            event.preventDefault();
            $('#add-btn').html("Sedang Menyimpan...");
            $('#add-btn').attr("disabled", true);
            $('#tombol-tambah').attr("disabled", true);

            $.ajax({
                url: "<?= base_url('din1/prosesTambahData') ?>",
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
                        $('#img_view2').css('background-image', 'url(<?= asset('kejari/img/add.png') ?>)');
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
                url: "<?= base_url('din1/prosesUpdateData') ?>",
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
                        $('#img_view2').css('background-image', 'url(<?= asset('kejari/img/add.png') ?>)');
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
    });

    var table_data = $('#table_data').DataTable({
        "ajax": {
            "url": "<?= base_url('din1/getData/' . $this->input->get("tahun") . "/" . $this->input->get("bulan")) ?>",
            "dataSrc": "data",
        },
        "order": [
            [0, "desc"]
        ],
        "columns": [{
            data: "no_urut",
            className: "text-center align-middle",
        }, {
            data: "din2s6.simbol",
            className: "text-center align-middle",
            render: function(data, type, row, meta) {
                $data = '<a class="btn default btn-outline image-popup-vertical-fit el-link" href="' + data + '">';
                $data += '<img src="' + data + '" alt="user" height="60"/>'
                $data += '</a>';
                return $data;
            }
        }, {
            data: "siabidibam",
            className: "align-top",
        }, {
            data: "keterangan",
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

    function edit(id) {
        Swal.fire({
            title: 'Mohon Tunggu Beberapa Saat',
            text: 'Sedang Mengambil data...',
            onBeforeOpen: () => {
                Swal.showLoading();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('din1/getDataById/') ?>',
                    dataType: "json",
                    data: {
                        "id": id
                    },
                    success: function(e) {
                        Swal.close();
                        $('#modal_ubah').modal('show');
                        $('#imgPreview_edit').css('background-image', 'url(' + e.data[0].din2s6.simbol + ')');
                        $('#siabidibam_edit').val(e.data[0].siabidibam);
                        $('#keterangan_edit').val(e.data[0].keterangan);
                        $('#din_id_edit').val(e.data[0].din2s6.id);
                        $('#din_id_edit').trigger('change');
                        $('#id_data').val(e.data[0].id);
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
                            url: "<?= base_url('din1/prosesHapusData') ?>",
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