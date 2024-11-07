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
	
<?php /*?>	<div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php
			include("main_menu.php");
			?><?php */?>
		  
		<?php 
		//if(isset($_POST['submit'])){
			$id=$_REQUEST['id'];
			$sq=mysql_query("SELECT * FROM `casesheet_clicnic` where id='$id'");
			while($r=mysql_fetch_array($sq)){
			
	
			$date1=date('Y-m-d');
	$mrnum=$r['mrnum'];
	$thrills=$r['thrills'];
	$txtcarsnd=$r['txtcarsnd'];
	$carmurm=$r['carmurm'];
	$dyspn=$r['dyspn'];
	$Wheeze=$r['Wheeze'];
	$trachea=$r['trachea'];
	$breath=$r['breath'];
	$adventitious=$r['adventitious'];
	$abdomen=$r['abdomen'];
	$tendernes=$r['tendernes'];
	$txttender=$r['txttender'];
	$palpable=$r['palpable'];
	$txtmass=$r['txtmass'];
	$hernia=$r['hernia'];
	$txtherniaori=$r['txtherniaori'];
	$fluid=$r['fluid'];
	$bruits=$r['bruits'];
	$Liver=$r['Liver'];
	$txtliverpal=$r['txtliverpal'];
	$Spleen=$r['Spleen'];
	$txtliverpal1=$r['txtliverpal1'];
	$bowel=$r['bowel'];
	$txtgenital=$r['txtgenital'];
	$txtspeculum=$r['txtspeculum'];
	$txtpvexamin=$r['txtpvexamin'];
	$txtprexamin=$r['txtprexamin'];
	$cons=$r['cons'];
	$speech=$r['speech'];
	$neck=$r['neck'];
	$kerning=$r['kerning'];
	$txtnerves=$r['txtnerves'];
	$txtmotor=$r['txtmotor'];
	$txtsensory=$r['txtsensory'];
	$txtglas=$r['txtglas'];
	$txtrbice=$r['txtrbice'];
	$txtrtric=$r['txtrtric'];
	$txtrsupi=$r['txtrsupi'];
	$txtrknee=$r['txtrknee'];
	$txtrankle=$r['txtrankle'];
	$txtlbice=$r['txtlbice'];
	$txtltric=$r['txtltric'];
	$txtlsupi=$r['txtlsupi'];
	$txtlknee=$r['txtlknee'];
	$txtlankle=$r['txtlankle'];
	$Plan=$r['Plan'];
	$finger=$r['finger'];
	$heel=$r['heel'];
	$gait=$r['gait'];
	$shufling=$r['shufling'];
	$txtmuscu=$r['txtmuscu'];
	$txtskin=$r['txtskin'];
	$txtexbr=$r['txtexbr'];
	$txtent=$r['txtent'];
	$txtteeth=$r['txtteeth'];
	$txthene=$r['txthene'];
	$txtprovi=$r['txtprovi'];
	$txtplan=$r['txtplan'];
	$txtcare=$r['txtcare'];
	$txtexout=$r['txtexout'];
	$txtasect=$r['txtasect'];		
		
		
		
		}
		?>


		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">EDIT CLINICAL FINDINGS</h1>
          
                      <form name="myform" method="post" action="">
                
<table width="100%" cellspacing="10">

<!--<tr>
<input type="hidden" value="<?php echo $aname ?>" name="authby"/>
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="mrnum"  value="<?php echo $mrnum?>" id="reg" class="text" /></td></tr>





<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->


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

<h3 align="left" style="color:red"><u>Cardio Vascular System</u></h3>
<table  cellpadding="5">
<tr><td>Thrills:</td>
<td><select id="thrills" name="thrills">
<option value="<?php echo $thrills?>" ><?php echo $thrills?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  </td>
</tr>
<tr><td>Cardia Sounds:</td>
<td>
<input type="text" id="carsnd" value="<?php echo $txtcarsnd?>" name="txtcarsnd" ></td>
</tr>
<tr><td>Cardiac Murmurs:</td>
<td><select id="carmurm" name="carmurm">
<option value="<?php echo $carmurm?>"><?php echo $carmurm?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
</tr>
</table>
<h3 align="left" style="color:red"><u>Respiratory System</u></h3>
<table  cellpadding="5">
<tr><td>Dyspnoea:</td>
<td><select id="dyspn" name="dyspn">
<option value="<?php echo $dyspn?>" ><?php echo $dyspn?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  </td>
</tr>
<tr><td>Wheeze:</td>
<td><select id="Wheeze" name="Wheeze">
<option value="<?php echo $Wheeze?>"><?php echo $Wheeze?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
</tr>
<tr><td>Position of Trachea:</td>
<td><select id="trachea" name="trachea">
<option value="<?php echo $trachea?>"><?php echo $trachea?></option>
  <option value="Central">Central</option>
  <option value="Shiftedtoright1left">Shifted to Right 1 Left</option>  
