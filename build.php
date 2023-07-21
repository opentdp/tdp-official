<?php

$tdpcms = 'tdpcms.phar';
$target = strtr(__DIR__, '\\', '/') . '/build/';

PHP_SAPI == 'cli' || exit('Please run in CLI mode');

is_dir($target) && exit('Please delete dir: ' . $target);
mkdir($target, 0755, true) || exit('Create dir failed: ' . $target);

///////////////////////////////////////// 开始打包 ///////////////////////// 

$phar = new Phar($target . $tdpcms, 0, $tdpcms);

$phar->startBuffering();

$phar->buildFromDirectory('./', '%^./(index|library|modules|template)%i');
$phar->setDefaultStub('index.php', 'index.php');
$phar->compressFiles(Phar::GZ);

$phar->stopBuffering();

///////////////////////////////////////// 创建入口 ///////////////////////// 

$index = <<<PHP
<?php
define('APP_DATASET', __DIR__ . './dataset/');
define('APP_RUNTIME', __DIR__ . './runtime/');
require 'phar://$tdpcms';
PHP;

file_put_contents($target . 'index.php', $index);

///////////////////////////////////////// 复制文件 ///////////////////////// 

recurse_copy('assets', $target . 'assets', '/\.map$/');
recurse_copy('dataset', $target . 'dataset', '/\.map$/');

function recurse_copy($src, $dst, $exclude = '')
{
    $dir = opendir($src);
    is_dir($dst) || mkdir($dst);
    while ($file = readdir($dir)) {
        if ($file == '.'  || $file == '..') {
            continue;
        }
        if ($exclude && preg_match($exclude, $file)) {
            echo "skip $file\n";
            continue;
        }
        if (is_dir($src . '/' . $file)) {
            recurse_copy($src . '/' . $file, $dst . '/' . $file, $exclude);
        } else {
            copy($src . '/' . $file, $dst . '/' . $file);
        }
    }
    closedir($dir);
}
