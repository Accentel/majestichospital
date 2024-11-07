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
var vat14=0;
//var sum=eval(vat14)+eval(vat12)+eval(vat4);
var sum=eval(vat14)+eval(vat12);
var sum1=sum/2;
//alert(sum1);
document.getElementById("vatadd").value=sum.toFixed(2);

document.getElementById("vat_4").value=sum1.toFixed(2);
document.getElementById("vat_12").value=sum1.toFixed(2);

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
	var x=0;
	var y=0;
	var z=0;
	var sqty2=document.getElementById(sqty1).value;
	var vat2=document.getElementById(vat1).value;
	if(eval(sqty2)==null ||eval(sqty2)=='' ){
	alert("Please Enter Qty");
	document.getElementById(sqty1).focus();
	document.getElementById(srate1).value="";
	return false;}//if
		sum1=str*sqty2;
		
		x=str*sqty2;
		//alert(x);
		y=x*vat2/100;
		z=y/2;
		document.getElementById("value"+j).value=sum1;
		vatsum=(vat2/100)*sum1;
		document.getElementById("vamt"+j).value=vatsum.toFixed(2);
		document.getElementById("sst"+j).value=z;
		document.getElementById("cst"+j).value=z;
		
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
//if(str==15){
var vat14=document.getElementById("vamt"+l).value;
if(vat14==""||vat14==null){vat14=0;}
else{vatsum14=eval(vatsum14)+eval(vat14);}
document.getElementById("vat_14").value=vatsum14.toFixed(2);
//}//14


//if(str==14.5){
var vat12=document.getElementById("vamt"+l).value;
if(vat12==""||vat12==null){vat12=0;}
else{vatsum12=eval(vatsum12)+eval(vat12);}
document.getElementById("vat_12").value=vatsum12.toFixed(2);
//}//12
//if(str==5){
var vat4=document.getElementById("vamt"+l).value;
if(vat4==""||vat4==null){vat4=0;}
else{vatsum4=eval(vatsum4)+eval(vat4);}
document.getElementById("vat_4").value=vatsum4.toFixed(2);
//}//4
}//for
}

function discal(str,id){
	//var vat_4=0;
var value=document.getElementById("value"+id).value;
//var gst=document.getElementById("vat_4").value;

if(value=='' || value==null){value=0;}
var disamt=Math.abs((eval(value))-(eval(value))*(eval(str))/100);
//alert(disamt);
document.getElementById("amt"+id).value=disamt;
var vat=document.getElementById("vat"+id).value;

var vamt1=((disamt*vat)/100)/2;
//alert(vamt1);

document.getElementById("cst"+id).value=vamt1;
document.getElementById("sst"+id).value=vamt1;

//document.getElementById("vat_4"+id).value=vamt1;
//document.getElementById("sst"+id).value=vamt1;

if(vat=='' || vat==null){vat=0;}
document.getElementById("amt"+id).value=Math.abs((eval(disamt)));
//Math.abs((eval(disamt))+(eval(disamt))*(eval(vat))/100);
//Math.abs(disamt);

//document.getElementById("vat_4").value=Math.abs((eval(vamt1)+(gst)));

var netk= document.getElementById("nettotal").value;
//alert(netk);
//alert(disamt);
//if(netk=='NaN'){netk1=0;}else {
	//var netk= document.getElementById("nettotal").value;
//}
document.getElementById("nettotal").value= eval(disamt)+eval(netk);

 
vattk();
vattot1();
tot1();
nettotal1();
 }

 
 function vattk()
{
var count=document.form.rows.value;
var vatsum4=0;
var vatsum12=0;
var vatsum14=0;
for(l=1;l<=count;l++)
{
var str=document.getElementById("vat"+l).value;
var dis=document.getElementById("dis"+l).value;
//if(str==15){
var vat141=document.getElementById("vamt"+l).value;
var dis_amt=(eval(vat141)*eval(dis)/100);
var vat14=eval(vat141)-eval(dis_amt);

if(vat14==""||vat14==null){vat14=0;}
else{vatsum14=eval(vatsum14)+eval(vat14);}
document.getElementById("vat_14").value=vatsum14.toFixed(2);
//}//14


//if(str==14.5){
var vat121=document.getElementById("vamt"+l).value;
var dis_amt=(eval(vat121)*eval(dis)/100);
var vat12=eval(vat121)-eval(dis_amt);

if(vat12==""||vat12==null){vat12=0;}
else{vatsum12=eval(vatsum12)+eval(vat12);}
document.getElementById("vat_12").value=vatsum12.toFixed(2);
//}//12
//if(str==5){
var vat41=document.getElementById("vamt"+l).value;
var dis_amt=(eval(vat41)*eval(dis)/100);
var vat4=eval(vat41)-eval(dis_amt);

if(vat4==""||vat4==null){vat4=0;}
else{vatsum4=eval(vatsum4)+eval(vat4);}
document.getElementById("vat_4").value=vatsum4.toFixed(2);
//}//4
}//for

}


