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
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#pname").autocomplete("set19.php", {
		width: 180,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	
});	

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
	
	
	
	document.getElementById("pname").value=strar[1];
	
	
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search66.php?q="+str,true);
xmlhttp.send();
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



	</head>

	<body>

  
	<div id="conteneur">

		   <?php
				include("logo.php");
			  ?>
			
			  <?php
			  include('config.php');
				include("main_menu.php");
			  ?>
			   
		<div id="centre" style="height:auto;">
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">DRUG INDENT CERTIFICATE</div>
		  <form name="myform" method="post" action="insert_indent.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                        <tr >
                        <td align="right" >Type:</td>
                        <td align="left" >
                            <select  name="mrno"   class="text"  >
                             <?php 
						$q="select * from empdepartment";
						$k=mysqli_query($link,$q) or die(mysqli_error($link));
						while($t=mysqli_fetch_array($k)){
						?>
                        <option value="<?php echo $t['empid'] ?>"><?php echo $t['dept_name'] ?></option>
                        <?php }?>
                            
                            
                            </select>
                        </td>
						 <td align="right" >Staff Name :</td>
                        <td align="left" >
							
                            <input type="text" name="pname" id="pname" class="text"  required />
                        </td>
                    </tr>         
                    <tr >
                        
						 <td align="right" >From Date :</td>
                        <td align="left" >
                            <input type="text" name="fdate" id="fdate" style="width:188px;height:20px;" class="tcal" value="<?php echo date('d-m-Y') ?>"  />
                        </td>
                        <td align="right" >Pharmacy EmpName :</td>
                        <td align="left" >
                            <input type="text" name="tdate" id="tdate" style="width:188px;height:20px;"  value=""  />
                        </td>
                    </tr>
					
					 <tr >
                        <td align="right" >Status:</td>
                        <td align="left" >
                            <select name="status" id="status"  class="text"  >
						<option value="">Select Status</option>
                       <option value="issued">issued</option>
                       <option value="pending">pending</option>
                        
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
					   
					   <th width="50%" class="TH1">Name </th>
					   <th width="50%" class="TH1">Quantity</th>
					   </tr>
					   </thead>
					   <tr>
					   <td ><input type="text" class="text" name="tname[]"  id="cname1" onfocus="showHint21(this.value);" required/></td>
						<td ><input type="text" class="text" name="cost[]" id="cost1"   class="txt"/></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname2" onfocus="showHint22(this.value);" /></td>
						<td ><input type="text" class="text" name="cost[]" id="cost2"   class="txt"/></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname3" onfocus="showHint23(this.value);"/></td>
						<td ><input type="text" class="text" name="cost[]" id="cost3"   class="txt"/></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname4" onfocus="showHint24(this.value);"/></td>
						<td ><input type="text" class="text" name="cost[]" id="cost4"   class="txt"/></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname5" onfocus="showHint25(this.value);"/></td>
						<td ><input type="text" class="text" name="cost[]" id="cost5"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname6" onfocus="showHint26(this.value);"/></td>
						<td ><input type="text" class="text" name="cost[]" id="cost6"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname7" onfocus="showHint27(this.value);"/></td>
						<td ><input type="text" class="text" name="cost[]" id="cost7"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname8" onfocus="showHint28(this.value);"/></td>
						<td ><input type="text" class="text" name="cost[]" id="cost8"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname9" onfocus="showHint29(this.value);"/></td>
						<td ><input type="text" class="text" name="cost[]" id="cost9"  /></td>
						
						</tr>
						<tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname10" onfocus="showHint30(this.value);"/></td>
						<td ><input type="text" class="text" name="cost[]" id="cost10"  /></td>
						
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
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='drugindent_view.php'"/></div>
        
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