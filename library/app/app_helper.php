<?php

class AppHelper
{
    /**
     * 读写缓存数据
     * @param string $file
     * @param mixed $data
     * @return mixed
     */
    public static function storage($file, $data = true)
    {
        //读取数据存储
        if ($data === true) {
            return is_file($file) ? include($file) : null;
        }
        //读取有效数据
        if (is_numeric($data)) {
            $time = is_file($file) ? filemtime($file) : 0;
            return $time > $data ? self::storage($name) : false;
        }
        //写入数据存储
        $sdir = dirname($file);
        $data = var_export($data, true);
        is_dir($sdir) || mkdir($sdir, 0755, true);
        return file_put_contents($file, "<?php\nreturn {$data};\n");
    }

    /**
     * 输出提示信息
     * @param string|array $text
     * @param string $type
     * @return void
     */
    public static function message($text, $type = 'info')
    {
        echo '<html>';
        echo '<meta charset="utf-8" />';
        echo '<title>提示消息</title>';
        echo '<meta content="width=device-width,initial-scale=1.0" name="viewport" />';
        echo '<link href="assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" />';
        echo '<body>';
        echo '<div class="container p-4">';
        $text = is_array($text) ? $text : [$text];
        array_walk($text, function ($text) use ($type) {
            echo "<div class=\"alert alert-{$type}\">{$text}</div>";
        });
        echo '</div>';
        echo '</body>';
        echo '</html>';
        exit;
    }
}
