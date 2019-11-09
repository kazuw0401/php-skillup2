<?php

session_start();
$_SESSION['age'] = 36;
$_SESSION['email'] = 'sample@sample.com';

echo '年齢：'.$_SESSION['age'].'<br>';
echo 'メールアドレス：'.$_SESSION['email'];