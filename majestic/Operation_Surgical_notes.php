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

<script language="javascript">  
count12="1";
        function addRow12(tableID) {   
		
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count12").value=(rowCount);
					
			var td1= document.createElement("TD")
			//var strHtml1 = "<input type=text class=textbox1 name=mediname readonly  id=mediname"+rowCount+">";
			var strHtml1  = "<input type=text class=textbox1  name=mediname"+rowCount+" onclick=window.open('drug_popup_op.php?rowCount="+rowCount+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')  id=mediname"+rowCount+">";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);	
			
			
			var td3 = document.createElement("TD")
            var strHtml3  = "<input type=text class=textbox1  name=usedqty"+rowCount+"   id=usedqty"+rowCount+" onkeyup=valv(this.value,"+rowCount+")>";
            td3.innerHTML = strHtml3.replace(/!count!/g,count);
	        row.appendChild(td3);	
			
            var td2 = document.createElement("TD")
            var strHtml2  = "<input type=hidden class=textbox1  name=avqty"+rowCount+"   id=avqty"+rowCount+">";
            td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);
			 
			 var cell4 = row.insertCell(3);   
            var element4 = document.createElement("input");   
			element4.type = "hidden"; 
            element4.name = "sno10"+rowCount; 
			element4.id = "sno10"+rowCount; 
			element4.value=rowCount; 
            cell4.appendChild(element4); 
			
			var cell5 = row.insertCell(4);   
            var element5 = document.createElement("input");   
			element5.type = "hidden"; 
            element5.name = "invid"+rowCount; 
			element5.id = "invid"+rowCount; 
			cell5.appendChild(element5); 
			
			var cell6 = row.insertCell(5);   
            var element6 = document.createElement("input");   
			element6.type = "hidden"; 
            element6.name = "prdcode"+rowCount; 
			element6.id = "prdcode"+rowCount; 
			cell6.appendChild(element6); 
		
			 
        }   
		
        function deleteRow12(tableID) {  
            var tbl = document.getElementById('dataTable12');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count12").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count12").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>
