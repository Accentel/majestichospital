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
			include("header1.php");
		?>
	
	</head>

	<body>
<?php
include("config.php");

	$dept = $_REQUEST['dept'];
	$tname = $_REQUEST['tname'];
	
$sql=mysqli_query($link,"select * from testdetails where Department='$dept' and TestName='$tname'")or die(mysqli_error($link));
if($sql){
	$res = mysqli_fetch_array($sql);
	$depname = $res['Department'];
	$testname = $res['TestName'];
	
	$amt = $res['Amount'];
	$iprice = $res['iprice'];
	$method = $res['method'];
	$ltype = $res['ltype'];
	
}

?>
  
  <style>
.th{padding-top:15px !important; padding-bottom:15px !important;}</style>	
	<div id="conteneur container">

		   <?php
				include("logo.php");
			  ?>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" class="table-responsive" style="height:auto;" >
		<h1 style="color:red;" align="center">Edit Test Details</h1>
            <div align="center" style="width:100%">

         <fieldset style="border:1px solid; width:auto;">
		  <form name="frm" method="post" action="update_test.php">
			<table border="0" class="table" cellpadding="4" cellspacing="0">
                                
                        <tr >
                        <td  class="label1" >Department Name :</td>
                        <td  >
                            <input type="text" name="depname" id="depname" value="<?php echo $depname ?>" readonly class="text" required/>
                        </td>
                    </tr>
                     <tr >
                        <td  class="label1" >Test Name :</td>
                        <td>
                            <input type="text" name="testname" id="testname" value="<?php echo $testname ?>" class="text"  required/>
                        </td>
                    </tr>
					<tr >
                        <td  class="label1" >Price :</td>
                        <td >
                            <input type="text" name="tamt" id="tamt" value="<?php echo $amt ?>"class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td  class="label1" >Insurance Price :</td>
                        <td >
                            <input type="text" name="itamt" id="itamt" value="<?php echo $iprice ?>"class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td  class="label1" >Method Name :</td>
                        <td >
                            <input type="text" name="method" id="method" value="<?php echo $method ?>"class="text"/>
                        </td>
                    </tr>
                    <tr >
                        <td  class="label1" ><strong>Lab Type :</strong></td>
                        <td  >
                            <select name="ltype" id="ltype" class="text" required>
							<option value="">Select Lab Type</option>
							<option value="in" <?php if($ltype=="in"){echo 'selected';} ?> >In</option>
							<option value="out" <?php if($ltype=="out"){echo 'selected';} ?>>Out</option>
							<option value="X-Ray/Scan" <?php if($ltype=="X-Ray/Scan"){echo 'selected';} ?>>X-Ray/Scan</option>
							</select>
                        </td>
                    </tr>
					<!--<tr >
					<td colspan="2">
					<?php if($units != Null && $nrange!=Null ){ ?>
					<table width="100%" align="center" cellpadding="0" cellspacing="0" id="expense_table">
					<tr><th>Child Test Name</th><th>Units</th><th>Normal Range</th></tr>
					<?php
					$sql1=mysqli_query($link,"select * from testdetails where Department='$dept' and TestName='$tname'")or die(mysqli_error($link));
					if($sql1){	
					while($res1 = mysqli_fetch_array($sql1)){
					$ctest1 = $res1['Ctest'];
					$units1 = $res1['Units'];
					$nrange1 = $res1['NormalRange'];
					?>
					<tr >
                        <td >
                            <input type="text" name="ctest[]" id="ctest" value="<?php echo $ctest1 ?>" class="text"/>
                        </td>
                    
                        <td >
                            <input type="text" name="units[]" id="units" value="<?php echo $units1 ?>" class="text"/>
                        </td>
                   
                        <td >
                            <input type="text" name="nrange[]" id="nrange" value="<?php echo $nrange1 ?>" class="text"/>
                        </td>
                    </tr>
					<?php } } ?>
					</table>
					<?php }else{ ?>
					<table width="100%" align="center" cellpadding="0" cellspacing="0" id="expense_table">
					<tr><th>Child Test Name</th></tr>
					<?php
					$sql2=mysqli_query($link,"select * from testdetails where Department='$dept' and TestName='$tname'")or die(mysqli_error($link));
					if($sql2){	
					while($res2 = mysqli_fetch_array($sql2)){
					$ctest2 = $res2['Ctest'];
					
					?>
					<tr >
                        <td >
                            <input type="text" name="ctest1[]" id="ctest1" value="<?php echo $ctest2 ?>" size="50" class="text"/>
                        </td>
                    
                        
                    </tr>
					<?php }} ?>
					</table>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">Interpretation : <textarea cols="170" rows="5" name="inter" id="inter"><?php echo $inter ?></textarea></td>
				</tr>-->	
            <tr >
                <td colspan="2" align="center" class="th"><input type="submit" name="submit" value="Update" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='new_test.php'"/></td>
            </tr>
        </table>
		 </form></fieldset></div>

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