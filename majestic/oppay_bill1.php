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
    oCell.innerHTML = "<div align='center' ><input  type='text' class='text' name='cost[]' id='cost"+Row+"'  readonly/> </div>"; 
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

<script type="text/javascript">
tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('time').value=" "+nhour+":"+nmin+":"+nsec+ap+"";

setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>
	</head>

	<body>
<?php 
$id=$_REQUEST['id'];
$query=mysql_query("select * from patientregister where registerno='$id'") or die(mysql_error());

$row=mysql_fetch_array($query);
$mrno=$row['registerno'];
$date=$row['registerdate'];
//$d=date('Y-m-d',strtotime($date));
$age=$row['age'];
$phoneno=$row['phoneno'];
$doctorname=$row['doctorname'];
$gender=$row['gender'];
$pat_type=$row['pat_type'];
$pname=$row['pname_type']." .".$row['patientname'];


?>
  
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
			$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str = "BL-".$dt3."-";
			$sql = mysql_query("select count(distinct BillNO),BillDate from bill4 where BillNO like '$str%'");
			if($sql){
				$res = mysql_fetch_array($sql);
				$d1=$res['BillDate'];
				$d=date('Y-m-d',strtotime($d1));
				$c = $res[0];
				$bno = $str.($c+1);
			}
		?>
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Lab Bill</div>
		  <form name="myform" method="post" action="insert_bill.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                        <tr >
                        <td align="right" >UMR No. :</td>
                        <td align="left" >
                            <input type="text" name="mrno" id="mrno"  class="text" value="<?php echo $mrno; ?>"/>
                        </td>
						 
                    </tr>         
                    <tr >
                        <td align="right" >Bill No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" id="bno" value="<?php echo $bno ?>" readonly class="text"/>
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" id="bdate" style="width:188px;height:20px;" value="<?php echo $d; ?>"  readonly />
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
							
                            <input type="text" name="pname" id="pname" class="text" required value="<?php echo $pname; ?>" readonly="readonly"/>
                        </td>
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" name="age" id="age" style="width:100px;height:18px;" value="<?php echo $age; ?>" required readonly/>
							<select name="suf" id="suf" style="width:80px;height:24px;">
							<option value="Years"> Years </option>
							<option value="Months"> Months </option>
							<option value="Days"> Days </option>
							
							</select>
						</td>
                    </tr>
					<tr >
                        <td align="right" >Gender :</td>
                        <td align="left" >
                            <input type="text" name="gender" required id="gender" value="<?php echo $gender; ?>" style="width:188px;height:24px;" readonly>
								
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <input type="text" required name="dname" id="dname" value="<?php echo $doctorname; ?>" style="width:188px;height:24px;" readonly/>
							
                        </td>
                    </tr>
					<tr >
                     <td align="right" >Phone No :</td>
                        <td align="left" >
                            <input type="text" name="mno" id="mno" class="text" value="<?php echo $phoneno; ?>" required readonly/>
                        </td>
                        
						<td align="right" >Patient Type :</td>
                        <td align="left" >
                            <input type="text" name="ptype" id="ptype" value="<?php echo $pat_type; ?>" style="width:188px;height:24px;" readonly/>
								
                        </td>
					</tr>	
					<tr >
                       
						<td align="right" >Time :</td>
                        <td align="left" >
                            <input type="text" name="time" id="time" class="text"  required readonly/>
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
					   </tr>
					   </thead>
                       <?php
					    $p="select a.TestName,a.BillDate,a.mrno,b.TestName,b.Amount    from bill4 a,testdetails b where
					    a.TestName=b.TestName and a.mrno='$id' and a.BillDate='$d'";
					$result=mysql_query($p) or die(mysql_error());
					$pam=0;
					   while($r=mysql_fetch_array($result)){
						   $amount=$r['Amount'];
					    $pam=$pam+$amount;
					    ?>
					   <tr>
					   <td ><input type="text" class="text" name="tname[]"  id="cname1" value="<?php echo $r['TestName'] ?>" readonly="readonly"  required/></td>
						<td ><input type="text" class="text" name="cost[]" id="cost1" value="<?php echo $r['Amount'] ?>" readonly="readonly"  class="txt"/></td>
						
						</tr>
                        <?php
						
						
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
					<tr >
                        <td align="right" >Total Amount :</td>
                        <td align="left" >
                            <input type="text" name="tot"  readonly="readonly" value="<?php echo $pam ?>"  id="tot" class="text"/>
                        </td>
						 <td align="right" >Discount :</td>
                        <td align="left" >
                            <input type="text" name="conamt"  value="0" id="conamt" onkeyup="paidamt()" class="text" />
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Net Amount :</td>
                        <td align="left" >
                            <input type="text" name="price"   id="price" class="text" value="<?php echo $pam ?>"/>
                        </td>
						 <td align="right" >Paid Amount :</td>
                        <td align="left" >
                            <input type="text" name="paid"  value="0" onkeyup="paidamt()" id="paid" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Balance Amount :</td>
                        <td align="left" >
                            <input type="text" name="bal"   onkeyup="paidamt()" value="<?php echo $pam ?>" id="bal" class="text"/>
                        </td>
						<td align="right" >Remarks :</td>
                        <td align="left" >
                            <textarea name="remarks" rows="3" cols="28"></textarea>
							<input type="hidden" name="user" value="<?php echo $_SESSION['name1']; ?>"/>
                        </td>
						
                    </tr>
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='new_lab_bill.php'"/></div>
        
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