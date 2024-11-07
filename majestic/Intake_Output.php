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
<script language="javascript" type="text/javascript" src="./js/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" >  
count9="1";
        function addRow9(tableID) {   
		
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count9").value=(rowCount);
					
			var td1= document.createElement("TD")
			var strHtml1 = "<a href=javascript:NewCal('intakedatetime"+rowCount+"','ddmmyyyy',true,24) ><input type=text class=textbox1 name=intakedatetime"+rowCount+" readonly  id=intakedatetime"+rowCount+"></a>";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);
			
            var td2 = document.createElement("TD")
            var strHtml2  = "<textarea name=particulars"+rowCount+" id=particulars"+rowCount+"></textarea>";
            td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);	
			
					   
			var cell3 = row.insertCell(2);   
            var element3 = document.createElement("input");   
			element3.type = "text"; 
            element3.name = "idfluds"+rowCount; 
			element3.size = "5"; 
			element3.className = 'textbox1';
			element3.id="idfluds"+rowCount; 
            cell3.appendChild(element3);  
			
			var cell4 = row.insertCell(3);   
            var element4 = document.createElement("input");   
			element4.type = "text"; 
            element4.name = "oral"+rowCount; 
			element4.size = "5"; 
			element4.className = 'textbox1';
			element4.id="oral"+rowCount; 
            cell4.appendChild(element4);  
			 
			 var cell5 = row.insertCell(4);   
            var element5 = document.createElement("input");   
			element5.type = "hidden"; 
            element5.name = "sno10"+rowCount; 
			element5.id = "sno10"+rowCount; 
			element5.value=rowCount; 
            cell5.appendChild(element5); 
		
			 
        }   
		
        function deleteRow9(tableID) {  
            var tbl = document.getElementById('dataTable9');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count9").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count9").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>
<SCRIPT language="javascript">  
count10="1";
        function addRow10(tableID) {   
		
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count10").value=(rowCount);
					
			var td1= document.createElement("TD")
			var strHtml1 = "<a href=javascript:NewCal('outpurdatetime"+rowCount+"','ddmmyyyy',true,24) ><input type=text class=textbox1 name=outpurdatetime"+rowCount+" readonly  id=outpurdatetime"+rowCount+"></a>";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);
			
            var td2 = document.createElement("TD")
            var strHtml2  = "<input type=text class=textbox1  name=urine"+rowCount+" size=5  id=urine"+rowCount+"></a>";
            td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);	
			
					   
						 
			var cell3 = row.insertCell(2);   
            var element3 = document.createElement("input");   
			element3.type = "text"; 
            element3.name = "faces"+rowCount; 
			element3.size = "5"; 
			element3.className = 'textbox1';
			element3.id="faces"+rowCount; 
            cell3.appendChild(element3);  
			
			var cell4 = row.insertCell(3);   
            var element4 = document.createElement("input");   
			element4.type = "text"; 
            element4.name = "respitation"+rowCount; 
			element4.size = "5"; 
			element4.className = 'textbox1';
			element4.id="respitation"+rowCount; 
            cell4.appendChild(element4);  
			
			var cell5 = row.insertCell(4);   
            var element6 = document.createElement("input");   
			element6.type = "text"; 
            element6.name = "skin"+rowCount; 
			element6.size = "6"; 
			element6.className = 'textbox1';
			element6.id="skin"+rowCount; 
            cell5.appendChild(element6);  
			 
			 var cell6 = row.insertCell(5);   
            var element6 = document.createElement("input");   
			element6.type = "hidden"; 
            element6.name = "sno10"+rowCount; 
			element6.id = "sno10"+rowCount; 
			element6.value=rowCount; 
            cell6.appendChild(element6); 
		
			 
        }   
		
        function deleteRow10(tableID) {  
            var tbl = document.getElementById('dataTable10');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count10").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count10").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>
