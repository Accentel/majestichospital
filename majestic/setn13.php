<?php
include("config.php");
?>

<?php
echo $q=$_GET["q"];

echo $a="select * from  doct_infor where id='$q'";
$sq=mysqli_query($link,$a);

while($row=mysqli_fetch_array($sq)){

$rk=$row['dname1'];
}



$rest = substr("$rk", 0, 4); 
//echo substr('abcdef', 0, 4);  // abcd

 $date=date('Y-m-d');
 echo $sql="select * from patientregister where date='$date' and doctorname='$rk'";

//$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$result = mysqli_query($link,$sql);
echo $cnt=mysqli_num_rows($result)+1;


//while($row = mysql_fetch_array($result))
 // {

   echo ":" ."$rest"."_".$cnt;
   //$sum = ($row[1]+$row[2]+$row[3]+$row[4])."-00";
  //  echo ":" . $sum;
	 
     
  
 // }
 

?> 