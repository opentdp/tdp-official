<?php

class ErrorModel extends BasicModel
{
    protected $name = 'error';

    public $content = '';

    public function message($msg, ...$args)
    {
        $this->content = sprintf($msg, ...$args);
        $this->output();
    }

    public function warning($msg, ...$args)
    {
        $this->content = sprintf($msg, ...$args);
        $this->output();
    }
}
