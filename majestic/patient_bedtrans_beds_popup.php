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
	</head>
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
	 	  alert("Please select Bed No");
	  return false;
  }
  return true
}
  function showDoc(){
	 var c=document.docpat.c.value;
	// alert("c val -->"+c);
	 if(c == 1){
		 var cc=document.docpat.empid.value;
 //alert("cc val -->"+cc);
		var selected=false;
        if (document.docpat.empid.checked){selected=true;}   
  
  if( !(selected) ){
	
	  alert("Please select Bed No");
	  return false;
  }
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="patient_bedtrans_beds_popup1.php"
			  url=url+"?emp_id="+cc;
                
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	 }
			  if( c != 1){

	 if(validate()){
		   
		  for (var i=0; i < document.docpat.empid.length; i++){
			  if(document.docpat.empid[i].checked){
				  var emp_value = document.docpat.empid[i].value;
// alert("in c not 1"+emp_value);
			  }
		  }
		  xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="patient_bedtrans_beds_popup1.php"
			  url=url+"?emp_id="+emp_value;
     			
			  xmlHttp.onreadystatechange=stateChanged 

				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	  }
  }
  }
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
//alert(showdata)
		  var strar = trim(showdata).split(":");

		  if(strar.length>0){
			 // window.opener.location.reload();
			 //window.location.reload(); 
		//alert(strar[1]+"---"+strar[2]);
			  opener.document.getElementById("tr_beds_no").value=strar[1];
			  opener.document.getElementById("tr_rooms_no").value=strar[2];
			 // opener.document.getElementById("roomrents").value=strar[3];
			

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

	<body>

	
          
          
<form name="docpat" method="post" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Bed No. : <input type="text" name="name" id="name"  /></td>
<td>Search By Room No. : <input type="text" name="rno" id="rno"  /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>


<table width="400px" class="sortable"  id="TABLE1" align="center">
  <thead>
    <tr>
      <th class="TH1"><div align="center">Bed No.</div></th>
      <th class="TH1">Room No.</th>
     <th class="TH1">Room Rent</th>
<?php 
			  include("config.php");
			  $rowCount=$_REQUEST['rowCount']; 
			   if(isset($_REQUEST['submit'])){
				$n=$_REQUEST['name'];
				$r=$_REQUEST['rno'];
				if($r1!="" && $n!=""){
				$sq = mysql_query("select a.BED_NO, a.ROOM_NO,ROOM_FEE from bed_details as a,room_tariff as b where a.ROOM_no= b.room_no and BED_STATUS='Unreserved' and a.ROOM_NO='$r' and a.BED_NO='$n'");
				
				}
				elseif($r1!=""){
				$sq = mysql_query("select a.BED_NO, a.ROOM_NO,ROOM_FEE from bed_details as a,room_tariff as b where a.ROOM_no= b.room_no and BED_STATUS='Unreserved' and a.ROOM_NO='$r'");
				
				}elseif($n!=""){
				$sq = mysql_query("select a.BED_NO, a.ROOM_NO,ROOM_FEE from bed_details as a,room_tariff as b where a.ROOM_no= b.room_no and BED_STATUS='Unreserved' and a.BED_NO='$n'");
				}
			  $i = 1;
			  if($sq){
			  $records=mysql_num_rows($sq);
			  while($res=mysql_fetch_array($sq)){
			 
			  
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $res[0] ?>" onclick="javascript:showDoc();"/><?php echo $res[0] ?></td><td><?php echo $res[1] ;?></td><td><?php echo $res[2] ;?></td></tr>
             <?php $i++;}
			 }
			 }else{ ?>
			 <?php
			 
			 $sq = mysql_query("select a.BED_NO, a.ROOM_NO,ROOM_FEE from bed_details as a,room_tariff as b where a.ROOM_no= b.room_no and BED_STATUS='Unreserved'");
	 
			  
			  $i = 1;
			  if($sq){
			  $records=mysql_num_rows($sq);
			  while($res=mysql_fetch_array($sq)){

			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $res[0] ?>" onclick="javascript:showDoc();"/><?php echo $res[0] ?></td><td><?php echo $res[1] ;?></td><td><?php echo $res[2] ;?></td></tr>
             <?php $i++;}
			 }
			 }
			 ?></table>
			 <input type="hidden" name="c" value="<?php echo $records ?>">
              <?php if($records==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<input type="hidden" name="rowCount" value="<?php echo $rowCount ?>">      
<input type="hidden" name="rws" value="<?php echo $rowCount ?>">              


 </form>
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