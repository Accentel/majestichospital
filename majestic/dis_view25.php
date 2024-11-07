<?php
session_start();
include("config.php");

 $emp_id = $_REQUEST['emp_id']; 
//echo $x="select pat_no,a.pat_regno,patientname,age,gender,admit_date,c.BED_NO, c.ROOM_NO, BEDTYPE,roomtype,dname1,gaurdianname,address,phoneno from ip_pat_admit as a,patientregister as b,bed_details as c,bedtype as d ,roomtype as e ,room_tariff as f ,doct_infor as g,op_pat_dlt as op where  a.pat_regno=b.registerno and a.bed_no=c.bed_no and d.BEDTYPE_ID=c.BED_TYPE and f.room_no=c.room_no and f.room_type=e.roomtype_id and a.doc_code=g.id and b.registerno=op.pat_regno and pat_no='$emp_id'";
 echo $x="select a.PAT_NO,a.PAT_REGNO,b.patientname,b.age,b.gender,a.ADMIT_DATE,a.BED_NO, c.ROOM_NO, 
c.BED_TYPE,e.ROOMTYPE,b.doctorname,b.gaurdianname,b.address,b.phoneno,b.registerno from ip_pat_admit as a,patientregister as b,bed_details as c
,bedtype as d ,roomtype as e ,room_tariff as f ,doct_infor as g,op_pat_dlt as op
 where  a.PAT_REGNO=b.registerno and a.BED_NO=c.BED_NO and d.BEDTYPE_ID=c.BED_TYPE and
 f.ROOM_NO=c.ROOM_NO and f.ROOM_TYPE=e.ROOMTYPE_ID and a.doc_code=g.id and b.registerno=op.PAT_REGNO and a.PAT_NO='$emp_id'"; 

$query =mysql_query($x);
if($query){
$row = mysql_fetch_array($query);

$patno=$row[0];
 $regno=$row[1];
$patname=$row[2];
$patage=$row[3];	
$patsex=$row[4];	
$patdate=date('d-m-Y',strtotime($row[5]));
$bed=$row[6];
$room=$row[7];
$bedtype=$row[8];
$roomtype=$row[9];
$doc=$row[10];
$patgar=$row[11];
$pataddr=$row[12];
$patphone=$row[13];
$registerno=$row['registerno'];
}//while
$_SESSION['patno']=$patno;
$_SESSION['regno']=$regno;
//exit;
/////Operations Notes////////
$query1 =mysql_query("select notes from ip_pat_admit as a,patientregister as b,CaseSheet_OPERATIONNOTES as cop where  a.pat_regno=b.registerno and cop.pat_no='$emp_id'");
if($query1){
$cop=0;
while($row1 = mysql_fetch_array($query1)){
$pnotes=$row1[0];
$cop++;
}
}
//////////// end of operation notes///////

