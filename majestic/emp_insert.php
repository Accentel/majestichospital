<?php
include("config.php");
if(isset($_POST['abc'])){
	error_reporting(E_ALL);
	$a=$_POST['empcode'];
	$b=$_POST['empname'];
	$c=$_POST['desig'];
	$d=$_POST['joindt'];
	$e=$_POST['qua'];
	$f=$_POST['dept'];
	$g=date('Y-m-d',strtotime($_POST['dob']));
	//$h=$_POST['sex1'];
	$SEX=$_POST['sex1'];
	$j=$_POST['phone1'];
	$k=$_POST['phone2'];
	$l=$_POST['caddr'];
	$m=$_POST['paddr'];
	
	$aadharno=$_POST['aadharno'];
	$accountno=$_POST['accountno'];
	$bankname=$_POST['bankname'];
	$branch=$_POST['branch'];
	$n=$_POST['email1'];
	$sq="INSERT INTO hr_emp(EMP_NAME,DESIGNATION,JOIN_DATE,QUALIFICATION,dept_code,DOB,Gender,PHONE1,salary,CADDR,PADDR,EMAIL,aadharno,accountno,bankname,branchname)VALUES('$b','$c','$d','$e','$f','$g','$SEX','$j','$k','$l','$m','$n','$aadharno','$accountno','$bankname','$branch')";
	mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='addemployee.php';";
			print "</script>";

}
else{
mysqli_error();}
}
?>