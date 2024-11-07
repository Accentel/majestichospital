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
	
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
     
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
	
	
	
	document.getElementById("pname").value=strar[2];
	document.getElementById("age").value=strar[3];
	document.getElementById("mno").value=strar[4];
	document.getElementById("dname").value=strar[5];
	document.getElementById("ptype").value=strar[6];
	document.getElementById("gender").value=strar[7];
	document.getElementById("department").value=strar[8];
	showUser(str)
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search5677.php?q="+str,true);
xmlhttp.send();
}

function showUser(str)

{
//alert(str);
if (str=="")

  {

  document.getElementByName("bdate1").innerHTML="";

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

   // document.getElementById("country5").innerHTML=xmlhttp.responseText;

	//document.getElementById("country5").innerHTML=show;

	var show=xmlhttp.responseText;

	//alert(show);

	//document.getElementById("scategory").innerHTML=show;
	document.getElementById("bdate1").innerHTML=show;

	//document.location.reload();
//showUser1(str);
    }

  }

xmlhttp.open("GET","search311.php?q="+str,true);

xmlhttp.send();

}
</script>
<script>
for(var i=1;i<=10;i++){
	//var sy="showHint()"+i;
	//alert(sy);
function showHint(i)
{
var str=document.getElementById('cname'+i).value;
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
	
	document.getElementById("cost"+i).value=strar[1];
	var cost = document.getElementById("cost1").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search116.php?q="+str,true);
xmlhttp.send();
}

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
			include("config.php");
			$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str = "BL-".$dt3."-";
			$sql = mysqli_query($link,"select count(distinct BillNO) from opbill where BillNO like '$str%'")or die(mysqli_error($link));
			if($sql){
				$res = mysqli_fetch_array($sql);
				$c = $res[0];
				$bno = $str.($c+1);
			}
		?>
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Hospital Cash Bill</div>
		  <form name="myform" method="post" action="insert_hbill.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                        <tr >
                        <td align="right" >UMR No. :</td>
                        <td align="left" >
                            <input type="text" name="mrno" id="mrno"  class="text mrno" onchange="showHint52(this.value);"/>
                        </td>
						 
                    </tr>         
                    <tr >
                        <td align="right" >Bill No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" id="bno" value="<?php echo $bno ?>" readonly class="text"/>
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" id="bdate"  style="width:188px;height:20px;" class="tcal" value="<?php echo date('Y-m-d') ?>"   readonly />
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
							
                            <input type="text" name="pname" id="pname" class="text" required readonly="readonly"/>
                        </td>
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" name="age" id="age" style="width:100px;height:18px;" required readonly/>
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
                            <input type="text" name="gender" required id="gender" style="width:188px;height:24px;" readonly>
								
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <input type="text" required name="dname" id="dname" style="width:188px;height:24px;" readonly/>
							
                        </td>
                    </tr>
					<tr >
                     <td align="right" >Phone No :</td>
                        <td align="left" >
                            <input type="text" name="mno" id="mno" class="text" required readonly/>
                        </td>
                        
						<td align="right" >Patient Type :</td>
                        <td align="left" >
                            <input type="text" name="ptype" id="ptype" style="width:188px;height:24px;" readonly/>
								
                        </td>
					</tr>	
                    <tr >
                       
						<td align="right" >Department :</td>
                        <td align="left" >
                            <input type="text" name="department" id="department" class="text"  required readonly/>
                        </td>
						<td align="right" >Time1 :</td>
                        <td align="left" id="bdate1">
                           
                        </td>
					</tr>
                    	
					<tr >
                       
						<td align="right" >Time :</td>
                        <td align="left" >
                            <input type="text" name="time" id="time" class="text"  required readonly/>
                        </td>
						
					</tr>	
                     <tr >
                       
						<td align="right" >Observation :</td>
                        <td align="left" >
                            <select name="observation" id="observation" style="width:200px;"  required >
                            <option value="">Select Observation</option>
                             <option value="emergency">Emergency</option>
                              <option value="icu">ICU</option>
                               <option value="general">General</option>
                            </select>
                        </td>
						<td align="right" >Bed :</td>
                        <td align="left" >
                           <select name="bed" id="bed" style="width:200px;"  required >
                           <option value="">Select Bed</option>
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
					   <tr>
					   <td ><input type="text" class="text cname1" name="tname[]"  id="cname1" onchange="showHint(1);"   required/></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost1"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text cname2" name="tname[]" id="cname2"  onchange="showHint(2);"/></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost2"   /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text cname3" name="tname[]" id="cname3" onchange="showHint(3);"/></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost3"   /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text cname4" name="tname[]" id="cname4" onchange="showHint(4);"/></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost4"   /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text cname5" name="tname[]" id="cname5" onchange="showHint(5);"/></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost5"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text cname6" name="tname[]" id="cname6"onchange="showHint(6);" /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost6"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text cname7" name="tname[]" id="cname7" onchange="showHint(7);"/></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost7"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text cname8" name="tname[]" id="cname8"onchange="showHint(8);" /></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost8"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text cname9" name="tname[]" id="cname9" onchange="showHint(9);"/></td>
						<td ><input type="text" class="text txt" name="cost[]" id="cost9"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text cname10" name="tname[]" id="cname10" onchange="showHint(10);"/></td>
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
                            <input type="text" name="tot" value="0" readonly="readonly"  id="tot" class="text"/>
                        </td>
						 <td align="right" >Discount :</td>
                        <td align="left" >
                            <input type="text" name="conamt"  value="0" id="conamt" onkeyup="paidamt()" class="text" />
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Net Amount :</td>
                        <td align="left" >
                            <input type="text" name="price"  value="0" id="price" class="text"/>
                        </td>
						 <td align="right" >Paid Amount :</td>
                        <td align="left" >
                            <input type="text" name="paid"  value="0" onkeyup="paidamt()" id="paid" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Balance Amount :</td>
                        <td align="left" >
                            <input type="text" name="bal"  value="0" onkeyup="paidamt()" id="bal" class="text"/>
                        </td>
						<td align="right" >Remarks :</td>
                        <td align="left" >
                            <textarea name="remarks" rows="3" cols="28"></textarea>
							<input type="hidden" name="user" value="<?php echo $_SESSION['name1']; ?>"/>
                        </td>
						
                    </tr>
                    
                    
                    
                    <tr >
                        <td align="right" >Payment Type:</td>
                        <td align="left" >
                            <select name="paymenttype"  id="paymenttype">
							<option value="cash">cash</option>
							<option value="card">card</option>
							</select>
                        </td>
						
						
                    </tr>
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='view_hbill.php'"/></div>
        
		 </form>
			</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".mrno").autocomplete({
        source: "set199.php",
        minLength: 1
    });    


;})



$(function() {
    for(var i=1;i<=10;i++){
    //autocomplete
    $(".cname"+i).autocomplete({
        source: "set1999.php",
        minLength: 1
    });  
	}
	
});
//}



$(document).ready (function(){ 
$(".txt").each(function(){
$(this).keyup(function(){
calculateSum()
;})
});
});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value)
;}});
$("#tot").val(sum.toFixed(2));
$("#price").val(sum.toFixed(2));
$("#bal").val(sum.toFixed(2))

;}
</script>
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