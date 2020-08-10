<div class="form-group row">
    <label for="example-text-input" class="col-3 col-form-label">NIK Pemohon</label>
    <div class="col-9">
        <div class="row">
            <div class="col-md-8">
                <div class="input-group mb-2" style="width: 100%;">
                    <input type="text" class="form-control" name="NIK" maxlength="16" placeholder="Masukkan Nomor Induk Pemohon" aria-label="" id="cek_nik" onkeyup="validate(this)" aria-describedby="basic-addon1" required>
                    <div class="input-group-append">
                        <button class="btn btn-info ultra-disabled" id="btn_nik_umum" type="button" onclick="klik();"><i class="fa fa-search"></i> Cari NIK</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn waves-effect waves-light btn-success" style="width: 100%;" onclick="manual()">Input Manual</button>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="example-search-input" class="col-3 col-form-label">Nama Lengkap</label>
    <div class="col-9">
        <div class="row">
            <div class="col-md-12">
                <input class="form-control" type="text" value="" name="NAMA_LGKP" id="nama" placeholder="Nama Lengkap" readonly required>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="example-search-input" class="col-3 col-form-label">NO KK / Nama kepala Keluarga</label>
    <div class="col-9">
        <div class="row">
            <div class="col-md-6">
                <input class="form-control" type="text" value="" name="NO_KK" id="NO_KK" placeholder="No KK" onkeyup="validate(this)" readonly required>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" value="" name="NAMA_KK" id="NAMA_KK" placeholder="Nama Kepala Keluarga" required>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-3 col-form-label">Alamat / No RT / No RW</label>
    <div class="col-9">
        <div class="row">
            <div class="col-md-8">
                <input class="form-control" type="text" value="" id="alamat" name="ALAMAT" placeholder="Alamat Tempat Tinggal" readonly required>
            </div>
            <div class="col-md-2">
                <div class="input-group mb-1" style="width: 100%;">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>RT </b></span>
                    </div>
                    <input type="text" class="form-control" name="NO_RT" id="NO_RT" onkeyup="validate(this)" readonly required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group mb-1" style="width: 100%;">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>RW </b></span>
                    </div>
                    <input type="text" class="form-control" name="NO_RW" id="NO_RW" onkeyup="validate(this)" readonly required>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="example-search-input" class="col-3 col-form-label">Kode Pos / No Telepon</label>
    <div class="col-9">
        <div class="row">
            <div class="col-md-6">
                <input class="form-control" type="text" value="" name="KODE_POS" id="KODE_POS" placeholder="Kode Pos" onkeyup="validate(this)" required>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" value="" name="NO_TELP" id="NO_TELP" placeholder="No Telepon" onkeyup="validate(this)" required>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function manual() {
        $('form').trigger("reset");
        $("#content").val("");

        $("#nama").attr("readonly", false);
        $("#NO_KK").attr("readonly", false);
        $("#jk").attr("disabled", false);
        $("#tempat_lahir").attr("readonly", false);
        $(".tgl_kelahiran").attr("disabled", false);
        $("#alamat").attr("readonly", false);
        $("#pekerjaan").attr("readonly", false);
        $("#agama").attr("disabled", false);
        $("#warga_negara").attr("disabled", false);
        $("#status_kawin").attr("disabled", false);
        $("#gol_darah").attr("disabled", false);

        $("#NO_RT").attr("readonly", false);
        $("#NO_RW").attr("readonly", false);


        $("#jk3").attr("disabled", true);
        $("#tgl_kelahiran3").attr("disabled", true);
        $("#agama3").attr("disabled", true);
        $("#warga_negara3").attr("disabled", true);
        $("#status_kawin3").attr("disabled", true);
        $("#gol_darah3").attr("disabled", true);
        // $('#status_kawin').val('KAWIN');
        // $('#gol_darah').val('A');
        $('select').trigger('change');

    }

    function validate(e) {
        e.value = e.value.replace(/[^0-9]/, '');
    };


    function klik() {
        if ($('#cek_nik').val().length != 16) {
            Swal.fire("INFO", "Panjang NIK harus 16 karakter", "warning")
        } else {
            $("#btn_nik_umum").html("<i class='fa fa-search'></i> Sedang Mencari...");
            $("#btn_nik_umum").attr("disabled", true);
            let nik_ = $("#cek_nik").val();
            Swal.fire({
                title: 'Mohon Tunggu Beberapa Saat',
                text: 'Proses Mencari Data Pada Dindukcapil',
                // timer: 2000,
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
                                $("#content").val(JSON.stringify(data));

                                $("#nama").val(data.NAMA_LGKP);
                                $("#nama").attr("readonly", true);
                                $("#jk").val(data.JENIS_KLMIN);
                                $("#jk3").val(data.JENIS_KLMIN);
                                $("#jk3").attr("disabled", false);
                                $("#jk").attr("disabled", true);

                                $("#tempat_lahir").val(data.TMPT_LHR);
                                $("#tempat_lahir").attr("readonly", true);

                                $(".tgl_kelahiran").val(data.TGL_LHR);
                                $("#tgl_kelahiran3").val(data.TGL_LHR);
                                $(".tgl_kelahiran").attr("disabled", true);
                                $("#tgl_kelahiran3").attr("disabled", false);

                                $("#gol_darah").val(data.GOL_DARAH);
                                $("#gol_darah3").val(data.GOL_DARAH);
                                $("#gol_darah").attr("disabled", true);
                                $("#gol_darah3").attr("disabled", false);

                                $("#warga_negara").val("INDONESIA");
                                $("#warga_negara3").val("INDONESIA");
                                $("#warga_negara").attr("disabled", true);
                                $("#warga_negara3").attr("disabled", false);

                                $("#agama").val(data.AGAMA);
                                $("#agama3").val(data.AGAMA);
                                $("#agama").attr("disabled", true);
                                $("#agama3").attr("disabled", false);

                                $("#status_kawin").val(data.STATUS_KAWIN);
                                $("#status_kawin3").val(data.STATUS_KAWIN);
                                $("#status_kawin").attr("disabled", true);
                                $("#status_kawin3").attr("disabled", false);

                                $("#pekerjaan").val(data.JENIS_PKRJN);
                                $("#pekerjaan").attr("readonly", true);

                                $("#alamat").val(data.ALAMAT);
                                $("#alamat").attr("readonly", true);

                                $("#NO_RT").val(data.NO_RT);
                                $("#NO_RT").attr("readonly", true);

                                $("#NO_RW").val(data.NO_RW);
                                $("#NO_RW").attr("readonly", true);

                                $("#NO_KK").val(data.NO_KK);
                                $("#NO_KK").attr("readonly", true);

                                //KHUSUS BEDA IDENTITAS
                                $("#nik_baru").val(nik_);
                                $("#nama_baru").val(data.NAMA_LGKP);
                                $("#jk_baru").val(data.JENIS_KLMIN);
                                $("#tempat_lahir_baru").val(data.TMPT_LHR);
                                $(".tanggal_lahir_baru").val(data.TGL_LHR);
                                $("#gol_dar_baru").val(data.GOL_DARAH);
                                $("#warga_negara_baru").val("INDONESIA");
                                $("#agama_baru").val(data.AGAMA);
                                $("#status_kawin_baru").val(data.STATUS_KAWIN);
                                $("#pekerjaan_baru").val(data.JENIS_PKRJN);
                                $("#alamattinggal_baru").val(data.ALAMAT);
                                $("#rt_baru").val(data.NO_RT);
                                $("#rw_baru").val(data.NO_RW);

                                $("select").trigger('change');

                                Swal.close();
                                Swal.fire("Berhasil", response.respon_message, "success");
                                $("#btn_nik_umum").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_umum").attr("disabled", false);

                            } else {
                                Swal.close();
                                Swal.fire("Oops", response.respon_message, "error");
                                $('form').trigger("reset");
                                $("#content").val("");
                                $('select').trigger('change');
                                $("#btn_nik_umum").html("<i class='fa fa-search'></i> Cari NIK");
                                $("#btn_nik_umum").attr("disabled", false);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire("Oops", xhr.responseText, "error");
                            $("#btn_nik_umum").html("<i class='fa fa-search'></i> Cari NIK");
                            $("#btn_nik_umum").attr("disabled", false);
                        }
                    });
                }
            });
        }
    }
</script>