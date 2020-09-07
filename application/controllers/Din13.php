<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Din13 extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Din13_model", "din12");
    }

    public function index()
    {
        $data = [];
        $this->loadViewKejari("din13/index", $data);
    }
}
