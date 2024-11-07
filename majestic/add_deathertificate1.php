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
//error_reporting(E_ALL);
$mrno = $_POST['mrno'];
$hosname = $_POST['hosname'];
$wrdno=$_POST['wrdno'];
$pttime = $_POST['pttime'];
$nmdec=$_POST['nmdec'];

$gender=$_POST['gender'];

$one_year_more=$_POST['one_year_more'];
$one_year_less=$_POST['one_year_less'];
//$fdate1=$_POST['fdate'];
//$fdate=date('Y-m-d',strtotime($fdate1));
//$tdate1=$_POST['tdate'];
//$tdate=date('Y-m-d',strtotime($tdate1));
$one_month = $_POST['one_month'];
$one_day = $_POST['one_day'];
$office=$_POST['office'];
$nmdec1 = $_POST['nmdec1'];
$intbet=$_POST['intbet'];
$immcase=$_POST['immcase'];
$antcase=$_POST['antcase'];
$other=$_POST['other'];
$death=$_POST['death'];
//$fdate=date('Y-m-d',strtotime($fdate1));
$injury=$_POST['injury'];
//$tdate=date('Y-m-d',strtotime($tdate1));
$preg = $_POST['preg'];
$delivry = $_POST['delivry'];
$verify=$_POST['verify'];
$pname = $_POST['pname'];
$fname=$_POST['fname'];
$doct=$_POST['doct'];
$hospi=$_POST['hospi'];
//$user=$_POST['user'];
$fdate1=$_POST['fdate'];
$fdate=date('Y-m-d',strtotime($fdate1));
$tdate1=$_POST['tdate'];
$tdate=date('Y-m-d',strtotime($tdate1));
$ro=$_POST['ro'];


  
  
  
  
$sq="INSERT INTO `form4`( `mrno`, `hosname`, `wrdno`, `pttime`, `nmdec`, `gender`, `one_year_more`, `one_year_less`,
 `one_month`, `one_day`, `office`, `nmdec1`, `intbet`, `immcase`, `antcase`, `other`, `death`, `injury`, `preg`,
  `delivry`, `verify`, `pname`, `fname`, `fdate`, `tdate`, `doct`, `hospi`,`ro`) 
  VALUES ('$mrno', '$hosname', '$wrdno', '$pttime', '$nmdec', '$gender', '$one_year_more', '$one_year_less',
 '$one_month', '$one_day', '$office', '$nmdec1', '$intbet', '$immcase', '$antcase', '$other', '$death', '$injury', '$preg',
  '$delivry', '$verify', '$pname', '$fname', '$fdate', '$tdate', '$doct', '$hospi','$ro')";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
$id=mysqli_insert_id();
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='view_deathcertificate1.php?id=$id';";
			print "</script>";

}
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
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
		  
          <h1 style="color:red;" align="center">ADD MEDICAL CERTIFICATE OF CAUSE OF DEATH </h1>
          
                      <form name="frm" method="post" action="">
  <h3 align="center">(Hospital in-patients. Not to be used for still births)
</br>To be sent to Registrar along with Form No. 2 (Death Report)</h3>

<table width="100%" cellspacing="10" align="center">

<tr>	
	  <td class="label1"> UMR No</td>
	  <td><input type="text" name="mrno" class=" text"  id="mrno" onfocus="showHint52(this.value);"/>
      <input type="hidden" name="user" class=" text"  id="user" value="<?php  echo $aname?>"/></td>
</tr>
</table>

<table align="center" cellpadding="0" cellspacing="5px">
<tr><td>Name of Hospital:<input type="text" class="text-line" value="Durga Hopsital" style="width:500px" id="hosname" name="hosname"></td></tr>
<tr><td>I hereby certify that the person whose particulars are given below died in the hospital</td></tr> 
<tr>
<td>in Ward No.:<input type="text" id="wrdno" class="text-line"  name="wrdno">On at:
<input type="time" id="pttime" class="text-line"  name="pttime"></td>
</tr>
</table>
<br/>
<div>NAME OF DECEASED:<input type="text"style="width:200px" id="nmdec" class="text-line"  name="nmdec"></div>
<br/>
<table border="1" align="center"  width="100%" cellpadding="0" cellspacing="0" >

     <tr>
         <th>Sex</th>
         
         <th colspan="4">Age at Death</th>
		
		 
		 <th style="height:30px"  colspan="2">For use of Statistical Office</th>
    </tr>
    <tr>
         <td>
		 <input type="radio" name="gender" value="male" > Male
         <input type="radio" name="gender" value="female"> Female
		 </td>
		 
		 <td>If 1 year or more,age in years</td>
		 <td>If less than 1 year,age in months</td>
         <td>If less than one month,age in Days</td>
         <td>If less than oneday, age in Hours</td>