function vattot1()
{
var vat14=document.getElementById("vat_14").value;
var vat12=document.getElementById("vat_12").value;
var vat4=document.getElementById("vat_4").value;

if(eval(vat14)==null ||eval(vat14)=='' ){vat14=0;}
if(eval(vat12)==null ||eval(vat12)=='' ){vat12=0;}
if(eval(vat4)==null ||eval(vat4)=='' ){vat4=0;}
var vat14=0;
//var sum=eval(vat14)+eval(vat12)+eval(vat4);
var sum=eval(vat14)+eval(vat12);
var sum1=sum/2;
//alert(sum1);
document.getElementById("vatadd").value=sum.toFixed(2);

document.getElementById("vat_4").value=sum1.toFixed(2);
document.getElementById("vat_12").value=sum1.toFixed(2);

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

function tot1()
{
	//alert("hi");
	var sum3=0;
	var count3=document.form.rows.value;
	for(l=1;l<=count3;l++)
	{
		var value3="amt"+l;
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
//netsum=(eval(subtot))-eval(disc);
if(netsum<0){alert("Please Check Discount");return false;}
document.getElementById("nettot").value=netsum;
}
adjttotal();
}
</script>

<script>

function nettotal1()
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
//netsum=(eval(subtot))-eval(disc);
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
    oCell.innerHTML = "<div align='center' ><input type='text' required='required' name='pname"+Row+"' id='pname"+Row+"' class='textbox' onblur='sameinvcode()' onclick=window.open('Drug_itemcode_pop.php?rowid="+Row+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')  size='10'  readonly> </div>"; 
    row.appendChild(oCell);
	
	
	 <!-- oCell = document.createElement("TD");
	 	// oCell.innerHTML = "<div align='center' ><input  type='text' name='packing"+Row+"' id='packing"+Row+"' class='textbox' size='5' readonly > </div>"; 
    // row.appendChild(oCell);-->
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input type='text' name='maniby"+Row+"' id='maniby"+Row+"' class='textbox' size='10' style='width:60px;' readonly > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='HSN"+Row+"' id='HSN"+Row+"' style='width:70px;' class='textbox' size='10' readonly > </div>"; 
     row.appendChild(oCell);

 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='number' style='width:70px;'  name='noi"+Row+"' id='noi"+Row+"' class='textbox' size='3'  > </div>"; 
     row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='bno"+Row+"' id='bno"+Row+"' class='textbox' size='5' > </div>"; 
    row.appendChild(oCell);

   

//oCell = document.createElement("TD");
	 //	 oCell.innerHTML = "<input type='date'  class='tcal' value='<?php echo date('Y-m-30'); ?>' name=mfg"+Row+" id=mfg"+Row+" size=7 >"; 
   //  row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<input type='text' class='tcal' value='<?php echo date('m-Y'); ?>' name=exp"+Row+" id=exp"+Row+" size=7 ></a>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='sqty"+Row+"' id='sqty"+Row+"'class='textbox'  size='3' style='width:50px;'> </div>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='sfree"+Row+"' id='sfree"+Row+"' class='textbox'  size='2' style='width:40px;' value='0'> </div>"; 
     row.appendChild(oCell);

	 

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='srate"+Row+"' id='srate"+Row+"'class='textbox'  size='4' onkeyup='val(this.value,"+Row+")' > </div>"; 
     row.appendChild(oCell);

	

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='value"+Row+"' id='value"+Row+"' class='textbox'  size='4' onFocus='tot()' readonly> </div>"; 
     row.appendChild(oCell);
	 
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='dis"+Row+"' value='0' id='dis"+Row+"' class='textbox' onkeyup='discal(this.value,"+Row+")'  size='4' style='width:70px;'> </div>"; 
     row.appendChild(oCell);

 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='mrp"+Row+"' id='mrp"+Row+"'class='textbox'  size='4'> </div>"; 
     row.appendChild(oCell);

	
 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='sst"+Row+"' id='sst"+Row+"' readonly class='textbox'  size='3' > </div>"; 
     row.appendChild(oCell);
	 
	 //oCell = document.createElement("TD");
	 	// oCell.innerHTML = "<div align='center'><input type='hidden' name='sgst"+Row+"' id='sgst"+Row+"' class='textbox'  size='3' > </div>"; 
    // row.appendChild(oCell);
	 
	 
	 
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='cst"+Row+"' id='cst"+Row+"' readonly class='textbox'  size='3' > </div>"; 
     row.appendChild(oCell);
	// oCell = document.createElement("TD");
	 	// oCell.innerHTML = "<div align='center'><input type='hidden' name='cgst"+Row+"' id='cgst"+Row+"' class='textbox'  size='3' > </div>"; 
   //  row.appendChild(oCell);
	 
	 
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='vat"+Row+"' id='vat"+Row+"' class='textbox'  size='3' > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='amt"+Row+"'readonly  value='0' id='amt"+Row+"' class='textbox'  size='3' > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='hidden' name='vamt"+Row+"' id='vamt"+Row+"'readonly  class='textbox'  size='5' onFocus='vatt()' readonly> </div>"; 
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
			var select4="HSN"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("Pack Qty Feild is Empty");
				document.getElementById(select4).focus();
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

$sql = mysqli_query($link,"select max(lr_no) from phr_purinv_mast")or die(mysqli_error($link));
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$pnid = $row[0];
}
?>
	<div id="conteneur container">
		<!--<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		--><?php
		include("logo.php");
			include("main_menu.php");
			?>
		 <div id="centre" class="table-responsive" style="height:auto; min-height:450px;">
          <h1 style="color:red;" align="center">PURCHASE INVOICE</h1>
		  <form name="form"  autocomplete="off" method="post" action="insert_purchase_invoice.php">
		  <input type="hidden" name="authby" value="<?php echo $aname ?>" />
          <table width="100%" border="0" class="table" cellspacing="5" cellpadding="2">
              <tr>
                <td width="23%" class="label1"><div align="right">Supplier Code<span class="style2">*</span>:</div></td>
                <td  align="left">
                <input name="supcode" type="text" required="required" class="text"  onclick="window.open('purchase_inv_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" id="supcode"/></td>
              
                <td width="23%" class="label1"><div align="right">Supplier Name<span class="style2">*</span>:</div></td>
                <td  align="left"><input name="supname" type="text" required="required" class="text" id="supname" readonly/></td>
              </tr>
			    <tr>
			      <td class="label1"><div align="right">Address:</div></td>
			      <td align="left"><textarea name="addr" rows="3" cols="34" id="addr" readonly="readonly" class="text" ></textarea></td>
			      <td class="label1"><div align="right">GRN NO:</div></td>
			      <td align="left"><input name="grnno" type="text" class="text" id="grnno" value="<?php echo "GRN".($pnid+1); ?>" readonly="readonly"/></td>
			    </tr>
			    <tr>
			      <td class="label1"><div align="right">City:</div></td>
			      <td align="left"><input name="city" type="text" class="text" id="city" readonly="readonly"/></td>
                  <td class="label1"><div align="right">Invoice No<span class="style2">*</span>:</div></td>
                  <td align="left"><input name="invno" type="text" required="required" class="text" id="invno" /></td>
			    </tr>
				<script type="text/javascript">

