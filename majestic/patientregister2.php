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


	
	$abc=mysqli_query($link,"select max(reg_id)+0,registerdate from patientregister") or die(mysqli_error($link));
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
$abcd=mysqli_query($link,$xxx) or die(mysqli_error($link));
 $cnt=mysqli_num_rows($abcd);
	//$row1=mysqli_fetch_array($abc);
	//echo $row1[0]+1;
	//$date=$row1['registerdate'];
	//echo $dd=date("Y-m-d", strtotime("$date"));

?><?php 
 $xxx1="SELECT * FROM `validity_days`";
$abcd1=mysqli_query($link,$xxx1) or die(mysqli_error($link));
 //$cnt=mysqli_num_rows($abcd);
	$row2=mysqli_fetch_array($abcd1);
	 $valid_days=$row2['valid_days'];
	  $valid=date('Y-m-d', strtotime("+$valid_days days"));

?>

		 <div id="conteneur " class="table-responsive" style="height:auto; width:100%; background-color:#ffeeff;">
          <h1 style="color:red;" align="center">PATIENT REGISTRATION </h1><!--<span id="date_time"></span>-->
    
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
$sql="SELECT distinct registerno FROM patientregister";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[registerno]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>

</td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


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


	$abc=mysqli_query($link,"select max(reg_id)+0,registerdate from patientregister") or die(mysqli_error($link));
	$row1=mysqli_fetch_array($abc);
	//echo $row1[0]+1;
	$date=$row1['registerdate'];
	$da=date('Y-m-d');
	
	
   //echo ":" ."OP". $cnt;
?>
            <!-- <div id="timer"></div>--></span></h1>
          
<form name="frm" method="post" action="patient_reg_insert3.php"  >
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
<td class="label1">New/Existing <font color="red">*</font> : </td><td>
<input type="radio" onclick="javascript:location.href='patientregister.php'" required="required"  name="new" id="new" value="New"/> New 
<input type="radio"  required="required" checked="checked"  name="new" id="new" value="Existing"/> Existing</td>

</tr>
<tr>
<td class="label1">UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="rnum" id="rnum" class="text" value="<?php echo $registerno; ?>" readonly /></td>
<td class="label1">Registration Date : </td><td><input name="ApplicationDeadline" id="date"   style="padding-left:2px;width:110px;height:20px;border:1px solid #840204; " type="text"  size="20"  required="required"
 value="<?php echo $radte?>"  readonly placeholder=""/>
 <input name="ApplicationDeadline1" id="intime" readonly="readonly" style="padding-left:2px;width:110px;height:20px;border:1px solid #840204;" type="text"  size="20"  required="required"
 /></td>
</tr>



<!--<tr>
<td class="label1">Patient Type <font color="red">*</font> : </td>
<td><select name="type" style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;" required>
<option value="">Select Patient Type</option>
<option value="OP">Out Patient</option>
<option value="IP">In Patient</option></select>

</td>

</tr>-->

<tr>
<td class="label1">Patient Type <font color="red">*</font> : </td>
<td><input type="radio" required="required" name="type" id="sex1" value="OP" onchange="showHint011(this.value)"  onclick="funconce1(this.value);"/>
 Out Patient <!--<input type="radio" required="required" name="type" id="sex2" onchange="showHint012(this.value)" onclick="funconce1(this.value);" value="IP"/> In Patient
 <input type="radio" required="required" name="type" id="sex4" onchange="showHint013(this.value)" onclick="funconce1(this.value);" value="Lab"/> Lab
--> 
 
 <input type="radio" required="required" name="type" id="sex5" onchange="showHint013(this.value)" onclick="funconce1(this.value);" value="Hospital"/> Hospital
 

</td>

<td class="label1">Patient ID : </td><td><?php /*?><input name="ApplicationDeadline" id="date"  readonly="readonly"style="padding-left:2px;width:114px;height:20px;border:1px solid #840204; " type="text"  size="20"  required="required"
 value="<?php echo date('d-m-y');?>  " /><?php */?>
 <input name="token" id="token" readonly="readonly"  class="text" type="text"  size="20"  required="required"
 /></td>
