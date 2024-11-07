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
		include("header1.php");  
	?>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

<!--<script type="text/javascript" src="js/jquery.1.4.2.js"></script>-->

<script>
$().ready(function() {
	$("#regk").autocomplete("ipreg1.php", {
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
<script>
function showHint1(str)
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
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	if(strar[3] == "male"){
	document.getElementById("sex1").checked =true;
	}
	if(strar[3] == "female"){
	document.getElementById("sex2").checked =true;
	}
	document.getElementById("addr").value=strar[4];
	document.getElementById("mnum").value=strar[5];	
	document.getElementById("occ").value=strar[6];		
    }
  }
xmlhttp.open("GET","set100.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint2(str)
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
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	if(strar[3] == "male"){
	document.getElementById("sex1").checked =true;
	}
	if(strar[3] == "female"){
	document.getElementById("sex2").checked =true;
	}
	document.getElementById("addr").value=strar[4];
	document.getElementById("mnum").value=strar[5];	
	document.getElementById("occ").value=strar[6];		
    }
  }
xmlhttp.open("GET","set101.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint01(str)
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
	
	document.getElementById("con_fee").value=strar[1];
	document.getElementById("con_doct_mob").value=strar[2];
	}
  }
xmlhttp.open("GET","set010.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function showHint011(str)
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
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint012(str)
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
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint013(str)
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
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>

<!--
<script>
function funconce(str){
	alert(str);
	if(str == "TPA Insurances"){
	
		document.getElementById("card1").style.display='none';
		document.getElementById("card2").style.display='none';
		document.getElementById("insu1").style.display='';
		
	}else if(str == "MKT Trauma Care"){
		document.getElementById("insu1").style.display='none';
		document.getElementById("conce_card").style.display='none';
		document.getElementById("card2").style.display='none';
		
		document.getElementById("card1").style.display='';
		
		
	}else if(str == "Lotus Priviliged Card"){
		document.getElementById("insu1").style.display='none';
		document.getElementById("card1").style.display='none';
		document.getElementById("conce_card").style.display='none';
		document.getElementById("card2").style.display='';
		
	}else{
		document.getElementById("insu1").style.display='none';
		document.getElementById("card2").style.display='none';
		document.getElementById("card1").style.display='none';
	}
}
</script>

-->
<script>
function funconce(str){
	//alert(str);
	if(str == "Insurence"){
	
		//document.getElementById("card1").style.display='none';
		//document.getElementById("card2").style.display='none';
		document.getElementById("insu1").style.display='';
		document.getElementById("card1").style.display='none';
		document.getElementById("cardk").style.display='none';
		
	}else if(str == "Chequee"){
		//document.getElementById("insu1").style.display='none';
	//	document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		document.getElementById("cardk").style.display='';
		document.getElementById("card1").style.display='';
		document.getElementById("insu1").style.display='none';
		
		
	}else{
		document.getElementById("insu1").style.display='none';
		document.getElementById("card2").style.display='none';
		document.getElementById("card1").style.display='none';
	}
}
</script>

<script>
function funconce1(str){
	//alert(str);
	if(str == "OP"){
	
		
		//document.getElementById("con_fee").style.display='';
		
	}else if(str == "IP"){
		//document.getElementById("con_fee").style.display='none';
		//document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		
		//document.getElementById("card1").style.display='';
		
		
	}
	else if(str == "Lab"){
		//document.getElementById("con_fee").style.display='none';
		//document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		
		//document.getElementById("card1").style.display='';
		
		
	}
}
</script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script type="text/javascript">
    $(function () {
        $("input[name='datacard']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
		 $("input[name='type']").click(function () {
            if ($("#sex1").is(":checked")) {
                $("#dvPassport1").show();
            } else {
                $("#dvPassport1").hide();
            }
        });
		});
		$(document).on('keyup ','#fee',function(){
		 conven = $('#fee').val();
		 otheral1 = $('#con_fee').val();
		$('#total').val( parseFloat(otheral1)+parseFloat(conven) );
		});
		$(document).on('keyup ','#con_fee',function(){
		 conven = $('#fee').val();
		 otheral1 = $('#con_fee').val();
		$('#total').val( parseFloat(otheral1)+parseFloat(conven) );
		});

        </script> 
        <link rel="stylesheet" href="js/jquery-ui.min.css" type="text/css" /> 
	</head>

	<body><div id="conteneur container" style="height:auto;">

	
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
<?php */?>	<?php
	include('logo.php');	
			include("main_menu.php");
			?>
		  
	 <?php
			include("config.php");
//$abc=$_GET['id'];


	
	$abc=mysqli_query($link,"select max(reg_id)+0,registerdate from patientregister")or die(mysqli_error($link));
	$row1=mysqli_fetch_array($abc);
	//echo $row1[0]+1;
	$date=$row1['registerdate'];
	 //$dd=date("Y-m-d", strtotime("$date"));
	 
	
	//date('Y-m-d' strtotime($date));

if($abc){
	
	
}
else
{
echo "allredy exit";

}
//$ddd=date('Y-m-d');
//echo $date = strtotime("-1 day", $ddd);
 $date=date('Y-m-d', strtotime('-1 days'));
  $xxx="select * from patientregister where registerdate='$date' and pat_type='OP'";
$abcd=mysqli_query($link,$xxx)or die(mysqli_error($link));
 $cnt=mysqli_num_rows($abcd);
	//$row1=mysqli_fetch_array($abc);
	//echo $row1[0]+1;
	//$date=$row1['registerdate'];
	//echo $dd=date("Y-m-d", strtotime("$date"));

?><?php 
 $xxx1="SELECT * FROM `validity_days`";
$abcd1=mysqli_query($link,$xxx1)or die(mysqli_error($link));
 //$cnt=mysqli_num_rows($abcd);
	$row2=mysqli_fetch_array($abcd1);
	 $valid_days=$row2['valid_days'];
	  $valid=date('Y-m-d', strtotime("+$valid_days days"));

?>

		 <div id="conteneur " class="table-responsive" style="height:auto; width:100%; background-color:#ffeeff;">
          <h1 style="color:red;" align="center">PATIENT REGISTRATION CANCELLATION</h1><!--<span id="date_time"></span>-->
    
<script type="text/javascript">
tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();
mnt=nmonth+1;

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('intime').value=""+nhour+":"+nmin+":"+nsec+ap+"";
//document.getElementById('outtime').value=" "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;

</script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("input[name='datacard']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
		 $("input[name='type']").click(function () {
            if ($("#sex1").is(":checked")) {
                $("#dvPassport1").show();
            } else {
                $("#dvPassport1").hide();
            }
        });
		
		
		$("input[name='type']").click(function () {
            if ($("#sex2").is(":checked")) {
                $("#dvPassport1k").show();
            } else {
                $("#dvPassport1k").hide();
            }
        });
		
		$("input[name='type']").click(function () {
            if ($("#sex5").is(":checked")) {
                $("#dvPassport2k").show();
            } else {
                $("#dvPassport2k").hide();
            }
        });
		
		$("input[name='type']").click(function () {
            if ($("#sex2").is(":checked")) {
                $("#dvPassport3k").show();
            } else {
                $("#dvPassport3k").hide();
            }
        });
		
		});
		
		 
	
		
		$(document).on('keyup ','#fee',function(){
		 conven = $('#fee').val();
		 otheral1 = $('#con_fee').val();
		$('#total').val( parseFloat(otheral1)+parseFloat(conven) );
		});
		$(document).on('keyup ','#con_fee',function(){
		 conven = $('#fee').val();
		 otheral1 = $('#con_fee').val();
		$('#total').val( parseFloat(otheral1)+parseFloat(conven) );
		});

        </script>  
        <script>
function showHint0222(str)
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
	
	document.getElementById("ser_amt").value=strar[1];
	document.getElementById("total").value=strar[2];
	}
  }
