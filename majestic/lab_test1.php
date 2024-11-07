<?php
include("config.php");
$emp_id1 = $_REQUEST['emp_id'];

$query = mysqli_query($link,"select distinct Ptest from reportentry where BillNo='$emp_id1' ");
$row=0;
?>
<table width="100%" border="0" align="center">
<?php
while($res = mysqli_fetch_array($query))
{
$row++;
$testname=$res[0];

//while

?>
<tr>

<td >
   <input  type="checkbox" name="testname" id="testname"  value="<?php echo $testname ?>" checked /> <?php echo $testname ?>

</td>

</tr>

<?php
//else
}
?>
</table>
<?php
$data="@".$row;
echo $data;

?>