</tr>
<input type="hidden" name="id" value="<?php echo $id?>" />
<tr>
<td class="label1">Patient Name <font color="red">*</font> : </td>
<td>

<select name="pname_type" style="width:20% !important;">
<option value="<?php echo $pname_type?>"><?php echo $pname_type?></option>
<option value="Mr">Mr</option>
<option value="Mrs">Mrs</option>
<option value="Miss">Miss</option>
<option value="Master">Master</option>
<option value="Baby">Baby</option>
<option value="B/O">B/O</option>

</select>
<input type="text" name="pname" id="pname" value="<?php echo $patientname?>" style="width:75% !important;"  class="text" required="required"/></td>
<td class="label1">Father/Hus Name <font color="red">*</font> : </td><td>
<select name="rel" required style="width:20% !important;">

<option value="<?php echo $rel_type?>"><?php echo $rel_type?></option>
<option value="Father">Father</option>
<option value="Husband">Husband</option>
<option value="Mother">Mother</option>
</select>
<input type="text" class="text" style="width:75% !important;" value="<?php echo $gaurdianname?>" name="fname" id="fname" required="required" />

</td>

</tr>

<tr>
<td class="label1">Gender <font color="red">*</font> : </td><td>
<?php if($gender=='male'){?>
<input type="radio" value="<?php echo $gender?>" checked="checked" required="required" name="sex" id="sex1" value="male"/> Male 
<input type="radio" required="required" name="sex" id="sex2" value="female"/> Female
<?php } else if($gender=='female') {?>

<input type="radio" value="<?php echo $gender?>" required="required" name="sex" id="sex1" value="male"/> Male 
<input type="radio" required="required" name="sex" checked="checked" id="sex2" value="female"/> Female<?php }?></td>
<td class="label1">Age <font color="red">*</font> : </td><td><input type="text" class="text" value="<?php  echo $age?>" name="age" id="age" required="required" /></td>

</tr>


<tr>
<td class="label1">Patient Mobile <font color="red">*</font> : </td>
<td><input type="text" name="mobile" id="mobile" class="text" required="required" value="<?php echo $phoneno?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/></td>
<td class="label1">AAdhar Number <font color="red"></font> : </td><td><input type="text" class="text" value="<?php echo $aadar?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="aadhar" id="aadhar"  /></td>


</tr>
<tr id="dvPassport2k" style="display: none">
<td class="label1">Services <font color="red"></font> : </td>
<td><select  name="serv_name" id="serv_name"   onChange="showHint0222(this.value)">
<option value="">Select Services</option>
<?php 

$sq=mysqli_query($link,"select * from  sevices") or die(mysqli_error($link));
if($sq){
while($row=mysqli_fetch_array($sq)){

$serv_name=$row['serv_name'];

?>
<option value="<?php echo $serv_name; ?>"><?php echo $serv_name; ?></option>
<?php } } ?>

</select></td>
<td class="label1">Service Amount <font color="red"></font> : </td><td><input type="text" class="text" 
name="ser_amt" id="ser_amt"  /></td>

</tr>
<tr>
<?php /*?><td class="label1">Reg Fee <font color="red">*</font> : </td>
<td><input type="text" required="required" value="0" name="fee" id="fee" class="text" onkeyup="calculateSum();"/></td><?php */?>

<input id=\"name\" list=\"city1\" type="hidden" class="text" name="dept" id="dept"  >
<datalist id=\"city1\" >

<?php 
$sql="select distinct DEPT_NAME from dept ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[DEPT_NAME]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
<?php /*?>


<select  name="dept" id="dept" required  >
<option value="">Select Department</option>
<?php 

$sq=mysqli_query($link,"select * from  dept");
if($sq){
while($row=mysqli_fetch_array($sq)){

$DEPT_NAME=$row['DEPT_NAME'];
//$refcode=$row['refcode'];
?>
<option value="<?php echo $DEPT_NAME; ?>"><?php echo $DEPT_NAME; ?></option>
<?php } } ?>

</select><?php */?>


<td class="label1">Token Number : </td><td><?php /*?><input name="ApplicationDeadline" id="date"  readonly="readonly"style="padding-left:2px;width:114px;height:20px;border:1px solid #840204; " type="text"  size="20"  required="required"
 value="<?php echo date('d-m-y');?>  " /><?php */?>
 <input name="token1" id="token1" readonly="readonly"  class="text" type="text"  size="20"  required="required"
 /></td>


