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
function showDoc(cc){
//alert(cc);
		  xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="dis_view25.php"
			  url=url+"?emp_id="+cc;
     			//alert(url);
			  xmlHttp.onreadystatechange=stateChanged 

				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	  }
			
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
		//alert(showdata);
		  var strar = showdata.split("@");
		// alert(strar.length);
		//alert(strar);
		  if(strar.length>0){
		  
		   var cop=eval(strar[8]);
		   var ca=eval(strar[10]);
		   var car=eval(strar[19]);
		   var q=eval(strar[38]);
			 var p1=eval(strar[39]);
			  var invg=eval(strar[41]);
			 var traet=eval(strar[40]);
			var ds=eval(strar[47]);
			var sd=eval(strar[69]);
			var dsd=eval(strar[70]);
			
			var sd2=eval(strar[74]);
			var bc=strar[85];
			var deathc=eval(strar[99]);
			//alert(cc);	
		  opener.document.getElementById("patno").value=strar[1];
		  opener.document.getElementById("regno").innerHTML=strar[2];
		  opener.document.getElementById("pataddr").innerHTML=strar[5];
		  opener.document.getElementById("patphone").value=strar[6];
		  opener.document.getElementById("patgar").value=strar[4];
		  //opener.document.getElementById("patdbno").value=strar[6];
		//alert(ca);
			  if(ca==0){ 
			
			    opener.document.getElementById("ad_notes").innerHTML="----";
				 	  }else{ 
					  opener.document.getElementById("ad_notes").innerHTML=strar[9];
				  opener.document.getElementById("dt").value=strar[20];
				    }
				  if(car==0){ 
				    opener.document.getElementById("prdiag").innerHTML="----";
					opener.document.getElementById("fidiag").innerHTML="----";
					opener.document.getElementById("comp").innerHTML="----";
				    opener.document.getElementById("oppro").innerHTML="----";
					
					opener.document.getElementById("deptref").innerHTML="----";
				    opener.document.getElementById("death").innerHTML="----";
					opener.document.getElementById("check").checked=false;
				  }else{ 
				     opener.document.getElementById("prdiag").innerHTML=strar[11];
					opener.document.getElementById("fidiag").innerHTML=strar[12];
					opener.document.getElementById("comp").innerHTML=strar[13];
				    opener.document.getElementById("oppro").innerHTML=strar[14];
					opener.document.getElementById("deptref").innerHTML=strar[15];
				    opener.document.getElementById("death").innerHTML=strar[17];
					opener.document.getElementById("ar_dt").value=strar[21];
					opener.document.getElementById("check").checked=true;
				  }
        	
       // opener.document.getElementById("admittable").innerHTML=strar[22];
		opener.document.getElementById("admittable1").innerHTML=strar[23];		
		opener.document.getElementById("admittable2").innerHTML=strar[24];		
		opener.document.getElementById("admittable4").innerHTML=strar[25];		
		if(q==1){opener.document.getElementById("diagno").innerHTML="<font color='#F04E00' size='2'>No Diagnostics </font>";
		}else{
		opener.document.getElementById("diagno").innerHTML=strar[26];		}
		opener.document.getElementById("progressnotes").innerHTML=strar[27];		
		opener.document.getElementById("nurserecord").innerHTML=strar[28];		
		opener.document.getElementById("iproomtransfer").innerHTML=strar[29];
		opener.document.getElementById("birthrecords").innerHTML=strar[30];
		opener.document.getElementById("vbirthrecords").innerHTML=strar[31];
		opener.document.getElementById("intakerecord").innerHTML=strar[32];
		opener.document.getElementById("outputrecord").innerHTML=strar[33];
		opener.document.getElementById("bedsideproc").innerHTML=strar[34];
		opener.document.getElementById("operationalSurgical").innerHTML=strar[35];
		if(dsd==1){
		 opener.document.getElementById("doctorname").innerHTML="---";
		 }else{
		 opener.document.getElementById("doctorname").innerHTML=strar[36];
		
		 }
		/*if(traet==1){
		
		opener.document.getElementById("specialproc").innerHTML="---";
		}else{
		
		opener.document.getElementById("specialproc").innerHTML=strar[37];
		}*/
		 	
		if(invg==1){
		opener.document.getElementById("invgitmaname").innerHTML="---";
		}else{
		opener.document.getElementById("invgitmaname").innerHTML=strar[38];
		}
			
		if(ds==1){
		opener.document.getElementById("history_ds").innerHTML=strar[43];
		opener.document.getElementById("cf").innerHTML=strar[44];
		opener.document.getElementById("ch").innerHTML=strar[45];
		opener.document.getElementById("ta").innerHTML=strar[46];
		  opener.document.getElementById("patno1").value=strar[75];
		}else{
		opener.document.getElementById("history_ds").innerHTML=" ";
		opener.document.getElementById("cf").innerHTML=" ";
		opener.document.getElementById("ch").innerHTML=" ";
		opener.document.getElementById("ta").innerHTML=" ";
		 opener.document.getElementById("patno1").value=strar[75];
		}
		
		if(sd==1){
		
		opener.document.getElementById("pod").innerHTML=strar[50];
		opener.document.getElementById("post_od").innerHTML=strar[51];
		opener.document.getElementById("pd").innerHTML=strar[52];
		opener.document.getElementById("sur_na").value=strar[53];
		opener.document.getElementById("ncs").value=strar[54];
		opener.document.getElementById("na").value=strar[55];
		opener.document.getElementById("na1").value=strar[56];
		opener.document.getElementById("na2").value=strar[57];
		opener.document.getElementById("na3").value=strar[58];
		opener.document.getElementById("na4").value=strar[59];
		opener.document.getElementById("sur_notes").innerHTML=strar[60];
		opener.document.getElementById("op_find").innerHTML=strar[61];
		opener.document.getElementById("an_notes").innerHTML=strar[62];
		opener.document.getElementById("op_dt").value=strar[63];
		opener.document.getElementById("sttime").value=strar[64];
		opener.document.getElementById("endtime").value=strar[65];
		opener.document.getElementById("ot").innerHTML=strar[72];
		opener.document.getElementById("stime1").value=strar[67];
		opener.document.getElementById("etime1").value=strar[68];
		opener.document.getElementById("ot_cost").value=strar[77];
		
		//opener.document.getElementById("ot_cost").checked=true;
		}else{
		
		opener.document.getElementById("pod").innerHTML=" ";
		opener.document.getElementById("post_od").innerHTML=" ";
		opener.document.getElementById("pd").innerHTML=" ";
		opener.document.getElementById("sur_na").value=" ";
		opener.document.getElementById("ncs").value=" ";
		opener.document.getElementById("na").value=" ";
		opener.document.getElementById("na1").value=" ";
		opener.document.getElementById("na2").value=" ";
		opener.document.getElementById("na3").value=" ";
		opener.document.getElementById("na4").value=" ";
		opener.document.getElementById("ot_cost").value="0";
		//opener.document.getElementById("ot_cost").checked=true;
		opener.document.getElementById("sur_notes").innerHTML=" ";
		opener.document.getElementById("op_find").innerHTML=" ";
		opener.document.getElementById("an_notes").innerHTML=" ";
		}
		if(sd2==1){
		opener.document.getElementById("Review").value=strar[72];
		opener.document.getElementById("treating").value=strar[73];
		opener.document.getElementById("tg").value=strar[77];
		}else{
		opener.document.getElementById("Review").value=" ";
		opener.document.getElementById("treating").value=" ";
		}
		
		/////////////Birth Certificate///////////////
		//alert(bc);
		if(bc==0)
		{
		opener.document.getElementById("main_div").style.display='none';
		opener.document.getElementById("div2").style.display='';
		opener.document.getElementById("div2").innerHTML="<font color='#F04E00' size='2'>No Records </font>";
		}
		 if(bc>1){
	
		opener.document.getElementById("wife").value=strar[78];
		opener.document.getElementById("motaddress").innerHTML=strar[4];
		opener.document.getElementById("po").value=strar[79];
		opener.document.getElementById("ps").value=strar[80];
		opener.document.getElementById("Dist").value=strar[81];
		opener.document.getElementById("weight").value=strar[100];
		
		if(strar[83]=="lscs"){
			opener.document.getElementById("delby1").checked=true;
			opener.document.getElementById("delby2").checked=false;
			 }else{
			opener.document.getElementById("delby1").checked=false;
			opener.document.getElementById("delby2").checked=true;
			 } 
			
			 if(strar[84]=="Female"){
			opener.document.getElementById("Female").checked=true;
			opener.document.getElementById("Male").checked=false;
			 }else{
			opener.document.getElementById("Female").checked=false;
			opener.document.getElementById("Male").checked=true;
			 } 
			
		opener.document.getElementById("BirthDate").value=strar[84];
				
		}else{
		
		opener.document.getElementById("wife").value=" ";
		opener.document.getElementById("motaddress").innerHTML=strar[4];
		opener.document.getElementById("po").value=" ";
		opener.document.getElementById("ps").value=" ";
		opener.document.getElementById("Dist").value=" ";
		
		}
		/////////////for Death Certificate///////////////
		//alert(deathc);
		if(deathc>0){
		opener.document.getElementById("Religion").value=strar[86];
		opener.document.getElementById("Nationality").value=strar[87];
		
		if(strar[89]=="M"){
	
			opener.document.getElementById("M").checked=true;
			opener.document.getElementById("U").checked=false;
			 }else{
			
			opener.document.getElementById("M").checked=false;
			opener.document.getElementById("U").checked=true;
			 } 	
		opener.document.getElementById("ps1").value=strar[89];
		opener.document.getElementById("dodeath").value=strar[90];
		opener.document.getElementById("doadmit").value=strar[98];
		opener.document.getElementById("Disease").innerHTML=strar[91];
		opener.document.getElementById("cofdeath").innerHTML=strar[92];
		opener.document.getElementById("nameofrec").value=strar[93];
		opener.document.getElementById("MO").value=strar[94];
		opener.document.getElementById("Reciver").value=strar[95];
		opener.document.getElementById("phnorec").value=strar[96];
		opener.document.getElementById("dateofrec").value=strar[97];
		
		}else{
		
		opener.document.getElementById("Religion").value=" ";
		opener.document.getElementById("Nationality").value=" ";
		opener.document.getElementById("ps1").value=" ";
		opener.document.getElementById("doadmit").value=strar[102];
		opener.document.getElementById("Disease").innerHTML=" ";
		opener.document.getElementById("cofdeath").innerHTML=" ";
		opener.document.getElementById("nameofrec").value=" ";
		opener.document.getElementById("MO").value=" ";;
		opener.document.getElementById("Reciver").value=" ";
		opener.document.getElementById("phnorec").value=" ";
		}
		///////////////////for whose patient in ot table////////////
				
		//opener.document.getElementById('tr1').style.display='none';
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

	
                       <form name="docpat" method="post" >
           
                
<table width="70%" cellspacing="2">

<tr><td></td><td>Search By Patient Name : <input type="text" name="name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>

<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<thead>
    <tr>
      <th class="TH1"><div align="center">Patient Reg No </div></th>
        <th class="TH1">Patient Name</th>
          
    </tr>
  </thead>
<?php 
			  include("config.php");
			  
			   if(isset($_REQUEST['submit'])){
				$n=$_REQUEST['name'];
					
			    if($n != "")
				{
					$sq=mysqli_query($link,"select select distinct a.pat_regno,b.patientname,a.pat_no from ip_pat_admit as a,patientregister as b where a.pat_regno=b.registerno and upper(pat_type) like upper('IP%') and upper(dis_status) like upper('ADMITTED%') and b.patientname = '$n' group by a.pat_regno order by a.pat_regno desc ")or die(mysqli_error($link));
				}
			   if($sq)
			   {
			   $rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_NO'];
			  $h = $res['patientname'];
			  $r = $res['registerno'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/><?php echo $r ?></td><td><?php echo $h;?></td></tr>
             
				 <?php }
			 }
			 }
			 else{
				  $x="select distinct a.pat_regno,b.patientname,a.pat_no from ip_pat_admit as a,patientregister as b where a.pat_regno=b.registerno and upper(pat_type) like upper('IP%') and upper(dis_status) like upper('ADMITTED%') group by a.pat_regno order by a.pat_regno desc ";
				$sq=mysqli_query($link,$x)or die(mysqli_error($link));
				if($sq){	
				$rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['pat_no'];
			  $h = $res['patientname'];
			  $r = $res['pat_regno'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/><?php echo $r ?></td><td><?php echo $h;?></td></tr>
             <?php }
			 
			 }
			 }
			 ?></table>
			 <input type="hidden" name="c" value="<?php echo $rows ?>">
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