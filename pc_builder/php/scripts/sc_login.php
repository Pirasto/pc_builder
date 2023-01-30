<?php
session_start();
$_SESSION['LogError'] = false;

//includes
include("sc_dbconnect.php");

$email = $_POST['emailuser'];
$pswd = $_POST['passworduser'];

$mysqli = dbconnect();
$result = $mysqli->query("SELECT * FROM user WHERE email='" . $email . "' AND password='" . md5($pswd) . "'");

if ($result->num_rows>0) {
    //user match
    $_SESSION['Logged'] = true;
    while($row = $result->fetch_assoc()) {
        $_SESSION['Logged_user_id'] = $row["id_user"];
        $_SESSION['Logged_user'] = $row["login"];
        $_SESSION['Logged_user_name'] = $row["name"];
        $_SESSION['Logged_user_email'] = $email;
    }
    header("Location: ../../user-profile.php");
} else {
    //error, incorrect user or password
    $_SESSION['LogError'] = true;
    header("Location: ../../login.php");
}
?>