</tr>



<input type="hidden" class="text" value="<?php echo $ref_doc_mob?>" name="ref_mob" id="ref_mob"  />

<input type="hidden" class="text" value="" name="ref_doc" id="ref_doc"  />

<tr>
<td class="label1">Consult Doct Name <font color="red">*</font> : </td>
<td><select name="doctorname" required id="doctorname"  onfocus="showHint01(this.value)" onmouseout="showHint01(this.value)"  onChange="showHint01345(this.value)"  onblur="showHint01345(this.value)">
<option value="">Select Consult Doctor</option>
<?php 
include("config.php");
$sq=mysqli_query($link,"select * from  doct_infor");
if($sq){
while($row=mysqli_fetch_array($sq)){

$rk=$row['dname1'];
$rk1=$row['id'];
?>
<option value="<?php echo $rk1; ?>"><?php echo $rk; ?></option>
<?php } } ?>
</select></td>
<td class="label1">Consult Doct Mobile <font color="red"></font> : </td><td><input type="text"  value="<?php echo $con_doc_mob?>" class="text" name="con_doct_mob" id="con_doct_mob" /></td>
<input type="hidden" class="text" name="concession_type" id="concession_type"  value="card"/>
</tr>


<tr> <td class="label1" >If You have Insurence <font color="red">*</font>  : </td>
  <td ><select name="ins_type"  onChange="funconce2(this.value);" >
	<option value="">Select Insurence Type</option>
     <option value="Yes">Yes</option>
	<option value="No">No</option>
		<!--<option value="Bank">Bank</option>-->
        <!--<option value="Insurence">Insurence</option>-->
	</select>	
	</td>

<td class="label1" >Payment Type <font color="red">*</font>  : </td>
  <td ><select name="payment_type"  onChange="funconce(this.value);" required>
	<option value="Cash">Cash</option>
    <option value="Card">Card</option>
     <option value="Free">Free</option>
	
		<!--<option value="Bank">Bank</option>-->
     <!--   <option value="Insurence">Insurence</option>-->
	</select>	
	</td>
 </tr>
 
 
 <tr id="dvPassport1" style="display: none">
    
<td  class="label1 " >

Consultation Fee:</td><td>
    <input type="text"  name="con_fee"   id="con_fee" class="text"/></td>
   <td class="label1">Total Fee <font color="red">*</font> : </td>
<td><input type="text"   readonly="readonly"  name="total" id="total" classs="text"/></td></tr>
   
   
<!--    <font color="red">*</font> : </td>
<td>
<input type="text" id="lap_name" name="lap_name" />-->

<!--<input type="text" required="required" value="150" name="con_fee" style="display:none;" id="con_fee" class="text"/>--></td></div></tr>


<!--<tr > <td class="label1">Total Fee <font color="red">*</font> : </td>
<td><input type="text" required="required" value="150" readonly="readonly"  name="total" id="total" class="text"/></td>
    </tr>-->

    
    <tr id="insu2" style="display:none;" >
<td class="label1" >
	<div align="right">Insurance Name : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
   <!-- <input type="text"    name="insutype" id="insutype" class="text"/>-->
    
	<select  name="insutype_name" >
	<option value=""> -- Select -- </option>
<?php	$sq = mysqli_query($link,"select * from insurance order by ins_name ");
			  
			 
			  $tot=mysqli_num_rows($sq);
			  while($res=mysqli_fetch_array($sq)){
			 
			  $lid = $res['id'];
			  $locname=$res['ins_name'];?>
              <option value="<?php echo $locname?>"><?php echo $locname?></option><?php }?>
	
	</select>
    </span>
  </td>
  <td class="label1">Policy No : </td><td>  <input type="text"   name="policy_no" id="policy_no" class="text"/></td>
</tr>
    
     <tr id="insu3" style="display:none;" >
<td class="label1" >
	<div align="right">Package Amount : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="text"    name="pkg_amt" id="pkg_amt" class="text"/>
    
	
    </span>
  </td>
  <td class="label1">Request Amount : </td><td>  <input type="text"   name="req_amt" id="req_amt" class="text"/></td>
