<?php

class BlogsModel extends BasicModel
{
    protected $name = 'blogs';

    public $blogs = [];

    public function init()
    {
        $id = intval($_GET['id'] ?? 1);
        $this->blogs = App::storage('blogs/index');
        // 设置模板变量
        $this->title = '博文列表';
        $this->breadcrumbs = [
            ['title' => '博客', 'url' => 'index.php?rt=blogs'],
        ];
    }
}
