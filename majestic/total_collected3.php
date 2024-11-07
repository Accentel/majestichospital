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
                <td class="header">Daily Pharmacy Amount Collected List</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr style="background:#CCC">
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="center" colspan="5" style="text-align:center"><b>Sales Entry</b></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>Bill.No.</b></td>
                           
                          <td align="center"><b>UMR/Out Side.</b></td>
                          <td align="center"><b>Pat Name.</b></td>
						  <td align="center"><b>Doct Name.</b></td>
						   <td align="center"><b>Total.</b></td>
						    <td align="center"><b>Discount.</b></td>
						  
						  <td align="center" colspan="2"><b>Net Amount.</b></td>
						  
                           
                           <td align="center"><b>User.</b></td>
                           </tr>
						   <tr><td colspan="6"></td>
						<td align="center"><b>Cash.</b></td>
						<td align="center"><b>Card.</b></td>
						<td colspan="2"></td>
                         
						</tr>
                        <?php
						$am1=0;
						$pm1=0;
						$am=0;
						$pm=0;
                     if($partic!='' and $sdate1!='1970-01-01' and $edate1!='1970-01-01'){
						 $x1="select * from daily_amount1 where date(date_time) between '$sdate1' and '$edate1'  order by id desc";
						$qry=mysqli_query($link,$x1)or die(mysqli_error($link));
						
					 } else   if( $sdate1!='1970-01-01' and $edate1!='1970-01-01'){
						 $a="select * from daily_amount1 where date(date_time) between '$sdate1' and '$edate1'  order by id desc";
						$qry=mysqli_query($link,$a)or die(mysqli_error($link));
						
					 }
					 
					 else   if( $partic!=''){
						  $x="select * from daily_amount1 where   date(date_time) between '$sdate1' and '$edate1' order by id desc";
						$qry=mysqli_query($link,$x)or die(mysqli_error($link));
						
					 }
						if($qry){
						$i=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $bno = $res['mrnum'];
							 $amount = $res['amount'];
							  $amnt_type=$res['amnt_type'];
							 
							
							 $recv_by=$res['recv_by'];
							$date1 = $res['date1'];
							$pay_tpe=$res['pay_type'];
							$amnt_desc=$res['amnt_desc'];
							$bill_num=$res['bill_num'];
							$date=date('d-m-Y',strtotime($date1));
							$bill_date=date('Y-m-d',strtotime($date1));
							$name=$res['name'];
							$doct_name=$res['doct_name'];
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $bill_num ?></td>
                             <?php /*?><td align="center"><?php echo $date; ?></td><?php */?>
                             <td align="center"><?php echo $bno; ?></td>
                             <?php 
							   $sd="select * from patientregister where registerno='$bno'  ";
							 $ss=mysqli_query($link,$sd)or die(mysqli_error($link));
							 $r=mysqli_fetch_array($ss);
							 $pat=$r['patientname'];
							 $doctorname=$r['doctorname'];
							 
							 ?>
                          
                          <?php 
							   $sd="select * from phr_salent_mast where sr_bill_num='$bill_num'  ";
							 $ss=mysqli_query($link,$sd)or die(mysqli_error($link));
							 $r=mysqli_fetch_array($ss);
							 $total=$r['total'];
							 $spl_dis=$r['spl_dis'];
							 
							 ?>
						
				
						 
                            <td align="center"><?php echo $name ?></td>
                           <td align="center"><?php echo $doct_name ?></td>
                             
                              <td align="center"><?php echo $total+$spl_dis; ?></td>
							   <td align="center"><?php echo $spl_dis ?></td>
                            
                            <td align="center"><?php if($pay_tpe=='Cash'){ echo $am=$amount; } else { echo $am=0;}?>
							
							</td>
							<td align="center"><?php if($pay_tpe=='Card'){ echo $pm=$amount; } else {echo $pm=0;}?>
							
							</td>
                            <td align="center"><?php echo $recv_by; ?></td>
                        
						</tr>
                       <?php 
					   
					   $am1=$am+$am1;
					   $pm1=$pm+$pm1;
					   $tt=$total+$tt;
					   $sp=$spl_dis+$sp;
					   } }?>
                       
                       
                       <tr><td colspan="4" align="right"><strong>Total</strong></td>
                       <td colspan="1" align="center"><strong><?php echo $tt+$sp?></strong></td>
					   <td colspan="1" align="center"><strong><?php echo $sp?></strong></td>
					   
					    <td colspan="1" align="center"><strong><?php echo $am1?></strong></td>
						 <td colspan="1" align="center"><strong><?php echo $pm1?></strong></td>
					   <td colspan=""><strong><?php echo $am1+$pm1;?></strong></td></tr>
					   
                    </table>
                </td>
            </tr>
			
			
			
			
			
			
			<tr><td><hr></td></tr>
			
			<table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr style="background:#CCC">
                            <td align="center" colspan="6"><b>Sales Return   </b></td>
                           
                        </tr>
                        <tr>
							<td align="center"><b>Return Bill</b></td>
                           
                          <td align="center"><b>Ref Bill.</b></td>
                          <td align="center"><b>Pat Name.</b></td>
						
						  <td align="center" colspan="2"><b>Amount.</b></td>
						  
                           
                           <td align="center"><b>User.</b></td>
                           </tr>
						   <tr><td colspan="3"></td>
						<td align="center"><b>Cash.</b></td>
						<td align="center"><b>Card.</b></td>
						<td colspan="2"></td>
                     	</tr>
                        <?php
						$amk1=0;
						$pmk1=0;
						$am=0;
						$pm=0;
                     if($partic!='' and $sdate1!='1970-01-01' and $edate1!='1970-01-01'){
						 $x1="select * from daily_amount2 where date(date_time) between '$sdate1' and '$edate1'  order by id desc";
						$qry=mysqli_query($link,$x1)or die(mysqli_error($link));
						
					 } else   if( $sdate1!='1970-01-01' and $edate1!='1970-01-01'){
						 $a="select * from daily_amount2 where date(date_time) between '$sdate1' and '$edate1'  order by id desc";
						$qry=mysqli_query($link,$a)or die(mysqli_error($link));
						
					 }
					 
					 else   if( $partic!=''){
						  $x="select * from daily_amount2 where   date(date_time) between '$sdate1' and '$edate1' order by id desc";
						$qry=mysqli_query($link,$x)or die(mysqli_error($link));
						
					 }
						if($qry){
						$i=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $bill_num = $res['bill_num'];
							 $sal_bil_num = $res['sal_bil_num'];
							  $amnt_type=$res['amnt_type'];
							  $paid=$res['amount'];
							 $name=$res['name'];
							
							 $recv_by=$res['recv_by'];
							//$date1 = $res['date1'];
							//$pay_tpe=$res['pay_type'];
							//$amnt_desc=$res['amnt_desc'];
							//$bill_num=$res['bill_num'];
							//$date=date('d-m-Y',strtotime($date1));
							//$bill_date=date('Y-m-d',strtotime($date1));
							//$name=$res['name'];
							//$doct_name=$res['doct_name'];
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $bill_num?></td>
                             <?php /*?><td align="center"><?php echo $date; ?></td><?php */?>
                             <td align="center"><?php echo $sal_bil_num; ?></td>
                            
                          
                         
						
				
						 
                            <td align="center"><?php echo $name ?></td>
                           <!--<td align="center"><?php echo $doct_name ?></td>-->
                             
                             
                             
                             
                           <!-- <td align="center"><?php  if($amnt_type=='Patient Register'){    ?>  <?php echo $amnt_desc ;} else {
								echo $amnt_type;}
								?></td>-->
                            
                            <td align="center"><?php if($amnt_type=='C'){ echo $am=$paid; } else { echo $am=0;}?>
							
							</td>
							<td align="center"><?php if($amnt_type=='D'){ echo $pm=$paid; } else {echo $pm=0;}?>
							
							</td>
                            <td align="center"><?php echo $recv_by; ?></td>
                             
                        
                            
                           
                          
                           
                        
						</tr>
                       <?php 
					   
					   $amk1=$am+$amk1;
					   $pmk1=$pm+$pmk1;} 
					   }?>
                       
                       
                       <tr><td colspan="3" align="right"><strong>Total</strong></td>
                       <td colspan="1" align="center"><strong><?php echo $amk1?></strong></td>
					   <td colspan="1" align="center"><strong><?php echo $pmk1?></strong></td>
					   <td colspan=""><strong><?php echo $amk1+$pmk1;?></strong></td></tr>
					   
                    </table>
			
			
			
			
			
			
			
			<tr><td><hr></td></tr>
			
			<table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr style="background:#CCC">
                            <td align="center" colspan="6" ><b>Purchase Entry  </b></td>
                           
                        </tr>
                        <tr>
							<td align="center"><b>Pyment</b></td>
                           
                          <td align="center"><b>Invoice No.</b></td>
                          <td align="center"><b>Sup Name.</b></td>
						
						  <td align="center" colspan="2"><b>Amount.</b></td>
						  
                           
                           <td align="center"><b>User.</b></td>
                           </tr>
						   <tr><td colspan="3"></td>
						<td align="center"><b>Cash.</b></td>
						<td align="center"><b>Card.</b></td>
						<td colspan="2"></td>
                            
                            
                              
                               
                                
							
                           
                            
							
                            
							
						</tr>
                        <?php
						$amj1=0;
						$pmj1=0;
						$am=0;
						$pm=0;
                     if($partic!='' and $sdate1!='1970-01-01' and $edate1!='1970-01-01'){
						 $x1="select * from phr_purinv_mast where date(INV_DATE) between '$sdate1' and '$edate1'  order by LR_NO desc";
						$qry=mysqli_query($link,$x1)or die(mysqli_error($link));
						
					 } else   if( $sdate1!='1970-01-01' and $edate1!='1970-01-01'){
						 $a="select * from phr_purinv_mast where date(INV_DATE) between '$sdate1' and '$edate1'  order by LR_NO desc";
						$qry=mysqli_query($link,$a)or die(mysqli_error($link));
						
					 }
					 
					 else   if( $partic!=''){
						  $x="select * from phr_purinv_mast where   date(INV_DATE) between '$sdate1' and '$edate1' order by LR_NO desc";
						$qry=mysqli_query($link,$x)or die(mysqli_error($link));
						
					 }
						if($qry){
						$i=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $SUPPL_INV_NO = $res['SUPPL_INV_NO'];
							 $SUPPL_CODE = $res['SUPPL_CODE'];
							  $amnt_type=$res['PUR_TYPE'];
							  $paid=$res['paid'];
							 
							
							 $recv_by=$res['REC_BY'];
							//$date1 = $res['date1'];
							//$pay_tpe=$res['pay_type'];
							//$amnt_desc=$res['amnt_desc'];
							//$bill_num=$res['bill_num'];
							//$date=date('d-m-Y',strtotime($date1));
							//$bill_date=date('Y-m-d',strtotime($date1));
							//$name=$res['name'];
							//$doct_name=$res['doct_name'];
							 $i++;
						 ?>
                        <tr>
                            <td align="center">PAYMT#<?php echo $i ?></td>
                             <?php /*?><td align="center"><?php echo $date; ?></td><?php */?>
                             <td align="center"><?php echo $SUPPL_INV_NO; ?></td>
                             <?php 
							   $sd="select * from phr_supplier_mast where SUPPL_CODE='$SUPPL_CODE'  ";
							 $ss=mysqli_query($link,$sd)or die(mysqli_error($link));
							 $r=mysqli_fetch_array($ss);
							 $SUPPL_NAME=$r['SUPPL_NAME'];
							 //$doctorname=$r['doctorname'];
							 
							 ?>
                          
                         
						
				
						 
                            <td align="center"><?php echo $SUPPL_NAME ?></td>
                           <!--<td align="center"><?php echo $doct_name ?></td>-->
                             
                             
                             
                             
                           <!-- <td align="center"><?php  if($amnt_type=='Patient Register'){    ?>  <?php echo $amnt_desc ;} else {
								echo $amnt_type;}
								?></td>-->
                            
                            <td align="center"><?php if($amnt_type=='C'){ echo $am=$paid; } else { echo $am=0;}?>
							
							</td>
							<td align="center"><?php if($amnt_type=='B'){ echo $pm=$paid; } else {echo $pm=0;}?>
							
							</td>
                            <td align="center"><?php echo $recv_by; ?></td>
                             
                        
                            
                           
                          
                           
                        
						</tr>
                       <?php 
					   
					   $amj1=$am+$amj1;
					   $pmj1=$pm+$pmj1;} 
					   }?>
                       
                       
                       <tr><td colspan="3" align="right"><strong>Total</strong></td>
                       <td colspan="1" align="center"><strong><?php echo $amj1?></strong></td>
					   <td colspan="1" align="center"><strong><?php echo $pmj1?></strong></td>
					   <td colspan=""><strong><?php echo $amj1+$pmj1;?></strong></td></tr>
					   
					   
					   	<tr><td colspan="6"><hr></td></tr>
					    <tr>
							<td align="center" colspan="3"><b>TOTAL CASH AND CARD COLLECTION</b></td>
                           
                        
						  <td align="center" colspan=""><b><?php echo $x=$am1-$amk1-$amj1?></b></td>
						    <td align="center" colspan=""><b><?php echo $x1=$pm1-$pmk1-$pmj1?></b></td>
                           
                           <td align="center"><b><?php echo $x+$x1;?></b></td>
                           </tr>
					   
                    </table>
			
			 	<tr><td colspan=""><hr></td></tr>
			
		
			
			
			<table cellpadding="4" cellspacing="0" width="100%" border="1">
                       
                       
			<tr>
                            <td align="center" colspan="3"><b>USER CASH COLLECTION  REPORT  </b></td>
                           
                        </tr>
						<tr style="background:#CCC"><td colspan="3" align="center"><b>Sales Entry</b></td></tr>
                        <tr>
							<td align="center"><b>User </b></td>
                           
                          <td align="center"><b>Cash.</b></td>
                          <td align="center"><b>Card.</b></td>
						
						  
                           </tr>
						   <tr>
						 <?php 
						     $x=mysqli_query($link,"select distinct recv_by from daily_amount1 where   date(date_time) between '$sdate1' and '$edate1' order by id desc")or die(mysqli_error($link));
						while($qry=mysqli_fetch_array($x)){
						$user=$qry['recv_by'];
						?>
						     <td><?php echo $qry['recv_by'];?></td>
							 <td><?php 
							  $a1="select sum(amount) as amt from daily_amount1 where   date(date_time) between '$sdate1' and '$edate1' and recv_by='$user' and pay_type='Cash' order by id desc";
							 $x1=mysqli_query($link,$a1)or die(mysqli_error($link));
						   $r3=mysqli_fetch_array($x1);
						   echo $cash=$r3['amt'];?></td>
						   <td><?php $x1=mysqli_query($link,"select sum(amount) as amt from daily_amount1 where   date(date_time) between '$sdate1' and '$edate1' and recv_by='$user' and pay_type='Card' order by id desc")or die(mysqli_error($link));
						   $r3=mysqli_fetch_array($x1);
						   echo $card=$r3['amt'];?></td></tr>	
						   <?php }?>
						   
						   <tr style="background:#CCC"><td colspan="3" align="center"><b>Sales Return</b></td></tr>
						   <tr>
							<td align="center"><b>User </b></td>
                           
                          <td align="center"><b>Cash.</b></td>
                          <td align="center"><b>Card.</b></td>
						
						  
                           </tr>	
						   
						   <tr>
						 <?php 
						     $x=mysqli_query($link,"select distinct recv_by from daily_amount2 where   date(date_time) between '$sdate1' and '$edate1' order by id desc")or die(mysqli_error($link));
						while($qry=mysqli_fetch_array($x)){
						 $user=$qry['recv_by'];
						?>
						     <td><?php echo $qry['recv_by'];?></td>
							 <td><?php
 $a="select sum(amount) as amt from daily_amount2 where   date(date_time) between '$sdate1' and '$edate1' and recv_by='$user' and amnt_type='C' order by id desc";
							 $x1=mysqli_query($link,$a)or die(mysqli_error($link));
						   $r3=mysqli_fetch_array($x1);
						   echo $cash=$r3['amt'];?></td>
						   <td><?php $x1=mysqli_query($link,"select sum(amount) as amt from daily_amount2 where   date(date_time) between '$sdate1' and '$edate1' and recv_by='$user' and amnt_type='D' order by id desc")or die(mysqli_error($link));
						   $r3=mysqli_fetch_array($x1);
						   echo $card=$r3['amt'];?></td></tr>
						   
						   
						   <tr style="background:#CCC"><td colspan="3" align="center"><b>Purchase</b></td></tr>
						   
						   <tr>
							<td align="center"><b>User </b></td>
                           
                          <td align="center"><b>Cash.</b></td>
                          <td align="center"><b>Card.</b></td>
						
						  
                           </tr>
						   	<?php }?>
						   
						   <tr>
						 <?php 
						     $x=mysqli_query($link,"select * from phr_purinv_mast where date(INV_DATE) between '$sdate1' and '$edate1'  order by LR_NO desc")or die(mysqli_error($link));
						while($qry=mysqli_fetch_array($x)){
						 $user=$qry['REC_BY'];
						?>
						     <td><?php echo $qry['REC_BY'];?></td>
							 <td><?php $x1=mysqli_query($link,"select sum(paid) as amt from phr_purinv_mast where   date(INV_DATE) between '$sdate1' and '$edate1' and REC_BY='$user' and PUR_TYPE='C' order by LR_NO desc")or die(mysqli_error($link));
						   $r3=mysqli_fetch_array($x1);
						   echo $cash=$r3['amt'];?></td>
						   <td><?php $x1=mysqli_query($link,"select sum(paid) as amt from phr_purinv_mast where   date(INV_DATE) between '$sdate1' and '$edate1' and REC_BY='$user' and PUR_TYPE='Card' order by LR_NO desc")or die(mysqli_error($link));
						   $r3=mysqli_fetch_array($x1);
						   echo $card=$r3['amt'];?></td></tr>
						<?php }?>
						   
			
			</table>
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
