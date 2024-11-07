<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Header & Footer test</title>
<script language="JavaScript" type="text/javascript">


function prnt(){
	

document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
.styled-button-2 {
	 background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: auto;
	padding-top:120px;
	font:"Times New Roman", Times, serif;
	font-size:12px;
  
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
	
}
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
		width:450px;
    }
</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="self.location='view_medicalcertificate.php';"/>
								</div>
<div class="book">
 <div class="page">
        <div class="subpage">
      	
<?php
ob_start();
include("config.php");
//if(isset($r['submit'])){
//error_reporting(E_ALL);
$mr=$_GET['id'];
$sq=mysqli_query($link,"select * from `form4a` where id='$mr'")or die(mysqli_error($link));
while($r=mysqli_fetch_array($sq)){
$mrno = $r['mrno'];
$hosname = $r['hosname'];
$wrdno=$r['wrdno'];
$pttime = $r['pttime'];
$nmdec=$r['nmdec'];

$gender=$r['gender'];

$one_year_more=$r['one_year_more'];
$one_year_less=$r['one_year_less'];
//$fdate1=$r['fdate'];
//$fdate=date('Y-m-d',strtotime($fdate1));
//$tdate1=$r['tdate'];
//$tdate=date('Y-m-d',strtotime($tdate1));
$one_month = $r['one_month'];
$one_day = $r['one_day'];
$office=$r['office'];
$nmdec1 = $r['nmdec1'];
$intbet=$r['intbet'];
$immcase=$r['immcase'];
$antcase=$r['antcase'];
$other=$r['other'];
$death=$r['death'];
//$fdate=date('Y-m-d',strtotime($fdate1));
$injury=$r['injury'];
//$tdate=date('Y-m-d',strtotime($tdate1));
$preg = $r['preg'];
$delivry = $r['delivry'];
$verify=$r['verify'];
$pname = $r['pname'];
$fname=$r['fname'];
$doct=$r['doct'];
$hospi=$r['hospi'];
//$user=$r['user'];
$fdate1=$r['fdate'];
$fdate=date('Y-m-d',strtotime($fdate1));
$tdate1=$r['tdate'];
$tdate=date('Y-m-d',strtotime($tdate1));
$ro=$r['ro'];


}
?><br/>
        <h1 align="center">MEDICAL CERTIFICATE OF CAUSE OF DEATH (4A)</h1>
         <h3 align="center">(for non-institutions deaths.Not to be used for still births)
</br>To be sent to Registrar along with Form No. 2 (Death Report)
        <div>
        
      <table width="100%" cellspacing="10" align="center">

<tr>	
	  <td class="label1"> UMR No</td>
	  <td><?php echo $mrno?>
      <input type="hidden" name="user" class=" text"  id="user" value="<?php  echo $aname?>"/></td>
</tr>
</table>

<table align="center" cellpadding="0" cellspacing="5px">
<tr><td>Name of Hospital:<input type="text" class="text-line" value="<?php echo $hosname?>" style="width:500px" id="hosname" name="hosname"></td></tr>
<tr><td>I hereby certify that the person whose particulars are given below died in the hospital</td></tr> 
<tr>
<td>in Ward No.:<input type="text" id="wrdno" value="<?php echo $wrdno?>" class="text-line"  name="wrdno">On at:
<input type="time" id="pttime" class="text-line" value="<?php echo $pttime?>"  name="pttime"></td>
</tr>
</table>
<br/>
<div>NAME OF DECEASED:<input type="text"style="width:200px" id="nmdec"  value="<?php echo $nmdec?>" class="text-line"  name="nmdec"></div>
<br/>
<table border="1" align="center"  width="100%" cellpadding="0" cellspacing="0" >

     <tr>
         <th>Sex</th>
         
         <th colspan="4">Age at Death</th>
		
		 
		 <th style="height:30px"  colspan="2">For use of Statistical Office</th>
    </tr>
    <tr>
         <td><?php if($gender=='male'){?> 
		 <input type="radio" name="gender" checked="checked" value="male" > Male
          <input type="radio" name="gender" value="female"> Female
         
         <?php } else if($gender=='female'){?>
         <input type="radio" name="gender"  value="male" > Male
         <input type="radio" name="gender" checked="checked" value="female"> Female
         
         <?php }?>
		 </td>
		 
		 <td>If 1 year or more,age in years</td>
		 <td>If less than 1 year,age in months</td>
         <td>If less than one month,age in Days</td>
         <td>If less than oneday, age in Hours</td>
<!--<td></td>-->
    </tr>
	<tr>
<td style="height:50px;">&nbsp;</td><td>
<textarea name="one_year_more"><?php echo $one_year_more?></textarea>
</td><td>
<textarea name="one_year_less"><?php echo $one_year_less?></textarea>
</td><td>
<textarea name="one_month"><?php echo $one_month?></textarea>
</td><td>
<textarea name="one_day"><?php echo $one_day?></textarea>
</td>
<td >
<textarea name="office"><?php echo $office?></textarea>
</td>
</tr>
</table>
<table><tr><td></td></tr></table>
<table border="1" align="center"  width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>CAUSE OF DEATH:<input type="text" id="nmdec1" class="text-line" style="width:300px"  value="<?php echo $nmdec1?>"  name="nmdec1"></td>
<td>Interval between on set & death approx :</td><td>
<input type="text" id="intbet" class="text-line"  value="<?php echo $intbet?>" style="width:300px"name="intbet"></td>
</tr>

