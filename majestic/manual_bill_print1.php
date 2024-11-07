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
	padding-top:42px;
	font:"Times New Roman", Times, serif;
	font-size:12px;
  
}
.text{
	text-align:right;
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
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="manual_bill.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<div class="book">
    <div class="page">
        <div class="subpage">
        <?php 
include("config.php");
$id=$_GET['id'];
$k="select * from  manual_bill where  BILL_NO='$id'";
$sql=mysqli_query($link,$k) or die(mysqli_error($link));
$r=mysqli_fetch_array($sql);




$BILL_DATE=$r['BILL_DATE'];
$PatientNo=$r['PatientNo'];
$PatientMRNo=$r['PatientMRNo'];
$PatientName=$r['PatientName'];
$Age=$r['Age'];
$bno=$r['bno'];
$Sex=$r['Sex'];
$Address=$r['Address'];
$ConsultDoctor=$r['ConsultDoctor'];
$ContactNo=$r['ContactNo'];
$Relation=$r['Relation'];
$RelationName=$r['RelationName'];
$AdmissionDate=$r['AdmissionDate'];
$DischargeDate=$r['DischargeDate'];
$icudays=$r['icudays'];
$gendays=$r['gendays'];
$icubed=$r['icubed'];
$icuintensit=$r['icuintensit'];
$icunursing=$r['icunursing'];
$genbed=$r['genbed'];
$gennursing=$r['gennursing'];
$gendmo=$r['gendmo'];
$Criticalcare=$r['Criticalcare'];
$CARMcare=$r['CARMcare'];
$otcharge=$r['otcharge'];
$otconcession=$r['otconcession'];
$otinstrument=$r['otinstrument'];
$Anaesthesia=$r['Anaesthesia'];
$Surgeon=$r['Surgeon'];
 $AsstSurgeon=$r['AsstSurgeon'];
$Anaesthetist=$r['Anaesthetist'];
$Anaesthetistconnession=$r['Anaesthetistconnession'];
$tothosp=$r['tothosp'];
$totlab=$r['totlab'];
$totpharmacy=$r['totpharmacy'];
$dresscharg=$r['dresscharg'];

$totamt=$r['totamt'];
$totconsession=$r['totconsession'];
$netamt=$r['netamt'];
$hospaid=$r['hospaid'];
			$hospdue=$r['hospdue'];
			$labpaid=$r['labpaid'];
			$labdue=$r['labdue'];
			$pharmacypaid=$r['pharmacypaid'];
			$pharmacydue=$r['pharmacydue'];
   $totpaid=$r['totpaid'];
			$totdue=$r['totdue'];
			$surgery=$r['surgery'];
			$surgeryamount=$r['surgeryamount'];
			$roomtype=$r['roomtype'];

?>

<?php // echo  $no = '$no';
   // $newtimestamp = strtotime($doct1. ' + 330 minute');//gets timestamp
    //convert into whichever format you need 
     //$newdate = date('d-m-Y H:i:s', $newtimestamp);
//echo "Right now: " . $now_stamp;
//echo "5 minutes from right now: " . $expire_stamp;

?>

        <table    border="0"  cellspacing="0">
            <tr>
<td><strong>Bill No</strong>  : <?php echo $bno;  ?></td>
</tr>
        <tr>
<td><strong>UMR No</strong>  : <?php echo $PatientMRNo;  ?></td>
</tr>
<tr><td><strong>Pat No</strong> : <?php echo $PatientNo;  ?> </td></tr>
<tr><td><strong>Pt.Name</strong> : <?php echo $PatientName;  ?> </td></tr>
<tr><td><strong>Name</strong> : <?php echo $RelationName;  ?></td></tr>
<tr>
<td><strong>Age/Gender </strong>: <?php  echo $Age."/". $Sex."&nbsp;&nbsp;Date:".date('d-m-Y',strtotime($AdmissionDate));?></td>

</tr>
<tr>
<td><strong>Consult Dr. Name</strong>  : <?php echo $ConsultDoctor;  ?></td>
</tr>
<tr>
<td><strong>Discharge Date</strong>  : <?php echo date('d-m-Y',strtotime($DischargeDate));  ?></td>
</tr>
<tr>
<td><strong>Address</strong>  : <?php echo $Address;  ?></td>
</tr>
</table>
<hr/>
<h3 align="center">Final Bill</h3>
   
        <table width="100%">
        <tr>
        <th >ICU Charges</th>
       
        <th>General Ward/Specicl Room  Charges</th>
        </tr>
        
        
        
         <tr>
        <td >
        <table>
        <tr>
        <th>No.of days in ICU</th>
        <td><?php echo $icudays; ?></td>
        </tr>
        
        <tr>
        <th>Bed Charges</th>
        <td class="text"><?php echo $icubed; ?></td>
        </tr>
        <tr>
        <th>Intensivist/DR</th>
        <td class="text"><?php echo $icuintensit; ?></td>
        </tr>
        <tr>
        <th>Nursing Charges</th>
        <td class="text"><?php echo $icunursing; ?></td>
        </tr>
        </table>
        
        </td>
         <td>
         
         <table>
        <tr>
        <?php 
		if($roomtype=='general'){
		?>
        <th>No.of days in General Ward</th>
        <?php } else{?>
         <th>No.of days in Special Room</th>
        <?php }?>
        <td><?php echo $gendays; ?></td>
        </tr>
        
        <tr>
        <th>Bed Charges</th>
        <td class="text"><?php echo $genbed; ?></td>
        </tr>
        
        <tr>
        <th>Nursing Charges</th>
        <td class="text"><?php echo $gennursing; ?></td>
        </tr>
        
        <tr>
        <th>DMO Charges</th>
        <td class="text"><?php echo $gendmo; ?></td>
        </tr>
        </table>
        
         
         
         </td>
        
        </tr>
         
        <table>
        <?php if($surgery=='' or $surgery=="no"){}else{ ?>
        <table  width="100%">
        <tr>
        <td><b>Surgery Package</b></td>
        <td><?php echo  $surgery ?></td>
        <td><b>Surgery Amount</b></td>
        <td  class="text"><?php echo $surgeryamount?></td>
        </tr>
        </table>
                        
            <?php }?>    
             <?php if($surgery=='yes'){}else{ ?>     
        <table border="1" cellpadding="0" cellspacing="0" width="100%">
         
        <tr>
        <th>SNo</th>
        <th>Description</th>
        <th>Days</th>
        <th>Charge</th>
        <th>Amount</th>
        
        </tr>
         <?php
					   $p="select * from manual_other_desc where fid='$id' ";
					  $result=mysqli_query($link,$p) or die(mysqli_error($link));
					  $i=1;
					   while($r=mysqli_fetch_array($result)){
						   
					    
					    ?>
					   <tr>
                       <th><?php echo $i ?></th>
                       <td><?php echo $r['description'] ?></td>
                       <th><?php echo $r['days'] ?></th>
					   <th ><?php echo $r['amount'] ?></th>
                        <th ><?php echo $r['total'] ?></th>
                         
						
						</tr>
                        <?php
						
						$i++;
						 }?>
                        
                        <tr>
        
        </table>
        <?php }?>
         <?php if($surgery=='yes' ){}else{ ?>
        <?php 
		if($Criticalcare!='0.00' or $CARMcare!='0.00' or $otcharge!='0.00' or $otconcession!='0.00' or $otinstrument!='0.00' or $Anaesthesia!='0.00' or $Surgeon!='0.00' 
		or $AsstSurgeon!='0.00' or $Anaesthetist!='0.00' or  $Anaesthetistconnession!='0.00' or $dresscharg!='0.00' ){?>
			  <h1>Operation  Theatre Charges</h1>
		<?php	}else{
				echo '<br/>';
				}
		
		 ?>
      
        <table width="50%" align="left">
        <?php
		if($Criticalcare=='0.00'){
		}else{
		 ?>
        <tr>
        <th>Critical Care Support</th>
        <th>:</th>
        <td class="text"><?php echo $Criticalcare; ?></td>
       </tr>
       <?php }
	   
	   if($CARMcare=='0.00'){
		}else{
	   ?>
       
       
       <tr>
        <th>CARM Charges</th>
        <th>:</th>
        <td class="text"><?php echo $CARMcare; ?></td>
        </tr>
       <?php }
	   
	   if($otcharge=='0.00'){
		}else{
	   ?>
       
        <tr>
        <th>OperationTheater Charges</th>
        <th>:</th>
        <td class="text"><?php echo $otcharge; ?></td>
       </tr>
       <?php } 
	   if($otconcession=='0.00'){
		}else{
	    ?>
       <tr>
        <th>OperationTheater Concession
</th>
        <th>:</th>
        <td class="text"><?php echo $otconcession; ?></td>
        </tr>
        <?php } 
		if($otinstrument=='0.00'){
		}else{
		
		?>
        
         <tr>
        <th>OT Instrumentation Charges</th>
        <th>:</th>
        <td class="text"><?php echo $otinstrument; ?></td>
       </tr>
       <?php }
	   if($Anaesthesia=='0.00'){
		}else{
	   
	   ?>
       
       <tr>
        <th>Anaesthesia/Disposable
</th>
        <th>:</th>
        <td class="text"><?php echo $Anaesthesia; ?></td>
        </tr>
        <?php }
		
		if($Surgeon=='0.00'){
		}else{
		?>
         <tr>
        <th>Surgeon Charges</th>
        <th>:</th>
        <td class="text"><?php echo $Surgeon; ?></td>
       </tr>
       <?php }
	   if($AsstSurgeon=='0.00'){
		}else{
	   
	   ?>
       
       <tr>
        <th>Asst. Surgeon Charges</th>
        <th>:</th>
        <td class="text"><?php echo $AsstSurgeon; ?></td>
        </tr>
        <?php }
		if($Anaesthetist=='0.00'){
		}else{
		?>
         <tr>
        <th>Anaesthetist Charges</th>
        <th>:</th>
        <td class="text"><?php echo $Anaesthetist; ?></td>
       </tr>
       
       <?php }
	   
	   if($Anaesthetistconnession=='0.00'){
		}else{?>
       <tr>
        <th>Anaesthetist Concession</th>
        <th>:</th>
        <td class="text"><?php echo $Anaesthetistconnession; ?></td>
        </tr>
        <?php }if($dresscharg=='0.00'){
		}else{?>
         <tr>
        <th>Dressing Charges</th>
        <th>:</th>
        <td class="text"><?php echo $dresscharg; ?></td>
       
       
        </tr>
              <?php }?>          
        </table>
        <?php }?>
         <?php if($surgery=='yes' ){}else{ ?>
        <table border="1" cellpadding="0" cellspacing="0" width="100%">
         
        <tr>
        <th>SNo</th>
        <th>Doctor Name</th>
        <th>No of Days Visit</th>
        <th>Amount</th>
        <th>Total</th>
        
        </tr>
         <?php
					   $p="select * from manual_doctor_visit where fid='$id' ";
					  $result=mysqli_query($link,$p) or die(mysqli_error($link));
					  $i=1;
					   while($r=mysqli_fetch_array($result)){
						   $docname1=$r['docname'];
						   $rs=mysqli_query($link,"select * from doct_infor where id='$docname1'") or die(mysqli_error($link));
					    $rs1=mysqli_fetch_array($rs);
						$dname=$rs1['dname1'];
					    ?>
					   <tr>
                       <th><?php echo $i ?></th>
                       <td><?php echo $dname ?></td>
                       <th><?php echo $r['visits'] ?></th>
					   <th ><?php echo $r['amount'] ?></th>
                        <th ><?php echo $r['total'] ?></th>
                         
						
						</tr>
                        <?php
						
						$i++;
						 }?>
                        
                        <tr>
        
        </table>
        <?php }?>
        <table width="50%" align="right">
        <tr>
        
        <th>Total Hospital Amount</th>
        <th>:</th>
        <th class="text"><?php echo $tothosp; ?></th>
        </tr>
       <tr>
         <th>Total Lab Amount</th>
        <th>:</th>
        <th class="text"><?php echo $totlab; ?></th>
        </tr>
         <tr>
        
         <th>Total Pharmacy Amount</th>
        <th>:</th>
        <th class="text"><?php echo $totpharmacy; ?></th>
        </tr>
        <tr>
        <td colspan="3"><hr/></td>
        </tr>
        <tr>
        <th>Total  Amount</th>
        <th>:</th>
        <th class="text"><?php echo $totamt; ?></th>
        
        
        </tr>
        <tr>
        <th>Connession Amount</th>
        <th>:</th>
        <th class="text"><?php echo $totconsession; ?></th>
        </tr>
         <tr>
        <th>Net Amount</th>
        <th>:</th>
        <th class="text"><?php echo $netamt; ?></th>
        </tr>
        <tr>
        <th >Total Paid Amount</th>
        <th>:</th>
        <th class="text"><?php echo $netamt; ?></th>
        
        </tr>
        <tr>
        <th>Total Out Standing Due</th>
        <th>:</th>
        <th class="text"><?php echo '0.00'; ?></th>
        
        </tr>
        </table>
        
        </div>    
    </div>
    
</div>

</body>
</html>