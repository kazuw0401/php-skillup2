<?php
define('DSN', 'mysql:host=db;dbname=sample;charset=utf8');
define('DB_USER', 'user');
define('DB_PASSWORD', 'userpass');
define('SITE_URL', 'http://localhost:8080/trial_2nd/');

// データベースに接続する関数
function get_db_Connect() {
    try {
        $dsn = DSN;
        $user = DB_USER;
        $password = DB_PASSWORD;

        $dbh = new PDO($dsn, $user, $password);
    }catch (PDOException $e) {
        echo($e->getMessage());
        die();
    }
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}