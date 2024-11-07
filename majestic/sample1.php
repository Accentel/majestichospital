<?php
include("config.php");

 $bno=$_GET['bno'];
 
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Patients Report</title>
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
                <td class="header">Final Lab Bill Summary List</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>UMR No: </b></td>
                            <td align="left" colspan="4"><?php echo $bno?> </td>
                            
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                           
                            <td align="center"><b>Bill No.</b></td>
							<td align="center"><b> Bill Date</b></td>
                            <td align="center"><b>Test Name</b></td>
							<td align="center"><b>Amount</b></td>
							
							
						</tr>
                        <?php
						
                     
						$qry=mysqli_query($link,"select distinct BillNO,BillDate,NetAmount from bill1 where mrno='$bno'")or die(mysqli_error($link));
						if($qry){
						$i=0;
					 	 while($row1=mysqli_fetch_array($qry)){
								
							 $bdate = date('d-m-Y',strtotime($row1['BillDate']));
							 
							$bno = $row1['BillNO'];
							$bdate = $row1['BillDate'];
							$NetAmount = $row1['NetAmount'];
							
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $bno ?></td>
                            <td align="center"><?php echo $bdate ?></td>
                            <td >
                            <div >
								<?php
									$sql2 = mysqli_query($link,"select  TestName,Amount from bill where  BillNO='$bno'")or die(mysqli_error($link));
									if($sql2){
									$sum = 0;
									
									while($row2 = mysqli_fetch_array($sql2)){
									
									
								?>
								
								<p ><?php echo $row2['TestName']."(".$row2['Amount'].")"; ?></p>
								
								
								<?php
								
								
								 } 
								 
								 }?>
								 </div>
                            
                            
                            
                            
                            
                            </td>
                           
                            <td align="center"><?php echo $NetAmount ?></td>
                        
						</tr>
                       <?php  } }?>
					   
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
