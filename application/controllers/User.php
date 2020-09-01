<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Kejari_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model", "user");
    }

    public function index()
    {

        $data = [
            "SidebarType"   => "mini-sidebar",
        ];

        $this->loadViewKejari("user/index", $data);
    }

    public function getDataUser()
    {
        $data = $this->user->get_all();

        if ($data) {
            echo json_encode([
                "status"    => 200,
                "message"   => "Data ditemukan",
                "data"      => $data
            ]);
        } else {
            echo json_encode([
                "status"    => 400,
                "message"   => "Data tidak ditemukan",
                "data"      => []
            ]);
        }
    }
}
