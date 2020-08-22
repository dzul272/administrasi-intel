<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kejari_Controller extends MY_Controller
{
    public $userData;
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata(SESSION)) {
            redirect(base_url("auth/login"));
        }
        $this->load->model("Kecamatan_model", "kecamatan");
        $this->userData = $this->session->userdata(SESSION);
    }

    protected function coba()
    {
        return "waawaw";
    }

    protected function loadViewKejari($view = NULL, $local_data = array(), $asData = FALSE)
    {
        if (!file_exists(APPPATH . "views/$view" . ".php")) {
            show_404();
        }

        $this->loadView("template/header", $local_data, $asData);
        $this->loadView("template/sidebar", $local_data, $asData);
        $this->loadView($view, $local_data, $asData);
        $this->loadView("template/footer", $local_data, $asData);
    }

    protected function getKecamatan()
    {
        $idKecArray = [
            "330222",
            "330227",
            "330224",
            "330226",
            "330225",
            "330218",
            "330223",
            "330217",
            "330214",
            "330216",
            "330215",
            "330201",
            "330203",
            "330213",
            "330202",
            "330204",
        ];

        $kecamatan = $this->kecamatan
            ->where("id_kec", $idKecArray)
            ->order_by("nama", "ASC")
            ->get_all();

        return $kecamatan;
    }
}
