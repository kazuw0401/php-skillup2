<?php
// TODO: DB設定を書き出す
$dsn = "mysql:host=db;dbname=sample;";
$db = new PDO($dsn, 'user', 'userpass');

// POSTされた値
$id = $_POST['id'];
$password = $_POST['password'];

// 表示させたいものでなければhtmlspecialcharsを使う必要はない
// $postId = htmlspecialchars($_POST['postId'], ENT_QUOTES, 'UTF-8');
// $postPassword = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

// 社員データが入った配列
$users = array(
	'u0' => array(
		'id' => 0,
		'name' => '社長',
		'password' => '1234',
	),
	'u1' => array(
		'id' => 1,
		'name' => '鈴木（営業チーム）',
		'password' => '1111',
	),
	'u2' => array(
		'id' => 2,
		'name' => '高橋（経理チーム）',
		'password' => '2222',
	),
	'u3' => array(
		'id' => 3,
		'name' => '山田（営業チーム）',
		'password' => '3333',
	),
	'u4' => array(
		'id' => 4,
		'name' => '中村（経理チーム）',
		'password' => '4444',
	),
	'u5' => array(
		'id' => 5,
		'name' => '山田（総務チーム）',
		'password' => '5555',
	),
);



// タスクの配列
$tasks = array(
	'u1' => array(
		'id' => 1,
		'name' => '鈴木',
		'task' => array('A社訪問', 'B社資料送付')
	),
	'u2' => array(
		'id' => 2,
		'name' => '高橋（経理チーム）',
		'task' => array('帳簿処理', '請求書発行')
	),
	'u3' => array(
		'id' => 3,
		'name' => '山田（営業チーム）',
		'task' => array('C社訪問', 'D社資料送付', 'E社資料送付')
	),
	'u4' => array(
		'id' => 4,
		'name' => '中村（経理チーム）',
		'task' => array('請求書発行', '先月の締め')
	),
	'u5' => array(
		'id' => 5,
		'name' => '山田（総務チーム）',
		'task' => array('求人開始', '退職予定者の処理作業')
	),
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>タスク一覧</title>
</head>
<body>
	<h1>タスク一覧</h1>
	<?php


// 入力された名前とパスワードが一致してしているかを判定
foreach ($users as $key => $user) {
	if ($id == $user['id'] && $password == $user['password']) {
		if ($id == 0) { ?>
		<p><?php echo $user['name']; ?>さんのタスク</p>
		<?php
		// 社長がログインした場合、全社員のタスクを見られるよう実装
		foreach($tasks as $all_usertask) {
			echo $all_usertask['name'].'<br>';
			foreach($all_usertask['task'] as $usertask) {
				echo $usertask.'<br>';
			}
		}
		} else { ?>
			<!-- ログインした社員ごとのタスクを表示 -->
			<p><?php echo $user['name']; ?>さんのタスク</p>
			<p>タスク一覧</p>
			<?php
			// タスクを全て抽出して表示
			foreach($tasks[$key]['task'] as $task) {
				echo $task . '<br>';
			} 
		}
	}elseif($id == $user['id'] && $password != $user['password']) {
		echo 'パスワードが違います。';
	}
}
?>

</body>
</html>