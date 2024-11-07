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
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
		
<script>
function showHint52(str)
{
var str=document.getElementById("mrno").value;
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
	//document.getElementById("doctor").value=strar[9];
	showUser(str)
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search66.php?q="+str,true);
xmlhttp.send();
}


function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("labre").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","search31.php?q="+str,true);
  xmlhttp.send();
}



 $(document).on('click', '.print-type10', function(){
	// alert($(this).attr('data-row'));
	 $(".print-type10").autocomplete("set39.php", {
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
 $sq="INSERT INTO adddischarge(mrno,patno,pname,relation,age,sex,dno,admit,discharge,doctor,diagnosis,acondition,temp,bp,pr,hl,pa,phistory,laboratory,operativenotes,dtemp,dgc,dbp,dpa,disadvice,review,dothers,user)VALUES
('$mrno','$patno','$patname','$relation','$age','$sex','$dno','$admit','$discharge','$doctor','$finaldiagnosis','$acondition','$temp','$bp','$pr','$hl','$pa','$phistory','$laboratory','$operativenotes','$dtemp','$dgc','$dbp','$dpa','$disadvice','$review','$dothers','$user')";
$res=mysqli_query($link,$sq) or die(mysqli_error($link)); 
$id=mysqli_insert_id($link);
if($res){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='discharge_print.php?id=$id';";
			print "</script>";
}
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
<td><input name="mrno"  type="text" class="text mrno"  id="mrno"   onchange="showHint52()"/></td>
<td class="label1">Pat.No <font color="red">*</font> : </td>
<td width="10%"><input type="text" required="required" name="patno" class="text" id="patno" width="90%" /></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">Name of the Patient <font color="red">*</font> : </td>
<td><input type="text" required="required" name="patname" id="patname" class="text"/></td>
<td class="label1">Father Name <font color="red">*</font> : </td>
<td><input type="text" required="required" name="relation" id="relation" class="text" /></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">Age <font color="red">*</font> : </td>
<td><input type="text" name="age" id="age" required="required"  style="width:90px;"/>
<input type="text" name="sex" id="sex" required="required"  style="width:90px;"/>

</td>
<td class="label1">D.No <font color="red">*</font> : </td>
<td><input type="text" name="dno"  id="dno" class="text" /></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">Date of Admission : </td>
<td><input type="text" name="admit" id="admit" class="text"/></td>
<td class="label1">Date of Discharge <font color="red">*</font> : </td>
<td><input type="text" name="discharge" required="required" id="discharge" class="text"/></td>
</tr>
<tr style="height:8px;"></tr>
<!--<tr>
<td class="label1">Date of Surgery : </td>
<td><input type="text" name="surgery" id="surgery" class="text"/></td>
<td class="label1">Ward <font color="red">*</font> : </td>
<td><input type="text" name="ward" required="required" id="ward" class="text"/></td>
</tr>-->
<tr>
<td class="label1">Treating Doctor</td>
<td><select name="doctor" id="doctor" >
    <option value="">Select Doctor</option>
    <?php
    $m=mysqli_query($link,"select * from doct_infor") or die(mysqli_error($link));
    while($m1=mysqli_fetch_array($m)){
    ?>
    <option value="<?php echo $m1['dname1'] ?>"><?php echo $m1['dname1'] ?></option>
    <?php }?>
    </select>
</td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">Diagnosis<font color="red">*</font> : </td>
<td colspan="3"><textarea name="finaldiagnosis" id="finaldiagnosis" cols="114" rows="4"/></textarea></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">Condition At The Time of Admission<font color="red">*</font> : </td>
<td colspan="3"><textarea name="acondition" id="acondition" cols="114" rows="4"/></textarea></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">O/E:Temp<font color="red">*</font> : </td>
<td ><input type="text" name="temp" id="temp" class="text" /></td>
<td class="label1">PR<font color="red">*</font> : </td>
<td ><input type="text" name="pr" id="pr" class="text" /></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">BP<font color="red">*</font> : </td>
<td ><input type="text" name="bp" id="bp" class="text" /></td>
<td class="label1">H/L<font color="red">*</font> : </td>
<td ><input type="text" name="hl" id="hl" class="text" /></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">P/A<font color="red">*</font> : </td>
<td ><input type="text" name="pa" id="pa" class="text" /></td>

</tr>
<tr style="height:8px;"></tr>

<tr>
<td class="label1"><label for="addr">Past History:</label></td>
<td colspan="3"> <textarea name="phistory" id="phistory" class="textarea1" cols="114" rows="4"></textarea></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1"><label for="addr">Laboratory Investigations:</label></td>
<td colspan="3"> <textarea name="laboratory" id="laboratory" class="textarea1" cols="114" rows="4"></textarea></td>
</tr>
<tr style="height:8px;"></tr>



<tr>
							
							<td class="label1" ><label for="addr">Operative Notes :</label></td>
							<td colspan="3">  <textarea name="operativenotes" id="operativenotes" class="textarea1" cols="114" rows="4"></textarea></td>
						</tr>
						<tr style="height:8px;"></tr>
						<tr><td colspan="4" align="center"><b>Condition at the time of discharge</b></td></tr>
<tr>
<td class="label1">Temp<font color="red">*</font> : </td>
<td ><input type="text" name="dtemp" id="dtemp" class="text" /></td>
<td class="label1">GC<font color="red">*</font> : </td>
<td ><input type="text" name="dgc" id="dgc" class="text" /></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
<td class="label1">BP<font color="red">*</font> : </td>
<td ><input type="text" name="dbp" id="dbp" class="text" /></td>
<td class="label1">P/A<font color="red">*</font> : </td>
<td ><input type="text" name="dpa" id="dpa" class="text" /></td>
</tr>
<tr style="height:8px;"></tr>
<tr>
    <td></td>
<td><input type="text" name="dothers" class="text"></td>

</tr>						
<tr style="height:8px;"></tr>						
						
<tr>
							
							<td class="label1" ><label for="addr">Advice at Discharge:</label></td>
							<td colspan="3">  <textarea name="disadvice" id="disadvice" class="textarea1" cols="114" rows="4"></textarea></td>
						</tr>						
						<tr style="height:8px;"></tr>
		<tr>
		    <td></td>
		    
		    <td colspan="3"><input type="text" name="review" value="Review after one week for followup"  class="text"/></td></tr>				
                        
                       
<tr>

<td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='discharge_view.php'"/></td>

</tr>
</table>
 </form>   
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".mrno").autocomplete({
        source: "set109.php",
        minLength: 1
    });       

});

</script>
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