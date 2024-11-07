<html>

<head>
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
</head>
<body>

<?php 
include('config.php');

$result = mysqli_query($link,"select * from organization")or die(mysqli_error($link));
if($result)
{
	$row = mysqli_fetch_array($result);
	
	$cname = $row['orgname'];
	$addr = $row['address'];
	$phone = $row['phone'];
	
}
?>
<div style="font-size:32px;" align="center"><?php echo $cname; ?></div>
<div style="font-size:20px;" align="center"><?php echo $addr; ?></div>
<div style="font-size:20px;" align="center"><?php echo $phone; ?></div>
<hr/>
<?php 
include('config.php');
		$id=$_REQUEST['id1'];
		//echo $id;
		$sql="SELECT lr_no,total_amount,paid_amount FROM due_patients where `id`='$id'";
		$res=mysqli_query($link,$sql) or die(mysqli_error($link));
			if($res){
				$row=mysqli_fetch_array($res);
				$lrno=$row['lr_no'];
				$tot = $row['total_amount'];
				$paid = $row['paid_amount'];
				$bal = ($tot-$paid);
				$sql1 = mysqli_query($link,"SELECT inv_no,sal_date,cust_name,age,sex from phr_salent_mast where lr_no=$lrno")or die(mysqli_error($link));
				if($sql1){
					$row1 = mysqli_fetch_array($sql1);
					$invno = $row1['inv_no'];
					$saldate = date('d-m-Y',strtotime($row1['sal_date']));
					$custname = $row1['cust_name'];
					$age = $row1['age'];
					$sex = $row1['sex'];
					$rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$custname' ")or die(mysqli_error($link));
					while($rw1 = mysqli_fetch_array($rs1)){ $custname1 =$rw1[0];}
		
				}
			}
?>
<div style="font-size:24px;margin-bottom:20px;" align="center">Due Invoice</div>

<table width="100%" border="1" cellpadding="0" cellspacing="0">
<tr style="font-size:14px;font-weight:bold;">
<th>INVOICE NO</th>
<th>PATIENT NAME</th>
<th>AGE</th>
<th>GENDER</th>
<th>SALE DATE</th>
<th>TOTAL AMOUNT</th>
<th>PAID AMOUNT</th>
<th>BALANCE AMOUNT</th>


</tr>
<tr style="font-size:14px;">
<td><?php echo $invno; ?></td>
<td><?php echo $custname; ?></td>
<td><?php echo $age; ?></td>
<td><?php echo $sex; ?></td>
<td><?php echo $saldate; ?></td>
<td style="text-align:center;"><?php echo $tot; ?></td>
<td style="text-align:center;"><?php echo $paid; ?></td>
<td style="text-align:center;"><?php echo $bal.".00"; ?></td>
</tr>

</table>

<div style="margin-right:50px;margin-top:100px;text-align:right;font-size:18px;">Authorised signature</div>
<div align="center"><input id="prt" name="submit" class="butbg" value="Print" onClick="printt()" type="button"> <a href="duecustomer.php"><input class="butbg" id="cls" name="Close" value="Cancel" type="button"></a>
</div>



</body>

</html>