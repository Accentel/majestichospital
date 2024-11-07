<?php
include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);



if(isset($_POST['submit'])){

$bno =$_POST['bno'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname = $_POST['pname'];
$age =$_POST['age'];
$gender = $_POST['gender'];
$dname = $_POST['dname'];
$cnt = count($_POST['tname']);
for($i=0;$i<$cnt;$i++){
	$tname = $_POST['tname'][$i];
	if($tname == "COMPLETE BLOOD  PICTURE (CBP)"){
		$HAEMOGLOBIN = $_REQUEST['HAEMOGLOBIN'];
		$RBC = $_REQUEST['RBC'];
		$WBC = $_REQUEST['WBC'];
		$PLATELET = $_REQUEST['PLATELET'];
		$NEUTROPHILS = $_REQUEST['NEUTROPHILS'];
		$LYMPHOCYTES = $_REQUEST['LYMPHOCYTES'];
		$MONOCYTES = $_REQUEST['MONOCYTES'];
		$EOSINOPHILS = $_REQUEST['EOSINOPHILS'];
		$BASOPHILS = $_REQUEST['BASOPHILS'];
		$RBC1 = $_REQUEST['RBC1'];
		$WBC1 = $_REQUEST['WBC1'];
		$Platelets = $_REQUEST['Platelets'];
		$PACKEDCELL= $_REQUEST['PACKEDCELL'];
		$mcv= $_REQUEST['mcv'];
		$mch= $_REQUEST['mch'];
		$mchc= $_REQUEST['mchc'];
		$periperl= $_REQUEST['periperl'];
		
		
		
		$sql3 = mysql_query("select count(*) from cbp where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into cbp(bill_no, HAEMOGLOBIN, RBC, WBC_Count, PLATELET_COUNT, NEUTROPHILS,LYMPHOCYTES,MONOCYTES,EOSINOPHILS,BASOPHILS,RBC1,WBC1,Platelets,PACKEDCELL,mcv,mch,mchc,periperl) values('$bno','$HAEMOGLOBIN','$RBC','$WBC','$PLATELET','$NEUTROPHILS','$LYMPHOCYTES','$MONOCYTES','$EOSINOPHILS','$BASOPHILS','$RBC1','$WBC1','$Platelets','$PACKEDCELL','$mcv','$mch','$mchc','$periperl')");
		}else{
			$sql2 = mysql_query("update cbp set PACKEDCELL='$PACKEDCELL',mcv='$mcv',mch='$mch',mchc='$mchc',periperl='$periperl', HAEMOGLOBIN='$HAEMOGLOBIN', RBC='$RBC', WBC_Count='$WBC', PLATELET_COUNT='$PLATELET', NEUTROPHILS='$NEUTROPHILS',LYMPHOCYTES='$LYMPHOCYTES',MONOCYTES='$MONOCYTES',EOSINOPHILS='$EOSINOPHILS',BASOPHILS='$BASOPHILS',RBC1='$RBC1',WBC1='$WBC1',Platelets='$Platelets' where bill_no = '$bno'");
		}
		}
	}
	if($tname == "C - Reactive Protein (CRP)"){
		$CRPRESULT = $_REQUEST['CRPRESULT'];
		
		$sql3 = mysql_query("select count(*) from crp where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into crp(bill_no, crp_result) values('$bno','$CRPRESULT')");
		}else{
			$sql2 = mysql_query("update crp set crp_result='$CRPRESULT' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "SERUM AMYLASE"){
		$SAMYLASE = $_REQUEST['SAMYLASE'];
		
		$sql3 = mysql_query("select count(*) from amylase where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into amylase(bill_no, amylase_result) values('$bno','$SAMYLASE')");
		}else{
			$sql2 = mysql_query("update amylase set amylase_result='$SAMYLASE' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Absolute Eosinophil Count (AEC)"){
		$aecresult = $_REQUEST['aecresult'];
		
		$sql3 = mysql_query("select count(*) from aec where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into aec(bill_no, aec_result) values('$bno','$aecresult')");
		}else{
			$sql2 = mysql_query("update aec set aec_result='$aecresult' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "MANTOUX TEST"){
		$MANTOUXGIVENON = date('Y-m-d',strtotime($_REQUEST['MANTOUXGIVENON']));
		$MANTOUXREPORTNON = date('Y-m-d',strtotime($_REQUEST['MANTOUXREPORTNON']));
		$MANTOUXRESULT = mysql_real_escape_string($_REQUEST['MANTOUXRESULT']);
		
		
		//$sql2 = mysql_query("insert into mantoux(bill_no, given_on, report_on, result) values('$bno','$MANTOUXGIVENON','$MANTOUXREPORTNON','$MANTOUXRESULT')");

		
		$sql3 = mysql_query("select count(*) from mantoux where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into mantoux(bill_no, given_on, report_on, result) values('$bno','$MANTOUXGIVENON','$MANTOUXREPORTNON','$MANTOUXRESULT')");
		}else{
			$sql2 = mysql_query("update mantoux set given_on='$MANTOUXGIVENON',report_on='$MANTOUXREPORTNON',result='$MANTOUXRESULT' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Serum Creatinine"){
		$creati = mysql_real_escape_string($_REQUEST['creati']);
		
		$sql3 = mysql_query("select count(*) from creati where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into creati(bill_no, serum_result) values('$bno','$creati')");
		}else{
			$sql2 = mysql_query("update creati set serum_result='$creati' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "SERUM TRYGLYCERIDES"){
		$strig = mysql_real_escape_string($_REQUEST['strig']);
		
		$sql3 = mysql_query("select count(*) from strig where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into strig(bill_no, strig) values('$bno','$strig')");
		}else{
			$sql2 = mysql_query("update strig set strig='$strig' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Smear for Malarial Parasite"){
		
		$SMPRESULT = mysql_real_escape_string($_REQUEST['SMPRESULT']);
		
		$sql3 = mysql_query("select count(*) from smp where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into smp(bill_no, smp_result) values('$bno','$SMPRESULT')");
		}else{
			$sql2 = mysql_query("update smp set smp_result='$SMPRESULT' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Serum Uric Acid"){
		$suaresult = mysql_real_escape_string($_REQUEST['sua_result']);
		
		$sql3 = mysql_query("select count(*) from sua where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into sua(bill_no, sua_result) values('$bno','$suaresult')");
		}else{
			$sql2 = mysql_query("update sua set sua_result='$suaresult' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "SERUM CALCIUM"){
		$calres = mysql_real_escape_string($_REQUEST['cal_result']);
		
		$sql3 = mysql_query("select count(*) from calcium where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into calcium(bill_no, cal_result) values('$bno','$calres')");
		}else{
			$sql2 = mysql_query("update calcium set cal_result='$calres' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "Serum Electrolytes"){
		$sodium = mysql_real_escape_string($_REQUEST['sodium']);
		$potash = mysql_real_escape_string($_REQUEST['potash']);
		$chloride = mysql_real_escape_string($_REQUEST['chloride']);
		
		
		$sql3 = mysql_query("select count(*) from ele where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into ele(bill_no, sodium,potash,chloride) values('$bno','$sodium','$potash','$chloride')");
		}else{
			$sql2 = mysql_query("update ele set sodium='$sodium',potash='$potash',chloride='$chloride' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "Random Blood Sugar (RBS)"){
		$rbs = mysql_real_escape_string($_REQUEST['rbs']);
		$rus = mysql_real_escape_string($_REQUEST['rus']);
		
		$sql3 = mysql_query("select count(*) from rbs where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into rbs(bill_no, rbs_result,rus) values('$bno','$rbs','$rus')");
		}else{
			$sql2 = mysql_query("update rbs set rbs_result='$rbs',rus='$rus' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Activated Partial Thromboplastin Time (APTT)"){
		$aptttest = mysql_real_escape_string($_REQUEST['aptttest']);
		$apttcontrol = mysql_real_escape_string($_REQUEST['apttcontrol']);
		
		
		$sql3 = mysql_query("select count(*) from aptt where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into aptt(bill_no, aptt_time,aptt_control) values('$bno','$aptttest','$apttcontrol')");
		}else{
			$sql2 = mysql_query("update aptt set aptt_time='$aptttest',aptt_control='$apttcontrol'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "LIVER FUNCTION TEST"){
		$LFTTBILIRUBIN = $_REQUEST['LFTTBILIRUBIN'];
		$LFTDBILIRUBIN = $_REQUEST['LFTDBILIRUBIN'];
		$LFTIBILIRUBIN = $_REQUEST['LFTIBILIRUBIN'];
		$LFTSGOT = $_REQUEST['LFTSGOT'];
		$LFTSGPT = $_REQUEST['LFTSGPT'];
		$LFTSAPHOSPHATE = $_REQUEST['LFTSAPHOSPHATE'];
		$LFTTPROTIENS = $_REQUEST['LFTTPROTIENS'];
		$LFTSALBUMIN = $_REQUEST['LFTSALBUMIN'];
		$LFTSGLOBULIN = $_REQUEST['LFTSGLOBULIN'];
		$LFTAGRATIO = $_REQUEST['LFTAGRATIO'];
		
		$sql3 = mysql_query("select count(*) from lft where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into lft(bill_no, TOTAL_BILIRUBIN,DIRECT_BILIRUBIN,INDIRECT_BILIRUBIN,SGOT,SGPT,S_ALKALINE_PHOSPHATE,TOTAL_PROTIENS,SERUM_ALBUMIN,SERUM_GLOBULIN,AG_Ratio) values('$bno','$LFTTBILIRUBIN','$LFTDBILIRUBIN','$LFTIBILIRUBIN','$LFTSGOT','$LFTSGPT','$LFTSAPHOSPHATE','$LFTTPROTIENS','$LFTSALBUMIN','$LFTSGLOBULIN','$LFTAGRATIO')");
		}else{
			$sql2 = mysql_query("update lft set TOTAL_BILIRUBIN='$LFTTBILIRUBIN',DIRECT_BILIRUBIN='$LFTDBILIRUBIN',INDIRECT_BILIRUBIN='$LFTIBILIRUBIN',SGOT='$LFTSGOT',SGPT='$LFTSGPT',S_ALKALINE_PHOSPHATE='$LFTSAPHOSPHATE',TOTAL_PROTIENS='$LFTTPROTIENS',SERUM_ALBUMIN='$LFTSALBUMIN',SERUM_GLOBULIN='$LFTSGLOBULIN',AG_Ratio='$LFTAGRATIO'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "COMPLETE URINE EXAMINATION(CUE)"){
		$CUECOLOUR = $_REQUEST['CUECOLOUR'];
		$CUEAPPEARANCE = $_REQUEST['CUEAPPEARANCE'];
		$CUEREACTION = $_REQUEST['CUEREACTION'];
		$CUESPECIFICGRAVITY = $_REQUEST['CUESPECIFICGRAVITY'];
		$CUESUGAR = $_REQUEST['CUESUGAR'];
		$CUEALBUMIN = $_REQUEST['CUEALBUMIN'];
		$CUEBILESALTS = $_REQUEST['CUEBILESALTS'];
		$CUEBILEPIGMENTS = $_REQUEST['CUEBILEPIGMENTS'];
		$CUEUROBILINOGEN = $_REQUEST['CUEUROBILINOGEN'];
		$CUEKETONES = $_REQUEST['CUEKETONES'];
		$CUERBC = $_REQUEST['CUERBC'];
		$CUEPUSCELLS = $_REQUEST['CUEPUSCELLS'];
		$CUEEPITHELIAL = $_REQUEST['CUEEPITHELIAL'];
		$CUECASTS = $_REQUEST['CUECASTS'];
		$CUECRYSTALS = $_REQUEST['CUECRYSTALS'];
		$CUEOTHERS = $_REQUEST['CUEOTHERS'];
		
		$sql3 = mysql_query("select count(*) from cue where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into cue(bill_no, COLOUR, APPEARANCE, REACTION, SPECIFIC_GRAVITY, SUGAR,ALBUMIN,BILE_SALTS,BILE_PIGMENTS,UROBILINOGEN,KETONES,RBC,PUSCELLS,EPITHELIAL_CELL,CASTS,CRYSTALS,OTHERS) values('$bno','$CUECOLOUR','$CUEAPPEARANCE','$CUEREACTION','$CUESPECIFICGRAVITY','$CUESUGAR','$CUEALBUMIN','$CUEBILESALTS','$CUEBILEPIGMENTS','$CUEUROBILINOGEN','$CUEKETONES','$CUERBC','$CUEPUSCELLS','$CUEEPITHELIAL','$CUECASTS','$CUECRYSTALS','$CUEOTHERS')");
		}else{
			$sql2 = mysql_query("update cue set COLOUR='$CUECOLOUR', APPEARANCE='$CUEAPPEARANCE', REACTION='$CUEREACTION', SPECIFIC_GRAVITY='$CUESPECIFICGRAVITY', SUGAR='$CUESUGAR',ALBUMIN='$CUEALBUMIN',BILE_SALTS='$CUEBILESALTS',BILE_PIGMENTS='$CUEBILEPIGMENTS',UROBILINOGEN='$CUEUROBILINOGEN',KETONES='$CUEKETONES',RBC='$CUERBC',PUSCELLS='$CUEPUSCELLS',EPITHELIAL_CELL='$CUEEPITHELIAL',CASTS='$CUECASTS',CRYSTALS='$CUECRYSTALS',OTHERS='$CUEOTHERS' where bill_no = '$bno'");
		}
		}
	}
	
	
	
	if ($tname == "Parasite F and V") {
		$RMTRESULT = mysqli_real_escape_string($link, $_REQUEST['RMTRESULT']);
		$RMTRESULT1 = mysqli_real_escape_string($link, $_REQUEST['RMTRESULT1']);
	
		$sql3 = mysqli_query($link, "SELECT COUNT(*) FROM rmt WHERE bill_no='$bno'");
		if ($sql3) {
			$row3 = mysqli_fetch_array($sql3);
			$nrows = $row3[0];
			if ($nrows <= 0) {
				$sql2 = mysqli_query($link, "INSERT INTO rmt (bill_no, rmt_result, rmt_result1) VALUES ('$bno', '$RMTRESULT', '$RMTRESULT1')");
			} else {
				$sql2 = mysqli_query($link, "UPDATE rmt SET rmt_result='$RMTRESULT', rmt_result1='$RMTRESULT1' WHERE bill_no = '$bno'");
			}
		}
	}
	
	
	
	if($tname == "RETI COUNT"){
		$Reticulocyte = mysql_real_escape_string($_REQUEST['Reticulocyte']);
		$rtid = mysql_real_escape_string($_REQUEST['rtid']);
		    $note= mysql_real_escape_string($_REQUEST['note']);
		mysql_query("update retinormals set note='$note' where rtid='$rtid'");
		
		$sql3 = mysql_query("select count(*) from reticount where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into reticount(bill_no, rtvalue) values('$bno','$Reticulocyte')");
		}else{
			$sql2 = mysql_query("update reticount set rtvalue='$Reticulocyte'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "PLBS"){
		$plbss = mysql_real_escape_string($_REQUEST['plbss']);
		$pluss = mysql_real_escape_string($_REQUEST['pluss']);
		
		
		$sql3 = mysql_query("select count(*) from plbs where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into plbs(bill_no, plbss,pluss) values('$bno','$plbss','$pluss')");
		}else{
			$sql2 = mysql_query("update plbs set plbss='$plbss',pluss='$plbss'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "FBS"){
		$fbss = mysql_real_escape_string($_REQUEST['fbss']);
		$fuss = mysql_real_escape_string($_REQUEST['fuss']);
		
		$sql3 = mysql_query("select count(*) from fbs where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into fbs(bill_no, fbss,fuss) values('$bno','$fbss','$fuss')");
		}else{
			$sql2 = mysql_query("update fbs set fbss='$fbss',fuss='$fuss'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Peripheral Smear"){
		$psrbc = mysql_real_escape_string($_REQUEST['psrbc']);
		$pswbc = mysql_real_escape_string($_REQUEST['pswbc']);
		$psplatelets = mysql_real_escape_string($_REQUEST['psplatelets']);
		
		$sql3 = mysql_query("select count(*) from peri where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into peri(bill_no, psrbc,pswbc,psplatelets) values('$bno','$psrbc','$pswbc','$psplatelets')");
		}else{
			$sql2 = mysql_query("update peri set psrbc='$psrbc',pswbc='$pswbc',psplatelets='$psplatelets'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "WBC Count"){
		$wbccount = mysql_real_escape_string($_REQUEST['wbccount']);
		
		
		$sql3 = mysql_query("select count(*) from wbccount where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into wbccount(bill_no, wbccount) values('$bno','$wbccount')");
		}else{
			$sql2 = mysql_query("update wbccount set wbccount='$wbccount'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Smear for Microfilaria"){
		$smicro = mysql_real_escape_string($_REQUEST['smicro']);
		
		$sql3 = mysql_query("select count(*) from smicro where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into smicro(bill_no, smicro) values('$bno','$smicro')");
		}else{
			$sql2 = mysql_query("update smicro set smicro='$smicro'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "SERUM POTASSIUM"){
		$spotash = mysql_real_escape_string($_REQUEST['spotash']);
		
		$sql3 = mysql_query("select count(*) from spotash where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into spotash(bill_no, spotash) values('$bno','$spotash')");
		}else{
			$sql2 = mysql_query("update spotash set spotash='$spotash'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "TOTAL PROTIENS"){
		$tprt = mysql_real_escape_string($_REQUEST['TPROTIENS']);
		
		$sql3 = mysql_query("select count(*) from tprt where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into tprt(bill_no, tprt) values('$bno','$tprt')");
		}else{
			$sql2 = mysql_query("update tprt set tprt='$tprt' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "ALKALINE PHOSPHATE"){
		$aphos = mysql_real_escape_string($_REQUEST['APHOSPHATE']);
		
		
		$sql3 = mysql_query("select count(*) from aphos where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into aphos(bill_no, aphos) values('$bno','$aphos')");
		}else{
			$sql2 = mysql_query("update aphos set aphos='$aphos'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "SERUM CHOLESTEROL"){
		$schole = mysql_real_escape_string($_REQUEST['schole']);
		
		
		$sql3 = mysql_query("select count(*) from schole where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =  mysql_query("insert into schole(bill_no, schole) values('$bno','$schole')");
		}else{
			$sql2 = mysql_query("update schole set schole='$schole'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "PLATELET COUNT"){
		$pcount = mysql_real_escape_string($_REQUEST['pcount']);
		
		
		$sql3 = mysql_query("select count(*) from pcount where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =  mysql_query("insert into pcount(bill_no, pcount) values('$bno','$pcount')");
		}else{
			$sql2 = mysql_query("update pcount set pcount='$pcount'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "SPUTUM FOR AFB"){
		$safb = mysql_real_escape_string($_REQUEST['safb']);
		
		
		$sql3 = mysql_query("select count(*) from safb where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into safb(bill_no, safb) values('$bno','$safb')");
		}else{
			$sql2 = mysql_query("update safb set safb='$safb'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "LIPID PROFILE"){
		$sch = mysql_real_escape_string($_REQUEST['sch']);
		$hch = mysql_real_escape_string($_REQUEST['hch']);
		$lch = mysql_real_escape_string($_REQUEST['lch']);
		$vch = mysql_real_escape_string($_REQUEST['vch']);
		$stri = mysql_real_escape_string($_REQUEST['stri']);
		$tch = mysql_real_escape_string($_REQUEST['tch']);
		
		
		$sql3 = mysql_query("select count(*) from lprofile where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into lprofile(bill_no, sch,hch,lch,vch,stri,tch) values('$bno','$sch','$hch','$lch','$vch','$stri','$tch')");
		}else{
			$sql2 = mysql_query("update lprofile set sch='$sch',hch='$hch',lch='$lch',vch='$vch',stri='$stri',tch='$tch'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "VDRL"){
		$vdrl = mysql_real_escape_string($_REQUEST['vdrl']);
		
		
		$sql3 = mysql_query("select count(*) from vdrl where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into vdrl(bill_no, vdrl) values('$bno','$vdrl')");
		}else{
			$sql2 = mysql_query("update vdrl set vdrl='$vdrl'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "HCV"){
		$hcv = mysql_real_escape_string($_REQUEST['hcv']);
		
		
		$sql3 = mysql_query("select count(*) from hcv where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into hcv(bill_no, hcv) values('$bno','$hcv')");
		}else{
			$sql2 = mysql_query("update hcv set hcv='$hcv'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "HIV 1 AND 2"){
		$hiv = mysql_real_escape_string($_REQUEST['hiv']);
		
		
		$sql3 = mysql_query("select count(*) from hiv where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into hiv(bill_no, hiv) values('$bno','$hiv')");
		}else{
			$sql2 = mysql_query("update hiv set hiv='$hiv'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "BLOOD SUGAR(FBS,PLBS)"){
		$fbs = mysql_real_escape_string($_REQUEST['fbs']);
		$fus = mysql_real_escape_string($_REQUEST['fus']);
		$plbs = mysql_real_escape_string($_REQUEST['plbs']);
		$plus = mysql_real_escape_string($_REQUEST['plus']);
		
		$sql3 = mysql_query("select count(*) from bsugar where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into bsugar(bill_no, fbs,fus,plbs,plus) values('$bno','$fbs','$fus','$plbs','$plus')");
		}else{
			$sql2 = mysql_query("update bsugar set fbs='$fbs',fus='$fus',plbs='$plbs',plus='$plus'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "BLOOD GROUP"){
		$bgroup = mysql_real_escape_string($_REQUEST['bgroup']);
		$rht = mysql_real_escape_string($_REQUEST['rht']);
		
		
		$sql3 = mysql_query("select count(*) from bgroup where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into bgroup(bill_no, bgrp,rhtype) values('$bno','$bgroup','$rht')");
		}else{
			$sql2 = mysql_query("update bgroup set bgrp='$bgroup',rhtype='$rht'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "BLEEDING TIME AND CLOTTING TIME"){
		$bt = mysql_real_escape_string($_REQUEST['bt']);
		$ct = mysql_real_escape_string($_REQUEST['ct']);
		
		$sql3 = mysql_query("select count(*) from btct where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into btct(bill_no, btime, ctime) values('$bno','$bt','$ct')");
		}else{
			$sql2 = mysql_query("update btct set btime='$bt',ctime='$ct'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "SERUM BILIRUBIN"){
		$tbil = mysql_real_escape_string($_REQUEST['tbil']);
		$dbil = mysql_real_escape_string($_REQUEST['dbil']);
		$ibil = mysql_real_escape_string($_REQUEST['ibil']);
		
		
		$sql3 = mysql_query("select count(*) from sbil where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into sbil(bill_no, tbil,dbil,ibil) values('$bno','$tbil','$dbil','$ibil')");
		}else{
			$sql2 = mysql_query("update sbil set tbil='$tbil',dbil='$dbil',ibil='$ibil'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Reducing Substance"){
		$rsub = mysql_real_escape_string($_REQUEST['rsub']);
		
		
		$sql3 = mysql_query("select count(*) from rsub where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into rsub(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysql_query("update rsub set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "RFT"){
		$rftrbs = mysql_real_escape_string($_REQUEST['rftrbs']);
		$rftbu = mysql_real_escape_string($_REQUEST['rftbu']);
		$rftscr = mysql_real_escape_string($_REQUEST['rftscr']);
		$rftsua = mysql_real_escape_string($_REQUEST['rftsua']);
		$rftsc = mysql_real_escape_string($_REQUEST['rftsc']);
		$rftsodium = mysql_real_escape_string($_REQUEST['rftsodium']);
		$rftpotash = mysql_real_escape_string($_REQUEST['rftpotash']);
		$rftchloride = mysql_real_escape_string($_REQUEST['rftchloride']);
		
		
		
		$sql3 = mysql_query("select count(*) from rft where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into rft(bill_no, rft_rbs,rft_bu,rft_scr,rft_sua,rft_sc,rft_sodium,rft_potash,rft_chloride) values('$bno','$rftrbs','$rftbu','$rftscr','$rftsua','$rftsc','$rftsodium','$rftpotash','$rftchloride')");

		}else{
		//echo "hi";
			$sql2 = mysql_query("update rft set rft_rbs='$rftrbs',rft_bu='$rftbu',rft_scr='$rftsc',rft_sua='$rftsua',rft_sc='$rftsc',rft_sodium='$rftsodium',rft_potash='$rftpotash',rft_chloride='$rftchloride'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "HAEMOGLOBIN"){
		$haresult = mysql_real_escape_string($_REQUEST['haresult']);
		
		
		$sql3 = mysql_query("select count(*) from haemo where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into haemo(bill_no, haresult) values('$bno','$haresult')");
		}else{
			$sql2 = mysql_query("update haemo set haresult='$haresult'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "WIDAL"){
		$sto = mysql_real_escape_string($_REQUEST['sto']);
		$sth = mysql_real_escape_string($_REQUEST['sth']);
		$spah = mysql_real_escape_string($_REQUEST['spah']);
		$spbh = mysql_real_escape_string($_REQUEST['spbh']);
		
		$sql3 = mysql_query("select count(*) from widal where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into widal(bill_no, sto,sth,spah,spbh) values('$bno','$sto','$sth','$spah','$spbh')");
		}else{
			$sql2 = mysql_query("update widal set sto='$sto',sth='$sth',spah='$spah',spbh='$spbh'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "HBsAg"){
		$hresult = mysql_real_escape_string($_REQUEST['hresult']);
		
		
		$sql3 = mysql_query("select count(*) from hbsag where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into hbsag(bill_no, hresult) values('$bno','$hresult')");
		}else{
			$sql2 = mysql_query("update hbsag set hresult='$hresult'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "COMPLETE STOOL EXAMINATION"){
		$CSECOLOUR = $_REQUEST['CSECOLOUR'];
		$CSECONSISTENCY = $_REQUEST['CSECONSISTENCY'];
		$CSEREACTION = $_REQUEST['CSEREACTION'];
		$CSEMUCUS = $_REQUEST['CSEMUCUS'];
		$CSEOCCULT = $_REQUEST['CSEOCCULT'];
		$CSESUBSTANCE = $_REQUEST['CSESUBSTANCE'];
		$CSERBC = $_REQUEST['CSERBC'];
		$CSEPUSCELLS = $_REQUEST['CSEPUSCELLS'];
		$CSEEPITHELIAL = $_REQUEST['CSEEPITHELIAL'];
		$CSEOVAS = $_REQUEST['CSEOVAS'];
		$CSECYSTS = $_REQUEST['CSECYSTS'];
		$CSEOTHERS = $_REQUEST['CSEOTHERS'];
		$BLOOD = $_REQUEST['BLOOD'];
		$STARCH = $_REQUEST['STARCH'];
		
		$sql3 = mysql_query("select count(*) from cse where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into cse(bill_no, COLOUR, CONSIST, REACTION, MUCUS, OCCULT_BLOOD,REDUCING_SUBSTANCE,RBC,PUSCELLS,EPITHELIAL,OVAS,CYSTS,OTHERS,BLOOD,STARCH) values('$bno','$CSECOLOUR','$CSECONSISTENCY','$CSEREACTION','$CSEMUCUS','$CSEOCCULT','$CSESUBSTANCE','$CSERBC','$CSEPUSCELLS','$CSEEPITHELIAL','$CSEOVAS','$CSECYSTS','$CSEOTHERS','$BLOOD','$STARCH')");
		}else{
			$sql2 = mysql_query("update cse set  COLOUR='$CSECOLOUR', CONSIST='$CSECONSISTENCY', REACTION='$CSEREACTION', MUCUS='$CSEMUCUS', OCCULT_BLOOD='$CSEOCCULT',REDUCING_SUBSTANCE='$CSESUBSTANCE',RBC='$CSERBC',PUSCELLS='$CSEPUSCELLS',EPITHELIAL='$CSEEPITHELIAL',OVAS='$CSEOVAS',CYSTS='$CSECYSTS',OTHERS='$CSEOTHERS',BLOOD='$BLOOD',STARCH='$STARCH'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Prothrombin Time (PT)"){
		$pttest = mysql_real_escape_string($_REQUEST['pttest']);
		$ptcontrol = mysql_real_escape_string($_REQUEST['ptcontrol']);
		$ptinr = mysql_real_escape_string($_REQUEST['ptinr']);
		
		
		$sql3 = mysql_query("select count(*) from pt where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into pt(bill_no, pt_time,pt_control,pt_inr) values('$bno','$pttest','$ptcontrol','$ptinr')");
		}else{
			$sql2 = mysql_query("update pt set pt_time='$pttest',pt_control='$ptcontrol',pt_inr='$ptinr'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Blood Urea"){
		$burea = mysql_real_escape_string($_REQUEST['burea']);
		
		
		$sql3 = mysql_query("select count(*) from burea where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into burea(bill_no, burea_result) values('$bno','$burea')");
		}else{
			$sql2 = mysql_query("update burea set burea_result='$burea'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Erythrocyte Sedimentation Rate (ESR)"){
		$esrresult = mysql_real_escape_string($_REQUEST['esrresult']);
		
		$sql3 = mysql_query("select count(*) from esr where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into esr(bill_no, esr_result) values('$bno','$esrresult')");
		}else{
			$sql2 = mysql_query("update esr set esr_result='$esrresult'  where bill_no = '$bno'");
		}
		}
	}
	
	//
	
	if($tname == "SGOT"){
		$sgot = mysql_real_escape_string($_REQUEST['sgot']);
		$lfid = mysql_real_escape_string($_REQUEST['lfid']);
		
		$sgotv= mysql_real_escape_string($_REQUEST['sgotv']);
                $sgtt= mysql_real_escape_string($_REQUEST['sgtt']);
                
                
				mysql_query("update livernormal set sgotv='$sgotv',sgtt='$sgtt' where lfid='$rtid'");
		$sql3 = mysql_query("select count(*) from sgot where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into sgot(bill_no, sgotva) values('$bno','$sgot')");
		}else{
			$sql2 = mysql_query("update sgot set sgotva='$sgot'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "SGPT"){
		$sgpt = mysql_real_escape_string($_REQUEST['sgpt']);
		$lfid = mysql_real_escape_string($_REQUEST['lfid']);
		
		$sgptv= mysql_real_escape_string($_REQUEST['sgptv']);
                $sgtt= mysql_real_escape_string($_REQUEST['sgtt']);
                
                
				mysql_query("update livernormal set sgptv='$sgptv',sgtt='$sgtt' where lfid='$rtid'");
		
		$sql3 = mysql_query("select count(*) from sgpt where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into sgpt(bill_no, sgptva) values('$bno','$sgpt')");
		}else{
			$sql2 = mysql_query("update sgpt set sgptva='$sgpt'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "LFT(SGOT SGPT)"){
		$sgpt = mysql_real_escape_string($_REQUEST['sgpt']);
		$sgot = mysql_real_escape_string($_REQUEST['sgot']);
		$lfid = mysql_real_escape_string($_REQUEST['lfid']);
		
		$sgptv= mysql_real_escape_string($_REQUEST['sgptv']);
		$sgotv= mysql_real_escape_string($_REQUEST['sgotv']);
                $sgtt= mysql_real_escape_string($_REQUEST['sgtt']);
                
                
				mysql_query("update livernormal set sgotv='$sgotv', sgptv='$sgptv',sgtt='$sgtt' where lfid='$rtid'");
		
		$sql3 = mysql_query("select count(*) from sgopt where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into sgopt(bill_no,sgotva,sgptva) values('$bno','$sgot','$sgpt')");
		}else{
			$sql2 = mysql_query("update sgopt set sgotva='$sgot',sgptva='$sgpt'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "COAGGULATION(PT APTT)"){
		$pttest = mysql_real_escape_string($_REQUEST['pttest']);
		$ptcontrol = mysql_real_escape_string($_REQUEST['ptcontrol']);
		$ptinr = mysql_real_escape_string($_REQUEST['ptinr']);
		
		
		$aptttest = mysql_real_escape_string($_REQUEST['aptttest']);
		$apttcontrol = mysql_real_escape_string($_REQUEST['apttcontrol']);
		
		$sql3 = mysql_query("select count(*) from cptaptt where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into cptaptt(bill_no, ptt,ptc,pti,apt,aptc) values('$bno','$pttest','$ptcontrol','$ptinr','$aptttest','$apttcontrol')");
		}else{
			$sql2 = mysql_query("update cptaptt set ptt='$pttest',ptc='$ptcontrol',pti='$ptinr',apt='$aptttest',aptc='$apttcontrol'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "24 Hrs URINE PROTIEN"){
		$tvolume = mysql_real_escape_string($_REQUEST['tvolume']);
		$tprotine = mysql_real_escape_string($_REQUEST['tprotine']);
		$uid = mysql_real_escape_string($_REQUEST['uid']);
		
		
		$urrange = mysql_real_escape_string($_REQUEST['urrange']);
		$utype = mysql_real_escape_string($_REQUEST['utype']);
		mysql_query("update set urinenormal uid='$uid',uvalue='$urrange',utype='$utype' where uid='1'");
		
		
		
		$sql3 = mysql_query("select count(*) from urineprotinue where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into urineprotinue(bill_no, tv,tp) values('$bno','$tvolume','$tprotine')");
		}else{
			$sql2 = mysql_query("update urineprotinue set tv='$tvolume',tp='$tprotine'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "BONE MARROW"){
		$done = mysql_real_escape_string($_REQUEST['done']);
		$site = mysql_real_escape_string($_REQUEST['site']);
		$Cellularity = mysql_real_escape_string($_REQUEST['Cellularity']);
		
		
		$Ratio = mysql_real_escape_string($_REQUEST['Ratio']);
		$Erythropoiesis = mysql_real_escape_string($_REQUEST['Erythropoiesis']);
		
		$Myelopoiesis = mysql_real_escape_string($_REQUEST['Myelopoiesis']);
		$Megakaryocytes = mysql_real_escape_string($_REQUEST['Megakaryocytes']);
		$Lymphocytes = mysql_real_escape_string($_REQUEST['Lymphocytes']);
		$Plasma = mysql_real_escape_string($_REQUEST['Plasma']);
		$Others = mysql_real_escape_string($_REQUEST['Others']);
		$impression = mysql_real_escape_string($_REQUEST['impression']);
		
		$sql3 = mysql_query("select count(*) from bone where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into bone(done,site,Cellularity,Ratio,Erythropoiesis,Myelopoiesis,Megakaryocytes,Lymphocytes,Plasma,Others,impression,bill_no) values('$done','$site','$Cellularity','$Ratio','$Erythropoiesis','$Myelopoiesis','$Megakaryocytes','$Lymphocytes','$Plasma','$Others','$impression','$bno')");
		}else{
			$sql2 = mysql_query("update bone set done='$done',site='$site',Cellularity='$Cellularity',Ratio='$Ratio',Erythropoiesis='$Erythropoiesis',Myelopoiesis='$Myelopoiesis',Megakaryocytes='$Megakaryocytes',Lymphocytes='$Lymphocytes',Plasma='$Plasma',Others='$Others',impression='$impression'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "Gram Stain"){
		$gram = mysql_real_escape_string($_REQUEST['gram']);
		$Specimen = mysql_real_escape_string($_REQUEST['Specimen']);
		
		$sql3 = mysql_query("select count(*) from gramstain where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into gramstain(bill_no,gs,stime) values('$bno','$gram','$Specimen')");

		}else{
			$sql2 = mysql_query("update gramstain set gs='$gram',stime='$Specimen'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "FNAC"){
		$done = mysql_real_escape_string($_REQUEST['done']);
		$site = mysql_real_escape_string($_REQUEST['site']); 
		$microscope = mysql_real_escape_string($_REQUEST['microscope']);
		$impression = mysql_real_escape_string($_REQUEST['impression']);
		
		$sql3 = mysql_query("select count(*) from fnac where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into fnac(bill_no,test,site,microscope,impress) values('$bno','$done','$site','$microscope','$impression')");
		}else{
			$sql2 = mysql_query("update fnac set test='$done',site='$site',microscope='$microscope',impress='$impression'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "FLUID EXAMINATION-ROUTINE(PLEURAL FLUID)"){
		$COLOUR = mysql_real_escape_string($_REQUEST['COLOUR']);
		$Volume = mysql_real_escape_string($_REQUEST['Volume']);
		$APPEARANCE = mysql_real_escape_string($_REQUEST['APPEARANCE']);
		
		$glucose= mysql_real_escape_string($_REQUEST['glucose']);
		$protein= mysql_real_escape_string($_REQUEST['protein']);
                $totalcount= mysql_real_escape_string($_REQUEST['totalcount']);
                
                $Polymorphs= mysql_real_escape_string($_REQUEST['Polymorphs']);
		$Lymphocytes= mysql_real_escape_string($_REQUEST['Lymphocytes']);
                $Mesothelial= mysql_real_escape_string($_REQUEST['Mesothelial']);
		
		$sql3 = mysql_query("select count(*) from fluidexam where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into fluidexam(color,volume,appearence,glouse,protein,totalcount,polymarphs,lymphos,mesoth,bill_no) values('$COLOUR','$Volume','$APPEARANCE','$glucose','$protein','$totalcount','$Polymorphs','$Lymphocytes','$Mesothelial','$bno')");

		}else{
			$sql2 = mysql_query("update fluidexam set color='$COLOUR',volume='$Volume',appearence='$APPEARANCE',glouse='$glucose',protein='$protein',totalcount='$totalcount',polymarphs='$Polymorphs',lymphos='$Lymphocytes',mesoth='$Mesothelial'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "SEROLOGY(ASO RAF CRP)"){
	
	$aid = mysql_real_escape_string($_REQUEST['aid']);
		$avalue = mysql_real_escape_string($_REQUEST['avalue']);
		$atype = mysql_real_escape_string($_REQUEST['atype']);
		
		mysql_query("update asonormals set avalue='$avalue',atype='$atype' where aid='$aid'");
		$rfid = mysql_real_escape_string($_REQUEST['rfid']);
		$rfvalue = mysql_real_escape_string($_REQUEST['rfvalue']);
		$rftype = mysql_real_escape_string($_REQUEST['rftype']);
		  mysql_query("update rafnormals set rfvalue='$rfvalue',rftype='$rftype' where rfid='$rfid'");
		  $valuea=$_REQUEST['res'];
                $type=$_REQUEST['type'];
                $crpid=$_REQUEST['crpid'];
                mysql_query("update crprange set value='$valuea',type='$type' where crpid='$crpid'");
		$CRPRESULT = mysql_real_escape_string($_REQUEST['CRPRESULT']);
				$raf = mysql_real_escape_string($_REQUEST['raf']);
				$asot = mysql_real_escape_string($_REQUEST['asot']);
		
		$sql3 = mysql_query("select count(*) from tft where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into tft(bill_no,crp,raf,aso) values('$bno','$CRPRESULT','$raf','$asot')");
		}else{
			$sql2 = mysql_query("update tft set crp='$CRPRESULT',raf='$raf',aso='$asot'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "RA FACTOR"){
	
	$raf = mysql_real_escape_string($_REQUEST['raf']);
		
		$rfid = mysql_real_escape_string($_REQUEST['rfid']);
		$rfvalue = mysql_real_escape_string($_REQUEST['rfvalue']);
		$rftype = mysql_real_escape_string($_REQUEST['rftype']);
		  mysql_query("update rafnormals set rfvalue='$rfvalue',rftype='$rftype' where rfid='$rfid'");
		
		$sql3 = mysql_query("select count(*) from raf where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into raf(bill_no, raf) values('$bno','$raf')");
		}else{
			$sql2 = mysql_query("update raf set raf='$raf'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "DENGUE SEROLOGY"){
	
	$dsrigg = mysql_real_escape_string($_REQUEST['dsrigg']);
		$dsrigm = mysql_real_escape_string($_REQUEST['dsrigm']);
		$dsrns1 = mysql_real_escape_string($_REQUEST['dsrns1']);
		
                $dsid= mysql_real_escape_string($_REQUEST['dsid']);
                $iggvalue= mysql_real_escape_string($_REQUEST['iggvalue']);
                $igmvalue= mysql_real_escape_string($_REQUEST['igmvalue']);
				  $ns1value= mysql_real_escape_string($_REQUEST['ns1value']);
                
                mysql_query("update dsrnormal set iggvalue='$iggvalue', igmvalue='$igmvalue',ns1value='$ns1value' where dsid='$dsid'");
		
		$sql3 = mysql_query("select count(*) from dsr where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysql_query("insert into dsr(bill_no, dsrigg,dsrigm,dsrns1) values('$bno','$dsrigg','$dsrigm','$dsrns1')");
		}else{
			$sql2 = mysql_query("update dsr set dsrigg='$dsrigg',dsrigm='$dsrigm',dsrns1='$dsrns1'  where bill_no = '$bno'");
		}
		}
	}
	
	
	
	if($tname == "2D Echo"){
		$MITRALVALVE = $_REQUEST['MITRALVALVE'];
		$AORTICVALUE = $_REQUEST['AORTICVALUE'];
		$PULMVALUE = $_REQUEST['PULMVALUE'];
		$TRICISPIDVALUE = $_REQUEST['TRICISPIDVALUE'];
		$IAS = $_REQUEST['IAS'];
		$IVS = $_REQUEST['IVS'];
		$AORTICROOT = $_REQUEST['AORTICROOT'];
		$AORTICOPENING = $_REQUEST['AORTICOPENING'];
		$LTATRIUM = $_REQUEST['LTATRIUM'];
		$RVOT = $_REQUEST['RVOT'];
		$IVSTHICKNESS = $_REQUEST['IVSTHICKNESS'];
		$LVPWTHICKNESS = $_REQUEST['LVPWTHICKNESS'];
		$LVIDo=$_REQUEST['LVIDo'];
                $LVDIs=$_REQUEST['LVDIs'];
                $RVDId=$_REQUEST['RVDId'];
                $EDV=$_REQUEST['EDV'];
                $ESV=$_REQUEST['ESV'];
                $EF=$_REQUEST['EF'];
                $FS=$_REQUEST['FS'];
                $LVM=$_REQUEST['LVM'];
                $EPSS=$_REQUEST['EPSS'];
                $RIGHTATRIUM=$_REQUEST['RIGHTATRIUM'];
                $RIGHTVENTRICLE=$_REQUEST['RIGHTVENTRICLE'];
                $PULARTERY=$_REQUEST['PULARTERY'];
                $PERICARDIUM=$_REQUEST['PERICARDIUM'];
                $MITRALVELOCITYE=$_REQUEST['MITRALVELOCITYE'];
                $MITRALVELOCITYA=$_REQUEST['MITRALVELOCITYA'];
                $AORTICVELOCITY=$_REQUEST['AORTICVELOCITY'];
                $PULMONARYVELOCITY=$_REQUEST['PULMONARYVELOCITY'];
                $TRICUSPIDVELOCITY=$_REQUEST['TRICUSPIDVELOCITY'];
                        $TRJETVELOCITY=$_REQUEST['TRJETVELOCITY'];
                        $PASP=$_REQUEST['PASP'];
                        $CONCLUSION=$_REQUEST['CONCLUSION'];
						$DOCTOR=$_REQUEST['DOCTOR'];
		
		$sql3 = mysql_query("select count(*) from echo2d where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into echo2d(bill_no, MITRALVALVE, AORTICVALUE, PULMVALUE, TRICISPIDVALUE, IAS,IVS,AORTICROOT,AORTICOPENING,LTATRIUM,RVOT,IVSTHICKNESS,LVPWTHICKNESS,LVIDo,LVDIs,RVDId,EDV,ESV,EF,FS,LVM,EPSS,RIGHTATRIUM,RIGHTVENTRICLE,PULARTERY,PERICARDIUM,MITRALVELOCITYE,MITRALVELOCITYA,AORTICVELOCITY,PULMONARYVELOCITY,TRICUSPIDVELOCITY,TRJETVELOCITY,PASP,CONCLUSION,DOCTOR) values('$bno','$MITRALVALVE','$AORTICVALUE','$PULMVALUE','$TRICISPIDVALUE','$IAS','$IVS','$AORTICROOT','$AORTICOPENING','$LTATRIUM','$RVOT','$IVSTHICKNESS','$LVPWTHICKNESS','$LVIDo','$LVDIs','$RVDId','$EDV','$ESV','$EF','$FS','$LVM','$EPSS','$RIGHTATRIUM','$RIGHTVENTRICLE','$PULARTERY','$PERICARDIUM','$MITRALVELOCITYE','$MITRALVELOCITYA','$AORTICVELOCITY','$PULMONARYVELOCITY','$TRICUSPIDVELOCITY','$TRJETVELOCITY','$PASP','$CONCLUSION','$DOCTOR')");
		}else{
			$sql2 = mysql_query("update echo2d set MITRALVALVE='$MITRALVALVE', AORTICVALUE='$AORTICVALUE', PULMVALUE='$PULMVALUE', TRICISPIDVALUE='$TRICISPIDVALUE', IAS='$IAS',IVS='$IVS',AORTICROOT='$AORTICROOT',AORTICOPENING='$AORTICOPENING',LTATRIUM='$LTATRIUM',RVOT='$RVOT',IVSTHICKNESS='$IVSTHICKNESS',LVPWTHICKNESS='$LVPWTHICKNESS',LVIDo='$LVIDo',LVDIs='$LVDIs',RVDId='$RVDId',EDV='$EDV',ESV='$ESV',EF='$EF',FS='$FS',LVM='$LVM',EPSS='$EPSS',RIGHTATRIUM='$RIGHTATRIUM',RIGHTVENTRICLE='$RIGHTVENTRICLE',PULARTERY='$PULARTERY',PERICARDIUM='$PERICARDIUM',MITRALVELOCITYE='$MITRALVELOCITYE',MITRALVELOCITYA='$MITRALVELOCITYA',AORTICVELOCITY='$AORTICVELOCITY',PULMONARYVELOCITY='$PULMONARYVELOCITY',TRICUSPIDVELOCITY='$TRICUSPIDVELOCITY',TRJETVELOCITY='$TRJETVELOCITY',PASP='$PASP',CONCLUSION='$CONCLUSION',DOCTOR='$DOCTOR' where bill_no = '$bno'");
			
			
		}
		}
	}
	
	
	if($tname == "RMT"){
		$plasmodiumvivax = mysql_real_escape_string($_REQUEST['plasmodiumvivax']);
		$plasmodiumlaciparam = mysql_real_escape_string($_REQUEST['plasmodiumlaciparam']);
           

			  
				
              $oantigen = mysql_real_escape_string($_REQUEST['oantigen']);
		$hantigen = mysql_real_escape_string($_REQUEST['hantigen']);
                $ahantigen = mysql_real_escape_string($_REQUEST['ahantigen']);
                $bhantigen = mysql_real_escape_string($_REQUEST['bhantigen']);
				 $oantigen1 = mysql_real_escape_string($_REQUEST['oantigen1']);
		$hantigen1 = mysql_real_escape_string($_REQUEST['hantigen1']);
                $ahantigen1 = mysql_real_escape_string($_REQUEST['ahantigen1']);
                $bhantigen1 = mysql_real_escape_string($_REQUEST['bhantigen1']);
                //mysql_query("update creatinormals set cvalue='$cvalue',ctype='$ctype' where cid='$cid'");
			    mysql_query("update rmtwidalvalues set oantigen='$oantigen1',hantigen='$hantigen1',ahantigen='$ahantigen1',bhantigen='$bhantigen1' where cid='1'");
		
		
		$sql3 = mysql_query("select count(*) from rmtest where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into rmtest(bill_no, plasmodiumvivax, plasmodiumlaciparam) values('$bno','$plasmodiumvivax','$plasmodiumlaciparam')");     
		}else{
			$sql2 = mysql_query("update rmtest set plasmodiumvivax='$plasmodiumvivax', plasmodiumlaciparam='$plasmodiumlaciparam' where bill_no = '$bno'");
			
			
		}
		}
		
		$sql4 = mysql_query("select count(*) from rmtwidal where bill_no='$bno'");
		if($sql4){
		$row4 = mysql_fetch_array($sql4);
		$nrows4 = $row4[0];
		if($nrows4 <= 0){
			$sql2=mysql_query("insert into rmtwidal(bill_no, oantigen, hantigen,ahantigen,bhantigen) values('$bno','$oantigen','$hantigen','$ahantigen','$bhantigen')");
		}else{
			$sql2 = mysql_query("update rmtwidal set oantigen='$oantigen', hantigen='$hantigen',ahantigen='$ahantigen',bhantigen='$bhantigen' where bill_no = '$bno'");
			
			
		}
		}
		
		
		
		
		
		
		
	}
	
	
	if($tname == "Pregnancy Test"){
		$urineforpregnancy = mysql_real_escape_string($_REQUEST['urineforpregnancy']);
				
		$sql3 = mysql_query("select count(*) from pregnancy where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into pregnancy(bill_no, urineforpregnancy ) values('$bno','$urineforpregnancy')");     
		}else{
			$sql2 = mysql_query("update pregnancy set urineforpregnancy='$urineforpregnancy' where bill_no = '$bno'");
			
			
		}
		}
		
			
	}
	
	if($tname == "Serum Lipase"){
		$serumlipase = ($_REQUEST['serumlipase']);
		$serumlipase1 = mysql_real_escape_string($_REQUEST['serumlipase1']);
		mysql_query("update amylaselipasenormals set lipase='$serumlipase1'  where id='1'");  
				
		$sql3 = mysql_query("select count(*) from amylaselipase where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into amylaselipase(bill_no, serumlipase ) values('$bno','$serumlipase')");     
		}else{
			$sql2 = mysql_query("update amylaselipase set serumlipase='$serumlipase' where bill_no = '$bno'");
			
			
		}
		}
		
			
	}
	
	
	if($tname == "OGCT"){
		 $glucose = ($_REQUEST['glucose']);
		$urinesugar = mysql_real_escape_string($_REQUEST['urinesugar']);
		 
				
		$sql3 = mysql_query("select count(*) from ogct where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into ogct(bill_no, glucose,glucoseurine ) values('$bno','$glucose','$urinesugar')");     
		}else{
			$sql2 = mysql_query("update ogct set glucose='$glucose',glucoseurine='$urinesugar' where bill_no = '$bno'");
			
			
		}
		}
		
			
	}
	
	
	if($tname == "GTT"){
		 $glucosefasting = mysql_real_escape_string($_REQUEST['glucosefasting']);
		$glucosehalf = mysql_real_escape_string($_REQUEST['glucosehalf']);
		$glucoseohr = mysql_real_escape_string($_REQUEST['glucoseohr']);
		$glucoseohrh = mysql_real_escape_string($_REQUEST['glucoseohrh']);
		$glucoset = mysql_real_escape_string($_REQUEST['glucoset']);
		$gfurinesugar = mysql_real_escape_string($_REQUEST['gfurinesugar']);
		$gohurinesugar = mysql_real_escape_string($_REQUEST['gohurinesugar']);
		$gonehurinesugar = mysql_real_escape_string($_REQUEST['gonehurinesugar']);
		$gonehhurinesugar = mysql_real_escape_string($_REQUEST['gonehhurinesugar']);
		$gtwourinesugar = mysql_real_escape_string($_REQUEST['gtwourinesugar']);
		 
				
		$sql3 = mysql_query("select count(*) from gtt where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into gtt(bill_no, glucosefasting,glucosehalf,glucoseohr,glucoseohrh,glucoset,gfurinesugar,gohurinesugar,gonehurinesugar,gonehhurinesugar,gtwourinesugar) values('$bno','$glucosefasting','$glucosehalf','$glucoseohr','$glucoseohrh','$glucoset','$gfurinesugar','$gohurinesugar','$gonehurinesugar','$gonehhurinesugar','$gtwourinesugar')");     
		}else{
			$sql2 = mysql_query("update gtt set glucosefasting='$glucosefasting',glucosehalf='$glucosehalf',glucoseohr='$glucoseohr',glucoseohrh='$glucoseohrh',glucoset='$glucoset',gfurinesugar='$gfurinesugar',gohurinesugar='$gohurinesugar',gonehurinesugar='$gonehurinesugar',gonehhurinesugar='$gonehhurinesugar',gtwourinesugar='$gtwourinesugar' where bill_no = '$bno'");
			
			
		}
		}
		
			
	}
	
	if($tname == "Semen Analasis"){
		$periodabsence = mysql_real_escape_string($_REQUEST['periodabsence']);
		$colour = mysql_real_escape_string($_REQUEST['colour']);
		$reaction = mysql_real_escape_string($_REQUEST['reaction']);
		$volume = mysql_real_escape_string($_REQUEST['volume']);
		$lqtime = mysql_real_escape_string($_REQUEST['lqtime']);
		$spermcount = mysql_real_escape_string($_REQUEST['spermcount']);
		$activemotile = mysql_real_escape_string($_REQUEST['activemotile']);
		$suggishlymotile = mysql_real_escape_string($_REQUEST['suggishlymotile']);
		$nonmotile = mysql_real_escape_string($_REQUEST['nonmotile']);
		$normalform = mysql_real_escape_string($_REQUEST['normalform']);
		
		
		$abnormalform = mysql_real_escape_string($_REQUEST['abnormalform']);
		$puscells = mysql_real_escape_string($_REQUEST['puscells']);
		$rbc = mysql_real_escape_string($_REQUEST['rbc']);
		$others = mysql_real_escape_string($_REQUEST['others']);
		$impression = mysql_real_escape_string($_REQUEST['impression']);
		$epithelial = mysql_real_escape_string($_REQUEST['epithelial']);
		
		 
				
		$sql3 = mysql_query("select count(*) from semenanalasis where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into semenanalasis(bill_no, periodabsence,colour,reaction,volume,lqtime,spermcount,activemotile,suggishlymotile,nonmotile,normalform,abnormalform,puscells,epithelial,rbc,others,impression)values('$bno','$periodabsence','$colour','$reaction','$volume','$lqtime','$spermcount','$activemotile','$suggishlymotile','$nonmotile','$normalform','$abnormalform','$puscells','$epithelial','$rbc','$others','$impression')");     
		}else{
			$sql2 = mysql_query("update semenanalasis set periodabsence='$periodabsence',colour='$colour',reaction='$reaction',volume='$volume',lqtime='$lqtime',spermcount='$spermcount',activemotile='$activemotile',suggishlymotile='$suggishlymotile',nonmotile='$nonmotile',normalform='$normalform',abnormalform='$abnormalform',puscells='$puscells',epithelial='$epithelial',rbc='$rbc',others='$others',impression='$impression' where bill_no = '$bno'");
			
			
		}
		}
		
			
	}
	
	
	
	
	if($tname == "Urine Albumin"){
		$albuminurine = mysql_real_escape_string($_REQUEST['albuminurine']);
				
		$sql3 = mysql_query("select count(*) from urinealbumin where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into urinealbumin(bill_no, albuminurine)values('$bno','$albuminurine')");     
		}else{
			$sql2 = mysql_query("update urinealbumin set albuminurine='$albuminurine' where bill_no = '$bno'");
			
			
		}
		}
		
			
	}
	
	
	if($tname == "amylase lipase"){
		$serumamylase = mysql_real_escape_string($_REQUEST['serumamylase']);
		$serumamylase1 = mysql_real_escape_string($_REQUEST['serumamylase1']);
		$serumlipase = mysql_real_escape_string($_REQUEST['serumlipase']);
		$serumlipase1 = mysql_real_escape_string($_REQUEST['serumlipase1']);
				mysql_query("update lipasevalues set serumamylase='$serumamylase1',serumlipase='$serumlipase1' where id='1'");
				
		$sql3 = mysql_query("select count(*) from lipase where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into lipase(bill_no, serumamylase,serumlipase)values('$bno','$serumamylase','$serumlipase')");     
		}else{
			$sql2 = mysql_query("update lipase set serumamylase='$serumamylase',serumlipase='$serumlipase' where bill_no = '$bno'");
			
			
		}
		}
		
			
	}
	
	if($tname == "SERUM TSH"){
		$tsh = mysql_real_escape_string($_REQUEST['tsh']);
		$ad1=$_REQUEST['ad1'];
		$ad2=$_REQUEST['ad2'];
		$pg1=$_REQUEST['pg1'];
		$pg2=$_REQUEST['pg2'];
		$pg3=$_REQUEST['pg3'];
		$cb=$_REQUEST['cb'];
		$birth=$_REQUEST['birth'];
		$week=$_REQUEST['week'];
		$years=$_REQUEST['years'];
		$premature=$_REQUEST['premature'];
		$y="update tshnormals set  ad1='$ad1',ad2='$ad2',pg1='$pg1',pg2='$pg2',pg3='$pg3',cb='$cb',birth='$birth',week='$week',years='$years',premature='$premature'  where id='1'";
				mysql_query($y);
				
		$sql3 = mysql_query("select count(*) from tsh where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into tsh(bill_no, tsh)values('$bno','$tsh')");     
		}else{
			$sql2 = mysql_query("update tsh set tsh='$tsh' where bill_no = '$bno'");
			
			
		}
		}
		
			
	}
	
	if($tname == "Serology ( HIV, HBs Ag and VDRL )"){
		$bg = mysql_real_escape_string($_REQUEST['bg']);
		$rhd=$_REQUEST['rhd'];
		$hiv=$_REQUEST['hiv'];
		$hbsag=$_REQUEST['hbsag'];
		$vdrl=$_REQUEST['vdrl'];
				
		$sql3 = mysql_query("select count(*) from serology where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into serology(bill_no,bg, rhd,hiv,hbsag,vdrl)values('$bno','$bg','$rhd','$hiv','$hbsag','$vdrl')");     
		}else{
			$sql2 = mysql_query("update serology set bg='$bg',rhd='$rhd',hiv='$hiv',hbsag='$hbsag',vdrl='$vdrl' where bill_no = '$bno'");
			
			
		}
		}
		
			
	}
	
	
	
	
	if($tname == "ANP"){
		
		/* cbp*/
		$HAEMOGLOBIN = $_REQUEST['HAEMOGLOBIN'];
		$RBC = $_REQUEST['RBC'];
		$WBC = $_REQUEST['WBC'];
		$PLATELET = $_REQUEST['PLATELET'];
		$NEUTROPHILS = $_REQUEST['NEUTROPHILS'];
		$LYMPHOCYTES = $_REQUEST['LYMPHOCYTES'];
		$MONOCYTES = $_REQUEST['MONOCYTES'];
		$EOSINOPHILS = $_REQUEST['EOSINOPHILS'];
		$BASOPHILS = $_REQUEST['BASOPHILS'];
		$RBC1 = $_REQUEST['RBC1'];
		$WBC1 = $_REQUEST['WBC1'];
		$Platelets = $_REQUEST['Platelets'];
		$PACKEDCELL= $_REQUEST['PACKEDCELL'];
		$mcv= $_REQUEST['mcv'];
		$mch= $_REQUEST['mch'];
		$mchc= $_REQUEST['mchc'];
		$periperl= $_REQUEST['periperl'];
		
		
		
		$sql3 = mysql_query("select count(*) from cbp where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into cbp(bill_no, HAEMOGLOBIN, RBC, WBC_Count, PLATELET_COUNT, NEUTROPHILS,LYMPHOCYTES,MONOCYTES,EOSINOPHILS,BASOPHILS,RBC1,WBC1,Platelets,PACKEDCELL,mcv,mch,mchc,periperl) values('$bno','$HAEMOGLOBIN','$RBC','$WBC','$PLATELET','$NEUTROPHILS','$LYMPHOCYTES','$MONOCYTES','$EOSINOPHILS','$BASOPHILS','$RBC1','$WBC1','$Platelets','$PACKEDCELL','$mcv','$mch','$mchc','$periperl')");
		}else{
			$sql2 = mysql_query("update cbp set PACKEDCELL='$PACKEDCELL',mcv='$mcv',mch='$mch',mchc='$mchc',periperl='$periperl', HAEMOGLOBIN='$HAEMOGLOBIN', RBC='$RBC', WBC_Count='$WBC', PLATELET_COUNT='$PLATELET', NEUTROPHILS='$NEUTROPHILS',LYMPHOCYTES='$LYMPHOCYTES',MONOCYTES='$MONOCYTES',EOSINOPHILS='$EOSINOPHILS',BASOPHILS='$BASOPHILS',RBC1='$RBC1',WBC1='$WBC1',Platelets='$Platelets' where bill_no = '$bno'");
		}
		}
		
		/* cue*/
		$CUECOLOUR = $_REQUEST['CUECOLOUR'];
		$CUEAPPEARANCE = $_REQUEST['CUEAPPEARANCE'];
		$CUEREACTION = $_REQUEST['CUEREACTION'];
		$CUESPECIFICGRAVITY = $_REQUEST['CUESPECIFICGRAVITY'];
		$CUESUGAR = $_REQUEST['CUESUGAR'];
		$CUEALBUMIN = $_REQUEST['CUEALBUMIN'];
		$CUEBILESALTS = $_REQUEST['CUEBILESALTS'];
		$CUEBILEPIGMENTS = $_REQUEST['CUEBILEPIGMENTS'];
		$CUEUROBILINOGEN = $_REQUEST['CUEUROBILINOGEN'];
		$CUEKETONES = $_REQUEST['CUEKETONES'];
		$CUERBC = $_REQUEST['CUERBC'];
		$CUEPUSCELLS = $_REQUEST['CUEPUSCELLS'];
		$CUEEPITHELIAL = $_REQUEST['CUEEPITHELIAL'];
		$CUECASTS = $_REQUEST['CUECASTS'];
		$CUECRYSTALS = $_REQUEST['CUECRYSTALS'];
		$CUEOTHERS = $_REQUEST['CUEOTHERS'];
		
		$sql3 = mysql_query("select count(*) from cue where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into cue(bill_no, COLOUR, APPEARANCE, REACTION, SPECIFIC_GRAVITY, SUGAR,ALBUMIN,BILE_SALTS,BILE_PIGMENTS,UROBILINOGEN,KETONES,RBC,PUSCELLS,EPITHELIAL_CELL,CASTS,CRYSTALS,OTHERS) values('$bno','$CUECOLOUR','$CUEAPPEARANCE','$CUEREACTION','$CUESPECIFICGRAVITY','$CUESUGAR','$CUEALBUMIN','$CUEBILESALTS','$CUEBILEPIGMENTS','$CUEUROBILINOGEN','$CUEKETONES','$CUERBC','$CUEPUSCELLS','$CUEEPITHELIAL','$CUECASTS','$CUECRYSTALS','$CUEOTHERS')");
		}else{
			$sql2 = mysql_query("update cue set COLOUR='$CUECOLOUR', APPEARANCE='$CUEAPPEARANCE', REACTION='$CUEREACTION', SPECIFIC_GRAVITY='$CUESPECIFICGRAVITY', SUGAR='$CUESUGAR',ALBUMIN='$CUEALBUMIN',BILE_SALTS='$CUEBILESALTS',BILE_PIGMENTS='$CUEBILEPIGMENTS',UROBILINOGEN='$CUEUROBILINOGEN',KETONES='$CUEKETONES',RBC='$CUERBC',PUSCELLS='$CUEPUSCELLS',EPITHELIAL_CELL='$CUEEPITHELIAL',CASTS='$CUECASTS',CRYSTALS='$CUECRYSTALS',OTHERS='$CUEOTHERS' where bill_no = '$bno'");
		}
		}
		
		/* amylase lipase*/
		$serumamylase = mysql_real_escape_string($_REQUEST['serumamylase']);
		$serumamylase1 = mysql_real_escape_string($_REQUEST['serumamylase1']);
		$serumlipase = mysql_real_escape_string($_REQUEST['serumlipase']);
		$serumlipase1 = mysql_real_escape_string($_REQUEST['serumlipase1']);
				mysql_query("update lipasevalues set serumamylase='$serumamylase1',serumlipase='$serumlipase1' where id='1'");
				
		$sql3 = mysql_query("select count(*) from lipase where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into lipase(bill_no, serumamylase,serumlipase)values('$bno','$serumamylase','$serumlipase')");     
		}else{
			$tyu="update lipase set serumamylase='$serumamylase',serumlipase='$serumlipase' where bill_no = '$bno'";
			$sql2 = mysql_query($tyu);
			
			
		}
		}
		
		
		/* tsh*/
		$tsh = mysql_real_escape_string($_REQUEST['tsh']);
		$ad1=$_REQUEST['ad1'];
		$ad2=$_REQUEST['ad2'];
		$pg1=$_REQUEST['pg1'];
		$pg2=$_REQUEST['pg2'];
		$pg3=$_REQUEST['pg3'];
		$cb=$_REQUEST['cb'];
		$birth=$_REQUEST['birth'];
		$week=$_REQUEST['week'];
		$years=$_REQUEST['years'];
		$premature=$_REQUEST['premature'];
		$y="update tshnormals set  ad1='$ad1',ad2='$ad2',pg1='$pg1',pg2='$pg2',pg3='$pg3',cb='$cb',birth='$birth',week='$week',years='$years',premature='$premature'  where id='1'";
				mysql_query($y);
				
		$sql3 = mysql_query("select count(*) from tsh where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into tsh(bill_no, tsh)values('$bno','$tsh')");     
		}else{
			 $ty="update tsh set tsh='$tsh' where bill_no = '$bno'";
			$sql2 = mysql_query($ty);
			
			
		}
		}
		
		/* lft*/
		$LFTTBILIRUBIN = $_REQUEST['LFTTBILIRUBIN'];
		$LFTDBILIRUBIN = $_REQUEST['LFTDBILIRUBIN'];
		$LFTIBILIRUBIN = $_REQUEST['LFTIBILIRUBIN'];
		$LFTSGOT = $_REQUEST['LFTSGOT'];
		$LFTSGPT = $_REQUEST['LFTSGPT'];
		$LFTSAPHOSPHATE = $_REQUEST['LFTSAPHOSPHATE'];
		$LFTTPROTIENS = $_REQUEST['LFTTPROTIENS'];
		$LFTSALBUMIN = $_REQUEST['LFTSALBUMIN'];
		$LFTSGLOBULIN = $_REQUEST['LFTSGLOBULIN'];
		$LFTAGRATIO = $_REQUEST['LFTAGRATIO'];
		
		$sql3 = mysql_query("select count(*) from lft where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into lft(bill_no, TOTAL_BILIRUBIN,DIRECT_BILIRUBIN,INDIRECT_BILIRUBIN,SGOT,SGPT,S_ALKALINE_PHOSPHATE,TOTAL_PROTIENS,SERUM_ALBUMIN,SERUM_GLOBULIN,AG_Ratio) values('$bno','$LFTTBILIRUBIN','$LFTDBILIRUBIN','$LFTIBILIRUBIN','$LFTSGOT','$LFTSGPT','$LFTSAPHOSPHATE','$LFTTPROTIENS','$LFTSALBUMIN','$LFTSGLOBULIN','$LFTAGRATIO')");
		}else{
			$sql2 = mysql_query("update lft set TOTAL_BILIRUBIN='$LFTTBILIRUBIN',DIRECT_BILIRUBIN='$LFTDBILIRUBIN',INDIRECT_BILIRUBIN='$LFTIBILIRUBIN',SGOT='$LFTSGOT',SGPT='$LFTSGPT',S_ALKALINE_PHOSPHATE='$LFTSAPHOSPHATE',TOTAL_PROTIENS='$LFTTPROTIENS',SERUM_ALBUMIN='$LFTSALBUMIN',SERUM_GLOBULIN='$LFTSGLOBULIN',AG_Ratio='$LFTAGRATIO'  where bill_no = '$bno'");
		}
		}
		
		
		
		
		/* serum(hiv)*/
		$bg = mysql_real_escape_string($_REQUEST['bg']);
		$rhd=$_REQUEST['rhd'];
		$hiv=$_REQUEST['hiv'];
		$hbsag=$_REQUEST['hbsag'];
		$vdrl=$_REQUEST['vdrl'];
				
		$sql3 = mysql_query("select count(*) from serology where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2=mysql_query("insert into serology(bill_no,bg, rhd,hiv,hbsag,vdrl)values('$bno','$bg','$rhd','$hiv','$hbsag','$vdrl')");     
		}else{
			$sql2 = mysql_query("update serology set bg='$bg',rhd='$rhd',hiv='$hiv',hbsag='$hbsag',vdrl='$vdrl' where bill_no = '$bno'");
			
			
		}
		}
		
			
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
if($sql2){
	print "<script>";
	print "alert('Successfully updated');";
	print "self.location='result_entry.php';";
	print "</script>";
	//header("Location:send_sms2.php?bno=$bno&pn=$pname&d=$bdate");
}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='result_entry.php';";
	print "</script>";
	}
}
?>