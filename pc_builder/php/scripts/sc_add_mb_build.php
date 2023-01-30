<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();

$build_id = $_SESSION['Current_build'];
$mb_id = $_POST['mb_id'];

$mysqli = dbconnect();
$mysqli->query("UPDATE `build` SET `motherboard_id_motherboard` = ".$mb_id." WHERE `build`.`id_build` = ".$build_id.";");

header("Location: ../../pcbuild.php");
