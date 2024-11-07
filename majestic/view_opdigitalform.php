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
		  
			
          <h1 style="color:red;" align="center">VIEW OUT PATIENT DIGITAL FORM</h1>
			
			<div align="left">
					<table  width="70%"   border="0" cellpadding="4" cellspacing="10">
						
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
							$reviewdate=$res['reviewdate'];
							
							$bp=$res['bp'];
							$temperature=$res['temperature'];
							$image=$res['image'];
							
							
							
							
							 }
							 }
							 
							 $k=mysql_query("select * from bill where mrno='$mrno'");
							 $k1=mysql_fetch_array($k);
							 $bno=$k1['BillNO'];
							 
							 ?>
						<tr>
							<td></td>
							<td class="label1"><label for="cname">UMR No :</label></td>
							<td><?php echo $mrno?></td>
                            
						</tr>
						<tr>
							<td></td>
							<td class="label1"><label for="tin">Patient Name :</label></td>
							<td> <?php echo $pname?>
                         
                            
                            </td>
                            
						</tr>
                        
                       
							
						<tr>
							<td></td>
							<td class="label1"><label for="phone">Age/Sex :</label></td>
							<td> <?php echo $age."/".$sex?></td>
						</tr>
						
						<tr>
							<td></td>
							<td class="label1"><label for="phone">Patient Type :</label></td>
							<td> <?php echo $optype?></td>
						</tr>
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">Consult Doctor:</label></td>
							<td> <?php echo "Dr. ".$consult_doct?></td>
						</tr>
                        
                        
						<tr>
							<td></td>
							<td class="label1"><label for="addr">Provisional Diagnosis :</label></td>
							<td> <?php echo $provisionaldiagnostics?></td>
						</tr>
						
						<tr>
							<td></td>
							<td class="label1"><label for="addr">Final Diagnosis :</label></td>
							<td> <?php echo $finaldiagnostics?></td>
						</tr>
						
						<tr>
							<td></td>
							<td class="label1"><label for="addr">Clinical History :</label></td>
							<td> <?php echo $clinicalhistory?></td>
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
							<td> <?php echo $pulserate?>  beat/min</td>
						</tr>
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">BP :</label></td>
							<td> <?php echo $bp?>  mmHg</td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">Temperature :</label></td>
							<td> <?php echo $temperature?>  <sup>0</sup>F</td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">Repository Rate :</label></td>
							<td> <?php echo $repositoryrate?>  /min</td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">Heart :</label></td>
							<td><?php echo $heart?></td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">Lungs :</label></td>
							<td> <?php echo $lungs?></td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">P/A :</label></td>
							<td> <?php echo $pa?></td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="phone">CNS :</label></td>
							<td><?php echo $cns?></td>
						</tr>
                        
                        <tr>
							<td></td>
							<td class="label1"><label for="addr">Local Examination Findings:</label></td>
							<td> <?php echo $localeximination?></td>
						</tr>
                         <tr>
							<td></td>
							<td class="label1"><label for="addr"><b>Advised Investigations:</b></label></td>
							<td> </td>
						</tr>
                        
                        <tr>
                        <td></td>
                        <td class="label1"><b>Lab Reports</b></td><td>
                        <a href="sample2.php?bno=<?php echo $bno; ?>" target="_blank"><b>View Report</b></a>
                        
                        </td>
                        </tr>
                         <?php /*?><?php
					   $p="select * from opdigitallab where mrno='$mrno' ";
					  $result=mysql_query($p) or die(mysql_error());
					  $count=mysql_num_rows($result);
					  if($count>0){
					   while($r=mysql_fetch_array($result)){
						   
					    
					    ?>
					   <tr>
                       <td></td>
                       <td></td>
					   <td ><?php echo $r['tname'] ?></td>
						
						
						</tr>
                        <?php
						
						
						 }?><?php */?>
                         <?php
					  
					   $p1="select * from bill where mrno='$mrno' ";
					  $result1=mysql_query($p1) or die(mysql_error());
					   while($r1=mysql_fetch_array($result1)){
						   
					    
					    ?>
					   <tr>
                       <td></td>
                       <td></td>
					   <td ><?php echo $r1['TestName'] ?></td>
						<td ><?php echo $r1['BillDate']."(".$r1['BillNO'].")" ?></td>
						
						</tr>
                        <?php
						
						
						 } ?>
                        
                        <tr>
                        <td><b>Medical Type</b></td>
                         <td><b>Medicine Name</b></td>
                         <td><b>Dosage Time</b></td>
                         <td><b>Drug Administrator</b></td>
                          <td><b>Days</b></td>
                          <td><b>Quantity</b></td>
                           <td><b>Indication</b></td>
                        </tr>
                        <?php
					   $p="select * from opdigitalmedical where mrno='$mrno' ";
					  $result=mysql_query($p) or die(mysql_error());
					   while($r=mysql_fetch_array($result)){
						   
					    
					    ?>
					   <tr>
                       <td><?php echo $r['mtype'] ?></td>
                       <td><?php echo $r['mname'] ?></td>
					   <td ><?php echo $r['dosagetime'] ?></td>
                        <td ><?php echo $r['drugadmin'] ?></td>
                         <td ><?php echo $r['days'] ?></td>
						 <td ><?php echo $r['qty'] ?></td>
                          <td ><?php echo $r['indication'] ?></td>
						
						</tr>
                        <?php
						
						
						 }?>
                        
                        <tr>
                        <tr>
							<td></td>
							<td class="label1"><label for="addr">Other Procedures Adviced/Suggestions :</label></td>
							<td> <?php echo $advices; ?></td>
						</tr>
                         <tr>
							<td></td>
							<td class="label1"><label for="addr">Review Date :</label></td>
							<td> <?php echo $reviewdate; ?></td>
						</tr>
						
					</table>
                    </tr>
                    </table>
			</div>
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