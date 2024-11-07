<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{

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
	$("#bno").autocomplete("set8.php", {
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
	var strar=show.split("@");
	//document.getElementById("supname").value=strar[2];
	//alert(strar);
	document.getElementById("bdate").value=strar[1];
	document.getElementById("pname").value=strar[2];	
	document.getElementById("age").value=strar[3];
    document.getElementById("gender").value=strar[4];
	document.getElementById("dname").value=strar[5];
	document.getElementById("testnames").innerHTML=strar[6];
	document.getElementById("invgtable").innerHTML=strar[7];
    document.getElementById("rows").value=strar[8];
    }
  }
xmlhttp.open("GET","search5.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint1(str)
{
//alert(str);
var bno = document.getElementById("bno").value;
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
	var strar=show.split("@");
//alert(strar);	
	document.getElementById("invgtable").innerHTML=strar[1];
    document.getElementById("rows").value=strar[2];
    }
  }
xmlhttp.open("GET","search002.php?q="+str+"&b="+bno,true);
xmlhttp.send();
}
</script>		
	</head>

	<body>

  
	<div id="conteneur">

		  
			
			  <?php
			  include("logo.php");
				include("main_menu.php");
			  ?>
			   <?php 
			   include('config.php');
				$bno=$_REQUEST['bno'];	
				$sql = mysqli_query($link,"select b.BillNO,b.BillDate,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount from mbill b,mbill1 b1 where b.BillNO=b1.BillNO and  b.BillNO = '$bno'")or die(mysqli_error($link));
			if($sql){
				$res = mysqli_fetch_array($sql);
				$billno = $res['BillNO'];
				$bdate = date('d-m-Y',strtotime($res['BillDate']));
				$pname = $res['PatientName'];
				$age = $res['Age'];
				$sex = $res['Sex'];
				$dname = $res['DoctorName'];
				$ctype = $res['conce_type'];
				$ptype = $res['ptype'];
				
			}		   
			   ?>
		<div id="centre" style="height:auto;">
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Result Entry</div>
		  <form name="frm" method="post" action="update_result.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                                
                    <tr >
                        <td align="right" >Bill No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" id="bno" class="text" value="<?php echo $billno; ?>" onfocus="showHint(this.value)"/>
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" id="bdate" style="width:188px;height:20px;" value="<?php echo $bdate; ?>" readonly class="tcal"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
                            <input type="text" name="pname" readonly id="pname" class="text" value="<?php echo $pname; ?>"/>
                        </td>
						<input type="hidden" name="rows" readonly id="rows" class="text"  />
                        
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" name="age" readonly id="age" class="text" value="<?php echo $age; ?>"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Gender :</td>
                        <td align="left" >
                           <input type="text" name="gender" readonly id="gender" class="text" value="<?php echo $sex; ?>"/>
							
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <input type="text" readonly name="dname" id="dname" class="text" value="<?php echo $dname; ?>"/>
							
                        </td>
                    </tr>
					<tr>
						<td colspan="4" id="testnames">
							
						</td>
					</tr>
                     <tr >
					 <td colspan="4">
                       <table width="100%">
                     
					 <tr >
						<td colspan="4" id="invgtable">
						</td>
					 </tr>
					 </table>
					 </td>
                    </tr>
					
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='result_entry.php'"/></div>
        
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