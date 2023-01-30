<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();

$build_id = $_SESSION['Current_build'];

$mysqli = dbconnect();
$mysqli->query("UPDATE `build_ram` SET `ram_id_ram` = NULL, amount = NULL WHERE `build_id_build` = ".$build_id.";");

header("Location: ../../pcbuild.php");
