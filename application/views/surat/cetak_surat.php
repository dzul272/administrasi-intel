<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Layanan Surat</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_layanan_surat" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; padding: 10px;">No</th>
                                        <th style="width: 15%; padding: 10px">Aksi</th>
                                        <th style="width: 65%; padding: 10px">Nama Surat</th>
                                        <th style="width: 15%;padding: 10px">Kode Surat</th>
                                    </tr>
                                </thead>
                                <!-- <tbody>
                                    <?php $no = 1;
                                    foreach ($tipeSurat as $data) : ?>
                                        <tr>
                                            <td style="padding: 5px" class="text-center align-middle"><?= $no++; ?></td>
                                            <td style="padding: 5px" class="text-center align-middle">
                                                <a href="<?= base_url('surat/cetak/') . $data->url_tipesurat ?>" class="btn btn-sm btn-info waves-effect waves-light" type="button">
                                                    <span class="btn-label text-white"><i class="far fa-file"></i> Buat Surat</span>
                                                </a>
                                            </td>
                                            <td style="padding: 5px" class="align-middle"><?= $data->nama_tipesurat ?></td>
                                            <td style="padding: 5px" class="align-middle"><?= $data->kode_tipesurat ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody> -->

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var table = $('#table_layanan_surat').DataTable({
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data Tidak Ditemukan",
            "info": "Menampilkan Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Oops, Data Tidak Ditemukan",
            "infoFiltered": "(di filter dari _MAX_ total data)"
        },
        "ajax": {
            "url": "<?= base_url('surat/getSurat') ?>",
            "dataSrc": "data",
        },
        "columns": [{
                data: null,
                className: "text-center align-middle",
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: "url_tipesurat",
                className: "text-center align-middle",
                render: function(data, type, row, meta) {
                    data = '<a href="<?= base_url('surat/cetak/') ?>' + data + '" class="btn btn-sm btn-info waves-effect waves-light" type="button">';
                    data += '<span class="btn-label text-white"><i class="far fa-file"></i> Buat Surat</span>';
                    data += '</a>';
                    return data;
                }
            },
            {
                data: "nama_tipesurat",
                className: "align-middle",
            },
            {
                data: "kode_tipesurat",
                className: "align-middle",
            },
        ]
    });

    $(document).ready(function() {
        setInterval(function() {
            table.ajax.reload(null, false);
        }, 3000);
    });
</script>