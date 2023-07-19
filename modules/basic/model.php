<?php

class BasicModel
{
    public $name = 'basic';

    public $title = [];
    public $keywords = '';
    public $description = '';

    public $breadcrumbs = [];

    public $site = null;

    public $result = null;

    public function __construct()
    {
        if ($config = App::storage('config')) {
            $this->site = $config->site;
        }
    }

    /**
     * 加载模块
     * @param string $id
     */
    public function need($id)
    {
        $version = time();
        switch (pathinfo($id, PATHINFO_EXTENSION)) {
            case 'php':
                require APP_TEMPLATE . $id;
                break;
            case 'css':
                $v = time();
                echo '<link href="' . $id . '?t' . $version . '" rel="stylesheet">';
                break;
            case  'js':
                echo '<script src="' . $id . '?t' . $version . '"></script>';
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
        // 输出JSON
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        if (stripos($accept, 'application/json') !== false) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this->result, 320);
            exit;
        }
        // 解析数据
        is_array($this->result) && extract($this->result);
        is_array($this->title) && $this->title[] = $this->site->title;
        // 加载模板
        $file = APP_MODULES . $this->name . '/template.php';
        is_file($file) && include($file);
        exit;
    }
}
