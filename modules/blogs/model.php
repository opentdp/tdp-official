<?php

class BlogsModel extends BasicModel
{
    protected $name = 'blogs';

    public $blogs = null;

    public function view($args)
    {
        $this->get_blogs();
        // 设置模板变量
        $this->title = '博文列表';
        $this->breadcrumbs = [
            ['title' => '博客', 'url' => 'index.php?rt=/blog'],
        ];
    }

    protected function get_blogs()
    {
        $this->blogs = App::storage('blog/index');
        // 记录不存在
        if (!$this->blogs) {
            App::obtain('ErrorModel')->warning('%s not found', 'blog');
        }
    }
}
