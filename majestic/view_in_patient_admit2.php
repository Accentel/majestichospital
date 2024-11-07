<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header.php");
	?>
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


	</head>

	<body>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF" >
<THEAD>
<tr><td colspan="2"><img src="images/durgatop.png" style="width:100%; height:120px;"/>  </td></tr>
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Initial Assessment Sheet</u></b></h2></td></tr>
  </THEAD></table>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td colspan="2" style="border-bottom:1px solid #999999;padding-left: 20px;">
          <?php /*?> <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
		   <?php
				include("config.php");
				
				$sql = mysql_query("select * from organization");
				if($sql)
				{
					$row = mysql_fetch_array($sql);
					
					$orgname = $row['orgname'];
					$orgaddr = $row['address'];
					$orgphone = $row['phone'];
					$orgmobile = $row['mobile'];
					
				}
		   ?>
           
            <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#FFFFFF">
                    <tr>
                        <td align="center" style="font-size:24px;" colspan="6"><?php echo $orgname ?></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6"><?php echo $orgaddr ?>,</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6">Ph : <?php echo $orgphone ?>,<?php echo $orgmobile ?></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                </table><?php */?>
            </td>
            </tr>
        </table>
            </td>
        </tr>
         </td>
            </tr>
        </table>
            </td>
        </tr>
        <?php 
		include("config.php");
			 $id=$_REQUEST['adv_no'];
				
			  $x="select b.ADMIT_DATE,a.patientname,a.registerno,a.age,a.gender,a.phoneno,a.registerno,a.phoneno,
			 b.ADMIT_TIME,a.address from patientregister as a,ip_pat_admit as b
			 where a.registerno=b.pat_regno  and a.registerno='$id'";
			$sql= mysql_query($x);
			if($sql)
			{
				$row = mysql_fetch_array($sql);
				
				$adate = date('d-m-Y',strtotime($row['ADMIT_DATE']));
				$patname = $row['patientname'];
				//$bedno = $row['BED_NO'];
				$age = $row['age'];
				$gender = $row['gender'];
				$addr = $row['address'];
				$registerno=$row['registerno'];
				$mob=$row['phoneno'];
				$ADMIT_TIME=$row['ADMIT_TIME'];
				//$arrival_mode=$row['arrival_mode'];
				//$ref_from=$row['ref_from'];
				//$previous=$row['previous'];
				//$amt =$row['AMOUNT'];
				//$consamt = $row['CONS_AMT'];
				//$allotby = $row['Allot_BY'];
				//$docname = $row['dname1'];
				//$contype = $row['CONCESSION_TYPE'];
				//$cardno = $row['CONCESSION_CARDNO'];
				//$insutype = $row['insu_type'];
				//$authby = $row['Auth_BY'];
				//$mrcost = $row['mr_cost'];
				//$conc = $row['con_type'];
				//$ptype = $row['pay_type'];
				//$mrcost = $row['mr_cost'];
				
				//$sql1 = mysql_query("select CONCE_NAME from concession_type where CONCE_CODE='$contype'");
				//if($sql1)
				//{
					//$row1=mysql_fetch_array($sql1);
					//$conname = $row1['CONCE_NAME'];
				//}
			}		
				
		?>
			 
			 
		
        <table width="100%" border="0" align="center" style="vertical-align:text-top" cellpadding="1" cellspacing="0" >
          
          <tr>
            <td colspan="4"></td>
             </tr>
          <tr>
         
            <td width="20%"><div align="left"><b>UMR No : </b> </div></td>
			<td ><?php echo $registerno ?></td>
            <td width="20%"><div align="left"><b>Patient Name : </b></div></td>
			<td ><?php echo $patname ?></td>
            </tr>
         
          <tr>
           
            <td ><div align="left"><b>Age/Sex :</b> </div></td>
			<td><?php echo $age ?> / <?php echo $gender ?></td>
           <td  ><div align="left"><b>Tel No : </b></div></td>
          <td><?php echo $mob ?></td>
            </tr>
         
         
         
          <tr>
         
            <td width="20%"><div align="left"><b>Admit Date : </b> </div></td>
			<td ><?php echo $adate ?></td>
            <td width="20%"><div align="left"><b>Admit Time : </b></div></td>
			<td ><?php echo $ADMIT_TIME ?></td>
            </tr>
     <tr>
            <td width="20%" colspan="1"><div align="left"><b>Address : </b></div></td>
			<td ><?php echo $addr ?></td>
            </tr>
            
             
			
			
			<tr height="20"></tr>
        </table>
        
        <?php 
		include("config.php");
			 $id=$_REQUEST['adv_no'];
			
				$qs=mysql_query("select * from `caseshhet_initial1` where mrno='$id'");
			while($r=mysql_fetch_array($qs)){
			$rnum=$r['mrno'];
		$complaint=$r['complaint'];
		$present=$r['present'];
		$past=$r['past'];
		$airway1=$r['airway1'];
		$breat1=$r['breat1'];
		$circ1=$r['circ1'];
		$airway2=$r['airway2'];
		$breat2=$r['breat2'];
		$circ2=$r['circ2'];
		$vitals=$r['vitals'];
		$pulse=$r['pulse'];
		$bp=$r['bp'];
		$bp1=$r['bp1'];
		$rr=$r['rr'];
		$spo2=$r['spo2'];
		$room_air=$r['room_air'];
		$grbs=$r['grbs'];
		$temp=$r['temp'];
		$start_ecg=$r['start_ecg'];
		$priority=$r['priority'];
		$traige=$r['traige'];
		$clinical=$r['clinical'];
		$negatiev_clinic=$r['negatiev_clinic'];
		$blood1=$r['blood1'];
		$urine1=$r['urine1'];
		$stool1=$r['stool1'];
		$xray1=$r['xray1'];
		$usg1=$r['usg1'];
		$ct_scan1=$r['ct_scan1'];
		$others1=$r['others1'];
		$blood2=$r['blood2'];
		$urine2=$r['urine2'];
		$stool2=$r['stool2'];
		$xray2=$r['xray2'];
		$usg2=$r['usg2'];
		$ct_scan2=$r['ct_scan2'];
		$others2=$r['others2'];
		$drug1=$r['drug1'];
		$dose1=$r['dose1'];
		$admin_by1=$r['admin_by1'];
		$time1=$r['time1'];
		$drug2=$r['drug2'];
		$dose2=$r['dose2'];
		$admin_by2=$r['admin_by2'];
		$time2=$r['time2'];
		$drug3=$r['drug3'];
		$dose3=$r['dose3'];
		$admin_by3=$r['admin_by3'];
		$time3=$r['time3'];
		$drug4=$r['drug4'];
		$dose4=$r['dose4'];
		$admin_by4=$r['admin_by4'];
		$time4=$r['time4'];
		$drug5=$r['drug5'];
		$dose5=$r['dose5'];
		$admin_by5=$r['admin_by5'];
		$time5=$r['time5'];
		$drug6=$r['drug6'];
		$dose6=$r['dose6'];
		$admin_by6=$r['admin_by6'];
		$time6=$r['time6'];
		$reffer_to=$r['reffer_to'];
		$refer_time=$r['refer_time'];
		$seen_at=$r['seen_at'];
		$transfer_to=$r['transfer_to'];
		$p=$r['p'];
		$refrer_bp=$r['refrer_bp'];
		$refer_rr=$r['refer_rr'];
		$refer_spo2=$r['refer_spo2'];
		$refer_temp=$r['refer_temp'];
		$treatment=$r['treatment'];
		$condition_discharge=$r['condition_discharge'];
		$follow=$r['follow'];
		$phys_name=$r['phys_name'];
		$phys_sign=$r['phys_sign'];
		$dis_date=$r['dis_date'];
		$dis_time=$r['dis_time'];
		$date1=$r['date1'];
		$additional=$r['additional'];
		$finding=$r['finding'];
		$wd=$r['wd'];
			}
