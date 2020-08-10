<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Daftar Pengguna</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" style="width: 180px;" data-toggle="modal" data-target="#tambahPengguna" id="tombol-tambah">+ Tambah Pengguna</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid">

        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade myModal" id="tambahPengguna" tabindex="-1" role="dialog" aria-labelledby="tambahPengguna">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Pengguna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">                        
                        <form id="form-insert" enctype="multipart/form-data">
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
                                $('#tampil_role').select2({
                                    dropdownParent: $('#tambahPengguna')
                                });
                            </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button id="add-btn" type="submit" class="btn btn-success ultra-disabled">Tambah</button>
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
                                        <th style="width: 25%; padding: 10px;">Nama</th>
                                        <th style="width: 20%; padding: 10px;">Username</th>
                                        <th style="width: 20%; padding: 10px;">Role</th>
                                        <th style="width: 35%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-user">
                                    <?php $no = 1;
                                    foreach ($pengguna as $data): ?>
                                    <tr>
                                        <td style="padding: 5px;" class="align-middle text-center"><?= $no++; ?></td>
                                        <td style="padding: 5px;" class="align-middle"><?= ce($data->nama_user)?></td>
                                        <td style="padding: 5px;" class="align-middle"><?= $data->username_user?></td>
                                        <td style="padding: 5px;" class="align-middle"><?= ce($data->nama_role)?></td>
                                        <td style="padding: 5px;" class="align-middle text-center">
                                            <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" style="width: 80px;" type="button" data-id="<?= $data->id_user ?>">Ubah</button>
                                            <button class="btn btn-sm btn-primary waves-effect waves-light edit_password" style="width: 80px;" type="button" data-id="<?= $data->id_user ?>">Password</button>
                                            <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" style="width: 80px;" type="button" data-id="<?= $data->id_user ?>">Hapus</button>
                                        </td>

                                        

                                        

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


<!-- MODAL UBAH DATA -->
<div class="modal fade" id="modal_ubah" role="dialog" aria-labelledby="modal_ubah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Data Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form-edit" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Silahkan isi data pengguna baru disini</label>
                        <input type="hidden" name="id_user" id="id_user2" value="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Pengguna <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_user" id="nama_user2" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="username_user" id="username_user2" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Hak Akses <span class="text-danger">*</span></label>
                        <select class="select2 form-control custom-select" style="width: 100%;" name="id_role" id="akses2" required>
                            <option value="">Pilih Salah Satu</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="edit-btn">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL -->



<!-- MODAL UBAH PASSWORD -->
<div class="modal fade" id="modal_ubah_password" tabindex="-1" role="dialog" aria-labelledby="ubahdata">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Password Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form-password">
                <div class="tampil-password"></div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL -->


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


