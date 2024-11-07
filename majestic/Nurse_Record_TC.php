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
<script  type="text/javascript" src="js/datetimepicker.js"></script>

<script language="javascript" type="text/javascript" >  
count5="1";
        function addRow5(tableID) {   
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count5").value=(rowCount);
				var ff="ndatetime"+rowCount;	
				//alert(ff)
			var td1= document.createElement("TD")
			var strHtml1 = "<a href=javascript:NewCal('ndatetime"+rowCount+"','ddmmyyyy',true,24) ><input type=text class=textbox1  name=ndatetime"+rowCount+" readonly  id=ndatetime"+rowCount+"></a>";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);
			
            var td2 = document.createElement("TD")
            var strHtml2  = "<div id=itemcode"+rowCount+"><input type=text class=textbox1  name=itemcode"+rowCount+" onclick=window.open('drug_popup.php?rowCount="+rowCount+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')  id=itemcode"+rowCount+"></div>";
            td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);			   
			
			var td3 = document.createElement("TD")
            var strHtml3  = "<input type=text class=textbox1  name=dose"+rowCount+" size=5 id=dose"+rowCount+">";
            td3.innerHTML = strHtml3.replace(/!count!/g,count);
	        row.appendChild(td3);	
						
			/*var cell3 = row.insertCell(2);   
            var element3 = document.createElement("input");   
			element3.type = "text"; 
            element3.name = "dose"; 
			element3.size = "5"; 
			element3.className = 'textbox1';
			element3.id="dose"+rowCount; 
            cell3.appendChild(element3);  */
			
			
			var td4 = document.createElement("TD")
            var strHtml4  = "<input type=text class=textbox1 size=5  name=route"+rowCount+" id=route"+rowCount+"  ></a>";
			td4.innerHTML = strHtml4.replace(/!count!/g,count);
	        row.appendChild(td4);
			
			var td5 = document.createElement("TD")
            var strHtml5  = "<input type=text class=textbox1 size=5 name=frequency"+rowCount+" id=frequency"+rowCount+" >";
			td5.innerHTML = strHtml5.replace(/!count!/g,count);
	        row.appendChild(td5);
			
			var td6 = document.createElement("TD")
            var strHtml6  = "<textarea  class=textbox1 name=specialproc"+rowCount+" id=specialproc"+rowCount+" cols=12 rows=1 ></textarea>";
			td6.innerHTML = strHtml6.replace(/!count!/g,count);
	        row.appendChild(td6);
			
			var td7 = document.createElement("TD")
            var strHtml7  = "<textarea class=textbox1 name=remarks"+rowCount+" id=remarks"+rowCount+" cols=12 rows=1></textarea>";
			td7.innerHTML = strHtml7.replace(/!count!/g,count);
	        row.appendChild(td7);
			
			var cell8 = row.insertCell(7);   
            var element8 = document.createElement("input");   
			element8.type = "hidden"; 
            element8.name = "sno"+rowCount; 
			element8.id = "sno"+rowCount; 
			element8.value=rowCount; 
            cell8.appendChild(element8);  
			
			var cell9 = row.insertCell(8);   
            var element9 = document.createElement("input");   
			element9.type = "hidden"; 
            element9.name = "qty"+rowCount; 
			element9.id = "qty"+rowCount; 
			 cell9.appendChild(element9);  
			 
			  cell10 = row.insertCell(9);   
            var element10 = document.createElement("input");   
			element10.type = "hidden"; 
            element10.name = "bqty"+rowCount; 
			element10.id = "bqty"+rowCount; 
			 cell10.appendChild(element10); 
			 
			
			  cell11 = row.insertCell(10);   
            var element11 = document.createElement("input");   
			element11.type = "text"; 
            element11.name = "batch"+rowCount; 
			element11.id = "batch"+rowCount; 
			 cell11.appendChild(element11); 

			
        }   
		
        function deleteRow5(tableID) {  
            var tbl = document.getElementById('dataTable5');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count5").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count5").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>
