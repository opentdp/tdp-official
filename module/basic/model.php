<?php

class BasicModel
{
    public $name = 'basic';

    public $title = 'basic';
    public $keywords = 'basic';
    public $description = 'basic';

    public $output = [];

    public $moddir = 'module/basic/';
    public $tpldir = 'template/';

    public function __construct($act = '')
    {
        $this->moddir = APP_ROOT . 'module/' . $this->name . '/';
        $this->tpldir = APP_ROOT . 'template/';
        $act && $this->$act();
    }

    public function tpl($name)
    {
        $file = $this->tpldir . $name;
        if (is_file($file)) {
            require $file;
        }
    }

    public function json($data)
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, 320);
    }

    public function output()
    {
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        if (stripos($accept, 'application/json') === false) {
            require $this->moddir . 'template.php';
        } else {
            $this->json();
        }
        exit;
    }
}
