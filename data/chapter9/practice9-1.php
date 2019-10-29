<?php

$str1 = '0120';
$str2 = '090';
// 数字4文字にマッチする正規表現
$result1 = preg_match('/^\d{4}\z/u', $str1);
$result2 = preg_match('/^\d{4}\z/u', $str2);

var_dump($result1);
var_dump($result2);