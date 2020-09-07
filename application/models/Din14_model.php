<?php

class Din14_model extends Custom_model
{
    public $table           = 'din14';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "array";

    public function __construct()
    {
        parent::__construct();      
    }
}
