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
<script language="javascript" type="text/javascript" src="js/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" >  
count7="1";
        function addRow7(tableID) {   
		
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count7").value=(rowCount);
					
			var td1= document.createElement("TD")
			var strHtml1 = "<a href=javascript:NewCal('bdatetime"+rowCount+"','ddmmyyyy',true,24) ><input type=text class=textbox1 name=bdatetime"+rowCount+" readonly  id=bdatetime"+rowCount+"></a>";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);
			
            var td2 = document.createElement("TD")
            var strHtml2  = "<select NAME=sex"+rowCount+" id=sex"+(rowCount)+" readonly class=select value=select><option>--Select--</option><option value=Male>Male</option><option value=Female>Female</option></select>";
            td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);	
			
					   
			var cell3 = row.insertCell(2);   
            var element3 = document.createElement("input");   
			element3.type = "text"; 
            element3.name = "weight"+rowCount; 
			element3.size = "5"; 
			element3.className = 'textbox1';
			element3.id="weight"+rowCount; 
            cell3.appendChild(element3);  
			 
			 var cell4 = row.insertCell(3);   
            var element4 = document.createElement("input");   
			element4.type = "hidden"; 
            element4.name = "sno10"+rowCount; 
			element4.id = "sno10"+rowCount; 
			element4.value=rowCount; 
            cell4.appendChild(element4); 
		
			 
        }   
		
        function deleteRow7(tableID) {  
            var tbl = document.getElementById('dataTable7');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count7").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count7").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>
<script language="javascript">  
count8="1";
        function addRow8(tableID) {   
		
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count8").value=(rowCount);
					
			var td1= document.createElement("TD")
			var strHtml1 = "<input type=text class=textbox1 name=Vaccination"+rowCount+"   id=Vaccination"+rowCount+"></a>";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);
			
            var td2 = document.createElement("TD")
			var strHtml2 = "<a href=javascript:NewCal('vDate"+rowCount+"','ddmmyyyy',true,24) ><input type=text class=textbox1 name=vDate"+rowCount+" readonly  id=vDate"+rowCount+"></a>";
            td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);	
			
					   
						 
			 var cell3 = row.insertCell(2);   
            var element3 = document.createElement("input");   
			element3.type = "hidden"; 
            element3.name = "sno11"+rowCount; 
			element3.id = "sno11"+rowCount; 
			element3.value=rowCount; 
            cell3.appendChild(element3); 
		
			 
        }   
		
        function deleteRow8(tableID) {  
            var tbl = document.getElementById('dataTable8');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count8").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count8").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>
