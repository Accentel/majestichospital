<?php
include("config.php");

$q=$_GET["q"];
$b=$_GET["b"];
echo "@";
?>
<input type="hidden" name="tname[]" value="<?php echo $q ?>"/>

<?php
if($q == "COMPLETE BLOOD  PICTURE (CBP)"){
$sql4 = mysqli_query($link,"select count(*) from cbp where bill_no='$b'");
if($sql4){
	$row4 = mysqli_fetch_array($sql4);
	$cnt = $row4[0];
}
if($cnt <= 0){
?>

<?php
}else{
$sql5 = mysqli_query($link,"select * from cbp where bill_no='$b'");
if($sql5){
	$row5 = mysqli_fetch_array($sql5);
	$HAEMOGLOBIN = $row5['HAEMOGLOBIN'];
	$RBC = $row5['RBC'];
	$WBC_Count = $row5['WBC_Count'];
	$PLATELET_COUNT = $row5['PLATELET_COUNT'];
	$NEUTROPHILS = $row5['NEUTROPHILS'];
	$LYMPHOCYTES = $row5['LYMPHOCYTES'];
	$MONOCYTES = $row5['MONOCYTES'];
	$EOSINOPHILS = $row5['EOSINOPHILS'];
	$BASOPHILS = $row5['BASOPHILS'];
	$RBC1 = $row5['RBC1'];
	$WBC1 = $row5['WBC1'];
	$Platelets = $row5['Platelets'];
	$PACKEDCELL=$row5['PACKEDCELL'];
	$mcv=$row5['mcv'];
	$mch=$row5['mch'];
	$mchc=$row5['mchc'];
	$periperl=$row5['periperl'];
}
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="20px"></tr>
<tr><td style="color:red;"><b ><u>COMPLETE BLOOD PICTURE (CBP):</u></b></td></tr>
<tr><td>HAEMOGLOBIN</td><td> : <input type="text" value="<?php echo $HAEMOGLOBIN ?>" name="HAEMOGLOBIN" size="10"/> %</td><td colspan="2">Male : 13.0 – 18.0 g% , Female : 11.5 – 16.0 g%</td></tr>
<tr><td>RBC</td><td> : <input type="text" name="RBC" value="<?php echo $RBC ?>" size="10"/> Mill/ cumm</td><td colspan="2">Male : 4.5 – 6.5 Mill/Cumm , Female : 3.5 – 5.5 Mill/Cumm</td></tr>
<tr><td>WBC Count</td><td> : <input type="text" value="<?php echo $WBC_Count ?>" name="WBC" size="10"/> cells/cumm</td><td colspan="2">4,000 - 11,000/cumm</td></tr>        
<tr><td>PACKED CELL VOLUME</td><td> : <input type="text" value="<?php echo $PACKEDCELL ?>" name="PLATELET" size="10"/> %</td><td colspan="2">Male:40-54 %<br/>Female:36 - 49 %</td></tr>
<tr><td>M C V</td><td> : <input type="text" value="<?php echo $mcv ?>" name="mch" size="10"/> fl</td><td colspan="2">78-96 fl</td></tr>
<tr><td>M C H</td><td> : <input type="text" value="<?php echo $mch ?>" name="mch" size="10"/> pg</td><td colspan="2">27-32 pg</td></tr>
<tr><td>M C H C</td><td> : <input type="text" value="<?php echo $mchc ?>" name="mch" size="10"/> %</td><td colspan="2">30-36 %</td></tr>
<tr height="10px"></tr>
<tr><td><b><u>DIFFERENTIAL COUNT:</u></b></td><td></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <input type="text" value="<?php echo $NEUTROPHILS ?>" name="NEUTROPHILS" id="NEUTROPHILS" size="10"/> %</td><td>40-75%</td><td>30 - 40%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <input type="text" value="<?php echo $LYMPHOCYTES ?>" name="LYMPHOCYTES" id="LYMPHOCYTES" size="10"/> %</td><td>20-45%</td><td>40 - 60%</td></tr>
<tr><td>EOSINOPHILS</td><td> : <input type="text" value="<?php echo $EOSINOPHILS ?>" name="EOSINOPHILS" id="EOSINOPHILS" size="10"/> %</td><td>01-06%</td><td>01 - 06%</td></tr>	  				
<tr><td>MONOCYTES</td><td> : <input type="text" value="<?php echo $MONOCYTES ?>" name="MONOCYTES" id="MONOCYTES" size="10"/> %</td><td>02-10%</td><td>02 - 10%</td></tr>		 		
<tr><td>BASOPHILS</td><td> : <input type="text" value="<?php echo $BASOPHILS ?>" name="BASOPHILS" id="BASOPHILS" size="10" onblur="javascript:fun001();"/> %</td><td>00-01%</td><td>00 - 01%</td></tr>			
<tr><td>Platelet Count</td><td> : <input type="text" name="Platelets" value="<?php echo $Platelets ?>" size="10"/></td><td>1,50,000-4,00,000 cells/Cumm</td></tr> 
<tr><td>Peripheral Smear</td><td> : <input type="text" name="periperl" value="<?php echo $periperl ?>" /></td></tr> 
</table>
<?php
}
}else if($q == "COMPLETE URINE EXAMINATION(CUE)"){

$sql4 = mysqli_query($link,"select * from cue where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$COLOUR = $row5['COLOUR'];
	//$given_on =date('d-m-Y',strtotime($given_on1));
	$APPEARANCE = $row5['APPEARANCE'];
	//$report_on =date('d-m-Y',strtotime($report_on1));
	$REACTION = $row5['REACTION'];
	$RBC = $row5['RBC'];
	//$given_on =date('d-m-Y',strtotime($given_on1));
	$SPECIFIC_GRAVITY = $row5['SPECIFIC_GRAVITY'];
	//$report_on =date('d-m-Y',strtotime($report_on1));
	$SUGAR = $row5['SUGAR'];
	
	$ALBUMIN = $row5['ALBUMIN'];
	$BILE_SALTS = $row5['BILE_SALTS'];
	$BILE_PIGMENTS = $row5['BILE_PIGMENTS'];
	$UROBILINOGEN = $row5['UROBILINOGEN'];
	$KETONES = $row5['KETONES'];
	$PUSCELLS = $row5['PUSCELLS'];
	$EPITHELIAL_CELL = $row5['EPITHELIAL_CELL'];
	$CASTS = $row5['CASTS'];
	$CRYSTALS = $row5['CRYSTALS'];
	$OTHERS = $row5['OTHERS'];
	//$RBC = $row5['RBC'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b color="red"><u>COMPLETE URINE EXAMINATION:</u></b></td></tr>
<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="CUECOLOUR" size="20" value="<?php echo $COLOUR ?>"/></td></tr>
<tr><td>APPEARANCE</td><td align="left"> : <input type="text" name="CUEAPPEARANCE" size="20" value="<?php echo $APPEARANCE ?>"/></td></tr>
<tr><td>REACTION</td><td align="left"> : <input type="text" name="CUEREACTION" size="20" value="<?php echo $REACTION ?>"/></td></tr>        
<tr><td>SPECIFIC GRAVITY</td><td align="left"> : <input type="text" name="CUESPECIFICGRAVITY" size="20" value="<?php echo $SPECIFIC_GRAVITY ?>"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>SUGAR</td><td align="left"> : <input type="text" name="CUESUGAR" size="20" value="<?php echo $SUGAR ?>"/></td></tr>
<tr><td>ALBUMIN</td><td align="left"> : <input type="text" name="CUEALBUMIN" size="20" value="<?php echo $ALBUMIN ?>"/></td></tr>
<tr><td>BILE SALTS</td><td align="left"> : <input type="text" name="CUEBILESALTS" size="20" value="<?php echo $BILE_SALTS ?>"/></td></tr>		 		
<tr><td>BILE PIGMENTS</td><td> : <input type="text" name="CUEBILEPIGMENTS" size="20" value="<?php echo $BILE_PIGMENTS ?>"/></td></tr>	  				
<tr><td>UROBILINOGEN</td><td> : <input type="text" name="CUEUROBILINOGEN" size="20" value="<?php echo  $UROBILINOGEN?>"/></td></tr>			
<tr><td>KETONES</td><td> : <input type="text" name="CUEKETONES" size="20" value="<?php echo $KETONES ?>"/></td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="CUERBC" size="20" value="<?php echo $RBC ?>"/>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <input type="text" name="CUEPUSCELLS" size="20" value="<?php echo $PUSCELLS ?>"/>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <input type="text" name="CUEEPITHELIAL" size="20" value="<?php echo $EPITHELIAL_CELL  ?>"/>  /HPF</td></tr> 
<tr><td>CASTS</td><td> : <input type="text" name="CUECASTS" size="20" value="<?php echo $CASTS ?>"/></td></tr> 
<tr><td>CRYSTALS</td><td> : <input type="text" name="CUECRYSTALS" size="20" value="<?php echo $CRYSTALS ?>"/></td></tr> 
<tr><td>OTHERS</td><td> : <input type="text" name="CUEOTHERS" size="20" value="<?php echo $OTHERS ?>"/></td></tr> 
</table>
<?php
}else if($q == "MANTOUX TEST"){
$sql4 = mysqli_query($link,"select * from mantoux where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$given_on1 = $row5['given_on'];
	$given_on =date('d-m-Y',strtotime($given_on1));
	$report_on1 = $row5['report_on'];
	$report_on =date('d-m-Y',strtotime($report_on1));
	$result = $row5['result'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b color="red"><u>MANTOUX TEST:</u></b></td></tr>
<tr><td>GIVEN ON</td><td> : <input type="text" value="<?php echo $given_on; ?>" name="MANTOUXGIVENON"/></td></tr> 
<tr><td>REPORT ON</td><td> : <input type="text" value="<?php echo $report_on; ?>" name="MANTOUXREPORTNON"/></td></tr> 
<tr><td>RESULT</td><td> : <textarea type="text" name="MANTOUXRESULT" cols="35" rows="3" ><?php echo $result; ?></textarea></td></tr> 

</table>
<?php
}else if($q == "C - Reactive Protein (CRP)"){



$sql4 = mysqli_query($link,"select * from crp where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$crp_result = $row5['crp_result'];
	



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>SEROLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td><b><u>RESULT </u></td><td><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>C - Reactive Protein (CRP)</td><td> : <input type="text" name="CRPRESULT" value="<?php echo $crp_result; ?>" size="20" /> mg/dl</td><td><?php echo  "< 0.6 mg/dl"; ?></td></tr> 

</table>
<?php
}else if($q == "LIVER FUNCTION TEST"){

$sql4 = mysqli_query($link,"select * from lft where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$TOTAL_BILIRUBIN = $row5['TOTAL_BILIRUBIN'];
	$DIRECT_BILIRUBIN = $row5['DIRECT_BILIRUBIN'];
	$INDIRECT_BILIRUBIN = $row5['INDIRECT_BILIRUBIN'];
	$SGOT = $row5['SGOT'];
	$SGPT = $row5['SGPT'];
	$S_ALKALINE_PHOSPHATE = $row5['S_ALKALINE_PHOSPHATE'];
	$TOTAL_PROTIENS = $row5['TOTAL_PROTIENS'];
	$SERUM_ALBUMIN = $row5['SERUM_ALBUMIN'];
	$SERUM_GLOBULIN = $row5['SERUM_GLOBULIN'];
	$AG_Ratio = $row5['AG_Ratio'];
	



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>LIVER FUNCTION TEST:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULTS </u></td><td><b><u>NORMAL RANGES </u></td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL BILIRUBIN</td><td> : <input type="text" name="LFTTBILIRUBIN" size="10" value="<?php echo $TOTAL_BILIRUBIN ?>"/> mg/dl</td><td>0.2 - 1.0 mg/dl</td></tr> 
<tr><td>CONJUGATED(DIRECT BILIRUBIN)</td><td> : <input type="text" name="LFTDBILIRUBIN" size="10" value="<?php echo $DIRECT_BILIRUBIN ?>"/> mg/dl</td><td>0.2 - 0.5 mg/dl</td></tr> 
<tr><td>ALKALINE PHOSPHATE</td><td> : <input type="text" name="LFTSAPHOSPHATE" size="10" value="<?php echo $S_ALKALINE_PHOSPHATE ?>"/> U/L</td><td>Adults:40 - 120 U/L<br/>Children's:<350 U/L</td></tr> 
<tr height="10px"></tr>
<tr><td>SGPT</td><td> : <input type="text" name="LFTSGPT" size="10" value="<?php echo $SGPT ?>"/> U/L</td><td>UP TO 37 U/L</td></tr> 
<tr><td>SGOT </td><td> : <input type="text" name="LFTSGOT" size="10" value="<?php echo $SGOT ?>"/> U/L</td><td>UP TO 40  U/L</td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL PROTIENS </td><td> : <input type="text" name="LFTTPROTIENS" size="10" value="<?php echo $TOTAL_PROTIENS ?>"/> gm/dl</td><td>6.0 - 8.0 gm/dl</td></tr> 
<tr><td> ALBUMIN</td><td> : <input type="text" name="LFTSALBUMIN" size="10" value="<?php echo  $SERUM_ALBUMIN?>"/> g/dl</td><td>3.5 - 5.0 gm/dl</td></tr> 
<tr><td> GLOBULIN</td><td> : <input type="text" name="LFTSGLOBULIN" size="10" value="<?php echo  $SERUM_GLOBULIN?>"/></td><td></td></tr> 

</table>
<?php
}else if($q == "Parasite F and V"){
$sql4 = mysqli_query($link,"select * from rmt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rmt_result = $row5['rmt_result'];
	$rmt_result1 = $row5['rmt_result1'];
	
	


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td></tr> 
<tr height="5px"></tr>
<tr><td>Parasite F</td><td> : <input type="text" name="RMTRESULT" value="<?php echo $rmt_result ?>" /></td></tr> 
<tr><td>Parasite V</td><td> : <input type="text" name="RMTRESULT1" value="<?php echo $rmt_result1 ?>" /></td></tr> 

</table>
<?php
}else if($q == "Smear for Malarial Parasite"){

$sql4 = mysqli_query($link,"select * from smp where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$smp_result = $row5['smp_result'];
	




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td></tr> 
<tr height="5px"></tr>
<tr><td>Smear for Malarial Parasite</td><td> : <textarea name="SMPRESULT" cols="35" rows="3"><?php echo $smp_result; ?></textarea></td></tr> 
</table>
<?php
}else if($q == "SERUM AMYLASE"){

$sql4 = mysqli_query($link,"select * from amylase where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$amylase_result = $row5['amylase_result'];
	



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>BIO-CHEMISTRY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>SERUM AMYLASE</td><td> : <input type="text" name="SAMYLASE" value="<?php echo $amylase_result;  ?>"/> U/L</td><td>up to 90 U/L</td></tr> 

</table>
<?php
}else if($q == "Absolute Eosinophil Count (AEC)"){
$sql4 = mysqli_query($link,"select * from aec where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$aec_result = $row5['aec_result'];
	


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Absolute Eosinophil Count (AEC)</td><td> : <input type="text" name="aecresult" value="<?php echo $aec_result;  ?>"/> cells/cumm</td><td>40 - 440 cells/cumm</td></tr> 

</table>
<?php
}else if($q == "Erythrocyte Sedimentation Rate (ESR)"){

$sql4 = mysqli_query($link,"select * from esr where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$esr_result = $row5['esr_result'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Erythrocyte Sedimentation Rate (ESR)</td><td> : <input type="text" name="esrresult" value="<?php echo $esr_result ?>"/> mm/1st Hr</td><td>00 - 20 mm/1st Hr</td></tr> 

</table>
<?php
}else if($q == "Serum Electrolytes"){

$sql4 = mysqli_query($link,"select * from ele where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sodium = $row5['sodium'];
	$potash = $row5['potash'];
	$chloride = $row5['chloride'];




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) Serum Electrolytes:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Sodium</td><td> : <input type="text" name="sodium" value="<?php echo $sodium ?>"/> mmol/l</td><td>135 - 155 mmol/l</td></tr> 
<tr><td width="30%">Potassium</td><td> : <input type="text" name="potash" value="<?php echo $potash ?>"/> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 
<tr><td width="30%">Chloride</td><td> : <input type="text" name="chloride" value="<?php echo $chloride ?>"/> mmol/l</td><td>95 - 105 mmol/l</td></tr> 

</table>
<?php
}else if($q == "Random Blood Sugar (RBS)"){

$sql4 = mysqli_query($link,"select * from rbs where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rbs_result = $row5['rbs_result'];
	$rus = $row5['rus'];
	




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td width="30%">Random Blood Sugar (RBS)</td><td> : <input type="text" name="rbs" value="<?php echo $rbs_result ?>"/> mg/dl</td><td>60 - 160 mg/dl</td></tr> 
<tr><td width="30%">Random Urine Sugar</td><td> : <input type="text" name="rus" value="<?php echo $rus ?>"/></td></tr> 

</table>
<?php
}else if($q == "Blood Urea"){
$sql4 = mysqli_query($link,"select * from burea where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$burea_result = $row5['burea_result'];
	
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Blood Urea</td><td> : <input type="text" name="burea" value="<?php echo $burea_result; ?>"/> mg/dl</td><td>10 - 50 mg/dl</td></tr> 

</table>
<?php
}else if($q == "Serum Creatinine"){

$sql4 = mysqli_query($link,"select * from creati where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$serum_result = $row5['serum_result'];
	

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td width="30%">Serum Creatinine</td><td> : <input type="text" name="creati" value="<?php echo $serum_result; ?>"/> mg/dl</td><td>0.6 - 1.5 mg/dl</td></tr> 

</table>
<?php
}else if($q == "SERUM CALCIUM"){
$sql4 = mysqli_query($link,"select * from calcium where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$cal_result = $row5['cal_result'];
	





?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">SERUM CALCIUM</td><td> : <input type="text" name="cal_result" value="<?php echo $cal_result;?>"/> mg/dl</td><td>8.5 - 10.5 mg/dl</td></tr> 

</table>
<?php
}else if($q == "Prothrombin Time (PT)"){
$sql4 = mysqli_query($link,"select * from pt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$pt_time = $row5['pt_time'];
	$pt_control = $row5['pt_control'];
	$pt_inr = $row5['pt_inr'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Prothrombin Time (PT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="pttest" value="<?php echo $pt_time;?>"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="ptcontrol" value="<?php echo $pt_control;?>"/> seconds</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">INR</td><td> : <input type="text" name="ptinr" value="<?php echo $pt_inr;?>"/></td></tr> 

</table>
<?php
}else if($q == "Activated Partial Thromboplastin Time (APTT)"){

$sql4 = mysqli_query($link,"select * from aptt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$aptt_time = $row5['aptt_time'];
	$aptt_control = $row5['aptt_control'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Activated Partial Thromboplastin Time (APTT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="aptttest" value="<?php echo $aptt_time;?>"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="apttcontrol" value="<?php echo $aptt_control;?>"/> seconds</td></tr> 

</table>
<?php
}else if($q == "Serum Uric Acid"){

$sql4 = mysqli_query($link,"select * from sua where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sua_result = $row5['sua_result'];
	




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Uric Acid</td><td> : <input type="text" name="sua_result" value="<?php echo $sua_result;?>"/> mg/dl</td><td>Male : 3.6 - 7.7 mg/dl<br>Female : 2.5 - 6.8 mg/dl </td></tr> 

</table>
<?php
}else if($q == "COMPLETE STOOL EXAMINATION"){

$sql4 = mysqli_query($link,"select * from cse where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$COLOUR = $row5['COLOUR'];
	$CONSIST = $row5['CONSIST'];
	$REACTION = $row5['REACTION'];
	$MUCUS = $row5['MUCUS'];
	$OCCULT_BLOOD = $row5['OCCULT_BLOOD'];
	$REDUCING_SUBSTANCE = $row5['REDUCING_SUBSTANCE'];
	$RBC = $row5['RBC'];
	$PUSCELLS = $row5['PUSCELLS'];
	$EPITHELIAL = $row5['EPITHELIAL'];
	$OVAS = $row5['OVAS'];
	$CYSTS = $row5['CYSTS'];
	$OTHERS = $row5['OTHERS'];
	$BLOOD = $row5['BLOOD'];
	$STARCH = $row5['STARCH'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>COMPLETE STOOL EXAMINATION:</u></b></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>PHYSICAL EXAMINATION:</u></b></td></tr> 

<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="CSECOLOUR" size="20" value="<?php echo $COLOUR;?>"/></td></tr>
<tr><td>APPEARANCE </td><td align="left"> : <input type="text" name="CSECONSISTENCY" size="20" value="<?php echo $CONSIST;?>"/></td></tr>
<tr><td>REACTION</td><td align="left"> : <input type="text" name="CSEREACTION" size="20" value="<?php echo $REACTION;?>"/></td></tr>        
<tr><td>MUCUS</td><td align="left"> : <input type="text" name="CSEMUCUS" size="20" value="<?php echo $MUCUS;?>"/></td></tr>
<tr><td>BLOOD</td><td align="left"> : <input type="text" name="BLOOD" size="20" value="<?php echo $BLOOD;?>"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 

<tr><td>REDUCING SUBSTANCE</td><td align="left"> : <input type="text" name="CSESUBSTANCE" size="20" value="<?php echo $REDUCING_SUBSTANCE;?>"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>OVAS</td><td> : <input type="text" name="CSEOVAS" size="20" value="<?php echo $OVAS;?>"/></td></tr> 
<tr><td>CYSTS</td><td> : <input type="text" name="CSECYSTS" size="20" value="<?php echo $CYSTS;?>"/></td></tr> 
<tr><td>PUSCELLS</td><td> : <input type="text" name="CSEPUSCELLS" size="20" value="<?php echo $PUSCELLS;?>"/>  /HPF</td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="CSERBC" size="20" value="<?php echo $RBC;?>"/>  /HPF</td></tr> 
<tr><td>STARCH</td><td> : <input type="text" name="STARCH" size="20" value="<?php echo $STARCH;?>"/>  /HPF</td></tr> 
<tr><td>VEG CELLS</td><td> : <input type="text" name="CSEEPITHELIAL" size="20" value="<?php echo $EPITHELIAL;?>"/>  /HPF</td></tr> 
<tr><td>OTHERS</td><td> : <input type="text" name="CSEOTHERS" size="20" value="<?php echo $OTHERS;?>"/></td></tr> 
</table>
<?php
}else if($q == "HBsAg"){
$sql4 = mysqli_query($link,"select * from hbsag where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$hresult = $row5['hresult'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HBsAg</td><td> : <input type="text" name="hresult" value="<?php echo $hresult;?>"/></td></tr> 

</table>
<?php
}else if($q == "WIDAL"){
$sql4 = mysqli_query($link,"select * from widal where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sto = $row5['sto'];
	$sth = $row5['sth'];
	$spah = $row5['spah'];
	$spbh = $row5['spbh'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b>Test</b></td><td><b>Result</b></td></tr>
<tr><td width="30%" colspan="2">WIDAL : </td></tr> 
<tr><td width="30%">Salmonella Typhi "O"</td><td> : <input type="text" name="sto" value="<?php echo $sto;?>"/></td></tr> 
<tr><td width="30%">Salmonella Typhi "H"</td><td> : <input type="text" name="sth" value="<?php echo $sth;?>"/></td></tr> 
<tr><td width="30%">Salmonella Paratyphi "AH"</td><td> : <input type="text" name="spah" value="<?php echo $spah;?>"/></td></tr> 
<tr><td width="30%">Salmonella Paratyphi "BH"</td><td> : <input type="text" name="spbh" value="<?php echo $spbh;?>"/></td></tr> 

</table>
<?php
}else if($q == "HAEMOGLOBIN"){
$sql4 = mysqli_query($link,"select * from haemo where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$haresult = $row5['haresult'];



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">HAEMOGLOBIN</td><td> : <input type="text" name="haresult" value="<?php echo $haresult;?>"/> % </td><td>Male : 13.0 - 18.0 g%<br>Female : 11.5 - 16.0 g%</td></tr> 

</table>
<?php
}else if($q == "RFT"){

$sql4 = mysqli_query($link,"select * from rft where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rft_rbs = $row5['rft_rbs'];
	$rft_bu = $row5['rft_bu'];
	$rft_scr = $row5['rft_scr'];
	$rft_sua = $row5['rft_sua'];
	$rft_sc = $row5['rft_sc'];
	$rft_sodium = $row5['rft_sodium'];
	$rft_potash = $row5['rft_potash'];
	$rft_chloride = $row5['rft_chloride'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>RFT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">Random Blood Sugar (RBS)</td><td> : <input type="text" name="rftrbs" value="<?php echo $rft_rbs;?>"/> mg/dl</td><td>60 - 160 mg/dl</td></tr> 
<tr><td width="30%">Blood Urea</td><td> : <input type="text" name="rftbu" value="<?php echo $rft_bu;?>"/> mg/dl</td><td>10 - 50 mg/dl</td></tr> 
<tr><td width="30%">Serum Creatinine</td><td> : <input type="text" name="rftscr" value="<?php echo $rft_scr;?>"/> mg/dl</td><td>0.6 - 1.5 mg/dl</td></tr> 
<tr><td width="30%">Serum Uric Acid</td><td> : <input type="text" name="rftsua" value="<?php echo $rft_sua;?>"/> mg/dl</td><td>Male : 3.6 - 7.7 mg/dl<br>Female : 2.5 - 6.8 mg/dl </td></tr> 
<tr><td width="30%">Serum Calcium</td><td> : <input type="text" name="rftsc" value="<?php echo $rft_sc;?>"/> mg/dl</td><td>8.5 - 10.5 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>Serum Electrolytes:</u></b></td></tr>

<tr><td width="30%">Serum Sodium</td><td> : <input type="text" name="rftsodium" value="<?php echo $rft_sodium;?>"/> mmol/l</td><td>135 - 155 mmol/l</td></tr> 
<tr><td width="30%">Serum Potassium</td><td> : <input type="text" name="rftpotash" value="<?php echo $rft_potash;?>"/> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 
<tr><td width="30%">Serum Chloride</td><td> : <input type="text" name="rftchloride" value="<?php echo $rft_chloride;?>"/> mmol/l</td><td>95 - 105 mmol/l</td></tr> 

</table>
<?php
}else if($q == "Reducing Substance"){

$sql4 = mysqli_query($link,"select * from rsub where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Reducing Substance</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>

</table>
<?php
}else if($q == "SERUM BILIRUBIN"){
$sql4 = mysqli_query($link,"select * from sbil where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$tbil = $row5['tbil'];
	$dbil = $row5['dbil'];
	$ibil = $row5['ibil'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>Serum Bilirubin : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Total Bilirubin</td><td> : <input type="text" name="tbil" size="10" value="<?php echo $tbil;?>"/> mg/dl</td><td>infants: 0.0 - 10.0 mg/dl<br>adults: 0.0 - 1.0 mg/dl</td></tr> 
<tr><td>Direct Bilirubin</td><td> : <input type="text" name="dbil" size="10" value="<?php echo $dbil;?>"/> mg/dl</td><td>infants: 0.0 - 1.0 mg/dl<br>adults: 0.0 - 0.2 mg/dl</td></tr> 
<tr><td>Indirect Bilirubin</td><td> : <input type="text" name="ibil" size="10" value="<?php echo $ibil;?>"/> mg/dl</td><td></td></tr> 

</table>
<?php
}else if($q == "BLEEDING TIME AND CLOTTING TIME"){
$sql4 = mysqli_query($link,"select * from btct where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$btime = $row5['btime'];
	$ctime = $row5['ctime'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Bleeding Time (BT)</td><td> : <input type="text" name="bt" value="<?php echo $btime;?>" size="20" /></td><td>01' Min 00'' Sec - 03' Min 00'' Sec</td></tr> 
<tr><td>Clotting Time (CT)</td><td> : <input type="text" name="ct" value="<?php echo $ctime;?>" size="20" /></td><td>03' Min 00'' Sec - 07' Min 00'' Sec</td></tr> 

</table>
<?php
}else if($q == "BLOOD GROUP"){
$sql4 = mysqli_query($link,"select * from bgroup where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$bgrp = $row5['bgrp'];
	$rhtype = $row5['rhtype'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Blood Group </td><td> : <input type="text" name="bgroup" size="20" value="<?php echo $bgrp;?>"/></td></tr> 
<tr><td>Rh Typing</td><td> : <input type="text" name="rht" size="20" value="<?php echo $rhtype;?>"/></td></tr> 

</table>
<?php
}else if($q == "BLOOD SUGAR(FBS,PLBS)"){
$sql4 = mysqli_query($link,"select * from bsugar where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$fbs = $row5['fbs'];
	$fus = $row5['fus'];
	$plbs = $row5['plbs'];
	$plus = $row5['plus'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Reference Range</u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Fasting Blood Sugar</td><td> : <input type="text" name="fbs" size="20"  value="<?php echo $fbs;?>"/> mg/dl</td><td>70 - 110 mg/dl</td></tr> 
<tr><td>Fasting Urine Sugar</td><td> : <input type="text" name="fus" size="20"  value="<?php echo $fus;?>"/></td></tr> 
<tr><td>Post Lunch Bloob Sugar</td><td> : <input type="text" name="plbs" size="20"  value="<?php echo $plbs;?>"/> mg/dl</td><td>80 – 170 mg/dl</td></tr> 
<tr><td>Post Lunch Urine Sugar </td><td> : <input type="text" name="plus" size="20"  value="<?php echo $plus;?>"/></td></tr> 

</table>
<?php
}else if($q == "HIV 1 AND 2"){
$sql4 = mysqli_query($link,"select * from hiv where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$hiv = $row5['hiv'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HIV I & II</td><td> : <input type="text" name="hiv" size="25"  value="<?php echo $hiv;?>"/></td></tr> 

</table>
<?php
}else if($q == "HCV"){
$sql4 = mysqli_query($link,"select * from hcv where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$hcv = $row5['hcv'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HCV</td><td> : <input type="text" name="hcv" size="25" value="<?php echo $hcv;?>" /></td></tr> 

</table>
<?php
}else if($q == "VDRL"){
$sql4 = mysqli_query($link,"select * from vdrl where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$vdrl = $row5['vdrl'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">VDRL</td><td> : <input type="text" name="vdrl" size="25" value="<?php echo $vdrl;?>" /></td></tr> 

</table>
<?php
}else if($q == "LIPID PROFILE"){
$sql4 = mysqli_query($link,"select * from lprofile where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sch = $row5['sch'];
	$hch = $row5['hch'];
	$lch = $row5['lch'];
	$vch = $row5['vch'];
	$stri = $row5['stri'];
	$tch = $row5['tch'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>LIPID PROFILE : </u></b></td></tr>

<tr height="5px"></tr>

<tr><td width="30%">Serum Cholesterol</td><td> : <input type="text" name="sch" size="20" value="<?php echo $sch;?>"/> mg/dl</td><td>Normal upto 200 mgs/dl<br>Boderline Upto 239 mgs/dl<br>Elevated > 240 mgs/dl.</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">HDL Cholesterol</td><td> : <input type="text" name="hch" size="20" value="<?php echo $hch;?>"/> mg/dl</td><td>30 - 60 mgs/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">LDL Cholesterol</td><td> : <input type="text" name="lch" size="20" value="<?php echo $lch;?>"/> mg/dl</td><td>100 - 190 mg/dl<br>Elevated > 190 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">VLDL Cholesterol</td><td> : <input type="text" name="vch" size="20" value="<?php echo $vch;?>"/> mg/dl</td><td>05 - 35 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Serum Triglycerides</td><td> : <input type="text" name="stri" size="20" value="<?php echo $stri;?>"/> mg/dl</td><td>Normal less than 180 mg/dl<br>Boderline 180 - 220 mg/dl<br>High > 220 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">T.CHOL / HDL RATIO</td><td> : <input type="text" name="tch" size="20" value="<?php echo $tch;?>"/></td><td>less than 4.0 Normal<br>4.0 - 6.0 Boderline<br> > 6.0 High Risk</td></tr> 

</table>
<?php
}else if($q == "SPUTUM FOR AFB"){
$sql4 = mysqli_query($link,"select * from safb where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$safb = $row5['safb'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Sputum for AFB</td><td> : <input type="text" name="safb" size="25" value="<?php echo $safb;?>"/></td></tr> 

</table>
<?php
}else if($q == "PLATELET COUNT"){
$sql4 = mysqli_query($link,"select * from pcount where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$pcount = $row5['pcount'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">PLATELET COUNT</td><td> : <input type="text" name="pcount" size="10" value="<?php echo $pcount;?>"/> lakhs /cumm</td><td>1.5 - 4.5Lakhs/cumm</td></tr>

</table>
<?php
}else if($q == "SERUM CHOLESTEROL"){
$sql4 = mysqli_query($link,"select * from schole where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$schole = $row5['schole'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Cholesterol</td><td> : <input type="text" name="schole" size="20" value="<?php echo $schole;?>"/> mg/dl</td><td>Normal upto 200 mgs/dl<br>Boderline Upto 239 mgs/dl<br>Elevated > 240 mgs/dl.</td></tr> 

</table>
<?php
}else if($q == "SERUM TRYGLYCERIDES"){

$sql4 = mysqli_query($link,"select * from strig where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$strig = $row5['strig'];
	

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Triglycerides</td><td> : <input type="text" name="strig" size="20" value="<?php echo $strig;?>"/> mg/dl</td><td>Normal less than 180 mg/dl<br>Boderline 180 - 220 mg/dl<br>High > 220 mg/dl</td></tr> 

</table>
<?php
}else if($q == "ALKALINE PHOSPHATE"){

$sql4 = mysqli_query($link,"select * from aphos where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$aphos = $row5['aphos'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">ALKALINE PHOSPHATE</td><td> : <input type="text" name="APHOSPHATE" size="10" value="<?php echo $aphos;?>"/> U/L</td><td>0 - 5 Yrs : 60 - 321 IU/L</td></tr> 

</table>
<?php
}else if($q == "TOTAL PROTIENS"){
$sql4 = mysqli_query($link,"select * from tprt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$tprt = $row5['tprt'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">TOTAL PROTIENS </td><td> : <input type="text" name="TPROTIENS" size="10" value="<?php echo $tprt;?>" /> g/dl</td><td>6.0 - 8.0 g/dl</td></tr> 

</table>
<?php
}else if($q == "SERUM POTASSIUM"){

$sql4 = mysqli_query($link,"select * from spotash where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$spotash = $row5['spotash'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Potassium</td><td> : <input type="text" name="spotash" value="<?php echo $spotash;?>"/> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 

</table>
<?php
}else if($q == "Smear for Microfilaria"){
$sql4 = mysqli_query($link,"select * from smicro where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$smicro = $row5['smicro'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Smear for Microfilaria</td><td> : <input type="text" name="smicro" size="25" value="<?php echo $smicro;?>"/></td></tr> 

</table>
<?php
}else if($q == "WBC Count"){
$sql4 = mysqli_query($link,"select * from wbccount where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$wbccount = $row5['wbccount'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">WBC Count</td><td> : <input type="text" name="wbccount" size="10" value="<?php echo $wbccount;?>"/> cells/cumm</td><td>4,000 - 11,000/cumm</td></tr>        

</table>
<?php
}else if($q == "Peripheral Smear"){
$sql4 = mysqli_query($link,"select * from peri where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$psrbc = $row5['psrbc'];
	$pswbc = $row5['pswbc'];
	$psplatelets = $row5['psplatelets'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>Peripheral Smear : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td>RBC</td><td> : <input type="text" name="psrbc" size="25" value="<?php echo $psrbc;?>"/></td></tr>        
<tr><td>WBC</td><td> : <input type="text" name="pswbc" size="25" value="<?php echo $pswbc;?>"/></td></tr>        
<tr><td>Platelets</td><td> : <input type="text" name="psplatelets" size="25" value="<?php echo $psplatelets;?>"/></td></tr>        

</table>
<?php
}else if($q == "FBS"){
$sql4 = mysqli_query($link,"select * from fbs where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$fbss = $row5['fbss'];
	$fuss = $row5['fuss'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Fasting Blood Sugar</td><td> : <input type="text" name="fbss" size="20" value="<?php echo $fbss;?>"/> mg/dl</td><td>70 - 110 mg/dl</td></tr> 
<tr><td width="30%">Fasting Urine Sugar</td><td> : <input type="text" name="fuss" size="20" value="<?php echo $fuss;?>" /></td></tr> 

</table>
<?php
}else if($q == "PLBS"){
$sql4 = mysqli_query($link,"select * from plbs where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$plbss = $row5['plbss'];
	$pluss = $row5['pluss'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Post Lunch Bloob Sugar</td><td> : <input type="text" name="plbss" size="20" value="<?php echo $plbss;?>" /> mg/dl</td><td>80 – 170 mg/dl</td></tr> 
<tr><td width="30%">Post Lunch Urine Sugar </td><td> : <input type="text" name="pluss" size="20" value="<?php echo $pluss;?>"/></td></tr> 

</table>
<?php
}else if($q == "RETI COUNT"){

$sql4 = mysqli_query($link,"select * from reticount where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rtvalue1 = $row5['rtvalue'];
	 $mbs="select * from retinormals where rtid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$rtid=$row['rtid'];
$rtvalue=$row['rtvalue'];
$rttype=$row['rttype'];
$note=$row['note'];




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>HAEMOTOLOGY SEROLOGY : </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">Reticulocyte Count </td><td><input type="text" name="Reticulocyte" size="10" value="<?php echo $rtvalue1; ?>"/></td><td><input type="hidden" name="rtid" value="<?php echo $rtid; ?>" size="4"/><input type="text" name="rtvalue" value="<?php echo $rtvalue; ?>" size="4"/> <input type="text" name="rttype" value="<?php echo $rttype; ?>" size="4"/> </td></tr> 
<tr><td colspan="2"> <textarea name="note" rows="3" cols="100"><?php echo $note; ?></textarea></td></tr>

</table>
<?php
}else if($q == "SGOT"){

$sql4 = mysqli_query($link,"select * from sgot where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sgotva = $row5['sgotva'];
	 $mbs="select * from livernormal where lfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$lfid=$row['lfid'];
$sgotv=$row['sgotv'];
$sgtt=$row['sgtt'];




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>BIOCHEMISTRY REPORT: </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">SGOT </td><td><input type="text" name="sgot" size="10" value="<?php echo $sgotva; ?>"/></td><td><input type="hidden" name="lfid" value="<?php echo $lfid; ?>" size="4"/><input type="text" name="sgotv" value="<?php echo $sgotv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr> 
</table>
<?php
}
else if($q == "SGPT"){

$sql4 = mysqli_query($link,"select * from sgpt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sgptva = $row5['sgptva'];
	  $mbs="select * from livernormal where lfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$lfid=$row['lfid'];
$sgptv=$row['sgptv'];
$sgtt=$row['sgtt'];




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>BIOCHEMISTRY REPORT: </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">SGPT </td><td><input type="text" name="sgpt" size="10" value="<?php  echo $sgptva;?>"/></td><td><input type="hidden" name="lfid" value="<?php echo $lfid; ?>" size="4"/><input type="text" name="sgptv" value="<?php echo $sgptv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr> 
</table>
<?php
}


else if($q == "LFT(SGOT SGPT)"){

$sql4 = mysqli_query($link,"select * from sgopt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sgotva = $row5['sgotva'];
	$sgptva = $row5['sgptva'];
	   $mbs="select * from livernormal where lfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$lfid=$row['lfid'];
$sgptv=$row['sgptv'];
$sgotv=$row['sgotv'];
$sgtt=$row['sgtt'];




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>BIOCHEMISTRY REPORT: </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">SGOT </td><td><input type="text" name="sgot" size="10" value="<?php echo $sgotva  ?>"/></td><td><input type="hidden" name="lfid" value="<?php echo $lfid; ?>" size="4"/><input type="text" name="sgotv" value="<?php echo $sgotv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr> 
<tr><td width="30%">SGPT </td><td><input type="text" name="sgpt" size="10" value="<?php echo $sgptva ?>"/></td><td><input type="text" name="sgptv" value="<?php echo $sgptv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr>

</table>
<?php
}
else if($q == "COAGGULATION(PT APTT)"){

$sql4 = mysqli_query($link,"select * from cptaptt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$ptt = $row5['ptt'];
	$ptc = $row5['ptc'];
	  $pti = $row5['pti'];
	$apt = $row5['apt'];
	  $aptc = $row5['aptc'];
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Prothrombin Time (PT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="pttest" value="<?php echo $ptt; ?>"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="ptcontrol" value="<?php echo $ptc; ?>"/> seconds</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">INR</td><td> : <input type="text" name="ptinr" value="<?php echo $pti; ?>"/></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Activated Partial Thromboplastin Time (APTT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="aptttest" value="<?php echo $apt; ?>"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="apttcontrol" value="<?php echo $aptc; ?>"/> seconds</td></tr> 


</table>
<?php
}
else if($q == "24 Hrs URINE PROTIEN"){

$sql4 = mysqli_query($link,"select * from urineprotinue where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$tv = $row5['tv'];
	$tp = $row5['tp'];
	  
	  
	  $mbs="select * from urinenormal where uid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$uid=$row['uid'];
$uvalue=$row['uvalue'];
$utype=$row['utype'];
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>24 Hrs URINE PROTIEN : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Total Volume</td><td> : <input type="text" name="tvolume" value="<?php echo $tv ?>"/> ml/day</td></tr> 
<tr><td width="30%">Total Protien </td><td> : <input type="text" name="tprotine" value="<?php echo $tp ?>"/> mg/day</td><td><input type="hidden" name="uid" size="3" value="<?php echo $uid; ?>"/><input type="text" name="urrange" value="<?php echo $uvalue; ?>" size="6"/><input type="text" name="utype" size="5" value="<?php echo $utype; ?>"/></td></tr> 
<tr height="5px"></tr>

</table>
<?php
}
else if($q == "BONE MARROW"){

$sql4 = mysqli_query($link,"select * from bone where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$done = $row5['done'];
	$site = $row5['site'];
	  $Cellularity = $row5['Cellularity'];
	$Ratio = $row5['Ratio'];
	$Erythropoiesis = $row5['Erythropoiesis'];
	$Myelopoiesis = $row5['Myelopoiesis'];
	$Megakaryocytes = $row5['Megakaryocytes'];
	$Lymphocytes = $row5['Lymphocytes'];
	$Plasma = $row5['Plasma'];
	$Others = $row5['Others'];
	$impression = $row5['impression'];

	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>BONE MARROW ASPIRATION REPORT : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Done by </td><td> : <input type="text" name="done" value="<?php echo $done ?>"/> </td></tr> 
<tr><td width="30%">Site </td><td> : <input type="text" name="site" value="<?php echo $site ?>"/></td></tr> 
<tr><td width="30%">Cellularity </td><td> : <input type="text" name="Cellularity" value="<?php echo $Cellularity ?>"/> </td></tr> 
<tr><td width="30%">M.E. Ratio </td><td> : <input type="text" name="Ratio" value="<?php echo $Ratio ?>"/></td></tr> 
<tr><td width="30%">Erythropoiesis	 </td><td> : <input type="text" name="Erythropoiesis" value="<?php echo $Erythropoiesis ?>"/> </td></tr> 
<tr><td width="30%">Myelopoiesis </td><td> : <input type="text" name="Myelopoiesis" value="<?php echo $Myelopoiesis ?>"/></td></tr> 
<tr><td width="30%">Megakaryocytes </td><td> : <input type="text" name="Megakaryocytes" value="<?php echo $Megakaryocytes ?>"/> </td></tr> 
<tr><td width="30%">Lymphocytes </td><td> : <input type="text" name="Lymphocytes" value="<?php echo $Lymphocytes ?>"/></td></tr> 
<tr><td width="30%">Plasma cells </td><td> : <input type="text" name="Plasma" value="<?php echo $Plasma ?>"/> </td></tr> 
<tr><td width="30%">Others </td><td> : <input type="text" name="Others" value="<?php echo $Others ?>"/></td></tr> 
<tr><td width="30%">IMPRESSION   </td><td> : <textarea rows="5" name="impression" cols="50"><?php echo $impression ?></textarea></td></tr> 

</table>
<?php
}
else if($q == "Gram Stain"){

$sql4 = mysqli_query($link,"select * from gramstain where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$gs = $row5['gs'];
	$stime = $row5['stime'];
	  

	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>MICRO BIOLOGY : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Gram Stain </td><td> : <input type="text" name="gram" value="<?php echo $gs ?>"/> </td></tr> 
<tr><td width="30%">Method:GRAM STAIN </td></tr>
<tr><td width="30%">Specimen Type </td><td> : <input type="text" name="Specimen" value="<?php echo $stime ?>"/></td></tr> 
</table>
<?php
}

else if($q == "FNAC"){

$sql4 = mysqli_query($link,"select * from fnac where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$test = $row5['test'];
	$site = $row5['site'];
	$microscope = $row5['microscope'];
	$impress = $row5['impress'];
	  

	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>FINE NEEDLE ASPIRATION FOR CYTOLOGY : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Done by </td><td> : <input type="text" name="done" value="<?php echo $test ?>"/> </td></tr> 
<tr><td width="30%">Site </td><td> : <input type="text" name="site" value="<?php echo $site ?>"/></td></tr> 
<tr><td width="30%">Microscope    </td><td> : <textarea rows="5" cols="50" name="microscope" ><?php echo $microscope ?></textarea></td></tr> 
<tr><td width="30%">IMPRESSION   </td><td> : <textarea rows="5" cols="50" name="impression"><?php echo $impress ?></textarea></td></tr> 
</table>
<?php
}

else if($q == "FLUID EXAMINATION-ROUTINE(PLEURAL FLUID)"){

$sql4 = mysqli_query($link,"select * from fluidexam where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$color = $row5['color'];
	$volume = $row5['volume'];
	$appearence = $row5['appearence'];
	$glouse = $row5['glouse'];
	  $protein = $row5['protein'];
	$totalcount = $row5['totalcount'];
	$polymarphs = $row5['polymarphs'];
	$lymphos = $row5['lymphos'];
	$mesoth = $row5['mesoth'];
	
	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u> Physical Examination::</u></b></td></tr>
<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="COLOUR" size="20" value="<?php echo $color ?>"/></td></tr>
<tr><td>VOLUME</td><td align="left"> : <input type="text" name="Volume" size="20" value="<?php echo $volume ?>"/></td></tr>
<tr><td>APPEARANCE</td><td align="left"> : <input type="text" name="APPEARANCE" size="20" value="<?php echo $appearence ?>"/></td></tr>

<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>GLUCOSE</td><td align="left"> : <input type="text" name="glucose" size="20" value="<?php echo $glouse ?>"/></td></tr>
<tr><td>PROTEIN</td><td align="left"> : <input type="text" name="protein" size="20" value="<?php echo $protein ?>"/></td></tr>
			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>Total Count</td><td> : <input type="text" name="totalcount" size="20" value="<?php echo $totalcount ?>"/>  cells/Cumm</td></tr> 
<tr><td>Differential Count</td><td> :Polymorphs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="Polymorphs" size="20" value="<?php echo $polymarphs ?>"/>% <br/>
Lymphocytes &nbsp;&nbsp;&nbsp; <input type="text" name="Lymphocytes" size="20" value="<?php echo $lymphos ?>"/>%<br/> 
 Mesothelial cells <input type="text" name="Mesothelial" size="20" value="<?php echo $mesoth ?>"/>%</td></tr> 

</table>
<?php
}

else if($q == "SEROLOGY(ASO RAF CRP)"){

$sql4 = mysqli_query($link,"select * from tft where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$crp = $row5['crp'];
	$raf = $row5['raf'];
	$aso = $row5['aso'];
	
	
	  $mbs="select * from crprange where crpid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$crpid=$row['crpid'];

$value=$row['value'];
$type=$row['type'];
       
$mbs="select * from rafnormals where rfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$rfid=$row['rfid'];
$rfvalue=$row['rfvalue'];
$rftype=$row['rftype'];


$mbs="select * from asonormals where aid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$aid=$row['aid'];
$avalue=$row['avalue'];
$atype=$row['atype'];
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>SEROLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td><b><u>RESULT </u></td><td><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>C - Reactive Protein (CRP)</td><td> : <input type="text" name="CRPRESULT" size="20" value="<?php  echo $crp;?>"/> </td><td><input type="hidden" name="crpid" value="<?php echo $crpid; ?>" size="5"/><input size="5" type="text" name="res" value="<?php echo $value; ?>"/><input type="text" name="type" value="<?php echo $type; ?>" size="5"/></td></tr> 
<tr height="20"></tr>
<tr><td width="30%">RA FACTOR</td><td> :<input type="text" name="raf" size="20" value="<?php  echo $raf;?>"/></td><td><input type="hidden" type="rfid" name="aid" value="<?php echo $rfid; ?>" size="4"/><input type="text" name="rfvalue" value="<?php echo $rfvalue; ?>" size="10"/><input type="text" name="rftype" value="<?php echo $rftype; ?>" size="4"/></td></tr> 
<tr height="20"></tr>
<tr><td width="30%">ASO TITRE</td><td> : <input type="text" name="asot" size="20" value="<?php  echo $aso;?>"/></td><td><input type="hidden" name="aid" value="<?php echo $aid; ?>" size="4"/><input type="text" name="avalue" value="<?php echo $avalue; ?>" size="10"/><input type="text" name="atype" value="<?php echo $atype; ?>" size="4"/></td></tr> 
</table>
<?php
}

else if($q == "RA FACTOR"){

$sql4 = mysqli_query($link,"select * from raf where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$raf = $row5['raf'];
	
	$mbs="select * from rafnormals where rfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$rfid=$row['rfid'];
$rfvalue=$row['rfvalue'];
$rftype=$row['rftype'];
	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">RA FACTOR</td><td> : <input type="text" name="raf" size="20" value="<?php echo $raf; ?>"/></td><td><input type="hidden" type="rfid" name="aid" value="<?php echo $rfid; ?>" size="4"/><input type="text" name="rfvalue" value="<?php echo $rfvalue; ?>" size="10"/><input type="text" name="rftype" value="<?php echo $rftype; ?>" size="4"/></td></tr> 

</table>
<?php
}

else if($q == "DENGUE SEROLOGY"){

$sql4 = mysqli_query($link,"select * from dsr where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$dsrigg = $row5['dsrigg'];
	$dsrigm = $row5['dsrigm'];
	$dsrns1 = $row5['dsrns1'];
	
	$mbs="select * from dsrnormal where dsid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$dsid=$row['dsid'];
$iggvalue=$row['iggvalue'];
$igmvalue=$row['igmvalue'];
$ns1value=$row['ns1value'];

	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>DENGUE SEROLOGY : </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">IgG</td><td><input type="text" name="dsrigg" size="20" value="<?php echo $dsrigg ?>"/></td><td><input type="hidden" name="dsid" value="<?php echo $dsid; ?>"/><input type="text" name="iggvalue" value="<?php echo $iggvalue; ?>"/> </td></tr> 
<tr><td width="30%">IgM</td><td><input type="text" name="dsrigm" size="20"  value="<?php echo $dsrigm ?>"/></td><td> <input type="text" name="igmvalue" value="<?php echo $igmvalue; ?>"/> </td></tr>
<tr><td width="30%">Ns1</td><td><input type="text" name="dsrns1" size="20"  value="<?php echo $dsrns1 ?>"/></td><td> <input type="text" name="ns1value" value="<?php echo $ns1value; ?>"/> </td></tr> 
</table>
<?php
}
else if($q == "2D Echo"){

$sql2 = mysqli_query($link,"select * from echo2d where bill_no='$b'");
		    
                $rs=mysqli_fetch_array($sql2);
                      $MITRALVALVE = $rs['MITRALVALVE'];
		$AORTICVALUE = $rs['AORTICVALUE'];
		$PULMVALUE = $rs['PULMVALUE'];
		$TRICISPIDVALUE = $rs['TRICISPIDVALUE'];
		$IAS = $rs['IAS'];
		$IVS = $rs['IVS'];
		$AORTICROOT = $rs['AORTICROOT'];
		$AORTICOPENING = $rs['AORTICOPENING'];
		$LTATRIUM = $rs['LTATRIUM'];
		$RVOT = $rs['RVOT'];
		$IVSTHICKNESS = $rs['IVSTHICKNESS'];
		$LVPWTHICKNESS = $rs['LVPWTHICKNESS'];
		$LVIDo=$rs['LVIDo'];
                $LVDIs=$rs['LVDIs'];
                $RVDId=$rs['RVDId'];
                $EDV=$rs['EDV'];
                $ESV=$rs['ESV'];
                $EF=$rs['EF'];
                $FS=$rs['FS'];
                $LVM=$rs['LVM'];
                $EPSS=$rs['EPSS'];
                $RIGHTATRIUM=$rs['RIGHTATRIUM'];
                $RIGHTVENTRICLE=$rs['RIGHTVENTRICLE'];
                $PULARTERY=$rs['PULARTERY'];
                $PERICARDIUM=$rs['PERICARDIUM'];
                $MITRALVELOCITYE=$rs['MITRALVELOCITYE'];
                $MITRALVELOCITYA=$rs['MITRALVELOCITYA'];
                $AORTICVELOCITY=$rs['AORTICVELOCITY'];
                $PULMONARYVELOCITY=$rs['PULMONARYVELOCITY'];
                $TRICUSPIDVELOCITY=$rs['TRICUSPIDVELOCITY'];
                        $TRJETVELOCITY=$rs['TRJETVELOCITY'];
                        $PASP=$rs['PASP'];
                        $CONCLUSION=$rs['CONCLUSION'];
						$DOCTOR=$rs['DOCTOR'];?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b color="red"><u>2D ECHO CARDIOGRAM REPORT:</u></b></td></tr>
<tr><td width="30%">MITRAL VALVE</td><td width="80%" align="left"> : <input type="text" name="MITRALVALVE" value="<?php echo $MITRALVALVE; ?>" size="20"/></td></tr>
<tr><td>AORTIC VALVE</td><td align="left"> : <input type="text" name="AORTICVALUE" value="<?php echo $AORTICVALUE; ?>" size="20"/></td></tr>
<tr><td>PULM VALVE</td><td align="left"> : <input type="text" name="PULMVALUE" value="<?php echo $PULMVALUE; ?>" size="20"/></td></tr>        
<tr><td>TRICUSPID VALVE</td><td align="left"> : <input type="text" name="TRICISPIDVALUE" value="<?php echo $TRICISPIDVALUE; ?>" size="20"/></td></tr>
<tr><td>I.A.S</td><td align="left"> : <input type="text" name="IAS" value="<?php echo $IAS; ?>" size="20"/></td></tr>        
<tr><td>I.V.S</td><td align="left"> : <input type="text" name="IVS"  value="<?php echo $IVS; ?>" size="20"/></td></tr>
<tr height="10px"></tr>
</table><table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td>AORTIC ROOT</td><td align="left"> : <input type="text" name="AORTICROOT" value="<?php echo $AORTICROOT; ?>" size="20"/>cm</td><td>AORTIC OPENING</td><td align="left"> : <input type="text" name="AORTICOPENING" value="<?php echo $AORTICOPENING; ?>" size="20"/>cm</td></tr>
<tr><td>LT.ATRIUM</td><td align="left"> : <input type="text" name="LTATRIUM" value="<?php echo $LTATRIUM; ?>" size="20"/>cm</td><td>RVOT</td><td align="left"> : <input type="text" name="RVOT" value="<?php echo $RVOT; ?>" size="20"/>cm</td></tr>
<tr><td>IVS THICKNESS</td><td align="left"> : <input type="text" name="IVSTHICKNESS" value="<?php echo $IVSTHICKNESS; ?>" size="20"/>cm</td><td>LVPW THICKNESS</td><td align="left"> : <input type="text" name="LVPWTHICKNESS" value="<?php echo $LVPWTHICKNESS; ?>" size="20"/>cm</td></tr>

<tr><td colspan="4"><b>LEFT VENTRICLE</b></td></tr>
<tr><td >LVIDo</td><td align="left" colspan="5"> : <input type="text" name="LVIDo" value="<?php echo $LVIDo; ?>" size="20"/>cm &nbsp;LVIDs <input type="text" name="LVDIs" value="<?php echo $LVDIs; ?>" size="20"/>cm&nbsp;RVIDd : <input type="text"  name="RVDId" value="<?php echo $RVDId; ?>" size="20"/>cm&nbsp;</td></tr>
<tr><td>EDV</td><td align="left"> : <input type="text" name="EDV"  value="<?php echo $EDV; ?>"size="20"/>ml</td><td>ESV</td><td align="left"> : <input type="text" name="ESV" value="<?php echo $ESV; ?>" size="20"/>ml</td></tr>
<tr><td>EF</td><td align="left"> : <input type="text" name="EF" value="<?php echo $EF; ?>" size="20"/>%</td><td>FS</td><td align="left"> : <input type="text" name="FS" value="<?php echo $FS; ?>" size="20"/>%</td></tr>
<tr><td>LVM</td><td align="left"> : <input type="text" name="LVM" value="<?php echo $LVM; ?>" size="20"/>gm</td><td>EPSS</td><td align="left"> : <input type="text" name="EPSS" value="<?php echo $EPSS; ?>" size="20"/>mm</td></tr>
</table><table width="100%" border="0" cellpadding="2" cellspacing="0">			
<tr height="10px"></tr>

<tr><td width="30%">RIGHT ATRIUM</td><td width="80%" align="left"> : <input type="text"  name="RIGHTATRIUM" value="<?php echo $RIGHTATRIUM; ?>" size="20"/></td></tr>
<tr><td>RIGHT VENTRICLE</td><td align="left"> : <input type="text" name="RIGHTVENTRICLE" value="<?php echo $RIGHTVENTRICLE; ?>" size="20"/></td></tr>
<tr><td>PUL ARTERY</td><td align="left"> : <input type="text" name="PULARTERY" value="<?php echo $PULARTERY; ?>" size="20"/></td></tr>        
<tr><td>PERICARDIUM</td><td align="left"> : <input type="text" name="PERICARDIUM" value="<?php echo $PERICARDIUM; ?>" size="20"/></td></tr>
<tr><td colspan="2"><b>DOPPLER</b></td></tr>
<tr><td width="30%">MITRAL VELOCITY</td><td width="80%" align="left"> :E <input type="text" name="MITRALVELOCITYE" value="<?php echo $MITRALVELOCITYE; ?>" size="20"/>m/s&nbsp;A:<input type="text" name="MITRALVELOCITYA" value="<?php echo $MITRALVELOCITYA; ?>" size="20"/>m/s</td></tr>
<tr><td>AORTIC VELOCITY</td><td align="left"> : <input type="text" name="AORTICVELOCITY"  value="<?php echo $AORTICVELOCITY; ?>" size="20"/>m/s</td></tr>
<tr><td>PULMONARY VELOCITY</td><td align="left"> : <input type="text" name="PULMONARYVELOCITY" value="<?php echo $PULMONARYVELOCITY; ?>" size="20"/>m/s</td></tr>        
<tr><td>TRICUSPID VELOCITY</td><td align="left"> : <input type="text" name="TRICUSPIDVELOCITY" value="<?php echo $TRICUSPIDVELOCITY; ?>" size="20"/>m/s</td></tr>
<tr><td>TRJET VELOCITY</td><td align="left"> : <input type="text" name="TRJETVELOCITY" value="<?php echo $TRJETVELOCITY; ?>" size="20"/>m/s</td></tr>
<tr><td>PASP</td><td align="left"> : <input type="text" name="PASP" value="<?php echo $PASP; ?>" size="20"/>m/s</td></tr>
<tr><td>CONCLUSION</td><td align="left"> : <textarea  name="CONCLUSION"  rows="5" cols="30" ><?php echo $CONCLUSION; ?></textarea></td></tr>
<tr><td>CONSULTANT CARDIOLOGIST</td><td align="left"> : <input type="text" name="DOCTOR" value="<?php echo $DOCTOR; ?>" size="30"/></td></tr>
</table>
<?php
}else if($q == "RMT"){
	$sql2 = mysqli_query($link,"select * from rmtest where bill_no='$b'");
		    
                $rs=mysqli_fetch_array($sql2);
                      $plasmodiumvivax = $rs['plasmodiumvivax'];
		$plasmodiumlaciparam = $rs['plasmodiumlaciparam'];
		
					 $sql21 = mysqli_query($link,"select * from rmtwidal where bill_no='$b'");
		    
                $rs1=mysqli_fetch_array($sql21);
                     $oantigen = $rs1['oantigen'];
		$hantigen = $rs1['hantigen'];
					 $ahantigen = $rs1['ahantigen'];
		$bhantigen = $rs1['bhantigen'];
		
		
		 $sql211 = mysqli_query($link,"select * from rmtwidalvalues where id='1'");
		    
                $rs11=mysqli_fetch_array($sql211);
                     $oantigen1 = $rs11['oantigen'];
		$hantigen1 = $rs11['hantigen'];
					 $ahantigen1 = $rs11['ahantigen'];
		$bhantigen1 = $rs11['bhantigen'];
		
		
		
		
		
		
		
		
	
	?>
<h4>Rapid Malaria Test</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Plasmodium Vivax</td><td> : <input type="text" name="plasmodiumvivax" value="<?php echo $plasmodiumvivax ?>"/> </td></tr> 
<tr><td width="30%">Plasmodium Falciparum</td><td> : <input type="text" name="plasmodiumlaciparam" value="<?php echo $plasmodiumlaciparam ?>"/> </td></tr> 

</table>
<h4>Widal Test(Slide Method)</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">S.Typhi `O` antigen</td><td> : <input type="text" name="oantigen" value="<?php echo $oantigen ?>"/>titer </td><td><input type="text" name="oantigen1" value="<?php echo $oantigen1 ?>"/> </td></tr> 
<tr><td width="30%">S.Typhi `H` antigen</td><td> : <input type="text" name="hantigen" value="<?php echo $hantigen ?>"/>titer </td><td><input type="text" name="hantigen1" value="<?php echo $hantigen1 ?>"/> </td></tr>
<tr><td width="30%">S.Para Typhi A`H` antigen</td><td> : <input type="text" name="ahantigen" value="<?php echo $ahantigen ?>"/>titer </td><td><input type="text" name="ahantigen1" value="<?php echo $ahantigen1 ?>"/> </td></tr>
<tr><td width="30%">S.Para Typhi B`H` antigen</td><td> : <input type="text" name="bhantigen" value="<?php echo $bhantigen ?>"/>titer </td><td><input type="text" name="bhantigen1" value="<?php echo $bhantigen1 ?>"/> </td></tr> 

</table>	
<?php }
else if($q == "Pregnancy Test"){
	$sql2 = mysqli_query($link,"select * from pregnancy where bill_no='$b'");
	$rs=mysqli_fetch_array($sql2);
    $urineforpregnancy = $rs['urineforpregnancy'];
	?>
<h4>Pregnancy Test</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Urine for Pregnancy</td><td> : <input type="text" name="urineforpregnancy" value="<?php echo $urineforpregnancy ?>"/> </td></tr> 


</table>
<?php }else if($q == "Serum Lipase"){
	$sql2 = mysqli_query($link,"select * from amylaselipase where bill_no='$b'");
	$rs=mysqli_fetch_array($sql2);
    $serumlipase = $rs['serumlipase'];
	
	
	
	$mbqa="select * from amylaselipasenormals where id='1'";
$r1=  mysqli_query($link,$mbqa) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);

$lipase=$row['lipase'];
	
	
	
	
	
	
	?>
<h4>Amylase & Lipase</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Serum Lipase</td><td> : <input type="text" name="serumlipase" value="<?php echo $serumlipase ?>"/> </td><td> <input type="text" name="serumlipase1" value="<?php echo $lipase ?>"/> </td></tr> 


</table>
<?php }
else if($q == "OGCT"){
	$sql2 = mysqli_query($link,"select * from ogct where bill_no='$b'");
	$rs=mysqli_fetch_array($sql2);
    $glucose = $rs['glucose'];
	$glucoseurine = $rs['glucoseurine'];
	
	
	
	
	
	
	
	
	?>
<h4>Oral Glucose Challenging Test(OGCT)</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Glucose( 2 Hour )</td><td> : <input type="text" name="glucose" value="<?php echo $glucose ?>"/>mg/dl </td><td> <input type="text" name="urinesugar" value="<?php echo $glucoseurine ?>"/> </td></tr> 
<tr><td>Interpretation</td></tr>
<tr><td width="30%">( 2 Hour )</td><td> : <input type="text" name="glucose1" value="Upto 140 mg/dl"/> </td></tr>

</table>
<?php }
else if($q == "GTT"){
	$sql2 = mysqli_query($link,"select * from gtt where bill_no='$b'");
	$rs=mysqli_fetch_array($sql2);
				$glucosefasting = $rs['glucosefasting'];
				$glucosehalf = $rs['glucosehalf'];
				$glucoseohr = $rs['glucoseohr'];
				$glucoset = $rs['glucoset'];
				$gfurinesugar = $rs['gfurinesugar'];
				$gohurinesugar = $rs['gohurinesugar'];
				$gonehurinesugar = $rs['gonehurinesugar'];
				$gtwourinesugar = $rs['gtwourinesugar'];
				$gonehhurinesugar = $rs['gonehhurinesugar'];
				$glucoseohrh = $rs['glucoseohrh'];
	
	
	
	
	
	
	
	
	?>
<h4>Glucose Tolerance Test(GTT)</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Glucose( Fasting )</td><td> : <input type="text" name="glucosefasting" value="<?php echo $glucosefasting ?>"/>mg/dl </td><td> <input type="text" name="gfurinesugar" value="<?php echo $gfurinesugar ?>"/> </td></tr>
<tr><td width="30%">Glucose( 1/2 Hour )</td><td> : <input type="text" name="glucosehalf" value="<?php echo $glucosehalf ?>"/>mg/dl </td><td> <input type="text" name="gohurinesugar" value="<?php echo $gohurinesugar ?>"/> </td></tr> 
<tr><td width="30%">Glucose( 1 Hour )</td><td> : <input type="text" name="glucoseohr" value="<?php echo $glucoseohr ?>"/>mg/dl </td><td> <input type="text" name="gonehurinesugar" value="<?php echo $gonehurinesugar ?>"/> </td></tr> 
<tr><td width="30%">Glucose( 1 1/2 Hour )</td><td> : <input type="text" name="glucoseohrh" value="<?php echo $glucoseohrh ?>"/>mg/dl </td><td> <input type="text" name="gonehhurinesugar" value="<?php echo $gonehhurinesugar ?>"/> </td></tr> 
<tr><td width="30%">Glucose( 2 Hour )</td><td> : <input type="text" name="glucoset" value="<?php echo $glucoset ?>"/>mg/dl </td><td> <input type="text" name="gtwourinesugar" value="<?php echo $gtwourinesugar ?>"/> </td></tr>  
 
<tr><td>Interpretation</td></tr>
<tr><td width="30%">Fasting </td><td> : <input type="text" name="glucose1" value="Upto 110 mg/dl"/> </td></tr>
<tr><td width="30%">1/2 Hour</td><td> : <input type="text" name="glucose1" value="Upto 230 mg/dl"/> </td></tr>
<tr><td width="30%">1 Hour</td><td> : <input type="text" name="glucose1" value="Upto 195 mg/dl"/> </td></tr>
<tr><td width="30%">1 1/2 Hour</td><td> : <input type="text" name="glucose1" value="Upto 165 mg/dl"/> </td></tr>
<tr><td width="30%">2 Hour</td><td> : <input type="text" name="glucose1" value="Upto 140 mg/dl"/> </td></tr>

</table>
<?php }

else if($q == "Semen Analasis"){
	$sql2 = mysqli_query($link,"select * from semenanalasis where bill_no='$b'");
	$rs=mysqli_fetch_array($sql2);
				 $periodabsence = addslashes($rs['periodabsence']);
		$colour = addslashes($rs['colour']);
		$reaction = addslashes($rs['reaction']);
		$volume = addslashes($rs['volume']);
		$lqtime = addslashes($rs['lqtime']);
		$spermcount = addslashes($rs['spermcount']);
		$activemotile = addslashes($rs['activemotile']);
		$suggishlymotile = addslashes($rs['suggishlymotile']);
		$nonmotile = addslashes($rs['nonmotile']);
		$normalform = addslashes($rs['normalform']);
		
		
		$abnormalform = addslashes($rs['abnormalform']);
		$puscells = addslashes($rs['puscells']);
		$rbc = addslashes($rs['rbc']);
		$others = addslashes($rs['others']);
		$impression = addslashes($rs['impression']);
		$epithelial = addslashes($rs['epithelial']);
				
	
	
	
	
	
	
	
	
	?>
<h4>Semen Analasis</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Peroid Absence</td><td> : <input type="text" name="periodabsence" value="<?php echo $periodabsence ?>"/></td></tr>
<tr><td width="30%">Colour</td><td> : <input type="text" name="colour" value="<?php echo $colour ?>"/></td></tr> 
<tr><td width="30%">Reaction</td><td> : <input type="text" name="reaction" value="<?php echo $reaction ?>"/></td></tr> 
<tr><td width="30%">Volume</td><td> : <input type="text" name="volume" value="<?php echo $volume ?>"/></td></tr> 
<tr><td width="30%">LQ Time</td><td> : <input type="text" name="lqtime" value="<?php echo $lqtime ?>"/></td></tr>  
 <tr><td><b>Microscopic Examination</b></td></tr>
<tr><td width="30%">Total Sperm Count</td><td> : <input type="text" name="spermcount" value="<?php echo $spermcount ?>"/>millions/ml</td><td>  <input type="text" name="spermcount1" value="20"/>millions/ml</td></tr>
<tr><td width="30%">Active Motile</td><td> : <input type="text" name="activemotile" value="<?php echo $activemotile ?>"/></td></tr> 
<tr><td width="30%">Suggishly Motile</td><td> : <input type="text" name="suggishlymotile" value="<?php echo $suggishlymotile ?>"/></td></tr> 
<tr><td width="30%">Non Motile</td><td> : <input type="text" name="nonmotile" value="<?php echo $nonmotile ?>"/></td></tr> 

<tr><td><b>Morphology</b></td></tr>
<tr><td width="30%">Normal form</td><td> : <input type="text" name="normalform" value="<?php echo $normalform ?>"/>%</td></tr>
<tr><td width="30%">Abnormal form</td><td> : <input type="text" name="abnormalform" value="<?php echo $abnormalform ?>"/>%</td></tr> 
<tr><td width="30%">Pus Cells</td><td> : <input type="text" name="puscells" value="<?php echo $puscells ?>"/> /HPF</td></tr> 
<tr><td width="30%">Epithelial Cells</td><td> : <input type="text" name="epithelial" value="<?php echo $epithelial ?>"/></td></tr> 
<tr><td width="30%">RBC's</td><td> : <input type="text" name="rbc" value="<?php echo $rbc ?>"/></td></tr>
<tr><td width="30%">Others</td><td> : <input type="text" name="others" value="<?php echo $others ?>"></td></tr> 

<tr><td width="30%">IMPRESSION</td><td> : <input type="text" name="impression" value="<?php echo $impression ?>"/></td></tr> 
</table>
<?php }


else if($q == "Urine Albumin"){
	$sql2 = mysqli_query($link,"select * from UrineAlbumin where bill_no='$b'");
	$rs=mysqli_fetch_array($sql2);
    $albuminurine = $rs['albuminurine'];
	?>
<h4>Urine Albumin</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Albumin in Urine</td><td> : <input type="text" name="albuminurine" value="<?php echo $albuminurine ?>"/> </td> </td></tr> 


</table>
<?php }
else if($q == "amylase lipase"){
	$sql2 = mysqli_query($link,"select * from lipase where bill_no='$b'");
		    
                $rs=mysqli_fetch_array($sql2);
                $serumamylase = $rs['serumamylase'];
				$serumlipase = $rs['serumlipase'];
				$st=mysqli_query($link,"select * from lipasevalues where id='1'");
		    
                $rs1=mysqli_fetch_array($st);
                $serumamylase2 = $rs1['serumamylase'];
				$serumlipase2 = $rs1['serumlipase'];
	?>
<h4>amylase lipase
</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Serum Amylase</td><td> : <input type="text" name="serumamylase"  value="<?php echo $serumamylase; ?>"/> U/L</td><td><input type="text" name="serumamylase1" value="<?php echo $serumamylase2; ?>"/></td></tr> 
 <tr><td width="30%">Serum Lipase</td><td> : <input type="text" name="serumlipase"  value="<?php echo $serumlipase; ?>"/> U/L</td><td><input type="text" name="serumlipase1" value="<?php echo $serumlipase2?>"/></td></tr> 

</table>
<?php }
else if($q == "SERUM TSH"){
	$sql2 = mysqli_query($link,"select * from tsh where bill_no='$b'");
		    
                $rs=mysqli_fetch_array($sql2);
                $tsh = $rs['tsh'];
				
				$st=mysqli_query($link,"select * from tshnormals where id='1'");
		    
                $rs1=mysqli_fetch_array($st);
                $ad1=$rs1['ad1'];
				$ad2=$rs1['ad2'];
				$pg1=$rs1['pg1'];
				$pg2=$rs1['pg2'];
				$pg3=$rs1['pg3'];
				$cb=$rs1['cb'];
				$birth=$rs1['birth'];
				$week=$rs1['week'];
				$years=$rs1['years'];
				$premature=$rs1['premature'];
	?>
	<h4>Thyroid Stimulating Hormone</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Thyroid Stimulating Hormone(TSH)</td><td> : <input type="text" name="tsh" value="<?php echo $tsh; ?>"/> μlU/mL </td><td>Adults<br/>18-60 yrs<input type="text" name="ad1" value="<?php echo $ad1; ?>"/><br/>>60 yrs<input type="text" name="ad2" value="<?php echo $ad2; ?>"/></br/>Pregnancy<br/>1 Trimester<input type="text" name="pg1" value="<?php echo $pg1; ?>"/></br/>2 Trimester<input type="text" name="pg2" value="<?php echo $pg2; ?>"/></br/>
3 Trimester<input type="text" name="pg3" value="<?php echo $pg3; ?>"/></br/>Pediatric<br/>Cord Blood<input type="text" name="cb" value="<?php echo $cb; ?>"/><br/>Birth-4days<input type="text" name="birth" value="<?php echo $birth; ?>"/><br/>2-20 weeks<input type="text" name="week" value="<?php echo $week; ?>"/><br/>20 wk-18 yrs<input type="text" name="years" value="<?php echo $years; ?>"/><br/>Permature inf<input type="text" name="premature" value="<?php echo $premature; ?>"/> </td></tr> 
 

</table>
<?php }
else if($q == "Serology ( HIV, HBs Ag and VDRL )"){
	$sql2 = mysqli_query($link,"select * from serology where bill_no='$b'");
		    
                $rs=mysqli_fetch_array($sql2);
               $bg = $rs['bg'];
				$rhd = $rs['rhd'];
				$hiv = $rs['hiv'];
				$hbsag = $rs['hbsag'];
				$vdrl = $rs['vdrl'];
				
				
	?>
	
	<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Blood Group</td><td> : <input type="text" name="bg" value="<?php echo $bg?>"/> </td></tr> 
<tr><td width="30%">Rh (D) type</td><td> : <input type="text" name="rhd" value="<?php echo $rhd?>"/></td></tr> 
<tr><td width="30%">HIV 1&11</td><td> : <input type="text" name="hiv" value="<?php echo $hiv?>"/> </td></tr> 
<tr><td width="30%">Hbs Ag</td><td> : <input type="text" name="hbsag" value="<?php echo $hbsag?>"/></td></tr> 
<tr><td width="30%">VDRL</td><td> : <input type="text" name="vdrl" value="<?php echo $vdrl?>"/></td></tr> 

</table>
<?php }
else if($q == "ANP"){?>
	<!-- CBP-->
	<?php
	$sql4 = mysqli_query($link,"select count(*) from cbp where bill_no='$b'");
if($sql4){
	$row4 = mysqli_fetch_array($sql4);
	$cnt = $row4[0];
}
if($cnt <= 0){
?>

<?php
}else{
$sql5 = mysqli_query($link,"select * from cbp where bill_no='$b'");
if($sql5){
	$row5 = mysqli_fetch_array($sql5);
	$HAEMOGLOBIN = $row5['HAEMOGLOBIN'];
	$RBC = $row5['RBC'];
	$WBC_Count = $row5['WBC_Count'];
	$PLATELET_COUNT = $row5['PLATELET_COUNT'];
	$NEUTROPHILS = $row5['NEUTROPHILS'];
	$LYMPHOCYTES = $row5['LYMPHOCYTES'];
	$MONOCYTES = $row5['MONOCYTES'];
	$EOSINOPHILS = $row5['EOSINOPHILS'];
	$BASOPHILS = $row5['BASOPHILS'];
	$RBC1 = $row5['RBC1'];
	$WBC1 = $row5['WBC1'];
	$Platelets = $row5['Platelets'];
	$PACKEDCELL=$row5['PACKEDCELL'];
	$mcv=$row5['mcv'];
	$mch=$row5['mch'];
	$mchc=$row5['mchc'];
	$periperl=$row5['periperl'];
}
}
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="20px"></tr>
<tr><td style="color:red;"><b ><u>COMPLETE BLOOD PICTURE (CBP):</u></b></td></tr>
<tr><td>HAEMOGLOBIN</td><td> : <input type="text" value="<?php echo $HAEMOGLOBIN ?>" name="HAEMOGLOBIN" size="10"/> %</td><td colspan="2">Male : 13.0 – 18.0 g% , Female : 11.5 – 16.0 g%</td></tr>
<tr><td>RBC</td><td> : <input type="text" name="RBC" value="<?php echo $RBC ?>" size="10"/> Mill/ cumm</td><td colspan="2">Male : 4.5 – 6.5 Mill/Cumm , Female : 3.5 – 5.5 Mill/Cumm</td></tr>
<tr><td>WBC Count</td><td> : <input type="text" value="<?php echo $WBC_Count ?>" name="WBC" size="10"/> cells/cumm</td><td colspan="2">4,000 - 11,000/cumm</td></tr>        
<tr><td>PACKED CELL VOLUME</td><td> : <input type="text" value="<?php echo $PACKEDCELL ?>" name="PLATELET" size="10"/> %</td><td colspan="2">Male:40-54 %<br/>Female:36 - 49 %</td></tr>
<tr><td>M C V</td><td> : <input type="text" value="<?php echo $mcv ?>" name="mch" size="10"/> fl</td><td colspan="2">78-96 fl</td></tr>
<tr><td>M C H</td><td> : <input type="text" value="<?php echo $mch ?>" name="mch" size="10"/> pg</td><td colspan="2">27-32 pg</td></tr>
<tr><td>M C H C</td><td> : <input type="text" value="<?php echo $mchc ?>" name="mch" size="10"/> %</td><td colspan="2">30-36 %</td></tr>
<tr height="10px"></tr>
<tr><td><b><u>DIFFERENTIAL COUNT:</u></b></td><td></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <input type="text" value="<?php echo $NEUTROPHILS ?>" name="NEUTROPHILS" id="NEUTROPHILS" size="10"/> %</td><td>40-75%</td><td>30 - 40%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <input type="text" value="<?php echo $LYMPHOCYTES ?>" name="LYMPHOCYTES" id="LYMPHOCYTES" size="10"/> %</td><td>20-45%</td><td>40 - 60%</td></tr>
<tr><td>EOSINOPHILS</td><td> : <input type="text" value="<?php echo $EOSINOPHILS ?>" name="EOSINOPHILS" id="EOSINOPHILS" size="10"/> %</td><td>01-06%</td><td>01 - 06%</td></tr>	  				
<tr><td>MONOCYTES</td><td> : <input type="text" value="<?php echo $MONOCYTES ?>" name="MONOCYTES" id="MONOCYTES" size="10"/> %</td><td>02-10%</td><td>02 - 10%</td></tr>		 		
<tr><td>BASOPHILS</td><td> : <input type="text" value="<?php echo $BASOPHILS ?>" name="BASOPHILS" id="BASOPHILS" size="10" onblur="javascript:fun001();"/> %</td><td>00-01%</td><td>00 - 01%</td></tr>			
<tr><td>Platelet Count</td><td> : <input type="text" name="Platelets" value="<?php echo $Platelets ?>" size="10"/></td><td>1,50,000-4,00,000 cells/Cumm</td></tr> 
<tr><td>Peripheral Smear</td><td> : <input type="text" name="periperl" value="<?php echo $periperl ?>" /></td></tr> 
</table>
	
	<!-- CUE-->
	<?php
	$sql4 = mysqli_query($link,"select * from cue where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$COLOUR = $row5['COLOUR'];
	//$given_on =date('d-m-Y',strtotime($given_on1));
	$APPEARANCE = $row5['APPEARANCE'];
	//$report_on =date('d-m-Y',strtotime($report_on1));
	$REACTION = $row5['REACTION'];
	$RBC = $row5['RBC'];
	//$given_on =date('d-m-Y',strtotime($given_on1));
	$SPECIFIC_GRAVITY = $row5['SPECIFIC_GRAVITY'];
	//$report_on =date('d-m-Y',strtotime($report_on1));
	$SUGAR = $row5['SUGAR'];
	
	$ALBUMIN = $row5['ALBUMIN'];
	$BILE_SALTS = $row5['BILE_SALTS'];
	$BILE_PIGMENTS = $row5['BILE_PIGMENTS'];
	$UROBILINOGEN = $row5['UROBILINOGEN'];
	$KETONES = $row5['KETONES'];
	$PUSCELLS = $row5['PUSCELLS'];
	$EPITHELIAL_CELL = $row5['EPITHELIAL_CELL'];
	$CASTS = $row5['CASTS'];
	$CRYSTALS = $row5['CRYSTALS'];
	$OTHERS = $row5['OTHERS'];
	//$RBC = $row5['RBC'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b color="red"><u>COMPLETE URINE EXAMINATION:</u></b></td></tr>
<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="CUECOLOUR" size="20" value="<?php echo $COLOUR ?>"/></td></tr>
<tr><td>APPEARANCE</td><td align="left"> : <input type="text" name="CUEAPPEARANCE" size="20" value="<?php echo $APPEARANCE ?>"/></td></tr>
<tr><td>REACTION</td><td align="left"> : <input type="text" name="CUEREACTION" size="20" value="<?php echo $REACTION ?>"/></td></tr>        
<tr><td>SPECIFIC GRAVITY</td><td align="left"> : <input type="text" name="CUESPECIFICGRAVITY" size="20" value="<?php echo $SPECIFIC_GRAVITY ?>"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>SUGAR</td><td align="left"> : <input type="text" name="CUESUGAR" size="20" value="<?php echo $SUGAR ?>"/></td></tr>
<tr><td>ALBUMIN</td><td align="left"> : <input type="text" name="CUEALBUMIN" size="20" value="<?php echo $ALBUMIN ?>"/></td></tr>
<tr><td>BILE SALTS</td><td align="left"> : <input type="text" name="CUEBILESALTS" size="20" value="<?php echo $BILE_SALTS ?>"/></td></tr>		 		
<tr><td>BILE PIGMENTS</td><td> : <input type="text" name="CUEBILEPIGMENTS" size="20" value="<?php echo $BILE_PIGMENTS ?>"/></td></tr>	  				
<tr><td>UROBILINOGEN</td><td> : <input type="text" name="CUEUROBILINOGEN" size="20" value="<?php echo  $UROBILINOGEN?>"/></td></tr>			
<tr><td>KETONES</td><td> : <input type="text" name="CUEKETONES" size="20" value="<?php echo $KETONES ?>"/></td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="CUERBC" size="20" value="<?php echo $RBC ?>"/>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <input type="text" name="CUEPUSCELLS" size="20" value="<?php echo $PUSCELLS ?>"/>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <input type="text" name="CUEEPITHELIAL" size="20" value="<?php echo $EPITHELIAL_CELL  ?>"/>  /HPF</td></tr> 
<tr><td>CASTS</td><td> : <input type="text" name="CUECASTS" size="20" value="<?php echo $CASTS ?>"/></td></tr> 
<tr><td>CRYSTALS</td><td> : <input type="text" name="CUECRYSTALS" size="20" value="<?php echo $CRYSTALS ?>"/></td></tr> 
<tr><td>OTHERS</td><td> : <input type="text" name="CUEOTHERS" size="20" value="<?php echo $OTHERS ?>"/></td></tr> 
</table>
	
	
	
	
	<!-- LFT-->
	<?php
	$sql4 = mysqli_query($link,"select * from lft where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$TOTAL_BILIRUBIN = $row5['TOTAL_BILIRUBIN'];
	$DIRECT_BILIRUBIN = $row5['DIRECT_BILIRUBIN'];
	$INDIRECT_BILIRUBIN = $row5['INDIRECT_BILIRUBIN'];
	$SGOT = $row5['SGOT'];
	$SGPT = $row5['SGPT'];
	$S_ALKALINE_PHOSPHATE = $row5['S_ALKALINE_PHOSPHATE'];
	$TOTAL_PROTIENS = $row5['TOTAL_PROTIENS'];
	$SERUM_ALBUMIN = $row5['SERUM_ALBUMIN'];
	$SERUM_GLOBULIN = $row5['SERUM_GLOBULIN'];
	$AG_Ratio = $row5['AG_Ratio'];
	



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>LIVER FUNCTION TEST:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULTS </u></td><td><b><u>NORMAL RANGES </u></td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL BILIRUBIN</td><td> : <input type="text" name="LFTTBILIRUBIN" size="10" value="<?php echo $TOTAL_BILIRUBIN ?>"/> mg/dl</td><td>0.2 - 1.0 mg/dl</td></tr> 
<tr><td>CONJUGATED(DIRECT BILIRUBIN)</td><td> : <input type="text" name="LFTDBILIRUBIN" size="10" value="<?php echo $DIRECT_BILIRUBIN ?>"/> mg/dl</td><td>0.2 - 0.5 mg/dl</td></tr> 
<tr><td>ALKALINE PHOSPHATE</td><td> : <input type="text" name="LFTSAPHOSPHATE" size="10" value="<?php echo $S_ALKALINE_PHOSPHATE ?>"/> U/L</td><td>Adults:40 - 120 U/L<br/>Children's:<350 U/L</td></tr> 
<tr height="10px"></tr>
<tr><td>SGPT</td><td> : <input type="text" name="LFTSGPT" size="10" value="<?php echo $SGPT ?>"/> U/L</td><td>UP TO 37 U/L</td></tr> 
<tr><td>SGOT </td><td> : <input type="text" name="LFTSGOT" size="10" value="<?php echo $SGOT ?>"/> U/L</td><td>UP TO 40  U/L</td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL PROTIENS </td><td> : <input type="text" name="LFTTPROTIENS" size="10" value="<?php echo $TOTAL_PROTIENS ?>"/> gm/dl</td><td>6.0 - 8.0 gm/dl</td></tr> 
<tr><td> ALBUMIN</td><td> : <input type="text" name="LFTSALBUMIN" size="10" value="<?php echo  $SERUM_ALBUMIN?>"/> g/dl</td><td>3.5 - 5.0 gm/dl</td></tr> 
<tr><td> GLOBULIN</td><td> : <input type="text" name="LFTSGLOBULIN" size="10" value="<?php echo  $SERUM_GLOBULIN?>"/></td><td></td></tr> 

</table>
	
	<!-- TSH-->
	<?php
	$sql2 = mysqli_query($link,"select * from tsh where bill_no='$b'");
		    
                $rs=mysqli_fetch_array($sql2);
                $tsh = $rs['tsh'];
				
				$st=mysqli_query($link,"select * from tshnormals where id='1'");
		    
                $rs1=mysqli_fetch_array($st);
                $ad1=$rs1['ad1'];
				$ad2=$rs1['ad2'];
				$pg1=$rs1['pg1'];
				$pg2=$rs1['pg2'];
				$pg3=$rs1['pg3'];
				$cb=$rs1['cb'];
				$birth=$rs1['birth'];
				$week=$rs1['week'];
				$years=$rs1['years'];
				$premature=$rs1['premature'];
	?>
	<h4 style="color:red;">Thyroid Stimulating Hormone</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Thyroid Stimulating Hormone(TSH)</td><td> : <input type="text" name="tsh" value="<?php echo $tsh; ?>"/> μlU/mL </td><td>Adults<br/>18-60 yrs<input type="text" name="ad1" value="<?php echo $ad1; ?>"/><br/>>60 yrs<input type="text" name="ad2" value="<?php echo $ad2; ?>"/></br/>Pregnancy<br/>1 Trimester<input type="text" name="pg1" value="<?php echo $pg1; ?>"/></br/>2 Trimester<input type="text" name="pg2" value="<?php echo $pg2; ?>"/></br/>
3 Trimester<input type="text" name="pg3" value="<?php echo $pg3; ?>"/></br/>Pediatric<br/>Cord Blood<input type="text" name="cb" value="<?php echo $cb; ?>"/><br/>Birth-4days<input type="text" name="birth" value="<?php echo $birth; ?>"/><br/>2-20 weeks<input type="text" name="week" value="<?php echo $week; ?>"/><br/>20 wk-18 yrs<input type="text" name="years" value="<?php echo $years; ?>"/><br/>Permature inf<input type="text" name="premature" value="<?php echo $premature; ?>"/> </td></tr> 
 

</table>
	<!-- Amalyse Lipase-->
	<?php  
	
	$sql2 = mysqli_query($link,"select * from lipase where bill_no='$b'");
		    
                $rs=mysqli_fetch_array($sql2);
                $serumamylase = $rs['serumamylase'];
				$serumlipase = $rs['serumlipase'];
				$st=mysqli_query($link,"select * from lipasevalues where id='1'");
		    
                $rs1=mysqli_fetch_array($st);
                $serumamylase2 = $rs1['serumamylase'];
				$serumlipase2 = $rs1['serumlipase'];
	?>
<h4 style="color:red;">amylase lipase</h4>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Serum Amylase</td><td> : <input type="text" name="serumamylase"  value="<?php echo $serumamylase; ?>"/> U/L</td><td><input type="text" name="serumamylase1" value="<?php echo $serumamylase2; ?>"/></td></tr> 
 <tr><td width="30%">Serum Lipase</td><td> : <input type="text" name="serumlipase"  value="<?php echo $serumlipase; ?>"/> U/L</td><td><input type="text" name="serumlipase1" value="<?php echo $serumlipase2?>"/></td></tr> 

</table>
	<!-- Serology ( HIV, HBs Ag and VDRL )-->
	<?php
	$sql2 = mysqli_query($link,"select * from serology where bill_no='$b'");
		    
                $rs=mysqli_fetch_array($sql2);
               $bg = $rs['bg'];
				$rhd = $rs['rhd'];
				$hiv = $rs['hiv'];
				$hbsag = $rs['hbsag'];
				$vdrl = $rs['vdrl'];
				
				
	?>
	
	<h1 style="color:red;">Serology ( HIV, HBs Ag and VDRL )</h1>
	<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Blood Group</td><td> : <input type="text" name="bg" value="<?php echo $bg?>"/> </td></tr> 
<tr><td width="30%">Rh (D) type</td><td> : <input type="text" name="rhd" value="<?php echo $rhd?>"/></td></tr> 
<tr><td width="30%">HIV 1&11</td><td> : <input type="text" name="hiv" value="<?php echo $hiv?>"/> </td></tr> 
<tr><td width="30%">Hbs Ag</td><td> : <input type="text" name="hbsag" value="<?php echo $hbsag?>"/></td></tr> 
<tr><td width="30%">VDRL</td><td> : <input type="text" name="vdrl" value="<?php echo $vdrl?>"/></td></tr> 

</table>








<?php }

echo "@" . $r;
?>