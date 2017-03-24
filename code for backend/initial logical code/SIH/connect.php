<?php
session_start();
//connect to host server
  $dbhost = 'localhost';
  $username = 'root';
  $password = '';
  $db='SIHwork';

$db_con = mysqli_connect($dbhost,$username, $password,$db);

echo "connected";

?>

