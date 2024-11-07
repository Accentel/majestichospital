<?php 
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type='text/javascript' src="js/jquery.autocomplete.js"></script>
    <link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
    <script>
		 
	 $(document).on('click', '.print-type', function(){
	// alert($(this).attr('data-row'));
	 $(".text").autocomplete("set9.php", {
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
	 
	 $(document).on('click', '.print-type1', function(){
	// alert($(this).attr('data-row'));
	 $(".print-type1").autocomplete("set39.php", {
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
	</head>

	<body>

	<div id="conteneur" >

	  <?php include('logo.php'); ?>
		<?php
		include("main_menu.php");
		?>
	<div id="centre" style="height:auto;">
		  
			
          <h1 style="color:red;" align="center">ADD OUT PATIENT DIGITAL FORM</h1>
			<form action="opdigital_update.php" method="post" autocomplete="off" enctype="multipart/form-data">
			
					<table  width="60%"  style="margin-left:80px;" border="0" cellpadding="4" cellspacing="10">
						
						<?php 
						include("config.php");
						$id=$_REQUEST['id'];
						$sq=mysql_query("select * from opdigitalform where id='$id' ");
						if($sq){
						while($res=mysql_fetch_array($sq)){
							$pname=$res['pname'];
							$age=$res['age'];
							$sex=$res['sex'];
							$mrno=$res['mrno'];
							$optype=$res['optype'];
							$date1=$res['date1'];
							$a6=$res['id'];
							$provisionaldiagnostics=$res['provisionaldiagnostics'];
							$finaldiagnostics=$res['finaldiagnostics'];
							$clinicalhistory=$res['clinicalhistory'];
							$pulserate=$res['pulserate'];
							$repositoryrate=$res['repositoryrate'];
							$heart=$res['heart'];
							$lungs=$res['lungs'];
							$pa=$res['pa'];
							$cns=$res['cns'];
							$localeximination=$res['localeximination'];
							$advices=$res['advices'];
							$consult_doct=$res['consult_doct'];
							$reviewdate1=$res['reviewdate'];
							$reviewdate=date('d-m-Y',strtotime($reviewdate1));
							$bp=$res['bp'];
							$temperature=$res['temperature'];
							$image=$res['image'];
							
							 }
							 }?>
						<tr>
							<td></td>
							<td class="label1"><label for="cname">UMR No :</label></td>
							<td><input name="mrno" id="mrno" type="text" class="text" value="<?php echo $mrno?>" readonly="readonly"/></td>
                            <input type="hidden" value="<?php echo $a6?>" name="id"> 
						</tr>
						<tr>
							<td></td>
							<td class="label1"><label for="tin">Patient Name :</label></td>
							<td> <input name="panem" id="panem" type="text" class="text" value="<?php echo $pname?>"/>
                            <input name="date" id="date" type="hidden" class="text" value="<?php echo $date1?>"/>
                            
                            </td>
                            
						</tr>
                        
                        <tr>
							<td></td>
							
						</tr>
							
						<tr>
							<td></td>
							<td class="label1"><label for="phone">Sex :</label></td>
							<td> <input name="sex" id="sex" type="text" class="text" value="<?php echo $sex?>"/></td>
						</tr>
						<tr>
							<td></td>
							<td class="label1"><label for="phone">Age :</label></td>
							<td> <input name="age" id="age" type="text" class="text" value="<?php echo $age?>"/></td>
						</tr>
						<tr>
							<td></td>
							<td class="label1"><label for="phone">Patient Type :</label></td>
							<td> <input name="optype" id="optype" type="text" class="text" value="<?php echo $optype?>"/></td>
						</tr>
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">Consult Doctor :</label></td>
							<td> <input name="ref_doct" id="ref_doct" type="text" class="text" value="<?php echo $consult_doct?>"/></td>
						</tr>
                        
						<tr>
							<td></td>
							<td class="label1"><label for="addr">Provisional Diagnosis :</label></td>
							<td> <textarea name="pd" id="pd" class="textarea1" cols="34" rows="4"><?php echo $provisionaldiagnostics?></textarea></td>
						</tr>
						
						<tr>
							<td></td>
							<td class="label1"><label for="addr">Final Diagnosis :</label></td>
							<td> <textarea name="fd" id="fd" class="textarea1" cols="34" rows="4"> <?php echo $finaldiagnostics?></textarea></td>
						</tr>
						
						<tr>
							<td></td>
							<td class="label1"><label for="addr">Clinical History :</label></td>
							<td> <textarea name="ch" id="ch" class="textarea1" cols="34" rows="4"><?php echo $clinicalhistory?></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td class="label1"><label for="addr"><b>At the Time of Examination </b></label></td>
							
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone"><b>Vitals </b></label></td>
							</td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">Pulse Rate :</label></td>
							<td> <input name="pulse" id="pulse" type="text" class="text" value="<?php echo $pulserate?>" />beat/min</td>
						</tr>
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">BP :</label></td>
							<td> <input name="bp" id="bp" type="text" class="text"  value="<?php echo $bp?>"/>mmHg</td>
						</tr><tr>
							<td></td>
							<td class="label1"><label for="phone">Temperature :</label></td>
							<td> <input name="temperature" id="temperature" type="text" class="text" value="<?php echo $temperature?>"/>0F</td>
						</tr>
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">Repository Rate :</label></td>
							<td> <input name="repository" id="repository" type="text" class="text" value="<?php echo $repositoryrate?>" />/min</td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">Heart :</label></td>
							<td> <input name="heart" id="heart" type="text" class="text" value="<?php echo $heart?>"/></td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">Lungs :</label></td>
							<td> <input name="lungs" id="lungs" type="text" class="text" value="<?php echo $lungs?>"/></td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">P/A :</label></td>
							<td> <input name="pa" id="pa" type="text" class="text" value="<?php echo $pa?>"/></td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">CNS :</label></td>
							<td> <input name="cns" id="cns" type="text" class="text" value="<?php echo $cns?>"/></td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="addr">Local Examination Findings:</label></td>
							<td> <textarea name="localexamination" id="localexamination" class="textarea1" cols="34" rows="4"><?php echo $localeximination?></textarea></td>
						</tr>
                         <tr>
							<td></td>
							<td class="label1"><label for="addr"><b>Advised Investigations:</b></label></td>
							<td> </td>
						</tr>
                        
                        <tr>
                        <td></td>
                        <td class="label1"><b>Lab Reports</b></td><td>
                        <button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
                        
                        </td>
                        </tr>
                         <?php
					   $p="select * from bill where mrno='$mrno' ";
					  $result=mysql_query($p) or die(mysql_error());
					   while($r=mysql_fetch_array($result)){
						   
					    
					    ?>
					   <tr>
                       <td></td>
                       <td></td>
					   <td ><?php echo $r['TestName'] ?></td>
							<td ><?php echo $r['BillDate']."(".$r['BillNO'].")" ?></td>
						
						
						</tr>
                        <?php
						
						
						 }?>
                         <?php
					   $p="select * from opdigitallab where mrno='$mrno' ";
					  $result=mysql_query($p) or die(mysql_error());
					   while($r=mysql_fetch_array($result)){
						   
					    
					    ?>
					   <tr>
                       <td></td>
                       <td></td>
					   <td ><input type='text' class='text print-type' id='tname"+i+"' data-row='"+i+"' name='tname[]' value="<?php echo $r['tname'] ?>"/><input type='hidden' class='text print-type' id='lid"+i+"' data-row='"+i+"' name='lid[]' value="<?php echo $r['opid'] ?>"/></td>
						
						
						</tr>
                        <?php
						
						
						 }?>
                        <tr>
                        <td></td>
                        <td colspan="2" align="center">
                         <div class="osu"></div>
                        </td>
                        
                        </tr>
                        
                        <tr>
                        <td></td>
                        <td class="label1"><b>Medications Advised</b></td><td>
                        <button type="button" class='btn btn-success addmore1'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
                        
                        </td>
                        </tr>
                        </table>
                        <table width="80%">
                        <tr>
                        
                        <td colspan="3">
                        <table>
                        <?php
					   $p="select * from opdigitalmedical where mrno='$mrno' ";
					  $result=mysql_query($p) or die(mysql_error());
					   while($r=mysql_fetch_array($result)){
						   
					    
					    ?>
					   <tr>
                       <td><input type='text' class=' print-type1' id='mtype"+i+"' data-row='"+i+"' name='mtype[]' value='<?php echo $r['mtype'] ?>' style='width:90px;'/></td>
                       <td><input type='text' class='text print-type1' id='pname"+i+"' data-row='"+i+"' name='pname[]' value='<?php echo $r['mname'] ?>'/></td>
                        <td><input type='text' class='text ' id='generic"+i+"' data-row='"+i+"' name='generic[]' value='<?php echo $r['generic'] ?>'/></td>
					   <td ><input type='text' class='	 ' id='dtime"+i+"' data-row='"+i+"' name='dtime[]' value='<?php echo $r['dosagetime'] ?>' style='width:80px;'/></td>
                        <td ><input type='text' class=' ' id='dadmin"+i+"' data-row='"+i+"' name='dadmin[]' value='<?php echo $r['drugadmin'] ?>' style='width:80px;'/></td>
                         <td ><input type='text'  id='Days"+i+"' data-row='"+i+"' name='Days[]' style='width:50px;' value='<?php echo $r['days'] ?>'/></td>
						 <td ><input type='text'  id='qty"+i+"' data-row='"+i+"' name='qty[]' value='<?php echo $r['qty'] ?>' style='width:50px;'/><input type='hidden' class='text print-type1' id='mid"+i+"' data-row='"+i+"' name='mid[]' value="<?php echo $r['mid'] ?>"/></td>
						<td ><input type='text'  id='indication"+i+"' data-row='"+i+"' name='indication[]' value='<?php echo $r['indication'] ?>' style='width:80px;'/></td>
						</tr>
                        <?php
						
						
						 }?>
                        
                        </table>
                        
                        
                        </td>
                        
                        </tr>
                        
                        
                        <tr>
                        <td></td>
                        <td colspan="2" align="center">
                         <div class="osu1" style="width:100%;"></div>
                        </td>
                        
                        </tr>
                        <tr>
							<td></td>
							<td class="label1"><label for="addr">Other Procedures Adviced/Suggestions :</label></td>
							<td> <textarea name="suggestions" id="suggestions" class="textarea1" cols="34" rows="4"><?php echo $advices?></textarea></td>
						</tr>
                        <tr>
							<td></td>
							<td class="label1"><label for="addr">Review Date:</label></td>
							<td> <input type="text" name="reviewdate" id="reviewdate" class="textarea1 tcal" value="<?php echo $reviewdate; ?>" /></td>
						</tr>
                        <tr>
							<td></td>
							<td class="label1"><label for="addr">Outside Report Attachment :</label></td>
							<td> <input type="file" name="image" id="file" />
                            
                            <input type="hidden" name="image1" id="image1" value="<?php echo $image; ?>" />
                            </td>
						</tr>
						<tr>
							<td colspan="4" style="padding-left:350px;" ><input type="submit" name="submit" class="butt" value="Save"/>&nbsp;<input type="button" class="butt" value="Close" onclick="window.location.href='opdigital_reg.php'"/></td>
					   </tr>
					</table>
			</form>
			</div>
            
            <script>
/*$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
calculateTableSum(currentTable);
});*/

$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents(".form-group").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});


var i=2;
$(".addmore1").on('click',function(){
     
	var data ="<div class='form-group'>";
   
    data +="<div class='col-sm-12'>";          
    data +="<input type='checkbox' class='case'/><select class='text' id='mtype"+i+"' data-row='"+i+"' name='mtype[]'> <option value=''>Select Type</option><?php $sq=mysql_query('select * from phr_prdtype_mast');while($r=mysql_fetch_array($sq)){?><option value='<?php echo $r['PRDTYPE_NAME']?>'><?php echo $r['PRDTYPE_NAME']?></option><?php }?></select><input type='text' class='text print-type1' id='pname"+i+"' data-row='"+i+"' name='pname[]' placeholder='Drug Name' /><input type='text' class='text' id='generic"+i+"' data-row='"+i+"' name='generic[]' placeholder='generic' /><input type='text' class=' ' id='dtime"+i+"' data-row='"+i+"' name='dtime[]' placeholder='Dosage Time' style='width:80px;'/><input type='text' class=' ' id='dadmin"+i+"' data-row='"+i+"' name='dadmin[]' placeholder='Drug Administration ' style='width:90px;'/><input type='text'  id='Days"+i+"' data-row='"+i+"' name='Days[]' placeholder='Days' style='width:50px;'/><input type='text'  id='qty"+i+"' data-row='"+i+"' name='qty[]' placeholder='Quantity' style='width:50px;'/><input type='hidden' class='text print-type2' id='mid"+i+"' data-row='"+i+"' name='mid[]' value=''/><input type='text'  id='indication"+i+"' data-row='"+i+"' name='indication[]' placeholder='indication' style='width:50px;'/>";
   data +="<input type='hidden' name='ksr[]' value='1'/>";
    data +="</div></div>";
	
	
	
	
	
	$('.osu1').append(data);
	i++;
});


var i=2;
$(".addmore").on('click',function(){
     
	var data ="<div class='form-group'>";
   
    data +="<div class='col-sm-6'>";          
    data +="<input type='checkbox' class='case'/><input type='text' class='text print-type' id='tname"+i+"' data-row='"+i+"' name='tname[]' /><input type='hidden' class='text print-type' id='lid"+i+"' data-row='"+i+"' name='lid[]' value=''/>";
   data +="<input type='hidden' name='ksr[]' value='1'/>";
    data +="</div></div>";
	
	
	
	
	
	$('.osu').append(data);
	i++;
});
function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
	
	
		
}
</script>

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