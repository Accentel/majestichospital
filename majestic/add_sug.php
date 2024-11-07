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



<script>
function sc_report(str)
{
document.getElementById("sc_abc").value=str;
}
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
    oCell.innerHTML= "<div align='center' ><input  type='datetime-local' class='text' name='tname[]' id='cname"+Row+"' /></div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' class='text' name='cost[]' id='cost"+Row+"'  /> </div>"; 
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
	</head>
	
	<body>
	
<?php /*?>	<div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php
			include("main_menu.php");
			?><?php */?>
		


		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">ADD SUGAR CHART</h1>
          

          
          
          
        
          
                      <form name="myform" method="post" action="insert_sugar.php">
                
<table width="100%" cellspacing="10">

<!--<tr>
<input type="hidden" value="<?php echo $aname ?>" name="authby" onchange="showHint52(this.value);"/>
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="reg" class="text"  onclick="window.open('finalbill_popup2.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" />
Patient Name. <font color="red">*</font> : 
<input type="text" name="pname" id="pname" class="text" /></td></tr>-->
<?php /*?>

<?php $krb=$_GET['krb'];
if($krb!=''){
	$ss=mysql_query("select * from patientregister where registerno='$krb'");
	while($r=mysql_fetch_array($ss)){
		$nm=$r['patientname'];}?>
<input type="hidden" value="<?php echo $aname ?>" name="authby" onchange="showHint52(this.value);"/>
<tr><td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="reg" class="text"  value="<?php echo $krb?>"  readonly="readonly" />
Patient Name. <font color="red">*</font> : 
<input type="text" name="pname" value="<?php echo $nm?>" id="pname" class="text" /></td></tr>
<?php } else{?>
<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="reg" class="text"  onclick="window.open('finalbill_popup2.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" />
Patient Name. <font color="red">*</font> : 
<input type="text" name="pname" id="pname" class="text" /></td></tr><?php }?><?php */?>





<?php $krb=$_GET['krb'];
if($krb!=''){
	$ss=mysql_query("select * from patientregister where registerno='$krb'");
	while($r=mysql_fetch_array($ss)){
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

<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->
<!--<table align="center">
<tr><td>UMR.NO:<input type="text"  name="txtmrno" id="mrno"></td><td>Date:<input type="date"  name="txtmrno" id="mrno"></td></tr>	
<table/>--></tr></table>


          
          
           <table width="100%" id="expense_table">
                    <tr><td width="100%" align="center">
					<table width="100%" id="TABLE1">
					  <thead>
						 <tr>
					   
					   <th width="50%" class="TH1">Date Time </th>
					   <th width="50%" class="TH1">Blood Sugar</th>
					   </tr>
					   </thead></table>
            
                        </td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  +  " onClick="javascript:Addrow()"/></td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  -  " onClick="javascript:deleteRow()"/></td>
					  </tr></table>
                     <input type="hidden" name="rows" id="rows" value="10" />






									<!--Treatment HISTORY Script  -->


<table align="center">
    
            

<tr><td colspan="2" width="400"></td><td  align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='int_det6.php'"/></td>
<td><!--<a onclick="javascript:card_pop('<?php echo $mrnum?>')"><img src="images/print.png" /></a>--></td>
</tr></table>
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

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>