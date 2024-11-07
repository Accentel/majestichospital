<?php
include("config.php");

$prdtype = $_REQUEST['prdtype'];
$reporttype = $_REQUEST['reporttype'];

$rtype = $_REQUEST['rtype'];
$batno = $_REQUEST['Batchno'];

$prdnames = $_REQUEST['prdnames'];



	if($rtype == "a"){
		if($reporttype == "All"){
		
			$query=mysql_query("select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.noitems from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$prdtype' and a.product_code=b.PRD_code and a.balance_qty<>0");
		} 
		else if(reporttype.equals("All2")){
			$query=mysql_query("select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.noitems from phr_purinv_dtl as a,phr_prddetails_mast as b where a.product_code='$prdnames' and a.product_code=b.PRD_code and a.balance_qty<>0");
		}
		else{
			$fdate = date('Y-m-d',strtotime($_REQUEST['fdate']));
		$tdate = date('Y-m-d',strtotime($_REQUEST['tdate']));
			
			$query=mysql_query("select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.noitems from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$prdtype' and a.product_code=b.PRD_code AND a.currentdate between '$fdate' and '$tdate' and a.balance_qty<>0");
		}
 
	}
	else if($rtype == "e"){
		if($reporttype == "All"){
			$query=mysql_query("select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.noitems from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$prdtype' and a.product_code=b.PRD_code and a.balance_qty=0");
		}
	else{
			$fdate = date('Y-m-d',strtotime($_REQUEST['fdate']));
		$tdate = date('Y-m-d',strtotime($_REQUEST['tdate']));
			
			 $query=mysql_query("select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.noitems from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$prdtype' and a.product_code=b.PRD_code AND a.exp_date between '$fdate' and '$tdate' and a.balance_qty<>0");
		}
	}
	else{
	if($reporttype == "All"){
		$query=mysql_query("select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.noitems from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$prdtype' and a.product_code=b.PRD_code and a.balance_qty<>0");
	} 
	else if($reporttype == "All2"){
		$query=mysql_query("select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.noitems from phr_purinv_dtl as a,phr_prddetails_mast as b where a.product_code='$prdnames' and a.product_code=b.PRD_code and a.balance_qty<>0");
	}
	else{
		$fdate = date('Y-m-d',strtotime($_REQUEST['fdate']));
		$tdate = date('Y-m-d',strtotime($_REQUEST['tdate']));
		
		$query=mysql_query("select a.product_code,a.product_name,a.packing_type,a.mrp,a.balance_qty,a.batch_no,a.exp_date,a.noitems from phr_purinv_dtl as a,phr_prddetails_mast as b where b.type='$prdtype' and a.product_code=b.PRD_code AND a.currentdate between '$fdate' and '$tdate' and a.batch_no='$batno' and a.balance_qty<>0");
	}
	}

//out.println(query);
?>

<tr><td align="center"><table id="t1" width="100%">
<tr><td valign="top">    <table width="96%" cellpadding="0" cellspacing="0"  id="TABLE1">
              <thead>
              	 <tr>
                             
                                 
                                  <th class="TH1">Prd.Code</th>
                                  <th class="TH1">Prd.Name</th>
                                  <th class="TH1">UOM </th>
								  <th class="TH1">Batch No </th>
								  <th class="TH1">Exp.Dt </th>
                                 
								  <th class="TH1">Cost</th>
								   <th class="TH1">Qty</th>
  </tr>

</thead>

                              


<?php
$xx = 0;
$eachcost = 0;
$fintot = 0;
 if($query){
  while($row = mysql_fetch_array($query))
   {
   $xx++;
      
   $tot=$row[4];  
   $fintot=($fintot+$tot);
   
   $unitcost=$row[3]; 
   $nitem=$row[7];
   $eachcost=round($unitcost/$nitem);

	$eachcost=round(($eachcost*100)/100);
?>   
<tr>
<td height="31" class="TD1"><div align=center><?php echo $row[0] ?></div></td>
		  <td class="TD1"><?php echo $row[1] ?></td>
		  <td class="TD1"><?php echo $row[2] ?></td>
		  <td class="TD1"><?php echo $row[5] ?></div></td>
          <td class="TD1"><?php echo date('d-m-Y',strtotime($row[6])) ?></div></td>
	 	
            <td class="TD1"><?php echo $eachcost ?></div> </td>
			  <td class="TD1"><?php echo $row[4] ?></td>
 <input name="rows"  id="rows" type="hidden"  value=""/>
   </tr>  
 
<?php }
}if($xx==0){ ?>

<td colspan="7" class="style2" align="center"> No Items</td>
<?php } ?>
<?php if($xx!=0){ ?>
 <tr align="right"> <td colspan="7" class="TD1">Total =&nbsp;<?php echo $fintot ?></td></tr>	
 <?php } ?>		
 </table>
<tr> <td colspan="7" align="center">&nbsp;</td>
              <td height="40"></td> </tr>
		