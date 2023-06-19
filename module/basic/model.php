<?php

class BasicModel
{
    public $name = 'basic';

    public $title = 'basic';
    public $keywords = 'basic';
    public $description = 'basic';

    public $content = [];

    public $moddir = 'module/basic/';
    public $tpldir = 'template/';

    public function __construct($act = null)
    {
        $this->moddir = APP_ROOT . 'module/' . $this->name . '/';
        $this->tpldir = APP_ROOT . 'template/';
        $act && $this->$act();
    }

    public function tpl($n)
    {
        $ext = pathinfo($n, PATHINFO_EXTENSION);
        if ($ext == 'php') {
            require $this->tpldir . $n;
        } elseif ($ext == 'css') {
            echo '<link href="' . $n . '" rel="stylesheet">';
        } elseif ($ext == 'js') {
            echo '<script src="' . $n . '"></script>';
        } else {
            echo '<!--not found ' . $n . '-->';
        }
    }

    public function output()
    {
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        if (stripos($accept, 'application/json') !== false) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this->content, 320);
        } else {
            require $this->moddir . 'template.php';
        }
        exit;
    }
}
