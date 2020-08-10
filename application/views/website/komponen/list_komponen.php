<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-6">
                <?php $section = "";
                if ($jenisKomponen == "sambutan") : $section = "Sambutan" ?>
                <?php elseif ($jenisKomponen == "kontak-penting") : $section = "Kontak Penting" ?>
                <?php elseif ($jenisKomponen == "sosial-media") : $section = "Sosial Media" ?>
                <?php elseif ($jenisKomponen == "background-headline-artikel") : $section = "Background Headline" ?>
                <?php elseif ($jenisKomponen == "background-footer") : $section = "Background Footer" ?>
                <?php endif; ?>
                <h4 class="page-title"><?= $section ?></h4>
            </div>
            <div class="col-6">
                <?php if ($jenisKomponen == "kontak-penting") : ?>
                    <button data-toggle="modal" data-target="#tambahKontak" id="btnTambahKontak" class="btn btn-success pull-right">+ Tambah Kontak</button>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="row col-md-12">
                <div class="col-md-4">
                    <div class="card list-group">
                        <div class="card-header text-white bg-dark">
                            Jenis Konten
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url('website/konten/sambutan') ?>" style="width: 100%" class="col-md-12 list-group-item waves-effect waves-dark <?= $jenisKomponen == "sambutan" ? "active" : "text-dark" ?>">
                                Sambutan
                            </a>
                            <a href="<?= base_url('website/konten/kontak-penting') ?>" style="width: 100%" class="col-md-12 list-group-item waves-effect waves-dark <?= $jenisKomponen == "kontak-penting" ? "active" : "text-dark" ?>">
                                Kontak Penting
                            </a>
                            <a href="<?= base_url('website/konten/sosial-media') ?>" style="width: 100%" class="col-md-12 list-group-item waves-effect waves-dark <?= $jenisKomponen == "sosial-media" ? "active" : "text-dark" ?>">
                                Sosial Media
                            </a>
                            <a href="<?= base_url('website/konten/background-headline-artikel') ?>" style="width: 100%" class="col-md-12 list-group-item waves-effect waves-dark <?= $jenisKomponen == "background-headline-artikel" ? "active" : "text-dark" ?>">
                                Background Headline Artikel
                            </a>
                            <a href="<?= base_url('website/konten/background-footer') ?>" style="width: 100%" class="col-md-12 list-group-item waves-effect waves-dark <?= $jenisKomponen == "background-footer" ? "active" : "text-dark" ?>">
                                Background Footer
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card col-md-8">
                    <div class="card-body">
                        <?php if ($jenisKomponen == "sambutan") : ?>
                            <?php $this->load->view("website/komponen/sambutan") ?>
                        <?php elseif ($jenisKomponen == "kontak-penting") : ?>
                            <?php $this->load->view("website/komponen/kontak_penting") ?>
                        <?php elseif ($jenisKomponen == "sosial-media") : ?>
                            <?php $this->load->view("website/komponen/sosial_media") ?>
                        <?php elseif ($jenisKomponen == "background-headline-artikel") : ?>
                            <?php $this->load->view("website/komponen/background_headline_artikel") ?>
                        <?php elseif ($jenisKomponen == "background-footer") : ?>
                            <?php $this->load->view("website/komponen/background_footer") ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>