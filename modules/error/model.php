<?php

class ErrorModel extends BasicModel
{
    protected $name = 'error';

    public $content = '';

    public function message($msg, ...$args)
    {
        $this->title = '提示';
        $this->content = sprintf($msg, ...$args);
        $this->output();
    }

    public function warning($msg, ...$args)
    {
        $this->title = '警告';
        $this->content = sprintf($msg, ...$args);
        $this->output();
    }
}