</tr>
    
    <tr id="insu4" style="display:none;" >
<td class="label1" >
	<div align="right">Requested No : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="text"    name="req_no" id="req_no" class="text"/>
    
	
    </span>
  </td>
  <td class="label1">Approved Date: </td><td>  <input type="date"   name="apr_date" id="apr_date" class="text"/></td>
</tr> 
<tr>
<td class="label1">Address : </td>
<td><textarea name="addr" id="addr" style="width:100%"><?php echo $address?></textarea></td>
<td class="label1">Remarks : </td><td><textarea name="rmarks" id="rmarks" style="width:100%"><?php echo $remarks?></textarea></td>
</tr>



 <tr id="insu1" style="display:none;" >
<td class="label1" >
	<div align="right">Insurance Name : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="text"    name="insutype" id="insutype" class="text"/>
    
	<!--<select style="width:230px;height:20px;" name="insutype" >
	<option value=""> -- Select -- </option>
	<option value="United Health Care India Pvt Ltd">United Health Care India Pvt Ltd</option>
	<option value="Paramount TPA">Paramount TPA</option>
	<option value="GHPL">GHPL</option>
	<option value="FHPL">FHPL</option>
	<option value="Medi Assist">Medi Assist</option>
	<option value="Bajaj Allianz TPA">Bajaj Allianz TPA</option>
	<option value="Vidal Health Care TPA(TTK)">Vidal Health Care TPA(TTK)</option>
	<option value="Star Health and Allied Insurance">Star Health and Allied Insurance</option>
	<option value="ICICI Lombard">ICICI Lombard</option>
	<option value="MD India">MD India</option>
	<option value="Heritage">Heritage</option>
	<option value="Emeditek TPA">Emeditek TPA</option>
	<option value="HDFC Ergo General Insurance">HDFC Ergo General Insurance</option>
	<option value="Raksha TPA">Raksha TPA</option>
	<option value="Medicare TPA">Medicare TPA</option>
	<option value="Health India">Health India</option>
	<option value="Future Generali India Insurance">Future Generali India Insurance</option>
	<option value="Max Bupa Health Insurance">Max Bupa Health Insurance</option>
	<option value="Alankit">Alankit</option>
	<option value="DHS-Dedicated Health Care Services">DHS-Dedicated Health Care Services</option>
	<option value="Genins TPA">Genins TPA</option>
	<option value="Appolo Munich Health Insurance">Appolo Munich Health Insurance</option>
	<option value="Spurthi Meditech">Spurthi Meditech</option>
	<option value="Vipul Ned Corp">Vipul Ned Corp</option>
	<option value="ReliGare Health Insurance">ReliGare Health Insurance</option>
	<option value="Anyuta">Anyuta</option>
	<option value="Universal Sompo General Insurance Company">Universal Sompo General Insurance Company</option>
	<option value="Reliance Health Insurance">Reliance Health Insurance</option>
	
	</select>-->
    </span>
  </td>
  <td class="label1">Policy No : </td><td>  <input type="text"   name="policy" id="policy" class="text"/></td>
</tr>

<tr id="card1" style="display:none;" >
<td class="label1" >
	<div align="right">Chequee : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="text"   name="chq_num" id="chq_num" class="text"/>
   
    </span>
  </td>
  <td class="label1">Bank Name : </td><td>  <input type="text"   name="bank" id="bank" class="text"/></td>
</tr>
<tr id="cardk" style="display:none;" >
<td class="label1" >
	<div align="right">Chequee Date : </div>
	
	</td>
	<td >
	
	<span class="label1">
    
    <input type="date" name="chq_date" id="chq_date" class="text"/>
   
    </span>
  </td></tr>

<tr><td colspan="4" align="center">
<input type="submit" id="prt" name="submit" value="UPDATE" onClick="printt()" class="butt"/>&nbsp;<input type="button" name="close" id="close" value="Close" class="butt" onClick="window.location.href='patient-reg.php'"/></td></tr></table>

</table>

                

 </form>         
		       </div>

		<?php include('footer.php'); ?>

	</div>
    
 


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



