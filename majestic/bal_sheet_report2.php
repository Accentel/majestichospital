<?php
include("config.php");

 $sdate=$_GET['s_date'];
 $edate=$_GET['e_date'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
   //$bname=$_GET['user'];
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Balance Sheet</title>
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
include('config.php');

$sql = mysqli_query($link,"select * from pharmacydetaisl")or die(mysqli_error($link));
if($sql){
$res = mysqli_fetch_array($sql);
$orgname = $res['pharmacyname'];
$addr = $res['address'];
$phone = $res['phoneno'];
$mob = $res['mobileno'];
//$email = $res['email'];
}
?>
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
            <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #999999;background:#FFFFFF">
                    <tr>
                        <td style="text-align:center;color:#03C; font:32px Book Antiqua;font-weight:bold;" colspan="6"><?php echo $orgname ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;font-size:18px;" colspan="6"><?php echo $addr ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;font-size:18px;" colspan="6">Ph : <?php echo $phone ?></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                </table>
            </td>
            </tr>
</table>
<!--<table align="center">
<tr><td style="text-align:center;color:#03C; font:32px Book Antiqua;font-weight:bold;"><?php echo $orgname;//oname?></td></tr>
<tr><td style="text-align:center;font:18px Book Antiqua;"><?php echo $oaddr?></td></tr>

</table>-->
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Balance Sheet</td> 
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
                            <td align="center" colspan="4"><b>Income</b></td>
                            <td align="center" colspan="4" ><b>Expenditure</b></td>
                        </tr>
                        <tr>
						<td align="center"><b>S.No.</b></td>
						<td colspan="2"><b>Description</b></td>
						<td align="center"><b>Amount(Rs.)</b></td>
						<td align="center"><b>S.No.</b></td>
						<td colspan="2"><b>Description</b></td>
						<td align="center"><b>Amount(Rs.)</b></td>
					</tr>
									<?php
				 $a="select  sum(total) as total1 from phr_salent_dtl where CURRENT between '$sdate1' and '$edate1'  ";
					 $sqls=mysqli_query($link,$a)or die(mysqli_error($link));
					while($row=mysqli_fetch_array($sqls)){
					  $tt=$row['total1']; }
                     

				
				
				//$n="select a.product_code,b.product_name,b.batch_no,b.mfg_date,b.exp_date,a.u_qty,a.u_rate,a.value,balance_qty,a.inv_id,c.discount,c.total,a.disc,a.total from phr_salent_dtl as a,phr_purinv_dtl as b,phr_salent_mast as c where a.inv_id=b.inv_id and a.lr_no=c.lr_no and a.lr_no='$lr_id'";



				 $a="select  `INV_NO` from phr_salent_mast where  SAL_DATE between '$sdate1' and '$edate1'";
					 $sqls=mysqli_query($link,$a)or die(mysqli_error($link));
					while($row=mysqli_fetch_array($sqls)){
					   $inv=$row['INV_NO']; 
					  
					   $sql=mysqli_query($link,"select * from phr_salent_dtl where LR_NO='$inv'")or die(mysqli_error($link));
					   while($r=mysqli_fetch_array($sql)){
 $inv_id=$r['inv_id'];
$U_QTY=$r['U_QTY'];
  "<br>";
$s1=mysqli_query($link,"select * from phr_purinv_dtl where inv_id='$inv_id'")or die(mysqli_error($link));
				
		while($c=mysqli_fetch_array($s1)){
			$S_RATE=$c['S_RATE'];
		
			
			 $amt=$S_RATE*$U_QTY; 
			// "<br>";
		}
        
		
						  //$n="select a.U_QTY,b.S_RATE,sum(a.U_QTY*b.S_RATE) as tot1
						 // from phr_purinv_dtl b,phr_salent_dtl a  where a.CURRENT between '$sdate1' and '$edate1' and a.inv_id=b.inv_id and a.LR_NO='$inv'  ";
						//$sq = mysqli_query($n) or die(mysqli_error());
					//while($row=mysqli_fetch_array($sq)){
					//echo $tt1=round($row['tot1']); "-";
					
					 $tt1=$amt+$tt1; 
					//echo "<br>";;
					//}
					
					   }
			}
           
				
					
								 $s="select sum((balance_qty*S_RATE)*VAT/100) as sume,sum((balance_qty*S_RATE)) as sume1  from phr_purinv_dtl  where CURRENTDATE between '$sdate1' and '$edate1'  ";			 
						 $sq = mysqli_query($link,$s)or die(mysqli_error($link));
						while($row=mysqli_fetch_array($sq)){
						    $bqty=$row['sume'];
						 $srt=$row['sume1'];
						 $q=$srt+$bqty;
						 
						 
						  }
					
					
					
					
				

?>

					
					
					
					
					
				<?php
						$totinc=($tt);
						//$totinc = ($cfeepay+$incamt+$sfeepay+$shfeepay+$chfeepay+$schfeepay);
						//$totexp = ($vdexp+$vmexp);
						//$totexp = ($messexp+$vdexp+$vmexp+$sempsal+$miscexp+$cempsal);
						$tot = ($totinc - $tt1);
					?>	
					<tr>
						<td align="center">1</td>
						<td colspan="2">Total Sales Amount</td>
						<td align="right"><?php echo $tt; ?></td>
						<td align="center">1</td>
						<td colspan="2">Total Purchase Amount</td>
						<td align="right"><?php echo $tt1;?></td>
					</tr>
                    
					
					
					<tr height="25">
						<td align="center"></td>
						<td colspan="2"></td>
						<td align="right"></td>
						<td align="center"></td>
						<td colspan="2"></td>
						<td align="right"></td>
					</tr>
					<tr>
						<td align="center"></td>
						<td colspan="2"><b>Total Income</b></td>
						<td align="right"><b><?php echo number_format($tt,2) ?></b></td>
						<td align="center"></td>
						<td colspan="2"><b>Total Expenses</b></td>
						<td align="right"><b><?php echo number_format($tt1,2) ?></b></td>
					</tr>
					<tr>
						<td align="center"></td>
						<td colspan="2"></td>
						<td align="right"></td>
						<td align="center"></td>
						<td colspan="2"><b><?php if($tot > 0){ echo "Profit";}else{ echo "Loss"; } ?></b></td>
						<td align="right"><b><?php echo number_format($tot+$t,2) ?></b></td>
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
    </body>
</html>
