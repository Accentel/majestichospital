<?php include('config.php');

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
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
	<?php
	include("logo.php");
			include("main_menu.php");
			?>
		  
		
  <script>
function showHint22(str)
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
	
	document.getElementById("nurcon").value=strar[1];
	
    }
  }
xmlhttp.open("GET","search4.php?q="+str,true);
xmlhttp.send();
}
</script>
<?php if(isset($_POST['submit'])){
	
	$nurname=$_POST['nurname'];
	$nurcon=$_POST['nurcon'];
	$nurplc=$_POST['nurplc'];
	$dtytiming=$_POST['dtytiming'];
	$dtyshft=$_POST['dtyshft'];
	$d=date('Y-m-d');
	$sq=mysql_query("insert into `nurs_duty` ( `name`, `mobile`, `place`, `time`, `shift`, `date`)
	values('$nurname','$nurcon','$nurplc','$dtytiming','$dtyshft','$d')");
		
		if($sq){
			print "<script>";
	print "alert('Successfully added');";
	print "self.location='int_det5.php';";
	print "</script>";
		}
	
}?>

		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">ADD NURSE DUTIES</h1>
          
                      <form name="myform" method="post" action="">
                
<table  cellpadding="5" align="center" >
<tr><td>Name of Nurse:</td>
<td><select id="nurname" name="nurname" onchange="showHint22(this.value);">
<option >Select</option>
<?php 
$sqls=mysql_query("SELECT * FROM hr_emp where dept_code='7'");
				
		
				$tot=mysql_num_rows($sqls);
				while($row=mysql_fetch_array($sqls)){
				$eid=$row['EMP_CODE'];
				 $rk=$row['EMP_NAME'];?>
<option value="<?php echo $eid?>"><?php echo $rk?></option>
<?php }?>
</select> </td>
</tr>
<tr><td>Nurse Contact No.:</td>
<td><input type="text" id="nurcon" readonly="readonly" name="nurcon"></td>
</tr>

<tr><td>Duty Place:</td>
<td><select id="nurplc" name="nurplc">
<option >Select</option>

<?php 
$sqls=mysql_query("SELECT * FROM roomtype");
				
		
				$tot=mysql_num_rows($sqls);
				while($row=mysql_fetch_array($sqls)){
				//$eid=$row['EMP_CODE'];
				 $rk=$row['ROOMTYPE'];?>
<option value="<?php echo $rk?>"><?php echo $rk?></option>
<?php }?>

</select>
 </td>
</tr>
<tr><td>Duty Timings:</td>
<td><select id="dtytiming" name="dtytiming">
<option >Select</option>
  <option value="9am6pm">9Am-6Pm</option>
<option value="11am8pm">11Am-8Pm</option> 
<option value="9am4pm">9Am-4Pm</option> 
</select></td>
</tr>
<tr><td>Duty Shifts:</td>
<td><select id="dtyshft" name="dtyshft">
<option >Select</option>
  <option value="Morning">Morning</option>
<option value="Afternoon">Afternoon</option> 
<option value="Night">Night</option> 
</select></td>
</tr>
</table>
<br/>

									<!--Treatment HISTORY Script  -->


<table align="center">
    
            

<tr><td colspan="2" width="400"></td><td  align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='int_det5.php'"/></td></tr></table>
 </form>         
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