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
	$("#mrno").autocomplete("set666.php", {
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
	var mrno = document.getElementById("mrno").value;
	
	window.open('patient_payment_history.php?mrno='+mrno,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
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
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Patients Payment History Report</div>
                <form method="get" name="myform"  target="new">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                
				</tr>
                <tr>
                    <td colspan="2" align="center">
                        <table width="100%" cellpadding="4" cellspacing="0">
						 <tr >
                        <td width="40%" align="right" >UMR No :</td>
                        <td align="left">
                            <input name="mrno" type="text" class="text " id="mrno" />	
					   </td>
                       </tr>		
						  <tr height="20">
                       
                    </tr>
					
                       
                    </td>
                </tr>
                 </tr>		
						  <tr height="20">
                       
                    </tr>
               
                        </table>
                    </td>
                </tr>
                <tr><td height="20px;"></td></tr>
                <tr>
                    <td align="center">
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

header('Location:login.php?authentication failed');

}

?>