<?php

class ArticleModel extends BasicModel
{
    public $name = 'articles';

    public function __construct()
    {
    }

    public function build() {
        $dir = APP_DATASET . $this->name . '/';
    }
}
