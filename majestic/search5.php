<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT * FROM mbill WHERE BillNO = '$q'";
$result = mysql_query($sql);
if($result){
	$row = mysql_fetch_array($result);
	echo "@" . date('d-m-Y',strtotime($row['BillDate']));
	echo "@" . $row['PatientName'];
	echo "@" . $row['Age'];
	echo "@" . $row['Sex'];
	echo "@" . $row['DoctorName'] . "@";
	
}
$sql3=mysql_query("SELECT TestName FROM mbill WHERE BillNO = '$q'");
if($sql3){
while($row3 = mysql_fetch_array($sql3)){
$tname = $row3['TestName'];
?>
<table>
<tr ><td><input type="radio" name="tid" id="tid" value="<?php echo $tname ?>" onclick="showHint1(this.value)"/> <?php echo $tname ?></td></tr>
</table>
<?php
}}
echo "@";
$sql1=mysql_query("SELECT TestName FROM mbill WHERE BillNO = '$q'");
if($sql1){
$i=0;
while($row1 = mysql_fetch_array($sql1)){
$tname = $row1['TestName'];
$i++;
?>
<input type="hidden" name="tname[]" value="<?php echo $tname ?>"/>
<?php
if($tname == "COMPLETE BLOOD  PICTURE (CBP)"){
?>

<table width="100%" border="0" cellpadding="2" cellspacing="0">
<script>
function fun001(){
	var neutro = document.getElementById("NEUTROPHILS").value;
	var lympho = document.getElementById("LYMPHOCYTES").value;
	var mono = document.getElementById("MONOCYTES").value;
	var eosino = document.getElementById("EOSINOPHILS").value;
	var baso = document.getElementById("BASOPHILS").value;
	alert(baso);
	var sum = eval(neutro)+eval(lympho)+eval(mono)+eval(eosino)+eval(baso);
	if(sum < 100){
		alert("Please enter correct values");
		document.getElementById("BASOPHILS").focus();
	}
}
</script>
<tr height="20px"></tr>
<tr><td style="color:red;"><b ><u><?php echo $i ?>) COMPLETE BLOOD PICTURE (CBP):</u></b></td></tr>
<?php
$mbs="select * from cbpnormal where id='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$id=$row['id'];
$hm=htmlspecialchars($row['hm']);
$hf=$row['hf'];
$rbcm=$row['rbcm'];
$rbcf=$row['rbcf'];
$webcount=$row['webcount'];
$plateletcount=$row['plateletcount'];
$na=$row['na'];
$nc=$row['nc'];
$la=$row['la'];
$lc=$row['lc'];
$ma=$row['ma'];
$mc=$row['mc'];
$ea=$row['ea'];
$ec=$row['ec'];
$baa=$row['baa'];
$bac=$row['bac'];
$hnormal=$row['hnormal'];
$rbcnormal=$row['rbcnormal'];
$webcountnormal=$row['webcountnormal'];
$plateletnormal=$row['plateletnormal'];        

?>

<tr><td>HAEMOGLOBIN</td><td> : <input type="text" name="HAEMOGLOBIN" size="10"/> %</td><td><input type="hidden" name="cbpid" value="<?php echo $id; ?>"/>Male : <input type="text" name="hm" value="<?php echo mysql_real_escape_string($hm); ?>"/> <input type="text" name="hnormal" size="5" value="<?php echo $hnormal; ?>" /> ,<br/> Female : <input type="text" name="hf" value="<?php echo $hf; ?>"/><input type="text" name="hnormal" size="5" value="<?php echo $hnormal; ?>" /></td></tr>
<tr><td>RBC</td><td> : <input type="text" name="RBC" size="10"/> Mill/ cumm</td><td>Male :<input type="text" name="rbcm" value="<?php echo $rbcm; ?>"/><input type="text" name="rbcnormal" size="5" value="<?php echo $rbcnormal; ?>" /> ,<br/> Female : <input type="text" name="rbcf" value="<?php echo $rbcf; ?>"/><input type="text" name="rbcnormal" size="5" value="<?php echo $rbcnormal; ?>" /></td></tr>
<tr><td>WBC Count</td><td> : <input type="text" name="WBC" size="10"/> cells/cumm</td><td><input type="text" name="webcount" value="<?php echo $webcount; ?>"/><input type="text" name="webcountnormal" size="5" value="<?php echo $webcountnormal; ?>" /></td></tr>        
<tr><td>PLATELET COUNT</td><td> : <input type="text" name="PLATELET" size="10"/> lakhs /cumm</td><td><input type="text" name="plateletcount" value="<?php echo $plateletcount; ?>"/><input type="text" name="plateletnormal" size="5" value="<?php echo $plateletnormal; ?>" /></td></tr>
<tr height="10px"></tr>
<tr><td><b><u>DIFFERENTIAL LEUCOCYTE COUNT:</u></b></td><td></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <input type="text" name="NEUTROPHILS" id="NEUTROPHILS" size="10"/> %</td><td><input type="text" name="na" value="<?php echo $na; ?>"/>%</td><td><input type="text" name="nc" value="<?php echo $nc; ?>"/>%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <input type="text" name="LYMPHOCYTES" id="LYMPHOCYTES" size="10"/> %</td><td><input type="text" name="la" value="<?php echo $la; ?>"/>%</td><td><input type="text" name="lc" value="<?php echo $lc; ?>"/>%</td></tr>
<tr><td>MONOCYTES</td><td> : <input type="text" name="MONOCYTES" id="MONOCYTES" size="10"/> %</td><td><input type="text" name="ma" value="<?php echo $ma; ?>"/>%</td><td><input type="text" name="mc" value="<?php echo $mc; ?>"/>%</td></tr>		 		
<tr><td>EOSINOPHILS</td><td> : <input type="text" name="EOSINOPHILS" id="EOSINOPHILS" size="10"/> %</td><td><input type="text" name="ea" value="<?php echo $ea; ?>"/>%</td><td><input type="text" name="ec" value="<?php echo $ec; ?>"/>%</td></tr>	  				
<tr><td>BASOPHILS</td><td> : <input type="text" name="BASOPHILS" id="BASOPHILS" size="10" onblur="javascript:fun001();"/> %</td><td><input type="text" name="baa" value="<?php echo $baa; ?>"/>%</td><td><input type="text" name="bac" value="<?php echo $bac; ?>"/>%</td></tr>			
<tr height="10px"></tr>
<tr><td><b><u>PERIPHERAL SMEAR EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="RBC1" size="20"/></td><td>&nbsp;</td></tr> 
<tr><td>WBC</td><td> : <input type="text" name="WBC1" size="20"/></td><td>&nbsp;</td></tr> 
<tr><td>Platelets</td><td> : <input type="text" name="Platelets" size="20"/></td><td>&nbsp;</td></tr> 
</table>
<?php
}if($tname == "COMPLETE URINE EXAMINATION(CUE)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) COMPLETE URINE EXAMINATION:</u></b></td></tr>
<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="CUECOLOUR" size="20"/></td></tr>
<tr><td>APPEARANCE</td><td align="left"> : <input type="text" name="CUEAPPEARANCE" size="20"/></td></tr>
<tr><td>REACTION</td><td align="left"> : <input type="text" name="CUEREACTION" size="20"/></td></tr>        
<tr><td>SPECIFIC GRAVITY</td><td align="left"> : <input type="text" name="CUESPECIFICGRAVITY" size="20"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>SUGAR</td><td align="left"> : <input type="text" name="CUESUGAR" size="20"/></td></tr>
<tr><td>ALBUMIN</td><td align="left"> : <input type="text" name="CUEALBUMIN" size="20"/></td></tr>
<tr><td>BILE SALTS</td><td align="left"> : <input type="text" name="CUEBILESALTS" size="20"/></td></tr>		 		
<tr><td>BILE PIGMENTS</td><td> : <input type="text" name="CUEBILEPIGMENTS" size="20"/></td></tr>	  				
<tr><td>UROBILINOGEN</td><td> : <input type="text" name="CUEUROBILINOGEN" size="20"/></td></tr>			
<tr><td>KETONES</td><td> : <input type="text" name="CUEKETONES" size="20"/></td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="CUERBC" size="20"/>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <input type="text" name="CUEPUSCELLS" size="20"/>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <input type="text" name="CUEEPITHELIAL" size="20"/>  /HPF</td></tr> 
<tr><td>CASTS</td><td> : <input type="text" name="CUECASTS" size="20"/></td></tr> 
<tr><td>CRYSTALS</td><td> : <input type="text" name="CUECRYSTALS" size="20"/></td></tr> 
<tr><td>OTHERS</td><td> : <input type="text" name="CUEOTHERS" size="20"/></td></tr> 
</table>
<?php
}if($tname == "MANTOUX TEST"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) MANTOUX TEST:</u></b></td></tr>
<tr><td>GIVEN ON</td><td> : <input type="text" value="<?php echo date('d-m-Y') ?>" name="MANTOUXGIVENON"/></td></tr> 
<tr><td>REPORT ON</td><td> : <input type="text" value="<?php echo date('d-m-Y') ?>" name="MANTOUXREPORTNON"/></td></tr> 
<tr><td>RESULT</td><td> : <textarea type="text" name="MANTOUXRESULT" cols="35" rows="3" >No Erythema  No Induration is Observed after 48 hrs.</textarea></td></tr> 

</table>
<?php }if($tname == "C - Reactive Protein (CRP)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<?php
$mbs="select * from crprange where crpid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$crpid=$row['crpid'];
$value=$row['value'];
$type=$row['type'];
?>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) SEROLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>C - Reactive Protein (CRP)</td><td> : <input type="text" name="CRPRESULT" size="20" /> mg/dl</td><td><input type="hidden" size="5" name="crpid" value="<?php echo $crpid; ?>"/><input size="5" type="text" name="res" value="<?php echo $value; ?>"/><input type="text" name="type" value="<?php echo $type; ?>" size="5"/></td></tr> 

