<?php //include('config.php');

session_start();
include('config.php');

if($_SESSION['name1'])

{
	$aname = $_SESSION['name1'];
	
	$sql = mysql_query("select ifnull(max(bill_no+0),0) from final_bill");
	$COUNT=0;
	$row = mysql_fetch_array($sql);
	$COUNT=$row[0];
	$COUNT=$COUNT+1;
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header1.php");
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
    oCell.innerHTML = "<div align='center' ><select  name='docname[]' id='docname"+Row+"' class='textbox1 print-type'  data-row='"+Row+"'><option value=''>Select Doctor Name </option><?php $p=mysql_query("select * from doct_infor");while($row=mysql_fetch_array($p)){?> <option value='<?php  echo $row['id']?>'><?php echo $row['dname1']; ?></option> <?php } ?></select> </div>"; 
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







//labtot=$("#labtot").val(sum.toFixed(2));
//pharmacytot=$("#pharmacytot").val(sum.toFixed(2));
//$("#txtTot1").val((sum+parseFloat(labtot)+parseFloat(pharmacytot)).toFixed(2));
//$("#netamt").val(((parseFloat(tot)+parseFloat(labtot)+parseFloat(pharmacytot)).toFixed(2));
//$("#price").val(sum.toFixed(2));
//$("#bal").val(sum.toFixed(2));


}
</script>  
 <script>
 $(document).on('change', '.print-type', function(){
 //alert($(this).attr('data-row'));
 showHint54(this.value,$(this).attr('data-row'));
 //alert($(this).attr('data-row'));
 //showHintk(this.value,$(this).attr('data-row'));
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
	$mm= $('#total1'+id).val( (parseFloat(days10)*parseFloat(amount1)).toFixed(2) );

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
	//$('#txtTot1').val( subTotal.toFixed(2) );
	//$('#netamt').val( subTotal.toFixed(2) );
	
}
</script>

<script>
$(document).on('keyup ','.final1',function(){
	
	txtTot = $('#txtTot').val();

	labtot = $('#labtot').val();
	pharmacytot = $('#pharmacytot').val();
	
	tot= $('#txtTot1').val( (parseFloat(txtTot)+parseFloat(labtot)+parseFloat(pharmacytot)).toFixed(2) );
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
xmlhttp.open("GET","get-data1.php?q="+str,true);
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
	
	<div id="conteneur">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
<?php */?>	<?php
include("logo.php");
			include("main_menu.php");
			$id=$_REQUEST['id'];
			$q=mysql_query("select * from manual_bill where BILL_NO='$id'") or die(mysql_error());
			$rs=mysql_fetch_array($q);
			$BILL_NO=$rs['BILL_NO'];
			$bno=$rs['bno'];
			$BILL_DATE=$rs['BILL_DATE'];
			$PatientNo=$rs['PatientNo'];
			$PatientMRNo=$rs['PatientMRNo'];
			$PatientName=$rs['PatientName'];
			$Age=$rs['Age'];
			$Sex=$rs['Sex'];
			$Address=$rs['Address'];
			$ConsultDoctor=$rs['ConsultDoctor'];
			$ContactNo=$rs['ContactNo'];
			$Relation=$rs['Relation'];
			$RelationName=$rs['RelationName'];
			$AdmissionDate=$rs['AdmissionDate'];
			$DischargeDate=$rs['DischargeDate'];
			$icudays=$rs['icudays'];
			$gendays=$rs['gendays'];
			$icubed=$rs['icubed'];
			$icuintensit=$rs['icuintensit'];
			$icunursing=$rs['icunursing'];
			$genbed=$rs['genbed'];
			$gennursing=$rs['gennursing'];
			$gendmo=$rs['gendmo'];
			$Criticalcare=$rs['Criticalcare'];
			$CARMcare=$rs['CARMcare'];
			$otcharge=$rs['otcharge'];
			$otconcession=$rs['otconcession'];
			$otinstrument=$rs['otinstrument'];
			$Anaesthesia=$rs['Anaesthesia'];
			$Surgeon=$rs['Surgeon'];
			$AsstSurgeon=$rs['AsstSurgeon'];
			$Anaesthetist=$rs['Anaesthetist'];
			$Anaesthetistconnession=$rs['Anaesthetistconnession'];
			$tothosp=$rs['tothosp'];
			$totlab=$rs['totlab'];
			$totpharmacy=$rs['totpharmacy'];
			$dresscharg=$rs['dresscharg'];
			$totamt=$rs['totamt'];
			$totconsession=$rs['totconsession'];
			$netamt=$rs['netamt'];
			$hospaid=$rs['hospaid'];
			$hospdue=$rs['hospdue'];
			$labpaid=$rs['labpaid'];
			$labdue=$rs['labdue'];
			$pharmacypaid=$rs['pharmacypaid'];
			$pharmacydue=$rs['pharmacydue'];
			$totpaid=$rs['totpaid'];
			$totdue=$rs['totdue'];
			$roomtype=$rs['roomtype'];
			$surgery=$rs['surgery'];
			
			$surgeryamount=$rs['surgeryamount'];
			
			?>
		  
		


		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">EDIT MHS BILL</h1>
          
        <form name="cart" method="post" action="update_manualbill.php">
                

<input type="hidden" name="authby" value="<?php echo $aname ?>"/>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="label1"><div align="right"></div></td>
		<td width="20%" class="label1"><div align="right">Bill No &nbsp; : </div></td>
		<td width="29%"><div align="left">
		  <input name="billno" type="text" class="text" readonly="readonly" value="<?php echo $bno ?>"/>
		   <input name="billno1" type="hidden" class="text" readonly="readonly" value="<?php echo $BILL_NO ?>"/>
		</div></td>
		<td width="17%"class="label1"><div align="right">Bill Date  &nbsp; : </div></td>
		<td >
			<div align="left">
			  <input name="billdate" type="text" class="tcal" readonly value="<?php echo date('d-m-Y',strtotime($BILL_DATE));?>" />
		   </td></tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td class="filepath_bg"><div align="left"><font color="#000"><strong>Patient Details </strong></font></div></td>
	</tr>
	</table>
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<tr>
		  <td width="20%" class="label1"><div align="right">Patient No </div></td>
		  <td width="29%" ><div align="left">
			  <input name="patno" type="text" class="text"  id="patno" value="<?php echo $PatientNo ?>" onclick="window.open('finalbill_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" onfocus="total()"/>
		  </div></td>
		  <td width="17%" class="label1"><div align="right">Patient UMR No </div></td>
		  <td ><div align="left">
			  <input name="patregno" id="patregno" type="text" value="<?php echo $PatientMRNo ?>" class="text" readonly="readonly"/>
		  </div></td>
		</tr>
		
        
        <tr>
		  <td class="label1"><div align="right">Patient Name </div></td>
		  <td><div align="left">
			  <input name="patname" id="patname" type="text" class="text" readonly="readonly" value="<?php echo $PatientName ?>"/>
		  <td class="label1"><div align="right">Age/Sex </div></td>
		  <td><div align="left">
			  <input name="age" id="age" type="text" size="11" readonly="readonly" value="<?php echo $Age ?>"/>
			  <input name="sex"  id="sex" type="text" size="11" readonly="readonly" value="<?php echo $Sex ?>"/>
		  </div></td></div></td>
          
		</tr>
        
        <tr>
		  <td class="label1"><div align="right">Address </div></td>
		  <td><div align="left">
			  <input name="addr" id="addr" type="text" class="text" readonly="readonly" value="<?php echo $Address ?>"/>
		  </div></td>
		 
		  <td class="label1"><div align="right">Consult Doctor </div></td>
		  <td><div align="left">
			<input name="con_doct" id="con_doct" type="text" class="text" readonly="readonly" value="<?php echo $ConsultDoctor ?>"/>
		  </div></td>
		</tr>
        
          <tr>
		  <td class="label1"><div align="right">Contact No </div></td>
		  <td><div align="left">
			  <input name="contact" id="contact" type="text" class="text" readonly="readonly" value="<?php echo $ContactNo ?>"/>
		  <td class="label1"><div align="right">Relation/Name </div></td>
		  <td><div align="left">
			  <input name="rel_type" id="rel_type" type="text" size="11" readonly="readonly" value="<?php echo $Relation ?>"/>
			  <input name="rel_name"  id="rel_name" type="text" size="11" readonly="readonly" value="<?php echo $RelationName ?>"/>
		  </div></td></div></td>
          
		</tr>
        
        
       
		<tr>
		  <td class="label1"><div align="right">Admission Date </div></td>
		  <td><div align="left">
			<input name="admdt" id="admdt" type="text" class="tcal" size="10" value="<?php echo date('d-m-Y',strtotime($AdmissionDate)); ?>" readonly />
		  </div></td>
		  <td class="label1"><div align="right">Discharge Date</div></td>
		  <td><div align="left">
			<input name="DisDate" id="DisDate" type="text" class="tcal" size="10" value="<?php echo date('d-m-Y',strtotime($DischargeDate)); ?>" readonly />
		  </div></td>
		</tr>
        <tr>
		  <td class="label1"><div align="right">No of Days in ICU </div></td>
		  <td><div align="left">
			<input name="icudays" id="icudays" type="text" value="<?php echo $icudays ?>"  readonly />
		  </div></td>
		  <td class="label1"><div align="right">No of Days in Gen</div></td>
		  <td><div align="left">
			<input name="gendays" id="gendays" type="text" value="<?php echo $gendays ?>" readonly />
		  </div></td>
		</tr>
       <!-- <tr>
		  <td class="label1"><div align="right"></div></td>
		  <td><div align="left">
			
		  </div></td>
		  <td class="label1"><div align="right">Date of Surgery</div></td>
		  <td><div align="left">
			<input name="surDate" id="surDate" type="text" class="tcal" size="10"  />
		  </div></td>
		</tr>-->
        
		<tr style="display:none">
		  <td class="label1"><div align="right">Payment Type </div></td>
		  <td><div align="left">
			  <input name="constype" id="constype" type="text" class="text" readonly="readonly"/>
		  </div></td>
		  <td class="label1"><div align="right">Card No </div></td>
		  <td><div align="left">
			  <input name="conscardno" id="conscardno" type="text" class="text" readonly="readonly"/>
		  </div></td>
		</tr>
		
	</table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td class="filepath_bg" ><div align="center"><font color="#000"><strong>ICU Charges </strong></font></div></td>
           <td class="filepath_bg" ><div align="center"><font color="#000"><strong>General/Special Ward Charges </strong></font></div></td>
		</tr>
	</table>
    
    	<table width="100%" border="0" cellspacing="3" cellpadding="0">
            <tr>
          <td width="20%" class="label1">
			<!--<input type="button" name="rent1" value="Rent Info" class="butnbg1" onclick="javascript:roomRencalc1()"/>-->
			
		
		  </td>  
          <td  ><div align="left">
			 <!-- <input name="genral" id="genral" type="text" class="text"  size="8" style="text-align:right" onkeyup="total()" />-->
		  </div></td>
           <td width="20%" class="label1"><div align="right" >Select Room Type </div></td>
		  <td width="29%"><div align="left">
			<select name="roomtype" id="roomtype" style="width:200px;" required>
            <option value="">Select Room Type</option>
            <option value="general" <?php if($roomtype=='general'){echo 'selected';} ?>>General</option>
            <option value="special" <?php if($roomtype=='special'){echo 'selected';} ?>>Special</option>
            </select>
			<!--<input type="button" name="rent" value="Rent Info" class="butnbg1" onclick="javascript:roomRencalc()"/>-->
		  </div></td>
		  
          
          </tr>                                   
		<tr>
		  <td width="20%" class="label1"><div align="right">No.of days in ICU </div></td>
		  <td width="29%"><div align="left">
          <input name="icu_days" id="icu_days" type="text" class="textbox1" style="text-align:right" value="<?php echo $icudays ?>"   onfocus="showHint52(this.value);" onchange="showHint52(this.value);" size="8"/>
			<!--<input type="button" name="rent1" value="Rent Info" class="butnbg1" onclick="javascript:roomRencalc1()"/>-->
			
		
		  </div></td>   <td width="20%" class="label1"><div align="right" >No.of days in GEN </div></td>
		  <td width="29%"><div align="left">
			<input name="txtgen" id="txtgen" type="text" class="textbox1" style="text-align:right" value="<?php echo $gendays ?>"  onkeyup="showHint53(this.value);"  size="8"/>
			<!--<input type="button" name="rent" value="Rent Info" class="butnbg1" onclick="javascript:roomRencalc()"/>-->
		  </div></td>
		  <td  ><div align="left">
			 <!-- <input name="genral" id="genral" type="text" class="text"  size="8" style="text-align:right" onkeyup="total()" />-->
		  </div></td></tr>
          
          <tr>
			<td  class="label1"><div align="right">Bed Charges </div></td>
		  <td ><div align="left">
			  <input name="bed_chrg" id="bed_chrg" type="text" class="text txt"  value="<?php echo $icubed ?>" size="8" style="text-align:right" onkeyup="total()" />
		  </div></td>
          
           <td width="17%" class="label1"><div align="right">Bed charges  </div></td>
		  <td  ><div align="left">
			  <input name="genbed" id="genbed" type="text" class="text txt" value="<?php echo $genbed ?>"  size="8" style="text-align:right" onkeyup="total()" />
		  </div></td>
          </tr>
          
           <tr>
			<td  class="label1"><div align="right">Intensivist/DR </div></td>
		  <td ><div align="left">
			  <input name="int_chrg" id="int_chrg" type="text" class="text txt" value="<?php echo $icuintensit ?>"  size="8" style="text-align:right" onkeyup="total()" />
		  </div></td>
          
          <td  class="label1"><div align="right">Nursing Charges  </div></td>
		  <td ><div align="left">
			  <input name="nurcharg" id="nurcharg" type="text" class="text txt" value="<?php echo $gennursing ?>"  size="8" style="text-align:right" onkeyup="total()" />
		  </div></td>
          </tr>
          
          <tr>
			<td  class="label1"><div align="right">Nursing Charges </div></td>
		  <td ><div align="left">
			  <input name="nur_chrg" id="nur_chrg" type="text" class="text txt" value="<?php echo $icunursing ?>"  size="8" style="text-align:right" onkeyup="total()" />
		  </div></td>
            <td  class="label1"><div align="right">DMO Charges</div></td>
          <td ><div align="left">
			  <input name="dmo" id="dmo" type="text" class="text txt" value="<?php echo $gendmo ?>"  size="8" style="text-align:right" onkeyup="total()" />
		  </div></td>
         
         
          </tr>
          
        
          
          
          
            
          
    
          
          
          </table>
   <table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr>
          <td>Surgery Package<select name="surgery" id="surgery">
          <option value="">Select Surgery</option>
          <option value="yes" <?php if($surgery=='yes'){echo 'selected';} ?>>Yes</option>
          <option value="no" <?php if($surgery=='no'){echo 'selected';} ?>>No</option>
          
          </select></td>
          <td>
          <?php if($surgery=='yes'){ ?>
          <input type="text" class="txt text" name="surgeryamount" value="<?php echo $surgeryamount; ?>" id="surgeryamount" />
          <?php }else{}?>
          </td>
          </tr>
          </table>
        <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
        <td><b><u>Description</u></b></td>
        <td><b>Days</b></td>
        <td><b>Charge</b></td>
         <td><b>Amount</b></td>
        </tr>
        <?php 
		$k=mysql_query("select * from manual_other_desc where fid='$id'") or die(mysql_error());
		
		$i=1;
		while($rs=mysql_fetch_array($k)){
		?>
        <tr>
        <td><input type="hidden" name="tname[]" value="<?php echo $rs['description']; ?>"/><?php echo $rs['description']; ?></td>
        <td><input type="text" name="days[]" class="tet" id="days<?php echo $i; ?>"  size="5" palceholder="Days" data-row="<?php echo $i; ?>" value="<?php echo $rs['days']; ?>" /><input type="hidden" name="fid[]" class="tet" id="fid"  size="5"   value="<?php echo $rs['id']; ?>" /></td>
        <td><input type="text" name="cost[]" id="cost<?php echo $i; ?>" value="<?php echo $rs['amount']; ?>" data-row="<?php echo $i; ?>" readonly size="8"/></td>
        <td><input type="text" name="amnt[]" id="amnt<?php echo $i; ?>" value="<?php echo $rs['total']; ?>" size="10" class="txt" readonly="readonly"/></td>
        </tr>
        <?php $i++; } ?>
        
        </table>
       
    
    	<table width="100%" border="0" cellspacing="3" cellpadding="0">
                                              
		
          
    
          
          
          </table>
    
    
    
	<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		 
		</tr>
	</table>-->
											
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td class="filepath_bg"><div align="left"><font color="#000"><b>Operation Theatre Charges</b></font></div></td>
		</tr>
	</table>
	<div id="oprationdiv">
		<table width="100%" border="0" cellspacing="3" cellpadding="3">
			<tr>
			  <td width="20%" class="label1"><div align="right">Critical Care Support </div></td>
			  <td width="29%" >
				  <div align="left">
					<input name="txtcritical" id="txtcritical" type="text" class="text txt"  style="text-align:right"  value="<?php  echo $Criticalcare?>" size="8" />
			  </div></td>
			  <td width="17%" class="label1"><div align="right">CARM Charges </div></td>
			  <td ><div align="left">
				  <input name="carm" id="carm" type="text" class="text txt" style="text-align:right"   size="8" value="<?php  echo $CARMcare?>" onkeyup="total()"/>
			  </div></td>
			</tr>
			<tr>
			  <td class="label1"><div align="right">OperationTheater Charges </div></td>
			  <td><div align="left">
				  <input name="oper" id="oper"type="text" class="text txt" style="text-align:right"   size="8" value="<?php  echo $otcharge?>" onkeyup="total()" />
			  </div></td>
			  <td class="label1"><div align="right">OperationTheater Concession </div></td>
			  <td><div align="left">
				  <input name="opercons" id="opercons"type="text" class="text txt" style="text-align:right"   size="8" value="<?php  echo $otconcession?>" onkeyup="total()" />
			  </div></td>
			</tr>
			<tr>
			  <td class="label1"><div align="right">OT Instrumentation Charges </div></td>
			  <td><div align="left">
				  <input name="txtinst" id="txtinst" type="text" class="text txt" style="text-align:right"   size="8" value="<?php  echo $otinstrument?>" onkeyup="total()"/>
			  </div></td>
			  <td class="label1"><div align="right">Anaesthesia/Disposable </div></td>
			  <td><div align="left">
				  <input name="txtAT" id="txtAT" type="text" class="txt"	 style="text-align:right"   size="8" value="<?php  echo $Anaesthesia?>" onkeyup="total()"/>
			  </div></td>
			</tr>
			<tr>
			  <td class="label1"><div align="right">Surgeon Charges </div></td>
			  <td><div align="left">
				<input name="txtsurg" id="txtsurg" type="text" class="text txt" style="text-align:right"   value="<?php  echo $Surgeon?>" size="8" onkeyup="total()" />
			  </div></td>
			  <td class="label1"><div align="right">Asst. Surgeon Charges </div></td>
			  <td><div align="left">
				  <input name="txtsurg_as" id="txtsurg_as" type="text" class="text txt" style="text-align:right"   value="<?php  echo $AsstSurgeon?>" size="8" onkeyup="total()"/>
			  </div></td>
			</tr>
			<tr>
			  <td class="label1"><div align="right">Anaesthetist Charges</div></td>
			  <td><div align="left">
				  <input name="txtanaestist" id="txtanaestist" type="text" class="text txt" style="text-align:right"   value="<?php  echo $Anaesthetist?>" size="8" onkeyup="total()" />
			  </div></td>
			  <td class="label1"><div align="right">Anaesthetist Concession </div></td>
			  <td><div align="left">
				  <input name="an_cons" id="an_cons" type="text" class="text txt" style="text-align:right"   size="8" value="<?php  echo $Anaesthetistconnession?>" onkeyup="total()" />
			  </div></td>
			</tr>
			<tr>
			  <td class="label1"><div align="right">Dressing Charges </div></td>
			  <td><div align="left">
				  <input name="dress" id="dress"type="text" class="text txt" style="text-align:right"   size="8" value="<?php  echo $dresscharg?>" onkeyup="total()"/>
			  </div></td>
			  <td class="label1">&nbsp;</td>
			  <td>&nbsp;</td>
			</tr>

	</div>
	</table>
   
   
      <table width="100%" id="TABLE1">
 <thead>
  <tr align="center">

  <th class="TH1">Dr.Name</th>
   <th class="TH1">No of Days Visit</th>
    <th class="TH1">Amount</th>
 <th class="TH1">Total </th>
  
<th class="THH1"><input name="new" type="button" class="butnbg1" value="  +  " onclick="javascript:addRow()">&nbsp; </th>

 </tr></thead>
 <?php 
		$k=mysql_query("select * from manual_doctor_visit where fid='$id'") or die(mysql_error());
		
		$i=1;
		while($rs=mysql_fetch_array($k)){
			$docname=$rs['docname'];
		?>
 <tr>
 <td><div align='center' ><select  name='docname[]' id='docname' class='textbox1 print-type'><option value=''>Select Doctor Name </option><?php $p=mysql_query("select * from doct_infor");while($row=mysql_fetch_array($p)){
	 $dd=$row['id'];
	 
	 ?> 
 <option value='<?php  echo $row['id']?>' <?php if($docname==$dd){echo 'selected';} ?>><?php echo $row['dname1']; ?></option>
  <?php } ?>
  </select> </div>
  </td>
 <td><div align='center' ><input  type='text' name='days1[]'  id='days10' class='textbox1 changesNo2' size='8' style='text-align:right'  value='<?php echo $rs['visits']; ?>'   ><input  type='hidden' name='did[]'  id='did' class='textbox1 changesNo2' size='8' style='text-align:right'  value='<?php echo $rs['id']; ?>'   > </div></td>
 <td><div align='center' ><input  type='text' name='amount1[]' id='amount1'class='textbox1' size='8' style='text-align:right' 
 value='<?php echo $rs['amount']; ?>' > </div></td>
 <td><div align='center' ><input  type='text' name='total1[]' id='total1'class='textbox1 totalLinePrice txt'   size='8' style='text-align:right'  value="<?php echo $rs['total']; ?>"  > </div></td>
 <td></td>
 </tr>
 
 <?php }?>
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
			  <input name="txtTot" id="txtTot" type="text" class="text final1 txt4" style="text-align:right"   value="<?php echo $tothosp; ?>" size="8" readonly/>
		  </div></td>
           <td class="label1"><div align="right"> Advance  Amount </div></td>
		  <td><div align="left">
			  <input name="hosppaid" id="hosppaid"type="text" class="text changeno3" style="text-align:right"  value="<?php echo $hospaid ?>" size="8" readonly/>
		  </div></td>
           <td class="label1"><div align="right"> Due  Amount </div></td>
		  <td><div align="left">
			  <input name="hospdue" id="hospdue"type="text" class="text" style="text-align:right"  value="<?php echo $hospdue ?>" size="8" readonly/>
		  </div></td>
		</tr>
        
         <tr>
		  
		  <td class="label1"><div align="right">Total Lab Amount </div></td>
		  <td><div align="left">
			  <input name="labtot" id="labtot" value="<?php echo $totlab; ?>" type="text" class="text final1 txt4"  size="8" style="text-align:right"  />
		  </div></td>
          <td class="label1"><div align="right">Paid Amount </div></td>
		  <td><div align="left">
			  <input name="labpaid" id="labpaid" value="<?php echo $labpaid ?>" type="text" class="text changeno3"  size="8" style="text-align:right" />
		  </div></td>
          
          <td class="label1"><div align="right">Due Amount </div></td>
		  <td><div align="left">
			  <input name="labdue" id="labdue" value="<?php echo $labdue ?>" type="text" class="text "  size="8" style="text-align:right"  />
		  </div></td>
		</tr>
        
        
        
        <tr>
		  
		  <td class="label1"><div align="right">Total Pharmacy Amount </div></td>
		  <td><div align="left">
			  <input name="pharmacytot" id="pharmacytot" value="<?php echo $totpharmacy; ?>" type="text" class="text final1 txt4"  size="8" style="text-align:right"  />
		  </div></td>
          <td class="label1"><div align="right">Paid Amount </div></td>
		  <td><div align="left">
			  <input name="pharmacypaid" id="pharmacypaid" value="<?php echo $pharmacypaid ?>" type="text" class="text changeno3"  size="8" style="text-align:right" onkeyup="total()" />
		  </div></td>
          
          <td class="label1"><div align="right">Due Amount </div></td>
		  <td><div align="left">
			  <input name="pharmacydue" id="pharmacydue" value="<?php echo $pharmacydue ?>" type="text" class="text "  size="8" style="text-align:right" onkeyup="total()" />
		  </div></td>
		</tr>
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
		<input name="txtTot1" id="txtTot1" type="text" class="text final2" style="text-align:right"   value="<?php echo $totamt; ?>" size="8" readonly/>
        
</div></td>
	   <td class="label1"><div align="left">Total Paid(Rs.) </div></td>
	  <td align="left"><div >
		<input name="totpaid" id="totpaid" type="text" class="text " style="text-align:right"   value="<?php echo $totpaid ?>" size="8" readonly/>
        
</div></td>

 <td class="label1"><div align="left">Total Due(Rs.) </div></td>
	  <td align="left"><div >
		<input name="totdue" id="totdue" type="text" class="text " style="text-align:right"   value="<?php echo $totdue ?>" size="8" readonly/>
        
</div></td>
	</tr>
    
    <tr>
	  
	  <td class="label1"><div align="left"> Total Concession(Rs.) </div></td>
	  <td><div align="left">
		  <input name="txtconces" id="txtconces" type="text" class="text final2" style="text-align:right"   value="<?php echo $totconsession; ?>" size="8" />
	  </div></td>
	</tr>
	<tr>
	  <td class="label1"><div align="left">Net Amount </div></td>
	  <td><div align="left">
		  <input name="netamt" id="netamt" type="text" class="text " style="text-align:right"  value="<?php echo $netamt; ?>" size="8" />
	  </div></td>
	 
	  <td colspan="2" class="label1"><div align="right"><span id="arogya">
		<input type=hidden name='arogya' id='arogya' value="0" size="5" />
		<input type=hidden name='arogya1' id='arogya1'  style='text-align:left' class='text'>
	  </span>&nbsp; </div>                                                    <div align="left"></div></td>
	</tr>
   
	  
   
</table>
<input type="hidden" name="rows" id="rows" value="0" >
<input type="hidden" name="screen" id="screen" value="add" >
			
	
        
<table width="100%" border="0" cellpadding="3" cellspacing="3">
<tr><td colspan="4" align="center"><input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='final_bill.php'"/></td></tr></table>
 </form>         
		       </div>

         
                  
         
 <script>                                               
									  
    $('#surgery').change(function () {
    var myValue = $(this).val();
    var myText = $("#surgery :selected").text();

    if (myValue != '' && myValue == "yes") {
		
        $("#surgeryamount").show();
    }
	if(myValue != '' && myValue == "no")
	{
        $("#surgeryamount").hide();
    }
});
</script>   

		

	</div>
<?php include('footer.php'); ?>
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