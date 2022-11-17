<?php
$host_name = 'localhost';
$user_name = '';
$password = '';
$database = 'lagerverwaltung';

$connect = mysqli_connect($host_name, $user_name, $password, $database);
mysqli_query($connect, "SET NAMES 'utf8'");
?>