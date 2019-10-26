<?php
$dsn = 'mysql:dbname=sample;host=db;charset=utf8';
$user = 'user';
$password = 'userpass';
$id = 3;
$email = 'prepare@statement.com';

try {
	$dbh = new PDO($dsn, $user, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE user
		SET email=:email
		WHERE id = :id";
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);
	$stmt->bindValue(':email', $email, PDO::PARAM_STR);
	$stmt->execute();
	echo "処理が完了しました。";
} catch (PDOException $e) {
	print($e->getMessage());
	die();
}
