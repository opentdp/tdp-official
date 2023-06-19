<?php

// 载入公共库

define('APP_ROOT', strtr(__DIR__, '\\', '/') . '/');
require APP_ROOT . 'library/common.php';

// 加载请求模块

$model = model($_GET['mod'] ?? 'home');
$model->output();
