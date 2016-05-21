<?php

require_once APPPATH.'/models/m_model.php';

class M_akses extends M_model
{
	public function __construct()
    {
        parent::__construct();
        define('table', 'ta.ke_akses');
        //define('key', 'idakses');
        define('header', 'Hak Akses');
    }
}

?>