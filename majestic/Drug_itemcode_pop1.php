<script language="javascript" type="text/javascript" src="js/actb.js"></script>
<script language="javascript" type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/tableruler.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
<script>

function cur(){
document.form.supname.focus(); 
}
</script>
<script>

function cur(){
document.form.supname.focus(); 
}
</script>
<script>
$().ready(function() {
	$("#sel").autocomplete("search3.php", {
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
<style type="text/css">
.log_input{
  background:#F2F2F2;
  border:1px #CCCCCC solid;
}
</style>
<script>
function showHint(str)
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
	
	document.getElementById("type1").value=strar[1];
	
	//document.getElementById("p_name").value=strar[2];
	document.getElementById("unit1").value=strar[2];
	
	document.getElementById("packing1").value=strar[3];
	document.getElementById("vat1").value=strar[4];
	

	

	
	
	
    }
  }
xmlhttp.open("GET","search4.php?q="+str,true);
xmlhttp.send();
}
</script>


<form name="frm" method="post" action="get1.php?id=<?php echo id?> ">
<table><tr><td>
Party Code:<input type="text" id="sel" name="sel" onblur="showHint(this.value)" /></td></tr>
<tr><td><input type="submit" name="submit" value="submit" ></td></tr></table></form>