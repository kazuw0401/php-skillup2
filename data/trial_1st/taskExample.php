<?php

$users = array(
    'admin' => array(
        'id' => 0,
        'name' => '社長',
        'team' => '社長',
        'pass' => '1234'
    ),
    'user1' => array(
        'id' => 1,
        'name' => '鈴木',
        'team' => '営業',
        'pass' => '1111'
    ),
    'user2' => array(
        'id' => 2,
        'name' => '高橋',
        'team' => '経理',
        'pass' => '2222'
    ),
    'user3' => array(
        'id' => 3,
        'name' => '山田',
        'team' => '営業',
        'pass' => '3333'
    ),
    'user4' => array(
        'id' => 4,
        'name' => '中村',
        'team' => '経理',
        'pass' => '4444'
    ),
    'user5' => array(
        'id' => 5,
        'name' => '山田',
        'team' => '総務',
        'pass' => '5555'
    )
);

$tasks = array(
    'user1' => array(
        'name' => '鈴木',
        'team' => '営業',
        'task' => array('A社訪問','B社資料送付')
    ),
    'user2' => array(
        'name' => '高橋',
        'team' => '経理',
        'task' => array('帳簿処理','請求書発行')
    ),
    'user3' => array(
        'name' => '山田',
        'team' => '営業',
        'task' => array('C社訪問','D社資料送付','E社資料送付')
    ),
    'user4' => array(
        'name' => '中村',
        'team' => '経理',
        'task' => array('請求書発行','先月の締め')
    ),
    'user5' => array(
        'name' => '山田',
        'team' => '総務',
        'task' => array('求人開始','退職予定者の処理作業')
    )
);

$id = $_POST['id'];
$pass = $_POST['pass'];

?>

<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>業務管理システム</h1>

    <?php

    foreach($users as $key => $user){
        if($id == $user['id'] && $pass == $user['pass']) {
            if($id==0) { ?>
                <p>社員名：<?php echo $user['name'];?></p>
                <p>チーム：<?php echo $user['team'];?></p>
                <?php
                foreach($tasks as $all_usertask){
                    print $all_usertask['name'];
                    print ":";
                    print $all_usertask['team'];
                    print "<br>";
                    foreach($all_usertask['task'] as $usertask){ //ネストしすぎ！本来であればfunctionで切り出したりしよう！（６章までの内容縛りなのでこのままにしてます）
                        print $usertask;
                        print "<br>";
                    }
                }
            }else { ?>
                <p>社員名：<?php echo $user['name'];?></p>
                <p>チーム：<?php echo $user['team'];?></p>
                <p>タスク一覧</p>
                <?php
                foreach($tasks[$key]['task'] as $task){
                    print $task;
                    print "<br>";
                }
            }
        }elseif($id == $user['id'] && $pass != $user['pass']) {
            print "パスワードが違います。";
        }
    }

    ?>
    
    <!-- あくまでこれらは一例です。
    例えばform.phpに$usersを準備させて<select>でもそれを使いつつ、$usersもtask.phpに送って再利用したり、
    認証をform.php側で行ってからリダイレクトさせたり、たくさんの実装方法があります。
    それでは結局どんなコーディングがいいのか？と言われると、
    ①利用者側が求めている機能があること。
    ②コードが簡潔か？（使われていないコードがないか、関数化できないかなど）
    ③保守がしやすいこと（1ヶ月後の自分が理解できるか？）
    これが守られてるなら、そこまで神経質になる必要はありません。
    神経質にならないといけない部分がある際は必ずチームで共有されます（べきです）。 -->


</body>
</html>