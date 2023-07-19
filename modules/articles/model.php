<?php

class ArticlesModel extends BasicModel
{
    public $name = 'articles';
    
    public function init()
    {
        $id = intval($_GET['id'] ?? 1);
        $this->object = App::storage('articles/index');
        $this->title = '文章列表';
        $this->breadcrumbs = [
            ['title' => '文章列表', 'url' => ''],
        ];
    }
}
