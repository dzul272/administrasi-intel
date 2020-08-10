<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Din1 extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {                 
        $this->loadViewKejari("din1/index");        
    }    
}
