<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
	$aname = $_SESSION['name1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header.php");
	?>
    <div id="conteneur">

		  <?php include('logo.php'); ?>
			<?php
			include("main_menu.php");
			include("config.php");
			?>
<script>
function card_pop(b){
	
window.open('view_in_patient_admit1.php?adv_no='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>
<script>
function card_pop1(b){
	
window.open('view_in_patient_admit2.php?adv_no='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>
<script>
function card_pop2(b){
	
window.open('view_in_patient_admit3.php?adv_no='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>
<script>
function card_pop3(b){
	
window.open('view_in_patient_admit4.php?adv_no='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>
<script>
function card_pop4(b){
	
window.open('view_in_patient_admit5.php?adv_no='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>
<script>
function card_pop5(b){
	
window.open('bill_case1.php?patno='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>

<script>
function card_pop6(b){
	
window.open('view_in_patient_admit6.php?patno='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>
<script>
function card_pop7(b){
	
window.open('view_in_patient_admit7.php?patno='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

function card_pop8(b){
	
window.open('view_in_patient_admit10.php?patno='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>
<script>
function card_pop9(b){
	
window.open('nurse_chart.php?patno='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>

<script>
function card_pop10(b){
	
window.open('nurse_note.php?patno='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>

<script>
function card_pop11(b){
	
window.open('pharmacycard1.php?patno='+b+'','mywindow','width=700,height=500,toolbar=no,menubar=no');
	}

</script>
	
	</head>

	<body>
	
	<?php /*?><div id="conteneur" >
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
	<?php
			include("main_menu.php");
			?><?php */?>
		  
		

<?php 
$id=$_REQUEST['id'];
$sq=mysqli_query($link,"select * from patientregister where reg_id='$id'")or die(mysqli_error($link));
while($r=mysqli_fetch_array($sq)){
$reg=$r['registerno'];	
$patientname=$r['patientname'];
$phone=$r['phoneno'];
$age=$r['age'];
$gender=$r['gender'];
$addr=$r['address'];
$previous1=$r['previous'];
$ref_from1=$r['ref_from'];
$arrival_mode1=$r['arrival_mode'];
	
}
?>

		  <div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">EDIT CASESHEET DETAILS </h1>
          
                 <table align="center">
    
            

<tr><td colspan="2" width="400"></td>
<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='pat_det1.php'"/></td></tr></table>

                
<table width="100%" >

<tr>

<td class="" align="left"><strong>Patient UMR No. <font color="red">*</font> : <?php echo $reg?></strong></td>


</tr>
</table><table width="50%" border="1px">
<tr><th>Patient Details</th><td><a onclick="javascript:card_pop('<?php echo $reg?>')"><img src="images/print.png" /></a></td></tr> 
       
       <tr><th>Initial Assessment Sheet</th><td>
     <?php   $qs=mysqli_query($link,"select * from `caseshhet_initial1` where mrno='$reg'")or die(mysqli_error($link));
			while($r=mysqli_fetch_array($qs)){
			$rnum1=$r['mrno'];
			}
			if($rnum1!=''){
			?>
       <a onclick="javascript:card_pop1('<?php echo $reg?>')"><img src="images/print.png" /></a>
       <?php } else {?>No Data Entry<?php }?>
       </td></tr>
      
      
       <tr><th>Admission Record</th><td>
       <?php   $qs=mysqli_query($link,"select * from `casesheet_admission` where mrnum='$reg'")or die(mysqli_error($link));
			while($r=mysqli_fetch_array($qs)){
			$rnum2=$r['mrnum'];
			}
			if($rnum2!=''){
			?>
       <a onclick="javascript:card_pop2('<?php echo $reg?>')"><img src="images/print.png" /></a>
       <?php } else {?>No Data Entry<?php }?>
       
       
      </td></tr>
        <tr><th>Clinical Finding</th><td>
        
        <?php   $qs=mysqli_query($link,"select * from `casesheet_clicnic` where mrnum='$reg'")or die(mysqli_error($link));
			while($r=mysqli_fetch_array($qs)){
			$rnum3=$r['mrnum'];
			}
			if($rnum3!=''){
			?>
       <a onclick="javascript:card_pop3('<?php echo $reg?>')"><img src="images/print.png" /></a>
       <?php } else {?>No Data Entry<?php }?>
       </td></tr>
      <tr><th>Activity Chart</th><td>
        <?php   $qs=mysqli_query($link,"select * from `casesheet_activity` where mrnum='$reg'")or die(mysqli_error($link));
			while($r=mysqli_fetch_array($qs)){
			$rnum4=$r['mrnum'];
			}
			if($rnum4!=''){
			?>
       <a onclick="javascript:card_pop4('<?php echo $reg?>')"><img src="images/print.png" /></a>
       <?php } else {?>No Data Entry<?php }?>
       </td>
      
     </tr>
     
     
      <tr><th>Sugar Chart</th><td>
        <?php   $qs=mysqli_query($link,"select * from `casesheet_sugarchart` where pat_regno='$reg'")or die(mysqli_error($link));
			while($r=mysqli_fetch_array($qs)){
			$rnum4=$r['pat_regno'];
			}
			if($rnum4!=''){
			?>
       <a onclick="javascript:card_pop8('<?php echo $reg?>')"><img src="images/print.png" /></a>
       <?php } else {?>No Data Entry<?php }?>
       </td>
      
     </tr>
     
     <tr><th>Nurses  Chart</th><td>
     <?php   $qs=mysqli_query($link,"select * from nursechart where mrno='$reg'")or die(mysqli_error($link));
			while($r=mysqli_fetch_array($qs)){
			$rnum4=$r['mrno'];
			}
			if($rnum4!=''){
			?>
        <a onclick="javascript:card_pop9('<?php echo $reg?>')"><img src="images/print.png" /></a>
       <?php } else {?>No Data Entry<?php }?>
      
       </td>
      
     </tr>
      <tr><th>Nurses  Note</th><td>
      <?php   $qs=mysqli_query($link,"select * from nursenote where mrno='$reg'")or die(mysqli_error($link));
			while($r=mysqli_fetch_array($qs)){
			$rnum4=$r['mrno'];
			}
			if($rnum4!=''){
			?>
        <a onclick="javascript:card_pop10('<?php echo $reg?>')"><img src="images/print.png" /></a>
       <?php } else {?>No Data Entry<?php }?>
       
       </td>
      
     </tr>
      <tr><th>Pharmacy Card</th><td>
     
      <?php   $qs=mysqli_query($link,"select * from pharmacycard where mrno='$reg'")or die(mysqli_error($link));
			while($r=mysqli_fetch_array($qs)){
			$rnum4=$r['mrno'];
			}
			if($rnum4!=''){
			?>
        <a onclick="javascript:card_pop11('<?php echo $reg?>')"><img src="images/print.png" /></a>
       <?php } else {?>No Data Entry<?php }?>
       </td>
      
     </tr>
      <tr><th>IP Room Transfer</th><td>
        <?php   $qs=mysqli_query($link,"select * from ip_pat_bed where pat_regno='$reg'")or die(mysqli_error($link));
			while($r=mysqli_fetch_array($qs)){
			$rnum6=$r['pat_regno'];
			}
			if($rnum6!=''){
			?>
       <a onclick="javascript:card_pop8('<?php echo $reg?>')"><img src="images/print.png" /></a>
       <?php } else {?>No Data Entry<?php }?>
       </td>
      
     </tr>
                
     <tr><th>Diagnostics</th><td><a onclick="javascript:card_pop5('<?php echo $reg?>')"><img src="images/print.png" /></a></td></tr>
      
      
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

header('Location:login.php');

}

?>