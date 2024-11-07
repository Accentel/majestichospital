<?php 
include('config.php');
if(isset($_POST['submit'])){
$fromdate=$_POST['fromdate'];
$fdate=date('Y-m-d',strtotime($fromdate));
$refname=$_POST['refname'];
$refdocname=$_POST['refdocname'];
$todate=$_POST['todate'];
$tdate=date('Y-m-d',strtotime($todate));
$salary = str_replace(',', '', $_POST['salary']);
$totoplab=str_replace(',', '',$_POST['totoplab']);
$totoplabshare=str_replace(',', '',$_POST['totoplabshare']);
$totopcash=str_replace(',', '',$_POST['totopcash']);
$totopcashshare=str_replace(',', '',$_POST['totopcashshare']);



$optot=str_replace(',', '',$_POST['optot']);
$opshare=str_replace(',', '',$_POST['opshare']);
$totpaid=str_replace(',', '',$_POST['totpaid']);
$totbal=str_replace(',', '',$_POST['totbal']);



$totiptot=str_replace(',', '',$_POST['totiptot']);
$totipshare=str_replace(',', '',$_POST['totipshare']);
$totippaid=str_replace(',', '',$_POST['totippaid']);
$totipbal=str_replace(',', '',$_POST['totipbal']);

$date=date('y-m-d');


 $qry="insert into referaldoctorpaidamount(fdate,refdoc_name,refdoc_code,tdate,totoplab,totoplabshare,totopcash,totopcashshare,optot,opshare,totpaid,totbal,pdate,totiptot,totipshare,totippaid,totipbal)values('$fdate','$refname','$refdocname','$tdate','$totoplab','$totoplabshare','$totopcash','$totopcashshare','$optot','$opshare','$totpaid','$totbal','$date','$totiptot','$totipshare','$totippaid','$totipbal')";

$res=mysql_query($qry) or die(mysql_error());
$id=mysql_insert_id();
$count=count($_POST['mrno']);
for($i=0;$i<$count;$i++){
	$mrno = $_POST['mrno'][$i];
	$pname = $_POST['pname'][$i];
	$pno = $_POST['pno'][$i];
	$age = $_POST['age'][$i];
	$date1 = $_POST['date'][$i];
	$date=date('y-m-d',strtotime($date1));
	$ptype = $_POST['ptype'][$i];
	$totamt = $_POST['totamt'][$i];
	$totsha = $_POST['totsha'][$i];
	$paid = $_POST['paid'][$i];
	$bal = $_POST['bal'][$i];
	$oplabamount=$_POST['oplabamount'][$i];
$oplabshareamount=$_POST['oplabshareamount'][$i];
$opcashamount=$_POST['opcashamount'][$i];
$opcashshareamount=$_POST['opcashshareamount'][$i];

$sql1 = mysql_query("insert into referaldoctorpaidamount1(mrno, pname, pno, age, date,ptype,totamt,totsha,paid,bal,id1,oplabamount,oplabshareamount,opcashamount,opcashshareamount) values('$mrno','$pname','$pno','$age','$date','$ptype','$totamt','$totsha','$paid','$bal','$id','$oplabamount','$oplabshareamount','$opcashamount','$opcashshareamount')");

	
	
	}



$count1=count($_POST['mrno1']);
for($i=0;$i<$count1;$i++){
	$mrno1 = $_POST['mrno1'][$i];
	$pname1 = $_POST['pname1'][$i];
	$mno1 = $_POST['mno1'][$i];
	$age1 = $_POST['age1'][$i];
	$adate = $_POST['adate1'][$i];
	$adate1=date('Y-m-d',strtotime($adate));
	$ptype1 = $_POST['ptype1'][$i];
	$ddate = $_POST['ddate1'][$i];
	$ddate1=date('Y-m-d',strtotime($ddate));
	$ttotal = $_POST['ttotal'][$i];
	$share1 = $_POST['share1'][$i];
	$totpaid1 = $_POST['totpaid1'][$i];
	$totbal1 = $_POST['totbal1'][$i];
	
echo $p="insert into referaldoctorpaidamount2(mrno, pname, pno, age, adate,ptype,ddate,ttotal,share,totpaid,totbal,id2) values('$mrno1','$pname1','$mno1','$age1','$adate1','$ptype1','$ddate1','$ttotal','$share1','$totpaid1','$totbal1','$id')";
$sql1 = mysql_query($p) or die(mysql_error());

	
	
	}



if($res){
	
	print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='referaldoctoramountpaid_list.php';";
			print "</script>";

	
	
	}


}
?>