<script>
function valv(str,rowc)
{

var avqty=document.getElementById("avqty"+rowc).value;

if(eval(avqty)<str){alert("Please Enter Used Quantity Below available qty "+'('+avqty+')');document.getElementById("usedqty"+rowc).value="";
document.getElementById("usedqty"+rowc).focus();
return false;}

}
</script>
<script>
function fun_oss()
{
if(document.getElementById("pod").value=="")
			{
				alert("Please Enter Pre-Operative Diagnosis Feild");
				document.getElementById("pod").focus();
				document.getElementById("pod").value="";
				return false;
			}
if(document.getElementById("post_od").value=="")
			{
				alert("Please Enter Post-Operative Diagnosis Feild");
				document.getElementById("post_od").focus();

				document.getElementById("post_od").value="";
				return false;
			}
if(document.getElementById("pd").value=="")
			{
				alert("Please Enter Procedure Done Feild");
				document.getElementById("pd").focus();
				document.getElementById("pd").value="";
				return false;
			}
			//alert(document.getElementById("ot").value);
if(document.getElementById("ot").value=="select")
			{
				alert("Please Select Operation Theatre");
				document.getElementById("ot").focus();
				//document.getElementById("ot").value="";
				return false;
			}
			//alert(document.getElementById("sur_na").value);
			if(document.getElementById("sur_na").value==" ")
			{
				alert("Surgery name is empty");
				document.getElementById("sur_na").focus();
				//document.getElementById("sur_na").value="";
				return false;
			}
			if(document.getElementById("ncs").value==" ")
			{
				alert("Name of Surgeon is empty");
				document.getElementById("ncs").focus();
				//document.getElementById("na1").value="";
				return false;
			}
			if(document.getElementById("na").value==" ")
			{
				alert("Anesthesia name is empty");
				document.getElementById("na").focus();
				//document.getElementById("na1").value="";
				return false;
			}
			if(document.getElementById("na1").value==" ")
			{
				alert("Assistant name1 is empty");
				document.getElementById("na1").focus();
				//document.getElementById("na1").value="";
				return false;
			}
			if(document.getElementById("na2").value==" ")
			{
				alert("Assistant name2 is empty");
				document.getElementById("na2").focus();
				//document.getElementById("na1").value="";
				return false;
			}
			var rr=document.getElementById("count12").value;
// alert(rowss);
if(rr==0)
	{
	alert("Please Select Items");
    return false;
  }

	  for(k=1;k<=rr;k++)
		{
		  var select3="mediname"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please select Medicine name Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			var select4="usedqty"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("Used qty Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
				}																	
document.form_ops.action="operation_surgical_update.php";
}
</script>
<script>
function report1(str){
document.getElementById("abc1").value=str;											
}
</script>

</head>

<body>
    <form name="form_ops" autocomplete="false" method="post" onsubmit="return fun_oss(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td><br /></td></tr>
        <tr><td align="center" ><font color="red" size="2" face="Arial" >All Fields are Mandatory</font></td></tr>
	<tr><td height="10px"></td></tr>
        
    <tr>
      <td>
		<div align="center">
			<table width="90%" border="0" cellpadding="0" cellspacing="0">
                            
                            
							<tr>
							  <td >  <div align="center">
							    <table width="100%" border="0" cellpadding="2">
							               <tr><td  class="label1" colspan="2"><div align="right">Pre-Operative Diagnosis:</div></td>
								    <td  colspan="2"><div align="left">
								        <textarea name="pod" id="pod" cols="60" rows="1" class="textarea1"></textarea>
								      </div></td>
								    </tr>
                                       <tr><td  class="label1" colspan="2"><div align="right">Post-Operative Diagnosis:</div></td>
								    <td colspan="2" ><div align="left">
								        <textarea name="post_od" cols="60" rows="1" id="post_od" class="textarea1"> </textarea>
								      </div></td>
								    </tr>
								           <tr><td  class="label1" colspan="2"><div align="right">Procedure Done:</div></td>
								    <td colspan="2"><div align="left">
								        <textarea name="pd"  id="pd" cols="60" rows="1" class="textarea1"></textarea>
								      </div></td>
								    </tr>
								     <tr><td  class="label1" colspan="2"><div align="right"></div></td>
							  <td colspan="2" ><div align="left"></div></td>
							</tr>
								   <tr><td  class="label1" >
                                     <!-- <input name="sttime" type="text" class="textbox1" size="3" id="sttime" />-->
  
                                     <div align="right">Date:</div></td>
                                     <td  class="label1" ><input type="text" name="op_dt" id="op_dt" class="tcal" value="<?php echo date('d-m-Y'); ?>" readonly size="15"/>
                                     </td>
                                     <td class="label1" ><div align="left">Start Time
                   <select name="sttime" id="sttime" class="select" >
                 <?php for($stt1=1;$stt1<=24;$stt1++){ ?>
                 <option value="<?php echo $stt1 ?>"><?php echo $stt1 ?></option>
                 <?php } ?>
               </select>
			    <select name="stime1" id="stime1" class="select" >
                <?php for($stt=1;$stt< 60;$stt++){ ?>
                <option value="<?php echo $stt ?>"><?php echo $stt ?> </option>
                <?php } ?>
              </select>
                </div>
                  <!-- <input name="endtime" type="text" class="textbox1" size="3" id="endtime" onchange="totalthcosts()"/>
(HH:MM)--></td>
                <td class="label1" >End Time
                <select name="endtime" id="endtime" class="select" >
 <?php 
//for(int in=0;in!=hour.length;in++)
for($stt2=1;$stt2<=24;$stt2++){ ?>
  <option value="<?php echo $stt2 ?>"><?php echo $stt2 ?></option>
  <?php } ?>
</select>

<select name="etime1" id="etime1" class="select" >
 <?php for($stt3=1;$stt3<60;$stt3++){ ?>
  <option value="<?php echo $stt3 ?>"><?php echo $stt3 ?></option>
  <?php } ?>
</select> </td>
							      </tr>
								        <tr><td  class="label1"><div align="right">Operation Theatre:</div></td>
										
								          <td  class="label1"><div id="ot"><select name="ot" id="ot" class="select" ><option value="select">--select--</option>
			  <?php
			  include("config.php");
			  
			 $sql = mysql_query("select THEATER_CODE, THEATER_NAME from operation_theater");
			 while($row = mysql_fetch_array($sql))
			 { ?>
			 <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
			 <?php
			 }
			 ?>
										  <!--<input type="text" name="ot" id="ot" class="textbox1"/>-->
										 </select></div> </td>
						            <td class="label1"><div align="right">Surgery Name:</div></td>
						            <td>
						              <div align="left">
						                <input type="text" name="sur_na" id="sur_na" class="textbox1"/>
					                  </div></td></tr>
								        <tr><td  class="label1"><div align="right">Name of  Surgeon:</div></td>
								          <td  class="label1"><input type="text" name="ncs" id="ncs" class="textbox1"/></td>
						            <td class="label1"><div align="right">Name of Anesthesia:</div></td>
						            <td>
						              <div align="left">
						                <input type="text" name="na" id="na" class="textbox1"/>
					                  </div></td></tr>
								       <tr>
                                        <td width="19%" height="20"  class="label1"><div align="right">Assistant Name 1 </div></td>
						<td width="17%" height="20"  class="label1"><input type="text" name="na1" id="na1" class="textbox1"/></td>
							         <td width="25%" height="20"  class="label1"><div align="right">Assistant Name 2 </div></td>								         <td width="39%" height="20"  class="label1">
								           <div align="left">
								             <input type="text" name="na2" id="na2" class="textbox1"/>
							                 </div></td></tr>
								       <tr>
								         <td height="20"  class="label1"><div align="right">Assistant Name 3 </div></td>
								         <td height="20"  class="label1"><input type="text" name="na3" id="na3" class="textbox1"/></td>
								         <td height="20"  class="label1"><div align="right">Assistant Name 4 </div></td>
								         <td height="20"  class="label1">
								           <div align="left">
								             <input type="text" name="na4" id="na4" class="textbox1"/>
							                 </div></td></tr>
								    </table></td></tr>
                        <tr>
      <td colspan="4">
		<div align="center">
			<table width="100%" border="0" cellpadding="3" cellspacing="4">
                  	   <tr><td  class="label1" colspan="2"><div align="right">Surgical Notes:</div></td>
								    <td width="64%"  colspan="2"><div align="left">
								        <textarea name="sur_notes" id="sur_notes" cols="60" rows="2" class="textarea1"></textarea>
							         </div></td>
				    </tr>  
								       <tr><td  class="label1" colspan="2"><div align="right">Operative Findings:</div></td>
								    <td  colspan="2"><div align="left">
								        <textarea name="op_find" id="op_find" cols="60" rows="2" class="textarea1"></textarea>
								      </div></td>
								    </tr>
								       <tr>
								         <td  class="label1" colspan="2"><div align="right">Anaestesia Notes:</div></td>
								         <td  colspan="2"><div align="left">
								           <textarea name="an_notes" id="an_notes" cols="60" rows="2" class="textarea1"></textarea>
							             </div></td>
		            </tr>
								       <tr>
								         <td  class="label1" colspan="2"><div align="right">C-Aram Used</div></td>
								         <td  colspan="2"><div align="left"><select  name="ot_cost" id="ot_cost" >
										 <option value="0">No</option> <option value="1">Yes</option>
</div></td>
		            </tr>
								      
									<tr>
							  <td colspan="4" ><div align="center" id="operationalSurgical">
                                <table width="80%" border="0" cellpadding="2">
                                  <thead>
                                    <tr>
                                       <th  class="TH1">Madicine Name</th>
									   <th class="TH1">Avl.Quantity</th>
                                        <th class="TH1">Used </th>
                                    </tr>
                                  </thead>
                                </table>
						      </div></td>
			  </tr>
              
              <tr><td colspan="3"><div align="center"><input type='image'  src="images/save1.gif" onclick="report1(1)">
								 <input type="hidden" id="abc1" name="abc1" value="0"/>
								 
					  <input name="image" type='image' src="images/report_butn.gif" onclick="report1(2)"/>
		            
		                </div></td>
								</tr>
              
                  </table>
			    </div>
							 <!-- <table align="center">
								<tr><td><div align="center"><input type='image'  src="images/save1.gif" onclick="report1(1)"></div></td>
								 <input type="hidden" id="abc1" name="abc1" value="0"/>
								  <td >
		              <div align="left">
					  <input name="image" type='image' src="images/report_butn.gif" onclick="report1(2)"/>
		            
		                </div></td>
								</tr>
								</table>-->
      </table>
		</div>
		</td>
    </tr>
   </table>
</form>


</body>

</html>
