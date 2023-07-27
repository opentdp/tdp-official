<?php

class BasicModel
{
    protected $name = 'basic';

    protected $site = [];
    protected $title = [];
    protected $keywords = '';
    protected $description = '';

    protected $breadcrumbs = [];

    public function __construct()
    {
        $this->site = App::cache('meta');
        if ($this->site['rewrite'] > 0) {
            ob_start(); // 开启输出缓冲
        }
    }

    public function __call($name, $args)
    {
        App::obtain('ErrorModel')->warning('%s not found', $name, ...$args);
    }

    /**
     * 加载模块
     * @param string $name
     * @return void
     */
    public function need($name)
    {
        $version = $this->site['version'];
        switch (pathinfo($name, PATHINFO_EXTENSION)) {
            case 'php':
                require(APP_TEMPLATE . $name);
                break;
            case 'css':
                printf('<link href="%s?v%s" rel="stylesheet">', $name, $version);
                break;
            case  'js':
                printf('<script src="%s?v%s"></script>', $name, $version);
                break;
            default:
                printf('<!--not support %s?v%s-->', $name, $version);
                break;
        }
    }

    /**
     * 输出请求结果
     * @return void
     */
    public function output($rewrite = false)
    {
        // 输出内容
        if (PHP_SAPI === 'cli') {
            exit(json_encode($this, 320));
        }
        // 输出JSON
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        if (stripos($accept, 'application/json') === 0) {
            header('Content-Type: application/json; charset=utf-8');
            exit(json_encode($this, 320));
        }
        // 修正标题
        if (!is_array($this->title)) {
            $this->title = (array)$this->title;
        }
        $this->title[] = $this->site['title'];
        // 加载模板
        $file = APP_MODULES . $this->name . '/template.php';
        is_file($file) && include($file);
        // 伪静态化
        if ($this->site['rewrite'] > 0) {
            $html = ob_get_clean();
            echo preg_replace('/\/?index.php\?rt=/Ui', '', $html);
        }
        exit;
    }
}
