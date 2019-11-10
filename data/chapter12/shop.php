<?php
session_start();

// POSTデータをカート用のセッションに保存
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $num = $_POST['num'];
    $_SESSION['cart'][$product] = $num;
}

$cart = array();
if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
var_dump($cart);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>商品一覧
<body>
    <h1>商品一覧</h1>
    <a href="cart.php">カートを見る</a>
    <table style="text-align:center">
        <tr>
            <th>商品</th>
            <th>数量</th>
            <th>ボタン</th>
        </tr>
        <form action="" method="post">
            <tr>
                <td>業務用デスク</td>
                <td>
                    <select name="num" id="">
                        <?php for($i = 1; $i < 10; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
                <td>
                    <input type="hidden" name="product" value="desk_01">
                    <?php if(isset($cart['desk_01']) === TRUE): ?>
                    <p>追加済み</p>
                    <?php else: ?>
                    <input type="submit" value="カートに入れる">
                    <?php endif; ?>
                </td>
            </tr>
        </form>

        <form action="" method="post">
            <tr>
                <td>快適いす</td>
                <td>
                    <select name="num" id="">
                        <?php for($i = 1; $i < 10; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
                <td>
                    <input type="hidden" name="product" value="chair_07">
                    <?php if(isset($cart['chair_07']) === TRUE): ?>
                    <p>追加済み</p>
                    <?php else: ?>
                    <input type="submit" value="カートに入れる">
                    <?php endif; ?>
                </td>
            </tr>
        </form>
    </table>
</body>
</html>