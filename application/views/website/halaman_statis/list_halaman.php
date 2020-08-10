<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <?php $section = "";
                if ($jenisHalaman == "profile-desa") : $section = "Profile " . ce($this->userData->jenis_desa)   ?>
                <?php elseif ($jenisHalaman == "visi-misi") : $section = "Visi Misi" ?>
                <?php endif; ?>
                <h4 class="page-title">Halaman <?= $section ?></h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="row col-md-12">
                <div class="col-md-4">
                    <div class="card list-group">
                        <div class="card-header text-white bg-dark">
                            Jenis Komponen
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url('website/halaman-statis/profile-desa') ?>" style="width: 100%" class="col-md-12 list-group-item waves-effect waves-dark <?= $jenisHalaman == "profile-desa" ? "active" : "text-dark" ?>">
                                Profile <?= ce($this->userData->jenis_desa) ?>
                            </a>
                            <a href="<?= base_url('website/halaman-statis/visi-misi') ?>" style="width: 100%" class="col-md-12 list-group-item waves-effect waves-dark <?= $jenisHalaman == "visi-misi" ? "active" : "text-dark" ?>">
                                Visi Misi
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card col-md-8">
                    <div class="card-body">
                        <?php if ($jenisHalaman == "profile-desa") : ?>
                            <?php $this->load->view("website/halaman_statis/profile_desa") ?>
                        <?php elseif ($jenisHalaman == "visi-misi") : ?>
                            <?php $this->load->view("website/halaman_statis/visi_misi") ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>