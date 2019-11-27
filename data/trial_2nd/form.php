<?php
// 設定ファイルの読み込み
require_once('config.php');
require_once('functions.php');

session_start();

// ログイン済であればtask.phpへリダイレクト
if(!empty($_SESSION['task'])) {
    header('Location: '.SITE_URL.'/task.php');
    exit;
}

// POSTされていたらデータを取得
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = get_post('name');
    $password = get_post('password');

    $dbh = get_db_connect();
}
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
			<?php foreach($member as $name): ?>
				<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
			<?php endforeach; ?>
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