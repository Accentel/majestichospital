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
	document.getElementById("pamount").value=strar[11];
	showUser(str)
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search666.php?q="+str,true);
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
	$mno=$_GET['id'];
	 $sql="SELECT a.pname_type,a.patientname,a.doctorname,a.gender,a.address,a.registerdate,a.gaurdianname,a.age,b.ADMIT_DATE,b.ADMIT_TIME,b.PAT_NO,b.pkg_type,b.pkg_amount FROM patientregister a,ip_pat_admit b WHERE a.registerno=b.PAT_REGNO and a.registerno = '$mno'";
	 $t=mysqli_query($link,$sql) or die(mysqli_error($link));
	$row=mysqli_fetch_array($t);
	$ad1=$row['ADMIT_DATE'];
	//$ad11=date('Y-m-d h:m:s')
	$dc1=date('Y-m-d');
	//$dc11=date('Y-m-d h:m:s');
	$dc=date('d-m-Y');
	$ad=date('d-m-Y',strtotime($row['ADMIT_DATE']));
	$patno= $row['PAT_NO'];
	$patientname= $row['patientname'];
	$gaurdianname= $row['gaurdianname'];
	$age= $row['age'];
	$gender= $row['gender'];
	$ad= $ad;
	$dc= $dc;
	$address= $row['address'];
	$doctorname= $row['doctorname'];  
	$pkg_type= $row['pkg_type'];
	$pkg_amount= $row['pkg_amount'];
	
	
	
	 $tu="select sum(amount)as a from daily_amount where mrnum='$mno' and date(date1) between '$ad1' and '$dc1'";
	$pt=mysqli_query($link,$tu)or die(mysqli_error($link));
	$pte=mysqli_fetch_array($pt);
	$pamount=$pte['a'];
	
	if($pamount > 0){
		$pamount=$pamount;
	}else{
		$pamount=0;
		
	}
	?>


		  <div id="centre" style="height:auto">
          <h1 style="color:red;" align="center">Package Final Summary</h1>
          
           <form name="form" method="post" action="insert_pfinalbill.php">
<table width="90%" cellspacing="10">

<tr>
<td class="label1">UMR.NO <font color="red">*</font> : </td>
<td><input name="mrno"  type="text" class="text mrno"  id="mrno"   value="<?php echo $mno; ?>"/></td>
<td class="label1">Pat.No <font color="red">*</font> : </td>
<td width="10%"><input type="text" required="required" name="patno" class="text" id="patno" width="90%"  value="<?php echo $patno; ?>"/>

<input type="hidden" required="required" name="user" class="text" id="user" width="90%"  value="<?php echo $_SESSION['name1']; ?>"/>

</td>
</tr>

<tr>
<td class="label1">Name of the Patient <font color="red">*</font> : </td>
<td><input type="text" required="required" name="patname" id="patname" class="text"  value="<?php echo $patientname; ?>"/></td>
<td class="label1">Father Name <font color="red">*</font> : </td>
<td><input type="text" required="required" name="fname" id="fname" class="text"  value="<?php echo $gaurdianname; ?>"/></td>
</tr>

<tr>
<td class="label1">Age <font color="red">*</font> : </td>
<td><input type="text" name="age" id="age" required="required"  class="text"  value="<?php echo $age; ?>"/>


</td>
<td class="label1">Sex <font color="red">*</font> : </td>
<td><input type="text" name="sex" required="required" id="sex" class="text"  value="<?php echo $gender; ?>" /></td>
</tr>

<tr>
<td class="label1">Date of Admission : </td>
<td><input type="text" name="admitdate" id="admitdate" class="text"  value="<?php echo $ad; ?>"/></td>
<td class="label1">Date of Discharge <font color="red">*</font> : </td>
<td><input type="text" name="discharge" required="required" id="discharge" class="text"  value="<?php echo $dc; ?>"/></td>
</tr>
<tr>
<td class="label1">Package Name : </td>
<td><input type="text" name="packagename" id="packagename" class="text"  value="<?php echo $pkg_type; ?>"/></td>

</tr>
<!--<tr>
<td class="label1">Date of Surgery : </td>
<td><input type="text" name="surgery" id="surgery" class="text"/></td>
<td class="label1">Ward <font color="red">*</font> : </td>
<td><input type="text" name="ward" required="required" id="ward" class="text"/></td>
</tr>-->
<tr>
<td class="label1">Address : </td>


