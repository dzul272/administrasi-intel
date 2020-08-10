<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geografis_desa extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadViewAdmin($this->router->fetch_class() . "/index");
    }
}
