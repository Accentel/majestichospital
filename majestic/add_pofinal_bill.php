<?php //include('config.php');
session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname = $_SESSION['name1'];
	$sql = mysqli_query($link,"select ifnull(max(bill_no+0),0) from final_bill")or die(mysqli_error($link));
	$COUNT=0;
	$row = mysqli_fetch_array($sql);
	$COUNT=$row[0];
	$COUNT=$COUNT+1;
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
			?>
	 <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
     <script>
function addRow()
   {
	  var count=document.getElementById("rows").value
   var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	
	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><select  name='descr[]' id='descr"+Row+"' class='textbox1 print-type'  data-row='"+Row+"'><option value=''>Select Service Name </option><?php $p=mysqli_query($link,"select * from sevices");while($row=mysqli_fetch_array($p)){?> <option value='<?php  echo $row['id']?>'><?php echo $row['serv_name']; ?></option> <?php } ?></select> </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='days1[]'  id='days10"+Row+"'class='textbox1 changesNo2 ' size='8' style='text-align:right'  value='0'  data-row='"+Row+"' > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='amount1[]' id='amount1"+Row+"'class='textbox1' size='8' style='text-align:right'  data-row='"+Row+"'  value='0' > </div>"; 
     row.appendChild(oCell);
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='total1[]' id='total1"+Row+"'class='textbox1 totalLinePrice txt '  data-row='"+Row+"' size='8' style='text-align:right'   > </div>"; 
     row.appendChild(oCell);

	  //oCell = document.createElement("TD");
	 	// oCell.innerHTML = ""; 
     //row.appendChild(oCell);

     document.getElementById("rows").value=Row;

   }

 function deleteRow()
   {	
var rr=document.getElementById("rows").value

if(rr!=0){
   // var oRow = rr.parentNode.parentNode;
    document.getElementById("TABLE1").deleteRow(rr);  
	var row=document.getElementById("rows").value
	document.getElementById("rows").value=row-1;
total();
	}
	else{
	alert('Please Select Atleast One Row');
	return false;
	}
   }
   </script>		
	<script>
$(document).ready(function(){
$(".txt").each(function(){
$(this).keyup(function(){
calculateSum();
});
});
});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#txtTot").val(sum.toFixed(2));
t2=$("#txtTot").val();
$("#txtTot1").val(sum.toFixed(2));
t11=$("#txtTot1").val();
labtot=$("#labtot").val();
pharmacytot=$("#pharmacytot").val();
t15=parseFloat(t11)+parseFloat(labtot)+parseFloat(pharmacytot);
$("#txtTot1").val(t15.toFixed(2));
$("#netamt").val(t15.toFixed(2));

hospitalpaid=$("#hosppaid").val();
hospdue=parseFloat(t2)-parseFloat(hospitalpaid);
$("#hospdue").val(hospdue.toFixed(2));
labpaid=$("#labpaid").val();
pharmacypaid=$("#pharmacypaid").val();
tp=parseFloat(hospitalpaid)+parseFloat(labpaid)+parseFloat(pharmacypaid)
$("#totpaid").val(tp.toFixed(2));
tt=$("#txtTot1").val();
tp1=$("#totpaid").val();
tdue=parseFloat(tt)-parseFloat(tp1);
$("#totdue").val(tdue.toFixed(2));
}
</script>  
 <script>
 $(document).on('change', '.print-type', function(){
 //alert($(this).attr('data-row'));
 showHint54(this.value,$(this).attr('data-row'));

 });
 </script>
 <script>
