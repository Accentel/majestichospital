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
    <div id="conteneur">

		  <?php include('logo.php'); ?>
			<?php
			include("main_menu.php");
			include("config.php");
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
	
	<?php /*?><div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php
			include("main_menu.php");
			?><?php */?>
		  
		<?php 
		//if(isset($_POST['submit'])){
					$id=$_REQUEST['id'];
		$sq=mysql_query("select * from `casesheet_admission` where id='$id'"); 
		while($r=mysql_fetch_array($sq)){
			$mrnum=$r['mrnum'];
			$category=$r['category'];
			$txtdia=$r['txtdia'];
			$Hypertention=$r['Hypertention'];
			$txthyp=$r['txthyp'];
			$CAD=$r['CAD'];
			$txtcad=$r['txtcad'];
			$Tubercu=$r['Tubercu'];
			$txttub=$r['txttub'];
			$Antibiotic=$r['Antibiotic'];
			$txtanti=$r['txtanti'];
			$Hormo=$r['Hormo'];
			$txtHorm=$r['txtHorm'];
			$chemorad=$r['chemorad'];
			$txtcheradi=$r['txtcheradi'];
			$blodtrans=$r['blodtrans'];
			$txtbloodtrans1=$r['txtbloodtrans1'];
			$Surge=$r['Surge'];
			$txtSurg=$r['txtSurg'];
			$othr=$r['othr'];
			$txtothers=$r['txtothers'];
			$Mstat=$r['Mstat'];
			$txtoccu=$r['txtoccu'];
			$Appetite=$r['Appetite'];
			$eating=$r['eating'];
			$Bowels=$r['Bowels'];
			$Mictur=$r['Mictur'];
			$txtmictu=$r['txtmictu'];
			$knall=$r['knall'];
			$txtknowall=$r['txtknowall'];
			$alcohol=$r['alcohol'];
			$ckdsnuff=$r['ckdsnuff'];
			$ckbchew=$r['ckbchew'];
			$ckbsmoke=$r['ckbsmoke'];
			$druguse=$r['druguse'];
			$txtdrug=$r['txtdrug'];
			$betelnut=$r['betelnut'];
			$txtbnut=$r['txtbnut'];
			$beteleaf=$r['beteleaf'];
			$txtbleaf=$r['txtbleaf'];
			
			$ddlfdia=$r['ddlfdia'];
			$txtdia1=$r['txtdia1'];
			$fhyper=$r['fhyper'];
			$txtfhyp=$r['txtfhyp'];			
			$hd=$r['hd'];
			$txtfhd=$r['txtfhd'];
			
			$stroke=$r['stroke'];
			$txtstroke=$r['txtstroke'];
			$Cancer=$r['Cancer'];
			$txtCancer=$r['txtCancer'];
			$tubercu1=$r['tubercu1'];
			$txtftubercu=$r['txtftubercu'];
			$asthma=$r['asthma'];
			$txtasthma=$r['txtasthma'];
			$txtotherdis=$r['txtotherdis'];
			
			$txtpsych=$r['txtpsych'];
			$txtsibling=$r['txtsibling'];
			
			$txtanyotr=$r['txtanyotr'];
			
			$txtagemena=$r['txtagemena'];
			
			$txtmenspast=$r['txtmenspast'];
			$txtmensPresent=$r['txtmensPresent'];
			$txtlmp=$r['txtlmp'];
			$gyne=$r['gyne'];
			$txtgynpro=$r['txtgynpro'];
			
			$txtagemrg=$r['txtagemrg'];
			$txtfstchild=$r['txtfstchild'];
			$txtgravida=$r['txtgravida'];
			$txtpara=$r['txtpara'];
			$txtstilbth=$r['txtstilbth'];
			
			$txtchild=$r['txtchild'];
			$gyne1=$r['gyne1'];
			$txtabortion=$r['txtabortion'];
			$txtothershis=$r['txtothershis'];
			$rbnbirhis=$r['rbnbirhis'];
			$asphyxia=$r['asphyxia'];
			$txtlmp1=$r['txtlmp1'];
			
			$gyne2=$r['gyne2'];
			$rbndevep=$r['rbndevep'];
			$rbnmark=$r['rbnmark'];
			$date1=date('Y-m-d');
			$txtdevep=$r['txtdevep'];
			//$blodtrans=$r['blodtrans'];
			
		}
			
	
		
		
		
		
		
		//update patientregister set arrival_mode='$mode',ref_from='$ref',previous='$Previous' where registerno='$mr_num'");
		
		?>


		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">ADMISSION RECORD</h1>
          
                      <form name="myform" method="post" action="">
                
