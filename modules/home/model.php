<?php

class HomeModel extends BasicModel
{
    protected $name = 'home';

    protected $meta = [];
    protected $about = [];
    protected $clients = [];
    protected $contact = [];
    protected $counts = [];
    protected $features = [];
    protected $hero = [];

    protected $news = [];
    protected $news_meta = [];

    protected $service = [];
    protected $service_meta = [];

    protected $team = [];
    protected $team_meta = [];

    public function view($args)
    {
        $this->meta = App::cache('home/meta');
        $this->about = App::cache('home/about');
        $this->clients = App::cache('home/clients');
        $this->contact = App::cache('home/contact');
        $this->counts = App::cache('home/counts');
        $this->features = App::cache('home/features');
        $this->hero = App::cache('home/hero');
        // 新闻动态
        $this->news = App::cache('news/index');
        $this->news_meta = App::cache('news/meta');
        // 服务项目
        $this->service = App::cache('service/index');
        $this->service_meta = App::cache('service/meta');
        // 团队成员
        $this->team = App::cache('team/index');
        $this->team_meta = App::cache('team/meta');
        // 设置模板变量
        $this->title = '官方网站';
    }
}
