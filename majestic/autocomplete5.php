<?php
include("config.php");
	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
	$sql=mysql_query("SELECT PRD_NAME FROM phr_prddetails_mast WHERE PRD_NAME LIKE '%$q%'");
	if($sql)
	{
		while($row=mysql_fetch_array($sql))
		{
			echo $row['PRD_NAME']."\n";
		}
	}
?>