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
                    <div class="card-body">
                        <select class="select2 form-control custom-select" style="width: 150px;" name="bulan" id="bulan">
                            <option value="">Pilih Bulan</option>
                            <option <?= $this->input->get('tahun') == "semua" ? "selected" : "" ?> value="semua">Semua</option>
                            <?php foreach ($dataTahun as $data) : ?>
                                <option <?= $this->input->get('tahun') == $data->tahun ? "selected" : "" ?> value="<?= $data->tahun ?>"><?= $data->tahun ?></option>
                            <?php endforeach; ?>
                        </select>
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
                            <?php
                            $thn = $this->input->get("tahun") == "" ? "semua" : $this->input->get("tahun");
                            ?>
                            <a href="<?= base_url('dokumen/export-sk-pengundangan-perdes/?tahun=' . $thn) ?>" id="export" type="button" class="btn waves-effect waves-light btn-danger" style="width: 120px;">Export</a>
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
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Pengundangan Peraturan <?= ce($this->userData->jenis_desa) ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <!-- <form action="<?= base_url('dokumen/tambah_sk_pengundangan_perdes') ?>" method="post" enctype='multipart/form-data'> -->
                        <form id="form-insert" enctype='multipart/form-data'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Nomor peraturan <?= ce($this->userData->jenis_desa) ?></label>
                                        <input type="text" class="form-control" name="no_perdes" id="nomor_perdes" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Tanggal peraturan <?= ce($this->userData->jenis_desa) ?></label>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" class="form-control tgl_perdes" id="datepicker-autoclose5" name="tgl_perdes" placeholder="mm/dd/yyyy" required>
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
                                        <label for="message-text" class="control-label">Nomor pengundangan</label>
                                        <input type="text" class="form-control" name="no_pengundangan" id="nomor_pengundangan" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Tanggal pengundangan</label>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" class="form-control tgl_pengundangan" id="datepicker-autoclose2" name="tgl_pengundangan" placeholder="mm/dd/yyyy" required>
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
                                        <th style="width: 3%; padding: 10px;" class="align-middle text-center">No</th>
                                        <th style="width: 30%; padding: 10px;" class="align-middle text-center">Simbol Sektor</th>
                                        <th style="width: 47%; padding: 10px;" class="align-middle text-center">SIABIDIBAM/ 5W + 1H</th>
                                        <th style="width: 20%; padding: 10px;" class="align-middle text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>