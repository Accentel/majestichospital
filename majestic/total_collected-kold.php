<?php
include("config.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 $partic=$_GET['partic'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Patients Report</title>
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

 
?>
<table >
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>


</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Daily Collected Amount  List</td>
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
							<td align="center"><b>Bill.No.</b></td>
                           
                          <td align="center"><b>UMR No.</b></td>
                          <td align="center"><b>Pat Name.</b></td>
                           <td align="center"><b>Doct Name.</b></td>
                           <td align="center"><b>Payment Type</b></td>
                           
                            
                            
                              
                               <td align="center"><b>Amount.</b></td>
                                 <td align="center"><b>Cash/Card.</b></td>
                            
                            <td align="center"><b>Received By</b></td>
							
                           
                            
							
                            
							
						</tr>
                        <?php
						
                     if($partic!='' and $sdate1!='1970-01-01' and $edate1!='1970-01-01'){
						 $x1="select * from daily_amount where date(date1) between '$sdate1' and '$edate1' and amnt_type='$partic' and amnt_type!='Pharmacy' order by id desc";
						$qry=mysql_query($x1);
						
					 } else   if( $sdate1!='1970-01-01' and $edate1!='1970-01-01'){
						$qry=mysql_query("select * from daily_amount where date(date1) between '$sdate1' and '$edate1' and amnt_type!='Pharmacy' order by id desc");
						
					 }
					 
					 else   if( $partic!=''){
						  $x="select * from daily_amount where amnt_type='$partic' and amnt_type!='Pharmacy' order by id desc";
						$qry=mysql_query($x);
						
					 }
						if($qry){
						$i=0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 
							 
							 $bno = $res['mrnum'];
							 $amount = $res['amount'];
							  $amnt_type=$res['amnt_type'];
							 
							
							 $recv_by=$res['recv_by'];
							$date1 = $res['date1'];
							$pay_tpe=$res['pay_type'];
							$amnt_desc=$res['amnt_desc'];
							$bill_num=$res['bill_num'];
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $bill_num ?></td>
                             <?php /*?><td align="center"><?php echo $date; ?></td><?php */?>
                             <td align="center"><?php echo $bno; ?></td>
                             <?php 
							  $sd="select * from patientregister where registerno='$bno' and bill_num='$bill_num'";
							 $ss=mysql_query($sd);
							 $r=mysql_fetch_array($ss);
							 $pat=$r['patientname'];?>
                          
                           
                           <?php if($amnt_type=='Advance Collection'){ 
						    $a="select d.dname1,e.patientname from daily_amount a,ip_pat_admit b,adv_collection c,doct_infor d,patientregister e
			 where   a.amnt_type='Advance Collection'  and a.bill_num='$bill_num' and  c.bill_num='$bill_num'  and c.PAT_NO=b.PAT_NO and d.id=b.doc_code and e.registerno='$bno'";
                           $ssk=mysql_query($a);
							 $rk=mysql_fetch_array($ssk);
							 $dname=$rk['dname1'];
							 ?>
                            <td align="center"><?php echo $rk['patientname']; ?></td>
                           <td align="center"><?php echo $dname ?></td>
                           
                           <?php } else if($amnt_type=='In Patient'){ 
						    $a="select d.dname1,e.patientname from daily_amount a,ip_pat_admit b,doct_infor d,patientregister e
			 where   a.amnt_type='In Patient'  and a.bill_num='$bill_num' and  b.bill_num='$bill_num'   and d.id=b.doc_code and
			  b.PAT_REGNO=e.registerno and e.registerno='$bno'";
                           $ssk=mysql_query($a);
							 $rk=mysql_fetch_array($ssk);
							 $dname=$rk['dname1'];
							 $pat1=$rk['patientname'];
							 ?>
                            <td align="center"><?php echo $pat1 ?></td>
                           <td align="center"><?php echo $dname ?></td>
                           
                         
                           
                           
                           
                           
                           <?php } else if($amnt_type=='Lab'){ 
						    $a="select b.PatientName,b.DoctorName from daily_amount a,bill b,bill1 d
			 where   a.amnt_type='Lab'  and a.bill_num='$bill_num'   and d.cnt='$bill_num' and d.BillNO=b.BillNO";
                           $ssk=mysql_query($a);
							 $rk=mysql_fetch_array($ssk);
							 $dname=$rk['dname1'];
							 $PatientName=$rk['PatientName'];
							 
							 ?>
                            <td align="center"><?php echo $PatientName; ?></td>
                           <td align="center"><?php echo $rk['DoctorName']; ?></td>
                           
                           <?php } else {?>
							   <td align="center"><?php echo $r['patientname']; ?></td>
						 <td align="center"><?php echo $r['doctorname']; ?></td><?php }?>
                           
                             
                             
                             
                              <td align="center"><?php echo $am=$amount; ?></td>
                            <td align="center"><?php  if($amnt_type=='Patient Register'){    ?>  <?php echo $amnt_desc ;} else {
								echo $amnt_type;}
								?></td>
                            
                            <td align="center"><?php echo $pay_tpe; ?></td>
                            <td align="center"><?php echo $recv_by; ?></td>
                             
                        
                            
                           
                          
                           
                        
						</tr>
                       <?php 
					   
					   $am1=$am+$am1;} }?>
                       
                       
                       <tr><td colspan="5" align="right"><strong>Total</strong></td>
                       <td colspan="1" align="center"><strong><?php echo $am1?></strong></td><td colspan="2"></td></tr>
					   
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
	<!--<tr>
	<td align="right"><img src="images/images.png"/></td>
	</tr>
-->
<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
    </body>
</html>
