<?php
require_once("config.php");
$contents="S NO\t UMRNO\t Patient Name\t Mobile No\n";

//Mysql query to get records from datanbase
//You can customize the query to filter from particular date and month etc...Which will depends your database structure.
$user_query = mysql_query("select distinct registerno,patientname,phoneno from patientregister order by reg_id desc");
$i=1;
//While loop to fetch the records
while($row = mysql_fetch_array($user_query))
{
	
$contents.=$i."\t";
$contents.=$row['registerno']."\t";
$contents.=$row['patientname']."\t";
$contents.=$row['phoneno']."\n";

$i++;
}

// remove html and php tags etc.
$contents = strip_tags($contents); 

//header to make force download the file
header("Content-Disposition: attachment; filename=dowloadpatientmobilenos".date('d-m-Y').".xls");
print $contents;

//For more examples related PHP visit www.webinfoipedia.com and enjoy demo and free download..
//}
?>