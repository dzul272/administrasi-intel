<?php

class Din1_model extends Custom_model
{
    public $table           = 'din1';
    public $primary_key     = 'id';
    public $soft_deletes    = TRUE;
    public $timestamps      = TRUE;
    public $return_as       = "array";

    public function __construct()
    {
        parent::__construct();

        $this->has_one['user'] = array(
            'foreign_model'     => 'User_model',
            'foreign_table'     => 'user',
            'foreign_key'       => 'id',
            'local_key'         => 'created_by'
        );

        $this->has_one['din2s6'] = array(
            'foreign_model'     => 'Din2s6_model',
            'foreign_table'     => 'din2s6',
            'foreign_key'       => 'id',
            'local_key'         => 'din_id'
        );
    }
}
