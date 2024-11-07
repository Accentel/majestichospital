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
    padding-top:0px;
	 padding-bottom: 1.5cm;
	  padding-left: 1.5cm;
	   padding-right: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:42px;
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

</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="discharge_view.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<div class="book">
    <div class="page">
        <div class="subpage">
        <?php 
include("config.php");
$id=$_GET['id'];
$k="select * from  adddischarge where  id='$id'";
$sql=mysqli_query($link,$k) or die(mysqli_error($link));
$r=mysqli_fetch_array($sql);

$mrno=$r['mrno'];
$patno=$r['patno'];
$pname=$r['pname'];
$relation=$r['relation'];
$age=$r['age'];
$sex=$r['sex'];
$admit1=$r['admit'];
$admit=date('Y-m-d',strtotime($admit1));
$discharge1=$r['discharge'];
$discharge=date('Y-m-d',strtotime($discharge1));
$dno=$r['dno'];
$doctor=$r['doctor'];
$finaldiagnosis=$r['diagnosis'];
$acondition=$r['acondition'];
$temp=$r['temp'];
$bp=$r['bp'];
$pr=$r['pr'];
$bp=$r['bp'];
$hl=$r['hl'];
$pa=$r['pa'];
$dgc=$r['dgc'];
$phistory=$r['phistory'];
$laboratory=$r['laboratory'];
$operativenotes=$r['operativenotes'];
$dtemp=$r['dtemp'];
$dbp=$r['dbp'];
$dpa=$r['dpa'];
$disadvice=$r['disadvice'];
$review=$r['review'];
$dothers=$r['dothers'];

?>


<h1 align="center">MAJESTIC HOSPITAL</h1>
<p align="center" style="font-size:15px;font-weight:bold;">Phone No:040-23521051,8341694595, Email:info@majestichospital.com</p>
<hr/>
<h1 align="center"><u>DISCHARGE SUMMARY</u></h1>
        <table    border="0"  cellspacing="0" width="100%">
        <tr>
<td style="width:50%;"><strong><u>MR NO</u></strong>  : <?php echo $mrno;  ?></td> 
<?php if($dno!=''){ ?><td><u>D.NO:</u><?php echo $dno ?></td><?}else{?> <td></td> <?php }?>
</tr>
<tr style="height:7px;"></tr>
<tr>
    <td><strong><u>PATIENT NAME</u></strong> : <?php echo $pname;  ?> </td>
    <td><strong><u>W/O</u></strong> : <?php echo $relation;  ?></td>
    </tr>
    <tr style="height:7px;"></tr>
    <tr>
       <td><strong><u>AGE/GENDER </u></strong>: <?php  echo $age."/". $sex."&nbsp;&nbsp;";?></td> 
<td><strong><u>IP No</u></strong> : <?php echo $patno;  ?> </td>

</tr>
<tr style="height:7px;"></tr>
<tr>
<td><strong><u>DOA</u></strong>  : <?php echo $admit;  ?></td>
<td><strong><u>DOD</u></strong>  : <?php echo $discharge;  ?></td>
</tr>
<tr style="height:7px;"></tr>
<tr>

<td><strong><u>TREATING DOCTOR</u></strong>  : <?php echo $doctor;  ?></td>
</tr>

<tr style="height:7px;"></tr>
</table>
 <div style="min-height:30px;"><strong><u>DIAGNOSIS:</u></strong><?php echo $finaldiagnosis ?> </div>
 <div style="min-height:40px;"><strong><u>CONDITION AT THE TIME OF ADMISSION:</u></strong><?php echo $acondition ?> </div>
 
 <div style="height:7px;"></div><div style="min-height:40px;"><strong><u>O/E:</u></strong>TEMP :<?php echo $temp; ?><br/>
 PR :<?php echo $pr; ?><br/>
 BP :<?php echo $bp; ?><br/>
 H/L :<?php echo $hl; ?><br/>
 P/A :<?php echo $pa; ?><br/>
 
 </div>
 <div style="height:7px;"></div>
   <div style="min-height:40px;"><strong><u>PAST HISTORY:</u></strong><?php echo $phistory ?></div>
   <div style="height:7px;"></div>
    <div style="min-height:40px;"><strong><u>LABORATORY INVESTIGATIONS:</u></strong><?php echo $laboratory ?></div>
    <div style="height:7px;"></div>
    <div style="min-height:40px;"><strong><u>OPERATIVE NOTES:</u></strong><?php echo $operativenotes ?></div> 
    <div style="height:7px;"></div>
     <div style="min-height:40px;"><strong><u>CONDITION AT THE TIME OF DISCHARGE:</u></strong><br/>
  GC :<?php echo $dgc; ?><br/>
  Temp :<?php echo $dtemp; ?><br/>
 BP :<?php echo $dbp; ?><br/>

 P/A :<?php echo $dpa; ?><br/>
  <?php echo $dothers; ?><br/>
 
 </div>
 <div style="height:7px;"></div>
      <div style="min-height:40px;"><strong><u>ADVICE AT DISCHARGE:</u></strong><?php echo $disadvice ?></div>  
       <div style="height:7px;"></div>
       <div style="min-height:40px;"><strong><u><?php echo $review ?></u></strong></div>
        <div style="height:30px;"></div>
        
        <div style="text-align:right;"><strong><u>D.M.O</u></strong></div>
        </div> 
        </div>   
       
    </div>
    
</div>





</body>
</html>