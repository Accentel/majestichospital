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
    padding-left: 1.9cm;
	padding-right: 1.9cm;
	padding-bottom: 1.9cm;
	padding-top: 1.1cm;
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
	font-size:14px;
  
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
		width:80px;
    }
</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="patient-reg.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
                                <?php 
include("config.php");
$id=$_GET['patno'];

$sql=mysql_query("select a.registerno,a.patientname,a.age,a.gender,b.PAT_REGNO,b.PAT_NO,b.BED_NO,c.BED_NO,c.ROOM_NO,d.ROOMTYPE_ID,d.ROOMTYPE from `patientregister` a,ip_pat_admit b,bed_details c,roomtype d  where a.registerno=b.PAT_REGNO and b.BED_NO=c.BED_NO and c.ROOM_NO=d.ROOMTYPE_ID and  a.registerno='$id'");
$r=mysql_fetch_array($sql);


$registerno=$r['registerno'];
$PAT_NO=$r['PAT_NO'];
$pname=$r['patientname'];

$sex=$r['gender'];
$age=$r['age'];
$ROOMTYPE=$r['ROOMTYPE'];


$BED_NO=$r['BED_NO'];

  
?>








<div class="book">
    <div class="page">
        <div class="subpage">
        
       <table    border="0"  cellspacing="0">
        <tr>
<td><strong>UMR No</strong>  : <?php echo $registerno;  ?></td>
</tr>
<tr>
<td><strong>Patient No</strong>  : <?php echo $PAT_NO;  ?></td>
</tr>
<tr>
<td><strong>Pt.Name</strong> : <?php echo $pname;  ?> </td></tr>

<tr>
<td><strong>Age/Gender </strong>: <?php  echo $age."/". $sex ?></td>

</tr>
<tr>
<td><strong>Ward No/Bed No </strong>: <?php  echo $ROOMTYPE."/". $BED_NO ?></td>

</tr>


</table>
<hr/>
<h3 align="center">Pharmacy Card</h3>
 <table border="1" align="center"  width="100%" cellpadding="0" cellspacing="0" >
     <tr>
         <th style="width:20px;" rowspan="2">S.No</th>
         <th rowspan="2">Date</th>
		 <th rowspan="2">Time</th>
		 <th rowspan="2">Tab/<br/>Syp/<br/>Inj</th>
         <th rowspan="2" style="width:230px;">Name of the Drug</th>
          <th  rowspan="2">Qty</th>
		 <th  rowspan="2">Dose</th>
		 <th rowspan="2">IV/IM/<br/>SC/PO/</br>RT</th>
         <th colspan="6">Timmings</th>
		 <th rowspan="2" style="width:100px;">Sign</th>
    </tr>
    <tr>
         
		 <th>Morn</th>
		 <th>Sig</th>
		 <th>noon</th>
		 <th>Sig</th>
		 <th>Eve/Night</th>
		 <th>Sig</th>
		
    </tr>
    <?php 
	$rs="select * from pharmacycard where mrno='$registerno'";
	$t=mysql_query($rs) or die(mysql_error());
	$i=1;
	while($ts=mysql_fetch_array($t)){
	
	 ?>
	<tr>
<td style="height:30px;"><?php echo $i; ?></td>
<td><?php echo $ts['date']; ?></td>
<td><?php echo $ts['time']; ?></td>
<td><?php echo $ts['type']; ?></td>
<td><?php echo $ts['name']; ?></td>
<td><?php echo $ts['qty']; ?></td>
<td><?php echo $ts['dose']; ?></td>
<td><?php echo $ts['ivim']; ?></td>
<td><?php echo $ts['morning']; ?></td>
<td><?php echo $ts['sign']; ?></td>
<td><?php echo $ts['afternoon']; ?></td>
<td><?php echo $ts['sign1']; ?></td>
<td><?php echo $ts['evening']; ?></td>
<td><?php echo $ts['sign2']; ?></td>
<td><?php echo $ts['signature']; ?></td>

</tr>

<?php $i++;}?>


</table>

     
        </div>    
    </div>
    
</div>
</body>
</html>