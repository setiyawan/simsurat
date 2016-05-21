<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'/controllers/c_controller.php';

class Akses extends C_controller
{
    public function __construct()
    {
        parent::__construct();
        define('model', 'M_akses');
        define('key', 'idakses');
    }
}

?>