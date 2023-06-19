<?php

class BasicModel
{
    public $name = 'basic';

    public $title = 'basic';
    public $keywords = 'basic';
    public $description = 'basic';

    public $object = null;

    public function __construct($act = null)
    {
        $act && $this->$act();
    }

    public function tpl($n)
    {
        $ext = pathinfo($n, PATHINFO_EXTENSION);
        if ($ext == 'php') {
            require APP_TEMPLATE . $n;
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
            echo json_encode($this->object, 320);
        } else {
            require APP_MODULE . $this->name . '/template.php';
        }
        exit;
    }
}
