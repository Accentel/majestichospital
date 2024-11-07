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
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="opdigital_reg.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<div class="book">
    <div class="page">
        <div class="subpage">
        <?php 
include("config.php");
$id=$_GET['id'];
$k="select a.registerno,a.registerdate,a.ref_doc,a.validity,a.phoneno ,a.doctorname,a.con_doc_mob,a.ref_doc_mob,a.tokenno,a.rel_type,a.gaurdianname,b.pname,b.age,b.sex,b.mrno,b.reviewdate,b.optype,b.provisionaldiagnostics,b.consult_doct,b.finaldiagnostics,b.clinicalhistory,b.pulserate,b.repositoryrate,b.heart,b.lungs,b.pa,b.cns,b.localeximination,b.advices,b.bp,b.temperature,b.image from patientregister a,opdigitalform b  where  a.registerno=b.mrno and b.id='$id'";
$sql=mysql_query($k) or die(mysql_error());
$r=mysql_fetch_array($sql);

$provisionaldiagnostics=$r['provisionaldiagnostics'];
$finaldiagnostics=$r['finaldiagnostics'];
$clinicalhistory=$r['clinicalhistory'];
$pulserate=$r['pulserate'];
$bp=$r['bp'];
$temperature=$r['temperature'];
$repositoryrate=$r['repositoryrate'];
$heart=$r['heart'];
$lungs=$r['lungs'];

$pa=$r['pa'];
$cns=$r['cns'];
$localeximination=$r['localeximination'];
$advices=$r['advices'];
$image=$r['image'];


//$doct=$r['registerno'];
$mrno=$r['mrno'];
//$doct2=$r['tknum'];
$did=$r['doctorname'];
$pname=$r['pname'];
$fname=$r['gaurdianname'];
$sex=$r['sex'];
$age=$r['age'];
$mobile=$r['phoneno'];
$pat_type=$r['optype'];
$reviewdate=$r['reviewdate'];
$ref_doc=$r['ref_doc'];
//$ref_mob=$r['ref_mob'];
$doctorname=$r['consult_doct'];
 $con_doct_mob=$r['con_doc_mob'];
$ref_doc_mob=$r['ref_doc_mob'];
$tokenno=$r['tokenno'];
$validity=$r['validity'];
$registerno=$r['registerno'];
$rel_type=$r['rel_type'];
$registerdate=$r['registerdate'];
$reviewdate=$r['reviewdate'];
//$ApplicationDeadline=$r['ApplicationDeadline'];
//$type=$r['type'];
$hs=mysql_query("select * from referal_doctor where refcode='$ref_doc'") or die(mysql_error());
$rt=mysql_fetch_array($hs);
$rfdoc=$rt['ref_docname'];



   $dd="select dname1,dsi1,desc1 from doct_infor where dname1 = '$did'";
$docid = mysql_query($dd);
if($docid)
{
	$row1 = mysql_fetch_array($docid);
	$doct3 = $row1['dname1'];
	$dsi1 = $row1['dsi1'];
	$desc1 = $row1['desc1'];

}

?>

<?php // echo  $no = '$no';
   // $newtimestamp = strtotime($doct1. ' + 330 minute');//gets timestamp
    //convert into whichever format you need 
     //$newdate = date('d-m-Y H:i:s', $newtimestamp);
//echo "Right now: " . $now_stamp;
//echo "5 minutes from right now: " . $expire_stamp;

?>

        <table    border="0"  cellspacing="0">
        <tr>
<td><strong>UMR No</strong>  : <?php echo $mrno;  ?></td>
</tr>
<tr>
<td><strong>Pt.Name</strong> : <?php echo $pname;  ?> &nbsp;&nbsp;&nbsp;<b><?php if($pat_type=='OP'){echo 'O/P No';}else{ echo 'I/P No';} ?></b>:<?php echo $tokenno ?></td></tr>
<tr><td><strong><?php echo $rel_type ?> Name</strong> : <?php echo $fname;  ?></td></tr>
<tr>
<td><strong>Age/Gender </strong>: <?php  echo $age."/". $sex."&nbsp;&nbsp;Date:".$registerdate;?></td>

</tr>