<script>
function nrtc_qty(str,rowc)
{
var avqty=document.getElementById("bqty"+rowc).value;
if(eval(avqty)<str){alert("Please Enter Used Quantity Below available qty "+'('+avqty+')');
document.getElementById("dose"+rowc).value="";
document.getElementById("dose"+rowc).focus();
return false;}


}
</script>
<script>
function sav_nrc()
{
//alert(1);
var rowss=document.getElementById("count5").value;
 //alert(rowss);
	  for(k=1;k<=rowss;k++)
		{
		  var select3="ndatetime"+k;
		  		  						
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
                               //alert(date2);

                                 var str3=document.getElementById("curr").value;//alert('str3--'+str3)
                                 var dt3 = parseInt(str3.substring(0,2),10);
                                 var mon3 = parseInt(str3.substring(3,5),10);
                                 var yr3  = parseInt(str3.substring(6,10),10);
                                 var current_datefor = new Date(yr3, mon3, dt3);
                                 //alert(current_datefor);
                            if(date2>current_datefor)
                                 {//alert("Date of Birth--"+date2);alert("current_datefor--"+current_datefor)
                                     alert("Date Should be Less than Birth date");//To date cannot be greater than from date
                                     return false;
                                 }
                            }
			
			var select4="itemcode"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("Medicine Name Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			var select5="dose"+k;
			if(document.getElementById(select5).value=="")
			{
				alert("Dose Feild is Empty");
				document.getElementById(select5).focus();
				return false;
			}
			var select6="route"+k;
			if(document.getElementById(select6).value=="")
			{
				alert("Route Feild is Empty");
				document.getElementById(select6).focus();
				return false;
			}
			var select7="frequency"+k;
			if(document.getElementById(select7).value=="")
			{
				alert("Frequency Feild is Empty");
				document.getElementById(select7).focus();
				return false;
			}
			var select8="specialproc"+k;
			if(document.getElementById(select8).value=="")
			{
				alert("SpecialProcedure Feild is Empty");
				document.getElementById(select8).focus();
				return false;
			}
			
			
}
document.nrcform.action="nurse_record_tc_update.php";
}
</script>


<script>
function nrt_report(str)
{
document.getElementById("nrt_abc").value=str;
}
</script>
</head>

<body>
<form name="nrcform" autocomplete="off" onsubmit="return sav_nrc(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
      <tr><td height="10px"><input type="hidden" name="curr" id="curr" value="<?php echo date('d-m-Y h:i:s') ?>" /></td></tr>
    <tr>
      <td>
			<table width="90%" border="0" cellpadding="3" cellspacing="4">
                           
							<tr>
							  <td colspan="2" ><div align="center" id="nurserecord">
                                <table width="100%"  >
                                  <thead>
                                    <tr>
                                      
                                      <th class="TH1">Date/Time </th>
                                      <th class="TH1">Medicine Name </th>
									  <th class="TH1">Dose </th>
                                      <th class="TH1">Route</th>
									  <th class="TH1">Freequency</th>
							          <th class="TH1">SpecialProcedure</th>
									  <th class="TH1">Remarks</th>
                                    </tr>
                                  </thead>
                                </table>
														      </div></td>
			  </tr>
              
              
              <tr><td><div align="center"><input type='image'  src="images/save1.gif" onclick="nrt_report(1)"/>
								<input type="hidden" id="nrt_abc" name="nrt_abc" value="0"/>
								    <input name="image" type='image' src="images/report_butn.gif" onclick="nrt_report(2)"/>
		            
		                </div></td></tr>
			  </table>
							 <!--<table align="center">
								<tr><td><div align="center"><input type='image'  src="images/save1.gif" onclick="nrt_report(1)"/></div>
								<input type="hidden" id="nrt_abc" name="nrt_abc" value="0"/></td>
								    <td><div align="left"><input name="image" type='image' src="images/report_butn.gif" onclick="nrt_report(2)"/>
		            
		                </div></td>
								</table>-->
     
   
    
  </table>

</form>
</body>

</html>
