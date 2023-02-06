<?php
$dbhost = "localhost";
$user = "root";
$password = "";
$dbname = "voci";

$connection = mysqli_connect($dbhost, $user, $password, $dbname);
$_SESSION['$connection'] = $connection;

if (!$connection)
    die("Connection failed " . mysqli_connect_error());
else {
    $_SESSION['connection'] = $connection;
}