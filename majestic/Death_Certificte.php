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
function fun_deathcer(deathcer)
{
if(document.getElementById("Religion").value==" ")
{
alert("Please enter Religion...");
document.getElementById("Religion").focus();
return false;
}
if(document.getElementById("Nationality").value==" ")
{
alert("Please enter Nationality...");
document.getElementById("Nationality").focus();
return false;
}
if(document.getElementById("ps1").value==" ")
{
alert("Please enter ame Of The Father/Husband...");
document.getElementById("ps1").focus();
return false;
}

if(document.getElementById("dodeath").value==" ")
{
alert("Please enter Date Of Death...");
document.getElementById("dodeath").focus();
return false;
}
if(document.getElementById("Disease").value==" ")
{
alert("Please enter Disease...");
document.getElementById("Disease").focus();
return false;
}
if(document.getElementById("cofdeath").value==" ")
{
alert("Please enter Case Of Death...");
document.getElementById("cofdeath").focus();
return false;
}
if(document.getElementById("nameofrec").value==" ")
{
alert("Please enter Name of Receiver..");
document.getElementById("nameofrec").focus();
return false;
}
if(document.getElementById("MO").value==" ")
{
alert("Please enter Name of M.O..");
document.getElementById("MO").focus();
return false;
}
if(document.getElementById("phnorec").value==" ")
{
alert("Please enter Phone Number Of M.O..");
document.getElementById("phnorec").focus();
return false;
}
  var val=document.getElementById("phnorec").value;
	  if(isNaN(val)){
	  alert("Please enter Phone Number Of M.O.. (NUMBER).");
	  document.getElementById("phnorec").value="";
document.getElementById("phnorec").focus();
	  return (false);
	        }	
document.deathcer.action="death_certificate_update.php";
}
</script>
<script>
function death_report(str)
{
document.getElementById("DEATH_CER").value=str;
}
</script>
</head>

<body>
<form name="deathcer" onsubmit="return fun_deathcer(this)" autocomplete="off">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="10px"></td></tr>
    <tr>
      <td>
		<div align="center">
			<table width="85%" border="0" cellpadding="3" cellspacing="4" style="border:solid 1px #9B2035; padding-bottom:5px;">
                            
                              <tr>
              <td colspan="4" class="filepath_bg home_loginlink"><div align="left">Death Certificate</div>  </td>
              </tr>
							<tr>
							  <td colspan="2" ><div align="center" >
                                <table width="90%" border="0" cellpadding="2" align="center">
                                  <tr>
                                    <td width="18%"  class="label1"><div align="right">Religion :</div></td>
                                    <td><div align="left">
                                        <input type="text" name="Religion" id="Religion"  class="text" />
                                    </div></td>
                                    <td width="29%" class="label1"><div align="right">Nationality:</div></td>
                                    <td><div align="left">
                                        <input name="Nationality" id="Nationality" type="text" class="text" />
                                    </div></td>
                                  </tr>
  <td class="label1"><div align="right">Martial Status:</div></td>
      <td  align="left"><input type="radio" name="ms" value="M" id="M" checked="checked"/>
      Married
        <input type="radio" name="ms" value="U"  id="U"/>
      Unmarried </td>
      <td  class="label1"><div align="right">Name Of The Father/Husband:</div></td>
      <td ><div align="left">
          <input name="ps1" id="ps1" type="text" class="text" />
      </div></td>
  </tr>
   <tr >
    <td class="label1"><div align="right">Date Of Admit:</div></td>
    <td  align="left" colspan=""><input type="text" name="doadmit" id="doadmit" class="tcal"  readonly />
</td>
   <td class="label1"><div align="right">Date Of Death:</div></td>
    <td  align="left" ><input type="text" name="dodeath" id="dodeath" class="tcal" value="<?php echo date('d-m-Y') ?>" readonly/>
</td>
 
  </tr><tr>
  <td   class="label1"><div align="right">Disease:</div></td>
      <td colspan="3">  <textarea name="Disease" id="Disease" cols="70" rows="2" class="textarea1">
	         </textarea></td>
  </tr>
 <tr>
  <td   class="label1"><div align="right">Cause Of Death:</div></td>
      <td  align="left" colspan="3">  <textarea name="cofdeath" id="cofdeath" cols="70" rows="2" class="textarea1">
	         </textarea></td>
  </tr>
  <tr>
                                    <td width="18%"  class="label1"><div align="right">Name Of Receiver :</div></td>
                                    <td width="28%"><div align="left">
                                        <input name="nameofrec" id="nameofrec" type="text" class="text" />
                                    </div></td>
                                    <td width="29%" class="label1"><div align="right">Name Of M.O:</div></td>
                                    <td width="25%"><div align="left">
                                        <input name="MO" id="MO" type="text" class="text" />
                                    </div></td>
                                  </tr>
								   <tr>
                                    <td width="18%"  class="label1"><div align="right">Add.of Receiver :</div></td>
                                    <td width="28%"><div align="left">
                                       <textarea name="Reciver" cols="30" id="Reciver" rows="2" class="textarea1" ></textarea>
                                    </div></td>
                                    <td width="29%" class="label1"><div align="right">Ph.No.of Receiver :</div></td>
                                    <td width="25%"><div align="left">
                                        <input name="phnorec" id="phnorec" type="text" class="text" />
                                    </div></td>
                                  </tr>
								    <tr >
      <td class="label1"><div align="right">Date Of Receive:</div></td>
    <td  align="left" ><input type="text" name="dateofrec" id="dateofrec" class="tcal" value="<?php echo date('d-m-Y') ?>" readonly/>
</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
                                </table>
                                <table>
									<tr>
	   <td class="label1" ><div align="center"><input type='image'  src="images/save1.gif" onclick="death_report(1);">&nbsp;<input name="image" type='image' src="images/report_butn.gif" onclick="death_report(2)"/></div>
	   </td>  <td><div align="left">
	   <input type="hidden" id="DEATH_CER" name="DEATH_CER" value="0"/>
		             </div></td>	
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
