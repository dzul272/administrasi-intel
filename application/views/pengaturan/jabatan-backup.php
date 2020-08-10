<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Jabatan</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success" style="width: 180px;" data-toggle="modal" data-target="#tambahJabatan">+ Tambah Jabatan</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid">


        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade" id="tambahJabatan" tabindex="-1" role="dialog" aria-labelledby="tambahJabatan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Jabatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" action="<?= base_url('pengaturan/tambah_jabatan') ?>" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Jabatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_jabatan" id="jabatan" required>
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
                                        <th style="width: 65%; padding: 10px;">Nama Jabatan</th>
                                        <th style="width: 30%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-data">
                                    <?php $no = 1;
                                    foreach ($jabatan as $data) : ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++; ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->nama_jabatan ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button class="btn btn-sm btn-warning waves-effect waves-light" type="button" data-toggle="modal" data-target="#ubahdata<?= $data->id_jabatan ?>">Ubah</button>
                                                <button class="btn btn-sm btn-danger waves-effect waves-light" type="button" data-toggle="modal" data-target="#hapus_data<?= $data->id_jabatan ?>">Hapus</button>
                                            </td>

                                            <!-- MODAL UBAH DATA -->
                                            <div class="modal fade" id="ubahdata<?= $data->id_jabatan ?>" tabindex="-1" role="dialog" aria-labelledby="ubahdata">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Jabatan</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form enctype="multipart/form-data" action="<?= base_url('pengaturan/ubah_jabatan') ?>" method="post">
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Nama Jabatan <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="nama_jabatan" value="<?= $data->nama_jabatan ?>" id="namajabatan" required>
                                                                </div>
                                                                <input type="hidden" class="form-control" name="id_jabatan" value="<?= $data->id_jabatan ?>" id="id_jabatan">
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
                                            <div class="modal fade" id="hapus_data<?= $data->id_jabatan ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_data">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Hapus Jabatan</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('pengaturan/hapus_jabatan') ?>" id="form-hapus" method="post">
                                                            <!-- <form action="#" id="form-hapus"> -->
                                                                <p>Apakah anda yakin ingin menghapus nama jabatan <?= ce($data->nama_jabatan) ?>?</p>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger" name="id_jabatan" value="<?= $data->id_jabatan ?>">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END MODAL -->
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

        // let namajabatan = $("#namajabatan").val();

        // $("#form-hapus").submit(function(event){
        //             event.preventDefault();
                      
                    
        //             // send username and password to php check login
        //             $.ajax({
        //                 type: "POST", // Method pengiriman data bisa dengan GET atau POST
        //                 url: "<?= base_url('pengaturan/hapus_jabatan') ?>", // Isi dengan url/path file php yang dituju
        //                 data: $(this).serialize(),
        //                 dataType: "json",

        //                 success: function(response) { // Ketika proses pengiriman berhasil
        //                     // alert(response.response.co);
        //                     if (response.response_code == 200) {
                                
        //                         $('.modal').modal('hide');
        //                         Swal.close();
        //                         Swal.fire("Berhasil", response.response_message, "success");
        //                         window.location.href="<?= base_url('pengaturan/jabatan') ?>";

        //                     } else {
        //                         $('.modal').modal('hide');
        //                         Swal.close();
        //                         Swal.fire("Oops", response.response_message, "error");
        //                     }
        //                 },
        //                 error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
        //                     Swal.fire("Oops", thrownError, "error");
        //                 }
        //             });
        //             //  // END AJAX
            
        //     });
       
    </script>
</div>