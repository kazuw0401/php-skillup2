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
<html lang="jp">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>社内タスク管理</title>
</head>

<body>
	<h1>社内タスク管理ツール</h1>
	<form action="./task.php" method="post">
		<p>
			お名前：
			<select name="id">
				<option value="0">社長</option>
				<option value="1">鈴木さん（営業チーム）</option>
				<option value="2">高橋さん（経理チーム）</option>
				<option value="3">山田さん（営業チーム）</option>
				<option value="4">中村さん（経理チーム）</option>
				<option value="5">山田さん（総務チーム）</option>
			</select>
		</p>
		<p>
			パスワード：<input type="password" name="password">
		</p>
		<!-- トークンを送信 -->
		<input type="hidden" name="token" value="<?php echo $token; ?>">
		<input type="submit" value="ログイン">
	</form>
</body>

</html>