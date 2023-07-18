<?php

define('APP_CACHED', APP_ROOT . 'cached/');
define('APP_DATASET', APP_ROOT . 'dataset/');
define('APP_LIBRARY', APP_ROOT . 'library/');
define('APP_MODULE', APP_ROOT . 'module/');
define('APP_TEMPLATE',  APP_ROOT . 'template/');

/*
 * 获取唯一实例
 */

function obtain($name, ...$args)
{
    static $list = [];
    if (empty($models[$name])) {
        $list[$name] = new $name(...$args);
    }
    return $list[$name];
}

/**
 * 输出错误或消息
 */

function message($msg, ...$args)
{
    $model = obtain('ErrorModel', ...$args);
    $model->ouput($msg);
}

/**
 * 注册自动加载函数
 */

spl_autoload_register(function ($class) {
    $part = preg_split('/(?=[A-Z]+)/', $class);
    $part = array_filter($part);
    // 查找模块目录
    $file = implode('/', $part);
    $file = APP_MODULE . strtolower($file) . '.php';
    if (is_file($file) && require($file)) {
        return true;
    }
    // 查找类库目录
    $file = reset($part) . '/' . implode('_', $part);
    $file = APP_LIBRARY . strtolower($file) . '.php';
    if (is_file($file) && require($file)) {
        return true;
    }
});
