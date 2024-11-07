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


	$id=$_REQUEST['id'];

$sql=mysqli_query($link,"select * from doct_serv where id='$id'")or die(mysqli_error($link));
if($sql){
	$res = mysqli_fetch_array($sql);
	$serv_name = $res['serv_name'];
	$amount = $res['amount'];
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
		
          <h1>Edit Doctor Service</h1>
		  
           <div align="center" style="width:100%">

       <fieldset style="border:1px solid; height:auto; padding:10px;
          width:auto;">
          <form name="frm" method="post">
			<table  border="0" cellpadding="10" class="table" cellspacing="0">
                                <tr><td colspan="2"><br /></td></tr> 
                            <tr >
                        <td width="40%" class="label1" align="right" ><strong>Service Name</strong> :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="serv_name" id="serv_name" value="<?php echo $serv_name ?>" class="text" required/>
                        </td>
                    </tr> <tr><td colspan="2"><br /></td></tr>
                     <tr >
                        <td align="right" class="label1" ><strong>Amount </strong>:</td>
                        <td align="left">
                            <input type="text" name="amount" id="amount" value="<?php echo $amount ?>" class="text" required/>
                        </td>
                    </tr> <tr><td colspan="2"><br /></td></tr>
 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Update" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='servicelist.php'"/></td>
            </tr> <tr><td colspan="2"><br /></td></tr>
        </table>
		 </form></fieldset></div>
<?php
include("config.php");
if(isset($_REQUEST['submit'])){

	//error_reporting(E_ALL);
	$serv_name=$_REQUEST['serv_name'];
	$amount=$_REQUEST['amount'];
	
	
$sq=mysqli_query($link,"update doct_serv set serv_name='$serv_name',amount='$amount' where id='$id'")or die(mysqli_error($link));
if($sq){
	print "<script>";
	print "alert('Successfully updated ');";
	print "self.location='servicelist.php';";
	print "</script>";

}
else{
	print "<script>";
	print "alert('dept already exists');";
	print "self.location='edit_doc_ser.php?serv_name=$serv_name';";
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