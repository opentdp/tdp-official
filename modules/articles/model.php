<?php

class ArticlesModel extends BasicModel
{
    protected $name = 'articles';

    public $category = null;
    public $articles = null;

    public function call($name)
    {
        $this->get_category($name);
        $this->get_articles();
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

    protected function get_articles()
    {
        $this->articles = App::storage($this->category->id . '/index');
        // 记录不存在
        if (!$this->articles) {
            App::obtain('ErrorModel')->warning('empty %s', $this->category->id);
        }
        // 模板变量
        $this->title = $this->category->title;
        $this->breadcrumbs = [
            ['title' => $this->category->title, 'url' => 'index.php?rt=articles/' . $this->category->id],
        ];
    }
}
