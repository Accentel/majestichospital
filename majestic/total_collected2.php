<?php
include("config.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 $partic=$_GET['partic'];
 
 $time="$sdate1 00:00:00";
 $time1="$sdate1 11:59:59"; 
 
 $time2="$sdate1 12:00:00";
 $time3="$sdate1 23:59:59";
 $new_date=date('d-m-Y',strtotime($edate)); 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Day wise summery</title>
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
.krk{font-weight:bold;}
.krk1{color:#FFF; background:#000;}
        </style>
    </head>
    <body>
<?php 
include("config.php");

 
?>
<table width="100%" align="center" >
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>


</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Employee Amount Collection Report - <?php echo $new_date?> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            
            
            <tr><td>
           
            
            
            
            <!--<table cellpadding="4" cellspacing="0" width="100%" border="1">
            <tr style="font-weight:bold;"><td>Pharmacy</td><td>Cash Recd + Swife Amt</td><td>Expenses</td>
            <td></td><td>Balance</td><td>Swife Pharmacy</td><td>Emergency</td></tr>
            <tr><td></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
            <tr><td>Morning Shift</td><td></td></tr>
               <tr><td>Evening Shift</td><td></td></tr>
               <tr><td>Total Shift</td><td></td></tr>
            </table>-->
            
            </td></tr>
            
            
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <?php /*?><tr>
                            <td align="right"><b>Date: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                          <td align="right" colspan="9" style="text-align:center"></td>
                           
                        </tr><?php */?>
                        <tr>
							
                            <td align="center"><b>Employee Name</b></td>
                          <td align="center" colspan="2"><b>Patient Register.</b>
                          
                          </td>
                          <td align="center" colspan="2"><b>IP.</b></td>
                           <td align="center" colspan="2"><b>Pharmacy.</b></td>
                           <td align="center" colspan="2"><b>Advance</b></td>
                           
                            
                            
                              
                               <td align="center" colspan="2"><b>Lab.</b></td>
                               <td align="center" colspan="2"><b>PKG Extra Servs.</b></td>
                               
                               <td align="center" colspan="2"><b>General CashBill.</b></td>
                               <td align="center" colspan="2"><b>Hospital Servs.</b></td>
                                
<td align="center" colspan="2"><b>PKG Final Bill.</b></td>
                               <td align="center" colspan="2"><b>Total.</b></td>
                               
                                 <!--<td align="center"><b>Cash/Card.</b></td>-->
                            
                           
							
                           
                            
							
                            
							
						</tr>
                        <tr><td></td><td>Morning</td><td>Evening</td>
                        <td>Morning</td><td>Evening</td>
                        <td>Morning</td><td>Evening</td>
                        <td>Morning</td><td>Evening</td>
                        <td>Morning</td><td>Evening</td>
                        <td>Morning</td><td>Evening</td>
                        <td>Morning</td><td>Evening</td>
                        <td>Morning</td><td>Evening</td>
                        <td>Morning</td><td>Evening</td>
                        <td>Morning</td><td>Evening</td>
                        </tr>
                        <?php
						
                     if($partic!='' and $sdate1!='1970-01-01'){
						 $x1="select * from daily_amount where date(date1)='$sdate1' and recv_by='$partic' order by id desc";
						$qry=mysql_query($x1);
					
						//if($qry){
						$i=0;
					 	$res=mysql_fetch_array($qry);
								
							 
							 
							 $bno = $res['mrnum'];
							 $amount = $res['amount'];
							  $amnt_type=$res['amnt_type'];
							 
							
							 $recv_by=$res['recv_by'];
							$date1 = $res['date1'];
							$pay_tpe=$res['pay_type'];
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                                <td align="center"><?php echo $recv_by; ?></td>
                            
                            
                             <?php 
							 $s="select sum(amount) as preg_mrng from daily_amount where recv_by='$partic' and date_time between '$time' and '$time1' and amnt_type='Patient Register' group by date(date_time)";
							 $ss=mysql_query($s);
							 $r=mysql_fetch_array($ss);?>
                           <td align="center"><?php echo $p=$r['preg_mrng']; ?></td>
                           
                           <?php 
							 $s="select sum(amount) as preg_evng from daily_amount where recv_by='$partic' and date_time between '$time2' and '$time3' and amnt_type='Patient Register' group by date(date_time)";
							 $ss=mysql_query($s);
							 $r=mysql_fetch_array($ss);?>
                            <td align="center"><?php echo $pe=$r['preg_evng']; ?></td>
                           <?php $ss=mysql_query("select sum(amount) as ip from daily_amount where recv_by='$partic' and amnt_type='In Patient' and date_time between '$time' and '$time1' group by date(date_time)");
							 $r1=mysql_fetch_array($ss);?>
                           
                           
                           <td align="center"><?php echo $ip=$r1['ip']; ?></td>
                           
                           <?php $ss=mysql_query("select sum(amount) as eip from daily_amount where recv_by='$partic' and amnt_type='In Patient' and date_time between '$time2' and '$time3' group by date(date_time)");
							 $r1=mysql_fetch_array($ss);?>
                           
                           
                           <td align="center"><?php echo $eip=$r1['eip']; ?></td>
                           
                           
                           <?php $ss=mysql_query("select sum(amount) as ip from daily_amount where recv_by='$partic' and amnt_type='In Patient' and date(date1)='$sdate1' group by date(date1)");
							 $r1=mysql_fetch_array($ss);?>
                           
                           
                           <td align="center"><?php echo $ip=$r1['ip']; ?></td>
                             
                              <?php $ss=mysql_query("select sum(amount) as pharmacy from daily_amount where recv_by='$partic' and amnt_type='Pharmacy' and date(date1)='$sdate1' group by date(date1)");
							 $r2=mysql_fetch_array($ss);?>
                             
                              <td align="center"><?php echo $ph=$r2['pharmacy']; ?></td>
                              
                              <?php $ss=mysql_query("select sum(amount) as advance from daily_amount where recv_by='$partic' and amnt_type='Advance Collection' and date(date1)='$sdate1' group by date(date1)");
							 $r3=mysql_fetch_array($ss);?>
                            <td align="center"><?php echo $ad=$r3['advance']; ?></td>
                             <?php $ss=mysql_query("select sum(amount) as lab from daily_amount where recv_by='$partic' and amnt_type='Lab' and date(date1)='$sdate1' group by date(date1)");
							 $r4=mysql_fetch_array($ss);?>
                            <td align="center"><?php echo $la=$r4['lab']; ?></td>
                            
                             
                        <td align="center"><?php echo $gr=$p+$ip+$ph+$ad+$la?></td>
                            
                           
                          
                           
                        
						</tr>
                       <?php 
					   
					   $p1=$p+$p1;
					   $ip1=$ip+$ip1;
					   $ph1=$ph+$ph1;
					   $ad1=$ad+$ad1;
					    $la1=$la+$la1;
						$gr1=$gr+$gr1;
						
						$pe1=$pe+$pe1;
						$eip1=$eip+$eip1;
					  ?>
                       
                       
                       <tr><td colspan="" align="right"><strong>Total</strong></td>
                       
                       <td colspan="1" align="center"><strong><?php echo $p1?></strong></td>
                       <td colspan="1" align="center"><strong><?php echo $pe1?></strong></td>
                       
                       <td colspan="1" align="center"><strong><?php echo $ip1?></strong></td>
                       <td colspan="1" align="center"><strong><?php echo $eip1?></strong></td>
                       <td colspan="1" align="center"><strong><?php echo $ph1?></strong></td>
                       <td colspan="1" align="center"><strong><?php echo $ad1?></strong></td>
                       <td colspan="1" align="center"><strong><?php echo $la1?></strong></td>
                        <td colspan="1" align="center"><strong><?php echo $gr1?></strong></td>
                       </tr>
                     
					   
                       
                       
                        <?php
						
						} else  if($partic=='' and $sdate1!='1970-01-01'){
							
							$x3=mysql_query("select distinct recv_by from daily_amount where date(date1)='$sdate1'");
							while($d=mysql_fetch_array($x3)){
								$i=1;
								$partic=$d['recv_by'];
								
							
						 $x1="select distinct recv_by from daily_amount where date(date1)='$sdate1' and recv_by='$partic' order by id desc";
						$qry=mysql_query($x1);
					
						//if($qry){
						
				$res=mysql_fetch_array($qry);
								
							 
							 
							
							
							 $recv_by=$res['recv_by'];
						
							 
						 ?>
                      <tr>
                          
                            
                             <td align="center"><?php echo $recv_by; ?></td>
                             <?php 
							 $s="select sum(amount) as pregister from daily_amount where recv_by='$partic' and amnt_type='Patient Register' and date(date1)='$sdate1' group by date(date1)";
							 $ss=mysql_query($s);
							 $r=mysql_fetch_array($ss);?>
                           <td align="center"><?php echo $p=$r['pregister']; ?></td>
                           <?php $ss=mysql_query("select sum(amount) as ip from daily_amount where recv_by='$partic' and amnt_type='In Patient' and date(date1)='$sdate1' group by date(date1)");
							 $r1=mysql_fetch_array($ss);?>
                           
                           
                           <td align="center"><?php echo $ip=$r1['ip']; ?></td>
                             
                              <?php $ss=mysql_query("select sum(amount) as pharmacy from daily_amount where recv_by='$partic' and amnt_type='Pharmacy' and date(date1)='$sdate1' group by date(date1)");
							 $r2=mysql_fetch_array($ss);?>
                             
                              <td align="center"><?php echo $ph=$r2['pharmacy']; ?></td>
                              
                              <?php $ss=mysql_query("select sum(amount) as advance from daily_amount where recv_by='$partic' and amnt_type='Advance Collection' and date(date1)='$sdate1' group by date(date1)");
							 $r3=mysql_fetch_array($ss);?>
                            <td align="center"><?php echo $ad=$r3['advance']; ?></td>
                             <?php 
							 $ds="select sum(amount) as lab from daily_amount where recv_by='$partic' and amnt_type='Lab' and date(date1)='$sdate1' group by date(date1)";
							 $ss=mysql_query($ds);
							 $r4=mysql_fetch_array($ss);?>
                            <td align="center"><?php echo $la=$r4['lab']; ?></td>
                             <?php 
							  $ds="select sum(amount) as pks from daily_amount where recv_by='$partic' and amnt_type='Package Extra Service' and date(date1)='$sdate1' group by date(date1)";
							 $ss=mysql_query($ds);
							 $r5=mysql_fetch_array($ss);?>
                            <td align="center"><?php echo $pk=$r5['pks']; ?></td>
                            
                             <?php 
							  $ds="select sum(amount) as gs from daily_amount where recv_by='$partic' and amnt_type='General CashBill' and date(date1)='$sdate1' group by date(date1)";
							 $ss=mysql_query($ds);
							 $r6=mysql_fetch_array($ss);?>
                            <td align="center"><?php echo $gs=$r6['gs']; ?></td>
                             <?php 
							  $ds="select sum(amount) as hsp from daily_amount where recv_by='$partic' and amnt_type='Hospital Service' and date(date1)='$sdate1' group by date(date1)";
							 $ss=mysql_query($ds);
							 $r7=mysql_fetch_array($ss);?>
                            <td align="center"><?php echo $hsp=$r7['hsp']; ?></td>
                             <?php 
							  $ds="select sum(amount) as pkf from daily_amount where recv_by='$partic' and amnt_type='Package FinalBill' and date(date1)='$sdate1' group by date(date1)";
							 $ss=mysql_query($ds);
							 $r8=mysql_fetch_array($ss);?>
                            <td align="center"><?php echo $pkf=$r8['pkf']; ?></td>
                            
                           
                            
                             
                        
                        <td align="center" class="krk"><?php echo $gr=$p+$ip+$ph+$ad+$la+$pk+$gs+$hsp+$pkf?></td>
                           
                          
                           
                        
						</tr>
                       <?php 
					   
					   //$am1=$am+$am1;
					  ?>
                       
                     
                       <?php
					        
					   $p1=$p+$p1;
					   $ip1=$ip+$ip1;
					   $ph1=$ph+$ph1;
					   $ad1=$ad+$ad1;
					    $la1=$la+$la1;
						$gr1=$gr+$gr1;
						$pk1=$pk+$pk1;
						$gs1=$gs+$gs1;
						$hsp1=$hsp+$hsp1;
						$pkf1=$pkf+$pkf1;
					    }
					   
					
							$i++;?>
                            
                            
                              
                         <tr class="krk1"><td colspan="" align="right"><strong>Total</strong></td>
                       
                       <td colspan="1" align="center"><strong><?php echo $p1?></strong></td>
                       <td colspan="1" align="center"><strong><?php echo $ip1?></strong></td>
                       <td colspan="1" align="center"><strong><?php echo $ph1?></strong></td>
                       <td colspan="1" align="center"><strong><?php echo $ad1?></strong></td>
                       <td colspan="1" align="center"><strong><?php echo $la1?></strong></td>
                        <td colspan="1" align="center"><strong><?php echo $pk1?></strong></td>
                        <td colspan="1" align="center"><strong><?php echo $gs1?></strong></td>
                        <td colspan="1" align="center"><strong><?php echo $hsp1?></strong></td>
                         <td colspan="1" align="center"><strong><?php echo $pkf1?></strong></td>
                        
                        <td colspan="1" align="center"><strong><?php echo $gr1?></strong></td>
                       </tr>
                       <?php }?>
                       
                       
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
