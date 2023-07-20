<?php

class BasicModel
{
    protected $name = 'basic';

    protected $site = null;

    protected $title = [];
    protected $keywords = '';
    protected $description = '';

    protected $breadcrumbs = [];

    public function __construct()
    {
        $this->site = App::storage('meta');
    }

    public function __call($name, $args)
    {
        App::obtain('ErrorModel')->warning('%s not found', $name);
    }

    /**
     * 加载模块
     * @param string $name
     * @return void
     */
    public function need($name)
    {
        $version = time();
        switch (pathinfo($name, PATHINFO_EXTENSION)) {
            case 'php':
                require(APP_TEMPLATE . $name);
                break;
            case 'css':
                $v = time();
                printf('<link href="%s?t%d" rel="stylesheet">', $name, $version);
                break;
            case  'js':
                printf('<script src="%s?t%d"></script>', $name, $version);
                break;
            default:
                printf('<!--not support %s-->', $name);
                break;
        }
    }

    /**
     * 输出请求结果
     * @return void
     */
    public function output()
    {
        // 输出内容
        if (PHP_SAPI === 'cli') {
            echo json_encode($this, 320);
            exit;
        }
        // 输出JSON
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        if (stripos($accept, 'application/json') !== false) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this, 320);
            exit;
        }
        // 修正标题
        if (is_array($this->title)) {
            $this->title[] = $this->site->title;
        }
        // 加载模板
        $file = APP_MODULES . $this->name . '/template.php';
        is_file($file) && include($file);
        exit;
    }
}
