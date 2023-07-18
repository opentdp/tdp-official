<?php

class ArticleModel extends BasicModel
{
    public $name = 'article';

    public function __construct()
    {
        $id = intval($_GET['id'] ?? 1);
    }
}
