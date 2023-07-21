<?php

// 路由形参

$rtkeys = ['method' => '', 'route' => '', 'target' => '', 'name' => ''];

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

foreach ((array)$index as $item) {
    foreach ($item['routes'] as $route) {
        self::$router->map($route['method'], $route['route'], function ($args) use ($route, $rtkeys) {
            $extra = array_diff_key($route, $rtkeys);
            $model = new $route['target']();
            $model->view($args + $extra);
            return $model;
        });
    }
}

// 回退路由

self::$router->map('GET', '*', function ($args) {
    $model = new ErrorModel();
    $model->warning('not found', $args);
    return $model;
});