</select></td>
</tr>

<tr><td>Breath Sound:</td>
<td><select id="breath" name="breath">
<option value="<?php echo $breath?>" ><?php echo $breath?></option>
  <option value="Vesicular">Vesicular</option>
  <option value="Tubular">Tubular</option>
  <option value="Amphoric">Amphoric</option>   
</select></td></tr>

<tr><td>Adventitious Sound:</td>
<td><select id="adventitious" name="adventitious">
<option value="<?php echo $adventitious?>" ><?php echo $adventitious?></option>
  <option value="Rhonchi">Rhonchi</option>
  <option value="Rales">Rales(Crepts)1 Pleural rub</option>  
</select></td></tr>

</table>
<h3 align="left" style="color:red"><u>Abdomen</u></h3>
<table  cellpadding="5">
<tr><td>Shape of Abdomen:</td>
<td><select id="abdomen" name="abdomen">
<option value="<?php echo $abdomen?>"><?php echo $abdomen?></option>
  <option value="scaphoid">Scaphoid</option>
  <option value="obese">Obese</option>
   <option value="distended">Distended</option>  
</select></td></tr>
</tr>

<tr><td>Tenderness:</td>
<td><select id="tendernes" name="tendernes">
<option value="<?php echo $tendernes?>"><?php echo $tendernes?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="text" id="tender" name="txttender" value="<?php echo $txttender?>" style="display: none;"></td>
</tr>

<tr><td>Palpable Mass:</td>
<td><select id="palpable" name="palpable">
<option value="<?php echo $palpable?>"><?php echo $palpable?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="text" id="mass" name="txtmass" value="<?php echo $txtmass?>" style="display: none;"></td>
</tr>
<tr><td>Hernia Orifices:</td>
<td><select id="hernia" name="hernia">
<option value="<?php echo $hernia?>" ><?php echo $hernia?></option>
  <option value="Normal">Normal</option>
  <option value="Hernia">Hernia</option>  
</select></td>
<td><input type="text" id="herniaori" name="txtherniaori" value="<?php echo $txtherniaori?>" style="display: none;"></td>
</tr>
<tr><td>Free Fluid:</td>
<td><select id="fluid" name="fluid">
<option value="<?php echo $fluid?>"><?php echo $fluid?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option></td>
</tr>
<tr><td>Bruits:</td>
<td><select id="bruits" name="bruits">
<option value="<?php echo $bruits?>" ><?php echo $bruits?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option></td>
</tr>
<tr><td>Liver:</td>
<td><select id="Liver" name="Liver">
<option value="<?php echo $Liver?>"><?php echo $Liver?></option>
  <option value="Notpalpable">Not palpable</option>
  <option value="Palpable">Palpable</option>  
</select><input type="text" id="liverpal" name="txtliverpal" value="<?php echo $txtliverpal?>" style="display: none;"></td>
</tr>
<tr><td>Spleen:</td>
<td><select id="Spleen" name="Spleen">
<option value="<?php echo $Spleen?>"><?php echo $Spleen?></option>
  <option value="npalSpleen">Not palpable</option>
  <option value="PalSpleen">Palpable</option>  
</select><input type="text" id="Spleenpal" name="txtliverpal1" value="<?php echo $txtliverpal1?>" style="display: none;"></td>
</tr>
<tr><td>Bowel Sound:</td>
<td><select id="bowel" name="bowel">
<option value="<?php echo $bowel?>"><?php echo $bowel?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option></td>
</tr>
<tr><td>Genitals:</td>
<td><input type="text"  name="txtgenital" value="<?php echo $txtgenital?>" id="genital"></td></tr>
<tr><td>Speculum Examination:</td>
<td><input type="text"  name="txtspeculum" value="<?php echo $txtspeculum?>" id="speculum"></td></tr>
<tr><td>PV Examination:</td>
<td><input type="text"  name="txtpvexamin" value="<?php echo $txtpvexamin?>" id="pvexamin"></td></tr>
<tr><td>P/R Examination:</td>
<td><input type="text"  name="txtprexamin" value="<?php echo $txtprexamin?>" id="prexamin"></td></tr>
</table>

