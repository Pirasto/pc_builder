<?php
session_start();
// $_SESSION['Logged'] = false;
// $_SESSION['Logged_user_id'] = null;
// $_SESSION['Logged_user'] = null;
// $_SESSION['Logged_user_name'] = null;
session_destroy();
$_SESSION['Logged'] = false;
header("Location: ../../index.php");
?>