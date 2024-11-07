<?php
include("config.php");

if(isset($_POST['submit'])){

$bno =$_POST['bno'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname = $_POST['pname'];
$age =$_POST['age'];
$gender = $_POST['gender'];
$dname = $_POST['dname'];
$cnt = count($_POST['tname']);
$name=$_POST['user'];




for($i=0;$i<$cnt;$i++){
$tname = $_POST['tname'][$i];

$sql1 = mysql_query("insert into reportentry1(BillNo, Date, Pname, Age, Sex, DoctorName,Ptest,user) values('$bno','$bdate','$pname','$age','$gender','$dname','$tname','$name')");
}
if($sql1)
{
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
		$cbpid=$_REQUEST['cbpid'];
                $hm=$_REQUEST['hm'];
                $hf=$_REQUEST['hf'];
                $rbcm=$_REQUEST['rbcm'];
                $rbcf=$_REQUEST['rbcf'];
                $webcount=$_REQUEST['webcount'];
                $plateletcount=$_REQUEST['plateletcount'];
                $na=$_REQUEST['na'];
                $nc=$_REQUEST['nc'];
                $la=$_REQUEST['la'];
                $lc=$_REQUEST['lc'];
                $ma=$_REQUEST['ma'];
                $mc=$_REQUEST['mc'];
                $ea=$_REQUEST['ea'];
                $ec=$_REQUEST['ec'];
                $baa=$_REQUEST['baa'];
                $bac=$_REQUEST['bac'];
                $hnormal=$_REQUEST['hnormal'];
                        $rbcnormal=$_REQUEST['rbcnormal'];
                        $webcountnormal=$_REQUEST['webcountnormal'];
                        $plateletnormal=$_REQUEST['plateletnormal'];
                $s="update cbpnormal set hm='$hm',hf='$hf',rbcm='$rbcm',rbcf='$rbcf',webcount='$webcount',plateletcount='$plateletcount',na='$na',nc='$nc',la='$la',lc='$lc',ma='$ma',mc='$mc',ea='$ea',ec='$ec',baa='$baa',bac='$bac', rbcnormal='$rbcnormal',webcountnormal='$webcountnormal',
 plateletnormal='$plateletnormal', hnormal='$hnormal' where id='$cbpid'";
                mysql_query($s) or die(mysql_error());
		$sql2 = mysql_query("insert into cbp(bill_no, HAEMOGLOBIN, RBC, WBC_Count, PLATELET_COUNT, NEUTROPHILS,LYMPHOCYTES,MONOCYTES,EOSINOPHILS,BASOPHILS,RBC1,WBC1,Platelets) values('$bno','$HAEMOGLOBIN','$RBC','$WBC','$PLATELET','$NEUTROPHILS','$LYMPHOCYTES','$MONOCYTES','$EOSINOPHILS','$BASOPHILS','$RBC1','$WBC1','$Platelets')");

	
	}
	if($tname == "2D Echo"){
		//print_r($_POST);
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
                $k="insert into echo2d(bill_no, MITRALVALVE, AORTICVALUE, PULMVALUE, TRICISPIDVALUE, IAS,IVS,AORTICROOT,AORTICOPENING,LTATRIUM,RVOT,IVSTHICKNESS,LVPWTHICKNESS,LVIDo,LVDIs,RVDId,EDV,ESV,EF,FS,LVM,EPSS,RIGHTATRIUM,RIGHTVENTRICLE,PULARTERY,PERICARDIUM,MITRALVELOCITYE,MITRALVELOCITYA,AORTICVELOCITY,PULMONARYVELOCITY,TRICUSPIDVELOCITY,TRJETVELOCITY,PASP,CONCLUSION,DOCTOR) values('$bno','$MITRALVALVE','$AORTICVALUE','$PULMVALUE','$TRICISPIDVALUE','$IAS','$IVS','$AORTICROOT','$AORTICOPENING','$LTATRIUM','$RVOT','$IVSTHICKNESS','$LVPWTHICKNESS','$LVIDo','$LVDIs','$RVDId','$EDV','$ESV','$EF','$FS','$LVM','$EPSS','$RIGHTATRIUM','$RIGHTVENTRICLE','$PULARTERY','$PERICARDIUM','$MITRALVELOCITYE','$MITRALVELOCITYA','$AORTICVELOCITY','$PULMONARYVELOCITY','$TRICUSPIDVELOCITY','$TRJETVELOCITY','$PASP','$CONCLUSION','$DOCTOR')";
		$sql2 = mysql_query($k) or die(mysql_error());

	
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
		
		$sql2 = mysql_query("insert into cue(bill_no, COLOUR, APPEARANCE, REACTION, SPECIFIC_GRAVITY, SUGAR,ALBUMIN,BILE_SALTS,BILE_PIGMENTS,UROBILINOGEN,KETONES,RBC,PUSCELLS,EPITHELIAL_CELL,CASTS,CRYSTALS,OTHERS) values('$bno','$CUECOLOUR','$CUEAPPEARANCE','$CUEREACTION','$CUESPECIFICGRAVITY','$CUESUGAR','$CUEALBUMIN','$CUEBILESALTS','$CUEBILEPIGMENTS','$CUEUROBILINOGEN','$CUEKETONES','$CUERBC','$CUEPUSCELLS','$CUEEPITHELIAL','$CUECASTS','$CUECRYSTALS','$CUEOTHERS')");

	
	}
	if($tname == "MANTOUX TEST"){
		$MANTOUXGIVENON = date('Y-m-d',strtotime($_REQUEST['MANTOUXGIVENON']));
		$MANTOUXREPORTNON = date('Y-m-d',strtotime($_REQUEST['MANTOUXREPORTNON']));
		$MANTOUXRESULT = mysql_real_escape_string($_REQUEST['MANTOUXRESULT']);
		
		
		$sql2 = mysql_query("insert into mantoux(bill_no, given_on, report_on, result) values('$bno','$MANTOUXGIVENON','$MANTOUXREPORTNON','$MANTOUXRESULT')");

	
	}
	if($tname == "C - Reactive Protein (CRP)"){
		$CRPRESULT = $_REQUEST['CRPRESULT'];
		$valuea=$_REQUEST['res'];
                $type=$_REQUEST['type'];
                $crpid=$_REQUEST['crpid'];
                mysql_query("update crprange set value='$valuea',type='$type' where crpid='$crpid'");
		$sql2 = mysql_query("insert into crp(bill_no, crp_result) values('$bno','$CRPRESULT')");

	
	}if($tname == "LIVER FUNCTION TEST"){
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
		
                
                
                $lfid = $_REQUEST['lfid'];
                $ltbv = $_REQUEST['ltbv'];
                $ldbv = $_REQUEST['ldbv'];
                $ldbt = $_REQUEST['ldbt'];
                $sgotv = $_REQUEST['sgotv'];
                $sgptv = $_REQUEST['sgptv'];
                $sgtt = $_REQUEST['sgtt'];
                $slv1 = $_REQUEST['slv1'];
                $slv2 = $_REQUEST['slv2'];
                $slv3 = $_REQUEST['slv3'];
                $slv4 = $_REQUEST['slv4'];
                $slv5 = $_REQUEST['slv5'];
                $slvt = $_REQUEST['slvt'];
                $tpv = $_REQUEST['tpv'];
                $sav = $_REQUEST['sav'];
                $tpt = $_REQUEST['tpt'];                
                
                mysql_query("update livernormal set ltbv='$ltbv',ldbv='$ldbv',ldbt='$ldbt', sgotv='$sgotv', sgptv='$sgptv', sgtt='$sgtt', slv1='$slv1', slv2='$slv2',slv3='$slv3', slv4='$slv4',slv5='$slv5', slvt='$slvt',tpv='$tpv', sav='$sav', tpt='$tpt' where lfid='$lfid'");
                
		$sql2 = mysql_query("insert into lft(bill_no, TOTAL_BILIRUBIN,DIRECT_BILIRUBIN,INDIRECT_BILIRUBIN,SGOT,SGPT,S_ALKALINE_PHOSPHATE,TOTAL_PROTIENS,SERUM_ALBUMIN,SERUM_GLOBULIN,AG_Ratio) values('$bno','$LFTTBILIRUBIN','$LFTDBILIRUBIN','$LFTIBILIRUBIN','$LFTSGOT','$LFTSGPT','$LFTSAPHOSPHATE','$LFTTPROTIENS','$LFTSALBUMIN','$LFTSGLOBULIN','$LFTAGRATIO')");

	
	}if($tname == "Parasite F and V"){
		$RMTRESULT = mysql_real_escape_string($_REQUEST['RMTRESULT']);
		$RMTRESULT1 = mysql_real_escape_string($_REQUEST['RMTRESULT1']);
		
		$sql2 = mysql_query("insert into rmt(bill_no, rmt_result,rmt_result1) values('$bno','$RMTRESULT','$RMTRESULT1')");

	
	}if($tname == "Smear for Malarial Parasite"){
		$SMPRESULT = mysql_real_escape_string($_REQUEST['SMPRESULT']);
		
		$sql2 = mysql_query("insert into smp(bill_no, smp_result) values('$bno','$SMPRESULT')");

	
	}if($tname == "SERUM AMYLASE"){
		$SAMYLASE = mysql_real_escape_string($_REQUEST['SAMYLASE']);
		$said=mysql_real_escape_string($_REQUEST['said']);
                $savalue=mysql_real_escape_string($_REQUEST['savalue']);
                $satype=mysql_real_escape_string($_REQUEST['satype']);
                mysql_query("updaet serumamynirmal set savalue='$savalue',  satype='$satype' where said='$said'");
                
		$sql2 = mysql_query("insert into amylase(bill_no, amylase_result) values('$bno','$SAMYLASE')");

	
	}if($tname == "Absolute Eosinophil Count (AEC)"){
		$aecresult = mysql_real_escape_string($_REQUEST['aecresult']);
		
		$sql2 = mysql_query("insert into aec(bill_no, aec_result) values('$bno','$aecresult')");

	
	}if($tname == "Erythrocyte Sedimentation Rate (ESR)"){
		$esrresult = mysql_real_escape_string($_REQUEST['esrresult']);
		$esrid=mysql_real_escape_string($_REQUEST['esrid']);
                $esrvalue=mysql_real_escape_string($_REQUEST['esrvalue']);
               $esrtype=mysql_real_escape_string($_REQUEST['esrtype']);
               mysql_query("update esrresult set esrvalue='$esrvalue', esrtype='$esrtype' where esrid='$esrid'");
		$sql2 = mysql_query("insert into esr(bill_no, esr_result) values('$bno','$esrresult')");

	
	}if($tname == "Serum Electrolytes"){
		$sodium = mysql_real_escape_string($_REQUEST['sodium']);
		$potash = mysql_real_escape_string($_REQUEST['potash']);
		$chloride = mysql_real_escape_string($_REQUEST['chloride']);
		
                $seid = mysql_real_escape_string($_REQUEST['seid']);
                $svalue = mysql_real_escape_string($_REQUEST['svalue']);
                $pvalue= mysql_real_escape_string($_REQUEST['pvalue']);
                $cvalue = mysql_real_escape_string($_REQUEST['cvalue']);
                $stype = mysql_real_escape_string($_REQUEST['stype']);
                
                mysql_query("update sele set svalue='$svalue', pvalue='$pvalue',cvalue='$cvalue',  stype='$stype' where seid='$seid'");
                
		$sql2 = mysql_query("insert into ele(bill_no, sodium,potash,chloride) values('$bno','$sodium','$potash','$chloride')");

	
	}if($tname == "Random Blood Sugar (RBS)"){
		$rbs = mysql_real_escape_string($_REQUEST['rbs']);
		$rus = mysql_real_escape_string($_REQUEST['rus']);
		
                $rbsid=mysql_real_escape_string($_REQUEST['rbsid']);
                $rbsvalue=mysql_real_escape_string($_REQUEST['rbsvalue']);
                $rbstype=mysql_real_escape_string($_REQUEST['rbstype']);
                mysql_query("update set rbsrange rbsvalue='$rbsvalue',rbstype='$rbstype' where rbsid='$rbsid'");
		$sql2 = mysql_query("insert into rbs(bill_no, rbs_result,rus) values('$bno','$rbs','$rus')");

	
	}if($tname == "Blood Urea"){
		$burea = mysql_real_escape_string($_REQUEST['burea']);
		$buid = mysql_real_escape_string($_REQUEST['buid']);
                $buvalue= mysql_real_escape_string($_REQUEST['buvalue']);
                $butype= mysql_real_escape_string($_REQUEST['butype']);
                mysql_query("update bunormals set buvalue='$buvalue', butype='$butype' where buid='$buid'");
		$sql2 = mysql_query("insert into burea(bill_no, burea_result) values('$bno','$burea')");

	
	}if($tname == "Serum Creatinine"){
		$creati = mysql_real_escape_string($_REQUEST['creati']);
		$cid = mysql_real_escape_string($_REQUEST['cid']);
                $cvalue = mysql_real_escape_string($_REQUEST['cvalue']);
                $ctype = mysql_real_escape_string($_REQUEST['ctype']);
                mysql_query("update creatinormals set cvalue='$cvalue',ctype='$ctype' where cid='$cid'");
		$sql2 = mysql_query("insert into creati(bill_no, serum_result) values('$bno','$creati')");

	
	}if($tname == "SERUM CALCIUM"){
		$calres = mysql_real_escape_string($_REQUEST['cal_result']);
                
		$scid = mysql_real_escape_string($_REQUEST['scid']);
                $scvalue = mysql_real_escape_string($_REQUEST['scvalue']);
                $sctype = mysql_real_escape_string($_REQUEST['sctype']);
                mysql_query("update scnormal set scvalue='$scvalue', sctype='$sctype' where scid='$scid'");
		$sql2 = mysql_query("insert into calcium(bill_no, cal_result) values('$bno','$calres')");

	
	}if($tname == "Prothrombin Time (PT)"){
		$pttest = mysql_real_escape_string($_REQUEST['pttest']);
		$ptcontrol = mysql_real_escape_string($_REQUEST['ptcontrol']);
		$ptinr = mysql_real_escape_string($_REQUEST['ptinr']);
		
		$sql2 = mysql_query("insert into pt(bill_no, pt_time,pt_control,pt_inr) values('$bno','$pttest','$ptcontrol','$ptinr')");

	
	}if($tname == "Activated Partial Thromboplastin Time (APTT)"){
		$aptttest = mysql_real_escape_string($_REQUEST['aptttest']);
		$apttcontrol = mysql_real_escape_string($_REQUEST['apttcontrol']);
		
		$sql2 = mysql_query("insert into aptt(bill_no, aptt_time,aptt_control) values('$bno','$aptttest','$apttcontrol')");

	
	}if($tname == "Serum Uric Acid"){
		$suaresult = mysql_real_escape_string($_REQUEST['sua_result']);
                
                $suaid=$_REQUEST['suaid'];
                $suam=$_REQUEST['suam'];
                $sumv=$_REQUEST['sumv'];
                $suf=$_REQUEST['suf'];
                $sufv=$_REQUEST['sufv'];
		mysql_query("update serumuricacidnormals set sum='$suam', sumv='$sumv', suf='$suf', sufv='$sufv' suaid='$suaid'");
		$sql2 = mysql_query("insert into sua(bill_no, sua_result) values('$bno','$suaresult')");

	
	}if($tname == "COMPLETE STOOL EXAMINATION"){
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
		
		$sql2 = mysql_query("insert into cse(bill_no, COLOUR, CONSIST, REACTION, MUCUS, OCCULT_BLOOD,REDUCING_SUBSTANCE,RBC,PUSCELLS,EPITHELIAL,OVAS,CYSTS,OTHERS) values('$bno','$CSECOLOUR','$CSECONSISTENCY','$CSEREACTION','$CSEMUCUS','$CSEOCCULT','$CSESUBSTANCE','$CSERBC','$CSEPUSCELLS','$CSEEPITHELIAL','$CSEOVAS','$CSECYSTS','$CSEOTHERS')");

	
	}if($tname == "HBsAg"){
		$hresult = mysql_real_escape_string($_REQUEST['hresult']);
		
		$sql2 = mysql_query("insert into hbsag(bill_no, hresult) values('$bno','$hresult')");

	
	}if($tname == "WIDAL"){
		$sto = mysql_real_escape_string($_REQUEST['sto']);
		$sth = mysql_real_escape_string($_REQUEST['sth']);
		$spah = mysql_real_escape_string($_REQUEST['spah']);
		$spbh = mysql_real_escape_string($_REQUEST['spbh']);
		
		$sql2 = mysql_query("insert into widal(bill_no, sto,sth,spah,spbh) values('$bno','$sto','$sth','$spah','$spbh')");

	
	}if($tname == "HAEMOGLOBIN"){
		$haresult = mysql_real_escape_string($_REQUEST['haresult']);
		$hmgid= mysql_real_escape_string($_REQUEST['hmgid']);
                $hmdm= mysql_real_escape_string($_REQUEST['hmdm']);   
                            $hmdtype= mysql_real_escape_string($_REQUEST['hmdtype']);
                        $hmdf= mysql_real_escape_string($_REQUEST['hmdf']);
                        mysql_query("update hemgnormals set hmdm='$hmdm',  hmdf='$hmdf',  hmdtype='$hmdtype' where hmgid='$hmgid'");
		$sql2 = mysql_query("insert into haemo(bill_no, haresult) values('$bno','$haresult')");

	
	}if($tname == "RFT"){
		$rftrbs = mysql_real_escape_string($_REQUEST['rftrbs']);
		$rftbu = mysql_real_escape_string($_REQUEST['rftbu']);
		$rftscr = mysql_real_escape_string($_REQUEST['rftscr']);
		$rftsua = mysql_real_escape_string($_REQUEST['rftsua']);
		$rftsc = mysql_real_escape_string($_REQUEST['rftsc']);
		$rftsodium = mysql_real_escape_string($_REQUEST['rftsodium']);
		$rftpotash = mysql_real_escape_string($_REQUEST['rftpotash']);
		$rftchloride = mysql_real_escape_string($_REQUEST['rftchloride']);
		
                
                $rbsid1=mysql_real_escape_string($_REQUEST['rbsid1']);
                $rbsvalue1=mysql_real_escape_string($_REQUEST['rbsvalue1']);
                $rbstype1=mysql_real_escape_string($_REQUEST['rbstype1']);
                mysql_query("update set rbsrange rbsvalue='$rbsvalue1',rbstype='$rbstype1' where rbsid='$rbsid1'");
                
                
                $buid1 = mysql_real_escape_string($_REQUEST['buid1']);
                $buvalue1= mysql_real_escape_string($_REQUEST['buvalue1']);
                $butype1= mysql_real_escape_string($_REQUEST['butype1']);
                mysql_query("update bunormals set buvalue='$buvalue1', butype='$butype1' where buid='$buid1'");
                
                
                
                $cid1 = mysql_real_escape_string($_REQUEST['cid1']);
                $cvalue2 = mysql_real_escape_string($_REQUEST['cvalue2']);
                $ctype1 = mysql_real_escape_string($_REQUEST['ctype1']);
                mysql_query("update creatinormals set cvalue='$cvalue2',ctype='$ctype1' where cid='$cid1'");
                
                
                $suaid1=$_REQUEST['suaid1'];
                $suam1=$_REQUEST['suam1'];
                $sumv1=$_REQUEST['sumv1'];
                $suf1=$_REQUEST['suf1'];
                $sufv1=$_REQUEST['sufv1'];
		mysql_query("update serumuricacidnormals set sum='$suam1', sumv='$sumv1', suf='$suf1', sufv='$sufv1' suaid='$suaid1'");
                
                
                $scid1 = mysql_real_escape_string($_REQUEST['scid1']);
                $scvalue1 = mysql_real_escape_string($_REQUEST['scvalue1']);
                $sctype1 = mysql_real_escape_string($_REQUEST['sctype1']);
                mysql_query("update scnormal set scvalue='$scvalue1', sctype='$sctype1' where scid='$scid1'");
                
                $seid1 = mysql_real_escape_string($_REQUEST['seid1']);
                $svalue1 = mysql_real_escape_string($_REQUEST['svalue1']);
                $pvalue1= mysql_real_escape_string($_REQUEST['pvalue1']);
                $cvalue1 = mysql_real_escape_string($_REQUEST['cvalue1']);
                $stype1 = mysql_real_escape_string($_REQUEST['stype1']);
                
                mysql_query("update sele set svalue='$svalue1', pvalue='$pvalue1',cvalue='$cvalue1',  stype='$stype1' where seid='$seid1'");
                
                
		$sql2 = mysql_query("insert into rft(bill_no, rft_rbs,rft_bu,rft_scr,rft_sua,rft_sc,rft_sodium,rft_potash,rft_chloride) values('$bno','$rftrbs','$rftbu','$rftscr','$rftsua','$rftsc','$rftsodium','$rftpotash','$rftchloride')");

	
	}if($tname == "Reducing Substance"){
		$rsub = mysql_real_escape_string($_REQUEST['rsub']);
		
		$sql2 = mysql_query("insert into rsub(bill_no, rsub) values('$bno','$rsub')");

	
	}if($tname == "SERUM BILIRUBIN"){
		$tbil = mysql_real_escape_string($_REQUEST['tbil']);
		$dbil = mysql_real_escape_string($_REQUEST['dbil']);
		$ibil = mysql_real_escape_string($_REQUEST['ibil']);
		
                $sbid = mysql_real_escape_string($_REQUEST['sbid']);
                $tbif = mysql_real_escape_string($_REQUEST['tbif']);
                $sbtype = mysql_real_escape_string($_REQUEST['sbtype']);
                $tbad = mysql_real_escape_string($_REQUEST['tbad']);
                $dbif = mysql_real_escape_string($_REQUEST['dbif']);
                $dbad = mysql_real_escape_string($_REQUEST['dbad']);
                
                
                mysql_query("update sbillnormal set tbif='$tbif', tbad='$tbad', dbif='$dbif', dbad='$dbad', sbtype='$sbtype' where sbid='$sbid'");
		$sql2 = mysql_query("insert into sbil(bill_no, tbil,dbil,ibil) values('$bno','$tbil','$dbil','$ibil')");

	
	}if($tname == "BLOOD GROUP"){
		$bgroup = mysql_real_escape_string($_REQUEST['bgroup']);
		$rht = mysql_real_escape_string($_REQUEST['rht']);
		
		$sql2 = mysql_query("insert into bgroup(bill_no, bgrp,rhtype) values('$bno','$bgroup','$rht')");

	
	}if($tname == "BLOOD SUGAR(FBS,PLBS)"){
		$fbs = mysql_real_escape_string($_REQUEST['fbs']);
		$fus = mysql_real_escape_string($_REQUEST['fus']);
		$plbs = mysql_real_escape_string($_REQUEST['plbs']);
		$plus = mysql_real_escape_string($_REQUEST['plus']);
		
                $bsid = mysql_real_escape_string($_REQUEST['bsid']);
                $fbsvalue = mysql_real_escape_string($_REQUEST['fbsvalue']);
                $type1 = mysql_real_escape_string($_REQUEST['type']);
                $plbsvalue = mysql_real_escape_string($_REQUEST['plbsvalue']);
                $plus = mysql_real_escape_string($_REQUEST['plus']);
                mysql_query("update bsugarnormals  set fbsvalue='$fbsvalue', plbsvalue='$plbsvalue',type='$type1' where bsid='$bsid'");
		$sql2 = mysql_query("insert into bsugar(bill_no, fbs,fus,plbs,plus) values('$bno','$fbs','$fus','$plbs','$plus')");

	
	}if($tname == "HIV 1 AND 2"){
		$hiv = mysql_real_escape_string($_REQUEST['hiv']);
		 
		$sql2 = mysql_query("insert into hiv(bill_no, hiv) values('$bno','$hiv')");
	}if($tname == "HCV"){
		$hcv = mysql_real_escape_string($_REQUEST['hcv']);
		 
		$sql2 = mysql_query("insert into hcv(bill_no, hcv) values('$bno','$hcv')");
	}if($tname == "VDRL"){
		$vdrl = mysql_real_escape_string($_REQUEST['vdrl']);
		 
		$sql2 = mysql_query("insert into vdrl(bill_no, vdrl) values('$bno','$vdrl')");
	}if($tname == "LIPID PROFILE"){
		$sch = mysql_real_escape_string($_REQUEST['sch']);
		$hch = mysql_real_escape_string($_REQUEST['hch']);
		$lch = mysql_real_escape_string($_REQUEST['lch']);
		$vch = mysql_real_escape_string($_REQUEST['vch']);
		$stri = mysql_real_escape_string($_REQUEST['stri']);
		$tch = mysql_real_escape_string($_REQUEST['tch']);
		 
                $lpdid = mysql_real_escape_string($_REQUEST['lpdid']);
                $lpsn = mysql_real_escape_string($_REQUEST['lpsn']);
                $lpsb = mysql_real_escape_string($_REQUEST['lpsb']);
                $lpse = mysql_real_escape_string($_REQUEST['lpse']);
                $lpst = mysql_real_escape_string($_REQUEST['lpst']);
                $lphv = mysql_real_escape_string($_REQUEST['lphv']);
                $lpht = mysql_real_escape_string($_REQUEST['lpht']);
                $lpl1 = mysql_real_escape_string($_REQUEST['lpl1']);
                $lpl2 = mysql_real_escape_string($_REQUEST['lpl2']);
                $lplt = mysql_real_escape_string($_REQUEST['lplt']);
                $lpvv = mysql_real_escape_string($_REQUEST['lpvv']);
                $lpvt = mysql_real_escape_string($_REQUEST['lpvt']);
                $lpstn = mysql_real_escape_string($_REQUEST['lpstn']);
                $lpstb = mysql_real_escape_string($_REQUEST['lpstb']);
                $lpsth = mysql_real_escape_string($_REQUEST['lpsth']);
                $lpstt = mysql_real_escape_string($_REQUEST['lpstt']);
                $lplthn = mysql_real_escape_string($_REQUEST['lplthn']);
                $lplthb = mysql_real_escape_string($_REQUEST['lplthb']);
                $lpltht = mysql_real_escape_string($_REQUEST['lpltht']);
                
                
                
                mysql_query("update lipidnormal set lpsn='$lpsn', lpsb='$lpsb', lpse='$lpse', lpst='$lpst', lphv='$lphv', lpht='$lpht', lpl1='$lpl1', lpl2='$lpl2', lplt='$lplt', lpvv='$lpvv', lpvt='$lpvt', lpstn='$lpstn', lpstb='$lpstb', lpsth='$lpsth', lpstt='$lpstt', lplthn='$lplthn', lplthb='$lplthb', lpltht='$lpltht' where lpdid='$lpdid'");
                
                              
                
                
		$sql2 = mysql_query("insert into lprofile(bill_no, sch,hch,lch,vch,stri,tch) values('$bno','$sch','$hch','$lch','$vch','$stri','$tch')");
	}if($tname == "SPUTUM FOR AFB"){
		$safb = mysql_real_escape_string($_REQUEST['safb']);
		 
		$sql2 = mysql_query("insert into safb(bill_no, safb) values('$bno','$safb')");
	}if($tname == "PLATELET COUNT"){
		$pcount = mysql_real_escape_string($_REQUEST['pcount']);
		 
                $plid = mysql_real_escape_string($_REQUEST['plid']);
                $plvalue = mysql_real_escape_string($_REQUEST['plvalue']);
                $pltype = mysql_real_escape_string($_REQUEST['pltype']);
                
                mysql_query("update plaeletnormals set plvalue='$plvalue',pltype='$pltype' where plid='$plid'");
		$sql2 = mysql_query("insert into pcount(bill_no, pcount) values('$bno','$pcount')");
	}if($tname == "SERUM CHOLESTEROL"){
		$schole = mysql_real_escape_string($_REQUEST['schole']);
                
                
                
                        $schid= mysql_real_escape_string($_REQUEST['schid']);
                        $schnormal= mysql_real_escape_string($_REQUEST['schnormal']);
                        $schtype= mysql_real_escape_string($_REQUEST['schtype']);
                        $schborderline= mysql_real_escape_string($_REQUEST['schborderline']);
                        $schevelated= mysql_real_escape_string($_REQUEST['schevelated']);
                        
                        mysql_query("update schnormals set  schnormal='$schnormal', schborderline='$schborderline', schevelated='$schevelated',schtype='$schtype' where schid='$schid' ");
		 
		$sql2 = mysql_query("insert into schole(bill_no, schole) values('$bno','$schole')");
	}if($tname == "SERUM TRYGLYCERIDES"){
		$strig = mysql_real_escape_string($_REQUEST['strig']);
                
                $stid = mysql_real_escape_string($_REQUEST['stid']);
                $stn = mysql_real_escape_string($_REQUEST['stn']);
                $stb = mysql_real_escape_string($_REQUEST['stb']);
                $sth = mysql_real_escape_string($_REQUEST['sth']);
                $stt = mysql_real_escape_string($_REQUEST['stt']);
                
                
                mysql_query("update strignormals set stn='$stn',stb='$stb',sth='$sth',stt='$stt' where stid='$stid'");
		$sql2 = mysql_query("insert into strig(bill_no, strig) values('$bno','$strig')");
	}if($tname == "ALKALINE PHOSPHATE"){
		$aphos = mysql_real_escape_string($_REQUEST['APHOSPHATE']);
		 
                $apid = mysql_real_escape_string($_REQUEST['apid']);
                $apv = mysql_real_escape_string($_REQUEST['apv']);
				
				$apv1 = mysql_real_escape_string($_REQUEST['apv1']);
				$apv2 = mysql_real_escape_string($_REQUEST['apv2']);
				$apv3 = mysql_real_escape_string($_REQUEST['apv3']);
				$apv4 = mysql_real_escape_string($_REQUEST['apv4']);
				
                $apt = mysql_real_escape_string($_REQUEST['apt']);
                mysql_query("update  aphosnormals set apv='$apv',apv1='$apv1',apv2='$apv2',apv3='$apv3',apv4='$apv4',apt='$apt' where apid='$apid'");
		$sql2 = mysql_query("insert into aphos(bill_no, aphos) values('$bno','$aphos')");
	}if($tname == "TOTAL PROTIENS"){
		$tprt = mysql_real_escape_string($_REQUEST['TPROTIENS']);
                
                $tpid = mysql_real_escape_string($_REQUEST['tpid']);
                $tpva = mysql_real_escape_string($_REQUEST['tpva']);
                $tpty = mysql_real_escape_string($_REQUEST['tpty']);
                mysql_query("update tprtnormal set tpva='$tpva',tpty='$tpty' where tpid='$tpid'");
		$sql2 = mysql_query("insert into tprt(bill_no, tprt) values('$bno','$tprt')");
	}if($tname == "SERUM POTASSIUM"){
		$spotash = mysql_real_escape_string($_REQUEST['spotash']);
		 
                $spid = mysql_real_escape_string($_REQUEST['spid']);
                $spvalue = mysql_real_escape_string($_REQUEST['spvalue']);
                $sptype = mysql_real_escape_string($_REQUEST['sptype']);
                mysql_query("update spnormals set spvalue='$spvalue',sptype='$sptype'  where spid='$spid'");
		$sql2 = mysql_query("insert into spotash(bill_no, spotash) values('$bno','$spotash')");
	}if($tname == "Smear for Microfilaria"){
		$smicro = mysql_real_escape_string($_REQUEST['smicro']);
		 
		$sql2 = mysql_query("insert into smicro(bill_no, smicro) values('$bno','$smicro')");
	}if($tname == "WBC Count"){
		$wbccount = mysql_real_escape_string($_REQUEST['wbccount']);
		 $wbcid=mysql_real_escape_string($_REQUEST['wbcid']);
                 $wbcvalue=mysql_real_escape_string($_REQUEST['wbcvalue']);
                 $wbctype=mysql_real_escape_string($_REQUEST['wbctype']);
                 mysql_query("update wbccountrange set wbcvalue='$wbcvalue', wbctype='$wbctype' where wbcid='$wbcid'");
		$sql2 = mysql_query("insert into wbccount(bill_no, wbccount) values('$bno','$wbccount')");
	}if($tname == "Peripheral Smear"){
		$psrbc = mysql_real_escape_string($_REQUEST['psrbc']);
		$pswbc = mysql_real_escape_string($_REQUEST['pswbc']);
		$psplatelets = mysql_real_escape_string($_REQUEST['psplatelets']);
		 
		$sql2 = mysql_query("insert into peri(bill_no, psrbc,pswbc,psplatelets) values('$bno','$psrbc','$pswbc','$psplatelets')");
	}if($tname == "FBS"){
		$fbss = mysql_real_escape_string($_REQUEST['fbss']);
		$fuss = mysql_real_escape_string($_REQUEST['fuss']);
		  
                $fbsid = mysql_real_escape_string($_REQUEST['fbsid']);
                $fbsvalue = mysql_real_escape_string($_REQUEST['fbsvalue']);
                $fbstype= mysql_real_escape_string($_REQUEST['fbstype']);
                mysql_query("update fbsnormal set fbsvalue='$fbsvalue', fbstype='$fbstype' where fbsid='$fbsid'");
		$sql2 = mysql_query("insert into fbs(bill_no, fbss,fuss) values('$bno','$fbss','$fuss')");
	}if($tname == "PLBS"){
		$plbss = mysql_real_escape_string($_REQUEST['plbss']);
		$pluss = mysql_real_escape_string($_REQUEST['pluss']);
		$plbsid= mysql_real_escape_string($_REQUEST['plbsid']);
                $plbsvalue= mysql_real_escape_string($_REQUEST['plbsvalue']);
                $plbstype= mysql_real_escape_string($_REQUEST['plbstype']);
                
                mysql_query("update plbsnormals set plbsvalue='$plbsvalue',plbstype='$plbstype' where plbsid='$plbsid'");
                
		$sql2 = mysql_query("insert into plbs(bill_no, plbss,pluss) values('$bno','$plbss','$pluss')");
	}if($tname == "ASO TITRE"){
		$asot = mysql_real_escape_string($_REQUEST['asot']);
		
		$aid = mysql_real_escape_string($_REQUEST['aid']);
		$avalue = mysql_real_escape_string($_REQUEST['avalue']);
		$atype = mysql_real_escape_string($_REQUEST['atype']);
		
		mysql_query("update asonormals set avalue='$avalue',atype='$atype' where aid='$aid'");
		$sql2 = mysql_query("insert into aso(bill_no, aso) values('$bno','$asot')");
	}if($tname == "RA FACTOR"){
		$raf = mysql_real_escape_string($_REQUEST['raf']);
		
		$rfid = mysql_real_escape_string($_REQUEST['rfid']);
		$rfvalue = mysql_real_escape_string($_REQUEST['rfvalue']);
		$rftype = mysql_real_escape_string($_REQUEST['rftype']);
		  mysql_query("update rafnormals set rfvalue='$rfvalue',rftype='$rftype' where rfid='$rfid'");
		$sql2 = mysql_query("insert into raf(bill_no, raf) values('$bno','$raf')");
	}if($tname == "HBA1C"){
		$hba = mysql_real_escape_string($_REQUEST['hba']);
		$hbaid=mysql_real_escape_string($_REQUEST['hbaid']);
                $hbavalue=mysql_real_escape_string($_REQUEST['hbavalue']);
                $hbatype=mysql_real_escape_string($_REQUEST['hbatype']);
				 $hbavalue1=mysql_real_escape_string($_REQUEST['hbavalue1']);
				  $hbavalue2=mysql_real_escape_string($_REQUEST['hbavalue2']);
				   $hbavalue3=mysql_real_escape_string($_REQUEST['hbavalue3']);
				
				
                mysql_query("update hbanormal set hbavalue='$hbavalue',hbavalue1='$hbavalue1',hbavalue2='$hbavalue2',hbavalue3='$hbavalue3', hbatype='$hbatype' where hbaid='$hbaid'");
		$sql2 = mysql_query("insert into hba(bill_no, hba) values('$bno','$hba')");
	}if($tname == "COOMBS TEST(DIRECT)"){
		$ctd = mysql_real_escape_string($_REQUEST['ctd']);
		
		$sql2 = mysql_query("insert into ctd(bill_no, ctd) values('$bno','$ctd')");
	}if($tname == "COOMBS TEST(INDIRECT)"){
		$ctid = mysql_real_escape_string($_REQUEST['ctid']);
		
		$sql2 = mysql_query("insert into ctid(bill_no, ctid) values('$bno','$ctid')");
	}if($tname == "DENGUE SEROLOGY"){
		$dsrigg = mysql_real_escape_string($_REQUEST['dsrigg']);
		$dsrigm = mysql_real_escape_string($_REQUEST['dsrigm']);
		$dsrns1 = mysql_real_escape_string($_REQUEST['dsrns1']);
		
                $dsid= mysql_real_escape_string($_REQUEST['dsid']);
                $iggvalue= mysql_real_escape_string($_REQUEST['iggvalue']);
                $igmvalue= mysql_real_escape_string($_REQUEST['igmvalue']);
				 $ns1value= mysql_real_escape_string($_REQUEST['ns1value']);
                
                mysql_query("update dsrnormal set iggvalue='$iggvalue', igmvalue='$igmvalue',ns1value='$ns1value' where dsid='$dsid'");
		$sql2 = mysql_query("insert into dsr(bill_no, dsrigg,dsrigm,dsrns1) values('$bno','$dsrigg','$dsrigm','$dsrns1')");
	}if($tname == "PACKED CELL VOLUME(PCV)"){
		$pcv = mysql_real_escape_string($_REQUEST['pcv']);
		$pcvid=mysql_real_escape_string($_REQUEST['pcvid']);
                $pcvm=mysql_real_escape_string($_REQUEST['pcvm']);
                $pcvf=mysql_real_escape_string($_REQUEST['pcvf']);
                $pcvtype=mysql_real_escape_string($_REQUEST['pcvtype']);
                mysql_query("update pcvnormals set pcvm='$pcvm', pcvf='$pcvf',pcvtype='$pcvtype' where pcvid='$pcvid'");
		$sql2 = mysql_query("insert into pcv(bill_no, pcv) values('$bno','$pcv')");
	}
	if($tname == "BLEEDING TIME AND CLOTTING TIME"){
		$bt = mysql_real_escape_string($_REQUEST['bt']);
		$ct = mysql_real_escape_string($_REQUEST['ct']);
		
		$bdlid= mysql_real_escape_string($_REQUEST['bdlid']);
                $btv= mysql_real_escape_string($_REQUEST['btv']);
                $ctv= mysql_real_escape_string($_REQUEST['ctv']);
                mysql_query("update bleedingnormal set btv='$btv',ctv='$ctv' where bdlid='$bdlid'");
		$sql2 = mysql_query("insert into btct(bill_no, btime, ctime) values('$bno','$bt','$ct')");

	
	}
	if($tname == "RETI COUNT"){
		$Reticulocyte = mysql_real_escape_string($_REQUEST['Reticulocyte']);
		$rtid = mysql_real_escape_string($_REQUEST['rtid']);
		
		$rtvalue= mysql_real_escape_string($_REQUEST['rtvalue']);
                $rttype= mysql_real_escape_string($_REQUEST['rttype']);
                $note= mysql_real_escape_string($_REQUEST['note']);
                
				mysql_query("update retinormals set rtvalue='$rtvalue',rttype='$rttype',note='$note' where rtid='$rtid'");
		$sql2 = mysql_query("insert into reticount(bill_no, rtvalue) values('$bno','$Reticulocyte')");

	
	}
	if($tname == "SGOT"){
		$sgot = mysql_real_escape_string($_REQUEST['sgot']);
		$lfid = mysql_real_escape_string($_REQUEST['lfid']);
		
		$sgotv= mysql_real_escape_string($_REQUEST['sgotv']);
                $sgtt= mysql_real_escape_string($_REQUEST['sgtt']);
                
                
				mysql_query("update livernormal set sgotv='$sgotv',sgtt='$sgtt' where lfid='$rtid'");
		$sql2 = mysql_query("insert into sgot(bill_no, sgotva) values('$bno','$sgot')");

	
	}
	if($tname == "SGPT"){
		$sgpt = mysql_real_escape_string($_REQUEST['sgpt']);
		$lfid = mysql_real_escape_string($_REQUEST['lfid']);
		
		$sgptv= mysql_real_escape_string($_REQUEST['sgptv']);
                $sgtt= mysql_real_escape_string($_REQUEST['sgtt']);
                
                
				mysql_query("update livernormal set sgptv='$sgptv',sgtt='$sgtt' where lfid='$rtid'");
		$sql2 = mysql_query("insert into sgpt(bill_no, sgptva) values('$bno','$sgpt')");

	
	}
	
	if($tname == "LFT(SGOT SGPT)"){
		$sgpt = mysql_real_escape_string($_REQUEST['sgpt']);
		$sgot = mysql_real_escape_string($_REQUEST['sgot']);
		$lfid = mysql_real_escape_string($_REQUEST['lfid']);
		
		$sgptv= mysql_real_escape_string($_REQUEST['sgptv']);
		$sgotv= mysql_real_escape_string($_REQUEST['sgotv']);
                $sgtt= mysql_real_escape_string($_REQUEST['sgtt']);
                
                
				mysql_query("update livernormal set sgotv='$sgotv', sgptv='$sgptv',sgtt='$sgtt' where lfid='$rtid'");
		$sql2 = mysql_query("insert into sgopt(bill_no,sgotva,sgptva) values('$bno','$sgot','$sgpt')");

	
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
                
			//	mysql_query("update livernormal set sgotv='$sgotv', sgptv='$sgptv',sgtt='$sgtt' where lfid='$rtid'");
		$sql2 = mysql_query("insert into fluidexam(color,volume,appearence,glouse,protein,totalcount,polymarphs,lymphos,mesoth,bill_no) values('$COLOUR','$Volume','$APPEARANCE','$glucose','$protein','$totalcount','$Polymorphs','$Lymphocytes','$Mesothelial','$bno')");

	
	}
	
	if($tname == "COAGGULATION(PT APTT)"){
		$pttest = mysql_real_escape_string($_REQUEST['pttest']);
		$ptcontrol = mysql_real_escape_string($_REQUEST['ptcontrol']);
		$ptinr = mysql_real_escape_string($_REQUEST['ptinr']);
		
		
		$aptttest = mysql_real_escape_string($_REQUEST['aptttest']);
		$apttcontrol = mysql_real_escape_string($_REQUEST['apttcontrol']);
		
		$sql2 = mysql_query("insert into cptaptt(bill_no, ptt,ptc,pti,apt,aptc) values('$bno','$pttest','$ptcontrol','$ptinr','$aptttest','$apttcontrol')");

	
	}
	
	if($tname == "24 Hrs URINE PROTIEN"){
		$tvolume = mysql_real_escape_string($_REQUEST['tvolume']);
		$tprotine = mysql_real_escape_string($_REQUEST['tprotine']);
		$uid = mysql_real_escape_string($_REQUEST['uid']);
		
		
		$urrange = mysql_real_escape_string($_REQUEST['urrange']);
		$utype = mysql_real_escape_string($_REQUEST['utype']);
		mysql_query("update set urinenormal uid='$uid',uvalue='$urrange',utype='$utype' where uid='1'");
		$sql2 = mysql_query("insert into urineprotinue(bill_no, tv,tp) values('$bno','$tvolume','$tprotine')");

	
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
		$sql2 = mysql_query("insert into bone(done,site,Cellularity,Ratio,Erythropoiesis,Myelopoiesis,Megakaryocytes,Lymphocytes,Plasma,Others,impression,bill_no) values('$done','$site','$Cellularity','$Ratio','$Erythropoiesis','$Myelopoiesis','$Megakaryocytes','$Lymphocytes','$Plasma','$Others','$impression','$bno')");

	
	}
	if($tname == "Gram Stain"){
		$gram = mysql_real_escape_string($_REQUEST['gram']);
		$Specimen = mysql_real_escape_string($_REQUEST['Specimen']);
		
		$sql2 = mysql_query("insert into gramstain(bill_no,gs,stime) values('$bno','$gram','$Specimen')");

	
	}
	if($tname == "FNAC"){
		$done = mysql_real_escape_string($_REQUEST['done']);
		$site = mysql_real_escape_string($_REQUEST['site']); 
		$microscope = mysql_real_escape_string($_REQUEST['microscope']);
		$impression = mysql_real_escape_string($_REQUEST['impression']);
		$sql2 = mysql_query("insert into fnac(bill_no,test,site,microscope,impress) values('$bno','$done','$site','$microscope','$impression')");

	
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
				
				$sql2 = mysql_query("insert into tft(bill_no,crp,raf,aso) values('$bno','$CRPRESULT','$raf','$asot')");

		
	}
	
	if($tname == "BIO(CBP ESR)"){
		
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
		$cbpid=$_REQUEST['cbpid'];
                $hm=$_REQUEST['hm'];
                $hf=$_REQUEST['hf'];
                $rbcm=$_REQUEST['rbcm'];
                $rbcf=$_REQUEST['rbcf'];
                $webcount=$_REQUEST['webcount'];
                $plateletcount=$_REQUEST['plateletcount'];
                $na=$_REQUEST['na'];
                $nc=$_REQUEST['nc'];
                $la=$_REQUEST['la'];
                $lc=$_REQUEST['lc'];
                $ma=$_REQUEST['ma'];
                $mc=$_REQUEST['mc'];
                $ea=$_REQUEST['ea'];
                $ec=$_REQUEST['ec'];
                $baa=$_REQUEST['baa'];
                $bac=$_REQUEST['bac'];
                $hnormal=$_REQUEST['hnormal'];
                        $rbcnormal=$_REQUEST['rbcnormal'];
                        $webcountnormal=$_REQUEST['webcountnormal'];
                        $plateletnormal=$_REQUEST['plateletnormal'];
                $s="update cbpnormal set hm='$hm',hf='$hf',rbcm='$rbcm',rbcf='$rbcf',webcount='$webcount',plateletcount='$plateletcount',na='$na',nc='$nc',la='$la',lc='$lc',ma='$ma',mc='$mc',ea='$ea',ec='$ec',baa='$baa',bac='$bac', rbcnormal='$rbcnormal',webcountnormal='$webcountnormal',
 plateletnormal='$plateletnormal', hnormal='$hnormal' where id='$cbpid'";
                mysql_query($s) or die(mysql_error());
				$esrresult = mysql_real_escape_string($_REQUEST['esrresult']);
		$esrid=mysql_real_escape_string($_REQUEST['esrid']);
                $esrvalue=mysql_real_escape_string($_REQUEST['esrvalue']);
               $esrtype=mysql_real_escape_string($_REQUEST['esrtype']);
               mysql_query("update esrresult set esrvalue='$esrvalue', esrtype='$esrtype' where esrid='$esrid'");
			   
			   
			   
			   
			   $sql2=mysql_query("insert into cbpesr(bill_no, HAEMOGLOBIN, RBC, WBC_Count, PLATELET_COUNT, NEUTROPHILS,LYMPHOCYTES,MONOCYTES,EOSINOPHILS,BASOPHILS,RBC1,WBC1,Platelets,esr_result) values('$bno','$HAEMOGLOBIN','$RBC','$WBC','$PLATELET','$NEUTROPHILS','$LYMPHOCYTES','$MONOCYTES','$EOSINOPHILS','$BASOPHILS','$RBC1','$WBC1','$Platelets','$esrresult')");
		
	}
	
	if($tname == "BIO(Urea Creatinine)"){
		
	$burea = mysql_real_escape_string($_REQUEST['burea']);
		$buid = mysql_real_escape_string($_REQUEST['buid']);
                $buvalue= mysql_real_escape_string($_REQUEST['buvalue']);
                $butype= mysql_real_escape_string($_REQUEST['butype']);
                mysql_query("update bunormals set buvalue='$buvalue', butype='$butype' where buid='$buid'");
				
              $creati = mysql_real_escape_string($_REQUEST['creati']);
		$cid = mysql_real_escape_string($_REQUEST['cid']);
                $cvalue = mysql_real_escape_string($_REQUEST['cvalue']);
                $ctype = mysql_real_escape_string($_REQUEST['ctype']);
                mysql_query("update creatinormals set cvalue='$cvalue',ctype='$ctype' where cid='$cid'");
			   $sql2=mysql_query("insert into ureacreati(bill_no, burea, creati) values('$bno','$burea','$creati')");
		
	}
	
	
	
	
	
	
	}
	if($sql2){
	//header("Location:sample1.php?bno=$bno&test=$tname");	
	//header("Location:count.php?bno=$bno&test=$tname");
       
	print "<script>";
	print "alert('successfully save data');";
	print "self.location='add_result_entry.php?bno=$bno';";
	print "</script>";
//	
}
}
else{
	print "<script>";
	print "alert('unable to save data');";
	print "self.location='madd_result_entry.php';";
	print "</script>";
	}

}	

?>