<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();

$build_id = $_SESSION['Current_build'];
$psu_id = $_POST['psu_id'];

$mysqli = dbconnect();
$mysqli->query("UPDATE `build` SET `psu_id_psu` = ".$psu_id." WHERE `build`.`id_build` = ".$build_id.";");

header("Location: ../../pcbuild.php");
