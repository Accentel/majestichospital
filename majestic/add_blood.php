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
	
	<div id="conteneur container">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php */?><?php
	include("logo.php");
			include("main_menu.php");
			?>
		  
		<?php 
		if(isset($_POST['submit'])){
			$mrno=$_POST['patmrno'];
			$phynm=$_POST['phynm'];
			$txtrmaks=$_POST['txtrmaks'];
			$txtstfnurname=$_POST['txtstfnurname'];
			$txtdrname=$_POST['txtdrname'];
			$txtstfnursign=$_POST['txtstfnursign'];
			$txtdrsign=$_POST['txtdrsign'];
			$bldbgno=$_POST['bldbgno'];
			$bdts=$_POST['bdts'];
			$blgrp=$_POST['blgrp'];
			$blgrped=$_POST['blgrped'];
			$bldpret=$_POST['bldpret'];
			$blptred=$_POST['blptred'];
			$txttemp=$_POST['txttemp'];
			$txthr=$_POST['txthr'];
			$txtrr=$_POST['txtrr'];
			$txtbp=$_POST['txtbp'];
			$d=date('Y-m-d');
			$txtatime=$_POST['txtatime'];
			$txttempf=$_POST['txttempf'];
			$txthrmin=$_POST['txthrmin'];
			$txtrrmin=$_POST['txtrrmin'];
			$txtbphg=$_POST['txtbphg'];
			$txtatime1=$_POST['txtatime1'];
			$txttempf1=$_POST['txttempf1'];
			$txthrmin1=$_POST['txthrmin1'];
			$txtrrmin1=$_POST['txtrrmin1'];
			$txtbphg1=$_POST['txtbphg1'];
			$txtatime2=$_POST['txtatime2'];
			$txttempf2=$_POST['txttempf2'];
			$txthrmin2=$_POST['txthrmin2'];
			$txtrrmin2=$_POST['txtrrmin2'];
			$txtbphg2=$_POST['txtbphg2'];
			$txtatime3=$_POST['txtatime3'];
			$txttempf3=$_POST['txttempf3'];
			$txthrmin3=$_POST['txthrmin3'];
			$txtrrmin3=$_POST['txtrrmin3'];
			$txtbphg3=$_POST['txtbphg3'];
			$txtatime4=$_POST['txtatime4'];
			$txttempf4=$_POST['txttempf4'];
			$txthrmin4=$_POST['txthrmin4'];
			$txtrrmin4=$_POST['txtrrmin4'];
			$txtbphg4=$_POST['txtbphg4'];
			$txtatime5=$_POST['txtatime5'];
			$txttempf5=$_POST['txttempf5'];
			$txthrmin5=$_POST['txthrmin5'];
			$txtrrmin5=$_POST['txtrrmin5'];
			$txtbphg5=$_POST['txtbphg5'];
			$txtatime8=$_POST['txtatime8'];
			$txttempf8=$_POST['txttempf8'];
			$txthrmin8=$_POST['txthrmin8'];
			$txtrrmin8=$_POST['txtrrmin8'];
			$txtbphg8=$_POST['txtbphg8'];
			$txtatime9=$_POST['txtatime9'];
			$txttempf9=$_POST['txttempf9'];
			$txthrmin9=$_POST['txthrmin9'];
			$txtrrmin9=$_POST['txtrrmin9'];
			$txtbphg9=$_POST['txtbphg9'];
			$txtatime6=$_POST['txtatime6'];
			$txttempf6=$_POST['txttempf6'];
			$txthrmin6=$_POST['txthrmin6'];
			$txtrrmin6=$_POST['txtrrmin6'];
			$txtbphg6=$_POST['txtbphg6'];
			$txtatime7=$_POST['txtatime7'];
			$txttempf7=$_POST['txttempf7'];
			$txthrmin7=$_POST['txthrmin7'];
			$txtrrmin7=$_POST['txtrrmin7'];
			$txtbphg7=$_POST['txtbphg7'];
			$txturtic=$_POST['txturtic'];
			$txtitch=$_POST['txtitch'];
			$txtpulse=$_POST['txtpulse'];
			$txtchills=$_POST['txtchills'];
			$txteleva=$_POST['txteleva'];
			$txtflus=$_POST['txtflus'];
			$txtmache=$_POST['txtmache'];
			$txtchpain=$_POST['txtchpain'];
			$txtbkpain=$_POST['txtbkpain'];
			$txtrdurine=$_POST['txtrdurine'];
			$txtdurine=$_POST['txtdurine'];
			$txtpeti=$_POST['txtpeti'];
			$txtclot=$_POST['txtclot'];
			$txtsite=$_POST['txtsite'];
			$txtnause=$_POST['txtnause'];
			$txtheadache=$_POST['txtheadache'];
			$txthypo=$_POST['txthypo'];
			$txtdysp=$_POST['txtdysp'];
			$txtcyan=$_POST['txtcyan'];
			$txtcough=$_POST['txtcough'];
			$txtvomting=$_POST['txtvomting'];
			$txtshock=$_POST['txtshock'];
			$txtcramps=$_POST['txtcramps'];
			$txturtic1=$_POST['txturtic1'];
			$txtitch1=$_POST['txtitch1'];
			$txtpulse1=$_POST['txtpulse1'];
			$txtchills1=$_POST['txtchills1'];
			$txtchills1=$_POST['txtchills1'];
			$txteleva1=$_POST['txteleva1'];
			$txtflus1=$_POST['txtflus1'];
			$txtflus1=$_POST['txtflus1'];
			$txtmache1=$_POST['txtmache1'];
			$txtchpain1=$_POST['txtchpain1'];
			$txtbkpain1=$_POST['txtbkpain1'];
			$txtrdurine1=$_POST['txtrdurine1'];
			$txtdurine1=$_POST['txtdurine1'];
			$txtpeti1=$_POST['txtpeti1'];
			$txtpeti1=$_POST['txtpeti1'];
			$txtclot1=$_POST['txtclot1'];
			$txtsite1=$_POST['txtsite1'];
			$txtnause1=$_POST['txtnause1'];
			$txtheadache1=$_POST['txtheadache1'];
			$txthypo1=$_POST['txthypo1'];
			$txtdysp1=$_POST['txtdysp1'];
			$txtcyan1=$_POST['txtcyan1'];
			$txtcough1=$_POST['txtcough1'];
			$txtvomting1=$_POST['txtvomting1'];
			$txtshock1=$_POST['txtshock1'];
			$txtcramps1=$_POST['txtcramps1'];
			$txturtic2=$_POST['txturtic2'];
			$txtitch2=$_POST['txtitch2'];
			$txtpulse2=$_POST['txtpulse2'];
			$txtchills2=$_POST['txtchills2'];
			$txteleva2=$_POST['txteleva2'];
			$txtflus2=$_POST['txtflus2'];
			$txtmache2=$_POST['txtmache2'];
			$txtchpain2=$_POST['txtchpain2'];
			$txtbkpain2=$_POST['txtbkpain2'];
			$txtrdurine2=$_POST['txtrdurine2'];
			$txtdurine2=$_POST['txtdurine2'];
			$txtpeti2=$_POST['txtpeti2'];
			$txtclot2=$_POST['txtclot2'];
			$txtsite2=$_POST['txtsite2'];
			$txtnause2=$_POST['txtnause2'];
			$txtheadache2=$_POST['txtheadache2'];
			$txthypo2=$_POST['txthypo2'];
			$txtdysp2=$_POST['txtdysp2'];
			$txtcyan2=$_POST['txtcyan2'];
			$txtcough2=$_POST['txtcough2'];
			$txtvomting2=$_POST['txtvomting2'];
			$txtshock2=$_POST['txtshock2'];
			$txtcramps2=$_POST['txtcramps2'];
			$txturtic3=$_POST['txturtic3'];
			$txtitch3=$_POST['txtitch3'];
			$txtpulse3=$_POST['txtpulse3'];
			$txtchills3=$_POST['txtchills3'];
			$txteleva3=$_POST['txteleva3'];
			$txtflus3=$_POST['txtflus3'];
			$txtmache3=$_POST['txtmache3'];
			$txtchpain3=$_POST['txtchpain3'];
			$txtbkpain3=$_POST['txtbkpain3'];
			$txtrdurine3=$_POST['txtrdurine3'];
			$txtdurine3=$_POST['txtdurine3'];
			$txtpeti3=$_POST['txtpeti3'];
			$txtclot3=$_POST['txtclot3'];
			$txtsite3=$_POST['txtsite3'];
			$txtnause3=$_POST['txtnause3'];
			$txtheadache3=$_POST['txtheadache3'];
			$txthypo3=$_POST['txthypo3'];
			$txtdysp3=$_POST['txtdysp3'];
			$txtcyan3=$_POST['txtcyan3'];
			$txtcough3=$_POST['txtcough3'];
			$txtvomting3=$_POST['txtvomting3'];
			$txtshock3=$_POST['txtshock3'];
			$txtcramps3=$_POST['txtcramps3'];
			$txturtic4=$_POST['txturtic4'];
			$txtitch4=$_POST['txtitch4'];
			$txtpulse4=$_POST['txtpulse4'];
			$txtchills4=$_POST['txtchills4'];
			$txteleva4=$_POST['txteleva4'];
			$txtflus4=$_POST['txtflus4'];
			$txtmache4=$_POST['txtmache4'];
			$txtchpain4=$_POST['txtchpain4'];
			$txtbkpain4=$_POST['txtbkpain4'];
			$txtrdurine4=$_POST['txtrdurine4'];
			$txtdurine4=$_POST['txtdurine4'];
			$txtpeti4=$_POST['txtpeti4'];
			$txtclot4=$_POST['txtclot4'];
			$txtsite4=$_POST['txtsite4'];
			$txtnause4=$_POST['txtnause4'];
			$txtheadache4=$_POST['txtheadache4'];
			$txthypo4=$_POST['txthypo4'];
			$txtdysp4=$_POST['txtdysp4'];
			$txtcyan4=$_POST['txtcyan4'];
			$txtcough4=$_POST['txtcough4'];
			$txtvomting4=$_POST['txtvomting4'];
			$txtshock4=$_POST['txtshock4'];
			$txtcramps4=$_POST['txtcramps4'];
			$txturtic5=$_POST['txturtic5'];
			$txtitch5=$_POST['txtitch5'];
			$txtpulse5=$_POST['txtpulse5'];
			$txtchills5=$_POST['txtchills5'];
			$txteleva5=$_POST['txteleva5'];
			$txtflus5=$_POST['txtflus5'];
			$txtmache5=$_POST['txtmache5'];
			$txtchpain5=$_POST['txtchpain5'];
			$txtbkpain5=$_POST['txtbkpain5'];
			$txtrdurine5=$_POST['txtrdurine5'];
			$txtdurine5=$_POST['txtdurine5'];
			$txtpeti5=$_POST['txtpeti5'];
			$txtclot5=$_POST['txtclot5'];
			$txtsite5=$_POST['txtsite5'];
			$txtnause5=$_POST['txtnause5'];
			$txtheadache5=$_POST['txtheadache5'];
			$txthypo5=$_POST['txthypo5'];
			$txtdysp5=$_POST['txtdysp5'];
			$txtcyan5=$_POST['txtcyan5'];
			$txtcough5=$_POST['txtcough5'];
			$txtvomting5=$_POST['txtvomting5'];
			$txtshock5=$_POST['txtshock5'];
			$txtcramps5=$_POST['txtcramps5'];
			 $txturtic6=$_POST['txturtic6'];
			 $txtitch6=$_POST['txtitch6'];
			 $txtpulse6=$_POST['txtpulse6'];
			 $txtchills6=$_POST['txtchills6'];
			 $txteleva6=$_POST['txteleva6'];
			 $txtflus6=$_POST['txtflus6'];
			 $txtmache6=$_POST['txtmache6'];
			 $txtchpain6=$_POST['txtchpain6'];
			 $txtbkpain6=$_POST['txtbkpain6'];
			 $txtrdurine6=$_POST['txtrdurine6'];
			 $txtdurine6=$_POST['txtdurine6'];
			 $txtpeti6=$_POST['txtpeti6'];
			 $txtclot6=$_POST['txtclot6'];
			 $txtsite6=$_POST['txtsite6'];
			 $txtnause6=$_POST['txtnause6'];
			 $txtheadache6=$_POST['txtheadache6'];
			 $txthypo6=$_POST['txthypo6'];
			 $txtdysp6=$_POST['txtdysp6'];
			 $txtcyan6=$_POST['txtcyan6'];
			 $txtcough6=$_POST['txtcough6'];
			 $txtvomting6=$_POST['txtvomting6'];
			 $txtshock6=$_POST['txtshock6'];
			 $txtcramps6=$_POST['txtcramps6'];
			 $txturtic7=$_POST['txturtic7'];
			 $txtitch7=$_POST['txtitch7'];
			 $txtpulse7=$_POST['txtpulse7'];
			 $txtchills7=$_POST['txtchills7'];
			 $txteleva7=$_POST['txteleva7'];
			 $txtflus7=$_POST['txtflus7'];
			 $txtmache7=$_POST['txtmache7'];
			 $txtchpain7=$_POST['txtchpain7'];
			 $txtbkpain7=$_POST['txtbkpain7'];
			 $txtrdurine7=$_POST['txtrdurine7'];
			 $txtdurine7=$_POST['txtdurine7'];
			 $txtpeti7=$_POST['txtpeti7'];
			 $txtclot7=$_POST['txtclot7'];
			 $txtsite7=$_POST['txtsite7'];
			 $txtnause7=$_POST['txtnause7'];
			 $txtheadache7=$_POST['txtheadache7'];
			 $txthypo7=$_POST['txthypo7'];
			 $txtdysp7=$_POST['txtdysp7'];
			 $txtcyan7=$_POST['txtcyan7'];
			 $txtcough7=$_POST['txtcough7'];
			 $txtvomting7=$_POST['txtvomting7'];
			 $txtshock7=$_POST['txtshock7'];
			 $txtcramps7=$_POST['txtcramps7'];
			 $txturtic8=$_POST['txturtic8'];
			 $txtitch8=$_POST['txtitch8'];
			 $txtpulse8=$_POST['txtpulse8'];
			 $txtchills8=$_POST['txtchills8'];
			 $txteleva8=$_POST['txteleva8'];
			 $txtflus8=$_POST['txtflus8'];
			 $txtmache8=$_POST['txtmache8'];
			 $txtchpain8=$_POST['txtchpain8'];
			 $txtbkpain8=$_POST['txtbkpain8'];
			 $txtrdurine8=$_POST['txtrdurine8'];
			 $txtdurine8=$_POST['txtdurine8'];
			 $txtpeti8=$_POST['txtpeti8'];
			 $txtclot8=$_POST['txtclot8'];
			 $txtsite8=$_POST['txtsite8'];
			 $txtnause8=$_POST['txtnause8'];
			 $txtheadache8=$_POST['txtheadache8'];
			 $txthypo8=$_POST['txthypo8'];
			 $txtdysp8=$_POST['txtdysp8'];
			 $txtcyan8=$_POST['txtcyan8'];
			 $txtcough8=$_POST['txtcough8'];
			 $txtvomting8=$_POST['txtvomting8'];
			 $txtshock8=$_POST['txtshock8'];
			 $txtcramps8=$_POST['txtcramps8'];
			 $txturtic9=$_POST['txturtic9'];
			 $txtitch9=$_POST['txtitch9'];
			 $txtpulse9=$_POST['txtpulse9'];
			 $txtchills9=$_POST['txtchills9'];
			 $txteleva9=$_POST['txteleva9'];
			 $txtflus9=$_POST['txtflus9'];
			 $txtmache9=$_POST['txtmache9'];
			 $txtchpain9=$_POST['txtchpain9'];
			 $txtbkpain9=$_POST['txtbkpain9'];
			 $txtrdurine9=$_POST['txtrdurine9'];
			 $txtdurine9=$_POST['txtdurine9'];
			 $txtpeti9=$_POST['txtpeti9'];
			 $txtclot9=$_POST['txtclot9'];
			 $txtsite9=$_POST['txtsite9'];
			 $txtnause9=$_POST['txtnause9'];
			 $txtheadache9=$_POST['txtheadache9'];
			 $txthypo9=$_POST['txthypo9'];
			 $txtdysp9=$_POST['txtdysp9'];
			 $txtcyan9=$_POST['txtcyan9'];
			 $txtcough9=$_POST['txtcough9'];
			 $txtvomting9=$_POST['txtvomting9'];
			 $txtshock9=$_POST['txtshock9'];
			 $txtcramps9=$_POST['txtcramps9'];
			
			$sq=mysql_query("INSERT INTO `blood_comp1`( `mrno`, `phynm`, `txtrmaks`, `txtstfnurname`, `txtdrname`, `txtstfnursign`, `txtdrsign`, `bldbgno`, `bdts`, `blgrp`, `blgrped`, `bldpret`, `blptred`, `txttemp`, `txthr`, `txtrr`, `txtbp`,`date1`) 
			VALUES ('$mrno', '$phynm', '$txtrmaks', '$txtstfnurname', '$txtdrname', '$txtstfnursign', '$txtdrsign', '$bldbgno', '$bdts', '$blgrp', '$blgrped', '$bldpret', '$blptred', '$txttemp', '$txthr', '$txtrr', '$txtbp','$d')");
		$id=mysql_insert_id();
		
		$s1=mysql_query("INSERT INTO `blood_comp2`( `id1`, `mrno`, `txtatime`, `txttempf`, `txthrmin`, `txtrrmin`, 
		`txtbphg`, `txtatime1`, `txttempf1`, `txthrmin1`, `txtrrmin1`, `txtbphg1`, `txtatime2`, `txttempf2`, 
		`txthrmin2`, `txtrrmin2`, `txtbphg2`, `txtatime3`, `txttempf3`, `txthrmin3`, `txtrrmin3`, `txtbphg3`, 
		`txtatime4`, `txttempf4`, `txthrmin4`, `txtrrmin4`, `txtbphg4`, `txtatime5`, `txttempf5`, `txthrmin5`, 
		`txtrrmin5`, `txtbphg5`, `txtatime8`, `txttempf8`, `txthrmin8`, `txtrrmin8`, `txtbphg8`, `txtatime9`, 
		`txttempf9`, `txthrmin9`, `txtrrmin9`, `txtbphg9`, `txtatime6`, `txttempf6`, `txthrmin6`, `txtrrmin6`, 
		`txtbphg6`, `txtatime7`, `txttempf7`, `txthrmin7`, `txtrrmin7`, `txtbphg7`)
		 VALUES ('$id','$mrno','$txtatime', '$txttempf', '$txthrmin', '$txtrrmin', 
		'$txtbphg', '$txtatime1', '$txttempf1', '$txthrmin1', '$txtrrmin1', '$txtbphg1', '$txtatime2', '$txttempf2', 
		'$txthrmin2', '$txtrrmin2', '$txtbphg2', '$txtatime3', '$txttempf3', '$txthrmin3', '$txtrrmin3', '$txtbphg3', 
		'$txtatime4', '$txttempf4', '$txthrmin4', '$txtrrmin4', '$txtbphg4', '$txtatime5', '$txttempf5', '$txthrmin5', 
		'$txtrrmin5', '$txtbphg5', '$txtatime8', '$txttempf8', '$txthrmin8', '$txtrrmin8', '$txtbphg8', '$txtatime9', 
		'$txttempf9', '$txthrmin9', '$txtrrmin9', '$txtbphg9', '$txtatime6', '$txttempf6', '$txthrmin6', '$txtrrmin6', 
		'$txtbphg6', '$txtatime7', '$txttempf7', '$txthrmin7', '$txtrrmin7', '$txtbphg7')");
		$s2=mysql_query("INSERT INTO `blood_comp3`(`id1`, `mrno`, `txturtic`, `txtitch`, `txtpulse`, `txtchills`, `txteleva`, `txtflus`, `txtmache`, `txtchpain`, `txtbkpain`, `txtrdurine`, `txtdurine`, `txtpeti`, `txtclot`, `txtsite`, `txtnause`, `txtheadache`, `txthypo`, `txtdysp`, `txtcyan`, `txtcough`, `txtvomting`, `txtshock`, `txtcramps`, `txturtic1`, `txtitch1`, `txtpulse1`, `txtchills1`, `txteleva1`, `txtflus1`, `txtmache1`, `txtchpain1`, `txtbkpain1`, `txtrdurine1`, `txtdurine1`, `txtpeti1`, `txtclot1`, `txtsite1`, `txtnause1`, `txtheadache1`, `txthypo1`, `txtdysp1`, `txtcyan1`, `txtcough1`, `txtvomting1`, `txtshock1`, `txtcramps1`, `txturtic2`, `txtitch2`, `txtpulse2`, `txtchills2`, `txteleva2`, `txtflus2`, `txtmache2`, `txtchpain2`, `txtbkpain2`, `txtrdurine2`, `txtdurine2`, `txtpeti2`, `txtclot2`, `txtsite2`, `txtnause2`, `txtheadache2`, `txthypo2`, `txtdysp2`, `txtcyan2`, `txtcough2`, `txtvomting2`, `txtshock2`, `txtcramps2`)
		 VALUES ('$id', '$mrno', '$txturtic', '$txtitch', '$txtpulse', '$txtchills',
		  '$txteleva', '$txtflus', '$txtmache', '$txtchpain', '$txtbkpain', '$txtrdurine', '$txtdurine',
		   '$txtpeti', '$txtclot', '$txtsite', '$txtnause', '$txtheadache', '$txthypo', 
		   '$txtdysp', '$txtcyan', '$txtcough', '$txtvomting', '$txtshock', '$txtcramps', 
		   '$txturtic1', '$txtitch1', '$txtpulse1', '$txtchills1', '$txteleva1', '$txtflus1', 
		   '$txtmache1', '$txtchpain1', '$txtbkpain1', '$txtrdurine1', '$txtdurine1', '$txtpeti1',
		    '$txtclot1', '$txtsite1', '$txtnause1', '$txtheadache1', '$txthypo1', '$txtdysp1', '$txtcyan1',
			 '$txtcough1', '$txtvomting1', '$txtshock1', '$txtcramps1', '$txturtic2', '$txtitch2', '$txtpulse2', 
			 '$txtchills2', '$txteleva2', '$txtflus2', '$txtmache2', '$txtchpain2', '$txtbkpain2', '$txtrdurine2',
			  '$txtdurine2', '$txtpeti2', '$txtclot2', '$txtsite2', '$txtnause2', '$txtheadache2', '$txthypo2',
			   '$txtdysp2', '$txtcyan2', '$txtcough2', '$txtvomting2', '$txtshock2', '$txtcramps2')");
		 
		 
		 $s3=mysql_query("INSERT INTO `blood_comp4`( `id1`, `mrno`, `txturtic3`, `txtitch3`, `txtpulse3`, `txtchills3`, `txteleva3`, `txtflus3`, `txtmache3`, `txtchpain3`, `txtbkpain3`, `txtrdurine3`, `txtdurine3`, `txtpeti3`, `txtclot3`, `txtsite3`, `txtnause3`, `txtheadache3`, `txthypo3`, `txtdysp3`, `txtcyan3`, `txtcough3`, `txtvomting3`, `txtshock3`, `txtcramps3`, `txturtic4`, `txtitch4`, `txtpulse4`, `txtchills4`, `txteleva4`, `txtflus4`, `txtmache4`, `txtchpain4`, `txtbkpain4`, `txtrdurine4`, `txtdurine4`, `txtpeti4`, `txtclot4`, `txtsite4`, `txtnause4`, `txtheadache4`, `txthypo4`, `txtdysp4`, `txtcyan4`, `txtcough4`, `txtvomting4`, `txtshock4`, `txtcramps4`, `txturtic5`, `txtitch5`, `txtpulse5`, `txtchills5`, `txteleva5`, `txtflus5`, `txtmache5`, `txtchpain5`, `txtbkpain5`, `txtrdurine5`, `txtdurine5`, `txtpeti5`, `txtclot5`, `txtsite5`, `txtnause5`, `txtheadache5`, `txthypo5`, `txtdysp5`, `txtcyan5`, `txtcough5`, `txtvomting5`, `txtshock5`, `txtcramps5`)
		  VALUES ('$id', '$mrno', '$txturtic3', '$txtitch3', '$txtpulse3', '$txtchills3', '$txteleva3', '$txtflus3', '$txtmache3', '$txtchpain3', '$txtbkpain3', '$txtrdurine3', '$txtdurine3', '$txtpeti3', '$txtclot3', '$txtsite3', '$txtnause3', '$txtheadache3', '$txthypo3', '$txtdysp3', '$txtcyan3', '$txtcough3', '$txtvomting3', '$txtshock3', '$txtcramps3', '$txturtic4', '$txtitch4', '$txtpulse4', '$txtchills4', '$txteleva4', '$txtflus4', '$txtmache4', '$txtchpain4', 'txtbkpain4', '$txtrdurine4', '$txtdurine4', '$txtpeti4', '$txtclot4', '$txtsite4', '$txtnause4', 
		  '$txtheadache4', '$txthypo4', '$txtdysp4', '$txtcyan4', '$txtcough4', '$txtvomting4', '$txtshock4', '$txtcramps4', 
		  '$txturtic5', '$txtitch5', '$txtpulse5', '$txtchills5', '$txteleva5', '$txtflus5', '$txtmache5', 
		  '$txtchpain5', '$txtbkpain5', '$txtrdurine5', '$txtdurine5', '$txtpeti5', '$txtclot5', '$txtsite5', '$txtnause5', 
		  '$txtheadache5', '$txthypo5', '$txtdysp5', '$txtcyan5', '$txtcough5', '$txtvomting5', '$txtshock5', '$txtcramps5')");
		 
		 $s4=mysql_query("INSERT INTO `blood_comp5`( `id1`, `mrno`, `txturtic6`, `txtitch6`, `txtpulse6`, `txtchills6`, `txteleva6`, `txtflus6`, `txtmache6`, `txtchpain6`, `txtbkpain6`, `txtrdurine6`, `txtdurine6`, `txtpeti6`, `txtclot6`, `txtsite6`, `txtnause6`, `txtheadache6`, `txthypo6`, `txtdysp6`, `txtcyan6`, `txtcough6`, `txtvomting6`, `txtshock6`, `txtcramps6`, `txturtic7`, `txtitch7`, `txtpulse7`, `txtchills7`, `txteleva7`, `txtflus7`, `txtmache7`, `txtchpain7`, `txtbkpain7`, `txtrdurine7`, `txtdurine7`, `txtpeti7`, `txtclot7`, `txtsite7`, `txtnause7`, `txtheadache7`, `txthypo7`, `txtdysp7`, `txtcyan7`, `txtcough7`, `txtvomting7`, `txtshock7`, `txtcramps7`) 
		 VALUES ('$id', '$mrno', '$txturtic6', '$txtitch6', '$txtpulse6', '$txtchills6', '$txteleva6', '$txtflus6', '$txtmache6', '$txtchpain6', '$txtbkpain6', '$txtrdurine6', '$txtdurine6', '$txtpeti6', '$txtclot6', '$txtsite6', '$txtnause6', '$txtheadache6', '$txthypo6', '$txtdysp6', '$txtcyan6', '$txtcough6', '$txtvomting6', '$txtshock6', '$txtcramps6', '$txturtic7', '$txtitch7', '$txtpulse7', '$txtchills7', '$txteleva7', '$txtflus7', '$txtmache7', '$txtchpain7', '$txtbkpain7', '$txtrdurine7', '$txtdurine7', '$txtpeti7', '$txtclot7', '$txtsite7', '$txtnause7', '$txtheadache7', '$txthypo7', '$txtdysp7', '$txtcyan7', '$txtcough7', '$txtvomting7', '$txtshock7', '$txtcramps7')");
		//$sq=mysql_query("update patientregister set arrival_mode='$mode',ref_from='$ref',previous='$Previous' where registerno='$mr_num'");
		
		
		
		$s5=mysql_query("INSERT INTO `blood_comp6`( `id1`, `mrno`, `txturtic8`, `txtitch8`, `txtpulse8`, `txtchills8`, `txteleva8`, `txtflus8`, `txtmache8`, `txtchpain8`, `txtbkpain8`, `txtrdurine8`, `txtdurine8`, `txtpeti8`, `txtclot8`, `txtsite8`, `txtnause8`, `txtheadache8`, `txthypo8`, `txtdysp8`, `txtcyan8`, `txtcough8`, `txtvomting8`, `txtshock8`, `txtcramps8`, `txturtic9`, `txtitch9`, `txtpulse9`, `txtchills9`, `txteleva9`, `txtflus9`, `txtmache9`, `txtchpain9`, `txtbkpain9`, `txtrdurine9`, `txtdurine9`, `txtpeti9`, `txtclot9`, `txtsite9`, `txtnause9`, `txtheadache9`, `txthypo9`, `txtdysp9`, `txtcyan9`, `txtcough9`, `txtvomting9`, `txtshock9`, `txtcramps9`) VALUES
		 ('$id','$mrno','$txturtic8', '$txtitch8', '$txtpulse8', '$txtchills8', '$txteleva8', '$txtflus8', '$txtmache8', '$txtchpain8', '$txtbkpain8', '$txtrdurine8', '$txtdurine8', '$txtpeti8', '$txtclot8', '$txtsite8', '$txtnause8', '$txtheadache8', '$txthypo8', '$txtdysp8', '$txtcyan8', '$txtcough8', '$txtvomting8', '$txtshock8', '$txtcramps8', '$txturtic9', '$txtitch9', '$txtpulse9', '$txtchills9', '$txteleva9', '$txtflus9', '$txtmache9', '$txtchpain9', '$txtbkpain9', '$txtrdurine9', '$txtdurine9', '$txtpeti9', '$txtclot9', '$txtsite9', '$txtnause9', '$txtheadache9', '$txthypo9', '$txtdysp9', '$txtcyan9', '$txtcough9', '$txtvomting9', '$txtshock9', '$txtcramps9')");
		if($sq){
			print "<script>";
	print "alert('Successfully added');";
	print "self.location='blood_det.php';";
	print "</script>";
		}
		
		
		}
		?>

<style>
.text-line {
    background-color: transparent;
    color: #000;
    outline: none;
    outline-style: none;
    outline-offset: 0;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid red 1px;
    padding: 3px 10px;
	}
	

table, th 
{
  border: 1px solid #000;
  position: relative;

}

table th span {
  transform-origin: 0 50%;
  transform: rotate(-90deg); 
  white-space: nowrap; 
  display: block;
  position: absolute;
  bottom: 0;
  left: 50%;
}
</style>
		   <div id="centre" class="table-responsive" style="height:auto; min-height:450px;">
          <h1 style="color:red;" align="center">BLOOD COMPONENT DEMAND &TRANSFUSION RECORD FORM</h1>
          
                      <form name="myform" method="post" action="">
                
<div align="Center">UMR.NO:<input type="text" id="bloodmrno" onclick="window.open('finalbill_popup6k.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" name="bloodmrno"/></div>
<br/>
<table align="center" class="table">
<tr><td>M.r No.:</td>
<td>
<input type="text" class="text-line" readonly="readonly"   id="patmrno" name="patmrno"></td>
<td>Patient Name:</td>
<td>
<input type="text" id="patname"  readonly="readonly" class="text-line"  name="patname"></td></tr>
<tr>
<td>Age/Sex:</td>
<td>
<input type="text" id="patage"  readonly="readonly" class="text-line"   name="patage">/<input type="text"  readonly="readonly" id="patsex" class="text-line" style="width:60px"  name="patsex"></td>
<td>Patient No.:</td>
<td>
<input type="text" id="patno"  readonly="readonly" class="text-line"  name="patno"></td>
<td>Physician's Name:<input type="text" id="phynm"  readonly="readonly" class="text-line"  name="phynm">
</td></tr>
</table>
<br/><br/><br/>
<table  cellpadding="1" class="table" cellspacing="0" border="1px" align="center">
<tbody><tr style="background-color:#018CBE; color:#FFF;">
<td class="" colspan="2" align="center" style="font-weight:bold;">Blood Bag No. </td>
<td class="" colspan="2" align="center" style="font-weight:bold;">Blood Date&Time(starting) </td>

<tr><td colspan="2" align="center"><input type="text" placeholder="Blood bag no" name="bldbgno" id="bldbgno"class="text-line"></td>
<td  align="center"><input type="datetime-local" name="bdts"  id="bdts" class="text-line"></td>
</tr>
</table>
<br/><br/>
<table align="center" cellpadding="1" class="table" cellspacing="0" border="1px">
<tbody><tr style="background-color:#018CBE; color:#FFF;">
<td class="" colspan="1" align="center" style="font-weight:bold;">BL.Grp & Rh(D) type </td>
<td class="" colspan="2" align="center" style="font-weight:bold;">Expire Date </td>
<tr><td colspan="1"align="center" ><input type="text" name="blgrp" id="blgrp" class="text-line" placeholder="Enter BL.Grp &Rh(D) Type"></td>
<td colspan="1"align="center" ><input type="date" name="blgrped"  id="blgrped" class="text-line"></td>
<tr><td colspan="1" ><strong>PRE TRANSFUSION:</strong><input type="text" name="bldpret" id="bldpret" placeholder="Enter Pre transfusion" class="text-line"></td>
<td colspan="1"align="center" ><input type="date" name="blptred"  id="blptred" class="text-line"></td>
<tr/>
</table>
<table align="center" cellpadding="1" class="table" cellspacing="0" border="1px">
<tr><td>Temp(in F):<input type="text" name="txttemp" style="width:55px"  id="txttemp" class="text-line"></td>
<td>HR/min:<input type="text" name="txthr" style="width:55px"  id="txthr" class="text-line"></td>
<td>RR/min:<input type="text" name="txtrr" style="width:50px"  id="txtrr" class="text-line"></td>
<td>BP(in mm/Hg):<input type="text" name="txtbp" style="width:55px"  id="txtbp" class="text-line"></td>
</tr>
<table/>
<h4 align="left" style="color:#018CBE"><b><u>RECORD OF VITAL PARAMETERS </u></b></h4>
<table align="center" cellpadding="0" class="table" cellspacing="0" border="1px">
<tbody><tr style="background-color:#018CBE; color:#FFF;">
<th>Time( min)</th>
<th style="width:100px;">Actual Time</th>
<th style="width:100px;">Temp(F)</th>
<th style="width:100px;">HR(min)</th>
<th style="width:100px;">RR(min)</th>
<th style="width:100px;">BP(mm/Hg)</th>
<th>Time( min)</th>
<th style="width:100px;">Actual Time</th>
<th style="width:100px;">Temp(F)</th>
<th style="width:100px;">HR(min)</th>
<th style="width:100px;">RR(min)</th>
<th style="width:100px;">BP(mm/Hg)</th>
</tr>
<tr align="center"><td>0 <td/><input type="time" name="txtatime" id="txtatime" class="text-line">
<td><input type="text" name="txttempf" style="width:55px"  id="txttempf" class="text-line"><td/>
 <input type="text" name="txthrmin" style="width:55px"  id="txthrmin" class="text-line">
<td><input type="text" name="txtrrmin" style="width:55px"  id="txtrrmin" class="text-line"><td/>
<input type="text" name="txtbphg" style="width:55px"  id="txtbphg" class="text-line">
<td>90</td>
<td><input type="time" name="txtatime1" id="txtatime1" class="text-line"></td>
<td><input type="text" name="txttempf1" style="width:55px"  id="txttempf1" class="text-line"><td/>
 <input type="text" name="txthrmin1" style="width:55px"  id="txthrmin1" class="text-line">
<td><input type="text" name="txtrrmin1" style="width:55px"  id="txtrrmin1" class="text-line"><td/>
<input type="text" name="txtbphg1" style="width:55px"  id="txtbphg1" class="text-line">
<tr/>

<tr align="center"><td>15<td/>
<input type="time" name="txtatime2" id="txtatime2" class="text-line">
<td><input type="text" name="txttempf2" style="width:55px"  id="txttempf2" class="text-line"><td/>
 <input type="text" name="txthrmin2" style="width:55px"  id="txthrmin2" class="text-line">
<td><input type="text" name="txtrrmin2" style="width:55px"  id="txtrrmin2" class="text-line"><td/>
<input type="text" name="txtbphg2" style="width:55px"  id="txtbphg2" class="text-line">
<td>120</td>
<td><input type="time" name="txtatime3" id="txtatime3" class="text-line"></td>
<td><input type="text" name="txttempf3" style="width:55px"  id="txttempf3" class="text-line"><td/>
 <input type="text" name="txthrmin3" style="width:55px"  id="txthrmin3" class="text-line">
<td><input type="text" name="txtrrmin3" style="width:55px"  id="txtrrmin3" class="text-line"><td/>
<input type="text" name="txtbphg3" style="width:55px"  id="txtbphg3" class="text-line">
<tr/>

<tr align="center"><td>30<td/>
<input type="time" name="txtatime4" id="txtatime4" class="text-line">
<td><input type="text" name="txttempf4" style="width:55px"  id="txttempf4" class="text-line"><td/>
 <input type="text" name="txthrmin4" style="width:55px"  id="txthrmin4" class="text-line">
<td><input type="text" name="txtrrmin4" style="width:55px"  id="txtrrmin4" class="text-line"><td/>
<input type="text" name="txtbphg4" style="width:55px"  id="txtbphg4" class="text-line">
<td>180</td>
<td><input type="time" name="txtatime5" id="txtatime5" class="text-line"></td>
<td><input type="text" name="txttempf5" style="width:55px"  id="txttempf5" class="text-line"><td/>
 <input type="text" name="txthrmin5" style="width:55px"  id="txthrmin5" class="text-line">
<td><input type="text" name="txtrrmin5" style="width:55px"  id="txtrrmin5" class="text-line"><td/>
<input type="text" name="txtbphg5" style="width:55px"  id="txtbphg5" class="text-line">
<tr/>
<tr align="center"><td>45<td/>
<input type="time" name="txtatime8" id="txtatime4" class="text-line">
<td><input type="text" name="txttempf8" style="width:55px"  id="txttempf4" class="text-line"><td/>
 <input type="text" name="txthrmin8" style="width:55px"  id="txthrmin4" class="text-line">
<td><input type="text" name="txtrrmin8" style="width:55px"  id="txtrrmin4" class="text-line"><td/>
<input type="text" name="txtbphg8" style="width:55px"  id="txtbphg4" class="text-line">
<td>240</td>
<td><input type="time" name="txtatime9" id="txtatime5" class="text-line"></td>
<td><input type="text" name="txttempf9" style="width:55px"  id="txttempf5" class="text-line"><td/>
 <input type="text" name="txthrmin9" style="width:55px"  id="txthrmin5" class="text-line">
<td><input type="text" name="txtrrmin9" style="width:55px"  id="txtrrmin5" class="text-line"><td/>
<input type="text" name="txtbphg9" style="width:55px"  id="txtbphg5" class="text-line">
<tr/>
<tr align="center"><td>60<td/>
<input type="time" name="txtatime6" id="txtatime6" class="text-line">
<td><input type="text" name="txttempf6" style="width:55px"  id="txttempf6" class="text-line"><td/>
 <input type="text" name="txthrmin6" style="width:55px"  id="txthrmin6" class="text-line">
<td><input type="text" name="txtrrmin6" style="width:55px"  id="txtrrmin6" class="text-line"><td/>
<input type="text" name="txtbphg6" style="width:55px"  id="txtbphg6" class="text-line">
<td>300</td>
<td><input type="time" name="txtatime7" id="txtatime7" class="text-line"></td>
<td><input type="text" name="txttempf7" style="width:55px"  id="txttempf7" class="text-line"><td/>
 <input type="text" name="txthrmin7" style="width:55px"  id="txthrmin7" class="text-line">
<td><input type="text" name="txtrrmin7" style="width:55px"  id="txtrrmin7" class="text-line"><td/>
<input type="text" name="txtbphg7" style="width:55px"  id="txtbphg7" class="text-line">
<tr/>
<table/>
<br/><br/>
<h4 align="left" style="color:#018CBE"><b><u>RECORD OF SINGS &SYMPTOMS OF TRANSFUSION RECTION </u></b></h4>

<table align="center" cellpadding="1" class="table" cellspacing="0" border="1px">
<tbody><tr style="background-color:#018CBE; color:#FFF;">
<th style="width:70px; height: 162px;" ><span>Time(min)</span></th>
<th style="width:70px; height: 162px;" ><span>URTICARA</span></th>
<th style="width:70px; height: 162px;"><span>ITCHING</span></th>
<th style="width:70px; height: 182px;"><span>INCREASE OF PULSE</span></th>
<th style="width:70px; height: 162px;"><span>CHILLS</span></th>
<th style="width:70px; height: 170px;"><span>ELEVATED TEMP>1°F</span></th>
<th style="width:70px; height: 162px;"><span>FLUSHING</span></th>
<th style="width:70px; height: 162px;"><span>MUSCLE ACHE</span></th>
<th style="width:70px; height: 162px;"><span>CHEST PAIN</span></th>
<th style="width:70px; height: 162px;"><span>BACK PAIN</span></th>
<th style="width:70px; height: 162px;"><span>DARK OR RED URINE</span></th>
<th style="width:70px; height: 162px;"><span>DECREASED URINE)</span></th>
<th style="width:70px; height: 162px;"><span>PETICHAE</span></th>
<th style="width:70px; height: 162px;"><span>FAILURE TO CLOT</span></th>
<th style="width:70px; height: 200px;"><span>PAIN AT INFUSION SITE</span></th>
<th style="width:70px; height: 162px;"><span>NAUSEA</span></th>
<th style="width:70px; height: 162px;"><span>SEVERE HEADACHE</span></th>
<th style="width:70px; height: 162px;"><span>HYPOTENSION</span></th>
<th style="width:70px; height: 162px;"><span>DYSPNEA</span></th>
<th style="width:70px; height: 162px;"><span>CYANOSIS</span></th>
<th style="width:70px; height: 230px;"><span>COUGH,BRONCHOSPASM</span></th>
<th style="width:70px; height: 162px;"><span>VOMTING,DIARRHOEA</span></th>
<th style="width:70px; height: 162px;"><span>SHOCK</span></th>
<th style="width:70px; height: 162px;"><span>ABDOMINAL CRAMPS</span></th>
</tr>
<tr align="center"><td><b>0</b> <td/><input type="text" style="width:60px" name="txturtic" id="txturtic" class="text-line">
<td><input type="text" name="txtitch" style="width:60px"  id="txtitch" class="text-line"><td/>
 <input type="text" name="txtpulse" style="width:60px"  id="txtpulse" class="text-line">
<td><input type="text" name="txtchills" style="width:60px"  id="txtchills" class="text-line"><td/>
<input type="text" name="txteleva" style="width:60px"  id="txteleva" class="text-line">

<td><input type="text" name="txtflus" style="width:60px"  id="txtflus" class="text-line"><td/>
 <input type="text" name="txtmache" style="width:60px"  id="txtmache" class="text-line">
<td><input type="text" name="txtchpain" style="width:60px"  id="txtchpain" class="text-line"><td/>
<input type="text" name="txtbkpain" style="width:60px"  id="txtbkpain" class="text-line">

<td><input type="text" name="txtrdurine" style="width:60px"  id="txtrdurine" class="text-line"><td/>
 <input type="text" name="txtdurine" style="width:60px"  id="txtdurine" class="text-line">
<td><input type="text" name="txtpeti" style="width:60px"  id="txtpeti" class="text-line"><td/>
<input type="text" name="txtclot" style="width:60px"  id="txtclot" class="text-line">

<td><input type="text" name="txtsite" style="width:60px"  id="txtsite" class="text-line"><td/>
 <input type="text" name="txtnause" style="width:60px"  id="txtnause" class="text-line">
<td><input type="text" name="txtheadache" style="width:60px"  id="txtheadache" class="text-line"><td/>
<input type="text" name="txthypo" style="width:60px"  id="txthypo" class="text-line">

<td><input type="text" name="txtdysp" style="width:60px"  id="txtdysp" class="text-line"><td/>
 <input type="text" name="txtcyan" style="width:60px"  id="txtcyan" class="text-line">
<td><input type="text" name="txtcough" style="width:60px"  id="txtcough" class="text-line"><td/>
<input type="text" name="txtvomting" style="width:60px"  id="txtvomting" class="text-line">

<td><input type="text" name="txtshock" style="width:60px"  id="txtshock" class="text-line"><td/>
 <input type="text" name="txtcramps" style="width:60px"  id="txtcramps" class="text-line">


<tr align="center"><td><b>15</b> <td/>
<input type="text" style="width:60px" name="txturtic1" id="txturtic1" class="text-line">
<td><input type="text" name="txtitch1" style="width:60px"  id="txtitch1" class="text-line"><td/>
 <input type="text" name="txtpulse1" style="width:60px"  id="txtpulse1" class="text-line">
<td><input type="text" name="txtchills1" style="width:60px"  id="txtchills1" class="text-line"><td/>
<input type="text" name="txteleva1" style="width:60px"  id="txteleva1" class="text-line">

<td><input type="text" name="txtflus1" style="width:60px"  id="txtflus1" class="text-line"><td/>
 <input type="text" name="txtmache1" style="width:60px"  id="txtmache1" class="text-line">
<td><input type="text" name="txtchpain1" style="width:60px"  id="txtchpain1" class="text-line"><td/>
<input type="text" name="txtbkpain1" style="width:60px"  id="txtbkpain1" class="text-line">

<td><input type="text" name="txtrdurine1" style="width:60px"  id="txtrdurine1" class="text-line"><td/>
 <input type="text" name="txtdurine1" style="width:60px"  id="txtdurine1" class="text-line">
<td><input type="text" name="txtpeti1" style="width:60px"  id="txtpeti1" class="text-line"><td/>
<input type="text" name="txtclot1" style="width:60px"  id="txtclot1" class="text-line">

<td><input type="text" name="txtsite1" style="width:60px"  id="txtsite1" class="text-line"><td/>
 <input type="text" name="txtnause1" style="width:60px"  id="txtnause1" class="text-line">
<td><input type="text" name="txtheadache1" style="width:60px"  id="txtheadache1" class="text-line"><td/>
<input type="text" name="txthypo1" style="width:60px"  id="txthypo1" class="text-line">

<td><input type="text" name="txtdysp1" style="width:60px"  id="txtdysp1" class="text-line"><td/>
 <input type="text" name="txtcyan1" style="width:60px"  id="txtcyan1" class="text-line">
<td><input type="text" name="txtcough1" style="width:60px"  id="txtcough1" class="text-line"><td/>
<input type="text" name="txtvomting1" style="width:60px"  id="txtvomting1" class="text-line">

<td><input type="text" name="txtshock1" style="width:60px"  id="txtshock1" class="text-line"><td/>
 <input type="text" name="txtcramps1" style="width:60px"  id="txtcramps1" class="text-line">
<tr align="center"><td><b>30</b> <td/>
<input type="text" style="width:60px" name="txturtic2" id="txturtic2" class="text-line">
<td><input type="text" name="txtitch2" style="width:60px"  id="txtitch2" class="text-line"><td/>
 <input type="text" name="txtpulse2" style="width:60px"  id="txtpulse2" class="text-line">
<td><input type="text" name="txtchills2" style="width:60px"  id="txtchills2" class="text-line"><td/>
<input type="text" name="txteleva2" style="width:60px"  id="txteleva2" class="text-line">

<td><input type="text" name="txtflus2" style="width:60px"  id="txtflus2" class="text-line"><td/>
 <input type="text" name="txtmache2" style="width:60px"  id="txtmache2" class="text-line">
<td><input type="text" name="txtchpain2" style="width:60px"  id="txtchpain2" class="text-line"><td/>
<input type="text" name="txtbkpain2" style="width:60px"  id="txtbkpain2" class="text-line">

<td><input type="text" name="txtrdurine2" style="width:60px"  id="txtrdurine2" class="text-line"><td/>
 <input type="text" name="txtdurine2" style="width:60px"  id="txtdurine2" class="text-line">
<td><input type="text" name="txtpeti2" style="width:60px"  id="txtpeti2" class="text-line"><td/>
<input type="text" name="txtclot2" style="width:60px"  id="txtclot2" class="text-line">

<td><input type="text" name="txtsite2" style="width:60px"  id="txtsite2" class="text-line"><td/>
 <input type="text" name="txtnause2" style="width:60px"  id="txtnause2" class="text-line">
<td><input type="text" name="txtheadache2" style="width:60px"  id="txtheadache2" class="text-line"><td/>
<input type="text" name="txthypo2" style="width:60px"  id="txthypo2" class="text-line">

<td><input type="text" name="txtdysp2" style="width:60px"  id="txtdysp2" class="text-line"><td/>
 <input type="text" name="txtcyan2" style="width:60px"  id="txtcyan2" class="text-line">
<td><input type="text" name="txtcough2" style="width:60px"  id="txtcough2" class="text-line"><td/>
<input type="text" name="txtvomting2" style="width:60px"  id="txtvomting2" class="text-line">

<td><input type="text" name="txtshock2" style="width:60px"  id="txtshock2" class="text-line"><td/>
 <input type="text" name="txtcramps2" style="width:60px"  id="txtcramps2" class="text-line">
<tr align="center"><td><b>45</b> <td/><input type="text" style="width:60px" name="txturtic3" id="txturtic3" class="text-line">
<td><input type="text" name="txtitch3" style="width:60px"  id="txtitch3" class="text-line"><td/>
 <input type="text" name="txtpulse3" style="width:60px"  id="txtpulse3" class="text-line">
<td><input type="text" name="txtchills3" style="width:60px"  id="txtchills3" class="text-line"><td/>
<input type="text" name="txteleva3" style="width:60px"  id="txteleva3" class="text-line">

<td><input type="text" name="txtflus3" style="width:60px"  id="txtflus3" class="text-line"><td/>
 <input type="text" name="txtmache3" style="width:60px"  id="txtmache3" class="text-line">
<td><input type="text" name="txtchpain3" style="width:60px"  id="txtchpain3" class="text-line"><td/>
<input type="text" name="txtbkpain3" style="width:60px"  id="txtbkpain3" class="text-line">

<td><input type="text" name="txtrdurine3" style="width:60px"  id="txtrdurine3" class="text-line"><td/>
 <input type="text" name="txtdurine3" style="width:60px"  id="txtdurine3" class="text-line">
<td><input type="text" name="txtpeti3" style="width:60px"  id="txtpeti3" class="text-line"><td/>
<input type="text" name="txtclot3" style="width:60px"  id="txtclot3" class="text-line">

<td><input type="text" name="txtsite3" style="width:60px"  id="txtsite3" class="text-line"><td/>
 <input type="text" name="txtnause3" style="width:60px"  id="txtnause3" class="text-line">
<td><input type="text" name="txtheadache3" style="width:60px"  id="txtheadache3" class="text-line"><td/>
<input type="text" name="txthypo3" style="width:60px"  id="txthypo3" class="text-line">

<td><input type="text" name="txtdysp3" style="width:60px"  id="txtdysp3" class="text-line"><td/>
 <input type="text" name="txtcyan3" style="width:60px"  id="txtcyan3" class="text-line">
<td><input type="text" name="txtcough3" style="width:60px"  id="txtcough3" class="text-line"><td/>
<input type="text" name="txtvomting3" style="width:60px"  id="txtvomting3" class="text-line">

<td><input type="text" name="txtshock3" style="width:60px"  id="txtshock3" class="text-line"><td/>
 <input type="text" name="txtcramps3" style="width:60px"  id="txtcramps3" class="text-line">
<tr align="center"><td><b>60</b> <td/>
<input type="text" style="width:60px" name="txturtic4" id="txturtic4" class="text-line">
<td><input type="text" name="txtitch4" style="width:60px"  id="txtitch4" class="text-line"><td/>
 <input type="text" name="txtpulse4" style="width:60px"  id="txtpulse4" class="text-line">
<td><input type="text" name="txtchills4" style="width:60px"  id="txtchills4" class="text-line"><td/>
<input type="text" name="txteleva4" style="width:60px"  id="txteleva4" class="text-line">

<td><input type="text" name="txtflus4" style="width:60px"  id="txtflus4" class="text-line"><td/>
 <input type="text" name="txtmache4" style="width:60px"  id="txtmache4" class="text-line">
<td><input type="text" name="txtchpain4" style="width:60px"  id="txtchpain4" class="text-line"><td/>
<input type="text" name="txtbkpain4" style="width:60px"  id="txtbkpain4" class="text-line">

<td><input type="text" name="txtrdurine4" style="width:60px"  id="txtrdurine4" class="text-line"><td/>
 <input type="text" name="txtdurine4" style="width:60px"  id="txtdurine4" class="text-line">
<td><input type="text" name="txtpeti4" style="width:60px"  id="txtpeti4" class="text-line"><td/>
<input type="text" name="txtclot4" style="width:60px"  id="txtclot4" class="text-line">

<td><input type="text" name="txtsite4" style="width:60px"  id="txtsite4" class="text-line"><td/>
 <input type="text" name="txtnause4" style="width:60px"  id="txtnause4" class="text-line">
<td><input type="text" name="txtheadache4" style="width:60px"  id="txtheadache4" class="text-line"><td/>
<input type="text" name="txthypo4" style="width:60px"  id="txthypo4" class="text-line">

<td><input type="text" name="txtdysp4" style="width:60px"  id="txtdysp4" class="text-line"><td/>
 <input type="text" name="txtcyan4" style="width:60px"  id="txtcyan4" class="text-line">
<td><input type="text" name="txtcough4" style="width:60px"  id="txtcough4" class="text-line"><td/>
<input type="text" name="txtvomting4" style="width:60px"  id="txtvomting4" class="text-line">

<td><input type="text" name="txtshock4" style="width:60px"  id="txtshock4" class="text-line"><td/>
 <input type="text" name="txtcramps4" style="width:60px"  id="txtcramps4" class="text-line">
<tr align="center"><td><b>90</b> <td/>
<input type="text" style="width:60px" name="txturtic5" id="txturtic5" class="text-line">
<td><input type="text" name="txtitch5" style="width:60px"  id="txtitch5" class="text-line"><td/>
 <input type="text" name="txtpulse5" style="width:60px"  id="txtpulse5" class="text-line">
<td><input type="text" name="txtchills5" style="width:60px"  id="txtchills5" class="text-line"><td/>
<input type="text" name="txteleva5" style="width:60px"  id="txteleva5" class="text-line">

<td><input type="text" name="txtflus5" style="width:60px"  id="txtflus5" class="text-line"><td/>
 <input type="text" name="txtmache5" style="width:60px"  id="txtmache5" class="text-line">
<td><input type="text" name="txtchpain5" style="width:60px"  id="txtchpain5" class="text-line"><td/>
<input type="text" name="txtbkpain5" style="width:60px"  id="txtbkpain5" class="text-line">

<td><input type="text" name="txtrdurine5" style="width:60px"  id="txtrdurine5" class="text-line"><td/>
 <input type="text" name="txtdurine5" style="width:60px"  id="txtdurine5" class="text-line">
<td><input type="text" name="txtpeti5" style="width:60px"  id="txtpeti5" class="text-line"><td/>
<input type="text" name="txtclot5" style="width:60px"  id="txtclot5" class="text-line">

<td><input type="text" name="txtsite5" style="width:60px"  id="txtsite5" class="text-line"><td/>
 <input type="text" name="txtnause5" style="width:60px"  id="txtnause5" class="text-line">
<td><input type="text" name="txtheadache5" style="width:60px"  id="txtheadache5" class="text-line"><td/>
<input type="text" name="txthypo5" style="width:60px"  id="txthypo4" class="text-line">

<td><input type="text" name="txtdysp5" style="width:60px"  id="txtdysp5" class="text-line"><td/>
 <input type="text" name="txtcyan5" style="width:60px"  id="txtcyan5" class="text-line">
<td><input type="text" name="txtcough5" style="width:60px"  id="txtcough5" class="text-line"><td/>
<input type="text" name="txtvomting5" style="width:60px"  id="txtvomting5" class="text-line">

<td><input type="text" name="txtshock5" style="width:60px"  id="txtshock5" class="text-line"><td/>
 <input type="text" name="txtcramps5" style="width:60px"  id="txtcramps5" class="text-line">
<tr align="center"><td><b>120</b> <td/>
<input type="text" style="width:60px" name="txturtic6" id="txturtic6" class="text-line">
<td><input type="text" name="txtitch6" style="width:60px"  id="txtitch6" class="text-line"><td/>
 <input type="text" name="txtpulse6" style="width:60px"  id="txtpulse6" class="text-line">
<td><input type="text" name="txtchills6" style="width:60px"  id="txtchills6" class="text-line"><td/>
<input type="text" name="txteleva6" style="width:60px"  id="txteleva6" class="text-line">

<td><input type="text" name="txtflus6" style="width:60px"  id="txtflus6" class="text-line"><td/>
 <input type="text" name="txtmache6" style="width:60px"  id="txtmache6" class="text-line">
<td><input type="text" name="txtchpain6" style="width:60px"  id="txtchpain6" class="text-line"><td/>
<input type="text" name="txtbkpain6" style="width:60px"  id="txtbkpain6" class="text-line">

<td><input type="text" name="txtrdurine6" style="width:60px"  id="txtrdurine6" class="text-line"><td/>
 <input type="text" name="txtdurine6" style="width:60px"  id="txtdurine6" class="text-line">
<td><input type="text" name="txtpeti6" style="width:60px"  id="txtpeti6" class="text-line"><td/>
<input type="text" name="txtclot6" style="width:60px"  id="txtclot6" class="text-line">

<td><input type="text" name="txtsite6" style="width:60px"  id="txtsite6" class="text-line"><td/>
 <input type="text" name="txtnause6" style="width:60px"  id="txtnause6" class="text-line">
<td><input type="text" name="txtheadache6" style="width:60px"  id="txtheadache6" class="text-line"><td/>
<input type="text" name="txthypo6" style="width:60px"  id="txthypo6" class="text-line">

<td><input type="text" name="txtdysp6" style="width:60px"  id="txtdysp6" class="text-line"><td/>
 <input type="text" name="txtcyan6" style="width:60px"  id="txtcyan6" class="text-line">
<td><input type="text" name="txtcough6" style="width:60px"  id="txtcough6" class="text-line"><td/>
<input type="text" name="txtvomting6" style="width:60px"  id="txtvomting6" class="text-line">

<td><input type="text" name="txtshock6" style="width:60px"  id="txtshock6" class="text-line"><td/>
 <input type="text" name="txtcramps6" style="width:60px"  id="txtcramps6" class="text-line">

<tr align="center"><td><b>180</b> <td/>
<input type="text" style="width:60px" name="txturtic7" id="txturtic7" class="text-line">
<td><input type="text" name="txtitch7" style="width:60px"  id="txtitch7" class="text-line"><td/>
 <input type="text" name="txtpulse7" style="width:60px"  id="txtpulse7" class="text-line">
<td><input type="text" name="txtchills7" style="width:60px"  id="txtchills7" class="text-line"><td/>
<input type="text" name="txteleva7" style="width:60px"  id="txteleva7" class="text-line">

<td><input type="text" name="txtflus7" style="width:60px"  id="txtflus7" class="text-line"><td/>
 <input type="text" name="txtmache7" style="width:60px"  id="txtmache7" class="text-line">
<td><input type="text" name="txtchpain7" style="width:60px"  id="txtchpain7" class="text-line"><td/>
<input type="text" name="txtbkpain7" style="width:60px"  id="txtbkpain7" class="text-line">

<td><input type="text" name="txtrdurine7" style="width:60px"  id="txtrdurine7" class="text-line"><td/>
 <input type="text" name="txtdurine7" style="width:60px"  id="txtdurine7" class="text-line">
<td><input type="text" name="txtpeti7" style="width:60px"  id="txtpeti7" class="text-line"><td/>
<input type="text" name="txtclot7" style="width:60px"  id="txtclot7" class="text-line">

<td><input type="text" name="txtsite7" style="width:60px"  id="txtsite7" class="text-line"><td/>
 <input type="text" name="txtnause7" style="width:60px"  id="txtnause7" class="text-line">
<td><input type="text" name="txtheadache7" style="width:60px"  id="txtheadache7" class="text-line"><td/>
<input type="text" name="txthypo7" style="width:60px"  id="txthypo7" class="text-line">

<td><input type="text" name="txtdysp7" style="width:60px"  id="txtdysp7" class="text-line"><td/>
 <input type="text" name="txtcyan7" style="width:60px"  id="txtcyan7" class="text-line">
<td><input type="text" name="txtcough7" style="width:60px"  id="txtcough7" class="text-line"><td/>
<input type="text" name="txtvomting7" style="width:60px"  id="txtvomting7" class="text-line">

<td><input type="text" name="txtshock7" style="width:60px"  id="txtshock7" class="text-line"><td/>
 <input type="text" name="txtcramps7" style="width:60px"  id="txtcramps7" class="text-line">
</tr>
<tr align="center"><td><b>240</b> <td/>
<input type="text" style="width:60px" name="txturtic8" id="txturtic8" class="text-line">
<td><input type="text" name="txtitch8" style="width:60px"  id="txtitch8" class="text-line"><td/>
 <input type="text" name="txtpulse8" style="width:60px"  id="txtpulse8" class="text-line">
<td><input type="text" name="txtchills8" style="width:60px"  id="txtchills8" class="text-line"><td/>
<input type="text" name="txteleva8" style="width:60px"  id="txteleva8" class="text-line">

<td><input type="text" name="txtflus8" style="width:60px"  id="txtflus8" class="text-line"><td/>
 <input type="text" name="txtmache8" style="width:60px"  id="txtmache8" class="text-line">
<td><input type="text" name="txtchpain8" style="width:60px"  id="txtchpain8" class="text-line"><td/>
<input type="text" name="txtbkpain8" style="width:60px"  id="txtbkpain8" class="text-line">

<td><input type="text" name="txtrdurine8" style="width:60px"  id="txtrdurine8" class="text-line"><td/>
 <input type="text" name="txtdurine8" style="width:60px"  id="txtdurine8" class="text-line">
<td><input type="text" name="txtpeti8" style="width:60px"  id="txtpeti8" class="text-line"><td/>
<input type="text" name="txtclot8" style="width:60px"  id="txtclot8" class="text-line">

<td><input type="text" name="txtsite8" style="width:60px"  id="txtsite8" class="text-line"><td/>
 <input type="text" name="txtnause8" style="width:60px"  id="txtnause8" class="text-line">
<td><input type="text" name="txtheadache8" style="width:60px"  id="txtheadache8" class="text-line"><td/>
<input type="text" name="txthypo8" style="width:60px"  id="txthypo8" class="text-line">

<td><input type="text" name="txtdysp8" style="width:60px"  id="txtdysp8" class="text-line"><td/>
 <input type="text" name="txtcyan8" style="width:60px"  id="txtcyan8" class="text-line">
<td><input type="text" name="txtcough8" style="width:60px"  id="txtcough8" class="text-line"><td/>
<input type="text" name="txtvomting8" style="width:60px"  id="txtvomting8" class="text-line">

<td><input type="text" name="txtshock8" style="width:60px"  id="txtshock8" class="text-line"><td/>
 <input type="text" name="txtcramps8" style="width:60px"  id="txtcramps8" class="text-line">
<tr/>
<tr align="center"><td><b>300</b> <td/>
<input type="text" style="width:60px" name="txturtic9" id="txturtic9" class="text-line">
<td><input type="text" name="txtitch9" style="width:60px"  id="txtitch9" class="text-line"><td/>
 <input type="text" name="txtpulse9" style="width:60px"  id="txtpulse9" class="text-line">
<td><input type="text" name="txtchills9" style="width:60px"  id="txtchills9" class="text-line"><td/>
<input type="text" name="txteleva9" style="width:60px"  id="txteleva9" class="text-line">

<td><input type="text" name="txtflus9" style="width:60px"  id="txtflus9" class="text-line"><td/>
 <input type="text" name="txtmache9" style="width:60px"  id="txtmache9" class="text-line">
<td><input type="text" name="txtchpain9" style="width:60px"  id="txtchpain9" class="text-line"><td/>
<input type="text" name="txtbkpain9" style="width:60px"  id="txtbkpain9" class="text-line">

<td><input type="text" name="txtrdurine9" style="width:60px"  id="txtrdurine9" class="text-line"><td/>
 <input type="text" name="txtdurine9" style="width:60px"  id="txtdurine9" class="text-line">
<td><input type="text" name="txtpeti9" style="width:60px"  id="txtpeti9" class="text-line"><td/>
<input type="text" name="txtclot9" style="width:60px"  id="txtclot9" class="text-line">

<td><input type="text" name="txtsite9" style="width:60px"  id="txtsite9" class="text-line"><td/>
 <input type="text" name="txtnause9" style="width:60px"  id="txtnause9" class="text-line">
<td><input type="text" name="txtheadache9" style="width:60px"  id="txtheadache9" class="text-line"><td/>
<input type="text" name="txthypo9" style="width:60px"  id="txthypo9" class="text-line">

<td><input type="text" name="txtdysp9" style="width:60px"  id="txtdysp9" class="text-line"><td/>
 <input type="text" name="txtcyan9" style="width:60px"  id="txtcyan9" class="text-line">
<td><input type="text" name="txtcough9" style="width:60px"  id="txtcough9" class="text-line"><td/>
<input type="text" name="txtvomting9" style="width:60px"  id="txtvomting9" class="text-line">

<td><input type="text" name="txtshock9" style="width:60px"  id="txtshock9" class="text-line"><td/>
 <input type="text" name="txtcramps9" style="width:60px"  id="txtcramps9" class="text-line">
<tr/>
</table>
<div> Remarks:<input type="text" name="txtrmaks"id="txtrmaks" class="text-line"></div>
<br/>

<table  cellpadding="0" cellspacing="0" class="table">
<tr><td>Staff Nurse Name:<input type="text" name="txtstfnurname"id="txtstfnurname" class="text-line"></td>
<td>Doctor Name :<input type="text" name="txtdrname"id="txtdrname" class="text-line"></td>
</tr>

<tr><td>Staff Nurse Signature:<input type="text" name="txtstfnursign"id="txtstfnursign" class="text-line"></td>
<td>Doctor Signature:<input type="text" name="txtdrsign"id="txtdrsign" class="text-line"></td>
</tr>
</table>
<script>
$(function() {
    var header_height = 0;
    $('table th span').each(function() {
        if ($(this).outerWidth() > header_height) header_height = $(this).outerWidth();
    });

    $('table th').height(header_height);
});
</script>

<table align="center">
    
            

<tr><td colspan="2" width="400"></td><td  align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='blood_det.php'"/></td></tr></table>
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