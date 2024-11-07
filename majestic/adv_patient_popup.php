<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("header.php");
?>
<script type="text/javascript">
  function showDoc(str){
	  	
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }//if
		  
			  var url="adv_patient_popup1.php"
			  url=url+"?emp_id="+str;
                
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	 }
			
function stateChanged(){ 
//alert("hi");
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
//alert(showdata)
		  var strar = showdata.split(":");
		//alert(strar);

		  if(strar.length>0){
			  // window.opener.location.reload();
			 //window.location.reload(); 
			  opener.document.getElementById("regno").value=strar[1];
			  opener.document.getElementById("patname").value=strar[2];
			  opener.document.getElementById("age").value=strar[3];
			  opener.document.getElementById("gender").value=strar[4];
			  opener.document.getElementById("admit_date").value=strar[5];
			
   			   window.close();
		  }
	  }
  }
  


function GetXmlHttpObject(){
	  var xmlHttp=null;
	  try{
		  // Firefox, Opera 8.0+, Safari
		  xmlHttp=new XMLHttpRequest();
	  }
	  catch (e){
		  //Internet Explorer
		  try{
			  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		  catch (e){
			  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
	  }
	  return xmlHttp;
  }
  </script>
<title>Hospital Management System</title>
</head>
<body>
<?php
	include("config.php");
	if(isset($_REQUEST['searchname']))
	{
		$n = $_REQUEST['searchname'];
		$sql = mysqli_query($link,"select pat_no,patientname,age,gender,admit_date from ip_pat_admit as a,patientregister as b where a.pat_regno=b.registerno and dis_status not like 'Discharged' and b.patientname='$n' and a.cash_credit='cash'order by pat_no desc ")or die(mysqli_error($link));
		$rows = mysqli_num_rows($sql);
	}
	else
	{
		$sql = mysqli_query($link,"select pat_no,patientname,age,gender,admit_date from ip_pat_admit as a,patientregister as b where a.pat_regno=b.registerno and dis_status not like 'Discharged' and a.cash_credit='cash' order by pat_no desc ")or die(mysqli_error($link));
		$rows = mysqli_num_rows($sql);
	}
?>
<form name="docpat" action="adv_patient_popup.php" autocomplete="off">
<table><tr><td>
  <div align="center">
<tr>
    <table width="400px" border="0" cellspacing="1" cellpadding="1">
               <tr>
                  <td width="118" >&nbsp;</td>
                 
                  <td width="663" class="label1" ><div align="right">
                    <input name="gname" type="hidden" value="enter"/>
                    Search By Patient Name:</div></td>
                  <td width="153"><input name="searchname" type="text" class="textbox1" id="searchingpop" />
                  </td>
                                     <script>
							        var obj = actb(document.getElementById('searchingpop'),search_suggestions);
									</script>
  <td width="45"><input name="image" type="image" src="images/go1.gif" width="41" height="20" border="0"/></td>
      </tr>
    </table></tr>
<tr></tr>
<tr></tr>
<!-------------------------------------------->
<tr align="center">
<table width="400px" class="sortable"  id="TABLE1" align="center">
  <thead>
    <tr>
      <th class="TH1"><div align="center">Patient No. </div></th>
      <th class="TH1">Patient Name</th>
	  <th class="TH1">Admission Date</th>
     
    </tr>
  </thead>
  <tbody class="box_midlebg">
	<?php
		if($sql){
		while($res = mysqli_fetch_array($sql))
		{
			
	?>
    <tr class="tr1">
      <td class="TD1"><input type="radio" name="empid" value="<?php echo $res[0] ?>" onclick="javascript:showDoc(this.value);"/> <?php echo $res[0] ?>       </td>
      <td class="TD1"><?php echo $res[1] ?></td>
    <td class="TD1"><?php echo date('d-m-Y',strtotime($res[4])) ?></td>
    </tr>
	<?php
		}
	}
	?>	
   
    <tr>
      <td colspan="6"><div align="center" ><font color="red">No Records Found</font></div></td>
    </tr>
    
  </tbody>
</table>
</tr>
<!-------------------------------------------->

<tr>
  <div align="right"><a href="javascript:window.close()"><b><font color="#FF6600">Close</font></b></a></div>
</tr>
  </div></td></tr></table>

</form>
</body>
</html>
