<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Data Foto Dokumentasi Penerangan Hukum</h4>
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
                                <a target="_blank" href="<?= base_url('din8/penerangan-hukum/export/?bulan=' . $this->input->get("bulan") . "&tahun=" . $this->input->get("tahun")) ?>" id="export" type="button" class="btn waves-effect waves-light btn-danger" style="width: 120px;">Export</a>
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
                    <form id="form-insert" method="POST" action="<?= base_url("din8/addPeneranganHukum") ?>" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Kegiatan Penerangan Hukum <span class="text-danger">*</span></label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="din7_id" id="din7_id" required>
                                    <option value="">Pilih Kegiatan</option>
                                    <?php if ($din7) : ?>
                                        <?php foreach ($din7 as $d7) : ?>
                                            <option value="<?= $d7->id ?>"><?= $d7->materi_tema ?></option>
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
                                        <!-- <th style="width: 200px; padding: 10px;" class="align-middle text-center">Triwulan</th> -->
                                        <th style="width: 200px; padding: 10px;" class="align-middle text-center">Waktu Input</th>
                                        <th style="width: 100px; padding: 10px;" class="align-middle text-center">Aksi</th>
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

    });

    var table_data = $('#table_data').DataTable({
        "ajax": {
            "url": "<?= base_url('din8/getDataPeneranganHukum/' . $this->input->get("tahun")) ?>",
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
        }, {
            data: "keterangan",
            className: "align-top",
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
</script>