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
<script language="javascript" type="text/javascript" >  
count6="1";
        function addRow6(tableID) {   
		
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count6").value=(rowCount);
					
			var td1= document.createElement("TD")
			var strHtml1 = "<a href=javascript:NewCal('sugardate"+rowCount+"','ddmmyyyy',true,24) ><input type=text class=textbox1 name=sugardate"+rowCount+" readonly size=10  id=sugardate"+rowCount+"></a>";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);
			
            var td2 = document.createElement("TD")
            var strHtml2  = "<input type=text class=textbox1  name=bsugar"+rowCount+" size=10 id=bsugar"+rowCount+">";
            td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);	
			
					   
			var cell3 = row.insertCell(2);   
            var element3 = document.createElement("input");   
			element3.type = "hidden"; 
            element3.name = "usugar"+rowCount; 
			element3.size = "5"; 
			element3.className = 'textbox1';
			element3.value = '0';
			element3.id="usugar"+rowCount; 
            cell3.appendChild(element3);  
			 
			 var cell4 = row.insertCell(3);   
            var element4 = document.createElement("input");   
			element4.type = "hidden"; 
            element4.name = "sno10"+rowCount; 
			element4.id = "sno10"+rowCount; 
			element4.value=rowCount; 
            cell4.appendChild(element4); 
		
			 
        }   
		
        function deleteRow6(tableID) {  
            var tbl = document.getElementById('dataTable6');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count6").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count6").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>
<script>
function sav_sc()
{
var rowss=document.getElementById("count6").value;
// alert(rowss);
	  for(k=1;k<=rowss;k++)
		{
		  var select3="sugardate"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please enter date&time Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			var select4="bsugar"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("Blood sugar Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			
			}
document.form_sc.action="hms_sugar_chart_update.php";
}
</script>


<script>
function sc_report(str)
{
document.getElementById("sc_abc").value=str;
}
</script>
</head>

<body>
<form name="form_sc" autocomplete="false" onsubmit="return sav_sc(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="10px"></td></tr>
    <tr>
      <td>
		<div align="center">
			<table width="30%" border="0" cellpadding="3" cellspacing="4">
                            <tr>
                                <td colspan="2" ><div align="center" id="admittable2">
                                <table width="60%" border="0" cellpadding="2">
                                  <thead>
                                    <tr>
                                      <th  class="TH1">Date/Time</th>
                                      <th  class="TH1">Blood Sugar </th>
                                       <th class="TH1" style="display:none ">Urine Sugar</th>
									    
                                    
                                     </tr>
                                  </thead>
                                </table>
						      </div></td>
			  </tr>
			  <tr><td><div align="right"><input type='image'  src="images/save1.gif" onclick="sc_report(1)"></div>
			  
			  </td>
			   <td><div align="left"><input name="image" type='image' src="images/report_butn.gif" onclick="sc_report(2)"/></div></td>
			  </tr>
			  <tr><td><input type="hidden" id="sc_abc" name="sc_abc" value="0"/></td></tr>
      </table>
		</div>
		</td>
    </tr>
    
   
    
  </table>

</form>
</body>

</html>
