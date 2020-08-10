<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5">
                <h4 class="page-title">Laporan Mudik</h4>
            </div>
            <div class="col-7">
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button type="button" class="btn waves-effect waves-light btn-info" style="width: 180px;" data-toggle="modal" data-target="#formatHimbauan" id="tombol-tambah">Format Himbauan</button>
                        <a href="<?= base_url("layanan/export-laporan-mudik/") ?>" class="btn waves-effect waves-light btn-danger" style="width: 150px;">Export Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <!-- MODAL Simpan HIMBAUAN -->
        <div class="modal fade myModal" id="formatHimbauan" tabindex="-1" role="dialog" aria-labelledby="tambahPengguna">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Ubah Format Himbauan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-himbauan" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Silahkan gunakan format di bawah ini untuk format dinamis</label>
                                <table class="table table-striped table-bordered display" style="width:100%">
                                    <tr>
                                        <th style="width: 30%; padding: 5px;">Format</th>
                                        <th style="width: 70%; padding: 5px;">Isi</th>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px;"><code>{nama_desa}</code></th>
                                        <td style="padding: 5px;"><?= ce($this->userData->jenis_desa . " " . $this->userData->nama_desa) ?></th>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px;"><code>{nama}</code></th>
                                        <td style="padding: 5px;">Nama Pelapor</th>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Format Himbauan <span class="text-danger">*</span></label>
                                <textarea type="text" rows="10" class="form-control" name="format_himbauan" id="format_himbauan" required><?= $laporan_format->isi_format ?></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button id="add-btn" type="submit" class="btn btn-success ultra-disabled">Simpan</button>
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

        <!-- tabel surat laporan mudik -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style="width: 20%; padding: 10px;">Nama & Umur</th>
                                        <th style="width: 20%; padding: 10px;">Alamat</th>
                                        <th style="width: 20%; padding: 10px;">Asal & Waktu Kedatangan</th>
                                        <th style="width: 15%; padding: 10px;">Keluhan</th>
                                        <th style="width: 10%; padding: 10px;">No Hp</th>
                                        <th style="width: 10%; padding: 10px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-user">
                                    <?php if ($laporan_mudik) : ?>
                                        <?php $no = 1;
                                        foreach ($laporan_mudik as $data) : ?>
                                            <?php
                                            $list = array(
                                                "{nama_desa}"   => ce($this->userData->jenis_desa . " " . $this->userData->nama_desa),
                                                "{nama}"        => ce($data->nama_lapormudik)
                                            );

                                            $himbauan = str_ireplace(array_keys($list), array_values($list), $laporan_format->isi_format);
                                            $himbauan = urlencode($himbauan);

                                            $urlHimbauan = "https://wa.me/";
                                            $urlHimbauan .= $data->nohp_lapormudik . "?text=";
                                            $urlHimbauan .= $himbauan;

                                            ?>
                                            <tr>
                                                <td style="padding: 5px;" class="align-middle text-center"><?= $no++ ?></td>
                                                <td style="padding: 5px;" class="align-middle"><?= $data->nama_lapormudik ?> (<?= $data->umur_lapormudik ?> Th)</td>
                                                <td style="padding: 5px;" class="align-middle"><?= $data->alamat_lapormudik ?></td>
                                                <td style="padding: 5px;" class="align-middle"><?= $data->asal_lapormudik ?> <br> (<?= longdate_indo($data->tanggalsampai_lapormudik) ?>)</td>
                                                <td style="padding: 5px;" class="align-middle"><?= $data->keluhan_lapormudik ?></td>
                                                <td style="padding: 5px;" class="align-middle"><?= $data->nohp_lapormudik ?></td>
                                                <td style="padding: 5px;" class="align-middle text-center">
                                                    <a href="<?= $urlHimbauan ?>" target="_blank" class="btn btn-sm btn-success waves-effect waves-light" type="button">Kirim Himbauan</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
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
    $("#form-himbauan").on('submit', (function(event) {
        event.preventDefault();
        $('#add-btn').html("Sedang Menyimpan...");
        $('#add-btn').attr("disabled", true);
        $('#tombol-tambah').html("Sedang Menyimpan...");
        $('#tombol-tambah').attr("disabled", true);
        $.ajax({
            url: "<?= base_url('layanan/proses_ubah_format_himbauan') ?>",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function(e) {
                if (e.response_code == 200) {
                    $('.myModal').modal('hide');
                    $("#form-himbauan")[0].reset();
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("Format Himbauan");
                    $('#tombol-tambah').attr("disabled", false);
                    Swal.fire(
                        'Berhasil',
                        e.response_message,
                        'success'
                    ).then((result) => {
                        location.reload();
                    });
                } else {
                    Swal.close();
                    Swal.fire("Oops", e.response_message, "error");
                    $('#add-btn').html("Simpan");
                    $('#add-btn').attr("disabled", false);
                    $('#tombol-tambah').html("Format Himbauan");
                    $('#tombol-tambah').attr("disabled", false);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                Swal.fire("Oops", xhr.responseText, "error");
                $('#add-btn').html("Simpan");
                $('#add-btn').attr("disabled", false);
                $('#tombol-tambah').html("Format Himbauan");
                $('#tombol-tambah').attr("disabled", false);
            }
        });
    }));
</script>