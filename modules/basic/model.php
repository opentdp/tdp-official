<?php

class BasicModel
{
    public $name = 'basic';

    public $title = '';
    public $keywords = '';
    public $description = '';

    public $object = null;

    /**
     * 加载模块
     * @param string $id
     */
    public function need($id)
    {
        switch (pathinfo($id, PATHINFO_EXTENSION)) {
            case 'php':
                require APP_TEMPLATE . $id;
                break;
            case 'css':
                echo '<link href="' . $id . '" rel="stylesheet">';
                break;
            case  'js':
                echo '<script src="' . $id . '"></script>';
                break;
            default:
                echo '<!--not support ' . $id . '-->';
                break;
        }
    }

    /**
     * 输出请求结果
     * @return void
     */
    public function output()
    {
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        if (stripos($accept, 'application/json') !== false) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this->object, 320);
        } else {
            $file = APP_MODULES . $this->name . '/template.php';
            is_file($file) && include($file);
        }
        exit;
    }
}
