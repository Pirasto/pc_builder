<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();
$name = $_POST['build_name'];
$build_id = $_SESSION['Current_build'];

$mysqli->query("UPDATE build SET build_name = \"".$name."\" WHERE id_build=".$build_id);
header("Location: ../../pcbuild.php");
