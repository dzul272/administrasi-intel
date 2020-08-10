<!-- footer -->
</div>
<!-- TUTUP <div id="main-wrapper"> -->

<footer class="footer text-right">© Copyright 2020 <a href="https://sisdes.id" target="blank">sisdes.id v1.0.3</a>
    All Rights Reserved by <a href="https://ultranesia.com" target="blank">ultranesia.com</a> Admin Template by
    <a href="https://wrappixel.com">WrapPixel</a>.
</footer>
<!-- <div class="chat-windows"></div> -->

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script> -->
<!-- All Jquery -->
<script src="<?= asset('website/nice/assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= asset('website/nice/assets/libs/popper.js/dist/umd/popper.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- apps -->
<script src="<?= asset('website/nice/dist/js/app.min.js'); ?>"></script>


<!-- <script src="<?= asset('website/nice/dist/js/app.init.js'); ?>"></script>    -->
<script>
    $(function() {
        "use strict";
        $("#main-wrapper").AdminSettings({
            Theme: false, // this can be true or false ( true means dark and false means light ),
            Layout: 'vertical',
            LogoBg: 'skin5', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6 
            NavbarBg: 'skin6', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
            SidebarType: '<?= $SidebarType ?>', // You can change it full / mini-sidebar / iconbar / overlay
            SidebarColor: 'skin5', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
            SidebarPosition: true, // it can be true / false ( true means Fixed and false means absolute )
            HeaderPosition: true, // it can be true / false ( true means Fixed and false means absolute )
            BoxedLayout: false, // it can be true / false ( true means Boxed and false means Fluid ) 
        });
    });
</script>


<script src="<?= asset('website/nice/dist/js/app-style-switcher.js'); ?>"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= asset('website/nice/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/extra-libs/sparkline/sparkline.js'); ?>"></script>
<!--Wave Effects -->
<script src="<?= asset('website/nice/dist/js/waves.js'); ?>"></script>
<!--Menu sidebar -->
<script src="<?= asset('website/nice/dist/js/sidebarmenu.js'); ?>"></script>
<!--Custom JavaScript -->
<script src="<?= asset('website/nice/dist/js/custom.js'); ?>"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="<?= asset('website/nice/assets/libs/chartist/dist/chartist.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js'); ?>"></script>
<!--c3 charts -->
<script src="<?= asset('website/nice/assets/extra-libs/c3/d3.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/extra-libs/c3/c3.min.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/pages/dashboards/dashboard3.js'); ?>"></script>

<script src="<?= asset('website/nice/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/pages/datatable/datatable-basic.init.js'); ?>"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoliAneRffQDyA7Ul9cDk3tLe7vaU4yP8"></script>
<script src="<?= asset('website/nice/assets/libs/gmaps/gmaps.min.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/pages/maps/map-google.init.js'); ?>"></script>

<script src="<?= asset('website/nice/assets/libs/moment/moment.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/daterangepicker/daterangepicker.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>

<!-- select2 -->
<script src="<?= asset('website/nice/assets/libs/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/select2/dist/js/select2.min.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/pages/forms/select2/select2.init.js'); ?>"></script>


<script src="<?= asset('website/nice/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/magnific-popup/meg.init.js'); ?>"></script>

<script src="<?= asset('website/nice/assets/libs/sweetalert2/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/sweetalert2/sweet-alert.init.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/summernote/dist/summernote-bs4.min.js'); ?>"></script>

<script src="<?= asset('website/nice/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/pages/forms/mask/mask.init.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/extra-libs/jqbootstrapvalidation/validation.js'); ?>"></script>

<script src="<?= asset('website/nice/assets/libs/jquery-asColor/dist/jquery-asColor.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/jquery-asGradient/dist/jquery-asGradient.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js'); ?>"></script>
<script src="<?= asset('website/nice//assets/libs/@claviska/jquery-minicolors/jquery.minicolors.min.js'); ?>"></script>

<script>
    $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || '',
            format: $(this).attr('data-format') || 'hex',
            keywords: $(this).attr('data-keywords') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom left',
            swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
            change: function(value, opacity) {
                if (!value) return;
                if (opacity) value += ', ' + opacity;
                if (typeof console === 'object') {
                    console.log(value);
                }
            },
            theme: 'bootstrap'
        });

    });
</script>

