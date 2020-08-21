<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">D.IN.<?= $jenis_din ?> - Simbol Sektor</h4>
                <h5><?= $keterangan_din ?></h5>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" id="tombol-tambah" style="width: 150px;" data-toggle="modal" data-target="#tambahData">+ Tambah Data</button>
                            <a target="_blank" href="<?= base_url($nama_din . '/export') ?>" id="export" type="button" class="btn waves-effect waves-light btn-danger" style="width: 120px;">Export</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL TAMBAH DATA -->
        <div class="modal fade myModal" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahPerdes">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-white" id="exampleModalLabel1">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="form-insert" enctype='multipart/form-data'>
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
                                <label for="recipient-name" class="control-label">Pilih Gambar <span class="text-danger">*</span></label>
                                <input accept="image/*" required type="file" class="form-control-file" name="foto_simbol" id="imageUpload">
                                <small id="name1" class="text-info">Maximum Size : 5 Mb</small>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Sektor <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="sektor" id="sektor" required>
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
        <div class="modal fade myModal" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="modal_ubah">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="form-edit" enctype='multipart/form-data'>
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
                                <label for="recipient-name" class="control-label">Pilih Gambar <span class="text-danger">*</span></label>
                                <input accept="image/*" type="file" class="form-control-file" name="foto_simbol" id="imageUpload_edit">
                                <small id="name1" class="text-info">Maximum Size : 5 Mb</small>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Sektor <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="sektor" id="sektor_edit" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Keterangan</span></label>
                                <textarea class="form-control" name="keterangan" id="keterangan_edit"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_data" id="id_data">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary ultra-disabled" id="add-btn">Simpan</button>

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
                                        <th style="width: 15%; padding: 10px;" class="align-middle text-center">Simbol</th>
                                        <th style="width: 40%; padding: 10px;" class="align-middle text-center">Sektor</th>
                                        <th style="padding: 10px;" class="align-middle text-center">Keterangan</th>
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

<script type="text/javascript">
    function readURL(input, img_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_view2').css('background-image', 'url(' + e.target.result + ')');
                // $('#img_view2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function read() {
        var $input = $(this);
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // $('#imgPreview').attr('src', e.target.result);
                $('#imgPreview').css('background-image', 'url(' + e.target.result + ')');
            }
            reader.readAsDataURL(this.files[0]);
        }
    }

    function read_edit() {
        var $input = $(this);
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // $('#imgPreview').attr('src', e.target.result);                
                $('#imgPreview_edit').css('background-image', 'url(' + e.target.result + ')');
            }
            reader.readAsDataURL(this.files[0]);
        }
    }

    $("#imageUpload").change(read);
    $("#imageUpload_edit").change(read_edit);
    $(".imgUp").change(function() {
        readURL(this, $(this).attr('data-id'));
    });

    $(document).ready(function() {
        $("#form-insert").on('submit', (function(event) {
            event.preventDefault();
            $('#add-btn').html("Sedang Menyimpan...");
            $('#add-btn').attr("disabled", true);
            $('#tombol-tambah').attr("disabled", true);

            $.ajax({
                url: "<?= base_url($nama_din . '/prosesTambahData') ?>",
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

        $("#form-edit").on('submit', (function(event) {
            event.preventDefault();
            $('#add-btn').html("Sedang Menyimpan...");
            $('#add-btn').attr("disabled", true);
            $('#tombol-tambah').attr("disabled", true);

            $.ajax({
                url: "<?= base_url($nama_din . '/prosesUpdateData') ?>",
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
        getData();
    });

    function edit(id) {
        Swal.fire({
            title: 'Mohon Tunggu Beberapa Saat',
            text: 'Sedang Mengambil data...',
            onBeforeOpen: () => {
                Swal.showLoading();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url($nama_din . '/getDataById/') ?>',
                    dataType: "json",
                    data: {
                        "id": id
                    },
                    success: function(e) {
                        Swal.close();
                        $('#modal_ubah').modal('show');
                        $('#imgPreview_edit').css('background-image', 'url(' + e.data.simbol + ')');
                        $('#sektor_edit').val(e.data.sektor);
                        $('#keterangan_edit').val(e.data.keterangan);
                        $('#id_data').val(e.data.id);
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
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
                $.ajax({
                    type: "POST",
                    url: "<?= base_url($nama_din . '/prosesHapusData') ?>",
                    data: {
                        "id_data": id
                    },
                    dataType: "json",
                    success: function(data) {
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
                })
            }
        })
    }


    var table_data = $('#table_data').DataTable({
        "ajax": {
            "url": "<?= base_url($nama_din . '/getData') ?>",
            "dataSrc": "data",
        },
        "columns": [{
                data: null,
                className: "text-center align-middle",
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            }, {
                data: "simbol",
                className: "text-center align-middle",
                render: function(data, type, row, meta) {
                    $data = '<a class="btn default btn-outline image-popup-vertical-fit el-link" href="' + data + '">';
                    $data += '<img src="' + data + '" alt="user" height="60"/>'
                    $data += '</a>';
                    return $data;
                }
            },
            {
                data: "sektor",
                className: "align-top",
            },
            {
                data: "keterangan",
                className: "align-top",
            },
            {
                data: "id",
                className: "text-center align-top",
                render: function(data, type, row, meta) {
                    $data = '<button onclick="edit(' + data + ');" class="btn btn-sm btn-primary waves-effect waves-light edit_data" type="button" data-id="1">Ubah</button> ';
                    $data += '<button onclick="hapus(' + data + ');" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="1">Hapus</button>';
                    return $data;
                }
            }
        ]
    });
</script>