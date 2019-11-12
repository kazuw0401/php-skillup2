<?php

// データベースに接続
function get_db_Connect() {
    try {
        $dsn = 'mysql:dbname=sample;host=db;charset=utf8';
        $user = 'user';
        $password = 'userpass';

        $dbh = new PDO($dsn, $user, $password);
    }catch (PDOException $e) {
        echo($e->getMessage());
        die();
    }
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}