</table>
<?php }if($tname == "LIVER FUNCTION TEST"){
    
    $mbs="select * from livernormal where lfid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$lfid=$row['lfid'];
$ltbv=$row['ltbv'];
$ldbv=$row['ldbv'];
$ldbt=$row['ldbt'];
$sgotv=$row['sgotv'];
$sgptv=$row['sgptv'];
$sgtt=$row['sgtt'];
$slv1=$row['slv1'];
$slv2=$row['slv2'];
$slv3=$row['slv3'];
$slv4=$row['slv4'];
$slv5=$row['slv5'];
$slvt=$row['slvt'];
$tpv=$row['tpv'];
$sav=$row['sav'];
$tpt=$row['tpt'];
    
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) LIVER FUNCTION TEST:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULTS </u></td><td><b><u>NORMAL RANGES </u></td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL BILIRUBIN</td><td> : <input type="text" name="LFTTBILIRUBIN" size="10" /> mg/dl</td><td><input type="hidden" name="lfid" value="<?php echo $lfid; ?>"/><input type="text" name="ltbv" value="<?php echo $ltbv; ?>" size="5"/><input type="text" name="ldbt" value="<?php echo $ldbt; ?>" size="5"/></td></tr> 
<tr><td>DIRECT BILIRUBIN</td><td> : <input type="text" name="LFTDBILIRUBIN" size="10" /> mg/dl</td><td><input type="text" name="ldbv" value="<?php echo $ldbv; ?>" size="5"/><input type="text" name="ldbt" value="<?php echo $ldbt; ?>" size="5"/></td></tr> 
<tr><td>INDIRECT BILIRUBIN</td><td> : <input type="text" name="LFTIBILIRUBIN" size="10" /> mg/dl</td><td></td></tr> 
<tr height="10px"></tr>
<tr><td>SGOT </td><td> : <input type="text" name="LFTSGOT" size="10" /> U/L</td><td><input type="text" name="sgotv" value="<?php echo $sgotv; ?>" size="5"/><input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="5"/></td></tr> 
<tr><td>SGPT</td><td> : <input type="text" name="LFTSGPT" size="10" /> U/L</td><td><input type="text" name="sgptv" value="<?php echo $sgptv; ?>" size="5"/><input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="5"/></td></tr> 
<tr><td>S.ALKALINE PHOSPHATE</td><td> : <input type="text" name="LFTSAPHOSPHATE" size="10" /> U/L</td><td><input type="text" name="slv1" value="<?php echo $slv1; ?>" size="15"/><input type="text" name="slvt" value="<?php echo $slvt; ?>" size="5"/></td></tr> 
<tr><td></td><td></td><td><input type="text" name="slv2" value="<?php echo $slv2; ?>" size="15"/><input type="text" name="slvt" value="<?php echo $slvt; ?>" size="5"/></td></tr> 
<tr><td></td><td></td><td><input type="text" name="slv3" value="<?php echo $slv3; ?>" size="15"/><input type="text" name="slvt" value="<?php echo $slvt; ?>" size="5"/></td></tr> 
<tr><td></td><td></td><td><input type="text" name="slv4" value="<?php echo $slv4; ?>" size="15"/><input type="text" name="slvt" value="<?php echo $slvt; ?>" size="5"/></td></tr> 
<tr><td></td><td></td><td><input type="text" name="slv5" value="<?php echo $slv5; ?>" size="15"/><input type="text" name="slvt" value="<?php echo $slvt; ?>" size="5"/></td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL PROTIENS </td><td> : <input type="text" name="LFTTPROTIENS" size="10" /> g/dl</td><td><input type="text" name="tpv" value="<?php echo $tpv; ?>" size="15"/><input type="text" name="tpt" value="<?php echo $tpt; ?>" size="5"/></td></tr> 
<tr><td>SERUM ALBUMIN</td><td> : <input type="text" name="LFTSALBUMIN" size="10" /> g/dl</td><td><input type="text" name="sav" value="<?php echo $sav; ?>" size="15"/><input type="text" name="tpt" value="<?php echo $tpt; ?>" size="5"/></td></tr> 
<tr><td>SERUM GLOBULIN</td><td> : <input type="text" name="LFTSGLOBULIN" size="10" /></td><td></td></tr> 
<tr><td>A/G  Ratio</td><td> : <input type="text" name="LFTAGRATIO" size="10" /></td><td></td></tr> 

</table>
<?php }if($tname == "Parasite F and V"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td></tr> 
<tr height="5px"></tr>
<tr><td>Parasite F</td><td> : <input type="text" name="RMTRESULT"  /></td></tr> 
<tr><td>Parasite V</td><td> : <input type="text" name="RMTRESULT1"  /></td></tr> 

</table>
<?php }if($tname == "Smear for Malarial Parasite"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td></tr> 
<tr height="5px"></tr>
<tr><td>Smear for Malarial Parasite</td><td> : <textarea name="SMPRESULT" cols="35" rows="3"></textarea></td></tr> 

</table>
<?php }if($tname == "SERUM AMYLASE"){
    $mbq="select * from serumamynirmal where said='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$said=$row['said'];
$savalue=$row['savalue'];
$satype=$row['satype'];
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) BIO-CHEMISTRY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>SERUM AMYLASE</td><td> : <input type="text" name="SAMYLASE"/> U/L</td><td><input type="hidden" size="6" name="said" value="<?php echo $said; ?>"/> <input type="text" size="10" name="savalue" value="<?php echo $savalue; ?>"/> <input type="text" name="satype" value="<?php echo $satype; ?>" size="6"/></td></tr> 

