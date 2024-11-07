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
<script  type="text/javascript" src="./js/datetimepicker.js"></script>

<script type="text/javascript" >


function fun_an()
{
if(document.getElementById("ad_notes").value=="")
			{
				alert("Please Enter Admission notes Field");
				document.getElementById("ad_notes").focus();
				document.getElementById("ad_notes").value="";
				return false;
			}

document.formname.action="hms_admission_notes_update.php";
}
function report2(str){
document.getElementById("abc2").value=str;
}
</script>

</head>

<body>
<form name="formname" autocomplete="off" onsubmit="return fun_an(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="10px"></td></tr>
    <tr>
      <td>
		<div align="center">
			<table width="60%" border="0" cellpadding="3" cellspacing="4">
                            
                           
							<tr>
							  <td >  <table width="100%" border="0" cellpadding="2">
							 <tr><td  class="label1" colspan="2"><div align="right">DateTime:	</div></td>
							<td width="51%" colspan="2" ><div align="left">
							  <input type="text" name="dt" id="dt" class="tcal" value="<?php echo date('d-m-Y'); ?>" readonly />
							  </div></td>
							
							</tr>
                                  <tr><td  class="label1" colspan="4"><div align="left">Admission Notes Template:</div></td>
								
								  </tr>
                                  <tr><td colspan="4" >
								    <div align="center">
								      <textarea name="ad_notes" id="ad_notes" cols="70" rows="4" class="textarea1"></textarea>
								    
								    </div></td></tr>
									<tr>
		  <td width="36%" height="43"  colspan="2">
		        <div align="right">
		          <input name="image" type='image' src="images/save1.gif" onclick="report2(1)"/>
				 <input type="hidden" id="abc2" name="abc2" value="0"/>
		          </div></td>
				    <td width="13%" >
		              <div align="left">
					  <input name="image" type='image' src="images/report_butn.gif" onclick="report2(2)"/>
		            
		                </div></td>
		</tr>
	   <div id="aa"> <input type="hidden" name="ccc" id="ccc" value=""/></div>
                                </table></td>
							</tr>
      </table>
		</div>
		</td>
    </tr>
    
   
    
  </table>

</form>
</body>

</html>
