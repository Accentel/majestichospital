<?php
include("config.php");

$pat_no=$_REQUEST['patno'];

$rs=mysql_query("SELECT  patientname, ADMIT_DATE FROM ip_pat_admit as a,patientregister as b WHERE a.PAT_REGNO=b.registerno and pat_no='$pat_no'");

while($row = mysql_fetch_array($rs))
{
$pat_name=$row[0];
$admdt=date('d-m-Y',strtotime($row[1]));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("header.php");
?>
<title>Hospital Management System</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>
<form name="myform" autocomplete="off">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   
  <tr>
    <td class="mainbox" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="boxtop_img"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="font-size:16px;" align="center">Room Rent Calculation </td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="400" valign="top" class="box_midlebg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
             <tr>
               <td class="label1" >
                 <div align="left">Patient No/Name:</div></td>
               <td><?php echo $pat_no ?>&nbsp;/&nbsp;<?php echo $pat_name ?> </td>
               <!-- <td width="10"><!--<input name="textfield" type="text" class="textbox1" /></td>-->
               <td class="label1" ><div align="right"> Admit Date:</div></td>
               <td><?php echo $admdt ?> </td>
               <td>&nbsp;</td>
             </tr>
             <tr>
                
                <td width="156" class="label1" > <div align="left"></div></td><td width="422">&nbsp;</td>
                <!-- <td width="10"><!--<input name="textfield" type="text" class="textbox1" /></td>-->
                <td width="147" class="label1" >&nbsp;</td>
                <td width="151">&nbsp;</td>

                                   
<td width="78">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td> <div align="center">
            </div></td>
          </tr>
          <tr>
            <td><table width="100%" summary="Table of my records" id="TABLE1">
              <thead>
                <tr>
				 <th class="TH1">Room No </th>
                  <th class="TH1">Bed No </th>
                  <th class="TH1">Start Date</th>
                 
                  <th class="TH1">End Date</th>
                 
                   <th class="TH1">Days </th>
                   <!--<th class="TH1">Hours </th>-->
				   <th class="TH1">Room Rent </th>
				   <th class="TH1">Nurse Fee </th>
				   <th class="TH1">DM0. Fee </th>
 				   <th class="TH1" style="display:none">DOCTOR Fee </th>
 				   <th class="TH1">Total</th>
                </tr>
              </thead>
              <tbody>
<?php  
include("config.php");

 $xx="select to_days(ifnull(end_date,now()))-to_days(start_date) days,DATE_FORMAT(ADDTIME('2000-00-00 00:00:00',SEC_TO_TIME(TIME_TO_SEC(ifnull(end_time,now()))-TIME_TO_SEC(start_time))), '%k') hrs,room_fee,MAINT_FEE,NURSE_FEE,OTHER_FEE,c.BED_NO,d.room_no,date_format(ifnull(end_date,now()),'%d/%m/%Y'),date_format(start_date,'%d/%m/%Y') from ip_pat_admit as A,patientregister as B,ip_pat_bed as c,bed_details as d,room_tariff as e WHERE A.PAT_REGNO=B.registerno 
  and c.pat_no=A.pat_no and A.pat_no='$pat_no' and c.bed_no=d.bed_no and d.room_no=e.room_no";   
	$msql=mysql_query($xx);
	 		 
 
		 while($res = mysql_fetch_array($msql)){
		
      $days1=$res[0];
	  $hrs=$res[1];
      $roomrent=$res[2];
	  $mainfee=$res[3];
	  $nurfee=$res[4];
      $otherfee=$res[5];
      

 $days=$days1;

$totroomrent1=(($roomrent+$nurfee+$mainfee)*$days);

$totroomrent=$totroomrent+$totroomrent1;
?>

               <tr class="tr1">
				  <td class="TD1"><?php echo $res[7] ?></td>
                  <td class="TD1"><?php echo $res[6] ?></td>
                  <td class="TD1"><?php echo $res[9] ?></td>
                  <td class="TD1"><?php echo $res[8] ?></td>
                  <td class="TD1"><?php echo $days ?>days</td>
                  <td class="TD1"><div align="right"><?php echo $roomrent ?></div></td>
				 
                  <td class="TD1"><div align="right"><?php echo $nurfee ?></div></td>
                  <td class="TD1"><div align="right"><?php echo $mainfee ?></div></td>
                  <td class="TD1" style="display:none"><div align="right"><?php echo $otherfee1 ?></div></td>
                  <td class="TD1" ><div align="right"><?php echo $totroomrent1 ?></div></td>
                 
                  
 
               </tr>
  <?php
					}//while


$totrent=$tototherrent+($totroomrent);
				               
					?>

			   
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td class="label1" height="30"><div align="right">Total Rent :&nbsp; <font color="black"><?php echo $totrent ?></font></div></td>

          </tr>
<tr>
            <td height="4"></td>
          </tr>
          
<tr>
  <div align="right"><a href="javascript:window.close()"><b><font color="#FF6600">Close</font></b></a></div>
</tr>
        </table>
</td>
      </tr>

      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="../images/box_botmleft.gif" alt="1" width="10" height="10" /></td>
            <td background="../images/box_botmbg.gif"><img src="../images/box_botmbg.gif" alt="1" width="1" height="10" /></td>
            <td width="10" height="10"><img src="../images/box_botmright.gif" alt="1" width="10" height="10" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>
