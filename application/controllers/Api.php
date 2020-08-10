<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cariNik()
    {
        echo cariNikJson();
    }
}
