<?php 

include("config.php");
$d=date('Y-m-d');
 $x="select * from patientregister where date='$d' and pat_type='OP'";
$sd=mysql_query($x);
 $r=mysql_num_rows($sd);


						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysql_query("select distinct a.total from patientregister a,referal_doctor b where    a.ref_doc=b.refcode and a.date between '$d' and '$d' order by  a.date asc");
						if($qry){
						$i=0;
						$total1=0;
					 	 while($res=mysql_fetch_array($qry)){
								
						
							  $total = $res['total'];
							$total1=$total1+$total;
							 
							 $i++;
			} }

$qry1="select * from opbill  where  BillDate between '$d' and '$d' order by BillDate asc";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysql_query($qry1) or die(mysql_error());
						if($qry){
						$i=0;
						$total6=0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 
				
							  $total7 = $res['PaidAmount'];
							$total6=$total6+$total7;
							
							 $i++;
} }
$qry1="select distinct a.mrno,a.PatientName,a.Age,a.Sex,a.BillNO,a.ptype,a.PaidAmount,a.BillDate,b.phoneno from bill1 a,patientregister b where  a.mrno=b.registerno and  a.BillDate between '$d' and '$d' order by a.BillDate asc";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysql_query($qry1) or die(mysql_error());
						if($qry){
						$i=0;
						$total2=0;
					 	 while($res=mysql_fetch_array($qry)){
								
							
							  $total = $res['PaidAmount'];
							$total2=$total2+$total;
							 
							 $i++;

						 }
						}
						
						$qry1="select  distinct a.ADV_AMT,a.PAT_NO,b.PAT_REGNO,a.ADV_ID,b.PAT_NO,a.ADV_DATE,c.patientname,c.registerno,c.age,c.gender,c.phoneno from adv_collection a,ip_pat_admit b,patientregister c  where a.PAT_NO=b.PAT_NO and b.PAT_REGNO=c.registerno and  a.ADV_DATE between '$d' and '$d' and a.ADV_AMT!='0.00' order by a.ADV_DATE asc ";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysql_query($qry1);
						if($qry){
						$i=0;
						$total3=0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 
						
							 
							  $total = $res['ADV_AMT'];
							$total3=$total3+$total;
							 
							 $i++;
						 }
						}
 $t= number_format($total1+$total2+$total3+$total6,2);
	
                     $i=0;
					 $sum = 0;
					echo  $sq="select a.bill_no, a.bill_date, a.paid_to, a.mobile_no, a.amount, a.towards,a.pay_type,a.bname,a.chq_no,a.chq_date,a.account_no,a.amt_words,a.auth_by,a.currentdate,b.exptype from addexpenses a,expensetype b  where a.towards=b.id and  a.bill_date between '$d' and '$d' ";
					 $qry=mysql_query($sq) or die(mysql_error());
					 
					  if($qry){
					 	 while($res=mysql_fetch_array($qry)){
							
							 $amt = $res['amount'];
							
							 echo $sum = ($sum+$amt);
							
							 $i++;
						 }
					  }
					  $sq=mysql_query("SELECT * FROM final_bill  where BILL_DATE = '$d'");
					   echo   $totx=mysql_num_rows($sq); 
	
$ch = curl_init();
	 $mob=8801062501;
	
 $msg="Total number of O.P Patients is $r and   amount collections is $t and	
 Total Lab collection $total2 . And Total Expenditure is $sum. And 	Total Discharge patients is $totx";
//$url ="http://sms.scubedigi.com/api.php?username=Durgahospital&password=admin123&to=$to2&from=DHSHUZ&message=".urlencode($msg); 
//$ret = file($url); 

$user="durgahospital";
$password="admin123";
//$receipientno="9666111717,9959583024";
$senderID="DHSHUZ"; 
curl_setopt($ch,CURLOPT_URL,  "http://sms.scubedigi.com/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$user&password=$password&to=$mob&from=$senderID&message=$msg");
  //$buffer = curl_exec($ch);


session_start();

session_destroy();

session_unset();

header('Location:index.php?message=successfully logged out');



?>