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
                <td class="header">Product Wise Profit Collection</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From:<?php echo $sdate?> </b></td>
                            <td align="left"> </td>
                            
                            <td align="right"><b>To:<?php echo $edate?> </b></td>
                           
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>Product Name.</b></td>
                            <td align="center"><b>Qty.</b></td>
                              
						
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						 $qry1="select  distinct (a.U_QTY) ,b.PRODUCT_NAME from phr_salent_dtl a,phr_purinv_dtl b  where  a.inv_id=b.inv_id and  a.CURRENT between '$sdate1' and '$edate1' order by b.PRODUCT_NAME  ";
						$qry=mysqli_query($link,$qry1)or die(mysqli_error($link));
						if($qry){
						$i=0;
						$pamt1 =0;
						$samt1 =0;
						$plamt1 = 0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 $bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							 
							 $U_QTY = $res['U_QTY'];
						
							 $PRODUCT_NAME = $res['PRODUCT_NAME'];
							
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $PRODUCT_NAME ?></td>
                            <td align="center"><?php echo $U_QTY ?></td>
                           
						</tr>
                       <?php } }?>
					  
						
						
						
						
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
