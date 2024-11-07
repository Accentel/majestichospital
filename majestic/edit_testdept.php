<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header1.php");
		?>
	
	</head>

	<body>
<?php
include("config.php");


	$dcode=$_REQUEST['dcode'];

$sql=mysqli_query($link,"select * from masterdept where deptcode='$dcode'")or die(mysqli_error($link));
if($sql){
	$res = mysqli_fetch_array($sql);
	$decode = $res['deptcode'];
	$dename = $res['deptname'];
}

?>
  
	<div id="conteneur container">

		  <?php
				include("logo.php");
			  ?>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre"  class="table-responsive" style="height:auto; min-height:450px;" >
		
          <h1>Edit Test Departments</h1>
		  
           <div align="center" style="width:100%">

       <fieldset style="border:1px solid; height:auto; padding:10px;
          width:auto;">
          <form name="frm" method="post">
			<table  border="0" cellpadding="10" class="table" cellspacing="0">
                                <tr><td colspan="2"><br /></td></tr> 
                            <tr >
                        <td width="40%" class="label1" align="right" ><strong>Department Code</strong> :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="dcode1" id="dcode1" value="<?php echo $decode ?>" class="text" required/>
                        </td>
                    </tr> <tr><td colspan="2"><br /></td></tr>
                     <tr >
                        <td align="right" class="label1" ><strong>Department Name </strong>:</td>
                        <td align="left">
                            <input type="text" name="dname" id="dname" value="<?php echo $dename ?>" class="text" required/>
                        </td>
                    </tr> <tr><td colspan="2"><br /></td></tr>
 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Update" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='new_dept.php'"/></td>
            </tr> <tr><td colspan="2"><br /></td></tr>
        </table>
		 </form></fieldset></div>
<?php
include("config.php");
if(isset($_REQUEST['submit'])){

	//error_reporting(E_ALL);
	$dcode1=$_REQUEST['dcode1'];
	$dname=$_REQUEST['dname'];
	
	
$sq=mysqli_query($link,"update masterdept set deptcode='$dcode1',deptname='$dname' where deptcode='$dcode'")or die(mysqli_error($link));
if($sq){
	print "<script>";
	print "alert('Successfully updated ');";
	print "self.location='new_dept.php';";
	print "</script>";

}
else{
	print "<script>";
	print "alert('dept already exists');";
	print "self.location='edit_testdept.php?dcode=$dcode';";
	print "</script>";
}
}
?>		 
			</div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>