<table width="100%" cellspacing="10">

<tr>
<input type="hidden" value="<?php echo $aname ?>" name="authby"/>
<!--<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="mrnum" value="<?php echo $mrnum?>" id="reg" class="text" /></td>-->
</tr>



<?php 
	$ss=mysql_query("select * from patientregister where registerno='$mrnum'");
	while($r=mysql_fetch_array($ss)){
		$nm=$r['patientname'];
		$gen=$r['gender'];
		$ag=$r['age'];
		}?>
<input type="hidden" value="<?php echo $aname ?>" name="authby" onchange="showHint52(this.value);"/>


<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="mrnum" value="<?php echo $mrnum?>" id="reg" class="text"  onclick="window.open('finalbill_popup6.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" />
Patient Name. <font color="red">*</font> : 
<input type="text" name="pname" id="pname" value="<?php echo $nm?>" class="text" /></td></tr>
<tr>
<td class="label1">Gender <font color="red">*</font> : </td>
<td><input type="text" name="gender" value="<?php echo $gen?>" id="gender" readonly="readonly" class="text" readonly="readonly" />
Age <font color="red">*</font> : 
<input type="text" name="age" value="<?php echo $ag?>" readonly="readonly" id="age" class="text" /></td>
</tr>

<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->


<tr><td>Diabeties:</td>
<td><select id="category" name="category">
<option  value="<?php echo $category?>"><?php echo $category?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($category=='Yes'){?>
<input type="text" id="otherCategory" value="<?php echo $txtdia?>" name="txtdia" value="">
<?php } else {?> 
<input type="text" id="otherCategory" name="txtdia" value="" style="display: none;">
<?php }?> 

</td>
</tr>
<tr><td>Hypertention:</td>
<td><select id="Hypertention" name="Hypertention">
<option value="<?php echo $Hypertention?>" ><?php echo $Hypertention?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>

