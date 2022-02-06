<?php

session_start();
define('DB_NAME', 'bbms');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '1234');
define('DB_HOST', 'localhost');

$link = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Connect failed: %s\n". $link -> error);
?>