<?php
include("config.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
  $ptype=$_GET['ptype'];
$refdoct=$_GET['refdoct'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Amount Collection</title>
        <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
             window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
        <style type="text/css">
            .header{
                font-family: monospace,sans-serif,arial;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                text-decoration: underline;
            }
            .heading1 {	
                    font-size:24px;
                    text-align:center;
                    font-weight: bold; 
            }
            .heading2 {	
                font-size:16px;
                text-align:center;
            }
            body {
	background: #FFFFFF;
}
        </style>
    </head>
    <body>
<?php 
include("config.php");
if($ptype=="OPP"){
	$q=mysql_query("select * from  referal_doctor where refcode='$refdoct'") or die(mysql_error());
							
							$kt=mysql_fetch_array($q);
							$ref_docname1=$kt['ref_docname'];
							 $doctorshare1=$kt['doctorshare'];
							
							 ?>

<table align="center">
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Amount Collection From OP Patient Registration and OP Cash Bill</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="7" style="text-align:center">Dr. <?php echo $ref_docname1; ?></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Bill Date</b></td>
                            <td align="center"><b>Patient Type</b></td>
                             <td align="center"><b>Op Lab Amount</b></td>
                            <td align="center"><b>OP Cash Amount</b></td>
						<td align="center"><b>Total Amount</b></td>
							
                            <td align="center"><b>Share(<?php echo $doctorshare1; ?>)%</b></td>
							
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
					$ts1="select distinct a.registerno,a.gender,a.tokenno,a.patientname,a.pat_type,a.age,a.total,a.phoneno,a.ref_doc,a.date,b.ref_docname,b.refcode,b.doctorshare from patientregister a,referal_doctor b where  a.pat_type='OP' and  a.ref_doc=b.refcode and a.ref_doc='$refdoct' and a.date between '$sdate1' and '$edate1' order by a.registerno asc";
						$qry=mysql_query($ts1) or die(mysql_error());
						if($qry){
						$i=0;
						$total1=0;
						$share5=0;
						$ops=0;
						$opl=0;
						$tst=0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 
							 
							 $bno = $res['registerno'];
							 $pname = $res['patientname'];
							 $phoneno=$res['phoneno'];
							 $age = $res['age'];
							 $sex = $res['gender'];
							 $tokenno = $res['tokenno'];
							 $ptype = $res['pat_type'];
							 $doctorshare= $res['doctorshare'];
							 $total = $res['total'];
							 $total1=$total1+$total;
							 $date1 = $res['date'];
							 $ref_docname=$res['ref_docname'];
							
							
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $bno ?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $age."/".$sex ?></td>
                            
                               <td align="center"><?php echo $date ?></td>
                          <td align="center"><?php echo $ptype."/". $tokenno ?></td>
                          <td align="center"><?php
						  $k=mysql_query("select sum(NetAmount) as amt1 from  bill1 where mrno='$bno' and BillDate between '$sdate1' and '$edate1'") or die(mysql_error());
							
							$ks1=mysql_fetch_array($k);
							
							 $t1=$ks1['amt1'];
							if($t1!=0){
								echo $t1=$ks1['amt1'];
							}else{
								echo  $t1=0;
								}
							$opl=$opl+$t1;
							
							 ?>
                          
                          
                          </td>
                            <td align="center"><?php 
							$k=mysql_query("select sum(NetAmount) as amt from  opbill where mrno='$bno'") or die(mysql_error());
							
							$ks=mysql_fetch_array($k);
							
							 $t=$ks['amt'];
							if($t!=0){
								echo $t=$ks['amt'];
							}else{
								echo  $t=0;
								}
							$ops=$ops+$t;
							
							 ?></td>
                             <td align="center"><?php echo $st= $t+$t1;
							 
							 $tst=$tst+$st;
							  ?></td>
                            
                            <td align="center"><?php
							$p=$t+$t1;
							echo $share=($p*$doctorshare1)/100;
							
							
							
							
							 
							 $share5=$share5+$share;
							   ?> </td>
                          
                           
                        
						</tr>
                       <?php } }?>
					   <tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
							 <td align="center"></td>
                             
                             <td align="center"></td>
                             <td align="center"></td>
                             
                            <td align="center"><b>Total</b></td>
							<?php
							$t1=number_format($opl,2);
							$ops1=number_format($ops,2);
							
							$tt1=number_format($tst,2);
							$share11=number_format($share5,2);
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t1 ?></b></td>
                           <td align="center" style="padding-right:20px;"><b><?php echo $ops1 ?></b></td>
                            <td align="center" style="padding-right:20px;"><b><?php echo $tt1 ?></b></td>
                            <td align="center" style="padding-right:20px;"><b><?php echo $share11 ?></b></td>
                            
                        
						</tr>
						
						
						
						
						 
					   
						
						
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 

 <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="6" style="text-align:center">Dr. <?php echo $ref_docname1; ?></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Admission Date</b></td>
                            <td align="center"><b>Patient Type</b></td>
                             <td align="center"><b>Discharge Date</b></td>
                           
						<td align="center"><b>Total Amount</b></td>
							
                            <td align="center"><b>Share(<?php echo $doctorshare1; ?>)%</b></td>
							
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
					$ts1="select distinct a.registerno,a.gender,a.tokenno,a.patientname,a.pat_type,a.age,a.total,a.phoneno,a.ref_doc,a.date,b.ref_docname,b.refcode,b.doctorshare,c.netamt from patientregister a,referal_doctor b,final_bill c,ip_pat_admit d	 where  c.PatientMRNo=a.registerno and  d.PAT_REGNO=c.PatientMRNo and d.DIS_STATUS='Discharged' and a.ref_doc=b.refcode and a.ref_doc='$refdoct' and c.AdmissionDate between '$sdate1' and '$edate1' order by a.registerno asc";
						$qry=mysql_query($ts1) or die(mysql_error());
						if($qry){
						$i=0;
						$total2=0;
						$share6=0;
						$ops=0;
						$opl=0;
						$tst=0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 
							 
							 $bno = $res['registerno'];
							 $pname = $res['patientname'];
							 $phoneno=$res['phoneno'];
							 $age = $res['age'];
							 $sex = $res['gender'];
							 $tokenno = $res['tokenno'];
							 $ptype = $res['pat_type'];
							 $doctorshare= $res['doctorshare'];
							 $total = $res['netamt'];
							 $total2=$total2+$total;
							 $date1 = $res['date'];
							 $ref_docname=$res['ref_docname'];
							
							
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $bno ?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $age."/".$sex ?></td>
                            
                               <td align="center"><?php echo $date ?></td>
                          <td align="center"><?php echo $ptype."/". $tokenno ?></td>
                          <td align="center"><?php echo $total ?></td>
                            
                            
                            <td align="center"><?php
							//$p=$t+$t1;
							echo $share2=($total*$doctorshare1)/100;
							
							
							
							
							 
							 $share6=$share6+$share2;
							   ?> </td>
                          
                           
                        
						</tr>
                       <?php } }?>
					   <tr>
                           
                            <td align="center"></td>
                            <td align="center"></td>
							 <td align="center"></td>
                             
                             <td align="center"></td>
                             <td align="center"></td>
                             <td align="center" style="padding-right:20px;"></td>
                           <td align="center" style="padding-right:20px;"></td>
                            <td align="center"><b>Total</b></td>
							<?php
							
							$total1=number_format($total2,2);
							
							
							$share11=number_format($share6,2);
							?>
                            
                            <td align="center" style="padding-right:20px;"><b><?php echo $total2 ?></b></td>
                            <td align="center" style="padding-right:20px;"><b><?php echo $share11 ?></b></td>
                            
                        
						</tr>
						
						
						
						
						 
					   
						
						
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 




<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
        <?php }else if($ptype=="IPP"){
	$q=mysql_query("select * from  referal_doctor where refcode='$refdoct'") or die(mysql_error());
							
							$kt=mysql_fetch_array($q);
							$ref_docname1=$kt['ref_docname'];
							 $doctorshare1=$kt['doctorshare'];
							
							 ?>

<table align="center">
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Amount Collection From IP Patient Registration </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="4" style="text-align:center">Dr. <?php echo $ref_docname1; ?></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Bill Date</b></td>
                           
                           
						<td align="center"><b>Total Amount</b></td>
							
                            <td align="center"><b>Share(<?php echo $doctorshare1; ?>)%</b></td>
							
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
					$T="select distinct a.registerno,a.gender,a.tokenno,a.patientname,a.pat_type,a.age,a.total,a.phoneno,a.ref_doc,a.date,b.ref_docname,b.refcode,b.doctorshare,c.PAT_NO,c.PAT_REGNO,d.ADV_AMT from patientregister a,referal_doctor b,ip_pat_admit c,adv_collection d where  a.ref_doc=b.refcode and a.ref_doc='$refdoct' and  c.PAT_NO=d.PAT_NO and c.PAT_REGNO=a.registerno and  a.date between '$sdate1' and '$edate1' order by a.registerno asc";
						$qry=mysql_query($T) or die(mysql_error());
						if($qry){
						$i=0;
						$total1=0;
						$sr=0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 
							 
							 $bno = $res['registerno'];
							 $pname = $res['patientname'];
							 $phoneno=$res['phoneno'];
							 $age = $res['age'];
							 $sex = $res['gender'];
							 $tokenno = $res['tokenno'];
							 $ptype = $res['pat_type'];
							 $doctorshare= $res['doctorshare'];
							 $total = $res['ADV_AMT'];
							 $total1=$total1+$total;
							 $date1 = $res['date'];
							 $ref_docname=$res['ref_docname'];
							
							
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $bno ?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $age."/".$sex ?></td>
                            
                               <td align="center"><?php echo $date ?></td>
                         
                          <td align="center"><?php echo $total ?></td>
                            
                             
                            
                            <td align="center"><?php
							
							echo $share=($total*$doctorshare1)/100;
							
							$sr=$sr+$share;
							
							
							 
							// $share5=$share5+$share;
							   ?> </td>
                          
                           
                        
						</tr>
                       <?php } }?>
					   <tr>
                            <td align="center"></td>
                            
                             
                             <td align="center"></td>
                             <td align="center"></td>
                              <td align="center"></td>
                             <td align="center"></td>
                            <td align="center"><b>Total</b></td>
							<?php
							$t1=number_format($total1,2);
							//$ops1=number_format($ops,2);
							
							//$tt1=number_format($tst,2);
							$share11=number_format($sr,2);
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t1 ?></b></td>
                          
                            <td align="center" style="padding-right:20px;"><b><?php echo $share11 ?></b></td>
                            
                        
						</tr>
						
						
						
						
						  <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct a.BillNO,a.BillDate,a.PatientName,a.NetAmount,a.PaidAmount,a.BalanceAmount,b.conce_type from bill where BillDate between '$sdate1' and '$edate1'";
						  $qry2="select distinct a.BillNO,a.BillDate,sum(a.NetAmount) as NetAmount ,sum(a.PaidAmount) as paid,sum(a.BalanceAmount) as balance ,b.pat_type from bill1 a,bill b  where b.pat_type='OP' and  a.BillNO=b.BillNO and b.conce_type='General' and a.BillDate between '$sdate1' and '$edate1'";
						$qry=mysql_query($qry2);
						if($qry){
						
					 	 $res=mysql_fetch_array($qry);
								
							 //$bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							// $bno = $res['BillNO'];
							// $pname = $res['PatientName'];
							// $conce_type = $res['conce_type'];
							 $total = $res['NetAmount'];
							 $paid = $res['paid'];
							 $bal = $res['balance'];
							// $total1 = ($total1+$total);
							// $paid1 = ($paid1+$paid);
							// $bal1 = ($bal1+$bal);
							// $i++;
						 ?>
                        
                       <?php } //}?>
					   
						
						
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
        <?php }
		
		
		
		
		else if($ptype=="OPL"){
			$q=mysql_query("select * from  referal_doctor where refcode='$refdoct'") or die(mysql_error());
							
							$kt=mysql_fetch_array($q);
							$ref_docname1=$kt['ref_docname'];
							$oplabshare=$kt['oplabshare'];
			?>
			<table align="center">
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Amount Collection From OP Lab Bill</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="5" style="text-align:center"><?php echo $ref_docname1; ?></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Bill Date</b></td>
                            <td align="center"><b>Patient Type</b></td>
                            
						
							<td align="center"><b>Total Amount</b></td>
                            <td align="center"><b>Share (<?php echo $oplabshare; ?>)%</b></td>
							
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						 $qry1="select distinct a.mrno, a.BillNO,a.BillDate,a.PatientName,a.NetAmount,a.PaidAmount,a.BalanceAmount,a.ptype,a.Age,a.Sex,b.phoneno,b.BillDate,b.ptype from bill1 a,bill b  where b.ptype='OP' and  a.BillNO=b.BillNO and a.BillDate between '$sdate1' and '$edate1' order by a.mrno asc";
						$qry=mysql_query($qry1);
						if($qry){
						$i=0;
						$total1 =0;
						$oplabshare1 =0;
						$bal1 = 0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 $bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							 $bno = $res['BillNO'];
							 $pname = $res['PatientName'];
							 $mrno = $res['mrno'];
							 $total = $res['NetAmount'];
							 $Age = $res['Age'];
							 $Sex = $res['Sex'];
							  $ptype = $res['ptype'];
							  $phoneno=$res['phoneno'];
							  $BillDate=$res['BillDate'];
							 $total1 = ($total1+$total);
							 $share = ($total*$oplabshare)/100;
							 $oplabshare1=$oplabshare1+$share;
							 //$bal1 = ($bal1+$bal);
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $mrno ?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $Age."/".$Sex ?></td>
                            
                               <td align="center"><?php echo $BillDate ?></td>
                          <td align="center"><?php echo $ptype ?></td>
                            
                            <td align="center"><?php echo $total ?></td>
                             <td align="center"><?php echo $share ?></td>
                          
                           
                        
						</tr>
                       <?php } }?>
					   <tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
							 <td align="center"></td>
                              <td align="center"></td>
                             <td align="center"></td>
                            <td align="center"><b>Total</b></td>
							<?php
							$t1=number_format($total1,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t1 ?></b></td>
                           <?php
							$t2=number_format($oplabshare1,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t2 ?></b></td>
                        
						</tr>
						
						
						
						
						  <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct a.BillNO,a.BillDate,a.PatientName,a.NetAmount,a.PaidAmount,a.BalanceAmount,b.conce_type from bill where BillDate between '$sdate1' and '$edate1'";
						  $qry2="select distinct a.BillNO,a.BillDate,sum(a.NetAmount) as NetAmount ,sum(a.PaidAmount) as paid,sum(a.BalanceAmount) as balance ,b.pat_type from bill1 a,bill b  where b.pat_type='IP' and  a.BillNO=b.BillNO and b.conce_type='General' and a.BillDate between '$sdate1' and '$edate1'";
						$qry=mysql_query($qry2);
						if($qry){
						
					 	 $res=mysql_fetch_array($qry);
								
							 //$bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							// $bno = $res['BillNO'];
							// $pname = $res['PatientName'];
							// $conce_type = $res['conce_type'];
							 $total = $res['NetAmount'];
							 $paid = $res['paid'];
							 $bal = $res['balance'];
							// $total1 = ($total1+$total);
							// $paid1 = ($paid1+$paid);
							// $bal1 = ($bal1+$bal);
							// $i++;
						 ?>
                        
                       <?php } //}?>
					   
						
						
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
			
		<?php	}else if($ptype=="IPL"){
			$q=mysql_query("select * from  referal_doctor where refcode='$refdoct'") or die(mysql_error());
							
							$kt=mysql_fetch_array($q);
							$ref_docname1=$kt['ref_docname'];
							$oplabshare=$kt['iplabshare'];
			?>
			<table align="center">
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Amount Collection From IP Lab Bill</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="5" style="text-align:center"><?php echo $ref_docname1; ?></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Bill Date</b></td>
                            <td align="center"><b>Patient Type</b></td>
                            
						
							<td align="center"><b>Total Amount</b></td>
                            <td align="center"><b>Share (<?php echo $oplabshare; ?>)%</b></td>
							
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						 $qry1="select distinct a.mrno, a.BillNO,a.BillDate,a.PatientName,a.NetAmount,a.PaidAmount,a.BalanceAmount,a.ptype,a.Age,a.Sex,b.phoneno,b.BillDate,b.ptype from bill1 a,bill b  where b.ptype='IP' and  a.BillNO=b.BillNO and a.BillDate between '$sdate1' and '$edate1' order by a.mrno asc";
						$qry=mysql_query($qry1);
						if($qry){
						$i=0;
						$total1 =0;
						$oplabshare1 =0;
						$bal1 = 0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 $bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							 $bno = $res['BillNO'];
							 $pname = $res['PatientName'];
							 $mrno = $res['mrno'];
							 $total = $res['NetAmount'];
							 $Age = $res['Age'];
							 $Sex = $res['Sex'];
							  $ptype = $res['ptype'];
							  $phoneno=$res['phoneno'];
							  $BillDate=$res['BillDate'];
							 $total1 = ($total1+$total);
							 $share = ($total*$oplabshare)/100;
							 $oplabshare1=$oplabshare1+$share;
							 //$bal1 = ($bal1+$bal);
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $mrno ?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $Age."/".$Sex ?></td>
                            
                               <td align="center"><?php echo $BillDate ?></td>
                          <td align="center"><?php echo $ptype ?></td>
                            
                            <td align="center"><?php echo $total ?></td>
                             <td align="center"><?php echo $share ?></td>
                          
                           
                        
						</tr>
                       <?php } }?>
					   <tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
							 <td align="center"></td>
                              <td align="center"></td>
                             <td align="center"></td>
                            <td align="center"><b>Total</b></td>
							<?php
							$t1=number_format($total1,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t1 ?></b></td>
                           <?php
							$t2=number_format($oplabshare1,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t2 ?></b></td>
                        
						</tr>
						
						
						
						
						  <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct a.BillNO,a.BillDate,a.PatientName,a.NetAmount,a.PaidAmount,a.BalanceAmount,b.conce_type from bill where BillDate between '$sdate1' and '$edate1'";
						  $qry2="select distinct a.BillNO,a.BillDate,sum(a.NetAmount) as NetAmount ,sum(a.PaidAmount) as paid,sum(a.BalanceAmount) as balance ,b.pat_type from bill1 a,bill b  where b.pat_type='IP' and  a.BillNO=b.BillNO and b.conce_type='General' and a.BillDate between '$sdate1' and '$edate1'";
						$qry=mysql_query($qry2);
						if($qry){
						
					 	 $res=mysql_fetch_array($qry);
								
							 //$bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							// $bno = $res['BillNO'];
							// $pname = $res['PatientName'];
							// $conce_type = $res['conce_type'];
							 $total = $res['NetAmount'];
							 $paid = $res['paid'];
							 $bal = $res['balance'];
							// $total1 = ($total1+$total);
							// $paid1 = ($paid1+$paid);
							// $bal1 = ($bal1+$bal);
							// $i++;
						 ?>
                        
                       <?php } //}?>
					   
						
						
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
			
		<?php	}else{?>
			
			
			<table align="center">
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Amount Collection</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="4" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Bill Date</b></td>
                            <td align="center"><b>Patient Type</b></td>
                            
						
							<td align="center"><b>Total Amount</b></td>
							
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysql_query("select distinct a.registerno,a.gender,a.tokenno,a.patientname,a.pat_type,a.age,a.total,a.phoneno,a.ref_doc,a.date,b.ref_docname,b.refcode from patientregister a,referal_doctor b where a.ref_doc=b.refcode and a.date between '$sdate1' and '$edate1' order by a.registerno asc");
						if($qry){
						$i=0;
						$total1=0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 
							 
							 $bno = $res['registerno'];
							 $pname = $res['patientname'];
							  $phoneno=$res['phoneno'];
							 $age = $res['age'];
							 $sex = $res['gender'];
							 $tokenno = $res['tokenno'];
							 $ptype = $res['pat_type'];
							  $total = $res['total'];
							$total1=$total1+$total;
							 $date1 = $res['date'];
							
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $bno ?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $age."/".$sex ?></td>
                            
                               <td align="center"><?php echo $date ?></td>
                          <td align="center"><?php echo $ptype."/". $tokenno ?></td>
                            
                            <td align="center"><?php echo $total ?></td>
                          
                           
                        
						</tr>
                       <?php } }?>
					   <tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
							 <td align="center"></td>
                              <td align="center"></td>
                             <td align="center"></td>
                            <td align="center"><b>Total</b></td>
							<?php
							$t1=number_format($total1,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t1 ?></b></td>
                           
                            
                        
						</tr>
						
						
						
						
						  <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct a.BillNO,a.BillDate,a.PatientName,a.NetAmount,a.PaidAmount,a.BalanceAmount,b.conce_type from bill where BillDate between '$sdate1' and '$edate1'";
						  $qry2="select distinct a.BillNO,a.BillDate,sum(a.NetAmount) as NetAmount ,sum(a.PaidAmount) as paid,sum(a.BalanceAmount) as balance ,b.conce_type from bill1 a,bill b  where  a.BillNO=b.BillNO and b.conce_type='General' and a.BillDate between '$sdate1' and '$edate1'";
						$qry=mysql_query($qry2);
						if($qry){
						
					 	 $res=mysql_fetch_array($qry);
								
							 //$bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							// $bno = $res['BillNO'];
							// $pname = $res['PatientName'];
							// $conce_type = $res['conce_type'];
							 $total = $res['NetAmount'];
							 $paid = $res['paid'];
							 $bal = $res['balance'];
							// $total1 = ($total1+$total);
							// $paid1 = ($paid1+$paid);
							// $bal1 = ($bal1+$bal);
							// $i++;
						 ?>
                        
                       <?php } //}?>
					   
						
						
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
			
		<?php	}?>
    </body>
</html>
