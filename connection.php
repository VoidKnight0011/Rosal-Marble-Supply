<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "rosal-marble-supply";

    if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>