<?php
include("config.php");

 $sdate=$_REQUEST['s_date'];
 $edate=$_REQUEST['e_date'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 $deptcode = $_REQUEST['deptcode'];
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Deparment Issues Report</title>
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
                font-size: 12px;
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
	$sq=mysql_query("select * from pharmacydetaisl");

while($res=mysql_fetch_array($sq)){
$oname=$res['pharmacyname'];
$oaddr=$res['address'];
$ophone=$res['phoneno'];

 }
?>
<table align="center">
<tr><td style="text-align:center;color:#03C; font:18px Book Antiqua;font-weight:bold;"><?php echo $oname?></td></tr>
<tr><td style="text-align:center;font:12px Book Antiqua;"><?php echo $oaddr ?></td></tr>
<tr><td style="text-align:center;font:12px Book Antiqua;"><?php echo "Phone : ". $ophone ?></td></tr>

</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="2px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Deparment Issues Report</td>
            </tr>
            
            <tr>
                <td>
                    <table style="font-size:12px;"  cellpadding="0" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="4" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
                            <td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Deparment Name</b></td>
							<td align="center"><b>Trans.Date</b></td>
							<td align="center"><b>Product Name</b></td>
                            <td align="center"><b>Batch No.</b></td>
							<td align="center"><b>Issue.Qty</b></td>
							<td align="center"><b>Unit Cost(Rs.)</b></td>
							<td align="center"><b>Total(Rs.)</b></td>
							
                            
                            
						</tr>
                        <?php
						
                     $i=0;
					 $sum = 0;
					 
						if($deptcode==""){
							$qry1=mysql_query("select dept_name,a.tran_date,b.product_name,b.batch_no,b.packing_type,c.issue_qty,mrp from stock_transfer as a,phr_purinv_dtl as b,stock_transfer_dtl as c,dept as d where a.id=c.mast_id and c.inv_id=b.inv_id and  d.dept_code=a.dept and a.tran_date between '$sdate1' and '$edate1'");
						}else{
							$qry1 = mysql_query("select dept_name,a.tran_date,b.product_name,b.batch_no,b.packing_type,c.issue_qty,mrp from stock_transfer as a,phr_purinv_dtl as b,stock_transfer_dtl as c,dept as d where a.id=c.mast_id and c.inv_id=b.inv_id and  d.dept_code=a.dept and a.tran_date between '$sdate1' and '$edate1' and a.dept='$deptcode' ");

						}
					  if($qry1){
					 	 while($res=mysql_fetch_array($qry1)){
							 $dname=$res['dept_name'];	
							 $pname = $res['product_name'];
							 $tdate = date('d-m-Y',strtotime($res['tran_date']));
							 $batch = $res['batch_no'];
							 $qty = $res['issue_qty'];
							 $mrp = $res['mrp'];
							 $val = $qty * $mrp;
							 $sum = ($sum+$val);
							
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                            <td align="center"><?php echo $dname ?></td>
                            <td align="center"><?php echo $tdate ?></td>
                            
							<td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $batch ?></td>
                            <td align="center"><?php echo $qty ?></td>
                            <td align="center"><?php echo number_format($mrp,2) ?></td>
                            
							<td align="center"><?php echo number_format($val,2) ?></td>
							
                            
                        
						</tr>
                       <?php } }?>
					   <tr>
                            <td align="center"></td>
                            <td align="center"></td>
							<td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"><b>Total </b></td>
                            <td align="center"><b><?php echo number_format($sum,2) ?></b></td>
                            
                        
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
