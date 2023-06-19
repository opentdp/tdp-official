<?php

define('APP_DATASET', APP_ROOT . 'dataset/');
define('APP_LIBRARY', APP_ROOT . 'library/');
define('APP_MODULE', APP_ROOT . 'module/');
define('APP_TEMPLATE',  APP_ROOT . 'template/');

/**
 * 输出信息
 */

function message($text, ...$args)
{
    $model = model('error', ...$args);
    $model->ouput($text);
    exit;
}

/*
 * 初始化模块
 */

function model($name, ...$args)
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
 * 注册自动加载函数
 */

spl_autoload_register(function ($class) {
    $part = preg_split('/(?=[A-Z]+)/', $class);
    $part = array_filter($part);
    if (end($part) == 'Model') {
        $file = implode('/', $part);
        $file = APP_MODULE . strtolower($file) . '.php';
        if (is_file($file) && require($file)) {
            return true;
        }
    } else {
        $file = reset($part) . '/' . implode('_', $part);
        $file = APP_LIBRARY . strtolower($file) . '.php';
        if (is_file($file) && require($file)) {
            return true;
        }
    }
});
