<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Daftar Pengguna</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success" style="width: 180px;" data-toggle="modal" data-target="#tambahPengguna">+ Tambah Pengguna</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid">

        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade" id="tambahPengguna" tabindex="-1" role="dialog" aria-labelledby="tambahPengguna">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Pengguna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" action="<?= base_url('akses/tambah_pengguna')?>" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Silahkan isi data pengguna baru disini</label>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Pengguna <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_user" id="nama_pengguna" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="username_user" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password_user" placeholder="Minimal 8 Karakter" id="password" minlength="8" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="konfirmasi_password" placeholder="Minimal 8 Karakter" id="konfirmasi_password" minlength="8" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Hak Akses <span class="text-danger">*</span></label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="id_role" id="tampil_role" required>
                                    <option value="">Pilih Salah Satu</option>
                                    <?php foreach ($role as $key): ?>
                                        <option value="<?= $key->id_role; ?>"><?= ce($key->nama_role)?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <script>
                                $('#tampil role').select2({
                                    dropdownParent: $('#tambahPengguna')
                                });
                            </script>
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
                                        <th style="width: 5%; padding: 10px;">ID</th>
                                        <th style="width: 25%; padding: 10px;">Nama</th>
                                        <th style="width: 20%; padding: 10px;">Username</th>
                                        <th style="width: 20%; padding: 10px;">Role</th>
                                        <th style="width: 35%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pengguna as $data): ?>
                                    <tr>
                                        <td style="padding: 5px;" class="align-middle text-center"><?= $no++; ?></td>
                                        <td style="padding: 5px;" class="align-middle"><?= ce($data->nama_user)?></td>
                                        <td style="padding: 5px;" class="align-middle"><?= $data->username_user?></td>
                                        <td style="padding: 5px;" class="align-middle"><?= ce($data->nama_role)?></td>
                                        <td style="padding: 5px;" class="align-middle text-center">
                                            <button class="btn btn-sm btn-warning waves-effect waves-light" style="width: 80px;" type="button" data-toggle="modal" data-target="#ubahdata<?= $data->id_user?>">Ubah</button>
                                            <button class="btn btn-sm btn-primary waves-effect waves-light" style="width: 80px;" type="button" type="button" data-toggle="modal" data-target="#ubah_password<?= $data->id_user?>">Password</button>
                                            <button class="btn btn-sm btn-danger waves-effect waves-light" style="width: 80px;" type="button" type="button" data-toggle="modal" data-target="#hapus_pengguna<?= $data->id_user?>">Hapus</button>
                                        </td>

                                        <!-- MODAL UBAH DATA -->
                                        <div class="modal fade" id="ubahdata<?= $data->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="ubahdata">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-warning">
                                                        <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Data Pengguna</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('akses/ubah_pengguna')?>" method="post">
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Silahkan isi data pengguna baru disini</label>
                                                                <input type="hidden" name="id_user" value="<?= $data->id_user; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Nama Pengguna <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="nama_user" id="nama_pengguna" value="<?= $data->nama_user?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Username <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="username_user" id="username_user" value="<?= $data->username_user?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="control-label">Hak Akses <span class="text-danger">*</span></label>
                                                                <select class="select2 form-control custom-select" style="width: 100%;" name="id_role" id="akses<?= $data->id_user; ?>" required>
                                                                    <option value="">Pilih Salah Satu</option>
                                                                    <?php foreach ($role as $key): ?>
                                                                        <option value="<?= $key->id_role; ?>" <?= $key->id_role == $data->id_role ? 'selected' : '' ?>><?= ce($key->nama_role)?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END MODAL -->

                                        <!-- MODAL UBAH PASSWORD -->
                                        <div class="modal fade" id="ubah_password<?= $data->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="ubahdata">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Password Pengguna</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('akses/ubah_password')?>" method="post">
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Silahkan isi password pengguna baru disini</label>
                                                                <input type="hidden" name="id_user" value="<?= $data->id_user; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Password <span class="text-danger">*</span></label>
                                                                <input type="password" class="form-control" name="password_user" id="password_user" placeholder="Minimal Password 8 Karakter" minlength="8" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                                                <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Minimal Password 8 Karakter" minlength="8" required>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END MODAL -->

                                        <!-- MODAL HAPUS PENGGUNA -->
                                        <div class="modal fade" id="hapus_pengguna<?= $data->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="hapus_pengguna">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h4 class="modal-title text-white" id="exampleModalLabel1">Hapus Pengguna</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('akses/hapus_pengguna')?>" method="post">
                                                            <p>Apakah anda yakin ingin menghapus data pengguna <?= $data->nama_user; ?></p>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger" name="id_user" value="<?= $data->id_user; ?>">Hapus</button>
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


<script>    
function checkLength(el){
    // var textbox = document.getElementById("no_hp");
    if(el.value.length < 8){
        Swal.fire("INFO", "Panjang Password Minimal 8 karakter", "warning")
    }
    else{
        return true;
    }
}

function checkLength2(el){
    if(el.value.length < 8){
        Swal.fire("INFO", "Panjang Konfirmasi Password Minimal 8 karakter", "warning")
    }
    else{
        return true;
    }
}
</script>