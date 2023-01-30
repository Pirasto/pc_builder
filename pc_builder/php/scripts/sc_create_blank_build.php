<?php
session_start();
include("sc_dbconnect.php");

$mysqli = dbconnect();

$build_name = "New " . $_SESSION['Logged_user'] . " build";
$user_id = $_SESSION['Logged_user_id'];

$mysqli->query("INSERT INTO build VALUES(NULL, '" . $build_name . "', '" . $user_id . "', NULL, NULL, NULL, NULL)");

$result = $mysqli->query("SELECT id_build FROM build WHERE build_name = '" . $build_name . "'");

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $_SESSION['Current_build'] = $row["id_build"];
}
} else {
echo "Database connection error";
}

$id_build = $_SESSION['Current_build'];

$mysqli->query("INSERT INTO `build_gpu` VALUES(NULL, NULL, NULL, ".$id_build.")");
$mysqli->query("INSERT INTO `build_ram` VALUES(NULL, NULL, NULL, ".$id_build.")");

$mysqli->close();

header("Location: ../../pcbuild.php");
?>