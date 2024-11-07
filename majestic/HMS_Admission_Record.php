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
function sav()
{
if(document.getElementById("prdiag").value=="")
			{
				alert("Please Enter Provisional Diagnosis Feild");
				document.getElementById("prdiag").focus();
				document.getElementById("prdiag").value="";
				return false;
			}
if(document.getElementById("fidiag").value=="")
			{
				alert("Please Enter Final Diagnosis Feild");
				document.getElementById("fidiag").focus();
				document.getElementById("fidiag").value="";
				return false;
			}
if(document.getElementById("comp").value=="")
			{
				alert("Please Enter Complications Feild");
				document.getElementById("comp").focus();
				document.getElementById("comp").value="";
				return false;
			}
if(document.getElementById("oppro").value=="")
			{
				alert("Please Enter Operational Procedure Feild");
				document.getElementById("oppro").focus();
				document.getElementById("oppro").value="";
				return false;
			}
if(document.getElementById("deptref").value=="")
			{
				alert("Please Enter Depts prefered to Feild");
				document.getElementById("deptref").focus();
				document.getElementById("deptref").value="";
				return false;
			}
if(document.getElementById("death").value=="")
			{
				alert("Please Enter Event of Death Feild");
				document.getElementById("death").focus();
			    document.getElementById("death").value="";
				return false;
			}

document.form2.action="hms_admission_record_update.php";
}
</script>
</head>

<body>
<form name="form2" autocomplete="false" onsubmit="return sav(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="10px"></td></tr>
    <tr>
      <td>
		<div align="center">
			<table width="90%" border="0" cellpadding="3" cellspacing="4">
                            
                             
							<tr>
							  <td >  <table width="100%" border="0" cellpadding="2">
							             <tr><td  class="label1" colspan="2"><div align="right">Provisional Diagnosis:</div></td>
								  <td  colspan="2"><div align="left">
								      <textarea name="prdiag" id="prdiag" cols="30" rows="1" class="textarea1"></textarea>
								    </div></td>
								  </tr>
                                     <tr><td  class="label1" colspan="2"><div align="right">Final Diagnosis:</div></td>
								  <td colspan="2" ><div align="left">
								      <textarea name="fidiag" cols="30" rows="1" id="fidiag" class="textarea1"> </textarea>
								    </div></td>
								  </tr>
								         <tr><td  class="label1" colspan="2"><div align="right">Complications:</div></td>
								  <td colspan="2"><div align="left">
								      <textarea name="comp"  id="comp" cols="30" rows="1" class="textarea1"></textarea>
								    </div></td>
								  </tr>
								      <tr><td  class="label1" colspan="2"><div align="right">Operational Procedure:</div></td>
								  <td colspan="2"><div align="left">
								      <textarea name="oppro"  id="oppro" cols="30" rows="1" class="textarea1"></textarea>
								    </div></td>
								  </tr>
								       <tr><td  class="label1" colspan="2"><div align="right">Depts Prefered To:</div></td>
								  <td  colspan="2"><div align="left">
								      <textarea name="deptref" id="deptref" cols="30" rows="1" class="textarea1"></textarea>
								    </div></td>
								  </tr>
								     <tr style="display:none"><td class="label1" colspan="2"><div align="right">Discharge Status:</div></td>
								  <td colspan="2" ><div align="left">
								    </div></td>
								  </tr>
								     <tr><td  class="label1" colspan="2"><div align="right">In the Event Of Death:</div></td>
								  <td colspan="2" ><div align="left">
								    <textarea name="death" id="death" cols="30" rows="1" class="textarea1"></textarea>
								    </div></td>
									<td  class="label1" ><div align="right">Auto Pay</div></td>
								  <td width="33%" colspan="2"><div align="left">
								   <input name="check" id="check" type="checkbox" value="Yes" />
								   Yes
								    </div></td>
									
								  </tr>
								    <tr>
									<td  class="label1"  colspan="5"><div align="right">Time</div></td>
								 <td colspan="2" ><div align="left">
							  <input type="text" name="ar_dt" id="ar_dt" class="tcal" value="<?php echo date('d-m-Y') ?>" readonly />
							  </div></td>
									
								  </tr>
                                  <tr><td colspan="3"><div align="center"><input type='image'  src="images/save1.gif" ></div></td></tr>
                                </table>
								<!--<table align="center">
								<tr><td><div align="center"><input type='image'  src="images/save1.gif" ></div></td></tr>
								</table>-->
								</td>
							</tr>
      </table>
		</div>
		</td>
    </tr>
    
   
    
  </table>

</form>
</body>

</html>
