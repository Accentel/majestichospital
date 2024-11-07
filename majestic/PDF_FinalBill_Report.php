<?php
//require('fpdf/fpdf.php');
require 'vendor/autoload.php';

include("config.php");
$pdf=new FPDF();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();

$sql = mysql_query("select * from organization");
if($sql){
$res = mysql_fetch_array($sql);
$orgname = $res['orgname'];
$addr = $res['address'];
$phone = $res['phone'];
$mob = $res['mobile'];
$email = $res['email'];
}
$pdf->SetFont('Arial','',18);
$pdf->Cell(186, 6, $orgname, 0, 1, 'C', FALSE);
$pdf->SetFont('Arial','',12);
$pdf->Cell(186, 6, $addr, 0, 1, 'C', FALSE);
$pdf->Cell(186, 6, 'Phone : '.$phone, 0, 1, 'C', FALSE);
$pdf->SetFont('Arial','',14);
$pdf->Cell(156, 10, '', 0, 1, 'C', FALSE);
$pdf->Cell(186, 6, 'Final Bill Report', 0, 1, 'C', FALSE);
$pdf->SetFont('Arial','',10); 
$billno = $_REQUEST['billno'];
$prnt = $_REQUEST['p'];
$sql =mysql_query("select  BILL_DATE, pat_NO, admit_DATE, DIS_DATE, concession_type, ROOM_RENT, CONSultant_CHARGES, admission_CHARGES, INVG_CHARGES, OUTSIDE_CONS_CHARGES, CRITICALCARE_AMT, OPERATION_CHARGES, OTINSTRUMENT_CHARGES, ANAES_DISPO_CHARGES, SURG_CHARGES, ASST_SURG_CHARGES, ANAES_CHARGES, CORM_CHARGES, TOTALAMOUNT, ADVANCEPAID, TOTAL_CONC_AMT, NETAMOUT,dress_charges,Equipment_cost, diet, mr_cost,service_tax,raido,grbs,nursecharges,dmo,icu,dietconcharge from final_bill where bill_no='$billno'");
	
if($sql){
	$row = mysql_fetch_array($sql);
	
	$BILL_DATE=date('d-m-Y',strtotime($row[0]));
	$pat_NO=$row[1];
	$admit_DATE=date('d-m-Y',strtotime($row[2]));
	$DIS_DATE=date('d-m-Y',strtotime($row[3]));
	if($row[4] == ""){ $concession_type = "----"; }else{ $concession_type=$row[4];}
	$rent=$row[5];
	$cons=$row[6];
	$admit=$row[7];
	$invg=$row[8];
	$out_side=$row[9];
	$critical=$row[10];
	$ot=$row[11];
	$ot_int=$row[12];
	$ane_dis=$row[13];
	$surg=$row[14];
	$asssurg=$row[15];
	$anea=$row[16];
	$carm=$row[17];
	$total=$row[18];
	$adv=$row[19];
	$tot_cons=$row[20];
	$net1=$row[21];
	$dress=$row[22];
	$equip=$row[23];
	$diet=$row[24];
	$mr=$row[25];
	$tax=$row[26];
	$xray=$row[27];
	$grbs=$row[28];
	$nursecharges=$row[29];
	$dmo=$row[30];
	$icu=$row[31];
	$dietconcharge=$row[32];
	}
$s=0;	
$sql1 = mysql_query("select b.name,b.cost*(((to_days(ifnull(EndDateTime,now()))-to_days(StartDateTime))*24)+(DATE_FORMAT(ADDTIME('2000-00-00 00:00:00',SEC_TO_TIME(TIME_TO_SEC(ifnull(EndDateTime,now()))-TIME_TO_SEC(StartDateTime))), '%k'))) from casesheet_bedsideproc as a,icu_equipment_mast as b where a.equip_id=b.id  and  a.pat_no='$pat_NO' group by a.pat_no");

$mic = 0;
$sql2 = mysql_query("select  MIS_DESC, MIS from final_bill_dtl where bill_no='$billno'");

/*Query Updates*/
$q1=mysql_query("update ip_pat_admit set DIS_STATUS='Discharged' where pat_no='$pat_NO'");
$q4=mysql_query("update ip_pat_admit set Bill_STATUS='PAID' where pat_no='$pat_NO'");



$sql3 = mysql_query("select patientname,age, gender,CONCESSION_CARDNO,A.pat_regno,bed_no,bill_status from ip_pat_admit as A,patientregister as B  WHERE A.PAT_REGNO=B.registerno and A.pat_no='$pat_NO'");
if($sql3){
$row3 = mysql_fetch_array($sql3);
$name=$row3[0];
$age=$row3[1];
$sex=$row3[2];
$conscard=$row3[3];
$regno=$row3[4];
$bed=$row3[5];
$billstatus=$row3[6];

}
$q2=mysql_query("update patientregister set pat_type='OP' where registerno='$regno' ");
$q3=mysql_query("update ip_bed_mast set BED_STATUS='Not Reserved' where bed_no='$bed'");

