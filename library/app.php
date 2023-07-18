<?php

class App
{
    /**
     * 初始化应用
     * @param array $argv
     * @return void
     */
    public static function init($argv)
    {
        defined('APP_DATASET') || self::register($argv);
    }

    /**
     * 启动指定模块
     * @param string $name
     * @return void
     */
    public static function boot($name)
    {
        // 加载请求模块
        list($mod, $act) = explode('/', $name . '/');
        $obj = self::obtain(ucfirst($mod) . 'Model');
        // 调用模块方法
        if ($act && method_exists($obj, $act)) {
            $obj->$act();
        }
        // 输出结果
        $obj->output();
    }

    /**
     * 获取唯一实例
     * @param string $name
     * @param mixed $args
     * @return object
     */
    public static function obtain($name, ...$args)
    {
        static $list = [];
        // 创建新实例
        if (empty($models[$name])) {
            $list[$name] = new $name();
        }
        // 参数初始化
        if (method_exists($list[$name], 'init')) {
            $list[$name]->init(...$args);
        }
        // 返回唯一实例
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
        $part = preg_split('/(?=[A-Z]+)/', $name);
        $part = array_filter($part);
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
    }

    /**
     * 注册运行环境
     * @param array $argv
     * @return void
     */
    private static function register($argv)
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
        // 参数解析为 $_GET
        if (!empty($argv)) {
            parse_str(implode('&', array_slice($argv, 1)), $_GET);
        }
    }
}
