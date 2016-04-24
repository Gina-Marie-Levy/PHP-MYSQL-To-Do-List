<?php

session_start();

$_SESSION['user_id'] = 1;

$user = 'root';
$password = 'root';
$db = 'todo';
$host = 'localhost';
$port = 3306;

$link = mysql_connect(
   "$host:$port", 
   $user, 
   $password
);
$db_selected = mysql_select_db(
   $db, 
   $link
);

//Handle this some other way
if(!isset($_SESSION['user_id'])){
	die('You are not signed in.');
}
