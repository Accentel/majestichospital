<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Hospital Management System</title>
<link rel="stylesheet" type="text/css" href="js/tcal.css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link href="../css/menu_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link rel="stylesheet" type="text/css" href="../css/table_style.css" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />
<script type="text/javascript" src="../js/tableruler.js"></script>
<script  type="text/javascript" src="js/datetimepicker.js"></script>

<script language="javascript" type="text/javascript" >  
count4="1";
        function addRow2(tableID) {   
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count4").value=(rowCount);
			//alert(rowCount);
			var td1= document.createElement("TD")
			var strHtml1 = "<a href=javascript:NewCal('datetime"+rowCount+"','ddmmyyyy',true,24) ><input type=text  name=datetime"+rowCount+"  readonly size=10 id=datetime"+rowCount+"></a>";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);
			
            var td2 = document.createElement("TD")
            var strHtml2  = "<input type=text class=textbox1  name=bp"+rowCount+" size=10   id=bp"+rowCount+">";
            td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);			   
			
						
			var cell3 = row.insertCell(2);   
            var element3 = document.createElement("input");   
			element3.type = "text"; 
            element3.name = "pluse"+rowCount; 
			element3.size = "10"; 
			element3.className = 'textbox1';
			element3.id="pluse"+rowCount; 
            cell3.appendChild(element3);  
			
			
			var td4 = document.createElement("TD")
            var strHtml4  = "<input type=text class=textbox1 size=10  name=resp"+rowCount+" id=resp"+rowCount+"  ></a>";
			td4.innerHTML = strHtml4.replace(/!count!/g,count);
	        row.appendChild(td4);
			
			var td5 = document.createElement("TD")
            var strHtml5  = "<input type=text class=textbox1 size=10 name=fhs"+rowCount+" id=fhs"+rowCount+" >";
			td5.innerHTML = strHtml5.replace(/!count!/g,count);
	        row.appendChild(td5);
			
			var cell6 = row.insertCell(5);   
            var element6 = document.createElement("input");   
			element6.type = "hidden"; 
            element6.name = "sno"; 
			element6.id = "sno"+rowCount; 
			element6.value=rowCount; 
            cell6.appendChild(element6);  
        }   
		
        function deleteRow2(tableID) {  
            var tbl = document.getElementById('dataTable4');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count4").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count4").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>
<script>

function savs()
{
 var rowss=document.getElementById("count4").value;
// alert(rowss);
	  for(k=1;k<=rowss;k++)
		{
		  var select3="datetime"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please enter date&time Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			var select4="bp"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("B.P Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			var select4="pluse"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("PULSE Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			var select4="resp"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("RESP Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			var select4="fhs"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("FHS Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			
}
document.ff.action="hms_vital_signs_update.php";
}

</script>


<script>

function savs()
{
 var rowss=document.getElementById("count4").value;
// alert(rowss);
	  for(k=1;k<=rowss;k++)
		{
		  var select3="datetime"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please enter date&time Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			var select4="bp"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("B.P Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			var select4="pluse"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("PULSE Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			var select4="resp"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("RESP Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			var select4="fhs"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("FHS Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			
}
document.ff.action="hms_vital_signs_update.php";
}

</script>



<script>

function vts_report(str){
document.getElementById("vts_abc").value=str;
}

</script>


</head>

<body>
<form name="ff" method="post" autocomplete="false" onsubmit="return savs(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="10px"></td></tr>
    <tr>
      <td>
		<div align="center">
			<table width="90%" border="0" cellpadding="3" cellspacing="4">
                            
                           
							<tr>
							  <td >  <table width="90%" border="0" cellpadding="2">
							<tr>
							  <td colspan="2" ><div align="center" id="admittable1">
                                <table width="100%" border="0" cellpadding="2">
                                  <thead>
                                    <tr>
                                      <th  class="TH1">DateTime</th>
                                      <th  class="TH1">B.P (Low/High)</th>
                                      <th  class="TH1">PULSE</th>
									 <th class="TH1">RESP</th>
                                      <th class="TH1">FHS</th>
                                       <th class="TH1">TEST</th>
                                     </tr>
                                  </thead>
                                </table>
						      </div></td>
			  </tr>
			<tr><td><div align="right"><input type='image'  src="images/save1.gif" onclick="vts_report(1)"/></div>
			 <input type="hidden" id="vts_abc" name="vts_abc" value="0"/>
			</td>
			     <td><div align="left"><input name="image" type='image' src="images/report_butn.gif" onclick="vts_report(2)"/>
		             </div></td>			
			</tr>
                           
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