<h3 align="left" style="color:red"><u>Central Nervous System</u></h3>
<table cellpadding="5">
<tr><td>Level of Consciousness:</td>
<td><select id="cons" name="cons">
<option value="<?php echo $cons?>"><?php echo $cons?></option>
  <option value="consiciou">Conscious/Alert</option>
  <option value="drowsy">Drowsy/Arousable</option>
<option value="stuporous">Stuporous</option>
  <option value="coma">Coma</option></td>
</tr>
<tr><td>Speech:</td>
<td><select id="speech" name="speech">
<option value="<?php echo $speech?>"><?php echo $speech?></option>
  <option value="Normal">Normal</option>
  <option value="noresponse">No Response</option>
  <option value="slurred">Slurred</option>
  <option value="incoherent">Incoherent</option>
<option value="aphasic">Aphasic</option>   
</tr>
<tr><td>Sings of Meningeal Irritation:</td>
<td>Neck Stiffness:<select id="neck" name="neck">
<option value="<?php echo $neck?>"><?php echo $neck?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td>Kerning's Sign:<select id="kerning" name="kerning">
<option value="<?php echo $kerning?>" ><?php echo $kerning?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
</tr>

<tr><td>Cranial Nerves:</td>
<td><input type="text"  name="txtnerves" value="<?php echo $txtnerves?>" id="nerves"></td></tr>

<tr><td>Motor System:</td>
<td><input type="text"  name="txtmotor" value="<?php echo $txtmotor?>" id="motor"></td></tr>

<tr><td>Sensory System:</td>
<td><input type="text"  name="txtsensory" value="<?php echo $txtsensory?>" id="sensory"></td></tr>
<tr><td>Glasgow Scale:</td>
<td><input type="text"  name="txtglas" value="<?php echo $txtglas?>" id="glas"></td></tr>
</table>

<table  cellpadding="5" border="1px" align="center">
<tr><th></th>
<td align="center">Biceps</td>
<td align="center">Triceps</td>
<td align="center">Supinator</td>
<td align="center">Knee</td>
<td align="center">Ankle</td></tr>
<tr><th>Right</th>
<td><input type="text" value="<?php echo $txtrbice?>" name="txtrbice" id="rbice" placeholder="Right Bices"></td>
<td><input type="text"  value="<?php echo $txtrtric?>" name="txtrtric" id="rtric" placeholder="Right Trices"></td>
<td><input type="text" value="<?php echo $txtrsupi?>" name="txtrsupi" id="rsupi" placeholder="Right Supinator"></td>
<td><input type="text" value="<?php echo $txtrknee?>"  name="txtrknee" id="rknee" placeholder="Right Knee"></td>
<td><input type="text" value="<?php echo $txtrankle?>" name="txtrankle" id="rankle" placeholder="Right Ankle"></td></tr>
</tr>


<tr><th>Left</th>
<td><input type="text" value="<?php echo $txtlbice?>" name="txtlbice" id="lbice" placeholder="Left Bices"></td>
<td><input type="text" value="<?php echo $txtltric?>"  name="txtltric" id="ltric" placeholder="Left Trices"></td>
<td><input type="text" value="<?php echo $txtlsupi?>" name="txtlsupi" id="lsupi" placeholder="Left Supinator"></td>
<td><input type="text" value="<?php echo $txtlknee?>" name="txtlknee" id="lknee" placeholder="Left Knee"></td>
<td><input type="text" value="<?php echo $txtlankle?>" name="txtlankle" id="lankle" placeholder="Left Ankle"></td>
<tr>

</table>
<table cellpadding="5"><tr><td>Planrars:</td><td><select id="Plan" name="Plan">
<option value="<?php echo $Plan?>"><?php echo $Plan?></option>
  <option value="Flexor">Flexor</option>
  <option value="Extensor">Extensor</option>
<option value="Equivocal">Equivocal Unelicitable</option>  
</select></td>
</tr></table>
<h3 align="left" style="color:red"><u>Cerebellar Signs</u></h3>
<table cellpadding="5"><tr><td>Finger:Nose in coordination</td>
<td><select id="finger" name="finger">
<option value="<?php echo $finger?>"><?php echo $finger?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td></tr>

<tr><td>Knee:Heel in coordination</td>
<td><select id="heel" name="heel">
<option value="<?php echo $heel?>"><?php echo $heel?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td></tr>

<tr><td>Gait:</td>
<td><select id="gait" name="gait">
<option value="<?php echo $gait?>"><?php echo $gait?></option>
  <option value="Hemiplegic">Hemiplegic</option>
  <option value="Slow">Slow</option>  
</select></td>
<td><select id="shufling" name="shufling">
<option value="<?php echo $shufling?>" ><?php echo $shufling?></option>
  <option value="shuffling">shuffling</option>
  <option value="Atax">Atax</option>
  <option value="High Stepping">High Stepping</option>   
