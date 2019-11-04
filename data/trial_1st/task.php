<?php

$postId = htmlspecialchars($_POST['postId'], ENT_QUOTES, 'UTF-8');
$postPassword = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

// 社員データが入った配列
$data = array(
	
	0 => array(
		'id' => 0,
		'name' => '社長',
		'password' => '1234',
	),
	1 => array(
		'id' => 1,
		'name' => '鈴木さん（営業チーム）',
		'password' => '1111',
	),
	2 => array(
		'id' => 2,
		'name' => '高橋さん（経理チーム）',
		'password' => '2222',
	),
	3 => array(
		'id' => 3,
		'name' => '山田さん（営業チーム）',
		'password' => '3333',
	),
	4 => array(
		'id' => 4,
		'name' => '中村さん（経理チーム）',
		'password' => '4444',
	),
	 5 => array(
		'id' => 5,
		'name' => '山田さん（総務チーム）',
		'password' => '5555',
	),
);

// タスクの配列を格納
$tasks = array(
	0 => array(''),
	1 => array('A社訪問', 'B社資料送付'),
	2 => array('帳簿処理', '請求書発行'),
	3 => array('C社訪問', 'D社資料送付', 'E社資料送付'),
	4 => array('請求書発行', '先月の締め'),
	5 => array('求人開始', '退職予定者の処理作業'),
);

// 入力された名前とパスワードが一致していた場合、タスクを表示
if($data[1]['id'] == $postId && $data[1]['password'] == $postPassword) { ?>
	<p><?php echo $data[1]['name']; ?>さんのタスク一覧</p>
	<?php
	foreach($tasks as $task => $value) { 
		echo $value[1].'<br>';
	}
} else {
		echo 'パスワードが違います。';
	// echo $tasks[1].'<br>';
}

// foreach($tasks as $task => $value) {
// 	echo $value;
// }


// echo $data[1]['name'].'<br>';
// echo $tasks[1][1].'<br>';