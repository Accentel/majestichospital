<?php //include('config.php');
session_start();
if($_SESSION['name1'])
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>

<script type="text/javascript">
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function validate(){
	
	var emp_value ="";
	//var selected=false;

  for (var i=0; i < document.docpat.empid.length; i++){

   if (document.docpat.empid[i].checked){
	   var emp_value = document.docpat.empid[i].value;
	 //alert("emp val -->"+emp_value);     
   }
  }
  if( emp_value == "" || emp_value== null ){
	 	  alert("Please select Patient Name");
	  return false;
  }
  return true
}
  function showDoc(cc){
	
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="finalbill_popup1.php"
			  url=url+"?emp_id="+cc;
                
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("POST",url,true)
				  xmlHttp.send(null)
	 }
			
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
		  //alert(showdata);
		  var strar = showdata.split("|");
		//alert(strar);
		  if(strar.length>0){
			 //window.opener.location.reload();
			 //window.location.reload(); 
	 //alert(strar.length);
		//"|" + emp_id + "|" + 2 name + "|" +  regno + "|" + age + "|" + 5sex + "|" + admdt + "|" + 7constype + "|" + conscard + "|" + admfee + "|" + diet; data=data + "|" + consultantfee1+ "|" +  invgfee + "|" + 13 therfee + "|" + 14 carmfee + "|"+ consinvgfee + "|"+ 16 totrent + "|" +17 adv_amt + "|" +18 bedno + "|" +019 arogya_amount + "|"+ 20 admfee_cons + "|" +21 out side +service +22 attender;

	//alert('<%=current_date%>')
			opener.document.getElementById("patno").value=strar[1];
			opener.document.getElementById("patname").value=strar[2];
			opener.document.getElementById("patregno").value=strar[3];
			opener.document.getElementById("age").value=strar[4];
			opener.document.getElementById("sex").value=strar[5];
			opener.document.getElementById("addr").value=strar[6];
			opener.document.getElementById("con_doct").value=strar[7];
			opener.document.getElementById("rel_type").value=strar[8];
			opener.document.getElementById("rel_name").value=strar[9];
			opener.document.getElementById("contact").value=strar[10];
			opener.document.getElementById("admdt").value=strar[11];
			// opener.document.getElementById("txtrent").value=strar[12];
			 opener.document.getElementById("DisDate").value='<?php echo date('d-m-Y')?>';	
			
//opener.document.getElementById("nursechar").value=strar[13];
//opener.document.getElementById("dmo").value=strar[14];
opener.document.getElementById("icudays").value=strar[15];
opener.document.getElementById("gendays").value=strar[16];
			 
			opener.document.getElementById("hosppaid").value=strar[20];
				
			
			opener.document.getElementById("packname").value=strar[23];
			opener.document.getElementById("packamt").value=strar[24];
			opener.document.getElementById("bal").value=strar[25];
			opener.document.getElementById("bedno").value=strar[26];
			opener.document.getElementById("rno").value=strar[27];
		  <?php /*?>  opener.document.getElementById("conscardno").value=strar[13];
		    opener.document.getElementById("admfee").value=strar[14];
			opener.document.getElementById("diet").value=strar[15];
		    opener.document.getElementById("confee").value=strar[16];
			//opener.document.getElementById("addr").value=strar[20];

			opener.document.getElementById("admitcons").value=strar[29];
			opener.document.getElementById("mr").value=strar[30];
		    opener.document.getElementById("lab").value=strar[17];
			//opener.document.getElementById("invg_cons").value=strar[32];
			//opener.document.getElementById("rad").value=strar[18];
			
			

if(strar[18]==0){free='';}



if(strar[18]!=0){//alert("if"+strar[23])
//opener.document.getElementById("oprationdiv").innerHTML="<table width='98%' border='0' cellspacing='3' cellpadding='3'> <tr><td width='27%' class='label1'><div align='right'>Critical Care Support </div></td> <td width='13%'> <div align='left'>         <input name='txtcritical' type='text' class='textbox1' onclick='total()' style='text-align:right' onkeyup='total()' value='0' size='8' />   </div></td>   <td width='40%' class='label1'><div align='right'>CARM Charges </div></td>   <td width='20%'><div align='left'>       <input name='carm' type='text' class='textbox1' style='text-align:right'   size='8' value='"+strar[14]+"' onkeyup='total()'/>   </div></td> </tr> <tr>   <td class='label1'><div align='right'>OperationTheater Charges </div></td>   <td><div align='left'>       <input name='oper' id='oper' type='text' class='textbox1' style='text-align:right'   size='8' value='"+strar[13]+"' onkeyup='total()' />  </div></td>   <td class='label1'><div align='right'>OperationTheater Concession </div></td>   <td><div align='left'>       <input name='opercons' id='opercons' type='text' class='textbox1' style='text-align:right'   size='8' value='0' onkeyup='total()' />   </div></td> </tr> <tr>   <td class='label1'><div align='right'>OT Instrumentation Charges </div></td>   <td><div align='left'>       <input name='txtinst' type='text' class='textbox1' style='text-align:right'   size='8' value='0' onkeyup='total()'/>   </div></td>   <td class='label1'><div align='right'>Anaesthesia/Disposable </div></td>   <td><div align='left'>       <input name='txtAT' type='text' class='textbox1' style='text-align:right'   size='8' value='0' onkeyup='total()'/>   </div></td> </tr> <tr>   <td class='label1'><div align='right'>Surgeon Charges </div></td>   <td><div align='left'>       <input name='txtsurg' type='text' class='textbox1' style='text-align:right'   value='0' size='8' onkeyup='total()' />   </div></td>   <td class='label1'><div align='right'>Asst. Surgeon Charges </div></td>   <td><div align='left'>       <input name='txtsurg_as' type='text' class='textbox1' style='text-align:right'   value='0' size='8' onkeyup='total()'/>   </div></td> </tr> <tr>   <td class='label1'><div align='right'>Anaesthetist Charges</div></td>   <td><div align='left'>       <input name='txtanaestist' id='txtanaestist' type='text' class='textbox1' style='text-align:right'   value='0' size='8' onkeyup='total()' />   </div></td>   <td class='label1'><div align='right'>Anaesthetist Consession </div></td>   <td><div align='left'>       <input name='an_cons' id='an_cons' type='text' class='textbox1' style='text-align:right'   size='8' value='0' onkeyup='total()' />   </div></td> </tr> <tr>   <td class='label1'><div align='right'>Dressing Charges </div></td>   <td><div align='left'>       <input name='dress' id='dress'  type='text' class='textbox1' style='text-align:right'   size='8' value='0' onkeyup='total()'/>"

	    opener.document.getElementById("oper").value=strar[18];
		opener.document.getElementById("carm").value=strar[19];
		   
}


	//"|" + emp_id + "|" + 2 name + "|" +  regno + "|" + age + "|" + 5sex + "|" + admdt + "|" + 7constype + "|" + conscard + "|" + admfee + "|" + diet; data=data + "|" + consultantfee1+ "|" +  invgfee + "|" + 13 therfee + "|" + 14 carmfee + "|"+ consinvgfee + "|"+ 16 totrent + "|" +17 adv_amt + "|" +18 bedno + "|" +019 arogya_amount + "|"+ 20 admfee_cons + "|" +21 out side +service +22 attender;


            opener.document.getElementById("DisDate").value='<?php echo date('d-m-Y')?>';	
         //   opener.document.getElementById("txtrent").value=strar[16];	
          opener.document.getElementById("txtadv").value=strar[22];	
            opener.document.getElementById("bedno").value=strar[23];

			//opener.document.getElementById("arogya").innerHTML=" <input type=hidden name='arogya' id='arogya' value='0' size='5' /><input type=hidden name='arogya1' id='arogya1'  style='text-align:right' size=8   class='textbox1'>";	
			//if(strar[24]!=0)
            //opener.document.getElementById("arogya").innerHTML="<table width='100%'><tr><td width='68%'>"+strar[7]+" Concession &nbsp;  </td><td align='left'> <input type=hidden name='arogya' id='arogya' value="+strar[20]+" ><input type=text name='arogya1' id='arogya1'  style='text-align:right' size=8   class='textbox1'></td><tr>";	

//alert(strar[23])

opener.document.getElementById("outcons").innerHTML=strar[26];	

opener.document.getElementById("equipment").innerHTML=strar[27];	
opener.document.getElementById("Attender").innerHTML=strar[28];	
opener.document.getElementById("returnval").innerHTML=""
opener.document.getElementById("returnval1").innerHTML=""
opener.document.getElementById("txtrent").value=strar[33];
opener.document.getElementById("nursechar").value=strar[35];
opener.document.getElementById("dmo").value=strar[34];
opener.document.getElementById("icu").value=strar[36];<?php */?>
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
	</head>

	<body>


	
                       <form name="frm" method="post" >
           
                
<table width="70%" cellspacing="2">

<tr><td></td><td>Search By MR No : <input type="text" name="name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>

<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>PATIENT REG NO.</TH><TH>PATIENT NO.</TH><TH>PATIENT NAME</TH></tr>
<?php 
			  include("config.php");
			  
			   if(isset($_REQUEST['submit'])){
				$n=$_REQUEST['name'];
					
			    if($n != "")
				{
					$sq=mysqli_query($link,"select distinct a.PAT_NO,b.patientname,b.registerno from ip_pat_admit as a,patientregister as b WHERE a.pat_regno=b.registerno and registerno='$n'")or die(mysqli_error($link));
				}
			   if($sq)
			   {
			   $rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_NO'];
			  $h = $res['patientname'];
			  $r = $res['registerno'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/></td><td><?php echo $a ?></td><td><?php echo $h;?></td></tr>
             
				 <?php }
			 }
			 }
			 else{
				  $x="select distinct a.PAT_NO,b.patientname,b.registerno from ip_pat_admit as a,patientregister as b WHERE a.pat_regno=b.registerno AND a.dis_status='ADMITTED' and a.package='Yes' and a.pat_no not in (Select PatientNo from final_bill)";
				$sq=mysqli_query($link,$x)or die(mysqli_error($link));
	 
			if($sq){	
				$rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_NO'];
			  $h = $res['patientname'];
			  $r = $res['registerno'];
			 ?>
             <tr height="25px"><td style="text-align:center;">
             <input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/><?php echo $a ?></td><td><?php echo $a ?></td><td><?php echo $h;?></td></tr>
             <?php }
			 
			 }
			 }
			 ?></table>
              <?php if($rows==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>


 
			
	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>