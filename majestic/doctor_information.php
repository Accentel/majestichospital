<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header.php");
	?>
	
<script>
function calc(){
	var fee=document.getElementById('fee').value;
var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
hamount=fee*hopshare;
htotal=fee-hamount;
document.getElementById('hamo').value=hamount;
}
</script>
<script>
function calc1(){
	var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
var doctshare=document.getElementById('doctorshare').value/100;
damount=fee*doctshare;
//dtotal=fee-hamount;
document.getElementById('doctoramount').value=damount;
}
</script>
<script>
function calc2(form){
	//var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
//damount=fee*doctshare;
//dtotal=fee-hamount;
hamount=document.getElementById('hamo').value;
damount=document.getElementById('doctoramount').value;
//var number1 = form.hamo.value
// var number2 = form.doctoramount.value
tt=parseFloat(hamount)+parseFloat(damount);
document.getElementById('total').value=tt;
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
$doct=$_POST['spec'];
$doct1=$_POST['dname'];
$doct2=$_POST['desc'];
$doct3=$_POST['dsi'];
$doct4=$_POST['dept'];
$doct5=$_POST['ddt'];
$doct6=$_POST['pnum'];
$doct7=$_POST['mnum'];
$doct8=$_POST['addr'];
$doct9=$_POST['fee'];
$hospitalshare=$_POST['hospitalshare'];
$hamo=$_POST['hamo'];
$doctorshare=$_POST['doctorshare'];
$doctoamount=$_POST['doctoamount'];
$total=$_POST['total'];
$stime=$_POST['stime'];
$etime=$_POST['etime'];
$wdays=$_POST['wdays'];
$edays=$_POST['edays'];
$sq="INSERT INTO doct_infor(spec1,dname1,desc1,dsi1,dept1,ddt1,pnum1,mnum1,addr1,fee1,hos_share,hos_amount,doct_share,doct_amount,total,wdays,stime,etime,edays)VALUES
('$doct','$doct1','$doct2','$doct3','$doct4','$doct5','$doct6','$doct7','$doct8','$doct9','$hospitalshare','$hamo','$doctorshare','$doctoamount','$total','$wdays','$stime','$etime','$edays')";
$res=mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($res){
print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='doctor_information.php';";
			print "</script>";


//echo "<script>location.href='doctor_information.php?ack=successfully registred'</script>";
}
else{
mysqli_error();}
}
?>
<?php
ob_get_flush();
?>


		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">Doctor Information</h1>
          
           <form name="form" method="post" action="">
<table width="90%" cellspacing="10">

<tr>
<td class="label1">Specialization <font color="red">*</font> : </td>
<td><input type="text" name="spec" required="required" id="spec" class="text" /></td>
<td class="label1">Doctor Name <font color="red">*</font> : </td>
<td width="10%"><input type="text" required="required" name="dname" class="text" id="dname" width="90%" /></td>
</tr>

<tr>
<td class="label1">Designation <font color="red">*</font> : </td>
<td><input type="text" required="required" name="desc" id="desc" class="text"/></td>
<td class="label1">Qualifcation <font color="red">*</font> : </td>
<td><input type="text" required="required" name="dsi" id="dsi" class="text" /></td>
</tr>

<tr>
<td class="label1">Department Name <font color="red">*</font> : </td>
<td><select name="dept" id="dept" required="required" style="width:230px;height:20px;">
<option value="">Select</option>
<?php
include("config.php");

$sql = mysqli_query($link,"select * from dept")or die(mysqli_error($link));
if($sql)
{
	while($row = mysqli_fetch_array($sql))
	{
?>
<option value="<?php echo $row['DEPT_CODE'] ?>"><?php echo $row['DEPT_NAME'] ?></option>
<?php		
	}
}
?>
</select>
</td>
<td class="label1">Doctor Duty Type <font color="red">*</font> : </td>
<td><input type="text" name="ddt" required="required" id="ddt" class="text" /></td>
</tr>

<tr>
<td class="label1">Phone Number : </td>
<td><input type="text" name="pnum" id="pnum" class="text"/></td>
<td class="label1">Mobile Number <font color="red">*</font> : </td>
<td><input type="text" name="mnum" required="required" id="mnum" class="text"/></td>
</tr>

<tr>
<td class="label1">Address : </td>


<td><textarea name="addr" id="addr" cols="34" rows="4"/></textarea></td>
<td></td><td></td>
</tr>
<tr>
<td class="label1">Consultant Fee <font color="red">*</font> : </td>
<td><input type="text" required="required" name="fee" id="fee" class="text"/></td>
</tr>
<tr>
<td class="label1">Hospital Share(%) : </td>
<td><input type="text" required="required" name="hospitalshare" id="hospitalshare" class="text"/></td>
<td class="label1">Hospital Amount : </td>
<td><input type="text" name="hamo" id="hamo" onfocus="calc()" class="text"/></td>


</tr>
<tr>
<td class="label1">Doctor Share(%) : </td>
<td><input type="text" required="required" name="doctorshare" id="doctorshare" class="text"/></td>
<td class="label1">Doctor Amount : </td>
<td><input type="text" required="required" name="doctoamount" id="doctoramount" onfocus="calc1()" class="text"/></td>
</tr>
<tr>
<td></td>
<td></td>
<td class="label1">Total Amount: </td>
<td><input type="text" name="total" name="total" id="total" onfocus="calc2(this.form)" class="text"/></td>
</tr>
<tr>
<td class="label1">Days1</td>
<td><input type="text" name="wdays" id="wdays" class="text" /></td>
<td class="label1">Days1 Time: </td>
<td>
      <input type="text" name="stime" id="stime" class="text"></input>
    </td>
</tr>
<tr>
<td class="label1">Days2</td>
<td><input type="text" name="edays" id="edays" class="text" /></td>
<td class="label1">Days2 Time: </td>
<td>
      <input type="text" name="etime" id="etime" class="text"></input>
    </td>
</tr>
<tr>

<td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='doctor_list.php'"/></td>

</tr>
</table>
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