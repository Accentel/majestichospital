<?php
include("config.php");

echo $id=$_REQUEST['id'];
echo $qty=$_REQUEST['qty1'];
echo $qty2=$_REQUEST['qty2']; 
echo $qty3=$_REQUEST['qty3'];
//exit;

//$dtl=mysql_query("insert into stockadjustment(old_qty, modified_qty, inv_id, currentdate, auth_by) values('$inv','$qty1','$qty',now(),'admin')");
//if($dtl)
//{
	$upd_inv=mysql_query("update phr_prddetails_mast set vattax='$qty',sgst='$qty2',cgst='$qty3' where id='$id'");
	if($upd_inv)
	{
		$responseText=1;
?>
<input type="hidden" name="ccc" value="<?php echo $responseText ?>" id="ccc"/>
<?php		
	}
//}
?>