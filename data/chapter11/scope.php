<?php

function hello_message($name) {
    $now = date('H:i:s');
    echo 'はじめまして'.$name.'さん'.$now;

    var_dump($word);
    var_dump($now);
    var_dump($date);
}

$word = '太郎';
hello_message($word);

var_dump($word);
var_dump($now);
var_dump($date);
