<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Din15 extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Din15_model", "din12");
    }

    public function index()
    {
        $data = [];
        $this->loadViewKejari("din15/index", $data);
    }
}
