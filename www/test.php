<?php

define("DBNAME", "bookstore");
define("DBUSER", "root");
define("DBPASS", "vagrant")

$pdo = new PDO('mysql: host=localhost; dbname='.DBNAME, DBUSER, DBPASS);




?>