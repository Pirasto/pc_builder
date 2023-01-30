<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();

$build_id = $_SESSION['Current_build'];
$storage_id = $_POST['storage_id'];
$amount = $_POST['inputState'];

$mysqli = dbconnect();
$mysqli->query("INSERT INTO `build_storage` VALUES (NULL, ".$amount.", ".$storage_id.", ".$build_id.")");

header("Location: ../../pcbuild.php");
