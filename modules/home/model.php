<?php

class HomeModel extends BasicModel
{
    protected $name = 'home';

    protected $news = [];
    protected $news_meta = [];

    protected $service = [];
    protected $service_meta = [];

    public function view($args)
    {
        $this->news = App::cache('news/index');
        $this->news_meta = App::cache('news/meta');
        $this->service = App::cache('service/index');
        $this->service_meta = App::cache('service/meta');
        // 设置模板变量
        $this->title = '官方网站';
    }
}
