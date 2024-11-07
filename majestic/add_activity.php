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


<script>
function card_pop(b){
	
window.open('view_in_patient_admit5.php?adv_no='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
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
//////////////////////////addrow starts//////////
function Addrow()
{
	var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;
//alert(Row);
	 var oCell = document.createElement("TD");
    oCell.innerHTML= "<div align='center' ><input  type='text' class='text' name='cost[]' id='cost"+Row+"'  /></div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='datetime-local' class='text' name='tname[]' id='cname"+Row+"' /></div>"; 
    row.appendChild(oCell);

 // document.getElementById("nitem").value=Row;

     document.getElementById("rows").value=Row;
	 //alert(Row);
//sameinvcodes(Row);
   }//addrow()


 function deleteRow(tableID) {  
    var tbl = document.getElementById('TABLE1');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows").value;
  if (lastRow > 1){ 
				  
  tbl.deleteRow(lastRow - 1);
  document.getElementById("rows").value=eval(rowss)-1;

}
  else{ alert('Please Select Row');return false;}
}

</script>	



<script>
//////////////////////////addrow starts//////////
function Addrow1()
{
	var newRow = document.getElementById("TABLE2");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;
//alert(Row);
	 var oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='date' class='text' name='tname1[]' id='ttname"+Row+"' /></div>";
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell);



	oCell = document.createElement("TD");
    oCell.innerHTML= "<div align='center' ><input  type='text' class='text' name='cost1[]' id='ttost"+Row+"'  /></div>"; 
       row.appendChild(oCell);

 // document.getElementById("nitem").value=Row;

     document.getElementById("rows1").value=Row;
	 //alert(Row);
//sameinvcodes(Row);
   }//addrow()


 function deleteRow1(tableID) {  
    var tbl = document.getElementById('TABLE2');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows1").value;
  if (lastRow > 1){ 
				  
  tbl.deleteRow(lastRow - 1);
  document.getElementById("rows1").value=eval(rowss)-1;

}
  else{ alert('Please Select Row');return false;}
}

</script>	

	</head>

	<body>
	
	<?php /*?><div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php
			include("main_menu.php");
			?><?php */?>
		  
			  
		


		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">ADD ACTIVITY CHART</h1>
          
                      <form name="myform" method="post" >
                
<table width="100%" cellspacing="10">

<!--
<tr>
<input type="hidden" value="<?php echo $aname ?>" name="authby" onchange="showHint52(this.value);"/>
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="mrnum1" id="reg" class="text"  onclick="window.open('finalbill_popup2.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" />
</td><td>Patient Name. <font color="red">*</font> : 
<input type="text" name="pname" id="pname" class="text" /></td></tr>-->


<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->
<!--<table align="center">
<tr><td>UMR.NO:<input type="text"  name="txtmrno" id="mrno"></td><td>Date:<input type="date"  name="txtmrno" id="mrno"></td></tr>	
<table/>--></tr></table></form>
<br/><?php /*
<?php //if(isset($_POST['sub'])){
	 //$mrnum1=$_POST['mrnum1'];
//} else {
	//$mrnum1=$_GET['krb'];}
?>$sql1=mysql_query("select * from `casesheet_activity` where mrnum='$mrnum1'");
while($r=mysql_fetch_array($sql1)){
	$txtmsrtime=$r['txtmsrtime'];
	$txtmendtime=$r['txtmendtime'];
	$txtmsrtime1=$r['txtmsrtime1'];
	$txtmendtime1=$r['txtmendtime1'];
	$txtmsrtime2=$r['txtmsrtime2'];
	$txtmendtime2=$r['txtmendtime2'];
	$txtmsrtime3=$r['txtmsrtime3'];
	$txtmendtime3=$r['txtmendtime3'];
	$txtmsrtime4=$r['txtmsrtime4'];
	$txtmendtime4=$r['txtmendtime4'];
	$txtmsrtime5=$r['txtmsrtime5'];
	$txtmendtime5=$r['txtmendtime5'];
	$txtmsrtime6=$r['txtmsrtime6'];
	$txtmendtime6=$r['txtmendtime6'];
	$txtmsrtime7=$r['txtmsrtime7'];
	$txtmendtime7=$r['txtmendtime7'];
	 $txtadmindt1=$r['txtadmindt1'];
	$txtdr1name=$r['txtdr1name'];
	$txtdr2name=$r['txtdr2name'];
	$txtadmindt2=$r['txtadmindt2'];
	$txtdr3name=$r['txtdr3name'];
	$txtadmindt3=$r['txtadmindt3'];
	$txtcasua=$r['txtcasua'];
	$txtadminicu=$r['txtadminicu'];
	$txtdiradmin=$r['txtdiradmin'];
	$mrnum=$r['mrnum'];
	$id=$r['id'];
	
	
}?>
<?php */?>

<form name="myform" method="post" action="act_suc.php">


<table   align="center">
<?php /*?><input type="hidden" name="mrnum" value="<?php echo $mrnum1?>" id="reg" class="text" /><?php */?>
<tr>
<td align="center" style="color:red"><b>INSTRUMENTS</b></td>

</tr>




<?php $krb=$_GET['krb'];
if($krb!=''){
	$ss=mysql_query("select * from patientregister where registerno='$krb'");
	while($r=mysql_fetch_array($ss)){
		$nm=$r['patientname'];
		$gen=$r['gender'];
		$ag=$r['gender'];
		}?>
<input type="hidden" value="<?php echo $aname ?>" name="authby" onchange="showHint52(this.value);"/>
<tr><td class="label1">Patient UUMR No. <font color="red">*</font> : </td>
<td><input type="text" name="mrnum" id="reg" class="text"  value="<?php echo $krb?>"  readonly="readonly" />
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
<td><input type="text" name="mrnum" id="reg" class="text"  onclick="window.open('finalbill_popup6.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" />
Patient Name. <font color="red">*</font> : 
<input type="text" name="pname" id="pname" class="text" /></td></tr>
<tr>
<td class="label1">Gender <font color="red">*</font> : </td>
<td><input type="text" name="gender" value="" id="gender" readonly="readonly" class="text" readonly="readonly" />
Age <font color="red">*</font> : 
<input type="text" name="age" value="" readonly="readonly" id="age" class="text" /></td>
</tr>
<?php }?>
<tr ><th>Monitor</th>
<td><select id="moniter" name="moniter">
<option >Select</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="datetime-local" id="monitrst" name="txtmsrtime" value="" style="display: none;">
<input type="datetime-local" id="monitret" onkeyup="sum();" name="txtmendtime" value="" style="display: none;">
<input type="text" id="moitrcount" name="txtmoitrcount" value="" style="display: none;" placeholder="Total">
</td>
<tr>
<tr><th>Ventilator</th>
<td><select id="ventilator" name="ventilator">
<option >Select</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="datetime-local" id="ventist" name="txtmsrtime1" value="" style="display: none;">
<input type="datetime-local" id="ventiet" name="txtmendtime1" value="" style="display: none;">
<input type="text" id="venticount" name="txtventicount" value="" style="display: none;" placeholder="Total">
</td>
<tr>

<tr><th>Pulse Oxymeter</th>
<td><select id="pulse" name="pulse">
<option >Select</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="datetime-local" id="pulsest" name="txtmsrtime2" value="" style="display: none;">
<input type="datetime-local" id="pulseet" name="txtmendtime2" value="" style="display: none;">
<input type="text" id="pulsecount" name="txtpulsecount" value="" style="display: none;" placeholder="Total">
</td>

<tr>

<tr><th>Nebulizer</th>
<td><select id="nebulizer" name="nebulizer">
<option >Select</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="datetime-local" id="nebulizerst" name="txtmsrtime3" value="" style="display: none;">
<input type="datetime-local" id="nebulizeret" name="txtmendtime3" value="" style="display: none;">
<input type="text" id="nebulizercount" name="txtnebulizercount" value="" style="display: none;" placeholder="Total">
</td><tr>

<tr><th>Syringe Pump</th>
<td><select id="syringe" name="syringe">
<option >Select</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="datetime-local" id="syringest" name="txtmsrtime4" value="" style="display: none;">
<input type="datetime-local" id="syringeet" name="txtmendtime4" value="" style="display: none;">
<input type="text" id="syringecount" name="txtsyringecount" value="" style="display: none;" placeholder="Total">
</td>
<tr>

<tr><th>C.Pap</th>
<td><select id="cpap" name="cpap">
<option >Select</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="datetime-local" id="cpapst" name="txtmsrtime5" value="" style="display: none;">
<input type="datetime-local" id="cpapet" name="txtmendtime5" value="" style="display: none;">
<input type="text" id="cpapcount" name="txtcpapcount" value="" style="display: none;" placeholder="Total">
</td>
<tr>

<tr><th>Oxygen</th>
<td><select id="oxygen" name="oxygen">
<option >Select</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="datetime-local" id="oxygenst" name="txtmsrtime6" value="" style="display: none;">
<input type="datetime-local" id="oxygenet" name="txtmendtime6" value="" style="display: none;">
<input type="text" id="oxygencount" name="txtoxygencount" value="" style="display: none;" placeholder="Total">
</td>
<tr>

<tr style="display:none"><th>Glucosticks</th>
<td><select id="gluco" name="gluco">
<option >Select</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="datetime-local" id="glucost" name="txtmsrtime7" value="" style="display: none;">
<input type="datetime-local" id="glucoet" name="txtmendtime7" value="" style="display: none;">
<input type="text" id="glucocount" name="txtglucocount" value="" style="display: none;" placeholder="Total">
</td></tr>
<tr></table>
<br>



<table width="100%" id="expense_table1" align="center">
<div style="color:red" align="center"><b><u>Glucosticks</u></b></div>
                    <tr><td width="100%" align="center">
					<table width="100%" id="TABLE2">
					  <thead>
						 <tr>
					   
					   <th width="50%" class="TH1">Date </th>
					  
                       <th width="50%" class="TH1">Total</th>
					   </tr>
					   </thead></table>
            
                        </td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  +  " onClick="javascript:Addrow1()"/></td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  -  " onClick="javascript:deleteRow1()"/></td>
					  </tr></table>
                     <input type="hidden" name="rows1" id="rows1" value="10" />


<table width="100%" id="expense_table" align="center">
                    <tr><td width="100%" align="center">
					<table width="100%" id="TABLE1">
					  <thead>
						 <tr>
					   
					   <th width="50%" class="TH1">Name of the Doctor </th>
					   <th width="50%" class="TH1">Visiting Date & Time</th>
					   </tr>
					   </thead></table>
            
                        </td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  +  " onClick="javascript:Addrow()"/></td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  -  " onClick="javascript:deleteRow()"/></td>
					  </tr></table>
                     <input type="hidden" name="rows" id="rows" value="10" />


<?php /*?>


<table   align="center">
<tr>
<!--<td align="center" style="color:red"><b>S.no</b></td>-->
<td align="center" style="color:red"><b>Name of the Doctor</b></td>
<td align="center" style="color:red"><b>Visiting Date & Time</b></td>
</tr>
<tr><td colspan="3"></td> <td valign="top" ><input name="new" type="button" height="30px" class="butnbg1" value="  +  " onClick="javascript:Addrow()"/></td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  -  " onClick="javascript:deleteRow()"/></td>
					 </tr>
<tr><th>1</th>
<td><input type="text"  name="txtdr1name" value="<?php echo $txtdr1name?>" id="drname1"></td>
<td>
<?php if($txtadmindt1!=''){?>
<input type="text"  name="txtadmindt1" value="<?php echo $txtadmindt1?>" id="admindt1">
<?php } else {?>
<input type="datetime-local"  name="txtadmindt1"  id="admindt1"><?php }?>
</td>
</tr>

<tr ><th>2</th>
<td><input type="text"  name="txtdr2name" value="<?php echo $txtdr2name?>" id="drname2"></td>
<td>
<?php if($txtadmindt2!=''){?>
<input type="text"  name="txtadmindt2" value="<?php echo $txtadmindt2?>" id="admindt2">
<?php } else {?>
 <input type="datetime-local"  name="txtadmindt2" value="" id="admindt2">
 <?php }?>
</td>
</tr>

<tr ><th>3</th>
<td><input type="text"  name="txtdr3name" id="drname3" value="<?php echo $txtdr3name?>"></td>
<td>
<?php if($txtadmindt3!=''){?>
<input type="text"  name="txtadmindt3" value="<?php echo $txtadmindt3?>" id="admindt3">
<?php } else {?>
<input type="datetime-local"  name="txtadmindt3" value="" id="admindt3">
<?php }?>

</td>
</tr>
<table width="100%" id="TABLE1">
<tr><td></td></tr></table>

</table><?php */?>
<br/>
<div style="color:red" align="center"><b><u>ADMISSION</u></b></div>
<br/>
<table  border="1px" align="center">

<tr ><th>Tr. in from Casuality:</th>
<td>
<?php if($txtcasua!=''){?>
<input type="text"  name="txtcasua" value="<?php echo $txtcasua?>" id="casua">
<?php } else {?>
<input type="datetime-local"  name="txtcasua" value="" id="casua">
<?php }?> 
</td>

<tr/>
<tr ><th>Admission ICU's</th>
<td>

<?php if($txtadminicu!=''){?>
<input type="text"  name="txtadminicu" value="<?php echo $txtadminicu?>" id="adminicu">

<?php } else {?>
<input type="datetime-local"  name="txtadminicu"  id="adminicu">
<?php }?>
</td>
<tr/>

<tr ><th>Direct Admission</th>
<td>
<?php if($txtdiradmin!=''){?>
<input type="text"  name="txtdiradmin" value="<?php echo $txtdiradmin?>" id="diradmin">
<?php } else {?>
<input type="datetime-local"  name="txtdiradmin" id="diradmin">
<?php }?>
</td>
<tr/>

</table>
<table align="center">
    
            

<tr><td colspan="2" width="400"></td><td  align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='int_det4.php'"/></td>
<td><!--<a onclick="javascript:card_pop('<?php echo $mrnum?>')"><img src="images/print.png" /></a>--></td>
</tr></table>
 </form>         
		       </div>
<script>        
                                       
									  
    $('#moniter').change(function () {
    var myValue = $(this).val();
    var myText = $("#moniter :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#monitrst").show();
		 $("#monitret").show();
		$("#moitrcount").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#monitrst").hide();
		 $("#monitret").hide();
		$("#moitrcount").hide();
    }
});
 $('#ventilator').change(function () {
    var myValue = $(this).val();
    var myText = $("#ventilator :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#ventist").show();
		 $("#ventiet").show();
		$("#venticount").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#ventist").hide();
		 $("#ventiet").hide();
		$("#venticount").hide();
    }
});

 $('#pulse').change(function () {
    var myValue = $(this).val();
    var myText = $("#pulse :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#pulsest").show();
		 $("#pulseet").show();
		$("#pulsecount").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#pulsest").hide();
		 $("#pulseet").hide();
		$("#pulsecount").hide();
    }
});
 $('#nebulizer').change(function () {
    var myValue = $(this).val();
    var myText = $("#nebulizer :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#nebulizerst").show();
		 $("#nebulizeret").show();
		$("#nebulizercount").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#nebulizerst").hide();
		 $("#nebulizeret").hide();
		$("#nebulizercount").hide();
    }
});
 $('#syringe').change(function () {
    var myValue = $(this).val();
    var myText = $("#syringe :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#syringest").show();
		 $("#syringeet").show();
		$("#syringecount").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#syringest").hide();
		 $("#syringeet").hide();
		$("#syringecount").hide();
    }
});
 $('#cpap').change(function () {
    var myValue = $(this).val();
    var myText = $("#cpap :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#cpapst").show();
		 $("#cpapet").show();
		$("#cpapcount").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#cpapst").hide();
		 $("#cpapet").hide();
		$("#cpapcount").hide();
    }
});
 $('#oxygen').change(function () {
    var myValue = $(this).val();
    var myText = $("#oxygen :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#oxygenst").show();
		 $("#oxygenet").show();
		$("#oxygencount").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#oxygenst").hide();
		 $("#oxygenet").hide();
		$("#oxygencount").hide();
    }
});

$('#gluco').change(function () {
    var myValue = $(this).val();
    var myText = $("#gluco :selected").text();

    if (myText != '' && myText === "Yes") {
        $("#glucost").show();
		 $("#glucoet").show();
		$("#glucocount").show();
    }
	if(myText != '' && myText === "No")
	{
        $("#glucost").hide();
		 $("#glucoet").hide();
		$("#glucocount").hide();
    }
});







function sum1() {
	var startdate=document.getElementById('monitrst').value;
	//alert(startdate);
	var enddate=document.getElementById('monitret').value;
	var diff = moment.duration(moment(enddate).diff(moment(startdate)));
	//var diff = new Date(enddate - startdate);
	 document.getElementById('moitrcount').value = diff;
	

}

</script> 

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>