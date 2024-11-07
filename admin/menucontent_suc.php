<?php include("../connection.php");
if(isset($_POST['sublll'])){
     $mname=$_POST['mname'];
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
	$sq=mysqli_query($link,"insert into menu_content(image,desc1,mid)values('$iname1','$desc1','$mname')");
	if($sq){
	print "<script>";
			print "alert('Sucessfully Saved');";
			print "self.location='smenu_view.php';";
			print "</script>";
	} else {
		print "<script>";
			print "alert('Unable To Save');";
			print "self.location='smenu_view.php';";
			print "</script>";
		
	}
}


if(isset($_POST['update'])){
 $mname=$_POST['mname'];
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
	$sq=mysqli_query($link,"update  menu_content set image='$iname1',desc1='$desc1',mid='$mname' where id='$id'");
	if($sq){
	print "<script>";
			print "alert('Sucessfully Updated');";
			print "self.location='smenu_view.php';";
			print "</script>";
	} else {
		print "<script>";
			print "alert('Unable To Save');";
			print "self.location='smenu_edit.php?id=$id';";
			print "</script>";
		
	}
}
?>