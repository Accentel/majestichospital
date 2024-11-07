<?php //include('config.php');
session_start();
if($_SESSION['name1'])
{
	$aname = $_SESSION['name1'];
 ?>
<?php include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<?php
			include("header1.php");
		?>
<script>
function val(u1,u2,u3,u4,u5)
{
	var sum1=0;
	var srate2=0; 
	var sqty2=0;
	var count1=document.getElementById("rows").value;
	//alert(u1,u2,u3,u4,u5);
	//alert(count1);
	for(j=1;j<=count1;j++)
	
	{
	    if(u1 > u2)  
		 {	
	        alert("U Buy Only" +u2+ " items");
	   	  document.getElementById("rqty"+u3).value=0;
		  document.getElementById("rtotal").value=0;
		  return false;
	     }
	   if(u1 <= u2)
	   {
		//alert(u1,u2,u3,u4,u5);
	    srate2=document.getElementById("urate"+u3).value;
		sqty2=document.getElementById("rqty"+u3).value;
		
		sum1=(srate2*sqty2);
		document.getElementById("ex").value=eval(sum1);
		var ex=document.getElementById("ex").value;
		
		//alert(ex);
	    tot();
		break;
	   }
	}
	
}

</script>
<script>

function tot()
{
//alert("hi");
	var sum=0;
	var amt=0;
	//var sum1=0;

	var count1=document.getElementById("rows").value;
	var ex=document.getElementById("ex").value;
		//alert(ex);
	//alert(count1);
	for(var x=1;x<=count1;x++)
	{
	
	var value1=document.getElementById("urate"+x).value;
	
	var valuex2=document.getElementById("rqty"+x).value;
	//alert(valuex2);
	var value4=eval(value1)*eval(valuex2);
	var value4=eval(ex);
	amt=amt+eval(value4);
	
	}//for
	var str=document.getElementById("Discount").value;

	sum=(eval(amt))*(eval(str))/100;
	  sum1=(eval(amt))-sum;
	  //alert(sum1);
	document.getElementById("rtotal").value=sum1.toFixed(2);
	
}
</script>



<script>


//////////////////////////addrow starts//////////
function Addrow()
{
	
   
	   var count=document.getElementById("rows").value;
	   for(k=1;k<=count;k++)
		{
		  var select3="pcode"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			var select4="pname"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("P.Name Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}

			var select5="noitems"+k;
			if(document.getElementById(select5).value=="")
			{
				alert("QTY Feild is Empty");
				document.getElementById(select5).focus();
				return false;
			}
			var select6="uom"+k;
			if(document.getElementById(select6).value=="")
			{
				alert("UOM Feild is Empty");
				document.getElementById(select6).focus();
				return false;
			}
			var select7="batch"+k;
			if(document.getElementById(select7).value=="")
			{
				alert("Batch Feild is Empty");
				document.getElementById(select7).focus();
				return false;
			}
			var select8="mfg"+k;
			if(document.getElementById(select8).value=="")
			{
				alert("MFG.Date Feild is Empty");
				document.getElementById(select8).focus();
				return false;
			}
			var select9="exp"+k;
			if(document.getElementById(select9).value=="")
			{
				alert("EXP.DT Feild is Empty");
				document.getElementById(select9).focus();
				return false;
			}
			var select10="uqty"+k;
			if(document.getElementById(select10).value=="")
			{
				alert("UQTY Feild is Empty");
				document.getElementById(select10).focus();
				return false;
			}
			var select11="urate"+k;
			if(document.getElementById(select11).value=="")
			{
				alert("URATE Feild is Empty");
				document.getElementById(select11).focus();
				return false;
			}
			var select12="value"+k;
			if(document.getElementById(select12).value=="")
			{
				alert("VALUE Feild is Empty");
				document.getElementById(select12).focus();
				return false;
			}
					
	
		}//for
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select39="pcode"+i;
		var pp=document.getElementById(select39).value;	
		for(j=count;j!=i;j--)
			{	
		 var select36="pcode"+j;
		var p=document.getElementById(select36).value;
		
		if(pp==p)
		{
		
		alert("Product Codes are same ");
		document.getElementById(select36).value="";
		document.getElementById(select36).focus();
		return (false);

		}
		}
		}
		}


//var dept_code=document.getElementById("dept_code").value;
	  // var supcode=document.getElementById("supcode").value
	  alert(dept_code);
  var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   
   

   var row = newRow.insertRow(Row);
   var index=row.rowIndex;
     
	 var oCell = document.createElement("TD");
    oCell.innerHTML= "<div align='center' ><input  type='text' name='pcode"+Row+"' id='pcode"+Row+"' class='textbox'  size='8' onclick=window.open('Sale_Return_Popup.jsp?rowid="+Row+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly> </div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='pname"+Row+"' id='pname"+Row+"' class='textbox' size='8'> </div>"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input   type='hidden' name='noitems"+Row+"' id='noitems"+Row+"' class='textbox'  size='8'> </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input  type='hidden' name='uom"+Row+"' id='uom"+Row+"' class='textbox' size='8'> </div>"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='hidden' name='batch"+Row+"' id='batch"+Row+"' class='textbox' size='8' > </div>"; 
    row.appendChild(oCell);

    
    oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input type=text  name=mfg"+Row+" id='mfg"+Row+"' class='textbox' size='7' ></a>"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input type=text  name=exp"+Row+" id='exp"+Row+"' class='textbox' size='7' ></a>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input  type='text' name='uqty"+Row+"' id='uqty"+Row+"' 'class='textbox' size='4'> </div>"; 
    row.appendChild(oCell);
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input  type='text' name='rqty"+Row+"' id='rqty"+Row+"' 'class='textbox' size='4'> </div>"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input  type='text' name='urate"+Row+"' id='urate"+Row+"' class='textbox'  size='4'> </div>"; 
    row.appendChild(oCell);

	  
    oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center'><input type='text' name='value"+Row+"' id='value"+Row+"' class='textbox' size='4'  readonly> </div>"; 
    row.appendChild(oCell);




     document.getElementById("rows").value=Row;
//sameinvcodes(Row);


   }//addrow()


