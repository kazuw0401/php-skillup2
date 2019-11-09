<?php
session_start();
$_SESSION['age'] = 40;
unset($_SESSION['email']);

if(isset($_SESSION['age'])) {
    echo '年齢：'.$_SESSION['age'];
}else {
    echo '年齢が入っていません。';
}
echo '<br>';
if(isset($_SESSION['email'])) {
    echo 'メールアドレス：'.$_SESSION['email'];
}else {
    echo 'メールアドレスが入っていません。';
}