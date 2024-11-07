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
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Admission Record</u></b></h2></td></tr>
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
        <?php 
		include("config.php");
			 $mrnum=$_REQUEST['adv_no'];
				
			  $x="select b.ADMIT_DATE,a.patientname,a.registerno,a.age,a.gender,a.phoneno,a.registerno,a.phoneno,
			 b.ADMIT_TIME,a.address from patientregister as a,ip_pat_admit as b
			 where a.registerno=b.pat_regno  and a.registerno='$mrnum'";
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
            <td width="20%" colspan=""><div align="left"><b>Address : </b></div></td>
			<td ><?php echo $addr ?></td>
            </tr>
            
             
			
			
			<tr height="20"></tr>
        </table>
        
        
        
        
        
         <?php
			 $id=$_REQUEST['adv_no'];
				$sq=mysql_query("select * from `casesheet_admission` where mrnum='$id'"); 
		while($r=mysql_fetch_array($sq)){
			$mrnum=$r['mrnum'];
			$category=$r['category'];
			$txtdia=$r['txtdia'];
			$Hypertention=$r['Hypertention'];
			$txthyp=$r['txthyp'];
			$CAD=$r['CAD'];
			$txtcad=$r['txtcad'];
			$Tubercu=$r['Tubercu'];
			$txttub=$r['txttub'];
			$Antibiotic=$r['Antibiotic'];
			$txtanti=$r['txtanti'];
			$Hormo=$r['Hormo'];
			$txtHorm=$r['txtHorm'];
			$chemorad=$r['chemorad'];
			$txtcheradi=$r['txtcheradi'];
			$blodtrans=$r['blodtrans'];
			$txtbloodtrans1=$r['txtbloodtrans1'];
			$Surge=$r['Surge'];
			$txtSurg=$r['txtSurg'];
			$othr=$r['othr'];
			$txtothers=$r['txtothers'];
			$Mstat=$r['Mstat'];
			$txtoccu=$r['txtoccu'];
			$Appetite=$r['Appetite'];
			$eating=$r['eating'];
			$Bowels=$r['Bowels'];
			$Mictur=$r['Mictur'];
			$txtmictu=$r['txtmictu'];
			$knall=$r['knall'];
			$txtknowall=$r['txtknowall'];
			$alcohol=$r['alcohol'];
			$ckdsnuff=$r['ckdsnuff'];
			$ckbchew=$r['ckbchew'];
			$ckbsmoke=$r['ckbsmoke'];
			$druguse=$r['druguse'];
			$txtdrug=$r['txtdrug'];
			$betelnut=$r['betelnut'];
			$txtbnut=$r['txtbnut'];
			$beteleaf=$r['beteleaf'];
			$txtbleaf=$r['txtbleaf'];
			
			$ddlfdia=$r['ddlfdia'];
			$txtdia1=$r['txtdia1'];
			$fhyper=$r['fhyper'];
			$txtfhyp=$r['txtfhyp'];			
			$hd=$r['hd'];
			$txtfhd=$r['txtfhd'];
			
			$stroke=$r['stroke'];
			$txtstroke=$r['txtstroke'];
			$Cancer=$r['Cancer'];
			$txtCancer=$r['txtCancer'];
			$tubercu1=$r['tubercu1'];
			$txtftubercu=$r['txtftubercu'];
			$asthma=$r['asthma'];
			$txtasthma=$r['txtasthma'];
			$txtotherdis=$r['txtotherdis'];
			
			$txtpsych=$r['txtpsych'];
			$txtsibling=$r['txtsibling'];
			
			$txtanyotr=$r['txtanyotr'];
			
			$txtagemena=$r['txtagemena'];
			
			$txtmenspast=$r['txtmenspast'];
			$txtmensPresent=$r['txtmensPresent'];
			$txtlmp=$r['txtlmp'];
			$gyne=$r['gyne'];
			$txtgynpro=$r['txtgynpro'];
			
			$txtagemrg=$r['txtagemrg'];
			$txtfstchild=$r['txtfstchild'];
			$txtgravida=$r['txtgravida'];
			$txtpara=$r['txtpara'];
			$txtstilbth=$r['txtstilbth'];
			
			$txtchild=$r['txtchild'];
			$gyne1=$r['gyne1'];
			$txtabortion=$r['txtabortion'];
			$txtothershis=$r['txtothershis'];
			$rbnbirhis=$r['rbnbirhis'];
			$asphyxia=$r['asphyxia'];
			$txtlmp1=$r['txtlmp1'];
			
			$gyne2=$r['gyne2'];
			$rbndevep=$r['rbndevep'];
			$rbnmark=$r['rbnmark'];
			$date1=date('Y-m-d');
			$txtdevep=$r['txtdevep'];
			//$blodtrans=$r['blodtrans'];
			
		}
