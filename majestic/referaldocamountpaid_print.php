<?php
session_start();
include('config.php');
if($_SESSION['name1'])
{
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Amount Collection</title>
        <?php include("header.php"); ?>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
             window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
         


        <style type="text/css">
            .header{
                font-family: monospace,sans-serif,arial;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                text-decoration: underline;
            }
            .heading1 {	
                    font-size:24px;
                    text-align:center;
                    font-weight: bold; 
            }
            .heading2 {	
                font-size:16px;
                text-align:center;
            }
            body {
	background: #FFFFFF;
}
        </style>
    </head>
    <body>
<?php 

$id=$_REQUEST['id'];
 
$q="select * from referaldoctorpaidamount where rfid='$id'";
$rs=mysql_query($q) or die(mysql_error()); 	
$row=mysql_fetch_array($rs);
$fdate=$row['fdate'];
$refdoc_name=$row['refdoc_name'];
$refdoc_code=trim($row['refdoc_code']);
$tdate=$row['tdate'];
$totoplab=$row['totoplab'];
$totoplabshare=$row['totoplabshare'];
$totopcash=$row['totopcash'];
$totopcashshare=$row['totopcashshare'];
$optot=$row['optot'];
$opshare=$row['opshare'];
$totpaid=$row['totpaid'];
$totbal=$row['totbal'];
$pdate=$row['pdate'];
$totiptot=$row['totiptot'];
$totipshare=$row['totipshare'];
$totippaid=$row['totippaid'];
$totipbal=$row['totipbal'];		
$id2=$row['rfid'];

$k3="select * from  referal_doctor where refcode='$refdoc_code'";
$q1=mysql_query($k3) or die(mysql_error());
							
							$kt=mysql_fetch_array($q1);
							$ref_docname1=$kt['ref_docname'];
							 $doctorshare1=$kt['doctorshare'];
							 $oplabshare1=$kt['oplabshare'];
											
							 ?>
<form method="post" action="refdoc_paidamount.php">
<table align="center">
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Amount Collection From OP Lab and OP Cash Bill</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo date('d-m-y',strtotime($fdate));?> </td>
                            <td align="right" colspan="11" style="text-align:center"><?php echo $refdoc_name."(".$refdoc_code.")"; ?> </td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo  date('d-m-y',strtotime($tdate))?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Bill Date</b></td>
                            <td align="center"><b>Patient Type</b></td>
                             <td align="center"><b>Op Lab Amount</b></td>
                             <td align="center"><b>Share(<?php echo $oplabshare1; ?>)%</b></td>
                            <td align="center"><b>OP Cash Amount</b></td>
                              <td align="center"><b>Share(<?php echo $doctorshare1; ?>)%</b></td>
						<td align="center"><b>Total Amount</b></td>
							
                            <td align="center"><b>Total Share </b></td>
                             <td align="center"><b>Paid</b></td>
                              <td align="center"><b>Balance</b></td>
							
						</tr>
                        <?php
						
						$ts1="select * from referaldoctorpaidamount1 where 	id1='$id2'";
					/*$ts1="select distinct a.registerno,a.gender,a.tokenno,a.patientname,a.pat_type,a.age,a.total,a.phoneno,a.ref_doc,a.date,b.ref_docname,b.refcode,b.doctorshare from patientregister a,referal_doctor b where  a.pat_type='OP' and  a.ref_doc=b.refcode and a.ref_doc='$refdoct' and a.date between '$sdate1' and '$edate1' order by a.registerno asc";*/
						$qry=mysql_query($ts1) or die(mysql_error());
						if($qry){
						$i=1;
					 	 while($res=mysql_fetch_array($qry)){
								
							 
							 
							 $bno = $res['mrno'];
							 $pname = $res['pname'];
							 $phoneno=$res['pno'];
							 $age = $res['age'];
							 $ptype = $res['ptype'];
							 $totamt= $res['totamt'];
							 $totsha = $res['totsha'];
							 
							 
							 $paid = $res['paid'];
							 $bal = $res['bal'];
							 $oplabamount= $res['oplabamount'];
							 $oplabshareamount = $res['oplabshareamount'];
							$opcashamount= $res['opcashamount'];
							 $opcashshareamount = $res['opcashshareamount'];
							 $date1 = $res['date'];
							 $ref_docname=$res['ref_docname'];
							
							
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $bno ?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $age ?></td>
                            
                               <td align="center"><?php echo $date ?></td>
                          <td align="center"><?php echo $ptype ?></td>
                          <td align="center"><?php echo $oplabamount;?></td>
                          <td><?php echo $oplabshareamount;?></td>
                          
                          
                          
                            <td align="center"><?php echo $opcashamount?></td>
                             <td><?php echo $opcashshareamount;?></td>
                             <td align="center"><?php echo $totamt;?></td>
                            
                            <td align="center"><?php echo $totsha;?></td>
                               
                          
                           <td><?php echo $paid; ?></td>
                           <td><?php echo $bal; ?></td>
                        
						</tr>
                       <?php } }?>
					   <tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
							 <td align="center"></td>
                             
                             <td align="center"></td>
                             <td align="center"></td>
                             
                            <td align="center"><b>Total</b></td>
							
                            <td align="center" style="padding-right:20px;"><?php echo $totoplab ?></td>
                     <td> <?php echo $totoplabshare; ?></td>
          <td align="center" style="padding-right:20px;"><?php echo $totopcash ?></td>
                           <td><?php echo $totopcashshare; ?></td>
                            <td align="center" style="padding-right:20px;"><?php echo $optot ?></td>
                            <td align="center" style="padding-right:20px;"><?php echo $opshare ?></td>
                            <td align="center" style="padding-right:20px;"><?php echo $totpaid;?></td>
                            <td align="center" style="padding-right:20px;"><?php echo $totbal;?></td>
                            
                        
						</tr>
						
								
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
<tr><td colspan="8"><h1 align="center">IP Paitients Amount</h1></td></tr>
 <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo date('d-m-y',strtotime($fdate));?></td>
                            <td align="right" colspan="8" style="text-align:center"><?php echo $refdoc_name."(".$refdoc_code.")"; ?></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo date('d-m-y',strtotime($tdate));?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Admission Date</b></td>
                            <td align="center"><b>Patient Type</b></td>
                             <td align="center"><b>Discharge Date</b></td>
                           
						<td align="center"><b>Total Amount</b></td>
							
                            <td align="center"><b>Share(<?php echo $doctorshare1; ?>)%</b></td>
							<td align="center"><b>Paid Amount</b></td>
                            <td align="center"><b>Bal Amount</b></td>
						</tr>
                        <?php
						
						
					$ts2="select * from referaldoctorpaidamount2  where id2='$id2' ";
					
						$qry=mysql_query($ts2) or die(mysql_error());
						if($qry){
						$i=0;
						
					 	 while($res=mysql_fetch_array($qry)){
								
							 
							 
							 $bno = $res['mrno'];
							 $pname = $res['pname'];
							 $phoneno=$res['pno'];
							 $age = $res['age'];
							 $sex = $res['Sex'];
							 $tokenno = $res['tokenno'];
							 $ptype = $res['ptype'];
							 $share= $res['share'];
							 $ttotal = $res['ttotal'];
							 
							 $totpaid= $res['totpaid'];
							 $totbal = $res['totbal'];
							
							 $date1 = $res['adate'];
							 $date2 = $res['ddate'];
							$tokenno = $res['tokenno'];
							
							
							$date=date('d-m-Y',strtotime($date1));
							$date3=date('d-m-Y',strtotime($date2));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $bno ?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $age ?></td>
                            
                               <td align="center"><?php echo $date ?></td>
                          <td align="center"><?php echo $ptype ?></td>
                          <td align="center"><?php echo $date3 ?></td>
                          <td align="center"><?php echo $ttotal ?></td>
                            
                            
                            <td align="center"><?php echo $share; ?> </td>
                          
                          <td align="center" style="padding-right:20px;"><?php echo $totpaid; ?></td>
                            <td align="center" style="padding-right:20px;"><?php echo $totbal; ?></td>
                        
						</tr>
                       <?php } ?>
					   <tr>
                           
                            <td align="center"></td>
                            <td align="center"></td>
							 <td align="center"></td>
                             
                             <td align="center"></td>
                             <td align="center"></td>
                             <td align="center" style="padding-right:20px;"></td>
                           <td align="center" style="padding-right:20px;"></td>
                            <td align="center"><b>Total</b></td>
							
                            
                            <td align="center" style="padding-right:20px;"><?php echo $totiptot ?></td>
                            <td align="center" style="padding-right:20px;"><?php echo $totipshare ?></td>
                            <td align="center" style="padding-right:20px;"><?php echo $totippaid;?></td>
                            <td align="center" style="padding-right:20px;"><?php echo $totipbal;?></td>
                            
                        
						</tr>
						
						
						
						
						 
					   
						
						
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 




<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="self.location='referaldoctoramountpaid_list.php'"/></td>
</tr>
        </table>
        <?php }
							
?>


</form>
		
		
		
		
			

			
		
			
       
			
		
			
			
			

	
    </body>
</html>
<?php }?>