?>
	<table width="100%" cellspacing="10">

<tr>
<input type="hidden" value="<?php echo $aname ?>" name="authby"/>
<td ><strong>Patient UMR No.</strong>  : </td>
<td><?php echo $rnum?></td>

<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->

        
<tr>
<td ><strong>Presenting Complaints</strong>  : </td><td colspan="1">
<?php echo $complaint?>
<!--<input type="text" name="complaint" id="complaint" class="text" />-->

</td></tr>
<tr><td ><strong>History of Present Illness</strong>  : </td><td colspan="1">

<?php echo $present?>

</td>

</tr>
 <tr>
<td ><strong>History of Past Illness</strong>  : </td><td colspan="1">
<?php echo $past?>

</td>
</tr>
</tr></table>
<table width="100%" border="1">
<tr style="background-color:#000; color:#FFF;">
<td class="" colspan="2" align="center" style="font-weight:bold;" align="center">Airway  </td>
<td class="" colspan="2" align="center"><strong>Breathing</strong>  </td>
<td class="" colspan="2" align="center"><strong> Circulation</strong></td></tr>

<tr>
<td colspan="1">
<strong>Assessment</strong></td><td>
<?php echo $airway1?>
</td>


<td colspan="1">
<strong>Assessment</strong></td><td>
<?php echo $breat1?>
</td>

