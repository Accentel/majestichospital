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
	
	<div id="conteneur container">
		<!--<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
-->	<?php
include("logo.php");
			include("main_menu.php");
			?>
		  
		

		  <div id="centre" class="table-responsive" style="height:auto;">
          <h1 style="color:red;" align="center">EDIT IN PATIENT ADMISSION</h1>
<?php
include("config.php");

$patno = $_REQUEST['pat'];
$pat_id = $_REQUEST['id'];


 /*$a="SELECT a.PAT_REGNO, b.patientname, a.ADMIT_DATE, a.admit_time, a.BED_NO, a.CONCESSION_TYPE,
 a.CONCESSION_CARDNO, a.AMOUNT, a.CONS_AMT, a.ALLOT_BY, c.room_no, d.ROOM_FEE, e.dname1, a.doc_code, b.registerdate, a.cash_credit, a.diet_cost, a.mr_cost
FROM ip_pat_admit AS a, patientregister AS b, bed_details AS c, room_tariff AS d, doct_infor AS e
WHERE a.PAT_REGNO = b.registerno
AND a.bed_no = c.bed_no
AND c.room_no = d.room_no
AND e.id = a.doc_code
AND a.pat_no =  '$patno'";*/


 $a="SELECT a.PAT_REGNO,a.status, b.patientname, a.ADMIT_DATE, a.admit_time, a.BED_NO, a.CONCESSION_TYPE,
 a.CONCESSION_CARDNO, a.AMOUNT, a.CONS_AMT, a.ALLOT_BY, c.room_no, d.ROOM_FEE, e.dname1, a.doc_code, b.registerdate, a.cash_credit, a.diet_cost, a.mr_cost
FROM ip_pat_admit AS a, patientregister AS b, bed_details AS c, room_tariff AS d, doct_infor AS e
WHERE a.PAT_REGNO = b.registerno and a.PAT_ID='$pat_id'

AND e.id = a.doc_code
AND a.pat_no =  '$patno'";
$sql1 = mysqli_query($link,$a)or die(mysqli_error($link));

