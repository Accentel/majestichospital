<?php
include("config.php");

$emp_id = $_REQUEST['emp_id'];

$query = mysql_query("select suppl_code,suppl_name,catgory from phr_supplier_mast  where suppl_code='$emp_id'");
if($query)
{
$row = mysql_fetch_array($query);

$supplcode=$row[0];
$supplname=$row[1];
$category=$row[2];

$data = ":".$supplcode.":".$supplname.":".$category.":";

}
echo $data;

$res =mysql_query("select count(*) from phr_supplier_item_mast as a,phr_prddetails_mast as b,phr_unit_mast as c where a.suppl_code='$supplcode' and a.PRD_code=b.PRD_code and a.UNIT_CODE=c.UNIT_CODE ");
if($res)
{
	$count = mysql_num_rows($res);
} 

$sql = mysql_query("select  PRODUCT_CODE, PRODUCT_NAME, BATCH_NO,s_qty, MRP,S_RATE from phr_purinv_dtl as a,phr_purinv_mast as b where a.lr_no=b.lr_no and suppl_code='$supplcode'");
if($sql)
{
	

?>
<table width="100%"  id="TABLE1">
  <thead>
	 <tr>			 
	<!--  <th width="144" class="TH1">Product Code</th>-->
	  <th width="246" class="TH1">Product Name</th>
	  <th width="138" class="TH1">Batch NO </th>
	  <th width="177" class="TH1">Quantity</th>
	  <th width="177" class="TH1">MRP</th>
	 <th width="134" class="TH1">Purchase Rate</th>                                                     
  </tr>
</thead>
<?php
	while($row1 = mysql_fetch_array($sql))
	{
?>
<tr>
	<?php /*?><td class="TD1">  <div align="center"><?php echo $row1[0] ?></div></td><?php */?>
	<td class="TD1"><div align="left"><?php echo $row1[1] ?></div></td>
	<td class="TD1"><div align="center"><?php echo $row1[2] ?></div></td>
	<td class="TD1"><div align="center"> <?php echo $row1[3] ?></div></td>
	<td class="TD1"><div align="center"> <?php echo $row1[4] ?></div></td>
	<td class="TD1"><div align="center"> <?php echo $row1[5] ?></div></td>	
 </tr>        	
<?php
}
}
?>
</table>