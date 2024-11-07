<?php
include("config.php");
if(isset($_POST['submit'])){

	$vdays=$_REQUEST['vdays'];
	$id = $_REQUEST['id'];
	$sq=mysqli_query($link,"update validity_days set valid_days=$vdays where vid=$id")or die(mysqli_error($link));
	if($sq){
		print "<script>";
		print "alert('Successfully Updated ');";
		print "self.location='validity_days.php';";
		print "</script>";
	
	}
else{
	mysql_error();
}


}

?>