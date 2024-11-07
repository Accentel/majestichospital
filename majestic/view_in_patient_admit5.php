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
	padding-top:0px;
	font:"Times New Roman", Times, serif;
	font-size:12px;
  
}
.ddd{
	
	padding-bottom:100px;
	
	}
	.ddd1{
	height: 100px;
	padding-top:50px;
	
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
@media screen {
    div#footer_wrapper {
      display: none;
    }
  }

  @media print {
    tfoot { visibility: hidden; }

    div#footer_wrapper {
      margin: 0px 2px 12px 7px;
      position: fixed;
      bottom: 0;
    }

    div#footer_content {
      font-weight: bold;
    }
  }

</style>
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
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Activity Chart</u></b></h2></td></tr>
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
			 $id1=$_REQUEST['adv_no'];
			 
			 
$sql1=mysqli_query($link,"select * from `casesheet_activity` where id='$id1'")or die(mysqli_error($link));
while($r=mysqli_fetch_array($sql1)){
			 $id=$r['mrnum'];
}
				
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
            <td width="20%" colspan="1"><div align="left"><b>Address : </b></div></td>
			<td ><?php echo $addr ?></td>
            </tr>
            
             
			
			
			<tr height="20"></tr>
        </table>
        
        
        
	<?php //$id=$_REQUEST['adv_no'];
$sql1=mysqli_query($link,"select * from `casesheet_activity` where mrnum='$id'")or die(mysqli_error($link));
while($r=mysqli_fetch_array($sql1)){
	$txtmsrtime=$r['txtmsrtime'];
	$txtmendtime=$r['txtmendtime'];
	$txtmsrtime1=$r['txtmsrtime1'];
	$txtmendtime1=$r['txtmendtime1'];
	$txtmsrtime2=$r['txtmsrtime2'];
	$txtmendtime2=$r['txtmendtime2'];
	$txtmsrtime3=$r['txtmsrtime3'];
	$txtmendtime3=$r['txtmendtime3'];
	$txtmsrtime4=$r['txtmsrtime4'];
	$txtmendtime4=$r['txtmendtime4'];
	$txtmsrtime5=$r['txtmsrtime5'];
	$txtmendtime5=$r['txtmendtime5'];
	$txtmsrtime6=$r['txtmsrtime6'];
	$txtmendtime6=$r['txtmendtime6'];
	$txtmsrtime7=$r['txtmsrtime7'];
	$txtmendtime7=$r['txtmendtime7'];
	 $txtadmindt1=$r['txtadmindt1'];
	$txtdr1name=$r['txtdr1name'];
	$txtdr2name=$r['txtdr2name'];
	$txtadmindt2=$r['txtadmindt2'];
	$txtdr3name=$r['txtdr3name'];
	$txtadmindt3=$r['txtadmindt3'];
	$txtcasua=$r['txtcasua'];
	$txtadminicu=$r['txtadminicu'];
	$txtdiradmin=$r['txtdiradmin'];
	$mrnum=$r['mrnum'];
	$id=$r['id'];
	$txtmoitrcount=$r['txtmoitrcount'];
	$txtventicount=$r['txtventicount'];
	$txtpulsecount=$r['txtpulsecount'];
	$txtnebulizercount=$r['txtnebulizercount'];
	$txtsyringecount=$r['txtsyringecount'];
	$txtcpapcount=$r['txtcpapcount'];
	$txtoxygencount=$r['txtoxygencount'];
	$txtglucocount=$r['txtglucocount'];
	 $moniter=$r['moniter'];
	$ventilator=$r['ventilator'];
	$pulse=$r['pulse'];
	$nebulizer=$r['nebulizer'];
	$syringe=$r['syringe'];
	$cpap=$r['cpap'];
	$oxygen=$r['oxygen'];
	$gluco=$r['gluco'];
	
	
}?>


<table width="100%" cellspacing="10">




<!-- onclick="window.open('adv_pat_det_popup.php','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly-->
<!--<table align="center">
<tr><td>UMR.NO:<input type="text"  name="txtmrno" id="mrno"></td><td>Date:<input type="date"  name="txtmrno" id="mrno"></td></tr>	
<table/>--></tr></table></form>
<br/>



<table   align="center">
<input type="hidden" name="mrnum" value="<?php echo $mrnum?>" id="reg" class="text" />
<tr>
<td align="center" style="color:red"><b>INSTRUMENTS</b></td>

