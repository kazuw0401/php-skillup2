<?php
$dsn = 'mysql:dbname=sample;host=db;charset=utf8';
$user = 'user';
$password = 'userpass';

try {
	$dbh = new PDO($dsn, $user, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// 全会員の年齢の平均値を求める
	// $sql = "SELECT AVG(age) FROM user";
	// 名前に「子」がつく行だけ取得する
	// $sql = "SELECT * FROM user WHERE name LIKE '%子%'";
	// 全会員を年齢順に並べる
	$sql = "SELECT * FROM user";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$data = array();
	$count = $stmt->rowCount();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$data[] = $row;
	}

	echo "処理が完了しました。";
} catch (PDOException $e) {
	print($e->getMessage());
	die();
}
?>
<!DOCTYPE html>
<html lang="jp">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>

<body>
	<h1>会員データ一覧</h1>
	<table border="1">
		<tr>
			<th>id</th>
			<th>名前</th>
			<th>年齢</th>
			<th>メールアドレス</th>
		</tr>
		<?php foreach ($data as $row) : ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['age']; ?></td>
				<td><?php echo $row['email']; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>

</html>