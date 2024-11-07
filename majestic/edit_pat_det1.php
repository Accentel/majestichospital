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
	</head>

	<body>
    <div id="conteneur">

		  <?php include('logo.php'); ?>
			<?php
			include("main_menu.php");
			include("config.php");
			?>
            
	
	<?php /*?><div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php
			include("main_menu.php");
			?><?php */?>
            
            
            <?php
			 $id=$_REQUEST['id'];
			$qs=mysql_query("select * from `caseshhet_initial1` where id='$id'");
			while($r=mysql_fetch_array($qs)){
				
			$rnum=$r['mrno'];
		$complaint=$r['complaint'];
		$present=$r['present'];
		$past=$r['past'];
		$airway1=$r['airway1'];
		$breat1=$r['breat1'];
		$circ1=$r['circ1'];
		$airway2=$r['airway2'];
		$breat2=$r['breat2'];
		$circ2=$r['circ2'];
		$vitals=$r['vitals'];
		$pulse=$r['pulse'];
		$bp=$r['bp'];
		$bp1=$r['bp1'];
		$rr=$r['rr'];
		$spo2=$r['spo2'];
		$room_air=$r['room_air'];
		$grbs=$r['grbs'];
		$temp=$r['temp'];
		$start_ecg=$r['start_ecg'];
		$priority=$r['priority'];
		$traige=$r['traige'];
		$clinical=$r['clinical'];
		$negatiev_clinic=$r['negatiev_clinic'];
		$blood1=$r['blood1'];
		$urine1=$r['urine1'];
		$stool1=$r['stool1'];
		$xray1=$r['xray1'];
		$usg1=$r['usg1'];
		$ct_scan1=$r['ct_scan1'];
		$others1=$r['others1'];
		$blood2=$r['blood2'];
		$urine2=$r['urine2'];
		$stool2=$r['stool2'];
		$xray2=$r['xray2'];
		$usg2=$r['usg2'];
		$ct_scan2=$r['ct_scan2'];
		$others2=$r['others2'];
		$drug1=$r['drug1'];
		$dose1=$r['dose1'];
		$admin_by1=$r['admin_by1'];
		$time1=$r['time1'];
		$drug2=$r['drug2'];
		$dose2=$r['dose2'];
		$admin_by2=$r['admin_by2'];
		$time2=$r['time2'];
		$drug3=$r['drug3'];
		$dose3=$r['dose3'];
		$admin_by3=$r['admin_by3'];
		$time3=$r['time3'];
		$drug4=$r['drug4'];
		$dose4=$r['dose4'];
		$admin_by4=$r['admin_by4'];
		$time4=$r['time4'];
		$drug5=$r['drug5'];
		$dose5=$r['dose5'];
		$admin_by5=$r['admin_by5'];
		$time5=$r['time5'];
		$drug6=$r['drug6'];
		$dose6=$r['dose6'];
		$admin_by6=$r['admin_by6'];
		$time6=$r['time6'];
		$reffer_to=$r['reffer_to'];
		$refer_time=$r['refer_time'];
		$seen_at=$r['seen_at'];
		$transfer_to=$r['transfer_to'];
		$p=$r['p'];
		$refrer_bp=$r['refrer_bp'];
		$refer_rr=$r['refer_rr'];
		$refer_spo2=$r['refer_spo2'];
		$refer_temp=$r['refer_temp'];
		$treatment=$r['treatment'];
		$condition_discharge=$r['condition_discharge'];
		$follow=$r['follow'];
		$phys_name=$r['phys_name'];
		$phys_sign=$r['phys_sign'];
		$dis_date=$r['dis_date'];
		$dis_time=$r['dis_time'];
		$date1=$r['date1'];
		$additional=$r['additional'];
		$finding=$r['finding'];
		$wd=$r['wd'];
			}
?>
            
            
	


		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">INITIAL ASSESSMENT SHEET</h1>
          
                      <form name="myform" method="post" action="">
                
<table width="100%" cellspacing="10">

<!--<tr>
<input type="hidden" value="<?php echo $aname ?>" name="authby"/>
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="mrnum" value="<?php echo $rnum?>" id="reg" class="text" /></td>
</tr>-->



<?php 
	$ss=mysql_query("select * from patientregister where registerno='$rnum'");
	while($r=mysql_fetch_array($ss)){
		$nm=$r['patientname'];
		$gen=$r['gender'];
		$ag=$r['age'];
		}?>
