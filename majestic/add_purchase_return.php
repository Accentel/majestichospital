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

function qtychek(str,row){

var sqt=document.getElementById("sqty"+row).value;


if(eval(sqt)<eval(str)){
alert("Check Return Quntity Should be Less Than Purchage Quantity");
document.getElementById("rqty"+row).value="";
return false;
}
tot(str,row);
}

function tot(str,row)
{
		var value3="rrate"+row;
		var rrate=document.getElementById(value3).value;
		var vat=document.getElementById("vat"+row).value;
var sum=eval(rrate)*eval(str)

var vatsum=(vat/100)*sum;

document.getElementById("vatamt"+row).value=vatsum.toFixed(2);
	document.getElementById("amt"+row).value=eval(sum);
nettot();		
}

function nettot()
{
	var sum2=0;
	var sum1=0;
var vatsum=0;
	var count2=document.form.rows.value;

	for(k=1;k<=count2;k++)
	{
		var value1="amt"+k;
		var value2=document.getElementById(value1).value;
		var disc=document.getElementById("disc"+k).value;
		var rqt=document.getElementById("rqty"+k).value;
                  var vsum=document.getElementById("vatamt"+k).value
		var dd=eval(rqt)*eval(disc);
sum1=eval(sum1)+eval(dd);
		sum2=eval(sum2)+eval(value2);
vatsum=eval(vatsum)+eval(vsum);
	}
sum2=(eval(sum2)+eval(vatsum))-eval(sum1);
	document.getElementById("total").value=sum2;
document.getElementById("totalvat").value=vatsum;
	document.getElementById("disctot").value=sum1;

if(count2==0){	document.getElementById("disctot").value=sum1;
document.getElementById("return").value=sum1;

document.getElementById("total").value=sum1;}
}

function invfun(str){
 xmlHttp=GetXmlHttpObject();
  if (xmlHttp==null){
  alert ("Browser does not support HTTP Request")
  return
  }
  var url="purchase_return_inv1.php"
  url=url+"?emp_id="+str;
  xmlHttp.onreadystatechange=stateChanged 
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
	 }
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
//alert(showdata)

		  var strar =showdata.split("@");
		  if(strar.length>0){
			 // window.opener.location.reload();
			 //window.location.reload(); 
		//alert(strar[0]+"---"+strar[1]);
			document.getElementById("recdate").value=strar[1];
			document.getElementById("invdate").value=strar[0];
			document.getElementById("ptype").value=strar[2];
			}
	  }
  }
  
function GetXmlHttpObject(){
	  var xmlHttp=null;
	  try{
		  // Firefox, Opera 8.0+, Safari
		  xmlHttp=new XMLHttpRequest();
	  }
	  catch (e){
		  //Internet Explorer
		  try{
			  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		  catch (e){
			  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
	  }
	  return xmlHttp;
  }
</script>

<script>


//////////////////////////addrow starts//////////
function Addrow()
{
  if(document.form.supcode.value=="")
	{
		alert("Please Click On SupplierCode");
		document.form.supcode.focus();
		return false;
	}

	 if(document.form.invno.selectedIndex==0)
	{
		alert("Please Click On Invoice No");
		document.form.invno.focus();
		return false;
	}
   
     
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
			
				
			var select9="rqty"+k;
			if(document.getElementById(select9).value=="")
			{
				alert("Return Quantity Feild is Empty");
				document.getElementById(select9).focus();
				return false;
			}
			
			var select11="rrate"+k;
			if(document.getElementById(select11).value=="")
			{
				alert("Return Rate Feild is Empty");
				document.getElementById(select11).focus();
				return false;
			}
								
	
		}//for
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select3="pname"+i;
		var pp=document.getElementById(select3).value;	
		for(j=count;j!=i;j--)
			{	
		 var select32="pname"+j;
		var p=document.getElementById(select32).value;
		
		if(pp==p)
		{
		
		alert("Product Codes are same ");

		document.getElementById(select32).value="";
		document.getElementById(select32).focus();
		document.getElementById('TABLE1').deleteRow(j);
			document.getElementById("rows").value=eval(count)-1;
		nettot();
		return (false);

		}
		}
		}
		}
		
    



  // var count=document.getElementById("rows").value
	  var supcode1=document.getElementById("supcode").value
		 var invoic_no=document.form.invno.value
   var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	 var oCell = document.createElement("TD");
    oCell.innerHTML= "<div align='center' ><input  type='text' name='pcode"+Row+"' id='pcode"+Row+"' class='textbox' onblur='sameinvcode()'  size='4' onclick=window.open('prdret_itemcode_pop.php?rowid="+Row+"&supcode="+supcode1+"&invcno="+invoic_no+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly> </div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='pname"+Row+"' id='pname"+Row+"' class='textbox'  size='15'> </div>"; 
    row.appendChild(oCell);

   oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='manfby"+Row+"' id='manfby"+Row+"' class='textbox'  size='15'> </div>"; 
    row.appendChild(oCell);

  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='hidden' name='packing"+Row+"' id='packing"+Row+"' class='textbox' size='5'  > </div>"; 
    // row.appendChild(oCell);
	 
 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='hidden' name='noi"+Row+"' id='noi"+Row+"' class='textbox' size='3'  > </div>"; 
    // row.appendChild(oCell);

  

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='bno"+Row+"' id='bno"+Row+"' class='textbox' size='5' > </div>"; 
    row.appendChild(oCell);

  
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='vat"+Row+"' id='vat"+Row+"'class='textbox'  size='4'><input  type='hidden' name='vatamt"+Row+"' id='vatamt"+Row+"'class='textbox'  size='4'> </div>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='sqty"+Row+"' id='sqty"+Row+"'class='textbox'  size='4'><input  type='hidden' name='disc"+Row+"' id='disc"+Row+"'class='textbox'  size='4'> </div>"; 
     row.appendChild(oCell);

	 

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='srate"+Row+"' id='srate"+Row+"'class='textbox'  size='4'  readonly> </div>"; 
   //  row.appendChild(oCell);

	
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='value"+Row+"' id='value"+Row+"' class='textbox'  size='4' readonly> </div>"; 
    // row.appendChild(oCell);


  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='hidden' name='disc"+Row+"' id='disc"+Row+"'class='textbox'  size='4'></div>"; 
     //row.appendChild(oCell);
	 
		 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='rrate"+Row+"' id='rrate"+Row+"' class='textbox'  size='5' readonly> </div>"; 
     row.appendChild(oCell);

	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='rqty"+Row+"' id='rqty"+Row+"' class='textbox'  size='3' onkeyup='qtychek(this.value,"+Row+")'> </div>"; 
     row.appendChild(oCell);

	 	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='amt"+Row+"' id='amt"+Row+"' class='textbox'  size='5'  readonly><input  type='hidden' name='inv_id"+Row+"' id='inv_id"+Row+"' class='textbox'  size='5'  readonly> </div>"; 
     row.appendChild(oCell);

     document.getElementById("rows").value=Row;
