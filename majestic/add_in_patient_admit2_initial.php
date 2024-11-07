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

<script>
function showHint2(str)
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
	document.getElementById("roomsno").value=strar[1];
	document.getElementById("roomrents").value=strar[2];
	
	
	
    }
  }
xmlhttp.open("GET","set12.php?q="+str,true);
xmlhttp.send();
}
</script>
	</head>

	<body>
	
	<div id="conteneur">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
<?php */?>	<?php
include("logo.php");
			include("main_menu.php");
			?>
		  
		<?php
			include("config.php");
//$abc=$_GET['id'];


	
	$abc=mysql_query("select max(PAT_ID)+0 from ip_pat_admit");
	$row1=mysql_fetch_array($abc);
	
	

if($query = true){
//echo "inserted";
}
else
{
echo "allredy exit";

}
?>
<script type="text/javascript">
tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();
mnt=nmonth+1;

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('intime').value=""+nhour+":"+nmin+":"+nsec+ap+"";
//document.getElementById('outtime').value=" "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;

</script>


		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">IN PATIENT ADMISSION</h1>
           <?php
		  $id=$_REQUEST['id'];
		  $q=mysql_query("select * from patientregister where reg_id='$id'") or die(mysql_error());
		  $rs=mysql_fetch_array($q);
		  $mrno=$rs['registerno'];
		  $patientname=$rs['patientname'];
		  $gender=$rs['gender'];
		  $age=$rs['age'];
		  $registerdate=$rs['registerdate'];
		  
		  
		  ?>
                      <form name="myform" method="post" action="insert_in_patient.php">
                
<table width="100%" cellspacing="10">

<tr>
<input type="hidden" name="patno" value="<?php echo "PAT-".($row1[0]+101)?>"/>
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" class="text" value="<?php echo $mrno; ?>" onclick="javascript:window.open('patient_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')" id="regno" readonly /></td>
<td class="label1">Registration Date : </td><td><input name="ApplicationDeadline1" id="regdate" style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;" type="text" class="tcal" size="20"  readonly value="<?php echo date('d-m-Y',strtotime($registerdate)) ; ?>"  /></td>
</tr>
<tr>
<td class="label1">Admit Date / Time <font color="red">*</font> : </td>
<td width="25%"><input name="admitdate" style="padding-left:2px;width:107px;height:20px;border:1px solid #840204;" type="text" class="tcal" size="20"  readonly value="<?php
			  echo $today = date("d-m-Y");  ?>" /> 
			  
			   <input name="time" id="intime" readonly="readonly" style="padding-left:2px;width:110px;height:20px;border:1px solid #840204;" type="text"   size="20"  />
            
			  <?php /*?><input name="time" type="text" style="height:20px;border:1px solid #840204;"size="6" Placeholder="HH:MM"/>
			  <select name="time1" style="height:22px;border:1px solid #840204;" >
      
                  <option value="PM">PM </option>
                  <option value="AM">AM </option>
                </select><?php */?>
			  </td>
<td class="label1">Doctor Name <font color="red">*</font> : </td>
<td>
<select name="docname" style="width:230px;height:20px;" required >
<option value=""> -- Select Doctor Name -- </option>
<?php
	include("config.php");
	
	$sql = mysql_query("select * from doct_infor");
	if($sql)
	{
		while($row = mysql_fetch_array($sql))
		{
			$did = $row['id'];
			$dname = $row['dname1'];
?>
<option value="<?php echo $did ?>"><?php echo $dname ?></option>
<?php
		}
	}	
?>
</select>
</td>
</tr>

