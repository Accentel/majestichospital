<?php
include("config.php");
$dast1=$_REQUEST['dast'];
$dast=date('Y-m-d',strtotime($dast1));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link rel="stylesheet" type="text/css" href="../css/table_style.css" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />
<script type="text/javascript" src="../js/tableruler.js"></script>
<script type="text/javascript">window.onload=function(){tableruler();}</script>
<script language="JavaScript" src="../js/gen_validatorv31.js" type="text/javascript"></script>
<title>Pharmacy</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.heading1 {	font-size:20px;
	text-align:center;
        font-family: "Lucida Calligraphy";
}
.heading2 {	font-size:14px;
	text-align:center;
        font-family: "Times New Roman";
}
.heading3 {
    border-bottom: 2px solid #999999;
}
.TD2 {
	BORDER-RIGHT: #000000 1px solid;
        BORDER-TOP: #000000 1px solid; 
        BORDER-LEFT: #000000 1px solid; 
        BORDER-BOTTOM: #000000 1px solid; 
        BORDER-COLLAPSE: collapse; 
        padding-left:4px;
        padding-top:2px;
        padding-bottom:2px;
}
-->
</style>
<script type="text/javascript">
function printWindow(){
	
	document.getElementById("submit1").style.display='none';
	document.getElementById("submit2").style.display='none';
	window.print();	
	}
	function fun(){
	window.close();
	}
</script>

</head>
<body>
<?php
include("config.php");

$rs=mysql_query("select * from  pharmacydetaisl");
while($res = mysql_fetch_array($rs)){
$HOSP_NAME=$res['pharmacyname'];
$ADDR=$res['address'];     
     
$PHONE1=$res['phoneno'];

 }



?>


<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
            <td width="100%">
                <table align="center" width="75%" border="0" cellpadding="0" cellspacing="0" >
					<tr><td>&nbsp;</td></tr>
				  <tr>
					<td class="heading1"><?php echo $HOSP_NAME ?></td>
				  </tr>
				  <tr>
					<td class="heading2"> <?php echo $ADDR ?></td>
				  </tr>
				  <tr>
					<td class="heading2">Ph : <?php echo $PHONE1 ?></td>
				  </tr>
				</table>
            </td>
    </tr>
</table>
<p>&nbsp;</p>


<div align="center">

    <table width="95%" border="1" style="font-family: arial;font-size: 12px" cellpadding="4" cellspacing="0">
      <tr><td colspan=7><div align="center"><strong><?php echo $dast1 ?> Sales Entry Report</strong></div></td></tr>
 
<tr>
  <td><strong>Sno</strong></td>
  <td><strong>Date</strong></td>
  <td width="18%"><strong>Patient Name</strong></td>
  <td width="20%"><strong>Prd.Name</strong></td>
  <td width="15%"><strong>BatchNo</strong></td>
  <td><strong>Qty</strong></td>
  <td><strong>Value</strong></td>
  </tr>
<?php
                   
$rec1=$_REQUEST['rec'];
$dat1=$_REQUEST['dat'];
$pname1=$_REQUEST['pname'];
$prnam1=$_REQUEST['prnam'];
$bat1=$_REQUEST['bat'];
$qty1=$_REQUEST['qty'];
$val1=$_REQUEST['valu'];
$tot=$_REQUEST['tot'];
?>
<?php if($tot==0){ ?>
<tr>
    <td colspan="7" >No Records</td>
</tr>
<?php }else{ 
for($j=0;$j< count($dat1);$j++){
?>
  <tr>
      <td class="TD2"><?php echo ($j+1)."<br><br>"; ?></td>
      <td class="TD2"><?php echo $dat1[$j]."<br><br>"; ?></td>
      <td class="TD2"><?php echo $pname1[$j]."<br><br>"; ?></td>
      <td class="TD2"><?php echo $prnam1[$j]."<br><br>"; ?></td>
      <td class="TD2"><?php echo $bat1[$j]."<br><br>"; ?></td>
      <td class="TD2"><?php echo $qty1[$j]."<br><br>"; ?></td>
      <td class="TD2"><?php echo $val1[$j]."<br><br>"; ?></td>

    </tr>
<?php } ?>	
    <tr><td colspan="6" align="right"><b>Grand Total :&nbsp;</b></td><td><?php echo $tot ?></td></tr>  

<?php } ?>
 <?php 

$rs1=mysql_query("select date_format(total_date,'%Y-%m-%d') from z_gran_tot where total_date='$dast'");

while($res1 = mysql_fetch_array($rs1))
{
$total_dat=$res1[0];

}     
 if($total_dat == $dast)
 {
     $sql =mysql_query("update z_gran_tot set grand_total=$tot where total_date='$dast'");
 }
else
{
    $sql =mysql_query("insert into z_gran_tot values('$dast',$tot)");
   
}
?>					
   
  </table>
   <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td>&nbsp;</td>
               
              </tr>
            </table></td>
          </tr>
    <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td>
                  <div align="right">
                    <input type="button" value="Print" id="submit1" onclick="javascript:printWindow()"  />
                </div></td>
					 <td>
                       <div align="left">
                         <input type="button" value="Close" id="submit2" onclick="fun()"  />
                     </div></td>
              </tr>
            </table></td>
          </tr>
</div>
</body>
</html>