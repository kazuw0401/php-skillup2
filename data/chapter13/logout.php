<?php

require_once('config.php');

session_start();

$session_name = session_name();
$_SESSION = array();

if(isset($session_name) === TRUE) {
    setcookie($session_name, '', time() - 3600);
}

session_destroy();

header('Location: '.SITE_URL.'login.php');