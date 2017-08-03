<?php
namespace web\controllers;

use core\view;

class index
{

    protected $view;

    public function __construct()
    {
        $this->view = new view();
    }

    public function show()
    {
        $this->view->with('version','版本 1.0.0 &copy; copyright by open');
        return $this->view->make('index');
    }

}