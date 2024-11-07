<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Header & Footer test</title>
<script language="JavaScript" type="text/javascript">
function loadXMLDoc()
{
var bno=document.getElementById("bno").value;
var xmlhttp;
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
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","count1.php?bno="+bno,true);
xmlhttp.send();
}
function prnt(){
loadXMLDoc();

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
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding: 1.5cm;
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
	padding-top:120px;
	font:"Times New Roman", Times, serif;
	font-size:13px;
  
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

</style>
</head>

<body>
<div class="book">
<?php
			include("config.php");
            $bno = $_REQUEST['bno'];
            $cnt= $_REQUEST['emp'];
				echo "<input type='hidden' name='bno' id='bno' value='$bno'/>";
			/*$sql = mysqli_query($link,"select * from org") or die(mysqli_error($link));
				if($sql)
				{
					$row = mysqli_fetch_array($sql);
					$pstatus=$row['pstatus'];
					$orgname = $row['org'];
					$orgaddr = $row['address'];
					$orgphone = $row['phno'];
					$s1 = $row['s1'];
					$s2 = $row['s2'];
					$sstatus=$row['sstatus'];
					$sstatus1=$row['sstatus1'];
				}*/
			
		//	$bno = $_REQUEST['bno'];
			$tyy="select * from bill where BillNO='$bno'";
			$sql= mysqli_query($link,$tyy) or die(mysqli_error($link));
			if($sql)
			{
				$row = mysqli_fetch_array($sql);
				$mrno=$row['mrno'];
				$bdate = date('d-m-Y',strtotime($row['BillDate']));
				$patname = $row['PatientName'];
				
				$age = $row['Age'];
				$gender = $row['Sex'];
				$dname = $row['DoctorName'];
				$ptype = $row['ptype'];
	
			}		
			
				$cnt1 = explode(",",$cnt);
			  $rws = count($cnt1);
				
				for($i=0;$i<$rws;$i++){
				$emp_id1 = $cnt1[$i];
				$sql2 = mysqli_query($link,"select * from reportentry where BillNo='$bno' and Ptest='$emp_id1'");
				if($sql2){
            
                
      
				if($emp_id1 == "COMPLETE BLOOD  PICTURE (CBP)"){	
				$sql2 = mysqli_query($link,"select * from cbp where bill_no='$bno'");
				if($sql2){
				
				$row2 = mysqli_fetch_array($sql2);
				$HAEMOGLOBIN = $row2['HAEMOGLOBIN'];
				$RBC = $row2['RBC'];
				$WBC_Count = $row2['WBC_Count'];
				$PLATELET_COUNT = $row2['PLATELET_COUNT'];
				$NEUTROPHILS = $row2['NEUTROPHILS'];
				$LYMPHOCYTES = $row2['LYMPHOCYTES'];
				$MONOCYTES = $row2['MONOCYTES'];
				$EOSINOPHILS = $row2['EOSINOPHILS'];
				$BASOPHILS = $row2['BASOPHILS'];
				$RBC1 = $row2['RBC1'];
				$WBC1 = $row2['WBC1'];
				$Platelets = $row2['Platelets'];
				
				}
                                $mbss="select * from cbpnormal where id='1'";
$r=  mysqli_query($link,$mbss) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$id=$row['id'];
$hm=htmlspecialchars($row['hm']);
$hf=$row['hf'];
$rbcm=$row['rbcm'];
$rbcf=$row['rbcf'];
$webcount1=$row['webcount'];
$plateletcount=$row['plateletcount'];
$na=$row['na'];
$nc=$row['nc'];
$la=$row['la'];
$lc=$row['lc'];
$ma=$row['ma'];
$mc=$row['mc'];
$ea=$row['ea'];
$ec=$row['ec'];
$baa=$row['baa'];
$bac=$row['bac'];
$hnormal=$row['hnormal'];
$rbcnormal=$row['rbcnormal'];
$webcountnormal=$row['webcountnormal'];
$plateletnormal=$row['plateletnormal']; 
                                
				?>


    <div class="page">
        <div class="subpage">
		<table width="100%">	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td style="font-size:12px;"> : <b><?php echo $dname ?></b></td>
			<td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		  <tr><td colspan="4" ><b><u>COMPLETE BLOOD  PICTURE (CBP)</u></b></tr>
			<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULTS </u></td><td><b><u>NORMAL RANGES </u></td></tr> 

				
<tr><td>HAEMOGLOBIN</td><td> : <?php echo $HAEMOGLOBIN ?> %</td><td colspan="2">Male :<?php echo $hm; ?> <?php echo $hnormal; ?> ,<br> Female : <?php echo $hf; ?> <?php echo $hnormal; ?></td></tr>
<tr><td>RBC</td><td> : <?php echo $RBC ?> Mill/ cumm</td><td colspan="2">Male : <?php echo $rbcm; ?> <?php echo $rbcnormal; ?>,<br> Female : <?php echo $rbcf; ?> <?php echo $rbcnormal; ?></td></tr>
<tr><td>WBC Count</td><td> : <?php echo $WBC_Count ?> cells/cumm</td><td colspan="2"><?php echo $webcount1; ?> <?php echo $webcountnormal; ?></td></tr>        
<tr><td>PLATELET COUNT</td><td> : <?php echo $PLATELET_COUNT ?> lakhs /cumm</td><td colspan="2"><?php echo $plateletcount; ?> <?php echo $plateletnormal; ?></td></tr>        

<tr height="10px"></tr>
<tr><td colspan="2"><b><u>DIFFERENTIAL LEUCOCYTE COUNT:</u></b></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <?php echo $NEUTROPHILS ?> %</td><td><?php echo $na; ?>%</td><td><?php echo $nc; ?>%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <?php echo $LYMPHOCYTES ?> %</td><td><?php echo $la; ?>%</td><td><?php echo $lc; ?>%</td></tr>
<tr><td>MONOCYTES</td><td> : <?php echo $MONOCYTES ?> %</td><td><?php echo $ma; ?>%</td><td><?php echo $mc; ?>%</td></tr>		 		
<tr><td>EOSINOPHILS</td><td> : <?php echo $EOSINOPHILS ?> %</td><td><?php echo $ea; ?>%</td><td><?php echo $ec; ?>%</td></tr>	  				
<tr><td>BASOPHILS</td><td> : <?php echo $BASOPHILS ?> %</td><td><?php echo $baa; ?>%</td><td><?php echo $bac; ?>%</td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>PERIPHERAL SMEAR EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td colspan="2"> : <?php echo $RBC1 ?></td></tr> 
<tr><td>WBC</td><td colspan="2"> : <?php echo $WBC1 ?></td></tr> 
<tr><td>Platelets</td><td colspan="2"> : <?php echo $Platelets ?></td></tr> 
<tr><td colspan="3"><b>Method :Cell Counter/Microscope</b></td></tr>
<tr><td colspan="3"><!--<img src="images/images.png"/>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		
		
		</div>    
    </div>
    <?php 
	}
	
	if($emp_id1 == "2D Echo"){	
	
	$sql2 = mysqli_query($link,"select * from echo2d where bill_no='$bno'");
		    
                $rs=mysqli_fetch_array($sql2);
                     $MITRALVALVE = $rs['MITRALVALVE'];
		$AORTICVALUE = $rs['AORTICVALUE'];
		$PULMVALUE = $rs['PULMVALUE'];
		$TRICISPIDVALUE = $rs['TRICISPIDVALUE'];
		$IAS = $rs['IAS'];
		$IVS = $rs['IVS'];
		$AORTICROOT = $rs['AORTICROOT'];
		$AORTICOPENING = $rs['AORTICOPENING'];
		$LTATRIUM = $rs['LTATRIUM'];
		$RVOT = $rs['RVOT'];
		$IVSTHICKNESS = $rs['IVSTHICKNESS'];
		$LVPWTHICKNESS = $rs['LVPWTHICKNESS'];
		$LVIDo=$rs['LVIDo'];
                $LVDIs=$rs['LVDIs'];
                $RVDId=$rs['RVDId'];
                $EDV=$rs['EDV'];
                $ESV=$rs['ESV'];
                $EF=$rs['EF'];
                $FS=$rs['FS'];
                $LVM=$rs['LVM'];
                $EPSS=$rs['EPSS'];
                $RIGHTATRIUM=$rs['RIGHTATRIUM'];
                $RIGHTVENTRICLE=$rs['RIGHTVENTRICLE'];
                $PULARTERY=$rs['PULARTERY'];
                $PERICARDIUM=$rs['PERICARDIUM'];
                $MITRALVELOCITYE=$rs['MITRALVELOCITYE'];
                $MITRALVELOCITYA=$rs['MITRALVELOCITYA'];
                $AORTICVELOCITY=$rs['AORTICVELOCITY'];
                $PULMONARYVELOCITY=$rs['PULMONARYVELOCITY'];
                $TRICUSPIDVELOCITY=$rs['TRICUSPIDVELOCITY'];
                        $TRJETVELOCITY=$rs['TRJETVELOCITY'];
                        $PASP=$rs['PASP'];
                        $CONCLUSION=$rs['CONCLUSION'];
						$DOCTOR=$rs['DOCTOR'];
					 
					 
					 
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table width="100%">	<tr height="20"></tr>
        <tr>
		  <td ><div align="left">UMR No </div></td>
			<td > : <b><?php echo $mrno ?></b></td>
           
           
           </tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  ><div align="left">Bill No. </div></td>
			<td  > : <b><?php echo $bno ?></b></td>
            <td  ><div align="left">Report Date </div></td>
			<td  > : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>ECHO CARDIOGRAM REPORT</u></b></tr>



<tr><td >MITRAL VALVE</td><td colspan="2"> : <?php echo $MITRALVALVE?></td></tr> 
<tr><td >AORTIC VALVE</td><td colspan="2"> : <?php echo $AORTICVALUE ?> </td></tr> 
<tr><td >PULM VALVE</td><td colspan="2"> : <?php echo $PULMVALUE?></td></tr>
<tr><td >TRICUSPID VALVE</td><td colspan="2"> : <?php echo $TRICISPIDVALUE?></td></tr>
<tr><td >I.A.S</td><td colspan="2"> : <?php echo $IAS?></td></tr>
<tr><td >I.V.S</td><td colspan="2"> : <?php echo $IVS?></td></tr>
<tr><td >AORTIC ROOT</td><td > : <?php echo $AORTICROOT."&nbsp;cm" ?></td><td >AORTIC OPENING</td><td > : <?php echo $AORTICOPENING."&nbsp;cm"?></td></tr>
<tr><td >LT.ATRIUM</td><td > : <?php echo $LTATRIUM."&nbsp;cm" ?></td><td >RVOT</td><td > : <?php echo $RVOT."&nbsp;cm"?></td></tr>
<tr><td >IVS THICKNESS</td><td > : <?php echo $IVSTHICKNESS."&nbsp;cm" ?></td><td >LVPW THICKNESS</td><td > : <?php echo $LVPWTHICKNESS."&nbsp;cm"?></td></tr>
<tr><td colspan="4"><b>LEFT VENTRICLE</b></td></tr>
<tr><td >LVIDo</td><td > : <?php echo $LVIDo."&nbsp;cm" ?></td><td colspan="2" >LVIDs: <?php echo $LVDIs."&nbsp;cm"?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RVIDd :<?php echo $RVDId."&nbsp;cm"?></td></tr>


<tr><td >EDV</td><td > : <?php echo $EDV."&nbsp;ml" ?></td><td >ESV</td><td > : <?php echo $ESV."&nbsp;ml"?></td></tr>
<tr><td >EF</td><td > : <?php echo $EF."&nbsp;%" ?></td><td >FS</td><td > : <?php echo $FS."&nbsp;%"?></td></tr>
<tr><td >LVM</td><td > : <?php echo $LVM."&nbsp;gm" ?></td><td >EPSS</td><td > : <?php echo $EPSS."&nbsp;mm"?></td></tr>

<tr><td >RIGHT ATRIUM</td><td colspan="2"> : <?php echo $RIGHTATRIUM?></td></tr> 
<tr><td >RIGHT VENTRICLE</td><td colspan="2"> : <?php echo $RIGHTVENTRICLE ?> </td></tr> 
<tr><td >PUL ARTERY</td><td colspan="2"> : <?php echo $PULARTERY?></td></tr>
<tr><td >PERICARDIUM</td><td colspan="2"> : <?php echo $PERICARDIUM?></td></tr>

<tr><td colspan="4"><b>DOPPLER</b></td></tr>
<tr><td >MITRAL VELOCITY</td><td > :E <?php echo $MITRALVELOCITYE."&nbsp;m/s" ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A :<?php echo $MITRALVELOCITYA."&nbsp;m/s";?></td></tr>
<tr><td >AORTIC VELOCITY</td><td > :<?php echo $AORTICVELOCITY."&nbsp;m/s" ?></td></tr>
<tr><td >PULMONARY VELOCITY</td><td > :<?php echo $PULMONARYVELOCITY."&nbsp;m/s" ?></td></tr>
<tr><td >TRICUSPID VELOCITY</td><td > :<?php echo $TRICUSPIDVELOCITY."&nbsp;m/s" ?></td></tr>
<tr><td >TRJET VELOCITY</td><td > :<?php echo $TRJETVELOCITY."&nbsp;m/s" ?></td></tr>
<tr><td >CONCLUSION</td><td colspan="3"> :<?php echo $CONCLUSION ?></td></tr>
<tr><td colspan="4" align="right">Dr <?php echo $DOCTOR."MD.,DM" ?></td></tr>
<tr><td colspan="4" align="right">CONSULTANT CARDIOLOGIST</td></tr>
<tr height="42"></tr>
 <tr><td colspan="4" height="40"></tr>
<tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
<tr><td colspan="4" align="right"> Authorised Signature</tr>
		</table>
		</div>    
    </div>
	
	<?php
	}
	
	
	if($emp_id1 == "COMPLETE URINE EXAMINATION(CUE)"){	
	
	$sql2 = mysqli_query($link,"select * from cue where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$CUECOLOUR = $row2['COLOUR'];
		$CUEAPPEARANCE = $row2['APPEARANCE'];
		$CUEREACTION = $row2['REACTION'];
		$CUESPECIFIC_GRAVITY = $row2['SPECIFIC_GRAVITY'];
		$CUESUGAR = $row2['SUGAR'];
		$CUEALBUMIN = $row2['ALBUMIN'];
		$CUEBILE_SALTS = $row2['BILE_SALTS'];
		$CUEBILE_PIGMENTS = $row2['BILE_PIGMENTS'];
		$CUEUROBILINOGEN = $row2['UROBILINOGEN'];
		$CUEKETONES = $row2['KETONES'];
		$CUERBC = $row2['RBC'];
		$CUEPUSCELLS = $row2['PUSCELLS'];
		$CUEEPITHELIAL_CELL = $row2['EPITHELIAL_CELL'];
		$CUECASTS = $row2['CASTS'];
		$CUECRYSTALS = $row2['CRYSTALS'];
		$CUEOTHERS = $row2['OTHERS'];
		
		}
                                    
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  colspan="3"> : <b><?php echo $dname ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center"><b><u>COMPLETE URINE EXAMINATION</u></b></tr>
<tr><td colspan="2"><b><u>PHYSICAL EXAMINATION:</u></b></td></tr>
<tr><td >COLOUR</td><td > : <?php echo $CUECOLOUR ?></td></tr>
<tr><td>APPEARANCE</td><td align="left"> : <?php echo $CUEAPPEARANCE ?></td></tr>
<tr><td>REACTION</td><td align="left"> : <?php echo $CUEREACTION ?></td></tr>        
<tr><td>SPECIFIC GRAVITY</td><td align="left"> : <?php echo $CUESPECIFIC_GRAVITY ?></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>SUGAR</td><td align="left"> : <?php echo $CUESUGAR ?></td></tr>
<tr><td>ALBUMIN</td><td align="left"> : <?php echo $CUEALBUMIN ?></td></tr>
<tr><td>BILE SALTS</td><td align="left"> : <?php echo $CUEBILE_SALTS ?></td></tr>		 		
<tr><td>BILE PIGMENTS</td><td> : <?php echo $CUEBILE_PIGMENTS ?></td></tr>	  				
<tr><td>UROBILINOGEN</td><td> : <?php echo $CUEUROBILINOGEN ?></td></tr>			
<tr><td>KETONES</td><td> : <?php echo $CUEKETONES ?></td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <?php echo $CUERBC ?>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <?php echo $CUEPUSCELLS ?>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <?php echo $CUEEPITHELIAL_CELL ?>  /HPF</td></tr> 
<tr><td>CASTS</td><td> : <?php echo $CUECASTS ?></td></tr> 
<tr><td>CRYSTALS</td><td> : <?php echo $CUECRYSTALS?></td></tr> 
<tr><td>OTHERS</td><td> : <?php echo $CUEOTHERS ?></td></tr> 
<tr><td colspan="3"><!--<img src="images/images.png" width="164" height="50"/>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
<tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	
	<?php
	}
	if($emp_id1 == "LIVER FUNCTION TEST"){	
	
	$sql2 = mysqli_query($link,"select * from lft where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$LFTTBILIRUBIN = $row2['TOTAL_BILIRUBIN'];
		$LFTDBILIRUBIN = $row2['DIRECT_BILIRUBIN'];
		$LFTIBILIRUBIN = $row2['INDIRECT_BILIRUBIN'];
		$LFTSGOT = $row2['SGOT'];
		$LFTSGPT = $row2['SGPT'];
		$LFTSAPHOSPHATE = $row2['S_ALKALINE_PHOSPHATE'];
		$LFTTPROTIENS = $row2['TOTAL_PROTIENS'];
		$LFTSALBUMIN = $row2['SERUM_ALBUMIN'];
		$LFTSGLOBULIN = $row2['SERUM_GLOBULIN'];
		$LFTAGRATIO = $row2['AG_Ratio'];
		
		}
                
                
              $mbs="select * from livernormal where lfid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$lfid=$row['lfid'];
$ltbv=$row['ltbv'];
$ldbv=$row['ldbv'];
$ldbt=$row['ldbt'];
$sgotv=$row['sgotv'];
$sgptv=$row['sgptv'];
$sgtt=$row['sgtt'];
$slv1=$row['slv1'];
$slv2=$row['slv2'];
$slv3=$row['slv3'];
$slv4=$row['slv4'];
$slv5=$row['slv5'];
$slvt=$row['slvt'];
$tpv=$row['tpv'];
$sav=$row['sav'];
$tpt=$row['tpt'];
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIOCHEMISTRY REPORT</u></b></tr>
<tr><td><br/></td></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="4" ><b><u>LIVER FUNCTION TEST</u></b></tr>
<tr><td colspan="2">TOTAL BILIRUBIN</td><td> : <?php echo $LFTTBILIRUBIN."&nbsp;&nbsp;".$ldbt  ?> </td><td><?php echo $ltbv."&nbsp;&nbsp;".$ldbt ?></td></tr> 
<tr><td colspan="2">DIRECT BILIRUBIN</td><td> : <?php echo $LFTDBILIRUBIN ."&nbsp;&nbsp;".$ldbt?></td><td><?php echo $ldbv."&nbsp;&nbsp;".$ldbt ?></td></tr> 
<tr><td colspan="2">INDIRECT BILIRUBIN</td><td> : <?php echo $LFTIBILIRUBIN ?> mg/dl</td><td></td></tr> 
<tr height="10px"></tr>
<tr><td colspan="2">SGOT </td><td> : <?php echo $LFTSGOT."&nbsp;&nbsp;".$sgtt ?> </td><td><?php echo $sgotv."&nbsp;&nbsp;".$sgtt ?></td></tr> 
<tr><td colspan="2">SGPT</td><td> : <?php echo $LFTSGPT ."&nbsp;&nbsp;".$sgtt?></td><td><?php echo $sgptv."&nbsp;&nbsp;".$sgtt ?></td></tr> 
<tr><td colspan="2">S.ALKALINE PHOSPHATE</td><td> : <?php echo $LFTSAPHOSPHATE ?>U/L </td><td><?php echo $slv1."&nbsp;&nbsp;".$slvt ?></td></tr> 
<tr><td colspan="2"></td><td></td><td><?php echo $slv2."&nbsp;&nbsp;".$slvt ?></td></tr> 
<tr><td colspan="2"></td><td></td><td><?php echo $slv3."&nbsp;&nbsp;".$slvt ?></td></tr> 
<tr><td colspan="2"></td><td></td><td><?php echo $slv4."&nbsp;&nbsp;".$slvt ?></td></tr> 
<tr><td colspan="2"></td><td></td><td><?php echo $slv5."&nbsp;&nbsp;".$slvt ?></td></tr> 
<tr height="5px"></tr>
<tr><td colspan="2">TOTAL PROTIENS </td><td> : <?php echo $LFTTPROTIENS ?> g/dl</td><td><?php echo $tpv."&nbsp;&nbsp;".$tpt ?></td></tr> 
<tr><td colspan="2">SERUM ALBUMIN</td><td> : <?php echo $LFTSALBUMIN ?> g/dl</td><td><?php echo $sav."&nbsp;&nbsp;".$tpt ?></td></tr> 
<tr><td colspan="2">SERUM GLOBULIN</td><td> : <?php echo $LFTSGLOBULIN ?></td><td></td></tr> 
<tr><td colspan="2">A/G  Ratio</td><td> : <?php echo $LFTAGRATIO ?></td><td></td></tr> 
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "MANTOUX TEST"){	
	
	$sql2 = mysqli_query($link,"select * from mantoux where bill_no='$bno'");
		if($sql2){
			
			$row2 = mysqli_fetch_array($sql2);
			$MANTOUXGIVENON = date('d-m-Y',strtotime($row2['given_on']));
			$MANTOUXREPORTNON = date('d-m-Y',strtotime($row2['report_on']));
			$MANTOUXRESULT = $row2['result'];
			
			}
                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" ><b><u>MANTOUX TEST REPORT</u></b></tr>

<tr><td ><b>Given on</b></td><td > : <?php echo $MANTOUXGIVENON ?></td></tr>
<tr><td><b>Report on</b></td><td align="left"> : <?php echo $MANTOUXREPORTNON ?></td></tr>
<tr height="10px"></tr>
<tr><td><b>Result</b></td><td align="left"> : <?php echo $MANTOUXRESULT ?></td></tr>
<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr><tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "C - Reactive Protein (CRP)"){	
	
	$sql2 = mysqli_query($link,"select * from crp where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$CRPRESULT = $row2['crp_result'];
		
		}?>
		<?php
$mbs="select * from crprange where crpid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$crpid=$row['crpid'];

$value=$row['value'];
$type=$row['type'];
       

                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		 <tr><td style="color:red;" colspan="4" align="center"><b><u>SEROLOGY REPORT:</u></b></td></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:15px;">TEST </u></b></td><td ><b><u style="font-size:15px;">RESULT </u></td><td><b><u style="font-size:15px;">REFERENCE RANGE </u></td></tr>
<tr height="5px"></tr>
<tr><td colspan="2">C - Reactive Protein (CRP)</td><td> : <?php echo $CRPRESULT ."&nbsp;&nbsp;".$type; ?></td><td> <?php echo  $value."&nbsp;&nbsp;".$type; ?></td></tr> 
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="4"><b>(Method:Immunoturbidimetric.)</b></td></tr>
<tr><td colspan="4"><br/><br/><br/><br/><br/><br/><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "Parasite F and V"){	
	
	$sql2 = mysqli_query($link,"select * from rmt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$RMTRESULT = $row2['rmt_result'];
		$RMTRESULT1 = $row2['rmt_result1'];
		
		}
       

                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		  <tr height="20"></tr>
		 <tr><td style="color:red;" colspan="4" align="center"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr height="5px"></tr>
  <tr height="20"></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr><td colspan="2">Parasite F  : </td><td colspan="2"><pre><?php echo $RMTRESULT ?></pre></td></tr> 
<tr><td colspan="2">Parasite V  : </td><td colspan="2"><pre><?php echo $RMTRESUL1 ?></pre></td></tr> 
<tr><td colspan="4"><b>(Rapid Plasmodium falciparum & vivax test)</b></td></tr>
<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "Smear for Malarial Parasite"){	
	
	$sql2 = mysqli_query($link,"select * from smp where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$SMPRESULT = $row2['smp_result'];
		
		}
       

                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		 <tr><td style="color:red;" colspan="4" align="center"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td colspan="2"><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr height="5px"></tr>
<tr><td colspan="2">Smear for Malarial Parasite  : </td><td colspan="2"><?php echo $SMPRESULT ?></td></tr> 
<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "SERUM AMYLASE"){	
	
	$sql2 = mysqli_query($link,"select * from amylase where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$SMAMYLASE = $row2['amylase_result'];
		
		}
                
                 $mbq="select * from serumamynirmal where said='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$said=$row['said'];
$savalue=$row['savalue'];
$satype=$row['satype'];

                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2">SERUM AMYLASE</td><td> : <?php echo $SMAMYLASE."&nbsp;&nbsp;".$satype;  ?></td><td><?php echo $savalue."&nbsp;&nbsp;".$satype; ?></td></tr> 
<tr><td colspan="4"><br></br></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "Absolute Eosinophil Count (AEC)"){	
	
	$sql2 = mysqli_query($link,"select * from aec where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$aecresult = $row2['aec_result'];
		
		}
                
                
                
                $mbq="select * from aecrange where aecid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$aecid=$row['aecid'];
$aecvalue=$row['aecvalue'];
$aectype=$row['aectype'];

                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr height="5px"></tr>
<tr><td colspan="2">Absolute Eosinophil Count (AEC)</td><td> : <?php echo $aecresult."&nbsp;&nbsp;".$aectype; ?> </td><td><?php echo $aecvalue."&nbsp;&nbsp;".$aectype; ?></td></tr> 
<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>
<tr><td colspan="3"><!--<img src="images/images.png" width="164" height="50"/>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "Erythrocyte Sedimentation Rate (ESR)"){	
	
	$sql2 = mysqli_query($link,"select * from esr where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$esrresult = $row2['esr_result'];
		
		}
                $mbq="select * from esrresult where esrid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$esrid=$row['esrid'];
$esrvalue=$row['esrvalue'];
$esrtype=$row['esrtype'];
                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2">Erythrocyte Sedimentation Rate(ESR)</td><td> : <?php echo $esrresult."&nbsp;&nbsp;".$esrtype; ?>  </td><td><?php echo $esrvalue."&nbsp;&nbsp;".$esrtype; ?></td></tr> 
		<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>
    <tr><td colspan="3"><!--<img src="images/images.png" width="164" height="50"/>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "Serum Electrolytes"){	
	
	$sql2 = mysqli_query($link,"select * from ele where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$sodium = $row2['sodium'];
		$potash = $row2['potash'];
		$chloride = $row2['chloride'];
		
		}
                 $mbq="select * from sele where seid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$seid=$row['seid'];
$svalue=$row['svalue'];
$pvalue=$row['pvalue']; 
$cvalue=$row['cvalue'];
$stype=$row['stype'];
                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2" ><b><u>Serum Electrolytes</u></b></tr>
<tr><td colspan="2">Sodium</td><td> : <?php echo $sodium ."&nbsp;&nbsp;".$stype;?> </td><td><?php echo $svalue."&nbsp;&nbsp;".$stype; ?></td></tr> 
<tr><td colspan="2">Potassium</td><td> : <?php echo $potash ."&nbsp;&nbsp;".$stype;?></td><td><?php echo $pvalue."&nbsp;&nbsp;".$stype; ?></td></tr> 
<tr><td colspan="2">Chloride</td><td> : <?php echo $chloride ."&nbsp;&nbsp;".$stype;?></td><td><?php echo $cvalue."&nbsp;&nbsp;".$stype; ?></td></tr> <tr><td colspan="3"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "Random Blood Sugar (RBS)"){	
	
	$sql2 = mysqli_query($link,"select * from rbs where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$rbs = $row2['rbs_result'];
		$rus = $row2['rus'];
		
		}
                
               $mbq="select * from rbsrange where rbsid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$rbsid=$row['rbsid'];
$rbsvalue=$row['rbsvalue'];
$rbstype=$row['rbstype']; 
                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2">Random Blood Sugar (RBS)</td><td> : <?php echo $rbs."&nbsp;&nbsp;".$rbstype; ?></td><td><?php echo $rbsvalue."&nbsp;&nbsp;".$rbstype; ?></td></tr> 
<tr><td colspan="2" >Random Urine Sugar</td><td> : <?php echo $rus ?></td></tr> 
		<tr><td colspan="4"><br></br></td></tr>
                <tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "Blood Urea"){	
	
	$sql2 = mysqli_query($link,"select * from burea where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$burea = $row2['burea_result'];
		
		}
                
                $mbq="select * from bunormals where buid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$buid=$row['buid'];
$buvalue=$row['buvalue'];
$butype=$row['butype'];
                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>


<tr><td >Blood Urea</td><td> : <?php echo $burea."&nbsp;&nbsp;".$butype; ?></td><td><?php echo $buvalue."&nbsp;&nbsp;".$butype; ?></td></tr> 
<tr><td colspan="4"></td><td><BR/></td></tr>
 <tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "Serum Creatinine"){	
	
	$sql2 = mysqli_query($link,"select * from creati where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$sresult = $row2['serum_result'];
		
		}
                
                $mbq="select * from creatinormals where cid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$cid=$row['cid'];
$cvalue=$row['cvalue'];
$ctype=$row['ctype'];
                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2">Serum Creatinine</td><td> : <?php echo $sresult."&nbsp;&nbsp;".$ctype; ?> </td><td><?php echo $cvalue."&nbsp;&nbsp;".$ctype; ?></td></tr> 
		
<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "SERUM CALCIUM"){	
	
	$sql2 = mysqli_query($link,"select * from calcium where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$calresult = $row2['cal_result'];
		
		}
                
                $mbq="select * from scnormal where scid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$scid=$row['scid'];
$scvalue=$row['scvalue'];
$sctype=$row['sctype'];
                     
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2">SERUM CALCIUM</td><td> : <?php echo $calresult ."&nbsp;&nbsp;".$sctype ?></td><td><?php echo $scvalue."&nbsp;&nbsp;".$sctype ?></td></tr>
<tr><td colspan="4"></td><td><BR/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "Prothrombin Time (PT)"){	
	
	$sql2 = mysqli_query($link,"select * from pt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$pttest = $row2['pt_time'];
		$ptcontrol = $row2['pt_control'];
		$ptinr = $row2['pt_inr'];
                     
                }
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>COAGULATION REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td colspan="2"><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr><td  colspan="4"><b><u>Prothrombin Time (PT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td colspan="2">Test</td><td colspan="2"> : <?php echo $pttest ?> seconds</td></tr> 
<tr><td colspan="2">Control</td><td colspan="2"> : <?php echo $ptcontrol ?> seconds</td></tr> 
<tr height="5px"></tr>
<tr><td colspan="2">INR</td><td colspan="2"> : <?php echo $ptinr ?></td></tr> 
		
<tr><td colspan="3"><!--<img src="images/images.png" width="164" height="50"/>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
		<tr><td colspan="4"><br/><br/><br/><br/><br/><br/></td></tr>
		<tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "Activated Partial Thromboplastin Time (APTT)"){	
	
	$sql2 = mysqli_query($link,"select * from aptt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$aptttest = $row2['aptt_time'];
		$apttcontrol = $row2['aptt_control'];
		
		}
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>COAGULATION REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td colspan="2"><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr><td  colspan="4"><b><u>Activated Partial Thromboplastin Time (APTT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td colspan="2">Test</td><td colspan="2"> : <?php echo $aptttest ?> seconds</td></tr> 
<tr><td colspan="2">Control</td><td colspan="2"> : <?php echo $apttcontrol ?> seconds</td></tr> 
<tr><td colspan="4"><br/><br/><br/><br/><br/><br/></td></tr>
				<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	//echo "hi welcome to you";
	if($emp_id1 == "Serum Uric Acid"){	
          //  echo "hi";
	
	$sql2 = mysqli_query($link,"select * from sua where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$suaresult = $row2['sua_result'];
		
		}
                $sql21 = mysqli_query($link,"select * from serumuricacidnormals where suaid='1'");
		while($r=  mysqli_fetch_array($sql21)){
                    
		$sum = $r['sum'];
                $sumv = $r['sumv'];
                $suf = $r['suf'];
                $sufv = $r['sufv'];
		$suaid = $r['suaid'];
		}
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		  <tr height="20"></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
		<tr height="20"></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr height="30"></tr>
<tr><td colspan="2">Serum Uric Acid</td><td> : <?php echo $suaresult ."&nbsp;&nbsp;".$sumv;?> </td><td>Male ::<?php echo $sum."&nbsp;&nbsp;".$sumv;?><br>Female :<?php echo $suf."&nbsp;&nbsp;". $sufv;?></td></tr> 
<tr><td colspan="3"></td><td><b><BR/></b></td></tr>
<tr height="100"></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "COMPLETE STOOL EXAMINATION"){	
	
	$sql2 = mysqli_query($link,"select * from cse where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$CSECOLOUR = $row2['COLOUR'];
		$CSECONSIST = $row2['CONSIST'];
		$CSEREACTION = $row2['REACTION'];
		$CSEMUCUS = $row2['MUCUS'];
		$CSEOCCULT_BLOOD = $row2['OCCULT_BLOOD'];
		$CSEREDUCING_SUBSTANCE = $row2['REDUCING_SUBSTANCE'];
		$CSERBC = $row2['RBC'];
		$CSEPUSCELLS = $row2['PUSCELLS'];
		$CSEEPITHELIAL = $row2['EPITHELIAL'];
		$CSEOVAS = $row2['OVAS'];
		$CSECYSTS = $row2['CYSTS'];
		$CSEOTHERS = $row2['OTHERS'];
		
		}
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>COMPLETE STOOL EXAMINATION</u></b></tr>

<tr><td colspan="4"><b><u>PHYSICAL EXAMINATION:</u></b></td></tr> 

<tr><td colspan="2">COLOUR</td><td colspan="2"> : <?php echo $CSECOLOUR ?></td></tr>
<tr><td colspan="2">CONSISTENCY</td><td align="left" colspan="2"> : <?php echo $CSECONSIST ?></td></tr>
<tr><td colspan="2">REACTION</td><td align="left colspan="2""> : <?php echo $CSEREACTION ?></td></tr>        
<tr><td colspan="2">MUCUS</td><td align="left" colspan="2"> : <?php echo $CSEMUCUS ?></td></tr>
<tr height="5px"></tr>
<tr><td colspan="4"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td colspan="2">OCCULT BLOOD</td><td align="left" colspan="2"> : <?php echo $CSEOCCULT_BLOOD ?></td></tr>
<tr><td colspan="2">REDUCING SUBSTANCE</td><td align="left" colspan="2"> : <?php echo $CSEREDUCING_SUBSTANCE ?></td></tr>
<tr height="5px"></tr>
<tr><td colspan="4"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td colspan="2">RBC</td><td colspan="2"> : <?php echo $CSERBC ?>  /HPF</td></tr> 
<tr><td colspan="2">PUSCELLS</td><td colspan="2"> : <?php echo $CSEPUSCELLS ?>  /HPF</td></tr> 
<tr><td colspan="2">EPITHELIAL CELL</td><td colspan="2"> : <?php echo $CSEEPITHELIAL ?>  /HPF</td></tr> 
<tr><td colspan="2">OVAS</td><td colspan="2"> : <?php echo $CSEOVAS ?></td></tr> 
<tr><td colspan="2">CYSTS</td><td colspan="2"> : <?php echo $CSECYSTS?></td></tr> 
<tr><td colspan="2">OTHERS</td><td colspan="2"> : <?php echo $CSEOTHERS ?></td></tr> 

<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"><!--<img src="images/images.png"/>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "HBsAg"){	
	
	$sql2 = mysqli_query($link,"select * from hbsag where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$hresult = $row2['hresult'];
		
		}
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
<tr><td ><b><u>TEST</u></b></tr>
<tr><td colspan="2">HBsAg </td><td colspan="2">  <?php echo $hresult ?></td></tr>
<tr><td <td colspan="4">><b>(Rapid Card Method)</b></tr>

<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "WIDAL"){	
	
	$sql2 = mysqli_query($link,"select * from widal where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$sto = $row2['sto'];
		$sth = $row2['sth'];
		$spah = $row2['spah'];
		$spbh = $row2['spbh'];
		
		}
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:15px;">TEST </u></b></td><td colspan="2"><b><u style="font-size:15px;">RESULT </u></td></tr>
<tr><td  colspan="4"><b>WIDAL TEST: </b></td></tr> 
<tr height="5px"></tr>
<tr><td colspan="2">Salmonella Typhi "O"</td><td colspan="2"> : <?php echo $sto ?></td></tr> 
<tr><td colspan="2">Salmonella Typhi "H"</td><td colspan="2"> : <?php echo $sth ?></td></tr> 
<tr><td colspan="2">Salmonella Paratyphi "AH"</td><td colspan="2"> : <?php echo $spah ?></td></tr> 
<tr><td colspan="2">Salmonella Paratyphi "BH"</td><td colspan="2"> : <?php echo $spbh ?></td></tr> 

<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "HAEMOGLOBIN"){	
	
	$sql2 = mysqli_query($link,"select * from haemo where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$haresult = $row2['haresult'];
		
		}
                
                $mbs="select * from hemgnormals where hmgid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$hmgid=$row['hmgid'];
$hmdm=$row['hmdm'];
$hmdf=$row['hmdf'];
    $hmdtype=$row['hmdtype'];
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td >HAEMOGLOBIN</td><td> : <?php echo $haresult ?> % </td><td>Male : <?php echo $hmdm."&nbsp;&nbsp;".$hmdtype; ?><br>Female : <?php echo $hmdf."&nbsp;&nbsp;".$hmdtype; ?></td></tr> 
		
    <tr><td colspan="3"><!--<img src="images/images.png" width="164" height="50"/>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "RFT"){	
	
	$sql2 = mysqli_query($link,"select * from rft where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$rftrbs = $row2['rft_rbs'];
		$rftbu = $row2['rft_bu'];
		$rftscr = $row2['rft_scr'];
		$rftsua = $row2['rft_sua'];
		$rftsc = $row2['rft_sc'];
		$rftsodium = $row2['rft_sodium'];
		$rftpotash = $row2['rft_potash'];
		$rft_chloride = $row2['rft_chloride'];
		}
                
                
                
                
                
                
                $r1=  mysqli_query($link,"select * from rbsrange where rbsid='1'") or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$rbsid1=$row['rbsid'];
$rbsvalue1=$row['rbsvalue'];
$rbstype1=$row['rbstype'];
    
$r1=  mysqli_query($link,"select * from bunormals where buid='1'") or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$buid1=$row['buid'];
$buvalue1=$row['buvalue'];
$butype1=$row['butype'];

$r1=  mysqli_query($link,"select * from creatinormals where cid='1'") or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$cid1=$row['cid'];
$cvalue2=$row['cvalue'];
$ctype1=$row['ctype'];

$sql21 = mysqli_query($link,"select * from serumuricacidnormals where suaid='1'");
		while($r=  mysqli_fetch_array($sql21)){
                    
		$sum1 = $r['sum'];
                $sumv1 = $r['sumv'];
                $suf1 = $r['suf'];
                $sufv1 = $r['sufv'];
		$suaid1 = $r['suaid'];
		}
$r1=  mysqli_query($link,"select * from scnormal where scid='1'") or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$scid1=$row['scid'];
$scvalue1=$row['scvalue'];
$sctype1=$row['sctype'];



$r1=  mysqli_query($link,"select * from sele where seid='1'") or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$seid1=$row['seid'];
$svalue1=$row['svalue'];
$pvalue1=$row['pvalue']; 
$cvalue1=$row['cvalue'];
$stype1=$row['stype'];
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td style="color:red;" colspan="2"><b><u>RFT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td colspan="2">Random Blood Sugar (RBS)</td><td> : <?php echo $rftrbs."&nbsp;&nbsp;".$rbstype1; ?> </td><td><?php echo $rbsvalue1."&nbsp;&nbsp;".$rbstype1; ?></td></tr> 
<tr><td colspan="2">Blood Urea</td><td> : <?php echo $rftbu."&nbsp;&nbsp;".$butype1; ?> </td><td><?php echo $buvalue1."&nbsp;&nbsp;".$butype1; ?></td></tr> 
<tr><td colspan="2">Serum Creatinine</td><td> : <?php echo $rftscr ."&nbsp;&nbsp;".$ctype1;?> </td><td><?php echo $cvalue2."&nbsp;&nbsp;".$ctype1; ?></td></tr> 
<tr><td colspan="2">Serum Uric Acid</td><td> : <?php echo $rftsua ."&nbsp;&nbsp;".$sumv1;?></td><td>Male : <?php echo $sum1."&nbsp;&nbsp;".$sumv1;?><br>Female :<?php echo $suf1."&nbsp;&nbsp;". $sufv1;?> </td></tr> 
<tr><td colspan="2">Serum Calcium</td><td> : <?php echo $rftsc ."&nbsp;&nbsp;".$sctype1 ?> </td><td><?php echo $scvalue1."&nbsp;&nbsp;".$sctype1 ?></td></tr> 
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>Serum Electrolytes:</u></b></td></tr>

<tr><td colspan="2">Serum Sodium</td><td> : <?php echo $rftsodium ."&nbsp;&nbsp;".$stype1;?> </td><td><?php echo $svalue1."&nbsp;&nbsp;".$stype1; ?></td></tr> 
<tr><td colspan="2">Serum Potassium</td><td> : <?php echo $rftpotash."&nbsp;&nbsp;".$stype1; ?> </td><td><?php echo $pvalue1."&nbsp;&nbsp;".$stype1; ?></td></tr> 
<tr><td colspan="2">Serum Chloride</td><td> : <?php echo $rft_chloride."&nbsp;&nbsp;".$stype1; ?> </td><td><?php echo $cvalue1."&nbsp;&nbsp;".$stype1; ?></td></tr> 
		<tr height="50"></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "Reducing Substance"){	
	
	$sql2 = mysqli_query($link,"select * from rsub where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$rsub = $row2['rsub'];
		
		}
                       
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td colspan="2" ><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr><td colspan="2">Reducing Substance</td><td align="left" colspan="2"> : <?php echo $rsub ?></td></tr>
<tr><td colspan="3"></td><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "SERUM BILIRUBIN"){	
	
	$sql2 = mysqli_query($link,"select * from sbil where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$tbil = $row2['tbil'];
		$dbil = $row2['dbil'];
		$ibil = $row2['ibil'];
		}
                
                $mbs="select * from sbillnormal where sbid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$sbid=$row['sbid'];
$tbif=$row['tbif'];
$tbad=$row['tbad'];
    $dbif=$row['dbif'];
     $dbad=$row['dbad'];
     $sbtype=$row['sbtype'];     
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td style="color:red;" colspan="2"><b><u>Serum Bilirubin : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td colspan="2">Total Bilirubin</td><td> : <?php echo $tbil."&nbsp;&nbsp;".$sbtype ?> </td><td>infants: <?php echo $tbif."&nbsp;&nbsp;".$sbtype ?><br>adults: <?php echo $tbad."&nbsp;&nbsp;".$sbtype ?></td></tr> 
<tr><td colspan="2">Direct Bilirubin</td><td> : <?php echo $dbil."&nbsp;&nbsp;".$sbtype ?> </td><td>infants: <?php echo $dbif."&nbsp;&nbsp;".$sbtype ?><br>adults: <?php echo $dbad."&nbsp;&nbsp;".$sbtype ?></td></tr> 
<tr><td colspan="2">Indirect Bilirubin</td><td> : <?php echo $ibil."&nbsp;&nbsp;".$sbtype ?> </td><td></td></tr> 
<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "BLEEDING TIME AND CLOTTING TIME"){	
	
			 
	$sql2 = mysqli_query($link,"select * from btct where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$bt = $row2['btime'];
		$ct = $row2['ctime'];
		
		}
                
                 $mbs="select * from bleedingnormal where bdlid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$bdlid=$row['bdlid'];
$btv=$row['btv'];
$ctv=$row['ctv'];   
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>HAEMATOLOGY REPORT</u></b></tr>
<tr><td align="left" colspan="2" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2">Bleeding Time(BT)</td><td> : <?php echo $bt ?></td><td><?php echo $btv; ?></td></tr> 
<tr><td colspan="2">Clotting Time(CT)</td><td> : <?php echo $ct ?></td><td><?php echo $ctv; ?></td></tr> 
	<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "BLOOD GROUP"){	
	
			$sql2 = mysqli_query($link,"select * from bgroup where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$bgroup = $row2['bgrp'];
		$rht = $row2['rhtype'];
		
		}
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr><td>Blood Group </td><td> : <b>"<?php echo $bgroup ?>"</b></td></tr> 
<tr height="5px"></tr>
<tr><td>Rh Typing</td><td> : <b><?php echo $rht ?></b></td></tr> 
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	//echo "hi";
	if($emp_id1 == "BLOOD SUGAR(FBS,PLBS)"){	
	//echo "hi welcome ";
            $sql2 = mysqli_query($link,"select * from bsugar where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$fbs = $row2['fbs'];
		$fus = $row2['fus'];
		$plbs = $row2['plbs'];
		$plus = $row2['plus'];
		
		      }
                $mbs="select * from bsugarnormals where bsid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$bsid=$row['bsid'];
$fbsvalue=$row['fbsvalue'];
$plbsvalue=$row['plbsvalue'];
$type=$row['type'];
                         
                     ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		  <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
	<tr height="20"></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr height="20"></tr>
<tr><td colspan="2">Fasting Blood Sugar</td><td> : <b><?php echo $fbs ."&nbsp;&nbsp;".$type;?></b> </td><td><?php echo $fbsvalue."&nbsp;&nbsp;".$type; ?></td></tr> 
<tr><td colspan="2">Fasting Urine Sugar</td><td> : <b><?php echo $fus ?></b></td></tr> 
<tr><td colspan="2">Post Lunch Bloob Sugar</td><td> : <b><?php echo $plbs ."&nbsp;&nbsp;".$type;?></b> </td><td><?php echo $plbsvalue."&nbsp;&nbsp;".$type; ?></td></tr> 
<tr><td colspan="2">Post Lunch Urine Sugar </td><td> : <b><?php echo $plus ?></b></td></tr> 
<tr height="100"></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "HIV 1 AND 2"){	
	
			$sql2 = mysqli_query($link,"select * from hiv where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$hiv = $row2['hiv'];
		
		}
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
<tr><td  ><b><u>TEST</u></b></tr>
<tr><td>HIV I & II</td><td> : <?php echo $hiv ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "HCV"){	
	
			$sql2 = mysqli_query($link,"select * from hcv where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$hcv = $row2['hcv'];
		
		}
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
<tr><td  ><b><u>TEST</u></b></tr>
<tr><td>HCV</td><td> : <?php echo $hcv ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "VDRL"){	
	
		$sql2 = mysqli_query($link,"select * from vdrl where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$vdrl = $row2['vdrl'];
		
		}
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
<tr><td  ><b><u>TEST</u></b></tr>
<tr><td>VDRL</td><td> : <?php echo $vdrl ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "LIPID PROFILE"){	
	
		$sql2 = mysqli_query($link,"select * from lprofile where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$sch = $row2['sch'];
		$hch = $row2['hch'];
		$lch = $row2['lch'];
		$vch = $row2['vch'];
		$stri = $row2['stri'];
		$tch = $row2['tch'];
		
		}
                
                 $mbs="select * from lipidnormal where lpdid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$lpdid=$row['lpdid'];
$lpsn=$row['lpsn'];
$lpsb=$row['lpsb'];
$lpse=$row['lpse'];
$lpst=$row['lpst'];
$lphv=$row['lphv'];
$lpht=$row['lpht'];
$lpl1=$row['lpl1'];
$lpl2=$row['lpl2'];
$lplt=$row['lplt'];
$lpvv=$row['lpvv'];
$lpvt=$row['lpvt'];
$lpstn=$row['lpstn'];
$lpstb=$row['lpstb'];
$lpsth=$row['lpsth'];
$lpstt=$row['lpstt'];
$lplthn=$row['lplthn'];
$lplthb=$row['lplthb'];
$lpltht=$row['lpltht'];
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">NORMAL RANGE </u></td></tr>
<tr><td valign="top" colspan="2">Serum Cholesterol</td><td valign="top"> : <?php echo $sch ?> mg/dl</td><td ><?php echo $lpsn."&nbsp;&nbsp;".$lpst ?><br><?php echo $lpsb."&nbsp;&nbsp;".$lpst ?><br><?php echo $lpse."&nbsp;&nbsp;".$lpst ?></td></tr> 
<tr height="5px"></tr>
<tr><td valign="top" colspan="2">HDL Cholesterol</td><td valign="top"> : <?php echo $hch ?> mg/dl</td><td><?php echo $lphv."&nbsp;&nbsp;".$lpht ?></td></tr> 
<tr height="5px"></tr>
<tr><td valign="top" colspan="2">LDL Cholesterol</td><td valign="top"> : <?php echo $lch ?> mg/dl</td><td><?php echo $lpl1."&nbsp;&nbsp;".$lplt ?><br><?php echo $lpl2."&nbsp;&nbsp;".$lpst ?></td></tr> 
<tr height="5px"></tr>
<tr><td valign="top" colspan="2">VLDL Cholesterol</td><td valign="top"> : <?php echo $vch ?> mg/dl</td><td><?php echo $lpvv."&nbsp;&nbsp;".$lpvt ?></td></tr> 
<tr height="5px"></tr>
<tr><td valign="top" colspan="2">Serum Triglycerides</td><td valign="top"> : <?php echo $stri ?> mg/dl</td><td><?php echo $lpstn."&nbsp;&nbsp;".$lpstt ?><br><?php echo $lpstb."&nbsp;&nbsp;".$lpstt ?><br><?php echo $lpsth."&nbsp;&nbsp;".$lpstt ?></td></tr> 
<tr height="5px"></tr>
<tr><td valign="top" colspan="2">T.CHOL / HDL RATIO</td><td valign="top"> : <?php echo $tch ?></td><td><?php echo $lplthn ?></br><?php echo $lplthb ?><br> <?php echo $lpltht ?></td></tr> 
		
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
		if($emp_id1 == "SPUTUM FOR AFB"){	
	
		$sql2 = mysqli_query($link,"select * from safb where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$safb = $row2['safb'];
		
		}
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>MICROBIOLOGY REPORT</u></b></tr>
<tr><td  ><b><u>TEST</u></b></tr>
<tr><td>Sputum for AFB</td><td> : <?php echo $safb ?></td></tr> 


<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
		if($emp_id1 == "PLATELET COUNT"){	
	
		$sql2 = mysqli_query($link,"select * from pcount where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$pcount = $row2['pcount'];
		
		}
                
                $mbs="select * from plaeletnormals where plid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$plid=$row['plid'];
$plvalue=$row['plvalue'];
$pltype=$row['pltype'];
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>

<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>PLATELET COUNT</td><td> : <?php echo $pcount."&nbsp;&nbsp;".$pltype; ?> </td><td><?php echo $plvalue."&nbsp;&nbsp;".$pltype; ?></td></tr>
	<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	
		if($emp_id1 == "SERUM CHOLESTEROL"){	
	
		$sql2 = mysqli_query($link,"select * from schole where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$schole = $row2['schole'];
		
		}
                
                
                 $mbs="select * from schnormals where schid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$schid=$row['schid'];
$schnormal=$row['schnormal'];
$schborderline=$row['schborderline'];
    $schevelated=$row['schevelated'];
    $schtype=$row['schtype'];
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>SEROLOGY</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>Serum Cholesterol</td><td> : <?php echo $schole ?> mg/dl</td><td><?php echo $schnormal."&nbsp;&nbsp;".$schtype ?><br/><?php echo $schborderline."&nbsp;&nbsp;".$schtype ?></td></tr> 
		
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "SERUM TRYGLYCERIDES"){	
	
		$sql2 = mysqli_query($link,"select * from strig where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$strig = $row2['strig'];
		
		}
                
                $mbs="select * from strignormals where stid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$stid=$row['stid'];
$stn=$row['stn'];
$stb=$row['stb'];
    $sth=$row['sth'];
    $stt=$row['stt'];
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>Serum Triglycerides</td><td> : <?php echo $strig."&nbsp;&nbsp;".$stt; ?> </td><td><?php echo $stn."&nbsp;&nbsp;".$stt; ?><br><?php echo $stb."&nbsp;&nbsp;".$stt; ?><br><?php echo $sth."&nbsp;&nbsp;".$stt; ?></td></tr> 
	<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>


		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "ALKALINE PHOSPHATE"){	
	$sql2 = mysqli_query($link,"select * from aphos where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$aphos = $row2['aphos'];
		
		}
                 $mbs="select * from aphosnormals where apid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$apid=$row['apid'];
$apv=$row['apv'];
$apv1=$row['apv1'];
$apv2=$row['apv2'];
$apv3=$row['apv3'];
$apv4=$row['apv4'];
$apt=$row['apt'];
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		  <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
	<tr height="20"></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr height="20"></tr>
<tr><td colspan="2">ALKALINE PHOSPHATE</td><td> : <?php echo $aphos ?> U/L</td><td><?php echo $apv."&nbsp;&nbsp;".$apt ?></td></tr> 
<tr><td colspan="2"></td><td> </td><td><?php echo $apv1."&nbsp;&nbsp;".$apt ?></td></tr>
<tr><td colspan="2"></td><td> </td><td><?php echo $apv2."&nbsp;&nbsp;".$apt ?></td></tr>
 <tr><td colspan="2"></td><td> </td><td><?php echo $apv3."&nbsp;&nbsp;".$apt ?></td></tr>
<tr><td colspan="2"></td><td> </td><td><?php echo $apv4."&nbsp;&nbsp;".$apt ?></td></tr>

<tr height="60"></tr>
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>


		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "TOTAL PROTIENS"){	
	$sql2 = mysqli_query($link,"select * from tprt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$tprt = $row2['tprt'];
		
		}
                                
                 $mbs="select * from tprtnormal where tpid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$tpid=$row['tpid'];
$tpva=$row['tpva'];
$tpty=$row['tpty'];
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td>TOTAL PROTIENS </td><td> : <?php echo $tprt."&nbsp;&nbsp;".$tpty; ?> g/dl</td><td><?php echo $tpva."&nbsp;&nbsp;".$tpty; ?></td></tr> 


<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>


		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "Smear for Microfilaria"){	
	$sql2 = mysqli_query($link,"select * from smicro where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$smicro = $row2['smicro'];
		
		}
                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr> <td colspan="2">TEST</td></tr>
<tr><td>Smear for Microfilaria</td><td colspan="2"> : <?php echo $smicro ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "WBC Count"){	
	$sql2 = mysqli_query($link,"select * from wbccount where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$wbccount = $row2['wbccount'];
		
		}
                
$mbq="select * from wbccountrange where wbcid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$wbcid=$row['wbcid'];
$wbcvalue=$row['wbcvalue'];
$wbctype=$row['wbctype'];
                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
          <tr><td colspan="4" align="center" ><hr/></b></tr>
	<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
        <tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;" colspan="2">REFERENCE RANGE </u></td></tr>

<tr><td colspan="2">WBC Count</td><td> : <?php echo $wbccount."&nbsp;&nbsp;".$wbctype ?> </td><td colspan="2"><?php echo $wbcvalue."&nbsp;&nbsp;".$wbctype ?></td></tr>  
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "Peripheral Smear"){	
	$sql2 = mysqli_query($link,"select * from peri where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$psrbc = $row2['psrbc'];
		$pswbc = $row2['pswbc'];
		$psplatelets = $row2['psplatelets'];
		
		}
                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
	<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>

<tr><td style="color:red;" colspan="2"><b><u>Peripheral Smear : </u></b></td></tr>
<tr height="5px"></tr>
<tr><td>RBC</td><td> : <?php echo $psrbc ?></td></tr>        
<tr><td>WBC</td><td> : <?php echo $pswbc ?></td></tr>        
<tr><td>Platelets</td><td> : <?php echo $psplatelets ?></td></tr>    

<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "FBS"){	
$sql2 = mysqli_query($link,"select * from fbs where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$fbss = $row2['fbss'];
		$fuss = $row2['fuss'];
		
		}
                
                 $mbs="select * from fbsnormal where fbsid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$fbsid=$row['fbsid'];
$fbsvalue=$row['fbsvalue'];
$fbstype=$row['fbstype'];
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
          <tr><td colspan="4"><hr></td></tr>
	<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td colspan="2">Fasting Blood Sugar</td><td> : <?php echo $fbss."&nbsp;&nbsp;".$fbstype  ?> </td><td><?php echo $fbsvalue."&nbsp;&nbsp;".$fbstype ?></td></tr> 
<tr><td colspan="2">Fasting Urine Sugar</td><td> : <?php echo $fuss ?></td></tr> 
	<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	
	
	if($emp_id1 == "PLBS"){	
$sql2 = mysqli_query($link,"select * from plbs where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$plbss = $row2['plbss'];
		$pluss = $row2['pluss'];
		
		}
                
                $mbq="select * from plbsnormals where plbsid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$plbsid=$row['plbsid'];
$plbsvalue=$row['plbsvalue'];
$plbstype=$row['plbstype'];
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
          <tr><td colspan="4" ><b><hr></b></tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
        <tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td colspan="2">Post Lunch Bloob Sugar</td><td> : <?php echo $plbss."&nbsp;&nbsp;".$plbstype ?> </td><td><?php echo $plbsvalue."&nbsp;&nbsp;".$plbstype ?></td></tr> 
<tr><td colspan="2">Post Lunch Urine Sugar </td><td> : <?php echo $pluss ?></td></tr> 
		<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "ASO TITRE"){	
$sql2 = mysqli_query($link,"select * from aso where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$aso = $row2['aso'];
		
		}
		
		
		$mbs="select * from asonormals where aid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$aid=$row['aid'];
$avalue=$row['avalue'];
$atype=$row['atype'];
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		  <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
	<tr height="50"></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td colspan="2">ASO TITRE</td><td> : <?php echo $aso."&nbsp;&nbsp;".$atype; ?></td><td><?php echo $avalue."&nbsp;&nbsp;".$atype; ?></tr> 
<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	
	if($emp_id1 == "RA FACTOR"){	
		
	$sql2 = mysqli_query($link,"select * from raf where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$raf = $row2['raf'];
		
		}
           $mbs="select * from rafnormals where rfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$rfid=$row['rfid'];
$rfvalue=$row['rfvalue'];
$rftype=$row['rftype'];                          ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		  <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
	 <tr height="50"></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td colspan="2">RA FACTOR</td><td> : <?php echo $raf."&nbsp;&nbsp;".$rftype ?></td><td><?php echo $rfvalue."&nbsp;&nbsp;".$rftype ?></td></tr> 
 <tr height="50"></tr>
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	
	
	if($emp_id1 == "HBA1C"){	
		$sql2 = mysqli_query($link,"select * from hba where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$hba = $row2['hba'];
		
		}
                
                $mbs="select * from hbanormal where hbaid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$hbaid=$row['hbaid'];
$hbavalue=$row['hbavalue'];
$hbatype=$row['hbatype'];
$hbavalue1=$row['hbavalue1'];
$hbavalue2=$row['hbavalue2'];
$hbavalue3=$row['hbavalue3'];                
                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		  <tr height="10"></tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
	<tr height="50"></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td >HBA1C</td><td> : <?php echo $hba."&nbsp;&nbsp;".$hbatype; ?></td><td><?php echo $hbavalue."&nbsp;&nbsp;".$hbatype; ?>
<br/>
<?php echo $hbavalue1."&nbsp;&nbsp;".$hbatype; ?><br/><?php echo $hbavalue2."&nbsp;&nbsp;".$hbatype; ?><br/><?php echo $hbavalue3."&nbsp;&nbsp;".$hbatype; ?>
</td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
<tr height="100"></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "COOMBS TEST(DIRECT)"){	
		$sql2 = mysqli_query($link,"select * from ctd where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$ctd = $row2['ctd'];
		
		}
                
                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>

<tr><td>COOMBS TEST (DIRECT)</td><td> : <?php echo $ctd ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	
	if($emp_id1 == "COOMBS TEST(INDIRECT)"){	
		$sql2 = mysqli_query($link,"select * from ctid where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$ctid = $row2['ctid'];
		
		}
                
                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>

<tr><td>COOMBS TEST(INDIRECT)</td><td> : <?php echo $ctid ?></td></tr> 

<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "COOMBS TEST(INDIRECT)"){	
		$sql2 = mysqli_query($link,"select * from ctid where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$ctid = $row2['ctid'];
		
		}
                
                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td colspan="2"><b><u style="font-size:12px;">RESULT </u></td></tr>

<tr><td colspan="2">COOMBS TEST(INDIRECT)</td><td colspan="2"> : <?php echo $ctid ?></td></tr> 

<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "PACKED CELL VOLUME(PCV)"){	
		$sql2 = mysqli_query($link,"select * from pcv where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$pcv = $row2['pcv'];
		
		}
                
                $mbs="select * from pcvnormals where pcvid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$pcvid=$row['pcvid'];
$pcvm=$row['pcvm'];
$pcvf=$row['pcvf'];
$pcvtype=$row['pcvtype'];
                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td >PACKED CELL VOLUME(PCV)</td><td> : <?php echo $pcv."&nbsp;&nbsp;".$pcvtype ?></td><td>Males :<?php echo $pcvm."&nbsp;&nbsp;".$pcvtype; ?><br>Females : <?php echo $pcvf."&nbsp;&nbsp;".$pcvtype; ?></td></tr> 
		<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	
		if($emp_id1 == "SERUM POTASSIUM"){	
		$sql2 = mysqli_query($link,"select * from spotash where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$spotash = $row2['spotash'];
		
		}
                
                
               $mbs="select * from spnormals where spid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$spid=$row['spid'];
$spvalue=$row['spvalue'];
$sptype=$row['sptype'];

                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
<td > : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype ?></b></td>
          
          </tr>
	<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>Serum Potassium</td><td><?php echo $spotash."&nbsp;&nbsp;".$sptype; ?></td><td> <?php echo $spvalue."&nbsp;&nbsp;".$sptype; ?></td></tr> 


<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "RETI COUNT"){	
		$sql2 = mysqli_query($link,"select * from reticount where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$rtvalue1 = $row2['rtvalue'];
		
		}
                
                
               $mbs="select * from retinormals where rtid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$rtid=$row['rtid'];
$rtvalue=$row['rtvalue'];
$rttype=$row['rttype'];
$note=$row['note'];

                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		   <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>HAEMOTOLOGY REPORT</u></b></tr>
	  <tr height="40"></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">BIOLOGICAL REFERENCE INTERVALS  </u></td></tr>
<tr><td colspan="2">Reticulocyte Count </td><td><?php echo $rtvalue1."&nbsp;&nbsp;".$rttype; ?></td><td> <?php echo $rtvalue."&nbsp;&nbsp;".$rttype; ?></td></tr> <tr><td colspan="4">Method :Microscopy (Methylene Blue Stain)</td></tr>
<tr height="20"> </tr>
<tr><td colspan="4"><textarea  rows="5" cols="90" readonly><?php  echo $note;?></textarea></td></tr>
<tr><td colspan="4"><br/><br/></td></tr>
<tr height="40"> </tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr>
		<tr><td colspan="4"><b>Kindly Correlate Clinically,if there's a need discuss.</b></td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "SGPT"){	
		$sql2 = mysqli_query($link,"select * from sgpt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$sgptva = $row2['sgptva'];
		
		}
                
                
             $mbs="select * from livernormal where lfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$lfid=$row['lfid'];
$sgptv=$row['sgptv'];
$sgtt=$row['sgtt'];

                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		   <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>BIOCHEMISTRY REPORT</u></b></tr>
	  <tr height="40"></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2">SGPT </td><td><?php echo $sgptva."&nbsp;&nbsp;".$sgtt; ?></td><td> <?php echo $sgptv."&nbsp;&nbsp;".$sgtt; ?></td></tr> 
<tr height="50"> </tr>

<tr><td colspan="4"><br/><br/></td></tr>
<tr height="40"> </tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr>
		<tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "LFT(SGOT SGPT)"){	
		$sql2 = mysqli_query($link,"select * from sgopt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$sgptva = $row2['sgptva'];
		$sgotva = $row2['sgotva'];
		
		}
                
                
             $mbs="select * from livernormal where lfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$lfid=$row['lfid'];
$sgptv=$row['sgptv'];
$sgotv=$row['sgotv'];
$sgtt=$row['sgtt'];

                
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		   <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>BIOCHEMISTRY REPORT</u></b></tr>
	  <tr height="40"></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2">SGOT </td><td><?php echo $sgotva."&nbsp;&nbsp;".$sgtt; ?></td><td> <?php echo $sgotv."&nbsp;&nbsp;".$sgtt; ?></td></tr> 
<tr><td colspan="2">SGPT </td><td><?php echo $sgptva."&nbsp;&nbsp;".$sgtt; ?></td><td> <?php echo $sgptv."&nbsp;&nbsp;".$sgtt; ?></td></tr> 
<tr height="50"> </tr>

<tr><td colspan="4"><br/><br/></td></tr>
<tr height="40"> </tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr>
		<tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "FLUID EXAMINATION-ROUTINE(PLEURAL FLUID)"){	
		$sql2 = mysqli_query($link,"select * from fluidexam where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$color = $row2['color'];
		$volume = $row2['volume'];
		$appearence = $row2['appearence'];
		$glouse = $row2['glouse'];
		$protein = $row2['protein'];
		$totalcount = $row2['totalcount'];
		$polymarphs = $row2['polymarphs'];
		$lymphos = $row2['lymphos'];
		$mesoth = $row2['mesoth'];
		//$sgotva = $row2['sgotva'];
		
		}
                
                
             

                
                                    ?>
									
									
	<div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		   <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>BIOCHEMISTRY REPORT</u></b></tr>
	  <tr height="40"></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST NAME</u></b></td></tr>
<tr><td colspan="4">FLUID EXAMINATION-ROUTINE(PLEURAL FLUID)</td></tr>
<tr height="20"> </tr>
<tr><td colspan="4"><b>Physical Examination:</b></td></tr>
<tr><td colspan="2">Colour  </td><td><?php echo $color; ?></td></tr> 
<tr><td colspan="2">Volume </td><td><?php echo $volume?> ml</td></tr> 
<tr><td colspan="2">Appearance  </td><td><?php echo $appearence; ?></td></tr> 


<tr><td colspan="4"><b>Chemical Examination:</b></td></tr>
<tr height="20"> </tr>
<tr><td colspan="2">Glucose   </td><td><?php echo $glouse; ?></td></tr> 
<tr><td colspan="2">Protein </td><td><?php echo $protein?></td></tr> 
<tr height="20"> </tr>
 <tr><td colspan="4"><b>Microscopic Examination:</b></td></tr>
 <tr height="20"> </tr>
<tr><td colspan="2">Total Count   </td><td><?php echo $totalcount; ?></td></tr> 
<tr><td colspan="2">Differential Count </td><td>Polymorphs        -  <?php echo $polymarphs?>%</td></tr> 
<tr><td colspan="2"> </td><td>Lymphocytes       -   <?php echo $lymphos?>%</td></tr> 
<tr><td colspan="2"> </td><td>Mesothelial cells -  <?php echo $mesoth?>%</td></tr> 
 
<tr height="50"> </tr>

<tr><td colspan="4"><br/><br/></td></tr>
<tr height="40"> </tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr>
		<tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "24 Hrs URINE PROTIEN"){	
		$sql2 = mysqli_query($link,"select * from urineprotinue where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$tv = $row2['tv'];
		$tp = $row2['tp'];
		
		
		//$sgotva = $row2['sgotva'];
		
		}
                
                $mbs="select * from urinenormal where uid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$uid=$row['uid'];
$uvalue=$row['uvalue'];
$utype=$row['utype'];
             

                
                                    ?>
									
									
	<div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		   <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>BIOCHEMISTRY REPORT</u></b></tr>
	  <tr height="40"></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">24 Hrs URINE PROTIEN</u></b></td><td>RESULT</td></tr>

<tr height="20"> </tr>

<tr><td colspan="2">Total Volume  </td><td><?php echo $tv; ?>  ml/day</td></tr> 
<tr><td colspan="2">Total Protien  </td><td><?php echo $tp ."&nbsp;&nbsp;&nbsp;".$utype?> </td></tr> 


<tr height="20"> </tr>
<tr><td colspan="4"><b>( Normal Range:<?php echo $uvalue."&nbsp;&nbsp;&nbsp;".$utype ?>  )</b></td></tr>


<tr height="20"> </tr>
 
 
<tr height="50"> </tr>

<tr><td colspan="4"><br/><br/></td></tr>
<tr height="40"> </tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr>
		<tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "BONE MARROW"){	
		$sql2 = mysqli_query($link,"select * from bone where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$done = $row2['done'];
		$site = $row2['site'];
		
		$Cellularity = $row2['Cellularity'];
		$Ratio = $row2['Ratio'];
		$Erythropoiesis = $row2['Erythropoiesis'];
		$Myelopoiesis = $row2['Myelopoiesis'];
		$Megakaryocytes = $row2['Megakaryocytes'];
		$Lymphocytes = $row2['Lymphocytes'];
		$Plasma = $row2['Plasma'];
		$Others = $row2['Others'];
		$impression = $row2['impression'];
		//$site = $row2['site'];
		
		//$sgotva = $row2['sgotva'];
		
		}
                
                          
                                    ?>
									
									
	<div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		   <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>BONE MARROW ASPIRATION REPORT</u></b></tr>
	  <tr height="40"></tr>

<tr height="20"> </tr>
<tr><td>Done by   </td><td><?php echo $done; ?> </td><td>Site</td><td><?php echo $site; ?> </td></tr> 
<tr><td colspan="2">Cellularity  </td><td><?php echo $Cellularity; ?>  </td></tr> 
<tr><td colspan="2">M.E. Ratio  </td><td><?php echo $Ratio ?> </td></tr> 

<tr><td colspan="2">Erythropoiesis  </td><td><?php echo $Erythropoiesis; ?>  </td></tr> 
<tr><td colspan="2">Myelopoiesis  </td><td><?php echo $Myelopoiesis ?> </td></tr> 

<tr><td colspan="2">Megakaryocytes  </td><td><?php echo $Megakaryocytes; ?>  </td></tr> 
<tr><td colspan="2">Lymphocytes  </td><td><?php echo $Lymphocytes ?> </td></tr> 

<tr><td colspan="2">Plasma cells  </td><td><?php echo $Plasma; ?>  </td></tr> 
<tr><td colspan="2">Others  </td><td><?php echo $Others ?> </td></tr> 
<tr height="20"> </tr>
<tr><td >IMPRESSION    </td><td colspan="3"><b><?php echo $impression; ?> </b> </td></tr> 
 
<tr height="20"> </tr>
 <tr><td colspan="4">Advised : Suggested clinical correlation if necessary kindly discuss with the signatory. </td></tr>
 


<tr><td colspan="4"><br/><br/></td></tr>
<tr height="40"> </tr>
<!--<tr><td colspan="4"><img src="images/images.png"/></td></tr>-->
<tr><td colspan="3"><!--<b>Dr. Krishna Reddy MD,</b>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "Gram Stain"){	
		$sql2 = mysqli_query($link,"select * from gramstain where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$gs = $row2['gs'];
		$stime = $row2['stime'];
		
		
		//$site = $row2['site'];
		
		//$sgotva = $row2['sgotva'];
		
		}
                
                          
                                    ?>
									
									
	<div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		   <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>MICRO BIOLOGY</u></b></td></tr>
	  <tr height="40"></tr>
<tr><td colspan="2" align="center" ><b><u>TEST NAME</u></b></td><td colspan="2" align="center" ><b><u>RESULT</u></b></td></tr>
<tr height="20"> </tr>

<tr><td colspan="2">Gram Stain  </td><td><?php echo $gs; ?>  </td></tr> 
<tr height="20"> </tr>
<tr><td colspan="2">METHOD:GRAM STAIN</td></tr>
<tr height="20"> </tr>
<tr><td colspan="2">Specimen Type  </td><td><?php echo $stime ?> </td></tr> 





<tr><td colspan="4"><br/><br/></td></tr>
<tr height="40"> </tr>

<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
<tr height="20"> </tr>
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "FNAC"){	
		$sql2 = mysqli_query($link,"select * from fnac where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$test = $row2['test'];
		$site = $row2['site'];
		$microscope = $row2['microscope'];
		$impress = $row2['impress'];
		
		//$site = $row2['site'];
		
		//$sgotva = $row2['sgotva'];
		
		}
                
                          
                                    ?>
									
									
	<div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		   <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>FINE NEEDLE ASPIRATION FOR CYTOLOGY</u></b></td></tr>
	  <tr height="40"></tr>

<tr height="20"> </tr>
<tr><td colspan="2"><b>Done by </b> :<?php echo $test; ?> </td><td colspan="2" align="right"><b>Site:</b><?php echo $site; ?> </td></tr> 
<tr height="20"> </tr>
<tr><td ><b>Microscope </b> </td><td colspan="3"><?php echo $microscope; ?>  </td></tr> 
<tr height="20"> </tr>


<tr><td ><b>Impression</b>  </td><td colspan="3"><?php echo $impress ?> </td></tr> 

<tr height="20"> </tr>



<tr><td colspan="4"><br/><br/></td></tr>
<tr height="40"> </tr>

<!--<tr><td colspan="4"><img src="images/images.png"/></td></tr>-->
<tr><td colspan="3"><!--<b>Dr. Krishna Reddy MD,</b>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "SEROLOGY(ASO RAF CRP)"){	
		$sql2 = mysqli_query($link,"select * from tft where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$crp = $row2['crp'];
		$raf = $row2['raf'];
		$aso = $row2['aso'];
		
		
		//$site = $row2['site'];
		
		//$sgotva = $row2['sgotva'];
		
		}
                $mbs="select * from crprange where crpid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
//$crpid=$row['crpid'];

$value=$row['value'];
$type=$row['type'];
       
$mbs="select * from rafnormals where rfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
//$rfid=$row['rfid'];
$rfvalue=$row['rfvalue'];
$rftype=$row['rftype'];


$mbs="select * from asonormals where aid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
//$aid=$row['aid'];
$avalue=$row['avalue'];
$atype=$row['atype'];
                          
                                    ?>
									
									
	<div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		   <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></td></tr>
	  <tr height="40"></tr>

<tr height="20"> </tr>
<tr><td align="left" colspan="2"><b><u style="font-size:15px;">TEST </u></b></td><td ><b><u style="font-size:15px;">RESULT </u></td><td><b><u style="font-size:15px;">REFERENCE RANGE </u></td></tr>
<tr height="5px"></tr>
<tr><td colspan="2">C - Reactive Protein (CRP)</td><td> : <?php echo $crp ."&nbsp;&nbsp;".$type; ?></td><td> <?php echo  $value."&nbsp;&nbsp;".$type; ?></td></tr> 
<tr height="20"> </tr>
<tr><td colspan="2">RA FACTOR</td><td> : <?php echo $raf."&nbsp;&nbsp;".$rftype ?></td><td><?php echo $rfvalue."&nbsp;&nbsp;".$rftype ?></td></tr>
<tr height="20"> </tr>
<tr><td colspan="2">ASO TITRE</td><td> : <?php echo $aso."&nbsp;&nbsp;".$atype; ?></td><td><?php echo $avalue."&nbsp;&nbsp;".$atype; ?></tr> 
<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>

<tr><td colspan="4"><br/><br/></td></tr>
<tr height="40"> </tr>

<!--<tr><td colspan="4"><img src="images/images.png"/></td></tr>-->
<tr><td colspan="3"><!--<b>Dr. Krishna Reddy MD,</b>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	if($emp_id1 == "DENGUE SEROLOGY"){	
		$sql2 = mysqli_query($link,"select * from dsr where bill_no='$bno'");
		if($sql2){
	$row5 = mysqli_fetch_array($sql2);
	$dsrigg = $row5['dsrigg'];
	$dsrigm = $row5['dsrigm'];
	
		
		
		//$site = $row2['site'];
		
		//$sgotva = $row2['sgotva'];
		
		}
                $mbs="select * from dsrnormal where dsid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$dsid=$row['dsid'];
$iggvalue=$row['iggvalue'];
$igmvalue=$row['igmvalue'];
                          
                                    ?>
									
									
	<div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr/></td></tr>
		   <tr height="20"></tr>
	<tr><td colspan="4" align="center" ><b><u>DENGUE SEROLOGY REPORT</u></b></td></tr>
	  <tr height="40"></tr>

<tr height="20"> </tr>
<tr><td align="left" colspan="2"><b><u style="font-size:15px;">TEST </u></b></td><td ><b><u style="font-size:15px;">RESULT </u></td><td><b><u style="font-size:15px;">REFERENCE RANGE </u></td></tr>
<tr height="5px"></tr>
<tr><td colspan="2">IgG</td><td> : <?php echo $dsrigg ."&nbsp;&nbsp;" ?></td><td> <?php echo  $iggvalue."&nbsp;&nbsp;"; ?></td></tr> 
<tr height="20"> </tr>
<tr><td colspan="2">dsrigm</td><td> : <?php echo $dsrigm."&nbsp;&nbsp;" ?></td><td><?php echo $igmvalue."&nbsp;&nbsp;" ?></td></tr>
<tr height="20"> </tr>
 
<tr><td colspan="4"><br/><br/><br/><br/><br/></td></tr>

<tr><td colspan="4"><br/><br/></td></tr>
<tr height="40"> </tr>

<!--<tr><td colspan="4"><img src="images/images.png"/></td></tr>-->
<tr><td colspan="3"><!--<b>Dr. Krishna Reddy MD,</b>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
		</table>
		</div>    
    </div>
	<?php 
	}
	
	
	if($emp_id1 == "BIO(CBP ESR)"){	
				$sql2 = mysqli_query($link,"select * from cbpesr where bill_no='$bno'");
				if($sql2){
				
				$row2 = mysqli_fetch_array($sql2);
				$HAEMOGLOBIN = $row2['HAEMOGLOBIN'];
				$RBC = $row2['RBC'];
				$WBC_Count = $row2['WBC_Count'];
				$PLATELET_COUNT = $row2['PLATELET_COUNT'];
				$NEUTROPHILS = $row2['NEUTROPHILS'];
				$LYMPHOCYTES = $row2['LYMPHOCYTES'];
				$MONOCYTES = $row2['MONOCYTES'];
				$EOSINOPHILS = $row2['EOSINOPHILS'];
				$BASOPHILS = $row2['BASOPHILS'];
				$RBC1 = $row2['RBC1'];
				$WBC1 = $row2['WBC1'];
				$Platelets = $row2['Platelets'];
				$esr_result = $row2['esr_result'];
				
				}
                                $mbss="select * from cbpnormal where id='1'";
$r=  mysqli_query($link,$mbss) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$id=$row['id'];
$hm=htmlspecialchars($row['hm']);
$hf=$row['hf'];
$rbcm=$row['rbcm'];
$rbcf=$row['rbcf'];
$webcount1=$row['webcount'];
$plateletcount=$row['plateletcount'];
$na=$row['na'];
$nc=$row['nc'];
$la=$row['la'];
$lc=$row['lc'];
$ma=$row['ma'];
$mc=$row['mc'];
$ea=$row['ea'];
$ec=$row['ec'];
$baa=$row['baa'];
$bac=$row['bac'];
$hnormal=$row['hnormal'];
$rbcnormal=$row['rbcnormal'];
$webcountnormal=$row['webcountnormal'];
$plateletnormal=$row['plateletnormal']; 
                                
				
  $mbq="select * from esrresult where esrid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$esrid=$row['esrid'];
$esrvalue=$row['esrvalue'];
$esrtype=$row['esrtype'];

?>

    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  width="13%"><div align="left">Bill No. </div></td>
			<td  width="28%"> : <b><?php echo $bno ?></b></td>
            <td  width="25%"><div align="left">Report Date </div></td>
			<td  width="25%"> : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td>
			<td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
           
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		  <tr><td colspan="4" ><b><u>COMPLETE BLOOD  PICTURE (CBP)</u></b></tr>
			<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULTS </u></td><td><b><u>NORMAL RANGES </u></td></tr> 

				
<tr><td>HAEMOGLOBIN</td><td> : <?php echo $HAEMOGLOBIN ?> %</td><td colspan="2">Male :<?php echo $hm; ?> <?php echo $hnormal; ?> ,<br> Female : <?php echo $hf; ?> <?php echo $hnormal; ?></td></tr>
<tr><td>RBC</td><td> : <?php echo $RBC ?> Mill/ cumm</td><td colspan="2">Male : <?php echo $rbcm; ?> <?php echo $rbcnormal; ?>,<br> Female : <?php echo $rbcf; ?> <?php echo $rbcnormal; ?></td></tr>
<tr><td>WBC Count</td><td> : <?php echo $WBC_Count ?> cells/cumm</td><td colspan="2"><?php echo $webcount1; ?> <?php echo $webcountnormal; ?></td></tr>        
<tr><td>PLATELET COUNT</td><td> : <?php echo $PLATELET_COUNT ?> lakhs /cumm</td><td colspan="2"><?php echo $plateletcount; ?> <?php echo $plateletnormal; ?></td></tr>        

<tr height="10px"></tr>
<tr><td colspan="2"><b><u>DIFFERENTIAL LEUCOCYTE COUNT:</u></b></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <?php echo $NEUTROPHILS ?> %</td><td><?php echo $na; ?>%</td><td><?php echo $nc; ?>%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <?php echo $LYMPHOCYTES ?> %</td><td><?php echo $la; ?>%</td><td><?php echo $lc; ?>%</td></tr>
<tr><td>MONOCYTES</td><td> : <?php echo $MONOCYTES ?> %</td><td><?php echo $ma; ?>%</td><td><?php echo $mc; ?>%</td></tr>		 		
<tr><td>EOSINOPHILS</td><td> : <?php echo $EOSINOPHILS ?> %</td><td><?php echo $ea; ?>%</td><td><?php echo $ec; ?>%</td></tr>	  				
<tr><td>BASOPHILS</td><td> : <?php echo $BASOPHILS ?> %</td><td><?php echo $baa; ?>%</td><td><?php echo $bac; ?>%</td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>PERIPHERAL SMEAR EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td colspan="2"> : <?php echo $RBC1 ?></td></tr> 
<tr><td>WBC</td><td colspan="2"> : <?php echo $WBC1 ?></td></tr> 
<tr><td>Platelets</td><td colspan="2"> : <?php echo $Platelets ?></td></tr> 

  <tr><td colspan="4" ><b><u>Erythrocyte Sedimentation Rate (ESR)</u></b></tr>
  <tr height="15"></tr>
<tr><td colspan="2">Erythrocyte Sedimentation Rate (ESR)</td><td> : <?php echo $esr_result."&nbsp;&nbsp;".$esrtype; ?>  </td><td><?php echo $esrvalue."&nbsp;&nbsp;".$esrtype; ?></td></tr> 
<tr><td colspan="3"><b>Method :Cell Counter/Microscope</b></td></tr>
<tr><td colspan="3"><!--<img src="images/images.png"/>--></td><td><b><?php echo $s2; ?></b></td></tr>
<!--<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>-->
<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr>
<tr>
		</table>
		
		
		</div>    
    </div>
	<?php 
	}
	
	if($emp_id1 == "BIO(Urea Creatinine)"){	
	
	$sql2 = mysqli_query($link,"select * from ureacreati where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysqli_fetch_array($sql2);
		$burea = $row2['burea'];
		$creati = $row2['creati'];
		
		}
                
                $mbq="select * from bunormals where buid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$buid=$row['buid'];
$buvalue=$row['buvalue'];
$butype=$row['butype'];
                     
                       $mbq="select * from creatinormals where cid='1'";
$r1=  mysqli_query($link,$mbq) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r1);
$cid=$row['cid'];
$cvalue=$row['cvalue'];
$ctype=$row['ctype'];
                     
                                    ?>
									
									
	
    <div class="page">
        <div class="subpage">
		<table>	<tr height="20"></tr>
		<tr>
		  <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr><tr>
         
            <td  ><div align="left">Bill No. </div></td>
			<td  > : <b><?php echo $bno ?></b></td>
            <td  ><div align="left">Report Date </div></td>
			<td  > : <b><?php echo $bdate ?></b></td>
            </tr> <tr>
           
            <td ><div align="left">Doctor  Name </div></td>
			<td  style="font-size:11px;"> : <b><?php echo $dname ?></b></td><td ><div align="left">Patient Type </div></td>
			<td  > : <b><?php echo $ptype; ?></b></td>
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left" colspan="2"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>


<tr><td colspan="2">Blood Urea</td><td> : <?php echo $burea."&nbsp;&nbsp;".$butype; ?></td><td><?php echo $buvalue."&nbsp;&nbsp;".$butype; ?></td></tr> 
<tr><td colspan="4"></td><td><BR/></td></tr>
<tr><td colspan="2">Serum Creatinine</td><td> : <?php echo $creati."&nbsp;&nbsp;".$ctype; ?> </td><td><?php echo $cvalue."&nbsp;&nbsp;".$ctype; ?></td></tr> 
		
<tr><td colspan="4"></td><td><BR/></td></tr>
<tr height="42"></tr>
 <tr><td colspan="4" align="right"><b><?php echo $s2; ?></b></td></tr>
		<tr><td colspan="4"><br/><br/></td></tr><tr><td colspan="4">Kindly Correlate Clinically,if there's a need discuss.</td></tr><tr>
		</table>
		</div>    
    </div>
	<?php 
	} 
	
	}
	
	
	}
	?>
</div>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="closew();"/>
								</div>
</body>
</html>