xmlhttp.open("GET","set0222.php?q="+str,true);
xmlhttp.send();
}
</script>  
        <script>
function showHint01345(str)
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
	
	document.getElementById("token1").value=strar[1];
	}
  }
xmlhttp.open("GET","setn13.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function showHint022(str)
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
	
	document.getElementById("ref_mob").value=strar[1];
	}
  }
xmlhttp.open("GET","set022.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function funconce(str){
	//alert(str);
	if(str == "Insurence"){
	
		//document.getElementById("card1").style.display='none';
		//document.getElementById("card2").style.display='none';
		
		document.getElementById("insu1").style.display='';
		document.getElementById("card1").style.display='none';
		document.getElementById("cardk").style.display='none';
		
	}else if(str == "Chequee"){
		//document.getElementById("insu1").style.display='none';
	//	document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		document.getElementById("cardk").style.display='';
		document.getElementById("card1").style.display='';
		document.getElementById("insu1").style.display='none';
		
		
	}else if(str == "Cash"){
		document.getElementById("insu1").style.display='none';
		document.getElementById("cardk").style.display='none';
		document.getElementById("card1").style.display='none';
	}
	else if(str == "Free"){
		document.getElementById("insu1").style.display='none';
		document.getElementById("cardk").style.display='none';
		document.getElementById("card1").style.display='none';
	}
}


