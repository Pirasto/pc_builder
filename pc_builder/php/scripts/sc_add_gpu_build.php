<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();

$build_id = $_SESSION['Current_build'];
$gpu_id = $_POST['gpu_id'];

$mysqli = dbconnect();
$mysqli->query("UPDATE `build_gpu` SET `gpu_id_gpu` = ".$gpu_id.", `amount` = 1 WHERE `build_id_build` = ".$build_id.";");

header("Location: ../../pcbuild.php");