<td><textarea name="addr" id="addr" cols="34" rows="4"/> <?php echo $address; ?></textarea></td>
<td class="label1">Consultant Name</td><td><textarea name="doctor" id="doctor" cols="34" rows="4"/><?php echo $doctorname; ?></textarea></td>
</tr>



                       



                        <tr>
                        
                        <td colspan="4" align="center">
                         <h1>Extra Services</h1>
                        </td>
                        
                        </tr>
<tr>
<th>S No</th>
<th>Date</th>
<th>Bill No</th>
<th>Total</th>
<th>Paid</th>
<th>Balance</th>
</tr>
<?php 
//echo $mno="<script>document.getElementById('mrno').value;</script>";
 $k="select * from packagebill where mrno='$mno' and BillDate between '$ad1' and '$dc1'";
$r=mysqli_query($link,$k) or die(mysqli_error($link));
$c=mysqli_num_rows($r);
if($c>0){
$i=1;
$total=0;
$bal=0;
$paid=0;

while($r1=mysqli_fetch_array($r)){
$total=$total+$r1['NetAmount'];
$bal=$bal+$r1['BalanceAmount'];
$paid=$paid+$r1['PaidAmount'];
?>
<tr>
<td><?php echo $i; ?></td>
<td><input type="hidden" name="bdate[]" value="<?php echo $r1['BillDate']; ?>"/><?php echo $r1['BillDate']; ?></td>
<td><input type="hidden" name="bno[]" value="<?php echo $r1['BillNO']; ?>"/><?php echo $r1['BillNO']; ?></td>
<td><input type="hidden" name="namt[]" value="<?php echo $r1['NetAmount']; ?>"/><?php echo $r1['NetAmount']; ?></td>
<td><input type="hidden" name="pamt[]" value="<?php echo $r1['PaidAmount']; ?>"/><?php echo $r1['PaidAmount']; ?></td>
<td><input type="hidden" name="bamt[]" value="<?php echo $r1['BalanceAmount']; ?>"/><?php echo $r1['BalanceAmount']; ?></td>

</tr>


<?php $i++; }?>

<tr>
<td></td>
<td></td>
<td></td>
<td><input type="text" name="pptotal" class="text" value="<?php echo $total; ?>"/></td>
<td><input type="text" name="pppaid" class="text" value="<?php echo $paid; ?>"/></td>
<td><input type="text" name="ppbal" class="text" value="<?php echo $bal; ?>"/></td>



</tr>


<?php
}else{?>
<tr><td><?php echo 'No Data Found' ?></td></tr>
<?php }?>                  
      

<tr>
<td></td>
<td colspan="2" align="right">Package Total</td>
<td><input type="text" name="ptotal" id="ptotal" class="text"  value="<?php echo $pkg_amount ?>" readonly/></td>
</tr>
<tr>
<td></td><td></td>
<td>Total</td>
<td><input type="text" name="total" id="total" class="text" value="<?php echo $pkg_amount+$total ?>" readonly/></td>
</tr>
<tr>
<td></td><td></td>
<td>Discount</td>
<td><input type="text" name="disc" id="disc" class="text txt" value="0"  /></td>
</tr>
<tr>
<td></td><td></td>
<td>Net Total</td>
<td><input type="text" name="ntotal" id="ntotal" class="text"  value="<?php echo $pkg_amount+$total ?>" readonly/></td>
</tr>
<tr>
<td></td><td></td>
<td>Paid</td>
<td><input type="text" name="paid" id="paid" class="text"  value="<?php echo $pamount ?>" readonly/></td>
</tr>
<tr>
<td></td><td></td>
<td>Balance</td>
<td><input type="text" name="bal" id="bal"  class="text" value="<?php echo $pkg_amount+$total-$pamount ?>" readonly/></td>
</tr>

<tr>
<td></td><td></td>
<td>Pay Amount</td>
<td><input type="text" name="pay" id="pay" class="text txt"  value="0"/></td>
</tr>

<tr>
<td></td><td></td>
<td>Balance</td>
<td><input type="text" name="rbal" id="rbal"  class="text"   value="<?php echo $pkg_amount+$total-$pamount ?>" readonly/></td>
</tr>
<tr>
<td></td>
<td align="right" colspan="2" >Payment Type:</td>
                        <td  >
                            <select name="paymenttype"  id="paymenttype">
							<option value="cash">cash</option>
							<option value="card">card</option>
							</select>
                        </td>
</tr>

	  
<tr>

<td colspan="4" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='ppatients.php'"/></td>

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
$("#rbal").val(ba.toFixed(2));

var rp=$("#pay").val();
var rb=parseFloat(ba)-parseFloat(rp);
$("#rbal").val(rb.toFixed(2));
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