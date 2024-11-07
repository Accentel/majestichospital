<?php
include("config.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
  
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Amount Collection</title>
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

			
			
			<table align="center">
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Amount Collection</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="12" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Register Date</b></td>
                            <td align="center"><b>Patient Type</b></td>
                             <td align="center"><b>Ref Doctor</b></td>
                            <td  align="center">Op Lab Share(%)</td>
						
							<td align="center"><b>Op Lab </b></td>
                            <td align="center"><b>OP Share </b></td>
                             <td  align="center">Hosp Share(%)</td>
                            <td align="center"><b>Observation </b></td>
                            <td align="center"><b>Ob Share </b></td>
							<td align="center"><b>Total </b></td>
                            <td align="center"><b>Total Share </b></td>
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
						$qry=mysqli_query($link,"select distinct a.registerno,a.gender,a.tokenno,a.patientname,a.pat_type,a.age,a.total,a.phoneno,a.ref_doc,a.date,b.ref_docname,b.oplabshare,b.refcode,b.doctorshare from patientregister a,referal_doctor b where a.ref_doc=b.refcode  and a.pat_type='OP' and a.date between '$sdate1' and '$edate1' order by a.date asc")or die(mysqli_error($link));
						if($qry){
						$i=0;
						$total1=0;
						$opls=0;
						$totshare=0;
						$tt1=0;
						$total5=0;
						$obs=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $bno = $res['registerno'];
							 $pname = $res['patientname'];
							  $phoneno=$res['phoneno'];
							 $age = $res['age'];
							 $sex = $res['gender'];
							 $tokenno = $res['tokenno'];
							 $ptype = $res['pat_type'];
							  $ref_docname = $res['ref_docname'];
							 // $total = $res['NetAmount'];
							  $oplabshare = $res['oplabshare'];
							    $doctorshare = $res['doctorshare'];
								$ref_doc = $res['ref_doc'];
							$total1=$total1+$total;
							$opls2=($total*$oplabshare)/100;
							$opls=$opls+($total*$oplabshare)/100;
							 $date1 = $res['date'];
							
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $bno ?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $age."/".$sex ?></td>
                            
                               <td align="center"><?php echo $date ?></td>
                          <td align="center"><?php echo $ptype."/". $tokenno ?></td>
                             <td align="center"><?php echo $ref_docname."(".$ref_doc.")"; ?></td>
                             
                              <td align="center"><?php echo $oplabshare ?></td>
                            <td align="center">
                            <?php 
							 $q="select sum(NetAmount) as net from bill1 where mrno='$bno' and BillDate='$date1'";
							$rs=mysqli_query($link,$q) or die(mysqli_error($link));
							$t=mysqli_fetch_array($rs);
							$net=$t['net'];
							if($net!=''){ echo $net;}else{echo $net=0;}
							
							$total1=$total1+$net;
							$sh=($net*$oplabshare)/100;
							$opls=$opls+$sh;
							 ?>
                            </td>
                            <td align="center"><?php echo ($sh) ?></td>
                            <td align="center"><?php echo $doctorshare ?></td>
                            <td align="center"><?php 
							$q1="select sum(NetAmount) as net from opbill where mrno='$bno' and BillDate='$date1'";
							$rs1=mysqli_query($link,$q1) or die(mysqli_error($link));
							$t4=mysqli_fetch_array($rs1);
							$net1=$t4['net'];
							if($net1!=''){ echo $net1;}else{echo $net1=0;}
							
							$total5=$total5+$net1;
							$hs=($net1*$doctorshare)/100;
							$obs=$obs+$hs;
							
							 ?></td>
                            <td align="center"><?php echo ($hs) ?></td>
                            
                            <td align="center"><?php  $tt=$net+$net1;
							$tt1=$tt1+$tt;
							echo $tt;
							
							
							 ?></td>
                            <td align="center"><?php  $ts=$sh+$hs;
							$totshare=$totshare+$ts;
							echo $ts;
							 ?></td>
                          
                           
                        
						</tr>
                       <?php } }?>
					   <tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
							 <td align="center"></td>
                              <td align="center"></td>
                               <td align="center"></td>
                                <td align="center"></td>
                             <td align="center"></td>
                            <td align="center"><b>Total</b></td>
							<?php
							$t1=number_format($total1,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t1 ?></b></td>
                            <?php
							$t2=number_format($opls,2);
							
							?>
                            <td align="center" style="padding-right:20px;"><b><?php echo $t2 ?></b></td>
                            <td align="center" style="padding-right:20px;"></td>
                             <td align="center" style="padding-right:20px;"><b><?php echo number_format($total5,2); ?></b></td>
                              <td align="center" style="padding-right:20px;"><b><?php echo number_format($obs,2); ?></b></td>
                               <td align="center" style="padding-right:20px;"><b><?php echo number_format($tt1,2); ?></b></td>
                              <td align="center" style="padding-right:20px;"><b><?php echo number_format($totshare,2); ?></b></td>
                           
                            
                        
						</tr>
						
						
						
						
						 
						
						
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
			
		
    </body>
</html>
