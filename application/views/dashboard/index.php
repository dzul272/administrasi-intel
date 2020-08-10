<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h3 class="" style="font-weight: 500">Selamat datang di Sisdes.id</h3>  
                <h5>Silahkan pilih menu di sebelah kiri untuk memilih fitur yang tersedia pada sisdes</h5>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <h4 class="" style="font-weight: 500">Unduh Profil kependudukan</h4>  
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h5>Silahkan Unduh Profil Lengkap Kependudukan</h5>
                                <button class="btn btn-secondary waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-download"></i></span>
                                <a style="color : white" target="_blank" href="https://capil.banjarnegarakab.go.id/?page_id=720">Download Profil Statistik <?= ce($this->userData->jenis_desa) ?></a>
                                </button> 
                        </div>           
                    </div>
                </div>
            </div>
            </div>
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="" style="font-weight: 500">Pemberitahuan Aplikasi</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                                <div class="col-md-12">
                                    <div >
                                        <h5>Pembaruan dan perbaikan fitur  :</h5>
                                        <ul>
                                        <li style="color:green"><i class="fas fa-exclamation-circle"></i><b> Selesai!</b> Penambahan halaman cek NIK </li>
                                        <li style="color:green"><i class="fas fa-exclamation-circle"></i><b> Selesai!</b> Penambahan  visitor Web <?= ce($this->userData->jenis_desa) ?> </li>
                                        <li style="color:green"><i class="fas fa-exclamation-circle"></i><b> Selesai!</b> Penambahan komentar pada Web <?= ce($this->userData->jenis_desa) ?> </li>
                                        <li style="color:green"><i class="fas fa-exclamation-circle"></i><b> Selesai!</b> Perbaikan minor bug, detail artikel</li>
                                        </ul>
                                        <h5>Pembaruan dan perbaikan fitur  :</h5>
                                        <ul>
                                        <li style="color:orange"><i class="fas fa-exclamation-circle"></i><b> Proses!</b> Penambahan surat pindah </li>
                                        <li style="color:orange"><i class="fas fa-exclamation-circle"></i><b> Proses!</b> Penambahan fitur anggaran <?= ce($this->userData->jenis_desa) ?> </li>
                                        </ul>
                                    </div>
                                </div>           
                            </div>    
                    </div>
                </div>
            </div>
            
            
    </div>
</div>
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <i class="mdi mdi-emoticon font-20 text-info"></i>
                                        <p class="font-14 m-b-5">Kepala Keluarga</p>
                                    </div>
                                    <div class="col-5">
                                        <h1 class="font-light text-right mb-0">23</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <i class="mdi mdi-account-multiple font-20 text-success"></i>
                                        <p class="font-14 m-b-5">Penduduk</p>
                                    </div>
                                    <div class="col-5">
                                        <h1 class="font-light text-right mb-0">169</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <i class="mdi mdi-account-multiple font-20 text-purple"></i>
                                        <p class="font-14 m-b-5">Laki-laki</p>
                                    </div>
                                    <div class="col-5">
                                        <h1 class="font-light text-right mb-0">157</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <i class="mdi mdi-account-multiple font-20 text-danger"></i>
                                        <p class="font-14 m-b-5">Perempuan</p>
                                    </div>
                                    <div class="col-5">
                                        <h1 class="font-light text-right mb-0">236</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card bg-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h4 class="card-title text-white">Jumlah Surat</h4>
                            </div>
                            <div class="ml-auto">
                                <h2 class="font-light text-white">150</h2>
                            </div>
                        </div>
                        <div class="m-t-20 m-b-10">
                            <ul class="list-style-none m-t-10">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h4 class="mb-0 font-medium text-white">80 <span class="font-normal font-14 text-white op-5 m-l-5">Surat Masuk</span></h4>
                                        </div>
                                    </div>
                                    <div class="progress m-t-10 user-progress-bg">
                                        <div class="progress-bar bg-white" role="progressbar" style="width: 58%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="150"></div>
                                    </div>
                                </li>
                                <li class="m-t-30">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h4 class="mb-0 font-medium text-white">70 <span class="font-normal font-14 text-white op-5 m-l-5">Surat Keluar</span></h4>
                                        </div>
                                    </div>
                                    <div class="progress m-t-10 user-progress-bg">
                                        <div class="progress-bar bg-white" role="progressbar" style="width: 16%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="150"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>