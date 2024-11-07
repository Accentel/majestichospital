<?php
include("connection.php");
 $q=$_GET["q"];
  $days=$_GET["days"];
   $cdate=$_GET["cdate"];

  $a="select starttime,endtime,Doctorid from  Appointmentslots where Doctorid='$q' and Dayspresent='$days'";
$sq=mysqli_query($link,$a);
while($row=mysqli_fetch_array($sq)){
    $doctorname=$row['Doctorid'];
 $timeslot=$row['starttime']."#".$row['endtime'];
 if($time!="")
 $time=$time."##".$timeslot;
 else
 $time=$timeslot;
}
 $a="select appint_time from  appointment where consult_doct='$doctorname' and appint_date='$cdate'";
$sq=mysqli_query($link,$a);
$appint_time="";
while($row=mysqli_fetch_array($sq)){
    $appint_time=$row['appint_time']."$$$".$appint_time;
}

echo $time."###".$appint_time;

?> 	

