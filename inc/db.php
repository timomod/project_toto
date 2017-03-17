<?php 

//Connect to the DB
$dsn = "mysql:host={$config['DB_host']};dbname={$config['DB_database']};charset=utf8";//Data Source Name


//try executing the code
try {
$pdo = new PDO($dsn,$config['DB_username'] ,$config['DB_password']);
}
//catch - intercept all errors that result
catch(Exception $e) {
	echo 'You screwed-up the connection!<br>';
	echo $e->getMessage();
	exit;
}

