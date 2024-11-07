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
<script>
function calc(){
	var fee1=document.getElementById('fee').value;
	var extra = document.getElementById('extrafee').value;
	var fee = parseFloat(fee1)+parseFloat(extra);
var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
hamount=fee*hopshare;
htotal=fee-hamount;
document.getElementById('hamo').value=hamount;
}
</script>

<script>
function calc1(){
	var fee1=document.getElementById('fee').value;
	var extra = document.getElementById('extrafee').value;
	var fee = parseFloat(fee1)+parseFloat(extra);
//var hopshare=document.getElementById('hospitalshare').value/100;
var doctshare=document.getElementById('doctorshare').value/100;
damount=fee*doctshare;
//dtotal=fee-hamount;
document.getElementById('doctoramount').value=damount;
}
</script>
<script>
function calc3(){
	var fee1=document.getElementById('fee').value;
	var extra = document.getElementById('extrafee').value;
	var fee = parseFloat(fee1)+parseFloat(extra);
//var hopshare=document.getElementById('hospitalshare').value/100;
var doctshare=document.getElementById('labshare').value/100;
damount=fee*doctshare;
//dtotal=fee-hamount;
document.getElementById('labamount').value=damount;
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
lab=document.getElementById('labamount').value;
//var number1 = form.hamo.value
// var number2 = form.doctoramount.value
tt=parseFloat(hamount)+parseFloat(damount)+parseFloat(lab);
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
$refdoc = $_POST['refdoc'];
$refcode = $_POST['refcode'];

$gmail = $_POST['gmail'];
$contno = $_POST['contno'];
$hospitalshare = $_POST['hospitalshare'];
//$vday = $_POST['day'];
//$extrafee=$_POST['extrafee'];
$addr = $_POST['addr'];
$doctorshare=$_POST['doctorshare'];
$labshare = $_POST['labshare'];
$user = $_POST['user'];
$hamo = $_POST['hamo'];
$doctoamount=$_POST['doctoamount'];
$labamount = $_POST['labamount'];


$sq="INSERT INTO referal_doctor(ref_docname,mobile,address,email,refcode,iplabshare,hospitalamount,doctorshare,doctoramount,oplabshare,labamount,
cdae,user)VALUES('$refdoc','$contno','$addr','$gmail','$refcode','$hospitalshare','$hamo','$doctorshare','$doctoamount','$labshare','$labamount',now(),'$user')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='add_referal_doctor.php';";
			print "</script>";

}
else{
mysqli_error();}
}
?>
<?php
ob_get_flush();
?>
<?php
$result = mysqli_query($link,"SHOW TABLE STATUS WHERE `Name` = 'referal_doctor'")or die(mysqli_error($link));
$data = mysqli_fetch_assoc($result);
 $next_increment = $data['Auto_increment'];


 ?>
		  <div id="centre">
		  
          <h1 style="color:red;" align="center">ADD REFERAL DOCTOR</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Doctor Name <font color="red">*</font> : </td>
<td>
	<input type="text" name="refdoc" class="text" /></td>
	
  <td class="label1">Mobile No. : </td>
  <td><input type="text" name="contno" class="text"/></td>
	
</tr>
<tr>	
  <td class="label1">Gmail : </td>
  <td><input type="text" name="gmail" class="text"/></td>

 <td class="label1"><div align="right">Address : </div></td>
	<td>
		<textarea name="addr" cols="34" rows="5"></textarea>
	  </td>
</tr>

<tr>	
  <td class="label1">Ref Code : </td>
  <td><input type="text" name="refcode" class="text" value="RCD-<?php echo $next_increment ?>" readonly="readonly"/></td>

 
</tr>

<tr>
<td class="label1">Doctor Share(%) : </td>
<td><input type="text" required="required" name="doctorshare" id="doctorshare" class="text"/></td>
<td class="label1"> </td>
<td><input type="hidden" required="required" readonly="readonly" name="doctoamount" id="doctoramount" onfocus="calc1()" class="text"/></td>
</tr>
<tr>
<td class="label1">O/p Lab Share(%) : </td>
<td><input type="text" required="required" name="hospitalshare" id="hospitalshare" class="text" /></td>
<td class="label1"> </td>
<td><input type="hidden" name="hamo" id="hamo" readonly="readonly" onfocus="calc()" class="text"/>

<input type="hidden" name="user" id="user" readonly="readonly"  class="text" value="<?php echo $aname; ?>"/>
</td>


</tr>
<tr>
<td class="label1">I/P Lab Share(%) : </td>
<td><input type="text" required="required" name="labshare" id="labshare" class="text"/></td>
<td class="label1"> </td>
<td><input type="hidden" required="required" readonly="readonly" name="labamount" id="labamount" onfocus="calc3()" class="text"/></td>
</tr>

<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='referal_doctor.php'"/></td><td></td></tr></table>
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