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
	document.getElementById("age").value=strar[4];
	
	
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search567.php?q="+str,true);
xmlhttp.send();
}
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
	
	document.getElementById("pname").value=strar[1]; 	
	
    }
  }         
  str = encodeURIComponent(str);
xmlhttp.open("GET","get-data1.php?q="+str,true);
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
include("config.php");
//ob_get_flush();
$id=$_GET['id'];
$sq=mysqli_query($link,"select * from birth_cert where id='$id'")or die(mysqli_error($link));
while($r=mysqli_fetch_array($sq)){
 $rnum=$r['mrnum'];
//$admin = $_SESSION['name1'];

//$BIRTH_CER=$_REQUEST['BIRTH_CER'];

$wife=$r['wife'];
$motaddress=$r['motaddress'];
$po=$r['po'];
$ps=$r['ps'];
$Dist=$r['Dist'];
$weight=$r['weight'];
$delby=$r['delby'];
$sex=$r['sex'];
$BirthDate=date('d-m-Y ',strtotime($r['BirthDate']));
$pname=$r['pname'];
$time=$r['time1'];
	
		}

	
?>
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
		  <div id="centre" style="height:auto;">
		  
          <h1 style="color:red;" align="center">EDIT BIRTH CERTIFICATE  </h1>
          
                      <form name="frm" method="post" action="edit_birth.php">
  <input type="hidden" name="id" value="<?php echo $id?>" />

<table width="100%" cellspacing="10" align="center">
<tr><td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="reg" class="text"  value="<?php echo $rnum?>"
 onclick="window.open('finalbill_popup8.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" />
Patient Name. <font color="red">*</font> : 
<input type="text" name="pname" value="<?php echo $pname?>" id="pname" class="text" /></td></tr>

<tr><td class="label1">Wife Of : <font color="red">*</font> : </td>
<td>
	 <input name="wife" id="wife" value="<?php echo $wife?>" type="text" class="text"  size="30"/>
</td>
</tr>
 
<tr>	
	  <td class="label1">Address: </td>
	  <td>  <textarea name="motaddress" cols="30" id="motaddress" rows="2" class="textarea1" readonly="readonly" ><?php echo $motaddress?>
      </textarea></td>
</tr>

<tr>
<td class="label1"><div align="right">P.O: </div></td>
	<td>
		   <input name="po" value="<?php echo $po?>" id="po" type="text" class="text" />
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">P.S:</div></td>
	<td>
	 <input name="ps" id="ps" value="<?php echo $ps?>" type="text" class="text" />
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Dist:</div></td>
	<td>
		 <input name="Dist" id="Dist" value="<?php echo $Dist?>" type="text" class="text" />
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Baby Weight : </div></td>
	<td>
		<input name="weight" id="weight" value="<?php echo $weight?>" type="text" class="text" />
	  </td>
	
  </tr>
  
  
  
  
  
  
  
  
  
  
<tr>
<td class="label1"><div align="right">Delivered By: </div></td>


	<td>
    <?php if($delby=='Sygering'){?>
    
		   <input type="radio" name="delby" id="delby1" value="Sygering" checked="checked" />Sygering
            <input type="radio" name="delby" value="normal" id="delby2" />
                                        Normal Delivary<?php } if($delby=='normal'){?>
                                        
                                        
                                          <input type="radio" name="delby" id="delby1" value="lscs" />LSCS
            <input type="radio" name="delby" value="normal" id="delby2" checked="checked"/>
                                        Normal Delivary
                                        <?php }?>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Sex:</div></td>
	<td>
    
    <?php if($sex=='Male'){?>
	<input type="radio" name="sex" value="Male"  id="Male" checked="checked"/>
                                      Male
                                        <input type="radio" name="sex" value="Female"  id="Female"  />
                                        Female<?php } else if($sex=='Female'){?>
                                        
                                        
                                        <input type="radio" name="sex" value="Male"  id="Male" checked="checked"/>
                                      Male
                                        <input type="radio" name="sex" value="Female" checked="checked"  id="Female"  />
                                        Female<?php }?>
	  </td>
	
  </tr>
  <tr>
<td class="label1"><div align="right">Birth Date:</div></td>
	<td>
		<input type="text" name="BirthDate" id="BirthDate" class="tcal" value="<?php echo $BirthDate?>" readonly />
	  </td>
	
  </tr>
 <tr>
<td class="label1"><div align="right">Birth Time:</div></td>
	<td>
		<input type="time" value="<?php echo $time?>" name="time" id="time"   />
	  </td>
	
  </tr>
  
  

  
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;
<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='birth_cert.php'"/></td><td></td></tr></table>
	           </form>        
	 <?php
 include("config.php");
//ob_get_flush();

if(isset($_POST['submit'])){
//$patno=$_SESSION['patno'];
 $rnum=$_REQUEST['rnum'];
//$admin = $_SESSION['name1'];

//$BIRTH_CER=$_REQUEST['BIRTH_CER'];

$wife=$_REQUEST['wife'];
$motaddress=$_REQUEST['motaddress'];
$po=$_REQUEST['po'];
$ps=$_REQUEST['ps'];
$Dist=$_REQUEST['Dist'];
$weight=$_REQUEST['weight'];
$delby=$_REQUEST['delby'];
$sex=$_REQUEST['sex'];
$pname=$_REQUEST['pname'];
$id=$_POST['id'];
$time=$_POST['time'];
$BirthDate=date('Y-m-d h:i:s',strtotime($_REQUEST['BirthDate']));
//$rs=mysqli_query("select id from casesheet_birth_certificate where pat_no='$patno'");
echo $d="update birth_cert set
	wife='$wife',po='$po',ps='$ps',Dist='$Dist',delby='$delby',sex='$sex',BirthDate='$BirthDate',mrnum='$rnum',weight='$weight',
	motaddress='$motaddress',`pname`='$pname',`time1`='$time' where id='$id'";
  $x=mysqli_query($link,$d)or die(mysqli_error($link)); 
	//$qry=mysqli_query($x);
		
		if($x){
			print "<script>";
	print "alert('Successfully Updated');";
	print "self.location='birth_cert.php';";
	print "</script>";
		}
	
		}

	
?>
        
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