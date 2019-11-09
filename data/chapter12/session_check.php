<?php
session_start();
// var_dump($_SESSION);
$profile = $_SESSION['profile'];
$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>こんにちは、<?php echo $profile['user_name']; ?></p>
    <p>地域：<?php echo $profile['location']; ?></p>
    <p>年齢：<?php echo $profile['age']; ?></p>
    <p>メールアドレス：<?php echo $profile['email']; ?></p>

    <h1>カートの中身</h1>
    <hr>
    <table border="1">
        <tr>
            <th>商品ID</th>
            <th>個数</th>
        </tr>
        <?php foreach($cart as $key => $var): ?>
        <tr align="center">
            <td><?php echo $key; ?></td>
            <td><?php echo $var; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="session_set.php">戻る</a>
</body>
</html>