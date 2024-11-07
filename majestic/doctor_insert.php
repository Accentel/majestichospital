<?php
include("config.php");
if(isset($_POST['abc'])){
	//$a=$_POST['empcode'];
	$b=$_POST['empname'];
	//$c=$_POST['dept'];
	$sq="INSERT INTO doctor(name)VALUES('$b')";
	mysql_query($sq) or die(mysql_error()); 
if($sq){
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='pdoctor.php';";
			print "</script>";

}
else{
mysql_error();}
}
?>