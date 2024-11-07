<?php include('config.php');

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
	document.getElementById("doctor").value=strar[9];
	document.getElementById("packagename").value=strar[10];
	document.getElementById("ptotal").value=strar[11];
	document.getElementById("total").value=strar[12];
	document.getElementById("ntotal").value=strar[13];
	document.getElementById("paid").value=strar[14];
	document.getElementById("bal").value=strar[15];
	document.getElementById("phone").value=strar[16];
	
	showUser(str)
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search666.php?q="+str,true);
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
	$id=$_GET['id'];
	$q=mysqli_query($link,"select * from prefund where id='$id'") or die(mysqli_error($link));
	$r1=mysqli_fetch_array($q);
	$umrno=$r1['umrno'];
	$patno=$r1['patno'];
	$pname=$r1['pname'];
	$fname=$r1['fname'];
	$age=$r1['age'];
	$sex=$r1['sex'];
	$pkg_name=$r1['pkg_name'];
	$address=$r1['address'];
	$consultname=$r1['consultname'];
	$pkg_amount=$r1['pkg_amount'];
	$total=$r1['total'];
	$nettotal=$r1['nettotal'];
	$paid=$r1['paid'];
	$bal=$r1['bal'];
	$refund=$r1['refund'];
	$phone=$r1['phone'];
	$admitdate=$r1['admitdate'];
	$dischargedate=$r1['dischargedate'];
	$paymenttype=$r1['paymenttype'];
	?>
		  <div id="centre" style="height:auto">
          <h1 style="color:red;" align="center">Package Refund Amount</h1>
          
           <form name="form" method="post" action="update_prefund.php">
<table width="90%" cellspacing="10">

<tr>
<td class="label1">UMR.NO <font color="red">*</font> : </td>
<td><input name="mrno"  type="text" class="text mrno"  id="mrno"  value="<?php echo $umrno; ?>" /></td>
<td class="label1">Pat.No <font color="red">*</font> : </td>
<td width="10%"><input type="text" required="required" name="patno" class="text" id="patno" width="90%" value="<?php echo $patno; ?>"/>

<input type="hidden" required="required" name="user" class="text" id="user" value="<?php echo $_SESSION['name1'];?>"  "/>
</td>
</tr>

<tr>
<td class="label1">Name of the Patient <font color="red">*</font> : </td>
<td><input type="text" required="required" name="patname" id="patname" class="text"  value="<?php echo $pname; ?>"/></td>
<td class="label1">Father Name <font color="red">*</font> : </td>
<td><input type="text" required="required" name="fname" id="relation" class="text"  value="<?php echo $fname; ?>"/></td>
</tr>

<tr>
<td class="label1">Age <font color="red">*</font> : </td>
<td><input type="text" name="age" id="age" required="required"  class="text"  value="<?php echo $age; ?>"/>


</td>
<td class="label1">Sex <font color="red">*</font> : </td>
<td><input type="text" name="sex" required="required" id="sex" class="text"   value="<?php echo $sex; ?>"/></td>
</tr>

<tr>
<td class="label1">Date of Admission : </td>
<td><input type="text" name="admit" id="admit" class="text"  value="<?php echo $admitdate; ?>"/></td>
<td class="label1">Date of Discharge <font color="red">*</font> : </td>
<td><input type="text" name="discharge" required="required" id="discharge" class="text" value="<?php echo $dischargedate; ?>" /></td>
</tr>
<tr>
<td class="label1">Package Name : </td>
<td><input type="text" name="packagename" id="packagename" class="text" value="<?php echo $pkg_name; ?>" /></td>
<td class="label1">Phone No : </td>
<td><input type="text" name="phone" id="phone" class="text"  value="<?php echo $phone; ?>"/></td>
</tr>
<!--<tr>
<td class="label1">Date of Surgery : </td>
<td><input type="text" name="surgery" id="surgery" class="text"/></td>
<td class="label1">Ward <font color="red">*</font> : </td>
<td><input type="text" name="ward" required="required" id="ward" class="text"/></td>
</tr>-->
<tr>
<td class="label1">Address : </td>


