<?php
include("config.php");

$prdtype = $_REQUEST['prdtype'];

$sql = mysql_query("select distinct batch_no from  phr_purinv_dtl as a,phr_prddetails_mast as b where a.product_name=b.prd_name and type='$prdtype'");

?>
<select name="bachno1" id="batc" class="select"   onChange="getstock('b')">
<option selected>--Select Batch Number--</option>
<?php
if($sql){
while($row = mysql_fetch_array($sql))
{
?>
<option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
<?php
}
}
?>
</select>