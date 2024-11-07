<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
$aname= $_SESSION['name1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	<script language="javascript">

function Addrow()
{
    var count=document.getElementById("rows").value
	   for(k=1;k<=count;k++)
		{
		  var select3="itemcode"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			
			var select12="minlevel"+k;
			if(document.getElementById(select12).value=="")
			{
				alert("Min Order Level Feild is Empty");
				document.getElementById(select12).focus();
				return false;
			}
					
	
		}//for
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select3="itemcode"+i;
		var pp=document.getElementById(select3).value;	
		for(j=count;j!=i;j--)
			{	
		 var select32="itemcode"+j;
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
		



	   var supcode=document.getElementById("supcode").value
	   //alert(count);
   var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	// var oCell = document.createElement("TD");
   // oCell.innerHTML= "<div align='center' ><input  type='text' name='itemcode"+Row+"' id='itemcode"+Row+"' class='textbox1'   size='8' onclick=window.open('Supplier_itemcode_pop.jsp?rowid="+Row+"&supcode="+supcode+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly class=textbox> </div>"; 
	//row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='itemname"+Row+"' id='itemname"+Row+"' class='textbox1'   size='8'> </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='uom"+Row+"' id='uom"+Row+"'class='textbox1' size='8'  > </div>"; 
     row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='minlevel"+Row+"' id='minlevel"+Row+"' class='textbox1'  > </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='rate"+Row+"' id='rate"+Row+"'class='textbox1'  > </div>"; 
     row.appendChild(oCell);




     document.getElementById("rows").value=Row;
//sameinvcodes(Row);


   }//addrow()


function deleteRow()
{
  var tbl = document.getElementById('TABLE1');
  var lastRow = tbl.rows.length;
var rowss=document.getElementById("rows").value;

  if (lastRow > 1){ tbl.deleteRow(lastRow - 1);document.getElementById("rows").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}

</script>
<script>
function check()
	{
if(document.form.supcode.value=="")
{
alert("Please Click On SupplierCode");
return false;
}

 var count=document.getElementById("rows").value
	   for(k=1;k<=count;k++)
		{
		  var select3="itemcode"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			
			var select12="minlevel"+k;
			if(document.getElementById(select12).value=="")
			{
				alert("Min Order Level Feild is Empty");
				document.getElementById(select12).focus();
				return false;
			}
					
	
		}//for
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select3="itemcode"+i;
		var pp=document.getElementById(select3).value;	
		for(j=count;j!=i;j--)
			{	
		 var select32="itemcode"+j;
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

	//alert("else update")
	document.form.action="supplier_items_update.php"
	document.form.submit()

	
}//check
</script>
	</head>

	<body>

	<div id="conteneur">
		
		  

		<?php /*?>  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		  
	


		  <div id="centre" style="height:auto;">
		  
          <h1 style="color:red;" align="center"> SUPPLIER ITEMS</h1>
          
                      <form name="form" method="post">
                
<table width="100%" cellspacing="10" align="center">

  <tr>
	<td width="45%" class="label1">Supplier Code : </td>
	<td><input name="supcode" type="text" class="text" id="supcode" onclick="window.open('supplier_item_popup.php','mywindow','width=500,height=550,toolbar=no,resizable=yes,menubar=no,scrollbars=yes')" readonly="readonly"/></td>
	</tr>
	<tr>
	<td class="label1">Supplier Name : </td>
	<td><input name="supname" type="text" class="text" id="supname" /></td>
  </tr>
	 <tr>
	<td class="label1">Category : </td>
	<td><input name="category" type="text" class="text" id="category"/></td>
  </tr>
  <input type="hidden" name="mvalue"/>
<tr><td colspan="2" width="100%"><div id="itemdetails" ></div></td>
                <td><input name="hidden" type="hidden" id="htnDcode" runat="server" />
                    <input type="hidden" runat="server" id="htncount" name="htncount1" />
                    <input type="hidden"  runat="server" id="count" name="count" value="1" />
                    <input type="hidden"  runat="server" id="htnt" name="str" />
                    <input name="cnt" type="hidden" id="cnt">
				</td>
           </tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt" />&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='home.php'"/></td><td></td></tr></table>
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