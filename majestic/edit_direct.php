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

	</head>

	<body>
	
	<div id="conteneur">
		
	<?php
	include("logo.php");
			include("main_menu.php");
			?>
<?php
$id = $_REQUEST['id'];
$sql = mysqli_query($link,"select * from addexpenses where id=$id") or die(mysqli_error($link));
if($sql){
$row = mysqli_fetch_array($sql);

$paidto = $row['paid_to'];
$mobno = $row['mobile_no'];
$billdate = date('d-m-Y',strtotime($row['bill_date']));
$amt = $row['amount'];
$pmode = $row['pay_type'];
$towards = $row['towards'];
$bname = $row['bname'];
$chqno = $row['chq_no'];
$chqdate = $row['chq_date'];
$acno = $row['account_no'];
$amtwords = $row['amt_words'];
$expenses = $row['expense'];
}	
?>		  
		  <div id="centre">
          <h1 style="color:red;" align="center">DIRECT EXPENSES</h1>
          
<form name="myform" method="post" action="update_direct.php">
                
<table width="100%" cellspacing="10">
<input type="hidden" name="id" value="<?php echo $id ?>"/>

<input type="hidden" value="<?php echo $aname ?>" name="authby"/>

<tr> 
<td class="label1"><div align="right">Paid To : </div></td>
<td ><div align="left">
	<input name="paidto" value="<?php echo $paidto ?>" type="text" class="text"/>
</div></td>	
<td class="label1"><div align="right">Paid Date : </div></td>
<td ><div align="left">
	<input name="paid_date" type="text" class="tcal" value="<?php echo $billdate ?>" readonly style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;">
	</tr>
<tr> 
<td class="label1"><div align="right">Expense Head: </div></td>
<td ><div align="left">
	<!--<input name="towards" value="<?php echo $towards ?>" type="text" class="text"/>-->
	<select name="towards" type="text" style="width:230px;height:20px;">
	
	<?php
		$sql = mysqli_query($link,"select * from expensetype")or die(mysqli_error($link));
		if($sql){
			while($res = mysqli_fetch_array($sql)){
				$ctd=$res['id'];
	?>
	<option value="<?php echo $res['id'] ?>"  <?php if($towards==$ctd){echo 'selected';} ?>><?php echo $res['exptype'] ?></option>	
	<?php } }	?>
	</select>
</div></td>	
<td class="label1"><div align="right">Mobile No. : </div></td>
	<td ><div align="left">
		<input type="text" value="<?php echo $mobno ?>" class="text" name="mobno"/> </div>
	</td></tr>
<tr>
    <td class="label1"><div align="right">Description : </div></td>
	<td ><div align="left">
		<input type="text" value="<?php echo $expenses ?>" class="text" name="expenses"/> </div>
	</td>
   <td class="label1"><div align="right">Mode of Payment</div></td>
   <td ><div align="left">
    <?php if($pmode == "Cash"){ ?>
		<input type="radio" name="pay_type" value="Cash" onclick="javascript:card_fun(this.value)" checked />
    Cash
      
	<?php }else{ ?>
	<input type="radio" name="pay_type" value="Cash" onclick="javascript:card_fun(this.value)"  />
    Cash
      <input type="radio" name="pay_type" value="Bank" onclick="javascript:card_fun(this.value)" checked />
    Bank
	<?php } ?>
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
              <input type="text" value="<?php echo $bname ?>" name="bname" id="bname"  class="text" />
            </div></td>
			<td class="label1"><div align="right">Cheque No. </div></td>
            <td ><div align="left">
              <input type="text" value="<?php echo $chqno ?>" name="chqno" id="chqno"  class="text" value="0"/>
            </div></td>
          </tr>
		  <tr style="display:none" id="cardtr1">
            <td class="label1"><div align="right">AC No. </div></td>
            <td ><div align="left">
              <input type="text" value="<?php echo $acno ?>" name="acno" id="acno"  class="text" />
            </div></td>
			<td class="label1"><div align="right">Cheque Date </div></td>
            <td ><div align="left">
              <input type="text" name="chqdate" id="chqdate"  value="<?php echo $chqdate ?>" class="tcal" />
            </div></td>
          </tr>
          <tr>
            <td class="label1"><div align="right">Amount Paid</div></td>
            <td colspan="3"><div align="left">
                <input type="text" name="rupees" id="rupees" value="<?php echo $amt ?>" onKeyUp="return validate(document.myform.rupees.value)" class="text"/>
            </div></td>
            </tr>
          <tr>
   <td class="label1"><div align="right">Amount in Words</div></td>
   <td colspan="3"><div align="left">
     <textarea name="adv_words" cols="34" rows="3" readonly class="textarea1"><?php echo $amtwords ?></textarea>
   </div>     </td>
            

<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='direct_expenses.php'"/></td></tr></table>
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