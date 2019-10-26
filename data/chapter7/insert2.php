<?php
$dsn = 'mysql:dbname=sample;host=db;charset=utf8';
$user = 'user';
$password = 'userpass';
$name = '太田美香';
$age = 32;

try {
	$dbh = new PDO($dsn, $user, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO user(
	name, age, email)
	VALUES (:name, :age, :email)";
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt->bindValue(':age', $age, PDO::PARAM_INT);
	$stmt->bindValue(':email', $email, PDO::PARAM_STR);
	$stmt->execute();
	echo "処理が完了しました。";

} catch (PDOException $e) {
	print($e->getMessage());
	die();
}
