<?php include("../connection.php");
if(isset($_POST['update'])){

	 $desc1=$_POST['desc1'];	
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$id=$_POST['id'];
	$sq=mysqli_query($link,"update address set desc1='$desc1',phone='$phone',email='$email' where id='$id'");
	if($sq){
	print "<script>";
			print "alert('Sucessfully Updated');";
			print "self.location='addr1.php';";
			print "</script>";
	} else {
		print "<script>";
			print "alert('Unable To Save');";
			print "self.location='addr_edit.php?id=$id';";
			print "</script>";
		
	}
}

?>