<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();

$build_id = $_SESSION['Current_build'];
$ram_id = $_POST['ram_id'];
$amount = $_POST['inputState'];

$mysqli = dbconnect();
$mysqli->query("UPDATE `build_ram` SET `ram_id_ram` = ".$ram_id.", `amount` = ".$amount." WHERE `build_id_build` = ".$build_id.";");

header("Location: ../../pcbuild.php");
