<?php
session_start();

$id=$_POST['build_id'];

$_SESSION['Current_build'] = $id;
header("Location: ../../pcbuild.php");