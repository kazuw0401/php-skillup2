<?php
// 関数を読み込む
require_once('./functions.php');

// ここに処理の流れを書く
$dbh = get_db_connect();
$errs = [];
$data = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = get_post('name');
    $comment = get_post('comment');
    // 名前が50文字を超える場合のエラー表示
    if(!check_words($name, 50)) {
        $errs[] = 'お名前欄を修正してください。';
    }
    // コメントが200文字を超える場合のエラー表示
    if(!check_words($comment, 200)) {
        $errs[] = 'コメント欄を修正してください。';
    }
    if(count($errs) === 0) {
        $result = insert_comment($dbh, $name, $comment);
    }
}

$data = select_comments($dbh);

// ビューを読み込む
include_once('view.php');