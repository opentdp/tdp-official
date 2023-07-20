<?php

class ArticleModel extends BasicModel
{
    protected $name = 'article';

    public $category = null;
    public $article = null;

    public function call($name)
    {
        $this->get_category($name);
        $this->get_article(intval($_GET['id'] ?? 1));
    }

    protected function get_category($name)
    {
        $this->category = App::storage($name . '/meta');
        // 记录不存在
        if (!$this->category) {
            App::obtain('ErrorModel')->warning('%s not found', $name);
        }
        // 记录模型不匹配
        if ($this->category->model != 'article') {
            App::obtain('ErrorModel')->warning('%s model error', $name);
        }
    }

    protected function get_article($id)
    {
        $this->article = App::storage($this->category->id . '/' . $id);
        // 记录不存在
        if (!$this->article) {
            App::obtain('ErrorModel')->warning('%s not found', $id);
        }
        // 设置模板变量
        $this->title = $this->article->subject;
        $this->keywords = $this->article->tags;
        $this->description = $this->article->summary;
        $this->breadcrumbs = [
            ['title' => $this->category->title, 'url' => 'index.php?rt=articles/' . $this->category->id],
        ];
    }
}
