<?php
session_start();
include("config.php");


if($_SESSION['name1'])
{

	$billno = $_REQUEST['id'];

	$sql =mysql_query("select BILL_DATE, pat_NO, admit_DATE, DIS_DATE, concession_type, ROOM_RENT, CONSultant_CHARGES, admission_CHARGES, INVG_CHARGES, OUTSIDE_CONS_CHARGES, CRITICALCARE_AMT, OPERATION_CHARGES, OTINSTRUMENT_CHARGES, ANAES_DISPO_CHARGES, SURG_CHARGES, ASST_SURG_CHARGES, ANAES_CHARGES, CORM_CHARGES, TOTALAMOUNT, ADVANCEPAID, TOTAL_CONC_AMT, NETAMOUT,dress_charges,Equipment_cost,diet, mr_cost, cons_admit, cons_invg, cons_ot, cons_anea,service_tax from final_bill where bill_no='$billno'");
		if($sql){
			$row = mysql_fetch_array($sql);
			
			$BILL_DATE=date('d-m-Y',strtotime($row['BILL_DATE']));
			$pat_NO=$row['pat_NO'];
			$admit_DATE=date('d-m-Y',strtotime($row['admit_DATE']));
			$DIS_DATE=date('d-m-Y',strtotime($row['DIS_DATE']));
			$concession_type=$row['concession_type'];
			$ROOM_RENT=$row['ROOM_RENT'];
			$CONSultant_CHARGES=$row['CONSultant_CHARGES'];
			$admission_CHARGES=$row['admission_CHARGES'];
			$INVG_CHARGES=$row['INVG_CHARGES'];
			$OUTSIDE_CONS_CHARGES=$row['OUTSIDE_CONS_CHARGES'];
			$CRITICALCARE_AMT=$row['CRITICALCARE_AMT'];
			$OPERATION_CHARGES=$row['OPERATION_CHARGES'];
			$OTINSTRUMENT_CHARGES=$row['OTINSTRUMENT_CHARGES'];
			$ANAES_DISPO_CHARGES=$row['ANAES_DISPO_CHARGES'];
			$SURG_CHARGES=$row['SURG_CHARGES']; 
			$ASST_SURG_CHARGES=$row['ASST_SURG_CHARGES'];
			$ANAES_CHARGES=$row['ANAES_CHARGES'];
			$CORM_CHARGES=$row['CORM_CHARGES'];
			$TOTALAMOUNT=$row['TOTALAMOUNT'];
			$ADVANCEPAID=$row['ADVANCEPAID'];
			$TOTAL_CONC_AMT=$row['TOTAL_CONC_AMT'];
			$NETAMOUT=$row['NETAMOUT'];
			$dress=$row['dress_charges'];
			$eq_tot=$row['Equipment_cost'];
			 $diet=$row['diet'];
		 	 $mr_cost=$row['mr_cost'];
		 	 $cons_admit=$row['cons_admit'];
			  $cons_invg=$row['cons_invg'];
			  $cons_ot=$row['cons_ot'];
		 	 $cons_anea=$row['cons_anea'];
			  $tax=$row['service_tax'];
			}



$mic=0;
		$sql1 = mysql_query("select  MIS_DESC, MIS from final_bill_dtl where bill_no='$billno'");
		while($row1 = mysql_fetch_array($sql1)){
			$MIS_DESC[$mic] = $row1['MIS_DESC'];
			$MIS[$mic] = $row1['MIS'];
			$mic++;
		}



 $sql2 = mysql_query("select b.patientname,b.age, b.gender,CONCESSION_CARDNO,conce_per,cons_amt,a.pat_regno from ip_pat_admit as A,concession_type as c,patientregister as B  WHERE A.PAT_REGNO=B.registerno and a.pat_no='$pat_NO'");
 if($sql2)
{
$row2 = mysql_fetch_array($sql2);

$name=$row2['patientname'];
$age=$row2['age'];
$sex=$row2['gender'];
$conscard=$row2['CONCESSION_CARDNO'];
$arogya_amount=$row2['conce_per'];
$admfee_cons=$row2['cons_amt'];
$regno=$row2['pat_regno'];
}//while


$retunrnbal=0;
$arogyabal=0;

$retunrnbal=round($retunrnbal-$ADVANCEPAID);
$retu_bal=($TOTAL_CONC_AMT+$ADVANCEPAID);

if($retu_bal>$TOTALAMOUNT){
	$net="Return Amount(Rs.)";
	$NETAMOUT=round($NETAMOUT);
	}
else{
$net="Net Amount(Rs.)";
$NETAMOUT=round($NETAMOUT);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("header.php");
?>

</head>
<body>
<div id="conteneur">
		<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
			?>
		<div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">FINAL BILL</h1>
          
    <form name="myform" action="" >

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="56%" valign="top" class="filepath_bg"><jsp:include page="../common1/filepath.jsp"></jsp:include></td>
    <td width="44%" valign="top" class="filepath_bg"><jsp:include page="../getsessions.jsp"></jsp:include></td>
  </tr>
  <tr>
    <td colspan="2" class="mainbox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      
      <tr>
        <td  valign="top" class="box_midlebg" align="center" height="400">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="11%" class="label1"><div align="left"></div></td>
                                <td width="16%" class="label1"><div align="right">Bill No: &nbsp; </div></td>
                                <td width="21%"><div align="left"><?php echo $billno ?>
                                  </div>
                                </div></td>
                                <td width="28%" class="label1"><div align="right">Bill Date:  &nbsp; </div></td>
                                <td width="24%">
                                    <div align="left"><?php echo $BILL_DATE ?>
                                    </div></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                 
                                  <td valign="top" class="form_bg"><table width="100%" border="0" align="center" cellpadding="10" cellspacing="0" >
                                      <tr>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td class="filepath_bg"><div align="left"><font color="#000"><strong>Patient Details </strong></font></div></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td><table width="98%" border="0" cellspacing="3" cellpadding="3">
                                                <tr>
                                                  <td width="34%" class="label1"><div align="right">Patient No :</div></td>
                                                  <td width="19%"><div align="left">
                                                     <?php echo $pat_NO ?>
                                                  </div></td>
                                                  <td width="25%" class="label1"><div align="right">Patient Reg No :</div></td>
                                                  <td width="22%"><div align="left">
                                                     <?php echo $regno ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">Patient Name :</div></td>
                                                  <td><div align="left">
                                                     <?php echo $name ?>
                                                  </div></td>
                                                  <td class="label1"><div align="right">Age/Sex :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $age ?> / 
                                                      <?php echo $sex ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">Admission Date :</div></td>
                                                  <td><div align="left"><?php echo $admit_DATE ?></div></td>
                                                  <td class="label1"><div align="right">Discharge Date :</div></td>
                                                  <td><div align="left">
                                                    <?php echo $DIS_DATE ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">Concession Type  :</div></td>
                                                  <td><div align="left">
                                                    <?php echo $concession_type ?>
                                                  </div></td>
                                                  <td class="label1"><div align="right">Concession Card No :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $conscard ?>
                                                  </div></td>
                                                </tr>
												<tr><td class="label1"><div align="right">Diet : </div></td><td><div align="left"><?php echo $diet ?></div></td><td></td><td></td></tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td class="filepath_bg"><div align="left"><font color="#000"><strong>General Charges </strong></font></div></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td><table width="98%" border="0" cellspacing="3" cellpadding="3">
                                              
                                                <tr>
                                                  <td width="34%" class="label1"><div align="right">Room Rent( Maintanance &amp; Service Charges) :</div></td>
                                                  <td width="19%"><div align="left">
                                                    <?php echo $ROOM_RENT ?>
                                                  </div></td>
                                                  <td width="27%" class="label1"><div align="right">Consultation Charges :</div></td>
                                                  <td width="20%"><div align="left">
                                                      <?php echo $CONSultant_CHARGES ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">Admission Charges :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $admission_CHARGES ?>
                                                  </div></td>
                                                  <td class="label1"><div align="right">Investigation Charges :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $INVG_CHARGES ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">Admi.  Concession Amt :</div></td>
                                                  <td><div align="left">
                                                     <?php echo $cons_admit ?>
                                                  </div></td>
                                                  <td class="label1"><div align="right">Invest. Concession Amt :</div></td>
                                                  <td><div align="left">
                                                 <?php echo $cons_invg ?>
                                                  </div></td>
                                                </tr>
<tr>
  <td class="label1"><div align="right">Medical Record Charge : </div></td>
  <td align="left"><?php echo $mr_cost ?></td><td></td></tr>
                                            </table>
											
											</td>
                                          </tr>
										   <tr>
                                            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td class="filepath_bg"><div align="left"><font color="#000"><b><span class="tdbg1">OutSide Consultant Charges</span></b></font></div></td>
                                                </tr>
                                            </table></td>
                                          </tr>
										  <tr>
                                            <td><div id="outcons"><div align="center">
											<table width="50%" border="0" cellspacing="3" cellpadding="3" id="TABLE1">
                                            
	<?php if($OUTSIDE_CONS_CHARGES!=0){ ?>
                                             <thead><tr>
                                               <th class="TH1" width="14%" ><div align="center">Name</div></th>
                                               
                                                <th class="TH1" width="18%" ><div align="center">Specialization </div></th>
                                                <th class="TH1" width="14%" ><div align="center">Amount</div></th>
											</tr>	</thead>
                                            
<?php
$outcharges=mysql_query("select ANAE_DOCNAME,CONS_SPECALIZATION,ANAE_CHARGES from casesheet_doctorvists as a,outside_consultants as b where pat_no='$pat_NO' and a.DOC_CODE=b.OUT_CONSNO and ANAE_DOCNAME not like '%l.r%'");
 
while($out = mysql_fetch_array($outcharges))													
{
?>
<tr>
<td width="14%"><div align="center"><?php echo $out['ANAE_DOCNAME'] ?></div></td>
<td width="18%"><div align="center"><?php echo $out['CONS_SPECALIZATION'] ?></div></td>
<td width="14%"><div align="center"><?php echo $out['ANAE_CHARGES'] ?></div></td>
</tr>
<?php } ?>
<?php }else{ ?>
<tr><td colspan=4><b><font color='red'>No Out Side Consultants For This Patient</font></b></td></tr>
<?php } ?>

                                            </table>
                                            </div></div></td>
                                          </tr>

<!-- equipment -->
<tr>
                                            <td colspan="4">
											
											
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td class="filepath_bg"><div align="left"><font color="#000"><b><span class="tdbg1">Equipment Utilization</span></b></font></div></td>
                                                </tr>
                                            </table></td>
                                          </tr>
										  <tr>
                                            <td><div id="equipment" align="center">
											<table width="50%" border="0" cellspacing="3" cellpadding="3">
         <thead>
	 <tr >
   <th width="38%" class="TH1">Equipment Name </th>
   <th width="24%" class="TH1">Cost  </th>
   
	
	 </tr>
 <?php 
 if($eq_tot!=0){
 $eq_name="";
$eq_cost=0;


$eqcharges= mysql_query("select b.name,b.cost*(((to_days(ifnull(EndDateTime,now()))-to_days(StartDateTime))*24)+(DATE_FORMAT(ADDTIME('2000-00-00 00:00:00',SEC_TO_TIME(TIME_TO_SEC(ifnull(EndDateTime,now()))-TIME_TO_SEC(StartDateTime))), '%k'))) from casesheet_bedsideproc as a,icu_equipment_mast as b where a.equip_id=b.id  and  a.pat_no='$pat_NO' group by a.pat_no");

 
while($eqc = mysql_fetch_array($eqcharges))													
{
$eq_name=$eqc[0];
$eq_cost=$eqc[1];

?>

                                              <tr>
       <td width="17%"><div align="center">   <?php echo $eq_name ?> </div></td>
     <td width="22%" class="label1"><div align="center"> <?php echo $eq_cost ?></div></td>
      </tr>
 <input name="eq_flag"  id="eq_flag" type="hidden"   value="1" size="12"/>
											  <?php }//while ?>
<?php }else{ ?>
<tr><td colspan="3"><div align="center"><b><font color="red">No Equipments Utilized For This Patient</font></b></div></td></tr>
 <input name="eq_flag"  id="eq_flag" type="hidden"   value="0" size="12"/>
<?php } ?>
 <tr>
       <td width="17%" style="border-top:solid 1px #CC3333 "><div align="center"> Amount to Pay </div></td>
     <td width="22%" class="label1" style="border-top:solid 1px #CC3333"><div align="center"> <?php echo $eq_tot ?><input name="eq_tot" id="eq_tot" type="hidden"  value="<?php echo $eq_tot ?>" readonly size="8" /></div></td></tr>
                                            </table></div></td>
                                          </tr>



                                          <tr>
                                            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td class="filepath_bg"><div align="left"><font color="#000"><b>Miscellaneous</b></font></div></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td align="center">
						<table width="50%" id="TABLE1">
						 <thead>
						  <tr>
						
			              <th class="TH1">Description</th>
            			 <th class="TH1">Amount </th>
                          
                     
						 </tr></thead>

<?php for($i=0;$i!=$mic;$i++){ ?>
<tr>
<td><?php echo $MIS_DESC[$i]; ?></td>
<td><?php echo $MIS[$i]; ?></td>
</tr>
<?php } ?>



</table>
</td>
                                          </tr>
                                          <tr>
                                            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td class="filepath_bg"><div align="left"><font color="#000"><b>Operation Theatre Charges</b></font></div></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td>
											
											
											<table width="98%" border="0" cellspacing="3" cellpadding="3">
										
                                                <tr>
                                                  <td width="33%" class="label1"><div align="right">Critical Care Support :</div></td>
                                                  <td width="7%">
                                                      <div align="left">
                                                        <?php echo $CRITICALCARE_AMT ?>
                                                  </div></td>
                                                  <td width="44%" class="label1"><div align="right">CARM Charges :</div></td>
                                                  <td width="16%"><div align="left">
                                                      <?php echo $CORM_CHARGES ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">OperationTheater Charges :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $OPERATION_CHARGES ?>
                                                  </div></td>
                                                  <td class="label1"><div align="right">OperationTheater Concession :</div></td>
                                                  <td><div align="left">
                                                    <?php echo $cons_ot ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">OT Instrumentation Charges :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $OTINSTRUMENT_CHARGES ?>
                                                  </div></td>
                                                  <td class="label1"><div align="right">Anaesthesia/Disposable :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $ANAES_DISPO_CHARGES ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">Surgeon Charges :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $SURG_CHARGES ?>
                                                  </div></td>
                                                  <td class="label1"><div align="right">Asst. Surgeon Charges :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $ASST_SURG_CHARGES ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">Anaesthetist Charges :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $ANAES_CHARGES ?>
                                                  </div></td>
                                                  <td class="label1"><div align="right">Anaesthetist Concession :</div></td>
                                                  <td><div align="left">
                                                     <?php echo $cons_anea ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">Dressing Charges :</div></td>
                                                  <td><div align="left">
                                                  <?php echo $dress ?>
                                                  </div></td>
                                                  <td class="label1">&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                          <tr>
                                                  <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td class="filepath_bg"><div align="left"><font color="#000"><strong>Amount Details </strong></font></div></td>
                                                      </tr>
                                                  </table></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">Total(Rs.) : </div></td>
                                                  <td><div align="left">
                                                   <?php echo $TOTALAMOUNT ?>
</div></td>
                                                  <td class="label1"><div align="right"> Total  Concession(Rs.) :</div></td>
                                                  <td><div align="left">
                                                     <?php echo $TOTAL_CONC_AMT ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="label1"><div align="right">Advance Paid(Rs.) :</div></td>
                                                  <td><div align="left">
                                                      <?php echo $ADVANCEPAID ?>
                                                  </div></td>
                                                   <td class="label1"><div align="right"><?php echo $net ?> </div></td>
                                                  <td ><div align="left">
                                                     <?php echo $NETAMOUT ?>
                                                  </div></td>
                                                </tr>
                                               <tr><td class="label1"><div align="right">Service Tax%:</div></td><td><?php echo $tax ?>%</td><td></td></tr>
                                               
                                            </table></td>
                                          </tr>
<input type="hidden" name="rows" id="rows" value="0" >
                                         
                                        
                                        </table></td>
                                      </tr>
                                  </table></td>
                                  <td width="8" background="../images/boxr_bg.gif">&nbsp;</td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td></td>
                          </tr>
              </table>
                          <iframe width="199" height="178" name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="js/ipopeng.htm" scrolling="No" frameborder="0" style="visibility:visible; z-index:999; position:absolute; left:-500px; top:0px;"> </iframe>





                          <table width="100%" border="0" cellspacing="2" cellpadding="2">
                            
                            <!-- ----------------------------------- error dispaly-->
                            <tr >
                              <td colspan="4" align="center">
                              </td>
                            </tr>
                            <!-- ----------------------------------- error dispaly-->
                            <tr >
                              <td width="40%" class="label1" >&nbsp;</td>
                              <td width="11%" class="label1" ><div align="right">
                                
&nbsp; </div></td>
                              <td width="17%" class="label1" ><a href="final_bill.php"><img src="images/close1.gif" /></a></td>
                              <td width="32%"></td>
                            </tr>
                          </table></td>
      </tr>
      
    </table></td>
  </tr>
</table>
</form>
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
