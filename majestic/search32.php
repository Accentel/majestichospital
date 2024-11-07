<?php
//include("config.php");
?>

<?php
//ob_start();
require_once("config.php");
 $q=$_GET["q"];?>

 <table width="100%">
 <tr>
 <th>S No</th>
 <th>Bill No</th>
 <th>Bill Date</th>
 <th>Test Names</th>
 <th>Amount</th>
 </tr>
 <?php
 $sql1 = mysql_query("select distinct BillNO,BillDate,NetAmount from bill1 where mrno='$q'");
							if($sql1){
							$i=1;
							while($row1 = mysql_fetch_array($sql1)){
							$bno = $row1['BillNO'];
							$bdate = $row1['BillDate'];
							$NetAmount = $row1['NetAmount'];
						
							
							
						?>
						<tr >
                            <td valign="top" align="left"><?php echo $i?></td>
                            <td valign="top" align="center"><?php echo $bno ?></td>
							<td valign="top" align="center"><?php echo $bdate  ?></td>
							
							<td valign="top" align="center" >
							<table width="100%">
								<?php
									$sql2 = mysql_query("select  TestName,Amount from bill where  BillNO='$bno'");
									if($sql2){
									$sum = 0;
									
									while($row2 = mysql_fetch_array($sql2)){
									
									
								?>
								<tr>
								<td align="top" style="padding-left:20px;"><?php echo $row2['TestName']."(".$row2['Amount'].")"; ?></td>
								
								</tr>
								<?php
								
								
								 } 
								 
								 }?>
								 </table>
							
							</td>
                            <td  align="center"><?php echo $NetAmount  ?></a></td>
                            </tr>
							<?php $i++; } }?>
 </table>