<tr>
<td><b>I.
Immediate cause</b><br/>
State the disease,
injury or complication which caused death,<br/>
not the mode of dying such as heart failure, asthenia etc.</td>
<td>(a):<br/>Due to (or as a consequences of)</td><td>
<input type="text" id="immcase" class="text-line"  value="<?php echo $immcase?>" style="width:300px"name="immcase"></td>
</tr>

<tr>
<td>
<b>Antecedent cause</b><br/>
Morbid conditions, if any, giving rise to the
above Cause, stating underlying condition last</td>
<td>(b):<br/>Due to (or as a consequences of)</td><td>
<input type="text" id="antcase" class="text-line" value="<?php echo $antcase?>"  style="width:300px"name="antcase"></td>
</tr>

<tr>
<td><b>II.</b><br/>
Other significant conditions contributing to the
death but not related to the disease or
conditions causing II</td>
<td>(c):</td><td><input type="text" id="other" class="text-line" value="<?php echo $other?>" style="width:300px"name="other"></td>
</tr>
</table>
<br/>
<hr/>
<div>
Manner of Death:
<?php if($death=='Natural'){?>
<input type="radio" name="death" checked="checked" value="Natural"id="dnat"> Natural
<input type="radio" name="death" value="Accident"id="dacc"> Accident
	 <input type="radio" name="death" value="Suicide" id="dsuc"> Suicide
	 <input type="radio" name="death" value="Homicide" id="dhom"> Homicide
	 <input type="radio" name="death" value="Pending" id="dpend"> Pending Investigation


<?php } else if($death=='Suicide') {?>
     <input type="radio" name="death" value="Accident"id="dacc"> Accident
	 <input type="radio" name="death" checked="checked" value="Suicide" id="dsuc"> Suicide
	 <input type="radio" name="death" value="Homicide" id="dhom"> Homicide
	 <input type="radio" name="death" value="Pending" id="dpend"> Pending Investigation
     <?php } else if($death=='Homicide') {?>
     
      <input type="radio" name="death" value="Accident"id="dacc"> Accident
	 <input type="radio" name="death" value="Suicide" id="dsuc"> Suicide
	 <input type="radio" name="death" checked="checked" value="Homicide" id="dhom"> Homicide
	 <input type="radio" name="death" value="Pending" id="dpend"> Pending Investigation
     <?php } else if($death=='Pending') {?>
      <input type="radio" name="death" value="Accident"id="dacc"> Accident
	 <input type="radio" name="death" value="Suicide" id="dsuc"> Suicide
	 <input type="radio" name="death" value="Homicide" id="dhom"> Homicide
	 <input type="radio" name="death" checked="checked" value="Pending" id="dpend"> Pending Investigation
     <?php }?>
     
	 <br/>
How did the injury occur?<input type="text" id="injury" value="<?php echo $injury?>" class="text-line" style="width:300px"name="injury">
<div/>
<hr/>
<div>
If deceased was a female, was pregnancy the death associated with?
<?php if($preg=='Yes'){?>
<input type="radio" name="preg" checked="checked" value="Yes"id="prgyes"> Yes
<input type="radio" name="preg" value="No"id="prgno">No
<?php } else if($preg=='No') {?>
<input type="radio" name="preg"  value="Yes"id="prgyes"> Yes
<input type="radio" name="preg" checked="checked" value="No"id="prgno">No
<?php }?>
	 	 <br/>
If yes, was there a delivery?
<?php if($delivry=='Yes'){?>
<input type="radio" name="delivry" checked="checked" value="Yes"id="delyes"> Yes
<input type="radio" name="delivry" value="No"id="delno">No
<?php } else if($delivry=='No') {?>
<input type="radio" name="delivry" value="Yes"id="delyes"> Yes
<input type="radio" name="delivry" checked="checked" value="No"id="delno">No
<?php }?>
<div/>
<br/>


<div align="right">
Name and signature of the Medical Attendant certifying the cause of death </div>
<div align="right">Date of verification <input type="date" id="verify" class="text-line" value="<?php echo  $verify?>" name="verify">
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
 Sri/Smt <input type="text" name="pname" value="<?php echo $pname?>" class=" text-line"  id="pname"/>
<!--<select id="relation" name="relation">
<option >Select</option>
  <option value="son">S/o</option>
  <option value="wife">W/o</option>
 <option value="daughter">D/o</option>   
</select>-->

Son/ Daughter/ Wife of Shir<input type="text" name="fname" value="<?php echo $fname?>" class=" text-line"  id="fname"/>
<!--<input type="text" id="fname" class="text-line"name="fname">-->R/O<input type="text" id="ro" value="<?php echo $ro?>"  class="text-line"name="ro"></td><tr/>
<tr>
<td>was admitted to this hospital on 
<input type="text" name="fdate" class=" text-line" value="<?php echo  date('d-m-Y',strtotime($fdate));?>"   id="fdate"/>
and expired on <input type="text" name="tdate" class=" text-line tcal"  id="tdate" value="<?php echo  date('d-m-Y',strtotime($tdate));?>"/></td></tr>
</table>
</div>
<br/>
<br/>
<br/>
<br/>

<div align="right">
Doctor <input type="text" id="doct" class="text-line"name="doct" value="<?php echo $doct?>" ></div>
<div align="right">(Medical Supdt.)<br/>
Name of Hospital <input type="text" id="hospi" class="text-line" value="<?php echo $hospi?>"  name="hospi">
<div/>
        </div>
</body>
</html>