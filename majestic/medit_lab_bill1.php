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
	<script>
function paidamt(){
var tot = document.getElementById("tot").value;
var dis = document.getElementById("conamt").value;
var net = parseFloat(tot)-parseFloat(dis);
document.getElementById("price").value=net;
document.getElementById("bal").value=net;
var namt = document.getElementById("price").value;
var paid = document.getElementById("paid").value;
var amt1 = parseFloat(namt)-parseFloat(paid);
document.getElementById("bal").value=amt1;
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
			include("config.php");
			$bno = $_REQUEST['bno'];
			$sql = mysql_query("select  b.BillNO,b.BillDate,b.PatientName,b.Age,b.Sex,b.mrno,b.DoctorName,b.conce_type,b.phoneno,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount,b1.time from mbill b,mbill1 b1 where b.BillNO=b1.BillNO and  b.BillNO = '$bno'");
			if($sql){
				$res = mysql_fetch_array($sql);
				$billno = $res['BillNO'];
				$bdate = date('d-m-Y',strtotime($res['BillDate']));
				$pname = $res['PatientName'];
				$age = $res['Age'];
				$sex = $res['Sex'];
				$dname = $res['DoctorName'];
				$ctype = $res['conce_type'];
				$ptype = $res['ptype'];
				$tot = $res['Total'];
				$disc = $res['Discount'];
				$net = $res['NetAmount'];
				$paid = $res['PaidAmount'];
				$bal = $res['BalanceAmount'];
				$remarks=$res['remarks'];
				$phoneno=$res['phoneno'];
				$mrno=$res['mrno'];
				 $time1=$res['time'];
			}
		?>
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Edit Lab Bill</div>
		  <form name="myform" method="post" action="update_mbill.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                                
                    <tr >
                        <td align="right" >UMR No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" id="bno" value="<?php echo $mrno ?>" readonly class="text"/>
                        </td>
						 
                    </tr>
                   
                   
                    <tr >
                        <td align="right" >Bill No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" id="bno" value="<?php echo $billno ?>" readonly class="text"/>
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" id="bdate" style="width:188px;height:20px;" value="<?php echo $bdate ?>" readonly class="tcal"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
							
                            <input type="text" name="pname" id="pname" value="<?php echo $pname ?>" class="text" required/>
                        </td>
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" name="age" id="age" value="<?php echo $age ?>" class="text" required/>
							
						</td>
                    </tr>
					<tr >
                        <td align="right" >Gender :</td>
                        <td align="left" >
                            <select name="gender" required id="gender" style="width:188px;height:24px;">
								<option value="<?php echo $sex ?>"><?php echo $sex ?></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <select required name="dname" id="dname" style="width:188px;height:24px;">
							<option value="<?php echo $dname ?>"><?php echo $dname ?></option>
							<?php
								include("config.php");
								$sql1 = mysql_query("select DoctorName from ddetails");
								if($sql1){
								while($row1 = mysql_fetch_array($sql1)){
							?>
							<option value="<?php echo $row1[0] ?>"><?php echo $row1[0] ?></option>
							<?php }} ?>
							</select>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Concession Type :</td>
                        <td align="left" >
                            <select name="ctype" id="ctype" style="width:188px;height:24px;">
								<?php if($ctype == "General"){ ?>
								<option value="General" selected >General</option>
								<option value="Insurance">Insurance</option>
								<?php }elseif($ctype == "Insurance"){ ?>
								<option value="General">General</option>
								<option value="Insurance" selected >Insurance</option>
								<?php } ?>
							</select>
                        </td>
						<td align="right" >Patient Type :</td>
                        <td align="left" >
                            <select name="ptype" id="ptype" style="width:188px;height:24px;">
								<?php if($ptype == "IP"){ ?>
								<option value="IP" selected >IP</option>
								<option value="OP">OP</option>
								<?php }elseif($ptype == "OP"){ ?>
								<option value="IP">IP</option>
								<option value="OP" selected >OP</option>
								<?php } ?>
							</select>
                        </td>
					</tr>	
						<tr >
                        <td align="right" >Phone No :</td>
                        <td align="left" >
							
                            <input type="text" name="mno" id="mno" value="<?php echo $phoneno ?>" class="text" required/>
                        </td>
						<td align="right" >Time :</td>
                        <td align="left" >
							
                            <input type="text" name="time" id="time" value="<?php echo $time1 ?>" class="text" required/>
                        </td>
						</tr>
					
                     <tr >
					 <td colspan="4">
                       <table width="100%" id="expense_table">
                    <tr><td width="100%" align="center">
					<table width="100%" id="TABLE1">
					  <thead>
						 <tr>
					   
					   <th width="50%" class="TH1">Test Name </th>
					   <th width="50%" class="TH1">Cost</th>
					   <th width="50%" class="TH1">Delete</th>
					   </tr>
					   </thead>
					   <?php 
						$sql2 = mysql_query("select * from mbill where BillNO = '$bno'");
						if($sql2){
							while($row2 = mysql_fetch_array($sql2)){
							$id=$row2['id'];
							$bn=$row2['BillNO'];
					   ?>
					   <tr>
					   <td ><input type="text" class="text" name="tname[]" id="cname1" value="<?php echo $row2['TestName'] ?>" readonly /></td>
						<td ><input type="text" class="text" name="cost[]" id="cost1" value="<?php echo $row2['Amount'] ?>" readonly /></td>
						<td><a href="deletereport.php?q=<?php echo $id  ?>&bno=<?php echo $bn ?>"><img src="images/Icon_Delete.png" height="21"/></a></td>
						</tr>
						<?php } } ?>
					 </table>
					 
					 </table>
					 </td>
                    </tr>
					<tr >
                        <td align="right" >Total Amount :</td>
                        <td align="left" >
                            <input type="text" name="tot" value="<?php echo $tot ?>"  id="tot" class="text"/>
                        </td>
						 <td align="right" >Discount :</td>
                        <td align="left" >
                            <input type="text" name="conamt"  value="<?php echo $disc ?>" onkeyup="paidamt()" id="conamt"  class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Net Amount :</td>
                        <td align="left" >
                            <input type="text" name="price"  value="<?php echo $net ?>" id="price" class="text"  />
                        </td>
						 <td align="right" >Paid Amount :</td>
                        <td align="left" >
                            <input type="text" name="paid"  value="<?php echo $paid ?>"  onkeyup="paidamt()" id="paid" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Balance Amount :</td>
                        <td align="left" >
                            <input type="text" name="bal"  value="<?php echo $bal ?>"  id="bal" class="text"/>
							<input type="hidden" name="user"  value="<?php echo $_SESSION['suguna'] ?>"  id="bal" class="text"/>
                        </td>
						<td align="right" >Remarks :</td>
                        <td align="left" >
                            <textarea name="remarks" rows="3" cols="28"><?php echo $remarks ?></textarea>
                        </td>
						
                    </tr>
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Update" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='manual_lab_bill.php'"/></div>
        
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