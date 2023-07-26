<?php

define('APP_ROOT', strtr(__DIR__, '\\', '/') . '/');

require APP_ROOT . 'library/autoload.php';
App::boot($argv[1] ?? reset($_GET));
