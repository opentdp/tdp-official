<?php

// 默认首页

self::$router->map('GET', '/', function ($args) {
    $model = new HomeModel();
    $model->view($args);
    return $model;
});

// 重建缓存

self::$router->map('GET', '/admin/build', function ($args) {
    $model = new AdminModel();
    $model->build($args);
    return $model;
});

// 动态路由

$index = App::cache('index');
$index = array_merge(...array_column($index, 'routes'));
$rtkey = ['method' => '', 'route' => '', 'target' => '', 'name' => ''];

foreach ($index as $route) {
    self::$router->map($route['method'], $route['route'], function ($args) use ($route, $rtkey) {
        $extra = array_diff_key($route, $rtkey);
        $model = new $route['target']();
        $model->view($args + $extra);
        return $model;
    });
}

// 回退路由

self::$router->map('GET', '*', function ($args) {
    $model = new ErrorModel();
    $model->warning('not found', $args);
    return $model;
});
