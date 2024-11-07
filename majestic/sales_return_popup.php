<?php
include("config.php");
	 if(isset($_REQUEST['submit'])){
		 $d1 = $_REQUEST['reg'];
		 if($d1 != ""){
			$d2 = date('Y-m-d',strtotime($d1));
			$msql=mysqli_query($link,"select cust_name,inv_no,sal_date,if(customer_type='c','Customer','Patient') from phr_salent_mast  where customer_type='c' or customer_type='p' or customer_type='p1' and sal_date = '$d2' union  select patientname,inv_no,sal_date,if(customer_type='c','Customer','Patient') from phr_salent_mast as a,patientregister as b where customer_type='p' and a.cust_name=b.registerno and sal_date = '$d2'")or die(mysqli_error($link));
			}
		 }
		else{
			$msql=mysqli_query($link,"select cust_name,inv_no,sal_date,if(customer_type='c','Customer','Patient') from phr_salent_mast  where customer_type='c' or customer_type='p' or customer_type='p1' union  select patientname,inv_no,sal_date,if(customer_type='c','Customer','Patient') from phr_salent_mast as a,patientregister as b where customer_type='p' and a.cust_name=b.registerno order by sal_date desc") or die(mysqli_error($link));
		 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("header.php");
?>
<script type="text/javascript">
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

  function showDoc(str){
 
 
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			//  alert("cc----"+cc);
			  var url="getsale_return_popup.php"
			  url=url+"?emp_id="+str;
			 
             // alert("url----"+url); 
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	 }
			
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
		//alert("showdata---"+showdata);
		  // var rws1=document.docpat.rws.value;
	// alert(rws1)
//alert(showdata)
		  var strar = trim(showdata).split(":");

		  if(strar.length>0){
			 // window.opener.location.reload();
			 //window.location.reload(); 
		//alert(strar[1]+"---"+strar[2]);
			//alert(strar[8]+"---"+strar[8]);
			 
			 
			  opener.document.getElementById("custname").value=strar[1];
			  opener.document.getElementById("btype").value=strar[2];
			  opener.document.getElementById("invno").value=strar[3];
			  opener.document.getElementById("stype").value=strar[4];
			  opener.document.getElementById("saledate").value=strar[5];
			  opener.document.getElementById("total").value=strar[6];
			  opener.document.getElementById("Discount").value=strar[7];
			  opener.document.getElementById("ntotal").value=strar[8];
			  opener.document.getElementById("productdetails").innerHTML=strar[9];
			
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
<title>Pharmacy</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>
<form name="docpat" action="sales_return_popup.php" autocomplete="off">
<table><tr><td>
  <div align="center">
<tr>
    <table width="400px" border="0" cellspacing="1" cellpadding="1">
               <tr>
                  <td width="118" class="label1">&nbsp;</td>
             
                  <td width="663" class="label1" ><div align="right">
                    Search By Sale Date:</div></td>
                  <td width="153"><input name="reg" type="text" class="tcal" id="searchingpop" />
                  </td>
  <td width="45"><input name="submit" type="submit" value="" style="background-image:url(images/go1.gif);width:42px;height:22px;border:0;"/></td>
      </tr>
    </table></tr>
<tr></tr>
<tr></tr>
<!-------------------------------------------->
<tr align="center">
<table width="400px" class=""  id="TABLE1" align="center">
  <thead>
    <tr>
      <th class="TH1"><div align="center">Customer Name</div></th>
      <th class="TH1">Customer Type</th>
	  <th class="TH1">Sale Date</th>
     

     
    </tr>
  </thead>
  <tbody class="box_midlebg">
   <?php
		if($msql){
		$records = mysqli_num_rows($msql);
		while($row = mysqli_fetch_array($msql)){
	?>	
    <tr class="tr1">                   
	
	<input type="hidden" name="c" value="<?php echo $records ?>">
	

    <td class="TD1"><input type="radio" name="empid" value="<?php echo $row[1] ?>" onclick="javascript:showDoc(this.value);"/> <?php echo $row[0] ?></td>
    <td class="TD1"><?php echo $row[3] ?></td>
	<td class="TD1"><?php echo date('d-m-Y',strtotime($row[2])); ?></td>
    
    </tr>
	<?php
	}
	}?>
   

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