<script>
function sav_iot()
{
//alert("asdfsda");
var rowss=document.getElementById("count9").value;
 //alert(rowss);
	  for(k=1;k<=rowss;k++)
		{
		  var select3="intakedatetime"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please enter date&time Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			var select4="particulars"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("Particulars Field is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			var select5="idfluds"+k;
			if(document.getElementById(select5).value=="")
			{
				alert("I/V Fluids(ml) Field is Empty");
				document.getElementById(select5).focus();
				return false;
			}
			var select6="oral"+k;
			if(document.getElementById(select6).value=="")
			{
				alert("Oral(ml) Field is Empty");
				document.getElementById(select6).focus();
				return false;
			}
			}
			
			var rowss1=document.getElementById("count10").value;
 
	  for(v=1;v<=rowss1;v++)
		{
		
		 var select0="outpurdatetime"+v;
		  		  						
			if(document.getElementById(select0).value=="")
			{
				alert("Please enter date&time Feild");
				document.getElementById(select0).focus();
				return false;
			}
	
		var select9="urine"+v;
		if(document.getElementById(select9).value=="")
			{
				alert("urine Field is Empty");
				document.getElementById(select9).focus();
				return false;
			}
		var select9="faces"+v;
		if(document.getElementById(select9).value=="")
			{
				alert("Faces Field is Empty");
				document.getElementById(select9).focus();
				return false;
			}
			var select9="respitation"+v;
		if(document.getElementById(select9).value=="")
			{
				alert("Respitation Field is Empty");
				document.getElementById(select9).focus();
				return false;
			}
			var select9="skin"+v;
		if(document.getElementById(select9).value=="")
			{
				alert("Skin Field is Empty");
				document.getElementById(select9).focus();
				return false;
			}
		 
			}
 	document.iotform.action="intake_output_update.php";
}
</script>
<script>
function reportio(str){
document.getElementById("inabc").value=str;
}
</script>
</head>

<body>
<form name="iotform" autocomplete="false" onsubmit="return sav_iot(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="10px"></td></tr>
    <tr>
      <td>
		
			<table width="70%" border="0" cellpadding="0" cellspacing="4" align="center">
                             <tr>
            <td align="left" ><font color=#F24F00 size="2" ><b>In Take Records</b></font>
			</td></tr>							                           
							<tr>
							  <td colspan="6" ><div align="center"  id="intakerecord">
                                <table width="100%" border="0" cellpadding="2">
                                  <thead>
                                    <tr>
                                      <th width="10%"  class="TH1">Sno.</th>
                                      <th width="11%"  class="TH1">Date/Time</th>
                                       <th width="27%"  class="TH1">Particulars</th>
                                      <th width="23%"  class="TH1">I/V Fluids(ml)</th>
                                      <th width="18%"  class="TH1">Oral(ml)</th>
								    </tr>
                                  </thead>
                                </table>
						     </div></td>
			  </tr>
			   <tr>
            <td align="left" ><font color=#F24F00 size="2" ><b>OutPut Records</b></font>
			</td></tr>
						<tr>
							  <td colspan="6" ><div align="center"  id="outputrecord">
                                <table width="99%" border="0" cellpadding="2">
                                  <thead>
                                    <tr>
                                       <th width="10%"  class="TH1">Sno.</th>
                                      <th width="11%"  class="TH1">Date/Time</th>
                                       <th width="27%"  class="TH1">Urine(ml)</th>
                                      <th width="23%"  class="TH1">Faces(ml)</th>
                                      <th width="18%"  class="TH1">Respitation(ml)</th>
									   <th width="18%"  class="TH1">Skin(ml)</th>
                                    </tr>
                                  </thead>
                                </table>
						    </div>  </td>
			  </tr>
			  
			  
				<tr> 
	  <td width="56%"  ><div align="center">
	    <input type='image'  src="images/save1.gif" onclick="reportio(1)"//>
		  <input type="hidden" id="inabc" name="inabc" value="0"/>
		          
					  <input name="image" type='image' src="images/report_butn.gif" onclick="reportio(2)"/>
		            
	                </div> </td>
		</tr> 
				
      </table>
		<table width="23%" align="center">
		      
		</table>
	  </td>
    </tr>
    
   
    
  </table>

</form>
</body>

</html>
