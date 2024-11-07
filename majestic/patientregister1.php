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
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
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
	if(str == "IP"){
	
		
		document.getElementById("con_fee").style.display='';
		
	}else if(str == "OP"){
		document.getElementById("con_fee").style.display='none';
		//document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		
		//document.getElementById("card1").style.display='';
		
		
	}
}
</script>
	</head>

	<body>

	<div id="conteneur">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
<?php */?>	<?php
include('logo.php');
			include("main_menu.php");
			?>
		  
	 <?php
			include("config.php");
//$abc=$_GET['id'];


	
	$abc=mysqli_query($link,"select max(reg_id)+0,registerdate from patientregister") or die(mysqli_error($link));
	$row1=mysqli_fetch_array($abc);
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
 $id=$_GET['id'];
  $xxx="select * from patientregister where reg_id='$id' ";
$abc=mysqli_query($link,$xxx) or die(mysqli_error($link));
 //$cnt=mysql_num_rows($abcd);
$row1=mysqli_fetch_array($abc);
$registerno=$row1['registerno'];
$radte=$row1['date'];
$ptype=$row1['pat_type'];
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
$tokenno=$row1['tokenno'];
$cons_fee=$row1['cons_fee'];
$total=$row1['total'];
$pat_type1=$row1['pat_type1'];
$pname_type=$row1['pname_type'];
?>

		  <div id="centre" style="height:auto">
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
            if ($("#sex2").is(":checked")) {
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
		

        </script>                           <!-- <div id="timer"></div>--></span></h1>
         
        
        
        
<form name="frm" method="post" action="pat_update.php"  >
                
<table width="100%" cellspacing="10">
<input type="hidden" name="opno"  value="<?php echo "OP".($row1[0]+1);?>"/>
<input type="hidden" name="ipno" value="<?php echo "IP".($row1[0]+1);?>"/>

<input type="hidden" name="authby" value="<?php echo $aname; ?>"/>

<tr>
<td class="label1">New/Existing <font color="red">*</font> : </td><td>
<?php if($pat_type1=='New'){?>

<input type="radio" required="required" checked="checked" checked="checked" name="new" id="new" value="New"/> New 
<input type="radio" required="required" name="new" id="new" value="Existing"/> Existing<?php } else if($pat_type1=='Existing') {?>
<input type="radio" required="required" checked="checked" name="new" id="new" value="New"/> New 
<input type="radio" required="required" name="new" id="new" checked="checked" value="Existing"/> Existing

<?php }?>
</td>

</tr>

<tr>
<td class="label1">UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="rnum" class="text" value="<?php echo $registerno; ?>" readonly /></td>
<td class="label1">Registration Date : </td><td><input name="ApplicationDeadline" id="date"  style="padding-left:2px;width:217px;height:20px;border:1px solid #840204; " type="text"  size="20"  required="required"
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
<td><?php if($ptype=='OP'){?> 

<input type="radio" required="required" readonly="readonly" checked="checked" name="type" id="sex1" value="OP" onchange="showHint011(this.value)"  onclick="funconce1(this.value);"/>
 Out Patient <input type="radio" required="required"  readonly="readonly" name="type" id="sex2" onchange="showHint012(this.value)" onclick="funconce1(this.value);" value="IP"/> In Patient
<input type="radio" required="required" name="type" id="sex4" onchange="showHint013(this.value)" onclick="funconce1(this.value);" value="Lab"/> Lab
</td>
<?php } else if($ptype=='IP'){?> 

<input type="radio" required="required" name="type"  readonly="readonly" id="sex1" value="OP" onchange="showHint011(this.value)"  onclick="funconce1(this.value);"/>
 Out Patient <input type="radio" required="required"  readonly="readonly" checked="checked" name="type" id="sex2" onchange="showHint012(this.value)" onclick="funconce1(this.value);" value="IP"/> In Patient
<input type="radio" required="required" name="type" id="sex4" onchange="showHint013(this.value)" onclick="funconce1(this.value);" value="Lab"/> Lab
</td>
<?php }else if($ptype=='Lab'){?> 

<input type="radio" required="required" name="type"  readonly="readonly" id="sex1" value="OP" onchange="showHint011(this.value)"  onclick="funconce1(this.value);"/>
 Out Patient <input type="radio" required="required"  readonly="readonly"  name="type" id="sex2" onchange="showHint012(this.value)" onclick="funconce1(this.value);" value="IP"/> In Patient
<input type="radio" required="required" name="type" checked="checked" id="sex4" onchange="showHint013(this.value)" onclick="funconce1(this.value);" value="Lab"/> Lab

<?php }?></td>

<input type="hidden" name="id" value="<?php echo $id?>" />

<td class="label1">Token Number : </td><td><?php /*?><input name="ApplicationDeadline" id="date"  readonly="readonly"style="padding-left:2px;width:114px;height:20px;border:1px solid #840204; " type="text"  size="20"  required="required"
 value="<?php echo date('d-m-y');?>  " /><?php */?>
 <input name="token" value="<?php echo $tokenno?>" id="token" readonly="readonly" style="padding-left:2px;width:217px;height:20px;border:1px solid #840204;" type="text"  size="20"  required="required"
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
<option value="Husband">Husband</option></select>
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
//include("config.php");
$sq=mysqli_query($link,"select * from  doct_infor") or die(mysqli_error($link));
if($sq){
while($row=mysqli_fetch_array($sq)){

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


<tr> <td class="label1">Reg Fee <font color="red">*</font> : </td>
<td><input type="text"  value="<?php echo $registerfee?>" name="fee" id="fee" class="text" /></td>
 </tr>
 <?php if($ptype=='OP'){?>
 
 <tr id="dvPassport1">
    
<td  class="label1 " >

Consultation Fee:</td><td>
    <input type="text" required="required" value="<?php echo $cons_fee?>" name="con_fee"  id="con_fee" class="text"/></td>
   <td class="label1">Total Fee <font color="red">*</font> : </td>
<td><input type="text" required="required" value="<?php echo $total?>" readonly="readonly"  name="total" id="total" class="text"/></td></tr>
   
   <?php }?>
   
    <script type="text/javascript">
		$(function(){
$('#fee').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#con_fee').val());
    $('#total').val(totalpoints + balance);
});

});//]]>  
</script>
    <script type="text/javascript">
		$(function(){
$('#con_fee').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#fee').val());
    $('#total').val(totalpoints + balance);
});

});//]]>  
</script>
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




<tr>

</tr>

<tr><td colspan="4" align="center"><input type="submit" id="prt" name="submit" value="UPDATE" onClick="printt()" class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='patient-reg.php'"/></td></tr></table>
 </form>         
		       </div>
<br /><br /><br />
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



