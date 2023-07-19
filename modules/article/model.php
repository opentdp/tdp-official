<?php

class ArticleModel extends BasicModel
{
    public $name = 'article';

    public $article = null;

    public function init()
    {
        $id = intval($_GET['id'] ?? 1);
        $this->article = App::storage('articles/' . $id);
        // 模板变量
        $this->title = $this->article->subject;
        $this->keywords = $this->article->tags;
        $this->description = $this->article->summary;
        $this->breadcrumbs = [
            ['title' => '文章', 'url' => 'index.php?mod=articles'],
        ];
    }
}
