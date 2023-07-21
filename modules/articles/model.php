<?php

class ArticlesModel extends BasicModel
{
    protected $name = 'articles';

    public $category = null;
    public $articles = null;

    public function view($args)
    {
        $this->get_category($args['cid']);
        $this->get_articles();
        // 设置模板变量
        $this->title = $this->category['title'];
        $this->breadcrumbs = [
            ['title' => $this->category['title'], 'url' => 'index.php?rt=/' . $this->category['id']],
        ];
    }

    protected function get_category($cid)
    {
        $this->category = App::cache($cid . '/meta');
        // 记录不存在
        if (!$this->category) {
            App::obtain('ErrorModel')->warning('%s not found', $cid);
        }
    }

    protected function get_articles()
    {
        $this->articles = App::cache($this->category['id'] . '/index');
        // 记录不存在
        if (!$this->articles) {
            App::obtain('ErrorModel')->warning('empty %s', $this->category['id']);
        }
    }
}
