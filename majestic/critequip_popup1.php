<?php
include("config.php");

$MANAME=$_REQUEST['emp_id'];
$cost=$_REQUEST['avl_qty'];
$rowid=$_REQUEST['rowid'];

				
echo $cost."|";
$rs1=mysql_query("select name from icu_equipment_mast  WHERE id='$MANAME' ");
?>
<?php
while($row1 = mysql_fetch_array($rs1)){ ?>	
<input name="name<?php echo $rowid ?>" id="name<?php echo $rowid ?>"  type="text" class="textbox1" value="<?php echo $row1[0] ?>">
		
<?php
}
?>