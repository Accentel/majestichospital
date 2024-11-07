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
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Clinical Finding</u></b></h2></td></tr>
  </THEAD></table>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td colspan="2" style="border-bottom:1px solid #999999;padding-left: 20px;">
          <?php /*?> <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
		   <?php
				include("config.php");
				
				$sql = mysqli_query("select * from organization");
				if($sql)
				{
					$row = mysqli_fetch_array($sql);
					
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
        <?php 
		include("config.php");
			 $id=$_REQUEST['adv_no'];
			
			  $x="select b.ADMIT_DATE,a.patientname,a.registerno,a.age,a.gender,a.phoneno,a.registerno,a.phoneno,
			 b.ADMIT_TIME,a.address from patientregister as a,ip_pat_admit as b
			 where a.registerno=b.pat_regno  and a.registerno='$id'";
			$sql= mysqli_query($link,$x)or die(mysqli_error($link));
			if($sql)
			{
				$row = mysqli_fetch_array($sql);
				
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
				
				//$sql1 = mysqli_query("select CONCE_NAME from concession_type where CONCE_CODE='$contype'");
				//if($sql1)
				//{
					//$row1=mysqli_fetch_array($sql1);
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
            <td width="20%" colspan=""><div align="left"><b>Address : </b></div></td>
			<td ><?php echo $addr ?></td>
            </tr>
            
             
			
			
			<tr height="20"></tr>
        </table>
        
        
        
        
        
         <?php
			 $id=$_REQUEST['adv_no'];
		
		//if(isset($_POST['submit'])){
			//echo $id=$_REQUEST['id'];
			$sq=mysqli_query($link,"SELECT * FROM `casesheet_clicnic` where mrnum='$id'")or die(mysqli_error($link));
			while($r=mysqli_fetch_array($sq)){
			
	
			$date1=date('Y-m-d');
	$mrnum=$r['mrnum'];
	$thrills=$r['thrills'];
	$txtcarsnd=$r['txtcarsnd'];
	$carmurm=$r['carmurm'];
	$dyspn=$r['dyspn'];
	$Wheeze=$r['Wheeze'];
	$trachea=$r['trachea'];
	$breath=$r['breath'];
	$adventitious=$r['adventitious'];
	$abdomen=$r['abdomen'];
	$tendernes=$r['tendernes'];
	$txttender=$r['txttender'];
	$palpable=$r['palpable'];
	$txtmass=$r['txtmass'];
	$hernia=$r['hernia'];
	$txtherniaori=$r['txtherniaori'];
	$fluid=$r['fluid'];
	$bruits=$r['bruits'];
	$Liver=$r['Liver'];
	$txtliverpal=$r['txtliverpal'];
	$Spleen=$r['Spleen'];
	$txtliverpal1=$r['txtliverpal1'];
	$bowel=$r['bowel'];
	$txtgenital=$r['txtgenital'];
	$txtspeculum=$r['txtspeculum'];
	$txtpvexamin=$r['txtpvexamin'];
	$txtprexamin=$r['txtprexamin'];
	$cons=$r['cons'];
	$speech=$r['speech'];
	$neck=$r['neck'];
	$kerning=$r['kerning'];
	$txtnerves=$r['txtnerves'];
	$txtmotor=$r['txtmotor'];
	$txtsensory=$r['txtsensory'];
	$txtglas=$r['txtglas'];
	$txtrbice=$r['txtrbice'];
	$txtrtric=$r['txtrtric'];
	$txtrsupi=$r['txtrsupi'];
	$txtrknee=$r['txtrknee'];
	$txtrankle=$r['txtrankle'];
	$txtlbice=$r['txtlbice'];
	$txtltric=$r['txtltric'];
	$txtlsupi=$r['txtlsupi'];
	$txtlknee=$r['txtlknee'];
	$txtlankle=$r['txtlankle'];
	$Plan=$r['Plan'];
	$finger=$r['finger'];
	$heel=$r['heel'];
	$gait=$r['gait'];
	$shufling=$r['shufling'];
	$txtmuscu=$r['txtmuscu'];
	$txtskin=$r['txtskin'];
	$txtexbr=$r['txtexbr'];
	$txtent=$r['txtent'];
	$txtteeth=$r['txtteeth'];
	$txthene=$r['txthene'];
	$txtprovi=$r['txtprovi'];
	$txtplan=$r['txtplan'];
	$txtcare=$r['txtcare'];
	$txtexout=$r['txtexout'];
	$txtasect=$r['txtasect'];		
		
		
		
		}
		?>
	<table width="100%" cellspacing="10">



<tr>
<input type="hidden" value="<?php echo $aname ?>" name="authby"/>
<td class="label1">Patient UMR No. <font color="red">*</font> : </td>
<td><input type="text" name="mrnum"  value="<?php echo $mrnum?>" id="reg" class="text" /></td>

<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->


<h3 align="left" style="color:red"><u>Cardio Vascular System</u></h3>
<table  cellpadding="5">
<tr><td>Thrills:</td>
<td><select id="thrills" name="thrills">
<option value="<?php echo $thrills?>" ><?php echo $thrills?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  </td>
</tr>
<tr><td>Cardia Sounds:</td>
<td>
<input type="text" id="carsnd" value="<?php echo $txtcarsnd?>" name="txtcarsnd" ></td>
</tr>
<tr><td>Cardiac Murmurs:</td>
<td><select id="carmurm" name="carmurm">
<option value="<?php echo $carmurm?>"><?php echo $carmurm?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
</tr>
</table>
<h3 align="left" style="color:red"><u>Respiratory System</u></h3>
<table  cellpadding="5">
<tr><td>Dyspnoea:</td>
<td><select id="dyspn" name="dyspn">
<option value="<?php echo $dyspn?>" ><?php echo $dyspn?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  </td>
</tr>
<tr><td>Wheeze:</td>
<td><select id="Wheeze" name="Wheeze">
<option value="<?php echo $Wheeze?>"><?php echo $Wheeze?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
</tr>
<tr><td>Position of Trachea:</td>
<td><select id="trachea" name="trachea">
<option value="<?php echo $trachea?>"><?php echo $trachea?></option>
  <option value="Central">Central</option>
  <option value="Shiftedtoright1left">Shifted to Right 1 Left</option>  
</select></td>
</tr>

<tr><td>Breath Sound:</td>
<td><select id="breath" name="breath">
<option value="<?php echo $breath?>" ><?php echo $breath?></option>
  <option value="Vesicular">Vesicular</option>
  <option value="Tubular">Tubular</option>
  <option value="Amphoric">Amphoric</option>   
</select></td></tr>

<tr><td>Adventitious Sound:</td>
<td><select id="adventitious" name="adventitious">
<option value="<?php echo $adventitious?>" ><?php echo $adventitious?></option>
  <option value="Rhonchi">Rhonchi</option>
  <option value="Rales">Rales(Crepts)1 Pleural rub</option>  
</select></td></tr>

</table>
<h3 align="left" style="color:red"><u>Abdomen</u></h3>
<table  cellpadding="5">
<tr><td>Shape of Abdomen:</td>
<td><select id="abdomen" name="abdomen">
<option value="<?php echo $abdomen?>"><?php echo $abdomen?></option>
  <option value="scaphoid">Scaphoid</option>
  <option value="obese">Obese</option>
   <option value="distended">Distended</option>  
</select></td></tr>
</tr>

<tr><td>Tenderness:</td>
<td><select id="tendernes" name="tendernes">
<option value="<?php echo $tendernes?>"><?php echo $tendernes?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="text" id="tender" name="txttender" value="<?php echo $txttender?>" style="display: none;"></td>
</tr>

<tr><td>Palpable Mass:</td>
<td><select id="palpable" name="palpable">
<option value="<?php echo $palpable?>"><?php echo $palpable?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td><input type="text" id="mass" name="txtmass" value="<?php echo $txtmass?>" style="display: none;"></td>
</tr>
<tr><td>Hernia Orifices:</td>
<td><select id="hernia" name="hernia">
<option value="<?php echo $hernia?>" ><?php echo $hernia?></option>
  <option value="Normal">Normal</option>
  <option value="Hernia">Hernia</option>  
</select></td>
<td><input type="text" id="herniaori" name="txtherniaori" value="<?php echo $txtherniaori?>" style="display: none;"></td>
</tr>
<tr><td>Free Fluid:</td>
<td><select id="fluid" name="fluid">
<option value="<?php echo $fluid?>"><?php echo $fluid?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option></td>
</tr>
<tr><td>Bruits:</td>
<td><select id="bruits" name="bruits">
<option value="<?php echo $bruits?>" ><?php echo $bruits?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option></td>
</tr>
<tr><td>Liver:</td>
<td><select id="Liver" name="Liver">
<option value="<?php echo $Liver?>"><?php echo $Liver?></option>
  <option value="Notpalpable">Not palpable</option>
  <option value="Palpable">Palpable</option>  
</select><input type="text" id="liverpal" name="txtliverpal" value="<?php echo $txtliverpal?>" style="display: none;"></td>
</tr>
<tr><td>Spleen:</td>
<td><select id="Spleen" name="Spleen">
<option value="<?php echo $Spleen?>"><?php echo $Spleen?></option>
  <option value="npalSpleen">Not palpable</option>
  <option value="PalSpleen">Palpable</option>  
</select><input type="text" id="Spleenpal" name="txtliverpal1" value="<?php echo $txtliverpal1?>" style="display: none;"></td>
</tr>
<tr><td>Bowel Sound:</td>
<td><select id="bowel" name="bowel">
<option value="<?php echo $bowel?>"><?php echo $bowel?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option></td>
</tr>
<tr><td>Genitals:</td>
<td><input type="text"  name="txtgenital" value="<?php echo $txtgenital?>" id="genital"></td></tr>
<tr><td>Speculum Examination:</td>
<td><input type="text"  name="txtspeculum" value="<?php echo $txtspeculum?>" id="speculum"></td></tr>
<tr><td>PV Examination:</td>
<td><input type="text"  name="txtpvexamin" value="<?php echo $txtpvexamin?>" id="pvexamin"></td></tr>
<tr><td>P/R Examination:</td>
<td><input type="text"  name="txtprexamin" value="<?php echo $txtprexamin?>" id="prexamin"></td></tr>
</table>

<h3 align="left" style="color:red"><u>Central Nervous System</u></h3>
<table cellpadding="5">
<tr><td>Level of Consciousness:</td>
<td><select id="cons" name="cons">
<option value="<?php echo $cons?>"><?php echo $cons?></option>
  <option value="consiciou">Conscious/Alert</option>
  <option value="drowsy">Drowsy/Arousable</option>
<option value="stuporous">Stuporous</option>
  <option value="coma">Coma</option></td>
</tr>
<tr><td>Speech:</td>
<td><select id="speech" name="speech">
<option value="<?php echo $speech?>"><?php echo $speech?></option>
  <option value="Normal">Normal</option>
  <option value="noresponse">No Response</option>
  <option value="slurred">Slurred</option>
  <option value="incoherent">Incoherent</option>
<option value="aphasic">Aphasic</option>   
</tr>
<tr><td>Sings of Meningeal Irritation:</td>
<td>Neck Stiffness:<select id="neck" name="neck">
<option value="<?php echo $neck?>"><?php echo $neck?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
<td>Kerning's Sign:<select id="kerning" name="kerning">
<option value="<?php echo $kerning?>" ><?php echo $kerning?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td>
</tr>

<tr><td>Cranial Nerves:</td>
<td><input type="text"  name="txtnerves" value="<?php echo $txtnerves?>" id="nerves"></td></tr>

<tr><td>Motor System:</td>
<td><input type="text"  name="txtmotor" value="<?php echo $txtmotor?>" id="motor"></td></tr>

<tr><td>Sensory System:</td>
<td><input type="text"  name="txtsensory" value="<?php echo $txtsensory?>" id="sensory"></td></tr>
<tr><td>Glasgow Scale:</td>
<td><input type="text"  name="txtglas" value="<?php echo $txtglas?>" id="glas"></td></tr>
</table>

<table  cellpadding="5" border="1px" align="center">
<tr><th></th>
<td align="center">Biceps</td>
<td align="center">Triceps</td>
<td align="center">Supinator</td>
<td align="center">Knee</td>
<td align="center">Ankle</td></tr>
<tr><th>Right</th>
<td><input type="text" value="<?php echo $txtrbice?>" name="txtrbice" id="rbice" placeholder="Right Bices"></td>
<td><input type="text"  value="<?php echo $txtrtric?>" name="txtrtric" id="rtric" placeholder="Right Trices"></td>
<td><input type="text" value="<?php echo $txtrsupi?>" name="txtrsupi" id="rsupi" placeholder="Right Supinator"></td>
<td><input type="text" value="<?php echo $txtrknee?>"  name="txtrknee" id="rknee" placeholder="Right Knee"></td>
<td><input type="text" value="<?php echo $txtrankle?>" name="txtrankle" id="rankle" placeholder="Right Ankle"></td></tr>
</tr>


<tr><th>Left</th>
<td><input type="text" value="<?php echo $txtlbice?>" name="txtlbice" id="lbice" placeholder="Left Bices"></td>
<td><input type="text" value="<?php echo $txtltric?>"  name="txtltric" id="ltric" placeholder="Left Trices"></td>
<td><input type="text" value="<?php echo $txtlsupi?>" name="txtlsupi" id="lsupi" placeholder="Left Supinator"></td>
<td><input type="text" value="<?php echo $txtlknee?>" name="txtlknee" id="lknee" placeholder="Left Knee"></td>
<td><input type="text" value="<?php echo $txtlankle?>" name="txtlankle" id="lankle" placeholder="Left Ankle"></td>
<tr>

</table>
<table cellpadding="5"><tr><td>Planrars:</td><td><select id="Plan" name="Plan">
<option value="<?php echo $Plan?>"><?php echo $Plan?></option>
  <option value="Flexor">Flexor</option>
  <option value="Extensor">Extensor</option>
<option value="Equivocal">Equivocal Unelicitable</option>  
</select></td>
</tr></table>
<h3 align="left" style="color:red"><u>Cerebellar Signs</u></h3>
<table cellpadding="5"><tr><td>Finger:Nose in coordination</td>
<td><select id="finger" name="finger">
<option value="<?php echo $finger?>"><?php echo $finger?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td></tr>

<tr><td>Knee:Heel in coordination</td>
<td><select id="heel" name="heel">
<option value="<?php echo $heel?>"><?php echo $heel?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select></td></tr>

<tr><td>Gait:</td>
<td><select id="gait" name="gait">
<option value="<?php echo $gait?>"><?php echo $gait?></option>
  <option value="Hemiplegic">Hemiplegic</option>
  <option value="Slow">Slow</option>  
</select></td>
<td><select id="shufling" name="shufling">
<option value="<?php echo $shufling?>" ><?php echo $shufling?></option>
  <option value="shuffling">shuffling</option>
  <option value="Atax">Atax</option>
  <option value="High Stepping">High Stepping</option>   
</select></td></tr>
</table>
<table cellpadding="5">
<tr><td>Musculoskeletal System :</td>
<td><input type="text" value="<?php echo $txtmuscu?>" name="txtmuscu" id="muscu" ></td></tr>
<tr><td>Skin :</td>
<td><input type="text" value="<?php echo $txtskin?>"  name="txtskin" id="skin" ></td></tr>
<tr><td>Examination of Breast :</td>
<td><input type="text" value="<?php echo $txtexbr?>"  name="txtexbr" id="exbr" ></td></tr>
<tr><td>Ent :</td>
<td><input type="text" value="<?php echo $txtent?>" name="txtent" id="ent" ></td></tr>
<tr><td>Examination of Teeth and oralcavity :</td>
<td><input type="text"  name="txtteeth" id="teeth" ></td></tr>
<tr><td>Examination of Head and Neck :</td>
<td><input type="text" value="<?php echo $txthene?>"  name="txthene" id="hene" ></td></tr>
<tr><td>Provisinal Diagnosis:</td>
<td><input type="text" value="<?php echo $txtprovi?>" name="txtprovi" id="provi" ></td></tr>
<tr><td>Plan of Primary Consultant :</td>
<td><input type="text" value="<?php echo $txtplan?>"  name="txtplan" id="plan" ></td></tr>
<tr><td>Plan of Care :</td>
<td><input type="text" value="<?php echo $txtcare?>" name="txtcare" id="care" ></td></tr>
<tr><td>Exoected Outcome :</td>
<td><input type="text" value="<?php echo $txtexout?>"  name="txtexout" id="exout" ></td></tr>
<tr><td>Preventive Aspects of Care:</td>
<td><input type="text" value="<?php echo $txtasect?>" name="txtasect" id="asect" ></td></tr>

</table></td>
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
          <td height="100" colspan="3" align="center"><input type="button" value="print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="closew();"/>
          </td>
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