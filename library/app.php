<?php

class App
{
    /**
     * @var Altorouter $router
     */
    static $router = null;

    /**
     * 启动指定模块
     * @param string $route
     * @return void
     */
    public static function boot($name)
    {
        self::register();
        $match = self::$router->match($name);
        call_user_func($match['target'], $match['params'])->output();
    }

    /**
     * 获取唯一实例
     * @param string $name
     * @param mixed $args
     * @return object
     */
    public static function obtain($name)
    {
        static $list = [];
        if (empty($list[$name] && class_exists($name))) {
            $list[$name] = new $name();
        }
        return $list[$name];
    }

    /**
     * 读写缓存数据
     * @param string $name
     * @param mixed $data
     * @return mixed
     */
    public static function storage($name, $data = true)
    {
        $file = APP_RUNTIME . $name . '.php';
        //读取数据存储
        if ($data === true) {
            return is_file($file) ? include($file) : array();
        }
        //读取有效数据
        if (is_numeric($data)) {
            $time = is_file($file) ? filemtime($file) : 0;
            return $time > $data ? self::storage($name) : false;
        }
        //写入数据存储
        $data = var_export($data, true);
        is_dir(dirname($file)) || mkdir(dirname($file), 0755, true);
        return file_put_contents($file, "<?php\nreturn {$data};\n");
    }

    /**
     * 自动加载函数
     * @param string $name
     * @return bool
     */
    public static function autoload($name)
    {
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
        // 找不到类文件
        (new ErrorModel())->warning('%s not found', $name);
    }

    /**
     * 注册运行环境
     * @param array $argv
     * @return void
     */
    private static function register()
    {
        // 持久存储目录
        define('APP_DATASET', APP_ROOT . 'dataset/');
        // 基础类库目录
        define('APP_LIBRARY', APP_ROOT . 'library/');
        // 应用模块目录
        define('APP_MODULES', APP_ROOT . 'modules/');
        // 运行数据目录
        define('APP_RUNTIME', APP_ROOT . 'runtime/');
        // 模板存放目录
        define('APP_TEMPLATE',  APP_ROOT . 'template/');
        // 注册自动加载函数
        spl_autoload_register('App::autoload', true, true);
        // 注册页面路由
        require(APP_MODULES . 'route.php');
        self::$router = $router;
    }
}
