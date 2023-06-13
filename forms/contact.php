<?php

$file = __DIR__ . '/contact.log';
$data = var_export($_POST, true) . "\r\n";

if (file_put_contents($file, $data, FILE_APPEND)) {
  exit('OK');
}

exit('IO Failed');
