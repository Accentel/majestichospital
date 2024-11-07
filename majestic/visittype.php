<?php
include("config.php");
$emp_id = $_REQUEST['pname'];
$row = $_REQUEST['row'];


$ii=0;

$query =  mysql_query("select CONS_SPECALIZATION from outside_consultants where anae_docname='$emp_id'");

	while($row1 = mysql_fetch_array($query)){
	$ii++;
?>
<input type="text" class="textbox1"  name="visittype<?php echo $row ?>"   id="visittype<?php echo $row ?>" value="<?php echo $row1[0] ?>" readonly />
	<?php }if($ii==0){ ?><input type="text" class="textbox1"  name="visittype<?php echo $row ?>"   id="visittype<?php echo $row ?>"  readonly />
<?php } ?>