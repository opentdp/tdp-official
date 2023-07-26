<?php

class HomeModel extends BasicModel
{
    protected $name = 'home';

    protected $news = [];
    protected $news_meta = [];

    protected $service = [];
    protected $service_meta = [];

    protected $team = [];
    protected $team_meta = [];

    public function view($args)
    {
        $this->news = App::cache('news/index');
        $this->news_meta = App::cache('news/meta');
        $this->service = App::cache('service/index');
        $this->service_meta = App::cache('service/meta');
        $this->team = App::cache('team/index');
        $this->team_meta = App::cache('team/meta');
        // 设置模板变量
        $this->title = '官方网站';
    }
}