$(document).on('keyup ','.changesNo2',function(){
	
	id = $(this).attr('data-row');
	
	//alert(id);
	days10 = $('#days10'+id).val();
	//alert(days10);
	amount1 = $('#amount1'+id).val();
		//alert(amount1);
	mm= $('#total1'+id).val( (parseFloat(days10)*parseFloat(amount1)).toFixed(2) );
	calculateTotal();
	
	
});
function calculateTotal(){
	subTotal = 0 ; total = 0; 
	$('.txt').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#txtTot').val( subTotal.toFixed(2) );
	t1=$('#txtTot').val();
	$('#txtTot1').val( subTotal.toFixed(2) );
	t25=$('#txtTot1').val();
	labtot=$("#labtot").val();
pharmacytot=$("#pharmacytot").val();
t26=parseFloat(t25)+parseFloat(labtot)+parseFloat(pharmacytot);
$("#txtTot1").val(t26.toFixed(2));
$("#netamt").val(t26.toFixed(2));
	
	hospitalpaid=$("#hosppaid").val();
hospdue=parseFloat(t1)-parseFloat(hospitalpaid);
$("#hospdue").val(hospdue.toFixed(2));
labpaid=$("#labpaid").val();
pharmacypaid=$("#pharmacypaid").val();
tp=parseFloat(hospitalpaid)+parseFloat(labpaid)+parseFloat(pharmacypaid)
$("#totpaid").val(tp.toFixed(2));

tp1=$("#totpaid").val();
tdue=parseFloat(t26)-parseFloat(tp1);
$("#totdue").val(tdue.toFixed(2));
	//$('#txtTot1').val( subTotal.toFixed(2) );
	//$('#netamt').val( subTotal.toFixed(2) );
	
}
</script>
<script>
$(document).on('keyup ','.tet',function(){
	//calculateTotal2();
	id = $(this).attr('data-row');
	
	days = $('#days'+id).val();
	
	cost = $('#cost'+id).val();
		
	$amnt= $('#amnt'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal2();
	
});
function calculateTotal2(){
	subTotal = 0 ; total = 0; 
	$('.txt').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#txtTot').val(subTotal.toFixed(2) );
	t=$('#txtTot').val();
	//alert(t);
	$('#txtTot1').val(subTotal.toFixed(2));
	t3=$('#txtTot1').val();
	//alert(t3);
	labtot=$("#labtot").val();
pharmacytot=$("#pharmacytot").val();
t5=parseFloat(t3)+parseFloat(labtot)+parseFloat(pharmacytot);
$("#txtTot1").val(t5.toFixed(2));
$("#netamt").val(t5.toFixed(2));


hospitalpaid=$("#hosppaid").val();
hospdue=parseFloat(t)-parseFloat(hospitalpaid);
$("#hospdue").val(hospdue.toFixed(2));
labpaid=$("#labpaid").val();
pharmacypaid=$("#pharmacypaid").val();
tp=parseFloat(hospitalpaid)+parseFloat(labpaid)+parseFloat(pharmacypaid)
$("#totpaid").val(tp.toFixed(2));

tp1=$("#totpaid").val();
tdue=parseFloat(t5)-parseFloat(tp1);
$("#totdue").val(tdue.toFixed(2));
}
</script>

<script>
$(document).on('keyup ','.final1',function(){
	
	txtTot = $('#txtTot').val();

	labtot = $('#labtot').val();
	pharmacytot = $('#pharmacytot').val();
	
	 $('#txtTot1').val( (parseFloat(txtTot)+parseFloat(labtot)+parseFloat(pharmacytot)).toFixed(2) );
	tot= $('#txtTot1').val();
	tot1=$('#totpaid').val();
	
	$('#totdue').val(parseFloat(tot)-parseFloat(tot1).toFixed(2));
	$('#netamt').val( (parseFloat(txtTot)+parseFloat(labtot)+parseFloat(pharmacytot)).toFixed(2) );
	
});

$(document).on('keyup ','.changeno3',function(){
	txtTot = $('#txtTot').val();

	labtot = $('#labtot').val();
	pharmacytot = $('#pharmacytot').val();
	//alert(labtot);
	hosppaid = $('#hosppaid').val();
//alert('hi');
	labpaid = $('#labpaid').val();
	pharmacypaid = $('#pharmacypaid').val();
	
	hospdue=parseFloat(txtTot)-parseFloat(hosppaid);
	$('#hospdue').val(hospdue.toFixed(2));
	
	labdue=parseFloat(labtot)-parseFloat(labpaid);
	$('#labdue').val(labdue.toFixed(2));
	
	pharmacydue=parseFloat(pharmacytot)-parseFloat(pharmacypaid);
	$('#pharmacydue').val(pharmacydue.toFixed(2));
	
	
	 $('#totpaid').val( (parseFloat(hosppaid)+parseFloat(labpaid)+parseFloat(pharmacypaid)).toFixed(2) );
	//$('#netamt').val( (parseFloat(txtTot)+parseFloat(labtot)+parseFloat(pharmacytot)).toFixed(2) );
	tot = $('#totpaid').val();
	txtTot1 = $('#txtTot1').val();
	totdue=parseFloat(txtTot1)-parseFloat(tot);
	
	$('#totdue').val((parseFloat(txtTot1)-parseFloat(tot)).toFixed(2));
	
});


$(document).on('keyup ','.final2',function(){
	tot= $('#txtTot1').val();
	
	tatcon=$('#txtconces').val();
	
	
	
	$('#netamt').val( (parseFloat(tot)-parseFloat(tatcon)).toFixed(2));
	net=$('#netamt').val();
	tot = $('#totpaid').val();
	$('#totdue').val((parseFloat(net)-parseFloat(tot)).toFixed(2));
});

</script>


  <script>
   function calc(){
   var nooftimes=document.myform.nooftimes.value;
var cost=document.myform.cost.value;
 if(nooftimes==""){
  document.myform.grbs.value=0;
 }else{
   document.myform.grbs.value=eval(nooftimes)*eval(cost)
   total();
   }
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
	
	document.getElementById("bed_chrg").value=strar[1]; 	
	document.getElementById("int_chrg").value=strar[2];
	document.getElementById("nur_chrg").value=strar[3];
	document.getElementById("mnr_chrg").value=strar[4];
	document.getElementById("pump_chrg").value=strar[6];
	document.getElementById("ven_chrg").value=strar[7];
	document.getElementById("hous_chrg").value=strar[5];
    }
  }         
  str = encodeURIComponent(str);
