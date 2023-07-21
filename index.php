<?php

define('APP_ROOT', strtr(__DIR__, '\\', '/') . '/');
require APP_ROOT . 'library/autoload.php';

App::boot(
    PHP_SAPI === 'cli' ? $argv[1] : array_shift($_GET)
);