<script>
    $(function() {
        $("#datepicker-autoclose11").datepicker({
            dateFormat: 'dd/mm/yy'
        });
        local = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        $('#datepicker-autoclose11').datepicker()
            .on("change", function() {
                var today = new Date($('#datepicker-autoclose11').datepicker('getDate'));
                //alert(local[today.getDay()]);
                $('#hari').val(local[today.getDay()]);
            });

    });
</script>


<script>
    jQuery('#datepicker-autoclose,#datepicker-autoclose2,#datepicker-autoclose3,#datepicker-autoclose4,#datepicker-autoclose5,#datepicker-autoclose6,#datepicker-autoclose7,#datepicker-autoclose8,#datepicker-autoclose9,#datepicker-autoclose10,#datepicker-autoclose11,#datepicker-autoclose12').datepicker({
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'dd/mm/yy'
    });
    /*******************************************/
    // Basic Date Range Picker
    /*******************************************/
    $('.daterange').daterangepicker();
    /*******************************************/
    // Date & Time
    /*******************************************/
    $('.datetime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    /*******************************************/
    //Calendars are not linked
    /*******************************************/
    $('.timeseconds').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        timePicker24Hour: true,
        timePickerSeconds: true,
        locale: {
            format: 'MM-DD-YYYY h:mm:ss'
        }
    });

    /*******************************************/
    // Single Date Range Picker
    /*******************************************/
    $('.singledate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    /*******************************************/
    // Auto Apply Date Range
    /*******************************************/
    $('.autoapply').daterangepicker({
        autoApply: true,
    });

    /*******************************************/
    // Calendars are not linked
    /*******************************************/
    $('.linkedCalendars').daterangepicker({
        linkedCalendars: false,
    });

    /*******************************************/
    // Date Limit
    /*******************************************/
    $('.dateLimit').daterangepicker({
        dateLimit: {
            days: 7
        },
    });

    /*******************************************/
    // Show Dropdowns
    /*******************************************/
    $('.showdropdowns').daterangepicker({
        showDropdowns: true,
    });

    /*******************************************/
    // Show Week Numbers
    /*******************************************/
    $('.showweeknumbers').daterangepicker({
        showWeekNumbers: true,
    });

    /*******************************************/
    // Date Ranges
    /*******************************************/
    $('.dateranges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });

    /*******************************************/
    // Always Show Calendar on Ranges
    /*******************************************/
    $('.shawCalRanges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        alwaysShowCalendars: true,
    });

    /*******************************************/
    // Top of the form-control open alignment
    /*******************************************/
    $('.drops').daterangepicker({
        drops: "up" // up/down
    });

    /*******************************************/
    // Custom button options
    /*******************************************/
    $('.buttonClass').daterangepicker({
        drops: "up",
        buttonClasses: "btn",
        applyClass: "btn-info",
        cancelClass: "btn-danger"
    });

    /*******************************************/
    // Language
    /*******************************************/
    $('.localeRange').daterangepicker({
        ranges: {
            "Aujourd'hui": [moment(), moment()],
            'Hier': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Les 7 derniers jours': [moment().subtract('days', 6), moment()],
            'Les 30 derniers jours': [moment().subtract('days', 29), moment()],
            'Ce mois-ci': [moment().startOf('month'), moment().endOf('month')],
            'le mois dernier': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        locale: {
            applyLabel: "Vers l'avant",
            cancelLabel: 'Annulation',
            startLabel: 'Date initiale',
            endLabel: 'Date limite',
            customRangeLabel: 'SÃ©lectionner une date',
            // daysOfWeek: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi'],
            daysOfWeek: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
            monthNames: ['Janvier', 'fÃ©vrier', 'Mars', 'Avril', 'ÐœÐ°i', 'Juin', 'Juillet', 'AoÃ»t', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
            firstDay: 1
        }
    });

    $('.summernote').summernote({
        placeholder: "Tulis artikel disini ...",
        height: 400, // set editor height
        minHeight: 350, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false, // set focus to editable area after initializing summernote
        callbacks: {
            onImageUpload: function(image) {
                uploadImage(image[0]);
            },
            onMediaDelete: function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        Swal.fire({
            title: 'Mohon Tunggu Beberapa Saat',
            text: 'Proses Upload Foto...',
            onBeforeOpen: () => {
                Swal.showLoading();
                $.ajax({
                    url: "<?= base_url('website/upload_foto_artikel') ?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(e) {
                        Swal.close();
                        let res = JSON.parse(e);
                        console.log(res.response_message);
                        if (res.response_code == 200) {
                            $('#summernote').summernote("insertImage", res.url);
                        } else {
                            Swal.fire("Oops", res.response_message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var err = eval("(" + xhr.responseText + ")");
                        Swal.fire("Oops", err.Message, "error");
                    }
                });
            }
        });
    }

    function deleteImage(image) {
        $.ajax({
            data: {
                image: image
            },
            type: "POST",
            url: "<?= base_url('website/hapus_foto_artikel') ?>",
            cache: false,
            success: function(response) {
                let res = JSON.parse(response);
                console.log(res.response_message);
            }
        });
    }

    <?php if (isset($artikel->isi_artikel)) : ?>
        $('#summernote').summernote('code', '<?= validasi_input_artikel($artikel->isi_artikel) ?>');
    <?php endif; ?>

    $('.summernote2').summernote({
        placeholder: "Tulis isi profile <?= ce($this->userData->jenis_desa) ?> disini ...",
        height: 400, // set editor height
        minHeight: 350, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false, // set focus to editable area after initializing summernote
        callbacks: {
            onImageUpload: function(image) {
                uploadImage2(image[0]);
            },
            onMediaDelete: function(target) {
                deleteImage2(target[0].src);
            }
        }
    });

    function uploadImage2(image) {
        var data = new FormData();
        data.append("image", image);
        Swal.fire({
            title: 'Mohon Tunggu Beberapa Saat',
            text: 'Proses Upload Foto...',
            onBeforeOpen: () => {
                Swal.showLoading();
                $.ajax({
                    url: "<?= base_url('website/upload_foto_artikel2') ?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(e) {
                        Swal.close();
                        let res = JSON.parse(e);
                        console.log(res.response_message);
                        if (res.response_code == 200) {
                            $('#summernote2').summernote("insertImage", res.url);
                        } else {
                            Swal.fire("Oops", res.response_message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire("Oops", xhr.responseText, "error");
                    }
                });
            }
        });
    }

    function deleteImage2(image) {
        $.ajax({
            data: {
                image: image
            },
            type: "POST",
            url: "<?= base_url('website/hapus_foto_artikel2') ?>",
            cache: false,
            success: function(response) {
                let res = JSON.parse(response);
                console.log(res.response_message);
            }
        });
    }

    <?php if (isset($profile->isi_halaman)) : ?>
        $(".summernote2").summernote("code", '<?= validasi_input_artikel($profile->isi_halaman) ?>');
    <?php endif; ?>

    $('.summernote3').summernote({
        placeholder: "Tulis Visi Misi disini ...",
        height: 400, // set editor height
        minHeight: 350, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false, // set focus to editable area after initializing summernote
        callbacks: {
            onImageUpload: function(image) {
                uploadImage3(image[0]);
            },
            onMediaDelete: function(target) {
                deleteImage3(target[0].src);
            }
        }
    });

    function uploadImage3(image) {
        var data = new FormData();
        data.append("image", image);
        Swal.fire({
            title: 'Mohon Tunggu Beberapa Saat',
            text: 'Proses Upload Foto...',
            onBeforeOpen: () => {
                Swal.showLoading();
                $.ajax({
                    url: "<?= base_url('website/upload_foto_artikel3') ?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(e) {
                        Swal.close();
                        let res = JSON.parse(e);
                        console.log(res.response_message);
                        if (res.response_code == 200) {
                            $('#summernote3').summernote("insertImage", res.url);
                        } else {
                            Swal.fire("Oops", res.response_message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire("Oops", xhr.responseText, "error");
                    }
                });
            }
        });
    }

    function deleteImage3(image) {
        $.ajax({
            data: {
                image: image
            },
            type: "POST",
            url: "<?= base_url('website/hapus_foto_artikel3') ?>",
            cache: false,
            success: function(response) {
                let res = JSON.parse(response);
                console.log(res.response_message);
            }
        });
    }

    <?php if (isset($visiMisi->isi_halaman)) : ?>
        $(".summernote3").summernote("code", '<?= validasi_input_artikel($visiMisi->isi_halaman) ?>');
    <?php endif; ?>
</script>
</body>

</html>