</table>
<?php }if($tname == "Absolute Eosinophil Count (AEC)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<?php
$mbq="select * from aecrange where aecid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$aecid=$row['aecid'];
$aecvalue=$row['aecvalue'];
$aectype=$row['aectype'];
?>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Absolute Eosinophil Count (AEC)</td><td> : <input type="text" name="aecresult"/> cells/cumm</td><td><input type="hidden" size="5" name="aecid" value="<?php echo $aecid; ?>"/><input size="5" type="text" name="aecvalue" value="<?php echo $aecvalue; ?>"/><input type="text" name="aectype" value="<?php echo $aectype; ?>" size="5"/></td></tr> 

</table>
<?php }if($tname == "Erythrocyte Sedimentation Rate (ESR)"){
    $mbq="select * from esrresult where esrid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$esrid=$row['esrid'];
$esrvalue=$row['esrvalue'];
$esrtype=$row['esrtype'];
    
    
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>





<tr><td width="30%">Erythrocyte Sedimentation Rate (ESR)</td><td> : <input type="text" name="esrresult"/> mm/1st Hr</td><td><input type="hidden" name="esrid" value="<?php echo $esrid; ?>"/><input type="text" name="esrvalue" value="<?php echo $esrvalue; ?>"/><input type="text" name="esrtype" value="<?php echo $esrtype; ?>"/></td></tr> 

</table>
<?php }if($tname == "Serum Electrolytes"){
    
    $mbq="select * from sele where seid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$seid=$row['seid'];
$svalue=$row['svalue'];
$pvalue=$row['pvalue']; 
$cvalue=$row['cvalue'];
$stype=$row['stype'];
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) Serum Electrolytes:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Sodium</td><td> : <input type="text" name="sodium"/> mmol/l</td><td><input type="hidden" name="seid" value="<?php echo $seid; ?>"/><input type="text" name="svalue" value="<?php echo $svalue; ?>"/><input type="text" name="stype" value="<?php echo $stype; ?>"/></td></tr> 
<tr><td width="30%">Potassium</td><td> : <input type="text" name="potash"/> mmol/l</td><td><input type="text" name="pvalue" value="<?php echo $pvalue; ?>"/><input type="text" name="stype" value="<?php echo $stype; ?>"/></td></tr> 
<tr><td width="30%">Chloride</td><td> : <input type="text" name="chloride"/> mmol/l</td><td><input type="text" name="cvalue" value="<?php echo $cvalue; ?>"/><input type="text" name="stype" value="<?php echo $stype; ?>"/></td></tr> 
<tr height="10px"></tr>
</table>
<?php }if($tname == "Random Blood Sugar (RBS)"){
    
    $mbq="select * from rbsrange where rbsid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$rbsid=$row['rbsid'];
$rbsvalue=$row['rbsvalue'];
$rbstype=$row['rbstype'];
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td width="30%">Random Blood Sugar (RBS)</td><td> : <input type="text" name="rbs"/> mg/dl</td><td><input type="hidden" name="rbsid" value="<?php echo $rbsid; ?>"/><input type="text" name="rbsvalue" value="<?php echo $rbsvalue; ?>"/><input type="text" name="rbstype" value="<?php echo $rbstype; ?>"/></td></tr> 
<tr><td width="30%">Random Urine Sugar</td><td> : <input type="text" name="rus"/></td></tr> 

</table>
<?php }if($tname == "Blood Urea"){
     $mbq="select * from bunormals where buid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$buid=$row['buid'];
$buvalue=$row['buvalue'];
$butype=$row['butype'];
    
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td width="30%">Blood Urea</td><td> : <input type="text" name="burea"/> mg/dl</td><td><input type="hidden" name="buid" value="<?php echo $buid; ?>"/><input type="text" name="buvalue" value="<?php echo $buvalue; ?>"/><input type="text" name="butype" value="<?php echo $butype; ?>"/></td></tr> 

</table>
<?php }if($tname == "Serum Creatinine"){
    
     $mbq="select * from creatinormals where cid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$cid=$row['cid'];
$cvalue=$row['cvalue'];
$ctype=$row['ctype'];
    
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td width="30%">Serum Creatinine</td><td> : <input type="text" name="creati"/> mg/dl</td><td><input type="hidden" name="cid" value="<?php echo $cid; ?>"/><input type="text" name="cvalue" value="<?php echo $cvalue; ?>"/><input type="text" name="ctype" value="<?php echo $ctype; ?>"/></td></tr> 

</table>
<?php }if($tname == "SERUM CALCIUM"){
    $mbq="select * from scnormal where scid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$scid=$row['scid'];
$scvalue=$row['scvalue'];
$sctype=$row['sctype'];
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">SERUM CALCIUM</td><td> : <input type="text" name="cal_result"/> mg/dl</td><td><input type="hidden" name="scid" value="<?php echo $scid; ?>"/><input type="text" name="scvalue" value="<?php echo $scvalue; ?>"/><input type="text" name="sctype" value="<?php echo $sctype; ?>"/></td></tr> 

</table>
<?php }if($tname == "Prothrombin Time (PT)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Prothrombin Time (PT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="pttest"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="ptcontrol"/> seconds</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">INR</td><td> : <input type="text" name="ptinr"/></td></tr> 

</table>
<?php }if($tname == "Activated Partial Thromboplastin Time (APTT)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Activated Partial Thromboplastin Time (APTT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="aptttest"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="apttcontrol"/> seconds</td></tr> 

</table>
<?php }if($tname == "Serum Uric Acid"){
    
    $sql21 = mysql_query("select * from serumuricacidnormals where suaid='1'");
		while($r=  mysql_fetch_array($sql21)){
                    
		$sum = $r['sum'];
                $sumv = $r['sumv'];
                $suf = $r['suf'];
                $sufv = $r['sufv'];
		$suaid = $r['suaid'];
		}
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
    
<tr height="5px"></tr>
<tr><td width="30%">Serum Uric Acid</td><td> : <input type="text" name="sua_result"/> mg/dl</td><td>Male :<input type="hidden" name="suaid" value="<?php echo $suaid;?>" size="5"/> <input type="text" name="suam" value="<?php echo $sum;?>" size="5"/> <input type="text" name="sumv" value="<?php echo $sumv;?>" size="5"/><br>Female : <input type="text" name="suf" value="<?php echo $suf;?>" size="5"/> <input type="text" name="sufv" value="<?php echo $sufv;?>" size="5"/> </td></tr> 

</table>
<?php }if($tname == "COMPLETE STOOL EXAMINATION"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) COMPLETE STOOL EXAMINATION:</u></b></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>PHYSICAL EXAMINATION:</u></b></td></tr> 