function deleteRow(tableID) {  
            var tbl = document.getElementById('TABLE1');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows").value;
  if (lastRow > 1){ 
				 
  tbl.deleteRow(lastRow - 1);document.getElementById("rows").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}

</script>
<script>
function save(finflg)
{
document.getElementById("fin_flag").value=finflg

if(document.form.btype.value=="")
{
alert("Please Select Billing Type");
document.form.btype.focus();
return false;
}

if(document.form.custname.value=="")
{
alert("Customer Name Filed is Empty");
document.form.custname.focus();
return false;
}

if(document.form.stype.value=="")
{
alert("Please Select Sales Type");
document.form.stype.focus();
return false;
}

if(document.form.invno.value=="")
{
alert("Invoice No Filed is Empty");
document.form.invno.focus();
return false;
}

if(document.form.saledate.value=="")
{
alert("Sale Date Filed is Empty");
document.form.saledate.focus();
return false;
}




var count=document.getElementById("rows").value
	//alert(count);

	if(count == 0)
	{
		alert("Select any row");
	    for(k=0;k<=count;k++)
		{
		  var select41="pcode"+k;
		  if(document.getElementById(select41).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select41).focus();
				return false;
			}
			
			var select42="pname"+k;
			if(document.getElementById(select42).value=="")
			{
				alert("P.Name Feild is Empty");
				document.getElementById(select42).focus();
				return false;
			}

			var select43="noitems"+k;
			if(document.getElementById(select43).value=="")
			{
				alert("QTY Feild is Empty");
				document.getElementById(select44).focus();
				return false;
			}
			var select45="uom"+k;
			if(document.getElementById(select45).value=="")
			{
				alert("UOM Feild is Empty");
				document.getElementById(select45).focus();
				return false;
			}
			var select46="batch"+k;
			if(document.getElementById(select46).value=="")
			{
				alert("Batch Feild is Empty");
				document.getElementById(select46).focus();
				return false;
			}
			var select47="mfg"+k;
			if(document.getElementById(select47).value=="")
			{
				alert("MFG.Date Feild is Empty");
				document.getElementById(select47).focus();
				return false;
			}
			var select48="exp"+k;
			if(document.getElementById(select48).value=="")
			{
				alert("EXP.DT Feild is Empty");
				document.getElementById(select48).focus();
				return false;
			}
			var select49="uqty"+k;
			if(document.getElementById(select49).value=="")
			{
				alert("UQTY Feild is Empty");
				document.getElementById(select49).focus();
				return false;
			}
			var select50="urate"+k;
			if(document.getElementById(select50).value=="")
			{
				alert("URATE Feild is Empty");
				document.getElementById(select50).focus();
				return false;
			}
			var select51="value"+k;
			if(document.getElementById(select51).value=="")
			{
				alert("VALUE Feild is Empty");
				document.getElementById(select51).focus();
				return false;
			}
				
	
		}//for
	}//if
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select37="pcode"+i;
		var pp=document.getElementById(select37).value;	
		for(j=count;j!=i;j--)
			{	
		 var select32="pcode"+j;
		var p=document.getElementById(select32).value;
		
		if(pp==p)
		{
		
		alert("Product Codes are same ");
		document.getElementById(select32).value="";
		document.getElementById(select32).focus();
		return (false);

		}
		}
		}
		}
		
  
	
	
	document.form.action="salesreturn_insert.php";
	document.form.submit();
	
	
}
</script>
</head>

	<body>

	<div id="conteneur">
		<div id="header"><?php /*?><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
			?><?php */?>
            
            <?php
	include('logo.php');	
			include("main_menu.php");
			?>
		  
		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">SALES RETURN FORM</h1>
           <form name="form" method="post" autocomplete="off"  >
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
   <tr>
	<input type="hidden" name="authby" value="<?php echo $aname ?>"/>
       <td width="44%" valign="top" class="filepath_bg"  colspan="2"><jsp:include page="../getsessions.jsp"></jsp:include></td>
  </tr>
  <tr>
    <td colspan="2" class="mainbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            
      
      <tr>
        <td height="400" valign="top" class="box_midlebg" align="center"><br>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="5" cellpadding="2">
			  
                  <tr>
                    <td  class="label1"><div align="right">Customer Name:</div></td>
                   <td  align="left"><input name="custname" type="text" class="text" id="custname" 
				   onclick="window.open('sales_return_popup.php','mywindow','width=500,height=550,toolbar=no,resizable=yes,menubar=no,scrollbars=yes')" readonly /></td>
				 
			</tr>
			
                
                <input type="hidden" name="stype" id="stype" class="textbox1" />			
				
                <input name="invno" type="hidden" class="textbox1" id="invno"/>
			
				<tr>
				  <td class="label1"><div align="right">Billing Type:</div></td>
				  <td align="left"><input type="text" name="btype"  id="btype" class="text" /></td>
				  </tr>
				<tr>
				<td class="label1"><div align="right">Sale Date:</div></td>
                <td align="left"><input name="saledate" type="text" class="text" id="saledate" readonly="readonly" /></td>
				</tr>
				<tr>
				<td class="label1"><div align="right">Sales Type:</div></td>
					<td align="left"><select name="stype1" id="stype1" class="text" onchange="javascript:saletype(this.value)">
                        <option value="C" selected="selected">Cash</option>
                       <!-- <option value="Q">Cheque</option>-->
						<option value="D"> Card</option>
                        	<!--<option value="E">Credit Sales</option>-->
                    </select></td>
				</tr>
              <input type="hidden" name="mvalue"/>
            </table></td>
          </tr>

            <tr><td colspan="2" align="center"><div id="productdetails"> <table width="100%" class="ruler" id="TABLE1"></table></div></td></tr>
			 <tr>
            <td height="4" colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
              
              <tr>
                <td>&nbsp;</td>
                <td><div align="right"><span class="label1"> Total:</span></div></td>
				 <td><input type="text" name="ntotal"  id="ntotal" class="text" readonly value="0" /></td>
                
              </tr>
			   <tr>
                <td>&nbsp;</td>
                <td><div align="right"><span class="label1"> Discount:</span></div></td>
                <td><input type="text" name="Discount"  id="Discount" class="text" readonly  value="0" /></td>
              </tr>
			   <tr>
                <td>&nbsp;</td>
                <td><div align="right"><span class="label1"> Net Total:</span></div></td>
               <td><input type="text" name="total"  id="total" class="text" readonly value="0" /></td>
              </tr>
              <tr>
                <td width="45%">&nbsp;</td>
                <td width="33%"><div align="right"><span class="label1">Return :</span></div></td>
                <td width="22%"><input type="text" name="rtotal"   id="rtotal" class="text" value="0" /></td>
              </tr>
			  <input type="text" name="ex"  id="ex" class="hidden" readonly value="0" />
               <tr>
			    <td width="45%" class="label1" ><div align="right">
      <input name="fin_flag" id="fin_flag"  type="hidden"/>
    <?php if($flg==1){ ?>
    <img src="images/finance_update.gif" alt="2" onclick="save(1)" /> &nbsp;
	
    
    <?php  } ?>
  </div>
                    <td width="47%" class="label1" ><div align="left">
					 <input type="submit" class="butt" value="Save" onclick="save(0)" />&nbsp;<input type="button" class="butt" value="Close" onclick="window.location.href='salesreturn.php'"/></div></td></tr>
              </table></td>
            </tr>
          </table>
          <p><br>
          </p>
          </td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="../images/box_botmleft.gif" alt="1" width="10" height="10" /></td>
            <td background="../images/box_botmbg.gif"><img src="../images/box_botmbg.gif" alt="1" width="1" height="10" /></td>
            <td width="10" height="10"><img src="../images/box_botmright.gif" alt="1" width="10" height="10" /></td>
          </tr>
        </table></td>
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