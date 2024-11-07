<?php
include("config.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 
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
                <td class="header">Discharged Patients List</td>
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
							<td align="center"><b>Join  Date</b></td>
                            <td align="center"><b>Discharge Date</b></td>
                            <td align="center"><b>Total Amount</b></td>
							
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
					$p="select a.PatientNo,a.PatientMRNo,a.PatientName,a.netamt,a.AdmissionDate,a.Age,a.Sex,a.ContactNo,a.DischargeDate,a.BILL_NO,b.DIS_STATUS,b.BILL_STATUS,b.PAT_NO  from final_bill a ,ip_pat_admit b where   a.PatientNo=b.PAT_NO and b.DIS_STATUS='Discharged'
				 and b.BILL_STATUS='PAID' order by a.BILL_NO asc";
						$qry=mysqli_query($link,$p) or die(mysqli_error($link));
						if($qry){
						$i=0;
						$total1=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $bno = $res['PatientMRNo'];
							 $pname = $res['PatientName'];
							  $phoneno=$res['ContactNo'];
							 $age = $res['Age'];
							 $sex = $res['Sex'];
							 $tokenno = $res['PatientNo'];
							 $ptype = $res['pat_type'];
							  $total = $res['netamt'];
							$total1=$total1+$total;
							 $date1 = $res['AdmissionDate'];
							
							$date3=date('d-m-Y',strtotime($date1));
							
							$date4 = $res['DischargeDate'];
							
							$date5=date('d-m-Y',strtotime($date4));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $bno ?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $age."/".$sex ?></td>
                            
                               <td align="center"><?php echo $date3 ?></td>
                          <td align="center"><?php echo $date5 ?></td>
                            
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
            
            
    

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
       
    </body>
</html>
