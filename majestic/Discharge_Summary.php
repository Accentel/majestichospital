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
function fun_dsc(dscform)
{


if(document.getElementById("history_ds").value=="")
			{
				alert("Please Enter History Feild");
				document.getElementById("history_ds").focus();
				document.getElementById("history_ds").value="";
				return false;
			}
if(document.getElementById("cf").value=="")
			{
				alert("Please Enter Clinical Finings Feild");
				document.getElementById("cf").focus();
				document.getElementById("cf").value="";
				return false;
			}
if(document.getElementById("ch").value=="")
			{
				alert("Please Enter Course in the Hospital Feild");
				document.getElementById("ch").focus();
				document.getElementById("ch").value="";
				return false;
			}

if(document.getElementById("ta").value=="")
			{
				alert("Please Enter Treatment Advise Feild");
				document.getElementById("ta").focus();
				document.getElementById("ta").value="";
				return false;
			}
			
if(document.getElementById("Review").value=="")
			{
				alert("Please Enter Review After Feild");
				document.getElementById("Review").focus();
				document.getElementById("Review").value="";
				return false;
			}
if(document.getElementById("treating").value=="")
			{
				alert("Please Enter Treating Consultant Feild");
				document.getElementById("treating").focus();
				document.getElementById("treating").value="";
				return false;
			}

document.dscform.action="discharge_summary_update.php";
}

</script>
<script>
function report(str)
{

var patno=document.getElementById("patno1").value;
document.getElementById("abc").value=str;
			
//			if(str==2)
		//	window.open('Discharge_Summary_Report.jsp?patno='+patno,'mywindow2','width=800,height=800,toolbar=no,menubar=no,scrollbars=yes')

}
</script>
</head>
<body>
<form name="dscform" autocomplete="off" onsubmit="return fun_dsc(this);" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr><td height="10px"></td></tr>
    <tr>
      <td>
	<div align="center">
            <table width="85%" border="0" cellpadding="3" cellspacing="4">
               <tr>
		<td >  
                    <table width="100%" border="0" cellpadding="2">	  
                    <tr>
                        <td width="37%" class="label1" ><div align="right">Consultants Name:</div></td>
               <td width="63%">
                   <div id="doctorname"><input type="text" name="doctorname" id="doctorname" class="text" readonly="readonly"/></div>
               </td>
                    </tr>
                <tr>
                    <td class="label1"> <div align="right">History:</div></td>
	     <td class="label1" ><div align="left">
	       <textarea name="history_ds" id="history_ds" cols="70" rows="2" class="textarea1">
	         </textarea>
	       </div></td>
	   </tr>
	   
	   <tr><td    class="label1" > <div align="right">Clinical Finings:
	     
	     </div></td>
		 <td><div align="left">
		   <textarea name="cf" id="cf" cols="70" rows="2" class="textarea1">
	         </textarea>
		   </div></td></tr>
	   
	   <tr><td    class="label1"> <div align="right">Investigations:
	     
	     </div></td>
	     <td><div id="invgitmaname">
	       <textarea name="invg" id="invg" cols="70" rows="2" class="textarea1" readonly>
	         </textarea>
	       </div></td>
	   </tr>
	   
	   <tr><td   class="label1" > <div align="right">Course in the Hospital:
	     
	     </div></td>
	     <td   class="label1" ><div align="left">
	       <textarea name="ch" id="ch" cols="70" rows="2" class="textarea1">
	         </textarea>
	       </div></td>
	   </tr>
	   
	   <tr><td    class="label1" > <div align="right">Treatment Given:
	     
	     </div></td>
		 <td><div id="specialproc" align="left">
		   <textarea name="tg" id="tg" cols="70" rows="2" class="textarea1" >
	         </textarea>
		   </div></td>
		 </tr>
	   
	   <tr><td    class="label1" > <div align="right">Treatment Advise:
	     
	     </div></td>
		 <td><div align="left">
		   <textarea name="ta" id="ta" cols="70" rows="2" class="textarea1">
	         </textarea>
		   </div></td>
		 </tr>
		<tr><td    class="label1" ><div align="right">Review after:</div></td><td><div align="left"><input type="text" name="Review" id="Review" class="text" />Days</div></td></tr>
		<tr><td height="21"  class="label1" ><div align="right">Treating Consultant:</div></td>
		<td><div align="left"><input type="text" name="treating" id="treating" class="text"/></div></td></tr>
	  	<tr>
		  <td height="43" >
		        <div align="right">
		          <input name="image" type='image' src="images/save1.gif" onclick="report(1)"/>
				 <input type="hidden" id="abc" name="abc" value="0"/>
		          </div></td>
				    <td >
		              <div align="left">
					  <input name="image" type='image' src="images/report_butn.gif" onclick="report(2)"/>
		            
		                </div></td>
		</tr>
	  
	   <div id="aa"> <input type="hidden" name="patno1" id="patno1" /></div>
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
