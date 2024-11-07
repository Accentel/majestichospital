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
function fun_birthcer(birthcer)
{

if(document.getElementById("wife").value==" ")
{
alert("Please enter Husband Name..In Wife of field...");
document.getElementById("wife").focus();
return false;
}
if(document.getElementById("po").value==" ")
{
alert("Enter In PO Field....");
document.getElementById("po").focus();
return false;
}
if(document.getElementById("ps").value==" ")
{
alert("Enter In PS Field....");

document.getElementById("ps").focus();
return false;
}
if(document.getElementById("Dist").value==" ")
{
alert("Enter In Dist Field....");

document.getElementById("Dist").focus();
return false;
}
if(document.getElementById("weight").value=="")
{
alert("Enter In Baby weight Field....");

document.getElementById("weight").focus();
return false;
}
if(document.getElementById("BirthDate").value==" ")
{
alert("Enter In BirthDate Field....");
document.getElementById("BirthDate").focus();
return false;
}


document.birthcer.action="birth_certificate_update.php";
}
</script>
<script>
function birth_report(str)
{
document.getElementById("BIRTH_CER").value=str;
}
</script>
</head>

<body>
<form name="birthcer"  onsubmit="return fun_birthcer(this);"  autocomplete="off">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="10px"></td></tr>
    <tr>
      <td style="padding-top:3px;">
		<div align="center">
			<table width="70%" border="0" cellpadding="0" cellspacing="0"  style="border:solid 1px #9B2035; padding-bottom:5px;" >
                            
                              <tr>
              <td colspan="4" class="filepath_bg home_loginlink"><div align="left">Birth Certificate</div>  </td>
              </tr>
              <tr><td colspan="4">   <div id="div2" align="center" style="display:none"></div>
</td></tr>
							<tr>
							  <td colspan="2" ><div align="center" id="main_div" style="border-color:9B2035;" >
                                <table width="90%" border="0" cellpadding="2" align="center">
                                  <tr>
                                    <td width="17%"  class="label1"><div align="right">Wife Of :</div></td>
                                    <td width="36%"><div align="left">
                                        <input name="wife" id="wife" type="text" class="text"  size="30"/>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td class="label1"><div align="right">Address:</div></td>
                                    <td><div align="left">
                                        <textarea name="motaddress" cols="30" id="motaddress" rows="2" class="textarea1" readonly="readonly" ></textarea>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td class="label1"><div align="right">P.O:</div></td>
                                    <td><div align="left">
                                        <input name="po" id="po" type="text" class="text" />
                                    </div></td>
                                    <td  class="label1"><div align="right">P.S:</div></td>
                                    <td ><div align="left">
                                        <input name="ps" id="ps" type="text" class="text" />
                                    </div></td>
                                  </tr>
                                  <tr >
                                    <td class="label1"><div align="right">Dist:</div></td>
                                    <td><div align="left">
                                        <input name="Dist" id="Dist" type="text" class="text" />
                                    </div></td>
									   <td class="label1"><div align="right">Baby Weight:</div></td>
                                    <td><div align="left">
                                        <input name="weight" id="weight" type="text" class="text" />
                                    </div></td>
                                  </tr>
                                  <tr >
                                    <td class="label1"><div align="right">Delivered By:</div></td>
                                    <td  align="left" ><input type="radio" name="delby" id="delby1" value="lscs" />
                                      LSCS
                                        <input type="radio" name="delby" value="normal" id="delby2" checked="checked"/>
                                        Normal Delivary </td>
                                    <td width="16%"  class="label1"><div align="right">Sex:</div></td>
                                    <td width="31%" align="left" ><input type="radio" name="sex" value="Male"  id="Male" checked="checked"/>
                                      Male
                                        <input type="radio" name="sex" value="Female"  id="Female"  />
                                        Female </td>
                                  </tr>
                                  <tr >
                                    <td class="label1"><div align="right">Birth Date</div></td>
                                    <td  align="left" ><input type="text" name="BirthDate" id="BirthDate" class="tcal" value="<?php echo date('d-m-Y') ?>" readonly />  </td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table>
                                <table>
									<tr>
	   <td class="label1" ><div align="center"><input type='image'  src="images/save1.gif" onclick="birth_report(1)">&nbsp;<input name="image" type='image' src="images/report_butn.gif" onclick="birth_report(2)"/></div></td> 
	   <input type="hidden" id="BIRTH_CER" name="BIRTH_CER" value="0"/>
	    <td>
		           </td>	
	  </tr>
                                </table>
						      </div></td>
			  </tr>
      </table>
		</div>
		</td>
    </tr>
    
  </table>

    
</form>
</body>

</html>
