<?php
namespace web\controllers;

use core\view;
use web\resources\Aes;
class controller
{

    protected $view;

    public function __construct()
    {
        $this->view = new view();
    }

    protected function aes()
    {
        $aesKey = Aes::strToHex('1qa2ws4rf3edzxcv');
        $aesKey = Aes::hex2bin($aesKey);
        $aesIV = Aes::strToHex('dfg452ws');
        $aes = new Aes($aesKey, $aesIV, array('PKCS7' => true, 'mode' => 'cbc'));
        return $aes;
    }

    public function show()
    {

        $this->view->with('version', '版本 1.0.0 &copy; copyright by open');
        return $this->view->make('index');
    }


}