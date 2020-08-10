<div class="page-wrapper">
    <div class="page-breadcrumb">

        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Perangkat <?= ce($this->userData->jenis_desa) ?></h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-success ultra-disabled" style="width: 180px;" data-toggle="modal" data-target="#tambahPerangkat" id="tombol-tambah">+ Tambah Perangkat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <!-- MODAL TAMBAH SURAT KELUAR -->
        <div class="modal fade myModal" id="tambahPerangkat" tabindex="-1" role="dialog" aria-labelledby="tambahPerangkat">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Perangkat Desa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-insert" enctype="multipart/form-data">
                            <div class="form-group m-b-0">
                                <label for="recipient-name" class="control-label">Silahkan isi keterangan perangkat <?= ce($this->userData->jenis_desa) ?> disini</label>
                            </div>
                            <!-- <div class="row col-12 m-b-10">
                                <img id="imgPreview" class="col-md-12" src="<?= asset("website/img/default-user-300x300.png") ?>" alt="">
                            </div> -->
                            <div class="form-group">
                                <div class="box-foto-pamong">
                                    <div class="bg-foto-profil-pamong">
                                        <div id="imgPreview" class="foto-profil-pamong" style="background-image: url('<?= asset("website/img/default-user-300x300.png") ?>')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Pilih Gambar <span class="text-danger">*</span></label>
                                <input accept="image/*" required type="file" class="form-control-file" name="foto_pamong" id="imageUpload">
                                <small id="name1" class="text-info">Maximum Size : 5 Mb</small>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">NIP</label>
                                <input type="text" class="form-control" name="nip_pamong" id="nip">
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
                                    <input type="text" class="form-control tgl_kelahiran" id="datepicker-autoclose2" name="tanggallahir_pamong" placeholder="mm/dd/yyyy" required>
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
                                <label for="recipient-name" class="control-label">Nomor SK Pengangkatan</label>
                                <input type="text" class="form-control" name="nosk_pamong" id="no_sk">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Tanggal Pelantikan </label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" class="form-control tgl_pelantikan" id="datepicker-autoclose3" name="tanggalpelantikan_pamong" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Akhir Masa Jabatan</label>
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
                        <button type="submit" class="btn btn-success ultra-disabled" id="add-btn">Tambah</button>
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
                                <tbody id="tabel_pamong">
                                    <?php $no = 1;
                                    foreach ($pamong as $data) : ?>
                                        <?php if ($this->userData->jenis_desa == "kelurahan") : ?>
                                            <?php $data->nama_jabatan = str_replace("desa", $this->userData->jenis_desa, strtolower($data->nama_jabatan)) ?>
                                        <?php endif ?>
                                        <tr>
                                            <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <a class="btn default btn-outline image-popup-vertical-fit el-link" href="<?= isset($data->foto_pamong) ?  asset("website/desa/" . $data->foto_pamong) :  asset('website/img/default.png') ?>">
                                                    <img src="<?= isset($data->foto_pamong) ?  asset("website/desa/" . $data->foto_pamong) :  asset('website/img/default.png') ?>" alt="user" class="rounded-circle" width="50" height="50" />
                                                </a>
                                            </td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->nip_pamong ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= ce($data->nama_pamong) ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= ce($data->nama_jabatan) ?></td>
                                            <td style="padding: 5px;" class="align-middle"><?= $data->nosk_pamong ?></td>
                                            <td style="padding: 5px;" class="align-middle text-center">
                                                <button class="btn btn-sm btn-info waves-effect waves-light lihat_data" type="button" data-id="<?= $data->id_pamong ?>">Detail</button>
                                                <button class="btn btn-sm btn-warning waves-effect waves-light edit_data" type="button" data-id="<?= $data->id_pamong ?>">Ubah</button>
                                                <button class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="<?= $data->id_pamong ?>">Hapus</button>
                                            </td>
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

