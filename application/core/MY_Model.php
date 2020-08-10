<?php

class MY_Model extends CI_Model
{
    public $userData = null;
    public function __construct()
    {
        parent::__construct();
        $ses = $this->session->userdata(SESSION);
        
        // if ($ses) {
        //     $this->userData    = $this->m_data->getJoin("desa", "desa.id_desa = user.id_desa", "INNER");
        //     $this->userData    = $this->m_data->getWhere("id_user", $ses->id_user);
        //     $this->userData    = $this->m_data->getData("user")->row();
        // }        
    }
}
