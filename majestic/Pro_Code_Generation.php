<?php
include("config.php");

$procount=0;
	     
$itemname=$_REQUEST['qparam'];
$prd_name=$_REQUEST['qparam'];
$tcode=$_REQUEST['qparam1'];
$tcode;                
$itemname=strtoupper(substr($itemname,0,1));   
                
$itemcode=0;
      			
	$sql = mysql_query("select count(*) from phr_prddetails_mast where prd_name='$prd_name'");
	while($row = mysql_fetch_array($sql)){
		$procount=$row[0];
	}
						
	$sql1 =mysql_query("select rep from phr_prdtype_mast where prdtype_code='$tcode'");
	while($row1 = mysql_fetch_array($sql1)){ $tshrtname=$row1[0]; }
	$icode=$tshrtname.$itemname;
	
	$sql2 = mysql_query("SELECT  max(substr(prd_code,4,4)) FROM phr_prddetails_mast WHERE SUBSTR(prd_code,1,3)= UPPER('$icode')");
	while($row2 = mysql_fetch_array($sql2)){ $itemcode = $row2[0]; $itemcode=$itemcode+1; }

//concating itemname for maxno////////////////////////////
        
	  if($itemcode>=1 && $itemcode<=9){
		 $s=$icode."000";
		 $ss=$itemcode;
		 $sss=$s.$ss;
		
	  }
	  else if($itemcode>=10 && $itemcode<=99){
		$s=$icode."00";
		 $ss=$itemcode;
		 $sss=$s.$ss;
		
	  }
	  else if($itemcode>=100 && $itemcode<=999){
		$s=$icode."0";
		 $ss=$itemcode;
		 $sss=$s.$ss;
		
	  }
	//out.println("sss-->"+sss); 
////////////////////////////////////////////////////////////////
if($procount == 1)
{ ?><label id="aa">Product Name is Already Existed</label><?php }else{ ?>
 <td class="label">Product Code:</td>
<td><input name="prdcode" type="text" class="text" readonly  value="<?php echo $sss ?>"/> </td>
<?php } ?>

		
		
		