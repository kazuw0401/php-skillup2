<?php

$postName = htmlspecialchars($_POST['postName'], ENT_QUOTES, 'UTF-8');


// 社員データが入った配列
$data = array(
	
	0 => array(
		'name' => '社長',
		'password' => '1234',
	),
	1 => array(
		'name' => '鈴木さん（営業チーム）',
		'password' => '1111',
	),
	2 => array(
		'name' => '高橋さん（経理チーム）',
		'password' => '2222',
	),
	3 => array(
		'name' => '山田さん（営業チーム）',
		'password' => '3333',
	),
	4 => array(
		'name' => '中村さん（経理チーム）',
		'password' => '4444',
	),
	 5 => array(
		'name' => '山田さん（総務チーム）',
		'password' => '5555',
	),
);

$tasks = array(
	0 => array(''),
	1 => array('A社訪問', 'B社資料送付'),
	2 => array('帳簿処理', '請求書発行'),
	3 => array('C社訪問', 'D社資料送付', 'E社資料送付'),
	4 => array('請求書発行', '先月の締め'),
	5 => array('求人開始', '退職予定者の処理作業'),
);

if($data['name'] == $postName) {

}


echo $data[1]['name'].'<br>';
echo $tasks[1][1].'<br>';