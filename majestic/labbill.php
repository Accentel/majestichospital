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
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
     <script>
$().ready(function() {
	$("#bno").autocomplete("ipreg1.php", {
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
	
  //alert(emp);
	var bno = document.getElementById("bno").value;
	if(bno==""){
		alert("Enter Bill No");
		document.getElementById("bno").focus();
	}else{
	window.open('sample1.php?bno='+bno,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
}	
</script>
<script type="text/javascript">
  function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("labre").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","search32.php?q="+str,true);
  xmlhttp.send();
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
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Lab Bill Summary</div>
                <form method="post" name="myform" action="sample1.php" target="new">
                  <table width="100%" cellpadding="4" cellspacing="0">
						
					<tr >
                        <td width="40%" align="right" > Enter UMR.NO. :</td>
                        <td align="left">
                            <input type="text" name="bno" id="bno" class="text bno" onfocus="showUser(this.value)"/>
                        </td>
                    </tr>
					
                    <tr >
                        <td align="center" colspan="2" id="labre">
						
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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".bno").autocomplete({
        source: "set199.php",
        minLength: 1
    });  
	 });
	 </script>
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