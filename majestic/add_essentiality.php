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
	
	document.getElementById("fdate").value=strar[1];
	
	document.getElementById("pname").value=strar[2];
	document.getElementById("fname").value=strar[3];
	
	
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
$fname = $_POST['fname'];
$emp=$_POST['emp'];
$suffer=$_POST['suffer'];
$fdate1=$_POST['fdate'];
$fdate=date('Y-m-d',strtotime($fdate1));
$tdate1=$_POST['tdate'];
$tdate=date('Y-m-d',strtotime($tdate1));
$hospital=$_POST['hospital'];
$hospital1=$_POST['hospital1'];
$sq="INSERT INTO essentiality(mrno,pname,fname,emp,suffer,fdate,tdate,user,cdate,hospital,hospital1)VALUES('$mrno','$pname','$fname','$emp','$suffer','$fdate','$tdate','$user',now(),'$hospital','$hospital1')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 

$id=mysqli_insert_id($link);
$count=count($_POST['medicine']);
for($i=0;$i<$count;$i++){
	$medicine = $_POST['medicine'][$i];
$price = $_POST['price'][$i];
if($medicine!=''){
$sql1 = mysqli_query($link,"insert into essentiality1(id1, medicine,price) values('$id','$medicine','$price')")or die(mysqli_error($link));

}
}
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='essentiality_print.php?id=$id';";
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
		  
          <h1 style="color:red;" align="center">ADD ESSENTIALITY CERTIFICATE </h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">

<tr>	
	  <td class="label1"> UMR No</td>
	  <td><input type="text" name="mrno" class=" text"  id="mrno" onfocus="showHint52(this.value);"/>
      <input type="hidden" name="user" class=" text"  id="user" value="<?php  echo $aname?>"/></td>
</tr>
</table>
<div align="left">I Certify that Mrs. / Mr. / Miss <input type="text" name="pname" class=" text-line"  id="pname"/>Wife / Son /Daughter
of Mr/Mrs<input type="text" name="fname" class=" text-line"  id="fname"/>employed in the<input type="text" name="emp" class=" text-line"  id="emp"/>has been under my treatment for<input type="text" name="suffer" class=" text-line"  id="suffer"/>diseases from<input type="text" name="fdate" class=" text-line"  id="fdate"/>to<input type="text" name="tdate" class=" text-line tcal" value="<?php  echo date('d-m-Y');?>"  id="tdate"/>at<input type="text" name="hospital" class=" text-line"  id="hospital"/>Hospital / my consulting room and that the under mentioned
medicine prescribed by me in this connection were essential for the recovery / prevention of
serious deterioration the condition of the patient . The Medicines are not stocked in the<input type="text" name="hospital1" class=" text-line"  id="hospital1"/>Hospital ( for supply to patients) and do not include proprietary
preparations for which cheaper substance of equal therapeutic value are available or
preparations which are primarily foods, toilets of disinfectants.





</div>
<table width="300" align="center">
<tr>
<th >Name of Medicines</th>
<td></td>
<th >Price</th>
</tr>
<tr>
<td><input type="text" name="medicine[]" id="medicine" class="text-line"/></td>
<td></td>
<td><input type="text" name="price[]" id="price" class="text-line"/></td>
</tr>
<tr>
<td><input type="text" name="medicine[]" id="medicine" class="text-line"/></td>
<td></td>
<td><input type="text" name="price[]" id="price" class="text-line"/></td>
</tr>
<tr>
<td><input type="text" name="medicine[]" id="medicine" class="text-line"/></td>
<td></td>
<td><input type="text" name="price[]" id="price" class="text-line"/></td>
</tr>
<tr>
<td><input type="text" name="medicine[]" id="medicine" class="text-line"/></td>
<td></td>
<td><input type="text" name="price[]" id="price" class="text-line"/></td>
</tr>
<tr>
<td><input type="text" name="medicine[]" id="medicine" class="text-line"/></td>
<td></td>

<td><input type="text" name="price[]" id="price" class="text-line"/></td>
</tr>
</table>

<table width="600">
  
 
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='view_essentiality.php'"/></td><td></td></tr></table>
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