</tr>
<tr ><th>Monitor</th>
<td><?php echo $moniter?></td>
<td>
<?php if($moniter=='Yes'){?>
<input type="datetime-local" id="monitrst" name="txtmsrtime" readonly="readonly" value="<?php echo $txtmsrtime?>" >
<input type="datetime-local" id="monitret" readonly="readonly" onkeyup="sum();" name="txtmendtime" value="<?php echo $txtmendtime?>" >
<?php echo $txtmoitrcount?>
<?php } else {?>

<?php }?>
</td>
<tr>
<tr><th>Ventilator</th>
<td><?php echo $ventilator?></td>
<td>
<?php if($ventilator=='Yes'){?>
<input type="datetime-local" id="ventist" name="txtmsrtime1" readonly="readonly" value="<?php echo $txtmsrtime1?>">
<input type="datetime-local" id="ventiet" name="txtmendtime1" readonly="readonly" value="<?php echo $txtmendtime1?>">
<?php echo $txtventicount?>
<?php } else {?>
<?php }?>
</td>
<tr>

<tr><th>Pulse Oxymeter</th>
<td><?php echo $pulse?></td>
<td><?php if($pulse=='Yes'){?>
<input type="datetime-local" id="pulsest" name="txtmsrtime2" readonly="readonly" value="<?php echo $txtmsrtime2?>">
<input type="datetime-local" id="pulseet" name="txtmendtime2" readonly="readonly" value="<?php echo $txtmendtime2?>">
<?php echo $txtpulsecount?>
<?php } else {?>

<?php }?>
</td>

<tr>

<tr><th>Nebulizer</th>
<td><?php echo $nebulizer?></td>
<td>
<?php if($nebulizer=='Yes'){?>
<input type="datetime-local" id="nebulizerst" name="txtmsrtime3" readonly="readonly" value="<?php echo $txtmsrtime3?>">
<input type="datetime-local" id="nebulizeret" name="txtmendtime3" readonly="readonly" value="<?php echo $txtmendtime3?>">
<?php echo $txtnebulizercount?>
<?php } else {?>
<input type="datetime-local" id="nebulizerst" name="txtmsrtime3" value="" style="display: none;">
<input type="datetime-local" id="nebulizeret" name="txtmendtime3" value="" style="display: none;">
<input type="text" id="nebulizercount" name="txtnebulizercount" value="" style="display: none;" placeholder="Total">
<?php }?>
</td><tr>

<tr><th>Syringe Pump</th>
<td><?php echo $syringe?></td>
<td><?php if($syringe=='Yes'){?>
<input type="datetime-local" id="syringest" name="txtmsrtime4" readonly="readonly" value="<?php echo $txtmsrtime4?>">
<input type="datetime-local" id="syringeet" name="txtmendtime4" readonly="readonly" value="<?php echo $txtmendtime4?>">
<?php echo $txtsyringecount?>
<?php } else {?>
<?php }?>
</td>
<tr>

<tr><th>C.Pap</th>
<td><?php echo $cpap?></td>
<td>
<?php if($cpap=='Yes'){?>
<input type="datetime-local" id="cpapst" name="txtmsrtime5" readonly="readonly" value="<?php echo $txtmsrtime5?>">
<input type="datetime-local" id="cpapet" name="txtmendtime5" readonly="readonly" value="<?php echo $txtmendtime5?>">
<?php echo $txtcpapcount?>
<?php } else {?>

<?php }?>
</td>
<tr>

<tr><th>Oxygen</th>
<td><?php echo $oxygen?></td>
<td>
<?php if($oxygen=='Yes'){?>
<input type="datetime-local" id="oxygenst" name="txtmsrtime6" readonly="readonly" value="<?php echo $txtmsrtime6?>">
<input type="datetime-local" id="oxygenet" name="txtmendtime6" readonly="readonly" value="<?php echo $txtmendtime6?>">
<?php echo $txtoxygencount?>

<?php } else{?>
<input type="datetime-local" id="oxygenst" name="txtmsrtime6" value="" style="display: none;">
<input type="datetime-local" id="oxygenet" name="txtmendtime6" value="" style="display: none;">
<input type="text" id="oxygencount" name="txtoxygencount" value="" style="display: none;" placeholder="Total">
<?php }?>
</td>
<tr>

<?php /*?><tr><th>Glucosticks</th>
<td><?php echo $gluco?></td>
<td>
<?php if($gluco=='Yes'){?>
<input type="datetime-local" id="glucost" name="txtmsrtime7" readonly="readonly" value="<?php echo $txtmsrtime7?>" >
<input type="datetime-local" id="glucoet" name="txtmendtime7" readonly="readonly" value="<?php echo $txtmendtime7?>" >
<?php echo $txtglucocount?>
<?php } else{?>
<?php } ?>
</td><?php */?>
<tr></table>
<br>
<div style="color:red" align="center"><b><u>Glucosticks</u></b></div>
<table width="100%" id="expense_table1" align="center">

                    <tr><td width="100%" align="center">
					<table width="100%" id="TABLE2">
					  <thead>
						 <tr>
					   
					   <th width="50%" class="TH1">Date </th>
					  
                       <th width="50%" class="TH1">Total</th>
					   </tr>
                       
                        <?php $s=mysqli_query($link,"select date1,qty from gluco_list1 where mr_num='$mrnum' and id1='$id'")or die(mysqli_error($link));
					   while($r=mysqli_fetch_array($s)){?>
                       
                       <tr><td>
                       <input  type='text' class='text' readonly="readonly" name='tname1[]' value="<?php echo date('d-m-Y',strtotime($r['date1']));?> " id='cost"+Row+"'  />

                       </td><td>
                       <input  type='text' class='text' readonly="readonly" name='cost1[]' value="<?php echo $r['qty'];?>" id='cname"+Row+"' />
                       </td></tr>
                   
                       <?php $x=$r['qty'];
					   $x1=$x+$x1;
					   }?> 
                       <tr><td><strong>Total :</strong></td><td><strong><?php echo $x1;?></strong></td>
					   </thead></table>

