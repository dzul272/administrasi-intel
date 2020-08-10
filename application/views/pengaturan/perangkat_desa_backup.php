<div class="page-wrapper">
    <div class="page-breadcrumb">
        
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Perangkat Desa</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success" style="width: 180px;" data-toggle="modal" data-target="#tambahPerangkat">+ Tambah Perangkat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade" id="tambahPerangkat" tabindex="-1" role="dialog" aria-labelledby="tambahPerangkat">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Perangkat Desa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url('pengaturan/tambah_pamong') ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Silahkan isi keterangan perangkat desa disini</label>
                            </div>
                            <div class="form-group">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="uploadBaru" name="foto_pamong" accept=".png, .jpg, .jpeg" />
                                        <label for="uploadBaru"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="cekPhoto" style="background-image: url(<?= asset('website/img/default.png') ?>);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">NIP</label>
                                <input type="text" class="form-control" name="nip_pamong" id="nip" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_pamong" id="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Jabatan <span class="text-danger">*</span></label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="id_jabatan" id="jabatan" required>
                                    <option value="">Pilih Salah Satu</option>
                                    <?php foreach ($jabatan as $jbt) : ?>
                                        <option value="<?= $jbt->id_jabatan ?>"><?= $jbt->nama_jabatan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" class="form-control tgl_kelahiran" id="datepicker-autoclose2" name="tanggallahir_pamong" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nomor SK Pengangkatan</label>
                                <input type="text" class="form-control" name="nosk_pamong" id="no_sk">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Tanggal Pelantikan <span class="text-danger">*</span></label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" class="form-control tgl_pelantikan" id="datepicker-autoclose3" name="tanggalpelantikan_pamong" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                <select class="select2 form-control custom-select" style="width: 100%;" name="pendidikan_pamong" id="pendidikan_terakhir" required>
                                    <option value="">Pilih Pendidikan Terakhir</option>
                                    <?php foreach (pendidikan_terakhir() as $pendidikan) : ?>
                                        <option value="<?= $pendidikan ?>"><?= $pendidikan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Akhir Masa Jabatan <span class="text-danger">*</span></label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" class="form-control akhir_jabatan" id="datepicker-autoclose4" name="akhirjabatan_pamong" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
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
                                        <th style="width: 10%; padding: 10px;">Foto</th>
                                        <th style="width: 10%; padding: 10px;">NIP</th>
                                        <th style="width: 20%; padding: 10px;">Nama</th>
                                        <th style="width: 15%; padding: 10px;">Jabatan</th>
                                        <th style="width: 20%; padding: 10px;">Nomor SK</th>
                                        <th style="width: 20%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    <?php $no = 1;
                                    foreach ($pamong as $data) : ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <a class="btn default btn-outline image-popup-vertical-fit el-link" href="<?= isset($data->foto_pamong) ?  asset("website/desa/" . $data->foto_pamong) :  asset('website/img/default.png') ?>">
                                                    <img src="<?= isset($data->foto_pamong) ?  asset("website/desa/" . $data->foto_pamong) :  asset('website/img/default.png') ?>" alt="user" class="rounded-circle" width="50" height="50"/>
                                                </a>
                                            </td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->nip_pamong ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->nama_pamong ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->nama_jabatan ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->nosk_pamong ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button class="btn btn-sm btn-info waves-effect waves-light" type="button" data-toggle="modal" data-target="#detail<?= $data->id_pamong ?>">Detail</button>
                                                <button class="btn btn-sm btn-warning waves-effect waves-light" type="button" data-toggle="modal" data-target="#ubahdata<?= $data->id_pamong ?>">Ubah</button>
                                                <button class="btn btn-sm btn-danger waves-effect waves-light" type="button" data-toggle="modal" data-target="#hapus_perangkat<?= $data->id_pamong ?>">Hapus</button>
                                            </td>

                                            <!-- MODAL LIHAT DETAIL -->
                                            <div class="modal fade" id="detail<?= $data->id_pamong ?>" tabindex="-1" role="dialog" aria-labelledby="detail">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-info">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Detail Perangkat Desa</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <div class="circle" style="position: relative; max-width: 205px; margin: 5px auto;">
                                                                        <div class="bulat" style="width: 192px; height: 192px; position: relative;border-radius: 100%; border: 6px solid #F8F8F8; box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);">
                                                                            <div id="images" style="width: 100%; height: 100%; border-radius: 100%; background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url(<?= isset($data->foto_pamong) ?  asset("website/desa/" . $data->foto_pamong) :  asset('website/img/default.png') ?>);">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">NIP</label>
                                                                    <input type="text" class="form-control" name="nip" id="nip" value="<?= $data->nip_pamong ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $data->nama_pamong ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Jabatan</label>
                                                                    <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?= $data->nama_jabatan ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Tanggal Lahir</label>
                                                                    <input type="text" class="form-control" name="tgl_lahir" value="<?= $data->tanggallahir_pamong ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Nomor SK Pengangkatan</label>
                                                                    <input type="text" class="form-control" name="no_sk" id="no_sk" value="<?= $data->nosk_pamong ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Tanggal Pelantikan <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="tgl_pelantikan" id="tgl_pelantikan3" value="<?= $data->tanggalpelantikan_pamong ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="pendidikan" id="pendidikan" value="<?= $data->pendidikan_pamong ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Akhir Masa Jabatan <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="akhir_jabatan" id="akhir_jabatan" value="<?= $data->akhirjabatan_pamong ?>" readonly>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                            <!-- <button type="submit" class="btn btn-success">Simpan</button> -->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END MODAL -->

                                            <!-- MODAL UBAH DATA -->
                                            <div class="modal fade" id="ubahdata<?= $data->id_pamong ?>" tabindex="-1" role="dialog" aria-labelledby="ubahdata">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Perangkat Desa</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form enctype="multipart/form-data" method="post" action="<?= base_url('pengaturan/update_pamong') ?>" runat="server">
                                                                <input type="hidden" name="id_pamong" value="<?= $data->id_pamong; ?>" id="datapamong" data-id="imageUpload<?= $data->id_pamong; ?>">
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Silahkan isi keterangan perangkat desa disini</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="avatar-upload">
                                                                        <div class="avatar-edit">
                                                                            <input type='file' id="imageUpload<?= $data->id_pamong ?>" class="imgUp" name="foto_pamong" accept=".png, .jpg, .jpeg" data-id="<?= $data->id_pamong; ?>" />
                                                                            <label for="imageUpload<?= $data->id_pamong ?>"></label>
                                                                        </div>
                                                                        <div class="avatar-preview">
                                                                            <div id="img_view<?= $data->id_pamong; ?>" style="background-image: url(<?= isset($data->foto_pamong) ?  asset("website/desa/" . $data->foto_pamong) :  asset('website/img/default.png') ?>);">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">NIP <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="nip_pamong" id="nip" value="<?= $data->nip_pamong ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Nama <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="nama_pamong" id="nama" value="<?= $data->nama_pamong ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Jabatan <span class="text-danger">*</span></label>
                                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="id_jabatan" id="jabatan<?= $data->id_pamong; ?>" value="<?= $data->nama_jabatan ?>" required>
                                                                        <option value="">Pilih Salah Satu</option>
                                                                        <?php foreach ($jabatan as $jbt) : ?>
                                                                            <option value="<?= $jbt->id_jabatan ?>" <?= $jbt->id_jabatan == $data->id_jabatan ? 'selected' : '' ?>><?= $jbt->nama_jabatan; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <input type="text" class="form-control tgl_kelahiran" id="datepicker-autoclose5" name="tanggallahir_pamong" value="<?= tanggal_tampil($data->tanggallahir_pamong) ?>" placeholder="mm/dd/yyyy">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Nomor SK Pengangkatan</label>
                                                                    <input type="text" class="form-control" name="nosk_pamong" id="no_sk" value="<?= $data->nosk_pamong;?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Tanggal Pelantikan <span class="text-danger">*</span></label>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <input type="text" class="form-control tgl_pelantikan" id="datepicker-autoclose6" name="tanggalpelantikan_pamong" value="<?= tanggal_tampil($data->tanggalpelantikan_pamong) ?>" placeholder="mm/dd/yyyy">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                                                    <select class="select2 form-control custom-select" style="width: 100%;" name="pendidikan_pamong" id="pendidikan_terakhir2" required>
                                                                        <option value="">Pilih Pendidikan Terakhir</option>
                                                                        <?php foreach (pendidikan_terakhir() as $pendidikan) : ?>
                                                                            <option value="<?= $pendidikan ?>" <?= $pendidikan == $data->pendidikan_pamong ? 'selected' : '' ?>><?= $pendidikan; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="control-label">Akhir Masa Jabatan <span class="text-danger">*</span></label>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <input type="text" class="form-control akhir_jabatan" id="datepicker-autoclose7" name="akhirjabatan_pamong" value="<?= tanggal_tampil($data->akhirjabatan_pamong) ?>" placeholder="mm/dd/yyyy">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                        </div>
                                                                    </div>
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
                                            <div class="modal fade" id="hapus_perangkat<?= $data->id_pamong ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_perangkat">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title text-white" id="exampleModalLabel1">Hapus Perangkat Desa</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" id="form_hapus" action="<?= base_url('pengaturan/hapus_pamong') ?>">
                                                                <p>Apakah anda yakin ingin menghapus data <?= ce($data->nama_pamong) ?> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger" name="id_pamong" value="<?= $data->id_pamong; ?>">Hapus</button>
                                                            <!-- </form> -->
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

