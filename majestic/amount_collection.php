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
                            <td align="center"><b>Bill No.</b></td>
							<td align="center"><b>Bill Date</b></td>
                            <td align="center"><b>Patient Name</b></td>
                             <td align="center"><b>Patient Type</b></td>
						
							<td align="center"><b>Total Amount</b></td>
							<td align="center"><b>Paid Amount</b></td>
							<td align="center"><b>Bal. Amount</b></td>
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						 $qry1="select distinct a.mrno, a.BillNO,a.BillDate,a.PatientName,a.NetAmount,a.PaidAmount,a.BalanceAmount,a.ptype,b.conce_type from bill1 a,bill b  where  a.BillNO=b.BillNO and a.BillDate between '$sdate1' and '$edate1' order by a.mrno asc";
						$qry=mysqli_query($qry1)or die(mysqli_error($link));
						if($qry){
						$i=0;
						$total1 =0;
						$paid1 =0;
						$bal1 = 0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 $bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							 $bno = $res['BillNO'];
							 $pname = $res['PatientName'];
							 $mrno = $res['mrno'];
							 $total = $res['NetAmount'];
							 $paid = $res['PaidAmount'];
							 $bal = $res['BalanceAmount'];
							  $ptype = $res['ptype'];
							 $total1 = ($total1+$total);
							 $paid1 = ($paid1+$paid);
							 $bal1 = ($bal1+$bal);
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $mrno ?></td>
                            <td align="center"><?php echo $bno ?></td>
                            <td align="center"><?php echo $bdate ?></td>
                            <td align="center"><?php echo $pname ?></td>
                              <td align="center"><?php echo $ptype ?></td>
							
                            <td align="right" style="padding-right:20px;"><?php echo number_format($total,2) ?></td>
                            <td align="right" style="padding-right:20px;"><?php echo number_format($paid,2) ?></td>
                            <td align="right" style="padding-right:20px;"><?php echo number_format($bal,2) ?></td>
                            
                        
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
							$p1=number_format($paid1,2);
							$b1=number_format($bal1,2);
							?>
                            <td align="right" style="padding-right:20px;"><b><?php echo $t1 ?></b></td>
                            <td align="right" style="padding-right:20px;"><b><?php echo $p1 ?></b></td>
                            <td align="right" style="padding-right:20px;"><b><?php echo $b1 ?></b></td>
                            
                        
						</tr>
						
						
						
						
						  <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct a.BillNO,a.BillDate,a.PatientName,a.NetAmount,a.PaidAmount,a.BalanceAmount,b.conce_type from bill where BillDate between '$sdate1' and '$edate1'";
						  $qry2="select distinct a.BillNO,a.BillDate,sum(a.NetAmount) as NetAmount ,sum(a.PaidAmount) as paid,sum(a.BalanceAmount) as balance ,b.conce_type from bill1 a,bill b  where  a.BillNO=b.BillNO and b.conce_type='General' and a.BillDate between '$sdate1' and '$edate1'";
						$qry=mysqli_query($link,$qry2)or die(mysqli_error($link));
						if($qry){
						
					 	 $res=mysqli_fetch_array($qry);
								
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
    </body>
</html>