xmlhttp.open("GET","get-data.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint53(str)
{
var roomtype=document.getElementById('roomtype').value;
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
	
	document.getElementById("genbed").value=strar[1]; 	
	document.getElementById("nurcharg").value=strar[2];
	document.getElementById("dmo").value=strar[3];
	
    }
  }         
  str = encodeURIComponent(str);
xmlhttp.open("GET","get-data1.php?q="+str+"&roomtype="+roomtype,true);
xmlhttp.send();
}
</script>
<script>
function showHint54(str,R)
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
	
	document.getElementById("amount1"+R).value=strar[1]; 	
	
    }
  }         
  str = encodeURIComponent(str);
xmlhttp.open("GET","get-data2.php?q="+str,true);
xmlhttp.send();
}
</script>
   


	</head>

	<body>
	
	<?php /*?><div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php
			include("main_menu.php");
			?>
		  <?php */?>
		<?php
			// include("config.php");
			$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str = "BL-".$dt3."-";
			$sql = mysqli_query($link,"select count(distinct bno) from final_bill where bno like '$str%'")or die(mysqli_error($link));
			if($sql){
				$res = mysqli_fetch_array($sql);
				$c = $res[0];
				$bno = $str.($c+1);
			}
		?>

		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">ADD FINAL BILL</h1>
          
        <form name="cart" method="post" action="insert_finalbill.php">
                

