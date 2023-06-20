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

    public function tpl($id)
    {
        $ext = pathinfo($id, PATHINFO_EXTENSION);
        if ($ext == 'php') {
            require APP_TEMPLATE . $id;
        } elseif ($ext == 'css') {
            echo '<link href="' . $id . '" rel="stylesheet">';
        } elseif ($ext == 'js') {
            echo '<script src="' . $id . '"></script>';
        } else {
            echo '<!--not found ' . $id . '-->';
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
            is_file($tpl) && require($tpl);
        }
        exit;
    }
}
