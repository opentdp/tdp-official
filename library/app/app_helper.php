<?php

class AppHelper
{
    /**
     * 读写缓存数据
     * @param string $name
     * @param mixed $data
     * @return mixed
     */
    public static function storage($file, $data = true)
    {
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
}
