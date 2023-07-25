<?php

class BlogModel extends BasicModel
{
    protected $name = 'blog';

    public $blogs = [];
    public $blog = null;

    public function view($args)
    {
        $this->get_blogs();
        $this->get_blog($args['bid']);
        // 设置模板变量
        $this->title = $this->blog['title'];
        $this->keywords = $this->blog['tags'];
        $this->description = $this->blog['summary'];
        $this->breadcrumbs = [
            ['title' => '博客', 'url' => 'index.php?rt=/blog'],
        ];
    }

    protected function get_blogs()
    {
        $this->blogs = App::cache('blog/index');
        // 记录不存在
        if (!$this->blogs) {
            App::obtain('ErrorModel')->warning('%s not found', 'blog');
        }
    }

    protected function get_blog($bid)
    {
        $this->blog = App::cache('blog/' . $bid);
        // 记录不存在
        if (!$this->blog) {
            App::obtain('ErrorModel')->warning('%s not found', $bid);
        }
    }
}
