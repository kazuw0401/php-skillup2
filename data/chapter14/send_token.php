<?php

function set_token() {
    $token = sha1(uniqid(mt_rand(), true));
    $_SESSION['token'] = $token;
    return $token;
}

session_start();
$token = set_token();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>トークン送信フォーム</title>
</head>
<body>
    <h1>トークン送信フォーム</h1>
    <form action="./check_token.php" method="post">
        名前：<input type="text" name="name">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="submit">
    </form>
</body>
</html>