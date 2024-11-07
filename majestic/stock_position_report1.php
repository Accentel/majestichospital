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
function report()
{

var report1 ="";
  for (var i=0; i < document.form.reporttype.length; i++)
  {
   if (document.form.reporttype[i].checked)  {
	   report1 = document.form.reporttype[i].value;   }
  }

var pass;
if(report1=="All"){pass="All";}
else if(report1=="Datewise"){
 var bb=document.getElementById("bb").value;
chckproduct(bb);
 var aa=document.getElementById("aa").value;

pass=''+report1+'&aa='+aa+'&bb='+bb+'';

}else if(report1=="ProductWise"){

 var ptype=document.getElementById("ptype").value;
 //var bb=document.getElementById("bb").value;
//chckproduct(bb);
 //var aa=document.getElementById("aa").value;

pass=''+report1+'&ptype='+ptype+'';

}

 window.open('PDF_Stockposition1.php?reporttype='+pass,'mywindow1','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes');

}
</script>
<script>

function selectreport(str)
{
if(str==1){
document.getElementById("trid1").style.display='none';
document.getElementById("trid2").style.display='none';
document.getElementById("trid3").style.display='none';

}
if(str==2){
document.getElementById("trid1").style.display='';
document.getElementById("trid2").style.display='';
document.getElementById("trid3").style.display='none';

}
if(str==3){
document.getElementById("trid1").style.display='none';
document.getElementById("trid2").style.display='none';
document.getElementById("trid3").style.display='';

}
}

function chckproduct(str)
{
  var aa=document.getElementById("aa").value;
 
  if(aa>str){
  alert("Selected Characters Should be Ascending Order");
  document.getElementById("bb").focus();
    }
  }


</script>



	</head>

	<body>

	<div id="conteneur">

		 <?php /*?> <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
			<?php
			include("logo.php");
			include("main_menu.php");
			?>
		  <div id="centre">
          <h1 style="color:red;" align="center">STOCK POSITION</h1>
          
          <form name ="form" method="post" action="">
          <table style="margin-left:400px;" cellspacing="10">
          <tr>
            <td colspan="4">
			<fieldset>
			<legend><b style=" color:#FF6600 ">Select Any One Of The Options Below </b></legend>
			<div align="center" ><input type="radio" name="reporttype" value="All" checked onclick="javascript:selectreport(1)"/>All &nbsp; &nbsp;
			<input type="hidden" name="reporttype" value="Datewise" onclick="javascript:selectreport(2)" /> 
			<!--Character Wise &nbsp; &nbsp;-->
			<!--<input type="radio" name="reporttype" value="ProductWise" onclick="javascript:selectreport(3)" /> 
			Product Type Wise--></div>
			</fieldset></td>
          </tr>
		   <tr style="display:none" id="trid3">
                <td class="label1" color="red"><div align="right">Select Product Type<span class="style2">*</span>:</div></td>
                <td><select name="ptype" id="ptype"  class="select" onchange="chckproduct()" >
                
                <?php
				$sql = mysqli_query($link,"select distinct(TYPE),PRD_NAME from phr_prddetails_mast a")or die(mysqli_error($link));
				if($sql){
				while($row = mysqli_fetch_array($sql)){
				    
				?>
                <option value="<?php echo $row[0]; ?>" ><?php echo $row[0]; ?></option>
                <?php 
				}
				}
				?>
                </select></td>
              </tr>
          <tr style="display:none" id="trid1">
            <td class="label1" color="red"><div align="right">From <span class="style2">*</span>:</div></td>
            <td><select name="aa" id="aa"  class="select"  >
              <?php for($i=65;$i != 91;$i++){ ?>
			    <option value="<?php echo chr($i); ?>"><?php echo chr($i); ?></option>
				<?php 
				} 
				?>

            </select></td>
            </tr>
          <tr style="display:none" id="trid2">
            <td class="label1" color="red"><div align="right">To <span class="style2">*</span>:</div></td>
            <td><select name="bb" id="bb"  class="select" onchange="chckproduct(this.value)" >
             <?php for($i=65;$i!=91;$i++){ ?>
			    <option value="<?php echo chr($i); ?>"><?php echo chr($i); ?></option>
				<?php } ?>
            </select></td>
            </tr><input type="hidden" name="report2" id="report2" value="" />

			<tr >
			  <td colspan="4" align="center" ><div id="sob">&nbsp;</div>	</td>
				</tr>
          <tr height="50px">
          <td colspan="2" align="center"><input type="submit" name="submit" value="Report" class="butt" onclick="report();"/> <input type="button" name="but" value="Close" class="butt" onclick="window.location.href='home.php'"/></td>
          
          </tr>
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