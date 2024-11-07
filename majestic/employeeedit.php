<?php //include('config.php');

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
	</head>

	<body>

	<div id="conteneur">
		
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre">
		
          <h1 style="color:red;" align="center">EDIT EMPLOYEE DETAILS</h1>
          
          
          <form name="myform"  method="post" autocomplete="off">
<table width="100%" border="0" cellspacing="10" cellpadding="0">
 
      
            <tr>
            <?php
 include("config.php");
	$id=$_GET['id1'];
	//echo $id;
	$sql2=mysqli_query($link,"select * from  hr_emp where EMP_CODE ='$id'")or die(mysqlii_error($link));
	while($resu=mysqli_fetch_array($sql2))
	{
		$studname=$resu['EMP_CODE'];
		
		$add=$resu['EMP_NAME'];
		$contact_name=$resu['DESIGNATION'];
		$phone=$resu['JOIN_DATE'];
		$alter_phone=$resu['QUALIFICATION'];
		$land=$resu['EMAIL'];
		$land1=date('d-m-Y',strtotime($resu['DOB']));
		$land2=$resu['Gender'];
		$land3=$resu['PADDR'];
		$land4=$resu['CADDR'];
		$land5=$resu['PHONE1'];
		$land6=$resu['salary'];
		$land7=$resu['dept_code'];
		
		$aadharno=$resu['aadharno'];
		$accountno=$resu['accountno'];
		$bankname=$resu['bankname'];
		$branch=$resu['branchname'];
	}
	?>
      
              <td class="label1" ><div align="right">Employee Code :</div></td>
              <td align="left">
                <input name="empcode" type="hidden" class="text" value="<?php echo $studname; ?>" readonly /> <?php echo "EMP".$studname; ?></td>
              <td width="23%" class="label1" ><div align="right">Employee Name :</div></td>
              <td width="27%" align="left"><input name="empname" value="<?php echo $add?>" id="empname" type="text" class="text"  />&nbsp;</td>
            </tr>
            <tr>
              <td class="label1" ><div align="right"> Designation :</div></td>
              <td align="left"><input name="desig" type="text" value="<?php echo $contact_name?>" class="text"   id="select2"/>                 </td>
              <td class="label1" ><div align="right">Join Date :</div></td>
              <td align="left"> 

			<input name="joindt" type="text" class="tcal" size="20" value="<?php echo $phone?>"  style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;" required="required"  />
			  </td>
            </tr>

            <tr>
              <td class="label1" ><div align="right">Qualification :</div></td>
              <td align="left"><input name="qua" value="<?php echo $alter_phone?>" type="text" class="text"/></td>
              <td class="label1" ><div align="right"> Department :</div></td>
              <td align="left"><select name="dept"  style="width:230px;height:20px;">

				<option value="<?php echo $land7?>"><?php echo $land7?></option>                 
                  
                    <?php
				 
				 $s=mysqli_query($link,"select * from empdepartment") or die(mysqli_error($link));
				 while($k=mysqli_fetch_array($s)){
				 $kid=$k['empid'];
				  ?>
                  <option value="<?php echo $kid;  ?>" <?php if($kid==$land7){echo 'selected';} ?>><?php echo $k['dept_name'] ;?></option>
					<?php }?>
              </select></td>
            </tr>
            <tr>
              <td class="label1" ><div align="right">Date of Birth :</div></td>
              <td align="left"> 
              <input name="dob" type="text" class="tcal" value="<?php echo $land1?>" style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;" required="required"  />
