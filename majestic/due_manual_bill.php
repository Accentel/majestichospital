<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
$name=$_SESSION['name1'];

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#bno").autocomplete("set7.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script>
<script>
function showHint(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	//alert(strar);
	document.getElementById("bdate").value=strar[1];
	document.getElementById("pname").value=strar[2];	
	document.getElementById("age").value=strar[3];
    document.getElementById("gender").value=strar[4];
	document.getElementById("dname").value=strar[5];
	document.getElementById("tot").value=strar[6];	
	document.getElementById("conamt").value=strar[7];
    document.getElementById("price").value=strar[8];
	document.getElementById("paid").value=strar[9];
	document.getElementById("bal").value=strar[10];	
	document.getElementById("invgtable").innerHTML=strar[11];
    
    }
  }
xmlhttp.open("GET","search.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function paidamt(){
var bal = document.getElementById("bal").value;
var cdue = document.getElementById("cdue").value;
if(parseFloat(cdue) > parseFloat(bal)){
	alert("Due Amount not greater than balance");
	document.getElementById("cdue").focus();
}if(parseFloat(cdue) <= parseFloat(bal)){
var rbal = parseFloat(bal)-parseFloat(cdue);
document.getElementById("rbal").value=rbal;
}
}
</script>	
	</head>

	<body>

  
	<div id="conteneur">

		  <?php
				include("logo.php");
			  ?>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" style="height:auto;">
		<?php
		$q=$_REQUEST['id'];
		$sql="select *  FROM manual_bill WHERE BILL_NO = '$q' ";
//$sql="SELECT * FROM bill WHERE BillNO = '$q'";
$result = mysqli_query($link,$sql)or die(mysqli_error($link));
if($result){
	$row = mysqli_fetch_array($result);
	$b=$row['BILL_NO'];
	 $date=date('d-m-Y',strtotime($row['BILL_DATE']));
	 $PatientMRNo=$row['PatientMRNo'];
	$age=$row['Age'];
	$gender=$row['Sex'];
	$doctr=$row['ConsultDoctor'];
	$PatientNo=$row['PatientNo'];
	$disc=$row['totconsession'];
	$PatientName=$row['PatientName'];
	$paid=$row['totpaid'];
	$bal=$row['totdue'];
	$totamt=$row['totamt'];
	
}
?>
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">MHS Due Bill</div>
		  <form name="frm" method="post" action="insert_due_manualbill.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                                <tr >
                        <td align="right" >UMR No. :</td>
                        <td align="left" >
                            <input type="text" name="mrno" value="<?php echo $PatientMRNo; ?>" id="mrno" class="text" />
                        </td>
						 <td align="right" >Final Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" id="bdate" style="width:188px;height:20px;" value="<?php echo date('d-m-Y',strtotime($date)); ?>" readonly class="tcal"/>
                        </td>
                    </tr> 
                    <tr >
                        <td align="right" >Patient No. :</td>
                        <td align="left" >
                            <input type="text" name="pno" value="<?php echo $PatientNo; ?>" id="pno" class="text" onfocus="showHint(this.value)"/>
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate1" id="bdate1" style="width:188px;height:20px;" value="<?php echo date('d-m-Y'); ?>" readonly class="tcal"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
                            <input type="text" name="pname" readonly id="pname" class="text" value="<?php echo $PatientName; ?>"/><input type="hidden" name="user" value="<?php echo $name ?>"/>
                        </td>
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" name="age" readonly id="age" class="text" value="<?php echo $age; ?>"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Gender :</td>
                        <td align="left" >
                            <input type="text" name="gender" readonly id="gender" class="text" value="<?php echo $gender; ?>"/>
								
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <input type="text" readonly name="dname" id="dname" class="text" value="<?php echo $doctr; ?>"/>
							
                        </td>
                    </tr>
                     
					<tr >
                        <td align="right" >Total Amount :</td>
                        <td align="left" >
                            <input type="text" name="tot" readonly  id="tot" class="text" value="<?php echo $totamt; ?>"/>
                        </td>
						 <td align="right" >Discount :</td>
                        <td align="left" >
                            <input type="text" name="conamt" readonly  id="conamt" class="text" value="<?php echo $disc; ?>"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Net Amount :</td>
                        <td align="left" >
                            <input type="text" name="price" readonly  id="price" class="text" value="<?php echo $totamt; ?>"/>
                        </td>
						 <td align="right" >Paid Amount :</td>
                        <td align="left" >
                            <input type="text" name="paid" readonly  id="paid" class="text" value="<?php echo $paid; ?>"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Balance Amount :</td>
                        <td align="left" >
                            <input type="text" name="bal" readonly  id="bal" class="text" value="<?php echo $bal; ?>"/>
                        </td>
						
                    </tr>
					<tr >
                        <td align="right" >Clear Due :</td>
                        <td align="left" >
                            <input type="text" name="cdue" value="0" onkeyup="paidamt();" id="cdue" class="text" />
                        </td>
					
                        <td align="right" >Remaining :</td>
                        <td align="left" >
                            <input type="text" name="rbal" readonly value="0" id="rbal" class="text" />
							<input type="hidden" name="user" value="<?php echo $name; ?>"/>
                        </td>
						
                    </tr>
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='manual_bill.php'"/></div>
        
		 </form>
			</div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>