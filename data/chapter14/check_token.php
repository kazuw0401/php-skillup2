<?php

function check_token($token) {
    if(empty($_SESSION['token']) || ($_SESSION['token'] !== $token)) {
        echo '不正なPOSTが行われました！';
        exit;
    }
}

session_start();

$name = '';
$token = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $token = $_POST['token'];
}

check_token($token);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>トークン送信受信ページ</title>
</head>
<body>
    <h1>トークン送信受信ページ</h1>
    <p><?php echo $name; ?>さん、トークンを確認しました。</p>
</body>
</html>