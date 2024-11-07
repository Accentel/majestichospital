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
        <script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
<script>
$().ready(function() {
	$("#mrno").autocomplete("ipreg.php", {
		width: 150,
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
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("admitdate").value=strar[1];
	
	document.getElementById("pname").value=strar[2];
	document.getElementById("fname").value=strar[3];
	document.getElementById("age").value=strar[4];
	document.getElementById("time").value=strar[5];
	
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search567.php?q="+str,true);
xmlhttp.send();
}
</script>
	<style>
    .text-line {
        background-color: transparent;
        color: #000;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid red 1px;
        padding: 3px 10px;
    }
    </style>
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
$admitdate1 = $_POST['admitdate'];
$admitdate=date('Y-m-d',strtotime($admitdate1));
$pname=$_POST['pname'];
//$mno = $_POST['mno'];
$age=$_POST['age'];
$time=$_POST['time'];
$fname=$_POST['fname'];
$user=$_POST['user'];
$department=$_POST['department'];
$diagnosis=$_POST['diagnosis'];
$id1=$_POST['eid'];
$sq="update  emergencycertificate set mrno='$mrno',pname='$pname',fname='$fname',age='$age',date='$admitdate',time='$time',department='$department',user='$user',cdate=now(),diagnosis='$diagnosis' where eid='$id1'";
$qry=mysqli_query($link,$sq) or die(mysqli_error($link)); 
//$id=mysqli_insert_id();
if($qry){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='view_emergency.php';";
			print "</script>";

}
}else{
$id=$_REQUEST['id'];
$k=mysqli_query($link,"select * from emergencycertificate where eid='$id'") or die(mysqli_error($link));
$r=mysqli_fetch_array($k);
 $mrno=$r['mrno'];
$pname=$r['pname'];
$fname=$r['fname'];
$age=$r['age'];
$date1=$r['date'];
$date=date('d-m-Y',strtotime($date1));
$time=$r['time'];
$department=$r['department'];
$diagnosis=$r['diagnosis'];
$eid=$r['eid'];
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT EMERGENCY CERTIFICATE </h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">

<tr>	
	  <td class="label1"> UMR No</td>
	  <td><input type="text" name="mrno" class=" text"  id="mrno" value="<?php echo $mrno; ?>" onfocus="showHint52(this.value);"/></td>
</tr>

<tr>
<td class="label1"><div align="right">This is certify that : </div></td>
	<td>
		<input type="text" name="pname" class="text-line" id="pname" placeholder="Enter Patient Name" value="<?php echo $pname; ?>" required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">S/O,W/O,D/O : </div></td>
	<td>
		<input type="text" name="fname" class="text-line" id="fname" placeholder="Enter Patient Name" value="<?php echo $fname; ?>"  required/>
        <input type="hidden" name="eid" class="text-line" id="eid"  value="<?php echo $eid; ?>"  required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Age : </div></td>
	<td>
		<input type="text" name="age" class="text-line" id="age" placeholder="Enter Age" value="<?php echo $age?>" required/>
        <input type="hidden" name="user" class="text" id="user" value="<?php echo $aname; ?>"  required/>
	  </td>
	
  </tr>
   <tr>
<td class="label1"><div align="right">Department : </div></td>
	<td>
		<input type="text" name="department" class="text-line" id="department" value="<?php echo $department; ?>" placeholder="Enter Department"  required/>
       
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Admited Date: </div></td>
	<td>
		<input type="text" name="admitdate" class="text-line" id="admitdate" value="<?php echo $date; ?>" placeholder="Enter Date"  required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Time: </div></td>
	<td>
		<input type="text" name="time" class="text-line" id="time" placeholder="Enter Time" value="<?php echo $time; ?>"  required/>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">The Provigional Diagnosis is : </div></td>
	<td>
		<textarea rows="5" name="diagnosis" cols="30"><?php echo $diagnosis; ?></textarea>
	  </td>
	
  </tr>
 
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='view_emergency.php'"/></td><td></td></tr></table>
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