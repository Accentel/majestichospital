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
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Add Hospital Tariff Details</div>
		  <form name="myform" method="post" action="insert_hospitaltariff.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                       
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
					   <td ><input type="text" class="text" name="tname[]"  id="cname1"  required/></td>
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
					
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='uom_list1.php'"/></div>
        
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