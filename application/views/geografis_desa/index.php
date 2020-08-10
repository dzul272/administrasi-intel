<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Pemetaan Geografis Desa</h4>
            </div>

        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Desa Karangsalam</h4>
                        <div id="map_2" class="gmaps"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="pengajuan" id="pengajuan" placeholder="Cari Pengajuan">
                            </div>
                            <div class="col-md-3">
                                <select class="form-control custom-select" name="kategori" id="kategori">
                                    <option value="">Pilih Kategori</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control custom-select" name="status_pengajuan" id="status_pengajuan">
                                    <option value="">Pengajuan Status</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn waves-effect waves-light btn-info"><i class="fa fa-search"></i> Cari Pengajuan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="media">
                                    <img class="mr-3 img-fluid w-50" src="<?= asset('website/nice/assets/images/big/img1.jpg'); ?>" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h4 class="mt-0">Lampu Mati, Dll</h4>
                                        <input class="form-control" type="text" id="pengajuan_baru" name="pengajuan_baru" placeholder="Pengajuan Baru" style="width: 400px;">
                                        <h6 class="mt-4">Lokasi : </h6>
                                        <input class="form-control" type="text" id="masalah" name="masalah" value="Masalah Sampah" style="width: 400px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>