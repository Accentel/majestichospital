<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
	$aname = $_SESSION['name1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header.php");
	?>
<!--<script type="text/javascript" src="js/jquery.1.4.2.js"></script>-->
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
<script>
$().ready(function() {
	$("#name").autocomplete("ipname.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script> 
<script>
$().ready(function() {
	$("#regk").autocomplete("ipreg1.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script>	

<script>
function showHint1(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	if(strar[3] == "male"){
	document.getElementById("sex1").checked =true;
	}
	if(strar[3] == "female"){
	document.getElementById("sex2").checked =true;
	}
	document.getElementById("addr").value=strar[4];
	document.getElementById("mnum").value=strar[5];	
	document.getElementById("occ").value=strar[6];		
    }
  }
xmlhttp.open("GET","set100.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint2(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	if(strar[3] == "male"){
	document.getElementById("sex1").checked =true;
	}
	if(strar[3] == "female"){
	document.getElementById("sex2").checked =true;
	}
	document.getElementById("addr").value=strar[4];
	document.getElementById("mnum").value=strar[5];	
	document.getElementById("occ").value=strar[6];		
    }
  }
xmlhttp.open("GET","set101.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint01(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("fee").value=strar[1];
	}
  }
xmlhttp.open("GET","set010.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function showHint011(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint012(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint013(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>


<script>
function funconce(str){
	alert(str);
	if(str == "TPA Insurances"){
	
		document.getElementById("card1").style.display='none';
		document.getElementById("card2").style.display='none';
		document.getElementById("insu1").style.display='';
		
	}else if(str == "MKT Trauma Care"){
		document.getElementById("insu1").style.display='none';
		document.getElementById("conce_card").style.display='none';
		document.getElementById("card2").style.display='none';
		
		document.getElementById("card1").style.display='';
		
		
	}else if(str == "Lotus Priviliged Card"){
		document.getElementById("insu1").style.display='none';
		document.getElementById("card1").style.display='none';
		document.getElementById("conce_card").style.display='none';
		document.getElementById("card2").style.display='';
		
	}else{
		document.getElementById("insu1").style.display='none';
		document.getElementById("card2").style.display='none';
		document.getElementById("card1").style.display='none';
	}
}
</script>



<script>
function funconce1(str){
	//alert(str);
	if(str == "OP"){
	
		
		//document.getElementById("con_fee").style.display='';
		
	}else if(str == "IP"){
		//document.getElementById("con_fee").style.display='none';
		//document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		
		//document.getElementById("card1").style.display='';
		
		
	}
	else if(str == "Lab"){
		//document.getElementById("con_fee").style.display='none';
		//document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		
		//document.getElementById("card1").style.display='';
		
		
	}
}
</script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script type="text/javascript">
    $(function () {
        $("input[name='datacard']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
		 $("input[name='type']").click(function () {
            if ($("#sex1").is(":checked")) {
                $("#dvPassport1").show();
            } else {
                $("#dvPassport1").hide();
            }
        });
		});
		$(document).on('keyup ','#fee',function(){
		 conven = $('#fee').val();
		 otheral1 = $('#con_fee').val();
		$('#total').val( parseFloat(otheral1)+parseFloat(conven) );
		});
		$(document).on('keyup ','#con_fee',function(){
		 conven = $('#fee').val();
		 otheral1 = $('#con_fee').val();
		$('#total').val( parseFloat(otheral1)+parseFloat(conven) );
		});

        </script> 
	</head>

	<body>

	<div id="conteneur" style="height:auto;">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
<?php */?>	<?php
	include('logo.php');	
			include("main_menu.php");
			?>
		  
	 <?php
			include("config.php");
//$abc=$_GET['id'];


	
	$abc=mysql_query("select max(reg_id)+0,registerdate from patientregister");
	$row1=mysql_fetch_array($abc);
	//echo $row1[0]+1;
	$date=$row1['registerdate'];
	 //$dd=date("Y-m-d", strtotime("$date"));
	 
	
	//date('Y-m-d' strtotime($date));

if($abc){
	
	
}
else
{
echo "allredy exit";

}
//$ddd=date('Y-m-d');
//echo $date = strtotime("-1 day", $ddd);
 $date=date('Y-m-d', strtotime('-1 days'));
  $xxx="select * from patientregister where registerdate='$date' and pat_type='OP'";
$abcd=mysql_query($xxx);
 $cnt=mysql_num_rows($abcd);
	//$row1=mysql_fetch_array($abc);
	//echo $row1[0]+1;
	//$date=$row1['registerdate'];
	//echo $dd=date("Y-m-d", strtotime("$date"));

?><?php 
 $xxx1="SELECT * FROM `validity_days`";
$abcd1=mysql_query($xxx1);
 //$cnt=mysql_num_rows($abcd);
	$row2=mysql_fetch_array($abcd1);
	 $valid_days=$row2['valid_days'];
	  $valid=date('Y-m-d', strtotime("+$valid_days days"));

?>

		  <div id="centre"  style="height:auto;">
          <h1 style="color:red;" align="center">PATIENT REGISTRATION </h1><!--<span id="date_time"></span>-->
    
<script type="text/javascript">
tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();
mnt=nmonth+1;

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('intime').value=""+nhour+":"+nmin+":"+nsec+ap+"";
//document.getElementById('outtime').value=" "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;

</script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script type="text/javascript">
    $(function () {
        $("input[name='datacard']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
		 $("input[name='type']").click(function () {
            if ($("#sex1").is(":checked")) {
                $("#dvPassport1").show();
            } else {
                $("#dvPassport1").hide();
            }
        });
		});
		//$(document).on('keyup ','#fee',function(){
		// conven = $('#fee').val();
		// otheral1 = $('#con_fee').val();
		//$('#total').val( parseFloat(otheral1)+parseFloat(conven) );
		//});
		$(document).on('keyup ','#con_fee',function(){
			//alert('hi');
		// conven = $('#fee').val();
		 otheral1 = $('#con_fee').val();
		$('#total').val( parseFloat(otheral1) );
		});

        </script>    
                         
            <form name="frm" method="post" >
           
                
<table width="70%" style="margin-left:300px;"cellspacing="1" align="right">

<tr>
<td align="right">Search By UMR No. : <input type="text" name="reg" id="regk"  /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>
      
      <?php 
      
        $r=$_REQUEST['reg'];
        
        $xxx="select * from patientregister where registerno='$r' ";
$abc=mysql_query($xxx);
 //$cnt=mysql_num_rows($abcd);
	$row1=mysql_fetch_array($abc);
$registerno=$row1['registerno'];
$radte=$row1['date'];
//$ptype=$row1['pat_type'];
$doctorname=$row1['doctorname'];
$patientname=$row1['patientname'];
$age=$row1['age'];
$gaurdianname=$row1['gaurdianname'];
$gender=$row1['gender'];
$address=$row1['address'];
$phoneno=$row1['phoneno'];
$registerfee=$row1['registerfee'];
$remarks=$row1['remarks'];
$aadar=$row1['aadar'];
$ref_doc=$row1['ref_doc'];
$ref_doc_mob=$row1['ref_doc_mob'];
$con_doc_mob=$row1['con_doc_mob'];
$rel_type=$row1['rel_type'];
//$tokenno=$row1['tokenno'];
$cons_fee=$row1['cons_fee'];
$total=$row1['total'];
$pat_type1=$row1['pat_type1'];
$pname_type=$row1['pname_type'];


	$abc=mysql_query("select max(reg_id)+0,registerdate from patientregister");
	$row1=mysql_fetch_array($abc);
	//echo $row1[0]+1;
	$date=$row1['registerdate'];
	$da=date('Y-m-d');
	
	
   //echo ":" ."OP". $cnt;
?>
            <!-- <div id="timer"></div>--></span></h1>
          
<form name="frm" method="post" action="patient_reg_insert.php"  >
                
<table width="100%" cellspacing="10">
<input type="hidden" name="opno"  value="<?php echo "OP".($row1[0]+1);?>"/>
<input type="hidden" name="ipno" value="<?php echo "IP".($row1[0]+1);?>"/>

<input type="hidden" name="authby" value="<?php echo $aname; ?>"/>

<tr>
<td class="label1">New/Existing <font color="red">*</font> : </td><td>


<input type="radio" required="required" onclick="javascript:location.href='patientregister.php'"  name="new" id="new" value="New"/> New 
<input type="radio" required="required" name="new" id="new"  checked="checked" value="Existing"/> Existing

</td>

</tr>

<tr>
<td class="label1">UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="rnum" class="text" value="<?php echo $registerno; ?>" readonly /></td>
<td class="label1">Registration Date : </td><td><input name="ApplicationDeadline" id="date"  readonly="readonly"style="padding-left:2px;width:217px;height:20px;border:1px solid #840204; " type="text"  size="20"  required="required"
 value="<?php echo $radte?>  " />
 <?php /*?><input name="ApplicationDeadline1" id="intime" readonly="readonly" style="padding-left:2px;width:113px;height:20px;border:1px solid #840204;" type="text"  size="20"  required="required"
 /><?php */?></td>
</tr>



<!--<tr>
<td class="label1">Patient Type <font color="red">*</font> : </td>
<td><select name="type" style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;" required>
<option value="">Select Patient Type</option>
<option value="OP">Out Patient</option>
<option value="IP">In Patient</option></select>

</td>

</tr>-->

<tr>
<td class="label1">Patient Type <font color="red">*</font> : </td>
<td>
<input type="radio" required="required" name="type" id="sex1" checked="checked" value="OP" onchange="showHint011(this.value)"  onclick="funconce1(this.value);"/>
 Out Patient <!--<input type="radio" required="required" name="type" id="sex2" onchange="showHint012(this.value)" onclick="funconce1(this.value);" value="IP"/> In Patient
 <input type="radio" required="required" name="type" id="sex4" onchange="showHint013(this.value)" onclick="funconce1(this.value);" value="Lab"/> Lab
--></td>


<input type="hidden" name="id" value="<?php echo $id?>" />

<td class="label1">Token Number : </td><td><?php /*?><input name="ApplicationDeadline" id="date"  readonly="readonly"style="padding-left:2px;width:114px;height:20px;border:1px solid #840204; " type="text"  size="20"  required="required"
 value="<?php echo date('d-m-y');?>  " /><?php */?>
 
 
  <?php  $sql="select * from patientregister where date='$da' and pat_type='OP'";

//$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$result = mysql_query($sql);
 $cnt=mysql_num_rows($result)+1;


//while($row = mysql_fetch_array($result))
 // {
 $token="OP$cnt";?>
 
 <input name="token" value="<?php echo $token?>" id="token" value="" readonly="readonly" style="padding-left:2px;width:217px;height:20px;border:1px solid #840204;" type="text"  size="20"  required="required"
 /></td>
</tr>

<tr>
<td class="label1">Patient Name <font color="red">*</font> : </td>
<td>
<select name="pname_type">
<option value="<?php echo $pname_type?>"><?php echo $pname_type?></option>
<option value="Mr">Mr</option>
<option value="Mrs">Mrs</option>
<option value="Miss">Miss</option>
<option value="Master">Master</option>
<option value="Baby">Baby</option>
<option value="B/O">B/O</option>

</select>
<input type="text" name="pname" id="pname" style="width:165px;    padding-left: 2px;  height: 20px;
    border: 1px solid #840204;" value="<?php echo $patientname?> " class="" required="required"/></td>
<td class="label1">Father/Hus Name <font color="red">*</font> : </td><td>
<input type="text" class="text" style="width:140px;" value="<?php echo $gaurdianname?>" name="fname" id="fname" required="required" />
<select name="rel" required>
<option value="<?php echo $rel_type?>"><?php echo $rel_type?></option>
<option value="Father">Father</option>
<option value="Husband">Husband</option>
<option value="Mother">Mother</option>
</select>
</td>

</tr>

<tr>
<td class="label1">Gender <font color="red">*</font> : </td><td>
<?php if($gender=='male'){?>
<input type="radio" value="<?php echo $gender?>" checked="checked" required="required" name="sex" id="sex1" value="male"/> Male 
<input type="radio" required="required" name="sex" id="sex2" value="female"/> Female
<?php } else if($gender=='female') {?>

<input type="radio" value="<?php echo $gender?>" required="required" name="sex" id="sex1" value="male"/> Male 
<input type="radio" required="required" name="sex" checked="checked" id="sex2" value="female"/> Female<?php }?></td>
<td class="label1">Age <font color="red">*</font> : </td><td><input type="text" value="<?php  echo $age?>" class="text" name="age" id="age" required="required" /></td>

</tr>


<tr>
<td class="label1">Patient Mobile <font color="red">*</font> : </td>
<td><input type="text" name="mobile" id="mobile" class="text" value="<?php echo $phoneno?>" required="required"/></td>
<td class="label1">AAdhar Number <font color="red">*</font> : </td><td><input type="text" value="<?php echo $aadar?> " class="text" name="aadhar" id="aadhar"  /></td>

</tr>

<tr>
<td class="label1">Ref Doctor <font color="red"></font> : </td>
<td><input type="text" name="ref_doc" value="<?php echo $ref_doc?>" id="ref_doc" class="text" /></td>
<td class="label1">Ref Doct Mobile <font color="red"></font> : </td><td>
<input type="text" class="text" name="ref_mob" id="ref_mob"  value="<?php echo $ref_doc_mob?>" /></td>

</tr>

<tr>
<td class="label1">Consult Doct Name <font color="red">*</font> : </td>
<td><select name="doctorname" required id="doctorname" style="width:230px;height:20px;" onChange="showHint01(this.value)">
<option value="<?php echo $doctorname?>"><?php echo $doctorname?></option>
<?php 
include("config.php");
$sq=mysql_query("select * from  doct_infor");
if($sq){
while($row=mysql_fetch_array($sq)){

$rk=$row['dname1'];
$rk1=$row['id'];
?>
<option value="<?php echo $rk1; ?>"><?php echo $rk; ?></option>
<?php } } ?>
</select></td>
<td class="label1">Consult Doct Mobile <font color="red"></font> : </td><td>
<input type="text" class="text" name="con_doct_mob" id="con_doct_mob" value="<?php echo $con_doc_mob?>" /></td>
<input type="hidden" class="text" name="concession_type" id="concession_type"  value="card"/>
</tr>


<tr style="display: none"> <td class="label1">Consultation Fee <font color="red">*</font> : </td>
<td><input type="text" required="required" value="<?php echo $registerfee?>" name="fee" id="fee" class="text" onkeyup="calculateSum();"/></td>
 </tr>

 <tr id="dvPassport1" >
    
<td  class="label1 " >

Consultation Fee:</td><td>
    <input type="text" required="required" value="20" name="con_fee"   id="con_fee" class="text" onkeyup="calculateSum();"/></td>
   <td class="label1" style="display: none">Total Fee <font color="red">*</font> : </td>
<td style="display: none"><input type="text" required="required" value="20" readonly="readonly"  name="total" id="total" class="text"/></td></tr>

   
<!--    <font color="red">*</font> : </td>
<td>
<input type="text" id="lap_name" name="lap_name" />-->

<!--<input type="text" required="required" value="150" name="con_fee" style="display:none;" id="con_fee" class="text"/>--></td></div></tr>


<!--<tr > <td class="label1">Total Fee <font color="red">*</font> : </td>
<td><input type="text" required="required" value="150" readonly="readonly"  name="total" id="total" class="text"/></td>
    </tr>-->


<tr>
<td class="label1">Address : </td>
<td><textarea name="addr" id="addr" cols="34" rows="4"><?php echo $address?></textarea></td>
<td class="label1">Remarks : </td><td><textarea name="rmarks" id="rmarks" cols="34" rows="4"><?php echo $remarks?></textarea></td>
</tr>


<!--<tr>
<td class="label1">Token Num <font color="red">*</font> : </td>
<td><select name="tknum" id="tknum" style="width:230px;height:22px;" onchange="showHint1(this.value)">
<option value="">Select Token no</option>
<?php
include("config.php");

$sql = mysql_query("select tknum1 from patient_appoint");
if($sql){
while($row=mysql_fetch_array($sql)){
?>
<option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
<?php
}
}
?>
</select>
</td>
<td class="label1">Doctor Name <font color="red">*</font> : </td>
<td>
<select name="doctorname" required id="doctorname" style="width:230px;height:20px;" onchange="showHint01(this.value)">
<option value="">Select Doctor Name</option>
<?php 
include("config.php");
$sq=mysql_query("select * from  doct_infor");
if($sq){
while($row=mysql_fetch_array($sq)){

$rk=$row['dname1'];
$rk1=$row['id'];
?>
<option value="<?php echo $rk1; ?>"><?php echo $rk; ?></option>
<?php } } ?>
</select>
</td>
</tr>-->
<?php /*?><td class="label1" >Payment Type <font color="red">*</font>  : </td>
  <td ><select name="concession_type" style="width:230px;height:20px;" onChange="funconce(this.value);" required>
	<option value="self">Self</option>
	<option value="credit card">Credit/Debit Card</option>
	<?php
	$sql1 = mysql_query("select CONCE_CODE, CONCE_NAME from concession_type");

	if($sql1)
	{
		while($row1 = mysql_fetch_array($sql1))
		{
			
	?>
	<option value="<?php echo $row1[1]?>"><?php echo $row1[1]?></option>
	<?php
		}
	}
	?>
	</select>	
	</td>
	<td class="label1" >
	<div align="right">Card No : </div>
	
	</td>
	<td >
	<span class="label1">
	<input name="conce_card" id="conce_card" type="text" class="text" />
    <input name="conce_card" id="card1" placeholder="MKT Traumacare" type="text" class="text" style="display:none;" onFocus="showHint1(this.value);"/>
    <input name="conce_card" id="card2" placeholder="Lotus Priviliged Card" type="text" class="text" style="display:none;" onFocus="showHint2(this.value);"/>
    
	</span>
	
  </td>
</tr>
<tr id="insu1" style="display:none;" >
<td class="label1" >
	<div align="right">Insurance Type : </div>
	
	</td>
	<td >
	
	<span class="label1">
	<select style="width:230px;height:20px;" name="insutype" >
	<option value=""> -- Select -- </option>
	<option value="United Health Care India Pvt Ltd">United Health Care India Pvt Ltd</option>
	<option value="Paramount TPA">Paramount TPA</option>
	<option value="GHPL">GHPL</option>
	<option value="FHPL">FHPL</option>
	<option value="Medi Assist">Medi Assist</option>
	<option value="Bajaj Allianz TPA">Bajaj Allianz TPA</option>
	<option value="Vidal Health Care TPA(TTK)">Vidal Health Care TPA(TTK)</option>
	<option value="Star Health and Allied Insurance">Star Health and Allied Insurance</option>
	<option value="ICICI Lombard">ICICI Lombard</option>
	<option value="MD India">MD India</option>
	<option value="Heritage">Heritage</option>
	<option value="Emeditek TPA">Emeditek TPA</option>
	<option value="HDFC Ergo General Insurance">HDFC Ergo General Insurance</option>
	<option value="Raksha TPA">Raksha TPA</option>
	<option value="Medicare TPA">Medicare TPA</option>
	<option value="Health India">Health India</option>
	<option value="Future Generali India Insurance">Future Generali India Insurance</option>
	<option value="Max Bupa Health Insurance">Max Bupa Health Insurance</option>
	<option value="Alankit">Alankit</option>
	<option value="DHS-Dedicated Health Care Services">DHS-Dedicated Health Care Services</option>
	<option value="Genins TPA">Genins TPA</option>
	<option value="Appolo Munich Health Insurance">Appolo Munich Health Insurance</option>
	<option value="Spurthi Meditech">Spurthi Meditech</option>
	<option value="Vipul Ned Corp">Vipul Ned Corp</option>
	<option value="ReliGare Health Insurance">ReliGare Health Insurance</option>
	<option value="Anyuta">Anyuta</option>
	<option value="Universal Sompo General Insurance Company">Universal Sompo General Insurance Company</option>
	<option value="Reliance Health Insurance">Reliance Health Insurance</option>
	
	</select>
    </span>
  </td>
</tr>
<tr>
<td class="label1">Patient Name <font color="red">*</font> : </td>
<td><input type="text" name="pname" id="pname" class="text" required="required"/></td>
<td class="label1">Age <font color="red">*</font> : </td><td><input type="text" class="text" name="age" id="age" required="required" /></td>
</tr>
<tr>
<td class="label1">Referral Doctor : </td>
<td><input type="text" name="gname" id="gname" class="text"/></td>
<td class="label1">Gender <font color="red">*</font> : </td><td><input type="radio" required="required" name="sex" id="sex1" value="male"/> Male <input type="radio" required="required" name="sex" id="sex2" value="female"/> Female</td>
</tr>
<tr>
<td class="label1">Address : </td>
<td><textarea name="addr" id="addr" cols="34" rows="4"></textarea></td>
<td class="label1">Remarks : </td><td><textarea name="rmarks" id="rmarks" cols="34" rows="4"></textarea></td>
</tr>

<tr>
<td class="label1">Father/Husband Name : </td>
<td><input type="text" name="occ" id="occ" class="text"/></td>
<td class="label1">Phone : </td>
<td><input type="text" name="mnum" id="mnum" class="text"/></td>
</tr>
<tr>

<tr>
<input name="ApplicationDeadline2" id="ApplicationDeadline2" type="hidden" class="tcal" size="20"  value="<?php echo date("d-m-Y");  ?>" style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;" required="required"  />
<td class="label1">Doctor Name <font color="red">*</font> : </td>
<td>
<select name="doctorname" required id="doctorname" style="width:230px;height:20px;" onChange="showHint01(this.value)">
<option value="">Select Doctor Name</option>
<?php 
include("config.php");
$sq=mysql_query("select * from  doct_infor");
if($sq){
while($row=mysql_fetch_array($sq)){

$rk=$row['dname1'];
$rk1=$row['id'];
?>
<option value="<?php echo $rk1; ?>"><?php echo $rk; ?></option>
<?php } } ?>
</select>
</td>
<td class="label1">Reg Fee <font color="red">*</font> : </td>
<td><input type="text" required="required" name="fee" id="fee" class="text"/></td>
</tr><?php */?>
<tr>

</tr>

<tr><td colspan="4" align="center"><input type="submit" id="prt" name="submit" value="UPDATE" onClick="printt()" class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='patient-reg.php'"/></td></tr></table>
 </form>         
		       </div>

		<?php include('footer.php'); ?>

	</div>
    
 


	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>