function funconce2(str){
	//alert(str);
	if(str == "Yes"){
	
		//document.getElementById("card1").style.display='none';
		//document.getElementById("card2").style.display='none';
		document.getElementById("insu2").style.display='';
		document.getElementById("insu3").style.display='';
		document.getElementById("insu4").style.display='';
		//document.getElementById("card1").style.display='none';
		//document.getElementById("cardk").style.display='none';
		
	}else if(str == "No"){
		//document.getElementById("insu1").style.display='none';
	//	document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		//document.getElementById("cardk").style.display='';
		//document.getElementById("card1").style.display='';
		document.getElementById("insu2").style.display='none';
		document.getElementById("insu3").style.display='none';
		document.getElementById("insu4").style.display='none';
		
	}
}

</script> 



<script>
function funconce1(str){
	//alert(str);
	if(str == "IP"){
	
		
		//document.getElementById("con_fee").style.display='';
		
	}else if(str == "OP"){
		//document.getElementById("con_fee").style.display='none';
		//document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		
		//document.getElementById("card1").style.display='';
		
		
	}
}
</script>
                         
            <form name="frm" method="post" >
           
                
<table width="70%" style="margin-left:300px;" class="table krk"cellspacing="1" align="right">

<tr>
<td align="right">Search By UMR No. : <!--<input type="text" class="regk" name="reg" id="regk"  />-->

 <input id=\"regk\" list=\"city1\" name="reg"  class="regk"required >
<datalist id=\"city1\" >

<?php  include("config.php");
$sql="SELECT distinct registerno FROM patientregister where pat_type='OP' and pat_status='' ";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[registerno]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>

</td>
<td align="left">
<input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>
      
      <?php 
      
        $r=$_REQUEST['reg'];
        
        $xxx="select * from patientregister where registerno='$r' ";
$abc=mysqli_query($link,$xxx) or die(mysqli_error($link));
 //$cnt=mysqli_num_rows($abcd);
	$row1=mysqli_fetch_array($abc);
$registerno=$row1['registerno'];
$radte=$row1['date'];
//$ptype=$row1['pat_type'];
$doctorname=$row1['doctorname'];
$patientname=$row1['patientname'];
$age=$row1['age'];
$gaurdianname=$row1['gaurdianname'];
$gender=$row1['gender'];
$address=$row1['address'];
$phoneno=$row1['phoneno'];
$registerfee=$row1['registerfee'];
$remarks=$row1['remarks'];
$aadar=$row1['aadar'];
$ref_doc=$row1['ref_doc'];
$ref_doc_mob=$row1['ref_doc_mob'];
$con_doc_mob=$row1['con_doc_mob'];
$rel_type=$row1['rel_type'];
//$tokenno=$row1['tokenno'];
$cons_fee=$row1['cons_fee'];
$total=$row1['total'];
$pat_type1=$row1['pat_type1'];
$pname_type=$row1['pname_type'];
$concession_type=$row1['concession_type'];
$dept=$row1['dept'];
$bill_num=$row1['bill_num'];
$id=$row1['reg_id'];


	$abc=mysqli_query($link,"select max(reg_id)+0,registerdate from patientregister")or die(mysqli_error($link));
	$row1=mysqli_fetch_array($abc);
	//echo $row1[0]+1;
	$date=$row1['registerdate'];
	$da=date('Y-m-d');
	
	
   //echo ":" ."OP". $cnt;
   
   $sq11=mysqli_query($link,"select sum(amount) as amt from daily_amount where bill_num='$bill_num' and mrnum='$r'")or die(mysqli_error($link));
   $rr=mysqli_fetch_array($sq11);
   $amt=$rr['amt'];
   
