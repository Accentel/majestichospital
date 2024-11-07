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
        <script>
		$(document).on('keyup ','.changesNo2',function(){
	//alert($(this).attr('data-row'))
	id = $(this).attr('data-row');
	//id = id_arr.split("_");
	//alert(id);
	totsha = $('#totsha'+id).val();
	//alert(quantity);
	paid = $('#paid'+id).val();
		//alert(price);
	 $('#bal'+id).val( (parseFloat(totsha)-parseFloat(paid)).toFixed(2) );
//alert($('.pamnt').val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) ));	
	calculateSum();
	calculateSum1();
});



function calculateSum(){
var sum=0;
$(".changesNo2").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#totpaid").val(sum.toFixed(2));

}
function calculateSum1(){
var sum1=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum1+=parseFloat(this.value);
}});
$("#totbal").val(sum1.toFixed(2));
}






</script>  

<script>
		$(document).on('keyup ','.changesNo5',function(){
	//alert($(this).attr('data-row'))
	id = $(this).attr('data-row');
	//id = id_arr.split("_");
	//alert(id);
	totsha1 = $('#share1'+id).val();
	//alert(totsha1);
	paid1 = $('#totpaid1'+id).val();
		//alert(paid1);
	 $('#totbal1'+id).val( (parseFloat(totsha1)-parseFloat(paid1)).toFixed(2) );
//alert($('.pamnt').val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) ));	
	calculateSum2();
	calculateSum3();
});



