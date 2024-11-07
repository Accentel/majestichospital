<?php //include('config.php');
session_start();
include('config.php');
if($_SESSION['name1'])
{
$aname = $_SESSION['name1'];
$lr_id=$_REQUEST['lr_id'];
$cflag1="no";
$cflag2="no";
 $x="select distinct billing_type,cust_name,sales_type,sal_date,total,bill_type,customer_type,card_no,lr_no,age,sex,Consultant_Name,concession_type,bal,sr_bill_num from phr_salent_mast where lr_no='$lr_id' ";
$qr1=mysqli_query($link,$x)or die(mysqli_error($link));

if($qr1){
$row1 = mysqli_fetch_array($qr1);
  $billing_type=$row1[0]; 
$customer_name=$row1[1];
$sale_type=$row1[2];
$sale_date=date('d-m-Y',strtotime($row1[3]));
$total_amt=$row1[4];
$bill_type=$row1[5];
 $customer_type=$row1[6];
$customer_type1=$row1[6];
$card_no=$row1[7];
$lr_no=$row1[8];
$age=$row1[9];
$sex=$row1[10];
$ConsultantName=$row1[11];
$concetype=$row1[12];
$cardno=$row1[13];
$bal=$row1['bal'];
$sr_bill_num=$row1['sr_bill_num'];
}	
$rs=mysqli_query($link,"select a.product_code,b.product_name,b.batch_no,b.mfg_date,b.exp_date,a.u_qty,a.u_rate,a.value,balance_qty,a.inv_id,c.discount,c.total,a.disc,a.total,c.spl_dis,c.sr_bill_num,b.HSN from phr_salent_dtl as a,phr_purinv_dtl as b,phr_salent_mast as c where a.inv_id=b.inv_id and a.lr_no=c.lr_no and a.lr_no='$lr_id'")or die(mysqli_error($link));

if($sale_type == "C")
{
	$stype1="Cash";
}
else if($sale_type == "D")
{
	 $stype1="Credit/Debit Card";
}
else
{
	$stype1="Cheque";
}
 $rsp=mysqli_query($link,"select distinct product_name from phr_purinv_dtl where balance_qty>0")or die(mysqli_error($link));
	while($rs1 = mysqli_fetch_array($rsp)){
		$name1[]=$rs1[0];
	}  
 ?>
<?php include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header1.php");
	?>
<script language="javascript" type="text/javascript" src="js/actb.js"></script>
<!--<script language="javascript" type="text/javascript" src="actb2.js"></script>-->
<script language="javascript" type="text/javascript" src="js/common.js"></script>

<script type="text/javascript">
var customarray1=new Array("<?php for($p=0;$p != count($name1);$p++){if($p==(count($name1)-1)){ ?><?php echo $name1[$p] ?><?php }else{ ?><?php echo $name1[$p] ?>","<?php }} ?>");
var custom3= new Array('something','randomly','different');
//alert(customarray1);
</script>
	<script type="text/javascript">
function val(str,id)
{


var srate1=document.getElementById("ucost"+id).value;
if(srate1=='' || srate1==null){srate1=0;}
var totqty=document.getElementById("bal"+id).value;
if(totqty=='' || totqty==null){totqty=0;}
if(str>eval(totqty)){alert("Please Enter Sale Quantity Below "+totqty);document.getElementById("sqty"+id).value="";return false;}
//alert("srate1--"+srate1)
//alert("str--"+str)
var prev=document.getElementById("value"+id).value;
var srate2=0;

if(str==null || str==''){srate2=0;}else{
srate2=eval(str)*eval(srate1);
}


document.getElementById("value"+id).value=Math.abs(srate2);
var vall=document.getElementById("rowval").value;
if(vall=='' || vall==null){vall=0;}
if(eval(vall)==0)
vall=eval(vall)+eval(srate2);
else{if(prev==null || prev==''){prev=0;}
vall=eval(vall)-eval(prev);
vall=eval(vall)+eval(srate2);
//for discount
}
var doscount=document.getElementById("dis"+id).value;
if(doscount=='' || doscount==null){doscount=0;}
if(doscount==0){
document.getElementById("amt"+id).value=Math.abs(srate2);
}else{
var value=document.getElementById("value"+id).value;
document.getElementById("amt"+id).value=Math.abs((eval(value))-(eval(value))*(eval(str))/100);
}
var sum=0;
 var totaldiscount=0;
	 var count=document.form.rows.value;
	for(i=1;i<=count;i++)
	{
	    var txtAmt="amt"+i;
		 var discount="dis"+i;
		var amt1=document.getElementById(txtAmt).value;
                if(amt1=='' || amt1==null){amt1=0;}
		var discount=document.getElementById(discount).value;
                if(discount=='' || discount==null){discount=0;}
		var amt=eval(amt1);
		sum=eval(sum)+eval(amt)
		totaldiscount=eval(totaldiscount)+eval(discount)/count
		document.getElementById("disc").value= Math.round(totaldiscount);	
		document.getElementById("nettotal").value= Math.round(sum);	
	}
	document.getElementById("total").value=vall;
document.getElementById("rowval").value=vall;

}
function discal(str,id){
var value=document.getElementById("value"+id).value;
if(value=='' || value==null){value=0;}
var disamt=Math.abs((eval(value))-(eval(value))*(eval(str))/100);
document.getElementById("amt"+id).value=Math.abs(disamt);

 var sum=0;
 var totaldiscount=0;
	 var count=document.form.rows.value;
	for(i=1;i<=count;i++)
	{
	    var txtAmt="amt"+i;
		 var discount="dis"+i;
		var amt1=document.getElementById(txtAmt).value;
                if(amt1=='' || amt1==null){amt1=0;}
		var discount=document.getElementById(discount).value;
                if(discount=='' || discount==null){discount=0;}
		var amt=eval(amt1);
		sum=eval(sum)+eval(amt)
		totaldiscount=eval(totaldiscount)+eval(discount)/count
		document.getElementById("disc").value= Math.round(totaldiscount);	
		document.getElementById("nettotal").value= Math.round(sum);
                 document.getElementById("amount").value= Math.round(sum);
	}

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
		if(amt==null || amt==''){amt=0;}
		sum3=eval(sum3)+eval(amt);
		document.form.total.value=eval(sum3).toFixed(2);
		document.form.nettotal.value=eval(sum3).toFixed(2);
	}
}


