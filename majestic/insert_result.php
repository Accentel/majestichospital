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

$sql1 = mysqli_query($link,"insert into reportentry(BillNo, Date, Pname, Age, Sex, DoctorName,Ptest,user) values('$bno','$bdate','$pname','$age','$gender','$dname','$tname','$name')");
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
		$PACKEDCELL= $_REQUEST['PACKEDCELL'];
		$mcv= $_REQUEST['mcv'];
		$mch= $_REQUEST['mch'];
		$mchc= $_REQUEST['mchc'];
		$periperl= $_REQUEST['periperl'];
		
		$cbpid=$_REQUEST['cbpid'];
		        $hm=$_REQUEST['hm'];
                $hf=$_REQUEST['hf'];
				$hc=$_REQUEST['hc'];
                $rbcm=$_REQUEST['rbcm'];
                $rbcf=$_REQUEST['rbcf'];
                $webcount=$_REQUEST['webcount'];
                $platecount=$_REQUEST['platecount'];
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
						$platenormal=$_REQUEST['platenormal'];
						$mcvv=$_REQUEST['mcvv'];
						$mchv=$_REQUEST['mchv'];
						$mchcv=$_REQUEST['mchcv'];
						$packedm=$_REQUEST['packedm'];
						$packedf=$_REQUEST['packedf'];
                $s="update cbpnormal set hc='$hc', hm='$hm',hf='$hf',rbcm='$rbcm',rbcf='$rbcf',webcount='$webcount',plateletcount='$plateletcount',na='$na',nc='$nc',la='$la',lc='$lc',ma='$ma',mc='$mc',ea='$ea',ec='$ec',baa='$baa',bac='$bac', rbcnormal='$rbcnormal',webcountnormal='$webcountnormal',
 plateletnormal='$plateletnormal', hnormal='$hnormal',packedm='$packedm',packedf='$packedf',mcvv='$mcvv',mchv='$mchv',mchcv='$mchcv',platecount='$platecount' where id='$cbpid'";
                mysqli_query($link,$s) or die(mysqli_error($link));
		$sql2 = mysqli_query($link,"insert into cbp(bill_no, HAEMOGLOBIN, RBC, WBC_Count, PLATELET_COUNT, NEUTROPHILS,LYMPHOCYTES,MONOCYTES,EOSINOPHILS,BASOPHILS,RBC1,WBC1,Platelets,PACKEDCELL,mcv,mch,mchc,periperl) values('$bno','$HAEMOGLOBIN','$RBC','$WBC','$PLATELET','$NEUTROPHILS','$LYMPHOCYTES','$MONOCYTES','$EOSINOPHILS','$BASOPHILS','$RBC1','$WBC1','$Platelets','$PACKEDCELL','$mcv','$mch','$mchc','$periperl')");

	
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
		$sql2 = mysqli_query($link,$k) or die(mysqli_error($link));

	
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
		
		$sql2 = mysqli_query($link,"insert into cue(bill_no, COLOUR, APPEARANCE, REACTION, SPECIFIC_GRAVITY, SUGAR,ALBUMIN,BILE_SALTS,BILE_PIGMENTS,UROBILINOGEN,KETONES,RBC,PUSCELLS,EPITHELIAL_CELL,CASTS,CRYSTALS,OTHERS) values('$bno','$CUECOLOUR','$CUEAPPEARANCE','$CUEREACTION','$CUESPECIFICGRAVITY','$CUESUGAR','$CUEALBUMIN','$CUEBILESALTS','$CUEBILEPIGMENTS','$CUEUROBILINOGEN','$CUEKETONES','$CUERBC','$CUEPUSCELLS','$CUEEPITHELIAL','$CUECASTS','$CUECRYSTALS','$CUEOTHERS')");

	
	}
	if($tname == "MANTOUX TEST"){
		$MANTOUXGIVENON = date('Y-m-d',strtotime($_REQUEST['MANTOUXGIVENON']));
		$MANTOUXREPORTNON = date('Y-m-d',strtotime($_REQUEST['MANTOUXREPORTNON']));
		$MANTOUXRESULT = addslashes($_REQUEST['MANTOUXRESULT']);
		
		
		$sql2 = mysqli_query($link,"insert into mantoux(bill_no, given_on, report_on, result) values('$bno','$MANTOUXGIVENON','$MANTOUXREPORTNON','$MANTOUXRESULT')");

	
	}
	if($tname == "C - Reactive Protein (CRP)"){
		$CRPRESULT = $_REQUEST['CRPRESULT'];
		$valuea=$_REQUEST['res'];
                $type=$_REQUEST['type'];
                $crpid=$_REQUEST['crpid'];
                mysqli_query($link,"update crprange set value='$valuea',type='$type' where crpid='$crpid'");
		$sql2 = mysqli_query($link,"insert into crp(bill_no, crp_result) values('$bno','$CRPRESULT')");

	
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
                
                mysqli_query($link,"update livernormal set ltbv='$ltbv',ldbv='$ldbv',ldbt='$ldbt', sgotv='$sgotv', sgptv='$sgptv', sgtt='$sgtt', slv1='$slv1', slv2='$slv2',slv3='$slv3', slv4='$slv4',slv5='$slv5', slvt='$slvt',tpv='$tpv', sav='$sav', tpt='$tpt' where lfid='$lfid'");
                
		$sql2 = mysqli_query($link,"insert into lft(bill_no, TOTAL_BILIRUBIN,DIRECT_BILIRUBIN,INDIRECT_BILIRUBIN,SGOT,SGPT,S_ALKALINE_PHOSPHATE,TOTAL_PROTIENS,SERUM_ALBUMIN,SERUM_GLOBULIN,AG_Ratio) values('$bno','$LFTTBILIRUBIN','$LFTDBILIRUBIN','$LFTIBILIRUBIN','$LFTSGOT','$LFTSGPT','$LFTSAPHOSPHATE','$LFTTPROTIENS','$LFTSALBUMIN','$LFTSGLOBULIN','$LFTAGRATIO')");

	
	}if($tname == "Parasite F and V"){
		$RMTRESULT = addslashes($_REQUEST['RMTRESULT']);
		$RMTRESULT1 = addslashes($_REQUEST['RMTRESULT1']);
		
		$sql2 = mysqli_query($link,"insert into rmt(bill_no, rmt_result,rmt_result1) values('$bno','$RMTRESULT','$RMTRESULT1')");

	
	}if($tname == "Smear for Malarial Parasite"){
		$SMPRESULT = addslashes($_REQUEST['SMPRESULT']);
		
		$sql2 = mysqli_query($link,"insert into smp(bill_no, smp_result) values('$bno','$SMPRESULT')");

	
	}if($tname == "SERUM AMYLASE"){
		$SAMYLASE = addslashes($_REQUEST['SAMYLASE']);
		$said=addslashes($_REQUEST['said']);
                $savalue=addslashes($_REQUEST['savalue']);
                $satype=addslashes($_REQUEST['satype']);
                mysqli_query($link,"updaet serumamynirmal set savalue='$savalue',  satype='$satype' where said='$said'");
                
		$sql2 = mysqli_query($link,"insert into amylase(bill_no, amylase_result) values('$bno','$SAMYLASE')");

	
	}if($tname == "Absolute Eosinophil Count (AEC)"){
		$aecresult = addslashes($_REQUEST['aecresult']);
		
		$sql2 = mysqli_query($link,"insert into aec(bill_no, aec_result) values('$bno','$aecresult')");

	
	}if($tname == "Erythrocyte Sedimentation Rate (ESR)"){
		$esrresult = addslashes($_REQUEST['esrresult']);
		$esrid=addslashes($_REQUEST['esrid']);
                $esrvalue=addslashes($_REQUEST['esrvalue']);
               $esrtype=addslashes($_REQUEST['esrtype']);
               mysqli_query($link,"update esrresult set esrvalue='$esrvalue', esrtype='$esrtype' where esrid='$esrid'");
		$sql2 = mysqli_query($link,"insert into esr(bill_no, esr_result) values('$bno','$esrresult')");

	
	}if($tname == "Serum Electrolytes"){
		$sodium = addslashes($_REQUEST['sodium']);
		$potash = addslashes($_REQUEST['potash']);
		$chloride = addslashes($_REQUEST['chloride']);
		
                $seid = addslashes($_REQUEST['seid']);
                $svalue = addslashes($_REQUEST['svalue']);
                $pvalue= addslashes($_REQUEST['pvalue']);
                $cvalue = addslashes($_REQUEST['cvalue']);
                $stype = addslashes($_REQUEST['stype']);
                
                mysqli_query($link,"update sele set svalue='$svalue', pvalue='$pvalue',cvalue='$cvalue',  stype='$stype' where seid='$seid'");
                
		$sql2 = mysqli_query($link,"insert into ele(bill_no, sodium,potash,chloride) values('$bno','$sodium','$potash','$chloride')");

	
	}if($tname == "Random Blood Sugar (RBS)"){
		$rbs = addslashes($_REQUEST['rbs']);
		$rus = addslashes($_REQUEST['rus']);
		
                $rbsid=addslashes($_REQUEST['rbsid']);
                $rbsvalue=addslashes($_REQUEST['rbsvalue']);
                $rbstype=addslashes($_REQUEST['rbstype']);
                mysqli_query($link,"update set rbsrange rbsvalue='$rbsvalue',rbstype='$rbstype' where rbsid='$rbsid'");
		$sql2 = mysqli_query($link,"insert into rbs(bill_no, rbs_result,rus) values('$bno','$rbs','$rus')");

	
	}if($tname == "Blood Urea"){
		$burea = addslashes($_REQUEST['burea']);
		$buid = addslashes($_REQUEST['buid']);
                $buvalue= addslashes($_REQUEST['buvalue']);
                $butype= addslashes($_REQUEST['butype']);
                mysqli_query($link,"update bunormals set buvalue='$buvalue', butype='$butype' where buid='$buid'");
		$sql2 = mysqli_query($link,"insert into burea(bill_no, burea_result) values('$bno','$burea')");

	
	}if($tname == "Serum Creatinine"){
		$creati = addslashes($_REQUEST['creati']);
		$cid = addslashes($_REQUEST['cid']);
                $cvalue = addslashes($_REQUEST['cvalue']);
                $ctype = addslashes($_REQUEST['ctype']);
                mysqli_query($link,"update creatinormals set cvalue='$cvalue',ctype='$ctype' where cid='$cid'");
		$sql2 = mysqli_query($link,"insert into creati(bill_no, serum_result) values('$bno','$creati')");

	
	}if($tname == "SERUM CALCIUM"){
		$calres = addslashes($_REQUEST['cal_result']);
                
		$scid = addslashes($_REQUEST['scid']);
                $scvalue = addslashes($_REQUEST['scvalue']);
                $sctype = addslashes($_REQUEST['sctype']);
                mysqli_query($link,"update scnormal set scvalue='$scvalue', sctype='$sctype' where scid='$scid'");
		$sql2 = mysqli_query($link,"insert into calcium(bill_no, cal_result) values('$bno','$calres')");

	
	}if($tname == "Prothrombin Time (PT)"){
		$pttest = addslashes($_REQUEST['pttest']);
		$ptcontrol = addslashes($_REQUEST['ptcontrol']);
		$ptinr = addslashes($_REQUEST['ptinr']);
		
		$sql2 = mysqli_query($link,"insert into pt(bill_no, pt_time,pt_control,pt_inr) values('$bno','$pttest','$ptcontrol','$ptinr')");

	
	}if($tname == "Activated Partial Thromboplastin Time (APTT)"){
		$aptttest = addslashes($_REQUEST['aptttest']);
		$apttcontrol = addslashes($_REQUEST['apttcontrol']);
		
		$sql2 = mysqli_query($link,"insert into aptt(bill_no, aptt_time,aptt_control) values('$bno','$aptttest','$apttcontrol')");

	
	}if($tname == "Serum Uric Acid"){
		$suaresult = addslashes($_REQUEST['sua_result']);
                
                $suaid=$_REQUEST['suaid'];
                $suam=$_REQUEST['suam'];
                $sumv=$_REQUEST['sumv'];
                $suf=$_REQUEST['suf'];
                $sufv=$_REQUEST['sufv'];
		mysqli_query($link,"update serumuricacidnormals set sum='$suam', sumv='$sumv', suf='$suf', sufv='$sufv' suaid='$suaid'");
		$sql2 = mysqli_query($link,"insert into sua(bill_no, sua_result) values('$bno','$suaresult')");

	
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
		$BLOOD = $_REQUEST['BLOOD'];
		$STARCH = $_REQUEST['STARCH'];
		
		$sql2 = mysqli_query($link,"insert into cse(bill_no, COLOUR, CONSIST, REACTION, MUCUS, OCCULT_BLOOD,REDUCING_SUBSTANCE,RBC,PUSCELLS,EPITHELIAL,OVAS,CYSTS,OTHERS,BLOOD,STARCH) values('$bno','$CSECOLOUR','$CSECONSISTENCY','$CSEREACTION','$CSEMUCUS','$CSEOCCULT','$CSESUBSTANCE','$CSERBC','$CSEPUSCELLS','$CSEEPITHELIAL','$CSEOVAS','$CSECYSTS','$CSEOTHERS','$BLOOD','$STARCH')");

	
	}if($tname == "HBsAg"){
		$hresult = addslashes($_REQUEST['hresult']);
		
		$sql2 = mysqli_query($link,"insert into hbsag(bill_no, hresult) values('$bno','$hresult')");

	
	}if($tname == "WIDAL"){
		$sto = addslashes($_REQUEST['sto']);
		$sth = addslashes($_REQUEST['sth']);
		$spah = addslashes($_REQUEST['spah']);
		$spbh = addslashes($_REQUEST['spbh']);
		
		$sql2 = mysqli_query($link,"insert into widal(bill_no, sto,sth,spah,spbh) values('$bno','$sto','$sth','$spah','$spbh')");

	
	}if($tname == "HAEMOGLOBIN"){
		$haresult = addslashes($_REQUEST['haresult']);
		$hmgid= addslashes($_REQUEST['hmgid']);
                $hmdm= addslashes($_REQUEST['hmdm']);   
                            $hmdtype= addslashes($_REQUEST['hmdtype']);
                        $hmdf= addslashes($_REQUEST['hmdf']);
                        mysqli_query($link,"update hemgnormals set hmdm='$hmdm',  hmdf='$hmdf',  hmdtype='$hmdtype' where hmgid='$hmgid'");
		$sql2 = mysqli_query($link,"insert into haemo(bill_no, haresult) values('$bno','$haresult')");

	
	}if($tname == "RFT"){
		$rftrbs = addslashes($_REQUEST['rftrbs']);
		$rftbu = addslashes($_REQUEST['rftbu']);
		$rftscr = addslashes($_REQUEST['rftscr']);
		$rftsua = addslashes($_REQUEST['rftsua']);
		$rftsc = addslashes($_REQUEST['rftsc']);
		$rftsodium = addslashes($_REQUEST['rftsodium']);
		$rftpotash = addslashes($_REQUEST['rftpotash']);
		$rftchloride = addslashes($_REQUEST['rftchloride']);
		
                
                $rbsid1=addslashes($_REQUEST['rbsid1']);
                $rbsvalue1=addslashes($_REQUEST['rbsvalue1']);
                $rbstype1=addslashes($_REQUEST['rbstype1']);
                mysqli_query($link,"update set rbsrange rbsvalue='$rbsvalue1',rbstype='$rbstype1' where rbsid='$rbsid1'");
                
                
                $buid1 = addslashes($_REQUEST['buid1']);
                $buvalue1= addslashes($_REQUEST['buvalue1']);
                $butype1= addslashes($_REQUEST['butype1']);
                mysqli_query($link,"update bunormals set buvalue='$buvalue1', butype='$butype1' where buid='$buid1'");
                
                
                
                $cid1 = addslashes($_REQUEST['cid1']);
                $cvalue2 = addslashes($_REQUEST['cvalue2']);
                $ctype1 = addslashes($_REQUEST['ctype1']);
                mysqli_query($link,"update creatinormals set cvalue='$cvalue2',ctype='$ctype1' where cid='$cid1'");
                
                
                $suaid1=$_REQUEST['suaid1'];
                $suam1=$_REQUEST['suam1'];
                $sumv1=$_REQUEST['sumv1'];
                $suf1=$_REQUEST['suf1'];
                $sufv1=$_REQUEST['sufv1'];
		mysqli_query($link,"update serumuricacidnormals set sum='$suam1', sumv='$sumv1', suf='$suf1', sufv='$sufv1' suaid='$suaid1'");
                
                
                $scid1 = addslashes($_REQUEST['scid1']);
                $scvalue1 = addslashes($_REQUEST['scvalue1']);
                $sctype1 = addslashes($_REQUEST['sctype1']);
                mysqli_query($link,"update scnormal set scvalue='$scvalue1', sctype='$sctype1' where scid='$scid1'");
                
                $seid1 = addslashes($_REQUEST['seid1']);
                $svalue1 = addslashes($_REQUEST['svalue1']);
                $pvalue1= addslashes($_REQUEST['pvalue1']);
                $cvalue1 = addslashes($_REQUEST['cvalue1']);
                $stype1 = addslashes($_REQUEST['stype1']);
                
                mysqli_query($link,"update sele set svalue='$svalue1', pvalue='$pvalue1',cvalue='$cvalue1',  stype='$stype1' where seid='$seid1'");
                
                
		$sql2 = mysqli_query($link,"insert into rft(bill_no, rft_rbs,rft_bu,rft_scr,rft_sua,rft_sc,rft_sodium,rft_potash,rft_chloride) values('$bno','$rftrbs','$rftbu','$rftscr','$rftsua','$rftsc','$rftsodium','$rftpotash','$rftchloride')");

	
	}if($tname == "Reducing Substance"){
		$rsub = addslashes($_REQUEST['rsub']);
		
		$sql2 = mysqli_query($link,"insert into rsub(bill_no, rsub) values('$bno','$rsub')");

	
	}if($tname == "SERUM BILIRUBIN"){
		$tbil = addslashes($_REQUEST['tbil']);
		$dbil = addslashes($_REQUEST['dbil']);
		$ibil = addslashes($_REQUEST['ibil']);
		
                $sbid = addslashes($_REQUEST['sbid']);
                $tbif = addslashes($_REQUEST['tbif']);
                $sbtype = addslashes($_REQUEST['sbtype']);
                $tbad = addslashes($_REQUEST['tbad']);
                $dbif = addslashes($_REQUEST['dbif']);
                $dbad = addslashes($_REQUEST['dbad']);
                
                
                mysqli_query($link,"update sbillnormal set tbif='$tbif', tbad='$tbad', dbif='$dbif', dbad='$dbad', sbtype='$sbtype' where sbid='$sbid'");
		$sql2 = mysqli_query($link,"insert into sbil(bill_no, tbil,dbil,ibil) values('$bno','$tbil','$dbil','$ibil')");

	
	}if($tname == "BLOOD GROUP"){
		$bgroup = addslashes($_REQUEST['bgroup']);
		$rht = addslashes($_REQUEST['rht']);
		
		$sql2 = mysqli_query($link,"insert into bgroup(bill_no, bgrp,rhtype) values('$bno','$bgroup','$rht')");

	
	}if($tname == "BLOOD SUGAR(FBS,PLBS)"){
		$fbs = addslashes($_REQUEST['fbs']);
		$fus = addslashes($_REQUEST['fus']);
		$plbs = addslashes($_REQUEST['plbs']);
		$plus = addslashes($_REQUEST['plus']);
		
                $bsid = addslashes($_REQUEST['bsid']);
                $fbsvalue = addslashes($_REQUEST['fbsvalue']);
                $type1 = addslashes($_REQUEST['type']);
                $plbsvalue = addslashes($_REQUEST['plbsvalue']);
                $plus = addslashes($_REQUEST['plus']);
                mysqli_query($link,"update bsugarnormals  set fbsvalue='$fbsvalue', plbsvalue='$plbsvalue',type='$type1' where bsid='$bsid'");
		$sql2 = mysqli_query($link,"insert into bsugar(bill_no, fbs,fus,plbs,plus) values('$bno','$fbs','$fus','$plbs','$plus')");

	
	}if($tname == "HIV 1 AND 2"){
		$hiv = addslashes($_REQUEST['hiv']);
		 
		$sql2 = mysqli_query($link,"insert into hiv(bill_no, hiv) values('$bno','$hiv')");
	}if($tname == "HCV"){
		$hcv = addslashes($_REQUEST['hcv']);
		 
		$sql2 = mysqli_query($link,"insert into hcv(bill_no, hcv) values('$bno','$hcv')");
	}if($tname == "VDRL"){
		$vdrl = addslashes($_REQUEST['vdrl']);
		 
		$sql2 = mysqli_query($link,"insert into vdrl(bill_no, vdrl) values('$bno','$vdrl')");
	}if($tname == "LIPID PROFILE"){
		$sch = addslashes($_REQUEST['sch']);
		$hch = addslashes($_REQUEST['hch']);
		$lch = addslashes($_REQUEST['lch']);
		$vch = addslashes($_REQUEST['vch']);
		$stri = addslashes($_REQUEST['stri']);
		$tch = addslashes($_REQUEST['tch']);
		 
                $lpdid = addslashes($_REQUEST['lpdid']);
                $lpsn = addslashes($_REQUEST['lpsn']);
                $lpsb = addslashes($_REQUEST['lpsb']);
                $lpse = addslashes($_REQUEST['lpse']);
                $lpst = addslashes($_REQUEST['lpst']);
                $lphv = addslashes($_REQUEST['lphv']);
                $lpht = addslashes($_REQUEST['lpht']);
                $lpl1 = addslashes($_REQUEST['lpl1']);
                $lpl2 = addslashes($_REQUEST['lpl2']);
                $lplt = addslashes($_REQUEST['lplt']);
                $lpvv = addslashes($_REQUEST['lpvv']);
                $lpvt = addslashes($_REQUEST['lpvt']);
                $lpstn = addslashes($_REQUEST['lpstn']);
                $lpstb = addslashes($_REQUEST['lpstb']);
                $lpsth = addslashes($_REQUEST['lpsth']);
                $lpstt = addslashes($_REQUEST['lpstt']);
                $lplthn = addslashes($_REQUEST['lplthn']);
                $lplthb = addslashes($_REQUEST['lplthb']);
                $lpltht = addslashes($_REQUEST['lpltht']);
                
                
                
                mysqli_query($link,"update lipidnormal set lpsn='$lpsn', lpsb='$lpsb', lpse='$lpse', lpst='$lpst', lphv='$lphv', lpht='$lpht', lpl1='$lpl1', lpl2='$lpl2', lplt='$lplt', lpvv='$lpvv', lpvt='$lpvt', lpstn='$lpstn', lpstb='$lpstb', lpsth='$lpsth', lpstt='$lpstt', lplthn='$lplthn', lplthb='$lplthb', lpltht='$lpltht' where lpdid='$lpdid'");
                
                              
                
                
		$sql2 = mysqli_query($link,"insert into lprofile(bill_no, sch,hch,lch,vch,stri,tch) values('$bno','$sch','$hch','$lch','$vch','$stri','$tch')");
	}if($tname == "SPUTUM FOR AFB"){
		$safb = addslashes($_REQUEST['safb']);
		 
		$sql2 = mysqli_query($link,"insert into safb(bill_no, safb) values('$bno','$safb')");
	}if($tname == "PLATELET COUNT"){
		$pcount = addslashes($_REQUEST['pcount']);
		 
                $plid = addslashes($_REQUEST['plid']);
                $plvalue = addslashes($_REQUEST['plvalue']);
                $pltype = addslashes($_REQUEST['pltype']);
                
                mysqli_query($link,"update plaeletnormals set plvalue='$plvalue',pltype='$pltype' where plid='$plid'");
		$sql2 = mysqli_query($link,"insert into pcount(bill_no, pcount) values('$bno','$pcount')");
	}if($tname == "SERUM CHOLESTEROL"){
		$schole = addslashes($_REQUEST['schole']);
                
                
                
                        $schid= addslashes($_REQUEST['schid']);
                        $schnormal= addslashes($_REQUEST['schnormal']);
                        $schtype= addslashes($_REQUEST['schtype']);
                        $schborderline= addslashes($_REQUEST['schborderline']);
                        $schevelated= addslashes($_REQUEST['schevelated']);
                        
                        mysqli_query($link,"update schnormals set  schnormal='$schnormal', schborderline='$schborderline', schevelated='$schevelated',schtype='$schtype' where schid='$schid' ");
		 
		$sql2 = mysqli_query($link,"insert into schole(bill_no, schole) values('$bno','$schole')");
	}if($tname == "SERUM TRYGLYCERIDES"){
		$strig = addslashes($_REQUEST['strig']);
                
                $stid = addslashes($_REQUEST['stid']);
                $stn = addslashes($_REQUEST['stn']);
                $stb = addslashes($_REQUEST['stb']);
                $sth = addslashes($_REQUEST['sth']);
                $stt = addslashes($_REQUEST['stt']);
                
                
                mysqli_query($link,"update strignormals set stn='$stn',stb='$stb',sth='$sth',stt='$stt' where stid='$stid'");
		$sql2 = mysqli_query($link,"insert into strig(bill_no, strig) values('$bno','$strig')");
	}if($tname == "ALKALINE PHOSPHATE"){
		$aphos = addslashes($_REQUEST['APHOSPHATE']);
		 
                $apid = addslashes($_REQUEST['apid']);
                $apv = addslashes($_REQUEST['apv']);
				
				$apv1 = addslashes($_REQUEST['apv1']);
				$apv2 = addslashes($_REQUEST['apv2']);
				$apv3 = addslashes($_REQUEST['apv3']);
				$apv4 = addslashes($_REQUEST['apv4']);
				
                $apt = addslashes($_REQUEST['apt']);
                mysqli_query($link,"update  aphosnormals set apv='$apv',apv1='$apv1',apv2='$apv2',apv3='$apv3',apv4='$apv4',apt='$apt' where apid='$apid'");
		$sql2 = mysqli_query($link,"insert into aphos(bill_no, aphos) values('$bno','$aphos')");
	}if($tname == "TOTAL PROTIENS"){
		$tprt = addslashes($_REQUEST['TPROTIENS']);
                
                $tpid = addslashes($_REQUEST['tpid']);
                $tpva = addslashes($_REQUEST['tpva']);
                $tpty = addslashes($_REQUEST['tpty']);
                mysqli_query($link,"update tprtnormal set tpva='$tpva',tpty='$tpty' where tpid='$tpid'");
		$sql2 = mysqli_query($link,"insert into tprt(bill_no, tprt) values('$bno','$tprt')");
	}if($tname == "SERUM POTASSIUM"){
		$spotash = addslashes($_REQUEST['spotash']);
		 
                $spid = addslashes($_REQUEST['spid']);
                $spvalue = addslashes($_REQUEST['spvalue']);
                $sptype = addslashes($_REQUEST['sptype']);
                mysqli_query($link,"update spnormals set spvalue='$spvalue',sptype='$sptype'  where spid='$spid'");
		$sql2 = mysqli_query($link,"insert into spotash(bill_no, spotash) values('$bno','$spotash')");
	}if($tname == "Smear for Microfilaria"){
		$smicro = addslashes($_REQUEST['smicro']);
		 
		$sql2 = mysqli_query($link,"insert into smicro(bill_no, smicro) values('$bno','$smicro')");
	}if($tname == "WBC Count"){
		$wbccount = addslashes($_REQUEST['wbccount']);
		 $wbcid=addslashes($_REQUEST['wbcid']);
                 $wbcvalue=addslashes($_REQUEST['wbcvalue']);
                 $wbctype=addslashes($_REQUEST['wbctype']);
                 mysqli_query($link,"update wbccountrange set wbcvalue='$wbcvalue', wbctype='$wbctype' where wbcid='$wbcid'");
		$sql2 = mysqli_query($link,"insert into wbccount(bill_no, wbccount) values('$bno','$wbccount')");
	}if($tname == "Peripheral Smear"){
		$psrbc = addslashes($_REQUEST['psrbc']);
		$pswbc = addslashes($_REQUEST['pswbc']);
		$psplatelets = addslashes($_REQUEST['psplatelets']);
		 
		$sql2 = mysqli_query($link,"insert into peri(bill_no, psrbc,pswbc,psplatelets) values('$bno','$psrbc','$pswbc','$psplatelets')");
	}if($tname == "FBS"){
		$fbss = addslashes($_REQUEST['fbss']);
		$fuss = addslashes($_REQUEST['fuss']);
		  
                $fbsid = addslashes($_REQUEST['fbsid']);
                $fbsvalue = addslashes($_REQUEST['fbsvalue']);
                $fbstype= addslashes($_REQUEST['fbstype']);
                mysqli_query($link,"update fbsnormal set fbsvalue='$fbsvalue', fbstype='$fbstype' where fbsid='$fbsid'");
		$sql2 = mysqli_query($link,"insert into fbs(bill_no, fbss,fuss) values('$bno','$fbss','$fuss')");
	}if($tname == "PLBS"){
		$plbss = addslashes($_REQUEST['plbss']);
		$pluss = addslashes($_REQUEST['pluss']);
		$plbsid= addslashes($_REQUEST['plbsid']);
                $plbsvalue= addslashes($_REQUEST['plbsvalue']);
                $plbstype= addslashes($_REQUEST['plbstype']);
                
                mysqli_query($link,"update plbsnormals set plbsvalue='$plbsvalue',plbstype='$plbstype' where plbsid='$plbsid'");
                
		$sql2 = mysqli_query($link,"insert into plbs(bill_no, plbss,pluss) values('$bno','$plbss','$pluss')");
	}if($tname == "ASO TITRE"){
		$asot = addslashes($_REQUEST['asot']);
		
		$aid = addslashes($_REQUEST['aid']);
		$avalue = addslashes($_REQUEST['avalue']);
		$atype = addslashes($_REQUEST['atype']);
		
		mysqli_query($link,"update asonormals set avalue='$avalue',atype='$atype' where aid='$aid'");
		$sql2 = mysqli_query($link,"insert into aso(bill_no, aso) values('$bno','$asot')");
	}if($tname == "RA FACTOR"){
		$raf = addslashes($_REQUEST['raf']);
		
		$rfid = addslashes($_REQUEST['rfid']);
		$rfvalue = addslashes($_REQUEST['rfvalue']);
		$rftype = addslashes($_REQUEST['rftype']);
		  mysqli_query($link,"update rafnormals set rfvalue='$rfvalue',rftype='$rftype' where rfid='$rfid'");
		$sql2 = mysqli_query($link,"insert into raf(bill_no, raf) values('$bno','$raf')");
	}if($tname == "HBA1C"){
		$hba = addslashes($_REQUEST['hba']);
		$hbaid=addslashes($_REQUEST['hbaid']);
                $hbavalue=addslashes($_REQUEST['hbavalue']);
                $hbatype=addslashes($_REQUEST['hbatype']);
				 $hbavalue1=addslashes($_REQUEST['hbavalue1']);
				  $hbavalue2=addslashes($_REQUEST['hbavalue2']);
				   $hbavalue3=addslashes($_REQUEST['hbavalue3']);
				
				
                mysqli_query($link,"update hbanormal set hbavalue='$hbavalue',hbavalue1='$hbavalue1',hbavalue2='$hbavalue2',hbavalue3='$hbavalue3', hbatype='$hbatype' where hbaid='$hbaid'");
		$sql2 = mysqli_query($link,"insert into hba(bill_no, hba) values('$bno','$hba')");
	}if($tname == "COOMBS TEST(DIRECT)"){
		$ctd = addslashes($_REQUEST['ctd']);
		
		$sql2 = mysqli_query($link,"insert into ctd(bill_no, ctd) values('$bno','$ctd')");
	}if($tname == "COOMBS TEST(INDIRECT)"){
		$ctid = addslashes($_REQUEST['ctid']);
		
		$sql2 = mysqli_query($link,"insert into ctid(bill_no, ctid) values('$bno','$ctid')");
	}if($tname == "DENGUE SEROLOGY"){
		$dsrigg = addslashes($_REQUEST['dsrigg']);
		$dsrigm = addslashes($_REQUEST['dsrigm']);
		$dsrns1 = addslashes($_REQUEST['dsrns1']);
		
                $dsid= addslashes($_REQUEST['dsid']);
                $iggvalue= addslashes($_REQUEST['iggvalue']);
                $igmvalue= addslashes($_REQUEST['igmvalue']);
				 $ns1value= addslashes($_REQUEST['ns1value']);
                
                mysqli_query($link,"update dsrnormal set iggvalue='$iggvalue', igmvalue='$igmvalue',ns1value='$ns1value' where dsid='$dsid'");
		$sql2 = mysqli_query($link,"insert into dsr(bill_no, dsrigg,dsrigm,dsrns1) values('$bno','$dsrigg','$dsrigm','$dsrns1')");
	}if($tname == "PACKED CELL VOLUME(PCV)"){
		$pcv = addslashes($_REQUEST['pcv']);
		$pcvid=addslashes($_REQUEST['pcvid']);
                $pcvm=addslashes($_REQUEST['pcvm']);
                $pcvf=addslashes($_REQUEST['pcvf']);
                $pcvtype=addslashes($_REQUEST['pcvtype']);
                mysqli_query($link,"update pcvnormals set pcvm='$pcvm', pcvf='$pcvf',pcvtype='$pcvtype' where pcvid='$pcvid'");
		$sql2 = mysqli_query($link,"insert into pcv(bill_no, pcv) values('$bno','$pcv')");
	}
	if($tname == "BLEEDING TIME AND CLOTTING TIME"){
		$bt = addslashes($_REQUEST['bt']);
		$ct = addslashes($_REQUEST['ct']);
		
		$bdlid= addslashes($_REQUEST['bdlid']);
                $btv= addslashes($_REQUEST['btv']);
                $ctv= addslashes($_REQUEST['ctv']);
                mysqli_query($link,"update bleedingnormal set btv='$btv',ctv='$ctv' where bdlid='$bdlid'");
		$sql2 = mysqli_query($link,"insert into btct(bill_no, btime, ctime) values('$bno','$bt','$ct')");

	
	}
	if($tname == "RETI COUNT"){
		$Reticulocyte = addslashes($_REQUEST['Reticulocyte']);
		$rtid = addslashes($_REQUEST['rtid']);
		
		$rtvalue= addslashes($_REQUEST['rtvalue']);
                $rttype= addslashes($_REQUEST['rttype']);
                $note= addslashes($_REQUEST['note']);
                
				mysqli_query($link,"update retinormals set rtvalue='$rtvalue',rttype='$rttype',note='$note' where rtid='$rtid'");
		$sql2 = mysqli_query($link,"insert into reticount(bill_no, rtvalue) values('$bno','$Reticulocyte')");

	
	}
	if($tname == "SGOT"){
		$sgot = addslashes($_REQUEST['sgot']);
		$lfid = addslashes($_REQUEST['lfid']);
		
		$sgotv= addslashes($_REQUEST['sgotv']);
                $sgtt= addslashes($_REQUEST['sgtt']);
                
                
				mysqli_query($link,"update livernormal set sgotv='$sgotv',sgtt='$sgtt' where lfid='$rtid'");
		$sql2 = mysqli_query($link,"insert into sgot(bill_no, sgotva) values('$bno','$sgot')");

	
	}
	if($tname == "SGPT"){
		$sgpt = addslashes($_REQUEST['sgpt']);
		$lfid = addslashes($_REQUEST['lfid']);
		
		$sgptv= addslashes($_REQUEST['sgptv']);
                $sgtt= addslashes($_REQUEST['sgtt']);
                
                
				mysqli_query($link,"update livernormal set sgptv='$sgptv',sgtt='$sgtt' where lfid='$rtid'");
		$sql2 = mysqli_query($link,"insert into sgpt(bill_no, sgptva) values('$bno','$sgpt')");

	
	}
	
	if($tname == "LFT(SGOT SGPT)"){
		$sgpt = addslashes($_REQUEST['sgpt']);
		$sgot = addslashes($_REQUEST['sgot']);
		$lfid = addslashes($_REQUEST['lfid']);
		
		$sgptv= addslashes($_REQUEST['sgptv']);
		$sgotv= addslashes($_REQUEST['sgotv']);
                $sgtt= addslashes($_REQUEST['sgtt']);
                
                
				mysqli_query($link,"update livernormal set sgotv='$sgotv', sgptv='$sgptv',sgtt='$sgtt' where lfid='$rtid'");
		$sql2 = mysqli_query($link,"insert into sgopt(bill_no,sgotva,sgptva) values('$bno','$sgot','$sgpt')");

	
	}
	
	if($tname == "FLUID EXAMINATION-ROUTINE(PLEURAL FLUID)"){
		$COLOUR = addslashes($_REQUEST['COLOUR']);
		$Volume = addslashes($_REQUEST['Volume']);
		$APPEARANCE = addslashes($_REQUEST['APPEARANCE']);
		
		$glucose= addslashes($_REQUEST['glucose']);
		$protein= addslashes($_REQUEST['protein']);
                $totalcount= addslashes($_REQUEST['totalcount']);
                
                $Polymorphs= addslashes($_REQUEST['Polymorphs']);
		$Lymphocytes= addslashes($_REQUEST['Lymphocytes']);
                $Mesothelial= addslashes($_REQUEST['Mesothelial']);
                
			//	mysqli_query($link,"update livernormal set sgotv='$sgotv', sgptv='$sgptv',sgtt='$sgtt' where lfid='$rtid'");
		$sql2 = mysqli_query($link,"insert into fluidexam(color,volume,appearence,glouse,protein,totalcount,polymarphs,lymphos,mesoth,bill_no) values('$COLOUR','$Volume','$APPEARANCE','$glucose','$protein','$totalcount','$Polymorphs','$Lymphocytes','$Mesothelial','$bno')");

	
	}
	
	if($tname == "COAGGULATION(PT APTT)"){
		$pttest = addslashes($_REQUEST['pttest']);
		$ptcontrol = addslashes($_REQUEST['ptcontrol']);
		$ptinr = addslashes($_REQUEST['ptinr']);
		
		
		$aptttest = addslashes($_REQUEST['aptttest']);
		$apttcontrol = addslashes($_REQUEST['apttcontrol']);
		
		$sql2 = mysqli_query($link,"insert into cptaptt(bill_no, ptt,ptc,pti,apt,aptc) values('$bno','$pttest','$ptcontrol','$ptinr','$aptttest','$apttcontrol')");

	
	}
	
	if($tname == "24 Hrs URINE PROTIEN"){
		$tvolume = addslashes($_REQUEST['tvolume']);
		$tprotine = addslashes($_REQUEST['tprotine']);
		$uid = addslashes($_REQUEST['uid']);
		
		
		$urrange = addslashes($_REQUEST['urrange']);
		$utype = addslashes($_REQUEST['utype']);
		mysqli_query($link,"update set urinenormal uid='$uid',uvalue='$urrange',utype='$utype' where uid='1'");
		$sql2 = mysqli_query($link,"insert into urineprotinue(bill_no, tv,tp) values('$bno','$tvolume','$tprotine')");

	
	}
	if($tname == "BONE MARROW"){
		$done = addslashes($_REQUEST['done']);
		$site = addslashes($_REQUEST['site']);
		$Cellularity = addslashes($_REQUEST['Cellularity']);
		
		
		$Ratio = addslashes($_REQUEST['Ratio']);
		$Erythropoiesis = addslashes($_REQUEST['Erythropoiesis']);
		
		$Myelopoiesis = addslashes($_REQUEST['Myelopoiesis']);
		$Megakaryocytes = addslashes($_REQUEST['Megakaryocytes']);
		$Lymphocytes = addslashes($_REQUEST['Lymphocytes']);
		$Plasma = addslashes($_REQUEST['Plasma']);
		$Others = addslashes($_REQUEST['Others']);
		$impression = addslashes($_REQUEST['impression']);
		$sql2 = mysqli_query($link,"insert into bone(done,site,Cellularity,Ratio,Erythropoiesis,Myelopoiesis,Megakaryocytes,Lymphocytes,Plasma,Others,impression,bill_no) values('$done','$site','$Cellularity','$Ratio','$Erythropoiesis','$Myelopoiesis','$Megakaryocytes','$Lymphocytes','$Plasma','$Others','$impression','$bno')");

	
	}
	if($tname == "Gram Stain"){
		$gram = addslashes($_REQUEST['gram']);
		$Specimen = addslashes($_REQUEST['Specimen']);
		
		$sql2 = mysqli_query($link,"insert into gramstain(bill_no,gs,stime) values('$bno','$gram','$Specimen')");

	
	}
	if($tname == "FNAC"){
		$done = addslashes($_REQUEST['done']);
		$site = addslashes($_REQUEST['site']); 
		$microscope = addslashes($_REQUEST['microscope']);
		$impression = addslashes($_REQUEST['impression']);
		$sql2 = mysqli_query($link,"insert into fnac(bill_no,test,site,microscope,impress) values('$bno','$done','$site','$microscope','$impression')");

	
	}
	
	if($tname == "SEROLOGY(ASO RAF CRP)"){
		
	$aid = addslashes($_REQUEST['aid']);
		$avalue = addslashes($_REQUEST['avalue']);
		$atype = addslashes($_REQUEST['atype']);
		
		mysqli_query($link,"update asonormals set avalue='$avalue',atype='$atype' where aid='$aid'");
		$rfid = addslashes($_REQUEST['rfid']);
		$rfvalue = addslashes($_REQUEST['rfvalue']);
		$rftype = addslashes($_REQUEST['rftype']);
		  mysqli_query($link,"update rafnormals set rfvalue='$rfvalue',rftype='$rftype' where rfid='$rfid'");
		  $valuea=$_REQUEST['res'];
                $type=$_REQUEST['type'];
                $crpid=$_REQUEST['crpid'];
                mysqli_query($link,"update crprange set value='$valuea',type='$type' where crpid='$crpid'");
				
				$CRPRESULT = addslashes($_REQUEST['CRPRESULT']);
				$raf = addslashes($_REQUEST['raf']);
				$asot = addslashes($_REQUEST['asot']);
				
				$sql2 = mysqli_query($link,"insert into tft(bill_no,crp,raf,aso) values('$bno','$CRPRESULT','$raf','$asot')");

		
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
                mysqli_query($link,$s) or die(mysqli_error($link));
				$esrresult = addslashes($_REQUEST['esrresult']);
		$esrid=addslashes($_REQUEST['esrid']);
                $esrvalue=addslashes($_REQUEST['esrvalue']);
               $esrtype=addslashes($_REQUEST['esrtype']);
               mysqli_query($link,"update esrresult set esrvalue='$esrvalue', esrtype='$esrtype' where esrid='$esrid'");
			   
			   
			   
			   
			   $sql2=mysqli_query($link,"insert into cbpesr(bill_no, HAEMOGLOBIN, RBC, WBC_Count, PLATELET_COUNT, NEUTROPHILS,LYMPHOCYTES,MONOCYTES,EOSINOPHILS,BASOPHILS,RBC1,WBC1,Platelets,esr_result) values('$bno','$HAEMOGLOBIN','$RBC','$WBC','$PLATELET','$NEUTROPHILS','$LYMPHOCYTES','$MONOCYTES','$EOSINOPHILS','$BASOPHILS','$RBC1','$WBC1','$Platelets','$esrresult')");
		
	}
	
	if($tname == "BIO(Urea Creatinine)"){
		
	$burea = addslashes($_REQUEST['burea']);
		$buid = addslashes($_REQUEST['buid']);
                $buvalue= addslashes($_REQUEST['buvalue']);
                $butype= addslashes($_REQUEST['butype']);
                mysqli_query($link,"update bunormals set buvalue='$buvalue', butype='$butype' where buid='$buid'");
				
              $creati = addslashes($_REQUEST['creati']);
		$cid = addslashes($_REQUEST['cid']);
                $cvalue = addslashes($_REQUEST['cvalue']);
                $ctype = addslashes($_REQUEST['ctype']);
                mysqli_query($link,"update creatinormals set cvalue='$cvalue',ctype='$ctype' where cid='$cid'");
			   $sql2=mysqli_query($link,"insert into ureacreati(bill_no, burea, creati) values('$bno','$burea','$creati')");
		
	}
	
	
	
	if($tname == "RMT"){
		
	 $plasmodiumvivax = addslashes($_REQUEST['plasmodiumvivax']);
		$plasmodiumlaciparam = addslashes($_REQUEST['plasmodiumlaciparam']);
		
		
           $sql2=mysqli_query($link,"insert into rmtest(bill_no, plasmodiumvivax, plasmodiumlaciparam) values('$bno','$plasmodiumvivax','$plasmodiumlaciparam')");     

			  
				
              $oantigen = addslashes($_REQUEST['oantigen']);
		$hantigen = addslashes($_REQUEST['hantigen']);
                $ahantigen = addslashes($_REQUEST['ahantigen']);
                $bhantigen = addslashes($_REQUEST['bhantigen']);
				
				$oantigen1 = addslashes($_REQUEST['oantigen1']);
		$hantigen1 = addslashes($_REQUEST['hantigen1']);
                $ahantigen1 = addslashes($_REQUEST['ahantigen1']);
                $bhantigen1 = addslashes($_REQUEST['bhantigen1']);
				
				
				
				
                mysqli_query($link,"update rmtwidalvalues set oantigen='$oantigen1',hantigen='$hantigen1',ahantigen='$ahantigen1',bhantigen='$bhantigen1' where cid='1'");
			   $sql2=mysqli_query($link,"insert into rmtwidal(bill_no, oantigen, hantigen,ahantigen,bhantigen) values('$bno','$oantigen','$hantigen','$ahantigen','$bhantigen')");
		
	}
	if($tname == "Pregnancy Test"){
		
	 $urineforpregnancy = addslashes($_REQUEST['urineforpregnancy']);
		
		
		
           $sql2=mysqli_query($link,"insert into pregnancy(bill_no, urineforpregnancy) values('$bno','$urineforpregnancy')");     

		     
	}
	
	
	if($tname == "Serum Lipase"){
		
	  $serumlipase = ($_REQUEST['serumlipase']);
		$serumlipase1 = addslashes($_REQUEST['serumlipase1']);
		
		mysqli_query($link,"update amylaselipasenormals set lipase='$serumlipase1'  where id='1'");  
           $sql2=mysqli_query($link,"insert into amylaselipase(bill_no, serumlipase) values('$bno','$serumlipase')");     

		     
	}
	
	
	if($tname == "OGCT"){
		
	  $glucose = ($_REQUEST['glucose']);
		$urinesugar = addslashes($_REQUEST['urinesugar']);
		
		//mysqli_query($link,"update amylaselipasenormals set lipase='$serumlipase1'  where id='1'");  
           $sql2=mysqli_query($link,"insert into ogct(bill_no, glucose,glucoseurine) values('$bno','$glucose','$urinesugar')");     

		     
	}
	if($tname == "GTT"){
		
		$glucosefasting = addslashes($_REQUEST['glucosefasting']);
		$glucosehalf = addslashes($_REQUEST['glucosehalf']);
		$glucoseohr = addslashes($_REQUEST['glucoseohr']);
		$glucoseohrh = addslashes($_REQUEST['glucoseohrh']);
		$glucoset = addslashes($_REQUEST['glucoset']);
		$gfurinesugar = addslashes($_REQUEST['gfurinesugar']);
		$gohurinesugar = addslashes($_REQUEST['gohurinesugar']);
		$gonehurinesugar = addslashes($_REQUEST['gonehurinesugar']);
		$gonehhurinesugar = addslashes($_REQUEST['gonehhurinesugar']);
		$gtwourinesugar = addslashes($_REQUEST['gtwourinesugar']);
		
		
		//mysqli_query($link,"update amylaselipasenormals set lipase='$serumlipase1'  where id='1'");  
           $sql2=mysqli_query($link,"insert into gtt(bill_no, glucosefasting,glucosehalf,glucoseohr,glucoseohrh,glucoset,gfurinesugar,gohurinesugar,gonehurinesugar,gonehhurinesugar,gtwourinesugar) values('$bno','$glucosefasting','$glucosehalf','$glucoseohr','$glucoseohrh','$glucoset','$gfurinesugar','$gohurinesugar','$gonehurinesugar','$gonehhurinesugar','$gtwourinesugar')");     

		     
	}
	
	
	
	if($tname == "Semen Analasis"){
		
		$periodabsence = addslashes($_REQUEST['periodabsence']);
		$colour = addslashes($_REQUEST['colour']);
		$reaction = addslashes($_REQUEST['reaction']);
		$volume = addslashes($_REQUEST['volume']);
		$lqtime = addslashes($_REQUEST['lqtime']);
		$spermcount = addslashes($_REQUEST['spermcount']);
		$activemotile = addslashes($_REQUEST['activemotile']);
		$suggishlymotile = addslashes($_REQUEST['suggishlymotile']);
		$nonmotile = addslashes($_REQUEST['nonmotile']);
		$normalform = addslashes($_REQUEST['normalform']);
		
		
		$abnormalform = addslashes($_REQUEST['abnormalform']);
		$puscells = addslashes($_REQUEST['puscells']);
		$rbc = addslashes($_REQUEST['rbc']);
		$others = addslashes($_REQUEST['others']);
		$impression = addslashes($_REQUEST['impression']);
		$epithelial = addslashes($_REQUEST['epithelial']);
		
		//mysqli_query($link,"update amylaselipasenormals set lipase='$serumlipase1'  where id='1'");  
           $sql2=mysqli_query($link,"insert into semenanalasis(bill_no, periodabsence,colour,reaction,volume,lqtime,spermcount,activemotile,suggishlymotile,nonmotile,normalform,abnormalform,puscells,epithelial,rbc,others,impression)values('$bno','$periodabsence','$colour','$reaction','$volume','$lqtime','$spermcount','$activemotile','$suggishlymotile','$nonmotile','$normalform','$abnormalform','$puscells','$epithelial','$rbc','$others','$impression')");     

		     
	}
	
	
	if($tname == "Urine Albumin"){
		
		$albuminurine = addslashes($_REQUEST['albuminurine']);
		$sql2=mysqli_query($link,"insert into UrineAlbumin(bill_no, albuminurine)values('$bno','$albuminurine')");     

		     
	}
	
	if($tname == "amylase lipase"){
		
		$serumamylase = addslashes($_REQUEST['serumamylase']);
		$serumamylase1 = addslashes($_REQUEST['serumamylase1']);
		$serumlipase = addslashes($_REQUEST['serumlipase']);
		$serumlipase1 = addslashes($_REQUEST['serumlipase1']);
		
		mysqli_query($link,"update lipasevalues set  serumamylase='$serumamylase1',serumlipase='$serumlipase1'  where bill_no='$bno'");
		$sql2=mysqli_query($link,"insert into lipase(bill_no, serumamylase,serumlipase)values('$bno','$serumamylase','$serumlipase')");     

		     
	}
	
	if($tname == "SERUM TSH"){
		
		$tsh = addslashes($_REQUEST['tsh']);
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
		mysqli_query($link,$y);
		$sql2=mysqli_query($link,"insert into tsh(bill_no, tsh)values('$bno','$tsh')");     

		     
	}
	
	if($tname == "Serology ( HIV, HBs Ag and VDRL )"){
		
		$bg = addslashes($_REQUEST['bg']);
		$rhd=$_REQUEST['rhd'];
		$hiv=$_REQUEST['hiv'];
		$hbsag=$_REQUEST['hbsag'];
		$vdrl=$_REQUEST['vdrl'];
		$sql2=mysqli_query($link,"insert into serology(bill_no,bg, rhd,hiv,hbsag,vdrl)values('$bno','$bg','$rhd','$hiv','$hbsag','$vdrl')");     

		     
	}
	
	
	if($tname == "ANP"){
		//cbp
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
		
		$cbpid=$_REQUEST['cbpid'];
		        $hm=$_REQUEST['hm'];
                $hf=$_REQUEST['hf'];
				$hc=$_REQUEST['hc'];
                $rbcm=$_REQUEST['rbcm'];
                $rbcf=$_REQUEST['rbcf'];
                $webcount=$_REQUEST['webcount'];
                $platecount=$_REQUEST['platecount'];
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
						$platenormal=$_REQUEST['platenormal'];
						$mcvv=$_REQUEST['mcvv'];
						$mchv=$_REQUEST['mchv'];
						$mchcv=$_REQUEST['mchcv'];
						$packedm=$_REQUEST['packedm'];
						$packedf=$_REQUEST['packedf'];
                $s="update cbpnormal set hc='$hc', hm='$hm',hf='$hf',rbcm='$rbcm',rbcf='$rbcf',webcount='$webcount',plateletcount='$plateletcount',na='$na',nc='$nc',la='$la',lc='$lc',ma='$ma',mc='$mc',ea='$ea',ec='$ec',baa='$baa',bac='$bac', rbcnormal='$rbcnormal',webcountnormal='$webcountnormal',
 plateletnormal='$plateletnormal', hnormal='$hnormal',packedm='$packedm',packedf='$packedf',mcvv='$mcvv',mchv='$mchv',mchcv='$mchcv',platecount='$platecount' where id='$cbpid'";
                mysqli_query($link,$s) or die(mysqli_error($link));
		$sql2 = mysqli_query($link,"insert into cbp(bill_no, HAEMOGLOBIN, RBC, WBC_Count, PLATELET_COUNT, NEUTROPHILS,LYMPHOCYTES,MONOCYTES,EOSINOPHILS,BASOPHILS,RBC1,WBC1,Platelets,PACKEDCELL,mcv,mch,mchc,periperl) values('$bno','$HAEMOGLOBIN','$RBC','$WBC','$PLATELET','$NEUTROPHILS','$LYMPHOCYTES','$MONOCYTES','$EOSINOPHILS','$BASOPHILS','$RBC1','$WBC1','$Platelets','$PACKEDCELL','$mcv','$mch','$mchc','$periperl')");

		
		//cue
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
		
		$sql2 = mysqli_query($link,"insert into cue(bill_no, COLOUR, APPEARANCE, REACTION, SPECIFIC_GRAVITY, SUGAR,ALBUMIN,BILE_SALTS,BILE_PIGMENTS,UROBILINOGEN,KETONES,RBC,PUSCELLS,EPITHELIAL_CELL,CASTS,CRYSTALS,OTHERS) values('$bno','$CUECOLOUR','$CUEAPPEARANCE','$CUEREACTION','$CUESPECIFICGRAVITY','$CUESUGAR','$CUEALBUMIN','$CUEBILESALTS','$CUEBILEPIGMENTS','$CUEUROBILINOGEN','$CUEKETONES','$CUERBC','$CUEPUSCELLS','$CUEEPITHELIAL','$CUECASTS','$CUECRYSTALS','$CUEOTHERS')");

		
		//amylase lipase
		$serumamylase = addslashes($_REQUEST['serumamylase']);
		$serumamylase1 = addslashes($_REQUEST['serumamylase1']);
		$serumlipase = addslashes($_REQUEST['serumlipase']);
		$serumlipase1 = addslashes($_REQUEST['serumlipase1']);
		
		mysqli_query($link,"update lipasevalues set  serumamylase='$serumamylase1',serumlipase='$serumlipase1'  where bill_no='$bno'");
		$sql2=mysqli_query($link,"insert into lipase(bill_no, serumamylase,serumlipase)values('$bno','$serumamylase','$serumlipase')");     

		
		
		
		//lft
		
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
                
                mysqli_query($link,"update livernormal set ltbv='$ltbv',ldbv='$ldbv',ldbt='$ldbt', sgotv='$sgotv', sgptv='$sgptv', sgtt='$sgtt', slv1='$slv1', slv2='$slv2',slv3='$slv3', slv4='$slv4',slv5='$slv5', slvt='$slvt',tpv='$tpv', sav='$sav', tpt='$tpt' where lfid='$lfid'");
                
		$sql2 = mysqli_query($link,"insert into lft(bill_no, TOTAL_BILIRUBIN,DIRECT_BILIRUBIN,INDIRECT_BILIRUBIN,SGOT,SGPT,S_ALKALINE_PHOSPHATE,TOTAL_PROTIENS,SERUM_ALBUMIN,SERUM_GLOBULIN,AG_Ratio) values('$bno','$LFTTBILIRUBIN','$LFTDBILIRUBIN','$LFTIBILIRUBIN','$LFTSGOT','$LFTSGPT','$LFTSAPHOSPHATE','$LFTTPROTIENS','$LFTSALBUMIN','$LFTSGLOBULIN','$LFTAGRATIO')");

		
		
		
		//tsh
		
		$tsh = addslashes($_REQUEST['tsh']);
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
		mysqli_query($link,$y);
		$sql2=mysqli_query($link,"insert into tsh(bill_no, tsh)values('$bno','$tsh')");     

		
		
		
		//serum (hiv)
		$bg = addslashes($_REQUEST['bg']);
		$rhd=$_REQUEST['rhd'];
		$hiv=$_REQUEST['hiv'];
		$hbsag=$_REQUEST['hbsag'];
		$vdrl=$_REQUEST['vdrl'];
		$sql2=mysqli_query($link,"insert into serology(bill_no,bg, rhd,hiv,hbsag,vdrl)values('$bno','$bg','$rhd','$hiv','$hbsag','$vdrl')");     

		     
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
	print "self.location='result_entry.php';";
	print "</script>";
	}

}	

?>