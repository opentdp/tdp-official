<?php

class ArticleModel extends ModelBasic
{
    public $name = 'article';

    public function __construct()
    {
        parent::__construct();
        $id = $_GET['id'] ?? 1;
        $this->object = $this->md($id);
    }
}
