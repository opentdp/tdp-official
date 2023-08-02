<?php

class ErrorModel extends BasicModel
{
    protected $name = 'error';

    public $url = '';

    public $type = 'info';
    public $content = '';

    public function redirect($url)
    {
        $this->url = $url;
        return $this;
    }

    public function message($msg, ...$args)
    {
        $this->title = '提示';
        $this->type = 'info';
        $this->content = sprintf($msg, ...$args);
        $this->output();
    }

    public function warning($msg, ...$args)
    {
        $this->title = '警告';
        $this->type = 'warning';
        $this->content = sprintf($msg, ...$args);
        $this->output();
    }
}
