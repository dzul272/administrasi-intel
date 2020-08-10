<div class="form-group row">
    <label for="example-email-input" class="col-3 col-form-label">Nomor Surat</label>
    <div class="col-6">
        <div class="input-group mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text"><b><?= $dataSurat['kode_tipesurat'] ?> / </b></span>
            </div>
            <input value="<?= $dataSurat["no_selanjutnya"] ?>" type="number" min="1" class="form-control" name="nomor_surat" id="nomor_surat" required>
            <div class="input-group-append" style="background-color: blue;">
                <span class="input-group-text"><b> / <?= $this->userData->jenis_desa == "kelurahan" ? "Kel." : "Ds." ?> <?= $user_data->nama_desa ?> / <?= bulan_romawi(date('n')) ?> / <?= date('Y') ?> </b></span>
            </div>
        </div>
        <span class="text-info"><?= "Nomor " . $dataSurat["nama_tipesurat"] . " Terakhir  adalah  <b>" . $dataSurat["no_terakhir"] . "</b>" ?></span>
    </div>
</div>

<script>
    $("#nomor_surat").keyup(function() {
        $.ajax({
            url: "<?= base_url('surat/cek-surat/' . $dataSurat['id_desa'] . '/' . $dataSurat['id_tipesurat'] . "/") ?>" + $(this).val(),
            type: "GET",
            dataType : "JSON",
            success: function(data) {                
                if(data == null){                                        
                    $("#btnSubmit").prop('disabled', false);
                    $("#textWarning").text("");
                } else {
                    $("#btnSubmit").prop('disabled', true);
                    $("#textWarning").text("Nomor Surat Sudah Terpakai. Silahkan Gunakan Nomer Surat Yang Lain");
                }
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        })
    });
</script>