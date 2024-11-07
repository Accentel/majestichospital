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
			include("header1.php");
		?>
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#bno").autocomplete("set6.php", {
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
	var fdate = document.getElementById("fdate").value;
	var tdate = document.getElementById("tdate").value;
	
	var partic1 = document.getElementById("partic").value;
	
	window.open('total_collected3.php?sdate='+fdate+'&edate='+tdate+'&partic='+partic1,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
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
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Daily Collected Amount Report</div>
                <form method="get" name="myform"  target="new">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                
				</tr>
                <tr>
                    <td colspan="2" align="center" class="table">
                        <table width="100%" cellpadding="4" cellspacing="0">
						 <tr >
                        <td  align="right" >From Date :</td>
                        <td align="left">
                            <input name="fdate" type="date" class="text " id="fdate" value="<?php echo date('Y-m-d')?>"/>	
					   </td>
                       </tr>		
						  <tr height="20">
                       
                    </tr>
					<tr >
                        <td align="right" > To Date :</td>
                        <td align="left">
                            <input name="tdate" type="date" class="text " id="tdate" value="<?php echo date('Y-m-d')?>"/>
                        </td>
                    </tr>
                     </tr>		
						  <tr height="20">
                       <input name="partic" type="hidden" class="text " id="partic" value=""/>
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