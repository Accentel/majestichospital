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
        <title>Tests List</title>
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
<tr><td><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>


</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Tests List</td>
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
                            <td align="right" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                       <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Test Name</b></td>
							<td align="center"><b>Rate</b></td>
                            <td align="center"><b>No. Of Times</b></td>
							<td align="center"><b>Total Amount</b></td>
						</tr>
                        <?php
							$qry=mysql_query("select distinct TestName,Amount from bill where BillDate between '$sdate1' and '$edate1'");
							if($qry){
								$i=0;
								$grand = 0;
								while($row = mysql_fetch_array($qry)){
									$tname = $row['TestName'];
									$amt = $row['Amount'];
									$qry1=mysql_query("select count(TestName) from bill where BillDate between '$sdate1' and '$edate1' and TestName='$tname'");
									if($qry1)
									{
										$row1 = mysql_fetch_array($qry1);
										$cnt = $row1[0];
									}
									$tot = ($cnt * $amt);
									$grand = ($grand+$tot);
									$i++;
						?>
					   <tr>
							<td align="center"><?php echo $i ?></td>
                            <td align="center"><?php echo $tname ?></td>
							<td align="center"><?php echo $amt ?></td>
                            <td align="center"><?php echo $cnt ?></td>
							<td align="right" style="padding-right:20px;"><?php echo number_format($tot,2) ?></td>
						</tr>
						<?php			
								}
								
							}
						?>
						<tr>
							<td align="center"></td>
                            <td align="center"></td>
							<td align="center"></td>
                            <td align="center"><b>Grand Total</b></td>
							<td align="right" style="padding-right:20px;"><b><?php echo number_format($grand,2) ?></b></td>
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