<td colspan="1">
<strong>Assessment</strong></td><td>

<?php echo $circ1?>
</td></tr>


<tr>
<td colspan="1">
<strong>Managment</strong></td><td>
<?php echo $airway2?>
</td>


<td colspan="1">
<strong>Managment</strong></td><td>

<?php echo $breat2?>
</td>

<td colspan="1">
<strong>Managment</strong></td><td>

<?php echo $circ2?>
</td></tr></table>
<table style="margin-top:20px;">
<tr><td>
<strong>Vitals Taken at</strong>

<?php echo $vitals?></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td >
<strong>Pulse</strong>

<?php echo $pulse?> Min</td>
<td style="margin-left:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>BP</strong>

<?php echo $bp?>/<?php echo $bp1?></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td>
<strong>RR</strong>

<?php echo $rr?> MIN</td>

</tr>

<tr><td>


</td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td >
<strong>Spo2</strong>

<?php echo $spo2?> %</td>
<td style="margin-left:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>On Room Air /</strong>

<?php echo $room_air?> Ltt O2</td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td>
<strong>GRBS</strong>

<?php echo $grbs?> mg/dl</td>

<td>&nbsp;&nbsp;&nbsp;
<strong>Temp</strong>

<?php echo $temp?> F</td>

</tr>
</table><table style="margin-top:10px;">
<tr><td>
<strong>Stat Ecg</strong>

<?php echo $start_ecg?></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td  colspan="3">
<strong>Triage Priority</strong>
<?php echo $priority;?>
</td>
<td style="margin-left:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Traige Done By</strong>

<?php echo $traige?></td>
<td>&nbsp;&nbsp;&nbsp;</td>


</tr>

</table>

<table align="center" style="margin-top:10px;">
       
<tr>
<td ><strong>Positive Clinical Findings  :</strong> </td><td colspan="1">
<?php echo $clinical?>
<!--<input type="text" name="complaint" id="complaint" class="text" />-->

</td></tr>
<tr><td ><strong>Important Negative Clinical Findings  :</strong> </td><td colspan="1">

<?php echo $negatiev_clinic?>

</td>

</tr>
<tr><td class="label1">Working Diagnosis <font color="red">*</font> : </td><td colspan="1">

<?php echo $wd?>

</td>

</tr>
</table>

<!--<table align="center" style="margin-top:10px;" width="100%" align="center">
       
<tr>
<td  style="background-color:#000; color:#FFF; font-size:16px;" align="center"><strong></strong> </td>


</tr></table>-->

<table width="100%" border="1">
<tr style="background-color:#000; color:#FFF;">
<td class=""  align="center" style="font-weight:bold;" align="center">Investigation  </td>
<td class=""  align="center"><strong>Blood</strong>  </td>
<td class=""  align="center"><strong> Urine</strong></td>
<td class=""  align="center"><strong> Stool</strong></td>
<td class=""  align="center"><strong> X-Rays</strong></td>
<td class=""  align="center"><strong> Usg</strong></td>
<td class=""  align="center"><strong> Ct Scan/Mri</strong></td>
<td class=""  align="center"><strong> Others</strong></td>


</tr>

<tr>
<td colspan="1">
<strong>Adv.Time</strong></td><td>

<?php echo $blood1?>
</td>


<td colspan="1">
<?php echo $urine1?></td><td>

<?php echo $stool1?>
</td>

<td colspan="1">
<?php echo $xray1?></td><td>

<?php echo $usg1?>
</td>
<td>

<?php echo $ct_scan1?>
</td>
<td>

<?php echo $others1?>
</td>
</tr>


<tr>
<td colspan="1">
<strong>Report Collection Time</strong></td><td>

<?php echo $blood2?>
</td>


<td colspan="1">
<?php echo $urine2?></td><td>

<?php echo $stool2?>
</td>

<td colspan="1">
<?php echo $xray2?></td><td>

<?php echo $usg2?>
</td>
<td>

<?php echo $ct_scan2?>
</td>
<td>

<?php echo $others2?>
</td>

</tr></table>

<table align="center" style="margin-top:10px;" width="100%" align="center">
       
<tr>
<td  style="background-color:#000; color:#FFF; font-size:16px;" align="center"><strong>Treatment Advised</strong> </td>


</tr></table>
<table width="100%" border="1" style="margin-top:10px;">
<tr style="background-color:#000; color:#FFF;">
<td class=""  align="center" style="font-weight:bold;" align="center">Drug  </td>
<td class=""  align="center"><strong>Dose</strong>  </td>
<td class=""  align="center"><strong> Route</strong></td>
<td class=""  align="center"><strong> Administered By</strong></td>
<td class=""  align="center"><strong> Time</strong></td>



