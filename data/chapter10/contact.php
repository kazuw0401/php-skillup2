<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $inquiry = $_POST['inquiry'];

    $pattern = '/\A(a-z0-9_\-\+\/\?]+)';
    $pattern .= '@(a-z0-9\-]+\.)+[a-z]{2,6}\z/i';

    // POSTデータのバリデーション
    // データベースへデータを挿入
    // 確認メールを送信

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
</head>

<body>
    <h1>お問い合わせ</h1>
    <form action="" method="post">
        <label for="">お名前</label>
        <p><input type="text" name="name"></p>
        <label for="">メールアドレス</label>
        <p><input type="text" name="email"></p>
        <label for="">お問い合わせ内容</label>
        <p><textarea name="inquiry" id="" cols="30" rows="10"></textarea></p>
        <input type="submit" value="">
    </form>
</body>

</html>