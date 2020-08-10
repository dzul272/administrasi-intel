<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kependudukan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pamong_model", "pamong");
    }

    public function index()
    {        
        redirect(base_url("kependudukan/cek-data-penduduk"));
    }

    public function cek_data_penduduk(){
        $this->loadViewAdmin("kependudukan/cek_data_penduduk");
    }

    public function data_penduduk(){
        $this->loadViewAdmin("kependudukan/data_penduduk");
    }
}
