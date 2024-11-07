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
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Patient Details</u></b></h2></td></tr>
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

			$pno = $_REQUEST['adv_no'];
			 $x="select b.ADMIT_DATE,a.patientname,a.registerno,a.age,a.gender,a.phoneno,a.registerno,a.phoneno,
			 a.arrival_mode,a.ref_from,a.previous,b.ADMIT_TIME,a.address,b.Auth_BY from patientregister as a,ip_pat_admit as b
			 where a.registerno=b.pat_regno  and a.registerno='$pno'";
			$sql= mysqli_query($link,$x);
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
				$arrival_mode=$row['arrival_mode'];
				$ref_from=$row['ref_from'];
				$previous=$row['previous'];
				//$amt =$row['AMOUNT'];
				//$consamt = $row['CONS_AMT'];
				//$allotby = $row['Allot_BY'];
				//$docname = $row['dname1'];
				//$contype = $row['CONCESSION_TYPE'];
				//$cardno = $row['CONCESSION_CARDNO'];
				//$insutype = $row['insu_type'];
				$authby = $row['Auth_BY'];
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
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="4"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
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
         
            <td width="20%"><div align="left"><b>Arrival Mode : </b> </div></td>
			<td ><?php echo $arrival_mode ?></td>
            <td width="20%"><div align="left"><b>Refferal From : </b></div></td>
			<td ><?php echo $ref_from ?></td>
            </tr>
         
             <tr>
         
            <td width="20%" colspan="2"><div align="left"><b>Previous Admission : </b> </div></td>
			<td ><?php echo $previous ?></td></tr><tr>
            <td width="20%" colspan="2"><div align="left"><b>Address : </b></div></td>
			<td ><?php echo $addr ?></td>
            </tr>
            
             
			
			
			<tr height="20"></tr>
        </table></td>
      </tr>
      <tr><td align="center" style=" border-top: #000000 1px solid"><table width="70%" cellpadding="0" cellspacing="0" >
        <tr height="20"></tr>
		<tr><td height="18"><b>Prepared By:</b><?php echo $authby ?></td><td valign="top"><div align="right"><b>Printed Date:</b><?php echo date('d-m-Y',strtotime("now"));?></div></td>
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