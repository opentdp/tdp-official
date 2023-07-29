<?php

define('APP_ROOT', strtr(__DIR__, '\\', '/') . '/');
require APP_ROOT . 'library/autoload.php';

if (App::cache('meta') == null) {
    App::obtain('AdminModel')->build();
}

App::boot($argv[1] ?? reset($_GET));
