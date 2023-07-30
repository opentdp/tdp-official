<?php

// 默认首页

$router->map('GET', '/', function ($args) {
    $model = new HomeModel();
    $model->view($args);
    return $model;
});

// 重建缓存

$router->map('GET', '/admin/build', function ($args) {
    $model = new AdminModel();
    $model->build($args);
    return $model;
});

// 动态路由

$index = App::cache('index');
if (is_array($index) && count($index) > 0) {
    foreach ($index as $category) {
        foreach ($category['routes'] as $route) {
            $rt = $route + ['cid' => $category['id']];
            $router->map($rt['method'], $rt['route'], function ($args) use ($rt) {
                $model = new $rt['model'](); // 初始化模型
                $model->{$rt['action']}($rt + $args);
                return $model;
            });
        }
    }
}
