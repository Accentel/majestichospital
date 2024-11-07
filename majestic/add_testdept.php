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
if(isset($_REQUEST['submit'])){

	//error_reporting(E_ALL);
	$dcode=$_REQUEST['dcode'];
	$dname=$_REQUEST['dname'];
	
	
$sq=mysqli_query($link,"insert into masterdept(deptcode,deptname) values('$dcode','$dname')")or die(mysqli_error($link));
if($sq){
	print "<script>";
	print "alert('Successfully saved ');";
	print "self.location='new_dept.php';";
	print "</script>";

}
else{
	print "<script>";
	print "alert('dept already exists');";
	print "self.location='add_testdept.php';";
	print "</script>";
}
}
?>
  
	<div id="conteneur container">

		 <?php
				include("logo.php");
			  ?>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" class="table-responsive" style="height:auto; min-height:450px;" >
		
          <h1>Add Test Departments</h1>
		 <div align="center" style="width:100%">

         <fieldset style="border:1px solid; padding:10px;
          width:auto;">    
          <form name="frm" method="post">
			<table  border="0" cellpadding="4" class="table" cellspacing="0">
                                <tr><td colspan="2"><br /></td></tr>

                            <tr >
                        <td width="40%" class="label1" align="right" ><strong>Department Code</strong> :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="dcode" id="dcode" class="text" required/>
                        </td>
                    </tr><tr><td colspan="2"><br /></td></tr>

                     <tr >
                        <td align="right"  class="label1"><strong>Department Name</strong> :</td>
                        <td align="left">
                            <input type="text" name="dname" id="dname" class="text" required/>
                        </td>
                    </tr><tr><td colspan="2"><br /></td></tr>

 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='new_dept.php'"/></td>
            </tr>
            <tr><td colspan="2"><br /></td></tr>

        </table>
		 </form> </fieldset></div>

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