<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Din10 extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Din10_model", "din10");
    }

    public function index()
    {
        $data = [];
        $this->loadViewKejari("din10/index", $data);
    }
}
