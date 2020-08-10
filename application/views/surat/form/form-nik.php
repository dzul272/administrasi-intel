<div class="form-group row">
    <label for="example-text-input" class="col-3 col-form-label">NIK Pemohon</label>
    <div class="col-9">
        <div class="row">
            <div class="col-md-8">
                <div class="input-group mb-2" style="width: 100%;">
                    <input type="text" class="form-control" name="NIK" maxlength="16" placeholder="Masukkan Nomor Induk Pemohon" aria-label="" id="cek_nik" onkeyup="validate()" aria-describedby="basic-addon1" required>
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
    <label for="example-search-input" class="col-3 col-form-label">Nama / Jenis Kelamin</label>
    <div class="col-9">
        <div class="row">
            <div class="col-md-8">
                <input class="form-control" type="text" value="" name="NAMA_LGKP" id="nama" placeholder="Nama Lengkap" readonly required>
            </div>
            <div class="col-md-4">
                <div id="div_jk">
                    <select class="select2 form-control custom-select" style="width: 100%;" name="JENIS_KLMIN" id="jk" disabled required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                        <option value="PEREMPUAN">PEREMPUAN</option>
                    </select>
                </div>
                <input class="form-control" type="hidden" name="JENIS_KLMIN" id="jk3">
            </div>

        </div>
    </div>
</div>
<div class="form-group row">
    <label for="example-search-input" class="col-3 col-form-label">Tempat / Tanggal Lahir</label>
    <div class="col-9">
        <div class="row">
            <div class="col-md-8">
                <input class="form-control" type="text" value="" name="TMPT_LHR" id="tempat_lahir" placeholder="Tempat Lahir" readonly required>
            </div>
            <div class="col-md-4">
                <div class="input-group" style="width: 100%;">
                    <input type="text" class="form-control tgl_kelahiran" id="datepicker-autoclose2" name="TGL_LHR" placeholder="mm/dd/yyyy" disabled required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                </div>
                <input class="form-control" type="hidden" name="TGL_LHR" id="tgl_kelahiran3">
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
                    <input type="text" class="form-control" name="NO_RT" id="NO_RT" onkeyup="validate()" readonly required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group mb-1" style="width: 100%;">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>RW </b></span>
                    </div>
                    <input type="text" class="form-control" name="NO_RW" id="NO_RW" onkeyup="validate()" readonly required>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="example-search-input" class="col-3 col-form-label">Pekerjaan / Agama / Warga Negara </label>
    <div class="col-9">
        <div class="row">
            <div class="col-md-5">
                <input class="form-control" type="text" value="" name="JENIS_PKRJN" id="pekerjaan" placeholder="Pekerjaan" readonly required>
            </div>
            <div class="col-md-3">
                <div id="div_agama" class="disabled-select">
                    <select class="select2 form-control custom-select " style="width: 100%;" name="AGAMA" id="agama" disabled required>
                        <option value="">Pilih Agama</option>
                        <?php foreach (daftar_agama() as $agama) : ?>
                            <option value="<?= $agama ?>"><?= $agama; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input class="form-control" type="hidden" value="" name="AGAMA" id="agama3">
            </div>
            <div class="col-md-4">
                <div id="div_warga">
                    <select class="select2 form-control custom-select" style="width: 100%;" name="WARGA_NEGARA" id="warga_negara" disabled>
                        <!-- <option value="">Pilih Kewarganegaraan</option> -->
                        <option value="INDONESIA">WARGA NEGARA INDONESIA</option>
                        <option value="WARGA NEGARA ASING">WARGA NEGARA ASING</option>
                        <option value="DUA KEWARGANEGARAAN">DUA KEWARGANEGARAAN</option>
                    </select>
                </div>
                <input class="form-control" type="hidden" value="" name="WARGA_NEGARA" id="warga_negara3" readonly>
            </div>
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="example-search-input" class="col-3 col-form-label">Status Perkawinan / Gol. Darah </label>
    <div class="col-9">
        <div class="row">
            <div class="col-md-8">
                <div id="div_kawin">
                    <select class="select2 form-control custom-select" style="width: 100%;" name="STATUS_KAWIN" id="status_kawin" disabled required>
                        <option value="">Pilih Status Perkawinan</option>
                        <option value="KAWIN">SUDAH KAWIN</option>
                        <option value="BELUM KAWIN">BELUM KAWIN</option>
                    </select>
                </div>

                <input class="form-control" type="hidden" value="" name="STATUS_KAWIN" id="status_kawin3">
            </div>
            <div class="col-md-4">
                <div id="div_goldar">
                    <select class="select2 form-control custom-select" style="width: 100%;" name="GOL_DARAH" id="gol_darah" disabled>
                        <option value="">Pilih Golongan Darah</option>
                        <?php foreach (daftar_goldar() as $goldar) : ?>
                            <option value="<?= $goldar ?>"><?= $goldar ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="content" id="content">
                <input class="form-control" type="hidden" value="" name="GOL_DARAH" id="gol_darah3">

                <!-- TAMBAHAN BY RAFLY -->
                <input type="hidden" name="NO_KK" id="NO_KK">
                <input type="hidden" name="STAT_HBKEL" id="STAT_HBKEL">
                <input type="hidden" name="PDDK_AKH" id="PDDK_AKH">
                <input type="hidden" name="NAMA_LGKP_IBU" id="NAMA_LGKP_IBU">
                <input type="hidden" name="NAMA_LGKP_AYAH" id="NAMA_LGKP_AYAH">
                <input type="hidden" name="NO_AKTA_LHR" id="NO_AKTA_LHR">
                <input type="hidden" name="TGL_KWN" id="TGL_KWN">

                <!-- END TAMBAHAN -->

            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    function manual() {
        $('form').trigger("reset");
        $("#content").val("");

        $("#nama").attr("readonly", false);
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

    function validate() {
        var element2 = document.getElementById('cek_nik');
        element2.value = element2.value.replace(/[^0-9]/, '');
        var nik_baru = document.getElementById('nik_baru');
        nik_baru.value = nik_baru.value.replace(/[^0-9]/, '');
        var rt = document.getElementById('rt');
        rt.value = rt.value.replace(/[^0-9]/, '');
        var rw = document.getElementById('rw');
        rw.value = rw.value.replace(/[^0-9]/, '');
        nort.value = nort.value.replace(/[^0-9]/, '');
        var nort = document.getElementById('NO_RT');
        norw.value = norw.value.replace(/[^0-9]/, '');
        var norw = document.getElementById('NO_RW');
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

                                $("#NO_RW").val(data.NO_RW);

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