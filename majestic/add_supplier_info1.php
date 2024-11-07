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
<script type="text/javascript" src="js/tableruler.js"></script>
<script>

function vattot()
{
var vat14=document.getElementById("vat_14").value;
var vat12=document.getElementById("vat_12").value;
var vat4=document.getElementById("vat_4").value;
if(eval(vat14)==null ||eval(vat14)=='' ){vat14=0;}
if(eval(vat12)==null ||eval(vat12)=='' ){vat12=0;}
if(eval(vat4)==null ||eval(vat4)=='' ){vat4=0;}
var sum=eval(vat14)+eval(vat12)+eval(vat4);
document.getElementById("vatadd").value=sum.toFixed(2);
}//vattot
	
function noitems(){
var sum=0;
var count=document.form.rows.value;
for(l=1;l<=count;l++)
	{
var str=document.getElementById("sqty"+l).value;
sum=eval(sum)+eval(str);
}//for

document.getElementById("nitem").value=count;
}//fun

function val(str,j)
{//alert(document.getElementById("vat").value)
	var sum1=0;
	var vatsum=0;
	var srate1="srate"+j;
	var sqty1="sqty"+j;
	var vat1="vat"+j;
	var sqty2=document.getElementById(sqty1).value;
	var vat2=document.getElementById(vat1).value;
	if(eval(sqty2)==null ||eval(sqty2)=='' ){
	alert("Please Enter Qty");
	document.getElementById(sqty1).focus();
	document.getElementById(srate1).value="";
	return false;}//if
		sum1=str*sqty2;
		document.getElementById("value"+j).value=sum1;
		vatsum=(vat2/100)*sum1;
		document.getElementById("vamt"+j).value=vatsum.toFixed(2);
		
tot();
vatt();
vattot();
nettotal();
}

function vatt()
{
var count=document.form.rows.value;
var vatsum4=0;
var vatsum12=0;
var vatsum14=0;
for(l=1;l<=count;l++)
{
var str=document.getElementById("vat"+l).value;
if(str==15){
var vat14=document.getElementById("vamt"+l).value;
if(vat14==""||vat14==null){vat14=0;}
else{vatsum14=eval(vatsum14)+eval(vat14);}
document.getElementById("vat_14").value=vatsum14.toFixed(2);
}//14


if(str==14.5){
var vat12=document.getElementById("vamt"+l).value;
if(vat12==""||vat12==null){vat12=0;}
else{vatsum12=eval(vatsum12)+eval(vat12);}
document.getElementById("vat_12").value=vatsum12.toFixed(2);
}//12
if(str==5){
var vat4=document.getElementById("vamt"+l).value;
if(vat4==""||vat4==null){vat4=0;}
else{vatsum4=eval(vatsum4)+eval(vat4);}
document.getElementById("vat_4").value=vatsum4.toFixed(2);
}//4
}//for
}

function tot()
{
	var sum3=0;
	var count3=document.form.rows.value;
	for(l=1;l<=count3;l++)
	{
		var value3="value"+l;
		var value4=document.getElementById(value3).value;
		var amt=eval(value4);
		sum3=Math.ceil(eval(sum3)+eval(amt));
		document.form.total.value=eval(sum3);
	}
}

</script>

<script>