<input type="hidden" name="authby" value="<?php echo $aname ?>"/>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="label1"><div align="right"></div></td>
		<td width="20%" class="label1"><div align="right">Bill No &nbsp; : </div></td>
		<td width="29%"><div align="left">
		  <input name="billno" type="text" class="text" readonly="readonly" value="<?php echo $bno ?>"/>
		</div></td>
		<td width="17%"class="label1"><div align="right">Bill Date  &nbsp; : </div></td>
		<td >
			<div align="left">
			  <input name="billdate" type="text" class="tcal" readonly value="<?php echo date('d-m-Y');?>" />
		   </td></tr>
	</table>
	
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<tr style="height:10px;"></tr>
		<tr>
		  <td width="20%" class="label1"><div align="right">Patient No </div></td>
		  <td width="29%" ><div align="left">
			  <input name="patno" type="text" class="text"  id="patno" onclick="window.open('finalbill1_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" onfocus="total()"/>
		  </div></td>
		  <td width="17%" class="label1"><div align="right">Patient UMR No </div></td>
		  <td ><div align="left">
			  <input name="patregno" id="patregno" type="text" class="text" readonly="readonly"/>
		  </div></td>
		</tr>
			<tr style="height:10px;"></tr>
        
        <tr>
		  <td class="label1"><div align="right">Patient Name </div></td>
		  <td><div align="left">
			  <input name="patname" id="patname" type="text" class="text" readonly="readonly"/>
		  <td class="label1"><div align="right">Age/Sex </div></td>
		  <td><div align="left">
			  <input name="age" id="age" type="text" size="11" readonly="readonly"/>
			  <input name="sex"  id="sex" type="text" size="11" readonly="readonly"/>
		  </div></td></div></td>
          
		</tr>
        	<tr style="height:10px;"></tr>
        <tr>
		  <td class="label1"><div align="right">Address </div></td>
		  <td><div align="left">
			  <input name="addr" id="addr" type="text" class="text" readonly="readonly"/>
		  </div></td>
		 
		  <td class="label1"><div align="right">Consult Doctor </div></td>
		  <td><div align="left">
			<input name="con_doct" id="con_doct" type="text" class="text" readonly="readonly"/>
		  </div></td>
		</tr>
        	<tr style="height:10px;"></tr>
          <tr>
		  <td class="label1"><div align="right">Contact No </div></td>
		  <td><div align="left">
			  <input name="contact" id="contact" type="text" class="text" readonly="readonly"/>
		  <td class="label1"><div align="right">Relation/Name </div></td>
		  <td><div align="left">
			  <input name="rel_type" id="rel_type" type="text" size="11" readonly="readonly"/>
			  <input name="rel_name"  id="rel_name" type="text" size="11" readonly="readonly"/>
		  </div></td></div></td>
          
		</tr>
        
        	<tr style="height:10px;"></tr>
       
		<tr>
		  <td class="label1"><div align="right">Admission Date </div></td>
		  <td><div align="left">
			<input name="admdt" id="admdt" type="text" class="tcal" size="10" readonly />
		  </div></td>
		  <td class="label1"><div align="right">Discharge Date</div></td>
		  <td><div align="left">
			<input name="DisDate" id="DisDate" type="text" class="tcal" size="10" readonly />
		  </div></td>
		</tr>
			<tr style="height:10px;"></tr>
	</table>
      
   
       
   
      <table width="100%" id="TABLE1">
 <thead>
  <tr align="center">

  <th class="TH1">Description</th>
   <th class="TH1">Days/Hours</th>
    <th class="TH1">Charge</th>
 <th class="TH1">Total </th>
  
<th class="THH1"><input name="new" type="button" class="butnbg1" value="  +  " onclick="javascript:addRow()">&nbsp; <input name="new2" type="button" class="butnbg1" value="  -  " onclick="javascript:deleteRow()"></th>

 </tr></thead>
</table>

	<div id="outcons">
	<table width="98%" border="0" cellspacing="3" cellpadding="3">
	  <tr>
		<td class="label1"><div align="right"></div></td>
		<td ><div align="left">
			<input name="OutName"  id="OutName" type="hidden" class="hidden" size="20"/>
			<input name="flag" type="hidden"   value="0" size="12"/>
		</div></td>
		<td class="label1"><div align="right"> </div></td>
		<td class="label1">
		  <div align="left">
			<input name="spec" id="spec" type="hidden" class="text" size="20"/>
		  </div></td>
		<td class="label1"><div align="right"></div></td>
		<td ><input name="out_amt" id="out_amt" type="hidden" class="text" style="text-align:right" size="8"/></td>
	  </tr>
	</table>
	</div>
	<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td class="filepath_bg"><div align="left"><font color="#000"><b><span class="tdbg1">Bed Side Sevices</span></b></font></div></td>
		</tr>
	</table>-->
	
<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr style="display:none">
	  <td class="filepath_bg"><div align="left"><font color="#F05A00"><b><span class="tdbg1">Attender Charges</span></b></font></div></td>
	</tr>
