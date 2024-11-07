<?php
include("config.php");

 $sdate=$_GET['s_date'];
 $edate=$_GET['e_date'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Purchase Gst Report</title>
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
                <td class="header">Purchase Gst Report</td>
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
                            <td align="right" colspan="7" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Supplier Name.</b></td>
                             <td align="center"><b>Invoice No</b></td>
                             <td align="center"><b>Invoice Date</b></td>
							<td align="center"><b>Entry Date</b></td>
                            <td align="center"><b>IGST</b></td>
                            <td align="center"><b>CGST</b></td>
                            <td align="center"><b>SGST</b></td>
							<td align="center"><b>GST</b></td>
							<td align="center"><b>Total Amount</b></td>
							<td align="center"><b>Total GST Amount</b></td>
                           
                            
							
                            
							
						</tr>
                        <?php
						
                     
						$qry=mysqli_query($link,"select * from phr_purinv_mast where cdate between '$sdate1' and '$edate1' ")or die(mysqli_error($link));
						if($qry){
						$i=0;
						$tt=0;
						$gst10=0;
					 	 while($res=mysqli_fetch_array($qry)){
							$bno = $res['SUPPL_CODE'];
						    $pname = $res['SUPPL_INV_NO'];
							$date1 = $res['INV_DATE'];
							$INVDATE=date('d-m-Y',strtotime($date1));
							$cdate1 = $res['cdate'];
							$cdate=date('d-m-Y',strtotime($cdate1));
							 $i++;
							 	$TOTAL = $res['TOTAL'];
							 $lrno=$res['LR_NO'];
							 $k=mysqli_query($link,"select * from phr_supplier_mast where SUPPL_CODE='$bno'")or die(mysqli_error($link));
							 $k1=mysqli_fetch_array($k);
							 
							  $k10=mysqli_query($link,"select sum(VAT_AMT) as gst from phr_purinv_dtl where LR_NO='$lrno'")or die(mysqli_error($link));
							 $k12=mysqli_fetch_array($k10);
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $k1['SUPPL_NAME'] ?></td>
                            <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $INVDATE ?></td>
                            <td align="center"><?php echo $cdate ?></td>
                            <td align="center"><?php echo "0.00 " ?></td>
                            
                            <td align="center"><?php echo $k12['gst']/2 ?></td>
                            <td align="center"><?php echo $k12['gst']/2 ?></td>
                            <td align="center"><?php echo $gst10=$gst10+ $k12['gst'] ?></td>
                            <td align="center"><?php echo $tt=$tt+$TOTAL ?></td>
                            <td align="center"><?php echo $k12['gst'] ?></td>
                            
                           
                          
                           
                        
						</tr>
                       <?php } }?>
					   <tr><td colspan="5">Amount</td>
					   <td>0.00</td>
					   <td><?php echo $gst10/2; ?></td>
					   <td><?php echo $gst10/2; ?></td>
					   <td><?php echo $gst10; ?></td>
					   <td><?php echo $tt; ?></td>
					   <td><?php echo $gst10; ?></td>
					   </tr>
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
