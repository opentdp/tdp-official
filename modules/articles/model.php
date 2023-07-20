<?php

class ArticlesModel extends BasicModel
{
    protected $name = 'articles';

    public $category = null;
    public $articles = null;

    public function init()
    {
        $this->get_category();
        $this->get_articles();
    }

    protected function get_category()
    {
        $cid = $_GET['cid'] ?? '';
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

    protected function get_articles()
    {
        $this->articles = App::storage($this->category->id . '/index');
        // 记录不存在
        if (!$this->articles) {
            App::obtain('ErrorModel')->warning('empty %s', $this->category->id);
        }
        // 设置模板变量
        $this->title = $this->category->title;
        $this->breadcrumbs = [
            ['title' => $this->category->title, 'url' => 'index.php?rt=articles&cid=' . $this->category->id],
        ];
    }
}
