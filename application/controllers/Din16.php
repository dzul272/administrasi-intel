<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Din16 extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Din16_model", "din12");
    }

    public function index()
    {
        $data = [];
        $this->loadViewKejari("din16/index", $data);
    }
}