</table>-->
<table>
    
    <tr>
		  
		  <td class="label1"><div align="right">Total Hospital  Amount </div></td>
		  <td><div align="left">
			  <input name="txtTot" id="txtTot" type="text" class="text final1 txt4" style="text-align:right"   value="0" size="8" readonly/>
		  </div></td> 
           <td class="label1"><div align="right"> Advance  Amount </div></td>
		  <td><div align="left">
			  <input name="hosppaid" id="hosppaid"type="text" class="text changeno3" style="text-align:right"  value="0" size="8" readonly/>
		  </div></td>
           <td class="label1"><div align="right"> Due  Amount </div></td>
		  <td><div align="left">
			  <input name="hospdue" id="hospdue"type="text" class="text" style="text-align:right"   value="0" size="8" readonly/>
		  </div></td>
		</tr>
        	<tr style="height:10px;"></tr>
         <tr>
		  
		  <td class="label1"><div align="right">Total Lab Amount </div></td>
		  <td><div align="left">
			  <input name="labtot" id="labtot" value="0" type="text" class="text final1 txt4"  size="8" style="text-align:right"  />
		  </div></td>
          <td class="label1"><div align="right">Paid Amount </div></td>
		  <td><div align="left">
			  <input name="labpaid" id="labpaid" value="0" type="text" class="text changeno3"  size="8" style="text-align:right" />
		  </div></td>
          
          <td class="label1"><div align="right">Due Amount </div></td>
		  <td><div align="left">
			  <input name="labdue" id="labdue" value="0" type="text" class="text "  size="8" style="text-align:right"  />
		  </div></td>
		</tr>
        	<tr style="height:10px;"></tr>
        
        
        <tr>
		  
		  <td class="label1"><div align="right">Total Pharmacy Amount </div></td>
		  <td><div align="left">
			  <input name="pharmacytot" id="pharmacytot" value="0" type="text" class="text final1 txt4"  size="8" style="text-align:right"  />
		  </div></td>
          <td class="label1"><div align="right">Paid Amount </div></td>
		  <td><div align="left">
			  <input name="pharmacypaid" id="pharmacypaid" value="0" type="text" class="text changeno3"  size="8" style="text-align:right" onkeyup="total()" />
		  </div></td>
          
          <td class="label1"><div align="right">Due Amount </div></td>
		  <td><div align="left">
			  <input name="pharmacydue" id="pharmacydue" value="0" type="text" class="text "  size="8" style="text-align:right" onkeyup="total()" />
		  </div></td>
		</tr>
			<tr style="height:10px;"></tr>
        </table>

  
        
        
        
        
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td class="filepath_bg"><div align="left"><font color="#000"><strong>Amount Details </strong></font></div></td>
  </tr>
</table>
<table  width="100%" border="0" cellpadding="3" cellspacing="3">
	<tr>
	  <td class="label1"><div align="left">Total(Rs.) </div></td>
	  <td align="left"><div >
		<input name="txtTot1" id="txtTot1" type="text" class="text final2" style="text-align:right"   value="0" size="8" readonly/>
        
</div></td>
	  
       <td class="label1"><div align="left">Total Paid(Rs.) </div></td>
	  <td align="left"><div >
		<input name="totpaid" id="totpaid" type="text" class="text " style="text-align:right"   value="0" size="8" readonly/>
        
</div></td>

 <td class="label1"><div align="left">Total Due(Rs.) </div></td>
	  <td align="left"><div >
		<input name="totdue" id="totdue" type="text" class="text " style="text-align:right"   value="0" size="8" readonly/>
        
</div></td>
	</tr>
    	<tr style="height:10px;"></tr>
    <tr>
	  
	  <td class="label1"><div align="left"> Total Concession(Rs.) </div></td>
	  <td><div align="left">
		  <input name="txtconces" id="txtconces" type="text" class="text final2" style="text-align:right"   value="0" size="8" />
	  </div></td>
      
	</tr>
		<tr style="height:10px;"></tr>
	<tr>
	  <td class="label1"><div align="left">Net Amount </div></td>
	  <td><div align="left">
		  <input name="netamt" id="netamt" type="text" class="text " style="text-align:right"  value="0" size="8" />
	  </div></td>
	 
	  <td colspan="2" class="label1"><div align="right"><span id="arogya">
		<input type=hidden name='arogya' id='arogya' value="0" size="5" />
		<input type=hidden name='arogya1' id='arogya1'  style='text-align:left' class='text'>
	  </span>&nbsp; </div>                                                    <div align="left"></div></td>
	</tr>
   
	 	<tr style="height:10px;"></tr> 
   
</table>
<input type="hidden" name="rows" id="rows" value="0" >
<input type="hidden" name="screen" id="screen" value="add" >
			
	
        
<table width="100%" border="0" cellpadding="3" cellspacing="3">
<tr><td colspan="4" align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='final_bill.php'"/></td></tr></table>
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