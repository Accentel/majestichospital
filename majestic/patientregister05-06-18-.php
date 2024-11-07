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
		include("header1.php");
	?>
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min1.css" />
     <script>
$().ready(function() {
	$("#card1").autocomplete("cardno.php", {
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
	$("#card2").autocomplete("cardno1.php", {
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
	
	document.getElementById("con_fee").value=strar[1];
	document.getElementById("con_doct_mob").value=strar[2];
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
function showHint01345(str)
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
	
	document.getElementById("token1").value=strar[1];
	}
  }
xmlhttp.open("GET","setn13.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function showHint022(str)
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
	
	document.getElementById("ref_mob").value=strar[1];
	}
  }
xmlhttp.open("GET","set022.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function funconce(str){
	//alert(str);
	if(str == "Insurence"){
	
		//document.getElementById("card1").style.display='none';
		//document.getElementById("card2").style.display='none';
		
		document.getElementById("insu1").style.display='';
		document.getElementById("card1").style.display='none';
		document.getElementById("cardk").style.display='none';
		
	}else if(str == "Chequee"){
		//document.getElementById("insu1").style.display='none';
	//	document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		document.getElementById("cardk").style.display='';
		document.getElementById("card1").style.display='';
		document.getElementById("insu1").style.display='none';
		
		
	}else if(str == "Cash"){
		document.getElementById("insu1").style.display='none';
		document.getElementById("cardk").style.display='none';
		document.getElementById("card1").style.display='none';
	}
	else if(str == "Free"){
		document.getElementById("insu1").style.display='none';
		document.getElementById("cardk").style.display='none';
		document.getElementById("card1").style.display='none';
	}
}


function funconce2(str){
	//alert(str);
	if(str == "Yes"){
	
		//document.getElementById("card1").style.display='none';
		//document.getElementById("card2").style.display='none';
		document.getElementById("insu2").style.display='';
		document.getElementById("insu3").style.display='';
		document.getElementById("insu4").style.display='';
		//document.getElementById("card1").style.display='none';
		//document.getElementById("cardk").style.display='none';
		
	}else if(str == "No"){
		//document.getElementById("insu1").style.display='none';
	//	document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		//document.getElementById("cardk").style.display='';
		//document.getElementById("card1").style.display='';
		document.getElementById("insu2").style.display='none';
		document.getElementById("insu3").style.display='none';
		document.getElementById("insu4").style.display='none';
		
	}
}

</script> 



<script>
function funconce1(str){
	//alert(str);
	if(str == "IP"){
	
		
		//document.getElementById("con_fee").style.display='';
		
	}else if(str == "OP"){
		//document.getElementById("con_fee").style.display='none';
		//document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		
		//document.getElementById("card1").style.display='';
		
		
	}
}
</script>
<style>.krk{padding:8px;
	line-height:1.42857143;vertical-align:top !important; /*border-top:1px solid #ddd*/}</style>
	</head>

	<body>

	<div id="conteneur container" style="height:auto;">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
	<?php
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
		  <div id="centre" class="table-responsive" style="height:auto; width:100%" >
          <h1 style="color:red;" align="center">PATIENT REGISTRATION <!--<span id="date_time"></span>-->
    
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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

        </script>                      	     <!-- <div id="timer"></div>--></span></h1>
          
<form name="frm" method="post" action="patient_reg_insert.php"  >
<input type="hidden" name="ser" value="<?php echo $aname?>" />
   <div  style="border:0px solid;">              
<table width="100%" border="0" class="table" cellspacing="10">
<input type="hidden" name="opno"  value="<?php echo "OP".($row1[0]+1);?>"/>
<input type="hidden" name="ipno" value="<?php echo "IP".($row1[0]+1);?>"/>

<input type="hidden" name="authby" value="<?php echo $aname; ?>"/>
<tr><td ><?php $dt=date('y');
		 $d1=date('m');
		if($d1=='01'){$y=$dt-1;}
		if($d1=='02'){$y=$dt-1;}
		if($d1=='03'){$y=$dt-1;}
		
		if($d1=='04'){$y=$dt;}
		if($d1=='05'){$y=$dt;}
		if($d1=='06'){$y=$dt;}
		
		if($d1=='07'){$y=$dt;}
		if($d1=='08'){$y=$dt;}
		if($d1=='09'){$y=$dt;}
		
		if($d1=='10'){$y=$dt;}
		if($d1=='11'){$y=$dt;}
		if($d1=='12'){$y=$dt;}
		
		?>  </td></tr>
<tr>
<td class="label1">New/Existing <font color="red">*</font> : </td><td>
<input type="radio" required="required" checked="checked" name="new" id="new" value="New"/> New 
<input type="radio" onclick="javascript:location.href='patientregister2.php'" required="required"  name="new" id="new" value="Existing"/> Existing</td>

</tr>
<tr>
<td class="label1">UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="rnum" class="text" value="<?php echo "MHS-$y-".($row1[0]+101); ?>" readonly /></td>
<td class="label1">Registration Date : </td><td><input name="ApplicationDeadline" id="date"   style="padding-left:2px;width:110px;height:20px;border:1px solid #840204; " type="text"  size="20"  required="required"
 value=" <?php echo date('d-m-y'); ?>" readonly placeholder=""/>
 <input name="ApplicationDeadline1" id="intime" readonly="readonly" style="padding-left:2px;width:110px;height:20px;border:1px solid #840204;" type="text"  size="20"  required="required"
 /></td>
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
<td><input type="radio" required="required" name="type" id="sex1" value="OP" onchange="showHint011(this.value)"  onclick="funconce1(this.value);"/>
 Out Patient <input type="radio" required="required" name="type" id="sex2" onchange="showHint012(this.value)" onclick="funconce1(this.value);" value="IP"/> In Patient
 <input type="radio" required="required" name="type" id="sex4" onchange="showHint013(this.value)" onclick="funconce1(this.value);" value="Lab"/> Lab
 </td>

<td class="label1">Patient ID : </td><td><?php /*?><input name="ApplicationDeadline" id="date"  readonly="readonly"style="padding-left:2px;width:114px;height:20px;border:1px solid #840204; " type="text"  size="20"  required="required"
 value="<?php echo date('d-m-y');?>  " /><?php */?>
 <input name="token" id="token" readonly="readonly"  class="text" type="text"  size="20"  required="required"
 /></td>
</tr>

<tr>
<td class="label1">Patient Name <font color="red">*</font> : </td>
<td>

<select name="pname_type" style="width:20% !important;">
<option value="Mr">Mr</option>
<option value="Mrs">Mrs</option>
<option value="Miss">Miss</option>
<option value="Master">Master</option>
<option value="Baby">Baby</option>
<option value="B/O">B/O</option>

</select>
<input type="text" name="pname" id="pname" style="width:75% !important;"  class="text" required="required"/></td>
<td class="label1">Father/Hus Name <font color="red">*</font> : </td><td>
<select name="rel" required style="width:20% !important;">
<option value="">Relation</option>
<option value="Father">Father</option>
<option value="Husband">Husband</option>
<option value="Mother">Mother</option>
</select>
<input type="text" class="text" style="width:75% !important;" name="fname" id="fname" required="required" />

</td>

</tr>

<tr>
<td class="label1">Gender <font color="red">*</font> : </td><td><input type="radio" class="" required="required" name="sex" id="sex1" value="male"/> Male <input type="radio" required="required" name="sex" id="sex2" value="female"/> Female</td>
<td class="label1">Age <font color="red">*</font> : </td><td><input type="text" class="text" name="age" id="age" required="required" /></td>

</tr>


<tr>
<td class="label1">Patient Mobile <font color="red">*</font> : </td>
<td><input type="text" name="mobile" id="mobile" class="text" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/></td>
<td class="label1">AAdhar Number <font color="red"></font> : </td><td><input type="text" class="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="aadhar" id="aadhar"  /></td>

</tr>

<tr>
<td class="label1">Reg Fee <font color="red">*</font> : </td>
<td><input type="text" required="required" value="0" name="fee" id="fee" class="text" onkeyup="calculateSum();"/></td>

<input id=\"name\" list=\"city1\" type="hidden" class="text" name="dept" id="dept"  >
<datalist id=\"city1\" >

<?php 
$sql="select distinct DEPT_NAME from dept ";  // Query to collect records
$r=mysql_query($sql) or die(mysql_error());
while ($row=mysql_fetch_array($r)) {
echo  "<option value=\"$row[DEPT_NAME]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
<?php /*?>


<select  name="dept" id="dept" required  >
<option value="">Select Department</option>
<?php 

$sq=mysql_query("select * from  dept");
if($sq){
while($row=mysql_fetch_array($sq)){

$DEPT_NAME=$row['DEPT_NAME'];
//$refcode=$row['refcode'];
?>
<option value="<?php echo $DEPT_NAME; ?>"><?php echo $DEPT_NAME; ?></option>
<?php } } ?>

</select><?php */?>


<td class="label1">Token Number : </td><td><?php /*?><input name="ApplicationDeadline" id="date"  readonly="readonly"style="padding-left:2px;width:114px;height:20px;border:1px solid #840204; " type="text"  size="20"  required="required"
 value="<?php echo date('d-m-y');?>  " /><?php */?>
 <input name="token1" id="token1" readonly="readonly"  class="text" type="text"  size="20"  required="required"
 /></td>


</tr>



<tr>
<td class="label1">Ref Doctor <font color="red"></font> : </td>
<td><select  name="ref_doc" id="ref_doc"   onChange="showHint022(this.value)">
<option value="">Select Referal Doctor</option>
<?php 

$sq=mysql_query("select * from  referal_doctor");
if($sq){
while($row=mysql_fetch_array($sq)){

$ref_docname=$row['ref_docname'];
$refcode=$row['refcode'];
?>
<option value="<?php echo $refcode; ?>"><?php echo $ref_docname; ?></option>
<?php } } ?>

</select></td>
<td class="label1">Ref Doct Mobile <font color="red"></font> : </td><td><input type="text" class="text" name="ref_mob" id="ref_mob"  /></td>

</tr>

<tr>
<td class="label1">Consult Doct Name <font color="red">*</font> : </td>
<td><select name="doctorname" required id="doctorname"  onfocus="showHint01(this.value)" onmouseout="showHint01(this.value)"  onChange="showHint01345(this.value)"  onblur="showHint01345(this.value)">
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
</select></td>
<td class="label1">Consult Doct Mobile <font color="red"></font> : </td><td><input type="text" class="text" name="con_doct_mob" id="con_doct_mob" /></td>
<input type="hidden" class="text" name="concession_type" id="concession_type"  value="card"/>
</tr>


<tr> <td class="label1" >If You have Insurence <font color="red">*</font>  : </td>
  <td ><select name="ins_type"  onChange="funconce2(this.value);" required>
	<option value="">Select Insurence Type</option>
     <option value="Yes">Yes</option>
	<option value="No">No</option>
		<!--<option value="Bank">Bank</option>-->
        <!--<option value="Insurence">Insurence</option>-->
	</select>	
	</td>

<td class="label1" >Payment Type <font color="red">*</font>  : </td>
  <td ><select name="payment_type"  onChange="funconce(this.value);" required>
	<option value="Cash">Cash</option>
     <option value="Free">Free</option>
	<option value="Chequee">Chequee</option>
		<!--<option value="Bank">Bank</option>-->
        <option value="Insurence">Insurence</option>
	</select>	
	</td>
 </tr>
 
 
 <tr id="dvPassport1" style="display: none">
    
<td  class="label1 " >

Consultation Fee:</td><td>
    <input type="text" required="required" name="con_fee"   id="con_fee" class="text"/></td>
   <td class="label1">Total Fee <font color="red">*</font> : </td>
<td><input type="text" required="required"  readonly="readonly"  name="total" id="total" class="text"/></td></tr>
   
   
<!--    <font color="red">*</font> : </td>
<td>
<input type="text" id="lap_name" name="lap_name" />-->

<!--<input type="text" required="required" value="150" name="con_fee" style="display:none;" id="con_fee" class="text"/>--></td></div></tr>


<!--<tr > <td class="label1">Total Fee <font color="red">*</font> : </td>
<td><input type="text" required="required" value="150" readonly="readonly"  name="total" id="total" class="text"/></td>
    </tr>-->

    
    <tr id="insu2" style="display:none;" >
<td class="label1" >
	<div align="right">Insurance Name : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
   <!-- <input type="text"    name="insutype" id="insutype" class="text"/>-->
    
	<select  name="insutype_name" >
	<option value=""> -- Select -- </option>
<?php	$sq = mysql_query("select * from insurance order by ins_name ");
			  
			 
			  $tot=mysql_num_rows($sq);
			  while($res=mysql_fetch_array($sq)){
			 
			  $lid = $res['id'];
			  $locname=$res['ins_name'];?>
              <option value="<?php echo $locname?>"><?php echo $locname?></option><?php }?>
	
	</select>
    </span>
  </td>
  <td class="label1">Policy No : </td><td>  <input type="text"   name="policy_no" id="policy_no" class="text"/></td>
</tr>
    
     <tr id="insu3" style="display:none;" >
<td class="label1" >
	<div align="right">Package Amount : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="text"    name="pkg_amt" id="pkg_amt" class="text"/>
    
	
    </span>
  </td>
  <td class="label1">Request Amount : </td><td>  <input type="text"   name="req_amt" id="req_amt" class="text"/></td>
</tr>
    
    <tr id="insu4" style="display:none;" >
<td class="label1" >
	<div align="right">Requested No : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="text"    name="req_no" id="req_no" class="text"/>
    
	
    </span>
  </td>
  <td class="label1">Approved Date: </td><td>  <input type="date"   name="apr_date" id="apr_date" class="text"/></td>
</tr> 
<tr>
<td class="label1">Address : </td>
<td><textarea name="addr" id="addr" style="width:100%"></textarea></td>
<td class="label1">Remarks : </td><td><textarea name="rmarks" id="rmarks" style="width:100%"></textarea></td>
</tr>



 <tr id="insu1" style="display:none;" >
<td class="label1" >
	<div align="right">Insurance Name : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="text"    name="insutype" id="insutype" class="text"/>
    
	<!--<select style="width:230px;height:20px;" name="insutype" >
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
	
	</select>-->
    </span>
  </td>
  <td class="label1">Policy No : </td><td>  <input type="text"   name="policy" id="policy" class="text"/></td>
</tr>

<tr id="card1" style="display:none;" >
<td class="label1" >
	<div align="right">Chequee : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="text"   name="chq_num" id="chq_num" class="text"/>
   
    </span>
  </td>
  <td class="label1">Bank Name : </td><td>  <input type="text"   name="bank" id="bank" class="text"/></td>
</tr>
<tr id="cardk" style="display:none;" >
<td class="label1" >
	<div align="right">Chequee Date : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="date" name="chq_date" id="chq_date" class="text"/>
   
    </span>
  </td></tr>
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

<tr><td colspan="4" align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='patient-reg.php'"/></td></tr></table>
</table></div>
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



