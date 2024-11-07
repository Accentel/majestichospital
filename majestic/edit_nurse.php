<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
	$aname = $_SESSION['name1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header.php");
	?>
    <div id="conteneur">

		  <?php include('logo.php'); ?>
			<?php
			include("main_menu.php");
			?>
	
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
 <script>
$().ready(function() {
	$("#reg").autocomplete("advreg.php", {
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
	</head>

	<body>
	
	<?php /*?><div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php
			include("main_menu.php");
			?><?php */?>
		  
		
  <script>
function showHint22(str)
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
	
	document.getElementById("nurcon").value=strar[1];
	
    }
  }
xmlhttp.open("GET","search4.php?q="+str,true);
xmlhttp.send();
}
</script>


<?php
include("config.php");
 $id=$_GET['id'];
  $qs="select a.name,a.mobile,a.place,a.time,a.shift,b.EMP_CODE,b.EMP_NAME from `nurs_duty` a,hr_emp b
  where a.id='$id' and b.EMP_CODE=a.name";
$sq=mysql_query($qs);
while($r=mysql_fetch_array($sq)){

	 $nurname=$r['name'];
	$nurcon=$r['mobile'];
	$nurplc=$r['place'];
	$dtytiming=$r['time'];
	$dtyshft=$r['shift'];	
	$EMP_NAME=$r['EMP_NAME'];
	
}
?> 

		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">EDIT NURSE DUTIES</h1>
          
                      <form name="myform" method="post" action="">
                
<table  cellpadding="5" align="center" >
<tr><td>Name of Nurse:</td>
<td><select id="nurname" name="nurname" onchange="showHint22(this.value);">
<option value="<?php echo $nurname?>" ><?php echo $EMP_NAME?></option>
<?php 
$sqls=mysql_query("SELECT * FROM hr_emp where dept_code='4'");
				
		
				$tot=mysql_num_rows($sqls);
				while($row=mysql_fetch_array($sqls)){
				$eid=$row['EMP_CODE'];
				 $rk=$row['EMP_NAME'];?>
<option value="<?php echo $eid?>"><?php echo $rk?></option>
<?php }?>
</select> </td>
</tr>
<tr><td>Nurse Contact No.:</td>
<td><input type="text" id="nurcon" value="<?php echo $nurcon?>" readonly="readonly" name="nurcon"></td>
</tr>

<tr><td>Duty Place:</td>
<td><select id="nurplc" name="nurplc">
<option value="<?php echo $nurplc?>" ><?php echo $nurplc?></option>

<?php 
$sqls=mysql_query("SELECT * FROM roomtype");
				
		
				$tot=mysql_num_rows($sqls);
				while($row=mysql_fetch_array($sqls)){
				//$eid=$row['EMP_CODE'];
				 $rk=$row['ROOMTYPE'];?>
<option value="<?php echo $rk?>"><?php echo $rk?></option>
<?php }?>

</select>
 </td>
</tr>
<tr><td>Duty Timings:</td>
<td><select id="dtytiming" name="dtytiming">
<option value="<?php echo $dtytiming?>" ><?php echo $dtytiming?></option>
  <option value="9am6pm">9Am-6Pm</option>
<option value="11am8pm">11Am-8Pm</option> 
<option value="9am4pm">9Am-4Pm</option> 
</select></td>
</tr>
<tr><td>Duty Shifts:</td>
<td><select id="dtyshft" name="dtyshft">
<option value="<?php echo $dtyshft?>"><?php echo $dtyshft?></option>
  <option value="Morning">Morning</option>
<option value="Afternoon">Afternoon</option> 
<option value="Night">Night</option> 
</select></td>
</tr>
</table>
<br/>

									<!--Treatment HISTORY Script  -->
<input type="hidden" name="id" value="<?php echo $id?>" />

<table align="center">
    
            

<tr><td colspan="2" width="400"></td><td  align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='int_det5.php'"/></td></tr></table>
 </form>         
		       </div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>
<?php if(isset($_POST['submit'])){
	
	$nurname=$_POST['nurname'];
	$nurcon=$_POST['nurcon'];
	$nurplc=$_POST['nurplc'];
	$dtytiming=$_POST['dtytiming'];
	$dtyshft=$_POST['dtyshft'];
	$d=date('Y-m-d');
	$id=$_POST['id'];
	$sq=mysql_query("update  `nurs_duty` set `name`='$nurname', `mobile`='$nurcon', `place`='$nurplc',
	 `time`='$dtytiming', `shift`='$dtyshft' where id='$id'");
		
		if($sq){
			print "<script>";
	print "alert('Successfully added');";
	print "self.location='int_det5.php';";
	print "</script>";
		}
	
}?>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>