<td><textarea name="addr" id="addr" cols="34" rows="4"/><?php echo $address; ?> </textarea></td>
<td class="label1">Consultant Name</td><td><textarea name="doctor" id="doctor" cols="34" rows="4"/><?php echo $consultname; ?></textarea></td>
</tr>
    

<tr>

<td>Package Total</td>
<td><input type="text" name="ptotal" id="ptotal" value="<?php echo $pkg_amount; ?>"/></td>
</tr>
<tr>

<td>Extra Service </td>
<td><input type="text" name="etotal" id="total"  value="<?php echo $total; ?>"/></td>
</tr>

<tr>

<td>Net Total</td>
<td><input type="text" name="ntotal" id="ntotal"  value="<?php echo $nettotal; ?>"/></td>
</tr>
<tr>

<td>Paid</td>
<td><input type="text" name="paid" id="paid"  value="<?php echo $paid; ?>"/></td>
</tr>
<tr>

<td>Balance</td>
<td><input type="text" name="bal" id="bal"  value="<?php echo $bal; ?>"/></td>
</tr>
<tr>

<td>Refund</td>
<td><input type="text" name="refund" id="refund"  value="<?php echo $refund; ?>"/></td>
</tr>
<tr>

<td align="right" >Payment Type:</td>
                        <td align="left" >
                            <select name="paymenttype"  id="paymenttype">
							<option value="cash" <?php if($paymenttype=="cash"){echo 'selected';} ?>>cash</option>
							<option value="card" <?php if($paymenttype=="card"){echo 'selected';} ?>>card</option>
							</select>
                        </td>
</tr>

	  
<tr>

<td colspan="4" align="center"><!--<input type="submit" name="submit" value="Save" class="butt"/>&nbsp;--><input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='prefundamountlist.php'"/></td>

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
    data +="<input type='checkbox' class='case'/><select class='text' id='mtype"+i+"' data-row='"+i+"' name='mtype[]'> <option value=''>Select Type</option><?php $sq=mysqli_query('select * from phr_prdtype_mast');while($r=mysqli_fetch_array($sq)){?><option value='<?php echo $r['PRDTYPE_NAME']?>'><?php echo $r['PRDTYPE_NAME']?></option><?php }?></select><input type='text' class='text print-type10' id='pname"+i+"' data-row='"+i+"' name='pname[]' placeholder='Drug Name'/><input type='text' class=' ' id='generic"+i+"' data-row='"+i+"' name='generic[]' placeholder='Generic' style='width:90px;'/><input type='text' class=' ' id='dtime"+i+"' data-row='"+i+"' name='dtime[]' placeholder='Dosage Time' style='width:90px;'/><input type='text' class=' ' id='dadmin"+i+"' data-row='"+i+"' name='dadmin[]' placeholder='Route ' style='width:90px;'/><input type='text'  id='Days"+i+"' data-row='"+i+"' name='Days[]' placeholder='Days' style='width:50px;'/><input type='text'  id='qty"+i+"' data-row='"+i+"' name='qty[]' placeholder='Quantity' style='width:50px;'/><input type='text'  id='indication"+i+"' data-row='"+i+"' name='indication[]' placeholder='indication' style='width:90px;'/>";
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





$(document).ready (function(){ 
$(".txt").each(function(){
$(this).keyup(function(){
calculateSum()
;})
});
});


function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value)
;}});
var t=$("#total").val();
var d=$("#disc").val();

var b=parseFloat(t)-parseFloat(d);

$("#ntotal").val(b.toFixed(2));
var n=$("#ntotal").val();
var p=$("#paid").val();
ba=parseFloat(b)-parseFloat(p);
//alert(ba);
$("#bal").val(ba.toFixed(2));

;}
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