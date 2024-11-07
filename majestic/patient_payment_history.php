<?php
include("config.php");

 $mrno=$_GET['mrno'];
 
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
                <td class="header">Patient Payment History Report</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                <?php 
				$q="select a.ADV_AMT,a.PAT_NO,b.PAT_REGNO,b.PAT_NO,a.ADV_DATE,c.patientname,c.registerdate,c.gaurdianname,c.registerno,c.age,c.gender,c.phoneno,c.pat_type from adv_collection a,ip_pat_admit b,patientregister c  where a.PAT_NO=b.PAT_NO and b.PAT_REGNO=c.registerno and c.registerno='$mrno'";
				$r=mysqli_query($link,$q) or die(mysqli_error($link));
				$row=mysqli_fetch_array($r);
				$pname1=$row['patientname'];
				$PAT_NO=$row['PAT_NO'];
				$registerno=$row['registerno'];
				$phoneno=$row['phoneno'];
				$pat_type=$row['pat_type'];
				$gaurdianname=$row['gaurdianname'];
				$registerdate=$row['registerdate'];
				
				?>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>UMR No: </b></td>
                            <td align="left"><?php echo $registerno?> </td>
                            <td align="right"><b>Patient No</b></td>
                           
                            <td align="left"><?php echo $PAT_NO?></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Patient Name: </b></td>
                            <td align="left"><?php echo $pname1?> </td>
                            <td align="right"><b>Join Date</b></td>
                           
                            <td align="left"><?php echo $registerdate?></td>
                        </tr>
					    <tr>
                            <td align="right"><b>Father Name: </b></td>
                            <td align="left"><?php echo $gaurdianname?> </td>
                            <td align="right"><b>Phone No</b></td>
                           
                            <td align="left"><?php echo $phoneno?></td>
                        </tr>
                         <tr>
                            <td align="right"><b>Patient Type: </b></td>
                            <td align="left"><?php echo $pat_type?> </td>
                            
                        </tr>
                       					
                    </table>
                </td>
            </tr>
            
            <tr>
                <td class="header">Lab Amount Collection</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                       
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Bill Date</b></td>
                            <td align="center"><b>Patient Type</b></td>
                            
						
							<td align="center"><b>Paid Amount</b></td>
							
						</tr>
                        <?php
						
						$qry1="select distinct a.mrno,a.PatientName,a.Age,a.Sex,a.BillNO,a.ptype,a.PaidAmount,a.BillDate,b.phoneno from bill1 a,patientregister b where  a.mrno=b.registerno and a.mrno='$mrno' ";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysqli_query($link,$qry1) or die(mysqli_error($link));
						if($qry){
						$i=0;
						$total2=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $mrno = $res['mrno'];
							 $pname = $res['PatientName'];
							  $phoneno=$res['phoneno'];
							 $age = $res['Age'];
							 $sex = $res['Sex'];
							 $tokenno = $res['BillNO'];
							 $ptype = $res['ptype'];
							  $total = $res['PaidAmount'];
							$total2=$total2+$total;
							 $date1 = $res['BillDate'];
							
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $mrno ?></td>
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
							$t2=number_format($total2,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t2 ?></b></td>
                           
                            
                        
						</tr>
						
						
						
						
						 
						
						
						
                    </table>
                </td>
            </tr>
            <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Advance Amount Collection</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Bill Date</b></td>
                            <td align="center"><b>Patient Type</b></td>
                            
						
							<td align="center"><b>Paid Amount</b></td>
							
						</tr>
                        <?php
						
						$qry1="select a.ADV_AMT,a.PAT_NO,b.PAT_REGNO,b.PAT_NO,a.ADV_DATE,c.patientname,c.registerno,c.age,c.gender,c.phoneno,c.pat_type from adv_collection a,ip_pat_admit b,patientregister c  where a.PAT_NO=b.PAT_NO and b.PAT_REGNO=c.registerno and c.registerno='$mrno'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysqli_query($link,$qry1)or die(mysqli_error($link));
						if($qry){
						$i=0;
						$total3=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $bno = $res['registerno'];
							 $pname = $res['patientname'];
							  $phoneno=$res['phoneno'];
							 $age = $res['age'];
							 $sex = $res['gender'];
							 $tokenno = $res['PAT_NO'];
							 $ptype = $res['pat_type'];
							  $total = $res['ADV_AMT'];
							$total3=$total3+$total;
							 $date1 = $res['ADV_DATE'];
							
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
							$t3=number_format($total3,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t3 ?></b></td>
                           
                            
                        
						</tr>
						
						
						
						
						 
						
						
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
    
 <tr>
                <td class="header">Pharmacy Amount Collection</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                       
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>UMR No/PAT NO</b></td>
                             <td align="center"><b>Inv No.</b></td>
                           
							<td align="center"><b>Bill Date</b></td>
                         
                            
						
							<td align="center"><b>Paid Amount</b></td>
							
						</tr>
                        <?php
						
						$qry1="select * from phr_salent_mast  where CUST_NAME='$PAT_NO' or CUST_NAME='$registerno' ";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysqli_query($link,$qry1) or die(mysqli_error($link));
						if($qry){
						$i=0;
						$total4=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							
							 $INV_NO = $res['INV_NO'];
							  $CUST_NAME=$res['CUST_NAME'];
							 
							 
							 $ptype = $res['ptype'];
							  $total = $res['total'];
							$total4=$total4+$total;
							 $date1 = $res['SAL_DATE'];
							
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $CUST_NAME ?></td>
                              <td align="center"><?php echo $INV_NO ?></td>
                            
                               <td align="center"><?php echo $date ?></td>
                        
                            
                            <td align="center"><?php echo $total ?></td>
                          
                           
                        
						</tr>
                       <?php } }?>
					   <tr>
                          
							 <td align="center"></td>
                              <td align="center"></td>
                             <td align="center"></td>
                            <td align="center"><b>Total</b></td>
							<?php
							$t2=number_format($total4,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t2 ?></b></td>
                           
                            
                        
						</tr>
						
						
						
						
						 
						
						
						
                    </table>
                </td>
            </tr>
            <tr>
    <td align="right"><b style="color:red;">Total Amount Collection:<?php echo number_format($total2+$total3+$total4,2); ?> </b></td>
    </tr>
<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
       
    </body>
</html>
