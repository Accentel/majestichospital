<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$aname= $_SESSION['name1'];
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("header1.php");
?>
<script type="text/javascript">
function getstock(str)
{ 
	
	
	if(document.form.ptype.selectedIndex == 0){
	alert("Please select Product Type");
	document.form.ptype.focus();
	return (false);
	}
	var str1=document.form.ptype.value;
	var str2=document.form.Batchno.value;

var str5=document.getElementById("prdnames").value;

	xmlHttp=GetXmlHttpObject(str);
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 

/*********/
   var report2 =str;
  document.getElementById("report2").value=str;
   var report1 ="";
  for (var i=0; i < document.form.reporttype.length; i++){
   if (document.form.reporttype[i].checked){
	   report1 = document.form.reporttype[i].value;
   }
  }
 
 
var pass;
if(report1=="All" && report2=="all")
{
pass="All";
} else if(report1=="All" && report2=="All2"){
pass="All2";
} else if(report1=="Datewise")
{
 var fdate=document.form.fdate.value;
var tdate=document.form.tdate.value;
if(fdate==tdate){alert("Dates Should Be defferent ");document.form.fdate.focus();
	return (false);}
pass=''+report1+'&fdate='+fdate+'&tdate='+tdate+'';

}
/*******/
   
	var url="getstock.php";
	url=url+"?prdtype="+str1+"&reporttype="+pass+"&rtype="+str+"&Batchno="+str2+"&prdnames="+str5;
//alert("url"+url);
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);	
	

}

function stateChanged() 
{ 
	
	if (xmlHttp.readyState==4)
	{ 
		
		var str3=document.form.ptype.value;
		document.getElementById("sob").innerHTML=xmlHttp.responseText;
		var stra=document.getElementById("report2").value;	
		if(stra=="all"){
		document.form.action=prdnames(str3)
		}
		
	}
}

function prdnames(str)
{ 
	
	xmlHttp=GetXmlHttpObject(str);
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
  
	var url="getprdnames.php";
	url=url+"?prdtype="+str;
	//alert("url"+url);
	xmlHttp.onreadystatechange=stateChanged12;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);	

}

function stateChanged12() 
{ 
	
	if (xmlHttp.readyState==4)
	{ 
	
		document.getElementById("abc123").innerHTML=xmlHttp.responseText;
		
		
	}
}




function getBatchno()
{ 
	if(document.form.ptype.selectedIndex == 0){//alert("if")
	alert("Please select Product Type");
	document.form.ptype.focus();
	return (false);
	}
	else{//alert("else")
		document.getElementById("trid4").style.display='';
	var str=document.form.ptype.value;

	xmlHttp=GetXmlHttpObject(str);
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
  
	var url="getBatchno.php";
	url=url+"?prdtype="+str;
	//alert("url"+url);
	xmlHttp.onreadystatechange=stateChanged1;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);	
}//else
}

function stateChanged1() 
{ 
	
	if (xmlHttp.readyState==4)
	{ 
		/* for (var i=0; i < document.form.report.length; i++){
			 document.form.report[i].checked=false;
		document.getElementById("report").checked = false;	}*/
		document.getElementById("batchno").innerHTML=xmlHttp.responseText;
		
				
	}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}

</script>
<script type="text/javascript">
function report()
{
	var report1 ="";
  for (var i=0; i < document.form.reporttype.length; i++)
  {
      if (document.form.reporttype[i].checked)
     {
	   report1 = document.form.reporttype[i].value;
      }
  }

var pass;
if(report1=="All")
{
pass="All";
}
else if(report1=="Datewise")
{
 var fdate=document.form.fdate.value;
var tdate=document.form.tdate.value;
if(fdate==tdate)
  {
      alert("Dates Should Be defferent ");document.form.fdate.focus();
	//return (false);
	}

var str ="";
  //for (var i=0; i < document.form.report.length; i++){
   //if (document.form.report[i].checked){
	   str = document.form.report.value;
   //}
  //}
  //alert(str);
var batc ="";
var batc=document.getElementById("batc").value;
//alert(batc);
pass= ''+report1+'&fdate='+fdate+'&tdate='+tdate+'&rtype='+str+'&batno='+batc+'';
//alert(pass);
}

   if(document.form.ptype.value =="")
	{
		alert("Please Select Product Type");
		document.form.ptype.focus();
		//return(false);
	}else{
	var protype=document.form.ptype.value;
	
	var str5=document.getElementById("prdnames").value;
	}
	window.open('PDF_Stockposition.php?ptype='+protype+'&reporttype='+pass+'&prdnames='+str5,'mywindow1','width=1020,height=700,toolbar=no,menubar=no')
	
}
</script>
<script type="text/javascript">
function enabletext()
{
document.form.Batchno.disabled=false;
if(!(document.form.Batchno.value=="-"))
{
//alert(document.myform.classlist.value);
//report();
}

}//enabletext()
function disabletext()
{
document.getElementById("trid4").style.display='none';
//report();


}//disabletext()
function ex1(){

if(document.form.ptype.selectedIndex == 0){
	alert("Please select Product Type");
	document.form.ptype.focus();
	return (false);
	}

}
function ex2(){
if(document.form.ptype.selectedIndex == 0){
	alert("Please select Product Type");
	document.form.ptype.focus();
	}

if(document.form.Batchno.selectedIndex == 0){
	alert("Please select Batch Number");
	document.form.Batchno.focus();
	}


}
function selectreport(str)
{
if(str==1){
document.getElementById("trid1").style.display='none';
document.getElementById("trid2").style.display='none';
document.getElementById("trid3").style.display='none';
document.getElementById("trid4").style.display='none';

}
if(str==2){
document.getElementById("trid1").style.display='';
document.getElementById("trid2").style.display='';
document.getElementById("trid3").style.display='';
document.getElementById("trid4").style.display='';
document.getElementById("tridaa").style.display='none';

}}

