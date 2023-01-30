<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();

$build_id = $_SESSION['Current_build'];
$storage_id = $_POST['storage_id'];

$mysqli = dbconnect();
$mysqli->query("DELETE FROM `build_storage` WHERE `build_id_build` = ".$build_id." AND `storage_id_storage` = ".$storage_id.";");

header("Location: ../../pcbuild.php");
