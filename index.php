<?php

define('APP_ROOT', strtr(__DIR__, '\\', '/') . '/');
require APP_ROOT . 'library/app.php';

// 初始化
App::init(PHP_SAPI === 'cli' ? $argv : null);

// 启动应用
App::boot($_GET['mod'] ?? 'home');
