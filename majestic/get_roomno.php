<?php
include("config.php");
?>
<select name="rno" required="reqired" id="rno" style="width:230px;height:20px;">
	<option value=""> -- Select Room Number -- </option>

<?php
$q=$_GET['q'];

$result = mysqli_query($link,"SELECT ROOM_NO FROM room_tariff WHERE LOCATION = '$q'");
if($result)
{
while($row = mysqli_fetch_array($result))
  {
	$rno = $row['ROOM_NO'];
?>
<option value="<?php echo $rno ?>"><?php echo $rno ?></option>
<?php 
  }
} 
?> 
</select>