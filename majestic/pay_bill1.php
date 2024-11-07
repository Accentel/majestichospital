<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#mrno").autocomplete("set19.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	$("#cname1").autocomplete("set9.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	$("#cname2").autocomplete("set9.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	$("#cname3").autocomplete("set9.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	$("#cname4").autocomplete("set9.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	$("#cname5").autocomplete("set9.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	$('#cname6').autocomplete("set9.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	$("#cname7").autocomplete("set9.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	$("#cname8").autocomplete("set9.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	$("#cname9").autocomplete("set9.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	$("#cname10").autocomplete("set9.php", {
		width: 180,
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
function paidamt(){
var tot = document.getElementById("tot").value;
var dis = document.getElementById("conamt").value;
var net = parseFloat(tot)-parseFloat(dis);
document.getElementById("price").value=net;
document.getElementById("bal").value=net;
var namt = document.getElementById("price").value;
var paid = document.getElementById("paid").value;
var amt1 = parseFloat(namt)-parseFloat(paid);
document.getElementById("bal").value=amt1;
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
    oCell.innerHTML= "<div align='center' ><input  type='text' class='text' name='tname[]' id='cname"+Row+"' /></div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell);

	//oCell = document.createElement("TD");
   // oCell.innerHTML = "<div align='center' ><input  type='text' class='text' name='cost[]' id='cost"+Row+"'  readonly/> </div>"; 
   // row.appendChild(oCell);

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
function showHint21(str)
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
	
	document.getElementById("cost1").value=strar[1];
	var cost = document.getElementById("cost1").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>
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
	
	document.getElementById("cost2").value=strar[1];
	var cost = document.getElementById("cost2").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint23(str)
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
	
	document.getElementById("cost3").value=strar[1];
	var cost = document.getElementById("cost3").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint24(str)
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
	
	document.getElementById("cost4").value=strar[1];
	var cost = document.getElementById("cost4").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint25(str)
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
	
	document.getElementById("cost5").value=strar[1];
	var cost = document.getElementById("cost5").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint26(str)
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
	
	document.getElementById("cost6").value=strar[1];
	var cost = document.getElementById("cost6").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint27(str)
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
	
	document.getElementById("cost7").value=strar[1];
	var cost = document.getElementById("cost7").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint28(str)
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
	
	document.getElementById("cost8").value=strar[1];
	var cost = document.getElementById("cost8").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint29(str)
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
	
	document.getElementById("cost9").value=strar[1];
	var cost = document.getElementById("cost9").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
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
	
	document.getElementById("bdate1").value=strar[1];
	
	document.getElementById("pname").value=strar[2];
	document.getElementById("age").value=strar[3];
	document.getElementById("mno").value=strar[4];
	document.getElementById("dname").value=strar[5];
	document.getElementById("ptype").value=strar[6];
	document.getElementById("gender").value=strar[7];
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search56.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint30(str)
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
	
	document.getElementById("cost10").value=strar[1];
	var cost = document.getElementById("cost10").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
$(document).ready(function(){
$(".txt").each(function(){
$(this).keyup(function(){
calculateSum()
;})
;})
;});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value)
;}});
$("#tot").val(sum.toFixed(2))
;}
</script>
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

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('time').value=" "+nhour+":"+nmin+":"+nsec+ap+"";

setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>
	</head>

	<body>

  
	<div id="conteneur">

		   <?php
				include("logo.php");
			  ?>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" style="height:auto;">
		<?php
			include("config.php");
			$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str = "BL-".$dt3."-";
			$sql = mysqli_query($link,"select count(distinct BillNO) from bill4 where BillNO like '$str%'")or die(mysqli_error($link));
			if($sql){
				$res = mysqli_fetch_array($sql);
				$c = $res[0];
				$bno = $str.($c+1);
			}
			
			
$q=$_GET["mrnum"];

