<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {                 
        $this->loadViewKejari("dashboard/new");        
    }    
}
