<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include('config.php');
$sql="select * from organization";
$res=mysql_query($sql) or die(mysql_error());
while($row=mysql_fetch_array($res)){
$org=$row['orgname'];
$addres=$row['address'];
$phoneno=$row['phone'];

}
?>
<div>
<div style="color:red;font-size:30px;" align="center"><?php echo $org?></div>
<div style="font-size:20px;" align="center">Address:<?php echo $addres; ?></div>
<div style="font-size:20px;" align="center">Phone No:<?php echo $phoneno; ?></div><hr />
<div style="text-align:right; padding-right:50px;">Date:<?php echo $today = date("d-m-Y");?><div>

</div>
</body>
</html>