<?php

class BasicModel
{
    public $name = 'basic';

    public $title = 'basic';
    public $keywords = 'basic';
    public $description = 'basic';

    public $object = null;

    public $parsedown = null;

    public function __construct($act = null)
    {
        $act && $this->$act();
    }

    public function md($id)
    {
        $file = APP_DATASET . $this->name . '/' . $id . '.md';
        if (!is_file($file)) {
            return (object)['content' => 'not found'];
        }
        if ($this->parsedown == null) {
            $this->parsedown = new ParsedownExtraToc();
        }
        $text = file_get_contents($file);
        $data = [
            'content' => $this->parsedown->text($text),
        ];
        if (preg_match('^#(.+)[\r\n]+/', $text, $subject)) {
            $data['subject'] = $subject[1];
        }
        if (preg_match_all('/\[\/\/\]: #(\w+) \((.+)\)/', $text, $prop)) {
            $data += array_combine($prop[1], $prop[2]);
        }
        return (object)$data;
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
            require APP_MODULE . $this->name . '/template.php';
        }
        exit;
    }
}
