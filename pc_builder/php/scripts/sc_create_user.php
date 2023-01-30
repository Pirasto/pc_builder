<?php
session_start();

//includes
include("sc_dbconnect.php");

//get form values
$login = $_POST['nickname'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['haslo'];

$mysqli = dbconnect();
$mysqli->query("INSERT INTO user VALUES(NULL, '".$name."', NULL, '".$login."','".$email."','".md5($password)."')");
$_SESSION['Register'] = true;

header("Location: ../../login.php");
?>