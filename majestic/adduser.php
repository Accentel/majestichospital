<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{
	$name=$_SESSION['name1'];

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	
	</head>

	<body>

  <?php /*?><?php
 if(isset($_REQUEST['submit'])){
 $abc1=$_POST['user_id'];
 $abc2=$_POST['pwd'];

 $qurey="insert into login(username,password) VALUES('$abc1','$abc2')";
 mysql_query($qurey)or die(mysql_error());
 if($qurey){
	 print"<script>";
	 print"alert('sucessfully Saved');";
	 print"</script>";

 }
 }
 ?><?php */?>
	<div id="conteneur">

		  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" style="height:auto;">
		<?php 
  $id=$_REQUEST['q'];
  
  $ksr=mysql_query("select * from login where ename='$id'") or die(mysql_error());
  $r1=mysql_fetch_array($ksr);
  $uname=$r1['name1'];
  $passowrd=$r1['passowrd'];
  
 ?>
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">User Management</div>
		  <form name="frm" method="post" action="user_insert.php">
			<table width="100%" border="0" cellpadding="2" cellspacing="0">
                    <tr >
                        <td width="40%" align="right" >Employee Name :</td>
                        <td width="60%"  align="left" >
                            <select  name="ename" id="ename" class="home_textbox" style="width:180px;" required>
                            <option value="">Select Emp Name</option>
                            <?php
							$qry="select * from hr_emp";
							$r=mysql_query($qry) or die(mysql_error());
							while($rt=mysql_fetch_array($r)){ ?>
								<option value="<?php echo $rt['EMP_CODE'] ?>"  <?php if($id==$rt['EMP_CODE']){echo 'selected';}?>><?php echo $rt['EMP_NAME'] ?></option>
								<?php		} ?>
                            </select>
                        </td>
                    </tr>            
                    <tr >
                        <td width="40%" align="right" >User Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="user_id" id="user_id" class="home_textbox" value="<?php echo $uname; ?>" readonly="readonly"/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Password :</td>
                        <td align="left">
                          <input type="text" name="pwd" id="pwd" class="home_textbox" value="<?php echo $passowrd; ?>" readonly="readonly"/>
                             <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['name1']; ?>" class="home_textbox"/>
                        </td>
                    </tr>
					<tr>
					<td align="left" colspan="2">
		<table width="100%" id="mainmenu" style="text-align:left;margin-left:20px;" cellpadding="0" cellspacing="0" border="0">
		<tr >
            <td colspan="8"><div align="center"><font color="#FF0000"><b>Main Menu</b></font></div></td>
            </tr>
		
		
        <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="2" />&nbsp;&nbsp; <b>SETTINGS</b>
        </div>
		<div class="checkcust" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="21" />&nbsp;&nbsp; Hospital Details<br>
			<input type="checkbox" name="menu[]" value="22" />&nbsp;&nbsp; Pharmacy Details<br>
			<input type="checkbox" name="menu[]" value="23" />&nbsp;&nbsp; Lab Details<br>
			<input type="checkbox" name="menu[]" value="24" />&nbsp;&nbsp; Location Setup<br>
            
            <input type="checkbox" name="menu[]" value="25" />&nbsp;&nbsp; Add Department<br>
			<input type="checkbox" name="menu[]" value="26" />&nbsp;&nbsp; Add Test Department<br>
			<input type="checkbox" name="menu[]" value="27" />&nbsp;&nbsp; Add Test<br>
			<input type="checkbox" name="menu[]" value="28" />&nbsp;&nbsp; Department Details<br>
            
            <input type="checkbox" name="menu[]" value="29" />&nbsp;&nbsp; Operation Theatre<br>
			<input type="checkbox" name="menu[]" value="200" />&nbsp;&nbsp; Concession Type<br>
			<input type="checkbox" name="menu[]" value="201" />&nbsp;&nbsp; Disease Details<br>
			           
            <input type="checkbox" name="menu[]" value="202" />&nbsp;&nbsp; Validity Days<br>
			<input type="checkbox" name="menu[]" value="203" />&nbsp;&nbsp; Add Customer<br>
			<input type="checkbox" name="menu[]" value="204" />&nbsp;&nbsp; Add Box<br>
			<input type="checkbox" name="menu[]" value="205" />&nbsp;&nbsp; Add Employee Department<br>
            
            <input type="checkbox" name="menu[]" value="206" />&nbsp;&nbsp; Add Employees<br>
			<input type="checkbox" name="menu[]" value="207" />&nbsp;&nbsp; User Management<br>
			
			
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="3" />&nbsp;&nbsp; <b>WARD</b>
        </div>
		<div class="checkprd" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="31" />&nbsp;&nbsp; Room Types<br>
			<input type="checkbox" name="menu[]" value="32" />&nbsp;&nbsp; Bed Types<br>
			<input type="checkbox" name="menu[]" value="33" />&nbsp;&nbsp; Room Tariff<br>
			<input type="checkbox" name="menu[]" value="34" />&nbsp;&nbsp; Bed Details<br>
			<input type="checkbox" name="menu[]" value="35" />&nbsp;&nbsp; Add Tariff<br>
            <input type="checkbox" name="menu[]" value="36" />&nbsp;&nbsp; Hospital Tariff<br>
		
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="4" />&nbsp;&nbsp; <b>DOCTOR</b>
        </div>
		<div class="checkqut" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="41" />&nbsp;&nbsp; Doctor Info<br>
			<input type="checkbox" name="menu[]" value="42" />&nbsp;&nbsp; Outside Consul. Tariff<br>
			<input type="checkbox" name="menu[]" value="43" />&nbsp;&nbsp; Referal Doctor<br>
			
			
		</div>
		</td>
        <td ></td>
        </tr>
		
        <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="5" />&nbsp;&nbsp; <b>RECEPTION</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="51" />&nbsp;&nbsp; Doctor Appointment<br>
			<input type="checkbox" name="menu[]" value="52" />&nbsp;&nbsp; Patient Registration<br>
            
            <input type="checkbox" name="menu[]" value="53" />&nbsp;&nbsp; Registration Card<br>
			<input type="checkbox" name="menu[]" value="54" />&nbsp;&nbsp; In Patient Admission<br>
            
            <input type="checkbox" name="menu[]" value="55" />&nbsp;&nbsp; In Patient Enquiry<br>
			<input type="checkbox" name="menu[]" value="56" />&nbsp;&nbsp; Out patient Digital Form<br>
            
            <input type="checkbox" name="menu[]" value="57" />&nbsp;&nbsp; IP Room Transfers<br>
			<input type="checkbox" name="menu[]" value="58" />&nbsp;&nbsp; Add Referal Patients Form<br>
                  
			
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="6" />&nbsp;&nbsp; <b>BILLING</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="61" />&nbsp;&nbsp; Advances<br>
            
            <input type="checkbox" name="menu[]" value="62" />&nbsp;&nbsp; Advances<br>
            <input type="checkbox" name="menu[]" value="63" />&nbsp;&nbsp; Final Bill<br>
            <input type="checkbox" name="menu[]" value="64" />&nbsp;&nbsp; Lab Bill<br>
            <input type="checkbox" name="menu[]" value="65" />&nbsp;&nbsp; OP Digital Lab Bill<br>
            <input type="checkbox" name="menu[]" value="66" />&nbsp;&nbsp; View  Bill/Pay Balance<br>
            <input type="checkbox" name="menu[]" value="67" />&nbsp;&nbsp; OP Cash Bill<br>
            <input type="checkbox" name="menu[]" value="68" />&nbsp;&nbsp; OP Cash  Bill View<br>
            <input type="checkbox" name="menu[]" value="69" />&nbsp;&nbsp; Lab Final Bill Summary<br>
		</div>
		</td>
        <td colspan="2" class="label1" ></td>
        
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="7" />&nbsp;&nbsp; <b>MHS BILLS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			
            
           
            <input type="checkbox" name="menu[]" value="71" />&nbsp;&nbsp; Final Bill<br>
            <input type="checkbox" name="menu[]" value="72" />&nbsp;&nbsp; Lab Bill<br>
            <input type="checkbox" name="menu[]" value="73" />&nbsp;&nbsp; View  Paitents List<br>
            <input type="checkbox" name="menu[]" value="74" />&nbsp;&nbsp; View  Result Entry<br>
            
		</div>
		</td>
        <td ></td>
        </tr>
        
        <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="8" />&nbsp;&nbsp; <b>CASE SHEET</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="81" />&nbsp;&nbsp; Patient Details<br>
			<input type="checkbox" name="menu[]" value="82" />&nbsp;&nbsp; Initial Assessment Sheet<br>
            
            <input type="checkbox" name="menu[]" value="83" />&nbsp;&nbsp; Admission Record<br>
			<input type="checkbox" name="menu[]" value="84" />&nbsp;&nbsp; Clinical Finding<br>
            
            <input type="checkbox" name="menu[]" value="85" />&nbsp;&nbsp; Diagnostics<br>
			<input type="checkbox" name="menu[]" value="86" />&nbsp;&nbsp; Activity Chart<br>
            
            <input type="checkbox" name="menu[]" value="87" />&nbsp;&nbsp; Sugar Chart<br>
			<input type="checkbox" name="menu[]" value="88" />&nbsp;&nbsp; Discharge Summary<br>  
             <input type="checkbox" name="menu[]" value="89" />&nbsp;&nbsp; Add Nurse Duty<br>
             <input type="checkbox" name="menu[]" value="890" />&nbsp;&nbsp; Case Sheet Reports<br>     
			
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="9" />&nbsp;&nbsp; <b>STORES</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="90" />&nbsp;&nbsp; <B>Masters</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="91" />&nbsp;&nbsp; UOM<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="92" />&nbsp;&nbsp; Product Type<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="93" />&nbsp;&nbsp; Supplier Information<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="94" />&nbsp;&nbsp; Supplier Amount<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="95" />&nbsp;&nbsp; Packing Information<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="96" />&nbsp;&nbsp; Product Details<br>
            <input type="checkbox" name="menu[]" value="97" />&nbsp;&nbsp; <B>TRANSACTIONS</B><br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="98" />&nbsp;&nbsp; Purchase Invoice<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="99" />&nbsp;&nbsp; Purchase Return<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="990" />&nbsp;&nbsp; Stock Adjustment<br>
            <input type="checkbox" name="menu[]" value="991" />&nbsp;&nbsp; <B>REPORTS</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="992" />&nbsp;&nbsp; Purchase Entry Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="993" />&nbsp;&nbsp; Purchase Return Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="994" />&nbsp;&nbsp; Supplier Items<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="995" />&nbsp;&nbsp; VAT Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="996" />&nbsp;&nbsp; Stock Position<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="997" />&nbsp;&nbsp; Medicine Shortlist<br> 
                 
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="998" />&nbsp;&nbsp; Search Medicine<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="999" />&nbsp;&nbsp; Compare Medicine Price<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9990" />&nbsp;&nbsp; Drug Expiry Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9991" />&nbsp;&nbsp; FSN Analysis<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9992" />&nbsp;&nbsp; ABC Analysis<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9993" />&nbsp;&nbsp; Total Store Stock<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9994" />&nbsp;&nbsp; Dept. Issues Report<br>  
            <input type="checkbox" name="menu[]" value="9995" />&nbsp;&nbsp; <B>REPORTS NEW</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9996" />&nbsp;&nbsp; DAY-SALES REPORT<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9997" />&nbsp;&nbsp; M-Sales Entry Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9998" />&nbsp;&nbsp; Drug Inspector Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9999" />&nbsp;&nbsp; Pharmacy Bill Summery<br>
                      
		</div>
		</td>
        <td colspan="2" class="label1" ></td>
        
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="10" />&nbsp;&nbsp; <b>PHARMACY</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="101" />&nbsp;&nbsp; Sales Entry<br>
            
           
            <input type="checkbox" name="menu[]" value="102" />&nbsp;&nbsp; OP Digital Sales Entry<br>
            <input type="checkbox" name="menu[]" value="103" />&nbsp;&nbsp; Sales Return<br>
            <input type="checkbox" name="menu[]" value="104" />&nbsp;&nbsp; Due Patient/Customer<br>
            <input type="checkbox" name="menu[]" value="105" />&nbsp;&nbsp; Sales Entry & Returns<br>
            <input type="checkbox" name="menu[]" value="106" />&nbsp;&nbsp; Sales Entry Report<br>
            <input type="checkbox" name="menu[]" value="107" />&nbsp;&nbsp; Sales Return Report<br>
            
		</div>
		</td>
        <td ></td>
        </tr>
  
       
               <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="11" />&nbsp;&nbsp; <b>LAB</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="111" />&nbsp;&nbsp; View  Paitents List<br>
			<input type="checkbox" name="menu[]" value="112" />&nbsp;&nbsp; View  Result Entry<br>
            
            <input type="checkbox" name="menu[]" value="113" />&nbsp;&nbsp; Select Report Test Wise<br>
			
                  
			
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="12" />&nbsp;&nbsp; <b>REPORTS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="121" />&nbsp;&nbsp; <B>RECEPTION</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="122" />&nbsp;&nbsp; Total Patiens List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="123" />&nbsp;&nbsp; Amount Collection Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="124" />&nbsp;&nbsp; In Patient Payment History<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="125" />&nbsp;&nbsp; Discharged Patients List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="126" />&nbsp;&nbsp; Admitted Patients List<br>
                
            <input type="checkbox" name="menu[]" value="12902" />&nbsp;&nbsp; <B>LAB</B><br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="127" />&nbsp;&nbsp; Total Patiens List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="128" />&nbsp;&nbsp; Amount Collection Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="129" />&nbsp;&nbsp; Dues List Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1290" />&nbsp;&nbsp; Test Reports<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12901" />&nbsp;&nbsp; Final Lab Bill Summary<br>
                 
                 
            <input type="checkbox" name="menu[]" value="12903" />&nbsp;&nbsp; <B>REFERAL DOCTOR</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1293" />&nbsp;&nbsp; Total Referal Doctors List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1294" />&nbsp;&nbsp; Referal Doctors Amount Collection<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1295" />&nbsp;&nbsp; Date WiseReferal Doctors Amount<br>
                  
            <input type="checkbox" name="menu[]" value="1296" />&nbsp;&nbsp; <B>OUT PATIENT REPORT</B><br>
            <input type="checkbox" name="menu[]" value="1297" />&nbsp;&nbsp; <B>ADMITTED PATIENT REPORT</B><br>
            
                
		</td>
        <td colspan="2" class="label1" ></td>
        
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="13" />&nbsp;&nbsp; <b>CERTIFICATES</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="131" />&nbsp;&nbsp; Birth Certificate<br>
            
           
            <input type="checkbox" name="menu[]" value="132" />&nbsp;&nbsp; Death Certificate<br>
            <input type="checkbox" name="menu[]" value="133" />&nbsp;&nbsp; Medical Certificate<br>
            
            
            <input type="checkbox" name="menu[]" value="134" />&nbsp;&nbsp; Brought Dead Certificate<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="135" />&nbsp;&nbsp; Death Certificate<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="136" />&nbsp;&nbsp; Form No 4<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="137" />&nbsp;&nbsp; Form No 4A<br>
            
            <input type="checkbox" name="menu[]" value="138" />&nbsp;&nbsp; Drug Indent Certificate<br>
            <input type="checkbox" name="menu[]" value="139" />&nbsp;&nbsp; Essentiality Certificate<br>
            <input type="checkbox" name="menu[]" value="1390" />&nbsp;&nbsp; Emergency Certificate<br>
            <input type="checkbox" name="menu[]" value="1391" />&nbsp;&nbsp; Medical Fitness Certificate<br>
            <input type="checkbox" name="menu[]" value="1392" />&nbsp;&nbsp; Potency Certificate<br>
            
		</div>
		</td>
        <td ></td>
        </tr>
 
 
  <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="14" />&nbsp;&nbsp; <b>ACCOUNTS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="141" />&nbsp;&nbsp; <B>EXPENSES</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="142" />&nbsp;&nbsp; Expenses Type<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="143" />&nbsp;&nbsp; Expenses List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="144" />&nbsp;&nbsp; Expenses Report<br>
                 
                
            <input type="checkbox" name="menu[]" value="145" />&nbsp;&nbsp; <B>REFERAL DOCTORS AMOUNT PAID</B><br>
                 
                 
                 
            <input type="checkbox" name="menu[]" value="146" />&nbsp;&nbsp; <B>REFERAL DOCTORS AMOUNT PAIDLIST</B><br>
            
                 
            
               </div> 
		</td>
        <td ></td>
        
        
        
        
        
        </tr>
  
       
                </table>
		</td>
		</tr>
 
 
 
 
 
 
 
 
 
 
 
 
 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='home.php'"/></td>
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

header('Location:index.php?authentication failed');

}

?>