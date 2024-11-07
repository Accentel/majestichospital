<?php //include('config.php');

session_start();

if($_SESSION['name1'])
{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("header1.php");
?>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" media="screen"/>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
		<script type="text/javascript" language="javascript">
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
	
				// Tabs
				$('#tabs').tabs();
	

				// Dialog			
				$('#dialog').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});

				// Datepicker
				$('#datepicker').datepicker({
					inline: true
				});
				
				// Slider
				$('#slider').slider({
					range: true,
					values: [17, 67]
				});
				
				// Progressbar
				$("#progressbar").progressbar({
					value: 20 
				});
				
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
			});
		</script>
			
<script language="javascript" type="text/javascript" src="js/actb1.js"></script>

<script language="javascript" type="text/javascript" src="js/common.js"></script>

<script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript">

function report(str,str1){
window.open('reportentry_scope_pdf.php?invgno='+str+'&itemno='+str1+'&p=0&type=p','mywindow1','width=1020,height=800,menubar=yes, scrollbars=yes')
	
}
function openfun(){
var patno=document.getElementById("patno").value
if(patno!=""){
location.reload(true);
window.open('dis_view.php','mywindow','height=500,width=550,titlebar=0,resizable=0,menubar=0,toolbar=0,directories=0,scrollbars=0,status=0') 

}
else{
window.open('dis_view.php','mywindow','height=500,width=550,titlebar=0,resizable=0,menubar=0,toolbar=0,directories=0,scrollbars=0,status=0') 

}
}
function dis_fun(str){
window.open('../Billing/PDF_FinalBill_Report.jsp?billno='+str+'&p=0','mywindow1','width=1020,height=800,toolbar=no,menubar=no,scrollbars=yes')
 }
</script>
<script>
function Report(){
if(document.getElementById("patno").value=="")
			{
				alert("Please Click Pat.Reg.No/Pat NO/Name  ");
				document.getElementById("patno").focus();
				document.getElementById("patno").value="";
				return false;
			}
var str=document.getElementById("patno").value;		
window.open('EMRReport.jsp?regno='+str,'mywindow1','width=1020,height=800,menubar=yes, scrollbars=yes')
	

}
</script>
<script>
function fun(){
if(document.getElementById("patno").value=="")
			{
				alert("Please Click Pat.Reg.No/Pat NO/Name  ");
				document.getElementById("patno").focus();
				document.getElementById("patno").value="";
				return false;
			}
			
			
}
</script>
</head>


<body>
<div id="conteneur">
		<!--<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	-->	<?php
	include("logo.php");
			include("main_menu.php");
			?>
<div id="centre" style="height:auto">
<h1 style="color:red;" align="center">IP ROOM TRANSFER</h1>
<form name="myform"  autocomplete="off">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

   <tr>
    <td width="56%" valign="top" class="filepath_bg1"><jsp:include page="../common1/filepath.jsp"></jsp:include></td>
    <td width="44%" valign="top" class="filepath_bg1"><jsp:include page="../getsessions.jsp"></jsp:include></td>
  </tr>
  <tr>
    <td colspan="2" class="mainbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	  <tr><td><table width="70%" style="margin-left:300px;"cellspacing="2">

<tr><td></td><td>PAT. NO : <input type="text" name="patno" id="patno" required onclick="openfun()" readonly /></td>
UMRNO:<span id="regno" class="casesheet">

</span> 
</td>

</tr>

</table></td></tr>
      <tr>
        <td valign="top"  align="center"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td  valign="top"><table width="100%" height="346" border="0" align="center" cellpadding="0" cellspacing="0">
			
            
			 
			 
			  <tr>
                <td height="358" align="left" valign="top">
				<div id="tabs"  onclick="fun()">
			<ul>
				<li><a href="#tabs-1" style="display:none">Patient Details</a></li>
				<li><a href="#tabs-2" style="display:none">Admission Notes</a></li>
				<li><a href="#tabs-3" style="display:none">Admission Record</a></li>
				<li><a href="#tabs-4" style="display:none">Vital Signs</a></li>
				<li><a href="#tabs-5" style="display:none">Operation Notes / Details</a></li>
				<li><a href="#tabs-6">IP Room Transfers</a></li>
				<li><a href="#tabs-7" style="display:none">Discharge Summary</a></li>
				<li><a href="#tabs-8" style="display:none" >Diagnostics</a></li>
				<li><a href="#tabs-9" style="display:none">Nurses / Treatment Chart</a></li>
				<li><a href="#tabs-10" style="display:none">Sugar Chart</a></li>
				<li><a href="#tabs-11" style="display:none">Bed Side Procedures</a></li>
				<li><a href="#tabs-12" style="display:none">Consultant Visit</a></li>
				<li><a href="#tabs-13" style="display:none">Progress Notes</a></li>
				<li><a href="#tabs-14" style="display:none">Intake/Output Record</a></li>
				<li><a href="#tabs-15" style="display:none">Birth Records</a></li>
				<li><a href="#tabs-16" style="display:none">Birth Certificate</a></li>
				<li><a href="#tabs-17" style="display:none">Death Certificate</a></li>
                
			</ul>
			
		
			<div id="tabs-1" style="display:none">  <?php include("patient_details.php"); ?>   </div>
			<div id="tabs-2" style="display:none"> <?php include("HMS_Admission_Notes.php"); ?>               
                  </div>
			<div id="tabs-3" style="display:none">  <?php include("HMS_Admission_Record.php"); ?>             
                   </div>
			<div id="tabs-4" style="display:none">  <?php include("HMS_Vital_Signs.php"); ?>            
                   </div>
			<div id="tabs-5" style="display:none"> <?php include("Operation_Surgical_notes.php"); ?>                
                   </div>
			<div id="tabs-6">  <?php include("Paient_Room_Transfer.php"); ?>                
                   </div>
			 <div id="tabs-7" style="display:none">  <?php include("Discharge_Summary.php"); ?>                  
                   </div>
			  <div id="tabs-8" style="display:none">  <?php include("HMS_Diagnostics.php") ?>                       
                   </div>
			 <div id="tabs-9" style="display:none">   <?php include("Nurse_Record_TC.php"); ?>             
                   </div>
			  <div id="tabs-10" style="display:none">  <?php include("HMS_Sugar_Chart.php"); ?>                 
                   </div>
			 <div id="tabs-11" style="display:none">  <?php include("bed_side_procedures.php"); ?>               
                   </div>
			  <div id="tabs-12" style="display:none"> <?php include("Consultant_Visit.php"); ?>                     
                   </div>
			  <div id="tabs-13" style="display:none"> <?php include("Progress_Notes.php"); ?>                  
                   </div>
			   <div id="tabs-14" style="display:none">    <?php include("Intake_Output.php"); ?>                 
                   </div>
			   <div id="tabs-15" style="display:none">     <?php include("Birth_Details.php"); ?>                   
                   </div>
				 
				  <div id="tabs-16" style="display:none">     <?php include("Birth_Certificte.php"); ?>                   
                   </div>
				  <div id="tabs-17" style="display:none">     <?php include("Death_Certificte.php"); ?>                   
                   </div>
		      
				 
			</div>
				   
	
	                </td>
              </tr>
			  
					
            </table></td>
          </tr>
        </table>
   
         

</td>
      </tr>
   
    </table></td>
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

header('Location:login.php');

}

?>