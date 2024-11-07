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
$fname = $_POST['fname'];
$emp=$_POST['emp'];
$suffer=$_POST['suffer'];
$fdate1=$_POST['fdate'];
$fdate=date('Y-m-d',strtotime($fdate1));
$tdate1=$_POST['tdate'];
$tdate=date('Y-m-d',strtotime($tdate1));
$hospital=$_POST['hospital'];
$hospital1=$_POST['hospital1'];
$id11=$_POST['id10'];
$sq="update essentiality set mrno='$mrno',pname='$pname',fname='$fname',emp='$emp',suffer='$suffer',fdate='$fdate',tdate='$tdate',user='$user',cdate=now(),hospital='$hospital',hospital1='$hospital1' where id='$id11'";
mysqli_query($link,$sq) or die(mysqli_error($link)); 

//$id=mysqli_insert_id();
$count=count($_POST['medicine']);
for($i=0;$i<$count;$i++){
	$medicine = $_POST['medicine'][$i];
	$id4 = $_POST['id3'][$i];
$price = $_POST['price'][$i];
if($id4!=''){
$sql1 = mysqli_query($link,"update  essentiality1 set id1='$id11', medicine='$medicine',price='$price'  where esid='$id4'")or die(mysqli_error($link));

}else{
	if($medicine!=''){
	$sql1 = mysqli_query($link,"insert into essentiality1(id1, medicine,price) values('$id11','$medicine','$price')")or die(mysqli_error($link));
	}
}
}
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='view_essentiality.php';";
			print "</script>";

}
else{
mysqli_error();}
}else{
	$id=$_REQUEST['id'];
		$q=mysqli_query($link,"select * from essentiality where id='$id'") or die(mysqli_error($link));
		$row=mysqli_fetch_array($q);
		$pname=$row['pname'];
		$fname=$row['fname'];
		$emp=$row['emp'];
		$suffer=$row['suffer'];
		$mrno=$row['mrno'];
		$fdate=$row['fdate'];
		$tdate=$row['tdate'];
		$hospital=$row['hospital'];
		$hospital1=$row['hospital1'];
	$id10=$row['id'];
	
	
	}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT ESSENTIALITY CERTIFICATE </h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">

<tr>	
	  <td class="label1"> UMR No</td>
	  <td><input type="text" name="mrno" class=" text"  id="mrno" value="<?php echo $mrno; ?>" onfocus="showHint52(this.value);"/>
      <input type="hidden" name="user" class=" text"  id="user" value="<?php  echo $aname?>"/>
      <input type="hidden" name="id10" class=" text"  id="id10" value="<?php  echo $id10?>"/>
      </td>
</tr>
</table>
<div align="left">I Certify that Mrs. / Mr. / Miss <input type="text" name="pname"   value="<?php echo $pname; ?>" class=" text-line"  id="pname"/>Wife / Son /Daughter
of Mr/Mrs<input type="text" name="fname"  value="<?php echo $fname; ?>" class=" text-line"  id="fname"/>employed in the<input type="text" name="emp" class=" text-line"  id="emp"  value="<?php echo $emp; ?>"/>has been under my treatment for<input type="text" name="suffer" class=" text-line"  id="suffer"  value="<?php echo $suffer; ?>"/>diseases from<input type="text" name="fdate" class=" text-line"  id="fdate"  value="<?php echo $fdate; ?>"/>to<input type="text"  value="<?php echo $tdate; ?>" name="tdate" class=" text-line"  id="tdate"/>at<input type="text" name="hospital" class=" text-line"  id="hospital"  value="<?php echo $hospital; ?>"/>Hospital / my consulting room and that the under mentioned
medicine prescribed by me in this connection were essential for the recovery / prevention of
serious deterioration the condition of the patient . The Medicines are not stocked in the<input type="text"  value="<?php echo $hospital1; ?>" name="hospital1" class=" text-line"  id="hospital1"/>Hospital ( for supply to patients) and do not include proprietary
preparations for which cheaper substance of equal therapeutic value are available or
preparations which are primarily foods, toilets of disinfectants.





</div>
<table width="300" align="center">
<tr>
<th >Name of Medicines</th>
<td></td>
<th >Price</th>
</tr>
 <?php 
		$p=mysqli_query($link,"select * from essentiality1 where id1='$id'") or die(mysqli_error($link));
		while($rs=mysqli_fetch_array($p)){?>
			<tr>
        <td ><input type="text" name="medicine[]" id="medicine" class="text-line" value="<?php  echo $rs['medicine'];?>"/></td>
        <td><input type="hidden" name="id3[]" id="id3" class="text-line" value="<?php  echo $rs['esid'];?>"/></td>
        <td ><input type="text" name="price[]" id="price" class="text-line" value="<?php  echo $rs['price'];?>"/></td>
        </tr>
		<?php	}
		?>
<tr>
<td><input type="text" name="medicine[]" id="medicine" class="text-line"/></td>
<td><input type="hidden" name="id3[]" id="id3" class="text-line" value=""/></td>
<td><input type="text" name="price[]" id="price" class="text-line"/></td>
</tr>
<tr>
<td><input type="text" name="medicine[]" id="medicine" class="text-line"/></td>
<td><input type="hidden" name="id3[]" id="id3" class="text-line" value=""/></td>
<td><input type="text" name="price[]" id="price" class="text-line"/></td>
</tr>
<tr>
<td><input type="text" name="medicine[]" id="medicine" class="text-line"/></td>
<td><input type="hidden" name="id3[]" id="id3" class="text-line" value=""/></td>
<td><input type="text" name="price[]" id="price" class="text-line"/></td>
</tr>
<tr>
<td><input type="text" name="medicine[]" id="medicine" class="text-line"/></td>
<td><input type="hidden" name="id3[]" id="id3" class="text-line" value=""/></td>
<td><input type="text" name="price[]" id="price" class="text-line"/></td>
</tr>
<tr>
<td><input type="text" name="medicine[]" id="medicine" class="text-line"/></td>
<td><input type="hidden" name="id3[]" id="id3" class="text-line" value=""/></td>

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