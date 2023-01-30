<?php
function dbconnect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "project_db";
    $mysqli = new mysqli($servername, $username, $password, $db);

    return $mysqli;
}