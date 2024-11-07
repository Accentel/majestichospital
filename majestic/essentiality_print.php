<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Header & Footer test</title>
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
	padding-top:120px;
	font:"Times New Roman", Times, serif;
	font-size:12px;
  
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
 .text-line {
        background-color: transparent;
        color: #000;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid red 1px;
        padding: 3px 10px;
		width:450px;
    }
</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="self.location='view_essentiality.php';"/>
								</div>
<div class="book">
 <div class="page">
        <div class="subpage">
        <?php 
		include('config.php');
		$id=$_REQUEST['id'];
		$q=mysqli_query($link,"select * from essentiality where id='$id'") or die(mysqli_error($link));
		$row=mysqli_fetch_array($q);
		$pname=$row['pname'];
		$fname=$row['fname'];
		$emp=$row['emp'];
		$suffer=$row['suffer'];
		
		$fdate=$row['fdate'];
		$tdate=$row['tdate'];
		$hospital=$row['hospital'];
		$hospital1=$row['hospital1'];
		 ?>
        <h1 align="center">ESSENTIALITY CERTIFICATE</h1>
        <div>
        
       <p> I Certify that Mrs. / Mr. / Miss <input type="text" value="<?php echo $pname; ?>" class="text-line" style="width:300px;" />Wife / Son /Daughter</p>
       <p>of Mr/Mrs<input type="text" value="<?php echo $fname; ?>" class="text-line" />employed in the</p>
       
          <p><input type="text" value="<?php echo $emp; ?>" class="text-line" style="width:450px;" />has been under my treatment
           for</p><p><input type="text" value="<?php echo $suffer; ?>" class="text-line" style="width:250px;" />diseases from
         <input type="text" value="<?php echo $fdate; ?>" class="text-line" style="width:100px;"/>to<input type="text" value="<?php echo $tdate; ?>" class="text-line" style="width:100px;"/>.at</p>
         <p><input type="text" value="<?php echo $hospital; ?>" class="text-line" style="width:250px;"/>Hospital / my consulting room and that the under mentioned</p>
<p>medicine prescribed by me in this connection were essential for the recovery / prevention of serious</p>
<p> deterioration the condition of the patient . The Medicines are not stocked in the</p>
<p><input type="text" value="<?php echo $hospital1; ?>" class="text-line" style="width:250px;"/>Hospital ( for supply to patients) and do not include proprietary</p>
<p>preparations for which cheaper substance of equal therapeutic value are available or
preparations which are primarily foods, toilets of disinfectants.</p>          
          
        </div>
        <div style="height:20px;"></div>
        <div>
        <table width="400" align="center">
        <tr>
        <th>Name of the Medicine</th>
        <th>Price</th>
        </tr>
        <?php 
		$p=mysqli_query($link,"select * from essentiality1 where id1='$id'") or die(mysqli_error($link));
		while($rs=mysqli_fetch_array($p)){?>
			<tr>
        <td align="center"><?php  echo $rs['medicine'];?></td>
        <td align="center"><?php  echo $rs['price'];?></td>
        </tr>
		<?php	}
		?>
        
        </table>
        
        </div>
        <div style="height:50px;"></div>
        <div align="right" style="padding-right:25px;"><b>Signature and Designation of Authorized Medical Attendant</b></div>
<div align="right"><b>Signature of the Medical Officer in charge in the case of the hospital</b></div>
        <div>
        
        </div>
        </div>
        </div>
        </div>
</body>
</html>