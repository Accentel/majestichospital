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

  function showDoc(cc,str){
	var row=document.docpat.rws.value;
	
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="critequip_popup1.php"
			  url=url+"?emp_id="+cc+"&rowid="+row+"&avl_qty="+str;
			 // alert(str);
			   xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	 }
			function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		 
		 var res=xmlHttp.responseText;
		 //alert(res);
		 var result=res.split("|");
		//alert(result[0]);
		//alert(result[1]);
		  var str=document.docpat.rws.value;
       
		opener.document.getElementById("bedside"+str).innerHTML=result[1];
		//opener.document.getElementById("qty"+str).value=result[0];
    	opener.document.getElementById("startdatetime"+str).focus();
		 window.close();
		  
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
<tr><td>Search By Product Name : <input type="text" name="name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>


<table width="400px" class="sortable"  id="TABLE1" align="center">
  <thead>
    <tr>
      <th class="TH1"><div align="center">Equipment Name </div></th>
      <th class="TH1">Cost</th>
     
<?php 
			  include("config.php");
			  $rowCount=$_REQUEST['rowCount']; 
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  
			  $sq = mysql_query("SELECT id,name,cost  FROM icu_equipment_mast where Upper(name)  like UPPER('$n')");
	
			  $i = 1;
			  if($sq){
			  $records=mysql_num_rows($sq);
			  while($res=mysql_fetch_array($sq)){
			 
			  
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $res[0] ?>" onclick="javascript:showDoc(<?php echo $res[0] ?>,<?php echo $res[2] ?>);"/><?php echo $res[1] ?></td><td><?php echo $res[2] ;?></td><td><?php echo $res[3] ;?></td></tr>
             <?php $i++;}
			 }
			 }else{ ?>
			 <?php
			 
			 $sq = mysql_query("SELECT id,name,cost  FROM icu_equipment_mast ");

			  $i = 1;
			  if($sq){
			  $records=mysql_num_rows($sq);
			  while($res=mysql_fetch_array($sq)){

			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $res[0] ?>" onclick="javascript:showDoc(<?php echo $res[0] ?>,<?php echo $res[2] ?>);"/><?php echo $res[1] ?></td><td><?php echo $res[2] ;?></td>
             <td><?php //echo $res[3] ;?></td></tr>
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