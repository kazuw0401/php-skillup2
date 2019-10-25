<?php
try {
    require("mysql.php");
    $sql = "SELECT * FROM user";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result);

    $name = "お名前";
    $email = "demo@cf.commm";
    $age = "";
    $sql = "INSERT INTO user (name,email,age)VALUES(:name,:email,:age)";
    $stmt_insert = $db->prepare($sql);
    $stmt_insert->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt_insert->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt_insert->bindValue(':age', $age, PDO::PARAM_INT);

    $stmt_insert->execute();
    var_dump($stmt_insert);
    if ($stmt_insert) {
        print "成功です";
    }
    $db = null;
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}


?>

<p>データベース接続をしてみます。<br>
    <a href="localhost:4040" target="_blank">localhost:4040</a>にアクセスすると、データベースを管理できるphpMyadminが開きます.
    <br>
    user userpassでログインできます。<br>
    今はデータを管理するテーブルが一つもないので、教科書を参考にしつつuserテーブルを作り、
    idカラム,nameカラム,ageカラム,emailカラムの構造にしてください。(教科書参考)<br>
    この画面を更新してみると上手く行けばどんどん情報が追加されていきます。<br>
    データベースからの情報の取得と挿入ができいる証拠です。</p>