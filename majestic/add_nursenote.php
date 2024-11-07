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
	<script language="javascript" type="text/javascript" src="js/actb.js"></script>
<script language="javascript" type="text/javascript" src="actb2.js"></script>
<script language="javascript" type="text/javascript" src="js/common.js"></script>
    <script>
		 
	 
	// alert($(this).attr('data-row'));
	
	 
	
	 </script>
     <script type="text/javascript">



rows="2";
        function addRow(tableID) {   


		var actb4=document.getElementById("actb").value;
		var actb5=eval(actb4)+1;
	
		document.getElementById("actb").value=actb5;
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			document.form.rows.value=(rowCount);
			
            var cell1 = row.insertCell(0);   
            var element1 = document.createElement("input"); 
		    element1.type = "checkbox"; 
			element1.name = "checkbox1"; 
			element1.id= "checkbox1"; 
			element1.value = actb5; 
			cell1.appendChild(element1); 
            
			
	//oCell = document.createElement("TD");
  //  oCell.innerHTML = "<input  type='text' name='pname"+rowCount+"' id='pname' class='textbox1' size='22'  onblur=showBatch(this.value,"+actb5+")>";
  //
	
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<div id='date"+actb5+"'><input type='text' name='date[]' class='textbox1' id='date"+actb5+"' style='width:180px' value='<?php echo date('Y-m-d h:i') ?>' ></div>"; 
    row.appendChild(oCell);
	
	oCell = document.createElement("TD");
oCell.innerHTML = "<textarea  name='nursenote[]' id='nursenote"+actb5+"' rows='3' cols='30' class='textbox1'  ></textarea>"; 
    row.appendChild(oCell);
    
    oCell = document.createElement("TD");
	oCell.innerHTML = "<input type=text name='signature[]' id='signature"+actb5+"' style='width:180px' class='textbox1'   ><input type='hidden' name='id2[]' id='id2' value=''/>"; 
    row.appendChild(oCell);

	
	
	var obj = actb(document.getElementById('date'+actb5+''),customarray1);
        document.getElementById('date'+actb5+'').focus();
	   }
           function deleteRow(tableID) {  
         try {  
		
            var table = document.getElementById(tableID);
			var rowss1 = table.rows.length;  
                        if (rowss1>2){
		      for(var i=1; i<rowss1; i++) {   
                var row = table.rows[i];  
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {   
				  
		var chval=chkbox.value	
		//alert("chval"+chval);
		  
                    table.deleteRow(i); 
                   // rowss1 --;   
                    i--;
		} 
                document.form.rows.value=eval(i);
                document.getElementById("actb").value=eval(i);
             }
			 if(null != chkbox ) {   
			  alert ('You didnt choose any of the checkbox!');		
			  }
                        }
            }catch(e) {   
                
            }   
        }   
          
				

</script>
	</head>
	<body>
	<div id="conteneur" >
	  <?php include('logo.php'); ?>
		<?php
		include("main_menu.php");
		?>
	<div id="centre" style="height:auto;">
          <h1 style="color:red;" align="center">ADD NURSE NOTES</h1>
			<form action="nursenote_insert.php" name="form" method="post" autocomplete="off" enctype="multipart/form-data">
			<input name="actb" id="actb"  type="hidden" value="1"/>
					<table  width="80%"  style="margin-left:80px;" border="0" cellpadding="4" cellspacing="10">
						<?php 
						include("config.php");
						$id=$_REQUEST['id'];
						$sq=mysql_query("select * from patientregister where registerno='$id'");
						if($sq){
						while($res=mysql_fetch_array($sq)){
							$pname=$res['patientname'];
							$age=$res['age'];
							$sex=$res['gender'];
							$refdoctor=$res['ref_doc'];
							$mrno=$res['registerno'];
							$optype=$res['pat_type'];
							$date1=$res['date1'];
							$a6=$res['id'];
							$consult_doct=$res['doctorname'];
							 }
							 
						 }?>
						<tr>
							<td></td>
							<td class="label1"><label for="cname">UMR No :</label></td>
							<td><input name="mrno" id="mrno" type="text" class="text" value="<?php echo $mrno?>" readonly="readonly"/></td>
                            
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
                        
						</table>
                         <table id="t1" width="90%">
                         <tr>
                    		<td align="center">
                        	 <table width="93%" class="ruler" id="dataTable" summary="Table of my records" align="center" >
                         	 <thead>
                            <tr>
                             <th width="1" class="TH1"></th>
                         <th>Date & Time</th>
                         <th>Nurse Notes</th>
                         <th>Signature With Name</th>
                         
                         </tr>
                         </thead>
                          <tbody>
                              <tr>
                         
                         <?php 
						$p1="select * from nursenote where mrno='$mrno' ";
					  $result1=mysql_query($p1) or die(mysql_error());
					   while($r1=mysql_fetch_array($result1)){
						   
					    
					    ?>
					    <tr>
                        <td><input type="checkbox" id="checkbox1" name="checkbox1" value="1"/></td>
                       <td><input type="text" name="date[]" id="date" value="<?php echo $r1['date1'] ?>"/></td>
                      
					   <td ><textarea name="nursenote[]" id="nursenote" ><?php echo $r1['norsenote'] ?></textarea></td>
                       <td ><input type="text" name="signature[]" id="signature" value="<?php echo $r1['signature'] ?>"/>
                       <input type="hidden" name="id2[]" id="id2" value="<?php echo $r1['id'] ?>"/></td>
						
						
						</tr>
                        <?php
						
						
						 } 
						
						
						?>
                        </tbody>
                        </table>
                   </td>
                    <td valign="top"><input name="new" type="button" class="butnbg1" value="  +  "  onclick="addRow('dataTable')"/></td>
					<td valign="top"><input name="new" type="button" class="butnbg1" value=" -  " onclick="deleteRow('dataTable')"/>
					</td>
                     </tr>
              </table></td>
            </tr>
            </table>
                        
                     <input type="hidden" name="rows" id="rows" value="1" onclick="javasript:noitems()"/>   
                        
                        
                        
                        
                        
                       
                        
							<td colspan="4" style="padding-left:350px;" ><input type="submit" name="submit" class="butt" value="Save"/>&nbsp;<input type="button" class="butt" value="Close" onclick="window.location.href='add_iplist.php'"/></td>
					   </tr>
					
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
$(".addmore").on('click',function(){
     
	
   
            
 var   data ="<table widh='100%' class='form-group'><tr><td><input type='checkbox' class='case tcal'/><input type='text' class='text print-type1' id='date"+i+"' data-row='"+i+"' name='date[]' /></td><td><textarea  class=' ' id='nursenote"+i+"' data-row='"+i+"' name='nursenote[]' ></textarea></td><td><input type='text' class=' ' id='signature"+i+"' data-row='"+i+"' name='signature[]' placeholder='Dosage Time' style='width:90px;'/><input type='hidden' class=' ' id='id"+i+"' data-row='"+i+"' name='id[]' placeholder='Route ' style='width:90px;'/></td>";
   data +="<input type='hidden' name='ksr[]' value='1'/>";
    data +="</tr></table>";
	$('.osu').append(data);
	i++;
});


var i=2;
$(".addmore2").on('click',function(){
     
	var data ="<div class='form-group'>";
   
    data +="<div class='col-sm-6'>";          
    data +="<input type='checkbox' class='case'/><input type='text' class='text print-type' id='tname"+i+"' data-row='"+i+"' name='tname[]' />";
   data +="<input type='hidden' name='ksr[]' value='1'/>";
    data +="</div></div>";
	$('.osu2').append(data);
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