<!-- MODAL LIHAT DETAIL -->
<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="detail">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="exampleModalLabel1">Detail Perangkat <?= ce($this->userData->jenis_desa) ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- <div class="row col-12 m-b-10">
                    <img id="images" class="col-md-12" src="" alt="">
                </div> -->

                <div class="form-group">
                    <div class="box-foto-pamong">
                        <div class="bg-foto-profil-pamong">
                            <div id="images" class="foto-profil-pamong"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">NIP</label>
                    <input type="text" class="form-control" name="nip" id="nip_tampil" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama_tampil" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan_tampil" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tgl_lahir" value="" id="tgllahir_tampil" readonly>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Pendidikan Terakhir</label>
                    <input type="text" class="form-control" name="pendidikan" id="pendidikan_tampil" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Nomor SK Pengangkatan</label>
                    <input type="text" class="form-control" name="no_sk" id="no_sk_tampil" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Tanggal Pelantikan</label>
                    <input type="text" class="form-control" name="tgl_pelantikan" id="tgl_pelantikan_tampil" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Pendidikan Terakhir</label>
                    <input type="text" class="form-control" name="pendidikan" id="pendidikan_tampil" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Akhir Masa Jabatan</label>
                    <input type="text" class="form-control" name="akhir_jabatan" id="akhir_jabatan_tampil" value="" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="submit" class="btn btn-success">Simpan</button> -->
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- MODAL UBAH DATA -->
<div class="modal fade myModal" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="ubahdata">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="exampleModalLabel1">Ubah Perangkat <?= ce($this->userData->jenis_desa) ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" class="form-edit">
                    <input type="hidden" name="id_pamong" value="" id="datapamong">
                    <div class="form-group m-b-0">
                        <label for="recipient-name" class="control-label">Silahkan isi keterangan perangkat <?= ce($this->userData->jenis_desa) ?> disini</label>
                    </div>
                    <!-- <div class="row col-12 m-b-10">
                        <img id="img_view2" class="col-md-12" src="" alt="">
                    </div> -->
                    <div class="form-group">
                        <div class="box-foto-pamong">
                            <div class="bg-foto-profil-pamong">
                                <div id="img_view2" class="foto-profil-pamong">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Pilih Gambar <span class="text-danger">*</span></label>
                        <input accept="image/*" type="file" class="form-control-file imgUp" name="foto_pamong" id="imageUpload2" data-id="">
                        <small id="name1" class="text-info">Maximum Size : 5 Mb</small>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">NIP</label>
                        <input type="text" class="form-control" name="nip_pamong" id="nip_edit" value="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_pamong" id="nama_edit" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Jabatan <span class="text-danger">*</span></label>
                        <select class="select2 form-control custom-select" style="width: 100%;" name="id_jabatan" id="jabatan_edit" required>
                            <option value="">Pilih Salah Satu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control tgl_kelahiran_edit" id="datepicker-autoclose5" name="tanggallahir_pamong" value="" placeholder="mm/dd/yyyy" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                        <select class="select2 form-control custom-select" style="width: 100%;" name="pendidikan_pamong" id="pendidikan_terakhir_edit" required>
                            <option value="">Pilih Pendidikan Terakhir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nomor SK Pengangkatan</label>
                        <input type="text" class="form-control" name="nosk_pamong" id="no_sk_edit" value="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Tanggal Pelantikan</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control tgl_pelantikan_edit" id="datepicker-autoclose6" name="tanggalpelantikan_pamong" value="" placeholder="mm/dd/yyyy">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Akhir Masa Jabatan</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control akhir_jabatan_edit" id="datepicker-autoclose7" name="akhirjabatan_pamong" value="" placeholder="mm/dd/yyyy">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ultra-disabled" id="edit-btn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- JAVASCRIPT -->
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

    $("#imageUpload").change(read);
    $(".imgUp").change(function() {
        readURL(this, $(this).attr('data-id'));
    });