<tr>
<td class="label1">Patient Name : </td>
<td><input type="text" name="pname" id="patname" class="text" readonly value="<?php echo $patientname; ?>" /></td>
<td class="label1">Age : </td><td><input type="text" class="text" name="age" id="age" readonly value="<?php echo $age; ?>" /></td>
</tr>
<tr style="display:none">
<td class="label1" ><div align="right">Diet : </div></td>
  <td > <input type="radio" name="Diet" id="Diet" value="yes" onclick="Diet_fun(this.value)" checked="checked"/>  Yes      <input type="radio" name="Diet" id="Diet" value="no" onclick="Diet_fun(this.value)"  checked="checked"/>  No </td>
	<script>
  function Diet_fun(str){
  if(str=="yes"){
  document.getElementById("diet2").style.display="";
  }
  else if(str=="no"){
	document.getElementById("diet2").style.display="none";
			  }
  }
  </script>
  <td class="label1"><!--Gender : </td><td><input type="text" class="text" name="sex" id="gen1" readonly />--> </td>

</tr>
<tr id="diet2" style="display:none">
  <td class="label1" ><div align="right">Diet Cost : </div></td>
  <td colspan="3" align="left"><span class="label1">
	<input name="diet_cost" type="text" id="diet_cost" class="text" />
  </span></td>
</tr>
<?php
$sql1 = mysql_query("select CONCE_CODE, CONCE_NAME from concession_type");

?>
<tr>
  <td class="label1" ><div align="right">Mode Of Payment : </div></td>
  <td > <input type="radio" name="pat_type" id="pat_type" value="cash" onclick="conc_fun(this.value)" checked="checked"/>
   Self &nbsp;&nbsp;<input type="radio" name="pat_type" id="pat_type" value="credit" onclick="conc_fun(this.value)"/> Cash less
    </td>
    <td class="label1">Gender : </td><td><input type="text" class="text" name="sex" id="gen1" readonly value="<?php echo $gender; ?>" /> </td>
  <script>
  function conc_fun(str){
  if(str=="cash"){
  document.getElementById("cons1").style.display="none";
  document.getElementById("advcol").style.display="";
  }
  else if(str=="credit"){
  document.getElementById("cons1").style.display="";
  document.getElementById("advcol").style.display="none";
  }
  }
  </script>
  <script>
function funconce(str){

	if(str == "4"){
	//alert(str);
		document.getElementById("insu1").style.display='';
	}else{
		document.getElementById("insu1").style.display='none';
	}
}
</script>
</tr>
<tr id="cons1" style="display:none;">
  <td height="36" class="label1" ><div align="right">Payment Type : </div></td>
  <td ><select name="conce_type" id="conce_type" style="width:230px;height:20px;" onchange="funconce(this.value);">
	<option value="">Select Type</option>
	<?php
	if($sql1)
	{
		while($row1 = mysql_fetch_array($sql1))
		{
			
	?>
	<option value="<?php echo $row1[0]?>"><?php echo $row1[1]?></option>
	<?php
		}
	}
	?>
	</select>	
	</td>

  <td class="label1" ><div align="right">Card No : </div></td>
  <td ><span class="label1">
	<input name="conce_card" id="conce_card" type="text" class="text" />
  </span></td>
</tr>
<tr id="insu1" style="display:none;">
<td class="label1" >
	<div align="right">Insurance Type : </div>
	</td>
	<td >
	<span class="label1">
	<select style="width:230px;height:20px;" name="insutype" id="insutype" >
	<option value=""> -- Select -- </option>
	<option value="United Health Care India Pvt Ltd">United Health Care India Pvt Ltd</option>
	<option value="Paramount TPA">Paramount TPA</option>
	<option value="GHPL">GHPL</option>
	<option value="FHPL">FHPL</option>
	<option value="Medi Assist">Medi Assist</option>
	<option value="Bajaj Allianz TPA">Bajaj Allianz TPA</option>
	<option value="Vidal Health Care TPA(TTK)">Vidal Health Care TPA(TTK)</option>
	<option value="Star Health and Allied Insurance">Star Health and Allied Insurance</option>
	<option value="ICICI Lombard">ICICI Lombard</option>
	<option value="MD India">MD India</option>
	<option value="Heritage">Heritage</option>
	<option value="Emeditek TPA">Emeditek TPA</option>
	<option value="HDFC Ergo General Insurance">HDFC Ergo General Insurance</option>
	<option value="Raksha TPA">Raksha TPA</option>
	<option value="Medicare TPA">Medicare TPA</option>
	<option value="Health India">Health India</option>
	<option value="Future Generali India Insurance">Future Generali India Insurance</option>
	<option value="Max Bupa Health Insurance">Max Bupa Health Insurance</option>
	<option value="Alankit">Alankit</option>
	<option value="DHS-Dedicated Health Care Services">DHS-Dedicated Health Care Services</option>
	<option value="Genins TPA">Genins TPA</option>
	<option value="Appolo Munich Health Insurance">Appolo Munich Health Insurance</option>
	<option value="Spurthi Meditech">Spurthi Meditech</option>
	<option value="Vipul Ned Corp">Vipul Ned Corp</option>
	<option value="ReliGare Health Insurance">ReliGare Health Insurance</option>
	<option value="Anyuta">Anyuta</option>
	<option value="Universal Sompo General Insurance Company">Universal Sompo General Insurance Company</option>
	<option value="Reliance Health Insurance">Reliance Health Insurance</option>
	</select>
    </span>
  </td>
