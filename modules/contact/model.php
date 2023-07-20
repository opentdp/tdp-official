<?php

class ContactModel extends BasicModel
{
    protected $name = 'contact';

    public function submit()
    {
        $file = APP_DATASET . 'contact.log';
        $data = var_export($_POST, true) . "\r\n";
        if (file_put_contents($file, $data, FILE_APPEND)) {
            App::obtain('ErrorModel')->message('ok');
        }
        App::obtain('ErrorModel')->warning('io failed');
    }
}
