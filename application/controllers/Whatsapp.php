<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Whatsapp extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("Whatsapp_model", "whatsapp");
    }

    public function index(){        
        $dataInput = ["response" => file_get_contents('php://input')];
        // $this->whatsapp->insert($dataInput);
        echo json_encode($_POST);
    }

    public function coba(){
        // echo json_encode($_GET);
        // echo json_encode(file_get_contents('php://input'));
        $this->whatsapp->insert(["response" => file_get_contents('php://input')]);
        print_r(["response" => file_get_contents('php://input')]);
    }
}