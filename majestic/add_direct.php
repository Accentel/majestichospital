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

	</head>

	<body>
	
	<div id="conteneur">
		
	<?php
	include('config.php');
	include("logo.php");
			include("main_menu.php");
			?>

	
    <?php
$result = mysqli_query($link,"SHOW TABLE STATUS WHERE `Name` = 'addexpenses'")or die(mysqli_error($link));
$data = mysqli_fetch_assoc($result);
 $next_increment = $data['Auto_increment'];


 ?>
    	


		  <div id="centre">
          <h1 style="color:red;" align="center">ADD EXPENSES</h1>
          
<form name="myform" method="post" action="insert_direct.php">
                
<table width="100%" cellspacing="10">
<tr><td class="label1">Bill No:</td>
<td><input type="text" name="bno" value="Bill-<?php echo $next_increment ?>" class="text" readonly="readonly"/></td>

<input type="hidden" value="<?php echo $aname ?>" name="authby"/>
</tr>

<tr> 
<td class="label1"><div align="right">Paid To : </div></td>
<td ><div align="left">
	<input name="paidto" type="text" class="text"/>
</div></td>	
<td class="label1"><div align="right">Paid Date : </div></td>
<td ><div align="left">
	<input name="paid_date" type="text" class="tcal" value="<?php echo date("d-m-Y"); ?>" readonly style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;">
	</tr>
<tr> 
<td class="label1"><div align="right">Expense Head : </div></td>
<td ><div align="left">
	<!--<input name="towards" type="text" class="text"/>-->
	<select name="towards" type="text" style="width:230px;height:20px;">
	<option value="">-- Select -- </option>
	<?php
		$sql = mysqli_query($link,"select * from expensetype ")or die(mysqli_error($link));
		if($sql){
			while($res = mysqli_fetch_array($sql)){
	?>
	<option value="<?php echo $res['id'] ?>"><?php echo $res['exptype'] ?></option>	
	<?php } }	?>
	</select>
</div></td>	
<td class="label1"><div align="right">Mobile No. : </div></td>
	<td ><div align="left">
		<input type="text" class="text" name="mobno"/> </div>
	</td></tr>
<tr>
    <td  class="label1">Description:</td>
    	<td ><div align="left">
		<input type="text" class="text" name="expense"/> </div>
	</td>
    
   <td class="label1"><div align="right">Mode of Payment</div></td>
   <td ><div align="left">
        <input type="radio" name="pay_type" value="Cash" onclick="javascript:card_fun(this.value)" checked />
    Cash
     
     </div>
	</td>
	
	
	 <script>
	 function card_fun(str){
	 if(str=="Bank"){
	 document.getElementById("cardtr").style.display="";
	 document.getElementById("cardtr1").style.display="";
	 }else{document.getElementById("cardtr").style.display="none";
	 document.getElementById("cardtr1").style.display="none";
	 }
	 
	 }
	 </script>
   </tr>
          <tr style="display:none" id="cardtr">
            <td class="label1"><div align="right">Bank Name </div></td>
            <td ><div align="left">
              <input type="text" name="bname" id="bname"  class="text" />
            </div></td>
			<td class="label1"><div align="right">Cheque No. </div></td>
            <td ><div align="left">
              <input type="text" name="chqno" id="chqno"  class="text" value="0"/>
            </div></td>
          </tr>
		  <tr style="display:none" id="cardtr1">
            <td class="label1"><div align="right">AC No. </div></td>
            <td ><div align="left">
              <input type="text" name="acno" id="acno"  class="text" />
            </div></td>
			<td class="label1"><div align="right">Cheque Date </div></td>
            <td ><div align="left">
              <input type="text" name="chqdate" id="chqdate"  class="tcal" />
            </div></td>
          </tr>
          <tr>
            <td class="label1"><div align="right">Amount Paid</div></td>
            <td colspan="3"><div align="left">
                <input type="text" name="rupees" id="rupees" onKeyUp="return validate(document.myform.rupees.value)" class="text"/>
            </div></td>
            </tr>
          <tr>
   <td class="label1"><div align="right">Amount in Words</div></td>
   <td colspan="3"><div align="left">
     <textarea name="adv_words" cols="34" rows="3" readonly class="textarea1"></textarea>
   </div>     </td>
            

<tr><td colspan="4" align="center"><input type="submit" id="prt" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='direct_expenses.php'"/></td></tr></table>
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