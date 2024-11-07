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
	<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#mrno").autocomplete("set191.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	
});	

</script>


<script>
function showHint52(str)
{


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
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	
	
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	document.getElementById("mno").value=strar[3];
	document.getElementById("sex").value=strar[4];
	
//	showUser(str);
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search567777.php?q="+str,true);
xmlhttp.send();
}

</script>


<script type="text/javascript">
tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('time').value=" "+nhour+":"+nmin+":"+nsec+ap+"";

setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
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
$mrno = $_POST['mrno'];
$adate1 = $_POST['adate'];
$adate=date('Y-m-d',strtotime($adate1));
$pname=$_POST['pname'];
$mno = $_POST['mno'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$reason=$_POST['reason'];
$user=$_POST['user'];
$time=$_POST['time'];
$transferfrom=$_POST['transferfrom'];
$transferto=$_POST['transferto'];
$sq="INSERT INTO referalpatients(mrno,pname,age,sex,mno,date,time,trom,tto,user,reason)VALUES('$mrno','$pname','$age','$sex','$mno','$adate','$time','$transferfrom','$transferto','$user','$reason')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='referalpatientslist.php';";
			print "</script>";

}
else{
mysqli_error();}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre" style="height:auto;">
		  
          <h1 style="color:red;" align="center">ADD REFERRAL PATIENTS </h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">UMR No <font color="red">*</font> : </td>
<td>
	<input type="text" name="mrno" class=" text" id="mrno" onfocus="showHint52(this.value);"/>
</td>
</tr>
 
<tr>	
	  <td class="label1"> Date of Transfer</td>
	  <td><input type="text" name="adate" class=" tcal" value="<?php echo date('d-m-Y'); ?>"/></td>
</tr>
<tr>	
	  <td class="label1"> Time</td>
	  <td><input type="text" name="time" id="time" class="text"  required /></td>
</tr>
<tr>
<td class="label1"><div align="right">Patient Name : </div></td>
	<td>
		<input type="text" name="pname" class="text" id="pname" placeholder="Enter Patient Name"  required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Mobile No : </div></td>
	<td>
		<input type="text" name="mno" class="text" id="mno" placeholder="Enter Mobile No"  required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Age : </div></td>
	<td>
		<input type="text" name="age" class="text" id="age" placeholder="Enter Age"  required/>
        <input type="hidden" name="user" class="text" id="user" value="<?php echo $aname; ?>"  required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Sex : </div></td>
	<td>
		<input type="text" name="sex" class="text" id="sex" placeholder="Enter Sex"  required/>
	  </td>
	
  </tr>
   <tr>
<td class="label1"><div align="right">Transfer From : </div></td>
	<td>
		<input type="text" name="transferfrom" class="text" id="transferfrom" placeholder="Enter transferfrom" value="Majestic Hospital"  required/>
	  </td>
	
  </tr>
   <tr>
<td class="label1"><div align="right">Transfer To : </div></td>
	<td>
		<input type="text" name="transferto" class="text" id="transferto" placeholder="Enter transferto"  required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Reasonfor Transfer/Discharge/Lama : </div></td>
	<td>
		<textarea  name="reason" class="text" id="reason" rows="5" cols="35" ></textarea>
	  </td>
	
  </tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='referalpatientslist.php'"/></td><td></td></tr></table>
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