</td>

              <td class="label1" ><div align="right"> Gender </div></td>
              <td align="left"><?php if($land2=='male'){?><input type="radio"  checked name="sex1" value="male"  id="male" />
  Male&nbsp;
  <input type="radio" name="sex1" value="female" id="female" />
  Female<?php } else {?><input type="radio" name="sex1" value="male"  id="male" />
  Male&nbsp;
  <input type="radio" name="sex1" checked value="female" id="female" />Female<?php }?></td>
  

            </tr>
            <tr>
              <td class="label1" ><div align="right"> Phone1 :</div></td>
              <td align="left"><input name="phone1" value="<?php echo $land5?>" type="text" class="text"   />
                  </td>
              <td class="label1" ><div align="right"> Salary :</div></td>
              <td align="left"><input name="phone2" value="<?php echo $land6?>" type="text" class="text"/></td>
            </tr>
            <tr>
              <td class="label1" ><div align="right"> Aadhar No :</div></td>
              <td align="left"><input name="aadharno" type="text" class="text"   value="<?php echo $aadharno?>"/>
                  </td>
              <td class="label1" ><div align="right"> Account No :</div></td>
              <td align="left"><input name="accountno" type="text" class="text" value="<?php echo $accountno?>" required/></td>
            </tr>
             <tr>
              <td class="label1" ><div align="right"> Bank Name :</div></td>
              <td align="left"><input name="bankname" type="text" class="text" value="<?php echo $bankname?>"  />
                  </td>
              <td class="label1" ><div align="right"> Branch :</div></td>
              <td align="left"><input name="branch" type="text" class="text" value="<?php echo $branch?>" required/></td>
            </tr>
             <tr>
              <td class="label1" ><div align="right"> Email :</div></td>
              <td align="left"><input name="email1" type="text" class="text" value="<?php echo $land?>"   id="treat_for"/></td>
              <td class="label1" >&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>

            <tr>
              <td class="label1" ><div align="right"> Current Address :</div></td>
              <td align="left"><textarea name="caddr" cols="34" rows="4" ><?php echo $land4 ?></textarea></td>
              <td class="label1" ><div align="right"> Permanent Address :</div></td>
              <td align="left"><textarea name="paddr" cols="34" rows="4" ><?php echo $land3 ?></textarea></td>
              </tr>
           


   <input type="hidden" name="abc" id="abc" value="0" />
            <tr ><td colspan="4" align="center">
              <input name="submit" type="submit" value="Update" class="butt" /> <input name="but" type="button" value="Close" class="butt" onclick="window.location.href='pemployee.php'"/></td></tr>
           
</table>  </form>
          
          
			</div>
            <?php
	if(isset($_POST['submit']))
	{	
		$sid=$_POST['empname'];
		
	
		$admin=$_POST['desig'];
		$studio_name=$_POST['joindt'];
	
		$std_address=$_POST['qua'];

		$contact_person=$_POST['dept'];

		$phone=date('Y-m-d',strtotime($_POST['dob']));
		$alternative=$_POST['sex1'];
		$land=$_POST['phone1'];
		$land1=$_POST['phone2'];
		$land2=$_POST['caddr'];
		$land3=$_POST['paddr'];
		$land4=$_POST['email1'];
		
		$aadharno=$_POST['aadharno'];
	$accountno=$_POST['accountno'];
	$bankname=$_POST['bankname'];
	$branch=$_POST['branch'];
		
		
		
		$sql3="UPDATE hr_emp SET EMP_NAME='$sid', DESIGNATION='$admin', JOIN_DATE='$studio_name', QUALIFICATION='$std_address', EMAIL='$land4', DOB='$phone',Gender='$alternative',PADDR='$land3',CADDR='$land2',PHONE1='$land',salary='$land1',dept_code='$contact_person',aadharno='$aadharno',accountno='$accountno',bankname='$bankname',branchname='$branch' WHERE EMP_CODE ='$id'";
		$result1=mysqli_query($link,$sql3) or die(mysqli_error($link));
		if($result1)
		{	
			print "<script>";
			print "alert('Successfully Updated');";
			print "self.location='pemployee.php';";
			print "</script>";
			
		}else{
			print "<script>";
			print "alert('unable to update');";
			print "self.location='pemployee.php';";
			print "</script>";
		}
	}
?>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>