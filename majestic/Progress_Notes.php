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
<link rel="stylesheet" type="text/css" href="../css/tafble_style.css" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />
<script type="text/javascript" src="../js/tableruler.js"></script>
<script  type="text/javascript" src="./js/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" >  
count1="1";
        function addRow(tableID) {   
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count1").value=(rowCount);
			
			
			
			var td1= document.createElement("TD")
			var strHtml1 = "<a href=javascript:NewCal('prdatetime"+rowCount+"','ddmmyyyy',true,24) ><input type=text class=textbox1 name=prdatetime"+rowCount+" readonly  id=prdatetime"+rowCount+"></a>";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);
			
			
            var td2 = document.createElement("TD")
            var strHtml2  = "<input type=text class=textbox1  name='processnotes"+rowCount+"'  id=processnotes"+rowCount+">";
            td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);			   
			
						
			var cell3 = row.insertCell(2);   
            var element3 = document.createElement("textarea");   
			 element3.name = "treatment"+rowCount; 
			element3.size = "3"; 
			element3.className = 'treatment';
			element3.id="treatment"+rowCount; 
            cell3.appendChild(element3);  
			
			var cell4 = row.insertCell(3);   
            var element4 = document.createElement("input");   
			element4.type = "hidden"; 
            element4.name = "sno2"+rowCount; 
			element4.id = "sno2"+rowCount; 
			element4.value=rowCount; 
            cell4.appendChild(element4);  
			
			
        }   
		
        function deleteRow(tableID) {  
            var tbl = document.getElementById('dataTable3');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count1").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count1").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>
<script>
function sav_pn()
{
var rowss=document.getElementById("count1").value;
 //alert(rowss);
 for(k=1;k<=rowss;k++)
		{
		  var select1="prdatetime"+k;
		  		  						
			if(document.getElementById(select1).value=="")
			{
				alert("Please enter date&time Feild");
				document.getElementById(select1).focus();
				return false;
			}
			
			var select2="processnotes"+k;
			if(document.getElementById(select2).value=="")
			{
				alert("Progress Notes Feild is Empty");
				document.getElementById(select2).focus();
				return false;
			}
			var select3="treatment"+k;
			if(document.getElementById(select3).value=="")
			{
				alert("Treatment Feild is Empty");
				document.getElementById(select3).focus();
				return false;
			}
			}
document.pnform.action="progress_notes_update.php";
}
</script>

<script>
function pn_report(str)
{
document.getElementById("pn_abc").value=str;
}
</script>
</head>

<body>
<form name="pnform" autocomplete="false" onsubmit="return sav_pn(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="10px"></td></tr>
    <tr>
      <td>
		<div align="center">
			<table width="70%" border="0" cellpadding="3" cellspacing="4">
                         
                          	<tr>
							  <td colspan="4" ><div align="center"  id="progressnotes">
                                <table width="97%" border="0" cellpadding="2">
                                  <thead>
                                    <tr>
                                      <th width="9%"  class="TH1">Date/Time </th>
                                      <th width="18%"  class="TH1">Progress Notes </th>
									  <th width="10%" class="TH1">Treatment </th>
                                      
                                    </tr>
                                  </thead>
                                </table>
						      </div></td>
			  </tr>
							
      </table>
	  <table align="center">
								<tr><td><div align="center"><input type='image'  src="images/save1.gif" onclick="pn_report(1)"></div>
								 <input type="hidden" id="pn_abc" name="pn_abc" value="0"/></td>
								    <td><div align="left"><input name="image" type='image' src="images/report_butn.gif" onclick="pn_report(2)"/>
		            
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
