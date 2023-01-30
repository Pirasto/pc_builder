<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();

$build_id = $_SESSION['Current_build'];
$ec_id = $_POST['ec_id'];

$mysqli = dbconnect();
$mysqli->query("DELETE FROM `build_expansion_card` WHERE `build_id_build` = ".$build_id." AND `expansion_card_id_expansion_card` = ".$ec_id.";");

header("Location: ../../pcbuild.php");
