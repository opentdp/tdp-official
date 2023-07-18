<?php

class BasicModel
{
    public $name = 'basic';

    public $title = '';
    public $keywords = '';
    public $description = '';

    public $object = null;

    public function md($id)
    {
        $data = new stdClass();
        $file = APP_DATASET . $this->name . '/' . $id . '.md';
        if (!is_file($file)) {
            $data->content = 'not found';
            return $data;
        }
        $text = file_get_contents($file);
        $data->content = obtain('ParsedownExtraToc')->text($text);
        if (preg_match('/^#(.+)[\r\n]+/', $text, $subject)) {
            $data->subject = $subject[1];
        }
        if (preg_match_all('/\[\/\/\]: #(\w+) \((.+)\)/', $text, $prop)) {
            foreach ($prop[1] as $i => $key) {
                $data->$key = $prop[2][$i];
            }
        }
        return $data;
    }

    public function need($id)
    {
        switch (pathinfo($id, PATHINFO_EXTENSION)) {
            case 'php':
                require APP_TEMPLATE . $id;
                break;
            case 'css':
                echo '<link href="' . $id . '" rel="stylesheet">';
                break;
            case  'js':
                echo '<script src="' . $id . '"></script>';
                break;
            default:
                echo '<!--not support ' . $id . '-->';
                break;
        }
    }

    public function cache($name, $data = true)
    {
        $file = APP_RUNTIME . $name . '.php';
        //读取数据存储
        if (is_bool($data)) {
            return is_file($file) ? include($file) : array();
        }
        //写入数据存储
        if (is_array($data)) {
            $data = var_export($data, true);
            is_dir(dirname($file)) || mkdir(dirname($file), 0755, true);
            return file_put_contents($file, "<?php\nreturn {$data};\n?>");
        }
        //读取有效数据
        if (is_numeric($data)) {
            $time = is_file($file) ? filemtime($file) : 0;
            return $time > $data ? $this->cache($name) : false;
        }
    }

    public function output()
    {
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        if (stripos($accept, 'application/json') !== false) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this->object, 320);
        } else {
            $tpl = APP_MODULE . $this->name . '/template.php';
            is_file($tpl) && include($tpl);
        }
        exit;
    }
}