function CheckColors(val){

 var element=document.getElementById('color');

 if(val=='B')

   element.style.display='block';
    

 else  

   element.style.display='none';
  

}



</script>
				<tr>
				  <td class="label1"><div align="right">Purchase Type<span class="style2">*</span>:</div></td>
				  <td align="left"><select name="ptype"  class="text" onchange='CheckColors(this.value);'>
                      <option value="">-Select PurchaseType-</option>
                      <option value="B">Bank</option>
                      <option value="C" selected>Cash</option>
                      
                  </select></td>
                  <td class="label1"><div align="right">Invoice Date<span class="style2">*</span>:</div></td>
                  <td align="left"><input name="invdate" type="date" class="text" id="invdate" value="<?php echo date('Y-m-d'); ?>" />
                    
					</td>
				</tr>
				
				<tr>
				  <td class="label1">&nbsp;</td>
				  <td><div id="color" style='display:none;'>
				<table>
				<tr>
				<td><input type="text" class="text" name="bankname" id=""  placeholder="Enter Bank Namee" /></td></tr><tr>
				<td><input type="text" class="text" name="chequeno" id=""  placeholder="Enter Cheque No"/></td>
				</tr>
				<tr>
				<td> <input name="date3" type="date" class="text" id="date3" value="<?php echo date('Y-m-d'); ?>" readonly="readonly"/></td>
				</tr>
				</table>
				</div></td>
				  <td class="label1"><div align="right">Received Date<span class="style2">*</span>:</div></td>
				  <td><div align="left">
                      <input name="recdate" type="date" class="text" id="recdate" value="<?php echo date('Y-m-d'); ?>" />
                  </div>
				  </td>
				</tr>
				
        
            </table>
			<table id="t1" width="90%">
			<tr><td><div align="right">
              	     <input name="new2" type="button" class="butnbg1" value=" + " onclick="javascript:Addrow()"/>
            	     <input name="new" type="button" class="butnbg1" value=" - " onclick="javascript:deleteRow()"/>
            	     </div></td>
            	   
           <tr><td width="100%" align="center"><br />

