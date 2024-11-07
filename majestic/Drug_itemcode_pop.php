<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("header.php");
?>
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#name").autocomplete("set69.php", {
		width: 150,
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
<script type="text/javascript">
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function validate(){
	
	var emp_value ="";
	//var selected=false;

  for (var i=0; i < document.docpat.empid.length; i++){

   if (document.docpat.empid[i].checked){
	   var emp_value = document.docpat.empid[i].value;
	 //alert("emp val -->"+emp_value);     
   }
  }
  if( emp_value == "" || emp_value== null ){
	 	  alert("Please select Supplier Code");
	  return false;
  }
  return true
}
  function showDoc(){
  //alert(1)
	 var c=document.docpat.c.value;
	
	//alert("c val -->"+c);
	 if(c = 1){
		 var cc=document.docpat.empid.value;
		 
 //alert("cc val -->"+cc);
		var selected=false;
        if (document.docpat.empid.checked){selected=true;}   
  /*
  if( !(selected) ){
	
	  alert("Please select Supplier Code");
	  return false;
  }*/
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="drug_getitemcode.php"
			  url=url+"?emp_id="+cc;
                
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	 }
			  if( c != 1){

	 if(validate()){
		   
		  for (var i=0; i < document.docpat.empid.length; i++){
			  if(document.docpat.empid[i].checked){
				  var emp_value = document.docpat.empid[i].value;
// alert("in c not 1"+emp_value);
			  }
		  }
		  xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="drug_getitemcode.php"
			  url=url+"?emp_id="+emp_value;
     		//	alert(url);
			  xmlHttp.onreadystatechange=stateChanged 

				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	  }
  }
  }
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
		   var rws1=document.docpat.rws.value;
	// alert(rws1)
//alert(showdata)
		  var strar = trim(showdata).split(":");

		  if(strar.length>0){
		  //alert("hi");
			 // window.opener.location.reload();
			 //window.location.reload(); 
		//alert(strar[1]+"---"+strar[2]);
			  //opener.document.getElementById("pcode"+rws1).value=strar[1];
			  opener.document.getElementById("pname"+rws1).value=strar[1];
			  //opener.document.getElementById("packing"+rws1).value=strar[3];
			  opener.document.getElementById("vat"+rws1).value=strar[3];
			  opener.document.getElementById("maniby"+rws1).value=strar[2];
			  opener.document.getElementById("HSN"+rws1).value=strar[6];
			  //opener.document.getElementById("cgst"+rws1).value=strar[5];
			  
			

   			   window.close();
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
<title>Pharmacy</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head><title>Pharmacy</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>
<body>
<form name="docpat" action="Drug_itemcode_pop.php" autocomplete="off">
<table><tr><td>
  <div align="center">
<tr>
    <table width="400px" border="0" cellspacing="1" cellpadding="1">
               <tr>
                  <td width="118" class="label1">&nbsp;</td>
             
                  <td width="663" class="label" ><div align="right">
                    <input name="gname" type="hidden" value="enter"/>
                    Search By Product Name:</div></td>
                  <td width="153"><input name="searchname" type="text" class="textbox1" id="name" />
                  </td>
                                
  <td width="45"><input name="image" type="image" src="images/go1.gif" width="41" height="20" border="0"/></td>
      </tr>
    </table></tr>
<tr></tr>
<tr></tr>
<!-------------------------------------------->
<tr align="center">
<table width="100%" id="TABLE1" align="center">
  <thead>
    <tr>
      <th class="TH1"><div align="center">Product Name </div></th>
      
      <th class="TH1">MFG.BY</th>
       <th class="TH1">HSN</th>
     
    </tr>
  </thead>
  <tbody >
   
    
<?php
include("config.php");
$rowid = $_REQUEST['rowid'];
if(isset($_REQUEST['searchname'])){
$name = $_REQUEST['searchname'];
 $cc="select PRD_NAME,mani_by,HSN from phr_prddetails_mast  where PRD_NAME='$name'  ";  

//} else {
	 //$cc="select PRD_NAME,mani_by from phr_prddetails_mast ";  
	 
	 }
$sq=mysqli_query($link,$cc);
$records = mysqli_num_rows($sq);
while($res=mysqli_fetch_array($sq)){
	 $g=$res['PRD_NAME'];
	$a=$res['PRD_NAME'];
	$b=$res['mani_by'];
	$c=$res['HSN'];
	


	?>
    
    <tr><td style="padding-left:20px;"><input type="radio" name="empid" value="<?php echo $g ?>" onclick="javascript:showDoc();"/> <?php echo $g?></td>
    <td><?php echo $b?></td>
	<td><?php echo $c?></td></tr><?php  }?>
	
<input type="hidden" name="c" value="<?php echo $records ?>">
    <tr>
      <td colspan="6"><div align="center" ><font color="red">No Records Found</font></div></td>
    </tr>
   
  </tbody>
 <input type="hidden" name="rowid" value="<?php echo $rowid ?>"/>
</table>
</tr>
<!-------------------------------------------->
<tr>

</tr>
		  <input type="hidden" name="rws" value="<?php echo $rowid ?>" >					               

<tr>
  <div align="right"><a href="javascript:window.close()"><b><font color="#FF6600">Close</font></b></a></div>
</tr>
  </div></td></tr></table>

</form>
</body>
</html>