$retu_bal=$tot_cons+$adv;
$net="Net Amount(Rs.)";
if($retu_bal>$total){
	$net="Return Amount(Rs.)";
	$net1=round($net1);
	}
else{
$net="Amount To Pay(Rs.)";
$net1=round($net1);
	}
$pdf->Cell(156, 16, '', 20, 1, 'R', FALSE);
$pdf->Cell(26, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, 'Bill No. : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $billno, 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, 'Bill Date : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $BILL_DATE, 0, 1, 'L', FALSE);
$pdf->Cell(156, 6, '', 20, 1, 'R', FALSE);	
$pdf->Cell(6, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(106, 6, 'Patient Details : ', 20, 1, 'L', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Patient Name / No. : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $name."/".$pat_NO, 20, 0, 'L', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Age / Gender : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $age."/".$sex, 0, 1, 'L', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Concession type : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $concession_type, 20, 0, 'L', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Bed No. : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $bed, 0, 1, 'L', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Admit Date : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $admit_DATE, 20, 0, 'L', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Discharge Date : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $DIS_DATE, 0, 1, 'L', FALSE);
$pdf->Cell(156, 6, '', 20, 1, 'R', FALSE);	
$pdf->Cell(6, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(106, 6, 'Particulars : ', 20, 1, 'L', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Admission Charges : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, ($admit+$mr), 20, 0, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Room/Bed  Charges : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $rent, 0, 1, 'R', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Nursing Charges : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $nursecharges, 20, 0, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Duty Doctor Charges : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $dmo, 0, 1, 'R', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Diet Charges : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $diet, 20, 0, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Diet Consultation Charges : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $dietconcharge, 0, 1, 'R', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'ICU Charges : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $icu, 20, 0, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Lab & GRBS Charges : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, ($invg+$grbs), 0, 1, 'R', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Radiology Charges : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $xray, 20, 0, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Consultant Charges : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $cons, 0, 1, 'R', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Out Side Consultant Charges : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $out_side, 20, 0, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Operation Theater Charges : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $ot, 0, 1, 'R', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Anaesthetist Charges : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $anea, 20, 0, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Surgeon Charges : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $surg, 0, 1, 'R', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Asst. Surgeon Charges : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $asssurg, 20, 0, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Critical Care Support : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $critical, 0, 1, 'R', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'OT Instrumentation : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $ot_int, 20, 0, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Anaesthesia/Disposable : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $ane_dis, 0, 1, 'R', FALSE);

$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'CARM Charges : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $carm, 20, 0, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Dressing Charges : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $dress, 0, 1, 'R', FALSE);
$pdf->Cell(156, 6, '', 20, 1, 'R', FALSE);	

if($sql2){
$rows = mysql_num_rows($sql2);
if($rows > 0){
$pdf->Cell(106, 6, 'Miscellaneous : ', 20, 0, 'C', FALSE);
$pdf->Cell(106, 6, 'Amount : ', 20, 1, 'C', FALSE);
while($row2 = mysql_fetch_array($sql2)){

$pdf->Cell(106, 6, $row2[0], 20, 0, 'C', FALSE);
$pdf->Cell(106, 6, $row2[1], 20, 1, 'C', FALSE);
	}
}
}
$pdf->Cell(156, 6, '', 20, 1, 'R', FALSE);	
$ss=round(($total*$tax)/100);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Total Amount (Rs.) : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $total, 20, 1, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Service Tax% ('.$tax.') : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $ss.'.00', 0, 1, 'R', FALSE);
$pdf->Cell(156, 6, '', 20, 1, 'R', FALSE);
$ss2=($total+$ss);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'NET Amount (Rs.) : ', 20, 0, 'L', FALSE);
$pdf->Cell(26, 6, $ss2.'.00', 20, 1, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, 'Advance (Rs.) : ', 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, $adv, 0, 1, 'R', FALSE);
$pdf->Cell(156, 6, '', 20, 1, 'R', FALSE);
$pdf->Cell(16, 6, '', 20, 0, 'L', FALSE);
$pdf->Cell(46, 6, $net, 0, 0, 'L', FALSE);
if($ss2 > ($tot_cons+$adv)){
$pdf->Cell(26, 6, ($ss2-($tot_cons+$adv)).'.00', 0, 1, 'R', FALSE);

}
else{
$pdf->Cell(26, 6, (($tot_cons+$adv)-$ss2).'.00', 0, 1, 'R', FALSE);
}
$pdf->Cell(106, 26, '', 0, 1, 'L', FALSE);
$pdf->Cell(156, 6, 'Authorized Signature', 0, 1, 'R', FALSE);
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 

?>