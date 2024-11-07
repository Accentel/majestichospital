<html>
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
<script  type="text/javascript" src="./js/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" src="js/actb.js"></script>
<script language="javascript" type="text/javascript" src="js/actb2.js"></script>
<script language="javascript" type="text/javascript" src="js/common.js"></script>


<script type="text/javascript" >
function showvisittype(str,str1){
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
var url="visittype.php";
url=url+"?pname="+str+"&row="+str1;
document.getElementById("str").value=str1;
xmlHttp.onreadystatechange=stateChanged2;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChanged2() 
{ 
	if (xmlHttp.readyState==4)
	{ 	
	     var showdata = xmlHttp.responseText; 
			var str=document.cform.str.value
		if(showdata=="" || showdata==null){document.getElementById("visittype"+str).innerHTML="input type=text class=textbox1  name=visittype";}else{
		document.getElementById("visittype"+str).innerHTML=showdata;
	  }
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
function act()
{

var count=document.getElementById("count").value;

for(var i=1;i<=count;i++)
{
var cons_obj=actb2(document.getElementById('docname'+i+''),customarray1);
var docname=document.getElementById('docname'+i+'').value;
showvisittype(docname,i)	
}

}
</script>
<script language="javascript" type="text/javascript">  
count="1";
        function addRow1(tableID) {   
		
            var table = document.getElementById(tableID);   
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			document.getElementById("count").value=(rowCount);
					
			var td1= document.createElement("TD")
			var strHtml1 = "<a href=javascript:NewCal('visitdatetime"+rowCount+"','ddmmyyyy',true,24) ><input type='text' class='textbox1'  name='visitdatetime"+rowCount+"' id='visitdatetime"+rowCount+"'></a>";
			td1.innerHTML = strHtml1.replace(/!count!/g,count);
	        row.appendChild(td1);
			
            var td2 = document.createElement("TD")
		var strHtml2 = "<input type='text' class='textbox1' size='20' name='docname"+rowCount+"' id='docname"+rowCount+"' onblur=showvisittype(this.value,"+rowCount+") >";
			td2.innerHTML = strHtml2.replace(/!count!/g,count);
	        row.appendChild(td2);			   
			
			
			var td3= document.createElement("TD")
			var strHtml3 = "<div id='visittype"+rowCount+"'><input type=text class=textbox1  name=visittype"+rowCount+" ></div>";
			td3.innerHTML = strHtml3.replace(/!count!/g,count);
	        row.appendChild(td3);
						
					
			var cell4 = row.insertCell(3);   
            var element4 = document.createElement("input");   
			element4.type = "hidden"; 
            element4.name = "sno"+rowCount; 
			element4.id = "sno"+rowCount; 
			element4.value=rowCount; 
            cell4.appendChild(element4);  
			var obj = actb(document.getElementById('docname'+rowCount+''),customarray1);
        }   
		
        function deleteRow1(tableID) {  
            var tbl = document.getElementById('dataTable1');
            var lastRow = tbl.rows.length;
            var rowss=document.getElementById("count").value;
    if (lastRow > 1){ 
				  tbl.deleteRow(lastRow - 1);document.getElementById("count").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
  
</script>
<script>
function sav_cv()
{
  var rowss=document.getElementById("count").value;

	  for(k=1;k<=rowss;k++)
		{
		
		  var select3="visitdatetime"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please enter date&time Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			var select4="docname"+k;
			if(document.getElementById(select4).value=="select")
			{
				alert("Please select Doctor Name");
				document.getElementById(select4).focus();
				return false;
			}
			
	}
			
	document.cform.action="consultant_visit_update.php";
}
</script>
</head>
<body>
<form name="cform" autocomplete="false" onsubmit="return sav_cv(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
	<tr><td height="10px"></td></tr>
    <tr>
      <td>
			<table width="60%" border="0" cellpadding="3" cellspacing="4" align="center">
                            <tr>
							</tr>
                            
							<tr>
							  <td colspan="2" ><div align="center" id="admittable4">
                                <table width="97%" border="0" cellpadding="2" >
                                  <thead>
                                    <tr>
                                      <th width="13%"  class="TH1">S.No</th>
                                      <th width="14%"  class="TH1">DateTime </th>
                                       <th width="29%" class="TH1">Doctor Name </th>
                                      <th width="29%" class="TH1">Visit Type</th>
                                    </tr>
                                  </thead>
                                </table>
						      </div></td>
			  </tr>
			   <tr> 
	  <td width="72%" class="label1" ><div align="center"><input type='image' src="images/save1.gif" ></div>
	   </td>
      </table><input type=hidden  runat=server id=str name="str" >
		
		</td>
    </tr>
    
   
    
  </table>

</form>

</body>
</html>