<script>
    let base_url = "<?= base_url('dokumen/downloadFile'); ?>";

    $(document).ready(function(){



        $(document).on('click','.edit_data',function(e){
            let id = $(this).attr('data-id');
            $.ajax({
                type : 'POST',
                url : '<?= base_url('akses/getdata_pengguna')?>',
                dataType: "json",
                data: {
                    "id_user": id
                },

                success : function(data){
                    // $('.tampil-data').html(data);//menampilkan data ke dalam modal

                    $('#modal_ubah').modal('show');
                    $('#id_user2').val(data.id_user);
                    $('#nama_user2').val(data.nama_user);
                    $('#username_user2').val(data.username_user);
                    $('#akses2').html(data.id_role).show();
                }
            });
        });

        $(document).on('click','.edit_password',function(e){
            let id = $(this).attr('data-id');
            $.ajax({
                type : 'POST',
                url : '<?= base_url('akses/getdata_password')?>',
                data: {
                    "id_user": id
                },
                success : function(data){
                    $('.tampil-password').html(data);//menampilkan data ke dalam modal
                    $('#modal_ubah_password').modal('show');
                }
            });
        });

        //AJAX HAPUS DATA
        $(document).on('click','.delete_data',function(e){
            let id = $(this).attr('data-id');
            
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data Akan Terhapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    // //START AJAX 
                    $.ajax({
                        type: "POST", // Method pengiriman data bisa dengan GET atau POST
                        url: "<?= base_url('akses/hapus_pengguna')?>", // Isi dengan url/path file php yang dituju
                        data: {
                            "id_user": id
                        }, // data yang akan dikirim ke file yang dituju
                        dataType: "json",

                        success: function(data) { // Ketika proses pengiriman berhasil
                            if (data.response_code == 200) {
                                Swal.fire(
                                    'Terhapus',
                                    data.response_message,
                                    'success'
                                ).then((result) => {
                                    $('#tabel-user').empty();
                                    $('#tabel-user').html(data.output);
                                })

                            } else {
                                Swal.close();
                                Swal.fire("Oops", data.response_message, "error");
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                            Swal.fire("Oops", xhr.responseText, "error");
                        }
                    });
                    //  // END AJAX
                    
                }
            });
        });

        // AJAX UPDATE DATA
        $("#form-edit").on('submit',(function(event){
            event.preventDefault();
            $('#edit-btn').html("Sedang Menyimpan...");
            $('#edit-btn').attr("disabled", true);
            $.ajax({
                url: "<?= base_url('akses/ubah_pengguna')?>", 
                type : "POST",
                data:  new FormData(this),
                dataType:"JSON",
                contentType: false,
                cache: false,
                processData:false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('#modal_ubah').modal('hide');
                        $('#edit-btn').html("Simpan");
                        $('#edit-btn').attr("disabled", false);
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            $('#tabel-user').empty();
                            $('#tabel-user').html(e.output);
                            $('.textNamaUser').html(e.nama_user);
                            $('#textNamaUser2').html(e.nama_user);
                        });

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#edit-btn').html("Simpan");
                        $('#edit-btn').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#edit-btn').html("Simpan");
                    $('#edit-btn').attr("disabled", false);
                }
            }); 
        }));

         // AJAX UPDATE DATA
        $("#form-password").on('submit',(function(event){
            event.preventDefault();
            $('#pass-btn').html("Sedang Menyimpan...");
            $('#pass-btn').attr("disabled", true);
            $.ajax({
                url: "<?= base_url('akses/ubah_password')?>", 
                type : "POST",
                data:  new FormData(this),
                dataType:"JSON",
                contentType: false,
                cache: false,
                processData:false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('#modal_ubah_password').modal('hide');
                        $("#form-password")[0].reset();
                        $('#pass-btn').html("Simpan");
                        $('#pass-btn').attr("disabled", false);
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            $('#tabel-user').empty();
                            $('#tabel-user').html(e.output);
                        });

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#pass-btn').html("Simpan");
                        $('#pass-btn').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#pass-btn').html("Simpan");
                    $('#pass-btn').attr("disabled", false);
                }
            }); 
        }));

        // AJAX TAMBAH DATA
        $("#form-insert").on('submit',(function(event){
            event.preventDefault();
            $('#add-btn').html("Sedang Menyimpan...");
            $('#add-btn').attr("disabled", true);
            $('#tombol-tambah').html("Sedang Menyimpan...");
            $('#tombol-tambah').attr("disabled", true);
            $.ajax({
                url: "<?= base_url('akses/tambah_pengguna')?>", 
                type : "POST",
                data:  new FormData(this),
                dataType:"JSON",
                contentType: false,
                cache: false,
                processData:false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('.myModal').modal('hide');
                        $("#form-insert")[0].reset();
                        $('select').trigger('change');
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah Pengguna");
                        $('#tombol-tambah').attr("disabled", false);
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            $('#tabel-user').empty();
                            $('#tabel-user').html(e.output);
                        });

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah Pengguna");
                        $('#tombol-tambah').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("+ Tambah Pengguna");
                    $('#tombol-tambah').attr("disabled", false);
                }
            }); 
        }));

    });


</script>