if($sql1)
{
	$row1 = mysqli_fetch_array($sql1);
	
	$regno = $row1['PAT_REGNO'];
	$patname = $row1['patientname'];
	$adate = date('d-m-Y',strtotime($row1['ADMIT_DATE']));
	$atime = $row1['admit_time'];
	$bedno = $row1['BED_NO'];
	$contype = $row1['CONCESSION_TYPE'];
	$concardno = $row1['CONCESSION_CARDNO'];
	$amt = $row1['AMOUNT'];
	$conamt= $row1['CONS_AMT'];
	$allotby = $row1['ALLOT_BY'];
	$roomno = $row1['room_no'];
	$roomfee = $row1['ROOM_FEE'];
	$dname = $row1['dname1'];
	$dcode =$row1['doc_code'];
	$patregdate =date('d-m-Y',strtotime($row1['registerdate']));
	$cashcredit =$row1['cash_credit'];
	$dietcost = $row1['diet_cost'];
	$mrcost =$row1['mr_cost'];
	$status =$row1['status'];
	//$insutype =$row1['insu_type'];
//	if($cashcredit == "credit"){
//	$sql2 = mysqli_query($link,"select CONCE_NAME from concession_type where CONCE_CODE='$contype'")or die(mysqli_error($link));
//	if($sql2)
//	{
//		$row2 = mysqli_fetch_array($sql2);
	//	$conname = $row2['CONCE_NAME'];
//}
//	}
	$sql3 = mysqli_query($link,"select sno from ip_pat_bed where pat_no = '$patno'")or die(mysqli_error($link));
	if($sql3)
	{
		$row3 = mysqli_fetch_array($sql3);
		$sno = $row3['sno'];
	}
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
         <form name="myform" method="post" action="update_in_patient.php">
                
<table width="100%" cellspacing="10" class="table">

<tr>
<input type="hidden" name="patno" value="<?php echo $patno;?>"/>
<input type="hidden" name="sno" value="<?php echo $sno;?>"/>
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="rnum" class="text" value="<?php echo $regno ?>" readonly /></td>
<td class="label1">Registration Date : </td><td><input name="ApplicationDeadline1" id="ApplicationDeadline1" value="<?php echo $patregdate ?>" style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;" type="text" class="tcal" size="20"  required="required"  /></td>
</tr>
<tr>
<td class="label1">Admit Date / Time <font color="red">*</font> : </td>
<td width="25%"><input name="admitdate" style="padding-left:2px;width:107px;height:20px;border:1px solid #840204;" type="text" class="tcal" size="20"  required="required" value="<?php
			  echo $adate  ?>" /> 
              
               <input name="time1" id="intime1" readonly="readonly" 
               style="padding-left:2px;width:110px;height:20px;border:1px solid #840204;" type="text" value="<?php echo $atime; ?>" size="20"  />
             <!-- <input name="time" type="text" style="height:20px;border:1px solid #840204;"size="6" value="<?php echo $atime; ?>"/>-->
			  
			  </td>
<td class="label1">Doctor Name <font color="red">*</font> : </td>
<td>
<select name="docname"  class="text">
<option value="<?php echo $dcode;?>"><?php echo $dname;?></option>
<?php
//	include("config.php");
	
	$sql = mysqli_query($link,"select * from doct_infor")or die(mysqli_error($link));
	if($sql)
	{
		while($row = mysqli_fetch_array($sql))
		{
			$did = $row['id'];
			$dname2 = $row['dname1'];
?>
<option value="<?php echo $did ?>"><?php echo $dname2 ?></option>
<?php
		}
	}	
?>
</select>
</td>
</tr>

<tr>
<td class="label1">Patient Name <font color="red">*</font> : </td>
<td><input type="text" name="pname" id="pname" class="text" value="<?php echo $patname ?>" required="required"/></td>
</tr>
<tr>
<td class="label1" ><div align="right">Diet : </div></td>

  <td > 
  <?php 
  if($dietcost > 0){
  ?>
  <input type="radio" name="Diet" id="Diet" value="yes" onclick="Diet_fun(this.value)" checked />  Yes      <input type="radio" name="Diet" id="Diet" value="no" onclick="Diet_fun(this.value)" />  No 
	<?php
	}
	else
	{
	?>
	<input type="radio" name="Diet" id="Diet" value="yes" onclick="Diet_fun(this.value)" />  Yes      <input type="radio" name="Diet" id="Diet" value="no" onclick="Diet_fun(this.value)"  checked />  No 
	<?php
	}
	?>
	</td>
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
  
</tr>
<tr id="diet2" style="display:none">
  <td class="label1" ><div align="right">Diet Cost : </div></td>
  <td colspan="3" align="left"><span class="label1">
	<input name="diet_cost" type="text" id="diet_cost" value="<?php echo $dietcost; ?>" class="text" />
  </span></td>
</tr>
<?php
//$sql1 = mysqli_query($link,"select CONCE_CODE, CONCE_NAME from CONCESSION_TYPE")or die(mysqli_error($link));

?>
<tr>
  <td class="label1" ><div align="right">Mode Of Payment : </div></td>
  <td > 
  <?php 
  if($cashcredit == "cash"){
  ?>
  <input type="radio" name="pat_type" id="pat_type" value="cash" onclick="conc_fun(this.value)" checked /> Self <input type="radio" name="pat_type" id="pat_type" value="credit" onclick="conc_fun(this.value)"/> Credit 
  <?php
	}
	else
	{
	?>
	<input type="radio" name="pat_type" id="pat_type" value="cash" onclick="conc_fun(this.value)" /> Self <input type="radio" name="pat_type" id="pat_type" value="credit" checked onclick="conc_fun(this.value)"/> Credit 
  <?php
	}
	?>
  
  </td>
  <script>
  function conc_fun(str){
  if(str=="cash"){
  document.getElementById("cons1").style.display="none";
  //document.getElementById("cons2").style.display="none";
  }
  else if(str=="credit"){
  document.getElementById("cons1").style.display="";
  //document.getElementById("cons2").style.display="";
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
<?php if($cashcredit == "credit"){ ?>
<tr>
  <td class="label1" ><div align="right">Concession Type : </div></td>
  <td ><select name="concession_type" onchange="funconce(this.value);">
	<option value="<?php echo $contype ?>"><?php echo $conname ?></option>
	<?php
	if($sql1)
	{
		while($row1 = mysqli_fetch_array($sql1))
		{
			
	?>
	<option value="<?php echo $row1[0]?>"><?php echo $row1[1]?></option>
	<?php
		}
	}
	?>
	</select>	
	</td>

  <td class="label1" ><div align="right">Conce. Card No : </div></td>
  <td ><span class="label1">
	<input name="conce_card" type="text" class="text" value="<?php echo $concardno?>"/>
  </span></td>
</tr>	
<?php if($conname == "TPA Insurances"){ ?>
<tr >
<td class="label1" >
	<div align="right">Insurance Type : </div>
	</td>
	<td >
	<span class="label1">
	<select  class="text" name="insutype" >
	<option value="<?php echo $insutype ?>"><?php echo $insutype ?></option>
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
<?php } } ?>
<tr>
  <td class="label1" ><div align="right"> Bed No : </div></td>
  <td colspan="3" align="left">
  <select name="bedsno" id="bedsno" onchange="showHint2(this.value)" class="text" required>
  <option value="<?php echo $bedno?>"><?php echo $bedno?></option>
  <?php
	include("config.php");
	
	$sql = mysqli_query($link,"select BED_NO from bed_details where bed_status='Unreserved'")or die(mysqli_error($link));
	if($sql)
	{
		while($row = mysqli_fetch_array($sql))
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
 <td><input name="roomsno" type="text" class="text" size="8" id="roomsno" value="<?php echo $roomno?>" readonly="readonly"/></td>
<td class="label1" >Room Rent</td>             
    <td><input name="roomrents" type="text" class="text"  id="roomrents" value="<?php echo $roomfee?>" readonly="readonly" size="8" /></td>
</tr>
            <tr>
              <td class="label1" ><div align="right"> Admission Charge : </div></td>
              <td width="13%" align="left"><input name="adm_fee" type="text" class="text" value="<?php echo $amt?>" size="10" value="300"/></td>
              <td width="14%" class="label1" ><div align="right">Concession : </div></td>
              <td width="45%" align="left"><input name="conce_fee" type="text" class="text" value="<?php echo $conamt?>" size="10" value="0.0"/></td>
            </tr>
			<tr>
			 <td class="label1" ><div align="right">Medical Records Charges : </div></td>
              <td width="13%" align="left"><input name="mr_charge" type="text" class="text"  value="<?php echo $mrcost?>" size="10" value="250"/></td>
			</tr> 
				  
				  
            <tr>
              <td class="label1" ><div align="right"> Alloted By </div></td>
              <td colspan="3" align="left"><input name="emp_name" type="text" class="text" value="<?php echo $allotby; ?>" readonly/></td>
              </tr>

			  
			  <tr >
                        <td align="right" >Bill Status:</td>
                        <td align="left" >
                        <select name="bstatus" id="bstatus">
						<option value="">Select Status</option>
						<option value="cancel" <?php if($status=='cancel'){ echo 'selected';} ?>>Cancel</option>
							</select>
                        </td>
						
						
                    </tr>
<tr><td colspan="4" align="center"><input type="submit" id="prt" name="submit" value="Save"  class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='in_patient_admit.php'"/></td></tr></table>
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