<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Cetak Surat Permohonan Pindah WNI Antar Kabupaten dalam satu Provinsi</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="mb-0 text-white">Data Daerah Asal </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= $form_action ?>" method="POST">
                            <?php
                            // include 'form-nomor-surat.php';
                            include 'form-nik-pindah.php';
                            ?>

                            <div class="card-header bg-danger">
                                <h4 class="mb-0 text-white">Data Kepindahan</h4>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="example-search-input" class="col-3 col-form-label">Alasan</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="div_alasan">
                                                <select class="select2 form-control custom-select" style="width: 100%;" name="ALASAN_PINDAH" id="ALASAN_PINDAH" required>
                                                    <option value="">Pilih Alasan</option>
                                                    <?php foreach (alasan_pindah() as $alasan) : ?>
                                                        <option value="<?= $alasan ?>"><?= $alasan ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Alamat Tujuan Pindah / RT / RW</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" value="" id="alamat" name="ALAMAT_PINDAH" placeholder="Alamat Tujuan Pindah" required>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group mb-1" style="width: 100%;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><b>RT </b></span>
                                                </div>
                                                <input type="text" class="form-control" name="NO_RT_PINDAH" id="NO_RT_PINDAH" onkeyup="validate(this)" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group mb-1" style="width: 100%;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><b>RW </b></span>
                                                </div>
                                                <input type="text" class="form-control" name="NO_RW_PINDAH" id="NO_RW_PINDAH" onkeyup="validate(this)" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Desa / Kecamatan</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="" name="DESA_PINDAH" placeholder="Desa Tujuan Pindah" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="" name="KECAMATAN_PINDAH" placeholder="Kecamatan Tujuan Pindah" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">Kabupaten / Provinsi</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="" name="KABUPATEN_PINDAH" placeholder="Kabupaten Tujuan Pindah" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="" name="PROVINSI_PINDAH" placeholder="Provinsi Tujuan Pindah" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="example-search-input" class="col-3 col-form-label">Jenis Kepindahan</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="div_alasan">
                                                <select class="select2 form-control custom-select" style="width: 100%;" name="JENIS_KEPINDAHAN" id="JENIS_KEPINDAHAN" required>
                                                    <option value="">Pilih Jenis Kepindahan</option>
                                                    <?php foreach (jenis_kepindahan() as $jenis) : ?>
                                                        <option value="<?= $jenis ?>"><?= $jenis ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="example-search-input" class="col-3 col-form-label">Status KK Bagi yg tdk pindah</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="div_alasan">
                                                <select class="select2 form-control custom-select" style="width: 100%;" name="KK_TIDAK_PINDAH" id="KK_TIDAK_PINDAH" required>
                                                    <option value="">Pilih Status KK</option>
                                                    <?php foreach (status_kk() as $kk2) : ?>
                                                        <option value="<?= $kk2 ?>"><?= $kk2 ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="example-search-input" class="col-3 col-form-label">Status KK Bagi yg pindah</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="div_alasan">
                                                <select class="select2 form-control custom-select" style="width: 100%;" name="KK_PINDAH" id="KK_PINDAH" required>
                                                    <option value="">Pilih Status KK</option>
                                                    <?php foreach (status_kk() as $kk2) : ?>
                                                        <option value="<?= $kk2 ?>"><?= $kk2 ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header bg-danger">
                                <h4 class="mb-0 text-white">Keluarga Yang Pindah (Kosongi jika tidak diperlukan)</h4>
                            </div>

                            <script src="<?= asset('website/nice/assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
                            <?php for ($index = 1; $index <= 5; $index++) : ?>
                                <div class="form-group row mt-3">
                                    <div class="col-3">
                                        <label for="example-search-input" class="col-form-label">
                                            Data Anggota Keluarga <?= $index ?>
                                            <?php if ($index == 1) : ?>
                                                <span class="text-danger">*</span>
                                            <?php endif ?>
                                        </label>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-2" style="width: 100%;">
                                                    <input class="form-control" type="text" value="" maxlength="16" onkeyup="validate(this)" aria-describedby="basic-addon1" id="NIK_<?= $index ?>" name="NIK_<?= $index ?>" placeholder="NIK Anggota Keluarga <?= $index ?>" <?= $index == 1 ? "required" : "" ?>>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info ultra-disabled" type="button" id="BTN_<?= $index ?>"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="text" value="" id="NAMA_<?= $index ?>" name="NAMA_<?= $index ?>" placeholder="Nama Lengkap" <?= $index == 1 ? "required" : "" ?>>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-control" type="date" value="" id="TGL_LHR_<?= $index ?>"" name=" TGL_LHR_<?= $index ?>" placeholder="Tanggal Lahir" <?= $index == 1 ? "required" : "" ?>>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="" id="SHDK_<?= $index ?>" name="SHDK_<?= $index ?>" placeholder="Status Hubungan Dalam Keluarga" <?= $index == 1 ? "required" : "" ?>>
                                                <small class="text-info">*
                                                    <?php foreach (SHDK() as $shdk) : ?>
                                                        <?= $shdk . ", " ?>
                                                    <?php endforeach ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $("#BTN_<?= $index ?>").click(function(e) {
                                        if ($("#NIK_<?= $index ?>").val().length != 16) {
                                            Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning");
                                        } else {
                                            $("#NIK_<?= $index ?>").attr("disabled", true);
                                            let nik_ = $("#NIK_<?= $index ?>").val();
                                            Swal.fire({
                                                title: 'Mohon Tunggu Beberapa Saat',
                                                text: 'Proses Mencari Data Pada Dindukcapil',
                                                onBeforeOpen: () => {
                                                    Swal.showLoading();
                                                    $.ajax({
                                                        type: "GET",
                                                        url: "<?= urlNik(); ?>",
                                                        data: {
                                                            "nik": nik_
                                                        },
                                                        dataType: "json",
                                                        success: function(response) {
                                                            if (response.respon_code == 1) {
                                                                let data = response.content[0];
                                                                $("#NAMA_<?= $index ?>").val(data.NAMA_LGKP);
                                                                $("#TGL_LHR_<?= $index ?>").val(data.TGL_LHR);
                                                                $("#SHDK_<?= $index ?>").val(data.STAT_HBKEL);
                                                                Swal.close();
                                                                Swal.fire("Berhasil", response.respon_message, "success");
                                                            } else {
                                                                Swal.close();
                                                                Swal.fire("Oops", response.respon_message, "error");
                                                            }
                                                            $("#NIK_<?= $index ?>").attr("disabled", false);
                                                        },
                                                        error: function(xhr, ajaxOptions, thrownError) {
                                                            Swal.fire("Oops", xhr.responseText, "error");
                                                            $("#NIK_<?= $index ?>").attr("disabled", false);
                                                        }
                                                    })
                                                }
                                            });
                                        }
                                    });
                                </script>
                            <?php endfor ?>

                            <hr>

                            <?php
                            include 'form-nomor-surat.php';
                            include 'form-button.php';
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>