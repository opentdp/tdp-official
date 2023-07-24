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

foreach (App::cache('index') as $category) {
    foreach ($category['routes'] as $route) {
        $rt = $route + ['cid' => $category['id']];
        self::$router->map($rt['method'], $rt['route'], function ($args) use ($rt) {
            $model = new $rt['model'](); // 初始化模型
            $model->{$rt['action']}($rt + $args);
            return $model;
        });
    }
}

// 回退路由

self::$router->map('GET', '*', function ($args) {
    $model = new ErrorModel($args);
    $model->warning('not found', $args);
    return $model;
});