function nettotal()
{
var count=document.form.rows.value;
if(count==0){
document.getElementById("nettot").value=0;
}
else{
var netsum=0;
var subtot=document.getElementById("total").value;
var vatadd=document.getElementById("vatadd").value;
var disc=document.getElementById("disc").value;
netsum=(eval(subtot)+eval(vatadd))-eval(disc);
if(netsum<0){alert("Please Check Discount");return false;}
document.getElementById("nettot").value=netsum;
}
adjttotal();
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

	<!-- var oCell = document.createElement("TD");
    //oCell.innerHTML= "<div align='center' ><input  type='text' name='pcode"+Row+"' id='pcode"+Row+"' class='textbox' onblur='sameinvcode()'  size='4'  readonly> </div>"; 
	//row.appendChild(oCell);-->

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' required='required' name='pname"+Row+"' id='pname"+Row+"' class='textbox' onblur='sameinvcode()' onclick=window.open('Drug_itemcode_pop.php?rowid="+Row+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')  size='10'  readonly> </div>"; 
    row.appendChild(oCell);



   <!-- oCell = document.createElement("TD");
	 	// oCell.innerHTML = "<div align='center' ><input  type='text' name='packing"+Row+"' id='packing"+Row+"' class='textbox' size='5' readonly > </div>"; 
    // row.appendChild(oCell);-->
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='maniby"+Row+"' id='maniby"+Row+"' class='textbox' size='10' readonly > </div>"; 
     row.appendChild(oCell);

 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='number' style='width:70px;'  name='noi"+Row+"' id='noi"+Row+"' class='textbox' size='3'  > </div>"; 
     row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='bno"+Row+"' id='bno"+Row+"' class='textbox' size='5' > </div>"; 
    row.appendChild(oCell);

   

oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<input type='text'  class='tcal' value='<?php echo date('d-m-Y'); ?>' name=mfg"+Row+" id=mfg"+Row+" size=7 >"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<input type='text' class='tcal' value='<?php echo date('30-m-Y'); ?>' name=exp"+Row+" id=exp"+Row+" size=7 ></a>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='sqty"+Row+"' id='sqty"+Row+"'class='textbox'  size='4' > </div>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='sfree"+Row+"' id='sfree"+Row+"' class='textbox'  size='4' value='0'> </div>"; 
     row.appendChild(oCell);

	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='dis"+Row+"' id='dis"+Row+"' class='textbox'  size='4'> </div>"; 
     //row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='srate"+Row+"' id='srate"+Row+"'class='textbox'  size='4' onkeyup='val(this.value,"+Row+")' > </div>"; 
     row.appendChild(oCell);

	

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='value"+Row+"' id='value"+Row+"' class='textbox'  size='4' onFocus='tot()' readonly> </div>"; 
     row.appendChild(oCell);

 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='mrp"+Row+"' id='mrp"+Row+"'class='textbox'  size='4'> </div>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='vat"+Row+"' id='vat"+Row+"' class='textbox'  size='3' > </div>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='hidden' name='vamt"+Row+"' id='vamt"+Row+"' class='textbox'  size='5' onFocus='vatt()' readonly> </div>"; 
    row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='cst"+Row+"' id='cst"+Row+"' class='textbox'  size='5' onFocus='cost()' readonly> </div>"; 
   //  row.appendChild(oCell);
 
  document.getElementById("nitem").value=Row;

     document.getElementById("rows").value=Row;
//sameinvcodes(Row);
   }//addrow()


 function deleteRow(tableID) {  
    var tbl = document.getElementById('TABLE1');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows").value;
  if (lastRow > 1){ 
				  var txtAmt="value"+rowss;
				  var aa= document.getElementById(txtAmt).value;
				  var amt2=eval(aa);
				  var bb=document.form.total.value;
				    sum=bb-amt2;
				  document.form.total.value = eval(sum); 

				   var vat= document.getElementById("vat"+rowss).value;
				     //alert(vat)
				    var vatamt= document.getElementById("vamt"+rowss).value;
				   //alert(vatamt)
					if(eval(vat)==15){//alert("-14-")
					var vat14= document.getElementById("vat_14").value;
					var sum14=eval(vat14)-eval(vatamt);
					 document.getElementById("vat_14").value=sum14.toFixed(2);
					}
					else if(eval(vat)==14.5){//alert("-12-")
						var vat12= document.getElementById("vat_12").value;
					var sum12=eval(vat12)-eval(vatamt);
					 document.getElementById("vat_12").value=sum12.toFixed(2);}
					else if(eval(vat)==5){//alert("-4-")
					var vat4= document.getElementById("vat_4").value;
					var sum4=eval(vat4)-eval(vatamt);
					 document.getElementById("vat_4").value=sum4.toFixed(2);}

 var sqty= document.getElementById("sqty"+rowss).value;
var nitem= document.getElementById("nitem").value;
var itemsum=eval(nitem)-eval(sqty);
document.getElementById("nitem").value=itemsum;

  tbl.deleteRow(lastRow - 1);document.getElementById("rows").value=eval(rowss)-1;

  vattot();nettotal();
}
  else{ alert('Please Select Row');return false;}
}

