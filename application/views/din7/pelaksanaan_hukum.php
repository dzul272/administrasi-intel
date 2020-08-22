<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">D.IN.7 - Data Pelaksanaan Penerangan Hukum</h4>
                <!-- <h5>Data Hasil Pelaksanaan Kegiatan Penerangan</h5> -->
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
                            <a target="_blank" href="<?= base_url('din7/penerangan-hukum/export') ?>" id="export" type="button" class="btn waves-effect waves-light btn-danger" style="width: 120px;">Export</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL TAMBAH DATA -->
        <div class="modal fade myModal" id="tambahData" role="dialog" aria-labelledby="tambahPerdes">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-white" id="exampleModalLabel1">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="form-insert" method="POST" action="<?= base_url("din7/addPeneranganHukum") ?>" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <label for="recipient-name" class="control-label text-info">Pelaksanaan Penerangan Hukum Secara Langsung</label>
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
                                        <label for="recipient-name" class="control-label">Jumlah Peserta <span class="text-danger">*</span></label>
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
                                            <option value="">Pilih Desa / Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Detail Tempat Kegiatan</label>
                                <input type="text" class="form-control" name="tempat_detail" id="tempat_detail">
                            </div>
                            <label for="recipient-name" class="control-label text-info">Pelaksanaan Penerangan Hukum Secara Tidak Langsung</label>
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
                            <table id="table_data" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>
                                        <th style="padding: 10px;" rowspan="2" class="align-middle text-center">No</th>
                                        <th style="padding: 10px; width: 80px" rowspan="2" class="align-middle text-center">Aksi</th>
                                        <!-- <th style="padding: 10px;" rowspan="2" class="align-middle text-center">Kejari</th> -->
                                        <th style="padding: 10px;" colspan="6" class="align-middle text-center">Pelaksanaan Penerangan Hukum Secara Langsung</th>
                                        <th style="padding: 10px;" colspan="6" class="align-middle text-center">Pelaksanaan Penerangan Hukum Secara Tidak Langsung</th>
                                    </tr>
                                    <tr>
                                        <th style="padding: 10px;" class="align-middle text-center">Sasaran Peserta Penyuluhan Hukum</th>
                                        <th style="padding: 10px;" class="align-middle text-center">Materi</th>
                                        <th style="padding: 10px;" class="align-middle text-center">Jumlah Peserta</th>
                                        <th style="padding: 10px;" class="align-middle text-center">Waktu Pelaksanaan kegiatan</th>
                                        <th style="padding: 10px;" class="align-middle text-center">Tempat / Lokasi Kegiatan</th>
                                        <th style="padding: 10px;" class="align-middle text-center">Ket</th>
                                        <th style="padding: 10px;" class="align-middle text-center">Media Yang Digunakan</th>
                                        <th style="padding: 10px;" class="align-middle text-center">Materi</th>
                                        <th style="padding: 10px;" class="align-middle text-center">Waktu Pelaksanaan Kegiatan</th>
                                        <th style="padding: 10px;" class="align-middle text-center">Ket</th>
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
    });

    var table_data = $('#table_data').DataTable({
        "ajax": {
            "url": "<?= base_url('din7/getDataPeneranganHukum/' . $this->input->get("tahun") . "/" . $this->input->get("triwulan")) ?>",
            "dataSrc": "data",
        },
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
                data: "waktu_pelaksanaan",
                className: "align-top",
            },
            {
                data: "keterangan",
                className: "align-top",
            },
        ]
    });
</script>