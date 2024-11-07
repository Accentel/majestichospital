<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT * FROM reportentry WHERE BillNo = '$q'";
$result = mysqli_query($link,$sql);
if($result){
	$row = mysqli_fetch_array($result);
	echo "@" . date('d-m-Y',strtotime($row['Date']));
	echo "@" . $row['Pname'];
	echo "@" . $row['Age'];
	echo "@" . $row['Sex'];
	echo "@" . $row['DoctorName'] . "@";
	
}


?>
<table width="100%" cellpadding="0" cellspacing="0">
<?php
$sql3=mysqli_query($link,"SELECT distinct Ptest FROM reportentry WHERE BillNo = '$q'");
if($sql3){
while($row3 = mysqli_fetch_array($sql3)){
$tname1 = $row3['Ptest'];
?>
<table>
<tr ><td><input type="radio" name="tid" id="tid" value="<?php echo $tname1 ?>" onclick="showHint1(this.value)"/> <?php echo $tname1 ?></td></tr>
</table>
<?php
}}
echo "@";

$sql1 = mysqli_query($link,"select Ptest from reportentry where BillNo='$q'");
if($sql1){
$i=0;
while($row1 = mysqli_fetch_array($sql1)){
$tname = $row1['Ptest'];
$i++;
?>	
<input type="hidden" name="tname[]" value="<?php echo $tname ?>"/>
<?php
if($tname == "COMPLETE BLOOD  PICTURE (CBP)"){
$sql4 = mysqli_query($link,"select count(*) from cbp where bill_no='$q'");
if($sql4){
	$row4 = mysqli_fetch_array($sql4);
	$cnt = $row4[0];
}
if($cnt <= 0){
?>



<?php
}else{
$sql5 = mysqli_query($link,"select * from cbp where bill_no='$q'");
if($sql5){
	
}
?>

<?php
}
}if($tname == "COMPLETE URINE EXAMINATION(CUE)"){
?>

<?php
}if($tname == "MANTOUX TEST"){
?>

<?php }if($tname == "C - Reactive Protein (CRP)"){
?>

</table>
<?php }if($tname == "LIVER FUNCTION TEST"){
?>

<?php }if($tname == "Parasite F and V"){
?>

<?php }if($tname == "Smear for Malarial Parasite"){
?>

<?php }if($tname == "SERUM AMYLASE"){
?>

<?php }if($tname == "Absolute Eosinophil Count (AEC)"){
?>

<?php }if($tname == "Erythrocyte Sedimentation Rate (ESR)"){
?>

<?php }if($tname == "Serum Electrolytes"){
?>

<?php }if($tname == "Random Blood Sugar (RBS)"){
?>

<?php }if($tname == "Blood Urea"){
?>

<?php }if($tname == "Serum Creatinine"){
?>

<?php }if($tname == "SERUM CALCIUM"){
?>

<?php }if($tname == "Prothrombin Time (PT)"){
?>

<?php }if($tname == "Activated Partial Thromboplastin Time (APTT)"){
?>

<?php }if($tname == "Serum Uric Acid"){
?>

<?php }if($tname == "COMPLETE STOOL EXAMINATION"){
?>

<?php }if($tname == "HBsAg"){
?>

<?php }if($tname == "WIDAL"){
?>

<?php }if($tname == "HAEMOGLOBIN"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<?php }if($tname == "RFT"){
?>

<?php }if($tname == "Reducing Substance"){
?>

<?php }if($tname == "SERUM BILIRUBIN"){
?>

<?php }if($tname == "BLEEDING TIME AND CLOTTING TIME"){
?>

<?php }if($tname == "BLOOD GROUP"){
?>

<?php }if($tname == "BLOOD SUGAR(FBS,PLBS)"){
?>

<?php }if($tname == "HIV 1 AND 2"){
?>

<?php }if($tname == "HCV"){
?>

<?php }if($tname == "VDRL"){
?>

<?php }if($tname == "LIPID PROFILE"){
?>

<?php }if($tname == "SPUTUM FOR AFB"){
?>

<?php }if($tname == "PLATELET COUNT"){
?>

<?php }if($tname == "SERUM CHOLESTEROL"){
?>

<?php }if($tname == "SERUM TRYGLYCERIDES"){
?>

<?php }if($tname == "ALKALINE PHOSPHATE"){
?>

<?php }if($tname == "TOTAL PROTIENS"){
?>

<?php }if($tname == "SERUM POTASSIUM"){
?>

<?php }if($tname == "Smear for Microfilaria"){
?>

<?php }if($tname == "WBC Count"){
?>

<?php }if($tname == "Peripheral Smear"){
?>

<?php }if($tname == "FBS"){
?>


<?php }if($tname == "PLBS"){
?>

<?php }
if($tname == "RETI COUNT"){
?>

<?php }
if($tname == "SGOT"){
?>

<?php }

if($tname == "SGPT"){
?>

<?php }
if($tname == "LFT(SGOT SGPT)"){
?>

<?php }
if($tname == "FLUID EXAMINATION-ROUTINE(PLEURAL FLUID)"){
?>

<?php }
if($tname == "COAGGULATION(PT APTT)"){
?>

<?php }
if($tname == "24 Hrs URINE PROTIEN"){
?>

<?php }
if($tname == "BONE MARROW"){
?>

<?php }
if($tname == "Gram Stain"){
?>

<?php }
if($tname == "FNAC"){
?>

<?php }

if($tname == "TFT"){
?>

<?php }

if($tname == "RA FACTOR"){
?>

<?php }
if($tname == "SERUM TSH"){
?>

<?php }if($tname == "Serology ( HIV, HBs Ag and VDRL )"){
?>

<?php }
if($tname == "ANP"){
?>

<?php }
}}?>

<?php
echo "@" . $r;
?>