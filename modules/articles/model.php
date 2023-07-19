<?php

class ArticlesModel extends BasicModel
{
    public $name = 'articles';

    public $articles = [];

    public function init()
    {
        $id = intval($_GET['id'] ?? 1);
        $this->articles = App::storage('articles/index');
        // 模板变量
        $this->title = '文章列表';
        $this->breadcrumbs = [
            ['title' => '文章列表', 'url' => 'index.php?mod=articles'],
        ];
    }
}
