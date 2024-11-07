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
		width:200px;
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
$mr=$_GET['adv_no'];
$sq=mysql_query("select * from birth_cert where mrnum='$mr'");
while($r=mysql_fetch_array($sq)){
$mrno = $r['mrnum'];
$wife=$r['wife'];
$motaddress=$r['motaddress'];
$po=$r['po'];
$ps=$r['ps'];
$Dist=$r['Dist'];
$weight=$r['weight'];
$delby=$r['delby'];
$sex=$r['sex'];
$pname=$r['pname'];
$id=$r['id'];
$BirthDate=date('d-m-Y',strtotime($r['BirthDate']));
$time=$r['time1'];



}
?><br/>
        <h1 align="center">BIRTH CERTIFICATE</h1>
        <hr>
       
        <div>
        
      <table width="100%" cellspacing="10" align="center">

<tr>	
	  <td class="label1"> UMR No:   <?php echo $mrno?>
      <input type="hidden" name="user" class=" text"  id="user" value="<?php  echo $aname?>"/></td>
</tr>
</table>

<table align="center" cellpadding="0" cellspacing="5px">
<tr><td>This is to certify that Smt<input type="text" style="width:200px;" class="text-line" readonly  value="<?php echo $pname?>" id="Patname" name="Patname">
W/o <input type="text" class="text-line" placeholder="W/o" value="<?php echo $wife?>" id="wifeof" name="wifeof">
Residence <input type="text" class="text-line" style="width:500px;" readonly value="<?php echo $motaddress?>" placeholder="Address" id="resof" name="resof"></td></tr>
<tr>
<td><input type="text" id="patmandal" class="text-line"  readonly value="<?php echo $po?>" readonly name="patmandal">Mandal of
<input type="text" id="patdist"  readonly class="text-line" value="<?php echo $Dist?>"  name="patdist">District.
She has deliverd a
 <input type="text" class="text-line" style="width:100px;" value="<?php echo $sex?>" id="wifeof" name="wifeof">

                                   
Baby  on Date <input type="text" class="text-line" style="width:150px;" name="txtdelvrydt" id="txtdelvrydt" value="<?php echo $BirthDate?>">
at <input type="time" class="text-line" style="width:150px;" value="<?php echo $time?>" name="txtdelvrytym" id="txtdelvrytym"> in undergone
<!-- <input type="radio" name="delivery" value="Normal" >Normal
<input type="radio" name="delivery" value="Sygering"> Sygering at --> 


<input type="text" class="text-line" value="<?php echo $delby?>"  style="width:150px;" id="wifeof" name="wifeof">

  at 
<b>Durga Hospital</b>.</td></tr>
<tr><td>Weight of baby:<input type="text" class="text-line"  readonly value="<?php echo $weight?>" placeholder="baby weight " id="babywt" name="babywt"> </td></tr>

</table><br/><br/>
<div align="Center"> <b>Hence Certified</b></div>
<br/><br/>

<div align="right"><h3> <b>Signature of Doctor<b/><h3/></div>
</div>


        </div>
</body>
</html>