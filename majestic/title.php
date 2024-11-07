<?php
include("config.php");
$sql = mysqli_query($link,"select * from organization")or die(mysqli_error($link));
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$orgname = $row['orgname'];

}
?>
<a href="home.php" style="color:#FFF;"><b id="logo"><?php echo $orgname; ?></b></a>