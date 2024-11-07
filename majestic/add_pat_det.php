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
<script type="text/javascript">
var n = "";

function validate(input) 
{document.myform.adv_words.value="";
	//alert(input)

var inp=Math.round(input*100)/100;
	inp=inp.toString();
//document.myform.rupees.value=inp;
	var ss=inp.split(".")
		
		
		

	if (input.length == 0) 
	{
		alert ('Please Enter A Number.');
		document.myform.rupees.value = "";
		return true;
	}

	
	else {
	var result="";
	for(ix=0;ix<ss.length;ix++){
		//alert(convert(ss[ix]));
		if(ix==0)
		result=convert(ss[ix])+" Rupees";
		if(ix==1){
		//ss[ix]=Math.round(ss[ix]);
		
		result=result+convert(ss[ix])+" Paise";
		}
		
	}
	//alert(result)
	document.myform.adv_words.value += result+" only";
	
	}
}

function d1(x) 
{ // single digit terms
	switch(x) 
	{
		case '0': n= ""; break;
		case '1': n= " One "; break;
		case '2': n= " Two "; break;
		case '3': n= " Three "; break;
		case '4': n= " Four "; break;
		case '5': n= " Five "; break;
		case '6': n= " Six "; break;
		case '7': n= " Seven "; break;
		case '8': n= " Eight "; break;
		case '9': n= " Nine "; break;
		default: n = "Not a Number";
	}
	return n;
}

function d2(x) 
{ // 10x digit terms
	switch(x) 
	{
		case '0': n= ""; break;
		case '1': n= ""; break;
		case '2': n= " Twenty "; break;
		case '3': n= " Thirty "; break;
		case '4': n= " Forty "; break;
		case '5': n= " Fifty "; break;
		case '6': n= " Sixty "; break;
		case '7': n= " Seventy "; break;
		case '8': n= " Eighty "; break;
		case '9': n= " Ninety "; break;
		default: n = "Not a Number";
	}
	return n;
}

function d3(x) 
{ // teen digit terms
	switch(x) 
	{
		case '0': n= " Ten "; break;
		case '1': n= " Eleven "; break;
		case '2': n= " Twelve "; break;
		case '3': n= " Thirteen "; break;
		case '4': n= " Fourteen "; break;
		case '5': n= " Fifteen "; break;
		case '6': n= " Sixteen "; break;
		case '7': n= " Seventeen "; break;
		case '8': n= " Eighteen "; break;
		case '9': n= " Nineteen "; break;
		default: n=  "Not a Number";
	}
	return n;
}

function convert(input) 
{
	var inputlength = input.length;

	var x = 0;
	var teen1 = "";
	var teen2 = "";
	var teen3 = "";
	var numName = "";
	var invalidNum = "";
	var a1 = ""; // for insertion of million, thousand, hundred 
	var a2 = "";
	var a3 = "";
	var a4 = "";
	var a5 = "";
	digit = new Array(inputlength); // stores output
	
	for (i = 0; i < inputlength; i++)  
	{
		// puts digits into array
		digit[inputlength - i] = input.charAt(i)
	};
	
	store = new Array(9); // store output
	
	for (i = 0; i < inputlength; i++) 
	{
		x= inputlength - i;
		switch (x) 
		{ // assign text to each digit
			case x=9: d1(digit[x]); store[x] = n; break;
			case x=8: if (digit[x] == "1") {teen3 = "yes"}
					  else {teen3 = ""}; d2(digit[x]); store[x] = n; break;
			case x=7: if (teen3 == "yes") {teen3 = ""; d3(digit[x])}
					  else {d1(digit[x])}; store[x] = n; break;
			case x=6: d1(digit[x]); store[x] = n; break;
			case x=5: if (digit[x] == "1") {teen2 = "yes"}
					  else {teen2 = ""}; d2(digit[x]); store[x] = n; break;
			case x=4: if (teen2 == "yes") {teen2 = ""; d3(digit[x])}    
					  else {d1(digit[x])}; store[x] = n; break;
			case x=3: d1(digit[x]); store[x] = n; break;
			case x=2: if (digit[x] == "1") {teen1 = "yes"}
					  else {teen1 = ""}; d2(digit[x]); store[x] = n; break;
			case x=1: if (teen1 == "yes") {teen1 = "";d3(digit[x])}     
					  else {d1(digit[x])}; store[x] = n; break;
		}
		
		if (store[x] == "Not a Number"){invalidNum = "yes"};
		
		switch (inputlength)
		{
			case 1:   store[2] = ""; 
			case 2:   store[3] = ""; 
			case 3:   store[4] = ""; 
			case 4:   store[5] = "";
			case 5:   store[6] = "";
			case 6:   store[7] = "";
			case 7:   store[8] = "";
			case 8:   store[9] = "";
		}
		
		if (store[9] != "") { a1 =" Hundred, "} else {a1 = ""};
		if ((store[9] != "")||(store[8] != "")||(store[7] != ""))
		{ a2 =" Million, "} else {a2 = ""};
		if (store[6] != "") { a3 =" Hundred "} else {a3 = ""};
		if ((store[6] != "")||(store[5] != "")||(store[4] != ""))
		{ a4 =" Thousand, "} else {a4 = ""};
		if (store[3] != "") { a5 =" Hundred "} else {a5 = ""};
	}
	// add up text, cancel if invalid input found
	if (invalidNum == "yes"){numName = "Invalid Input"}
	else 
	{
		numName =  store[9] + a1 + store[8] + store[7] 
		+ a2 + store[6] + a3 + store[5] + store[4] 
		+ a4 + store[3] + a5 + store[2] + store[1];
	}
	
	store[1] = ""; store[2] = ""; store[3] = ""; 
	store[4] = ""; store[5] = ""; store[6] = "";
	store[7] = ""; store[8] = ""; store[9] = "";
	if (numName == ""){numName = "Zero"};
return numName;

	return true;
}
  

