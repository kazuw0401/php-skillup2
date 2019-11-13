<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン画面</title>
</head>
<body>
    <h1>ログイン画面</h1>
    <form action="" method="post">
        <p>メールアドレス：<input type="text" name="email"><?php echo html_escape($errs['email']); ?></p>
        <p>パスワード：<input type="password" name="password"><?php echo html_escape($errs['password']); ?></p>
        <p><input type="submit" value="ログイン"></p>
        <p><a href="signup.php">新規登録</a></p>
    </form>
</body>
</html>