<!--<td></td>-->
    </tr>
	<tr>
<td style="height:50px;">&nbsp;</td><td>
<textarea name="one_year_more"></textarea>
</td><td>
<textarea name="one_year_less"></textarea>
</td><td>
<textarea name="one_month"></textarea>
</td><td>
<textarea name="one_day"></textarea>
</td>
<td >
<textarea name="office"></textarea>
</td>
</tr>
</table>
<table><tr><td></td></tr></table>
<table border="1" align="center"  width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>CAUSE OF DEATH:<input type="text" id="nmdec1" class="text-line" style="width:300px"  name="nmdec1"></td>
<td>Interval between on set & death approx :</td><td>
<input type="text" id="intbet" class="text-line" style="width:300px"name="intbet"></td>
</tr>

<tr>
<td><b>I.
Immediate cause</b><br/>
State the disease,
injury or complication which caused death,<br/>
not the mode of dying such as heart failure, asthma etc.</td>
<td>(a):<br/>Due to (or as a consequences of)</td><td>
<input type="text" id="immcase" class="text-line" style="width:300px"name="immcase"></td>
</tr>

<tr>
<td>
<b>Antecedent cause</b><br/>
Morbid conditions, if any, giving rise to the
above Cause, stating underlying condition last</td>
<td>(b):<br/>Due to (or as a consequences of)</td><td>
<input type="text" id="antcase" class="text-line" style="width:300px"name="antcase"></td>
</tr>

<tr>
<td><b>II.</b><br/>
Other significant conditions contributing to the
death but not related to the disease or
conditions causing II</td>
<td>(c):</td><td><input type="text" id="other" class="text-line" style="width:300px"name="other"></td>
</tr>
</table>
<br/>
<hr/>
<div>
Manner of Death:
<input type="radio" name="death" value="Natural"id="dnat"> Natural
     <input type="radio" name="death" value="Accident"id="dacc"> Accident
	 <input type="radio" name="death" value="Suicide" id="dsuc"> Suicide
	 <input type="radio" name="death" value="Homicide" id="dhom"> Homicide
	 <input type="radio" name="death" value="Pending" id="dpend"> Pending Investigation
	 <br/>
How did the injury occur?<input type="text" id="injury" class="text-line" style="width:300px"name="injury">
<div/>
<hr/>
<div>
If deceased was a female, was pregnancy the death associated with?
<input type="radio" name="preg" value="Yes"id="prgyes"> Yes
<input type="radio" name="preg" value="No"id="prgno">No
	 	 <br/>
If yes, was there a delivery?
<input type="radio" name="delivry" value="Yes"id="delyes"> Yes
<input type="radio" name="delivry" value="No"id="delno">No
<div/>
<br/>
<br/>
<br/>
<br/>
<div align="right">
Name and signature of the Medical Attendant certifying the cause of death </div>
<div align="right">Date of verification <input type="date" id="verify" class="text-line" name="verify">
<div/>
<hr/>
<div align="center">
(To be detached and handed over to the related of the deceased)
<br/><br/>
<table align="left">
<tr><td>
<div align="left"><input type="hidden" name="age" class=" text-line"  id="age"/>


</div></td></tr>

<tr><td>Certified that&nbsp;<!--<select id="certhat" name="certhat">
<option >Select</option>
  <option value="Shri">Shri</option>
  <option value="Smt">Smt</option>
 <option value="Km">Km</option>   
</select><input type="text" id="certi" class="text-line"name="certi">-->
 Sri/Smt <input type="text" name="pname" class=" text-line"  id="pname"/>
<!--<select id="relation" name="relation">
<option >Select</option>
  <option value="son">S/o</option>
  <option value="wife">W/o</option>
 <option value="daughter">D/o</option>   
</select>-->

Son/ Daughter/ Wife of Shir<input type="text" name="fname" class=" text-line"  id="fname"/>
<!--<input type="text" id="fname" class="text-line"name="fname">-->R/O<input type="text" id="ro" class="text-line"name="ro"></td><tr/>
<tr>
<td>was admitted to this hospital on 
<input type="text" name="fdate" class=" text-line"  id="fdate"/>
and expired on <input type="text" name="tdate" class=" text-line tcal"  id="tdate" value="<?php echo date('d-m-Y'); ?>"/></td></tr>
</table>
</div>
<br/>
<br/>
<br/>
<br/>

<div align="right">
Doctor <input type="text" id="doct" class="text-line"name="doct"></div>
<div align="right">(Medical Supdt.)<br/>
Name of Hospital <input type="text" id="hospi" class="text-line" name="hospi">
<div/><table width="600">
  
 
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;
<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='view_deathcertificate1.php'"/></td><td></td></tr></table>
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