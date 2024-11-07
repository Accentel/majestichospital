<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname= $_SESSION['name1'];
	
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header1.php");
		?>
	<style>
	.style2{
		color:red;
	}
	</style>
	<!--<script>

   function fun(a)
   {
        if(document.myform.tname.value=="")
           {
			   alert("Please Select Type Name");
			   document.myform.prdname.value=""
			   document.getElementById("tname").focus();
			   return false;
		    }
           if(document.myform.prdname.value=="")
           {
			   alert("Please Select Product Name");
			   return false;
		    }
//alert(a);
var tcode=document.myform.tname.value;
//alert(tcode);
	xmlHttp=CreateXmlHttpObject()
  if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request")
  return
  } 
  var url="Pro_Code_Generation.php?qparam="+a+"&qparam1="+tcode;
  //var url="Pro_Code_Generation.jsp"
  //url=url+"?qparam="+a
  //url=url+"&qparam1="+b
  //url=url+"&sid="+random()
  //alert(url);
  xmlHttp.onreadystatechange=stateChanged 
  xmlHttp.open("GET",url,true)
  xmlHttp.send(null)
   }
  function stateChanged() 
  { 
  if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
  { 
	 
  document.getElementById("prdcode").innerHTML="<b>"+xmlHttp.responseText+"</b>";
  
  } 
  }
  function CreateXmlHttpObject()
  { 
  var objXMLHttp=null
  if (window.XMLHttpRequest)
  {
  objXMLHttp=new XMLHttpRequest()
  }
  else if (window.ActiveXObject)
  {
  objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
  }
  return objXMLHttp
}

</script>-->
	</head>

	<body >

	<div id="conteneur" class="container" >

		  <?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
		?>
		  
		  <div id="centre" style="min-height:500px !important;">
		  
          <h1 style="color:red;" align="center">ADD PRODUCT DETAILS</h1>
           <fieldset style="border:1px solid; height:auto; padding:10px;
          width:auto;">
        <form name="myform" method="post" action="insert_product_details.php">
             <input type="hidden" name="authby" value="<?php echo $aname ?>"/>   
<table width="100%" cellspacing="10" class="table" align="center">
<tr>
   <td  class="label1">Product Type Name <span class="style2">*</span> : </td>
	<td >
	<select name="tname" id="tname" required  class="text">
	<option value=""> -- Select Type -- </option>
	 <?php
	   
		$sql = mysqli_query($link,"select prdtype_code,prdtype_name from phr_prdtype_mast order by prdtype_name")or die(mysqli_error($link));
		if($sql){
			while($row = mysqli_fetch_array($sql))
			{
				$prdcode=$row[1];
				$prdname=$row[1];
				
	?>
	<option value="<?php echo $prdcode ?>"><?php echo $prdname ?></option>
	<?php
			}
		}
	?>
	</select></td> </tr>
  <tr>
	<td class="label1">Product Name <span class="style2">*</span> : </td>
	<td><input name="prdname" type="text" class="text" id="prdname" required /></td>
  </tr>
	
  
   
   <tr>
	<td class="label1">GST(%) <span class="style2">*</span> : </td>
	<td>
	<select name="vtax" id="vtax" required  class="text">
	<option> --- Select GST Tax --- </option>
     <option value="0">0</option>
	<option value="5">5</option>
	<option value="12">12</option>
	<option value="18">18</option>
    <option value="28">28</option>
   
	</select>		</td>		</tr>
    
    
     <tr>
	<td class="label1"> SGST(%) <span class="style2">*</span> : </td>
	<td>
	<select name="sgst" id="sgst" required class="text">
	<option> --- Select SGST Tax --- </option>
     <option value="0">0</option>
	<option value="2.5">2.5</option>
	<option value="6">6</option>
	<option value="9">9</option>
    <option value="14">14</option>
	</select>			</td>	</tr>
    
     <tr>
	<td class="label1">CGST(%) <span class="style2">*</span> : </td>
	<td>
	<select name="cgst" id="cgst" required  class="text">
	<option> --- Select CGST Tax --- </option>
     <option value="0">0</option>
	<option value="2.5">2.5</option>
	<option value="6">6</option>
	<option value="9">9</option>
    <option value="14">14</option>
	</select>		</td>		</tr>
    </td>
	 <tr>
	<td class="label1">HSN<span class="style2">*</span> : </td>
	<td><input name="hsn" type="text" class="text" id="HSN" required  /></td>
  </tr>
   <tr>
	<td class="label1">Manufactured By <span class="style2">*</span> : </td>
	<td><input name="maniby" type="text" class="text" id="maniby" required  /></td>
  </tr>

<tr height="10px"></tr>
<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Cancel" onclick="window.location.href='product_details_list.php'"/></td></tr></table>
	           </form>        
		
        </fieldset>
        </div></td>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}
else
{

session_destroy();

session_unset();

header('Location:login.php');

}

?>