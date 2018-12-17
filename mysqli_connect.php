<?php


DEFINE('DB_USER','studentwebber');
DEFINE('DB_PASSWORD','test3');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','crva');

$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)

OR die('Could not connect to MYSQL '. mysqli_connect_error());

?>
