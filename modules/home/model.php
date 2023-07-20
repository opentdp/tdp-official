<?php

class HomeModel extends BasicModel
{
    protected $name = 'home';

    public function view($args)
    {
        // 设置模板变量
        $this->title = '官方网站';
    }
}
