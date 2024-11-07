<?php
$mysqli_hostname = "localhost";
//$mysqli_user = "root";
//$mysqli_password = "";
//$mysqli_database = "majestic";
$mysqli_user = "root";
$mysqli_password = "";
$mysqli_database = "majestic";
$prefix = "";
$bd = mysql_connect($mysqli_hostname, $mysqli_user, $mysqli_password) or die("Could not connect database");
mysql_select_db($mysqli_database, $bd) or die("Could not select database");
date_default_timezone_set('Asia/Kolkata');
?>