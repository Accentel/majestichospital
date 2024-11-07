<?php

include('connection.php');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $iname=$_FILES['photo']['name'];
if($iname!= ""){
	$iname =$mobile."-".$_FILES['photo']['name'];
	$tmp = $_FILES['photo']['tmp_name'];
	 $dir = "upload/resume";
	 $destination =  $dir . '/' . $iname;
	 move_uploaded_file($tmp, $destination);
	 $iname1 =$mobile."-".$_FILES['photo']['name'];
	 $iname1 = addslashes($iname1);
	}else{
	 $iname1 = addslashes($image1);
	}
    $k=mysqli_query($link,"insert into carrer(`name`,`email`,`mobile`,`resume`)values('$name','$email','$mobile','$iname1')") or die(mysqli_error($link));
    $id=mysqli_insert_id($link);
    if($k){
        print "<script>";
			print "alert('Send Successfully.');";
			print "self.location='mailsend.php?id=$id';";
			print "</script>";
    }
}

?>