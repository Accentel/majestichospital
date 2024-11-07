<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$remainig_records = -1;//this is used from where the records should display
    $rowscounts = 0;        // if there is any records in next page it became >0 else rowscounts is 0 
    $tot=0;
    $m=0;
    $pagecount = 0;// it is used for page number
    $nd =10;//no of records per page
		/*view records*/
		//String no2=null;
    $no2=$_REQUEST['no'];
	if(!($no2==null) && !("0"==$no2)){$nd=$no2;}
		/*view records*/
    $pagecounter = "";
    $pagecounter = $_REQUEST['next'];
        if ($pagecounter != "") {
            $pagecount = $pagecounter;
        }
   
    $rowstart = ($pagecount * $nd);
    $rowend = ($rowstart + ($nd - 1));
    $records = 0;

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
 <script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#prd").autocomplete("set1.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script>	

	</head>

	<body>

	<div id="conteneur container">

		   <?php
				include("logo.php");
			  ?>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" style="height:490px;">
		  
			
         <h1>Doctor Service Details</h1>
                
					<div align="left" style="margin-bottom:2px;float:left;">
                     <a href="add_doct_service.php">
                    <img src="images/add1.gif">
                  <!-- <input type="button" class="butt" style="width:120px;height:35px;" value="Add"/>--></a></div>
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Service Name : 
                    
                    <input id=\"prd\" list=\"city1\" name="prd"  class="text"required >
<datalist id=\"city1\" >

<?php  include("config.php");
$sql="select distinct serv_name from doct_serv ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[serv_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
                    
                   <!-- <input type="text" class="text" name="prd" id="prd"/>-->
                    <input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;">
                     <!--<input type="submit" name="submit"
                    style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;"/--></div>
					</form>
		          <table border="0" cellpadding="0" cellspacing="0" class="expense_table" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
							  <th>Service Name</th>
                              <th>Service Amount</th>
                              <th>Edit</th>
							  <th>Delete</th>
                          </tr>
						  <?php
						
							if(isset($_REQUEST['submit'])){
								
								$id = $_REQUEST['id'];
								$sql = mysqli_query($link,"select * from doct_serv where id='$id'")or die(mysqli_error($link));
							}else{
								$sql = mysqli_query($link,"select * from doct_serv ")or die(mysqli_error($link));
							}
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
								while($row = mysqli_fetch_array($sql)){
								$records++;
								$remainig_records = $remainig_records + 1;//0
								$rowscounts++;//1
								if ($rowstart <= $rowend && $remainig_records == $rowstart) {
									$rowstart++;
									$rowscounts = 0;
							?>	
						   <tr>
							  <td><?php echo $row['serv_name'] ?></td>
                              <td><?php echo $row['amount'] ?></td>
                              <td><a href="edit_doc_ser.php?id=<?php echo $row['id'] ?>"><img src="images/edit.gif"/></a></td>
							  <td><a onclick="return confirm('Are you sure you want to delete this item?');" href="delete_doct_serv.php?id=<?php echo $row['id'] ?>"><img src="images/Icon_Delete.png" height="18"/></a></td>
                          </tr>
						 <?php } } } } ?>
						 </tbody>	
				</table>
				 <table>
					<tr >
					   <td colspan="5"><?php if($rows<=0) {?><div align="right"><font color="#FF6600">No More Records</font> </div><?php }?>
					   </td>
					</tr> 
                   </table> 
				   <table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody><tr>
					<td width="813">&nbsp;</td>
					<td align="left" width="34"></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a href="servicelist.php?next=0" ><?php } ?><img src="images/first.gif" alt="First" border="0" ></a></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a  href="servicelist.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" border="0" ></a></td>
				   <td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="servicelist.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" alt="Next" border="0" ></a></td>
					<td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="servicelist.php?next=<?php echo (($records - 1) / $nd) ?>"><?php } ?><img src="images/last.gif" alt="Last" border="0" ></a></td>
				  </tr>
				</tbody>
				</table>
				<table>
				<?php if ($rowscounts == 0) { ?>
					   <div align="right"><font color="#FF6600">No More Records</font> </div>
						
				<?php } ?>
				</table>		
			</div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>