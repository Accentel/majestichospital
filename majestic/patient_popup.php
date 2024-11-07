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
	$("#name").autocomplete("pname1.php", {
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
	 	  alert("Please select Patient Name");
	  return false;
  }
  return true
}
  function showDoc(cc){

		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="patient_popup_1.php"
			  url=url+"?emp_id="+cc;
                
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	 }
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
alert(showdata)
		  var strar = trim(showdata).split(":");

		  if(strar.length>0){
			 // window.opener.location.reload();
			 //window.location.reload(); 
		//alert(strar[1]+"---"+strar[2]);
				opener.document.getElementById("regno").value=strar[1];
				opener.document.getElementById("patname").value=strar[2];
				opener.document.getElementById("regdate").value=strar[5];
				opener.document.getElementById("age").value=strar[6];
				opener.document.getElementById("gen1").value=strar[7];
				//opener.document.getElementById("conce_type").value=strar[8];
				//opener.document.getElementById("conce_card").value=strar[9];
				//opener.document.getElementById("insutype").value=strar[10];

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
<title>Hospital Management System</title>
</head>
<body>
<?php
	include("config.php");
	if(isset($_REQUEST['name']))
	{
		$n = $_REQUEST['name'];
		$sql = mysqli_query($link,"select * from patientregister WHERE  registerno='$n' and status='' and pat_type!='Lab'")or die(mysqli_error($link));
		$rows = mysqli_num_rows($sql);
	}
	else
	{
		$sql = mysqli_query($link,"select * from patientregister WHERE   status='' and pat_type!='Lab' order by reg_id desc limit 100")or die(mysqli_error($link));
		$rows = mysqli_num_rows($sql);
	}
?>
<form name="docpat" action="patient_popup.php" autocomplete="off">
<table><tr><td>
  <div align="center">
<tr>
    <table width="400px" border="0" cellspacing="1" cellpadding="1">
               <tr>
                  <td width="118" >&nbsp;</td>
                 
                  <td width="663" class="label1" ><div align="right">
                    Search By MR NO:</div></td>
                  <td width="153"><input name="name" type="text" class="textbox1" id="name" />
                  
                  </td>
                                     <script>
							        var obj = actb(document.getElementById('searchingpop'),search_suggestions);
									</script>
  <td width="45"><input name="image" type="image" src="images/go1.gif" width="41" height="20" border="0"/></td>
      </tr>
    </table></tr>
<tr></tr>
<tr></tr>
<!-------------------------------------------->
<tr align="center">
<table width="400px" class="sortable"  id="TABLE1" align="center">
  <thead>
    <tr>
      <th class="TH1"><div align="center">Patient Reg.No </div></th>
      <th class="TH1">Patient Name</th>
     
    </tr>
  </thead>
  <tbody >
	<?php
		if($sql){
		while($res = mysqli_fetch_array($sql))
		{
			
	?>
    <tr class="tr1">
      <td class="TD1"><input type="radio" name="empid" value="<?php echo $res['registerno'] ?>" onclick="javascript:showDoc(this.value);"/> <?php echo $res['registerno'] ?>       </td>
      <td class="TD1"><?php echo $res['patientname'] ?></td>
    
    </tr>
	<?php
		}
	}
	?>	
   
    <tr>
      <td colspan="6"><div align="center" ><font color="red">No Records Found</font></div></td>
    </tr>
    
  </tbody>
</table>
</tr>
<!-------------------------------------------->

<tr>
  <div align="right"><a href="javascript:window.close()"><b><font color="#FF6600">Close</font></b></a></div>
</tr>
  </div></td></tr></table>

</form>
</body>
</html>
