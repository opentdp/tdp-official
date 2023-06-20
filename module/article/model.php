<?php

class ArticleModel extends BasicModel
{
    public $name = 'article';

    public function __construct()
    {
        $id = $_GET['id'] ?? 1;
        $this->object = $this->md($id);
    }
}
