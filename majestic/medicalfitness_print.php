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
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="self.location='view_medicalfitness.php';"/>
								</div>
<div class="book">
 <div class="page">
        <div class="subpage">
        <?php 
		include('config.php');
		$id=$_REQUEST['id'];
		$q=mysql_query("select * from medicalfitness where mid='$id'") or die(mysql_error());
		$row=mysql_fetch_array($q);
		$pname=$row['pname'];
		$dname=$row['dname'];
		$dname1=$row['dname1'];
		$suffer=$row['suffer'];
		$dname2=$row['dname2'];
			
		 ?>
        <h1 align="center">CERTIFICATE OF MEDICAL FITNESS</h1>
        <div>
        
       <p> Signature of the Applicant <input type="text" value="<?php echo $pname; ?>" class="text-line" /></p>
       <p>&nbsp;&nbsp;I, Dr.<input type="text" value="<?php echo $dname; ?>" class="text-line" />do hereby certify that I</p><p> have carefully examined Sri./Smt.<input type="text" value="<?php echo $dname1; ?>" class="text-line" />of the<input type="text" value="<?php echo $dname2; ?>" class="text-line" style="width:350px;" />who was suffering from</p>
          <p><input type="text" value="<?php echo $suffer; ?>" class="text-line" style="width:250px;" />and whose signature is given above, and find that he/she has recovered form his/her illness and is now fir to resume duties in Government service. I also certify that before arriving at this decision I have examined the original medical certificate(s) and statement(s) of the case (or certified copies thereof) on which leave was granted or extending, and have taken these in consideration in arriving at my decision.</p>
          
        </div>
        <div style="height:20px;"></div>
        <div align="right">MEDICAL OFFICER</div>
        <div>
        <p>Station:</p>
         <p>Date:<?php echo date('d-m-Y'); ?></p>
        </div>
        </div>
        </div>
        </div>
</body>
</html>