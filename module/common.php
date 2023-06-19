<?php

/*
 * 初始化模块
 */

function newModel($name, ...$args)
{
    static $models = [];
    if (empty($models[$name])) {
        list($mod, $act) = explode('/', $name . '/');
        $class = ucfirst($mod) . 'Model';
        $c = new $class($act, ...$args);
        $models[$name] = $c;
    }
    return $models[$name];
}

/**
 * 输出提示信息
 */

function message($text, ...$args)
{
    $model = newModel('error', ...$args);
    $model->ouput($text);
    exit;
}

/**
 * 注册自动加载函数
 */

spl_autoload_register(function ($class) {
    $part = preg_split('/(?=[A-Z])/', $class);
    $part = array_filter($part);
    if (count($part) > 1) {
        $file = strtolower(implode('/', $part));
        $file = APP_ROOT . 'module/' . $file . '.php';
        if (is_file($file) && require($file)) {
            return true;
        }
    }
    message('Class Not Found: ' . $class);
});
