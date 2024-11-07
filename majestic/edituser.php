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
			include("header1.php");
		?>
	
	</head>

	<body>

  <?php 
  $id=$_REQUEST['q'];
  
  $ksr=mysqli_query($link,"select * from login where ename='$id'") or die(mysqli_error($link));
  $r1=mysqli_fetch_array($ksr);
  $uname=$r1['name1'];
  $passowrd=$r1['passowrd'];
  
 ?>
	<div id="conteneur">

		  <!--<div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		-->	
			  <?php
			  include("logo.php");
				include("main_menu.php");
			  ?>
			   
		<div id="centre" style="height:auto;">
		
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
							$r=mysqli_query($link,$qry) or die(mysqli_error($link));
							while($rt=mysqli_fetch_array($r)){ ?>
								<option value="<?php echo $rt['EMP_CODE'] ?>" <?php if($id==$rt['EMP_CODE']){echo 'selected';}?>><?php echo $rt['EMP_NAME'] ?></option>
								<?php		} ?>
                            </select>
                        </td>
                    </tr>            
                    <tr >
                        <td width="40%" align="right" >User Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="user_id" id="user_id" class="home_textbox" value="<?php echo $uname; ?>"/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Password :</td>
                        <td align="left">
                            <input type="password" name="pwd" id="pwd" class="home_textbox" value="<?php echo $passowrd; ?>"/>
                       <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['name1']; ?>" class="home_textbox"/>
                        </td>
                    </tr>
					<tr>
					<td align="left" colspan="2">
		<table width="100%" id="mainmenu" style="text-align:left;margin-left:20px;" cellpadding="0" cellspacing="0" border="0">
		<tr >
            <td colspan="8"><div align="center"><font color="#FF0000"><b>Main Menu</b></font></div></td>
            </tr>
		
		<?php
		$t=mysqli_query($link,"select menus from hr_user where emp_id='$id'") or die(mysqli_error($link));
		while($row1 = mysqli_fetch_array($t)){
 $menu= $row1['menus'];
if($menu == "2"){$menu2="2";}
	if($menu == "21"){$menu21="21";}
	if($menu == "22"){$menu22="22";}
	if($menu == "23"){$menu23="23";}
	if($menu == "24"){$menu24="24";}
	if($menu == "25"){$menu25="25";}
	if($menu == "26"){$menu26="26";}
	if($menu == "27"){$menu27="27";}
	if($menu == "28"){$menu28="28";}
	if($menu == "29"){$menu29="29";}
	if($menu == "200"){$menu200="200";}
	if($menu == "201"){$menu201="201";}
	if($menu == "202"){$menu202="202";}
	if($menu == "203"){$menu203="203";}
	if($menu == "204"){$menu204="204";}
	if($menu == "205"){$menu205="205";}
	if($menu == "206"){$menu206="206";}
	if($menu == "207"){$menu207="207";}
	if($menu == "208"){$menu207="287";}
	if($menu == "209"){$menu207="209";}
	
	if($menu == "3"){$menu3="3";}
	if($menu == "31"){$menu31="31";}
	if($menu == "32"){$menu32="32";}
	if($menu == "33"){$menu33="33";}
	if($menu == "34"){$menu34="34";}
	if($menu == "35"){$menu35="35";}
	if($menu == "36"){$menu36="36";}
	if($menu=="37"){ $menu37="37";}
	
	
	
	if($menu == "4"){$menu4="4";}
	if($menu == "41"){$menu41="41";}
	if($menu == "42"){$menu42="42";}
	if($menu == "43"){$menu43="43";}
	
	if($menu == "5"){$menu5="5";}
	if($menu == "51"){$menu51="51";}
	if($menu == "52"){$menu52="52";}
	
	if($menu == "53"){$menu53="53";}
	if($menu == "54"){$menu54="54";}
	
	if($menu == "55"){$menu55="55";}
	if($menu == "56"){$menu56="56";}
	
	if($menu == "57"){$menu57="57";}
	if($menu == "58"){$menu58="58";}
	if($menu == "59"){$menu59="59";}
	if($menu == "541"){$menu541="541";}
	

	
	if($menu == "6"){$menu6="6";}
	if($menu == "61"){$menu61="61";}
	if($menu == "62"){$menu62="62";}
	if($menu == "63"){$menu63="63";}
	if($menu == "64"){$menu64="64";}
	if($menu == "65"){$menu65="65";}
	if($menu == "66"){$menu66="66";}
	if($menu == "67"){$menu67="67";}
	if($menu == "68"){$menu68="68";}
	if($menu == "69"){$menu69="69";}
	if($menu == "690"){$menu690="690";}
	
	if($menu == "7"){$menu7="7";}
	if($menu == "71"){$menu71="71";}
	if($menu == "72"){$menu72="72";}
	if($menu == "73"){$menu73="73";}
	if($menu == "74"){$menu74="74";}
	
	
	if($menu == "8"){$menu8="8";}
	if($menu == "81"){$menu81="81";}
	if($menu == "82"){$menu82="82";}
	if($menu == "83"){$menu83="83";}
	if($menu == "84"){$menu84="84";}
	if($menu == "85"){$menu85="85";}
	if($menu == "86"){$menu86="86";}
	if($menu == "87"){$menu87="87";}
	if($menu == "88"){$menu88="88";}
	if($menu == "89"){$menu89="89";}
	if($menu == "890"){$menu890="890";}
	if($menu == "891"){$menu891="891";}
	if($menu == "892"){$menu892="892";}
	
	if($menu == "9"){$menu9="9";}
	if($menu == "90"){$menu90="90";}
	if($menu == "91"){$menu91="91";}
	if($menu == "92"){$menu92="92";}
	if($menu == "93"){$menu93="93";}
	if($menu == "94"){$menu94="94";}
	if($menu == "95"){$menu95="95";}
	if($menu == "96"){$menu96="96";}
	if($menu == "97"){$menu97="97";}
	if($menu == "98"){$menu98="98";}
	if($menu == "99"){$menu99="99";}
	if($menu == "990"){$menu990="990";}
	if($menu == "991"){$menu991="991";}
	if($menu == "992"){$menu992="992";}
	if($menu == "993"){$menu993="993";}
	if($menu == "994"){$menu994="994";}
	if($menu == "995"){$menu995="995";}
	if($menu == "996"){$menu996="996";}
	if($menu == "997"){$menu997="997";}
	if($menu == "998"){$menu998="998";}
	if($menu == "999"){$menu999="999";}
	if($menu == "9990"){$menu9990="9990";}
	if($menu == "9991"){$menu9991="9991";}
	if($menu == "9992"){$menu9992="9992";}
	if($menu == "9993"){$menu9993="9993";}
	if($menu == "9994"){$menu9994="9994";}
	if($menu == "9995"){$menu9995="9995";}
	if($menu == "9996"){$menu9996="9996";}
	if($menu == "9997"){$menu9997="9997";}
	if($menu == "9998"){$menu9998="9998";}
	if($menu == "9999"){$menu9999="9999";}
	if($menu == "10"){$menu10="10";}
	
	if($menu == "101"){$menu101="101";}
	if($menu == "102"){$menu102="102";}
	if($menu == "103"){$menu103="103";}
	if($menu == "104"){$menu104="104";}
	if($menu == "105"){$menu105="105";}
	if($menu == "106"){$menu106="106";}
	if($menu == "107"){$menu107="107";}
	
	if($menu == "11"){$menu11="11";}
	if($menu == "111"){$menu111="111";}
	if($menu == "112"){$menu112="112";}
	if($menu == "113"){$menu113="113";}
	
	if($menu == "12"){$menu12="12";}
	if($menu == "121"){$menu121="121";}
	if($menu == "122"){$menu122="122";}
	if($menu == "123"){$menu123="123";}
	if($menu == "124"){$menu124="124";}
	if($menu == "125"){$menu125="125";}
	if($menu == "126"){$menu126="126";}
	if($menu == "127"){$menu127="127";}
	if($menu == "128"){$menu128="128";}
	if($menu == "129"){$menu129="129";}
	if($menu == "1290"){$menu1290="1290";}
	if($menu == "12901"){$menu12901="12901";}
	if($menu == "12902"){$menu12902="12902";}
	
	if($menu == "12903"){$menu12903="12903";}
	if($menu == "1293"){$menu1293="1293";}
	if($menu == "1294"){$menu1294="1294";}
	if($menu == "1295"){$menu1295="1295";}
	if($menu == "1296"){$menu1296="1296";}
	if($menu == "1297"){$menu1297="1297";}
	
	
if($menu == "13"){$menu13="13";}
	if($menu == "131"){$menu131="131";}
	if($menu == "132"){$menu132="132";}
	if($menu == "133"){$menu133="133";}
	if($menu == "134"){$menu134="134";}
	if($menu == "135"){$menu135="135";}
	if($menu == "136"){$menu136="136";}
	if($menu == "137"){$menu137="137";}
	if($menu == "138"){$menu138="138";}
	if($menu == "139"){$menu139="139";}
	if($menu == "1390"){$menu1390="1390";}
	if($menu == "1391"){$menu1391="1391";}
	if($menu == "1392"){$menu1392="1392";}	
	
	if($menu == "14"){$menu14="14";}
	if($menu == "141"){$menu141="141";}
	if($menu == "142"){$menu142="142";}
	if($menu == "143"){$menu143="143";}
	
	if($menu == "144"){$menu144="144";}
	if($menu == "145"){$menu145="145";}
	if($menu == "146"){$menu146="146";}
	if($menu == "601"){$menu601="601";}
	if($menu == "602"){$menu602="602";}
	if($menu == "541"){$menu541="541";}
	if($menu == "603"){$menu603="603";}
	if($menu == "604"){$menu604="604";}
	if($menu == "605"){$menu605="605";}
	if($menu == "606"){$menu606="606";}
	if($menu == "607"){$menu607="607";}
	if($menu == "608"){$menu608="608";}
	if($menu == "609"){$menu609="609";}
	if($menu == "100"){$menu100="100";}
	if($menu == "1002"){$menu1002="1002";}
	if($menu == "1003"){$menu1003="1003";}
	if($menu == "108"){$menu108="108";}
	
	if($menu == "1298"){$menu1298="1298";}
	if($menu == "1299"){$menu1299="1299";}
	if($menu == "1300"){$menu1300="1300";}
	if($menu == "1301"){$menu1301="1301";}
	if($menu == "1004"){$menu1004="1004";}
	//,
	
	
}

