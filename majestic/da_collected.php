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
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Out Patient List</u></b></h2></td></tr>
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
        
       
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="4"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="1" align="center" style="vertical-align:text-top" cellpadding="1" cellspacing="0" >
          
         
          <tr>
         <td width="5%"><div align="left"><b>S.NO  </b> </div></td>
              <td width="10%"><div align="left"><b>Bill No.</b> </div></td>
            <td width="10%"><div align="left"><b>UMR No</b> </div></td>
             <td width="10%"><div align="left"><b>Patient Name</b> </div></td>
            
            <td ><div align="left"><b>New/Existing</b> </div></td>
            <td ><div align="left"><b>Dr Service</b> </div></td>
             <td  ><div align="left"><b>Dr Zainab </b></div></td>
             <td  ><div align="left"><b>Dr Nishat </b></div></td>
             <td  ><div align="left"><b>Dr Kulsoom </b></div></td>
             <td  ><div align="left"><b>Dr Syeda </b></div></td>
             <td  ><div align="left"><b>Visiting Doctor. </b></div></td>
               <td  ><div align="left"><b>Hospital</b></div></td>
             <td  ><div align="left"><b>Prepared By </b></div></td>
             </tr>
		 <?php 
		
			include("config.php");
			$start_dt=$_REQUEST['s_date'];
$end_dt=$_REQUEST['e_date'];
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));
$i=1;
          $x="select  * from patientregister where 
  date between '$sdate' and '$edate' ";
$qry1=mysqli_query($link,$x)or die(mysqli_error($link));
$zainab=0;
     $nishat=0;
     $parveen=0;
     $syeda=0;
     $visit=0;
     $hospital=0;
while($r=mysqli_fetch_array($qry1)){
     $billno=$r['bill_num'] ;
     $mrno=$r['mrnum'];
     
?>
        
        <tr>	
        
    
            <td><?php echo $i?></td>
            <td ><?php echo $r['bill_num'] ?></td>
			<td ><?php echo $r['registerno'] ?></td>
			<td ><?php echo $r['patientname'] ?></td>
         	<td><?php echo $r['pat_type1']; ?> </td>
			<td><?php echo "-" ;?></td>
          
          <td>
                <?php 
                
                if ($r['doctorname']=='DR.ZAINAB')
                {
			echo $r['total'];
			$zainab=$zainab+$r['total'];
                }
			?>
              </td>
            
          	 <td>
                <?php 
                
                if ($r['doctorname']=='DR.NISHAT HYDERI')
			{
			echo $r['total'];
			$nishat=$nishat+$r['total'];
                }
			?>
              </td>
			<td>
                <?php 
                
                if ($r['doctorname']=='DR.PARVEEN KULSUM')
			{
			echo $r['total'];
			$parveen=$parveen+$r['total'];
                }
			?>
              </td>
              <td>
                <?php 
                
                if ($r['doctorname']=='DR. SYEDA FATIMA')
		{
			echo $r['total'];
			$syeda=$syeda+$r['total'];
                }
			?>
              </td>
              <td>
                <?php 
                
                if ($r['doctorname']=='VISIT')
			{
			echo $r['total'];
			$visit=$visit+$r['total'];
                }
			?>
              </td>
              <td>
                <?php 
                
                if ($r['doctorname']=='HOSPITAL')
			{
			echo $r['total'];
			$hospital=$hospital+$r['total'];
                }
			?>
              </td>
            
            
				<td><?php echo $r['auth_by']; ?> </td>
			
            </tr>
            
			
            <?php  $i++;}?>
            
  <?php 
		
			include("config.php");
			$start_dt=$_REQUEST['s_date'];
$end_dt=$_REQUEST['e_date'];
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));

          $x="select  *,amount as total,DoctorName as doctorname from sbill where 
  BillDate between '$sdate' and '$edate' ";
$qry1=mysqli_query($link,$x)or die(mysqli_error($link));
while($r=mysqli_fetch_array($qry1)){
     $billno=$r['BillNO'] ;
     $mrno=$r['mrno'];
     
?>
        
        <tr>	
        
    
            <td><?php echo $i?></td>
            <td ><?php echo $r['BillNO'] ?></td>
			<td ><?php echo $r['mrno'] ?></td>
			<td ><?php echo $r['PatientName'] ?></td>
         	<td><?php echo $r['ptype']; ?> </td>
         	<td><?php echo $r['serv_name']; ?></td>
			
          
          <td>
                <?php 
                
                if ($r['doctorname']=='DR.ZAINAB')
                {
			echo $r['total'];
			$zainab=$zainab+$r['total'];
                }
			?>
              </td>
            
          	 <td>
                <?php 
                
                if ($r['doctorname']=='DR.NISHAT HYDERI')
			{
			echo $r['total'];
			$nishat=$nishat+$r['total'];
                }
			?>
              </td>
			<td>
                <?php 
                
                if ($r['doctorname']=='DR.PARVEEN KULSUM')
			{
			echo $r['total'];
			$parveen=$parveen+$r['total'];
                }
			?>
              </td>
              <td>
                <?php 
                
                if ($r['doctorname']=='DR. SYEDA FATIMA')
		{
			echo $r['total'];
			$syeda=$syeda+$r['total'];
                }
			?>
              </td>
              <td>
                <?php 
                
                if ($r['doctorname']=='VISIT')
			{
			echo $r['total'];
			$visit=$visit+$r['total'];
                }
			?>
              </td>
              <td>
                <?php 
                
                if ($r['doctorname']=='HOSPITAL')
			{
			echo $r['total'];
			$hospital=$hospital+$r['total'];
                }
			?>
              </td>
            
            
				<td><?php echo $r['user']; ?> </td>
			
            </tr>
            
			
            <?php  $i++;}?>
                      
		 
			 
			 <tr><td colspan="6" align="right"><strong>Total</strong></td>
			  	
                       
                       <td><?php echo $zainab; ?></td>
                       <td><?php echo $nishat; ?></td>
                       <td><?php echo $parveen; ?></td>
                       <td><?php echo $syeda; ?></td>
                       <td><?php echo $visit; ?></td>
                       <td><?php echo $hospital; ?></td>
                       <td ></td>
                       </tr>
        </table></td>
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