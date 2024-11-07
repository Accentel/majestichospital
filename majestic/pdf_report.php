<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	if(isset($_REQUEST['report']))
	{
		$report = $_REQUEST['report'];
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	<script>
/*****Reports*****/
function report(){
	var str='<?php echo $report ?>';
	
		
var report ="";
  for (var i=0; i < document.myform.report.length; i++){
   if (document.myform.report[i].checked){
	   report = document.myform.report[i].value;
	     } }
if(report=='' || report==null){alert('Please Select Report Type');}
else{
var passedvar="";
if(report=="All"){passedvar="All";}
if(report=="Datewise"){
var st_dt=document.myform.st_dt.value;
var end_dt=document.myform.end_dt.value;
passedvar=''+report+'&st_dt='+st_dt+'&end_dt='+end_dt+'';
if(!(str==4 || str==5 || str==6 || str==7 || str==8 || str==9 || str==10 || str==11)){
//var docname="docname";
if(document.getElementById("docname").value=="") {
	alert("Please Select Department Name");
    document.myform.getElementById("docname").focus();
	 return false;
}//if(document
 }//if(str
//var url='report='+passedvar
}//if(datewise


if(report=="Deptwise")
{
passedvar="Deptwise";
if(document.getElementById("docname").value=="")
                 {
				     alert("Please Select Department Nameeeee");
                     document.myform.getElementById("docname").focus();
					 return false;
				}
}//if(dept)


if(str==1){
var doc=document.myform.docname.value
	//if(document.myform.docname.value==""){alert("Please Select Department Name");document.myform.docname.focus();}

window.open('PDF_Out_Patients1.php?report='+passedvar+'&doc='+doc,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;
}
if(str==2){ 
	var doc=document.myform.docname.value
	//alert("doc"+doc);
	//if(document.myform.docname.value==""){alert("Please Select Doctor Name");document.myform.docname.focus();}
	
window.open('PDF_Admissions.php?report='+passedvar+'&doc='+doc,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==3){
var doc=document.myform.docname.value
window.open('PDF_Discharge_Patients.php?report='+passedvar+'&doc='+doc,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==4){
//	var doc=document.myform.docname.value
window.open('PDF_Summary_Ip_Discharge.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==5){
window.open('PDF_Advance.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==6){
window.open('PDF_Bed_Occupency.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==7){
window.open('PDF_OT_Utilization.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==8){
window.open('PDF_ICU_Occupency.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==9){
window.open('PDF_Delivery_Patients.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==10){
window.open('PDF_Death_Patients.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
if(str==11){
window.open('PDF_DrugExpiry.php?report='+passedvar,'mywindow1','width=1020,height=800,toolbar=no,menubar=no')
;}
}//else
}//fun
/**********/

function selectreport(str)
{
if(str==1){

document.getElementById("trid").style.display='none';
<?php if($report!=5 && $report!=6 && $report!=7 && $report!=4 && $report!=8 && $report!=9 && $report!=10 && $report!=11){ ?>
document.getElementById("tr_doc").style.display='none';
<?php } ?>
}
if(str==2){
document.getElementById("trid").style.display='';
<?php if($report!=5 && $report!=6 && $report!=7 && $report!=4 && $report!=8 && $report!=9 && $report!=10 && $report!=11){ ?>
document.getElementById("tr_doc").style.display='';
<?php } ?>
}
if(str==3){
document.getElementById("trid").style.display='none';
document.getElementById("tr_doc").style.display='';
}
}

</script>
</head>

	<body>

	<div id="conteneur">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre">
		
          <h1 style="color:red;" align="center">
		  <?php 
			 if($report==1){ echo "Out Patients Report"; }
			 if($report==2){ echo "Patient Admitted Report"; }
			 if($report==3){ echo "Discharge Patients Report"; }
			 if($report==4){ echo "Summary of IP & Discharge"; }
        	 if($report==5){ echo "Advance Report"; }
			 if($report==6){ echo "Bed Occupency Summary Report"; }
			 if($report==7){ echo "OT Utilization Summary Report"; }
			 if($report==8){ echo "ICU Utilization Summary Report"; }
			 if($report==9){ echo "Patient Delivery Report"; }
			 if($report==10){ echo "Patient Death Report"; }
			 if($report==11){ echo "Drug Expiry Report"; }
			?>
		  </h1>
		  <form name="myform" method="get" >
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
		<tr>
            <td colspan="4" height="10"></td>
          </tr>

          <tr>
            <td colspan="4">
		  <fieldset>
			<legend><b style=" color:#FF6600 ">Select Any One Of The Options Below </b></legend>
			<div align="center" ><input type="radio" name="report" value="All"  onclick="javascript:selectreport(1)"/>All &nbsp; &nbsp;
			<input type="radio" name="report" value="Datewise" onclick="javascript:selectreport(2)" /> 
			DateWise
			<?php if($report !=5 && $report !=6 && $report !=4 && $report !=7 && $report !=8 && $report !=9 && $report !=10 && $report !=11){ ?>
			<input type="radio" name="report" value="Deptwise" onclick="javascript:selectreport(3)" /> 
			DeptWise
			<?php } ?>
			</div>
			</fieldset>	
			</td>
          </tr>
          <tr style="display:none" id="trid">
            <td colspan="2" ><table width="100%">
			<tr><td width="39%"  class="label1"><div align="right">Start Date</div></td>
			<td width="61%" ><input type="text" name="st_dt" class="tcal" readonly value="<?php echo date('Y-m-d'); ?>"/></td>
			</tr>
			<tr>
			  <td class="label1"><div align="right">End Date</div></td>
			  <td><input type="text" name="end_dt" class="tcal" readonly value="<?php echo date('Y-m-d'); ?>"/></td>
			</tr>
			</table></td>
            </tr>
<tr></tr>
<?php if($report==1  || $report==2 || $report==3){ ?>
 <tr>
            <td height="10"></td>
          </tr>
			<tr  style="display:none" id="tr_doc">
           <td ><div align="right">Dept Name:</div></td>
           <td><span >
             <select name="docname" class="select" id="docname">
               <option value="">Select Department</option>
               <?php 
			   
			   if($report==1)
			   {
			
			$sql = mysqli_query($link,"select distinct b.Dept_Code,b.Dept_name from doct_infor as a,dept as b,op_pat_dlt as c where a.dept1=b.Dept_code and a.id=c.doc_code")or die(mysqli_error($link));
			
			}
			else if($report==2)
			   {
			
			$sql = mysqli_query($link,"select distinct b.Dept_Code,b.Dept_name from doct_infor as a,dept as b,ip_pat_admit as c where a.dept1=b.Dept_code and a.id=c.doc_code and c.DIS_STATUS='ADMITTED'")or die(mysqli_error($link));
			}
			else if($report==3)
			   {
			
			$sql = mysqli_query($link,"select distinct b.Dept_Code,b.Dept_name from doct_infor as a,dept as b,ip_pat_admit as c,final_bill as f where a.dept1=b.Dept_code and a.id=c.doc_code and c.DIS_STATUS='Discharged' AND f.PAT_NO=c.PAT_NO")or die(mysqli_error($link));
			}
			while($row = mysqli_fetch_array($sql)){			
			?>
               <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
               <?php } ?>
             </select>
           </span></td>
          </tr>
		  </table>
          <?php } ?>
		  <table width="100%">
		  <tr height="20px"></tr>
		  <tr>
            
            <td align="center">
			 <input type="button" value = "Report" onclick="window.location.href='javascript:report()'" class="butt" />
			  <input type="button" value = "Close" onclick="window.location.href='home.php'" class="butt"/></td>
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