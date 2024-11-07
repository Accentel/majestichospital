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
$consname = $_POST['consname'];
$constype = $_POST['constype'];
$spec = $_POST['spec'];
$contno = $_POST['contno'];
$consfee = $_POST['fee'];
$vday = $_POST['day'];
$extrafee=$_POST['extrafee'];
$addr = $_POST['addr'];
$vtime1=$_POST['vtime'];
$vtp = $_POST['vtp'];
$vtime = $vtime1." ".$vtp;

$sq="INSERT INTO outside_consultants(ANAE_DOCNAME,ANAEST_TYPE,ANAE_CHARGES,CONTACT_NO,CONS_SPECALIZATION,ADDR,EXTRA_FEE,CURRENTDATE,AUTH_BY,vday,vtime)VALUES('$consname','$constype','$consfee','$contno','$spec','$addr','$extrafee',now(),'$aname','$vday','$vtime')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='add_outside_consultant.php';";
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
		  
          <h1 style="color:red;" align="center">ADD OUTSIDE CONSULTANT</h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Consultant Name <font color="red">*</font> : </td>
<td>
	<input type="text" name="consname" class="text" /></td>
	
	<td class="label1">Consultant Type <font color="red">*</font> : </td>
	<td>
		<select name="constype" style="width:230px;height:20px;">
		  <option value=""> -- Select One Type -- </option>
		  <option value="Local">Local </option>
		  <option value="Regional">Regional </option>
		  <option value="GA">GA </option>
		  <option value="Others">Others </option>
	  </select>
		
	</td>
</tr>
<tr>	
  <td class="label1">Specialization : </td>
  <td><input type="text" name="spec" class="text"/></td>

  <td class="label1">Contact No. : </td>
  <td><input type="text" name="contno" class="text"/></td>
 
</tr>

<tr>
<td class="label1"><div align="right">Address : </div></td>
	<td>
		<textarea name="addr" cols="34" rows="5"></textarea>
	  </td>
	<td class="label1"><div align="right">Visiting Day </div></td>
  <td align="left">
	  <input type="text" name="day" id="day" class="tcal" style="width:230px;height:20px;" value="<?php echo date('d-m-Y') ?>"/>
		  
  </td>
  </tr>
  <tr>
	  <td class="label1">
		  <div align="right">
			  Visiting Time 
		  </div>
	  </td>
	  <td align="left">
		  <input name="vtime" type="vtime" value="<?php echo date('h:i:s') ?>" size="10"/>
		  <select name="vtp" id="vtp" class="select">
			  <option value="AM">AM</option>
			  <option value="PM">PM</option>
		  </select>
	  </td>
  </tr>
  <tr>	
  <td class="label1">Consultation Fee : </td>
  <td><input type="text" name="fee" id="fee" class="text"/></td>

  <td class="label1">Extra Fee : </td>
  <td><input type="text" name="extrafee" value="0" id="extrafee" class="text"/></td>
 
</tr>
<tr>
<td class="label1">Hospital Share(%) : </td>
<td><input type="text" required="required" name="hospitalshare" id="hospitalshare" class="text"/></td>
<td class="label1">Hospital Amount : </td>
<td><input type="text" name="hamo" id="hamo" readonly="readonly" onfocus="calc()" class="text"/></td>


</tr>
<tr>
<td class="label1">Doctor Share(%) : </td>
<td><input type="text" required="required" name="doctorshare" id="doctorshare" class="text"/></td>
<td class="label1">Doctor Amount : </td>
<td><input type="text" required="required" readonly="readonly" name="doctoamount" id="doctoramount" onfocus="calc1()" class="text"/></td>
</tr>
<tr>
<td class="label1">Lab Share(%) : </td>
<td><input type="text" required="required" name="labshare" id="labshare" class="text"/></td>
<td class="label1">Lab Amount : </td>
<td><input type="text" required="required" readonly="readonly" name="labamount" id="labamount" onfocus="calc3()" class="text"/></td>
</tr>
<tr>
<td></td>
<td></td>
<td class="label1">Total Amount: </td>
<td><input type="text" name="total" name="total" readonly="readonly" id="total" onfocus="calc2(this.form)" class="text"/></td>
</tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='outside_consultant.php'"/></td><td></td></tr></table>
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