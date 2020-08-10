<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{
    public $userData;
    public $folder_desa;
    public $dataPamong;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata(SESSION_SISDES)) {
            redirect(base_url("auth/login"));
        }
        $CI = &get_instance();
        $CI->load->model("Role_model");

        $this->userData         = $CI->m_data->getWhere("id_user", $CI->session->userdata(SESSION_SISDES)->id_user);
        $this->userData         = $CI->m_data->getJoin("desa", "desa.id_desa = user.id_desa", "LEFT");
        $this->userData         = $CI->m_data->getData("user")->row();
        $this->userData->role   = $CI->Role_model->getRole($this->userData->id_role)[0];

        $this->dataPamong       = $CI->m_data->select(["pamong.*", "jabatan.nama_jabatan"]);
        $this->dataPamong       = $CI->m_data->getWhere("pamong.id_desa", $this->userData->id_desa);
        $this->dataPamong       = $CI->m_data->getJoin("jabatan", "pamong.id_jabatan = jabatan.id_jabatan", "INNER");
        $this->dataPamong       = $CI->m_data->getData("pamong")->result();

        $nama_desa              = str_replace(" ", "_", strtolower($this->userData->nama_desa));
        $this->folder_desa      = $nama_desa;
        $lokasiArsip            = LOKASI_ARSIP . $nama_desa;
        $lokasiTemplate         = LOKASI_TEMPLATE . $nama_desa;
        $lokasiFileArtikel      = LOKASI_FILE . $nama_desa;

        //cek dan buat folder arsip
        if (!file_exists($lokasiArsip)) {
            mkdir($lokasiArsip);
        }

        //cek dan buat folder arsip
        if (!file_exists($lokasiFileArtikel)) {
            mkdir($lokasiFileArtikel);
        }

        //cek dan buat folder template
        if (!file_exists($lokasiTemplate)) {
            mkdir($lokasiTemplate);
        }

        // $lokasiDesa     = "assets/website/desa/" . $nama_desa;     
        //cek dan buat folder lokasi desa
        // if (!file_exists($lokasiDesa)) {
        //     mkdir($lokasiDesa);
        // }    

        $this->global_data["user_data"] = $this->userData;
        $this->global_data["folder_desa"] = $nama_desa;

        if (
            $this->router->fetch_class() != "dashboard"
        ) {
            if (!validasiRole($this->router->fetch_class())) {
                redirect(base_url());
            }
        }

        //! JUST FOR DEBUGGING ONLY !! RUN AT ONCE
        //TODO : UBAH JUGA DI ADMIN SISDES
        //TODO : KALO DAH DI RUN COMENT PERINTAH DI BAWAH
        //? BEGIN -----------------------------------------------------------------
        // $this->load->model("Mastersurat_model", "mastersurat");
        // $this->load->model("Tipe_surat2_model", "tipesurat2");
        // $mastersurat = $this->mastersurat->get_all();
        // foreach ($mastersurat as $ms) {
        //     $this->tipesurat2
        //         ->where(["url_tipesurat" => $ms->url_mastersurat])
        //         ->update(["id_mastersurat" => $ms->id_mastersurat]);
        // }
        //? END -------------------------------------------------------------------
    }

    protected function loadViewAdmin($view = NULL, $local_data = array(), $asData = FALSE)
    {
        if (!file_exists(APPPATH . "views/$view" . ".php")) {
            show_404();
        }
        $this->loadView("template/header", $local_data, $asData);
        $this->loadView("template/sidebar", $local_data, $asData);
        $this->loadView($view, $local_data, $asData);
        $this->loadView("template/footer", $local_data, $asData);
    }
}
