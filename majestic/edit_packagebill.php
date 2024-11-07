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

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' class='text' name='cost[]' id='cost"+Row+"'  readonly/> </div>"; 
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
	
	document.getElementById("bdate").value=strar[1];
	
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
$("#tot").val(sum.toFixed(2));
$("#price").val(sum.toFixed(2));
//$("#bal").val()=$("#price").val()-$("#paid").val();
calculateSum1()

;}
function calculateSum1(){
	var paid=document.getElementById('paid').value;
	var net=document.getElementById('price').value;
	var bal=parseFloat(net)-parseFloat(paid);
	document.getElementById('bal').value=bal;
	
}
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
		$id=$_REQUEST['bno'];
		$m=mysqli_query($link,"select * from packagebill where BillNO='$id'") or die(mysqli_error($link));
		$rs=mysqli_fetch_array($m);
		$mrno=$rs['mrno'];
		$BillDate=$rs['BillDate'];
		$BillNO=$rs['BillNO'];
		$PatientName=$rs['PatientName'];
		$Age=$rs['Age'];
		$Sex=$rs['Sex'];
		$DoctorName=$rs['DoctorName'];
		$phoneno=$rs['phoneno'];
		$ptype=$rs['ptype'];       
	    $Total=$rs['Total'];
		$Discount=$rs['Discount'];
		$NetAmount=$rs['NetAmount'];
		$PaidAmount=$rs['PaidAmount'];
		$BalanceAmount=$rs['BalanceAmount'];
		$remarks=$rs['remarks'];
		$id2=$rs['id'];			
		
		?>
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Extra Package Services Cash Bill</div>
		  <form name="myform" method="post" action="update_packagebill.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                        <tr >
                        <td align="right" >UMR No. :</td>
                        <td align="left" >
                            <input type="text" name="mrno" id="mrno"  value="<?php echo $mrno ?>"  class="text" readonly/>
                        </td>
						 
                    </tr>         
                    <tr >
                        <td align="right" >Bill No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" id="bno" value="<?php echo $BillNO ?>" readonly class="text"/>
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" id="bdate" style="width:188px;height:20px;" value="<?php echo $BillDate ?>"  readonly />
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
							
                            <input type="text" name="pname" id="pname" value="<?php echo $mrno ?>" class="text" required readonly="readonly"/>
                        </td>
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" name="age" id="age" style="width:100px;height:18px;" value="<?php echo $Age ?>" required readonly/>
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
                            <input type="text" name="gender" required id="gender" value="<?php echo $Sex ?>" style="width:188px;height:24px;" readonly>
								
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <input type="text" required name="dname" id="dname" value="<?php echo $DoctorName ?>" style="width:188px;height:24px;" readonly/>
							
                        </td>
                    </tr>
					<tr >
                     <td align="right" >Phone No :</td>
                        <td align="left" >
                            <input type="text" name="mno" id="mno" class="text" value="<?php echo $phoneno ?>" required readonly/>
                            <input type="hidden" name="id2" id="id2" class="text" value="<?php echo $id2 ?>" required readonly/>
                        </td>
                        
						<td align="right" >Patient Type :</td>
                        <td align="left" >
                            <input type="text" name="ptype" id="ptype" style="width:188px;height:24px;" value="<?php echo $ptype ?>" readonly/>
								
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
					   
					   <th width="50%" class="TH1">Purpose </th>
					   <th width="50%" class="TH1">Amount</th>
					   </tr>
					   </thead>
                       <?php 
						$sql2 = mysqli_query($link,"select * from packagebill1 where BillNO = '$id'");
						if($sql2){
							while($row2 = mysqli_fetch_array($sql2)){
							$id=$row2['id'];
							$bn=$row2['BillNO'];
					   ?>
					   <tr>
					   <td ><input type="text" class="text txt" name="tname[]" id="cname1" value="<?php echo $row2['purpose'] ?>"  /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost1" value="<?php echo $row2['Amount'] ?>"  /><input type="hidden" class="text " name="id[]" id="id" value="<?php echo $row2['id'] ?>" readonly /></td>
						
						</tr>
						<?php } } ?>
					
					   <tr>
					   <td ><input type="text" class="text" name="tname[]"  id="cname1"  /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost1"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname2"  /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost2"   /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname3" /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost3"   /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname4" /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost4"   /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname5" /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost5"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname6" /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost6"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname7" /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost7"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname8" /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost8"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname9" /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost9"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname10" /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost10"  /></td>
						
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
					<tr >
                        <td align="right" >Total Amount :</td>
                        <td align="left" >
                            <input type="text" name="tot" value="<?php echo $Total ?>" readonly="readonly"  id="tot" class="text"/>
                        </td>
						 <td align="right" >Discount :</td>
                        <td align="left" >
                            <input type="text" name="conamt"  value="<?php echo $Discount ?>" id="conamt" onkeyup="paidamt()" class="text" />
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Net Amount :</td>
                        <td align="left" >
                            <input type="text" name="price" value="<?php echo $NetAmount ?>" id="price" class="text"/>
                        </td>
						 <td align="right" >Paid Amount :</td>
                        <td align="left" >
                            <input type="text" name="paid"  value="<?php echo $PaidAmount ?>" onkeyup="paidamt()" id="paid" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Balance Amount :</td>
                        <td align="left" >
                            <input type="text" name="bal"  value="<?php echo $BalanceAmount ?>" onkeyup="paidamt()" id="bal" class="text"/>
                        </td>
						<td align="right" >Remarks :</td>
                        <td align="left" >
                            <textarea name="remarks" rows="3" cols="28"><?php echo $remarks; ?></textarea>
							<input type="hidden" name="user" value="<?php echo $_SESSION['name1']; ?>"/>
                        </td>
						
                    </tr>
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='view_packagebill.php'"/></div>
        
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