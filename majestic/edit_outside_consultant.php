<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
$aname= $_SESSION['name1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	</head>

	<body>

	<div id="conteneur">
		
		  

		   <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			?>
		  
	
<?php
ob_start();
include("config.php");
$outid = $_REQUEST['id'];
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$consname = $_POST['consname'];
$constype = $_POST['constype'];
$spec1 = $_POST['spec'];
$contno = $_POST['contno'];
$consfee = $_POST['consfee'];
$vday = $_POST['day'];
$extrafee=$_POST['extrafee'];
$addr = $_POST['addr'];
$vtime1=$_POST['vtime'];


$sq="update outside_consultants set ANAE_DOCNAME = '$consname',ANAEST_TYPE = '$constype',CONS_SPECALIZATION = '$spec1',ANAE_CHARGES = '$consfee',CONTACT_NO = '$contno',ADDR='$addr',EXTRA_FEE = '$extrafee',vday = '$vday',vtime='$vtime1', CURRENTDATE = now(),AUTH_BY ='$aname' where OUT_CONSNO='$outid'";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='outside_consultant.php';";
			print "</script>";

}
else{
mysqli_error();}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT OUTSIDE CONSULTANT</h1>
          
                      <form name="frm" method="post" action="">
<?php
include("config.php");


$sql = mysqli_query($link,"SELECT * FROM outside_consultants WHERE OUT_CONSNO='$outid'")or die(mysqli_error($link));
if($sql)
{
	$res = mysqli_fetch_array($sql);
	
	  $conname = $res['ANAE_DOCNAME'];
	  $contype=$res['ANAEST_TYPE'];
	  $spec=$res['CONS_SPECALIZATION'];
	  $concharge = $res['ANAE_CHARGES'];
	  $contactno = $res['CONTACT_NO'];
	  $address = $res['ADDR'];
	  $exfee = $res['EXTRA_FEE'];
	  $vday = $res['vday'];
	  $vtime = $res['vtime'];
}

?>                
<table width="100%" cellspacing="10" align="center">

<tr><td class="label1">Consultant Name <font color="red">*</font> : </td>
<td>
	<input type="text" name="consname" class="text" value="<?php echo $conname ?>"/></td>
	
	<td class="label1">Consultant Type <font color="red">*</font> : </td>
	<td>
		<select name="constype" style="width:230px;height:20px;">
		  <option value="<?php echo $contype ?>"><?php echo $contype ?></option>
		  <option value="Local">Local </option>
		  <option value="Regional">Regional </option>
		  <option value="GA">GA </option>
		  <option value="Others">Others </option>
	  </select>
		
	</td>
</tr>
<tr>	
  <td class="label1">Specialization : </td>
  <td><input type="text" name="spec" class="text" value="<?php echo $spec ?>"/></td>

  <td class="label1">Contact No. : </td>
  <td><input type="text" name="contno" class="text" value="<?php echo $contactno ?>"/></td>
 
</tr>
<tr>	
  <td class="label1">Consultation Fee : </td>
  <td><input type="text" name="consfee" class="text" value="<?php echo $concharge ?>"/></td>

  <td class="label1">Extra Fee : </td>
  <td><input type="text" name="extrafee" class="text" value="<?php echo $exfee ?>"/></td>
 
</tr>
<tr>
<td class="label1"><div align="right">Address : </div></td>
	<td>
		<textarea name="addr" cols="34" rows="5"><?php echo $address?></textarea>
	  </td>
	<td class="label1"><div align="right">Visiting Day </div></td>
  <td align="left">
	  <input type="text" class="tcal" name="day" id="day" value="<?php echo $vday ?>" style="width:230px;height:20px;">
		  
  </td>
  </tr>
  <tr>
	  <td class="label1">
		  <div align="right">
			  Visiting Time 
		  </div>
	  </td>
	  <td align="left">
		  <input name="vtime" type="vtime" class="text" value="<?php echo $vtime ?>"/>
		  
	  </td>
  </tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='outside_consultant.php'"/></td><td></td></tr></table>
	           </form>        
		
        
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

header('Location:login.php');

}

?>