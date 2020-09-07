<?php

class Din15_model extends Custom_model
{
    public $table           = 'din15';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "array";

    public function __construct()
    {
        parent::__construct();      
    }
}