?>
            <!-- <div id="timer"></div>--></span></h1>
          
<form name="frm" method="post" action=""  >
 <div  style="border:1px solid;">              
<table width="100%" border="0" class="table krk" cellspacing="10">
<input type="hidden" name="opno"  value="<?php echo "OP".($row1[0]+1);?>"/>
<input type="hidden" name="ipno" value="<?php echo "IP".($row1[0]+1);?>"/>

<input type="hidden" name="authby" value="<?php echo $aname; ?>"/>
<tr><td ><?php $dt=date('y');
		 $d1=date('m');
		if($d1=='01'){$y=$dt-1;}
		if($d1=='02'){$y=$dt-1;}
		if($d1=='03'){$y=$dt-1;}
		
		if($d1=='04'){$y=$dt;}
		if($d1=='05'){$y=$dt;}
		if($d1=='06'){$y=$dt;}
		
		if($d1=='07'){$y=$dt;}
		if($d1=='08'){$y=$dt;}
		if($d1=='09'){$y=$dt;}
		
		if($d1=='10'){$y=$dt;}
		if($d1=='11'){$y=$dt;}
		if($d1=='12'){$y=$dt;}
		
		?>  </td></tr>
<input type="hidden" name="opno"  value="<?php echo "OP".($row1[0]+1);?>"/>
<input type="hidden" name="ipno" value="<?php echo "IP".($row1[0]+1);?>"/>

<input type="hidden" name="authby" value="<?php echo $aname; ?>"/>


<tr>
<td class="label1">UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="rnum" class="text" value="<?php echo $registerno; ?>" readonly /></td>
<td class="label1">Registration Date : </td><td><input name="ApplicationDeadline" id="date" class="text"   type="text"  size="20"  required="required"
 value="<?php echo $radte?>"  readonly placeholder=""/>
 </td>
</tr>
<input type="hidden" name="id" value="<?php echo $id;?>">
<tr>
<td class="label1">Paid Amount. <font color="red">*</font> : </td>
<td><input type="text" name="paid" id="paid" class="text" value="<?php echo $amt; ?>" readonly /></td>
<td class="label1">Return Amount : </td><td><input name="return_amt" id="return"   class="text"  type="text"  size="20"  required="required"
 value=""   placeholder=""/>
</td>
</tr>

<tr><td colspan="4" align="center">
<input type="submit" id="prt" name="submit1" value="Submit" onClick="printt()" class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='op_cancel.php'"/></td></tr></table>

</table>

                

 </form>         
		       </div>

		<?php include('footer.php'); ?>

	</div>
    
 <?php 
if(isset($_POST['submit1'])){
	date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ()); 
	$rnum=$_POST['rnum'];
	$paid=$_POST['paid'];
	$return_amt=$_POST['return_amt'];
	 $dt=date('Y-m-d');
	 $id=$_POST['id'];
$sq=mysqli_query($link,"select * from daily_amount where date(date1)='$dt'")or die(mysqli_error($link));
$bcnt=mysqli_num_rows($sq);
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;
	$sq2=mysqli_query($link,"insert into op_cancel (mrno,amount,ret_amount,bill_date,id1)values('$rnum','$paid','$return_amt','$cnt','$id')")or die(mysqli_error($link));
	$qq=mysqli_query($link,"insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc,doct_name)
values('Patient Register','-$return_amt','$cnt','$rnum','$aname','$payment_type','$ndate','Patient Register Canceled','$new_doct_type')")or die(mysqli_error($link));
$sq3=mysqli_query($link,"update patientregister set 	pat_status='Canceled' where reg_id='$id'")or die(mysqli_error($link));
	
if($sq){	print "<script>";
			print "alert('Suceefully Saved');";
			print "self.location='op_cancel.php';";
			print "</script>";
}
}
	?>

	</body>

</html>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".regk").autocomplete({
        source: "ipreg1.php",
        minLength: 1
    });                






});
</script>
 <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {

    $("#reg").autocomplete({
        source: "ipname.php",
        minLength: 1
    });                });
</script>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>