</div>

<!-- JAVASCRIPT -->
<script type="text/javascript">
        function readURL(input, img_id) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    
                    $("#img_view"+img_id).css('background-image', 'url(' + e.target.result + ')');
                    $("#img_view"+img_id).hide();
                    $("#img_view"+img_id).fadeIn(650);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function read() {
            var $input = $(this);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#cekPhoto').css('background-image', 'url(' + e.target.result + ')');
                    $('#cekPhoto').hide();
                    $('#cekPhoto').fadeIn(650);
                }
                reader.readAsDataURL(this.files[0]);
            }
        }

        // var idpamong = $("#datapamong").attr('data-id');
        // $("#imageUpload").change(readURL);
        $("#uploadBaru").change(read);
        $(".imgUp").change(function(){
            readURL(this, $(this).attr('data-id'));
        });
    </script>
<script>
    let base_url = "<?= base_url('dokumen/downloadFile'); ?>";

    $(document).ready(function(){

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
                        url: "<?= base_url('dokumen/hapus_sk_kades')?>", // Isi dengan url/path file php yang dituju
                        data: {
                            "id_sk_kades": id
                        }, // data yang akan dikirim ke file yang dituju
                        dataType: "json",

                        success: function(data) { // Ketika proses pengiriman berhasil
                            if (data.response_code == 200) {
                                Swal.fire(
                                    'Terhapus',
                                    data.response_message,
                                    'success'
                                ).then((result) => {
                                    window.location.href="<?= base_url('dokumen/surat-keputusan-kades') ?>";
                                })

                            } else {
                                Swal.close();
                                Swal.fire("Oops", data.response_message, "error");
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                            Swal.fire("Oops", thrownError, "error");
                        }
                    });
                    //  // END AJAX
                    
                }
            });
        });

        // AJAX UPDATE DATA
        $(".form-edit").on('submit',(function(event){
            event.preventDefault();
            $.ajax({
                url: "<?= base_url('dokumen/ubah_sk_kades')?>", 
                type : "POST",
                data:  new FormData(this),
                dataType:"JSON",
                contentType: false,
                cache: false,
                processData:false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            window.location.href="<?= base_url('dokumen/surat-keputusan-kades') ?>";
                        })

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", thrownError, "error");
                }
            }); 
        }));

        // AJAX TAMBAH DATA
        $("#form-insert").on('submit',(function(event){
            event.preventDefault();
            $.ajax({
                url: "<?= base_url('dokumen/tambah_sk_kades')?>", 
                type : "POST",
                data:  new FormData(this),
                dataType:"JSON",
                contentType: false,
                cache: false,
                processData:false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('.myModal').modal('hide');
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            window.location.href="<?= base_url('dokumen/surat-keputusan-kades') ?>";
                        })

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", thrownError, "error");
                }
            }); 
        }));

    });
</script>