<?php

$str1 = '今日はくもりです。';
$str2 = '明日は快晴でしょう。';

// 行の末尾が「〜でしょう。」になっている文章を確認する正規表現
$result1 = preg_match('/でしょう。\z/u', $str1);
$result2 = preg_match('/でしょう。\z/u', $str2);

var_dump($result1);
var_dump($result2);