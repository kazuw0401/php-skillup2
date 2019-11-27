<?php
// 設定ファイルの読み込み
require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');

session_start();

// ログインしていなければlogin.phpへリダイレクト
if(empty($_SESSION['member'])) {
    header('Location: '.SITE_URL.'login.php');
    exit;
}

$member = $_SESSION['member'];
$dbh = get_db_connect();
$members = array();

// 全会員データを取得
$members = select_members($dbh);

// 新規登録画面の読み込み
include_once('./views/member_view.php');