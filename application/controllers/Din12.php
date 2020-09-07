<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Din12 extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Din12_model", "din12");
    }

    public function index()
    {
        $data = [];
        $this->loadViewKejari("din12/index", $data);
    }
}
