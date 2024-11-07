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
	 	  alert("Please select Supplier Code");
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
	
	  alert("Please select Supplier Code");
	  return false;
  }
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="purchase_inv_popup1.php"
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
			  var url="purchase_inv_popup1.php"
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
			  opener.document.getElementById("supcode").value=strar[1];
			  opener.document.getElementById("supname").value=strar[2];
			  opener.document.getElementById("addr").value=strar[3];
			  opener.document.getElementById("city").value=strar[4];
			

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
<tr><td>Search By Supplier Name : <input type="text" name="name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>

<table border="0" cellpadding="2" cellspacing="2">
<tr><!--<td width="68" class="label1"><a href="add_supplier_info.php" title="Add New Record"><img src="images/add1.gif"></a>--></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="TABLE1" style="font-size:14px;">
<tr height="25px"><TH>SUPPLIER CODE</TH><TH>SUPPLIER NAME</TH></tr>
<?php 
			  include("config.php");
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  
			  $sq = mysqli_query($link,"select suppl_code,suppl_name,addr1,city from phr_supplier_mast WHERE status='Y' and suppl_name = '$n'")or die(mysqli_error($link));
				$records=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $sc = $res['suppl_code'];
			  $sn=$res['suppl_name'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $sc ?>" onclick="javascript:showDoc();"/></td><td><?php echo $sc;?></td><td><?php echo $sn;?></td></tr>
             <?php $i++;}
			 }
			 }else{ ?>
			 <?php
			 
			 $sq = mysqli_query($link,"select suppl_code,suppl_name,addr1,city from phr_supplier_mast WHERE status='Y' ORDER BY suppl_name ")or die(mysqli_error($link));
	 
			  $records=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $sc = $res['suppl_code'];
			  $sn=$res['suppl_name'];
			  
			  
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $sc ?>" onclick="javascript:showDoc();"/><?php echo $sc;?></td><td><?php echo $sn;?></td></tr>
             <?php $i++;}
			 }
			 }
			 ?></table>
			 <input type="hidden" name="c" value="<?php echo $records ?>">
              <?php if($records==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>


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