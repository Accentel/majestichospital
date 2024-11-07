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
$user = $_POST['user'];
$pname=$_POST['pname'];
$dname = $_POST['dname'];
$dname1=$_POST['dname1'];
$dname2=$_POST['dname2'];
$suffer=$_POST['suffer'];
$mid=$_POST['mid'];



$sq="update  medicalfitness set mrno='$mrno',pname='$pname',dname='$dname',dname1='$dname1',dname2='$dname2',suffer='$suffer',user='$user',cdate=now()   where mid='$mid'";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
$id=mysqli_insert_id();
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='view_medicalfitness.php';";
			print "</script>";

}
else{
mysqli_error();}
}else{
$id=$_REQUEST['id'];
$k=mysqli_query($link,"select * from medicalfitness where mid='$id'") or die(mysqli_error($link));
$r=mysqli_fetch_array($k);
 $mrno=$r['mrno'];
 $pname=$r['pname'];
 $dname=$r['dname'];
$dname1=$r['dname1'];

$dname2=$r['dname2'];
$suffer=$r['suffer'];
$eid=$r['mid'];	
	
	
	
	
	}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT MEDICAL FITNESS </h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">

<tr>	
	  <td class="label1"> UMR No</td>
	  <td><input type="text" name="mrno" class=" text"  id="mrno" value="<?php echo $mrno; ?>" onfocus="showHint52(this.value);"/>
      <input type="hidden" name="user" class=" text"  id="user" value="<?php  echo $aname?>"/>
      <input type="hidden" name="mid" class=" text"  id="mid" value="<?php  echo $eid?>"/>
      </td>
</tr>
</table>
<div align="left">Signature of the Applicant <input type="text" name="pname" value="<?php echo $pname; ?>" class=" text-line"  id="pname"/>I,Dr.<input type="text" name="dname" class=" text-line"  id="dname" value="<?php echo $dname; ?>"/>do hereby certify that I have carefully examined Sri./Smt.<input type="text" name="dname1" class=" text-line"  id="dname1" value="<?php echo $dname1; ?>"/>of the<input type="text" name="dname2" class=" text-line"  id="dname2" value="<?php echo $dname2; ?>"/>who was suffering from<input type="text" name="suffer" class=" text-line"  id="suffer" value="<?php echo $suffer; ?>"/>and whose signature is given above, and find that he/she has recovered form his/her illness and is now fir to resume duties in Government service. I also certify that before arriving at this decision I have examined the original medical certificate(s) and statement(s) of the case (or certified copies thereof) on which leave was granted or extending, and have taken these in consideration in arriving at my decision.





</div><table width="600">
  
 
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='view_medicalfitness.php'"/></td><td></td></tr></table>
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