<table width="100%" id="expense_table" align="center">
                    <tr><td width="100%" align="center">
					<table width="100%" id="TABLE1">
					  <thead>
						 <tr>
					   
					   <th width="50%" class="TH1">Name of the Doctor </th>
					   <th width="50%" class="TH1">Visiting Date & Time</th>
					   </tr>
                       <?php $s=mysqli_query("select * from casesheet_activity1 where pat_regno='$mrnum' and id1='$id'");
					   while($r=mysqli_fetch_array($s)){?>
                       
                       <tr><td>
                       <input  type='text' readonly="readonly" class='text' name='cost[]' value="<?php echo $r['Blood_Sugar'];?> " id='cost"+Row+"'  />

                       </td><td>
                       <input  type='text' readonly="readonly" class='text' name='tname[]' value="<?php echo $r['SugarDate'];?>" id='cname"+Row+"' />
                       </td></tr>
                   
                       <?php }?> 
					   </thead></table>

<?php /*?><table   align="center">
<tr>
<td align="center" style="color:red"><b>S.no</b></td>
<td align="center" style="color:red"><b>Name of the Doctor</b></td>
<td align="center" style="color:red"><b>Admission Date & Time</b></td>
</tr>
<tr><th>1</th>
<td><input type="text"  name="txtdr1name" readonly="readonly" value="<?php echo $txtdr1name?>" id="drname1"></td>
<td>
<?php if($txtadmindt1!=''){?>
<input type="text"  name="txtadmindt1" readonly="readonly" value="<?php echo $txtadmindt1?>" id="admindt1">
<?php } else {?>
<?php }?>
</td>
</tr>

<tr ><th>2</th>
<td><input type="text"  name="txtdr2name" value="<?php echo $txtdr2name?>" readonly="readonly" id="drname2"></td>
<td>
<?php if($txtadmindt2!=''){?>
<input type="text"  name="txtadmindt2" value="<?php echo $txtadmindt2?>"  readonly="readonly" id="admindt2">
<?php } else {?>
 <input type="datetime-local"  name="txtadmindt2" value="" id="admindt2">
 <?php }?>
</td>
</tr>

<tr ><th>3</th>
<td><input type="text"  name="txtdr3name" readonly="readonly" id="drname3" value="<?php echo $txtdr3name?>"></td>
<td>
<?php if($txtadmindt3!=''){?>
<input type="text"  name="txtadmindt3" readonly="readonly" value="<?php echo $txtadmindt3?>" id="admindt3">
<?php } else {?>
<input type="datetime-local"  name="txtadmindt3" value="" id="admindt3">
<?php }?>

</td>
</tr></table><?php */?>
<br/>
<div style="color:red" align="center"><b><u>ADMISSION</u></b></div>
<br/>
<table  border="1px" align="center">

<tr ><th>Tr. in from Casuality:</th>
<td>
<?php if($txtcasua!=''){?>
<input type="text"  name="txtcasua" readonly="readonly" value="<?php echo $txtcasua?>" id="casua">
<?php } else {?>
<input type="datetime-local" readonly="readonly"  name="txtcasua" value="" id="casua">
<?php }?> 
</td>

<tr/>
<tr ><th>Admission ICU's</th>
<td>

<?php if($txtadminicu!=''){?>
<input type="text"  name="txtadminicu" readonly="readonly" value="<?php echo $txtadminicu?>" id="adminicu">

<?php } else {?>
<input type="datetime-local" readonly="readonly"  name="txtadminicu"  id="adminicu">
<?php }?>
</td>
<tr/>

<tr ><th>Direct Admission</th>
<td>
<?php if($txtdiradmin!=''){?>
<input type="text"  name="txtdiradmin" readonly="readonly" value="<?php echo $txtdiradmin?>" id="diradmin">
<?php } else {?>
<input type="datetime-local" readonly="readonly"  name="txtdiradmin" id="diradmin">
<?php }?>
</td>
<tr/>

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