<?php

class BlogModel extends BasicModel
{
    public $name = 'blog';

    public $blog = null;
    public $blogs = [];

    public function init()
    {
        $id = intval($_GET['id'] ?? 1);
        $this->blog = App::storage('blogs/' . $id);
        $this->blogs = App::storage('blogs/index');
        // 模板变量
        $this->title = $this->blog->subject;
        $this->keywords = $this->blog->tags;
        $this->description = $this->blog->summary;
        $this->breadcrumbs = [
            ['title' => '博客', 'url' => 'index.php?mod=blogs'],
        ];
    }
}
