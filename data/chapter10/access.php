<?php

$time = date('H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];
$data = "{$time}\t{$ip}\n";

$file = @fopen('access.log', 'a') or die(',ファイルが開けませんでした。');
flock($file, LOCK_EX);
fwrite($file, $data);
flock($file, LOCK_UN);
fclose($file);

echo 'アクセスログを記録しました。';
