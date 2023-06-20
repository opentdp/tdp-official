<?php

define('APP_ROOT', strtr(__DIR__, '\\', '/') . '/');
require APP_ROOT . 'library/boot.php';

// 加载请求模块

$mod = ucfirst($_GET['mod'] ?? 'home');
list($mod, $act) = explode('/', $mod . '/');

obtain($mod . 'Model', $act)->output();
