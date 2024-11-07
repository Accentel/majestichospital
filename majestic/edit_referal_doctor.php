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
$id1= $_POST['rid'];


$sq="update  referal_doctor set ref_docname='$refdoc',mobile='$contno',address='$addr',email='$gmail',refcode='$refcode',iplabshare='$hospitalshare',doctorshare='$doctorshare',oplabshare='$labshare' where rid='$id1'";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='referal_doctor.php';";
			print "</script>";

}
else{
	
mysqli_error();}
}else{
	$id=$_REQUEST['id'];
	$q=mysqli_query($link,"select * from referal_doctor where rid='$id'") or die(mysqli_error($link));
	$res=mysqli_fetch_array($q);
			  $ref_docname = $res['ref_docname'];
			  $mobile = $res['mobile'];
			  $address=$res['address'];
			  $refcode=$res['refcode'];
			  
			  $email = $res['email'];
			  $hospitalshare = $res['iplabshare'];
			  $labshare=$res['oplabshare'];
			  $doctorshare=$res['doctorshare'];
			   $rid=$res['rid'];
			  
			  
	
	
	
	}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">ADD REFERAL DOCTOR</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Doctor Name <font color="red">*</font> : </td>
<td>
	<input type="text" name="refdoc" class="text" value="<?php echo $ref_docname; ?>"/></td>
	
  <td class="label1">Mobile No. : </td>
  <td><input type="text" name="contno" class="text" value="<?php echo $mobile; ?>"/>
  <input type="hidden" name="rid" class="text" value="<?php echo $rid; ?>"/>
  
  </td>
	
</tr>
<tr>	
  <td class="label1">Gmail : </td>
  <td><input type="text" name="gmail" class="text" value="<?php echo $email; ?>"/></td>

 <td class="label1"><div align="right">Address : </div></td>
	<td>
		<textarea name="addr" cols="34" rows="5"><?php echo $address; ?></textarea>
	  </td>
</tr>

<tr>	
  <td class="label1">Ref Code : </td>
  <td><input type="text" name="refcode" class="text" value="<?php echo $refcode ?>" readonly="readonly"/></td>

 
</tr>

<tr>
<td class="label1">Doctor Share(%) : </td>
<td><input type="text" required="required" name="doctorshare" id="doctorshare" class="text" value="<?php echo $doctorshare ?>"/></td>
<td class="label1"> </td>
<td><input type="hidden" required="required" readonly="readonly" name="doctoamount" id="doctoramount" onfocus="calc1()" class="text"/></td>
</tr>
<tr>
<td class="label1">I/P Lab Share(%) : </td>
<td><input type="text" required="required" name="hospitalshare" id="hospitalshare" class="text" value="<?php echo $hospitalshare ?>"/></td>
<td class="label1"> </td>
<td><input type="hidden" name="hamo" id="hamo" readonly="readonly" onfocus="calc()" class="text"/>

<input type="hidden" name="user" id="user" readonly="readonly"  class="text" value="<?php echo $aname; ?>"/>
</td>


</tr>
<tr>
<td class="label1">O/P Lab Share(%) : </td>
<td><input type="text" required="required" name="labshare" id="labshare" class="text" value="<?php echo $labshare ?>"/></td>
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