<script>
function f_birth()
{
//alert("asdfsda");
var rowss=document.getElementById("count7").value;
 //alert(rowss);
	  for(k=1;k<=rowss;k++)
		{
		  var select3="bdatetime"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please enter date&time Feild");
				document.getElementById(select3).focus();
				return false;
			}
                        else
                            {
                                 var str2 = document.getElementById(select3).value;//alert("dob"+str2);
                                 var dt2  = parseInt(str2.substring(0,2),10);
                                 var mon2 = parseInt(str2.substring(3,5),10);
                                 var yr2  = parseInt(str2.substring(6,10),10);
                                 var date2 = new Date(yr2, mon2, dt2);
                                // alert(date2);

                                 var str3=document.getElementById("cur_dts").value;//alert('str3--'+str3)
                                 var dt3 = parseInt(str3.substring(0,2),10);
                                 var mon3 = parseInt(str3.substring(3,5),10);
                                 var yr3  = parseInt(str3.substring(6,10),10);
                                 var current_datefor = new Date(yr3, mon3, dt3);
                                 //alert(current_datefor);
                            if(date2>current_datefor)
                                 {//alert("Date of Birth--"+date2);alert("current_datefor--"+current_datefor)
                                     alert("Date of Birth Should be Less than Current Date");//To date cannot be greater than from date
                                     return false;
                                 }
                            }
			
			var select4="sex"+k;
			//alert(document.getElementById(select4).value);
			if(document.getElementById(select4).value=="")
			{
				alert("Sex Field is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			var select5="weight"+k;
			if(document.getElementById(select5).value=="")
			{
				alert("Weight Field is Empty");
				document.getElementById(select5).focus();
				return false;
			}
			}
			
			var rowss1=document.getElementById("count8").value;
 //alert(rowss1);
	  for(v=1;v<=rowss1;v++)
		{
		
		var select9="Vaccination"+v;
		//alert(document.getElementById(select9).value);
			if(document.getElementById(select9).value=="")
			{
				alert("Vaccination Field is Empty");
				document.getElementById(select9).focus();
				return false;
			}
                       		
		  var select10="vDate"+v;
		  		  						
			if(document.getElementById(select10).value=="")
			{
				alert("Please enter date&time Feild");
				document.getElementById(select10).focus();
				return false;
			}
                         else
                            {
                                var str2 = document.getElementById(select10).value;//alert("dob"+str2);
                                 var dt2  = parseInt(str2.substring(0,2),10);
                                 var mon2 = parseInt(str2.substring(3,5),10);
                                 var yr2  = parseInt(str2.substring(6,10),10);
                                 var date2 = new Date(yr2, mon2, dt2);
                               //alert(date2);

                                 var str3=document.getElementById(select3).value;//alert('str3--'+str3)
                                 var dt3 = parseInt(str3.substring(0,2),10);
                                 var mon3 = parseInt(str3.substring(3,5),10);
                                 var yr3  = parseInt(str3.substring(6,10),10);
                                 var current_datefor = new Date(yr3, mon3, dt3);
                                 //alert(current_datefor);
                            if(date2<current_datefor)
                                 {//alert("Date of Birth--"+date2);alert("current_datefor--"+current_datefor)
                                     alert("Vaccination date Should be not Less than Birth date");//To date cannot be greater than from date
                                     return false;
                                 }
                            }
			}
document.form_birth.action="birth_details_update.php";
}
</script>
</head>

<body>
<form name="form_birth" autocomplete="false" onsubmit="return f_birth(this);" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
      <tr><td height="10px"><input type="hidden" name="cur_dts" id="cur_dts" value="<?php echo date('d-m-Y h:i:s') ?>" /></td></tr>
    <tr>
      <td>
		<div align="center">
			<table width="50%" border="0" cellpadding="3" cellspacing="4">
                             <tr>
            <td align="right" ><font color=#F24F00 size="2" ><b>Birth Details</b></font>
			</td></tr>
							<tr>
                              <td width="381"  class="label1"><div align="right"> Date & Time:</div></td>
                              <td width="553" align="left"><input type="Text" name="dobdt" id="dobdt"  class="tcal" maxlength="25" size="25" readonly="readonly" value="<?php echo date('d-m-Y h:i:s') ?>"></td>    </tr>
							<tr>
							  <td colspan="4" ><div align="center"  id="birthrecords">
                                <table width="70%" border="0" cellpadding="2">
                                  <thead>
                                    <tr>
                                      <th  class="TH1">BirthDate Time</th>
                                      <th  class="TH1">Sex</th>
                                      <th  class="TH1">Weight</th>
									   </tr>
                                  </thead>
                                </table>
						      </div></td>
			  </tr>
			   <tr>
            <td align="right" ><font color=#F24F00 size="2" ><b>Vaccination Details</b></font>
			</td></tr>
			<tr>
                           
			  <td width="381"  class="label1"> <div align="right">Date:</div></td><td width="553" align="left"><input type="Text" name="vdt" id="vdt" class="tcal" maxlength="25" size="25" readonly="readonly" value="<?php echo date('d-m-Y') ?>"></td>
              </tr>
					<tr>
							  <td colspan="4" ><div align="center" id="vbirthrecords">
                                <table width="50%" border="0" cellpadding="2">
                                  <thead>
                                    <tr>
                                      <th  class="TH1">Vaccine</th>
                                      <th  class="TH1">Date</th>
                                     </tr>
                                  </thead>
                                </table>
						      </div></td>
			  </tr>
			   <tr> 
	  <td width="381" class="label1"  colspan="2"><div align="center">
	    <input type='image'  src="images/save1.gif" >
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
