<?php
// 出力前に特殊文字を変換
function html_escape($word) {
    return htmlspecialchars($word, ENT_QUOTES, 'UTF-8');
}

// postデータを取得
function get_post($key) {
    if(isset($_POST[$key])) {
        $var = trim($_POST[$key]);
        return $var;
    }
}

// 文字列の長さをチェック
function check_words($word, $length) {
    if(mb_strlen($word) === 0) {
        return FALSE;
    }elseif(mb_strlen($word) > $length) {
        return FALSE;
    }else {
        return TRUE;
    }
}

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

// コメントを書き込む
function insert_comment($dbh, $name, $comment) {
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO board(name, comment, created) VALUE(:name, :comment, '{$date}')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    if(!$stmt->execute()) {
        return 'データの書き込みに失敗しました。';
    }
}

// 全コメントデータを取得
function select_comments($dbh) {
    $data = [];
        $sql = "SELECT name, comment, created FROM board";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
}