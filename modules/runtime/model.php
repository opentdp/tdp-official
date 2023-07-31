<?php

class RuntimeModel extends BasicModel
{
    protected $name = 'runtime';

    /**
     * 重建缓存
     * @return void
     */
    public function build()
    {
        App::obtain('AppRuntime')->build();
        $this->site = App::cache('meta');
    }
}