?>
		
        <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
           <input type="checkbox" name="menu[]"  value="2" <?php if($menu2=='2'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>SETTINGS</b>
        </div>
		<div class="checkcust" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="21" <?php if($menu21=='21'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Hospital Details<br>
			<input type="checkbox" name="menu[]" value="22" <?php if($menu22=='22'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Pharmacy Details<br>
			<input type="checkbox" name="menu[]" value="23" <?php if($menu23=='23'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Lab Details<br>
			<input type="checkbox" name="menu[]" value="24" <?php if($menu24=='24'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Location Setup<br>
            
            <input type="checkbox" name="menu[]" value="25" <?php if($menu25=='25'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Department<br>
			<input type="checkbox" name="menu[]" value="26" <?php if($menu26=='26'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Test Department<br>
			<input type="checkbox" name="menu[]" value="27" <?php if($menu27=='27'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Test<br>
			<input type="checkbox" name="menu[]" value="28" <?php if($menu28=='28'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Department Details<br>
            
            <input type="checkbox" name="menu[]" value="29" <?php if($menu29=='29'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Operation Theatre<br>
			<input type="checkbox" name="menu[]" value="200" <?php if($menu200=='200'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Concession Type<br>
			<input type="checkbox" name="menu[]" value="201" <?php if($menu201=='201'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Disease Details<br>
			           
            <input type="checkbox" name="menu[]" value="202" <?php if($menu202=='202'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Validity Days<br>
			<input type="checkbox" name="menu[]" value="203" <?php if($menu203=='203'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Customer<br>
			<input type="checkbox" name="menu[]" value="204" <?php if($menu204=='204'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Box<br>
			
			<input type="checkbox" name="menu[]" value="208" <?php if($menu208=='208'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Insurance<br>
			<input type="checkbox" name="menu[]" value="209" <?php if($menu209=='209'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Services<br>
			
			<input type="checkbox" name="menu[]" value="205" <?php if($menu205=='205'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Employee Department<br>
            
            <input type="checkbox" name="menu[]" value="206" <?php if($menu206=='206'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Employees<br>
			<input type="checkbox" name="menu[]" value="1004" <?php if($menu1004=='1004'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Change Password<br>
			
			<input type="checkbox" name="menu[]" value="207" <?php if($menu207=='207'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; User Management<br>
			
			
			
			
			
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="3" <?php if($menu3=='3'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>WARD</b>
        </div>
		<div class="checkprd" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		
		<input type="checkbox" name="menu[]" value="37" <?php if($menu37=='37'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Create Package<br>
			<input type="checkbox" name="menu[]" value="31" <?php if($menu31=='31'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Room Types<br>
			<input type="checkbox" name="menu[]" value="32" <?php if($menu32=='32'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Bed Types<br>
			<input type="checkbox" name="menu[]" value="33" <?php if($menu33=='33'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Room Tariff<br>
			<input type="checkbox" name="menu[]" value="34" <?php if($menu34=='34'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Bed Details<br>
			<input type="checkbox" name="menu[]" value="35" <?php if($menu35=='35'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Tariff<br>
            <input type="checkbox" name="menu[]" value="36" <?php if($menu36=='36'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Hospital Tariff<br>
		
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="4" <?php if($menu4=='4'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>DOCTOR</b>
        </div>
		<div class="checkqut" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="41" <?php if($menu41=='41'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Doctor Info<br>
			<input type="checkbox" name="menu[]" value="42" <?php if($menu42=='42'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Outside Consul. Tariff<br>
			<input type="checkbox" name="menu[]" value="43" <?php if($menu43=='43'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Referal Doctor<br>
			
			
		</div>
		</td>
        <td ></td>
        </tr>
		
        <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="5" <?php if($menu5=='5'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>RECEPTION</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="51" <?php if($menu51=='51'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Doctor Appointment<br>
			<input type="checkbox" name="menu[]" value="52" <?php if($menu52=='52'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Patient Registration<br>
            
            <input type="checkbox" name="menu[]" value="53" <?php if($menu53=='53'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Registration Card<br>
			<input type="checkbox" name="menu[]" value="54" <?php if($menu54=='54'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; In Patient Admission<br>
            <input type="checkbox" name="menu[]" value="541" <?php if($menu541=='541'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; In Patient Room Shifting<br>
            <input type="checkbox" name="menu[]" value="55" <?php if($menu55=='55'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; In Patient Enquiry<br>
            <input type="checkbox" name="menu[]" value="59" <?php if($menu59=='59'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Discharge Patients<br>
			<input type="checkbox" name="menu[]" value="56" <?php if($menu56=='56'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Out patient Digital Form<br>
            
            <input type="checkbox" name="menu[]" value="57" <?php if($menu57=='57'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; In Patient Room Shifting<br>
			<input type="checkbox" name="menu[]" value="58" <?php if($menu58=='58'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Referal Patients Form<br>
                  
			
			
			
            
			  
              
			
			
			
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="6" <?php if($menu6=='6'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>BILLING</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="61" <?php if($menu61=='61'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Advances<br>
            
           
            <input type="checkbox" name="menu[]" value="63" <?php if($menu63=='63'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Final Bill<br>
			 <input type="checkbox" name="menu[]" value="601" <?php if($menu601=='601'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Package Ip List<br>
			  <input type="checkbox" name="menu[]" value="602" <?php if($menu602=='602'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Package payment Ip List<br>
			   <input type="checkbox" name="menu[]" value="603" <?php if($menu603=='603'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Package Refund Amount<br>
			
			
            <input type="checkbox" name="menu[]" value="64" <?php if($menu64=='64'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Lab Bill<br>
            <input type="checkbox" name="menu[]" value="65" <?php if($menu65=='65'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; OP Digital Lab Bill<br>
             <input type="checkbox" name="menu[]" value="690" <?php if($menu690=='690'){echo "checked='checked'";} ?>/>&nbsp;
             &nbsp; IP Lab Bill<br>
            <input type="checkbox" name="menu[]" value="66" <?php if($menu66=='66'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; View  Bill/Pay Balance<br>
           
		   
		   
		   		   <input type="checkbox" name="menu[]" value="604" <?php if($menu604=='604'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Hospital Cash Bill<br>
            <input type="checkbox" name="menu[]" value="605" <?php if($menu605=='605'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Hospital Cash Bill View<br>
            <input type="checkbox" name="menu[]" value="606" <?php if($menu606=='606'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; General Cash  Bill<br>
            <input type="checkbox" name="menu[]" value="607" <?php if($menu607=='607'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; General Cash  Bill View<br>
		   <input type="checkbox" name="menu[]" value="608" <?php if($menu608=='608'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Package Extra Service Bill<br>
            <input type="checkbox" name="menu[]" value="609" <?php if($menu609=='609'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Package Extra Service Bill View<br>
		   
		   <input type="checkbox" name="menu[]" value="67" <?php if($menu67=='67'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; OP Cash Bill<br>
            <input type="checkbox" name="menu[]" value="68" <?php if($menu68=='68'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; OP Cash  Bill View<br>
            <input type="checkbox" name="menu[]" value="62" <?php if($menu62=='62'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Discharge Summary<br>
            <input type="checkbox" name="menu[]" value="69" <?php if($menu69=='69'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Lab Final Bill Summary<br>
		
		
		
		
		
		
		
		</div>
		</td>
        <td colspan="2" class="label1" ></td>
        
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="7" <?php if($menu7=='7'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>MHS BILLS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			
            
           
            <input type="checkbox" name="menu[]" value="71" <?php if($menu71=='71'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Final Bill<br>
            <input type="checkbox" name="menu[]" value="72" <?php if($menu72=='72'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Lab Bill<br>
            <input type="checkbox" name="menu[]" value="73" <?php if($menu73=='73'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; View  Paitents List<br>
            <input type="checkbox" name="menu[]" value="74" <?php if($menu74=='74'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; View  Result Entry<br>
            
		</div>
		</td>
        <td ></td>
        </tr>
        
        <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="8" <?php if($menu8=='8'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>CASE SHEET</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="81" <?php if($menu81=='81'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Patient Details<br>
			<input type="checkbox" name="menu[]" value="82" <?php if($menu82=='82'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Initial Assessment Sheet<br>
            
            <input type="checkbox" name="menu[]" value="83" <?php if($menu83=='83'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Admission Record<br>
			<input type="checkbox" name="menu[]" value="84" <?php if($menu84=='84'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Clinical Finding<br>
            
            <input type="checkbox" name="menu[]" value="85" <?php if($menu85=='85'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Diagnostics<br>
			<input type="checkbox" name="menu[]" value="86" <?php if($menu86=='86'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Activity Chart<br>
            <input type="checkbox" name="menu[]" value="891" <?php if($menu891=='891'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Nurse Chart<br>
            <input type="checkbox" name="menu[]" value="87" <?php if($menu87=='87'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Sugar Chart<br>
			<input type="checkbox" name="menu[]" value="88" <?php if($menu88=='88'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Discharge Summary<br>  
             <input type="checkbox" name="menu[]" value="89" <?php if($menu89=='89'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Nurse Duty<br>
              <input type="checkbox" name="menu[]" value="892" <?php if($menu892=='892'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Blood Component<br>
             <input type="checkbox" name="menu[]" value="890" <?php if($menu890=='890'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Case Sheet Reports<br>     
			
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="9" <?php if($menu9=='9'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>STORES</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="90" <?php if($menu90=='90'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>Masters</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="91" <?php if($menu91=='91'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; UOM<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="92" <?php if($menu92=='92'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Product Type<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="93" <?php if($menu93=='93'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Supplier Information<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="94" <?php if($menu94=='94'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Supplier Amount<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="95" <?php if($menu95=='95'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Packing Information<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="96" <?php if($menu96=='96'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Product Details<br>
            <input type="checkbox" name="menu[]" value="97" <?php if($menu97=='97'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>TRANSACTIONS</B><br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="98" <?php if($menu98=='98'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Purchase Invoice<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="99" <?php if($menu99=='99'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Purchase Return<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="990" <?php if($menu990=='990'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Stock Adjustment<br>
            <input type="checkbox" name="menu[]" value="991" <?php if($menu991=='991'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>REPORTS</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="992" <?php if($menu992=='992'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Purchase Entry Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="993" <?php if($menu993=='993'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Purchase Return Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="994" <?php if($menu994=='994'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Supplier Items<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="995" <?php if($menu995=='995'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; VAT Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="996" <?php if($menu996=='996'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Stock Position<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="997" <?php if($menu997=='997'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Medicine Shortlist<br> 
                 
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="998" <?php if($menu998=='998'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Search Medicine<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="999" <?php if($menu999=='999'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Compare Medicine Price<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9990" <?php if($menu9990=='9990'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Drug Expiry Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9991" <?php if($menu9991=='9991'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; FSN Analysis<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9992" <?php if($menu9992=='9992'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; ABC Analysis<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9993" <?php if($menu9993=='9993'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Total Store Stock<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9994" <?php if($menu9994=='9994'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Dept. Issues Report<br>  
            <input type="checkbox" name="menu[]" value="9995" <?php if($menu9995=='9995'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>REPORTS NEW</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9996" <?php if($menu9996=='9996'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; DAY-SALES REPORT<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9997" <?php if($menu9997=='9997'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; M-Sales Entry Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9998" <?php if($menu9998=='9998'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Drug Inspector Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9999" <?php if($menu9999=='9999'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Pharmacy Bill Summery<br>
                  
 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1002" <?php if($menu1002=='1002'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; GST Report<br>
                 
				  
		</div>
		</td>
        <td colspan="2" class="label1" ></td>
        
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="10" <?php if($menu10=='10'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>PHARMACY</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="101" <?php if($menu101=='101'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Sales Entry<br>
            
           
            <input type="checkbox" name="menu[]" value="102" <?php if($menu102=='102'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; OP Digital Sales Entry<br>
			<input type="checkbox" name="menu[]" value="108" <?php if($menu108=='108'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Discharge Summary Entry<br>
            <input type="checkbox" name="menu[]" value="103" <?php if($menu103=='103'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Sales Return<br>
            <input type="checkbox" name="menu[]" value="104" <?php if($menu104=='104'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Due Patient/Customer<br>
            <input type="checkbox" name="menu[]" value="105" <?php if($menu105=='105'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Sales Entry & Returns<br>
            <input type="checkbox" name="menu[]" value="106" <?php if($menu106=='106'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Sales Entry Report<br>
            <input type="checkbox" name="menu[]" value="107" <?php if($menu107=='107'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Sales Return Report<br>
            
		</div>
		</td>
        <td ></td>
        </tr>
  
       
               <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="11" <?php if($menu11=='11'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>LAB</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="111" <?php if($menu111=='111'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; View  Paitents List<br>
			<input type="checkbox" name="menu[]" value="112" <?php if($menu112=='112'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; View  Result Entry<br>
            
            <input type="checkbox" name="menu[]" value="113" <?php if($menu113=='113'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Select Report Test Wise<br>
			
                   
			
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="12" <?php if($menu12=='12'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>REPORTS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="121" <?php if($menu121=='121'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>RECEPTION</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="122" <?php if($menu122=='122'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Total Patiens List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="123" <?php if($menu123=='123'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Amount Collection Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="124" <?php if($menu124=='124'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; In Patient Payment History<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="125" <?php if($menu125=='125'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Discharged Patients List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="126" <?php if($menu126=='126'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Admitted Patients List<br>
                
            <input type="checkbox" name="menu[]" value="12902" <?php if($menu12902=='12902'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>LAB</B><br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="127" <?php if($menu127=='127'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Total Patiens List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="128" <?php if($menu128=='128'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Amount Collection Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="129" <?php if($menu129=='129'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Dues List Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1290" <?php if($menu1290=='1290'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Test Reports<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12901" <?php if($menu12901=='12901'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Final Lab Bill Summary<br>
                 
                 
            <input type="checkbox" name="menu[]" value="12903" <?php if($menu12903=='12903'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>REFERAL DOCTOR</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1293" <?php if($menu1293=='1293'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Total Referal Doctors List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1294" <?php if($menu1294=='1294'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Referal Doctors Amount Collection<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1295" <?php if($menu1295=='1295'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Date WiseReferal Doctors Amount<br>
                  
            <input type="checkbox" name="menu[]" value="1296" <?php if($menu1296=='1296'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>OUT PATIENT REPORT</B><br>
            <input type="checkbox" name="menu[]" value="1297" <?php if($menu1297=='1297'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>ADMITTED PATIENT REPORT</B><br>
             <input type="checkbox" name="menu[]" value="1298" <?php if($menu1298=='1298'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>Daily Amount Collection</B><br>
              <input type="checkbox" name="menu[]" value="1300" <?php if($menu1300=='1300'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>Daily Amount Pharmacy</B><br>           
	
               <input type="checkbox" name="menu[]" value="1301" <?php if($menu1301=='1301'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>D.A.C</B><br>
            <input type="checkbox" name="menu[]" value="1299" <?php if($menu1299=='1299'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>Day Amount Collection Summary</B><br>
            
                
		</td>
        <td colspan="2" class="label1" ></td>
        
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="13" <?php if($menu13=='13'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>CERTIFICATES</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="131" <?php if($menu131=='131'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Birth Certificate<br>
            
           
            <input type="checkbox" name="menu[]" value="132" <?php if($menu132=='132'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Death Certificate<br>
            <input type="checkbox" name="menu[]" value="133" <?php if($menu133=='133'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Medical Certificate<br>
            
            
            <input type="checkbox" name="menu[]" value="134" <?php if($menu134=='134'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Brought Dead Certificate<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="135" <?php if($menu135=='135'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Death Certificate<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="136" <?php if($menu136=='136'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Form No 4<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="137" <?php if($menu137=='137'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Form No 4A<br>
            
            <input type="checkbox" name="menu[]" value="138" <?php if($menu138=='138'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Drug Indent Certificate<br>
            <input type="checkbox" name="menu[]" value="139" <?php if($menu139=='139'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Essentiality Certificate<br>
            <input type="checkbox" name="menu[]" value="1390" <?php if($menu1390=='1390'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Emergency Certificate<br>
            <input type="checkbox" name="menu[]" value="1391" <?php if($menu1391=='1391'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Medical Fitness Certificate<br>
            <input type="checkbox" name="menu[]" value="1392" <?php if($menu1392=='1392'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Potency Certificate<br>
            
		</div>
		</td>
        <td ></td>
        </tr>
 
 
  <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="14" <?php if($menu14=='14'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>ACCOUNTS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="141" <?php if($menu141=='141'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>EXPENSES</B><br>
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="142" <?php if($menu142=='142'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Expenses Type<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="143" <?php if($menu143=='143'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Expenses List<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="144" <?php if($menu144=='144'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Expenses Report<br>
                 
                
            <input type="checkbox" name="menu[]" value="145" <?php if($menu145=='145'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>REFERAL DOCTORS AMOUNT PAID</B><br>
                 
                 
                 
            <input type="checkbox" name="menu[]" value="146" <?php if($menu146=='146'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <B>REFERAL DOCTORS AMOUNT PAIDLIST</B><br>
            
       
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