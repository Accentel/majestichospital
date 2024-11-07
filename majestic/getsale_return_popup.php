<?php
include("config.php");
$emp_id = $_REQUEST['emp_id'];
$query = mysqli_query($link,"select a.cust_name,a.billing_type,a.inv_no,a.sales_type,a.sal_date,a.total,a.discount,sum(b.value) from phr_salent_mast as a ,phr_salent_dtl as b  where a.lr_no=b.lr_no and  a.lr_no='$emp_id' group by a.lr_no ");
$cust_type="c";
while($rss = mysqli_fetch_array($query))
{
     $cust_name=$rss[0];
	 $rs2=mysqli_query($link,"select patientname,registerno from patientregister where registerno='$cust_name'");
		while($rs1 = mysqli_fetch_array($rs2)){ $cust_name=$rs1[0];$cust_type="p"; $pat_no=$rs1[1];}

	 $bill_type=$rss[1];
     $inv_no=$rss[2];
     $sales_type=$rss[3];
     $sal_date=date('d-m-Y',strtotime($rss[4]));
	 $total_amt=$rss[5];
     $discount=$rss[6];
	 $total1=$rss[7];
	
	
    }
$data = ":".$cust_name.":".$bill_type .":".$inv_no.":".$sales_type.":".$sal_date.":".$total_amt.":".$discount.":".$total1.":";

echo $data;

?>
<?php
$rs=mysqli_query($link,"select count(*) from phr_salent_mast as a,phr_salent_dtl as b where a.lr_no='$inv_no' and a.lr_no=b.lr_no ");
$count=0;
while($rw = mysqli_fetch_array($rs)){
$count=$rw[0];

}

$res=mysqli_query($link,"select a.product_code,b.product_name,b.batch_no,b.mfg_date,b.exp_date,a.u_qty,a.u_rate,a.value,balance_qty,b.inv_id from phr_salent_dtl as a,phr_purinv_dtl as b where a.inv_id=b.inv_id and a.lr_no='$emp_id'");
?>

<tr><td><table id="t1" width="100%">
<tr><td align="center">    <table width="70%"  id="TABLE1">
              <thead>
              	 <tr>
                             
                                 
                                  <th class="TH1">P.Code</th>
                                  <th class="TH1">P.Name</th>
								  <th class="TH1">Batch No.</th>
								  <th class="TH1">T.Qty</th>
                                  <th class="TH1">MFG.Dt</th>
								  <th  class="TH1">EXP.Dt</th>
                                  <th class="TH1">PQty </th>
								  <th class="TH1">RQty </th>
                                  <th class="TH1">URate</th>
                                  <th class="TH1">Value</th>
                                  

 
   
  </tr>

</thead>

                              



<!-------------------------------new code----------------------------------------------------------------------------------------------->
<?php
$m=1;

   while($row = mysqli_fetch_array($res))
   {
    
?>
<tr>
        <td>
		   <div align="center"><input name="pcode<?php echo $m ?>" id="pcode<?php echo $m ?>" type="text" class='textbox1' size="8" value="<?php echo $row[0] ?>" readonly ></div>
		 </td>
		 <td>
		   <div align="center"><input  name="pname<?php echo $m ?>" id="pname<?php echo $m ?>" type="text" class='textbox1' size="12" value="<?php echo $row[1] ?>" readonly></div>
		 </td>
		 <td>
		   <div align="center"><input  name="batchno<?php echo $m ?>" id="batchno<?php echo $m ?>" type="text" class='textbox1' size="12" value="<?php echo $row[2] ?>" readonly></div>
		 </td>
		 <td>
		   <div align="center"><input name="qty<?php echo $m ?>" id="qty<?php echo $m ?>" type="text" class='textbox1' size="5" value="<?php echo $row[8] ?>" readonly></div>
		 </td>
		 <td >
		   <div align="center"> <input name="mfg<?php echo $m ?>" id="mfg<?php echo $m ?>" type="text" size="8" class='textbox1' value="<?php echo date('d-m-Y',strtotime($row[3])) ?>" readonly  ></div>
		 </td>
		 <td>
		   <div align="center"> <input  name="exp<?php echo $m ?>" id="exp<?php echo $m ?>" type="text" size="8" class='textbox1' value="<?php echo date('d-m-Y',strtotime($row[4])) ?>"  readonly align="right"></div>
		 </td>
         <td >
		   <div align="center"> <input name="uqty<?php echo $m ?>" id="uqty<?php echo $m ?>" readonly type="text" size="5" class='textbox1' value="<?php echo $row[5] ?>"    ></div>
		 </td>
		 <td >
		   <div align="center"> <input name="rqty<?php echo $m ?>" id="rqty<?php echo $m ?>" type="text" size="5" class='textbox1' value="0" onkeyup="val(this.value,<?php echo $row[8] ?>,<?php echo $m ?>,<?php echo $row[7] ?>,<?php echo $row[6] ?>);"/></div>
		 </td>
		 <td>
		   <div align="center"> <input  name="urate<?php echo $m ?>" id="urate<?php echo $m ?>" type="text" size="5" class='textbox1' value="<?php echo $row[6] ?>"  readonly align="right"></div>
		 </td>
         <td >
		   <div align="center"> <input name="value<?php echo $m ?>" id="value<?php echo $m ?>" readonly type="text" size="4" class='textbox1'value="<?php echo $row[7] ?>"   ></div>
		 </td>
		
		   <div align="center"><input type="hidden" name="noitems<?php echo $m ?>" id="noitems<?php echo $m ?>"  class='textbox1' size="5" value="<?php echo $row[8] ?>" readonly></div>
		 
		 
		    
		 
		   <div align="center"> <input type="hidden" name="inv_id<?php echo $m ?>" id="inv_id<?php echo $m ?>" class='textbox1' size="5" value="<?php echo $row[9] ?>"  readonly align="right"></div>
		 
  <input name="rows"  id="rows" type="hidden"  value="<?php echo $m ?>"/>
   
<?php 
$m++;
 
   }//while ?>
			  
</tr>                            
                             
<!------------------------------END -newcode--------------------------------------------------------------------------------------->                       
                         

                                      </table>

		&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;
<tr>


				<td> <input name="hidden" type="hidden" id="htnDcode" />
                    <input type="hidden" id="htncount" name="htncount"  value="1"/>
                    <input type="hidden"  id="htncount" name="count" value="<?php echo $m ?>"/>
                    <input type="hidden"  id="htnt" name="str">
                    <input type="hidden"  id="m" name="m" value="<?php echo $m ?>"/>
                  
                                </td>
              <td colspan="7" align="center">&nbsp;</td>
              <td height="40"><input name="cust_type"  id="cust_type" type="hidden"  value="<?php echo $cust_type ?>"/><input name="pat_no"  id="pat_no" type="hidden"  value="<?php echo $pat_no ?>"/></td>
                                </tr>
		
</body>
</html>