</script>
<script>
function save()
{

 // if(document.form.supcode.value=="")
//{
//alert("Please Click On SupplierCode");
//document.form.supcode.focus();
//return false;
//}

//if(document.form.ptype.value=="")
//{
//alert("Please Select purchase Type");
//document.form.ptype.focus();
//return false;
//}
//if(document.form.invno.value=="")
//{
//alert("Invoice No Filed is Empty");
//document.form.invno.focus();
//return false;
//}
//if(document.form.invdate.value=="")
//{
//alert("Invoice Date Filed is Empty");
//document.form.invdate.focus();
//return false;
//}
//if(document.form.recdate.value=="")
//{
//alert("Received Date Filed is Empty");
//document.form.recdate.focus();
//return false;
//}
//if(document.form.recby.value=="")
//{
//alert("Received By Filed is Empty");
//document.form.recby.focus();
//return false;
//}


var count=document.getElementById("rows").value
	   for(k=1;k<=count;k++)
		{
		  var select3="pname"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			var select4="noi"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("Pack Qty Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			
                        var ss=document.getElementById(select4).value
                        if(isNaN(ss))
                            {
                                alert("Please enter Numbers in Pack Qty");
				document.getElementById(select4).focus();
				return false;  
                            }

			var select5="bno"+k;
			if(document.getElementById(select5).value=="")
			{
				alert("Batch No. Feild is Empty");
				document.getElementById(select5).focus();
				return false;
			}
			
			var select7="mfg"+k;
			if(document.getElementById(select7).value=="")
			{
				alert("Mfg.Date Feild is Empty");
				document.getElementById(select7).focus();
				return false;
			}
			var select8="exp"+k;
			if(document.getElementById(select8).value=="")
			{
				alert("Exp.Date Feild is Empty");
				document.getElementById(select8).focus();
				return false;
			}
                        if(!(document.getElementById(select7).value=="") && !(document.getElementById(select8).value==""))
                            {
                               var str2 = document.getElementById(select7).value;//alert("dob"+str2);
                                 var dt2  = parseInt(str2.substring(0,2),10);
                                 var mon2 = parseInt(str2.substring(3,5),10);
                                 var yr2  = parseInt(str2.substring(6,10),10);
                                 var date2 = new Date(yr2, mon2, dt2);
                               //alert(date2);

                                 var str3=document.getElementById(select8).value;//alert('str3--'+str3)
                                 var dt3 = parseInt(str3.substring(0,2),10);
                                 var mon3 = parseInt(str3.substring(3,5),10);
                                 var yr3  = parseInt(str3.substring(6,10),10);
                                 var current_datefor = new Date(yr3, mon3, dt3);
                                 //alert(current_datefor);
                            if(date2>current_datefor)
                                 {//alert("Date of Birth--"+date2);alert("current_datefor--"+current_datefor)
                                     alert("MFG date Should be Less than EXP date");//To date cannot be greater than from date
                                     return false;
                                 }  
                            }
			var select9="sqty"+k;
			if(document.getElementById(select9).value=="")
			{
				alert("Qty Feild is Empty");
				document.getElementById(select9).focus();
				return false;
			}
                        
                        var sqt=document.getElementById(select9).value
                        if(isNaN(sqt))
                            {
                                alert("Please enter Numbers in Qty");
				document.getElementById(select9).focus();
				return false;  
                            }
                            
			var select10="sfree"+k;
			if(document.getElementById(select10).value=="")
			{
				alert("Free Feild is Empty");
				document.getElementById(select10).focus();
				return false;
			}
                        var sfr=document.getElementById(select10).value
                        if(isNaN(sfr))
                            {
                                alert("Please enter Numbers in Qty");
				document.getElementById(select10).focus();
				return false;  
                            }
			var select6="mrp"+k;
			if(document.getElementById(select6).value=="")
			{
				alert("MRP Feild is Empty");
				document.getElementById(select6).focus();
				return false;
			}
                        var mr=document.getElementById(select6).value
                        if(isNaN(mr))
                            {
                                alert("Please enter Numbers in MRP");
				document.getElementById(select6).focus();
				return false;  
                            }
			var select12="srate"+k;
			if(document.getElementById(select12).value=="")
			{
				alert("Rate Feild is Empty");
				document.getElementById(select12).focus();
				return false;
			}
                        var sra=document.getElementById(select12).value
                        if(isNaN(sra))
                            {
                                alert("Please enter Numbers in Rate");
				document.getElementById(select12).focus();
				return false;  
                            }
					
	
		}//for
 
	
	document.form.action="insert_purchase_invoice.php";
	document.form.submit();
}
</script>
<script>

function cur(){
document.form.supcode.focus(); 
}
</script>
<style>
.style2{
	color:red;
}
</style>
</head>
<body onload="cur()">
<?php
include("config.php");

$sql = mysql_query("select max(lr_no) from phr_purinv_mast");
if($sql)
{
	$row = mysql_fetch_array($sql);
	$pnid = $row[0];
}
?>

<script>
function funconce(str){
	//alert(str);
	if(str == "Chequee"){
		//document.getElementById("insu1").style.display='none';
	//	document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		document.getElementById("cardk").style.display='';
		document.getElementById("card1").style.display='';
		document.getElementById("insu1").style.display='none';
		
		
	}else if(str == "Cash"){
		document.getElementById("insu1").style.display='none';
		document.getElementById("cardk").style.display='none';
		document.getElementById("card1").style.display='none';
	}
	
}
</script> 
	<div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
			?>
		<div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">SUPPLIER AMOUNT PAY</h1>
		  <form name="form"  autocomplete="off" method="post" action="add_supplier_info1.php">
		  <input type="hidden" name="authby" value="<?php echo $aname ?>" />
          <table width="100%" border="0" cellspacing="5" cellpadding="2">
              <tr>
                <td width="23%" class="label"><div align="right">Supplier Code<span class="style2">*</span>:</div></td>
                <td  align="left"><input name="supcode" type="text" required="required" class="text"  onclick="window.open('purchase_inv_popup2.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" id="supcode"/></td>
              </tr><tr>
                <td width="23%" class="label"><div align="right">Supplier Name<span class="style2">*</span>:</div></td>
                <td  align="left"><input name="supname" type="text" required="required" class="text" id="supname" readonly/></td>
              </tr>
			    <tr>
			      <td class="label"><div align="right">Address:</div></td>
			      <td align="left"><textarea name="addr" rows="3" cols="34" id="addr" readonly="readonly" class="textbox" ></textarea></td>
			    </tr> 
			    <tr>
			      <td class="label"><div align="right">City:</div></td>
			      <td align="left"><input name="city" type="text" class="text" id="city" readonly="readonly"/></td></tr>
                 
     
			
 <tr>
                   <td class="label1">Total Amount:</td>
              	   <td align="left"><input name="gtot" type="text" class="text" id="gtot" readonly="readonly" size="15" onclick="javascript:adjttotal()"/></td>
              	 </tr>
                  <tr>
                   <td  class="label1">Paid Amount:</td>
              	   <td align="left"><input name="paid1" type="text" required class="text" readonly="readonly" id="paid1" size="15" onkeyup="javascript:krk()"/></td>
              	 </tr>
                  <tr>
                   <td  class="label1">Balance Amount:</td>
              	   <td align="left"><input name="bal1" type="text" class="text" value="0" id="bal1" size="15" readonly="readonly" /></td>
              	 </tr>
                 
                  <tr>
                   <td  class="label1">Now Paid Amount:</td>
              	   <td align="left"><input name="paid" type="text" required class="text" id="paid" size="15" onkeyup="javascript:krk()"/></td>
              	 </tr>
                  <tr>
                   <td  class="label1">Now Balance Amount:</td>
              	   <td align="left"><input name="bal" type="text" class="text" value="0" id="bal" size="15" readonly="readonly" /></td>
              	 </tr>
                 <tr>
                 <td class="label1" >Payment Type : </td>
  <td ><select name="payment_type" style="width:230px;height:20px;" onChange="funconce(this.value);" required>
	<option value="Cash">Cash</option>
    
	<option value="Chequee">Chequee</option>
		<!--<option value="Bank">Bank</option>-->
        
	</select>	
	</td>
 </tr>

<tr id="card1" style="display:none;" >
<td class="label1" >
	<div align="right">Chequee No : </div>
	
	</td>
	<td >

	<span class="label1">
    
    <input type="text"   name="chq_num" id="chq_num" class="text"/>
   
    </span>
  </td>
  <td class="label1">Bank Name : </td><td>  <input type="text"   name="bank" id="bank" class="text"/></td>
</tr>
<tr id="cardk" style="display:none;" >
<td class="label1" >
	<div align="right">Chequee Date : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="date" name="chq_date" id="chq_date" class="text"/>
   
    </span>
  </td></tr>
                 
<script>
function adjttotal(){
var sum=0;
var ntot=document.getElementById("nettot").value;

if(ntot=="" || ntot==null){
document.getElementById("gtot").value="0";
}
else{
var ad=document.getElementById("adjt").value;
var rn=document.getElementById("round").value;
if(ad=="" || ad==null){ad=0;}
if(rn=="" || rn==null){rn=0;}
ntot=eval(ntot)+eval(ad);
//alert(sum);
var ss=eval(ntot)-eval(rn);
document.getElementById("gtot").value=ss;
}
}

</script>

 <script type="text/javascript">
		$(function(){
$('#paid').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#bal1').val());
    $('#bal').val(totalpoints - balance);
});



});//]]>  
</script>
              
              	 <!--<tr>
                   <td colspan="5" class="label1">Received By:</td>
              	   <td align="left"><input name="recby" type="text" class="textbox" id="recby" value="<?php echo $aname ?>" /></td>
            	   </tr>-->
              	 </table>
				 <div align="center">
				 <input type="submit" value="Save" name="submit" class="butt" onclick="save1()"/>
              <input type="button" value="Close" class="butt" onclick = "window.location.href='supplier_info_list1.php'" > 
            </div>
			</form>
            
            <?php if(isset($_POST['submit'])){
			$supcode=$_POST['supcode'];	
			$bal1=$_POST['bal1'];
			$paid=$_POST['paid'];
			$paid1=$_POST['paid1'];
			$paid2=$paid1+$paid;
			$bal=$_POST['bal'];
			$d=date('Y-m-d');
			$chq_num=$_POST['chq_num'];
			$chq_date=$_POST['chq_date'];
			$bank=$_POST['bank'];
			$payment_type=$_POST['payment_type'];
			$sq=mysql_query("update phr_supplier_mast set paid='$paid2',bal='$bal' where suppl_code='$supcode'");
			$cc=mysql_query("insert into `sup_amount`(sup_code,tamt,paid,bal,date1,status,chq_num,chq_date,bank,ptype)
			values('$supcode','$bal1','$paid','$bal','$d','1','$$chq_num','$chq_date','$bank','$payment_type')");
				if($cc)
{
	print "<script>";
	print "alert('successfully Updated');";
	print "self.location='supplier_info_list1.php'";
	print "</script>";
}
			}
				?>
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