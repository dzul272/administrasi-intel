<?php

class Kabupaten_model extends Custom_model
{
    public $table           = 'kabupaten';
    public $primary_key     = 'id_kab';
    public $soft_deletes    = FALSE;
    public $timestamps      = FALSE;
    public $return_as       = "array";

    public function __construct()
    {
        parent::__construct();
    }
}