</select></td></tr>
</table>
<table cellpadding="5">
<tr><td>Musculoskeletal System :</td>
<td><input type="text" value="<?php echo $txtmuscu?>" name="txtmuscu" id="muscu" ></td></tr>
<tr><td>Skin :</td>
<td><input type="text" value="<?php echo $txtskin?>"  name="txtskin" id="skin" ></td></tr>
<tr><td>Examination of Breast :</td>
<td><input type="text" value="<?php echo $txtexbr?>"  name="txtexbr" id="exbr" ></td></tr>
<tr><td>Ent :</td>
<td><input type="text" value="<?php echo $txtent?>" name="txtent" id="ent" ></td></tr>
<tr><td>Examination of Teeth and oralcavity :</td>
<td><input type="text"  name="txtteeth" id="teeth" ></td></tr>
<tr><td>Examination of Head and Neck :</td>
<td><input type="text" value="<?php echo $txthene?>"  name="txthene" id="hene" ></td></tr>
<tr><td>Provisinal Diagnosis:</td>
<td><input type="text" value="<?php echo $txtprovi?>" name="txtprovi" id="provi" ></td></tr>
<tr><td>Plan of Primary Consultant :</td>
<td><input type="text" value="<?php echo $txtplan?>"  name="txtplan" id="plan" ></td></tr>
<tr><td>Plan of Care :</td>
<td><input type="text" value="<?php echo $txtcare?>" name="txtcare" id="care" ></td></tr>
<tr><td>Exoected Outcome :</td>
<td><input type="text" value="<?php echo $txtexout?>"  name="txtexout" id="exout" ></td></tr>
<tr><td>Preventive Aspects of Care:</td>
<td><input type="text" value="<?php echo $txtasect?>" name="txtasect" id="asect" ></td></tr>
</table><input type="hidden" value="<?php echo $id?>" name="id" id="id" >



									<!--Treatment HISTORY Script  -->


<table align="center">
    
            

<tr><td colspan="2" width="400"></td><td  align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='int_det2.php'"/></td></tr></table>
 </form>         
		       </div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>
									<!--Script  -->

<script>                                               
									  
    $('#tendernes').change(function () {
    var myValue = $(this).val();
    var myText = $("#tendernes :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#tender").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#tender").hide();
    }
});
$('#palpable').change(function () {
    var myValue = $(this).val();
    var myText = $("#palpable :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#mass").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#mass").hide();
    }
});
 $('#hernia').change(function () {
    var myValue = $(this).val();
    var myText = $("#hernia :selected").text();

    if (myText != '' && myText === "Hernia") {
        $("#herniaori").show();
    }
	if(myText != '' && myText === "Normal")
	{
        $("#herniaori").hide();
    }
});
$('#Liver').change(function () {
    var myValue = $(this).val();
    var myText = $("#Liver :selected").text();

    if (myText != '' && myText === "Palpable") {
        $("#liverpal").show();
    }
	if(myText != '' && myText === "Notpalpable")
	{
        $("#liverpal").hide();
    }
});

