<?php

// 持久存储目录

defined('APP_DATASET') ||
    define('APP_DATASET', APP_ROOT . 'dataset/');

// 基础类库目录

defined('APP_LIBRARY') ||
    define('APP_LIBRARY', APP_ROOT . 'library/');

// 应用模块目录

defined('APP_MODULES')  ||
    define('APP_MODULES', APP_ROOT . 'modules/');

// 运行数据目录

defined('APP_RUNTIME')  ||
    define('APP_RUNTIME', APP_ROOT . 'runtime/');

// 模板文件目录

defined('APP_TEMPLATE') ||
    define('APP_TEMPLATE', APP_ROOT . 'template/');

/**
 * 注册自动加载函数
 */

spl_autoload_register(function ($name) {
    $part = array_filter(preg_split('/(?=[A-Z]+)/', $name));
    // 查找模块目录
    $file = implode('/', $part);
    $file = APP_MODULES . strtolower($file) . '.php';
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
