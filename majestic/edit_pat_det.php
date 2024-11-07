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
	</head>

	<body>
	
	<?php /*?><div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php
			include("main_menu.php");
			?><?php */?>
		  
		

<?php 
$id=$_REQUEST['id'];
$c=mysql_query("select * from patientregister where reg_id='$id'");
while($r=mysql_fetch_array($c)){
	$r1=$r['registerno'];
}
$sq=mysql_query("select M.registerno,M.reg_id,A.PAT_REGNO,A.ADMIT_DATE,M.patientname,M.arrival_mode,k.ref_docname,M.phoneno,M.age,M.gender,M.address
 from ip_pat_admit as A,patientregister as M,referal_doctor as k WHERE  A.PAT_REGNO=M.registerno  and M.registerno = '$r1' and M.ref_doc=k.refcode");
while($r=mysql_fetch_array($sq)){
$reg=$r['registerno'];	
$patientname=$r['patientname'];
$phone=$r['phoneno'];
$age=$r['age'];
$gender=$r['gender'];
$addr=$r['address'];
$previous1=$r['previous'];
$ref_from1=$r['ref_docname'];
$arrival_mode1=$r['arrival_mode'];
$ADMIT_DATE=$r['ADMIT_DATE'];
	
}
?>

		  <div id="centre">
          <h1 style="color:red;" align="center">EDIT PATIENT DETAILS</h1>
          
                      <form name="myform" method="post" action="">
                
<table width="100%" cellspacing="10">

<tr>
<input type="hidden" value="<?php echo $aname ?>" name="authby"/>
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="regno" value="<?php echo $reg?>" class="text" readonly /></td>

<input type="hidden" name="mr_num" id="mr_num" />
<td class="label1">Patient Name <font color="red">*</font> : </td>
<td><input type="text" name="pname" value="<?php echo $patientname?>" id="patname" class="text" required="required" readonly /></td></tr>
<tr>
<td class="label1">Admit Date <font color="red">*</font> : </td>
<td width="25%">

<input name="admitdate"  value="<?php echo $ADMIT_DATE?>" id="admit_date" style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;" type="text" class="tcal" size="20" readonly /> 
		 
</td>
<td class="label1">Mobile<font color="red">*</font> : </td>
<td width="25%">

<input name="mobile" value="<?php echo $phone?>" id="mobile"  type="text" class="text" size="20" readonly /> 
		 
</td>
</tr>

<tr>
<td class="label1">Age <font color="red">*</font> : </td><td>
<input type="text" class="text" name="age" id="age" value="<?php echo $age?>" required="required" readonly /></td>
<td class="label1">Gender <font color="red">*</font> : </td><td>
<input type="text" required="required" value="<?php echo $gender?>" name="sex" id="gender" class="text" readonly /></td>

</tr>

     <td class="label1">Address <font color="red">*</font> : </td><td> 
     <textarea name="addr" id="addr" cols="34" rows="3" readonly class="textarea1"><?php echo $addr?></textarea></td>

   <td class="label1">Previous Admission <font color="red">*</font> : </td><td colspan="1">
<select name="Previous" class="text"  required style="width:210px; height:20px;">
<?php if($previous1!=''){?>
<option value="<?php echo $previous1?>"><?php echo $previous1?></option><?php } else{?>
<option value="">Previous Admission</option><?php }?>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>

</td>
    </tr>
        
<tr>
<td class="label1">Arrival Mode <font color="red">*</font> : </td><td colspan="1">
<select name="mode" class="text" style="width:210px; height:20px;" required>
<?php if($arrival_mode1!=''){?>
<option value="<?php echo $arrival_mode1?>"><?php echo $arrival_mode1?></option><?php } else{?>
<option value="">Arrival Mode</option><?php }?>

<option value="Ambulance">Ambulance</option>
<option value="Public Transport">Public Transport</option>
</select>

</td>
<td class="label1">Refferal Doctor <font color="red">*</font> : </td><td colspan="1">
<select name="ref" class="text" style="width:210px; height:20px;" required>

<?php if($ref_from1!=''){?>
<option value="<?php echo $ref_from1?>"><?php echo $ref_from1?></option><?php } else{?>
<option value="">Refferal From</option><?php }?>

<?php 

$sq=mysql_query("select * from  referal_doctor");
if($sq){
while($row=mysql_fetch_array($sq)){

$ref_docname=$row['ref_docname'];
$refcode=$row['refcode'];
?>
<option value="<?php echo $refcode; ?>"><?php echo $ref_docname; ?></option>
<?php } } ?>

</select>

</td>

</tr>
 


         
            

<tr><td colspan="4" align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='pat_det.php'"/></td></tr></table>
 </form>         
		       </div>
               
               <?php 
		if(isset($_POST['submit'])){
		$mr_num=$_POST['rnum'];
		$Previous=$_POST['Previous'];
		$mode=$_POST['mode'];
		//$ref=$_POST['ref'];
		$sq=mysql_query("update patientregister set arrival_mode='$mode',previous='$Previous' where registerno='$mr_num'");
		
		if($sq){
			print "<script>";
	print "alert('Successfully added');";
	print "self.location='add_pat_det.php?krb=$mr_num';";
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