<input type="hidden" value="<?php echo $aname ?>" name="authby" onchange="showHint52(this.value);"/>


<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" value="<?php echo $rnum?>" id="reg" class="text"  onclick="window.open('finalbill_popup6.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" />
Patient Name. <font color="red">*</font> : 
<input type="text" name="pname" id="pname" value="<?php echo $nm?>" class="text" /></td></tr>
<tr>
<td class="label1">Gender <font color="red">*</font> : </td>
<td><input type="text" name="gender" value="<?php echo $gen?>" id="gender" readonly="readonly" class="text" readonly="readonly" />
Age <font color="red">*</font> : 
<input type="text" name="age" value="<?php echo $ag?>" readonly="readonly" id="age" class="text" /></td>
</tr>

<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->

        
<tr>
<td class="label1">Presenting Complaints <font color="red">*</font> : </td><td colspan="1">
<textarea name="complaint" cols="100" rows="5"><?php echo $complaint?></textarea>
<!--<input type="text" name="complaint" id="complaint" class="text" />-->

</td></tr>
<tr><td class="label1">History of Present Illness <font color="red">*</font> : </td><td colspan="1">

<textarea name="present" cols="100" rows="5"><?php echo $present?></textarea>

</td>

</tr>
 <tr>
<td class="label1">History of Past Illness <font color="red">*</font> : </td><td colspan="1">

<textarea name="past" cols="100" rows="5"><?php echo $past?></textarea>

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

<input type="text" name="airway1" id="reg" value="<?php echo $airway1?>" class="text" />
</td>


<td colspan="1">
<strong>Assessment</strong></td><td>

<input type="text" name="breat1" id="reg" value="<?php echo $breat1?>" class="text" />
</td>

<td colspan="1">
<strong>Assessment</strong></td><td>

<input type="text" name="circ1" id="reg" value="<?php echo $circ1?>" class="text" />
</td></tr>


<tr>
<td colspan="1">
<strong>Managment</strong></td><td>

<input type="text" name="airway2" id="reg" value="<?php echo $airway2?>" class="text" />
</td>


<td colspan="1">
<strong>Managment</strong></td><td>

<input type="text" name="breat2" id="reg"  value="<?php echo $breat2?>" class="text" />
</td>

<td colspan="1">
<strong>Managment</strong></td><td>

<input type="text" name="circ2" id="reg" value="<?php echo $circ2?>" class="text" />
</td></tr></table>
<table style="margin-top:20px;">
<tr><td>
<strong>Vitals Taken at</strong>

<input type="text" name="vitals" style="width:100px;" value="<?php echo $vitals?>"/></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td >
<strong>Pulse</strong>

<input type="text" name="pulse" style="width:100px;"  value="<?php echo $pulse?>"/>Min</td>
<td style="margin-left:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>BP</strong>

<input type="text" name="bp" style="width:100px;" value="<?php echo $bp?>" />/<input type="text" name="bp1" value="<?php echo $bp1?>" style="width:100px;" /></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td>
<strong>RR</strong>

<input type="text" name="rr" value="<?php echo $rr?>" style="width:100px;" />MIN</td>

</tr>

<tr><td>


</td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td >
<strong>Spo2</strong>

<input type="text" name="spo2" value="<?php echo $spo2?>" style="width:100px;" />%</td>
<td style="margin-left:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>On Room Air /</strong>

<input type="text" name="room_air" value="<?php echo $room_air?>" style="width:100px;" />Ltt O2</td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td>
<strong>GRBS</strong>

<input type="text" name="grbs" value="<?php echo $grbs?>" style="width:100px;" />mg/dl</td>

<td>&nbsp;&nbsp;&nbsp;
<strong>Temp</strong>

<input type="text" name="temp" value="<?php echo $temp?>" style="width:100px;" />F</td>

</tr>
</table><table style="margin-top:10px;">
<tr><td>
<strong>Stat Ecg</strong>

<input type="text" name="start_ecg" value="<?php echo $start_ecg?>" style="width:100px;" /></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td  colspan="3">
<strong>Triage Priority</strong>
<?php if($priority=='1'){?>
<input type="radio" name="priority" value="1"  checked="checked" />1
<?php } else {?>
<input type="radio" name="priority" value="1"   />1

<?php  } if($priority=='2'){?>
<input type="radio" name="priority" value="2" checked="checked" />2<?php } else {?>
<input type="radio" name="priority" value="2" />2<?php } ?>
<?php if($priority=='3'){?>
<input type="radio" name="priority" value="3"  checked="checked"/>3<?php } else {?>
<input type="radio" name="priority" value="3" />3<?php }?>
</td>
<td style="margin-left:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Traige Done By</strong>

<input type="text" name="traige" value="<?php echo $traige?>" style="width:100px;" /></td>
<td>&nbsp;&nbsp;&nbsp;</td>


</tr>

</table>

<table align="center" style="margin-top:10px;">
       
<tr>
<td class="label1">Positive Clinical Findings <font color="red">*</font> : </td><td colspan="1">
<textarea name="clinical"  cols="100" rows="5"><?php echo $clinical?></textarea>
<!--<input type="text" name="complaint" id="complaint" class="text" />-->

</td></tr>
<tr><td class="label1">Important Negative Clinical Findings <font color="red">*</font> : </td><td colspan="1">

<textarea name="negatiev_clinic" cols="100" rows="5"><?php echo $negatiev_clinic?></textarea>

</td>

</tr>
<tr><td class="label1">Working Diagnosis <font color="red">*</font> : </td><td colspan="1">

<textarea name="wd" cols="100" rows="5"><?php echo $wd?></textarea>

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

<input type="text" name="blood1" id="reg" value="<?php echo $blood1?>" class="" style="width:70px;" />
</td>


<td colspan="1">
<input type="text" name="urine1" id="reg" value="<?php echo $urine1?>" class="" style="width:70px;" /></td><td>

<input type="text" name="stool1" id="reg" value="<?php echo $stool1?>" style="width:70px;" />
</td>

<td colspan="1">
<input type="text" name="xray1" id="reg" value="<?php echo $xray1?>"  style="width:70px;"/></td><td>

<input type="text" name="usg1" id="reg" value="<?php echo $usg1?>" style="width:70px;" />
</td>
<td>

<input type="text" name="ct_scan1" id="reg" value="<?php echo $ct_scan1?>" style="width:70px;"/>
</td>
<td>

<input type="text" name="others1" id="reg" value="<?php echo $others1?>"  style="width:70px;" />
</td>
</tr>


<tr>
<td colspan="1">
<strong>Report Collection Time</strong></td><td>

<input type="text" name="blood2" id="reg" value="<?php echo $blood2?>" class="" style="width:70px;" />
</td>


<td colspan="1">
<input type="text" name="urine2" id="reg" value="<?php echo $urine2?>" class="" style="width:70px;" /></td><td>

<input type="text" name="stool2" id="reg" value="<?php echo $stool2?>"  style="width:70px;" />
</td>

<td colspan="1">
<input type="text" name="xray2" id="reg" value="<?php echo $xray2?>" style="width:70px;"/></td><td>

<input type="text" name="usg2" id="reg" value="<?php echo $usg2?>"  style="width:70px;" />
</td>
<td>

<input type="text" name="ct_scan2" value="<?php echo $ct_scan2?>" id="reg"  style="width:70px;"/>
</td>
<td>

<input type="text" name="others2" value="<?php echo $others2?>" id="reg"  style="width:70px;" />
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

<input type="text" name="drug1" id="reg" value="<?php echo $drug1?>" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose1" id="reg" value="<?php echo $dose1?>" class="" style="width:170px;" /></td><td>

<input type="text" name="route1" id="reg"   value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by1" id="reg" value="<?php echo $admin_by1?>"  style="width:170px;"/></td><td>

<input type="text" name="time1" id="reg" value="<?php echo $time1?>"  style="width:170px;" />
</td>

</tr>


<tr>
<td>

<input type="text" name="drug2" id="reg" value="<?php echo $drug2?>" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose2" id="reg" value="<?php echo $dose2?>" class="" style="width:170px;" /></td><td>

<input type="text" name="route2" id="reg"   value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by2" id="reg" value="<?php echo $admin_by2?>"  style="width:170px;"/></td><td>

<input type="text" name="time2" id="reg" value="<?php echo $time2?>"  style="width:170px;" />
</td>

</tr>
<tr>
<td>

<input type="text" name="drug3" id="reg" value="<?php echo $drug3?>" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose3" id="reg" class="" value="<?php echo $dose3?>" style="width:170px;" /></td><td>

<input type="text" name="route3" id="reg"  value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by3" id="reg" value="<?php echo $admin_by3?>" style="width:170px;"/></td><td>

<input type="text" name="time3" id="reg" value="<?php echo $time3?>" style="width:170px;" />
</td>

</tr>
<tr>
<td>

<input type="text" name="drug4" id="reg" value="<?php echo $drug4?>" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose4" id="reg" value="<?php echo $dose4?>" class="" style="width:170px;" /></td><td>

<input type="text" name="route4" id="reg"  value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by4" id="reg" value="<?php echo $admin_by4?>"  style="width:170px;"/></td><td>

<input type="text" name="time4" id="reg" value="<?php echo $time4?>"  style="width:170px;" />
</td>

</tr>

<tr>
<td>

<input type="text" name="drug5" id="reg" value="<?php echo $drug5?>" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose5" id="reg" value="<?php echo $dose5?>" class="" style="width:170px;" /></td><td>

<input type="text" name="route5" id="reg"  value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by5" id="reg" value="<?php echo $admin_by5?>"  style="width:170px;"/></td><td>

<input type="text" name="time5" id="reg" value="<?php echo $time5?>"  style="width:170px;" />
</td>

</tr>
<tr>
<td>

<input type="text" name="drug6" id="reg" value="<?php echo $drug6?>" class="" style="width:170px;" />
</td>


<td colspan="1">
<input type="text" name="dose6" id="reg" value="<?php echo $dose6?>" class="" style="width:170px;" /></td><td>

<input type="text" name="route6" id="reg"  value="PO/M/IV/SC" style="width:170px;" />
</td>

<td colspan="1">
<input type="text" name="admin_by6" id="reg" value="<?php echo $admin_by6?>"  style="width:170px;"/></td><td>

<input type="text" name="time6" id="reg" value="<?php echo $time6?>"  style="width:170px;" />
</td>

</tr>

<tr

</table>
<table style="margin-top:10px;"><tr><td><strong>Refferred to speciality/Consultant:</strong>
<input type="text" class="text" name="reffer_to"  value="<?php echo $reffer_to?>"/>
<strong>Time:</strong><input type="text" name="refer_time" class="text" value="<?php echo $refer_time?>" />
<strong>Seen At:</strong><input type="text" name="seen_at" class="text" value="<?php echo $seen_at?>" /></td></tr>
<tr><td height="10px;"></td></tr>
<tr><td><strong>Transferred To:</strong><input type="text" name="transfer_to" value="<?php echo $transfer_to?>" class="" style="width:900px;" /></td></tr>
<tr><td height="10px;"></td></tr>

<tr><td><strong>Vitals At Time of Transfer P</strong><input type="text" name="p" value="<?php echo $p?>" style="width:100px;" /> , <strong>BP</strong>
 <input type="text" name="refrer_bp" value="<?php echo $refrer_bp?>" style="width:100px;" /> ,<strong>RR</strong><input value="<?php echo $refer_rr?>" type="text" name="refer_rr" style="width:100px;" /> , <strong>SPO2</strong>
 <input type="text" name="refer_spo2" value="<?php echo $refer_spo2?>" style="width:100px;" />, <strong>Temp</strong><input type="text" name="refer_temp" value="<?php echo $refer_temp?>" /></td></tr>
 
 <tr><td height="10px;"></td></tr>
 <tr><td><strong>Conclusions at Termination of Treatment:</strong><input type="text" name="treatment" value="<?php echo $treatment?>" class="" style="width:700px;" /></td></tr>

<tr><td height="10px;"></td></tr>
 <tr><td><strong>Condition of the patient at Dischaege:</strong><input type="text" name="condition_discharge" value="<?php echo $condition_discharge?>"  class="" style="width:700px;" /></td></tr>
<tr><td height="10px;"></td></tr>
 <tr><td><strong>Follow up Instructions:</strong><textarea name="follow" cols="100" rows="3"><?php echo $follow?></textarea></td></tr>
<tr><td height="10px;"></td></tr>

<tr><td><strong>ER Physican Name</strong><input type="text" name="phys_name" value="<?php echo $phys_name?>" style="width:270px;" /><strong> Signature</strong>
<input type="text" name="phys_sign" value="<?php echo $phys_sign?>" style="width:250px;" />
<strong>Date</strong><input type="text" name="dis_date" value="<?php echo $dis_date?>" style="width:100px;" />
<strong> Time</strong><input type="text" name="dis_time" value="<?php echo $dis_time?>" style="width:100px;" /></td></tr>
</table>


<table>
<tr><td height="20px;"></td></tr>
<tr><td class="label1"><strong>Additional Notes</strong> <font color="red">*</font> : </td><td colspan="1">

<textarea name="additional" cols="100" rows="5"><?php echo $additional?></textarea>

</td>

</tr>
 <tr>
<td class="label1"><strong>Investigation Findings</strong> <font color="red">*</font> : </td><td colspan="1">

<textarea name="finding" cols="100" rows="5"><?php echo $finding?></textarea>
<input type="hidden" name="id" value="<?php echo $id?>" />
</td>
</tr>
</tr></table>

<table align="center">
    
            

<tr><td colspan="2" width="400"></td><td  align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='int_det.php'"/></td></tr></table>
 </form>         
		       </div>
               
               	  
		<?php 
		if(isset($_POST['submit'])){
			$id=$_POST['id'];
			 $mrnum=$_POST['mrnum']; 
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
		$wd=$_POST['wd'];
		
		
		
	$sq=mysql_query("update  `caseshhet_initial1` set `mrno`='$mrnum', `complaint`='$complaint', `present`='$present',`past`='$past',
	 `airway1`='$airway1', `breat1`='$breat1',`circ1`='$circ1', `airway2`='$airway2', `breat2`='$breat2', `circ2`='$circ2',
	  `vitals`='$vitals', `pulse`='$pulse',`bp`='$bp', `bp1`='$bp1', `rr`='$rr', `spo2`='$spo2', `room_air`='$room_air', 
	  `grbs`='$grbs', `temp`='$temp',`start_ecg`='$start_ecg',`priority`='$priority', `traige`='$traige', `clinical`='$clinical',
	   `negatiev_clinic`='$negatiev_clinic', `blood1`='$blood1', `urine1`='$urine1',`stool1`='$stool1', `xray1`='$xray1', `usg1`='$usg1',
	   `ct_scan1`='$ct_scan1', `others1`='$others1', `blood2`='$blood2', `urine2`='$urine2', `stool2`='$stool2', `xray2`='$xray2',
	    `usg2`='$usg2', `ct_scan2`='$ct_scan2', `others2`='$others2', `drug1`='$drug1', `dose1`='$dose1',
	   `admin_by1`='$admin_by1', `time1`='$time1', `drug2`='$drug2', `dose2`='$dose2', `admin_by2`='$admin_by2', `time2`='$time2',
	    `drug3`='$drug3', `dose3`='$dose3', `admin_by3`='$admin_by3',
		  `time3`='$time3', `drug4`='$drug4', `dose4`='$dose4', `admin_by4`='$admin_by4', `time4`='$time4', `drug5`='$drug5',
		  `dose5`='$dose5', `admin_by5`='$admin_by5', `time5`='$time5', `drug6`='$drug6', `dose6`='$dose6',
		   `admin_by6`='$admin_by6', `time6`='$time6', `reffer_to`='$reffer_to', `refer_time`='$refer_time', `seen_at`='$seen_at',
		    `transfer_to`='$transfer_to', `p`='$p', `refrer_bp`='$refrer_bp', `refer_rr`='$refer_rr', 
		   `refer_spo2`='$refer_spo2', `refer_temp`='$refer_temp', `treatment`='$treatment', `condition_discharge`='$condition_discharge'
		   , `follow`='$follow', `phys_name`='$phys_name', `phys_sign`='$phys_sign', `dis_date`='$dis_date', 
		   `dis_time`='$dis_time', `date1`='$date1', `additional`='$additional', `finding`='$finding',`wd`='$wd' where id='$id'");
		
		
		//$sq=mysql_query("update patientregister set arrival_mode='$mode',ref_from='$ref',previous='$Previous' where registerno='$mr_num'");
		
		if($sq){
			print "<script>";
	print "alert('Successfully added');";
	print "self.location='int_det.php';";
	print "</script>";
		}
		
		
		}
		?>

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