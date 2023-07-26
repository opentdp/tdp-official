<?php

class App
{
    /**
     * 启动指定模块
     * @param string $url
     * @return void
     */
    public static function boot($url)
    {
        $router = new AppRouter();
        if (is_file(APP_MODULES . 'route.php')) {
            require APP_MODULES . 'route.php';
        }
        // 回退路由
        $router->map('GET', '*', function ($args) {
            $model = new ErrorModel($args);
            $model->warning('not found', $args);
            return $model;
        });
        // 匹配路由
        $request = $router->match($url ?: '/');
        $request['target']($request['params'])->output();
    }

    /**
     * 读写缓存数据
     * @param string $name
     * @param mixed $data
     * @return mixed
     */
    public static function cache($name, $data = true)
    {
        $file = APP_RUNTIME . 'cache/' . $name . '.php';
        return AppHelper::storage($file, $data);
    }

    /**
     * 获取唯一实例
     * @param string $name
     * @param mixed $args
     * @return object
     */
    public static function obtain($name, ...$args)
    {
        static $objs = [];
        if (empty($objs[$name])) {
            $objs[$name] = new $name(...$args);
        }
        return $objs[$name];
    }

    /**
     * 从辅助类中调用方法
     */
    public static function __callStatic($name, $args)
    {
        return AppHelper::$name(...$args);
    }
}
