<?php

class Din8_model extends Custom_model
{
    public $table           = 'din8';
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

        $this->has_one['din7'] = array(
            'foreign_model'     => 'Din7_model',
            'foreign_table'     => 'din7',
            'foreign_key'       => 'id',
            'local_key'         => 'din7_id'
        );
    }
}