//sameinvcodes(Row);

   }//addrow()
   
   
/*
function deleteRow()
{
  var tbl = document.getElementById('TABLE1');
  var lastRow = tbl.rows.length;
var rowss=document.getElementById("rows").value;
  if (lastRow > 1){ tbl.deleteRow(lastRow - 1);document.getElementById("rows").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
*/
 function deleteRow(tableID) {  
            var tbl = document.getElementById('TABLE1');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows").value;
  if (lastRow > 1){ 
				 /* var txtAmt="amt"+rowss;
				  var aa= document.getElementById(txtAmt).value;
				  var amt2=eval(aa);
				  var bb=document.form.total.value;
				    sum=bb-amt2;
				  document.form.total.value = eval(sum);*/ 	
  tbl.deleteRow(lastRow - 1);document.getElementById("rows").value=eval(rowss)-1;
nettot();


}
  else{ alert('Please Select Row');return false;}
}
</script>
<script>
function save(finflg)
{
	
document.getElementById("fin_flag").value=finflg

if(document.form.supcode.value=="")
{
alert("Please Click On SupplierCode");
return false;
}

if(document.form.invno.selectedIndex==0)
{
alert("Please Click On Invoice No ");
return false;
}


var count=document.getElementById("rows").value
	   for(k=1;k<=count;k++)
		{
		  var select3="pname"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild in Row No"+k);
				document.getElementById(select3).focus();
				return false;
			}
			
			var select9="rqty"+k;
			if(document.getElementById(select9).value=="")
			{
				alert("Return Quantity Feild is Empty in Row No"+k);
				document.getElementById(select9).focus();
				return false;
			}
			
			var select11="rrate"+k;
			if(document.getElementById(select11).value=="")
			{
				alert("Return Rate Feild is Empty in Row No"+k);
				document.getElementById(select11).focus();
				return false;
			}
			
					
	
		}//for
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select3="pname"+i;
		var pp=document.getElementById(select3).value;	
		for(j=count;j!=i;j--)
			{	
		 var select32="pname"+j;
		var p=document.getElementById(select32).value;
		
		if(pp==p)
		{
		
		alert("Product Codes are same ");
		document.getElementById(select32).value="";
		document.getElementById(select32).focus();
		document.getElementById('TABLE1').deleteRow(j);
		document.getElementById("rows").value=eval(count)-1;
		nettot();
		return (false);

		}
		}
		}
		}



  
	//document.form.action="insert_purchase_return.php";
	document.form.submit();
	
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