<?php if($Hypertention=='Yes'){?>
<input type="text" id="cathyp" name="txthyp" value="<?php echo $txthyp?>">
<?php } else {?>
<input type="text" id="cathyp" name="txthyp" value="" style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>CAD:</td>
<td><select id="CAD" name="CAD">
<option value="<?php echo $CAD?>" ><?php echo $CAD?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($CAD=='Yes'){?>
<input type="text" id="caadd" name="txtcad" value="<?php echo $txtcad?>" >
<?php } else {?>
<input type="text" id="caadd" name="txtcad" value="" style="display: none;">
<?php }?>

</td>
</tr>
<tr><td>Tuberculosis:</td>
<td><select id="Tubercu" name="Tubercu">
<option  value="<?php echo $Tubercu?>"><?php echo $Tubercu?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($Tubercu=='Yes'){?>
<input type="text" id="tuber" name="txttub" value="<?php echo $txttub?>" >
<?php } else {?>
<input type="text" id="tuber" name="txttub" value="" style="display: none;">
<?php }?>

</td>
</tr>
<tr><td>Antibiotics:</td>
<td><select id="Antibiotic" name="Antibiotic">
<option  value="<?php echo $Antibiotic?>"><?php echo $Antibiotic?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($Antibiotic=='Yes'){?>
<input type="text" id="anti" name="txtanti" value="<?php echo $txtanti?>" >
<?php } else {?>
<input type="text" id="anti" name="txtanti" value="<?php echo $txtanti?>" style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Hormones:</td>
<td><select id="Hormo" name="Hormo">
<option value="<?php echo $Hormo?>"><?php echo $Hormo?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($Hormo=='Yes'){?>
<input type="text"  name="txtHorm" id="Horm" value="<?php echo $txtHorm?>" >

<?php } else {?>
<input type="text"  name="txtHorm" id="Horm " style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Chemo/Radiation:</td>
<td><select id="chemorad" name="chemorad">
<option value="<?php echo $chemorad?>"><?php echo $chemorad?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($chemorad=='Yes'){?>
<input type="text"  name="txtcheradi" id="cheradi" value="<?php echo $txtcheradi?>" >

<?php } else {?>
<input type="text"  name="txtcheradi" id="cheradi" style="display: none;" >
<?php }?>
</td>
</tr>
<tr><td>Blood Transfusion:</td>
<td><select id="blodtrans" name="blodtrans">
<option value="<?php echo $blodtrans?>"><?php echo $blodtrans?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($blodtrans=='Yes'){?>

<input type="text"  name="txtbloodtrans1" id="bldtrns" value="<?php echo $txtbloodtrans1?>">
<?php } else {?>
<input type="text"  name="txtbloodtrans1" id="bldtrns" style="display: none;" >
<?php }?>
</td>
</tr>
<tr><td>Surgeries:</td>
<td><select id="Surge" name="Surge">
<option value="<?php echo $Surge?>"><?php echo $Surge?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($Surge=='Yes'){?>
<input type="text"  name="txtSurg" id="Surg" value="<?php echo $txtSurg?>" >
<?php } else {?>
<input type="text"  name="txtSurg" id="Surg"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Other:</td>
<td><select id="othr" name="othr">
<option value="<?php echo $othr?>"><?php echo $othr?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($othr=='Yes'){?>
<input type="text"  name="txtothers" id="others" value="<?php echo $txtothers?>">
<?php } else {?>
<input type="text"  name="txtothers" id="others" value="" style="display: none;">
<?php }?>
</td>
</tr>
</table>

<h3 align="left" style="color:red"><u>PERSONAL HISTORY</u></h3>																	<!--PERSONAL HISTORY  -->
<table  cellpadding="5"  >

<tr><td>Marital Status:</td>
<td><select id="mstatus" name="Mstat">
<option value="<?php echo $Mstat?>" ><?php echo $Mstat?></option>
  <option value="Single">Single</option>
  <option value="Married">Married</option>  
</select>
</tr>
<tr><td>Occupation:</td>
<td><input type="text"  name="txtoccu" value="<?php echo $txtoccu?>" id="occu"></td></tr>
<tr><td>Appetite:</td>
<td><select id="Appetite" name="Appetite">
<option value="<?php echo $Appetite?>" ><?php echo $Appetite?></option>
  <option value="Normal">Normal</option>
  <option value="Lost">Lost</option>  
</select></tr>
<tr><td>Eating Habit:</td>
<td><select id="eating" name="eating">
<option value="<?php echo $eating?>"><?php echo $eating?></option>
  <option value="Veg">Veg</option>
  <option value="Non-Veg">Non-Veg</option>  
  <option value="Eggtarian">Eggtarian</option>  
</select>
</tr>
<tr><td>Bowels:</td>
<td><select id="Bowels" name="Bowels">
<option value="<?php echo $Bowels?>" ><?php echo $Bowels?></option>
  <option value="Regular">Regular</option>
  <option value="Iregular">Iregular</option>
<option value="Constipation">Constipation</option>  
</select></td></tr>
<tr><td>Micturation:</td>
<td><select id="Mictur" name="Mictur">
<option value="<?php echo $Mictur?>" ><?php echo $Mictur?></option>
  <option value="Normal">Normal</option>
  <option value="Abnormal">Abnormal</option>  
</select><input type="text" id="mictu" name="txtmictu" value="<?php echo $txtmictu?>" style="display: none;"></td>
</tr>
<tr><td>Known Allergies:</td>
<td><select id="knall" name="knall">
<option value="<?php echo $knall?>"><?php echo $knall?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($knall=='Yes'){?>
<input type="text" id="knownall" name="txtknowall" value="<?php echo $txtknowall?>" >
<?php } else {?>
<input type="text" id="knownall" name="txtknowall"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Habit/Addiction</td>
<td>Alcohol:
<select id="alcohol" name="alcohol">
<option value="<?php echo $alcohol?>"><?php echo $alcohol?></option>
  <option value="Regular">Regular</option>
  <option value="Occupation">Occupation</option> 
<option value="Teetotaler">Teetotaler</option>  
</select></td>
<td>Tobacco:</td>
<td><input type="checkbox" name="ckdsnuff" id="snuff">Snuff
<input type="checkbox" name="ckbchew" id="chew">Chewable
<input type="checkbox" name="ckbsmoke" id="smoke">Smoking</td>
<tr><td>Durg use:</td>
<td><select id="druguse" name="druguse">
<option  value="<?php echo $druguse?>"><?php echo $druguse?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($druguse=='Yes'){?>
<input type="text" id="drug" name="txtdrug" value="<?php echo $txtdrug?>">
<?php } else {?>
<input type="text" id="drug" name="txtdrug"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Betel Nut:</td>
<td><select id="betelnut" name="betelnut">
<option value="<?php echo $betelnut?>"><?php echo $betelnut?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select><?php if($betelnut=='Yes'){?>

<input type="text" id="bnut" name="txtbnut" value="<?php echo $txtbnut?>" >
<?php } else {?>
<input type="text" id="bnut" name="txtbnut"  style="display: none;">

<?php }?> </td>
</tr>
<tr><td>Betel Leaf(Pan):</td>
<td><select id="beteleaf" name="beteleaf">
<option value="<?php echo $beteleaf?>"><?php echo $txtoccu?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select><?php if($beteleaf=='Yes'){?>

<input type="text" id="bleaf" name="txtbleaf" value="<?php echo $txtbleaf?>">

<?php } else {?>

<input type="text" id="bleaf" name="txtbleaf"  style="display: none;">
<?php }?></td>
</tr>

</table>

					
											<!--FAMILY HISTORY  -->
<h3 align="left" style="color:red"><u>FAMILY HISTORY</u></h3>
<table  cellpadding="5"  >
<tr><td>Diabeties:</td>
<td><select id="fdia" name="ddlfdia">
<option value="<?php echo $ddlfdia?>"><?php echo $ddlfdia?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($ddlfdia=='Yes'){?>
<input type="text" id="famdia" name="txtdia1" value="<?php echo $txtdia1?>" >
<?php } else {?>

<input type="text" id="famdia" name="txtdia1"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Hypertention:</td>
<td><select id="fhyper" name="fhyper">
<option value="<?php echo $fhyper?>" ><?php echo $fhyper?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>

<?php if($fhyper=='Yes'){?>
<input type="text" id="fhyp" name="txtfhyp" value="<?php echo $txtdia1?>" >
<?php } else {?>

<input type="text" id="fhyp" name="txtfhyp"  style="display: none;">
<?php }?>

</td>
</tr>
<tr><td>Heart Disease:</td>
<td><select id="hd" name="hd">
<option value="<?php echo $hd?>" ><?php echo $hd?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>

<?php if($hd=='Yes'){?>
<input type="text" id="fhd" name="txtfhd" value="<?php echo $txtfhd?>" >
<?php } else {?>

<input type="text" id="fhd" name="txtfhd"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Stroke:</td>
<td><select id="stroke" name="stroke">
<option value="<?php echo $stroke?>" ><?php echo $stroke?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>

<?php if($stroke=='Yes'){?>
<input type="text" id="fstroke" name="txtstroke" value="<?php echo $txtstroke?>" >
<?php } else {?>

<input type="text" id="fstroke" name="txtstroke"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Cancer:</td>
<td><select id="Cancer" name="Cancer">
<option value="<?php echo $Cancer?>" ><?php echo $Cancer?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>

<?php if($Cancer=='Yes'){?>
<input type="text" id="fcancer" name="txtCancer" value="<?php echo $txtCancer?>" >
<?php } else {?>

<input type="text" id="fcancer" name="txtCancer"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Tuberculosis:</td>
<td><select id="tubercu" name="tubercu1">
<option value="<?php echo $tubercu1?>"><?php echo $tubercu1?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select> 

<?php if($tubercu1=='Yes'){?>
<input type="text" id="ftubercu" name="txtdia1" value="<?php echo $txtftubercu?>" >
<?php } else {?>

<input type="text" id="ftubercu" name="txtftubercu"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Asthma:</td>
<td><select id="asthma" name="asthma">
<option value="<?php echo $asthma?>"><?php echo $asthma?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>


<?php if($asthma=='Yes'){?>
<input type="text" name="txtasthma" id="fasthma" value="<?php echo $txtasthma?>" >
<?php } else {?>

<input type="text"  name="txtasthma" id="fasthma" style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Any Other Hereditary Disease:</td>
<td><textarea rows="4" cols="30" name="txtotherdis" id="otherdis"><?php echo $txtotherdis?></textarea></td></tr>
<tr><td>Psychiatrist illness:</td>
<td><textarea rows="4" cols="30" name="txtpsych" id="psych"><?php echo $txtpsych?></textarea></td></tr>
<tr><td>Sibling History:</td>
<td><textarea rows="4" cols="30" name="txtsibling" id="sibling"><?php echo $txtsibling?></textarea></td></tr>
<tr><td>Any Otherther:</td>
<td><textarea rows="4" cols="30" name="txtanyotr" id="otr"><?php echo $txtanyotr?></textarea></td></tr>
</table>
	
															<!--MENSTRUAL HISTORY  -->
<h3 align="left" style="color:red"><u>MENSTRUAL HISTORY</u></h3>
															
<table  cellpadding="5">

<tr><td>Age of Menarche:</td>
<td><input type="text" id="agemena" name="txtagemena" value="<?php echo $txtagemena?>" ></td>
</tr>
<tr><td>Menstrual Cycle:</td>
<td><input type="text" id="menspast" name="txtmenspast" value="<?php echo $txtmenspast;?>" placeholder="Past"/>
<input type="text" id="mensprst" name="txtmensPresent" value="<?php echo $txtmensPresent;?>" placeholder="Present"/></td>
</tr>
<tr><td>LMP:</td>
<td><input type="text" id="lmp" name="txtlmp" value="<?php echo $txtlmp?>" />
</tr>
<tr><td>Any Gyneacological Problems:</td>
<td><select id="gyne" name="gyne" >
<option value="<?php echo $gyne?>" ><?php echo $gyne?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select><input type="text" id="gynpro" name="txtgynpro" value="<?php echo $txtgynpro?>" style="display: none;"></td></tr>

</table>
												<!--OBSTETRIC HISTORY  -->
<h3 align="left" style="color:red"><u>OBSTERTRIC HISTORY</u></h3>
<table  cellpadding="5">

<tr><td>Age at Marriage:</td>
<td><input type="text" id="agemrg" value="<?php echo $txtagemrg?>" name="txtagemrg" ></td>
</tr>
<tr><td>Age at First Child Birth:</td>
<td>
<input type="text" id="fstchild" value="<?php echo $txtfstchild?>" name="txtfstchild" /></td>
</tr>
<tr><td>Gravida:</td>
<td><input type="text" id="gravida" value="<?php echo $txtgravida?>" name="txtgravida" />
</tr>
<tr><td>Para:</td>
<td><input type="text" id="para" value="<?php echo $txtpara?>" name="txtpara" />
</tr>
<tr><td>Still Birth:</td>
<td><input type="text" id="stilbth" value="<?php echo $txtstilbth?>" name="txtstilbth" />
</tr>
<tr><td>No.of Living Childern:</td>
<td><input type="text" id="child" value="<?php echo $txtchild?>" name="txtchild" />
</tr>
<tr><td>Family Planning Methods Used:</td>
<td><select id="gyne" name="gyne1">
<option value="<?php echo $txtoccu?>"><?php echo $txtoccu?></option>
  <option value="Oralpills">Oralpills</option>
  <option value="IUD">IUD</option>
  <option value="IVDpermanentsterllization">IVD Permanent Sterllization</option>
  </td></tr>
  <tr><td>No.of Abortions:</td>
<td><input type="text" id="abortion" value="<?php echo $txtabortion?>" name="txtabortion" />
</tr>
<tr><td>Others:</td>
<td><input type="text" id="othershis" value="<?php echo $txtothershis?>" name="txtothershis" />
</tr>
</table>
														<!--BIRTH HISTORY  -->
<h3 align="left" style="color:red"><u>BIRTH HISTORY</u></h3>
<table  cellpadding="5">
<tr><td>
<?php if($rbnbirhis=='FTND'){?><
<input type="radio" name="rbnbirhis" value="FTND" checked="checked" id="ftnd">FTND
<?php } else {?>
<input type="radio" name="rbnbirhis" value="FTND" id="ftnd">FTND<?php }?>
<?php if($rbnbirhis=='Caesarean Delivery'){?>
<input type="radio" name="rbnbirhis" id="caesdel"  checked="checked" value="Caesarean Delivery">Caesarean Delivery<?php } else { ?>
<input type="radio" name="rbnbirhis" id="caesdel" value="Caesarean Delivery">Caesarean Delivery
<?php }?>
<?php if($rbnbirhis=='Delivery By Vaccum Suction'){?>
<input type="radio" name="rbnbirhis" id="delvacsuc" checked="checked" value="Delivery By Vaccum Suction">Delivery By Vaccum Suction

<?php } else {?>
<input type="radio" name="rbnbirhis" id="delvacsuc" value="Delivery By Vaccum Suction">Delivery By Vaccum Suction

<?php }?>
<?php if($rbnbirhis=='Forceps Delivery'){?>
<input type="radio" name="rbnbirhis" id="fordel"  checked="checked" value="Forceps Delivery">Forceps Delivery<?php } else {?>
<input type="radio" name="rbnbirhis" id="fordel" value="Forceps Delivery">Forceps Delivery
<?php }?>
</td>
</tr>
<tr><td>History of Birth Asphyxia :<select id="asphyxia" name="asphyxia">
<option value="<?php echo $asphyxia?>" ><?php echo $asphyxia?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option> </td>
</tr>
<tr><td>LMP:<input type="text" id="lmp" name="txtlmp1" value="<?php echo $txtlmp1?>"/>
</tr>
<tr><td>Any Gyneacological Problems:<select id="gyne" name="gyne2">
<option value="<?php echo $gyne2?>" ><?php echo $gyne2?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</td></tr>
</table>
<h3 align="left" style="color:red"><u>DEVELOPMENTAL HISTORY(As per IAP Guidelines)</u></h3>
<table  cellpadding="5">
<tr><td>
<?php if($rbndevep=='Normal'){?>
<input type="radio" value="Normal" name="rbndevep" checked="checked" id="norm">Normal
<?php } else {?>
<input type="radio" value="Normal" name="rbndevep" id="norm">Normal
<?php }  if($rbndevep=='Abnormal'){?>

<input type="radio" name="rbndevep"  value="Abnormal" checked="checked" id="abnor">Abnormal
<?php } else {?>
<input type="radio" name="rbndevep"  value="Abnormal" id="abnor">Abnormal<?php }?>
<input type="text" id="devep" name="txtdevep" value="<?php echo $txtdevep;?>" />
</td></tr>
</table>
<h3 align="left" style="color:red"><u>DEVELOPMENTAL HISTORY(As per IAP Guidelines)</u></h3>
<table cellpadding="5">

<tr><td>
<?php if($rbnmark=='Up to mark'){?>
<input type="radio" name="rbnmark" value="Up to mark" checked="checked" id="mark">Up to mark
<?php } else {?>
<input type="radio" name="rbnmark" value="Up to mark" id="mark">Up to mark
<?php } ?>

<?php if($rbnmark=='Not upto mark'){?>
<input type="radio" name="rbnmark"  value="Not upto mark" checked="checked" id="uptomark">Not upto mark
<?php } else {?>
<input type="radio" name="rbnmark"  value="Not upto mark" id="uptomark">Not upto mark

<?php }?>

</td></tr>
<input type="hidden" name="id" value="<?php echo $id?>" />
</table>

									<!--Treatment HISTORY Script  -->


<table align="center">
    
            

<tr><td colspan="2" width="400"></td><td  align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='int_det1.php'"/></td></tr></table>
 </form> 
 
 
 <?php 
		if(isset($_POST['submit'])){
			$id=$_POST['id'];
			$mrnum=$_POST['mrnum'];
			$category=$_POST['category'];
			$txtdia=$_POST['txtdia'];
			$Hypertention=$_POST['Hypertention'];
			$txthyp=$_POST['txthyp'];
			$CAD=$_POST['CAD'];
			$txtcad=$_POST['txtcad'];
			$Tubercu=$_POST['Tubercu'];
			$txttub=$_POST['txttub'];
			$Antibiotic=$_POST['Antibiotic'];
			$txtanti=$_POST['txtanti'];
			$Hormo=$_POST['Hormo'];
			$txtHorm=$_POST['txtHorm'];
			$chemorad=$_POST['chemorad'];
			$txtcheradi=$_POST['txtcheradi'];
			$blodtrans=$_POST['blodtrans'];
			$txtbloodtrans1=$_POST['txtbloodtrans1'];
			$Surge=$_POST['Surge'];
			$txtSurg=$_POST['txtSurg'];
			$othr=$_POST['othr'];
			$txtothers=$_POST['txtothers'];
			$Mstat=$_POST['Mstat'];
			$txtoccu=$_POST['txtoccu'];
			$Appetite=$_POST['Appetite'];
			$eating=$_POST['eating'];
			$Bowels=$_POST['Bowels'];
			$Mictur=$_POST['Mictur'];
			$txtmictu=$_POST['txtmictu'];
			$knall=$_POST['knall'];
			$txtknowall=$_POST['txtknowall'];
			$alcohol=$_POST['alcohol'];
			$ckdsnuff=$_POST['ckdsnuff'];
			$ckbchew=$_POST['ckbchew'];
			$ckbsmoke=$_POST['ckbsmoke'];
			$druguse=$_POST['druguse'];
			$txtdrug=$_POST['txtdrug'];
			$betelnut=$_POST['betelnut'];
			$txtbnut=$_POST['txtbnut'];
			$beteleaf=$_POST['beteleaf'];
			$txtbleaf=$_POST['txtbleaf'];
			
			$ddlfdia=$_POST['ddlfdia'];
			$txtdia1=$_POST['txtdia1'];
			$fhyper=$_POST['fhyper'];
			$txtfhyp=$_POST['txtfhyp'];			
			$hd=$_POST['hd'];
			$txtfhd=$_POST['txtfhd'];
			
			$stroke=$_POST['stroke'];
			$txtstroke=$_POST['txtstroke'];
			$Cancer=$_POST['Cancer'];
			$txtCancer=$_POST['txtCancer'];
			$tubercu1=$_POST['tubercu1'];
			$txtftubercu=$_POST['txtftubercu'];
			$asthma=$_POST['asthma'];
			$txtasthma=$_POST['txtasthma'];
			$txtotherdis=$_POST['txtotherdis'];
			
			$txtpsych=$_POST['txtpsych'];
			$txtsibling=$_POST['txtsibling'];
			
			$txtanyotr=$_POST['txtanyotr'];
			
			$txtagemena=$_POST['txtagemena'];
			
			$txtmenspast=$_POST['txtmenspast'];
			$txtmensPresent=$_POST['txtmensPresent'];
			$txtlmp=$_POST['txtlmp'];
			$gyne=$_POST['gyne'];
			$txtgynpro=$_POST['txtgynpro'];
			
			$txtagemrg=$_POST['txtagemrg'];
			$txtfstchild=$_POST['txtfstchild'];
			$txtgravida=$_POST['txtgravida'];
			$txtpara=$_POST['txtpara'];
			$txtstilbth=$_POST['txtstilbth'];
			
			$txtchild=$_POST['txtchild'];
			$gyne1=$_POST['gyne1'];
			$txtabortion=$_POST['txtabortion'];
			$txtothershis=$_POST['txtothershis'];
			$rbnbirhis=$_POST['rbnbirhis'];
			$asphyxia=$_POST['asphyxia'];
			$txtlmp1=$_POST['txtlmp1'];
			
			$gyne2=$_POST['gyne2'];
			$rbndevep=$_POST['rbndevep'];
			$rbnmark=$_POST['rbnmark'];
			$date1=date('Y-m-d');
			$txtdevep=$_POST['txtdevep'];
			
			
			
			echo  $s="update  `casesheet_admission` set
			 
			 `mrnum`='$mrnum', `category`='$category', `txtdia`='$txtdia', `Hypertention`='$Hypertention', `txthyp`='$txthyp', 
			 `CAD`='$CAD', `txtcad`='$txtcad',
			 `Tubercu`='$Tubercu', `txttub`='$txttub', `Antibiotic`='$Antibiotic', `txtanti`='$txtanti', `Hormo`='$Hormo',
			  `txtHorm`='$txtHorm', `chemorad`='$chemorad',
			  `txtcheradi`='$txtcheradi', `blodtrans`='$blodtrans', `txtbloodtrans1`='$txtbloodtrans1', `Surge`='$Surge', 
			  `txtSurg`='$txtSurg', `othr`='$othr', 			  
			  `txtothers`='$txtothers', `Mstat`='$Mstat', `txtoccu`='$txtoccu', `Appetite`='$Appetite', `eating`='$eating', 
			  `Bowels`='$Bowels', `Mictur`='$Mictur',			  
			   `txtmictu`='$txtmictu', `knall`='$knall', `txtknowall`='$txtknowall', `alcohol`='$alcohol', `ckdsnuff`='$ckdsnuff', `ckbchew`='$ckbchew', 
			   
			   `ckbsmoke`='$ckbsmoke', `druguse`='$druguse', `txtdrug`='$txtdrug', `betelnut`='$betelnut', `txtbnut`='$txtbnut',
			    `beteleaf`='$beteleaf', 
			   `txtbleaf`='$txtbleaf', `ddlfdia`='$ddlfdia', `txtdia1`='$txtdia1', `fhyper`='$fhyper', `txtfhyp`='$txtfhyp',
			    `hd`='$hd', `txtfhd`='$txtfhd', 
			   `stroke`='$stroke', `txtstroke`='$txtstroke', `Cancer`='$Cancer', `txtCancer`='$txtCancer', `tubercu1`='$tubercu1', 
			   `txtftubercu`='$txtftubercu', 
			   
			   `asthma`='$asthma', `txtasthma`='$txtasthma', `txtotherdis`='$txtotherdis', `txtpsych`='$txtpsych', `txtsibling`='$txtsibling',
			    `txtanyotr`='$txtanyotr',
			   
			    `txtagemena`='$txtagemena', `txtmenspast`='$txtmenspast', `txtmensPresent`='$txtmensPresent', `txtlmp`='$txtlmp',
				 `gyne`='$gyne', `txtgynpro`='$txtgynpro', 
				`txtagemrg`='$txtagemrg', `txtfstchild`='$txtfstchild', `txtgravida`='$txtgravida', `txtpara`='$txtpara', 
				`txtstilbth`='$txtstilbth', `txtchild`='$txtchild',
				 `gyne1`='$gyne1', `txtabortion`='$txtabortion', `txtothershis`='$txtothershis', `rbnbirhis`='$rbnbirhis', 
				 `asphyxia`='$asphyxia', `txtlmp1`='$txtlmp1', 
				 `gyne2`='$gyne2', `rbndevep`='$rbndevep', `rbnmark`='$rbnmark',`txtdevep`='$txtdevep' where id='$id'";
			
		$sq=mysql_query($s); 
		
		
		
		
		
		//update patientregister set arrival_mode='$mode',ref_from='$ref',previous='$Previous' where registerno='$mr_num'");
		
		if($sq){
			print "<script>";
	print "alert('Successfully added');";
	print "self.location='int_det1.php';";
	print "</script>";
		}
		
		
		}
		?>        
		       </div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<script>                                               
									  
    $('#category').change(function () {
    var myValue = $(this).val();
    var myText = $("#category :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#otherCategory").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#otherCategory").hide();
    }
});
$('#Hypertention').change(function () {
    var myValue = $(this).val();
    var myText = $("#Hypertention :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#cathyp").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#cathyp").hide();
    }
});
 $('#CAD').change(function () {
    var myValue = $(this).val();
    var myText = $("#CAD :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#caadd").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#caadd").hide();
    }
});
$('#Tubercu').change(function () {
    var myValue = $(this).val();
    var myText = $("#Tubercu :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#tuber").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#tuber").hide();
    }
});
$('#Antibiotic').change(function () {
    var myValue = $(this).val();
    var myText = $("#Antibiotic :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#anti").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#anti").hide();
    }
});
$('#Hormo').change(function () {
    var myValue = $(this).val();
    var myText = $("#Hormo :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#Horm").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#Horm").hide();
    }
});
$('#chemorad').change(function () {
    var myValue = $(this).val();
    var myText = $("#chemorad :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#cheradi").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#cheradi").hide();
    }
});
$('#blodtrans').change(function () {
    var myValue = $(this).val();
    var myText = $("#blodtrans :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#bldtrns").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#bldtrns").hide();
    }
});$('#Surge').change(function () {
    var myValue = $(this).val();
    var myText = $("#Surge :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#Surg").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#Surg").hide();
    }
})
;$('#othr').change(function () {
    var myValue = $(this).val();
    var myText = $("#othr :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#others").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#others").hide();
    }
});
												//PERSONAL HISTORY script
	;$('#Mictur').change(function () {
    var myValue = $(this).val();
    var myText = $("#Mictur :selected").text();

    if (myText != '' && myText === "Abnormal") {
        $("#mictu").show();
    }
	if(myText != '' && myText === "Normal")
	{
        $("#mictu").hide();
    }
});
												
;$('#knall').change(function () {
    var myValue = $(this).val();
    var myText = $("#knall :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#knownall").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#knownall").hide();
    }
});

;$('#druguse').change(function () {
    var myValue = $(this).val();
    var myText = $("#druguse :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#drug").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#drug").hide();
    }
});
;$('#betelnut').change(function () {
    var myValue = $(this).val();
    var myText = $("#betelnut :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#bnut").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#bnut").hide();
    }
});

