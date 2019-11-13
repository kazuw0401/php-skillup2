<?php
// 設定ファイルの読み込み
require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');

session_start();

// ログイン済であればmember.phpへリダイレクト
if(!empty($_SESSION['member'])) {
    header('Location: '.SITE_URL.'/member.php');
    exit;
}

// POSTされていたらデータを取得
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = get_post('email');
    $password = get_post('password');

    $dbh = get_db_connect();
    $errs = array();

    // 入力値のバリデーション
    // メールアドレス
    if(!email_exists($dbh, $email)) {
        $errs['email'] = 'メールアドレスが登録されていません。';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errs['email'] = 'メールアドレスの形式が正しくありません。';
    }elseif(!check_words($email, 200)) {
        $errs['email'] = 'メールアドレスは必須、200文字以内です。';
    }
    
    // メールアドレスとパスワードが一致するか検証する
    if(!check_words($password, 50)) {
        $errs['password'] = 'パスワードは必須、50文字以内です。';
    }elseif(!$member = select_member($dbh, $email, $password)) {
        $errs['password'] = 'パスワードとメールアドレスが正しくありません。';
    }

    // ログインする。セキュリティのため、バリデーション後にセッションIDを変更
    if(empty($errs)) {
        session_regenerate_id(true);
        $_SESSION['member'] = $member;
        header('Location: '.SITE_URL.'member.php');
        exit;
    }
}

// ログイン画面の読み込み
include_once('./views/login_view.php');