/////Admission Notes////////
$query2 = mysql_query("select ca.admNotes,ca.AdmNotesDateTime from ip_pat_admit as a,patientregister as b,casesheet_admissionnotes as ca
 where  a.PAT_REGNO=b.registerno and ca.pat_no='$emp_id'");

if($query2){
$ca=0;
while($row2 = mysql_fetch_array($query2)){
$anotes=$row2[0];
$admnotedatetime=date('d-m-Y h:i:s',strtotime($row2[1]));
$ca++;
}
}
//////////// end of Admission notes///////

/////Admission Record////////

$query3 = mysql_query("select ProvisionalDiag,FinalDiag,Complications,Operation_Procedure,DeptsRefTo,DischargeStatus,Death,Autopsy,autopsytime from ip_pat_admit as a,patientregister as b,casesheet_admissionrecord as ca where  a.pat_regno=b.registerno and ca.pat_no='$emp_id'");
if($query3)
{
$car=0;
while($row3 = mysql_fetch_array($query3)){
$prdiag=$row3[0];
$fidiag=$row3[1];
$comp=$row3[2];
$oppro=$row3[3];
$deptref=$row3[4];
$disstatus=$row3[5];
$death=$row3[6];
$autopsy=$row3[7];
$autopsytime=date('d-m-Y h:i:s',strtotime($row3[8]));
$car++;
}
}
//////////// end of /Admission Record///////
$data = "@".$emp_id."@".$regno."@".$patsex."@".$patgar."@".$pataddr."@".$patphone."@".$pnotes."@".$cop."@".$anotes."@".$ca."@".$prdiag."@".$fidiag."@".$comp."@".$oppro."@".$deptref."@".$disstatus."@".$death."@".$autopsy."@".$car."@".$admnotedatetime."@".$autopsytime."@";
	echo $data;

/*Surgery details*/
?>


<table width="100%" border="0" cellpadding="2">
    <thead>
      <tr>
     <th  class="TH1">Admit Date </th>
     <th  class="TH1">Bed No/Type </th>
     <th  class="TH1">Room No/Type </th>
	 <th class="TH1">Start Date/End Date </th>
     <th class="TH1">Cons.Doctor</th>
     </tr>
    </thead>
  

  
 <?php
 $query4  = mysql_query("select distinct a.ADMIT_DATE,p.BED_NO,c.ROOM_NO,d.BEDTYPE,e.ROOMTYPE,g.dname1,p.START_DATE,p.END_DATE
  from ip_pat_admit as a,bed_details as c,bedtype as d ,roomtype as e ,room_tariff as f ,doct_infor as g,ip_pat_bed as p 
  where p.BED_NO=c.BED_NO and d.BEDTYPE_ID=c.BED_TYPE and f.ROOM_NO=c.ROOM_NO and f.ROOM_TYPE=e.ROOMTYPE_ID and a.doc_code=g.id 
   and p.PAT_NO=a.PAT_NO and a.PAT_NO='$emp_id'");
if($query4){
	while($row4 = mysql_fetch_array($query4)){
?>	
<?php /*?><tr>
<td class="casesheet"><input type="text" class="tcal" name="sugardate" value="<?php echo date('d-m-Y',strtotime($row4[0])); ?>" /></td>
<td class="casesheet"><input type="text" name="bednotype" value="<?php echo $row4[1] ?>/<?php echo $row4[3]." Bed" ?>" /> </td>
<td class="casesheet"><input type="text" name="roomnotype" value="<?php echo $row4[2] ?>/<?php echo $row4[4]." Room" ?>" /></td>
<td class="casesheet"><input type="text" name="datetime" value="<?php echo date('d-m-Y',strtotime($row4[6])) ?>&nbsp;to&nbsp;<?php echo $row4[7] ?>" /></td>
<td class="casesheet"><input type="text" name="consdoctor" value="<?php echo $row4[5] ?>" ></td>

</tr>
<?php */?><?php
}
}
?>
 </table>
<?php

echo "@";

///////////////Vital Signs///////////////


?>


<table width="90%" class="sortable"  id="dataTable4">
 <thead>
   <tr>
    <th class="TH1">Date/Time </th>
     <th class="TH1">B.P(Low/High)</th>
     <th class="TH1">Pulse</th>
     <th class="TH1">Resp </th>
     <th class="TH1">FHS</th>
	  <td>&nbsp;
                <input type="button" name="Submit" value=" + " class="butnbg1"  onclick="addRow2('dataTable4')" alt="addrow"/>
			<input type="button" name="Submit" value=" - " class="butnbg1" onclick="deleteRow2('dataTable4')" /> 
			 
			
      </td>
    </tr>
	   
 </thead>
 <?php
  $d="select distinct cvs.vitalDate,cvs.BPHIGH,cvs.BPLOW,cvs.PULSE,cvs.resp,cvs.FHS FROM ip_pat_admit as a,patientregister as b,
 casesheet_vitalsigns as cvs WHERE a.PAT_REGNO=b.registerno and  cvs.pat_no='$emp_id'";
 $query5= mysql_query($d); 

 if($query5){
$m1 = 1;
while($row5 = mysql_fetch_array($query5)){
$datetime=date('d-m-Y h:i:s',strtotime($row5[0]));
$bphigh=$row5[1];
$bplow=$row5[2];
$pluse=$row5[3];
$resp=$row5[4];
$fhs=$row5[5];


?>
 <tr>
<td class="casesheet"><input type="text" name="datetime" size="10" id="datetime<?php echo $m1 ?>" value="<?php echo $datetime ?>"  readonly></td>
<td class="casesheet"><input type="text" name="bp" size="10" id="bp<?php echo $m1 ?>" value="<?php echo $bphigh ?>/<?php echo $bplow ?>" ></td>
<td class="casesheet"><input type="text" name="pluse" size="10" id="pluse<?php echo $m1 ?>" value="<?php echo $pluse ?>" ></td>
<td class="casesheet"><input type="text" name="resp" size="10" id="resp<?php echo $m1 ?>" value="<?php echo $resp ?>" ></td>
<td class="casesheet"><input type="text" name="fhs" size="10" id="fhs<?php echo $m1 ?>" value="<?php echo $fhs ?>" ></td>

</tr>
  <?php $m1=$m1+1;}}
				?>
<input type="hidden" name="count4" id="count4" value="<?php echo ($m1-1) ?>" />				
</table>
<?php
//////////End of Vital Signs/////////////////////////////////

echo "@";
///////////////Sugar Chart///////////////
?>


<?php
 $dd="select distinct cas.SugarDate,cas.Blood_Sugar FROM ip_pat_admit as a,patientregister as b,casesheet_sugarchart 
as cas WHERE a.PAT_REGNO=b.registerno and cas.pat_no='$emp_id'";
 
$query6=mysql_query($dd);

?>
<table width="100%" class="sortable"  id="dataTable6">
 <thead>
   <tr>
     <th class="TH1">Date/Time </th>
     <th class="TH1">Blood Sugar</th>
   <!--  <th class="TH1">Urine Sugar</th>-->
     <td>&nbsp;
               		 
			 <input type="button" name="Submit" value=" + " class="butnbg1"  onclick="addRow6('dataTable6')" alt="addrow"/>
			<input type="button" name="Submit" value=" - " class="butnbg1" onclick="deleteRow6('dataTable6')" /> 
			 
      </td>
   </tr>
 </thead>
 <?php 
if($query6){
$z=1;
 while($row6 = mysql_fetch_array($query6))
{
	$sug_datetime=date('d-m-Y h:i:s',strtotime($row6[0]));
	$b_s=$row6[1];

	$z=$z+1;

					?>
 <tr>
<td class="casesheet"><input type="text" name="sugardate" size="10" id="sugardate<?php echo $z ?>" value="<?php echo $sug_datetime ?>" class="tcal" ></td>
<td class="casesheet"><input type="text" name="bsugar" size="10" id="bsugar<?php echo $z ?>" value="<?php echo $b_s ?>" class="textbox1"></td>
<td class="casesheet"><input type="hidden" name="usugar" size="10" id="usugar<?php echo $z ?>" value="0" class="text"></td>

</tr>
  <?php }}
				?>
<input type="hidden" name="count6" id="count6" value="<?php echo ($z-1) ?>" />
				
</table>
<?php 
//////////End of Sugar Chart/////////////////////////////////

echo "@";
///////////////Consultant Visit///////////////
?>



<?php
$query7=mysql_query("select distinct cdv.VisitDatetime,hdm.ANAE_DOCNAME,cdv.Doc_CODE,cdv.visit_type FROM ip_pat_admit as a,
patientregister as b,casesheet_doctorvists as cdv,outside_consultants as hdm WHERE a.PAT_REGNO=b.registerno and 
cdv.Doc_CODE=hdm.OUT_CONSNO and cdv.pat_no='$emp_id'");

?>
<table width="100%" class="sortable"  id="dataTable1">
 <thead>
   <tr>
     <th class="TH1">Date/Time </th>
     <th class="TH1">Doctor Name</th>
     <th class="TH1">Visit Type</th>
	  <td>&nbsp;
                <input type="button" name="Submit1" value=" + " class="butnbg1"  onclick="addRow1('dataTable1')" alt="addrow"/>
			<input type="button" name="Submit2" value=" - " class="butnbg1" onclick="deleteRow1('dataTable1')" /> 
			 </td>
    </tr>
	   
 </thead>
<?php 
if($query7){
$p=1;
 while($row7 = mysql_fetch_array($query7))
{
$visitdatetime=date('d-m-Y h:i:s', strtotime($row7[0]));
$dococde=$row7[1];
$dococde1=$row7[2];
$visittype=$row7[3];
$p=$p+1;

?>
 <tr>
<td class="casesheet"><input type="text" name="visitdatetime" id="visitdatetime<?php echo $p ?>" value="<?php echo $visitdatetime ?>" class="tcal" ></td>
<td class="casesheet"><input type="text" name="docname" id="docname<?php echo $p ?>" class="textbox1" onfocus="showvisittype(this.value,<?php echo $p ?>);act()" value="<?php echo $dococde ?>">  </td>
                    
     
<td class="casesheet"><div id="visittype<?php echo $p ?>"><input type="text" name="visittype" id="visittype<?php echo $p ?>" value="<?php echo $visittype ?>" class="textbox1"></div></td>


</tr>
  <?php }}//for
				?>	
<input type="hidden" name="count" id="count" value="<?php echo ($p-1) ?>" />
      				
</table>
<?php
//////////End of Consultant Visit/////////////////////////////////

echo "@";
///////////////Diagnostics///////////////
?>


<?php
//echo $ff="select invg_item_name,b.invg_item_code,a.currentdate FROM lab_req_mast as a,lab_req_dtl as b,lab_invg_item 
//as c WHERE a.lr_no=b.lr_no and (upper(b.invg_item_code)=upper(c.invg_code) || upper(b.invg_item_code)=upper(c.cghs_code) ||
 //upper(b.invg_item_code)=upper(c.nims_code)) and a.lr_for='$emp_id'";
 $ff=" select TestName,BillDate from bill where mrno='$registerno'";
$query8=mysql_query($ff);

?>
<table width="50%" class="sortable"  id="dataTable2">
 <thead>
   <tr>
    <th class="TH1">Test Date </th>
     <!--<th class="TH1">Test Code</th>-->
     <th class="TH1">Test Name</th>
	 
    </tr>
	   
 </thead>
<?php
if($query8){
$q=1;
 while($row8 = mysql_fetch_array($query8))
{
$leno=date('d-m-Y', strtotime($row8['BillDate']));
$leno1=$row8[1];
$leno2=$row8[0];
$q=$q+1;

?>
 <tr>
<td class="casesheet"><input type="text" name="leno" id="leno<?php echo $q ?>" value="<?php echo $leno ?>" size="15" class="text" ></td>
<td class="casesheet"><input type="text" name="leno2" id="leno2<?php echo $q ?>" value="<?php echo $leno2 ?>" class="text"></td>
<td class="casesheet"><input type="hidden" name="leno1" id="leno1<?php echo $q ?>" value="0" class="text"></td>

<input type="hidden" name="qq" id="qq" value="<?php echo $q ?>" />
<input type="hidden" name="invpat" id="invpat" value="<?php echo $emp_id ?>" />
</tr>
  <?php } }?>	
  <tr><td height="28" colspan="2">  
    <div align="center">
      <input name="image" type='image' src="images/report_butn.gif" onclick="reportinvestigation()"/>
    </div></td></tr>								
</table>
<?php
//////////End of Diagnostics/////////////////////////////////

echo "@";
///////////////Progress Notes(///////////////
?>


<?php
 $ff="select distinct prgdatetime,progress_notes,treatment FROM ip_pat_admit a,patientregister as b,
casesheet_progressnotes as cp WHERE a.PAT_REGNO=b.registerno and cp.pat_no='$emp_id'";

$query9=mysql_query($ff);

?>
<table width="100%" class="sortable" id="dataTable3">
 <thead>
   <tr>
     <th class="TH1">Date/Time</th>
     <th class="TH1">Progress Notes </th>
     <th class="TH1">Treatment</th>
	  <td>&nbsp;
                <input type="button" name="Submit" value=" + " class="butnbg1"  onclick="addRow('dataTable3')" alt="addrow"/>
			<input type="button" name="Submit" value=" - " class="butnbg1" onclick="deleteRow('dataTable3')" /> 
			 
      </td>
    </tr>
	   
 </thead>
 <?php
if($query9){
$o=1;
 while($row9 = mysql_fetch_array($query9))
{
$prdatetime=date('d-m-Y h:i:s', strtotime($row9[0]));
$processnotes=$row9[1];
$treatment=$row9[2];
$o=$o+1;

?>
 <tr>
<td class="casesheet"><input type="text" name="prdatetime" id="prdatetime<?php echo $o ?>" value="<?php echo $prdatetime ?>" class="tcal" ></td>
<td class="casesheet"><input type="text" name="processnotes" id="processnotes<?php echo $o ?>" value="<?php echo $processnotes ?>" class="textbox1"></td>
<td class="casesheet"><textarea  name="treatment" id="treatment<?php echo $o ?>" value="" class="textbox1"><?php echo $treatment ?></textarea></td>


</tr>
  <?php
					}}//for
				?>	
<input type="hidden" name="count1" id="count1" value="<?php echo ($o-1) ?>" />
							
</table>
<?php
//////////End of Progress Notes/////////////////////////////////

echo "@";
///////////////Nursing///////////////
?>


<?php
$ff="select distinct date_time,product_name,dose,route,frequency,special_proc,cnr.remarks,balance_qty FROM ip_pat_admit as a,patientregister as b,casesheet_nursesrecord as cnr,phr_purinv_dtl as pdtl WHERE a.PAT_REGNO=b.registerno and pdtl.inv_id=cnr.inv_id and cnr.pat_no='$emp_id'";
$query10=mysql_query($ff);

?>
<table width="100%" class="sortable" id="dataTable5">
 <thead>
   <tr>
     <th class="TH1">Date/Time </th>
     <th class="TH1">Medicine Name </th>
     <th class="TH1">Dose </th>
     <th class="TH1">Route</th>
	 <th class="TH1">Frequency</th>
	 <th class="TH1">SpecialProcdeure</th>
	 <th class="TH1">Remarks</th> 
	  <td>&nbsp;
                <input type="button" name="Submit" value=" + " class="butnbg1"  onclick="addRow5('dataTable5')" alt="addrow"/>
			<input type="button" name="Submit" value=" - " class="butnbg1" onclick="deleteRow5('dataTable5')" /> 
			 
      </td>
    </tr>
	   
 </thead>
<?php
if($query10){
$n1=1;
 while($row10 = mysql_fetch_array($query10))
{
$ndatetime=$row10[0];
$itemcode=$row10[1];
$dose=$row10[2];
$route=$row10[3];
$frequency=$row10[4];
$specialproc=$row10[5];
$remarks=$row10[6];
$bqty=$row10[7];


?>
 <tr>
<td class="casesheet"><input type="text" name="ndatetime"  id="ndatetime<?php echo $n1 ?>" value="<?php echo $ndatetime ?>" class="textbox1" readonly="readonly" ></td>
<td class="casesheet"><div id="itemcode<?php echo $n1 ?>"><input type="text" name="itemcode" id="itemcode<?php echo $n1 ?>" value="<?php echo $itemcode ?>" class="textbox1" readonly="readonly"></div></td>
<td class="casesheet"><input type="text" name="dose" id="dose<?php echo $n1 ?>" size=5 value="<?php echo $dose ?>" class="textbox1" readonly="readonly"></td>
<td class="casesheet"><input type="text" name="route" id="route<?php echo $n1 ?>" size=5  value="<?php echo $route ?>" class="textbox1" readonly="readonly"></td>
<td class="casesheet"><input type="text" name="frequency" id="frequency<?php echo $n1 ?>" size=5 value="<?php echo $frequency ?>" class="textbox1" readonly="readonly"></td>
<td class="casesheet"> <textarea name="specialproc" id="specialproc<?php echo $n1 ?>" cols="12" rows="1" class="textarea1" value="" readonly="readonly"><?php echo $specialproc ?></textarea></td>
<td class="casesheet"><textarea name="remarks" id="remarks<?php echo $n1 ?>" cols="12" rows="1" class="textarea1" value="" readonly="readonly"><?php echo $remarks ?></textarea></td>
<td class="casesheet"><input type="hidden" id="bqty<?php echo $n1 ?>" name="bqty"  size=5 class="textbox1" value="<?php echo $bqty ?>" readonly="readonly"></td>


</tr>
  <?php $n1=$n1+1; }}	?>									
<input type="hidden" name="count5" id="count5" value="<?php echo ($n1-1) ?>" />
			
</table>

<?php
//////////End of Nursing/////////////////////////////////

echo "@";
///////////////IP ROOM TRANSFER///////////////
?>

<?php

$query11=mysql_query("select b.room_no,a.BED_NO,a.START_DATE,a.START_TIME,END_DATE , END_TIME FROM ip_pat_bed as a,bed_details as b,ip_pat_admit as c,patientregister as d WHERE a.BED_NO=b.BED_NO and a.PAT_NO=c.PAT_NO and d.registerno=c.PAT_REGNO and end_date is null and a.PAT_NO='$emp_id'");

?>
<table width="100%" class="sortable" >
 <thead>
   <tr>
  <th class="TH1">Room No </th>
  <th class="TH1">Bed No </th>
  <th class="TH1">Start Date</th>
  <th class="TH1">Start Time </th>
  <th class="TH1">End Date</th>
  <th class="TH1"> End Time </th>
	
    </tr>
	   
 </thead>
 <?php
 if($query11){
$P1=1;
 while($row11 = mysql_fetch_array($query11))
{
$POOMNO=$row11[0];
$BEDNO=$row11[1];
$STARTDATE=date('d-m-Y',strtotime($row11[2]));
$STARTTIME=date('h:i:s',strtotime($row11[3]));
$ENDDATE=date('d-m-Y',strtotime($row11[4]));
$ENDTIME=date('h:i:s',strtotime($row11[5]));
if($ENDDATE==null)
	$ENDDATE="---";
if($ENDTIME==null)
	$ENDTIME="---";
$P1=$P1+1;
?>
<?php /*?> <tr>
<td class="casesheet"><input type="text" name="POOMNO"  id="POOMNO<?php echo $P2 ?>" value="<?php echo $POOMNO ?>" class="textbox1" readonly ></td>
<td class="casesheet"><input type="text" name="BEDNO" id="BEDNO<?php echo $P2 ?>" value="<?php echo $BEDNO ?>" class="textbox1" readonly></td>
<td class="casesheet"><input type="text" name="STARTDATE" id="STARTDATE<?php echo $P2 ?>" value="<?php echo $STARTDATE ?>" class="textbox1" readonly></td>
<td class="casesheet"><input type="text" name="STARTTIME" id="STARTTIME<?php echo $P2 ?>" value="<?php echo $STARTTIME ?>" class="textbox1" readonly></td>
<td class="casesheet"><input type="text" name="ENDDATE" id="ENDDATE<?php echo $P2 ?>" value="<?php echo $ENDDATE ?>" class="textbox1" readonly></td>
<td class="casesheet"> <input type="text" name="ENDTIME" id="ENDTIME<?php echo $P2 ?>" cols="20" rows="2" class="textarea1" readonly value="<?php echo $ENDTIME ?>"></td>


</tr><?php */?>
  <?php } } ?>									

</table>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<?php
 $x="SELECT a.PAT_NO,patientname,a.START_DATE,b.room_no,a.BED_NO,a.start_TIME,
 a.alloted_by,d.age,d.gender  FROM ip_pat_bed as a,bed_details as b,ip_pat_admit as c,patientregister
  as d WHERE a.bed_no=b.bed_no and a.pat_no=c.pat_no and d.registerno=c.pat_regno 
  and end_date is null and a.pat_no='$emp_id' and DIS_STATUS='ADMITTED'";
$query12 = mysql_query($x);

while($row12 = mysql_fetch_array($query12))
{
$name=$row12[1];
$dc=date('d-m-Y',strtotime($row12[2]));
$room2=$row12[3];
$bed2=$row12[4];
$time=$row12[5];
$allot=$row12[6];
$gender=$row12['gender'];
$age=$row12['age'];
?>
<table width="90%" border="0" cellpadding="2" cellspacing="2" id="table1">
            <tr>
              <td colspan="4" class="filepath_bg home_loginlink"><div align="left">Patient Information</div>  </td>
              </tr>
              
             <tr>
              <td class="label1" ><div align="right"> Patient Name </div></td>
              <td width="14%" align="left" class="label1"><input name="pname" readonly="readonly" type="text" class="textbox1"  value="<?php echo $name ?>" readonly  id="pname" size="10"/></td>
              <td width="23%" class="label1" ><div align="right"><strong>Gender/Age:</strong><?php echo $gender ?>/<?php echo $age ?></div></td>
              <td width="29%" align="left" class="label1"></td>
            </tr>
          
            <tr>
              <td class="label1" ><div align="right"> Admit Date </div></td>
              <td width="14%" align="left" class="label1"><input name="adm_date" type="text" class="textbox1"  value="<?php echo $dc ?>" readonly  id="adm_date" size="10"/></td>
              <td width="23%" class="label1" ><div align="right">Admit Time</div></td>
              <td width="29%" align="left" class="label1"><input name="adm_time" type="text" class="textbox1" value="<?php echo $time ?>" readonly id="adm_time" size="10"/></td>
            </tr>
            <tr>
              <td colspan="4" class="filepath_bg home_loginlink"><div align="left">Present Room Details</div>  </td>
            </tr>

            <tr>
              <td class="label1" ><div align="right">Room No </div></td>
              <td class="label1" ><input name="room_no" type="text" class="textbox1" readonly id="room_no" value="<?php echo $room2 ?>" size="10"/></td>
              <td class="label1" ><div align="right">Bed No </div></td>
              <td align="left"><input name="bed_no" type="text" class="textbox1" readonly id="bed_no" value="<?php echo $bed2 ?>" size="10"/></td>
            </tr>
            <tr>
              <td class="label1" ><div align="right">Starting Date </div></td>
              <td align="left"><input name="st_date" type="text" class="textbox1"  id="st_date" value="<?php echo $dc ?>" readonly=readonly size="10" ></td>
              <td class="label1" ><div align="right">Starting Time </div></td>
              <td align="left"><input name="st_time" type="text" class="textbox1"  id="st_time" value="<?php echo $time ?>" readonly=readonly/ size="10"></td>
            </tr>
            <?php } ?>
 <tr>
              <td colspan="4" class="filepath_bg home_loginlink"><div align="left">Rent Calculation </div>  </td>
            </tr>

            <tr>
              <td class="label1" ><div align="right">End Date </div></td>
              <td align="left"><input name="e_date" id="e_date" type="text" class="tcal" value="<?php echo date('d-m-Y') ?>" size="10"/>
			  <!--<a href="javascript:NewCal('e_date','ddmmyyyy',true,24)" >&nbsp;<img src="../images/calender.JPG" width="18" height="18" border="0" ></a>-->
                </td>
              <td class="label1" ><div align="right">End  Time </div></td>
              <td align="left"><input name="e_time" id="e_time" type="text" class="textbox1"   size="4"  value="<?php echo date('h:i:s') ?>"/>
                      <select name="etime1" id="etime1">
                    <option value="<?php echo $time1 ?>"><?php echo $time1 ?></option>
                    <option value="PM">PM </option>
                    <option value="AM">AM </option>
                  </select>
              </td>
            </tr>
            <tr>
              <td class="label1" ><div align="right"> Alloted By </div></td>
              <td colspan="3" align="left"><input name="allotedby" type="text" class="textbox1" id="allotedby" value="<?php echo $allot ?>"/></td>
            </tr>

            

            <tr>
              <td colspan="4" ><table width="60%" >
                <tr> <td>
				<fieldset><legend><b style=" color:#FF6600 ">Do you want To Change the Room</b></legend><div align="center" ><input type="radio" name="change" value="Yes"  onclick="javascript:transfer(1)" id="change"/>YES &nbsp; &nbsp;
<input type="radio" name="change" value="No" onclick="javascript:transfer(2)" id="change" />NO </div></fieldset>
</td></tr></table></td>
            </tr>
				
            <tr id="transfer_table" style="display:none">
		        <td colspan="4" ><table width="100%"><tr>
		        <td colspan="4" class="filepath_bg home_loginlink"><div align="left">Transfer  Room Details</div>  </td>
            </tr>
            <tr>
              <td width="25%" class="label1" ><div align="right">Room No </div></td>
              <td width="22%" class="label1" ><input name="tr_rooms_no" id="tr_rooms_no" type="text" class="textbox1" readonly="readonly" size="10" onclick="window.open('patient_bedtrans_beds_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" /></td>
              <td width="28%" class="label1" ><div align="right">Bed No </div></td>
              <td width="25%" align="left"><input name="tr_beds_no" type="text"  class="textbox1" readonly="readonly" size="10" id="tr_beds_no"/></td>
            </tr>
            <tr>
              <td class="label1" ><div align="right">Starting Date </div></td>
              <td align="left"><input name="tr_st_date" type="text" class="textbox1" id="tr_st_date"  size="10"/> 
			<!-- <a href="javascript:NewCal('tr_st_date','ddmmyyyy',true,24)" >&nbsp;<img src="../images/calender.JPG" width="18" height="18" border="0" ></a>-->
			  </td>
              <td class="label1" ><div align="right">Starting Time </div></td>
              <td align="left"><input name="tr_st_time" type="text" class="textbox1" id="tr_st_time"  size="8"/>

<select name="time1" id="time1" >
                   <option value="PM">PM </option>
                   <option value="AM">AM </option>
                 </select>

</td>
            </tr>
			
			
			</table> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
			<tr >
  <td width="34%" class="label1" >&nbsp;</td>
            <td width="14%" class="label1" ><div align="center">
             <a href="Paient_Room_Transfer_Update.jsp"> <input name="image" type="image" src="images/save1.gif" /></a>
              &nbsp; 
            </div></td></tr>
          </table>
<?php
//////////End of IP ROOM TRANSFER/////////////////////////////////

echo "@";
///////////////Birth Records///////////////
?>



<?php
$query13=mysql_query("select distinct birth_date,sex,weight FROM ip_pat_admit as a,patientregister as b,casesheet_babybirthrecord as cbb WHERE a.PAT_REGNO=b.registerno and cbb.pat_no='$emp_id'");

?>
<table width="100%" class="sortable" id="dataTable7" align="center">
 <thead>
   <tr>
      <th  class="TH1">BirthDate Time</th>
        <th  class="TH1">Sex</th>
       <th  class="TH1">Weight(Kgs)</th>
									 
	  <td>&nbsp;
                <input type="button" name="Submit" value=" + " class="butnbg1"  onclick="addRow7('dataTable7')" alt="addrow"/>
			<input type="button" name="Submit" value=" - " class="butnbg1" onclick="deleteRow7('dataTable7')" /> 
			 
      </td>
    </tr>
	   
 </thead>
 <?php
if($query13){
$u1=1;
 while($row13 = mysql_fetch_array($query13))
{
$bdatetime=date('d-m-Y h:i:s',strtotime($row13[0]));
$sex=$row13[1];
$weight=$row13[2];


?>
 <tr>
<td class="casesheet"><input type="text" name="bdatetime"  id="bdatetime<?php echo $u1 ?>" value="<?php echo $bdatetime ?>" class="tcal" ></td>
<td class="casesheet"><input type="text" name="sex" id="sex<?php echo $u1 ?>" value="<?php echo $sex ?>" class="textbox1"></td>
<td class="casesheet"><input type="text" name="weight" id="weight<?php echo $u1 ?>" size=5 value="<?php echo $weight ?>" class="textbox1"></td>



</tr>
  <?php $u1=$u1+1;}}	?>									
<input type="hidden" name="count7" id="count7" value="<?php echo ($u1-1) ?>" />
			
</table>
<?php
//////////End of Birth Records/////////////////////////////////

echo "@";
///////////////Birth Records Second Part///////////////
?>


<?php
$query14=mysql_query("select distinct vac_name,vac_date FROM ip_pat_admit as a,patientregister as b,casesheet_vaccinationdetails as cbv WHERE a.PAT_REGNO=b.registerno and cbv.pat_no='$emp_id'");

?>
<table width="100%" class="sortable" id="dataTable8" align="center">
 <thead>
   <tr>
      <th  class="TH1">Vaccine</th>
       <th  class="TH1">Date</th>
                                      
									 
	  <td>&nbsp;
              <input type="button" name="Submit" value=" + " class="butnbg1"  onclick="addRow8('dataTable8')" alt="add row"/>
			<input type="button" name="Submit" value=" - " class="butnbg1" onclick="deleteRow8('dataTable8')" /> 
			 
      </td>
    </tr>
	   
 </thead>
 <?php
if($query14){
$g1=1;
 while($row14 = mysql_fetch_array($query14))
{
$Vaccination=$row14[0];
$vDate=date('d-m-Y h:i:s',strtotime($row14[1]));



?>
 <tr>
<td class="casesheet"><input type="text" name="Vaccination"  id="Vaccination<?php echo $g1 ?>" value="<?php echo $Vaccination ?>" class="textbox1" ></td>
<td class="casesheet"><input type="text" name="vDate" id="vDate<?php echo $g1 ?>" value="<?php echo $vDate ?>" class="textbox1"></td>
</tr>
  <?php $g1=$g1+1;}}	?>									
<input type="hidden" name="count8" id="count8" value="<?php echo ($g1-1) ?>" />
			
</table>
<?php
//////////End ofBirth Records Second Part/////////////////////////////////

echo "@";
///////////////In Take Record///////////////
?>

<?php
$query15=mysql_query("select distinct date_time,particulars,ivfluids,oral FROM ip_pat_admit as a,patientregister as b,casesheet_intakedetails as intake WHERE a.PAT_REGNO=b.registerno and intake.pat_no='$emp_id'");

?>
<table width="100%" class="sortable" id="dataTable9" align="center">
 <thead>
   <tr>
      <th width="18%"  class="TH1">Date/Time</th>
        <th width="24%"  class="TH1">Particulars</th>
        <th width="23%"  class="TH1">I/V Fluids(ml)</th>
      <th width="18%"  class="TH1">Oral(ml)</th>
                                      
									 
	  <td width="17%">&nbsp;
                <input type="button" name="Submit" value=" + " class="butnbg1"  onclick="addRow9('dataTable9')" alt="addrow"/>
			<input type="button" name="Submit" value=" - " class="butnbg1" onclick="deleteRow9('dataTable9')" /> 
			    </tr>
 </thead>
 <?php
if($query15){
$s1=1;
 while($row15 = mysql_fetch_array($query15))
{
$intakedatetime=date('d-m-Y h:i:s',strtotime($row15[0]));
$particulars=$row15[1];
$idfluds=$row15[2];
$oral=$row15[3];



?>
 <tr>
   <td class="casesheet"><input type="text" name="intakedatetime"  id="intakedatetime<?php echo $s1 ?>" value="<?php echo $intakedatetime ?>" class="tcal" /></td>
   <td class="casesheet"><textarea  name="particulars" id="particulars<?php echo $s1 ?>"  class="textbox1"><?php echo $particulars ?></textarea></td>
<td class="casesheet"><input type="text" name="idfluds"  id="idfluds<?php echo $s1 ?>" size="5" value="<?php echo $idfluds ?>" class="textbox1" ></td>
<td class="casesheet"><input type="text" name="oral" id="oral<?php echo $s1 ?>" value="<?php echo $oral ?>" size="5" class="textbox1"></td>
</tr>
  <?php $s1=$s1+1;}}	?>
<input type="hidden" name="count9" id="count9" value="<?php echo ($s1-1) ?>" />      </td>
   
</table>
<?php
//////////End of In Take Record/////////////////////////////////

echo "@";
///////////////out put Record///////////////
?>
<?php
$query16=mysql_query("select distinct date_time,urine,faces,respiration,skin FROM ip_pat_admit as a,patientregister as b,casesheet_outputdetails as output WHERE a.PAT_REGNO=b.registerno and output.pat_no='$emp_id'");

?>
<table width="100%" class="sortable" id="dataTable10" align="center">
 <thead>
   <tr>
      <th  class="TH1">Date/Time</th>
      <th  class="TH1">Urine(ml)</th>
      <th  class="TH1">Feaces(ml)</th>
      <th  class="TH1">Respitation(ml)</th>
	  <th  class="TH1">Skin(ml)</th>
                                      
									 
	  <td>&nbsp;
                <input type="button" name="Submit" value=" + " class="butnbg1"  onclick="addRow10('dataTable10')" alt="addrow"/>
			<input type="button" name="Submit" value=" - " class="butnbg1" onclick="deleteRow10('dataTable10')" /> 
			 
      </td>
    </tr>
	   
 </thead>
 <?php
if($query16){
$t1=1;
 while($row16 = mysql_fetch_array($query16))
{
$outpurdatetime=date('d-m-Y h:i:s',strtotime($row16[0]));
$urine=$row16[1];
$faces=$row16[2];
$respitation=$row16[3];
$skin=$row16[4];
$t1=$t1+1;
	?>
 <tr>
<td class="casesheet"><input type="text" name="outpurdatetime"  id="outpurdatetime<?php echo $t1 ?>" value="<?php echo $outpurdatetime ?>" class="tcal" ></td>
<td class="casesheet"><input  name="urine" id="urine<?php echo $t1 ?>" size="5" class="textbox1" value="<?php echo $urine ?>"></td>
<td class="casesheet"><input type="text" name="faces"  id="faces<?php echo $t1 ?>" size="5" value="<?php echo $faces ?>" class="textbox1" ></td>
<td class="casesheet"><input type="text" name="respitation" id="respitation<?php echo $t1 ?>" size="5" value="<?php echo $respitation ?>" class="textbox1"></td>
<td class="casesheet"><input type="text" name="skin" id="skin<?php echo $t1 ?>" value="<?php echo $skin ?>"  size="5" class="textbox1"></td>



</tr>
  <?php } }	?>									
<input type="hidden" name="count10" id="count10" value="<?php echo ($t1-1) ?>" />
			
</table>
<?php
//////////End of out put Record/////////////////////////////////

echo "@";
///////////////Bed Side Procedures///////////////
?>


<?php
$query17=mysql_query("select distinct startdatetime,enddatetime,qty,name FROM ip_pat_admit as a,patientregister as b,casesheet_bedsideproc as bed,icu_equipment_mast as icu WHERE a.PAT_REGNO=b.registerno and bed.equip_id=icu.id and bed.pat_no='$emp_id'");

?>
<table width="100%" class="sortable" id="dataTable11" align="center">
 <thead>
   <tr>
     
                                      <th  class="TH1">Service Provided </th>
                                      <th  class="TH1">Start Date/Time </th>
									    <th class="TH1">End Date/Time</th>
									    <th class="TH1">Qty</th>
                                      
									 
	  <td>&nbsp;
                <input type="button" name="Submit" value=" + " class="butnbg1"  onclick="addRow11('dataTable11')" alt="addrow"/>
			<input type="button" name="Submit" value=" - " class="butnbg1" onclick="deleteRow11('dataTable11')" /> 
			 
      </td>
    </tr>
	   
 </thead>
<?php
if($query17){
$e1=1;
 while($row17 = mysql_fetch_array($query17))
{
$startdatetime=date('d-m-Y h:i:s',strtotime($row17[0]));
$enddatetime=date('d-m-Y h:i:s',strtotime($row17[1]));
$name=$row17[3];
$qty=$row17[2];
$e1=$e1+1;
?>
 <tr>
 <td class="casesheet"><input type="text" name="name" id="name<?php echo $e1 ?>" value="<?php echo $name?>" class="textbox1" onclick="window.open('critequip_popup.php?rowCount=<?php echo $e1 ?>','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')"></div></td>

<td class="casesheet"><input type="text" name="startdatetime"  id="startdatetime<?php echo $e1 ?>" value="<?php echo $startdatetime ?>" class="tcal" ></td>
<td class="casesheet"><input type="text" name="enddatetime"  id="enddatetime<?php echo $e1 ?>" value="<?php echo $enddatetime ?>" class="tcal" ></td>
<td class="casesheet"><input type="text" name="qty" id="qty<?php echo $e1 ?>" value="<?php echo $qty?>" size="5" class="textbox1"></td>



</tr>
  <?php } }	?>									
<input type="hidden" name="count11" id="count11" value="<?php echo ($e1-1) ?>" />
			
</table>
<?php 
//////////End of out put Record/////////////////////////////////

echo "@";
///////////////Bed Side Procedures///////////////
?>


<?php
$query18=mysql_query("select product_name,qty,balance_qty,prd_code,opsur.inv_id FROM ip_pat_admit as a,patientregister as b,casesheet_surgerydetails_dtl as opsur,casesheet_surgerydetails as msd, phr_purinv_dtl as pdtl WHERE a.PAT_REGNO=b.registerno and a.PAT_NO=msd.pat_no and msd.id=opsur.mast_id and pdtl.inv_id=opsur.inv_id  and msd.pat_no='$emp_id'");

?>
<table width="70%" class="sortable" id="dataTable12" align="center">
 <thead>
   <tr>
     
                                <th  class="TH1">Mdi.Name</th>
                                <th class="TH1" style="display: none">Avl.Quantity</th>
                                      <th class="TH1">Used Quantity</th>
                                      
									 
	  <td>&nbsp;
            <input type="button" name="Submit" value=" + " class="butnbg1"  onclick="addRow12('dataTable12')" alt="addrow"/>
			<input type="button" name="Submit" value=" - " class="butnbg1" onclick="deleteRow12('dataTable12')" /> 
			 
      </td>
    </tr>
	   
 </thead>
 <?php	
if($query18){
$f1=1;
 while($row18 = mysql_fetch_array($query18))
{
$mediname=$row18[0];
$avqty=$row18[2];
$usedqty=$row18[1];
$prdcode=$row18[3];
$invid=$row18[4];

$f1=$f1+1;
?>
 <tr>

 <td class="casesheet"><input type="text" name="mediname" id="mediname<?php echo $f1 ?>" value="<?php echo $mediname ?>" class="textbox1"onclick="window.open('drug_popup_op.php?rowCount=<?php echo $f1 ?>','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')"></div></td>
<td class="casesheet"><input type="text" name="usedqty"  id="usedqty<?php echo $f1 ?>" value="<?php echo $usedqty ?>" class="textbox1"  readonly></td>
 <td class="casesheet"><input type="hidden" name="avqty"  id="avqty<?php echo $f1 ?>" value="<?php echo $avqty ?>" class="textbox1" readonly ></td>
  <td class="casesheet"><input type="hidden" name="prdcode" id="prdcode<?php echo $f1 ?>" value="<?php echo $prdcode ?>" class="textbox1"></td>
  <td class="casesheet"><input type="hidden" name="invid" id="invid<?php echo $f1 ?>" value="<?php echo $invid ?>" class="textbox1"></td>



</tr>
  <?php } }	?>									

<input type="hidden" name="count12" id="count12" value="<?php echo ($f1-1) ?>" />
			
</table>
<?php
//////////End of Bed Side Procedures/////////////////////////////////

echo "@";
/////////////// in Discharge Summary  for getting doctor name///////////////
?>



<?php
$query19 =mysql_query("select distinct anae_docname from ip_pat_admit as a,patientregister as b,casesheet_doctorvists as cdv,outside_consultants as docm where  a.pat_regno=b.registerno and docm.OUT_CONSNO=cdv.doc_code and  cdv.pat_no='$emp_id'");




?>
<?php	
if($query19){
$dsd=1;
while($row19 = mysql_fetch_array($query19)){
$doctorname=$row19[0];
$dsd=$dsd+1;
 if($dsd==1)
 {
?>
<?php echo $doctorname ?>
<?php }
else{ ?>
<?php echo $ch ?><?php echo $doctorname ?><?php }} }?>
<?php
//////////End of Discharge Summary doctor name/////////////////////////////////

echo "@";
///////////////in Discharge Summary  for getting treatmane///////////////
?>


<?php
$ss="select distinct special_proc from ip_pat_admit as a,patientregister as b,casesheet_nursesrecord as cdnurse  where 
 a.pat_regno=b.registerno  and  cdnurse.pat_no='$emp_id'";
$query20 = mysql_query($ss);

?>
<?php	
if($query20){
$sproc=1;
while($row20 = mysql_fetch_array($query20)){
$specialproc1=$row20[0];
$sproc=$sproc+1;

if($sproc==1)
{
?><?php echo $specialproc1 ?><?php }
else{ ?>
<?php echo $ch ?><?php echo $specialproc1 ?><?php } }} ?>
<?php
//////////End of Discharge Summary trearment/////////////////////////////////

echo "@";
///////////////in Discharge Summary  for getting invg///////////////
?>


<?php /*?><?php
//echo $FFF="select  cds.history,cds.clinical_findings,cds.course_hospital,cds.treatment_advice from ip_pat_admit as a,
 //patientregister as b,casesheet_dischargesummay as cds where a.PAT_REGNO=b.registerno and cds.pat_no='PAT-101'
 // and a.PAT_NO=cds.pat_no";  
$f="select * from `casesheet_dischargesummay` where `pat_no`='PAT-101'";
$query22 = mysql_query($f);
//if($query22){
//$ds=0;
while($row22 = mysql_fetch_array($query22)){
$history=$row22['history'];
$clinical=$row22['clinical_findings'];       
$course=$row22['course_hospital'];         
$treatment1=$row22['treatment_advice'];   
//$ds++;
}

//}
?>
<?php
echo "@".$history."@".$clinical."@".$course."@".$treatment1;//"@".$ds;
?><?php */?>
<?php
//////////End of Discharge Summary/////////////////////////////////

echo "@";
///////////////Surgary Details///////////////
?>
<?php /*?>
<?php
$ot_cost=0;
echo $ff="select distinct csd.pre_operative,csd.post_operative,csd.procedure_done,csd.SURGERY_Name,csd.SURGeon_Name,csd.Anesthesit_Name,
csd.Assistant_Name1,csd.Assistant_Name2,csd.Assistant_Name3,csd.Assistant_Name4,csd.Surgical_notes,
csd.operative_finding,csd.anaesthesia_notes,csd.Date,csd.ST_TIME,csd.ENd_TIME,oth.THEATER_NAME,csd.ot_cost
 from casesheet_surgerydetails as csd,operation_theater as oth
  where oth.THEATER_CODE=csd.THEATER_Id and  csd.pat_no='$emp_id'";
  
  //echo $ff="select distinct csd.pre_operative,csd.post_operative,csd.procedure_done,csd.SURGERY_Name,csd.SURGeon_Name,csd.Anesthesit_Name,
//csd.Assistant_Name1,csd.Assistant_Name2,csd.Assistant_Name3,csd.Assistant_Name4,csd.Surgical_notes,
//csd.operative_finding,csd.anaesthesia_notes,csd.Date,csd.ST_TIME,csd.ENd_TIME,oth.THEATER_NAME,csd.ot_cost
 //from ip_pat_admit as a,patientregister as b,casesheet_surgerydetails as csd,operation_theater as oth
 // where a.PAT_REGNO=b.registerno and oth.THEATER_CODE=csd.THEATER_Id and  csd.pat_no='$emp_id'";
$query23 =mysql_query($ff) or mysql_error($ff);
if($query23){
$sd=0;
while($row23 = mysql_fetch_array($query23)){
$pre=$row23[0];
$post=$row23[1];       
$procedure=$row23[2];          
$sur=$row23[3];
$surgeon=$row23[4];
$Anesthesit=$row23[5];        
$AssistantName1=$row23[6];         
$AssistantName2=$row23[7];
$AssistantName3=$row23[8]; 
$AssistantName4=$row23[9];
$Surgicalnotes=$row23[10];     
$Operativefinding=$row23[11];
$Anaesthesianotes= $row23[12];  
$date1=date('d-m-Y h:i:s',strtotime($row23[13]));   
$sttime=$row23[14];
      
$endtime=$row23[15];
$tname=$row23[16];
$ot_cost=$row23[17];
$sd++;
}

}
?>
<?php
echo "@".$pre."@".$post."@".$procedure."@".$sur."@".$surgeon."@".$Anesthesit."@".$AssistantName1."@".$AssistantName2."@".$AssistantName3."@".$AssistantName4."@".$Surgicalnotes."@".$Operativefinding."@".$Anaesthesianotes."@".$date1."@".$sttime."@".$endtime."@".$tname."@".$stime1."@".$etime1."@".$sd."@".$dsd;
?><?php */?>
<?php
//////////End of Discharge Summary/////////////////////////////////

echo "@";
///////////////Surgary Details///////////////
?>
<?php /*?><?php
$query24 =mysql_query("select distinct theater_name,csd.theater_id from ip_pat_admit as a,patientregister as b,casesheet_surgerydetails as csd,operation_theater as oth where a.pat_regno=b.registerno and oth.theater_code=csd.theater_id and  csd.pat_no='$emp_id'");
if($query24){
$row24 = mysql_fetch_array($query24);
$tname1=$row24[0];
$tcode1=$row24[1];
}
?>
<select name="ot" id="ot" ><option selected value="<?php echo $tcode1 ?>"><?php echo $tname1 ?></option>
 <?php		 		
			 $sql = mysql_query("select THEATER_CODE,THEATER_NAME from operation_theater");
			 while($res = mysql_fetch_array($sql))
			 { ?>
			 
			 <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
			 <?php
			 }
			 ?>
										
										 </select>
<?php
$query25 = mysql_query("select distinct review,tc,treat_given from ip_pat_admit as a,patientregister as b,casesheet_dischargesummay as cds where a.pat_regno=b.registerno  and  cds.pat_no='$emp_id'");
if($query25){
$ds2=0;
while($row25 = mysql_fetch_array($query25)){
$review=$row25[0];
$tc=$row25[1]; 
$tg=$row25[2];     
$ds2++;
}
}
?>
<?php
echo "@".$review."@".$tc."@".$ds2."@".$patno."@".$ot_cost."@".$tg;
?>
<?php
$query26 =mysql_query("select distinct wife_of,po,ps,dist,del_by,sex,birth_date from ip_pat_admit as a,casesheet_birth_certificate as cbc where a.pat_no=cbc.pat_no  and  cbc.pat_no='$emp_id'");
if($query26){
$bc=1;
$sql1 = mysql_query("select gender from patientregister as a,ip_pat_admit as b where a.registerno=b.pat_regno and b.pat_no='$emp_id' and gender='male'");
if($sql1)
{
$bc=0;
}
if($bc==1)
{
while($row26 = mysql_fetch_array($query26)){
$wifeof=$row26[0];
$po=$row26[1];    
$ps=$row26[2]; 
$dist=$row26[3];
$delby=$row26[4]; 
$babysex=$row26[5];    
$bdate=$row26[6];  

}
}
}
?>
<?php
echo "@".$wifeof."@".$po."@".$ps."@".$dist."@".$delby."@".$babysex."@".$bdate."@".$bc;
?>
<?php
$query27 = mysql_query("select distinct religion,nation,mr_status,name_of,dod,disease, case_of, name_rec, name_mo, add_rec, ph_rec,date_rec,ADMIT_DATE  from ip_pat_admit as a,casesheet_death_certificate as cdc where a.pat_no=cdc.pat_no  and  cdc.pat_no='$emp_id'");
if($query27){
$deathc=0;
while($row27 = mysql_fetch_array($query27)){
$religion=$row27[0];
$nation=$row27[1];  
$mrstatus=$row27[2]; 
$nameof=$row27[3];
$dod=date('d-m-Y h:i:s',strtotime($row27[4]));    
$disease=$row27[5];      
$caseof=$row27[6];
$namerec=$row27[7];
$namemo=$row27[8];
$addrec=$row27[9];  
$phrec=$row27[10]; 
$daterec=date('d-m-Y',strtotime($row27[11])); 
$admitdate=date('d-m-Y',strtotime($row27[12]));
$deathc++;
}
}
?>
<?php
echo "@".$religion."@".$nation."@".$mrstatus."@".$nameof."@".$dod."@".$disease."@".$caseof."@".$namerec."@".$namemo."@".$addrec."@".$phrec."@".$daterec."@".$admitdate."@".$deathc;
?>
<?php
$query28 =mysql_query("select distinct weight from ip_pat_admit as a,casesheet_birth_certificate as cbc where a.pat_no=cbc.pat_no  and  cbc.pat_no='$emp_id'");
if($query28){
$row28 = mysql_fetch_array($query28);
$weight1 = $row28[0];

}
?>
<?php
echo "@".$weight1."@";
?>
<?php
$query29 = mysql_query("select ADMIT_DATE from ip_pat_admit where pat_no='$emp_id'");
if($query29){
$row29 = mysql_fetch_array($query29);
$padmitdate = date('d-m-Y',strtotime($row29[0]));
}	
?>
<?php
echo "@".$padmitdate."@";
?><?php */?>

<?php /*?><?php
$query21 = mysql_query("select distinct invg_item_name FROM lab_req_mast as a,lab_req_dtl as b,lab_invg_item as c WHERE a.lr_no=b.lr_no and b.invg_item_code=c.invg_item_code and a.lr_for='$emp_id'");

?>
<?php	
if($query21){
$iin=1;
while($row21 = mysql_fetch_array($query21)){
$inname=$row21[0];
$iin=$iin+1;


 if($iin==1)
 {
?><?php echo $inname ?><?php }
else{ ?>
<?php echo $ch ?><?php echo $inname ?><?php }}} ?>

<?php

echo "@".$q."@".$P1."@".$sproc."@".$iin;
//+ "@"+ drug_his + "@" + family + "@" + treat + "@" + Illness + "@" + procedure + "@" + exam + "@" + ints_pat + "@"  + dis_dat + "@" + dsum );
?><?php */?>

 <?php /*?>

<?php
//////////End of Discharge Summary trearment/////////////////////////////////

echo "@";
/////////////// Discharge Summary Main Values ///////////////
?>
<?php
$query22 = mysql_query("select distinct history,clinical_findings,course_hospital,treatment_advice from ip_pat_admit as a,patientregister as b,casesheet_dischargesummay as cds where a.pat_regno=b.registerno  and  cds.pat_no='$emp_id'");
if($query22){
$ds=0;
while($row22 = mysql_fetch_array($query22)){
$history=$row22[0];
$clinical=$row22[1];       
$course=$row22[2];         
$treatment1=$row22[3];   
$ds++;
}

}
?>
<?php
echo "@".$history."@".$clinical."@".$course."@".$treatment1."@".$ds;
?>
<?php
//////////End of Discharge Summary/////////////////////////////////

echo "@";
///////////////Surgary Details///////////////
?>
<?php
$ot_cost=0;
$query23 =mysql_query("select distinct pre_operative,post_operative,procedure_done,surgery_name,surgeon_name,Anesthesit_name,Assistant_Name1,Assistant_Name2,Assistant_Name3,Assistant_Name4,Surgical_notes,Operative_finding,Anaesthesia_notes,date,st_time,end_time,oth.theater_name,ot_cost from ip_pat_admit as a,patientregister as b,casesheet_surgerydetails as csd,operation_theater as oth where a.pat_regno=b.registerno and oth.theater_code=csd.theater_id and  csd.pat_no='$emp_id'");
if($query23){
$sd=0;
while($row23 = mysql_fetch_array($query23)){
$pre=$row23[0];
$post=$row23[1];       
$procedure=$row23[2];          
$sur=$row23[3];
$surgeon=$row23[4];
$Anesthesit=$row23[5];        
$AssistantName1=$row23[6];         
$AssistantName2=$row23[7];
$AssistantName3=$row23[8]; 
$AssistantName4=$row23[9];
$Surgicalnotes=$row23[10];     
$Operativefinding=$row23[11];
$Anaesthesianotes= $row23[12];  
$date1=date('d-m-Y h:i:s',strtotime($row23[13]));   
$sttime=$row23[14];
      
$endtime=$row23[15];
$tname=$row23[16];
$ot_cost=$row23[17];
$sd++;
}

}
?>
<?php
echo "@".$pre."@".$post."@".$procedure."@".$sur."@".$surgeon."@".$Anesthesit."@".$AssistantName1."@".$AssistantName2."@".$AssistantName3."@".$AssistantName4."@".$Surgicalnotes."@".$Operativefinding."@".$Anaesthesianotes."@".$date1."@".$sttime."@".$endtime."@".$tname."@".$stime1."@".$etime1."@".$sd."@".$dsd;
?>
<?php
//////////End of Discharge Summary/////////////////////////////////

echo "@";
///////////////Surgary Details///////////////
?>
<?php
$query24 =mysql_query("select distinct theater_name,csd.theater_id from ip_pat_admit as a,patientregister as b,casesheet_surgerydetails as csd,operation_theater as oth where a.pat_regno=b.registerno and oth.theater_code=csd.theater_id and  csd.pat_no='$emp_id'");
if($query24){
$row24 = mysql_fetch_array($query24);
$tname1=$row24[0];
$tcode1=$row24[1];
}
?>
<select name="ot" id="ot" ><option selected value="<?php echo $tcode1 ?>"><?php echo $tname1 ?></option>
 <?php		 		
			 $sql = mysql_query("select THEATER_CODE,THEATER_NAME from operation_theater");
			 while($res = mysql_fetch_array($sql))
			 { ?>
			 
			 <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
			 <?php
			 }
			 ?>
										
										 </select>
<?php
$query25 = mysql_query("select distinct review,tc,treat_given from ip_pat_admit as a,patientregister as b,casesheet_dischargesummay as cds where a.pat_regno=b.registerno  and  cds.pat_no='$emp_id'");
if($query25){
$ds2=0;
while($row25 = mysql_fetch_array($query25)){
$review=$row25[0];
$tc=$row25[1]; 
$tg=$row25[2];     
$ds2++;
}
}
?>
<?php
echo "@".$review."@".$tc."@".$ds2."@".$patno."@".$ot_cost."@".$tg;
?>
<?php
$query26 =mysql_query("select distinct wife_of,po,ps,dist,del_by,sex,birth_date from ip_pat_admit as a,casesheet_birth_certificate as cbc where a.pat_no=cbc.pat_no  and  cbc.pat_no='$emp_id'");
if($query26){
$bc=1;
$sql1 = mysql_query("select gender from patientregister as a,ip_pat_admit as b where a.registerno=b.pat_regno and b.pat_no='$emp_id' and gender='male'");
if($sql1)
{
$bc=0;
}
if($bc==1)
{
while($row26 = mysql_fetch_array($query26)){
$wifeof=$row26[0];
$po=$row26[1];    
$ps=$row26[2]; 
$dist=$row26[3];
$delby=$row26[4]; 
$babysex=$row26[5];    
$bdate=$row26[6];  

}
}
}
?>
<?php
echo "@".$wifeof."@".$po."@".$ps."@".$dist."@".$delby."@".$babysex."@".$bdate."@".$bc;
?>
<?php
$query27 = mysql_query("select distinct religion,nation,mr_status,name_of,dod,disease, case_of, name_rec, name_mo, add_rec, ph_rec,date_rec,ADMIT_DATE  from ip_pat_admit as a,casesheet_death_certificate as cdc where a.pat_no=cdc.pat_no  and  cdc.pat_no='$emp_id'");
if($query27){
$deathc=0;
while($row27 = mysql_fetch_array($query27)){
$religion=$row27[0];
$nation=$row27[1];  
$mrstatus=$row27[2]; 
$nameof=$row27[3];
$dod=date('d-m-Y h:i:s',strtotime($row27[4]));    
$disease=$row27[5];      
$caseof=$row27[6];
$namerec=$row27[7];
$namemo=$row27[8];
$addrec=$row27[9];  
$phrec=$row27[10]; 
$daterec=date('d-m-Y',strtotime($row27[11])); 
$admitdate=date('d-m-Y',strtotime($row27[12]));
$deathc++;
}
}
?>
<?php
echo "@".$religion."@".$nation."@".$mrstatus."@".$nameof."@".$dod."@".$disease."@".$caseof."@".$namerec."@".$namemo."@".$addrec."@".$phrec."@".$daterec."@".$admitdate."@".$deathc;
?>
<?php
$query28 =mysql_query("select distinct weight from ip_pat_admit as a,casesheet_birth_certificate as cbc where a.pat_no=cbc.pat_no  and  cbc.pat_no='$emp_id'");
if($query28){
$row28 = mysql_fetch_array($query28);
$weight1 = $row28[0];

}
?>
<?php
echo "@".$weight1."@";
?>
<?php
$query29 = mysql_query("select ADMIT_DATE from ip_pat_admit where pat_no='$emp_id'");
if($query29){
$row29 = mysql_fetch_array($query29);
$padmitdate = date('d-m-Y',strtotime($row29[0]));
}	
?>
<?php
echo "@".$padmitdate."@";
?><?php */?>