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
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$data[] = $row;
	}
	
	echo "処理が完了しました。";
  
} catch (PDOException $e) {
	print($e->getMessage());
	die();
}
var_dump($count);
var_dump($data);