</script>
<script>
    let base_url = "<?= base_url('dokumen/downloadFile'); ?>";

    $(document).ready(function() {

        // AJAX LIHAT DETAIL
        $(document).on('click', '.lihat_data', function(e) {
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url('pengaturan/getdata_pamong') ?>',
                dataType: "json",
                data: {
                    "id_pamong": id
                },

                success: function(data) {
                    // $('.tampil-data').html(data);//menampilkan data ke dalam modal

                    $('#modal_detail').modal('show');
                    // $('#images').attr('src', data.image);
                    $('#images').css('background-image', 'url(' + data.image + ')');
                    $('#nip_tampil').val(data.nip);
                    $('#nama_tampil').val(data.nama);
                    $('#jabatan_tampil').val(data.jabatan);
                    $('#tgllahir_tampil').val(data.tgl_lahir);
                    $('#no_sk_tampil').val(data.no_sk);
                    $('#tgl_pelantikan_tampil').val(data.tgl_pelantikan);
                    $('#pendidikan_tampil').val(data.pendidikan);
                    $('#akhir_jabatan_tampil').val(data.akhir_jabatan);
                }
            });
        });

        // AJAX LIHAT DETAIL
        $(document).on('click', '.edit_data', function(e) {
            let id = $(this).attr('data-id');
            // $('#modal_ubah').modal('show');
            // alert(id);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('pengaturan/getdata_pamong_edit') ?>',
                dataType: "json",
                data: {
                    "id_pamong": id
                },

                success: function(data) {
                    // $('.tampil-data').html(data);//menampilkan data ke dalam modal

                    $('#modal_ubah').modal('show');
                    // $('#img_view2').attr('src', data.image);
                    $('#img_view2').css('background-image', 'url(' + data.image + ')');
                    $('#imageUpload2').attr('data-id', data.id_pamong);
                    $('#datapamong').val(data.id_pamong);
                    $('#nip_edit').val(data.nip);
                    $('#nama_edit').val(data.nama);
                    $('#jabatan_edit').html(data.jabatan).show();
                    $('.tgl_kelahiran_edit').val(data.tgl_lahir);
                    $('#no_sk_edit').val(data.no_sk);
                    $('.tgl_pelantikan_edit').val(data.tgl_pelantikan);
                    $('#pendidikan_terakhir_edit').html(data.pendidikan).show();
                    $('.akhir_jabatan_edit').val(data.akhir_jabatan);
                }
            });
        });


        //AJAX HAPUS DATA
        $(document).on('click', '.delete_data', function(e) {
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
                        url: "<?= base_url('pengaturan/hapus_pamong') ?>", // Isi dengan url/path file php yang dituju
                        data: {
                            "id_pamong": id
                        }, // data yang akan dikirim ke file yang dituju
                        dataType: "json",
                        success: function(data) { // Ketika proses pengiriman berhasil
                            if (data.response_code == 200) {
                                Swal.fire(
                                    'Terhapus',
                                    data.response_message,
                                    'success'
                                ).then((result) => {
                                    $('#tabel_pamong').empty();
                                    $('#tabel_pamong').html(data.output);
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
        $(".form-edit").on('submit', (function(event) {
            event.preventDefault();
            $('#edit-btn').html("Sedang Menyimpan...");
            $('#edit-btn').attr("disabled", true);
            $.ajax({
                url: "<?= base_url('pengaturan/update_pamong') ?>",
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,

                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('#modal_ubah').modal('hide');
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            $('#tabel_pamong').empty();
                            $('#tabel_pamong').html(e.output);
                            $('#edit-btn').html("Simpan");
                            $('#edit-btn').attr("disabled", false);
                        })

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

        // AJAX TAMBAH DATA
        $("#form-insert").on('submit', (function(event) {
            event.preventDefault();
            $('#add-btn').html("Sedang Menyimpan...");
            $('#add-btn').attr("disabled", true);
            $('#tombol-tambah').html("Sedang Menyimpan...");
            $('#tombol-tambah').attr("disabled", true);
            $.ajax({
                url: "<?= base_url('pengaturan/tambah_pamong') ?>",
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                success: function(e) { // Ketika proses pengiriman berhasil
                    if (e.response_code == 200) {
                        $('.myModal').modal('hide');
                        $("#form-insert")[0].reset();
                        $('#cekPhoto').css('background-image', 'url(<?= asset('website/img/default.png') ?>)');
                        $('select').trigger('change');
                        Swal.fire(
                            'Berhasil',
                            e.response_message,
                            'success'
                        ).then((result) => {
                            $('#tabel_pamong').empty();
                            $('#tabel_pamong').html(e.output);
                            $('#add-btn').html("Simpan");
                            $('#add-btn').attr("disabled", false);
                            $('#tombol-tambah').html("+ Tambah Perangkat");
                            $('#tombol-tambah').attr("disabled", false);
                        })

                    } else {
                        Swal.close();
                        Swal.fire("Oops", e.response_message, "error");
                        $('#add-btn').html("Simpan");
                        $('#add-btn').attr("disabled", false);
                        $('#tombol-tambah').html("+ Tambah Perangkat");
                        $('#tombol-tambah').attr("disabled", false);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    Swal.fire("Oops", xhr.responseText, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("+ Tambah Perangkat");
                    $('#tombol-tambah').attr("disabled", false);
                }
            });
        }));

    });
</script>