function amount_cal()
{
     //alert("hai");
     var cal=0;
	 var cal1=document.getElementById("grand").value;
	 var cal2=document.getElementById("amount").value;
	 
	 cal=eval(cal2)-eval(cal1);
	
	 document.form.amount1.value=eval(cal).toFixed(2);
	 
}
var xmlHttp



////To get Sub A/c Names///////////

function showBatch(str,str1)
{ 
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
var url="getbatch_1.php";
url=url+"?pname="+str+"&row="+str1;
document.getElementById("str").value=str1;
xmlHttp.onreadystatechange=stateChanged2;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChanged2() 
{ 
  
	if (xmlHttp.readyState==4)
	{ 	var str=document.form.str.value
	     var showdata = xmlHttp.responseText; 
	    document.getElementById("batchdiv"+str).innerHTML=showdata;
		 document.getElementById("bachno"+str).focus();
	}
}


function showMAName(str,str1,str2)
{ 
str2=document.getElementById("btype").value;
//alert(str);
//str2="mrp";
	//alert("1"+1);
//	alert(str2)
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
	
//alert("str1="+str1);
st = str1;
st = str1;
var url="getsname1.php";
//url=url+"?pname="+str+"&rowid="+str1;
url=url+"?pname="+str+"&rowid="+str1+"&btype1="+str2;
//alert("url"+url);
document.getElementById("str").value=st;
xmlHttp.onreadystatechange=stateChanged1;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}
function stateChanged1() 
{ 
  
	if (xmlHttp.readyState==4)
	{ 
	     var showdata = xmlHttp.responseText; 
		var str=document.form.str.value
		 var strar = showdata.split(":");
		//alert("str="+str);
		//alert(showdata);
		
			
			 document.getElementById("bal"+str).value=strar[1];
			  document.getElementById("mfg"+str).value=strar[2];
			  document.getElementById("exp"+str).value=strar[3];
			  document.getElementById("ucost"+str).value=strar[4];
			  //document.getElementById("pcode"+str).value=strar[5];
			  document.getElementById("vat"+str).value=strar[5];
			   document.getElementById("gst"+str).value=strar[6];
			  document.getElementById("HSN"+str).value=strar[7];
			  document.getElementById("sqty"+str).focus();
			
	}
}

function patientdetails(str)
{ 

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
	
//alert(str);
var url="getPatientDetails.php";
url=url+"?pname="+str;
xmlHttp.onreadystatechange=stateChangedpat;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChangedpat() 
{ 
  
	if (xmlHttp.readyState==4)
	{ 
	     var showdata = xmlHttp.responseText; 
		
		 var strar = showdata.split(":");
		
			document.getElementById("conce").style.display='';
			document.getElementById("conce1").style.display='';
			 document.getElementById("age").value=strar[1];
			  document.getElementById("sex").value=strar[2];
			  document.getElementById("consultant_name").value=strar[3];
			  document.getElementById("cconcessiontype").value=strar[4];
			  document.getElementById("custname2").value=strar[5].trim();
			  var cc=strar[4].trim();
			
			  if(!(cc=="Other")){
			    document.getElementById("stype").value="E";
			   document.form.bill[0].disabled = true;
					document.form.bill[0].checked=false;
					document.form.bill[1].checked=true;
			  }
			  else{
			  document.getElementById("stype").value="C";
			   document.form.bill[0].disabled = false;
			  document.form.bill[0].checked=true;
			  }
			  
			 
			
	}
}


function GetXmlHttpObject()
{

var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}




</script>
<script type="text/javascript">
//rows="2";
        function addRow(tableID) {   


		var actb4=document.getElementById("actb").value;
		var actb5=eval(actb4)+1;
	
		document.getElementById("actb").value=actb5;
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			document.form.rows.value=(rowCount);
			
            var cell1 = row.insertCell(0);   
            var element1 = document.createElement("input"); 
		    element1.type = "checkbox"; 
			element1.name = "checkbox1"; 
			element1.id= "checkbox1"; 
			element1.value = actb5; 
			cell1.appendChild(element1); 
            
			
	oCell = document.createElement("TD");
    oCell.innerHTML = "<select name='pname"+rowCount+"' onblur='showBatch(this.value,"+actb5+")'  style=width:150px id='pname"+actb5+"'><option>Select Product</option><?php $a=mysqli_query($link,"select product_name from phr_purinv_dtl");while($r=mysqli_fetch_array($a)){$k=$r['product_name'];?><option><?php echo $k?></option><?php }?></select>";
	

	
	row.appendChild(oCell);
	oCell = document.createElement("TD");
	oCell.innerHTML = "<div id='batchdiv"+actb5+"'><select name='bachno"+rowCount+"' class='select' style=width:75px id='bachno"+actb5+"'><option>Batch</option></select></div>"; 
    row.appendChild(oCell);
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<input type='text' name='HSN"+rowCount+"' id='HSN"+actb5+"' class='textbox1' readonly size='8'>"; 
    row.appendChild(oCell);
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<input type='text' name='bal"+rowCount+"' id='bal"+actb5+"' class='textbox1' readonly size='8'>"; 
    row.appendChild(oCell);
    
    oCell = document.createElement("TD");
	oCell.innerHTML = "<input type=text name='mfg"+rowCount+"' id='mfg"+actb5+"' class='textbox1' readonly size='7' >"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<input type=text name='exp"+rowCount+"' id='exp"+actb5+"' class='textbox1' readonly size='7' >"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	oCell.innerHTML = "<input type='text' name='sqty"+rowCount+"' id='sqty"+actb5+"' size='5' onkeyup='val(this.value,"+actb5+")' class='textbox1'>"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='text' name='ucost"+rowCount+"' id='ucost"+actb5+"' readonly class='textbox1'  size='5'>"; 
    row.appendChild(oCell);
	  
    oCell = document.createElement("TD");
	oCell.innerHTML = "<input type='text' name='value"+rowCount+"' id='value"+actb5+"' class='textbox1' size='10'  readonly> "; 
    row.appendChild(oCell);
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='text' name='dis"+rowCount+"' id='dis"+actb5+"' value=0 class='textbox1' onkeyup='discal(this.value,"+actb5+")' size='5'> "; 
    row.appendChild(oCell);
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='text' name='amt"+rowCount+"' id='amt"+actb5+"' class='textbox1' size='5'> "; 
    row.appendChild(oCell);
    
	oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='hidden' name='pcode"+rowCount+"' id='pcode"+actb5+"' class='textbox1' size='5'> "; 
    row.appendChild(oCell);
	
	var obj = actb(document.getElementById('pname'+actb5+''),customarray1);
        document.getElementById('pname'+actb5+'').focus();
	   }
           function deleteRow(tableID) {  
         try {  
		
            var table = document.getElementById(tableID);
			var rowss1 = table.rows.length;  
                        if (rowss1>2){
		      for(var i=1; i<rowss1; i++) {   
                var row = table.rows[i];  
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {   
				  
		var chval=chkbox.value	
		//alert("chval"+chval);
var ccc=document.getElementById("value"+chval).value;
if(ccc=='' || ccc==null){ccc=0;}
var rwval=document.getElementById("rowval").value;
if(rwval=='' || rwval==null){rwval=0;}
var final1=eval(rwval)-eval(ccc);
document.getElementById("rowval").value=Math.abs(final1);
document.form.total.value=Math.abs(final1).toFixed(2);  
document.form.nettotal.value=Math.abs(final1).toFixed(2);
document.form.amount.value=Math.abs(final1).toFixed(2);				  
                    table.deleteRow(i); 
                   // rowss1 --;   
                    i--;
		} 
                document.form.rows.value=eval(i);
                document.getElementById("actb").value=eval(i);
             }
			 if(null != chkbox ) {   
			  alert ('You didnt choose any of the checkbox!');		
			  }
                        }
            }catch(e) {   
                
            }   
        }   
          
				

</script>
<script type="text/javascript">
function save(finflg)
{
var type=null;

var count=document.getElementById("rows").value

if(count!=0){

var radioSelected = false;
for (i = 0;  i < form.custm_type.length;  i++){

if (form.custm_type[i].checked)radioSelected = true;
}

if (!radioSelected){
alert("Please select one of the \"Customar Type\" options.");
return (false);    
} 
else
{
//alert(document.getElementById("custm_type1").checked)
if(document.getElementById("custm_type1").checked){

type=document.getElementById("custm_type1").value;
//alert(type);
}
else
{
type=document.getElementById("custm_type2").value;
//alert(type);
}
}
if(type=="c"){
  if(document.form.custname1.value==""){
  alert("Please Enter Customer Name");
  form.custname1.focus();
   return false; 
    }
	if(document.form.cage.value==""){
  alert("Please Enter Age");
  form.cage.focus();
   return false; 
    }
	if(document.form.csex.selectedindex=0){
  alert("Please Select Sex");
  form.csex.focus();
   return false; 
    }
	if(document.form.cconsultant_name.value==""){
  alert("Please Enter cconsultant name");
  form.cconsultant_name.focus();
   return false; 
    }
}else{

if(document.form.custname2.value=="")
{
alert("Please Select Patient name");
  form.custname2.focus();
   return false; 
}


}



if(document.form.stype.value=="")
{
alert("Please Select Sales Type");
form.stype.focus();
return false;
}


if(document.form.saledate.value=="")
{
alert("Sale Date Filed is Empty");
form.saledate.focus();
return false;
}

}else{
	alert("Select Click add row");
	return false;
	}

	document.form.action="salesentry_insert1.php";
	document.form.submit();
	
	
}
</script>
<script type="text/javascript">
function custom(str){
	if(str=='p'){document.getElementById("trcust").style.display='none';
	document.getElementById("trcust1").style.display='none';
	document.getElementById("trpat").style.display='';
	document.getElementById("trpat1").style.display='';
	//document.getElementById("trbill").style.display='';
	document.getElementById("conce2").style.display='none';
	document.getElementById("conce3").style.display='none';
	document.getElementById("conce").style.display='';
	document.getElementById("conce1").style.display='';
	}//if
	else{document.getElementById("trcust").style.display='';
	document.getElementById("trcust1").style.display='';
	document.getElementById("trpat1").style.display='none';
	document.getElementById("trpat").style.display='none';
	document.getElementById("conce2").style.display='';
	document.getElementById("conce3").style.display='';
	document.getElementById("conce").style.display='none';
	document.getElementById("conce1").style.display='none';
	//document.getElementById("trbill").style.display='none';
	}//else
	
	}//fun
	
	
function saletype(str){
	if(str=='Q'){
	document.getElementById("saletype1").style.display='';	
	document.getElementById("saletype1").innerHTML='Cheque No';									
	document.getElementById("saletype2").style.display='';
	document.form.bill[0].disabled = false;
	document.form.bill[0].checked=true;
}
	else if(str=="D"){
	document.getElementById("saletype1").style.display='';	
	document.getElementById("saletype1").innerHTML='Credit/Debit No';									
	document.getElementById("saletype2").style.display='';
	document.form.bill[0].disabled = false;
	document.form.bill[0].checked=true;
	
	}//elseif
	else if(str=="C"){
	
	document.getElementById("saletype1").style.display='none';	
	document.getElementById("saletype2").style.display='none';
	document.form.bill[0].disabled = false;
	document.form.bill[0].checked=true;
	
	}//elseif
	else{
	document.getElementById("saletype1").style.display='none';	
	document.getElementById("saletype2").style.display='none';
	document.form.bill[0].disabled = true;
	document.form.bill[0].checked=false;
	document.form.bill[1].checked=true;
	}//else
	
	}//fun
	</script>
</head>

	<body>

	<div id="conteneur container" style="height:auto;">
		<!--<div id="header"><?php //include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			//include("main_menu.php");
			?>-->
            
           <?php
		include("logo.php");
			include("main_menu.php");
			?>
		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">EDIT SALES ENTRY</h1>
           <form name="form" autocomplete="off" method="post" action="salesentry_insert1.php">
		   <input type="hidden" name="authby" value="<?php echo $aname ?>"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   
  <tr>
    <td colspan="2" class="mainbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	
      <select name="btype" hidden="hidden" style="width:230px;height:22px;" id="btype" >
                       <option value="mrp" selected="selected">MRP</option>
                        <option value="pur.rate">Purchase rate</option>
                        
                    </select>
      <tr>
        <td height="400" valign="top" class="box_midlebg" align="center"><br>
          <table width="98%" height="257" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="5" cellpadding="2">
			
                  <!--<tr>
                    <td class="label1"><div align="right">Customer Type : </div></td>
                    <td align="left">
					<?php if($customer_type == "c"){ ?>		
					Customer
					<?php }if($customer_type == "p"){ ?>	
					Patient
					<?php } ?>
					</td>
                   </tr>-->
                  <?php  if($customer_type1 == "c"){ ?>		
				  <tr>
				 <td class="label1"><div align="right">Customer Name : </div></td>
                    <td align="left"><?php echo $customer_name ?></td>
					 <td class="label1"><div align="right">Age : </div></td>
                    <td ><?php echo $age ?></td>
                  </tr>
				   <tr>
                   
					   <td class="label1"><div align="right">Sex : </div></td>
					  <td ><?php echo $sex ?></td>
					   <td class="label1"><div align="right">Consultant Name : </div></td>
					  <td ><?php echo $ConsultantName ?></td>
                   
				  </tr>
				  <?php }elseif($customer_type == "p"){ 
				 
					
					  $rest = substr("$customer_name", 0, 3); 
				if($rest=='DHS'){
					//$ctype="Out Patient";
				$res=mysqli_query($link,"Select a.patientname from patientregister a,`op_pat_dlt` b where
				 a.registerno=b.PAT_REGNO and a.registerno='$customer_name'")or die(mysqli_error($link));
				} else {
					//$ctype="In Patient";
				$res=mysqli_query($link,"Select a.patientname from patientregister a,`ip_pat_admit` b where a.registerno=b.PAT_REGNO and b.pat_no='$customer_name'")or die(mysqli_error($link));
				}
					
					
					//$res = mysqli_query("Select a.patientname from patientregister a,`ip_pat_admit` b where a.registerno=b.PAT_REGNO and b.pat_no='$customer_name'
					//");
					if($res)
					{
						$res1 = mysqli_fetch_array($res);
						$pat_name=$res1[0];
					}
				  ?>	
                  <tr>
                     <td class="label1"><div align="right">Patient Name : </div></td>
                     <td align="left"><?php echo $pat_name ?></td>
					  <td class="label1"><div align="right">Age:</div></td>
					  <td ><?php echo $age ?></td>
                  </tr>
				 <tr >
				  <td class="label1"><div align="right">Sex:</div></td>
					  <td ><?php echo $sex ?></td>
					  <td class="label1"><div align="right">Consultant Name:</div></td>
					  <td ><?php echo $ConsultantName ?></td>
					  </tr>
					  <tr style="display:none" >
				  <td class="label1"><div align="right">Payment Type:</div></td>
					  <td ><?php echo $concetype ?></td>
					  <td class="label1"><div align="right">Card No.:</div></td>
					  <td ><?php echo $cardno ?></td>
					  </tr>
					 <?php } ?>
                  
                  
                  <tr>
                      
                    <td width="17%" class="label1"><div align="right">Patient Name:</div></td>
                    <td align="left"><input type="text" name="patientname" id="patientname" value="<?php echo $patientname ?>"></td>
					<td class="label1"><div align="right">Age:</div></td>
					<td align="left" ><?php echo $age ?></td>
					<td class="label1"><div align="right">Sex:</div></td>
					<td align="left" ><?php echo $sex ?></td>
					
                  </tr>
                  <tr>
                      
                    <td width="17%" class="label1"><div align="right">Billing Type:</div></td>
                    <td width="27%" align="left"><?php echo $billing_type ?></td>
					<td class="label1"><div align="right">Sales Type:</div></td>
					<td align="left" ><?php echo $stype1 ?></td>
                  </tr>
                  
                  <tr>
                    <td class="label1"><div align="right">Sale Date:</div></td>
                    <td><div align="left">
                        <?php echo $sale_date ?>
						</div></td>
                    <td class="label1"><div align="right" id="saletype1" style="display:none"> No </div></td>
                    <td><div align="left" id="saletype2" style="display:none">
                        <input name="card" type="text" class="text" id="card" size="35" value="0"/>
                    </div></td>
                  </tr>
                  <!--<tr><td><input type="text" name="billing" id="billing" value="btype.value"/></td></tr>-->
              </table>
                <input name="invno" type="hidden" class="text" id="invno"/></td>
            </tr>
            <tr>
              <td><table id="t1" width="100%">
                  <tr>
                    <td align="center">
                      <table width="93%" class="ruler" id="dataTable" summary="Table of my records" align="center" >
                          <thead>
                            <tr>
							 <th width="1" class="TH1"></th>
                              <th class="TH1">P.Name</th>
                               <th class="TH1">Bat.No</th>
							   <th class="TH1">HSN</th>
                              <th class="TH1">Avail.Qty</th>
                              <th class="TH1">MFG.Dt</th>
                              <th class="TH1">EXP.Dt</th>
                              <th class="TH1">Sale.Qty</th>
                              <th class="TH1">U.Rate</th>
                              <th class="TH1">Value</th>
							  <th class="TH1">Dis(%)</th>
							   <th class="TH1">Amount</th>
                            </tr>
                          </thead>
                          <tbody>
						  <?php
							if($rs){
							$i=0;
							while($rw = mysqli_fetch_array($rs)){
							$pcode=$rw[0];
							$pname=$rw[1];
							$batch=$rw[2];
							$mfg=$rw[3];
							$exp=$rw[4];
							$uqty=$rw[5];
							$urate=$rw[6];
							$value=$rw[7];
							$s_qty=$rw[8];
							$value1=$rw[7];
							$inv_id2=$rw[9];
							$discount=$rw[10];
							$tot=$rw[11];
							$dis=$rw[12];
							$amt=$rw[13];
							$spl_dis=$rw[14];
							$HSN=$rw['HSN'];
							$i=$i+1;
							?>
                              <tr style="text-align:center;">
								<td><input type="checkbox" id="checkbox1" name="checkbox1" value="<?php echo $i ?>"/></td>
                                  
                                  <td><input type="text" name="pname<?php echo $i ?>" id="pname<?php echo $i ?>" class="textbox1" value="<?php echo $pname ?>" size="22"/></td>
                                  <td><input type="text" name="bachno1<?php echo $i ?>" id="bachno1<?php echo $i ?>" class="textbox1" value="<?php echo $batch ?>" size="7"/></td>
								  <td><input type="text" name="HSN<?php echo $i ?>" id="HSN<?php echo $i ?>" class="textbox1" value="<?php echo $HSN ?>" size="7"/></td>
                                  <td><input  type="text" name="bal<?php echo $i ?>" id="bal<?php echo $i ?>" value="<?php echo $s_qty ?>" class="textbox1" size="7"/></td>
                                  <td><input  type="text" name="mfg<?php echo $i ?>" id="mfg<?php echo $i ?>" value="<?php echo date("d-m-Y",strtotime($mfg)) ?>" class="textbox1" size="7"/></td>
                                  <td><input  type="text" name="exp<?php echo $i ?>" id="exp<?php echo $i ?>" value="<?php echo date("d-m-Y",strtotime($exp)) ?>" class="textbox1" size="7"/></td>
                                  <td><input  type="text" name="sqty<?php echo $i ?>" id="sqty<?php echo $i ?>" class="textbox1" value="<?php echo $uqty ?>" size="5" onkeyup="val(this.value,<?php echo $i ?>)"/></td>
                                  <td><input  type="text" name="ucost<?php echo $i ?>" id="ucost<?php echo $i ?>" value="<?php echo $urate ?>" class="textbox1" size="5"/></td>
                                  <td><input  type="text" name="value<?php echo $i ?>" id="value<?php echo $i ?>" value="<?php echo $value ?>" class="textbox1" readonly size="10"/></td>
                                  <td><input  type="text" name="dis<?php echo $i ?>" id="dis<?php echo $i ?>" class="textbox1" value="<?php echo $dis ?>"  onkeyup="discal(this.value,<?php echo $i ?>)" size="5"/></td>
                                  <td><input  type="text" name="amt<?php echo $i ?>" id="amt<?php echo $i ?>" value="<?php echo $amt ?>" class="textbox1" size="5"/><input  type="hidden" name="pcode<?php echo $i ?>" id="pcode<?php echo $i ?>" value="<?php echo $pcode ?>" class="textbox1" size="5"/></td>
                                  <input  type="hidden" name="bachno<?php echo $i ?>" id="bachno<?php echo $i ?>" value="<?php echo $inv_id2 ?>" class="textbox1" size="5"/>
                              </tr>
							  <?php } } ?>
                          </tbody>
                        </table>
                   </td>
                    <td valign="top"><input name="new" type="button" class="butnbg1" value="  +  "  onclick="addRow('dataTable')"/></td>
					<td valign="top"><input name="new" type="button" class="butnbg1" value=" -  " onclick="deleteRow('dataTable')"/>
					</td>
                    
                    <td valign="top">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <input type="hidden" name="i" id="i" value="<?php echo $i ?>"/>
            
			<input type="hidden" name="rows" id="rows" value="<?php echo $i ?>"/>
            <tr>
              <td><table  width="100%">
                  <tr>
                    <td align="center"><div id="div" valign="top">
                        <table width="100%" id="">
                          <tr style="display:none;" id="trbill">
                            <td class="label1"><div align="right">Bill </div></td>
                            <td align="left" >
<input type="radio" name="bill" value="Y" id="bill" onclick="trids(this.value)" checked="yes"/>
Paid
  <input type="radio" name="bill" value="N" id="bill" />
NotPaid</td>
                            <td align="left" >&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
						  <tr>
						    <td width="81%" class="label1"><div align="right"> Total:</div></td>
                            <td width="19%" align="left"><input name="total" type="text" value="<?php echo $tot ?>" class="text" id="total" readonly="readonly"/></td>
                          </tr>
						
							<tr id="cashtr" style="display:''">
							  <td class="label1"><div align="right">Average Discount(%):</div></td>
							  <td align="left">
							  <input name="disc" type="text" class="text" id="disc" value="<?php echo $discount ?>" />
							
							  <script>
							function nett(str){
							  var tot=document.getElementById("total").value;
							   var sum=0;
							   var sum1=0;
							  if(tot==null || tot==''){tot=0;}else{
							  if(eval(tot)<=eval(str)){alert("Please check Discount");document.getElementById("disc").value=0;return false;}
							   //sum=eval(tot)-eval(str);
							   sum=(eval(tot))*(eval(str))/100;
							   
							   sum1=(eval(tot))-sum;
							  if(sum1==null || sum1==''){sum1=0;}
							  }
							  document.getElementById("nettotal").value=eval(sum1).toFixed(2);
							  }
							  </script>
							   <script>
							function nett(str){
							  var tot=document.getElementById("total").value;
							   var sum=0;
							   var sum1=0;
							  if(tot==null || tot==''){tot=0;}else{
							  if(eval(tot)<=eval(str)){alert("Please check Discount");document.getElementById("disc").value=0;return false;}
							   //sum=eval(tot)-eval(str);
							   sum=(eval(tot))*(eval(str))/100;
							   
							   sum1=(eval(tot))-sum;
							  if(sum1==null || sum1==''){sum1=0;}
							  }
							  document.getElementById("nettotal").value=eval(sum1).toFixed(2);
							  document.getElementById("grand").value=eval(sum1).toFixed(2);
							  }
							  
							  
							  function nett1(str){
							  var o_dis=document.getElementById("o_dis").value;
							  var nettotal=document.getElementById("nettotal").value;
							   sumk=(eval(nettotal))-(eval(o_dis));
							   document.getElementById("grand").value=eval(sumk).toFixed(2);
							   document.getElementById("amount").value=eval(sumk).toFixed(2);
							  }
							  
							   function nett2(str){
							  var o_dis=document.getElementById("grand").value;
							  var nettotal=document.getElementById("amount").value;
							   sumk=(eval(nettotal))-(eval(o_dis));
							   document.getElementById("amount1").value=eval(sumk).toFixed(2);
							   //document.getElementById("amount").value=eval(sumk).toFixed(2);
							  }
							  
							  </script>
							  
							
							  </td>
							  </tr>  
							<tr id="cashtr" style="display:''">
							  <td class="label1"><div align="right"> Net Total:</div></td>
							  <td align="left"><input name="nettotal" type="text" class="text" value="<?php echo ($tot-$discount)+$spl_dis ?>" id="nettotal" readonly="readonly"/></td>
							  </tr>
                              
                               <tr id="cashtr" style="display:''">
							  <td class="label1"><div align="right"> Other Discount:</div></td>
							  <td align="left"><input name="o_dis" type="text" class="text" id="o_dis" value="<?php echo $spl_dis?>" onkeyup="nett1()" value="0"/></td>
							  </tr>
                              <tr id="cashtr" >
							
							<td width="85%" class="label1"><div align="right"> Grand Total:</div></td>
                            <td width="19%" align="left"><input name="grand" type="text" class="text" id="grand"  readonly="readonly" value="<?php echo ($tot-$discount)?>"/></td>
							</tr>
                              
							<tr id="cashtr" style="display:''">
							
							<td width="85%" class="label1"><div align="right"> Cash Received:</div></td>
                            <td width="19%" align="left"><input name="amount" type="text" class="text" value="<?php echo ($tot-$discount+$bal) ?>" id="amount" onkeyup='amount_cal();'/></td>
							</tr>
							<tr id="remaintr" style="display:''">
							<td width="85%" class="label1"><div align="right"> Remaining Change:</div></td>
                            <td width="19%" align="left"><input name="amount1" type="text" class="text" id="amount1" onblur='amount_cal();' value="<?php echo $bal?>"/></td>
							</tr>
							<input name="sr_bill_num" type="hidden" class="text" id="sr_bill_num"  value="<?php echo $sr_bill_num?>"/>
							
                         <script>
						 function trids(str){
						 if(str=="N"){
						  document.getElementById("cashtr").style.display="none";
						 document.getElementById("remaintr").style.display="none";
						 }else{
						   document.getElementById("cashtr").style.display="";
						 document.getElementById("remaintr").style.display="";
						 
						 }
						 
						 
						 }
						 
						 </script>
                          <tr>
                            <td colspan="2"></thead></td>
                          </tr>
                          
                        </table>
                    </div></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="4"></td>
            </tr><input type="hidden"  id="str" name="str" >
            <tr>
              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
                  <tr>
                    
      <input name="fin_flag" id="fin_flag"  type="hidden"/>
	  <input name="actb" id="actb"  type="hidden" value="<?php echo $i ?>"/>
	   <input name="rowval" id="rowval"  type="hidden" value="<?php echo $tot ?>"/>
	<input type="hidden" name="lrno" value="<?php echo $lr_id ?>" />
   
	  
   
  
                    <td ><div align="center">
					<input type="submit" value="Update" class="butt"/> <input type="button" value="Close" onclick="window.location.href='salesentry_list.php'" class="butt"/></div></td>
                  </tr>
              </table></td>
            </tr>
          </table>
          <p><br>
          </p>
          </td>
      </tr>
      
    </table></td>
  </tr>
</table>
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