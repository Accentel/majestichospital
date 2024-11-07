<?php
include("config.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
  $ptype=$_GET['ptype'];
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
                <td class="header">Patient Registration Amount Collection</td>
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
						$qry=mysqli_query("select distinct a.registerno,a.gender,a.tokenno,a.patientname,a.pat_type,a.age,a.total,a.phoneno,a.ref_doc,a.date,b.ref_docname,b.refcode from patientregister a,referal_doctor b where  a.pat_type='OP' and  a.ref_doc=b.refcode and a.date between '$sdate1' and '$edate1' order by  a.date asc")or die(mysqli_error($link));;
						if($qry){
						$i=0;
						$total1=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
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
						
						
						
						
						 
						
						
						
                    </table>
                </td>
            </tr>
            
            <tr>
                <td class="header">Observation Patient Collection</td>
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
						
						$qry1="select * from opbill  where  BillDate between '$sdate1' and '$edate1' order by BillDate asc";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysqli_query($qry1) or die(mysql_error($link));
						if($qry){
						$i=0;
						$total6=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $mrno = $res['mrno'];
							 $pname = $res['PatientName'];
							  $phoneno=$res['phoneno'];
							 $age = $res['Age'];
							 $sex = $res['Sex'];
							 $tokenno = $res['BillNO'];
							 $ptype = $res['ptype'];
							  $total7 = $res['PaidAmount'];
							$total6=$total6+$total7;
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
                            
                            <td align="center"><?php echo $total7 ?></td>
                          
                           
                        
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
							$t6=number_format($total6,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t6 ?></b></td>
                           
                            
                        
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
						
						$qry1="select distinct a.mrno,a.PatientName,a.Age,a.Sex,a.BillNO,a.ptype,a.PaidAmount,a.BillDate,b.phoneno from bill1 a,patientregister b where  a.mrno=b.registerno and  a.BillDate between '$sdate1' and '$edate1' order by a.BillDate asc";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysqli_query($qry1) or die(mysqli_error($link));
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
						
						$qry1="select  distinct a.ADV_AMT,a.PAT_NO,b.PAT_REGNO,a.ADV_ID,b.PAT_NO,a.ADV_DATE,c.patientname,c.registerno,c.age,c.gender,c.phoneno from adv_collection a,ip_pat_admit b,patientregister c  where a.PAT_NO=b.PAT_NO and b.PAT_REGNO=c.registerno and  a.ADV_DATE between '$sdate1' and '$edate1' and a.ADV_AMT!='0.00' order by a.ADV_DATE asc ";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysqli_query($qry1)or die(mysqli_error($link));;
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
                          <td align="center"><?php echo  $tokenno ?></td>
                            
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
    <td align="right"><b style="color:red;">Total Amount Collection:<?php echo number_format($total1+$total2+$total3+$total6,2); ?> </b></td>
    </tr>

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
       
    </body>
</html>
