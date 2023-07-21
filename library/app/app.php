<?php

class App
{
    /**
     * @var AppRouter $router
     */
    public static $router;

    /**
     * 启动指定模块
     * @param string $url
     * @return void
     */
    public static function boot($url)
    {
        // 注册页面路由器
        self::$router = new AppRouter();
        require APP_MODULES . 'route.php';
        $match = self::$router->match($url);
        call_user_func($match['target'], $match['params'])->output();
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
