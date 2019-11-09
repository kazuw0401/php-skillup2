<?php

session_start();
$_SESSION = array();
$session_name = session_name();

if(isset($_COOKIE[$session_name]) === true) {
    setcookie($session_name, '', time() - 3600);
}

session_destroy();
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>セッション削除</title>
</head>
<body>
    <a href="session_set.php">戻る</a>
</body>
</html>