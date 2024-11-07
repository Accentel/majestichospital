<?php
include("config.php");

$emp_id = $_REQUEST['emp_id'];

$query = mysqli_query($link,"select b.suppl_name,b.addr1,b.city,a.suppl_inv_no from phr_supplier_mast b,phr_purinv_mast a  where a.suppl_code='$emp_id' and a.suppl_code=b.suppl_code");
if($query)
{
?>
<select name="invno" class="select" id="invno" onchange="invfun(this.value)">
<option value="" >--Select--</option>
<?php
while($row = mysqli_fetch_array($query))
{
$supname=$row[0];
$addr=$row[1];
$city=$row[2];
?>
<option value="<?php echo $row[3] ?>"><?php echo $row[3] ?></option>
<?php
}
?>
</select>
<?php
}
$data = ":".$emp_id.":".$supname.":".$addr.":".$city;
	echo $data;
?>