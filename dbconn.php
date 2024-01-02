<?php
session_start();

if (session_status() == PHP_SESSION_ACTIVE) {
    // Session is active, do nothing
} else {
    session_start();
}
/*
$host = "sql12.freesqldatabase.com";
$username = "sql12655413";
$password = "K8Sk77cGK9";
$database = "sql12655413";
*/
$host = "localhost";
$username = "root";
$password = "";
$database = "sql12655413";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>