</tr>

<tr>
<td>

<?php echo $drug1?>
</td>


<td colspan="1">
<?php echo $dose1?></td><td>

PO/M/IV/SC
</td>

<td colspan="1">
<?php echo $admin_by1?></td><td>

<?php echo $time1?>
</td>

</tr>


<tr>
<td>

<?php echo $drug2?>
</td>


<td colspan="1">
<?php echo $dose2?></td><td>

PO/M/IV/SC
</td>

<td colspan="1">
<?php echo $admin_by2?></td><td>

<?php echo $time2?>
</td>

</tr>
<tr>
<td>

<?php echo $drug3?>
</td>


<td colspan="1">
<?php echo $dose3?></td><td>

PO/M/IV/SC
</td>

<td colspan="1">
<?php echo $admin_by3?></td><td>

<?php echo $time3?>
</td>

</tr>
<tr>
<td>

<?php echo $drug4?>
</td>


<td colspan="1">
<?php echo $dose4?></td><td>

PO/M/IV/SC
</td>

<td colspan="1">
<?php echo $admin_by4?></td><td>

<?php echo $time4?>
</td>

</tr>

<tr>
<td>

<?php echo $drug5?>
</td>


<td colspan="1">
<?php echo $dose5?></td><td>

PO/M/IV/SC
</td>

<td colspan="1">
<?php echo $admin_by5?></td><td>

<?php echo $time5?>
</td>

</tr>
<tr>
<td>

<?php echo $drug6?>
</td>


<td colspan="1">
<?php echo $dose6?></td><td>

PO/M/IV/SC
</td>

<td colspan="1">
<?php echo $admin_by6?></td><td>

<?php echo $time6?>
</td>

</tr>

<tr

</table>
<table style="margin-top:10px;"><tr><td><strong>Refferred to speciality/Consultant:</strong>
<?php echo $reffer_to?>
<strong>Time:</strong><?php echo $refer_time?>
<strong>Seen At:</strong><?php echo $seen_at?></td></tr>
<tr><td height="10px;"></td></tr>
<tr><td><strong>Transferred To:    </strong><?php echo $transfer_to?></td></tr>
<tr><td height="10px;"></td></tr>

<tr><td><strong>Vitals At Time of Transfer P  : </strong><?php echo $p?> , <strong>BP :</strong>
 <?php echo $refrer_bp?>,<strong>RR : </strong> <?php echo $refer_rr?> , <strong>SPO2 :</strong>
<?php echo $refer_spo2?>, <strong>Temp :</strong> <?php echo $refer_temp?></td></tr>
 
 <tr><td height="10px;"></td></tr>
 <tr><td><strong>Conclusions at Termination of Treatment:</strong><?php echo $treatment?></td></tr>

<tr><td height="10px;"></td></tr>
 <tr><td><strong>Condition of the patient at Dischaege:</strong><?php echo $condition_discharge?></td></tr>
<tr><td height="10px;"></td></tr>
 <tr><td><strong>Follow up Instructions:</strong><?php echo $follow?></td></tr>
<tr><td height="10px;"></td></tr>

<tr><td><strong>ER Physican Name: </strong> <?php echo $phys_name?>    <strong> Signature :</strong>
<?php echo $phys_sign?>
   <strong> Date :</strong><?php echo $dis_date?>
<strong> Time :</strong><?php echo $dis_time?></td></tr>
</table>


<table>
<tr><td height="20px;"></td></tr>
<tr><td ><strong>Additional Notes</strong>  : </td><td colspan="1">

<?php echo $additional?>

</td>

</tr>
 <tr>
<td ><strong>Investigation Findings</strong>  : </td><td colspan="1">

<?php echo $finding?>
<input type="hidden" name="id" value="<?php echo $id?>" />
</td>
</tr>
</tr></table></td>
      </tr>
      <tr><td align="center" style=" border-top: #000000 1px solid"><table width="70%" cellpadding="0" cellspacing="0" >
        <tr height="20"></tr>
		<tr><td height="18"><b>Prepared By:</b><?php echo "Admin"; ?></td><td valign="top"><div align="right"><b>Printed Date:</b><?php echo date('d-m-Y',strtotime("now"));?></div></td>
      </tr></table></td></tr>
    </table>
	</tr>
	</td>
  </tr>
      <tr>
          <td  colspan="3" align="right"><b>SIGNATURE &nbsp;&nbsp;</b></td>
      </tr>
  <tr><td >&nbsp;</td></tr>
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="closew();"/></td>
      </tr>
        </table>
		  

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