function calculateSum2(){
var sum=0;
$(".changesNo5").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#totippaid").val(sum.toFixed(2));

}
function calculateSum3(){
var sum1=0;
$(".txt5").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum1+=parseFloat(this.value);
}});
$("#totipbal").val(sum1.toFixed(2));
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
if(isset($_POST['submit'])){
$sdate=$_POST['fdate'];
 $edate=$_POST['tdate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 
$refdoct=$_POST['refdoct'];
	$q=mysqli_query($link,"select * from  referal_doctor where refcode='$refdoct'") or die(mysqli_error($link));
							
							$kt=mysqli_fetch_array($q);
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
                            <td align="left"><input type="text" name="fromdate" value="<?php echo $sdate?>" style="width:70px;" readonly="readonly"/> </td>
                            <td align="right" colspan="11" style="text-align:center"><input type="text" name="refname" value="  <?php echo "Dr.".$ref_docname1; ?>" readonly="readonly"/><input type="hidden" name="refdocname" value="  <?php echo $refdoct; ?>" readonly="readonly"/> </td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><input type="text" name="todate" value="<?php echo $edate?>" style="width:70px;" readonly="readonly"/></td>
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
						
						$ts1="select * from patientregister where ref_doc='$refdoct' and date between '$sdate1' and '$edate1'";
					/*$ts1="select distinct a.registerno,a.gender,a.tokenno,a.patientname,a.pat_type,a.age,a.total,a.phoneno,a.ref_doc,a.date,b.ref_docname,b.refcode,b.doctorshare from patientregister a,referal_doctor b where  a.pat_type='OP' and  a.ref_doc=b.refcode and a.ref_doc='$refdoct' and a.date between '$sdate1' and '$edate1' order by a.registerno asc";*/
						$qry=mysqli_query($link,$ts1) or die(mysqli_error($link));
						if($qry){
						$i=0;
						$total1=0;
						$share5=0;
						$ops=0;
						$ops2=0;
						$opl=0;
						$tst=0;
						$oplabs=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $bno = $res['registerno'];
							 $pname = $res['patientname'];
							 $phoneno=$res['phoneno'];
							 $age = $res['age'];
							 $sex = $res['gender'];
							 $tokenno = $res['tokenno'];
							 $ptype = $res['pat_type'];
							 $doctorshare= $res['doctorshare'];
							 $total = $res['total'];
							 $total1=$total1+$total;
							 $date1 = $res['date'];
							 $ref_docname=$res['ref_docname'];
							
							
							$date=date('d-m-Y',strtotime($date1));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><input type="text" name="mrno[]" value="<?php echo $bno ?>" style="width:70px;" readonly="readonly"/></td>
                              <td align="center"><input type="text" name="pname[]" value="<?php echo $pname ?>" readonly="readonly"/></td>
                            <td align="center"><input type="text" name="pno[]" value="<?php echo $phoneno ?>" style="width:80px;" readonly="readonly"/></td>
                            <td align="center"><input type="text" name="age[]" value="<?php echo $age."/".$sex ?>" style="width:70px;" readonly="readonly"/></td>
                            
                               <td align="center"><input type="text" name="date[]" value="<?php echo $date ?>" style="width:70px;" readonly="readonly"/></td>
                          <td align="center"><input type="text" name="ptype[]" value="<?php echo $ptype."/". $tokenno ?>" style="width:70px;" readonly="readonly"/></td>
                          <td align="center"><?php
						  $k=mysqli_query("select sum(NetAmount) as amt1 from  bill1 where mrno='$bno' and ptype='OP'  and BillDate between '$sdate1' and '$edate1'") or die(mysqli_error());
							
							$ks1=mysqli_fetch_array($k);
							
							 $t1=$ks1['amt1'];
							if($t1!=0){ ?>
							<input type="text" name="oplabamount[]" style="width:80px;" value="<?php echo $t1=$ks1['amt1'];?>" />
						<?php	}else{
								echo  $t1=0;
								}
							$opl=$opl+$t1;
							
					
							
							 ?>
                          
                          
                          </td>
                          <td>
                           
						<input type="text" name="oplabshareamount[]" style="width:80px;" value="<?php echo $oplabs1=($oplabshare1*$t1)/100;
				?>"/>	<?php	  $oplabs=$oplabs+$oplabs1;
						  
						  ?>
                          
                          </td>
                          
                          
                          
                            <td align="center"><?php 
							$k=mysqli_query($link,"select sum(NetAmount) as amt from  opbill where mrno='$bno'") or die(mysqli_error($link));
							
							$ks=mysqli_fetch_array($k);
							
							 $t5=$ks['amt'];
							if($t5!=0){?>
							<input type="text" name="opcashamount[]" style="width:80px;" value="<?php echo $t5=$ks['amt'];?>"/>
							<?php }else{?>
							<input type="text" name="opcashamount[]" style="width:80px;" value="<?php echo  $t5=0;?>"/>
							<?php	}
							$ops=$ops+$t5;
							
							 ?></td>
                             <td>
                            
							
							<input type="text" name="opcashshareamount[]" style="width:80px;" value=" <?php echo $ops1=($t5*$doctorshare1)/100;?>"/>
							
							
							
							<?php
							 
							 $ops2=$ops2+$ops1;
							   ?>
                                         
                             </td>
                             <td align="center"><input type="text" name="totamt[]" style="width:80px;"  value="<?php echo $st=
							  $t1+$t5;?>"/>
							 <?php
							 $tst=$tst+$st;
							  ?></td>
                            
                            <td align="center"><input type="text" name="totsha[]" data-row="<?php echo $i; ?>" id="totsha<?php echo $i; ?>" style="width:80px;" value="<?php echo $shaream= $oplabs1+$ops1;?>"/>
							<?php
							$share5=$share5+$shaream;
							
							?> </td>
                               
                          
                           <td><input type="text" name="paid[]"  id="paid<?php echo $i; ?>" class=" changesNo2" data-row="<?php echo $i; ?>" style="width:70px;" /></td>
                           <td><input type="text" name="bal[]" id="bal<?php echo $i; ?>"  data-row="<?php echo $i; ?>" class="txt" style="width:70px;" /></td>
                        
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
							<?php
							$t1=number_format($opl,2);
							$ops1=number_format($ops,2);
							
							$tt1=number_format($tst,2);
							$share11=number_format($share5,2);
							?>
                            <td align="center" style="padding-right:20px;"><input type="text" name="totoplab" style="width:80px;" value="<?php echo $t1 ?>"/></td>
                     <td> <input type="text" name="totoplabshare" style="width:80px;" value="<?php echo number_format($oplabs,2); ?>"/></td>
          <td align="center" style="padding-right:20px;"><input type="text" name="totopcash" value="<?php echo $ops1 ?>" style="width:80px;"/></td>
                           <td><input type="text" name="totopcashshare" value="<?php echo number_format($ops2,2); ?>" style="width:80px;"/></td>
                            <td align="center" style="padding-right:20px;"><input type="text" name="optot" style="width:80px;" value="<?php echo $tt1 ?>"/></td>
                            <td align="center" style="padding-right:20px;"><input type="text" name="opshare" id="opshare" value="<?php echo $share11 ?>" style="width:80px;"/></td>
                            <td align="center" style="padding-right:20px;"><input type="text" name="totpaid" value="0"  style="width:80px;" id="totpaid"/></td>
                            <td align="center" style="padding-right:20px;"><input type="text" name="totbal" style="width:80px;" id="totbal"/></td>
                            
                        
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
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="8" style="text-align:center">Dr. <?php echo $ref_docname1; ?></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
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
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
					//$ts1="select distinct a.registerno,a.gender,a.tokenno,a.patientname,a.pat_type,a.age,a.total,a.phoneno,a.ref_doc,a.date,b.ref_docname,b.refcode,b.doctorshare,c.netamt from patientregister a,referal_doctor b,final_bill c,ip_pat_admit d	 where  c.PatientMRNo=a.registerno and  d.PAT_REGNO=c.PatientMRNo and d.DIS_STATUS='Discharged' and a.ref_doc=b.refcode and a.ref_doc='$refdoct' and c.AdmissionDate between '$sdate1' and '$edate1' order by a.registerno asc";
					$ts2="select a.BILL_DATE,a.PatientNo,a.PatientMRNo,a.PatientName,a.netamt,a.Age,a.Sex,a.AdmissionDate,a.DischargeDate,b.phoneno,b.registerno,b.ref_doc,b.pat_type,b.tokenno from final_bill a,patientregister b where a.PatientMRNo=b.registerno and b.ref_doc='$refdoct' and a.AdmissionDate between '$sdate1' and '$edate1' ";
					//$ts1="select * from final_bill where BILL_DATE between '$sdate1' and '$edate1'";
						$qry=mysqli_query($link,$ts2) or die(mysqli_error($link));
						if($qry){
						$i=0;
						$total2=0;
						$share6=0;
						$ops=0;
						$opl=0;
						$tst=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $bno = $res['PatientMRNo'];
							 $pname = $res['PatientName'];
							 $phoneno=$res['phoneno'];
							 $age = $res['Age'];
							 $sex = $res['Sex'];
							 $tokenno = $res['tokenno'];
							 $ptype = $res['pat_type'];
							 $doctorshare= $res['doctorshare'];
							 $total = $res['netamt'];
							 $total2=$total2+$total;
							 $date1 = $res['AdmissionDate'];
							 $date2 = $res['DischargeDate'];
							$tokenno = $res['tokenno'];
							
							
							$date=date('d-m-Y',strtotime($date1));
							$date3=date('d-m-Y',strtotime($date2));
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><input type="text" style="width:80px;" readonly="readonly" name="mrno1[]" value="<?php echo $bno ?>"/></td>
                              <td align="center"><input type="text" style="width:80px;" readonly="readonly" name="pname1[]" value="<?php echo $pname ?>"/></td>
                            <td align="center"><input type="text" style="width:80px;" readonly="readonly" name="mno1[]" value="<?php echo $phoneno ?>"/></td>
                            <td align="center"><input type="text" style="width:80px;" readonly="readonly" name="age1[]" value="<?php echo $age."/".$sex ?>"/></td>
                            
                               <td align="center"><input type="text" style="width:80px;" readonly="readonly" name="adate1[]" value="<?php echo $date ?>"/></td>
                          <td align="center"><input type="text" style="width:80px;" readonly="readonly" name="ptype1[]" value="<?php echo $ptype."/".$tokenno ?>"/></td>
                          <td align="center"><input type="text" style="width:80px;" readonly="readonly" name="ddate1[]" value="<?php echo $date3 ?>"/></td>
                          <td align="center"><input type="text" style="width:80px;" readonly="readonly" name="ttotal[]" value="<?php echo $total ?>"/></td>
                            
                            
                            <td align="center"><?php
							//$p=$t+$t1;
							 $share2=($total*$doctorshare1)/100;
							
							?>
							<input type="text" style="width:80px;" readonly="readonly" data-row="<?php echo $i; ?>" name="share1[]" value="<?php echo $share2; ?>" id="share1<?php echo $i; ?>"/>
							<?php
							 
							 $share6=$share6+$share2;
							   ?> </td>
                          
                          <td align="center" style="padding-right:20px;"><input type="text" name="totpaid1[]" class=" changesNo5" data-row="<?php echo $i; ?>" value="0"  style="width:80px;" id="totpaid1<?php echo $i; ?>"/></td>
                            <td align="center" style="padding-right:20px;"><input type="text" data-row="<?php echo $i; ?>" name="totbal1[]" style="width:80px;" id="totbal1<?php echo $i; ?>" class="txt5"/></td>
                        
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
							<?php
							
							$total1=number_format($total2,2);
							
							
							$share11=number_format($share6,2);
							?>
                            
                            <td align="center" style="padding-right:20px;"><b><input type="text" name="totiptot" value="<?php echo $total2 ?>"/></b></td>
                            <td align="center" style="padding-right:20px;"><b><input type="text" name="totipshare" value="<?php echo $share11 ?>"/></b></td>
                            <td align="center" style="padding-right:20px;"><b><input type="text" name="totippaid" value="0" id="totippaid"/></b></td>
                            <td align="center" style="padding-right:20px;"><b><input type="text" name="totipbal" value="0" id="totipbal"/></b></td>
                            
                        
						</tr>
						
						
						
						
						 
					   
						
						
						
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 




<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="submit" name="submit" value="Save"  class="butbg" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
        <?php }
							
}?>


</form>
		
		
		
		
			

			
		
			
       
			
		
			
			
			

	
    </body>
</html>
<?php }?>