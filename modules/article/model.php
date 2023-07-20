<?php

class ArticleModel extends BasicModel
{
    protected $name = 'article';

    public $category = null;
    public $article = null;

    public function view($args)
    {
        $this->get_category($args['cid']);
        $this->get_article($args['aid']);
        // 设置模板变量
        $this->title = $this->article->subject;
        $this->keywords = $this->article->tags;
        $this->description = $this->article->summary;
        $this->breadcrumbs = [
            ['title' => $this->category->title, 'url' => 'index.php?rt=/' . $this->category->id],
        ];
    }

    protected function get_category($cid)
    {
        $this->category = App::storage($cid . '/meta');
        // 记录不存在
        if (!$this->category) {
            App::obtain('ErrorModel')->warning('%s not found', $cid);
        }
        // 记录模型不匹配
        if ($this->category->model != 'article') {
            App::obtain('ErrorModel')->warning('%s model error', $cid);
        }
    }

    protected function get_article($aid)
    {
        $this->article = App::storage($this->category->id . '/' . $aid);
        // 记录不存在
        if (!$this->article) {
            App::obtain('ErrorModel')->warning('%s not found', $aid);
        }
    }
}
