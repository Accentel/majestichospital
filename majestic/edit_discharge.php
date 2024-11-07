<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
$name=$_SESSION['name1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header.php");
	?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type='text/javascript' src="js/jquery.autocomplete.js"></script>
    <link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
		<script>
$().ready(function() {
	$("#mrno").autocomplete("set29.php", {
		width: 180,
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
<script>
function showHint52(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("patno").value=strar[1];
	
	document.getElementById("patname").value=strar[2];
	document.getElementById("relation").value=strar[3];
	document.getElementById("age").value=strar[4];
	document.getElementById("sex").value=strar[5];
	document.getElementById("admit").value=strar[6];
	document.getElementById("discharge").value=strar[7];
	document.getElementById("addr").value=strar[8];
//	document.getElementById("doctor").value=strar[9];
	//showUser(str)
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search66.php?q="+str,true);
xmlhttp.send();
}

 
</script>
	</head>

	<body>

	<div id="conteneur">

	 <?php include('logo.php'); ?>
	<?php
		include("main_menu.php");
	?>
		  
	<?php
ob_start();
include("config.php");
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$mrno=$_POST['mrno'];
$patno=$_POST['patno'];
$patname=$_POST['patname'];
$relation=$_POST['relation'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$admit1=$_POST['admit'];
$admit=date('Y-m-d',strtotime($admit1));
$discharge1=$_POST['discharge'];
$discharge=date('Y-m-d',strtotime($discharge1));
$dno=$_POST['dno'];
$doctor=$_POST['doctor'];

$finaldiagnosis=$_POST['finaldiagnosis'];
$acondition=$_POST['acondition'];
$temp=$_POST['temp'];
$pr=$_POST['pr'];
$bp=$_POST['bp'];
$hl=$_POST['hl'];
$pa=$_POST['pa'];
$phistory=$_POST['phistory'];
$laboratory=$_POST['laboratory'];
$operativenotes=$_POST['operativenotes'];
$dtemp=$_POST['dtemp'];
$dgc=$_POST['dgc'];
$dbp=$_POST['dbp'];
$dpa=$_POST['dpa'];
$disadvice=$_POST['disadvice'];
$review=$_POST['review'];
$dothers=$_POST['dothers'];
$user=$name;
$id2=$_POST['id2'];

$sq="update  adddischarge set mrno='$mrno',patno='$patno',pname='$patname',relation='$relation',age='$age',sex='$sex',
dno='$dno',admit='$admit',discharge='$discharge',doctor='$doctor',diagnosis='$finaldiagnosis',acondition='$acondition',
temp='$temp',bp='$bp',pr='$pr',hl='$hl',pa='$pa',phistory='$phistory',laboratory='$laboratory',operativenotes='$operativenotes',
dtemp='$dtemp',dgc='$dgc',dbp='$dbp',dpa='$dpa',disadvice='$disadvice',review='$review',dothers='$dothers',user='$user' where id='$id2' ";
$res=mysqli_query($link,$sq) or die(mysqli_error($link)); 
//$id=mysql_insert_id();

if($res){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='discharge_view.php'";
			print "</script>";
}

}else{
	$id=$_REQUEST['id'];
	$q="select * from adddischarge where id='$id'";
	$k=mysqli_query($link,$q) or die(mysqli_error($link));
	$row=mysqli_fetch_array($k);
	$id2=$row['id'];
	$mrno=$row['mrno'];
$patno=$row['patno'];
$patname=$row['pname'];
$relation=$row['relation'];
$age=$row['age'];
$sex=$row['sex'];
$admit1=$row['admit'];
$admit=date('Y-m-d',strtotime($admit1));
$discharge1=$row['discharge'];
$discharge=date('Y-m-d',strtotime($discharge1));
$dno=$row['dno'];
$finaldiagnosis=$row['diagnosis'];
$acondition=$row['acondition'];
$temp=$row['temp'];
$doctor=$row['doctor'];
$bp=$row['bp'];
$pr=$row['pr'];
$hl=$row['hl'];
$pa=$row['pa'];
$bp=$row['bp'];
$bp1=$row['bp1'];
$phistory=$row['phistory'];
$laboratory=$row['laboratory'];
$operativenotes=$row['operativenotes'];
$dtemp=$row['dtemp'];
$dgc=$row['dgc'];
$dbp=$row['dbp'];
$dpa=$row['dpa'];
$disadvice=$row['disadvice'];
$review=$row['review'];

	}
?>
<?php
ob_get_flush();
?>


		  <div id="centre" style="height:auto">
          <h1 style="color:red;" align="center">Discharge Summary</h1>
          
            <form name="form" method="post" action="">
<table width="90%" cellspacing="10">

<tr>
<td class="label1">UMR.NO <font color="red">*</font> : </td>
<td><input name="mrno"  type="text" class="text mrno"  id="mrno" value="<?php echo $mrno ?>"   onchange="showHint52()"/></td>
<td class="label1">Pat.No <font color="red">*</font> : </td>
<td width="10%"><input type="text" required="required" name="patno"  value="<?php echo $patno ?>" class="text" id="patno" width="90%" />
<input type="hidden"  name="id2"  value="<?php echo $id2 ?>" class="text" id="id2" width="90%" />
</td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">Name of the Patient <font color="red">*</font> : </td>
<td><input type="text" required="required" name="patname" id="patname" value="<?php echo $patname ?>" class="text"/></td>
<td class="label1">Father Name <font color="red">*</font> : </td>
<td><input type="text" required="required" name="relation" id="relation" value="<?php echo $relation ?>" class="text" /></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">Age <font color="red">*</font> : </td>
<td><input type="text" name="age" id="age" required="required" value="<?php echo $age ?>"  style="width:90px;"/>
<input type="text" name="sex" id="sex" required="required" value="<?php echo $sex ?>"  style="width:90px;"/>

</td>
<td class="label1">D.No <font color="red">*</font> : </td>
<td><input type="text" name="dno" value="<?php echo $dno ?>"  id="dno" class="text" /></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">Date of Admission : </td>
<td><input type="text" name="admit" id="admit" value="<?php echo $admit ?>" class="text"/></td>
<td class="label1">Date of Discharge <font color="red">*</font> : </td>
<td><input type="text" name="discharge" value="<?php echo $discharge ?>" required="required" id="discharge" class="text"/></td>
</tr>
<tr style="height:8px;"></tr>

<tr>
<td class="label1">Treating Doctor</td>
<td><select name="doctor" id="doctor" >
    <option value="">Select Doctor</option>
    <?php
    $m=mysqli_query($link,"select * from doct_infor") or die(mysqli_error($link));
    while($m1=mysqli_fetch_array($m)){
    ?>
    <option value="<?php echo $m1['dname1'] ?>" <?php if($row['doctor']==$m1['dname1']){ echo 'selected';} ?>><?php echo $m1['dname1'] ?></option>
    <?php }?>
    </select>
</td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">Diagnosis<font color="red">*</font> : </td>
<td colspan="3"><textarea name="finaldiagnosis" id="finaldiagnosis" cols="114" rows="4"/><?php echo $finaldiagnosis ?></textarea></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">Condition At The Time of Admission<font color="red">*</font> : </td>
<td colspan="3"><textarea name="acondition" id="acondition" cols="114" rows="4"/><?php echo $acondition ?></textarea></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">O/E:Temp<font color="red">*</font> : </td>
<td ><input type="text" name="temp" id="temp" class="text" value="<?php echo $temp ?>"/></td>
<td class="label1">PR<font color="red">*</font> : </td>
<td ><input type="text" name="pr" id="pr" class="text" value="<?php echo $pr ?>"/></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">BP<font color="red">*</font> : </td>
<td ><input type="text" name="bp" id="bp" class="text" value="<?php echo $bp ?>"/></td>
<td class="label1">H/L<font color="red">*</font> : </td>
<td ><input type="text" name="hl" id="hl" class="text" value="<?php echo $hl ?>"/></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">P/A<font color="red">*</font> : </td>
<td ><input type="text" name="pa" id="pa" class="text" value="<?php echo $pa ?>"/></td>

</tr>
<tr style="height:8px;"></tr>

<tr>
<td class="label1"><label for="addr">Past History:</label></td>
<td colspan="3"> <textarea name="phistory" id="phistory" class="textarea1" cols="114" rows="4"><?php echo $phistory ?></textarea></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1"><label for="addr">Laboratory Investigations:</label></td>
<td colspan="3"> <textarea name="laboratory" id="laboratory" class="textarea1" cols="114" rows="4"><?php echo $laboratory ?></textarea></td>
</tr>
<tr style="height:8px;"></tr>



<tr>
							
							<td class="label1" ><label for="addr">Operative Notes :</label></td>
							<td colspan="3">  <textarea name="operativenotes" id="operativenotes" class="textarea1" cols="114" rows="4"><?php echo $operativenotes ?></textarea></td>
						</tr>
						<tr style="height:8px;"></tr>
						<tr><td colspan="4" align="center"><b>Condition at the time of discharge</b></td></tr>
<tr>
<td class="label1">Temp<font color="red">*</font> : </td>
<td ><input type="text" name="dtemp" id="dtemp" class="text" value="<?php echo $dtemp ?>"/></td>
<td class="label1">GC<font color="red">*</font> : </td>
<td ><input type="text" name="dgc" id="dgc" class="text" value="<?php echo $dgc ?>"/></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">BP<font color="red">*</font> : </td>
<td ><input type="text" name="dbp" id="dbp" class="text" value="<?php echo $dbp ?>"/></td>
<td class="label1">P/A<font color="red">*</font> : </td>
<td ><input type="text" name="dpa" id="dpa" class="text" value="<?php echo $dpa ?>"/></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
    <td></td>
<td><input type="text" name="dothers" class="text" value="<?php echo $dothers ?>"></td>

</tr>						
<tr style="height:8px;"></tr>						
						
<tr>
							
							<td class="label1" ><label for="addr">Advice at Discharge:</label></td>
							<td colspan="3">  <textarea name="disadvice" id="disadvice" class="textarea1" cols="114" rows="4"><?php echo $disadvice ?></textarea></td>
						</tr>						
						<tr style="height:8px;"></tr>
		<tr>
		    <td></td>
		    
		    <td colspan="3"><input type="text" name="review" value="<?php echo $review ?>"  class="text"/></td></tr>				
                        
                       
<tr>

<td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='discharge_view.php'"/></td>

</tr>
</table>
 </form>  
 <script>
/*$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
calculateTableSum(currentTable);
});*/

$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents(".form-group").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});


var i=2;
$(".addmore1").on('click',function(){
     
	var data ="<div class='form-group'>";
   
    data +="<div class='col-sm-12'>";          
    data +="<input type='checkbox' class='case'/><select class='text' id='mtype"+i+"' data-row='"+i+"' name='mtype[]'> <option value=''>Select Type</option><?php $sq=mysql_query('select * from phr_prdtype_mast');while($r=mysql_fetch_array($sq)){?><option value='<?php echo $r['PRDTYPE_NAME']?>'><?php echo $r['PRDTYPE_NAME']?></option><?php }?></select><input type='text' class='text print-type10' id='pname"+i+"' data-row='"+i+"' name='pname[]' placeholder='Drug Name'/><input type='text' class=' ' id='generic"+i+"' data-row='"+i+"' name='generic[]' placeholder='Generic' style='width:90px;'/><input type='text' class=' ' id='dtime"+i+"' data-row='"+i+"' name='dtime[]' placeholder='Dosage Time' style='width:90px;'/><input type='text' class=' ' id='dadmin"+i+"' data-row='"+i+"' name='dadmin[]' placeholder='Route ' style='width:90px;'/><input type='text'  id='Days"+i+"' data-row='"+i+"' name='Days[]' placeholder='Days' style='width:50px;'/><input type='text'  id='qty"+i+"' data-row='"+i+"' name='qty[]' placeholder='Quantity' style='width:50px;'/><input type='text'  id='indication"+i+"' data-row='"+i+"' name='indication[]' placeholder='indication' style='width:90px;'/>";
   data +="<input type='hidden' name='ksr[]' value='1'/>";
    data +="</div></div>";
	
	
	
	
	
	$('.osu1').append(data);
	i++;
});



function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
	
	
		
}
</script>       
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