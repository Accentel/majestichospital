<?php
$mysql_hostname = "aims123.db.11741916.hostedresource.com";
$mysql_user = "aims123";
$mysql_password = "Aims@123";
$mysql_database = "aims123";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>