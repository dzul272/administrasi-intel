<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Daftar Role</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success" style="width: 180px;" data-toggle="modal" data-target="#tambahRole">+ Tambah Role</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid">

        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade" id="tambahRole" tabindex="-1" role="dialog" aria-labelledby="tambahRole">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Role</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url("akses/tambah_role") ?>" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Silahkan isi data role baru disini</label>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Role <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_role" id="nama_role" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Hak Akses (Bisa pilih lebih dari satu) <span class="text-danger">*</span></label>
                                <?php foreach ($akses as $key) : ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck<?= $key->id_akses; ?>" name="hak_akses[]" value="<?= $key->id_akses; ?>">
                                        <label class="custom-control-label" for="customCheck<?= $key->id_akses; ?>"><?= $key->nama_akses ?></label>
                                    </div>
                                <?php endforeach ?>
                                <!-- <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="hak_akses[]">
                                    <label class="custom-control-label" for="customCheck2">Olah Data Keuangan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="hak_akses[]">
                                    <label class="custom-control-label" for="customCheck3">Olah Data Surat</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4" name="hak_akses[]">
                                    <label class="custom-control-label" for="customCheck4">Olah Data Pertanahan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5" name="hak_akses[]">
                                    <label class="custom-control-label" for="customCheck5">Olah Data Pengguna</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6" name="hak_akses[]">
                                    <label class="custom-control-label" for="customCheck6">Olah Data Masyarakat</label>
                                </div> -->
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->

        <div class="row">
            <div class="col-12">
                <?php if ($this->session->flashdata("sukses")) : ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        <h3 class="text-success"><i class="fa fa-check-circle"></i> Sukses</h3> <?= $this->session->flashdata("sukses") ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata("gagal")) : ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Gagal</h3> <?= $this->session->flashdata("gagal") ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- tabel surat keluar -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style="width: 15%; padding: 10px;">Nama Role</th>
                                        <th style="width: 65%; padding: 10px;">Hak Akses</th>
                                        <th style="width: 15%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($role as $data) : ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++; ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= ce($data->nama_role) ?></td>
                                            <td style="padding: 5px;" class="align-middle">
                                                <?php
                                                $size = count($data->detail);
                                                $i = 0;
                                                $id_roledetail = [];
                                                foreach ($data->detail as $detail) : ?>
                                                    <?php array_push($id_roledetail, $detail->id_akses) ?>
                                                    <?= ce($detail->nama_akses) ?>
                                                    <?php if (++$i !== $size) : ?>
                                                        <?= ", " ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button class="btn btn-sm btn-warning waves-effect waves-light" style="width: 60px;" type="button" data-toggle="modal" data-target="#ubahdata<?= $data->id_role ?>">Ubah</button>
                                                <button class="btn btn-sm btn-danger waves-effect waves-light" style="width: 60px;" type="button" type="button" data-toggle="modal" data-target="#hapusdata<?= $data->id_role ?>">Hapus</button>
                                            </td>

                                            <!-- MODAL UBAH DATA -->
                                            <div class="modal fade" id="ubahdata<?= $data->id_role ?>" tabindex="-1" role="dialog" aria-labelledby="ubahdata<?= $data->id_role ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Role</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="formEdit" action="<?= base_url("akses/ubah-role") ?>" method="post">
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Silahkan isi data role baru disini</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Nama Role <span class="text-danger">*</span></label>
                                                                    <input type="text" value="<?= $data->nama_role ?>" class="form-control" name="nama_role" id="nama_role" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Hak Akses (Bisa pilih lebih dari satu) <span class="text-danger">*</span></label>
                                                                    <?php foreach ($akses as $key) : ?>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" <?= in_array($key->id_akses, $id_roledetail) ? "checked" : "" ?> class="custom-control-input" id="editCustomCheck<?= $key->id_akses . "_" . $no ?>" name="hak_akses[]" value="<?= $key->id_akses; ?>">
                                                                            <label class="custom-control-label" for="editCustomCheck<?= $key->id_akses . "_" . $no ?>"><?= $key->nama_akses ?></label>
                                                                        </div>
                                                                    <?php endforeach ?>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id_role" value="<?= $data->id_role ?>">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END MODAL -->

                                            <!-- MODAL HAPUS PENGGUNA -->
                                            <div class="modal fade" id="hapusdata<?= $data->id_role ?>" tabindex="-1" role="dialog" aria-labelledby="hapusdata<?= $data->id_role ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Hapus Pengguna</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="<?= base_url("akses/hapus-role") ?>">
                                                                <p>Apakah anda yakin ingin menghapus Role <b><?= ce($data->nama_role) ?></b> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id_role" value="<?= $data->id_role ?>">
                                                            <input type="hidden" name="nama_role" value="<?= $data->nama_role ?>">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END MODAL -->
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