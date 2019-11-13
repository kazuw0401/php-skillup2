<?php

// データベースに接続
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

// DBへのデータ挿入前にパスワードを暗号化
function insert_member_data($dbh, $name, $email, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO members (name, email, password, created) VALUE (:name, :email, :password, '{$date}')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    if($stmt->execute()) {
        return TRUE;
    }else {
        return FALSE;
    }
}

// メールアドレスとパスワードが一致した場合、会員データを配列で返す
function select_member($dbh, $email, $password) {
    $sql = "SELECT * FROM members WHERE email = :email LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0) {
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $data['password'])) {
            return $data;
        }else {
            return FALSE;
        }
        return FALSE;
    }
}