$sql="SELECT * FROM patientregister WHERE registerno = '$q'";
$result = mysqli_query($link,$sql)or die(mysqli_error($link));
if($result){
	$row = mysqli_fetch_array($result);
	$date=$row['registerdate'];
	$d=date('Y-m-d',strtotime($date));
	
	 ":" . $row['pname_type']." .".$row['patientname'];
	$age=$row['age'];
	$phoneno=$row['phoneno'];
	$doctorname=$row['doctorname'];
	$pat_type=$row['pat_type'];
	$gender=$row['gender'];
		$patientname=$row['patientname'];
		$pname_type=$row['pname_type'];
	
	
}
		?>
        
        
        
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Lab Bill</div>
		  <form name="myform" method="post" action="insert_bill1.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                        <tr >
                        <td align="right" >UMR No. :</td>
                        <td align="left" >
                            <input type="text" name="mrno" id="mrno" value="<?php echo $q?>"  class="text" readonly/>
                        </td>
						 
                    </tr>         
                    <tr >
                        <td align="right" >Bill No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" id="bno" value="<?php echo $bno ?>" readonly class="text"/>
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" id="bdate" style="width:188px;height:20px;" class="tcal" value="<?php echo date('Y-m-d') ?>"  readonly /><input type="hidden" name="bdate1" id="bdate1" style="width:188px;height:20px;"   readonly />
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
							
                            <input type="text" name="pname" value=".<?php echo $patientname?>" id="pname" class="text" required readonly="readonly"/>
                        </td>
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" value="<?php echo $age?>" name="age" id="age" style="width:100px;height:18px;" required readonly/>
							<select name="suf" id="suf" style="width:80px;height:24px;">
							<option value="Years"> Years </option>
							<option value="Months"> Months </option>
							<option value="Days"> Days </option>
							
							</select>
						</td>
                    </tr>
					<tr >
                        <td align="right" >Gender :</td>
                        <td align="left" >
                            <input type="text" name="gender" value="<?php echo $gender?>" required id="gender" style="width:188px;height:24px;" readonly>
								
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <input type="text" required name="dname" value="<?php echo $doctorname?>" id="dname" style="width:188px;height:24px;" readonly/>
							
                        </td>
                    </tr>
					<tr >
                     <td align="right" >Phone No :</td>
                        <td align="left" >
                            <input type="text" name="mno" value="<?php echo $phoneno?>" id="mno" class="text" required readonly/>
                        </td>
                        
						<td align="right" >Patient Type :</td>
                        <td align="left" >
                            <input type="text" name="ptype" value="<?php echo $pat_type?>" id="ptype" style="width:188px;height:24px;" readonly/>
								
                        </td>
					</tr>	
					<tr >
                       
						<td align="right" >Time :</td>
                        <td align="left" >
                            <input type="text" name="time" id="time" class="text"  required readonly/>
                        </td>
						
					</tr>	
                     <tr >
					 <td colspan="4">
                       <table width="100%" id="expense_table">
                    <tr><td width="100%" align="center">
					<table width="100%" id="TABLE1">
					  <thead>
						 <tr>
					   
					   <th width="100%" class="TH1">Test Name </th>
					  <!-- <th width="50%" class="TH1">Cost</th>-->
					   </tr>
					   </thead>
					   <tr>
					   <td ><input type="text" class="text" name="tname[]"  id="cname1" onfocus="showHint21(this.value);" required/></td>
						<input type="hidden" class="text" name="cost[]" id="cost1"   class="txt"/>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname2" onfocus="showHint22(this.value);" /></td>
					<input type="hidden" class="text" name="cost[]" id="cost2"   class="txt"/>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname3" onfocus="showHint23(this.value);"/></td>
						<input type="hidden" class="text" name="cost[]" id="cost3"   class="txt"/>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname4" onfocus="showHint24(this.value);"/></td>
					<input type="hidden" class="text" name="cost[]" id="cost4" readonly  class="txt"/>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname5" onfocus="showHint25(this.value);"/></td>
						<input type="hidden" class="text" name="cost[]" id="cost5" readonly />
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname6" onfocus="showHint26(this.value);"/></td>
					<input type="hidden" class="text" name="cost[]" id="cost6" readonly />
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname7" onfocus="showHint27(this.value);"/></td>
					<input type="hidden" class="text" name="cost[]" id="cost7" readonly />
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname8" onfocus="showHint28(this.value);"/></td>
						<input type="hidden" class="text" name="cost[]" id="cost8" readonly />
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname9" onfocus="showHint29(this.value);"/></td>
						<input type="hidden" class="text" name="cost[]" id="cost9" readonly />
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname10" onfocus="showHint30(this.value);"/></td>
						<input type="hidden" class="text" name="cost[]" id="cost10" readonly />
						
						</tr>
					 </table>
					 
					 </td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  +  " onClick="javascript:Addrow()"/></td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  -  " onClick="javascript:deleteRow()"/></td>
					  </tr>

					<input type="hidden" name="rows" id="rows" value="10" />

					 </table>
					 </td>
                    </tr>
					<tr  style="display:none;">
                        <td align="right" >Total Amount :</td>
                        <td align="left" >
                            <input type="text" name="tot" value="0" readonly="readonly"  id="tot" class="text"/>
                        </td>
						 <td align="right" >Discount :</td>
                        <td align="left" >
                            <input type="text" name="conamt"  value="0" id="conamt" onkeyup="paidamt()" class="text" />
                        </td>
                    </tr>
					<tr  style="display:none;">
                        <td align="right" >Net Amount :</td>
                        <td align="left" >
                            <input type="text" name="price"  value="0" id="price" class="text"/>
                        </td>
						 <td align="right" >Paid Amount :</td>
                        <td align="left" >
                            <input type="text" name="paid"  value="0" onkeyup="paidamt()" id="paid" class="text"/>
                        </td>
                    </tr>
					<tr  style="display:none;">
                        <td align="right" >Balance Amount :</td>
                        <td align="left" >
                            <input type="text" name="bal"  value="0" onkeyup="paidamt()" id="bal" class="text"/>
                        </td>
						<td align="right" >Remarks :</td>
                        <td align="left" >
                            <textarea name="remarks" rows="3" cols="28"></textarea>
							<input type="hidden" name="user" value="<?php echo $_SESSION['suguna']; ?>"/>
                        </td>
						
                    </tr>
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='new_lab_bill.php'"/></div>
        
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

header('Location:index.php?authentication failed');

}

?>