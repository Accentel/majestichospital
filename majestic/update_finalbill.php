<?php
include("config.php");

if(isset($_POST['submit'])){
$billno=$_POST['billno'];
$billno1=$_POST['billno1'];
$billdate= date('Y-m-d',strtotime($_POST['billdate']));
$patno=$_REQUEST['patno'];
$patregno=$_REQUEST['patregno'];
$admdt=date('Y-m-d',strtotime($_POST['admdt']));
$DisDate=date('Y-m-d',strtotime($_POST['DisDate']));

$patname=$_POST['patname'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$addr=$_POST['addr'];
$con_doct=$_POST['con_doct'];
$contact=$_POST['contact'];
$rel_type=$_POST['rel_type'];
$rel_name=$_POST['rel_name'];
$constype=$_POST['constype'];
$conscardno=$_POST['conscardno'];
$icu_days=$_POST['icu_days'];
$bed_chrg=$_POST['bed_chrg'];
$int_chrg=$_POST['int_chrg'];
$nur_chrg=$_POST['nur_chrg'];
$txtgen=$_POST['txtgen'];
$genbed=$_POST['genbed'];
$nurcharg=$_POST['nurcharg'];
$dmo=$_POST['dmo'];
$txtcritical=$_POST['txtcritical'];
$carm=$_POST['carm'];
$oper=$_POST['oper'];
$opercons=$_POST['opercons'];
$txtinst=$_POST['txtinst'];
$txtAT=$_POST['txtAT'];
$txtsurg=$_POST['txtsurg'];
$txtsurg_as=$_POST['txtsurg_as'];
$txtanaestist=$_POST['txtanaestist'];
$an_cons=$_POST['an_cons'];
$dress=$_POST['dress'];

$hospTot=$_POST['txtTot'];
$labtot=$_POST['labtot'];
$pharmacytot=$_POST['pharmacytot'];

$totamt=$_POST['txtTot1'];
$totconsession=$_POST['txtconces'];
$netamt=$_POST['netamt'];

$hosppaid=$_POST['hosppaid'];
$hospdue=$_POST['hospdue'];
$labpaid=$_POST['labpaid'];
$labdue=$_POST['labdue'];
$pharmacypaid=$_POST['pharmacypaid'];
$pharmacydue=$_POST['pharmacydue'];

$totpaid=$_POST['totpaid'];
$totdue=$_POST['totdue'];

$q="update  final_bill set bno='$billno',BILL_DATE='$billdate',PatientNo='$patno',PatientMRNo='$patregno',PatientName='$patname',Age='$age',Sex='$sex',Address='$addr',ConsultDoctor='$con_doct',ContactNo='$contact',Relation='$rel_type',RelationName='$rel_name',AdmissionDate='$admdt',DischargeDate='$DisDate',icudays='$icu_days',gendays='$txtgen',icubed='$bed_chrg',icuintensit='$int_chrg',icunursing='$nur_chrg',genbed='$genbed',gennursing='$nurcharg',gendmo='$dmo',Criticalcare='$txtcritical',CARMcare='$carm',otcharge='$oper',otconcession='$opercons',otinstrument='$txtinst',Anaesthesia='$txtAT',Surgeon='$txtsurg',AsstSurgeon='$txtsurg_as',Anaesthetist='$txtanaestist',Anaesthetistconnession='$an_cons',tothosp='$hospTot',totlab='$labtot',totpharmacy='$pharmacytot',dresscharg='$dress',totamt='$totamt',totconsession='$totconsession',netamt='$netamt',hospaid='$hosppaid',hospdue='$hospdue',labpaid='$labpaid',labdue='$labdue',pharmacypaid='$pharmacypaid',pharmacydue='$pharmacydue',totpaid='$totpaid',totdue='$totdue' where BILL_NO='$billno1'";


$rs=mysql_query($q) or die(mysql_error());


//$fid=mysql_insert_id();

$count=count($_POST['docname']);
for($i=0;$i<$count;$i++){
	$docname = $_POST['docname'][$i];
	$days1 = $_POST['days1'][$i];
	$amount1 = $_POST['amount1'][$i];
	$total1 = $_POST['total1'][$i];
	$dic = $_POST['did'][$i];
	
if($docname != "" and $did!=''){
$sql1 = mysql_query("update final_doctor_visit set fid='$billno', docname='$docname', visits='$days1', amount='$amount1', total='$total1' where id='$did'");
}
	
	
	}


$count1=count($_POST['days']);
for($i=0;$i<$count1;$i++){
	$days = $_POST['days'][$i];
	$tname = $_POST['tname'][$i];
	$cost = $_POST['cost'][$i];
	$amnt = $_POST['amnt'][$i];
	$fid== $_POST['fid'][$i];
	
if($days != "" and $fid!=''){
$sql2 = mysql_query("update final_other_desc set fid='$billno', description='$tname', days='$days', amount='$cost', total='$amnt' where id='$fid'");
}
	
	
	}






$y11=mysql_query("update ip_pat_admit set DIS_STATUS='Intimated' where pat_no='$patno'");
$z11=mysql_query("update ip_pat_bed set end_date='$DisDate' where pat_no='$patno' and end_date is null ");

if($z11)
{
	print "<script>";
	print "alert('Successfully added');";
	print "self.location='final_bill.php'";
	print "</script>";
}
}
?>