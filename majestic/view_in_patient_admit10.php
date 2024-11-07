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
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Sugar Chart</u></b></h2></td></tr>
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
			//echo  $id=$_REQUEST['patno'];
			$adv_no=$_REQUEST['adv_no'];
			//$adv_no=$_REQUEST['patno'];
			if($adv_no!=''){
				$id=$_REQUEST['adv_no'];
			} else {
				$id=$_REQUEST['patno'];
			}
				
			   $x="select b.ADMIT_DATE,a.patientname,a.registerno,a.age,a.gender,a.phoneno,a.registerno,a.phoneno,
			 b.ADMIT_TIME,a.address from patientregister as a,ip_pat_admit as b
			 where a.registerno=b.pat_regno  and a.registerno='$id'";
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
        
        <table  border="1px" align="center">
                          
                            
                                    <tr>
                                      
                                      <th >Date/Time </th>
                                      <th>Blood Sugar</th>
									 <!-- <th >Dose </th>
                                      <th >Route</th>
									  <th >Freequency</th>
							          <th >SpecialProcedure</th>
									  <th >Remarks</th>-->
                                    </tr>
                              
                            
        
  
 
	<?php //$id=$_REQUEST['patno'];
	 $x="select * from casesheet_sugarchart where pat_regno='$id'";
$sql1=mysqli_query($link,$x)or die(mysqli_error($link));
while($r=mysqli_fetch_array($sql1)){
	//$sugardate=$r['SugarDate'];
	//$blood_sugar=$r['Blood_Sugar'];
	$pat_no=$r['pat_regno'];
	$Date_Time=$r['SugarDate'];
	$Blood_Sugar=$r['Blood_Sugar'];
	//$dose=$r['dose'];
	//$route=$r['route'];
	//$Frequency=$r['Frequency'];
	//$Special_Proc=$r['Special_Proc'];
	//$Remarks=$r['Remarks'];
	//$mrnum=$r['pat_regno'];
	$id=$r['id'];
	
	?>



<tr ><th><?php echo $Date_Time?></th>
<th><?php echo $Blood_Sugar?></th>

</tr>
<?php 
}?>

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