<tr>
<td><strong>Referral Dr.</strong> : <?php if($rfdoc != ""){ echo $rfdoc."(".$ref_doc_mob.")";}else{ echo "----"; }  ?></td></tr>
<tr>
<td><strong>Consult Dr. Name</strong>  : <?php echo $doctorname."(".$con_doct_mob.")";  ?></td>
</tr>
<tr>
<td><strong>Dr. Specialization</strong>  : <?php echo $dsi1;  ?></td>
</tr>
<tr>
<td><strong>Consult Dr. Designation</strong>  : <?php echo $desc1;  ?></td>
</tr>
<tr>
<td><strong>Valid Upto</strong>  : <?php echo date('d/m/Y',strtotime($validity));  ?></td>
</tr>
</table>
<hr/>
<h1 align="center" style="font-size:16px">MEDICAL REPORT</h1>
   
        <table>
        <tr>
        <th width="200px;" align="left">Provisional Diagnosis</th>
        <th>:</th>
        <td><?php echo $provisionaldiagnostics;  ?></td>
        </tr>
         <tr>
        <th align="left">Final Diagnosis</th>
         <th>:</th>
        <td><?php echo $finaldiagnostics;  ?></td>
        </tr>
         <tr>
        <th align="left">Clinical History</th>
         <th>:</th>
        <td><?php echo $clinicalhistory;  ?></td>
        </tr>
        
        <tr><th colspan="3">At the Time of Examination Vitals</th></tr>
         <tr>
        <th align="left">Pulse Rate</th>
         <th>:</th>
        <td><?php echo $pulserate;  ?></td>
        </tr>
         <tr>
        <th align="left">BP</th>
         <th>:</th>
        <td><?php echo $bp;  ?>  mmHg</td>
        </tr>
         <tr>
        <th align="left">Temperature</th>
         <th>:</th>
        <td><?php echo $temperature;  ?>  <sup>0</sup>F</td>
        </tr>
         <tr>
        <th align="left">Repository Rate</th>
         <th>:</th>
        <td><?php echo $repositoryrate;  ?></td>
        </tr>
        <tr>
        <th align="left">Heart</th>
         <th>:</th>
        <td><?php echo $heart;  ?></td>
        </tr>
        <tr>
        <th align="left">Lungs</th>
         <th>:</th>
        <td><?php echo $lungs;  ?></td>
        </tr>
        <tr>
        <th align="left">P/A</th>
         <th>:</th>
        <td><?php echo $pa;  ?></td>
        </tr>
        <tr>
        <th align="left">CNS</th>
         <th>:</th>
        <td><?php echo $cns;  ?></td>
        </tr>
         <tr>
        <th>Local Examination Findings</th>
         <th>:</th>
        <td><?php echo $localeximination;  ?></td>
        </tr>
        
        <tr><th colspan="3">Advised Investigations</th></tr>
        <tr><th >Lab Reports</th><th>:</th><td>
        <table>
         <?php
					   $p="select * from bill where mrno='$mrno' ";
					  $result=mysql_query($p) or die(mysql_error());
					   while($r=mysql_fetch_array($result)){
						   
					    
					    ?>
					   <tr>
                       <td></td>
                       <td></td>
					   <td ><?php echo $r['TestName'] ?></td>
							<td ><?php echo $r['BillDate']."(".$r['BillNO'].")" ?></td>
						
						
						</tr>
                        <?php
						
						
						 }?>
                        
                        
                        <tr>
        
        </table>
        
        
        </td></tr>
        
        </table><b>Medical Advised</b><br/> 
        <table border="1" cellpadding="0" cellspacing="0" width="100%">
         
        <tr>
        <th>SNo</th>
        <th>Medical Type</th>
        <th>**Drug Name</th>
        <th>*Generic</th>
        <th>Dosage Time</th>
        <th>Route</th>
        <th>Days</th>
         <th>Quantity</th>
          <th>Indication</th>
        </tr>
         <?php
					   $p="select * from opdigitalmedical where mrno='$mrno' ";
					  $result=mysql_query($p) or die(mysql_error());
					  $i=1;
					   while($r=mysql_fetch_array($result)){
						   
					    
					    ?>
					   <tr>
                       <td><?php echo $i ?></td>
                       <td><?php echo $r['mtype'] ?></td>
                       <td><?php echo $r['mname'] ?></td>
                         <td><?php echo $r['generic'] ?></td>
					   <td ><?php echo $r['dosagetime'] ?></td>
                        <td ><?php echo $r['drugadmin'] ?></td>
                         <td ><?php echo $r['days'] ?></td>
						 <td ><?php echo $r['qty'] ?></td>
                         <td ><?php echo $r['indication'] ?></td>
						
						</tr>
                        <?php
						
						$i++;
						 }?>
                        
                        <tr>
        
        </table>
        <table>
        <tr height="20"></tr>
        <tr>
        <th>Other Procedures Adviced/Suggestions</th>
        <th>:</th>
        <th><?php echo $advices; ?></th>
        </tr>
        <th>Review Date</th>
        <th>:</th>
        <th><?php echo date('d-m-Y',strtotime($reviewdate)); ?></th>
        </tr>
        <tr height="10"></tr>
        
        </table>
        <div align="right"><img src="images/signature.png" style="width:120px;height:50px;"/></div>
        <div align="right"><b>Consultant Signature</b></div>
        
        
        <div>
        <b>Note</b><br/>
        <p style="color:red;">*Pharmacist is supposed to supply by 'GENERIC' only.The Physician is not responsible for the quality,efficacy or side effects of any Generic supplled by the Pharmacy.</p>

<p style="color:red;">**This is a 'Suggested' Drug name and is NOT BINDING on the patient to use particular brand prescribed above.</p>
        </div>
        
        
        
        
        </div>    
    </div>
    
</div>

</body>
</html>