<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $inquiry = $_POST['inquiry'];

    // POSTデータのバリデーション
    $pattern = '/\A([a-z0-9_\-\+\/\?]+)';
    $pattern .= '@([a-z0-9\-]+\.)+[a-z]{2,6}\z/i';

    if (!preg_match($pattern, $email)) {
        $err = 'メールアドレスの形式が違います。';
    }

    if (!isset($err)) {
        // データベースへデータを挿入（今回はなしとのこと）
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        $subject = 'お問い合わせありがとうございます。';
        $inquiry = <<<EOM
{$name}さん、

お問い合わせ内容：
{$inquiry}
EOM;

        $headers = 'From: sender@sender.com' . "\r\n";

        // 確認メールを送信
        if (mb_send_mail($email, $subject, $inquiry, $headers) === FALSE) {
            $message = 'メール送信に成功しました';
        } else {
            $message = 'お問い合わせを受け付けました。確認メールを送信しております。';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <style>
        p.red-text {
            color: red;
        }
    </style>
</head>

<body>
    <h1>お問い合わせ</h1>
    <?php if (isset($message)) {
        echo '<p class="red-text">' . $message . '</p>';
    } ?>
    <form action="" method="post">
        <label for="">お名前</label>
        <p><input type="text" name="name"></p>
        <label for="">メールアドレス</label>
        <?php if (isset($err)) {
            echo '<p class="red-text">' . $err . '</p>';
        } ?>
        <p><input type="text" name="email"></p>
        <label for="">お問い合わせ内容</label>
        <p><textarea name="inquiry" id="" cols="30" rows="10"></textarea></p>
        <input type="submit">
    </form>
</body>

</html>