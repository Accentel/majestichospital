<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Hospital Management System</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link href="../css/menu_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link rel="stylesheet" type="text/css" href="../css/table_style.css" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />
<script type="text/javascript" src="../js/tableruler.js"></script>

<script>
function reportinvestigation(){
var patno=document.getElementById("invpat").value;
window.open('bill_case.php?patno='+patno+'','mywindow2','width=1020,height=720,toolbar=no,menubar=no,scrollbars=yes')

}
</script>
</head>

<body>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="20px"></td></tr>
    <tr>
      <td>
			<table width="98%" border="0" cellpadding="3" cellspacing="4">
                          <tr><td height="10px"></td></tr>
                            
							<tr>
							  <td colspan="2" ><div align="center" id="diagno">
                                <table width="60%" border="0" cellpadding="2">
                                  <thead>
                                    <tr>
                                      <th  class="TH1">S.No </th>
                                      <th  class="TH1">Test Date </th>
                                       <th class="TH1" style="display:none">Lab Code</th>
									    <th class="TH1">Test Name</th>
                                    
                                     </tr>
                                  </thead>
                                </table>
						      </div></td>
			  </tr> 
			     <input type="hidden" id="abc8" name="abc8" value="0"/>
      </table>
	
		</td>
    </tr>
    
   
    
  </table>

</body>


</html>
