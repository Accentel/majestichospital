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
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="self.location='view_emergency.php';"/>
								</div>
<div class="book">
 <div class="page">
        <div class="subpage">
        <?php 
		include('config.php');
		$id=$_REQUEST['id'];
		$q=mysqli_query($link,"select * from emergencycertificate where eid='$id'") or die(mysqli_error($link));
		$row=mysql_fetch_array($q);
		$pname=$row['pname'];
		$fname=$row['fname'];
		$age=$row['age'];
		$date=$row['date'];
		$time=$row['time'];
		$department=$row['department'];
		$diagnosis=$row['diagnosis'];
		
		 ?>
        <h1 align="center">EMERGENCY ADMISSION CERTIFICATE</h1>
        <div>
        
       <p> This is certify that <input type="text" value="<?php echo $pname; ?>" class="text-line" />S/O,</p>
       <p>W/O,D/O<input type="text" value="<?php echo $fname; ?>" class="text-line" />aged about</p>
         <p><input type="text" value="<?php echo $age; ?>" class="text-line" />admitted  in our hospital in</p>
          <p><input type="text" value="<?php echo $department; ?>" class="text-line" />Department under emergency on</p>
          <p><input type="text" value="<?php echo $date; ?>" class="text-line" style="width:250px;" />at<input type="text" value="<?php echo $time; ?>" class="text-line" style="width:250px;"/> .</p>
          <p>The provisional diagnosis is <?php echo $diagnosis; ?></p>
        </div>
        <div style='height:100px;'></div>
        <div align="right">Signature and designation of the
attending medical authority</div>
        </div>
        </div>
        </div>
</body>
</html>