$sql = mysqli_query($link,"select max(lr_no) from phr_pur_returns_mast")or die(mysqli_error($link));
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$pnid = $row[0];
}
?>
	<div id="conteneur" class="container">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre" style="height:auto;" class="">
          <h1 style="color:red;" align="center">PURCHASE RETURN</h1>
		  <form name="form"  autocomplete="off" method="post" action="insert_purchase_return.php">
		  <input type="hidden" name="authby" value="<?php echo $aname ?>" />
          <table width="100%" border="0" cellspacing="5" cellpadding="2" class="table">
              <tr>
                <td  class="label1"><div align="right">Supplier Code<span class="style2">*</span>:</div></td>
                <td  align="left"><input name="supcode" type="text" class="text"  onclick="window.open('purchase_return_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" id="supcode"  readonly="readonly"/></td>
              
                <td  class="label1"><div align="right">Supplier Name<span class="style2">*</span>:</div></td>
                <td  align="left"><input name="supname" type="text" class="text" id="supname" readonly/></td>
              </tr>
			    <tr>
			      <td class="label1"><div align="right">Address:</div></td>
			      <td align="left"><textarea name="addr"  id="addr" readonly="readonly" class="text" ></textarea></td>
			      <td class="label1"><div align="right">Pur.Return No:</div></td>
			      <td align="left"><input name="retno" type="text" class="text" id="retno" value="<?php echo "RET".($pnid+1); ?>" readonly="readonly"/></td>
			    </tr>
			    <tr>
			      <td class="label1"><div align="right">City:</div></td>
			      <td align="left"><input name="city" type="text" class="text" id="city" readonly="readonly"/></td>
                  <td class="label1"><div align="right">Invoice No<span class="style2">*</span>:</div></td>
                  <td align="left">
				  <div id="invdiv">
				    <select name="invno" id="invno" class="text">
                        <option selected="selected">--Select--</option>
				      </select>
				    </div>
				  </td>
			    </tr>
				<tr>
				  <td class="label1"><div align="right">Purchase Type<span class="style2">*</span>:</div></td>
				  <td align="left"><input name="ptype" id="ptype" type="text" class="text" readonly="readonly"/></td>
                  <td class="label1"><div align="right">Invoice Date<span class="style2">*</span>:</div></td>
                  <td align="left"><input name="invdate" type="text" class="text" id="invdate"  readonly="readonly"/>
                    
					</td>
				</tr>
				<tr>
				  <td class="label1">&nbsp;</td>
				  <td>&nbsp;</td>
				  <td class="label1"><div align="right">Received Date<span class="style2">*</span>:</div></td>
				  <td><div align="left">
                      <input name="recdate" type="text" class="text" id="recdate"  readonly="readonly"/>
                  </div>
				  </td>
				</tr>
				
        
            </table>
			<table id="t1" width="100%">
			<tr><td><div align="right">
              	     <input name="new2" type="button" class="butnbg1" value=" + " onclick="javascript:Addrow()"/>
            	     <input name="new" type="button" class="butnbg1" value=" - " onclick="javascript:deleteRow()"/>
            	     </div></td>
            	   
           <tr><td width="100%" align="center"><br />

<div id="purtable" valign="top">

            <table width="100%" id="TABLE1">
              <thead>
              	 
              	 <tr>
					<th width="7%" class="TH1">P.Code</th>
                   <th width="15%" class="TH1">P.Name </th>
				     <th width="7%" class="TH1">Mnf.By</th>
                  <!-- <th width="7%" class="TH1">Pack</th>
                   <th width="7%" class="TH1">Pk.Qty </th>-->
                   <th width="10%" class="TH1">Batch.NO</th>
				    <th width="5%" class="TH1">GST</th>
                   <th width="7%" class="TH1">Tot.Qty</th>
                   <!-- <th width="7%" class="TH1">Free</th>
                  <th width="9%" class="TH1">Rate</th>-->
                <!--  <th width="9%" class="TH1">Tot.Disc</th>-->
				  <th width="9%" class="TH1">Rate</th>
				  <th width="9%" class="TH1">Rtrn.Qty</th>
 				  <th width="9%" class="TH1">Amount</th>
    </tr>
   </thead>
 </table>

 </div>
 </td>
 
  
  </tr>


</table>
<input type="hidden" name="rows" id="rows" value="0" >
<table width="100%" id="">
              
              	
	<!--<tr>
	  <td class="label1">Total:</td>
	  <td align="left"><input name="disctot" type="text" class="text" id="disctot" readonly="readonly"/></td>
	  </tr>
		<tr>
	  <td class="label1">VAT Amount:</td>
	  <td align="left"><input name="totalvat" type="text" class="text" id="totalvat" readonly="readonly"/></td>
	  </tr>-->
	   <input name="total" type="hidden" class="text" id="total" readonly="readonly"/>
	  <input name="totalvat" type="hidden" class="text" id="totalvat" readonly="readonly"/>
	<tr>
				 <td width="80%" class="label1">Total:</td>
                <td width="20%" align="left"><input name="disctot" type="text" class="text" id="disctot" readonly="readonly"/></td>
    </tr>
	<tr>
				 <td width="80%" class="label1">Return Amount:</td>
                <td width="20%" align="left"><input name="return" type="text" class="text" id="return" /></td>
    </tr>
   </thead>
 </table>
				 <div align="center">
              <input type="submit" value="Save" class="butt" onclick="save()"/>
              <input type="button" value="Close" class="butt" onclick = "window.location.href='purchase_return_list.php'" > 
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