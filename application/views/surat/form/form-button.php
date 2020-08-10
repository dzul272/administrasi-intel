<div class="form-group row">
    <label for="example-email-input" class="col-3 col-form-label">Pamong</label>
    <div class="col-9">
        <select class="select2 form-control custom-select" style="width: 100%;" name="pamong" id="pamong" required>
            <option value="">Pilih Salah Satu</option>
            <?php foreach ($pamong as $data) : ?>
                <?php if ($this->userData->jenis_desa == "kelurahan") : ?>
                    <?php $data->nama_jabatan = str_replace("desa", $this->userData->jenis_desa, strtolower($data->nama_jabatan)) ?>
                <?php endif; ?>
                <option value="<?= $data->id_pamong ?>"><?= ce($data->nama_pamong) ?> (<?= ce($data->nama_jabatan) ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="example-email-input" class="col-3 col-form-label"></label>
    <div class="col-9">
        <button id="btnSubmit" type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Cetak</button>
        <button type="button" class="btn btn-dark" onclick="history.go(-1);">batal</button>
    </div>
    <div class="col-9 offset-3 m-t-5">
        <span id="textWarning" class="text-danger"></span>
    </div>

</div>