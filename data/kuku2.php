<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <?php
        for ($i = 1; $i <= 9; $i++) {
        ?>
            <tr>
            <?php
            for ($j = 1; $j <= 9; $j++) {
                if($i % 2 === 0 || $j % 2 === 0) {
                    ?>
                    <td style="color:aqua"><?php echo $i * $j; ?></td>
                    <?php
                }else {
                    ?>
                    <td><?php echo $i * $j; ?></td>
                    <?
                }
            ?>
        <?php
            }
            echo '<br>';
        }
        ?>
        </tr>
    </table>
</body>

</html>