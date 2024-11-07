<?php
include("config.php");

$sdate=$_GET['sdate'];
 $refdoct=$_GET['refdoct'];
 $sdate1=date('Y-m-d',strtotime($sdate));
// $edate1=date('Y-m-d',strtotime($edate));
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Patients Report</title>
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
include("config.php");
$k=mysql_query("select * from doct_infor where id='$refdoct'") or die(mysql_error());
$s=mysql_fetch_array($k);
 $dname=$s['dname1'];
?>
<table >
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>


</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Dr.<?php echo $dname."(".$sdate.")"; ?>  Patients List</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Patient Name</b></td>
                            
                             <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Sex</b></td>
							<td align="center"><b>Address</b></td>
                            
                           
                            
							
                            
							
						</tr>
                        <?php
						
                     
						$qry=mysql_query("SELECT a.aid,a.dname,a.adate,a.pname,a.mno,a.age,a.sex,a.address,a.user,a.cdate,b.id,b.dname1 FROM dappointment a,doct_infor b where  a.dname=b.id   and a.dname='$refdoct' and a.adate='$sdate1' order by a.aid desc");
						if($qry){
						$i=0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 
							 
							 $pname = $res['pname'];
							 $mobile = $res['mno'];
							 $address = $res['address'];
							 $age = $res['age'];
							 $sex = $res['sex'];
							 
							
							  
							
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $pname ?></td>
                              <td align="center"><?php echo $mobile ?></td>
                            <td align="center"><?php echo $age."/".$sex; ?></td>
                             <td align="center"><?php echo $address ?></td>
                             
                            
                           
                          
                           
                        
						</tr>
                       <?php } }?>
					   
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
	<!--<tr>
	<td align="right"><img src="images/images.png"/></td>
	</tr>
-->
<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
    </body>
</html>
