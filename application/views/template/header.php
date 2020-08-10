<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Desa,SID">
    <meta name="author" content="ultranesia.com">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163988936-1"></script>
    <link rel="icon" href="<?= asset('website/img/favicon.svg') ?>" type="image/png">
    <!-- <link href="<?= asset('website/img/logo_sisdes_light.svg'); ?>" rel="icon" type="image/png" sizes="16x16"> -->
    <link href="<?= asset('website/nice/assets/libs/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= asset('website/nice/assets/libs/chartist/dist/chartist.min.css'); ?>" rel="stylesheet">
    <link href="<?= asset('website/nice/assets/extra-libs/c3/c3.min.css'); ?>" rel="stylesheet">
    <link href="<?= asset('website/nice/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css'); ?>" rel="stylesheet" />
    <link href="<?= asset('website/nice/dist/css/style.min.css'); ?>" rel="stylesheet">
    <link href="<?= asset('website/nice/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
    <link href="<?= asset('website/nice/assets/libs/daterangepicker/daterangepicker.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= asset('website/nice/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= asset('website/nice/assets/libs/magnific-popup/dist/magnific-popup.css') ?>" rel="stylesheet">
    <link href="<?= asset('website/nice/assets/libs/sweetalert2/dist/sweetalert2.min.css'); ?>" rel="stylesheet">
    <link href="<?= asset('website/nice/assets/libs/summernote/dist/summernote-bs4.css'); ?>" rel="stylesheet">
    <link href="<?= asset('website/css/animate.css'); ?>" rel="stylesheet">

    <link href="<?= asset('website/css/style-img.less'); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= asset('website/font-awesome/css/font-awesome.min.css'); ?>">
    <title><?= isset($title) ? $title . " | " : "" ?><?= $app_complete_name ?></title>

    <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->
    <script src="<?= asset('website/js-custom/jquery-1.12.4.min.js'); ?>"></script>
    <script src="<?= asset('website/js-custom/jquery-ui.js'); ?>"></script>

    <script src="<?= asset('website/nice/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= asset('website/nice/dist/js/pages/datatable/datatable-basic.init.js'); ?>"></script>

    <style type="text/css">
        [data-tip] {
            position: relative;

        }

        .ultra-disabled {
            cursor: not-allowed;
        }

        .box-foto-pamong {
            position: relative;
            max-width: 300px;
            margin: 5px auto;
        }

        .bg-foto-profil-pamong {
            width: 300px;
            height: 330px;
            position: relative;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .foto-profil-pamong {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        [data-tip]:before {
            content: '';
            /* hides the tooltip when not hovered */
            display: none;
            content: '';
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid #1a1a1a;
            position: absolute;
            top: 30px;
            left: 35px;
            z-index: 8;
            font-size: 0;
            line-height: 0;
            width: 0;
            height: 0;
        }

        [data-tip]:after {
            display: none;
            content: attr(data-tip);
            position: absolute;
            top: 35px;
            left: 0px;
            padding: 5px 8px;
            background: #1a1a1a;
            color: #fff;
            z-index: 9;
            font-size: 0.75em;
            height: 30px;
            line-height: 18px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            white-space: nowrap;
            word-wrap: normal;
        }

        [data-tip]:hover:before,
        [data-tip]:hover:after {
            display: block;
        }

        table.dataTable td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        <!-- Topbar header - style you can find in pages.scss -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand">
                        <a href="<?= base_url() ?>" class="logo">
                            <span class="logo-text">
                                <img src="<?= asset('kejari/img/logo_header.png'); ?>" style="width: 140px; height: 30px;" alt="homepage" class="dark-logo" />
                                <img src="<?= asset('kejari/img/logo_header.png'); ?>" style="width: 140px; height: 30px;" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item">                           

                        </li>
                    </ul>

                    <div class="navbar-nav float-right" style="margin-right: 5px; margin-top: 8px;">
                        <div class="mr-2 d-none d-sm-block">
                            <h4><?= $app_complete_name ?></h4>
                        </div>
                    </div>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown border-right">

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="imageProfile" width="40px" height="40px" src="<?= asset('kejari/img/logo.png'); ?>" alt="user" class="rounded-circle" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block textNamaUser">Rafli Firdausy <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img id="imageProfile2" width="50px" height="50px" src="<?= asset('kejari/img/logo.png'); ?>" alt="user" class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="mb-0" id="textNamaUser2">Nama User</h4>
                                        <p class=" mb-0">Role Aja</p>
                                    </div>
                                </div>

                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Keluar</a>

                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>