<?php

define('DSN', 'mysql:host=db;dbname=sample;charset=utf8');
define('DB_USER', 'user');
define('DB_PASSWORD', 'userpass');
define('SITE_URL', 'http://localhost:8080/chapter13/');

error_reporting(E_ALL & ~E_NOTICE);
session_set_cookie_params(1440, '/');