</tr>	
<tr>
  <td class="label1" ><div align="right"> Bed No : </div></td>
  <td colspan="3" align="left">
  <select name="bedsno" id="bedsno" style="width:230px;height:20px;" onchange="showHint2(this.value)" required>
  <option value=""> -- Select -- </option>
  <?php
	include("config.php");
	
	$sql = mysql_query("select BED_NO from bed_details where bed_status='Unreserved'");
	if($sql)
	{
		while($row = mysql_fetch_array($sql))
		{
  ?>
  <option value="<?php echo $row['BED_NO'] ?>"><?php echo $row['BED_NO'] ?></option>
  <?php
	}
	}
  ?>
  </select>
	  </td>
</tr>
<tr>
<td class="label1" >Room No :</td>
 <td><input name="roomsno" type="text" class="text" size="8" id="roomsno" readonly="readonly"/></td>
<td class="label1" >Room Rent</td>             
    <td><input name="roomrents" type="text" class="text"  id="roomrents" readonly="readonly" size="8" /></td>
</tr>
            <tr>
              <td class="label1" ><div align="right"> Admission Charge : </div></td>
              <td width="13%" align="left"><input name="adm_fee" type="text" class="text"  size="10" value="300"/></td>
              <td width="14%" class="label1" ><!--<div align="right">Concession : </div>--></td>
              <td width="45%" align="left"><input name="conce_fee" type="hidden" class="text" size="10" value="0.0"/></td>
            </tr>
			<tr>
			 <td class="label1" ><div align="right">Medical Records Charges : </div></td>
              <td width="13%" align="left"><input name="mr_charge" type="text" class="text"  size="10" value="250"/></td>
			</tr> 
			<tr>
			<td colspan="2" >
			<table id="advcol" align="left" width="100%" cellpadding="4">
			<tr >
			   <td class="form_boxbg" colspan="2"><div align="left"><strong><font color="#000"> Advance Collection: </font></strong></div></td>
			  </tr>
				<tr>  
				  <td width="40%" class="label1"><div align="right">Date of Advance : </div></td>
            <td ><div align="left">
                <input name="adv_date" type="text" class="tcal" value="<?php echo date("d-m-Y"); ?>" readonly style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;">
                </tr>
          
          <tr>
            <td class="label1"><div align="right">Advance Paid : </div></td>
            <td ><div align="left">
                <input type="text" name="rupees" id="rupees" onKeyUp="return validate(document.myform.rupees.value)" class="text"/>
            </div></td>
            </tr>
          <tr>
   <td class="label1"><div align="right">Advance in Words : </div></td>
   <td colspan="3"><div align="left">
     <textarea name="adv_words" cols="34" rows="3" readonly class="textarea1"></textarea>
   </div>     </td>
   </tr>
   </table>
   </td></tr>
   
            <tr>
              <td class="label1" ><div align="right"> Alloted By : </div></td>
              <td colspan="3" align="left"><input name="emp_name" type="text" class="text" value="<?php echo $aname; ?>" /></td>
              </tr>

<tr><td colspan="4" align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='in_patient_admit.php'"/></td></tr></table>
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