<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="CSECOLOUR" size="20"/></td></tr>
<tr><td>CONSISTENCY </td><td align="left"> : <input type="text" name="CSECONSISTENCY" size="20"/></td></tr>
<tr><td>REACTION</td><td align="left"> : <input type="text" name="CSEREACTION" size="20"/></td></tr>        
<tr><td>MUCUS</td><td align="left"> : <input type="text" name="CSEMUCUS" size="20"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>OCCULT BLOOD</td><td align="left"> : <input type="text" name="CSEOCCULT" size="20"/></td></tr>
<tr><td>REDUCING SUBSTANCE</td><td align="left"> : <input type="text" name="CSESUBSTANCE" size="20"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="CSERBC" size="20"/>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <input type="text" name="CSEPUSCELLS" size="20"/>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <input type="text" name="CSEEPITHELIAL" size="20"/>  /HPF</td></tr> 
<tr><td>OVAS</td><td> : <input type="text" name="CSEOVAS" size="20"/></td></tr> 
<tr><td>CYSTS</td><td> : <input type="text" name="CSECYSTS" size="20"/></td></tr> 
<tr><td>OTHERS</td><td> : <input type="text" name="CSEOTHERS" size="20"/></td></tr> 
</table>
<?php }if($tname == "HBsAg"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HBsAg</td><td> : <input type="text" name="hresult" size="25"/></td></tr> 

</table>
<?php }if($tname == "WIDAL"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td></tr>
<tr><td width="30%" colspan="2"><b>WIDAL : </b></td></tr> 
<tr><td width="30%">Salmonella Typhi "O"</td><td> : <input type="text" name="sto"/></td></tr> 
<tr><td width="30%">Salmonella Typhi "H"</td><td> : <input type="text" name="sth"/></td></tr> 
<tr><td width="30%">Salmonella Paratyphi "AH"</td><td> : <input type="text" name="spah"/></td></tr> 
<tr><td width="30%">Salmonella Paratyphi "BH"</td><td> : <input type="text" name="spbh"/></td></tr> 

</table>
<?php }if($tname == "HAEMOGLOBIN"){
    
    $mbs="select * from hemgnormals where hmgid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$hmgid=$row['hmgid'];
$hmdm=$row['hmdm'];
$hmdf=$row['hmdf'];
    $hmdtype=$row['hmdtype'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">HAEMOGLOBIN</td><td> : <input type="text" name="haresult"/> % </td><td>Male : <input type="hidden" name="hmgid" value="<?php echo $hmgid; ?>" size="5"/><input size="5" type="text" name="hmdm" value="<?php echo $hmdm; ?>"/><input size="5" type="text" name="hmdtype" value="<?php echo $hmdtype; ?>"/> <br>Female : <input size="5" type="text" name="hmdf" value="<?php echo $hmdf; ?>"/><input size="5" type="text" name="hmdtype" value="<?php echo $hmdtype; ?>"/></td></tr> 

</table>
<?php }if($tname == "RFT"){
    
    
    $r1=  mysql_query("select * from rbsrange where rbsid='1'") or die(mysql_error());
$row=  mysql_fetch_array($r1);
$rbsid1=$row['rbsid'];
$rbsvalue1=$row['rbsvalue'];
$rbstype1=$row['rbstype'];
    
$r1=  mysql_query("select * from bunormals where buid='1'") or die(mysql_error());
$row=  mysql_fetch_array($r1);
$buid1=$row['buid'];
$buvalue1=$row['buvalue'];
$butype1=$row['butype'];

$r1=  mysql_query("select * from creatinormals where cid='1'") or die(mysql_error());
$row=  mysql_fetch_array($r1);
$cid1=$row['cid'];
$cvalue2=$row['cvalue'];
$ctype1=$row['ctype'];

$sql21 = mysql_query("select * from serumuricacidnormals where suaid='1'");
		while($r=  mysql_fetch_array($sql21)){
                    
		$sum1 = $r['sum'];
                $sumv1 = $r['sumv'];
                $suf1 = $r['suf'];
                $sufv1 = $r['sufv'];
		$suaid1 = $r['suaid'];
		}
$r1=  mysql_query("select * from scnormal where scid='1'") or die(mysql_error());
$row=  mysql_fetch_array($r1);
$scid1=$row['scid'];
$scvalue1=$row['scvalue'];
$sctype1=$row['sctype'];



$r1=  mysql_query("select * from sele where seid='1'") or die(mysql_error());
$row=  mysql_fetch_array($r1);
$seid1=$row['seid'];
$svalue1=$row['svalue'];
$pvalue1=$row['pvalue']; 
$cvalue1=$row['cvalue'];
$stype1=$row['stype'];   
    
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) RFT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">Random Blood Sugar (RBS)</td><td> : <input type="text" name="rftrbs"/> mg/dl</td><td><input type="hidden" name="rbsid1" value="<?php echo $rbsid1; ?>" size="6"/>
<input type="text" name="rbsvalue1" value="<?php echo $rbsvalue1; ?>" size="6"/>
<input type="text" name="rbstype1" value="<?php echo $rbstype1; ?>" size="6"/></td></tr> 
<tr><td width="30%">Blood Urea</td><td> : <input type="text" name="rftbu"/> mg/dl</td><td><input type="hidden" size="6" name="buid1" value="<?php echo $buid1; ?>"/><input type="text" size="6" name="buvalue1" value="<?php echo $buvalue1; ?>"/><input type="text" size="6" name="butype1" value="<?php echo $butype1; ?>"/></td></tr> 
<tr><td width="30%">Serum Creatinine</td><td> : <input type="text" name="rftscr"/> mg/dl</td><td><input type="hidden" size="6" name="cid1" value="<?php echo $cid1; ?>"/><input type="text" size="6" name="cvalue2" value="<?php echo $cvalue2; ?>"/><input type="text" size="6" name="ctype1" value="<?php echo $ctype1; ?>"/></td></tr> 
<tr><td width="30%">Serum Uric Acid</td><td> : <input type="text" name="rftsua"/> mg/dl</td><td>Male :<input type="hidden" name="suaid1" value="<?php echo $suaid1;?>" size="5"/> <input type="text" name="suam1" value="<?php echo $sum1;?>" size="5"/> <input type="text" name="sumv1" value="<?php echo $sumv1;?>" size="5"/><br>Female : <input type="text" name="suf1" value="<?php echo $suf1;?>" size="5"/> <input type="text" name="sufv1" value="<?php echo $sufv1;?>" size="5"/></td></tr> 
<tr><td width="30%">Serum Calcium</td><td> : <input type="text" name="rftsc"/> mg/dl</td><td><input type="hidden" size="6" name="scid1" value="<?php echo $scid1; ?>"/><input type="text" size="6" name="scvalue1" value="<?php echo $scvalue1; ?>"/><input type="text" name="sctype1" value="<?php echo $sctype1; ?>" size="6"/></td></tr> 
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>Serum Electrolytes:</u></b></td></tr>

<tr><td width="30%">Serum Sodium</td><td> : <input type="text" name="rftsodium"/> mmol/l</td><td><input type="hidden" name="seid1" value="<?php echo $seid1; ?>" size="3"/><input type="text"  name="svalue1" value="<?php echo $svalue1; ?>" size="8"/><input type="text" name="stype1" value="<?php echo $stype1; ?>" size="5"/></td></tr> 
<tr><td width="30%">Serum Potassium</td><td> : <input type="text" name="rftpotash"/> mmol/l</td><td><input type="text" name="pvalue1" value="<?php echo $pvalue1; ?>" size="8"/><input type="text" name="stype1" value="<?php echo $stype1; ?>" size="5"/></td></tr> 
<tr><td width="30%">Serum Chloride</td><td> : <input type="text" name="rftchloride"/> mmol/l</td><td><input type="text" name="cvalue1" value="<?php echo $cvalue1; ?>" size="8"/><input type="text" name="stype1" value="<?php echo $stype1; ?>" size="5"/></td></tr> 

</table>
<?php }if($tname == "Reducing Substance"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">Reducing Substance</td><td align="left"> : <input type="text" name="rsub" size="20"/></td></tr>

</table>
<?php }if($tname == "SERUM BILIRUBIN"){
    
    $mbs="select * from sbillnormal where sbid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$sbid=$row['sbid'];
$tbif=$row['tbif'];
$tbad=$row['tbad'];
    $dbif=$row['dbif'];
     $dbad=$row['dbad'];
     $sbtype=$row['sbtype'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>Serum Bilirubin : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Total Bilirubin</td><td> : <input type="text" name="tbil" size="10" /> mg/dl</td><td>infants: <input type="hidden" name="sbid" value="<?php echo $sbid; ?>" size="5"/><input size="5" type="text" name="tbif" value="<?php echo $tbif; ?>"/><input size="5" type="text" name="sbtype" value="<?php echo $sbtype; ?>"/> <br>adults: <input size="5" type="text" name="tbad" value="<?php echo $tbad; ?>"/><input size="5" type="text" name="sbtype" value="<?php echo $sbtype; ?>"/></td></tr> 
<tr><td>Direct Bilirubin</td><td> : <input type="text" name="dbil" size="10" /> mg/dl</td><td>infants: <input size="5" type="text" name="dbif" value="<?php echo $dbif; ?>"/><input size="5" type="text" name="sbtype" value="<?php echo $sbtype; ?>"/><br>adults: <input size="5" type="text" name="dbad" value="<?php echo $dbad; ?>"/><input size="5" type="text" name="sbtype" value="<?php echo $sbtype; ?>"/></td></tr> 
<tr><td>Indirect Bilirubin</td><td> : <input type="text" name="ibil" size="10" /> mg/dl</td><td></td></tr> 

</table>
<?php }if($tname == "BLEEDING TIME AND CLOTTING TIME"){
    
    $mbs="select * from bleedingnormal where bdlid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$bdlid=$row['bdlid'];
$btv=$row['btv'];
$ctv=$row['ctv'];
   
    
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Reference Range</u></b></td></tr>

<tr height="5px"></tr>
<tr><td width="30%">Bleeding Time (BT)</td><td> : <input type="text" name="bt" value="00' Min 00'' Sec" size="20" /></td><td><input type="hidden" name="bdlid" value="<?php echo $bdlid ?>"/><input type="text" name="btv" value="<?php echo $btv ?>" size="25"/>  </td></tr> 
<tr><td width="30%">Clotting Time (CT)</td><td> : <input type="text" name="ct" value="00' Min 00'' Sec" size="20" /></td><td><input type="text" name="ctv" value="<?php echo $ctv ?>" size="25"/>  </td></tr> 

</table>
<?php }if($tname == "BLOOD GROUP"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td></tr>

<tr height="5px"></tr>
<tr><td width="30%">Blood Group </td><td> : <input type="text" name="bgroup" size="20" /></td></tr> 
<tr><td width="30%">Rh Typing</td><td> : <input type="text" name="rht" size="20" /></td></tr> 

</table>
<?php }if($tname == "BLOOD SUGAR(FBS,PLBS)"){
    
$mbs="select * from bsugarnormals where bsid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$bsid=$row['bsid'];
$fbsvalue=$row['fbsvalue'];
$plbsvalue=$row['plbsvalue'];
$type=$row['type'];
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Reference Range</u></b></td></tr>

<tr height="5px"></tr>
<tr><td width="30%">Fasting Blood Sugar</td><td> : <input type="text" name="fbs" size="20" /> mg/dl</td><td><input type="hidden" name="bsid" value="<?php echo $bsid; ?>" size="5"/><input size="5" type="text" name="fbsvalue" value="<?php echo $fbsvalue; ?>"/><input size="5" type="text" name="type" value="<?php echo $type; ?>"/></td></tr> 
<tr><td width="30%">Fasting Urine Sugar</td><td> : <input type="text" name="fus" size="20" /></td></tr> 
<tr><td width="30%">Post Lunch Bloob Sugar</td><td> : <input type="text" name="plbs" size="20" /> mg/dl</td><td><input size="5" type="text" name="plbsvalue" value="<?php echo $plbsvalue; ?>"/><input size="5" type="text" name="type" value="<?php echo $type; ?>"/></td></tr> 
<tr><td width="30%">Post Lunch Urine Sugar </td><td> : <input type="text" name="plus" size="20" /></td></tr> 

</table>
<?php }if($tname == "HIV 1 AND 2"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HIV I & II</td><td> : <input type="text" name="hiv" size="25" /></td></tr> 

</table>
<?php }if($tname == "HCV"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HCV</td><td> : <input type="text" name="hcv" size="25" /></td></tr> 

</table>
<?php }if($tname == "VDRL"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">VDRL</td><td> : <input type="text" name="vdrl" size="25" /></td></tr> 

</table>
<?php }if($tname == "LIPID PROFILE"){
    
    
    $mbs="select * from lipidnormal where lpdid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$lpdid=$row['lpdid'];
$lpsn=$row['lpsn'];
$lpsb=$row['lpsb'];
$lpse=$row['lpse'];
$lpst=$row['lpst'];
$lphv=$row['lphv'];
$lpht=$row['lpht'];
$lpl1=$row['lpl1'];
$lpl2=$row['lpl2'];
$lplt=$row['lplt'];
$lpvv=$row['lpvv'];
$lpvt=$row['lpvt'];
$lpstn=$row['lpstn'];
$lpstb=$row['lpstb'];
$lpsth=$row['lpsth'];
$lpstt=$row['lpstt'];
$lplthn=$row['lplthn'];
$lplthb=$row['lplthb'];
$lpltht=$row['lpltht'];
    
    
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>LIPID PROFILE : </u></b></td></tr>

<tr height="5px"></tr>

<tr><td width="30%">Serum Cholesterol</td><td> : <input type="text" name="sch" size="20" /> mg/dl</td><td><input type="hidden" name="lpdid" value="<?php echo $lpdid; ?>" size="2"/> <input type="text" name="lpsn" value="<?php echo $lpsn; ?>" size="10"/><input type="text" name="lpst" value="<?php echo $lpst; ?>" size="10"/><br> <input type="text" name="lpsb" value="<?php echo $lpsb; ?>" size="10"/><input type="text" name="lpst" value="<?php echo $lpst; ?>" size="10"/><br><input type="text" name="lpse" value="<?php echo $lpse; ?>" size="10"/><input type="text" name="lpst" value="<?php echo $lpst; ?>" size="10"/></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">HDL Cholesterol</td><td> : <input type="text" name="hch" size="20" /> mg/dl</td><td><input type="text" name="lphv" value="<?php echo $lphv; ?>" size="10"/><input type="text" name="lpht" value="<?php echo $lpht; ?>" size="10"/></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">LDL Cholesterol</td><td> : <input type="text" name="lch" size="20" /> mg/dl</td><td><input type="text" name="lpl1" value="<?php echo $lpl1; ?>" size="10"/><input type="text" name="lplt" value="<?php echo $lplt; ?>" size="10"/><br><input type="text" name="lpl2" value="<?php echo $lpl2; ?>" size="10"/><input type="text" name="lplt" value="<?php echo $lplt; ?>" size="10"/></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">VLDL Cholesterol</td><td> : <input type="text" name="vch" size="20" /> mg/dl</td><td><input type="text" name="lpvv" value="<?php echo $lpvv; ?>" size="10"/><input type="text" name="lpvt" value="<?php echo $lpvt; ?>" size="10"/></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Serum Triglycerides</td><td> : <input type="text" name="stri" size="20" /> mg/dl</td><td><input type="text" name="lpstn" value="<?php echo $lpstn; ?>" size="10"/><input type="text" name="lpstt" value="<?php echo $lpstt; ?>" size="10"/><br><input type="text" name="lpstb" value="<?php echo $lpstb; ?>" size="10"/><input type="text" name="lpstt" value="<?php echo $lpstt; ?>" size="10"/><br><input type="text" name="lpsth" value="<?php echo $lpsth; ?>" size="10"/><input type="text" name="lpstt" value="<?php echo $lpstt; ?>" size="10"/></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">T.CHOL / HDL RATIO</td><td> : <input type="text" name="tch" size="20" /></td><td><input type="text" name="lplthn" value="<?php echo $lplthn; ?>" size="15"/><br><input type="text" name="lplthb" value="<?php echo $lplthb; ?>" size="15"/><br> <input type="text" name="lpltht" value="<?php echo $lpltht; ?>" size="15"/></td></tr> 

</table>
<?php }if($tname == "SPUTUM FOR AFB"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Sputum for AFB</td><td> : <input type="text" name="safb" size="25" /></td></tr> 

</table>
<?php }if($tname == "PLATELET COUNT"){
    
    
    $mbs="select * from plaeletnormals where plid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$plid=$row['plid'];
$plvalue=$row['plvalue'];
$pltype=$row['pltype'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">PLATELET COUNT</td><td> : <input type="text" name="pcount" size="10"/> lakhs /cumm</td><td><input type="hidden" name="plid" value="<?php echo $plid; ?>" size="4"/><input type="text" name="plvalue" value="<?php echo $plvalue; ?>" size="10"/><input type="text" name="pltype" value="<?php echo $pltype; ?>" size="10"/></td></tr>

</table>
<?php }if($tname == "SERUM CHOLESTEROL"){
    
     $mbs="select * from schnormals where schid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$schid=$row['schid'];
$schnormal=$row['schnormal'];
$schborderline=$row['schborderline'];
    $schevelated=$row['schevelated'];
    $schtype=$row['schtype'];
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Cholesterol</td><td> : <input type="text" name="schole" size="20" /> mg/dl</td><td><input type="hidden" name="schid" value="<?php echo $schid; ?>" size="4"/><input type="text" name="schnormal" value="<?php echo $schnormal; ?>" size="10"/><input type="text" name="schtype" value="<?php echo $schtype; ?>" size="10"/><br/><input type="text" name="schborderline" value="<?php echo $schborderline; ?>" size="10"/><input type="text" name="schtype" value="<?php echo $schtype; ?>" size="10"/><br/><input type="text" name="schevelated" value="<?php echo $schevelated; ?>" size="10"/><input type="text" name="schtype" value="<?php echo $schtype; ?>" size="10"/></td></tr> 

</table>
<?php }if($tname == "SERUM TRYGLYCERIDES"){
    
    $mbs="select * from strignormals where stid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$stid=$row['stid'];
$stn=$row['stn'];
$stb=$row['stb'];
    $sth=$row['sth'];
    $stt=$row['stt'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Triglycerides</td><td> : <input type="text" name="strig" size="20" /> mg/dl</td><td><input type="hidden" name="stid" value="<?php echo $stid; ?>" size="4"/><input type="text" name="stn" value="<?php echo $stn; ?>" size="10"/><input type="text" name="stt" value="<?php echo $stt; ?>" size="10"/><br/><input type="text" name="stb" value="<?php echo $stb; ?>" size="10"/><input type="text" name="stt" value="<?php echo $stt; ?>" size="10"/><br/><input type="text" name="sth" value="<?php echo $sth; ?>" size="10"/><input type="text" name="stt" value="<?php echo $stt; ?>" size="10"/></td></tr> 

</table>
<?php }if($tname == "ALKALINE PHOSPHATE"){
    
    $mbs="select * from aphosnormals where apid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$apid=$row['apid'];
$apv=$row['apv'];
$apv1=$row['apv1'];
$apv2=$row['apv2'];
$apv3=$row['apv3'];
$apv4=$row['apv4'];
$apt=$row['apt'];
   
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">ALKALINE PHOSPHATE</td><td> : <input type="text" name="APHOSPHATE" size="10" /> U/L</td><td><input type="hidden" name="apid" value="<?php echo $apid; ?>" size="4"/><input type="text" name="apv" value="<?php echo $apv; ?>" size="15"/><input type="text" name="apt" value="<?php echo $apt; ?>" size="10"/></td></tr> 
<tr><td width="30%"></td><td> </td><td><input type="text" name="apv1" value="<?php echo $apv1; ?>" size="15"/><input type="text" name="apt" value="<?php echo $apt; ?>" size="10"/></td></tr> 
<tr><td width="30%"></td><td> </td><td><input type="text" name="apv2" value="<?php echo $apv2; ?>" size="15"/><input type="text" name="apt" value="<?php echo $apt; ?>" size="10"/></td></tr> 
<tr><td width="30%"></td><td> </td><td><input type="text" name="apv3" value="<?php echo $apv3; ?>" size="15"/><input type="text" name="apt" value="<?php echo $apt; ?>" size="10"/></td></tr> 
<tr><td width="30%"></td><td> </td><td><input type="text" name="apv4" value="<?php echo $apv4; ?>" size="15"/><input type="text" name="apt" value="<?php echo $apt; ?>" size="10"/></td></tr> 

</table>
<?php }if($tname == "TOTAL PROTIENS"){
    
    
    $mbs="select * from tprtnormal where tpid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$tpid=$row['tpid'];
$tpva=$row['tpva'];
$tpty=$row['tpty'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">TOTAL PROTIENS </td><td> : <input type="text" name="TPROTIENS" size="10" /> g/dl</td><td><input type="hidden" name="tpid" value="<?php echo $tpidid; ?>" size="4"/><input type="text" name="tpva" value="<?php echo $tpva; ?>" size="15"/><input type="text" name="tpty" value="<?php echo $tpty; ?>" size="10"/></td></tr> 

</table>
<?php }if($tname == "SERUM POTASSIUM"){
    
    $mbs="select * from spnormals where spid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$spid=$row['spid'];
$spvalue=$row['spvalue'];
$sptype=$row['sptype'];
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Potassium</td><td> : <input type="text" name="spotash"/> mmol/l</td><td><input type="hidden" name="spid" value="<?php echo $spid; ?>" size="4"/><input type="text" name="spvalue" value="<?php echo $spvalue; ?>" size="10"/><input type="text" name="sptype" value="<?php echo $sptype; ?>" size="4"/></td></tr> 

</table>
<?php }if($tname == "Smear for Microfilaria"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Smear for Microfilaria</td><td> : <input type="text" name="smicro" size="25"/></td></tr> 

</table>
<?php }if($tname == "WBC Count"){
    
    $mbq="select * from wbccountrange where wbcid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$wbcid=$row['wbcid'];
$wbcvalue=$row['wbcvalue'];
$wbctype=$row['wbctype'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">WBC Count</td><td> : <input type="text" name="wbccount" size="10"/> cells/cumm</td><td><input type="hidden" size="6" name="wbcid" value="<?php echo $wbcid; ?>"/> <input type="text" size="10" name="wbcvalue" value="<?php echo $wbcvalue; ?>"/> <input type="text" name="wbctype" value="<?php echo $wbctype; ?>" size="6"/></td></tr>        

</table>
<?php }if($tname == "Peripheral Smear"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>Peripheral Smear : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td width="30%">RBC</td><td> : <input type="text" name="psrbc" size="25"/></td></tr>        
<tr><td width="30%">WBC</td><td> : <input type="text" name="pswbc" size="25"/></td></tr>        
<tr><td width="30%">Platelets</td><td> : <input type="text" name="psplatelets" size="25"/></td></tr>        

</table>
<?php }if($tname == "FBS"){
     $mbs="select * from fbsnormal where fbsid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$fbsid=$row['fbsid'];
$fbsvalue=$row['fbsvalue'];
$fbstype=$row['fbstype'];
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Fasting Blood Sugar</td><td> : <input type="text" name="fbss" size="20" /> mg/dl</td><td><input type="hidden" name="fbsid" value="<?php echo $fbsid; ?>" size="4"/><input type="text" name="fbsvalue" value="<?php echo $fbsvalue; ?>" size="10"/><input type="text" name="fbstype" value="<?php echo $fbstype; ?>" size="4"/></td></tr> 
<tr><td width="30%">Fasting Urine Sugar</td><td> : <input type="text" name="fuss" size="20" /></td></tr> 

</table>
<?php }if($tname == "PLBS"){
    
    $mbs="select * from plbsnormals where plbsid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$plbsid=$row['plbsid'];
$plbsvalue=$row['plbsvalue'];
$plbstype=$row['plbstype'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Post Lunch Bloob Sugar</td><td> : <input type="text" name="plbss" size="20" /> mg/dl</td><td><input type="hidden" name="plbsid" value="<?php echo $plbsid; ?>" size="4"/><input type="text" name="plbsvalue" value="<?php echo $plbsvalue; ?>" size="10"/><input type="text" name="plbstype" value="<?php echo $plbstype; ?>" size="4"/></td></tr> 
<tr><td width="30%">Post Lunch Urine Sugar </td><td> : <input type="text" name="pluss" size="20" /></td></tr> 

</table>
<?php }
if($tname == "ASO TITRE"){
$mbs="select * from asonormals where aid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$aid=$row['aid'];
$avalue=$row['avalue'];
$atype=$row['atype'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">ASO TITRE</td><td> : <input type="text" name="asot" size="20"/></td><td><input type="hidden" name="aid" value="<?php echo $aid; ?>" size="4"/><input type="text" name="avalue" value="<?php echo $avalue; ?>" size="10"/><input type="text" name="atype" value="<?php echo $atype; ?>" size="4"/></td></tr> 

</table>
<?php }if($tname == "RA FACTOR"){

 $mbs="select * from rafnormals where rfid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$rfid=$row['rfid'];
$rfvalue=$row['rfvalue'];
$rftype=$row['rftype'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">RA FACTOR</td><td> : <input type="text" name="raf" size="20"/></td><td><input type="hidden" type="rfid" name="aid" value="<?php echo $rfid; ?>" size="4"/><input type="text" name="rfvalue" value="<?php echo $rfvalue; ?>" size="10"/><input type="text" name="rftype" value="<?php echo $rftype; ?>" size="4"/></td></tr> 

</table>
<?php }if($tname == "HBA1C"){
    
     $mbs="select * from hbanormal where hbaid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$hbaid=$row['hbaid'];
$hbavalue=$row['hbavalue'];
$hbatype=$row['hbatype'];
$hbavalue1=$row['hbavalue1'];
$hbavalue2=$row['hbavalue2'];
$hbavalue3=$row['hbavalue3'];

    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HBA1C</td><td> : <input type="text" name="hba" size="20"/> %</td><td><input type="hidden" name="hbaid" value="<?php echo $hbaid; ?>" /><input type="text" name="hbavalue" value="<?php echo $hbavalue; ?>" size="18"/><input type="text" name="hbatype" value="<?php echo $hbatype; ?>" size="4"/><br/><input type="text" name="hbavalue1" value="<?php echo $hbavalue1; ?>" size="18"/><input type="text" name="hbatype" value="<?php echo $hbatype; ?>" size="4"/><br/><input type="text" name="hbavalue2" value="<?php echo $hbavalue2; ?>" size="18"/><input type="text" name="hbatype" value="<?php echo $hbatype; ?>" size="4"/><br/><input type="text" name="hbavalue3" value="<?php echo $hbavalue3; ?>" size="18"/><input type="text" name="hbatype" value="<?php echo $hbatype; ?>" size="4"/><br/></td></tr> 

</table>
<?php }if($tname == "PACKED CELL VOLUME(PCV)"){
    
    
     $mbs="select * from pcvnormals where pcvid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$pcvid=$row['pcvid'];
$pcvm=$row['pcvm'];
$pcvf=$row['pcvf'];
$pcvtype=$row['pcvtype'];
    
    
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">PACKED CELL VOLUME(PCV)</td><td> : <input type="text" name="pcv" size="20"/> %</td><td>Males :<input type="hidden" name="pcvid" value="<?php echo $pcvid; ?>" size="4"/><input type="text" name="pcvm" value="<?php echo $pcvm; ?>" size="10"/><input type="text" name="pcvtype" value="<?php echo $pcvtype; ?>" size="4"/> <br>Females : <input type="text" name="pcvf" value="<?php echo $pcvf; ?>" size="10"/><input type="text" name="pcvtype" value="<?php echo $pcvtype; ?>" size="4"/></td></tr> 

</table>
<?php }if($tname == "COOMBS TEST(DIRECT)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">COOMBS TEST (DIRECT)</td><td> : <input type="text" name="ctd" size="20"/></td></tr> 

</table>
<?php }if($tname == "COOMBS TEST(INDIRECT)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">COOMBS TEST(INDIRECT)</td><td> : <input type="text" name="ctid" size="20"/></td></tr> 

</table>
<?php }if($tname == "DENGUE SEROLOGY"){
    
$mbs="select * from dsrnormal where dsid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$dsid=$row['dsid'];
$iggvalue=$row['iggvalue'];
$igmvalue=$row['igmvalue'];
$ns1value=$row['ns1value'];
    
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>DENGUE SEROLOGY : </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">IgG</td><td><input type="text" name="dsrigg" size="20"/></td><td><input type="hidden" name="dsid" value="<?php echo $dsid; ?>"/><input type="text" name="iggvalue" value="<?php echo $iggvalue; ?>"/> </td></tr> 
<tr><td width="30%">IgM</td><td><input type="text" name="dsrigm" size="20"/></td><td> <input type="text" name="igmvalue" value="<?php echo $igmvalue; ?>"/> </td></tr> 
<tr><td width="30%">Ns1</td><td><input type="text" name="dsrns1" size="20"/></td></td><td> <input type="text" name="ns1value" value="<?php echo $ns1value; ?>"/> </td></tr> 
</table>
<?php }
else if($tname == "RETI COUNT"){
    
    $mbs="select * from retinormals where rtid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$rtid=$row['rtid'];
$rtvalue=$row['rtvalue'];
$rttype=$row['rttype'];
$note=$row['note'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>HAEMOTOLOGY SEROLOGY : </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">Reticulocyte Count </td><td><input type="text" name="Reticulocyte" size="10"/></td><td><input type="hidden" name="rtid" value="<?php echo $rtid; ?>" size="4"/><input type="text" name="rtvalue" value="<?php echo $rtvalue; ?>" size="4"/> <input type="text" name="rttype" value="<?php echo $rttype; ?>" size="4"/> </td></tr> 
<tr><td colspan="2"> <textarea name="note" rows="3" cols="100"><?php echo $note; ?></textarea></td></tr>


</table>
<?php }

else if($tname == "SGOT"){
    
    $mbs="select * from livernormal where lfid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$lfid=$row['lfid'];
$sgotv=$row['sgotv'];
$sgtt=$row['sgtt'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>BIOCHEMISTRY REPORT: </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">SGOT </td><td><input type="text" name="sgot" size="10"/></td><td><input type="hidden" name="lfid" value="<?php echo $lfid; ?>" size="4"/><input type="text" name="sgotv" value="<?php echo $sgotv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr> 


</table>
<?php }
else if($tname == "SGPT"){
    
    $mbs="select * from livernormal where lfid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$lfid=$row['lfid'];
$sgptv=$row['sgptv'];
$sgtt=$row['sgtt'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>BIOCHEMISTRY REPORT: </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">SGPT </td><td><input type="text" name="sgpt" size="10"/></td><td><input type="hidden" name="lfid" value="<?php echo $lfid; ?>" size="4"/><input type="text" name="sgptv" value="<?php echo $sgptv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr> 


</table>
<?php }

else if($tname == "LFT(SGOT SGPT)"){
    
    $mbs="select * from livernormal where lfid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$lfid=$row['lfid'];
$sgptv=$row['sgptv'];
$sgotv=$row['sgotv'];
$sgtt=$row['sgtt'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>BIOCHEMISTRY REPORT: </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">SGOT </td><td><input type="text" name="sgot" size="10"/></td><td><input type="hidden" name="lfid" value="<?php echo $lfid; ?>" size="4"/><input type="text" name="sgotv" value="<?php echo $sgotv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr> 
<tr><td width="30%">SGPT </td><td><input type="text" name="sgpt" size="10"/></td><td><input type="text" name="sgptv" value="<?php echo $sgptv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr>


</table>
<?php }
else if($tname == "FLUID EXAMINATION-ROUTINE(PLEURAL FLUID)"){
    
   

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) Physical Examination::</u></b></td></tr>
<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="COLOUR" size="20"/></td></tr>
<tr><td>VOLUME</td><td align="left"> : <input type="text" name="Volume" size="20"/></td></tr>
<tr><td>APPEARANCE</td><td align="left"> : <input type="text" name="APPEARANCE" size="20"/></td></tr>

<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>GLUCOSE</td><td align="left"> : <input type="text" name="glucose" size="20"/></td></tr>
<tr><td>PROTEIN</td><td align="left"> : <input type="text" name="protein" size="20"/></td></tr>
			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>Total Count</td><td> : <input type="text" name="totalcount" size="20"/>  cells/Cumm</td></tr> 
<tr><td>Differential Count</td><td> :Polymorphs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="Polymorphs" size="20"/>% <br/>
Lymphocytes &nbsp;&nbsp;&nbsp; <input type="text" name="Lymphocytes" size="20"/>%<br/> 
 Mesothelial cells <input type="text" name="Mesothelial" size="20"/>%</td></tr> 

</table>
<?php }
else if($tname == "COAGGULATION(PT APTT)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
 
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Prothrombin Time (PT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="pttest"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="ptcontrol"/> seconds</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">INR</td><td> : <input type="text" name="ptinr"/></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Activated Partial Thromboplastin Time (APTT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="aptttest"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="apttcontrol"/> seconds</td></tr> 

</table>
<?php
}

else if($tname == "24 Hrs URINE PROTIEN"){
$mbs="select * from urinenormal where uid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$uid=$row['uid'];
$uvalue=$row['uvalue'];
$utype=$row['utype'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
 
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>24 Hrs URINE PROTIEN : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Total Volume</td><td> : <input type="text" name="tvolume"/> ml/day</td></tr> 
<tr><td width="30%">Total Protien </td><td> : <input type="text" name="tprotine"/> mg/day</td><td><input type="hidden" name="uid" size="3" value="<?php echo $uid; ?>"/><input type="text" name="urrange" value="<?php echo $uvalue; ?>" size="6"/><input type="text" name="utype" size="5" value="<?php echo $utype; ?>"/></td></tr> 
<tr height="5px"></tr>

<tr height="5px"></tr>
 


</table>
<?php
}
else if($tname == "BONE MARROW"){


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
 
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>BONE MARROW ASPIRATION REPORT : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Done by </td><td> : <input type="text" name="done"/> </td></tr> 
<tr><td width="30%">Site </td><td> : <input type="text" name="site"/></td></tr> 
<tr><td width="30%">Cellularity </td><td> : <input type="text" name="Cellularity"/> </td></tr> 
<tr><td width="30%">M.E. Ratio </td><td> : <input type="text" name="Ratio"/></td></tr> 
<tr><td width="30%">Erythropoiesis	 </td><td> : <input type="text" name="Erythropoiesis"/> </td></tr> 
<tr><td width="30%">Myelopoiesis </td><td> : <input type="text" name="Myelopoiesis"/></td></tr> 
<tr><td width="30%">Megakaryocytes </td><td> : <input type="text" name="Megakaryocytes"/> </td></tr> 
<tr><td width="30%">Lymphocytes </td><td> : <input type="text" name="Lymphocytes"/></td></tr> 
<tr><td width="30%">Plasma cells </td><td> : <input type="text" name="Plasma"/> </td></tr> 
<tr><td width="30%">Others </td><td> : <input type="text" name="Others"/></td></tr> 
<tr><td width="30%">IMPRESSION   </td><td> : <textarea rows="5" cols="50"></textarea></td></tr> 

<tr height="5px"></tr>

<tr height="5px"></tr>
 


</table>
<?php
}
else if($tname == "Gram Stain"){


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
 
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>MICRO BIOLOGY : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Gram Stain </td><td> : <input type="text" name="gram"/> </td></tr> 
<tr><td width="30%">Method:GRAM STAIN </td></tr>
<tr><td width="30%">Specimen Type </td><td> : <input type="text" name="Specimen"/></td></tr> 


<tr height="5px"></tr>

<tr height="5px"></tr>
 


</table>
<?php
}
else if($tname == "FNAC"){


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
 
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>FINE NEEDLE ASPIRATION FOR CYTOLOGY : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Done by </td><td> : <input type="text" name="done"/> </td></tr> 
<tr><td width="30%">Site </td><td> : <input type="text" name="site"/></td></tr> 
<tr><td width="30%">Microscope    </td><td> : <textarea rows="5" cols="50" name="microscope"></textarea></td></tr> 
<tr><td width="30%">IMPRESSION   </td><td> : <textarea rows="5" cols="50" name="impression"></textarea></td></tr> 

<tr height="5px"></tr>

<tr height="5px"></tr>
 


</table>
<?php
}
else if($tname == "SEROLOGY(ASO RAF CRP)"){
$mbs="select * from crprange where crpid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$crpid=$row['crpid'];

$value=$row['value'];
$type=$row['type'];
       
$mbs="select * from rafnormals where rfid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$rfid=$row['rfid'];
$rfvalue=$row['rfvalue'];
$rftype=$row['rftype'];


$mbs="select * from asonormals where aid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$aid=$row['aid'];
$avalue=$row['avalue'];
$atype=$row['atype'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td style="color:red;" colspan="2"><b><u>SEROLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td><b><u>RESULT </u></td><td><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>C - Reactive Protein (CRP)</td><td> : <input type="text" name="CRPRESULT" size="20" /> </td><td><input type="hidden" name="crpid" value="<?php echo $crpid; ?>" size="5"/><input size="5" type="text" name="res" value="<?php echo $value; ?>"/><input type="text" name="type" value="<?php echo $type; ?>" size="5"/></td></tr> 
<tr height="20"></tr>
<tr><td width="30%">RA FACTOR</td><td> :<input type="text" name="raf" size="20"/></td><td><input type="hidden" type="rfid" name="aid" value="<?php echo $rfid; ?>" size="4"/><input type="text" name="rfvalue" value="<?php echo $rfvalue; ?>" size="10"/><input type="text" name="rftype" value="<?php echo $rftype; ?>" size="4"/></td></tr> 
<tr height="20"></tr>
<tr><td width="30%">ASO TITRE</td><td> : <input type="text" name="asot" size="20"/></td><td><input type="hidden" name="aid" value="<?php echo $aid; ?>" size="4"/><input type="text" name="avalue" value="<?php echo $avalue; ?>" size="10"/><input type="text" name="atype" value="<?php echo $atype; ?>" size="4"/></td></tr> 
</table>

<?php
}
else if($tname == "BIO(CBP ESR)"){

$mbs="select * from cbpnormal where id='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$id=$row['id'];
$hm=htmlspecialchars($row['hm']);
$hf=$row['hf'];
$rbcm=$row['rbcm'];
$rbcf=$row['rbcf'];
$webcount=$row['webcount'];
$plateletcount=$row['plateletcount'];
$na=$row['na'];
$nc=$row['nc'];
$la=$row['la'];
$lc=$row['lc'];
$ma=$row['ma'];
$mc=$row['mc'];
$ea=$row['ea'];
$ec=$row['ec'];
$baa=$row['baa'];
$bac=$row['bac'];
$hnormal=$row['hnormal'];
$rbcnormal=$row['rbcnormal'];
$webcountnormal=$row['webcountnormal'];
$plateletnormal=$row['plateletnormal'];       
?>

<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td style="color:red;"><b><u>COMPLETE BLOOD PICTURE (CBP):</u></b></td></tr>
<tr><td>HAEMOGLOBIN</td><td> : <input type="text" name="HAEMOGLOBIN" size="10"/> %</td><td><input type="hidden" name="cbpid" value="<?php echo $id; ?>"/>Male : <input type="text" name="hm" value="<?php echo mysql_real_escape_string($hm); ?>"/> <input type="text" name="hnormal" size="5" value="<?php echo $hnormal; ?>" /> ,<br/> Female : <input type="text" name="hf" value="<?php echo $hf; ?>"/> <input type="text" name="hnormal" size="5" value="<?php echo $hnormal; ?>" /></td></tr>
<tr><td>RBC</td><td> : <input type="text" name="RBC" size="10"/> Mill/ cumm</td><td>Male :<input type="text" name="rbcm" value="<?php echo $rbcm; ?>"/><input type="text" name="rbcnormal" size="5" value="<?php echo $rbcnormal; ?>" /> ,<br/> Female : <input type="text" name="rbcf" value="<?php echo $rbcf; ?>"/> <input type="text" name="rbcnormal" size="5" value="<?php echo $rbcnormal; ?>" /></td></tr>
<tr><td>WBC Count</td><td> : <input type="text" name="WBC" size="10"/> cells/cumm</td><td><input type="text" name="webcount" value="<?php echo $webcount; ?>"/><input type="text" name="webcountnormal" size="5" value="<?php echo $webcountnormal; ?>" /></td></tr>        
<tr><td>PLATELET COUNT</td><td> : <input type="text" name="PLATELET" size="10"/> lakhs /cumm</td><td><input type="text" name="plateletcount" value="<?php echo $plateletcount; ?>"/><input type="text" name="plateletnormal" size="5" value="<?php echo $plateletnormal; ?>" /></td></tr>        

<tr height="10px"></tr>
<tr><td ><b><u>DIFFERENTIAL LEUCOCYTE COUNT:</u></b></td><td></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <input type="text" name="NEUTROPHILS" size="10"/> %</td><td><input type="text" name="na" value="<?php echo $na; ?>"/>%</td><td><input type="text" name="nc" value="<?php echo $nc; ?>"/>%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <input type="text" name="LYMPHOCYTES" size="10"/> %</td><td><input type="text" name="la" value="<?php echo $la; ?>"/>%</td><td><input type="text" name="lc" value="<?php echo $lc; ?>"/>%</td></tr>
<tr><td>MONOCYTES</td><td> : <input type="text" name="MONOCYTES" size="10"/> %</td><td><input type="text" name="ma" value="<?php echo $ma; ?>"/>%</td><td><input type="text" name="mc" value="<?php echo $mc; ?>"/>%</td></tr>		 		
<tr><td>EOSINOPHILS</td><td> : <input type="text" name="EOSINOPHILS" size="10"/> %</td><td><input type="text" name="ea" value="<?php echo $ea; ?>"/>%</td><td><input type="text" name="ec" value="<?php echo $ec; ?>"/>%</td></tr>	  				
<tr><td>BASOPHILS</td><td> : <input type="text" name="BASOPHILS" size="10"/> %</td><td><input type="text" name="baa" value="<?php echo $baa; ?>"/>%</td><td><input type="text" name="bac" value="<?php echo $bac; ?>"/>%</td></tr>			
<tr height="10px"></tr>
<tr><td><b><u>PERIPHERAL SMEAR EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="RBC1" size="20"/></td><td>&nbsp;</td></tr> 
<tr><td>WBC</td><td> : <input type="text" name="WBC1" size="20"/></td><td>&nbsp;</td></tr> 
<tr><td>Platelets</td><td> : <input type="text" name="Platelets" size="20"/></td><td>&nbsp;</td></tr> 
<?php
  $mbq="select * from esrresult where esrid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$esrid=$row['esrid'];
$esrvalue=$row['esrvalue'];
$esrtype=$row['esrtype'];
?>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Erythrocyte Sedimentation Rate (ESR)</td><td> : <input type="text" name="esrresult"/> mm/1st Hr</td><td><input type="hidden" name="esrid" value="<?php echo $esrid; ?>"/><input type="text" name="esrvalue" value="<?php echo $esrvalue; ?>"/><input type="text" name="esrtype" value="<?php echo $esrtype; ?>"/></td></tr> 

</table>

<?php
}

else if($tname == "BIO(Urea Creatinine)"){

$mbq="select * from bunormals where buid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$buid=$row['buid'];
$buvalue=$row['buvalue'];
$butype=$row['butype'];
          
?>

<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Blood Urea</td><td> : <input type="text" name="burea"/> mg/dl</td><td><input type="hidden" name="buid" value="<?php echo $buid; ?>"/><input type="text" name="buvalue" value="<?php echo $buvalue; ?>"/><input type="text" name="butype" value="<?php echo $butype; ?>"/></td></tr> 
<?php
 
     $mbq="select * from creatinormals where cid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$cid=$row['cid'];
$cvalue=$row['cvalue'];
$ctype=$row['ctype'];
    
?>
<tr><td width="30%">Serum Creatinine</td><td> : <input type="text" name="creati"/> mg/dl</td><td><input type="hidden" name="cid" value="<?php echo $cid; ?>"/><input type="text" name="cvalue" value="<?php echo $cvalue; ?>"/><input type="text" name="ctype" value="<?php echo $ctype; ?>"/></td></tr> 

</table>

<?php
}

}}?>
<?php
echo "@" . $r;
?>