<?php include('config.php');
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
	<script>
function getroomno(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		var show=xmlhttp.responseText;
		 document.getElementById("rmno").innerHTML=show;
    }
  }
xmlhttp.open("GET","get_roomno.php?q="+str,true);
xmlhttp.send();
}
</script>	
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
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$rno = $_POST['rno'];
$bedno = $_POST['bedno'];
$bedtype=$_POST['bedtype'];
$bstat = $_POST['bstat'];
$remarks=$_POST['remarks'];

$sq="INSERT INTO bed_details(BED_NO,ROOM_NO,BED_TYPE,BED_STATUS,REMARKS,CURRENTDATE,AUTH_BY)VALUES('$bedno','$rno','$bedtype','$bstat','$remarks',now(),'$aname')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='add_bed_details.php';";
			print "</script>";

}
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">ADD BED DETAILS</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Location <font color="red">*</font> : </td>
<td>
	<select name="locname" required="reqired" id="locname" onchange="getroomno(this.value);" style="width:230px;height:20px;">
		<option value=""> -- Select Location -- </option>
		<?php //include("config.php");
			$sq=mysqli_query($link,"select DISTINCT FLOOR_CODE,FLOOR_NAME from location")or die(mysqli_error($link));
			$res=mysqli_num_rows($sq);
			while($row=mysqli_fetch_array($sq)){
			 $lid = $row['FLOOR_CODE'];
			 $lname=$row['FLOOR_NAME'];
		
			?>
			<option value="<?php echo $lid;?>">
			<?php 
			echo $lname; ?>
			</option>
			<?php }?></select>
</td>
<td class="label1">Room Number <font color="red">*</font> : </td>
<td id="rmno">
		<select name="rno" required="reqired" id="rno" style="width:230px;height:20px;">
			<option value=""> -- Select Room Number -- </option>
		</select>
</td></tr>
<tr>
<td class="label1">Bed Type <font color="red">*</font> : </td>
<td>
	<select name="bedtype" required="reqired" id="bedtype" style="width:230px;height:20px;">
		<option value=""> -- Select Bed Type -- </option>
		<?php include("config.php");
			$sq=mysqli_query($link,"select BEDTYPE_ID,BEDTYPE from bedtype")or die(mysqli_error($link));
			$res=mysqli_num_rows($sq);
			while($row=mysqli_fetch_array($sq)){
			 $bedid = $row['BEDTYPE_ID'];
			 $btype=$row['BEDTYPE'];
		
			?>
			<option value="<?php echo $bedid;?>">
			<?php 
			echo $btype; ?>
			</option>
			<?php }?></select>
</td>
<td class="label1">Bed Status <font color="red">*</font> : </td>
<td>
	<select name="bstat" required="reqired" id="bstat" style="width:230px;height:20px;">
			<option value=""> -- Select Bed Status -- </option>
			<option value="Reserved">Reserved</option>
			<option value="Unreserved">Unreserved</option>
		</select>
</td></tr>
<tr>
	<td class="label1">Bed Number <font color="red">*</font> : </td>
	<td><input type="text" name="bedno" class="text"/></td>
	<td class="label1"><div align="right">Remarks</div></td>
	<td>
		<textarea name="remarks" cols="34" rows="5"></textarea>
	  </td>
	
  </tr>




<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='bed_details.php'"/></td><td></td></tr></table>
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