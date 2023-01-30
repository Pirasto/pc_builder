<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();

$build_id = $_SESSION['Current_build'];
$ec_id = $_POST['ec_id'];
$amount = $_POST['inputState'];

$mysqli = dbconnect();
$mysqli->query("INSERT INTO `build_expansion_card` VALUES (NULL, ".$amount.", ".$ec_id.", ".$build_id.")");

header("Location: ../../pcbuild.php");
