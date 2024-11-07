<?php include("../connection.php");
if(isset($_POST['sublll'])){

	 $desc1=$_POST['desc1'];	
	  $iname = $_FILES['image']['name'];

	  if($iname!= ""){
	 $code = md5(rand());
	 $iname =$code. $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	 $dir = "../upload/home_gallery";
		       $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	//move_uploaded_file($tmp,"../staff/" . $code.$_FILES["sfile"]["name"]);
	 $iname1 =$code. $_FILES['image']['name'];
	//$iname = $code.$_FILES["sfile"]["name"];
	$iname1 = ($iname1);
	}else{
	 $iname1 = ($img);
	}
	$sq=mysqli_query($link,"insert into home_content(image,desc1)values('$iname1','$desc1')");
	if($sq){
	print "<script>";
			print "alert('Sucessfully Saved');";
			print "self.location='home_gallery.php';";
			print "</script>";
	} else {
		print "<script>";
			print "alert('Unable To Save');";
			print "self.location='home_content.php';";
			print "</script>";
		
	}
}


if(isset($_POST['update'])){

	 $desc1=$_POST['desc1'];	
	  $iname = $_FILES['image']['name'];
  $inamek = $_POST['image1'];
  $id=$_POST['id'];
	  if($iname!= ""){
	 $code = md5(rand());
	 $iname =$code. $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	 $dir = "../upload/home_gallery";
		       $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	//move_uploaded_file($tmp,"../staff/" . $code.$_FILES["sfile"]["name"]);
	 $iname1 =$code. $_FILES['image']['name'];
	//$iname = $code.$_FILES["sfile"]["name"];
	$iname1 = ($iname1);
	}else{
	 $iname1 = ($inamek);
	}
	$sq=mysqli_query($link,"update  rajesh set image='$iname1',desc1='$desc1' where id='$id'");
	if($sq){
	print "<script>";
			print "alert('Sucessfully Updated');";
			print "self.location='rajesh_soni1.php';";
			print "</script>";
	} else {
		print "<script>";
			print "alert('Unable To Save');";
			print "self.location='rajesh_soni_edit.php?id=$id';";
			print "</script>";
		
	}
}
?>