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
	$("#bno").autocomplete("set8.php", {
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
<script>
function reportxx(){
	var emp = [];
	var emp_id = myform.testname;
	//alert(emp_id);
	for (var i=0, iLen=emp_id.length; i<iLen; i++) {
    if (emp_id[i].checked) {
      emp.push(emp_id[i].value);
    }
  }
  //alert(emp);
	var bno = document.getElementById("bno").value;
	if(bno==""){
		alert("Enter Bill No");
		document.getElementById("bno").focus();
	}
	window.open('sample.php?bno='+bno+'&emp='+emp,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	
}	
</script>
<script type="text/javascript">
  function showDoc(cc){

		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="lab_test1.php"
			  url=url+"?emp_id="+cc;
               //alert(url)
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("POST",url,true)
				  xmlHttp.send(null)
	 }
		
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 

		  var strar = showdata.split("@");
			//alert(strar);
			if(strar.length>0){
			
			//  alert(opener.document.getElementById("t1").innerHTML);
            document.getElementById("invgtable").innerHTML=strar[0];
			document.getElementById("rows").value=strar[1];
                                                  //alert(strar[1]);
						

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
	</head>

	<body>

	<div id="conteneur">

		  
			
			  <?php
			  include("logo.php");

				include("main_menu.php");
			  ?>
			           
                              
			<div id="centre" >
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Report Entry Result</div>
                <form method="get" name="myform" action="#" target="new">
                  <table width="100%" cellpadding="4" cellspacing="0">
						
					<tr >
                        <td width="40%" align="right" > Enter Bill No. :</td>
                        <td align="left">
                            <input type="text" name="bno" id="bno" class="text" onfocus="showDoc(this.value)"/>
                        </td>
                    </tr>
					
                    <tr >
                        <td align="center" colspan="2" id="invgtable">
						
						</td>
                        
                    </tr> 
					
                <tr><td height="20px;"></td></tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="button" name="submit" class="butt" value="Report" onclick="javascript:reportxx()"/>&nbsp;&nbsp;&nbsp;&nbsp;
                        
						<input type="button" class="butt" value="Close" onclick="window.location.href='home.php'"/>
                    </td>
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

header('Location:index.php?authentication failed');

}

?>