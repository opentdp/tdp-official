<?php

define('APP_ROOT', strtr(__DIR__, '\\', '/') . '/');
require APP_ROOT . 'library/autoload.php';

if (App::cache('meta', time() - 86400) === null) {
    App::obtain('RuntimeModel')->build();
}

App::boot($argv[1] ?? reset($_GET));
