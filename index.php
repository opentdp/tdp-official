<?php

define('APP_ROOT', strtr(__DIR__, '\\', '/') . '/');
require APP_ROOT . 'module/common.php';

// 验证模块

$mod = $_GET['mod'] ?? 'home';

// 加载模块

newModel($mod)->output();
