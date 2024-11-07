<?php //include('config.php');
//include('config2.php');
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

	<body style="margin-top:0px;">

	<div class="book">
     <div class="page">
        <div class="subpage">
       
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF" >
<THEAD>
<tr><td colspan="2"><img src="images/durgatop.png" style="width:100%; height:120px;"/>  </td></tr>
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Doctor Appointment</u></b></h2></td></tr>
  </THEAD>
  </table>
	<?php
include("config2.php");


			$bno = $_REQUEST['id'];
			
			$sql= mysqli_query($link2,"select * from appointment where id='$bno'")or die(mysqli_error($link2));
			if($sql)
			{
				$row = mysqli_fetch_array($sql);
				
				$bdate = date('d-m-Y',strtotime($row['appint_date']));
				$dname = $row['consult_doct'];
				
				$pname = $row['name'];
				$mno = $row['mobile'];
				$age = $row['age'];
				$sex = $row['gender'];
				$address =$row['addr'];
				$cdate = $row['cdate'];
				$time = $row['appint_time'];
				
				
	
			}		
				
		?>
    <table width="80%" style="align:center;" border="0" cellspacing="0" cellpadding="0">
      
             <tr>
          <td ><div align="left">Doctor Name </div></td>
			<td > : <b><?php echo $dname ?></b></td>
            
           
            </tr>
            <tr>
            <td  width="50%"><div align="left">Date of Registration </div></td>
			<td  width="35%"> : <b><?php echo $cdate?></b></td>
            </tr>
            <tr>
            <td  width="50%"><div align="left">Date of Appointment </div></td>
			<td  width="35%"> : <b><?php echo $bdate. " ".$time ?></b></td>
            </tr>
          <tr>
         <tr>
          <td ><div align="left">Patient Name </div></td>
			<td > : <b><?php echo $pname ?></b></td>
            </tr>
            
          <tr>
         
           <td  width="15%"><div align="left">Mobile No. </div></td>
			<td  width="35%"> : <b><?php echo $mno ?></b></td>
           </tr><tr>
            <td ><div align="left">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $sex ?></b></td>
           </tr>
			
			  <tr>
           
            <td ><div align="left">Address </div></td>
			<td > : <b><?php echo $address ?></b></td>
			
          
          </tr>
		  	 
            
			
        
			
			
			
        	
 
 
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="self.location='appointment_reg.php'"/></td>
      </tr>
      
      
      
      
      
      
      
        </table>
        </TBODY>
        
       <div id="footer_wrapper">
  <div id="footer_content">
    <!--<p>24x7 Emergency: *Cardiac  *Neuro  *Paediatric  *General Surgery  *Ortho Poly Trauma Services Available</p>
    <hr />
    <p>Super Bazar,HUZURABAD-505 468,Dist.Karimnagar.*Cell:9441773007, 9959954108,8008036663</p>-->
  </div>
</div>
		  
</div>
</div>
</div>
	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:index.php');

}

?>