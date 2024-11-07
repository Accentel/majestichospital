<?php
include("config.php");
if(isset($_REQUEST['submit'])){
$ename = $_REQUEST['ename'];
$uname = $_REQUEST['user_id'];
$pwd = $_REQUEST['pwd'];
$user = $_REQUEST['user'];
$menu=$_REQUEST['menu'];
$result = mysqli_query($link,"select * from login where name1='$uname'");
 $rows = mysqli_num_rows($result);

if($rows > 0){
 $query1="update  login set name1='$uname',passowrd='$pwd' where ename='$ename'";

}else{
	$query1="insert into login(name1,passowrd,ename) values('$uname','$pwd','$ename')";

}
$query = mysqli_query($link,$query1) or die(mysqli_error($link));


if($query){
//$sql = mysql_query("update emp set user_name='$uname', password='$pwd' where id=$emp_id");

for($j = 0; $j < count($menu); $j++){
 $menuname = $menu[$j];
 $ts="select * from hr_user where emp_id='$ename' and menus='$menuname' ";
$p=mysqli_query($link,$ts) or die(mysqli_error($link));
 $count=mysqli_num_rows($p);
if($count > 0){
	 $t="update hr_user set  menus='$menuname' where emp_id='$ename' and menus='$menuname'";
	$qry=mysqli_query($link,$t) or die(mysqli_error($link));
}else{
	
		echo $t="insert into hr_user(emp_id, menus, currentdate,auth_by) values('$ename','$menuname',now(),'$user')";
			
	$qry=mysqli_query($link,$t) or die(mysqli_error($link));

	}


	
			 }
 
 
}		
if($qry){
	print "<script>";
	print "alert('Successfully added');";
	print "self.location='user.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to add');";
	print "self.location='user.php';";
	print "</script>";
}
}
else{
	print "<script>";
	print "alert('Username or password already exists');";
	print "self.location='user.php';";
	print "</script>";
}

?>