<div id="purtable" valign="top">

            <table width="100%" id="TABLE1">
              <thead>
              	 
              	 <tr>
   <!--<th width="7%" class="TH1">P.Code</th>-->
   <th width="15%" class="TH1">P.Name </th>
      <!--<th width="7%" class="TH1">Pack</th>-->
	   <th width="6%" class="TH1">Mnf.By</th>
	   <th width="7%" class="TH1">HSN</th>
	     <th width="7%" class="TH1">Pk.Qty </th>
   <th width="10%" class="TH1">Batch.NO</th>
 
   <!--<th width="9%" class="TH1">MFG.Dt</th>-->
   <th width="9%" class="TH1">EXP.Dt</th>
   <th width="5%" class="TH1">Qty</th>
   <th width="4%" class="TH1">Free</th>
    <th width="9%" class="TH1">Rate</th>
   <th width="9%" class="TH1">Amount</th>
   <th width="7%" class="TH1">Dis(%)</th>
   <th width="9%" class="TH1">MRP</th>
 
    <th width="5%" class="TH1">SGST</th>
     <th width="5%" class="TH1">CGST</th>
       <th width="5%" class="TH1">GST</th>
       <th width="5%" class="TH1">Amount</th>
    </tr>
   </thead>
 </table>

 </div>
 </td>
 
  
  </tr>


