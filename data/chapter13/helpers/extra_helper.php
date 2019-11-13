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

// メールアドレスの重複をチェック
function email_exists($dbh, $email) {
    $sql = "SELECT COUNT(id) FROM members where email = :email";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count['COUNT(id)'] > 0) {
        return TRUE;
    }else {
        return FALSE;
    }
}
