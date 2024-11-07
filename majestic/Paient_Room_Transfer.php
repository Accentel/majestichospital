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
<script type="text/javascript" src="./js/datetimepicker.js"></script>
<script type="text/javascript">
function transfer(str)
{if(str==1)

document.getElementById("transfer_table").style.display='';
var sts_date=document.getElementById("e_date").value;
document.getElementById("tr_st_date").value=sts_date;//
var tr_st_time=document.getElementById("e_time").value;
document.getElementById("tr_st_time").value=tr_st_time;
var time1=document.getElementById("etime1").value;
document.getElementById("time1").selected=time1;


if(str==2)
document.getElementById("transfer_table").style.display='none';
}

</script>


<script type="text/javascript">
function sav_prt()
{
  	document.prtform.action="patient_room_transfer_update.php";
}
</script>
</head>

<body>
<form name="prtform" autocomplete="false" onsubmit="return sav_prt(this);">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php
	
	        $POOMNO=$_REQUEST['POOMNO'];
			
	
	?>
	<tr><td height="10px"></td></tr>
    <tr>
      <td>
		<div align="center">
			<table width="98%" border="0" cellpadding="3" cellspacing="4">
							
							<tr>
							  <td width="100%" ><div align="center" id="iproomtransfer" >
							    <table width="100%" class="sortable" summary="Table of my records" id="TABLE1">
                                  <thead>
                                    <tr>
                                      <th class="TH1">Room No </th>
                                      <th class="TH1">Bed No </th>
                                      <th class="TH1">Start Date</th>
                                      <th class="TH1">Start Time </th>
                                      <th class="TH1">End Date</th>
                                      <th class="TH1"> End Time </th>
                                      </tr>
                                  </thead>
                                </table>
						      </div></td>
			  </tr>
			   <tr> 
	  <td width="72%" class="label1" ><div align="center"></div></td>
      </table>
		
		</td>
    </tr>
    
   
  </table>

</form>

</body>

</html>
