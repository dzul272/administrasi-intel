<?php

class Provinsi_model extends Custom_model
{
    public $table           = 'provinsi';
    public $primary_key     = 'id_prov';
    public $soft_deletes    = FALSE;
    public $timestamps      = FALSE;
    public $return_as       = "array";

    public function __construct()
    {
        parent::__construct();
    }
}
