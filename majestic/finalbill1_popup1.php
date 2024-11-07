<?php
include("config.php");

$emp_id = $_REQUEST['emp_id'];

$invgcostconce=0;
$consult=mysqli_query($link,"select sum(fee1) from doct_infor as a,ip_pat_admit as b where a.id=b.doc_code and b.pat_no='$emp_id'");
if($consult){
	$row = mysqli_fetch_array($consult);
	$docfee = $row['fee1'];
  }
$consultantfee=0;
$consultantfee1=0;


$concardno = 0;
$amt = 0;
$conamt = 0;
$dietcost = 0;
$mrcost = 0;
$query = mysqli_query($link,"select B.patientname,B.registerno, B.age, B.gender,B.address,B.doctorname,B.rel_type,
B.gaurdianname,B.phoneno,A.ADMIT_DATE,A.pkg_type,A.pkg_amount from ip_pat_admit as A,patientregister as B WHERE
  A.PAT_REGNO=B.registerno and A.PAT_NO='$emp_id' ");
if($query){
	$row1 = mysqli_fetch_array($query);
	$patname = $row1['patientname'];
	$regno = $row1['registerno'];
	$age = $row1['age'];
	$gender = $row1['gender'];
	
	$admitdate = date('d-m-Y',strtotime($row1['ADMIT_DATE']));
	
	$addr1=$row1['address'];
	$doctorname=$row1['doctorname'];
	$rel_type=$row1['rel_type'];
	$gaurdianname=$row1['gaurdianname'];
	$phoneno=$row1['phoneno'];
	
	$pkg_type=$row1['pkg_type'];
	$pkg_amount=$row1['pkg_amount'];
	
	if($pkg_amount!=''){
		$pkg_amount=$pkg_amount;
	}else{
	$pkg_amount="0.00";	
	}
  }
 	
$qy = mysqli_query($link,"select * from ip_pat_bed WHERE
   A.PAT_NO='$emp_id' ");
if($query){
	$row12 = mysqli_fetch_array($qy);
	$BED_NO = $row12['BED_NO'];
	$room_no = $row12['room_no'];
	
  }
 	
	
	
	
 $sql2=mysqli_query($link,"select distinct CONCE_NAME,CONCE_PER from concession_type as c ,ip_pat_admit as a where c.CONCE_CODE=a.CONCESSION_TYPE and a.CONCESSION_TYPE='$contype'");
if($sql2){
	$row2 = mysqli_fetch_array($sql2);
	$conname = $row2['CONCE_NAME'];
	$conper = $row2['CONCE_PER'];
}
//$sql3=mysql_query("select sum(amount_pay+concession_amt),sum(concession_amt) from 
//lab_req_mast as a where lr_no in (select distinct lr_no from lab_invg_item as d,lab_req_dtl as f,dept as d1 where d.invg_item_code=f.invg_item_code and d.dept_code=d1.dept_code and upper(dept_name) like upper('%lab%')|| upper(dept_name) like upper('%biology%') || upper(dept_name) like upper('%bio-chemistry%') || upper(dept_name) like upper('%sound%')) and  a.pat_regno='$regno'");
$admitdate1=date('Y-m-d',strtotime($admitdate));
$edate=date('Y-m-d');
echo $y="select sum(NetAmount) as net,sum(PaidAmount) as paid,sum(BalanceAmount) as bal from bill1 where mrno='$regno' and BillDate between '$admitdate1' and '$edate'  ";

$sql3=mysqli_query($link,$y) or die(mysqli_error($link)); 

if($sql3){
	$row3 = mysqli_fetch_array($sql3);
	if($row3[0] == Null){$invgfee=0;}else{$invgfee=$row3[0];}
	if($row3[1] == Null){$invgfee1=0;}else{$invgfee1=$row3[1];}
	if($row3[1] == Null){$invgfee2=0;}else{$invgfee2=$row3[2];}
	//if($row3[1] == Null){$consinvgfee=0;}else{$consinvgfee=$row3[1];}
}

echo $y1="select  total from phr_salent_mast where mrnum='$regno' and SAL_DATE between '$admitdate1' and '$edate'  ";

$sql6=mysqli_query($link,$y1) or die(mysqli_error($link)); 

if($sql6){
	$row6 = mysqli_fetch_array($sql6);
	if($row6[0] == Null){$t=0;}else{$t=$row6[0];}
	$t1='0';
	//if($row3[1] == Null){$consinvgfee=0;}else{$consinvgfee=$row3[1];}
}





$ther=mysqli_query($link,"select DATE_FORMAT(ADDTIME('2000-00-00 00:00:00',SEC_TO_TIME(TIME_TO_SEC(end_time)-TIME_TO_SEC(st_time))), '%k') hrs,THEATER_COST,ot_cost from ip_pat_admit as a, casesheet_surgerydetails as b,operation_theater as c WHERE a.PAT_NO=b.PAT_NO and c.THEATER_code=b.THEATER_Id and a.pat_no='$emp_id' ");

if($ther){
	$row4 = mysqli_fetch_array($ther);
      $hrs12=$row4[0];
      $therfee=$row4[1];
      $carm=$row4[2];
	  
	$therfee=$therfee+($therfee*$hrs12);
}
if($carm==1){

$sql5=mysqli_query($link,"select THEATER_COST from operation_theater where upper(THEATER_NAME) like upper('%c-arm%') || upper(THEATER_NAME) like upper('%carm%') || upper(THEATER_NAME) like upper('%c arm%')");

if($sql5){
	$rows5 = mysqli_num_rows($sql5);
	if($rows5 > 0){
	$row5 = mysqli_fetch_array($sql5);
	$carmfee = $row5[0];
	}
}

}else{
		$carmfee=0;
	}
	 $hrs=0;   
	 $days=0;   
	 $roomrent=0;   
	 $otherfee=0;   
	 $totrent=0;
	 $totroomrent=0;
	 $tototherrent=0;
	 $days1=0;
     $hrs1=0;
     $hrs2=null;
     $bedno=null;

$sql6=mysqli_query($link,"select to_days(ifnull(end_date,now()))-to_days(start_date) days,DATE_FORMAT(ADDTIME('2000-00-00 00:00:00',SEC_TO_TIME(TIME_TO_SEC(ifnull(end_time,now()))-TIME_TO_SEC(start_time))), '%k') hrs,(room_fee+MAINT_FEE+NURSE_FEE),OTHER_FEE,c.BED_NO from ip_pat_admit as A,patientregister as B,ip_pat_bed as c,bed_details as d,room_tariff as e WHERE A.PAT_REGNO=B.registerno and c.pat_no=a.pat_no and a.pat_no='$emp_id' and c.bed_no=d.bed_no and d.room_no=e.room_no");
if($sql6){
	$row6 = mysqli_fetch_array($sql6);
  
	  $days=$row6[0];
	  $hrs=$row6[1];
      $roomrent=$row6[2];
      $otherfee=$row6[3];
	  $bedno=$row6[4];
}

 $days=$days;

$totroomrent=$totroomrent+(($roomrent)*$days);
$consultantfee1=$consultantfee1+($otherfee*$days);

$totrent=$totroomrent;

$res = mysqli_query($link,"select sum(ADV_AMT)from adv_collection where pat_no='$emp_id'");
if($res)
{
	$row = mysqli_fetch_array($res);
	$adv_amt1=$row[0];
}
if($adv_amt1!=''){
    $adv_amt=$adv_amt1;
}else{
    $adv_amt='0';
}
//$data = "|".$emp_id."|".$patname."|".$regno."|".$age."|".$gender."|".$addr1."|".$doctorname."|".$rel_type."|".$gaurdianname."|".$phoneno."|".$admitdate."|";
//.$conname."|".$concardno."|".$amt."|".($dietcost*$days)."|".$consultantfee1."|".$invgfee."|".$therfee."|".$carmfee."|".$consinvgfee."|".$totrent."|".$adv_amt."|".$bedno."|".$conper."|".$conamt."|" ;
	//echo $data;

	$roomrent2=0;
      $maintfree2=0;
	  $nursefee2=0;
	  $icu=0;


echo $x="select to_days(ifnull(c.END_DATE,now()))-to_days(c.START_DATE) days,
DATE_FORMAT(ADDTIME('2000-00-00 00:00:00',SEC_TO_TIME(TIME_TO_SEC(ifnull(END_TIME,now()))-TIME_TO_SEC(START_TIME))), '%k') 
hrs,e.ROOM_FEE,e.MAINT_FEE,e.NURSE_FEE,e.OTHER_FEE,c.BED_NO,r.ROOMTYPE  from ip_pat_admit as A,patientregister as B,ip_pat_bed as c,
bed_details as d,room_tariff as e ,roomtype as r WHERE A.PAT_REGNO=B.registerno AND  c.PAT_NO=A.PAT_NO and A.PAT_NO='$emp_id'
 and c.BED_NO=d.BED_NO and d.ROOM_NO=e.ROOM_NO and e.ROOM_TYPE=r.ROOMTYPE_ID and r.ROOMTYPE like '%icu%'";
$msql2=mysqli_query($link,$x);
$icu=0;
$days2=0;
 if($msql2){
while($row = mysqli_fetch_array($msql2))
{
 $days2=$row[0];
 $days2=$days2;
 $icu=$icu+($row[2]*$days2);
 $roomrent2=$roomrent2+($row[3]*$days2);
 $maintfree2=$maintfree2+($row[4]*$days2);
 $nursefee2=$nursefee2+($row[5]*$days2);


}
}	
 //$roomrent2=5000;
 echo $x1="select to_days(ifnull(c.END_DATE,now()))-to_days(c.START_DATE) days,
DATE_FORMAT(ADDTIME('2000-00-00 00:00:00',SEC_TO_TIME(TIME_TO_SEC(ifnull(END_TIME,now()))-TIME_TO_SEC(START_TIME))), '%k') 
hrs,e.ROOM_FEE,e.MAINT_FEE,e.NURSE_FEE,e.OTHER_FEE,c.BED_NO,r.ROOMTYPE  from ip_pat_admit as A,patientregister as B,ip_pat_bed as c,
bed_details as d,room_tariff as e ,roomtype as r WHERE A.PAT_REGNO=B.registerno AND  c.PAT_NO=A.PAT_NO and A.PAT_NO='$emp_id'
 and c.BED_NO=d.BED_NO and d.ROOM_NO=e.ROOM_NO and e.ROOM_TYPE=r.ROOMTYPE_ID and r.ROOMTYPE like '%General ward%'";
 //exit;
$msql21=mysqli_query($link,$x1);
$icu1=0;
$days211=0;
 if($msql21){
while($row1 = mysqli_fetch_array($msql21))
{
 $days3=$row1[0];
 $days211=$days3;
 $icu1=$icu1+($row1[2]*$days211);
 $roomrent2=$roomrent2+($row1[3]*$days211);
 $maintfree21=$maintfree2+($row1[4]*$days211);
 $nursefee21=$nursefee2+($row1[5]*$days211);


}
}	

//$bal=$pkg_amount-$adv_amt;
?>
<?php
echo $data="|".$emp_id."|".$patname."|".$regno."|".$age."|".$gender."|".$addr1."|".$doctorname."|".$rel_type."|".$gaurdianname."|".$phoneno."|".$admitdate."|".$roomrent21."|".$maintfree21."|".$nursefee21."|".$days2."|".$days3."|".$invgfee."|".$invgfee1."|".$invgfee2."|".$adv_amt."|".$t."|".$t1."|"."|".$BED_NO."|".$room_no;
//.$nursefee2."|".$icu."|";
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>