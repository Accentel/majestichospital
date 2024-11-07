<?php
session_start();
if($_SESSION['name1'])
{
include("config.php");
 $sdate=$_REQUEST['s_date'];
 $edate=$_REQUEST['e_date'];
 //$etype=$_REQUEST['etype'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Expenses Report</title>
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
	$sq=mysqli_query($link,"select * from organization ")or die(mysqli_error($link));

while($res=mysqli_fetch_array($sq)){
$oname=$res['orgname'];
$oaddr=$res['address'];
$ophone=$res['phone'];

 }
?>
<table align="center">
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>


</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="2px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header"> Expenses Report</td>
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
							<td align="center"><b>Vou No.</b></td>
							<td align="center"><b>Date</b></td>
							<td align="center"><b>Expenses Head</b></td>
								<td align="center"><b>Description</b></td>
                            <td align="center"><b>Paid To</b></td>
							
							<td align="center"><b>Mobile No.</b></td>
						
							<td align="center"><b>Amount(Rs.)</b></td>
							
						</tr>
                        <?php
						
                     $i=0;
					 $sum = 0;
					 $sq="select a.bill_no, a.bill_date, a.paid_to, a.mobile_no,a.expense, a.amount, a.towards,a.pay_type,a.bname,a.chq_no,a.chq_date,a.account_no,a.amt_words,a.auth_by,a.currentdate,b.exptype from addexpenses a,expensetype b  where a.towards=b.id and  a.bill_date between '$sdate1' and '$edate1' ";
					 $qry=mysqli_query($link,$sq) or die(mysqli_error($link));
					 
					  if($qry){
					 	 while($res=mysqli_fetch_array($qry)){
							 $bno=$res['bill_no'];
							$bdate = date('d-m-Y',strtotime($res['bill_date']));
							$pto = $res['paid_to'];
							 $towards = $res['exptype'];
							 $mobno = $res['mobile_no'];
							 $description = $res['expense'];
							 $amt = $res['amount'];
							 $ptype = $res['pay_type'];
							 if($res['bname'] != ""){ $bname = $res['bname'];}else{ $bname = "----";}
							 if($res['account_no'] != ""){ $acno = $res['account_no'];}else{ $acno ="----";}
							 if($res['chq_no'] != ""){ $chqno = $res['chq_no'];}else{ $chqno ="----";}
							 if($res['chq_date'] != ""){ $chqdate = $res['chq_date'];}else{ $chqdate ="----";}
							 
							 $sum = ($sum+$amt);
							
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                            <td align="center"><?php echo $bno ?></td>
                            
							<td align="center"><?php echo $bdate ?></td>
							<td align="center"><?php echo $towards ?></td>
								<td align="center"><?php echo $description ?></td>
							
                            <td align="center"><?php echo $pto ?></td>
                            
                            <td align="center"><?php echo $mobno ?></td>
                          
                            <td align="center"><?php echo $amt ?></td>
                            
                            
                        
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
<?php 

}else
{

session_destroy();

session_unset();

header('Location:login.php');

}

?>