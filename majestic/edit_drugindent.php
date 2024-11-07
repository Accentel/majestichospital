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
	$("#mrno").autocomplete("set19.php", {
		width: 180,
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
//////////////////////////addrow starts//////////
function Addrow()
{
	var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;
//alert(Row);
	 var oCell = document.createElement("TD");
    oCell.innerHTML= "<div align='center' ><input  type='text' class='text' name='tname[]' id='cname"+Row+"' /></div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' class='text' name='cost[]' id='cost"+Row+"'  /><input type='hidden' class='text' name='id2[]' id='id2'   class='txt' /> </div>"; 
    row.appendChild(oCell);

 // document.getElementById("nitem").value=Row;

     document.getElementById("rows").value=Row;
	 //alert(Row);
//sameinvcodes(Row);
   }//addrow()


 function deleteRow(tableID) {  
    var tbl = document.getElementById('TABLE1');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows").value;
  if (lastRow > 1){ 
				  
  tbl.deleteRow(lastRow - 1);
  document.getElementById("rows").value=eval(rowss)-1;

}
  else{ alert('Please Select Row');return false;}
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
			   <?php 
		$id=$_REQUEST['id'];
		$p=mysqli_query($link,"select * from drugindent where id='$id'") or die(mysqli_error($link));
		$r=mysqli_fetch_array($p);
		$mrno=$r['mrno'];
		$pname=$r['pname'];
		$fdate=$r['fdate'];
		$tdate=$r['tdate'];
		$id6=$r['id'];
		$status=$r['status'];
		
		 ?>
		<div id="centre" style="height:auto;">
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">DRUG INDENT FORM</div>
		  <form name="myform" method="post" action="update_indent.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                        <tr >
                        <td align="right" >Type :</td>
                        <td align="left" >
                           <select  name="mrno"   class="text"  >
                             <?php 
						$q="select * from empdepartment";
						$k=mysqli_query($link,$q) or die(mysqli_error($link));
						while($t=mysqli_fetch_array($k)){
						?>
                        <option value="<?php echo $t1=$t['empid'] ?>" <?php if($mrno==$t1){echo 'selected';} ?>><?php echo $t['dept_name'] ?></option>
                        <?php }?>
                            
                            
                            </select>
                        </td>
						 <td align="right" >Staff Name :</td>
                        <td align="left" >
							
                            <input type="text" name="pname" id="pname" class="text" value="<?php echo $pname; ?>" required />
                            <input type="hidden" name="id5" id="id5" class="text" value="<?php echo $id6; ?>" required />
                        </td>
                    </tr>         
                    <tr >
                        
						 <td align="right" >From Date :</td>
                        <td align="left" >
                            <input type="text" name="fdate" id="fdate" style="width:188px;height:20px;" class="tcal" value="<?php echo date('d-m-Y',strtotime($fdate)) ?>"  />
                        </td>
                        <td align="right" >Pha Name:</td>
                        <td align="left" >
                            <input type="text" name="tdate" id="tdate" style="width:188px;height:20px;" value="<?php echo $tdate ?>"  />
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Status:</td>
                        <td align="left" >
                            <select name="status" id="status"  class="text"  >
						<option value="">Select Status</option>
                       <option value="issued" <?php if($status=="issued"){echo 'selected';} ?>>issued</option>
                       <option value="pending" <?php if($status=="pending"){echo 'selected';} ?>>pending</option>
                        
                        </select>
                        </td>
						 
                    </tr>  
					
					
					
                     <tr >
					 <td colspan="4">
                       <table width="100%" id="expense_table">
                    <tr><td width="100%" align="center">
					<table width="100%" id="TABLE1">
					  <thead>
						 <tr>
					   
					   <th width="50%" class="TH1">Name </th>
					   <th width="50%" class="TH1">Quantity</th>
					   </tr>
					   </thead>
                       <?php
		
		//$id=$_REQUEST['id'];
		$q=mysqli_query($link,"select * from drugindent1 where did='$id'") or die(mysqli_error($link));
		$i=1;
		while($row=mysqli_fetch_array($q)){
		$name=$row['name'];
		$qty=$row['qty'];
		$id3=$row['id1'];
		 ?>
         <tr>
       
          <td><input type="text" class="text" name="tname[]"  id="tname" value="<?php echo $name; ?>"/></td>
           <td><input type="text" class="text" name="cost[]" id="cost1"   class="txt" value="<?php echo $qty; ?>"/>
           <input type="hidden" class="text" name="id2[]" id="id2"   class="txt" value="<?php echo $id3; ?>"/>
           </td>
         </tr>
         <?php 
		 $i++;
		 }?>
					   
					 </table>
					 
					 </td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  +  " onClick="javascript:Addrow()"/></td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  -  " onClick="javascript:deleteRow()"/></td>
					  </tr>

					<input type="hidden" name="rows" id="rows" value="10" />

					 </table>
					 </td>
                    </tr>
					
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='drugindent_view.php'"/></div>
        
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