function chckproduct()
	{
   var report1 ="";
  for (var i=0; i < document.form.reporttype.length; i++){
   if (document.form.reporttype[i].checked){
	   report1 = document.form.reporttype[i].value;
   }
  }

var pass;
if(report1=="All")
{
getstock('all')}
}
</script>
</head>
<body>
<div id="conteneur" class="container" style="height:auto; ">

		  <?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
		?><?php */?>
		  
          	<?php
			include("logo.php");
			include("main_menu.php");
			?>
          
		  <div id="centre" style="min-height:500px;">
		  
          <h1 style="color:red;" align="center">STOCK POSITION</h1>
          
<FORM name="form" >
<table width="100%" border="0" class="table" cellspacing="5" cellpadding="0">
   
          <tr>
            <td colspan="4">
			<fieldset>
			<legend><b style=" color:#FF6600 ">Select Any One Of The Options Below </b></legend>
			<div align="center" ><input type="radio" name="reporttype" value="All"  onclick="javascript:selectreport(1)"/>All &nbsp; &nbsp;
			<input type="radio" name="reporttype" value="Datewise" onclick="javascript:selectreport(2)" /> 
			DateWise

			</div>
			</fieldset>
			</td>
          </tr>
          <tr >
            <td colspan="2" ><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr></tr>
              <tr></tr>
              <tr>
                <td colspan="2"><div class="style2" align="center">(* Marked Fields are Mandatory)</div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr  style="display:none" id="trid1">
                <td class="label1"><div align="right">From Date <span class="style2">*</span> : </div></td>
                <td><input name="fdate" type="date" class="text" id="fdate" readonly="readonly" value="<?php echo date('d-m-Y'); ?>"/>
                  </td></tr>
              <tr  style="display:none" id="trid2">
                <td class="label1"><div align="right">To Date <span class="style2">*</span> : </div></td>
                <td><input name="tdate" type="date" class="text" id="tdate" readonly="readonly" value="<?php echo date('d-m-Y'); ?>"/>
                  </td></tr>
              <tr>
                <td class="label1" color="red"><div align="right">Select Product Type <span class="style2">*</span> : </div></td>
                <td><select name="ptype" id="ptype"  class="text"  >
                  <option value="">---Select-----</option>
                    <?php
						$sql = mysqli_query($link,"select distinct(PRDTYPE_NAME),prdtype_code from phr_prdtype_mast ")or die(mysqli_error($link));
						if($sql){
						while($row = mysqli_fetch_array($sql)){
							$prdtypename=$row[0];
							$prdtypecode=$row[1];
					?>
                    <option value="<?php echo $prdtypename ?>" ><?php echo $prdtypename ?></option>
                  <?php } 
				  }?>
                </select></td>
              </tr>
			  
			  
			   <tr  id="tridaa">
                <td class="label1"><div align="right">Select Product Name <span class="style2">*</span> : </div></td>
                <td>
			<div id="abc123">
                   <select name="prdnames" id="prdnames" class="text">
                      <option value="">-- Select --</option>
                    </select>
                </div>
                 </td>
              </tr>
			  
              <tr style="display:none" id="trid3">
                <td class="label1"><div align="right">Report Type <span class="style2">*</span> : </div></td>
               <td><input type="radio" name="report" id="report" value="b" onclick="getBatchno();"/>
                  Batch Wise
                  <input type="radio" name="report" id="report" value="e" />
                  Exp.Dt Wise
                  
              </tr>
              <tr> </tr>
              <tr>
                <td height="2"></td>
              </tr>
              <tr style="display:none" id="trid4">
                <td class="label1" ><div align="right">Batch No : </div></td>
                <td><div id="batchno">
                    <select name="Batchno" id="batc"class="select" >
                      <option value="">--Select Batch Number--</option>
                    </select>
                </div></td>
              </tr>
            </table></td>
            </tr><input type="hidden" name="report2" id="report2" value="" />


<tr >
  <td colspan="4" align="center" ><div id="sob">&nbsp;</div>	</td>
    </tr>
	</table>
	 <!-------------------------------------- error dispaly-->
          <table width="100%">
		  
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

}
else
{

session_destroy();

session_unset();

header('Location:login.php');

}

