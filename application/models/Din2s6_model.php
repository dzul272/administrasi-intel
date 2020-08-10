<?php

class Din2s6_model extends Custom_model
{
    public $table           = 'din2s6';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "object";

    public function __construct()
    {
        parent::__construct();

        $this->has_one['user'] = array(
            'foreign_model'     => 'User_model',
            'foreign_table'     => 'user',
            'foreign_key'       => 'id',
            'local_key'         => 'created_by'
        );
    }
}