</table>
<input type="hidden" name="rows" id="rows" value="0" >
<table width="100%" >
              	   <tr height="40">
              	     <td colspan="6" class="label">&nbsp;</td>
              	     </tr>
              	   <tr>
              	   <td width="15%" class="label1">SGST <!--VAT-->: </td>
              	   <td width="9%" class="label"><div align="left">
              	     <input name="vat_4" type="text" class="textbox" id="vat_4" size="10"/>
            	     </div></td>
              	   <td width="21%" class="label1">No.of Items: </td>
              	   <td width="11%" class="label"><div align="left">
              	     <input name="nitem" type="text" class="textbox" id="nitem" size="10"  onclick="javasript:noitems()"/>
            	     </div></td>
              	   <td width="25%" class="label1">Sub Total: </td>
              	   <td width="19%" align="left"><input name="total" type="text" class="textbox" id="total"  readonly="readonly" size="15"/></td></tr>
				   <tr>
              	   <td class="label1"><!--14.5% VAT-->CGST: </td>
              	   <td class="label"><div align="left">
              	     <input name="vat_12" type="text" class="textbox" id="vat_12" size="10"/>
            	     </div></td>
              	   <td class="label">&nbsp;</td>
              	   <td class="label">&nbsp;</td>
              	   <td class="label1"><!--Less Disc: --></td>
              	   <td align="left">
                  <input name="o_dis" type="hidden" class="text" id="o_dis" onkeyup="nett1()" value="0"/>
                   <input name="disc" type="hidden" class="textbox" id="disc" size="15" value="0" onkeyup="javascript:nettotal()"/></td>
            	   </tr>
              	 <tr>
              	   <td class="label1"><!--15% VAT:--> </td>
              	   <td class="label"><div align="left">
              	    <!-- <input name="vat_14" type="text" class="textbox" id="vat_14" size="10"/>-->
                    <input name="vat_14" type="hidden" class="textbox" id="vat_14" size="10"/>
            	     </div></td>
              	   <td class="label">&nbsp;</td>
              	   <td class="label">&nbsp;</td>
              	   <td class="label1">ADD GST: </td>
              	   <td align="left"><input name="vatadd" type="text" class="textbox" id="vatadd" size="15"/></td>
            	   </tr>
              	 <tr>
                   <td colspan="5" class="label1">Net PAYABLE:</td>
              	   <td align="left">
                   <input name="nettotal" type="hidden" class="text" value="0" id="nettotal" readonly="readonly"/>
                   <input name="nettot" type="text" required="required" class="textbox" id="nettot" size="15" onclick="javascript:nettotal()"/></td>
              	 </tr>
 <tr>
                   <td colspan="5" class="label1">Adjustables:</td>
              	   <td align="left"><input name="adjt" type="text" class="textbox" id="adjt" size="15" onkeyup="javascript:adjttotal()"/></td>
              	 </tr>
 <tr>
                   <td colspan="5" class="label1">Rounded:</td>
              	   <td align="left"><input name="round" type="text" class="textbox" id="round" size="15" onkeyup="javascript:adjttotal()"/></td>
              	 </tr>
 <tr>
                   <td colspan="5" class="label1">Total Amount:</td>
              	   <td align="left"><input name="gtot" type="text" class="textbox" id="gtot" readonly="readonly" size="15" onclick="javascript:adjttotal()"/></td>
              	 </tr>
                  <tr>
                   <td colspan="5" class="label1">Paid Amount:</td>
              	   <td align="left"><input name="paid" type="text" required class="textbox" id="paid" size="15" onkeyup="javascript:krk()"/></td>
              	 </tr>
                  <tr>
                   <td colspan="5" class="label1">Balance Amount:</td>
              	   <td align="left"><input name="bal" type="text" class="textbox" value="0" id="bal" size="15" readonly="readonly" /></td>
              	 </tr>
                 
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
//document.getElementById("paid").value=ss;
}
}

</script>



 <script type="text/javascript">
		$(function(){
$('#paid').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#gtot').val());
    $('#bal').val(totalpoints - balance);
});



});//]]>  
</script>
              	 <tr>
                   <td colspan="5" class="label1">Received By:</td>
              	   <td align="left"><input name="recby" type="text" class="textbox" id="recby" value="<?php echo $aname ?>" /></td>
            	   </tr>
              	 </table>
				 <div align="center">
				 <input type="submit" value="Save" name="submit" class="butt" onclick="save1()"/>
              <input type="button" value="Close" class="butt" onclick = "window.location.href='purchase_invoice_list.php'" > 
            </div>
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