<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_info";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("Connection failed: " . mysqli_connect_error());
}


?>