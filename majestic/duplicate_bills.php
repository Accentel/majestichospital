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
	var rtype = document.getElementById("rtype").value;
	var bno = document.getElementById("bno").value;
	if(rtype==""){
		alert("select Report type");
		document.getElementById("rtype").focus();
	}
	if(bno==""){
		alert("Enter Bill No.");
		document.getElementById("bno").focus();
	}
	if(rtype == "Billing"){
		window.open('bill_rec.php?bno='+bno,'mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')
	}
	if(rtype == "Result Entry"){
		window.open('res_entry.php?bno='+bno,'mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')
	}
	if(rtype == "Biopsy Report"){
		window.open('biopsy_report.php?bno='+bno,'mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')
	}
	if(rtype == "Cytology Report"){
		window.open('cytology_report.php?bno='+bno,'mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')
	}
	if(rtype == "Blank Report"){
		window.open('blank_print.php?bno='+bno,'mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')
	}
	if(rtype == "Culture Report"){
		window.open('culture_print.php?bno='+bno,'mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')
	}
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
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Bills</div>
                <form method="get" name="myform" action="tot_students_report.php" target="new">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                
				</tr>
                <tr>
                    <td colspan="2" align="center">
                        <table width="100%" cellpadding="4" cellspacing="0">
						 <tr >
                        <td width="40%" align="right" > Report Type :</td>
                        <td align="left">
                            <select name="rtype" id="rtype" style="width:188px;height:24px;">
							<option value=""> -- Select -- </option>
							<!--<option value="Billing">Billing</option>-->
							<option value="Result Entry">Result Entry</option>
							<option value="Biopsy Report">Biopsy Report</option>
							<option value="Cytology Report">Cytology Report</option>
							<option value="Blank Report">Blank Report</option>
							<option value="Culture Report">Culture Report</option>
							
							</select>	
					   </td>		
						 <!-- <tr >
                        <td align="right" > Name :</td>
                        <td align="left">
                            <input type="text" name="pwd" id="pwd" class="text"/>
                        </td>
                    </tr>-->
					<tr >
                        <td align="right" > Enter Bill No. :</td>
                        <td align="left">
                            <input type="text" name="bno" id="bno" class="text"/>
                        </td>
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