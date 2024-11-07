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
	padding-top:42px;
	font:"Times New Roman", Times, serif;
	font-size:14px;
  
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

</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="referalpatientslist.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<div class="book">
    <div class="page">
        <div class="subpage">
        <?php 
include("config.php");
$id=$_GET['id'];

$sql=mysqli_query($link,"select * from referalpatients where id='$id'")or die(mysqli_error($link));
$r=mysqli_fetch_array($sql);


//$doct=$r['registerno'];
$date=$r['date'];
//$doct2=$r['tknum'];
$reason=$r['reason'];
$pname=$r['pname'];
$sex=$r['sex'];
$age=$r['age'];
$mobile=$r['mno'];

$tto=$r['tto'];
$mrno=$r['mrno'];
$tfrom=$r['trom'];
$time=$r['time'];
  
?>



       <table align="center">
<tr><td ><img src="images/durgatop.png" style="width:100%; height:120px;"/></td></tr>
</table>
<hr/>

     <h1 align="center" style="font-size:18px;"><u>PATIENTS TRANSFER</u></h1>   
        <table align="center" cellpadding="2" cellspacing="6">
        <tr>
        <th>MRNO</th><th>:</th><td><?php echo $mrno ?></td>
        </tr>
        <tr>
        <th>PATIENT NAME</th><th>:</th><td><?php echo $pname ?></td>
        </tr>
         <tr>
        <th>MOBILENO</th><th>:</th><td><?php echo $mobile ?></td>
        </tr>
        <tr>
        <th>AGE/SEX</th><th>:</th><td><?php echo $age."/".$sex ?></td>
        </tr>
       
        <tr>
        <th>TRANSFER DATE/TIME</th><th>:</th><td><?php echo $date ." ".$time ?></td>
        </tr>
        <tr>
        <th>TRANSFER FROM</th><th>:</th><td><?php echo $tfrom ?></td>
        </tr>
        <tr>
        <th>TRANSFER TO</th><th>:</th><td><?php echo $tto ?></td>
        </tr>
         <tr>
        <th>Reasonfor Transfer/<br/>Discharge/Lama</th><th>:</th><td><?php echo $reason ?></td>
        </tr>
        </table>
        
        </div>    
    </div>
    
</div>

</body>
</html>