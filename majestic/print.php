<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Header & Footer test</title>
<script language="JavaScript" type="text/javascript">


function prnt(){
	
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
.styled-button-2 {
	 background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding-left: 1.9cm;
	padding-right: 1.9cm;
	padding-bottom: 1.9cm;
	padding-top: 1.1cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:10px;
	font:"Times New Roman", Times, serif;
	font-size:14px;
  
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
	
}
.text-line {
        background-color: transparent;
        color: #000;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid red 1px;
        padding: 3px 10px;
		width:80px;
    }
</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="patient-reg.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<!--<div class="book">
    <div class="page">
        <div class="subpage">-->
        <?php 
include("config.php");
$id=$_GET['id'];

$sql=mysqli_query($link,"select * from `patientregister` where reg_id='$id'");
$r=mysqli_fetch_array($sql);


//$doct=$r['registerno'];
$doct1=$r['registerdate'];
//$doct2=$r['tknum'];
$did=$r['doctorname'];
$pname=$r['patientname'];
$fname=$r['gaurdianname'];
$sex=$r['gender'];
$age=$r['age'];
$mobile=$r['phoneno'];
$pat_type=$r['pat_type'];
//$aadhar=$r['aadar'];
$ref_doc=$r['ref_doc'];
$address=$r['address'];
$doctorname=$r['doctorname'];
 $con_doct_mob=$r['con_doc_mob'];
$ref_doc_mob=$r['ref_doc_mob'];
$tokenno=$r['tokenno'];
$validity=$r['validity'];
$registerno=$r['registerno'];
$rel_type=$r['rel_type'];
$token1=$r['token_num'];
$cons_fee=$r['cons_fee'];
$total=$r['total'];
 $regfee=$r['registerfee'];
 $authby = $r['auth_by'];
$phoneno=$r['phoneno'];
$bill_num=$r['bill_num'];
 $hosp_fee=$r['hosp_fee'];
 
  $dd10="select recv_by from daily_amount where bill_num = '$bill_num'";
$dd11 = mysqli_query($link,$dd10);
$d20=mysqli_fetch_assoc($dd11);

  $dd="select dname1,dsi1,desc1,stime,etime,wdays,edays from doct_infor where dname1 = '$did'";
$docid = mysqli_query($link,$dd);
if($docid)
{
	$row1 = mysqli_fetch_array($docid);
	$doct3 = $row1['dname1'];
	$dsi1 = $row1['dsi1'];
	$desc1 = $row1['desc1'];
	$stime=$row1['stime'];
	$etime=$row1['etime'];
	$wdays=$row1['wdays'];
	$edays=$row1['edays'];

}

?>

<?php // echo  $no = '$no';
  //  $newtimestamp = strtotime($doct1. ' + 570 minute');//gets timestamp
    $newtimestamp = strtotime($doct1);//gets timestamp
    //convert into whichever format you need 
     $newdate = date('d-m-Y H:i:s', $newtimestamp);
//echo "Right now: " . $now_stamp;
//echo "5 minutes from right now: " . $expire_stamp;

?>


	


	
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
<tr height="10" contenteditable="4"></tr>
<tr><td colspan="4"  align="center"><img src="images/majestic_reghead.png"  ></td></tr>
  <tr>
      <td colspan="2" style="border-bottom:0px solid #999999;padding-left: 15px;">
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
           
            <td colspan="1" width="50%"><div align="left"><b style="font-size:12px;"><?php echo $doctorname;  ?> , <?php echo $dsi1;  ?> </b></div></td>
			<td colspan="" width="50%" style="font-size:12px;"> For Appointment  <?php echo $con_doct_mob;  ?> on call Appointment -Rs.500/- consultation</td></tr>
            <tr><td style="font-size:12px;"><?php echo $desc1;  ?></td><td style="font-size:12px;"><?php echo $wdays; if($stime!=''){?>(<?php echo $stime?>)<?php }?>
            
            <?php echo $edays ; if($etime!=''){?>(<?php echo $etime ?>)<?php }?>.
</td>
           
          </tr>
          <tr><td colspan="2"><hr /></td></tr>
          
        
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="" valign="top" align="center">
        
        
        
           <table width="100%" border="0" cellspacing="0" cellpadding="4"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
         
		
		<table width="100%" border="0" align="center" style="vertical-align:text-top" cellpadding="1" cellspacing="0" >
          
          <tr>
            <td colspan="4"></td>
             </tr>
           <tr>
         
            <td width="20%"><div align="left"><b>Bill No : </b> </div></td>
			<td ><?php echo $bill_num;  ?> &nbsp;&nbsp;&nbsp;<b></td>
            <td ><div align="left"><b>UMR NO: </b></div></td>
			<td > <?php echo $registerno?></td>
		
            </tr>
          <tr>
         
            <td width="20%"><div align="left"><b>Patient Name : </b> </div></td>
			<td ><?php echo $pname;  ?> &nbsp;&nbsp;&nbsp;<!--<b><?php if($pat_type=='OP'){echo 'O/P No';}else{ echo 'I/P No';} ?></b>:<?php echo $tokenno ?>--></td>
			 
           <td  ><div align="left"><b>Mobile  : </b></div></td>
          <td><?php echo $phoneno;  ?></td>
            </tr>
          <tr>
           
            <td ><div align="left"><b>Age/Gender :</b> </div></td>
			<td><?php  echo $age."/". $sex;  ?></td>
            <td><div align="left"><b>Date & Time : </b></div></td>
		   <td><?php echo $newdate?></td>
            </tr>
			
			  <tr>
           
            <td><div align="left"><b>Token No: </b></div></td>
			<td><?php echo $token1;  ?></td>
           <td><b><?php echo $rel_type ?> Name:</b></td><td><?php echo $fname;  ?></td>
          </tr>
		  
		 <tr>
         
			 <td valign="middle" ><div align="left"><b>Valid Upto : </b></div></td>
			 <td><?php echo date('d/m/Y',strtotime($validity));  ?></td>
             
              <td valign="middle" ><div align="left"><b>Address : </b></div></td>
			 <td><?php echo ($address);  ?></td>
            </tr>
			  
            
        </table></td>
      </tr>
      <tr><td align="center" style=" border-top: #000000 1px solid"><table width="100%" cellpadding="0" cellspacing="0" >
    
        <tr> <td width="33%"><div align="left"><b>Consultation.Fee :  </b> <?php echo $cons_fee+$hosp_fee ?></div> </td>
			
             
			</tr>
            <tr height="10"></tr>
		<tr><td height="18" colspan="6"><b>Received By:</b><?php echo $d20['recv_by']; ?></td><td valign="top"><div align="right"><b></b></div></td>
      </tr></table></td></tr>
    </table>
	</tr>
	</td>
  </tr></td>


        
</td></tr>    <tr height="10"><td><hr /></td></tr><tr><td>
<table width="100%"><tr><td width="80%" valign="top">
     


   
 
   <b>  <u>CLINICAL HISTORY:</u></b>
</td><td width="15%" style="height:100px !important;">
        <table align="right" style="font-size:10px;"><tr><td>WEIGHT</td><td  width="10%">&nbsp;</td></tr>
      
        <tr><td>BPR</td><td width="10%">&nbsp;</td></tr>
        <tr><td>B.P</td><td  width="10%">&nbsp;</td></tr>
         <tr><td>TEMP</td><td  width="10%">&nbsp;</td></tr>
          <tr><td>HEART</td><td  width="10%">&nbsp;</td></tr>
          <tr><td>LUNGS</td><td  width="10%">&nbsp;</td></tr>
        </table>
     </td>
     <td width="5%"></td>
     </tr>
     
     <tr><td height="160"></td></tr>
     
     </table>
     
 
  </td></tr>
     
    <tr><td>

<strong> INVESTIGATIONS</strong> 
<tr><td height="130"></td></tr>

<tr><td><strong>DIAGNOSIS</strong></td></tr>
<tr><td height="130"></td></tr>
<tr><td>
<strong>
Rx.</strong></td></tr>
</td></tr>
<tr><td height="130"></td></tr>
</td></tr>
</table>


</table>
   </div> 
        </div>    
    </div>
    
</div>

</body>
</html>