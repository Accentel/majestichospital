<?php include("../connection.php");
if(isset($_POST['sublll'])){

	 $job_title=$_POST['job_title'];	
	$desc1=$_POST['desc1'];
	$positions=$_POST['positions'];
	$from_date=$_POST['from_date'];
	$to_date=$_POST['to_date'];
	$sq=mysqli_query($link,"insert into  jobs (`job_title`, `Job_desc`, `positions`, `intrview_from_date`, `intrview_to_date`)
	values('$job_title','$desc1','$positions','$from_date','$to_date')");

	if($sq){
	print "<script>";
			print "alert('Sucessfully Added');";
			print "self.location='job1.php';";
			print "</script>";
	} else {
		print "<script>";
			print "alert('Unable To Save');";
			print "self.location='job1.php';";
			print "</script>";
		
	}
}

?>