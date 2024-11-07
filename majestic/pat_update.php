<?php
include("config.php");
if(isset($_POST['submit'])){
//error_reporting(E_ALL);
$doct=$_POST['rnum'];
//$doct1=$_POST['ApplicationDeadline1'];
//$doct2=$_POST['tknum'];
 $did=$_POST['doctorname'];
$pname=$_POST['pname'];
$fname=$_POST['fname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$mobile=$_POST['mobile'];
$aadhar=$_POST['aadhar'];
$ref_doc=$_POST['ref_doc'];
$ref_mob=$_POST['ref_mob'];
$doctorname=$_POST['doctorname'];
$con_doct_mob=$_POST['con_doct_mob'];
$concession_type=$_POST['concession_type'];
$fee=$_POST['fee'];
$addr=$_POST['addr'];
$rmarks=$_POST['rmarks'];
//$ApplicationDeadline=$_POST['ApplicationDeadline'];
$type=$_POST['type'];
$rel=$_POST['rel'];
$date=date('Y-m-d');
$token=$_POST['token'];
$con_fee=$_POST['con_fee'];
$total=$_POST['total'];
$id=$_POST['id'];
$new=$_POST['new'];




$docid = mysqli_query($link,"select dname1 from doct_infor where id = '$did'") or die(mysqli_error($link));
if($docid)
{
	$row1 = mysqli_fetch_array($docid);
	$doct3 = $row1['dname1'];

}

   $ff="update `patientregister` set  `doctorname`='$did', `patientname`='$pname', `age`='$age', `gaurdianname`='$fname',
 `gender`='$sex', `address`='$addr', `phoneno`='$mobile', `registerfee`='$fee', `remarks`='$rmarks', `pat_type`='$type',
   `aadar`='$aadhar', `ref_doc`='$ref_doc', `ref_doc_mob`='$ref_mob',
   
  `con_doc_mob`='$con_doct_mob',`rel_type`='$rel',`cons_fee`='$con_fee',`total`='$total',`pat_type1`='$new' where reg_id='$id' ";
  $sq=mysqli_query($link,$ff) or die(mysqli_error($link));
  
  
    
    $ff11="update `patientregister` set   `patientname`='$pname', `age`='$age',`gender`='$sex', `address`='$addr', `phoneno`='$mobile' where registerno='$doct' ";
  
  $sq=mysqli_query($link,$ff11) or die(mysqli_error($link));
	
  
   $ff1="update `patientregister1` set  `doctorname`='$doct3', `patientname`='$pname', `age`='$age', `gaurdianname`='$fname',
 `gender`='$sex', `address`='$addr', `phoneno`='$mobile', `registerfee`='$fee', `remarks`='$rmarks', `pat_type`='$type',
   `aadar`='$aadhar', `ref_doc`='$ref_doc', `ref_doc_mob`='$ref_mob',
  `con_doc_mob`='$con_doct_mob',`rel_type`='$rel',`cons_fee`='$con_fee',`total`='$total',`pat_type1`='$new' where reg_id='$id' ";
$sq1=mysqli_query($link,$ff1) or die(mysqli_error($link));
if($sq)
		{
//header("location:patient-reg.php");
print "<script>";
			print "alert('Successfully Updated');";
			print "self.location='patient-reg.php';";
			print "</script>";

}
}
?>