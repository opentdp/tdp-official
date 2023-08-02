<?php

class RuntimeModel extends BasicModel
{
    protected $name = 'runtime';

    public function build()
    {
        App::obtain('AppRuntime')->build();
        App::obtain('ErrorModel')->redirect('/')->message('缓存重建成功');
    }
}