</script>	
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
 <script>
$().ready(function() {
	$("#reg").autocomplete("advreg.php", {
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
function showHint52(str)
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
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("pname").value=strar[1]; 	
	
    }
  }         
  str = encodeURIComponent(str);
xmlhttp.open("GET","get-data1.php?q="+str,true);
xmlhttp.send();
}
</script>	
	</head>

	<body>
    <div id="conteneur">

		  <?php include('logo.php'); ?>
			<?php
			include("main_menu.php");
			?>
	
<?php /*?>	<div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php
			include("main_menu.php");
			?><?php */?>
		  
		<?php 
		if(isset($_POST['submit'])){
			$rnum=$_POST['rnum'];
		$complaint=$_POST['complaint'];
		$present=$_POST['present'];
		$past=$_POST['past'];
		$airway1=$_POST['airway1'];
		$breat1=$_POST['breat1'];
		$circ1=$_POST['circ1'];
		$airway2=$_POST['airway2'];
		$breat2=$_POST['breat2'];
		$circ2=$_POST['circ2'];
		$vitals=$_POST['vitals'];
		$pulse=$_POST['pulse'];
		$bp=$_POST['bp'];
		$bp1=$_POST['bp1'];
		$rr=$_POST['rr'];
		$spo2=$_POST['spo2'];
		$room_air=$_POST['room_air'];
		$grbs=$_POST['grbs'];
		$temp=$_POST['temp'];
		$start_ecg=$_POST['start_ecg'];
		$priority=$_POST['priority'];
		$traige=$_POST['traige'];
		$clinical=$_POST['clinical'];
		$negatiev_clinic=$_POST['negatiev_clinic'];
		$blood1=$_POST['blood1'];
		$urine1=$_POST['urine1'];
		$stool1=$_POST['stool1'];
		$xray1=$_POST['xray1'];
		$usg1=$_POST['usg1'];
		$ct_scan1=$_POST['ct_scan1'];
		$others1=$_POST['others1'];
		$blood2=$_POST['blood2'];
		$urine2=$_POST['urine2'];
		$stool2=$_POST['stool2'];
		$xray2=$_POST['xray2'];
		$usg2=$_POST['usg2'];
		$ct_scan2=$_POST['ct_scan2'];
		$others2=$_POST['others2'];
		$drug1=$_POST['drug1'];
		$dose1=$_POST['dose1'];
		$admin_by1=$_POST['admin_by1'];
		$time1=$_POST['time1'];
		$drug2=$_POST['drug2'];
		$dose2=$_POST['dose2'];
		$admin_by2=$_POST['admin_by2'];
		$time2=$_POST['time2'];
		$drug3=$_POST['drug3'];
		$dose3=$_POST['dose3'];
		$admin_by3=$_POST['admin_by3'];
		$time3=$_POST['time3'];
		$drug4=$_POST['drug4'];
		$dose4=$_POST['dose4'];
		$admin_by4=$_POST['admin_by4'];
		$time4=$_POST['time4'];
		$drug5=$_POST['drug5'];
		$dose5=$_POST['dose5'];
		$admin_by5=$_POST['admin_by5'];
		$time5=$_POST['time5'];
		$drug6=$_POST['drug6'];
		$dose6=$_POST['dose6'];
		$admin_by6=$_POST['admin_by6'];
		$time6=$_POST['time6'];
		$reffer_to=$_POST['reffer_to'];
		$refer_time=$_POST['refer_time'];
		$seen_at=$_POST['seen_at'];
		$transfer_to=$_POST['transfer_to'];
		$p=$_POST['p'];
		$refrer_bp=$_POST['refrer_bp'];
		$refer_rr=$_POST['refer_rr'];
		$refer_spo2=$_POST['refer_spo2'];
		$refer_temp=$_POST['refer_temp'];
		$treatment=$_POST['treatment'];
		$condition_discharge=$_POST['condition_discharge'];
		$follow=$_POST['follow'];
		$phys_name=$_POST['phys_name'];
		$phys_sign=$_POST['phys_sign'];
		$dis_date=$_POST['dis_date'];
		$dis_time=$_POST['dis_time'];
		$date1=$_POST['date1'];
		$additional=$_POST['additional'];
		$finding=$_POST['finding'];
		$date1=date('Y-m-d');
		$wd=$_POST['wd'];
		
		
		
	$sq=mysqli_query($link,"insert into `caseshhet_initial1`(`mrno`, `complaint`, `present`,`past`, `airway1`, `breat1`, 
	  `circ1`, `airway2`, `breat2`, `circ2`, `vitals`, `pulse`,`bp`, `bp1`, `rr`, `spo2`, `room_air`, `grbs`, `temp`, 
	  `start_ecg`,`priority`, `traige`, `clinical`, `negatiev_clinic`, `blood1`, `urine1`,`stool1`, `xray1`, `usg1`,
	   `ct_scan1`, `others1`, `blood2`, `urine2`, `stool2`, `xray2`, `usg2`, `ct_scan2`, `others2`, `drug1`, `dose1`,
	   `admin_by1`, `time1`, `drug2`, `dose2`, `admin_by2`, `time2`, `drug3`, `dose3`, `admin_by3`,
		  `time3`, `drug4`, `dose4`, `admin_by4`, `time4`, `drug5`, `dose5`, `admin_by5`, `time5`, `drug6`, `dose6`,
		   `admin_by6`, `time6`, `reffer_to`, `refer_time`, `seen_at`, `transfer_to`, `p`, `refrer_bp`, `refer_rr`, 
		   `refer_spo2`, `refer_temp`, `treatment`, `condition_discharge`, `follow`, `phys_name`, `phys_sign`, `dis_date`, 
		   `dis_time`, `date1`, `additional`, `finding`,`wd`)values(
		   '$rnum', '$complaint', '$present','$past', '$airway1', '$breat1', 
	  '$circ1', '$airway2', '$breat2', '$circ2', '$vitals', '$pulse','$bp', '$bp1', '$rr', '$spo2', '$room_air', '$grbs', '$temp', 
	  '$start_ecg','$priority', '$traige', '$clinical', '$negatiev_clinic', '$blood1', '$urine1','$stool1', '$xray1', '$usg1',
	   '$ct_scan1', '$others1', '$blood2', '$urine2', '$stool2', '$xray2', '$usg2', '$ct_scan2', '$others2', '$drug1', '$dose1',
	   '$admin_by1', '$time1', '$drug2', '$dose2', '$admin_by2', '$time2', '$drug3', '$dose3', '$admin_by3',
		  '$time3', '$drug4', '$dose4', '$admin_by4', '$time4', '$drug5', '$dose5', '$admin_by5', '$time5', '$drug6', '$dose6',
		   '$admin_by6', '$time6', '$reffer_to', '$refer_time', '$seen_at', '$transfer_to', '$p', '$refrer_bp', '$refer_rr', 
		   '$refer_spo2', '$refer_temp', '$treatment', '$condition_discharge', '$follow', '$phys_name', '$phys_sign', '$dis_date', 
		   '$dis_time', '$date1', '$additional', '$finding','$wd')")or die(mysqli_error($link));
		
		
		//$sq=mysqli_query("update patientregister set arrival_mode='$mode',ref_from='$ref',previous='$Previous' where registerno='$mr_num'");
		
		if($sq){
			print "<script>";
	print "alert('Successfully added');";
	print "self.location='add_treatment.php?krb=$rnum';";
	print "</script>";
		}
		
		
		}
		?>


		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">INITIAL ASSESSMENT SHEET</h1>
          
                      <form name="myform" method="post" action="">
                
<table width="100%" cellspacing="10">


<?php 
$krb=$_GET['krb'];
if($krb!=''){
	$ss=mysqli_query($link,"select * from patientregister where registerno='$krb'")or die(mysqli_error($link));
	while($r=mysqli_fetch_array($ss)){
		$nm=$r['patientname'];
		$gen=$r['gender'];
		$ag=$r['gender'];
		}?>
<input type="hidden" value="<?php echo $aname ?>" name="authby" onchange="showHint52(this.value);"/>
<tr><td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="reg" class="text"  value="<?php echo $krb?>"  readonly="readonly" />
Patient Name. <font color="red">*</font> : 
<input type="text" name="pname" value="<?php echo $nm?>" id="pname" class="text" /></td></tr>

<tr>
<td class="label1">Gender <font color="red">*</font> : </td>
<td><input type="text" name="gender" value="<?php echo $gen?>" id="gender" readonly="readonly" class="text" readonly="readonly" />
Age <font color="red">*</font> : 
<input type="text" name="age" value="<?php echo $ag?>" readonly="readonly" id="age" class="text" /></td>
</tr>

<?php } else{?>
<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="reg" class="text"  onclick="window.open('finalbill_popup6.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" />
Patient Name. <font color="red">*</font> : 
<input type="text" name="pname" id="pname" class="text" /></td></tr>
<tr>
<td class="label1">Gender <font color="red">*</font> : </td>
<td><input type="text" name="gender" value="" id="gender" readonly="readonly" class="text" readonly="readonly" />
Age <font color="red">*</font> : 
<input type="text" name="age" value="" readonly="readonly" id="age" class="text" /></td>
</tr>
<?php }?>
        
<tr>
<td class="label1">Presenting Complaints <font color="red">*</font> : </td><td colspan="1">
<textarea name="complaint" cols="100" rows="5"></textarea>
<!--<input type="text" name="complaint" id="complaint" class="text" />-->

</td></tr>
<tr><td class="label1">History of Present Illness <font color="red">*</font> : </td><td colspan="1">

<textarea name="present" cols="100" rows="5"></textarea>

</td>

</tr>
 <tr>
<td class="label1">History of Past Illness <font color="red">*</font> : </td><td colspan="1">

<textarea name="past" cols="100" rows="5"></textarea>

</td>
</tr>
</tr></table>
<table width="100%" border="1">
<tr style="background-color:#000; color:#FFF;">
<td class="" colspan="2" align="center" style="font-weight:bold;" align="center">Airway  </td>
<td class="" colspan="2" align="center"><strong>Breathing</strong>  </td>
<td class="" colspan="2" align="center"><strong> Circulation</strong></td></tr>

<tr>
<td colspan="1">
<strong>Assessment</strong></td><td>

<input type="text" name="airway1" id="reg" class="text" />
</td>


<td colspan="1">
<strong>Assessment</strong></td><td>

<input type="text" name="breat1" id="reg" class="text" />
</td>

<td colspan="1">
<strong>Assessment</strong></td><td>

<input type="text" name="circ1" id="reg" class="text" />
</td></tr>


<tr>
<td colspan="1">
<strong>Managment</strong></td><td>

<input type="text" name="airway2" id="reg" class="text" />
</td>


<td colspan="1">
<strong>Managment</strong></td><td>

<input type="text" name="breat2" id="reg" class="text" />
</td>

<td colspan="1">
<strong>Managment</strong></td><td>

<input type="text" name="circ2" id="reg" class="text" />
</td></tr></table>
<table style="margin-top:20px;">
<tr><td>
<strong>Vitals Taken at</strong>

<input type="text" name="vitals" style="width:100px;" /></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td >
<strong>Pulse</strong>

<input type="text" name="pulse" style="width:100px;" />Min</td>
<td style="margin-left:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>BP</strong>

<input type="text" name="bp" style="width:100px;" />/<input type="text" name="bp1" style="width:100px;" /></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td>
<strong>RR</strong>

<input type="text" name="rr" style="width:100px;" />MIN</td>

</tr>

<tr><td>


</td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td >
<strong>Spo2</strong>

<input type="text" name="spo2" style="width:100px;" />%</td>
<td style="margin-left:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>On Room Air /</strong>

<input type="text" name="room_air" style="width:100px;" />Ltt O2</td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td>
<strong>GRBS</strong>

<input type="text" name="grbs" style="width:100px;" />mg/dl</td>

<td>&nbsp;&nbsp;&nbsp;
<strong>Temp</strong>

<input type="text" name="temp" style="width:100px;" />F</td>

</tr>
</table><table style="margin-top:10px;">
<tr><td>
<strong>Stat Ecg</strong>

<input type="text" name="start_ecg" style="width:100px;" /></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td  colspan="3">
<strong>Triage Priority</strong>

<input type="radio" name="priority" value="1"  />1

<input type="radio" name="priority" value="2" />2
<input type="radio" name="priority" value="3" />3
</td>
<td style="margin-left:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Traige Done By</strong>

<input type="text" name="traige" style="width:100px;" /></td>
<td>&nbsp;&nbsp;&nbsp;</td>


</tr>

</table>

<table align="center" style="margin-top:10px;">
       
<tr>
<td class="label1">Positive Clinical Findings <font color="red">*</font> : </td><td colspan="1">
<textarea name="clinical" cols="100" rows="5"></textarea>
<!--<input type="text" name="complaint" id="complaint" class="text" />-->

</td></tr>
<tr><td class="label1">Important Negative Clinical Findings <font color="red">*</font> : </td><td colspan="1">

<textarea name="negatiev_clinic" cols="100" rows="5"></textarea>

</td>

</tr>

<tr><td class="label1">Working Diagnosis <font color="red">*</font> : </td><td colspan="1">

<textarea name="wd" cols="100" rows="5"></textarea>

</td>

</tr>
</table>

<!--<table align="center" style="margin-top:10px;" width="100%" align="center">
       
<tr>
<td  style="background-color:#000; color:#FFF; font-size:16px;" align="center"><strong></strong> </td>


</tr></table>-->

<table width="100%" border="1">
<tr style="background-color:#000; color:#FFF;">
<td class=""  align="center" style="font-weight:bold;" align="center">Investigation  </td>
<td class=""  align="center"><strong>Blood</strong>  </td>
<td class=""  align="center"><strong> Urine</strong></td>
<td class=""  align="center"><strong> Stool</strong></td>
<td class=""  align="center"><strong> X-Rays</strong></td>
<td class=""  align="center"><strong> Usg</strong></td>
<td class=""  align="center"><strong> Ct Scan/Mri</strong></td>
<td class=""  align="center"><strong> Others</strong></td>


</tr>

<tr>
<td colspan="1">
<strong>Adv.Time</strong></td><td>

<input type="text" name="blood1" id="reg" class="" style="width:70px;" />
</td>


<td colspan="1">
<input type="text" name="urine1" id="reg" class="" style="width:70px;" /></td><td>

<input type="text" name="stool1" id="reg"  style="width:70px;" />
</td>

<td colspan="1">
<input type="text" name="xray1" id="reg"  style="width:70px;"/></td><td>

<input type="text" name="usg1" id="reg"  style="width:70px;" />
</td>
<td>

<input type="text" name="ct_scan1" id="reg"  style="width:70px;"/>
</td>
<td>

<input type="text" name="others1" id="reg"  style="width:70px;" />
</td>
</tr>


<tr>
<td colspan="1">
<strong>Report Collection Time</strong></td><td>

<input type="text" name="blood2" id="reg" class="" style="width:70px;" />
</td>


<td colspan="1">
<input type="text" name="urine2" id="reg" class="" style="width:70px;" /></td><td>

<input type="text" name="stool2" id="reg"  style="width:70px;" />
</td>

<td colspan="1">
<input type="text" name="xray2" id="reg"  style="width:70px;"/></td><td>

<input type="text" name="usg2" id="reg"  style="width:70px;" />
</td>
<td>

<input type="text" name="ct_scan2" id="reg"  style="width:70px;"/>
</td>
<td>

<input type="text" name="others2" id="reg"  style="width:70px;" />
</td>

</tr></table>

<table align="center" style="margin-top:10px;" width="100%" align="center">
       
<tr>
<td  style="background-color:#000; color:#FFF; font-size:16px;" align="center"><strong>Treatment Advised</strong> </td>


</tr></table>
<table width="100%" border="1" style="margin-top:10px;">
<tr style="background-color:#000; color:#FFF;">
<td class=""  align="center" style="font-weight:bold;" align="center">Drug  </td>
<td class=""  align="center"><strong>Dose</strong>  </td>
<td class=""  align="center"><strong> Route</strong></td>
<td class=""  align="center"><strong> Administered By</strong></td>
<td class=""  align="center"><strong> Time</strong></td>



</tr>

<tr>
<td>

<input type="text" name="drug1" id="reg" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose1" id="reg" class="" style="width:170px;" /></td><td>

<input type="text" name="route1" id="reg"  value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by1" id="reg"  style="width:170px;"/></td><td>

<input type="text" name="time1" id="reg"  style="width:170px;" />
</td>

</tr>


<tr>
<td>

<input type="text" name="drug2" id="reg" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose2" id="reg" class="" style="width:170px;" /></td><td>

<input type="text" name="route2" id="reg"  value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by2" id="reg"  style="width:170px;"/></td><td>

<input type="text" name="time2" id="reg"  style="width:170px;" />
</td>

</tr>
<tr>
<td>

<input type="text" name="drug3" id="reg" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose3" id="reg" class="" style="width:170px;" /></td><td>

<input type="text" name="route3" id="reg"  value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by3" id="reg"  style="width:170px;"/></td><td>

<input type="text" name="time3" id="reg"  style="width:170px;" />
</td>

</tr>
<tr>
<td>

<input type="text" name="drug4" id="reg" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose4" id="reg" class="" style="width:170px;" /></td><td>

<input type="text" name="route4" id="reg"  value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by4" id="reg"  style="width:170px;"/></td><td>

<input type="text" name="time4" id="reg"  style="width:170px;" />
</td>

</tr>

<tr>
<td>

<input type="text" name="drug5" id="reg" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose5" id="reg" class="" style="width:170px;" /></td><td>

<input type="text" name="route5" id="reg"  value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by5" id="reg"  style="width:170px;"/></td><td>

<input type="text" name="time5" id="reg"  style="width:170px;" />
</td>

</tr>
<tr>
<td>

<input type="text" name="drug6" id="reg" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose6" id="reg" class="" style="width:170px;" /></td><td>

<input type="text" name="route6" id="reg"  value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by6" id="reg"  style="width:170px;"/></td><td>

<input type="text" name="time6" id="reg"  style="width:170px;" />
</td>

</tr>

<tr

</table>
<table style="margin-top:10px;"><tr><td><strong>Refferred to speciality/Consultant:</strong>
<input type="text" class="text" name="" />
<strong>Time:</strong><input type="text" name="" class="text" />
<strong>Seen At:</strong><input type="text" name="" class="text" /></td></tr>
<tr><td height="10px;"></td></tr>
<tr><td><strong>Transferred To:</strong><input type="text" name="" class="" style="width:900px;" /></td></tr>
<tr><td height="10px;"></td></tr>

<tr><td><strong>Vitals At Time of Transfer P</strong><input type="text" name="" style="width:100px;" /> , <strong>BP</strong>
 <input type="text" name="" style="width:100px;" /> ,<strong>RR</strong><input type="text" name="" style="width:100px;" /> , <strong>SPO2</strong>
 <input type="text" name="" style="width:100px;" />, <strong>Temp</strong><input type="text" name="" /></td></tr>
 
 <tr><td height="10px;"></td></tr>
 <tr><td><strong>Conclusions at Termination of Treatment:</strong><input type="text" name="" class="" style="width:700px;" /></td></tr>

<tr><td height="10px;"></td></tr>
 <tr><td><strong>Condition of the patient at Dischaege:</strong><input type="text" name="" class="" style="width:700px;" /></td></tr>
<tr><td height="10px;"></td></tr>
 <tr><td><strong>Follow up Instructions:</strong><textarea name="" cols="100" rows="3"></textarea></td></tr>
<tr><td height="10px;"></td></tr>

<tr><td><strong>ER Physican Name</strong><input type="text" style="width:270px;" /><strong> Signature</strong><input type="text" style="width:250px;" />
<strong>Date</strong><input type="text" style="width:100px;" />
<strong> Time</strong><input type="text" style="width:100px;" /></td></tr>
</table>


<table>
<tr><td height="20px;"></td></tr>
<tr><td class="label1"><strong>Additional Notes</strong> <font color="red">*</font> : </td><td colspan="1">

<textarea name="present" cols="100" rows="5"></textarea>

</td>

</tr>
 <tr>
<td class="label1"><strong>Investigation Findings</strong> <font color="red">*</font> : </td><td colspan="1">

<textarea name="past" cols="100" rows="5"></textarea>

</td>
</tr>
</tr></table>

<table align="center">
    
            

<tr><td colspan="2" width="400"></td><td  align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='int_det.php'"/></td></tr></table>
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