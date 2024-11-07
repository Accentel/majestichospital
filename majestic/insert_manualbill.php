<?php
include("config.php");

if(isset($_POST['submit'])){
$billno=$_POST['billno'];
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
$surgery=$_POST['surgery'];
$surgeryamount=$_POST['surgeryamount'];

$hosppaid=$_POST['hosppaid'];
$hospdue=$_POST['hospdue'];
$labpaid=$_POST['labpaid'];
$labdue=$_POST['labdue'];
$pharmacypaid=$_POST['pharmacypaid'];
$pharmacydue=$_POST['pharmacydue'];

$totpaid=$_POST['totpaid'];
$totdue=$_POST['totdue'];
$roomtype=$_POST['roomtype'];
$q="insert into manual_bill(BILL_DATE,PatientNo,PatientMRNo,PatientName,Age,Sex,Address,ConsultDoctor,ContactNo,Relation,RelationName,AdmissionDate,DischargeDate,icudays,gendays,icubed,icuintensit,icunursing,genbed,gennursing,gendmo,Criticalcare,CARMcare,otcharge,otconcession,otinstrument,Anaesthesia,Surgeon,AsstSurgeon,Anaesthetist,Anaesthetistconnession,tothosp,totlab,totpharmacy,dresscharg,totamt,totconsession,netamt,hospaid,hospdue,labpaid,labdue,pharmacypaid,pharmacydue,totpaid,totdue,surgery,surgeryamount,roomtype,bno)values('$billdate','$patno','$patregno','$patname','$age','$sex','$addr','$con_doct','$contact','$rel_type','$rel_name','$admdt','$DisDate','$icu_days','$txtgen','$bed_chrg','$int_chrg','$nur_chrg','$genbed','$nurcharg','$dmo','$txtcritical','$carm','$oper','$opercons','$txtinst','$txtAT','$txtsurg','$txtsurg_as','$txtanaestist','$an_cons','$hospTot','$labtot','$pharmacytot','$dress','$totamt','$totconsession','$netamt','$hosppaid','$hospdue','$labpaid','$labdue','$pharmacypaid','$pharmacydue','$totpaid','$totdue','$surgery','$surgeryamount','$roomtype','$billno')";


$rs=mysql_query($q) or die(mysql_error());
$fid=mysql_insert_id();

$count=count($_POST['docname']);
for($i=0;$i<$count;$i++){
	$docname = $_POST['docname'][$i];
	$days1 = $_POST['days1'][$i];
	$amount1 = $_POST['amount1'][$i];
	$total1 = $_POST['total1'][$i];
	
	
if($docname != ""){
$sql1 = mysql_query("insert into manual_doctor_visit(fid, docname, visits, amount, total) values('$fid','$docname','$days1','$amount1','$total1')");
}
	
	
	}


$count1=count($_POST['days']);
for($i=0;$i<$count1;$i++){
	$days = $_POST['days'][$i];
	$tname = $_POST['tname'][$i];
	$cost = $_POST['cost'][$i];
	$amnt = $_POST['amnt'][$i];
	
	
if($days != ""){
$sql2 = mysql_query("insert into manual_other_desc(fid, description, days, amount, total) values('$fid','$tname','$days','$cost','$amnt')");
}
	
	
	}






//$y11=mysql_query("update ip_pat_admit set DIS_STATUS='Intimated' where pat_no='$patno'");
//$z11=mysql_query("update ip_pat_bed set end_date='$DisDate' where pat_no='$patno' and end_date is null ");

if($sql2)
{
	print "<script>";
	print "alert('Successfully added');";
	print "self.location='manual_bill_print.php?id=$fid';";
	print "</script>";
}
}
?>