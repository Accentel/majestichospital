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
		  
          <h1 style="color:red;" align="center">ADD EMPLOYEE FORM</h1>
          
          
         <form name="myform" action="emp_insert.php" method="post" autocomplete="off">
		
          <table width="100%" border="0" cellpadding="0" cellspacing="10" align="center">
            <tr>
            <?php
				include("config.php");
				
					$result = mysqli_query($link,"SHOW TABLE STATUS WHERE `Name` = 'hr_emp'")or die(mysqli_error($link));
                    $data = mysqli_fetch_assoc($result);
                    $next_increment = $data['Auto_increment'];

				
			?>
              <td  class="label1" ><div align="right">Employee Code :</div></td>
              <td align="left">
                <input name="empcode" type="text" class="text" value="<?php echo "EMP-".$next_increment; ?>" readonly /></td>
              <td class="label1"><div align="right">Employee Name :</div></td>
              <td align="left"><input name="empname" id="empname" type="text" class="text"  required />&nbsp;</td>
            </tr>
            <tr>
              <td class="label1" ><div align="right"> Designation :</div></td>
              <td align="left"><input name="desig" type="text" class="text"   id="select2" required /></td>
              <td class="label1" ><div align="right">Join Date :</div></td>
              <td align="left"> 

				<input name="joindt" type="text" value="<?php
			  echo $today = date("d-m-Y");  ?>" class="tcal" size="20"  style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;" required="required"  />
			  </td>
            </tr>

            <tr>
              <td class="label1" ><div align="right">Qualification :</div></td>
              <td align="left"><input name="qua" type="text" class="text" required/></td>
              <td class="label1" ><div align="right"> Department :</div></td>
              <td align="left"><select name="dept" style="width:230px;height:20px;">
                  <option value="">Select Department</option>
                 <?php
				 
				 $s=mysqli_query($link,"select * from empdepartment") or die(mysqli_error($link));
				 while($k=mysqli_fetch_array($s)){
				 
				  ?>
                  <option value="<?php echo $k['empid'] ;?>"><?php echo $k['dept_name'] ;?></option>
					<?php }?>
              </select></td>
            </tr>
            <tr>
              <td class="label1" ><div align="right">Date of Birth :</div></td>
              <td align="left"> 
              <input name="dob" type="text" value="<?php
			  echo $today = date("d-m-Y");  ?>" class="tcal" size="20"  style="padding-left:2px;width:227px;height:20px;border:1px solid #840204;" required="required"  />
				</td>

              <td class="label1" ><div align="right"> Gender </div></td>
              <td align="left"><input type="radio" name="sex1" value="male"  id="male" checked />
			  Male&nbsp;
			  <input type="radio" name="sex1" value="female" id="female" />
			  Female</td>

            </tr>
            <tr>
              <td class="label1" ><div align="right"> Phone1 :</div></td>
              <td align="left"><input name="phone1" type="text" class="text"   />
                  </td>
              <td class="label1" ><div align="right"> Salary :</div></td>
              <td align="left"><input name="phone2" type="text" class="text" required/></td>
            </tr>
            <tr>
              <td class="label1" ><div align="right"> Aadhar No :</div></td>
              <td align="left"><input name="aadharno" type="text" class="text"   />
                  </td>
              <td class="label1" ><div align="right"> Account No :</div></td>
              <td align="left"><input name="accountno" type="text" class="text" required/></td>
            </tr>
             <tr>
              <td class="label1" ><div align="right"> Bank Name :</div></td>
              <td align="left"><input name="bankname" type="text" class="text"   />
                  </td>
              <td class="label1" ><div align="right"> Branch :</div></td>
              <td align="left"><input name="branch" type="text" class="text" required/></td>
            </tr>
            <tr>
              <td class="label1" ><div align="right"> Email :</div></td>
              <td align="left"><input name="email1" type="text" class="text"   id="treat_for"/></td>
              <td class="label1" >&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
 <tr>
              <td class="label1" ><div align="right"> Current Address :</div></td>
              <td align="left"><textarea name="caddr" cols="34" rows="4" ></textarea></td>
              <td class="label1" ><div align="right"> Permanent Address :</div></td>
              <td align="left"><textarea name="paddr" cols="34" rows="4" ></textarea></td>
              </tr>


   <input type="hidden" name="abc" id="abc" value="0" />
            <tr ><td colspan="4" align="center">
              <input name="image" type="submit" value="Save" class="butt" /> <input name="but" type="button" value="Close" class="butt" onclick="window.location.href='pemployee.php'"/></td></tr>
           
</table>
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

header('Location:login.php');

}

?>