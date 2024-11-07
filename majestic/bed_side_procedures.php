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
count11="1";
        function addRow11(tableID) {   
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count11").value=(rowCount);
					
			var td1= document.createElement("TD")
			var strHtml1 = "<div id=bedside"+rowCount+"><input type=text class=textbox1 readonly name=name"+rowCount+" readonly  id=name"+rowCount+" onclick=window.open('critequip_popup.php?rowCount="+rowCount+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') ></div>";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);
			
            var td2 = document.createElement("TD")
            var strHtml2  = "<a href=javascript:NewCal('startdatetime"+rowCount+"','ddmmyyyy',true,24) ><input type=text readonly class=textbox1 name=startdatetime"+rowCount+" readonly  id=startdatetime"+rowCount+"></a>";
            td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);			   
			
						
			var td3= document.createElement("TD")
			var strHtml3 = "<a href=javascript:NewCal('enddatetime"+rowCount+"','ddmmyyyy',true,24) ><input type=text readonly class=textbox1 name=enddatetime"+rowCount+" readonly  id=enddatetime"+rowCount+"></a>";
			td3.innerHTML = strHtml3.replace(/!count!/g,count);
	        row.appendChild(td3);
			
			
			var td4 = document.createElement("TD")
            var strHtml4  = "<input type=text class=textbox1 size=5  name=qty"+rowCount+" id=qty"+rowCount+"  ></a>";
			td4.innerHTML = strHtml4.replace(/!count!/g,count);
	        row.appendChild(td4);
					
			var cell5 = row.insertCell(4);   
            var element5 = document.createElement("input");   
			element5.type = "hidden"; 
            element5.name = "sno"+rowCount; 
			element5.id = "sno"+rowCount; 
			element5.value=rowCount; 
            cell5.appendChild(element5);  
        }   
		
        function deleteRow11(tableID) {  
            var tbl = document.getElementById('dataTable11');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count11").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count11").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>


<script>
function sav_bs()
{
  var rowss=document.getElementById("count11").value;
	  for(k=1;k<=rowss;k++)
		{
		
		   var name="name"+k;
		 	if(document.getElementById(name).value=="")
			{
				alert("Please click on Service Provided ");
				document.getElementById(name).focus();
				return false;
			}
			
			
			var startdatetime="startdatetime"+k;
			
			if(document.getElementById(startdatetime).value=="")
			{
				alert("Please click on for Start date time  ");
				document.getElementById(startdatetime).focus();
				return false;
			}
			
			
			var enddatetime="enddatetime"+k;
			if(document.getElementById(enddatetime).value=="")
			{
				alert("Please click on for calender for End date time ");
				document.getElementById(enddatetime).focus();
				return false;
			}
			if(!(document.getElementById(startdatetime).value=="") && !(document.getElementById(enddatetime).value==""))
                            {
                                var str2 = document.getElementById(startdatetime).value;//alert("dob"+str2);
                                 var dt2  = parseInt(str2.substring(0,2),10);
                                 var mon2 = parseInt(str2.substring(3,5),10);
                                 var yr2  = parseInt(str2.substring(6,10),10);
                                 var date2 = new Date(yr2, mon2, dt2);
                               //alert(date2);

                                 var str3=document.getElementById(enddatetime).value;//alert('str3--'+str3)
                                 var dt3 = parseInt(str3.substring(0,2),10);
                                 var mon3 = parseInt(str3.substring(3,5),10);
                                 var yr3  = parseInt(str3.substring(6,10),10);
                                 var current_datefor = new Date(yr3, mon3, dt3);
                                 //alert(current_datefor);
                            if(current_datefor<date2)
                                 {//alert("Date of Birth--"+date2);alert("current_datefor--"+current_datefor)
                                     alert("End date Should be not Less than start date");//To date cannot be greater than from date
                                     return false;
                                 }
                            }
			var qty="qty"+k;
			if(document.getElementById(qty).value=="")
			{
				alert("Please Enter Qty ");
				document.getElementById(qty).focus();
				return false;
			}
			
	}
	document.bsform.action="bed_side_procedures_update.php";
}
</script>
</head>

<body>
<form name="bsform" autocomplete="false" onsubmit="return sav_bs(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="10px"></td></tr>
    <tr>
      <td align="center">
			<table width="75%" border="0" cellpadding="3" cellspacing="4">
                          
                            
							<tr>
							  <td colspan="2" ><div align="center"  id="bedsideproc">
                                <table width="100%" border="0" cellpadding="2">
                                  <thead>
                                    <tr>
                                     
                                      <th  class="TH1">Service Provided </th>
                                      <th  class="TH1">Start Date/Time </th>
									    <th class="TH1">End Date/Time</th>
									    <th class="TH1">Qty</th>
                                    </tr>
                                  </thead>
                                </table>
						      </div></td>
			  </tr>
			   <tr> 
	  <td width="72%" class="label1" ><div align="center"><input type='image'  src="images/save1.gif" ></div>
	   </td>
      </table>
		
		</td>
    </tr>
    
   
    
  </table>

</form>

</body>
</html>
