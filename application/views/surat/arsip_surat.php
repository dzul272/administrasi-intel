<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Arsip Surat</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="alt_pagination" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style="width: 13%; padding: 10px">Aksi</th>
                                        <th style="padding: 10px">Kode Surat</th>
                                        <th style="padding: 10px">No Urut</th>
                                        <th style="padding: 10px">Jenis Surat</th>
                                        <th style="padding: 10px">Nama Penduduk</th>
                                        <th style="padding: 10px">Ditandatangani</th>
                                        <th style="padding: 10px">Tanggal Dibuat</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($arsip_surat as $data) : ?>
                                    <?php if(is_file(FCPATH . LOKASI_ARSIP . $namadesa . '/' . $data->namafile_surat)){?>
                                        <tr>
                                            <td style="padding: 5px" class="text-center align-middle"><?= $no++ ?></td>
                                            <td style="padding: 5px" class="text-center align-middle">
                                                <a href="<?= base_url('surat/download-arsip/' . $data->namafile_surat); ?>">
                                                    <button <?= is_file(FCPATH . LOKASI_ARSIP . $namadesa . '/' . $data->namafile_surat) ? 'title="Unduh Surat"' : 'disabled title="Tidak Ada File Surat"' ?>  class="btn btn-sm btn-info waves-effect waves-light ultra-disabled" type="button">
                                                        <span class="btn-label"><i class="mdi mdi-file-outline"></i></span> Unduh
                                                    </button>
                                                </a>
                                                <button title="Hapus Arsip" class="btn btn-sm btn-danger waves-effect waves-light delete_data" type="button" data-id="<?= $data->id_surat ?>">
                                                    <span class="btn-label"><i class="mdi mdi-delete-forever"></i></span>
                                                </button>
                                            </td>
                                            <td style="padding: 5px" class="align-middle"><?= $data->kode_tipesurat ?></td>
                                            <td style="padding: 5px" class="align-middle"><?= $data->nomor_surat ?></td>
                                            <td style="padding: 5px" class="align-middle"><?= $data->nama_tipesurat ?></td>
                                            <td style="padding: 5px" class="align-middle"><?= $data->namapeminta_surat ?></td>
                                            <td style="padding: 5px" class="align-middle"><?= $data->nama_pamong ?></td>
                                            <td style="padding: 5px" class="align-middle"><?= datetime_indo($data->created_at) ?></td>
                                        </tr>
                                    <?php } ?>
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


<script>
    $(document).ready(function() {
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
                        url: "<?= base_url('surat/hapus_arsip') ?>", // Isi dengan url/path file php yang dituju
                        data: {
                            "id_surat": id
                        }, // data yang akan dikirim ke file yang dituju
                        dataType: "json",

                        success: function(data) { // Ketika proses pengiriman berhasil
                            if (data.response_code == 200) {
                                Swal.fire(
                                    'Terhapus',
                                    data.response_message,
                                    'success'
                                ).then((result) => {
                                    window.location.href = "<?= base_url('surat/arsip') ?>";
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


    });
</script>