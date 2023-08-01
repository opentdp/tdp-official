<?php

class RuntimeModel extends BasicModel
{
    protected $name = 'runtime';

    public function build()
    {
        App::obtain('AppRuntime')->build();
        App::obtain('ErrorModel')->message('ok');
    }
}