$('#Spleen').change(function () {
    var myValue = $(this).val();
    var myText = $("#Spleen :selected").text();

    if (myText != '' && myText === "Palpable") {
        $("#Spleenpal").show();
    }
	if(myText != '' && myText === "Notpalpable")
	{
        $("#Spleenpal").hide();
    }
});
																
	
</script>
  
		<?php 
		if(isset($_POST['submit'])){
			$id=$_POST['id'];
	
			$date1=date('Y-m-d');
	$mrnum=$_POST['mrnum'];
	$thrills=$_POST['thrills'];
	$txtcarsnd=$_POST['txtcarsnd'];
	$carmurm=$_POST['carmurm'];
	$dyspn=$_POST['dyspn'];
	$Wheeze=$_POST['Wheeze'];
	$trachea=$_POST['trachea'];
	$breath=$_POST['breath'];
	$adventitious=$_POST['adventitious'];
	$abdomen=$_POST['abdomen'];
	$tendernes=$_POST['tendernes'];
	$txttender=$_POST['txttender'];
	$palpable=$_POST['palpable'];
	$txtmass=$_POST['txtmass'];
	$hernia=$_POST['hernia'];
	$txtherniaori=$_POST['txtherniaori'];
	$fluid=$_POST['fluid'];
	$bruits=$_POST['bruits'];
	$Liver=$_POST['Liver'];
	$txtliverpal=$_POST['txtliverpal'];
	$Spleen=$_POST['Spleen'];
	$txtliverpal1=$_POST['txtliverpal1'];
	$bowel=$_POST['bowel'];
	$txtgenital=$_POST['txtgenital'];
	$txtspeculum=$_POST['txtspeculum'];
	$txtpvexamin=$_POST['txtpvexamin'];
	$txtprexamin=$_POST['txtprexamin'];
	$cons=$_POST['cons'];
	$speech=$_POST['speech'];
	$neck=$_POST['neck'];
	$kerning=$_POST['kerning'];
	$txtnerves=$_POST['txtnerves'];
	$txtmotor=$_POST['txtmotor'];
	$txtsensory=$_POST['txtsensory'];
	$txtglas=$_POST['txtglas'];
	$txtrbice=$_POST['txtrbice'];
	$txtrtric=$_POST['txtrtric'];
	$txtrsupi=$_POST['txtrsupi'];
	$txtrknee=$_POST['txtrknee'];
	$txtrankle=$_POST['txtrankle'];
	$txtlbice=$_POST['txtlbice'];
	$txtltric=$_POST['txtltric'];
	$txtlsupi=$_POST['txtlsupi'];
	$txtlknee=$_POST['txtlknee'];
	$txtlankle=$_POST['txtlankle'];
	$Plan=$_POST['Plan'];
	$finger=$_POST['finger'];
	$heel=$_POST['heel'];
	$gait=$_POST['gait'];
	$shufling=$_POST['shufling'];
	$txtmuscu=$_POST['txtmuscu'];
	$txtskin=$_POST['txtskin'];
	$txtexbr=$_POST['txtexbr'];
	$txtent=$_POST['txtent'];
	$txtteeth=$_POST['txtteeth'];
	$txthene=$_POST['txthene'];
	$txtprovi=$_POST['txtprovi'];
	$txtplan=$_POST['txtplan'];
	$txtcare=$_POST['txtcare'];
	$txtexout=$_POST['txtexout'];
	$txtasect=$_POST['txtasect'];		
			
			
			
			 $s="UPDATE `casesheet_clicnic` set
			 
			 
			  `mrnum`='$mrnum', `thrills`='$thrills', `txtcarsnd`='$txtcarsnd', `carmurm`='$carmurm', `dyspn`='$dyspn',
			   `Wheeze`='$Wheeze', `trachea`='$trachea',
			 `breath`='$breath', `adventitious`='$adventitious', `abdomen`='$abdomen', `tendernes`='$tendernes',
			  `txttender`='$txttender', `palpable`='$palpable', `txtmass`='$txtmass', `hernia`='$hernia', `txtherniaori`='$txtherniaori', 
			 `fluid`='$fluid', `bruits`='$bruits', `Liver`='$Liver', `txtliverpal`='$txtliverpal', `Spleen`='$Spleen',
			  `txtliverpal1`='$txtliverpal1', `bowel`='$bowel', `txtgenital`='$txtgenital', `txtspeculum`='$txtspeculum', 
			 `txtpvexamin`='$txtpvexamin', `txtprexamin`='$txtprexamin', `cons`='$cons', `speech`='$speech', `neck`='$neck',
			  `kerning`='$kerning', `txtnerves`='$txtnerves', `txtmotor`='$txtmotor', `txtsensory`='$txtsensory', 
			 `txtglas`='$txtglas', `txtrbice`='$txtrbice', `txtrtric`='$txtrtric', `txtrsupi`='$txtrsupi', `txtrknee`='$txtrknee',
			  `txtrankle`='$txtrankle', `txtlbice`='$txtlbice', `txtltric`='$txtltric', `txtlsupi`='$txtlsupi', 
			 `txtlknee`='$txtlknee', `txtlankle`='$txtlankle', `Plan`='$Plan', `finger`='$finger', `heel`='$heel', `gait`='$gait'
			 , `shufling`='$shufling', `txtmuscu`='$txtmuscu', `txtskin`='$txtskin', `txtexbr`='$txtexbr', `txtent`='$txtent',
			  `txtteeth`='$txtteeth', `txthene`='$txthene', `txtprovi`='$txtprovi', `txtplan`='$txtplan',
			   `txtcare`='$txtcare', `txtexout`='$txtexout', `txtasect`='$txtasect' where id='$id'";
			   
			  
			
		$sq=mysql_query($s); 
		
		
		
		
		
		//update patientregister set arrival_mode='$mode',ref_from='$ref',previous='$Previous' where registerno='$mr_num'");
		
		if($sq){
			print "<script>";
	print "alert('Successfully added');";
	print "self.location='int_det2.php';";
	print "</script>";
		}
		
		
		}
		?>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>