;$('#beteleaf').change(function () {
    var myValue = $(this).val();
    var myText = $("#beteleaf :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#bleaf").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#bleaf").hide();
    }
});
															//FAMILY HISTORY script
												
;$('#fdia').change(function () {
    var myValue = $(this).val();
    var myText = $("#fdia :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#famdia").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#famdia").hide();
    }
});

;$('#fhyper').change(function () {
    var myValue = $(this).val();
    var myText = $("#fhyper :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#fhyp").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#fhyp").hide();
    }
});

;$('#hd').change(function () {
    var myValue = $(this).val();
    var myText = $("#hd :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#fhd").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#fhd").hide();
    }
});

;$('#stroke').change(function () {
    var myValue = $(this).val();
    var myText = $("#stroke :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#fstroke").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#fstroke").hide();
    }
});
;$('#Cancer').change(function () {
    var myValue = $(this).val();
    var myText = $("#Cancer :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#fcancer").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#fcancer").hide();
    }
});

;$('#tubercu').change(function () {
    var myValue = $(this).val();
    var myText = $("#tubercu :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#ftubercu").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#ftubercu").hide();
    }
});

;$('#asthma').change(function () {
    var myValue = $(this).val();
    var myText = $("#asthma :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#fasthma").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#fasthma").hide();
    }
});
																// MENSTRUAL HISTORY Script
	;$('#gyne').change(function () {
    var myValue = $(this).val();
    var myText = $("#gyne :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#gynpro").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#gynpro").hide();
    }
});
</script>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>