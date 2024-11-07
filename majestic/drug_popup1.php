<?php
include("config.php");

$MANAME=$_REQUEST['emp_id'];
$avl_qty=$_REQUEST['avl_qty'];
$rowid=$_REQUEST['rowid'];

$rs1=mysql_query("select product_name,product_code,balance_qty,inv_id from  phr_purinv_dtl  WHERE inv_id='$MANAME' ");
?>
<?php
	while($row1 = mysql_fetch_array($rs1)){
?>		
<input name="itemcode<?php echo $rowid ?>" id="itemcode<?php echo $rowid ?>"  type="text" class="textbox1" value="<?php echo ($row1[0]) ?>"/>
<?php 
	
	$qty_bal=$row1[2];
	$batch=$row1[3];
	echo "|".$qty_bal."|".$batch."|";
}//while
	$data=$qty_bal."|".$batch."|";
?>