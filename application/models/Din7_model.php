<?php

class Din7_model extends Custom_model
{
    public $table           = 'din7';
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

        $this->has_one['provinsi'] = array(
            'foreign_model'     => 'Provinsi_model',
            'foreign_table'     => 'provinsi',
            'foreign_key'       => 'id_prov',
            'local_key'         => 'tempat_prov'
        );

        $this->has_one['kabupaten'] = array(
            'foreign_model'     => 'Kabupaten_model',
            'foreign_table'     => 'kabupaten',
            'foreign_key'       => 'id_kab',
            'local_key'         => 'tempat_kab'
        );

        $this->has_one['kecamatan'] = array(
            'foreign_model'     => 'Kecamatan_model',
            'foreign_table'     => 'kecamatan',
            'foreign_key'       => 'id_kec',
            'local_key'         => 'tempat_kec'
        );

        $this->has_one['kelurahan'] = array(
            'foreign_model'     => 'Kelurahan_model',
            'foreign_table'     => 'kelurahan',
            'foreign_key'       => 'id_kel',
            'local_key'         => 'tempat_kel'
        );
    }
}
