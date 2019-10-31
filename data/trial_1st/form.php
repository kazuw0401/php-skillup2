<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
	<h1></h1>
    <form action="./task.php" method="post">
        <p>
			お名前：
            <select name="name" id="">
				<option value="president">社長</option>
				<option value="suzuki">鈴木さん（営業チーム）</option>
				<option value="takahashi">高橋さん（経理チーム）</option>
				<option value="sales_yamada">山田さん（営業チーム）</option>
				<option value="takahashi">中村さん（経理チーム）</option>
				<option value="general_yamada">山田さん（総務チーム）</option>
			</select>
		</p>
		<p>
			パスワード：<input type="password" name="password" id="">
		</p>
        <input type="submit" value="ログイン">
    </form>
</body>

</html>