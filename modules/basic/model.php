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
        if (empty($this->site)) {
            AppHelper::message('site metadata loss', 'warning');
        }
    }

    public function __call($name, $args)
    {
        AppHelper::message(sprintf('%s not found', $name), 'warning');
    }

    /**
     * 加载模块
     * @param string $name
     * @return void
     */
    public function need($name)
    {
        $version = $this->site['version'] ?: '1';
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
    public function output()
    {
        // 输出内容
        if (PHP_SAPI === 'cli') {
            exit(json_encode($this, 320));
        }
        // 输出json
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        if (stripos($accept, 'application/json') === 0) {
            header('Content-Type: application/json; charset=utf-8');
            exit(json_encode($this, 320));
        }
        // 修正标题
        if (!is_array($this->title)) {
            $this->title = (array)$this->title;
        }
        if (!empty($this->site['title'])) {
            $this->title[] = $this->site['title'];
        }
        // 加载模板
        $this->site['rewrite'] > 0 && $this->rewrite();
        $file = APP_MODULES . $this->name . '/template.php';
        is_file($file) && include($file);
        exit;
    }

    /**
     * 伪静态优化
     * @return void
     */
    public function rewrite()
    {
        ob_start(function ($html) {
            return preg_replace('/\/?index.php\?rt=/Ui', '', $html);
        });
    }
}