?>
	<table width="100%" cellspacing="10">




<tr><td>Diabeties:</td>
<td><select id="category" name="category">
<option  value="<?php echo $category?>"><?php echo $category?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($category=='Yes'){?>
<input type="text" id="otherCategory" value="<?php echo $txtdia?>" name="txtdia" value="">
<?php } else {?> 
<input type="text" id="otherCategory" name="txtdia" value="" style="display: none;">
<?php }?> 

</td>
</tr>
<tr><td>Hypertention:</td>
<td><select id="Hypertention" name="Hypertention">
<option value="<?php echo $Hypertention?>" ><?php echo $Hypertention?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>

<?php if($Hypertention=='Yes'){?>
<input type="text" id="cathyp" name="txthyp" value="<?php echo $txthyp?>">
<?php } else {?>
<input type="text" id="cathyp" name="txthyp" value="" style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>CAD:</td>
<td><select id="CAD" name="CAD">
<option value="<?php echo $CAD?>" ><?php echo $CAD?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($CAD=='Yes'){?>
<input type="text" id="caadd" name="txtcad" value="<?php echo $txtcad?>" >
<?php } else {?>
<input type="text" id="caadd" name="txtcad" value="" style="display: none;">
<?php }?>

</td>
</tr>
<tr><td>Tuberculosis:</td>
<td><select id="Tubercu" name="Tubercu">
<option  value="<?php echo $Tubercu?>"><?php echo $Tubercu?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($Tubercu=='Yes'){?>
<input type="text" id="tuber" name="txttub" value="<?php echo $txttub?>" >
<?php } else {?>
<input type="text" id="tuber" name="txttub" value="" style="display: none;">
<?php }?>

</td>
</tr>
<tr><td>Antibiotics:</td>
<td><select id="Antibiotic" name="Antibiotic">
<option  value="<?php echo $Antibiotic?>"><?php echo $Antibiotic?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($Antibiotic=='Yes'){?>
<input type="text" id="anti" name="txtanti" value="<?php echo $txtanti?>" >
<?php } else {?>
<input type="text" id="anti" name="txtanti" value="<?php echo $txtanti?>" style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Hormones:</td>
<td><select id="Hormo" name="Hormo">
<option value="<?php echo $Hormo?>"><?php echo $Hormo?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($Hormo=='Yes'){?>
<input type="text"  name="txtHorm" id="Horm" value="<?php echo $txtHorm?>" >

<?php } else {?>
<input type="text"  name="txtHorm" id="Horm " style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Chemo/Radiation:</td>
<td><select id="chemorad" name="chemorad">
<option value="<?php echo $chemorad?>"><?php echo $chemorad?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($chemorad=='Yes'){?>
<input type="text"  name="txtcheradi" id="cheradi" value="<?php echo $txtcheradi?>" >

<?php } else {?>
<input type="text"  name="txtcheradi" id="cheradi" style="display: none;" >
<?php }?>
</td>
</tr>
<tr><td>Blood Transfusion:</td>
<td><select id="blodtrans" name="blodtrans">
<option value="<?php echo $blodtrans?>"><?php echo $blodtrans?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($blodtrans=='Yes'){?>

<input type="text"  name="txtbloodtrans1" id="bldtrns" value="<?php echo $txtbloodtrans1?>">
<?php } else {?>
<input type="text"  name="txtbloodtrans1" id="bldtrns" style="display: none;" >
<?php }?>
</td>
</tr>
<tr><td>Surgeries:</td>
<td><select id="Surge" name="Surge">
<option value="<?php echo $Surge?>"><?php echo $Surge?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($Surge=='Yes'){?>
<input type="text"  name="txtSurg" id="Surg" value="<?php echo $txtSurg?>" >
<?php } else {?>
<input type="text"  name="txtSurg" id="Surg"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Other:</td>
<td><select id="othr" name="othr">
<option value="<?php echo $othr?>"><?php echo $othr?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($othr=='Yes'){?>
<input type="text"  name="txtothers" id="others" value="<?php echo $txtothers?>">
<?php } else {?>
<input type="text"  name="txtothers" id="others" value="" style="display: none;">
<?php }?>
</td>
</tr>
</table>

<h3 align="left" style="color:red"><u>PERSONAL HISTORY</u></h3>																	<!--PERSONAL HISTORY  -->
<table  cellpadding="5"  >

<tr><td>Marital Status:</td>
<td><select id="mstatus" name="Mstat">
<option value="<?php echo $Mstat?>" ><?php echo $Mstat?></option>
  <option value="Single">Single</option>
  <option value="Married">Married</option>  
</select>
</tr>
<tr><td>Occupation:</td>
<td><input type="text"  name="txtoccu" value="<?php echo $txtoccu?>" id="occu"></td></tr>
<tr><td>Appetite:</td>
<td><select id="Appetite" name="Appetite">
<option value="<?php echo $Appetite?>" ><?php echo $Appetite?></option>
  <option value="Normal">Normal</option>
  <option value="Lost">Lost</option>  
</select></tr>
<tr><td>Eating Habit:</td>
<td><select id="eating" name="eating">
<option value="<?php echo $eating?>"><?php echo $eating?></option>
  <option value="Veg">Veg</option>
  <option value="Non-Veg">Non-Veg</option>  
  <option value="Eggtarian">Eggtarian</option>  
</select>
</tr>
<tr><td>Bowels:</td>
<td><select id="Bowels" name="Bowels">
<option value="<?php echo $Bowels?>" ><?php echo $Bowels?></option>
  <option value="Regular">Regular</option>
  <option value="Iregular">Iregular</option>
<option value="Constipation">Constipation</option>  
</select></td></tr>
<tr><td>Micturation:</td>
<td><select id="Mictur" name="Mictur">
<option value="<?php echo $Mictur?>" ><?php echo $Mictur?></option>
  <option value="Normal">Normal</option>
  <option value="Abnormal">Abnormal</option>  
</select><input type="text" id="mictu" name="txtmictu" value="<?php echo $txtmictu?>" style="display: none;"></td>
</tr>
<tr><td>Known Allergies:</td>
<td><select id="knall" name="knall">
<option value="<?php echo $knall?>"><?php echo $knall?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($knall=='Yes'){?>
<input type="text" id="knownall" name="txtknowall" value="<?php echo $txtknowall?>" >
<?php } else {?>
<input type="text" id="knownall" name="txtknowall"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Habit/Addiction</td>
<td>Alcohol:
<select id="alcohol" name="alcohol">
<option value="<?php echo $alcohol?>"><?php echo $alcohol?></option>
  <option value="Regular">Regular</option>
  <option value="Occupation">Occupation</option> 
<option value="Teetotaler">Teetotaler</option>  
</select></td>
<td>Tobacco:</td>
<td><input type="checkbox" name="ckdsnuff" id="snuff">Snuff
<input type="checkbox" name="ckbchew" id="chew">Chewable
<input type="checkbox" name="ckbsmoke" id="smoke">Smoking</td>
<tr><td>Durg use:</td>
<td><select id="druguse" name="druguse">
<option  value="<?php echo $druguse?>"><?php echo $druguse?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($druguse=='Yes'){?>
<input type="text" id="drug" name="txtdrug" value="<?php echo $txtdrug?>">
<?php } else {?>
<input type="text" id="drug" name="txtdrug"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Betel Nut:</td>
<td><select id="betelnut" name="betelnut">
<option value="<?php echo $betelnut?>"><?php echo $betelnut?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select><?php if($betelnut=='Yes'){?>

<input type="text" id="bnut" name="txtbnut" value="<?php echo $txtbnut?>" >
<?php } else {?>
<input type="text" id="bnut" name="txtbnut"  style="display: none;">

<?php }?> </td>
</tr>
<tr><td>Betel Leaf(Pan):</td>
<td><select id="beteleaf" name="beteleaf">
<option value="<?php echo $beteleaf?>"><?php echo $txtoccu?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select><?php if($beteleaf=='Yes'){?>

<input type="text" id="bleaf" name="txtbleaf" value="<?php echo $txtbleaf?>">

<?php } else {?>

<input type="text" id="bleaf" name="txtbleaf"  style="display: none;">
<?php }?></td>
</tr>

</table>

					
											<!--FAMILY HISTORY  -->
<h3 align="left" style="color:red"><u>FAMILY HISTORY</u></h3>
<table  cellpadding="5"  >
<tr><td>Diabeties:</td>
<td><select id="fdia" name="ddlfdia">
<option value="<?php echo $ddlfdia?>"><?php echo $ddlfdia?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>
<?php if($ddlfdia=='Yes'){?>
<input type="text" id="famdia" name="txtdia1" value="<?php echo $txtdia1?>" >
<?php } else {?>

<input type="text" id="famdia" name="txtdia1"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Hypertention:</td>
<td><select id="fhyper" name="fhyper">
<option value="<?php echo $fhyper?>" ><?php echo $fhyper?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>

<?php if($fhyper=='Yes'){?>
<input type="text" id="fhyp" name="txtfhyp" value="<?php echo $txtdia1?>" >
<?php } else {?>

<input type="text" id="fhyp" name="txtfhyp"  style="display: none;">
<?php }?>

</td>
</tr>
<tr><td>Heart Disease:</td>
<td><select id="hd" name="hd">
<option value="<?php echo $hd?>" ><?php echo $hd?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>

<?php if($hd=='Yes'){?>
<input type="text" id="fhd" name="txtfhd" value="<?php echo $txtfhd?>" >
<?php } else {?>

<input type="text" id="fhd" name="txtfhd"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Stroke:</td>
<td><select id="stroke" name="stroke">
<option value="<?php echo $stroke?>" ><?php echo $stroke?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>

<?php if($stroke=='Yes'){?>
<input type="text" id="fstroke" name="txtstroke" value="<?php echo $txtstroke?>" >
<?php } else {?>

<input type="text" id="fstroke" name="txtstroke"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Cancer:</td>
<td><select id="Cancer" name="Cancer">
<option value="<?php echo $Cancer?>" ><?php echo $Cancer?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>

<?php if($Cancer=='Yes'){?>
<input type="text" id="fcancer" name="txtCancer" value="<?php echo $txtCancer?>" >
<?php } else {?>

<input type="text" id="fcancer" name="txtCancer"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Tuberculosis:</td>
<td><select id="tubercu" name="tubercu1">
<option value="<?php echo $tubercu1?>"><?php echo $tubercu1?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select> 

<?php if($tubercu1=='Yes'){?>
<input type="text" id="ftubercu" name="txtdia1" value="<?php echo $txtftubercu?>" >
<?php } else {?>

<input type="text" id="ftubercu" name="txtftubercu"  style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Asthma:</td>
<td><select id="asthma" name="asthma">
<option value="<?php echo $asthma?>"><?php echo $asthma?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select>


<?php if($asthma=='Yes'){?>
<input type="text" name="txtasthma" id="fasthma" value="<?php echo $txtasthma?>" >
<?php } else {?>

<input type="text"  name="txtasthma" id="fasthma" style="display: none;">
<?php }?>
</td>
</tr>
<tr><td>Any Other Hereditary Disease:</td>
<td><textarea rows="4" cols="30" name="txtotherdis" id="otherdis"><?php echo $txtotherdis?></textarea></td></tr>
<tr><td>Psychiatrist illness:</td>
<td><textarea rows="4" cols="30" name="txtpsych" id="psych"><?php echo $txtpsych?></textarea></td></tr>
<tr><td>Sibling History:</td>
<td><textarea rows="4" cols="30" name="txtsibling" id="sibling"><?php echo $txtsibling?></textarea></td></tr>
<tr><td>Any Otherther:</td>
<td><textarea rows="4" cols="30" name="txtanyotr" id="otr"><?php echo $txtanyotr?></textarea></td></tr>
</table>
	
															<!--MENSTRUAL HISTORY  -->
<h3 align="left" style="color:red"><u>MENSTRUAL HISTORY</u></h3>
															
<table  cellpadding="5">

<tr><td>Age of Menarche:</td>
<td><input type="text" id="agemena" name="txtagemena" value="<?php echo $txtagemena?>" ></td>
</tr>
<tr><td>Menstrual Cycle:</td>
<td><input type="text" id="menspast" name="txtmenspast" value="<?php echo $txtmenspast;?>" placeholder="Past"/>
<input type="text" id="mensprst" name="txtmensPresent" value="<?php echo $txtmensPresent;?>" placeholder="Present"/></td>
</tr>
<tr><td>LMP:</td>
<td><input type="text" id="lmp" name="txtlmp" value="<?php echo $txtlmp?>" />
</tr>
<tr><td>Any Gyneacological Problems:</td>
<td><select id="gyne" name="gyne" >
<option value="<?php echo $gyne?>" ><?php echo $gyne?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</select><input type="text" id="gynpro" name="txtgynpro" value="<?php echo $txtgynpro?>" style="display: none;"></td></tr>

</table>
												<!--OBSTETRIC HISTORY  -->
<h3 align="left" style="color:red"><u>OBSTERTRIC HISTORY</u></h3>
<table  cellpadding="5">

<tr><td>Age at Marriage:</td>
<td><input type="text" id="agemrg" value="<?php echo $txtagemrg?>" name="txtagemrg" ></td>
</tr>
<tr><td>Age at First Child Birth:</td>
<td>
<input type="text" id="fstchild" value="<?php echo $txtfstchild?>" name="txtfstchild" /></td>
</tr>
<tr><td>Gravida:</td>
<td><input type="text" id="gravida" value="<?php echo $txtgravida?>" name="txtgravida" />
</tr>
<tr><td>Para:</td>
<td><input type="text" id="para" value="<?php echo $txtpara?>" name="txtpara" />
</tr>
<tr><td>Still Birth:</td>
<td><input type="text" id="stilbth" value="<?php echo $txtstilbth?>" name="txtstilbth" />
</tr>
<tr><td>No.of Living Childern:</td>
<td><input type="text" id="child" value="<?php echo $txtchild?>" name="txtchild" />
</tr>
<tr><td>Family Planning Methods Used:</td>
<td><select id="gyne" name="gyne1">
<option value="<?php echo $txtoccu?>"><?php echo $txtoccu?></option>
  <option value="Oralpills">Oralpills</option>
  <option value="IUD">IUD</option>
  <option value="IVDpermanentsterllization">IVD Permanent Sterllization</option>
  </td></tr>
  <tr><td>No.of Abortions:</td>
<td><input type="text" id="abortion" value="<?php echo $txtabortion?>" name="txtabortion" />
</tr>
<tr><td>Others:</td>
<td><input type="text" id="othershis" value="<?php echo $txtothershis?>" name="txtothershis" />
</tr>
</table>
														<!--BIRTH HISTORY  -->
<h3 align="left" style="color:red"><u>BIRTH HISTORY</u></h3>
<table  cellpadding="5">
<tr><td>
<?php if($rbnbirhis=='FTND'){?><
<input type="radio" name="rbnbirhis" value="FTND" checked="checked" id="ftnd">FTND
<?php } else {?>
<input type="radio" name="rbnbirhis" value="FTND" id="ftnd">FTND<?php }?>
<?php if($rbnbirhis=='Caesarean Delivery'){?>
<input type="radio" name="rbnbirhis" id="caesdel"  checked="checked" value="Caesarean Delivery">Caesarean Delivery<?php } else { ?>
<input type="radio" name="rbnbirhis" id="caesdel" value="Caesarean Delivery">Caesarean Delivery
<?php }?>
<?php if($rbnbirhis=='Delivery By Vaccum Suction'){?>
<input type="radio" name="rbnbirhis" id="delvacsuc" checked="checked" value="Delivery By Vaccum Suction">Delivery By Vaccum Suction

<?php } else {?>
<input type="radio" name="rbnbirhis" id="delvacsuc" value="Delivery By Vaccum Suction">Delivery By Vaccum Suction

<?php }?>
<?php if($rbnbirhis=='Forceps Delivery'){?>
<input type="radio" name="rbnbirhis" id="fordel"  checked="checked" value="Forceps Delivery">Forceps Delivery<?php } else {?>
<input type="radio" name="rbnbirhis" id="fordel" value="Forceps Delivery">Forceps Delivery
<?php }?>
</td>
</tr>
<tr><td>History of Birth Asphyxia :<select id="asphyxia" name="asphyxia">
<option value="<?php echo $asphyxia?>" ><?php echo $asphyxia?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option> </td>
</tr>
<tr><td>LMP:<input type="text" id="lmp" name="txtlmp1" value="<?php echo $txtlmp1?>"/>
</tr>
<tr><td>Any Gyneacological Problems:<select id="gyne" name="gyne2">
<option value="<?php echo $gyne2?>" ><?php echo $gyne2?></option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>  
</td></tr>
</table>
<h3 align="left" style="color:red"><u>DEVELOPMENTAL HISTORY(As per IAP Guidelines)</u></h3>
<table  cellpadding="5">
<tr><td>
<?php if($rbndevep=='Normal'){?>
<input type="radio" value="Normal" name="rbndevep" checked="checked" id="norm">Normal
<?php } else {?>
<input type="radio" value="Normal" name="rbndevep" id="norm">Normal
<?php }  if($rbndevep=='Abnormal'){?>

<input type="radio" name="rbndevep"  value="Abnormal" checked="checked" id="abnor">Abnormal
<?php } else {?>
<input type="radio" name="rbndevep"  value="Abnormal" id="abnor">Abnormal<?php }?>
<input type="text" id="devep" name="txtdevep" value="<?php echo $txtdevep;?>" />
</td></tr>
</table>
<h3 align="left" style="color:red"><u>DEVELOPMENTAL HISTORY(As per IAP Guidelines)</u></h3>
<table cellpadding="5">

<tr><td>
<?php if($rbnmark=='Up to mark'){?>
<input type="radio" name="rbnmark" value="Up to mark" checked="checked" id="mark">Up to mark
<?php } else {?>
<input type="radio" name="rbnmark" value="Up to mark" id="mark">Up to mark
<?php } ?>

<?php if($rbnmark=='Not upto mark'){?>
<input type="radio" name="rbnmark"  value="Not upto mark" checked="checked" id="uptomark">Not upto mark
<?php } else {?>
<input type="radio" name="rbnmark"  value="Not upto mark" id="uptomark">Not upto mark

<?php }?>

</td></tr>
<input type="hidden" name="id" value="<?php echo $id?>" />

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