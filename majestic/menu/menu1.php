<style>
*{margin:0;padding:0;text-decoration:none}

header{position:relative;width:100%;background:#003366;}
.logo{position:relative;z-index:123;padding:10px;font:18px verdana;color:#6DDB07;float:left;width:15%}
.logo a{color:#6DDB07;}
nav{position:relative;width:/*980px*/100%;margin:0 auto; height:46px !important;}
#cssmenu,#cssmenu ul,#cssmenu ul li,#cssmenu ul li a,#cssmenu #head-mobile{border:0;list-style:none;line-height:1;display:block;position:relative;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
#cssmenu:after,#cssmenu > ul:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0}
#cssmenu #head-mobile{display:none}
#cssmenu{font-family:sans-serif;background:#003366}
#cssmenu > ul > li{float:left}
#cssmenu > ul > li > a{padding:17px;font-size:12px;letter-spacing:1px;text-decoration:none;color:#ddd;font-weight:700;
     /*background: url(images/main-delimiter.png);*/ background-color:#003366; 98% 4px no-repeat;}
#cssmenu > ul > li:hover > a,#cssmenu ul li.active a{color:#fff}
#cssmenu > ul > li:hover,#cssmenu ul li.active:hover,#cssmenu ul li.active,#cssmenu ul li.has-sub.active:hover{background:#003366/*448D00*/!important;-webkit-transition:background .3s ease;-ms-transition:background .3s ease;transition:background .3s ease;}
#cssmenu > ul > li.has-sub > a{padding-right:/*30*/25px}
#cssmenu > ul > li.has-sub > a:after{position:absolute;top:22px;right:11px;width:8px;height:2px;display:block;background:#ddd;content:''}
#cssmenu > ul > li.has-sub > a:before{position:absolute;top:19px;right:14px;display:block;width:2px;height:8px;background:#ddd;content:'';-webkit-transition:all .25s ease;-ms-transition:all .25s ease;transition:all .25s ease}
#cssmenu > ul > li.has-sub:hover > a:before{top:23px;height:0}
#cssmenu ul ul{position:absolute;left:-9999px}
#cssmenu ul ul li{height:0;-webkit-transition:all .25s ease;-ms-transition:all .25s ease;background:#333;transition:all .25s ease}
#cssmenu ul ul li:hover{}
#cssmenu li:hover > ul{left:auto}
#cssmenu li:hover > ul > li{height:35px}
#cssmenu ul ul ul{margin-left:100%;top:0}
#cssmenu ul ul li a{border-bottom:1px solid rgba(150,150,150,0.15);padding:11px 15px;width:150px;font-size:12px;text-decoration:none;color:#ddd;font-weight:400; background-color:#003366 !important; }
#cssmenu ul ul li:last-child > a,#cssmenu ul ul li.last-item > a{border-bottom:0}
#cssmenu ul ul li:hover > a,#cssmenu ul ul li a:hover{color:#fff}
#cssmenu ul ul li.has-sub > a:after{position:absolute;top:16px;right:11px;width:8px;height:2px;display:block;background:#ddd;content:''}
#cssmenu ul ul li.has-sub > a:before{position:absolute;top:13px;right:14px;display:block;width:2px;height:8px;background:#ddd;content:'';-webkit-transition:all .25s ease;-ms-transition:all .25s ease;transition:all .25s ease}
#cssmenu ul ul > li.has-sub:hover > a:before{top:17px;height:0}
#cssmenu ul ul li.has-sub:hover,#cssmenu ul li.has-sub ul li.has-sub ul li:hover{background:#363636;}
#cssmenu ul ul ul li.active a{border-left:1px solid #333}
#cssmenu > ul > li.has-sub > ul > li.active > a,#cssmenu > ul ul > li.has-sub > ul > li.active> a{border-top:1px solid #333}

@media screen and (max-width:1000px){
.logo{position:absolute;top:0;left: 0;width:100%;height:46px;text-align:center;padding:10px 0 0 0 ;float:none}
.logo2{display:none}
nav{width:100%;}
#cssmenu{width:100%}
#cssmenu ul{width:100%;display:none}
#cssmenu ul li{width:100%;border-top:1px solid #444}
#cssmenu ul li:hover{background:#363636;}
#cssmenu ul ul li,#cssmenu li:hover > ul > li{height:auto}
#cssmenu ul li a,#cssmenu ul ul li a{width:100%;border-bottom:0}
#cssmenu > ul > li{float:none}
#cssmenu ul ul li a{padding-left:25px}
#cssmenu ul ul li{background:#333!important;}
#cssmenu ul ul li:hover{background:#363636!important}
#cssmenu ul ul ul li a{padding-left:35px}
#cssmenu ul ul li a{color:#ddd;background:none}
#cssmenu ul ul li:hover > a,#cssmenu ul ul li.active > a{color:#fff}
#cssmenu ul ul,#cssmenu ul ul ul{position:relative;left:0;width:100%;margin:0;text-align:left}
#cssmenu > ul > li.has-sub > a:after,#cssmenu > ul > li.has-sub > a:before,#cssmenu ul ul > li.has-sub > a:after,#cssmenu ul ul > li.has-sub > a:before{display:none}
#cssmenu #head-mobile{display:block;padding:23px;color:#ddd;font-size:12px;font-weight:700}
.button{width:55px;height:46px;position:absolute;right:0;top:0;cursor:pointer;z-index: 12399994;}
.button:after{position:absolute;top:22px;right:20px;display:block;height:4px;width:20px;border-top:2px solid #dddddd;border-bottom:2px solid #dddddd;content:''}
.button:before{-webkit-transition:all .3s ease;-ms-transition:all .3s ease;transition:all .3s ease;position:absolute;top:16px;right:20px;display:block;height:2px;width:20px;background:#ddd;content:''}
.button.menu-opened:after{-webkit-transition:all .3s ease;-ms-transition:all .3s ease;transition:all .3s ease;top:23px;border:0;height:2px;width:19px;background:#fff;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-ms-transform:rotate(45deg);-o-transform:rotate(45deg);transform:rotate(45deg)}
.button.menu-opened:before{top:23px;background:#fff;width:19px;-webkit-transform:rotate(-45deg);-moz-transform:rotate(-45deg);-ms-transform:rotate(-45deg);-o-transform:rotate(-45deg);transform:rotate(-45deg)}
#cssmenu .submenu-button{position:absolute;z-index:99;right:0;top:0;display:block;border-left:1px solid #444;height:46px;width:46px;cursor:pointer}
#cssmenu .submenu-button.submenu-opened{background:#262626}
#cssmenu ul ul .submenu-button{height:34px;width:34px}
#cssmenu .submenu-button:after{position:absolute;top:22px;right:19px;width:8px;height:2px;display:block;background:#ddd;content:''}
#cssmenu ul ul .submenu-button:after{top:15px;right:13px}
#cssmenu .submenu-button.submenu-opened:after{background:#fff}
#cssmenu .submenu-button:before{position:absolute;top:19px;right:22px;display:block;width:2px;height:8px;background:#ddd;content:''}
#cssmenu ul ul .submenu-button:before{top:12px;right:16px}
#cssmenu .submenu-button.submenu-opened:before{display:none}
#cssmenu ul ul ul li.active a{border-left:none}
#cssmenu > ul > li.has-sub > ul > li.active > a,#cssmenu > ul ul > li.has-sub > ul > li.active > a{border-top:none}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
(function($) {
$.fn.menumaker = function(options) {  
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) { 
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   cssmenu.find('li ul').parent().addClass('has-sub');
multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 1000;
     if ($( window ).width() > mediasize) {
       cssmenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       cssmenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);
 });
  };
})(jQuery);

(function($){
$(document).ready(function(){
$("#cssmenu").menumaker({
   format: "multitoggle"
});
});
})(jQuery);
</script>

<?php
include("config.php");
if($name != "admin"){
  $emp_id = $name;
$r=mysqli_query($link,"select ename from login where name1='$emp_id'") or die(mysqli_error($link));
$row=mysqli_fetch_array($r);
 $empname=$row['ename'];
  $p="SELECT D.menus FROM hr_user as D,login as M  WHERE D.emp_id=M.ename and D.emp_id='$empname' ";
$sql = mysqli_query($link,$p) or die(mysqli_error($link));
if($sql){
$i=0;
while($row = mysqli_fetch_array($sql)){
$menu= $row[0];
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
	if($menu == "1004"){$menu1004="1004";}
	if($menu == "222"){$menu222="222";}
		if($menu == "223"){$menu223="223";}
	if($menu == "1300"){$menu1300="1300";}
	if($menu == "1301"){$menu1301="1301";}
	//,
	
	
}
}
?>
<header>
<nav id='cssmenu'>

<div id="head-mobile"></div>
<div class="button"></div>
<ul>
 
        
         <?php if($menu2 == "2"){ ?>  <li><a href="#" class="parent"><span>Settings</span></a>
            <ul>
              <?php if($menu21 == "21"){ ?>  <li><a href="org.php"><span>Hospital Details</span></a></li><?php }?>
             <?php if($menu22 == "22"){ ?>   <li><a href="pharmacydetailsview.php"><span>Pharmacy Details</span></a></li><?php }?>
              <?php if($menu23 == "23"){ ?>  <li><a href="lab_details.php"><span>Lab Details</span></a></li><?php }?>
				<?php if($menu24 == "24"){ ?><li><a href="locationview.php"><span>Location Setup</span></a></li><?php }?>
                <?php if($menu25 == "25"){ ?><li><a href="dept.php"><span>Add Department </span></a></li><?php }?>
               <?php if($menu26 == "26"){ ?>  <li><a href="new_dept.php"><span>Add Test Department </span></a></li><?php }?>
              <?php if($menu27 == "27"){ ?>   <li><a href="new_test.php"><span>Add Test </span></a></li><?php }?>
              <?php if($menu28 == "28"){ ?>  <li><a href="deptview.php"><span>Department Details</span></a></li><?php }?>
              <?php if($menu29 == "29"){ ?>  <li><a href="optheaterview.php"><span>Operation Theatre</span></a></li><?php }?>
			<?php if($menu200 == "200"){ ?>	<li><a href="concessionview.php"><span>Concession Type</span></a></li><?php }?>
              <?php if($menu201 == "201"){ ?>  <li><a href="disease_history.php"><span>Disease Details</span></a></li><?php }?>
          
			<?php if($menu203 == "203"){ ?>	<li><a href="validity_days.php"><span>Validity Days</span></a></li><?php }?>
              <?php if($menu204 == "204"){ ?>  <li><a href="customerview.php"><span>Add Customer</span></a></li><?php }?>
             <?php if($menu205 == "205"){ ?>   <li><a href="boxview.php"><span>Add Box</span></a></li><?php }?>
             
              <?php if($menu208 == "208"){ ?><li><a href="insurance.php"><span>Add Insurance</span></a></li><?php }?>
                 <?php if($menu209 == "209"){ ?> <li><a href="services_view1.php"><span>Add Services</span></a></li><?php }?>
             
 <?php if($menu206 == "206"){ ?><li><a href="empdept.php"><span>Add Employee Department</span></a></li><?php }?>
			<?php if($menu207 == "207"){ ?>	<li><a href="pemployee.php"><span>Add Employees</span></a></li><?php }?>
                
                
				<!--<li><a href="pemployee.php"><span>Add Employees</span></a></li>-->
				<?php if($menu1004 == "1004"){ ?>				<li><a href="change_pwd.php"><span>Change Password</span></a></li><?php }?>
            <?php if($menu21 == "21"){ ?>    <li><a href="user.php"><span>User Management</span></a></li><?php }?>
            </ul>
        </li>
        <?php } ?>
       <?php if($menu3 == "3"){ ?>  <li><a href="#" class="parent"><span>Ward</span></a>
            <ul>
			<?php if($menu37 == "37"){ ?> <li><a href="package.php"><span>Create Package</span></a></li> <?php }?>
			 
               <?php if($menu31 == "31"){ ?> <li><a href="room_type.php"><span>Room Types</span></a></li> <?php }?>
              <?php if($menu32 == "32"){ ?>  <li><a href="bed_type.php"><span>Bed Types</span></a></li> <?php }?>
              <?php if($menu33 == "33"){ ?>  <li><a href="room_tariff.php"><span>Room Tariff</span></a></li> <?php }?>
             <?php if($menu34 == "34"){ ?>   <li><a href="bed_details.php"><span>Bed Details</span></a></li> <?php }?>
               <?php if($menu35 == "35"){ ?>  <li><a href="uom_list1.php"><span>Add Tariff</span></a></li> <?php }?>
              <?php if($menu36 == "36"){ ?>   <li><a href="bed_details1.php"><span>Hospital Tariff</span></a></li> <?php }?>
            </ul>
        </li><?php } ?>
		 <?php if($menu4 == "4"){ ?> <li><a href="#" class="parent"><span>Doctor</span></a>
            <ul>
               <?php if($menu41 == "41"){ ?> <li><a href="doctor_list.php"><span>Doctor Info</span></a></li><?php }?>
              
                <?php if($menu42 == "42"){ ?><li><a href="outside_consultant.php"><span>Outside Consul. Tariff</span></a></li><?php }?>
              <?php if($menu43 == "43"){ ?> <li><a href="referal_doctor.php"><span>Referal Doctor</span></a></li><?php }?>
            </ul>
        </li><?php } ?>
       <?php if($menu5 == "5"){ ?> <li><a href="#" class="parent"><span>Reception</span></a>
            <ul>
                <?php if($menu51 == "51"){ ?> <li><a href="appointment_reg.php"><span>Doctor Appointment</span></a></li><?php }?>
               <?php if($menu52 == "52"){ ?> <li><a href="patient-reg.php"><span>Patient Registration</span></a></li><?php }?>
              <?php if($menu53 == "53"){ ?>   <li><a href="registration_card.php"><span>Registration Card</span></a></li><?php }?>
              <?php if($menu54 == "54"){ ?>   <li><a href="in_patient_admit.php"><span>In Patient Admission</span></a></li><?php }?>
			  
			  <?php if($menu541 == "541"){ ?>  <li><a href="casesheet.php"><span>In Patient Room Shifting</span></a></li><?php }?>
			  
              <?php if($menu55 == "55"){ ?>   <li><a href="in_patient_admit.php"><span>In Patient Enquiry   </span></a></li><?php }?>
                 <?php if($menu59 == "59"){ ?>   <li><a href="discharge_patients1.php"><span>Discharge Patients   </span></a></li><?php }?>
              <?php if($menu56 == "56"){ ?>   <li><a href="in_patient_enquiry.php"><span>Out patient Digital Form</span></a></li><?php }?>
              <?php if($menu57 == "57"){ ?>    <li><a href="opdigital_reg.php"><span>In Patient Room Shifting</span></a></li><?php }?>
              <?php if($menu58 == "58"){ ?>     <li><a href="referalpatientslist.php"><span>Add Referal Patients Form</span></a></li><?php }?>
               <?php if($menu223 == "223"){ ?>  <li><a href="op_cancel.php"><span>Op Cancellation</span></a></li><?php }?>
              
                 
                 </ul>
        </li><?php } ?>
     <?php if($menu6 == "6"){ ?>   <li><a href="#" class="parent"><span>Billing</span></a>
            <ul>
 <?php if($menu61 == "61"){ ?><li><a href="advance_collections.php"><span>Advances</span></a></li><?php } ?>
 <?php if($menu63 == "63"){ ?><li><a href="final_bill.php"><span>Final Bill</span></a></li><?php } ?>
 <?php if($menu601 == "601"){ ?><li><a href="ppatients.php"><span>Package Ip List</span></a></li><?php } ?>
 <?php if($menu602 == "602"){ ?><li><a href="ppaypatients.php"><span>Package payment Ip List</span></a></li><?php } ?>
 <?php if($menu603 == "603"){ ?><li><a href="prefundamountlist.php"><span>Package Refund Amount</span></a></li><?php } ?>
 
 <?php if($menu64== "64"){ ?><li><a href="pay_bill.php"><span>Lab Bill</span></a></li><?php } ?>
 <?php if($menu65 == "65"){ ?><li><a href="opdigitallab_reg.php"><span>OP Digital Lab Bill</span></a></li><?php } ?>
 <?php if($menu690 == "690"){ ?><li><a href="opdigitallab_regk.php"><span>IP Lab Bill</span></a></li><?php } ?>
  <?php if($menu66 == "66"){ ?><li><a href="new_lab_bill.php"><span>View  Bill/Pay Balance</span></a></li><?php } ?>
  
  
 <?php if($menu604 == "604"){ ?><li><a href="hbill.php"><span>Hospital Cash Bill</span></a></li><?php } ?>
 <?php if($menu605 == "605"){ ?><li><a href="view_hbill.php"><span>Hospital Cash Bill View</span></a></li><?php } ?>
 
  <?php if($menu606 == "606"){ ?><li><a href="opbill.php"><span>General Cash  Bill</span></a></li><?php } ?>
 <?php if($menu607 == "607"){ ?><li><a href="view_opbill.php"><span>General Cash  Bill View</span></a></li><?php } ?>
 
 <?php if($menu608 == "608"){ ?><li><a href="packagebill.php"><span>Package Extra Service Bill</span></a></li><?php } ?>
 <?php if($menu609 == "609"){ ?><li><a href="view_packagebill.php"><span>Package Extra Service Bill View</span></a></li><?php } ?>
 

 
 
 <?php if($menu67 == "67"){ ?><li><a href="opbill.php"><span>OP Cash Bill</span></a></li><?php } ?>
 <?php if($menu68 == "68"){ ?><li><a href="view_opbill.php"><span>OP Cash  Bill View</span></a></li><?php } ?>
 <?php if($menu62 == "62"){ ?><li><a href="discharge_view.php"><span>Dicharge Summary</span></a></li><?php } ?>
 <?php if($menu69 == "69"){ ?><li><a href="labbill.php"><span>Lab Final Bill Summary</span></a></li><?php } ?>

 </ul>
        </li><?php } ?>
		
		
		 <?php if($menu11 == "11"){ ?><li><a href="#"><span>Lab</span></a>
                
                <ul>
              <?php if($menu111 == "111"){ ?>   <li><a href="view_paitients.php"><span>View  Paitents List</span></a></li> <?php }?>
               <?php if($menu112 == "112"){ ?>  <li><a href="result_entry.php"><span>View  Result Entry</span></a></li> <?php }?>
              <?php if($menu113 == "113"){ ?>  <li><a href="report_result.php"><span>Select Report Test Wise</span></a></li> <?php }?>
                </ul>
                              
                </li>
                <?php }?>
		
		
		
        <?php if($menu7 == "7"){ ?><li><a href="#" class="parent"><span>MHS Bills</span></a>
            <ul>
               <?php if($menu71 == "71"){ ?> <li><a href="manual_bill.php"><span> Final Bill</span></a></li><?php } ?>
<?php if($menu72 == "72"){ ?><li><a href="manual_lab_bill.php"><span> Lab Bill</span></a></li><?php } ?>
<?php if($menu73 == "73"){ ?><li><a href="view_paitients1.php"><span>View  Paitents List</span></a></li><?php } ?>
<?php if($menu74 == "74"){ ?><li><a href="result_entry1.php"><span>View  Result Entry</span></a></li><?php } ?>
                <!--<li><a href="emr_sheet.php"><span>EMR Sheet</span></a></li>-->
            </ul>
        </li><?php } ?>
		
		<?php if($menu9 == "9"){ ?><li><a href="#" class="parent"><span>Stores</span></a>
            <ul>
               <?php if($menu90 == "90"){ ?> <li><a href="#" class="parent"><span>Masters</span></a>
                    <ul>
                        <?php if($menu91 == "91"){ ?><li><a href="uom_list.php"><span>UOM</span></a></li><?php }?>
                        <?php if($menu92 == "92"){ ?><li><a href="product_type_list.php"><span>Product Type</span></a></li><?php }?>
						<?php if($menu93 == "93"){ ?><li><a href="supplier_info_list.php"><span>Supplier Information</span></a></li><?php }?>
						<?php if($menu94 == "94"){ ?><li><a href="supplier_info_list1.php"><span>Supplier Amount</span></a></li><?php }?>
                        <?php if($menu95 == "95"){ ?><li><a href="packing_info_list.php"><span>Packing Information</span></a></li><?php }?>
						<?php if($menu96 == "96"){ ?><li><a href="product_details_list.php"><span>Product Details</span></a></li><?php }?>
                        <!--<li><a href="stock_position_report.php"><span>Stock Position</span></a></li>-->
						
                    </ul>
                </li><?php }?>
                <?php if($menu97 == "97"){ ?> <li><a href="#" class="parent"><span>Transactions</span></a>
                    <ul>
                       <?php if($menu98 == "98"){ ?> <li><a href="purchase_invoice_list.php"><span>Purchase Invoice</span></a></li><?php } ?>
                       <?php if($menu99 == "99"){ ?> <li><a href="purchase_return_list.php"><span>Purchase Return</span></a></li><?php } ?>
						<?php if($menu990 == "990"){ ?><li><a href="stock_adjustment.php"><span>Stock Adjustment</span></a></li><?php } ?>
						
						<?php if($menu100 == "100"){ ?><li><a href="product_change.php"><span>Stock Adjustment Report</span></a></li><?php } ?>
						  
                    </ul>
                </li><?php }?>
			<!--	<li><a href="stock_transfer.php"><span>Department Issues</span></a></li>-->
				<?php if($menu991 == "991"){ ?><li><a href="#" class="parent"><span>Reports</span></a>
                    <ul>
                
                       <?php if($menu992 == "992"){ ?>  <li><a href="purchase_entry_report.php"><span>Purchase Entry Report</span></a></li><?php }?>
                       <?php if($menu993 == "993"){ ?>  <li><a href="purchase_return_report.php"><span>Purchase Return Report</span></a></li><?php }?>
						<?php if($menu994 == "994"){ ?><li><a href="add_supplier_items.php"><span>Supplier Items</span></a></li><?php }?>
                        
                      <?php if($menu995 == "995"){ ?>  <li><a href="vat_report.php"><span>VAT Report</span></a></li><?php }?>
                        
                           <?php if($menu996 == "996"){ ?> <li><a href="stock_position_report.php"><span>Stock Position</span></a></li><?php }?>
              <?php if($menu997 == "997"){ ?><li><a href="medicinelist.php" target="_blank"><span>Medicine Shortlist</span></a></li><?php }?>
                     <?php if($menu998 == "998"){ ?><li><a href="searchbox.php" class="parent"><span>Search Medicine</span></a></li><?php }?>
                          <?php if($menu999 == "999"){ ?><li><a href="searchbox1.php" class="parent"><span>Compare Medicine Price</span></a></li><?php }?>
					 <?php if($menu9990 == "9990"){ ?><li><a href="pdf_report.php?report=11"><span>Drug Expiry Report</span></a></li><?php }?>
                    <?php if($menu9991 == "9991"){ ?><li><a href="FSN_productdetails_list.php"><span>FSN Analysis</span></a></li><?php }?>
						<?php if($menu9992 == "9992"){ ?><li><a href="ABC_Analysis.php"><span>ABC Analysis</span></a></li><?php }?>
                       <?php if($menu9993 == "9993"){ ?> <li><a href="stock_position_report1.php"><span>Total Store Stock</span></a></li><?php }?>
						
                        
                        
                        
                        
                    </ul>
                </li><?php }?>
               <?php if($menu9995 == "9995"){ ?> <li><a href="#" class="parent"><span>Reports New</span></a>
                    <ul>
                        <!--<li><a href="sales_entry_report.php"><span>Sales Entry Report</span></a></li>-->
                        <?php if($menu9996 == "9996"){ ?> <li><a href="salesentry_report.php"><span>DAY-SALES REPORT</span></a></li>
                        <?php }?>
                       <?php if($menu9997 == "9997"){ ?> <li><a href="sales_typesmonth_report.php"><span>M-Sales Entry Report</span></a></li><?php }?>
                      <?php if($menu9998 == "9998"){ ?>  <li><a href="druginspector_report.php" target="new"><span>Drug Inspector Report</span></a></li><?php }?>
                        
                       <?php if($menu9999 == "9999"){ ?>   <li><a href="searchbox3.php" class="parent"><span>Pharmacy Bill Summery</span></a></li><?php }?>
						 <?php if($menu1002 == "1002"){ ?> <li><a href="gst_report.php"><span>GST Report</span></a></li><?php }?>
                    </ul>
                </li>
				
				
				
				<?php }?>
				<?php if($menu1003 == "menu1003"){ ?> <li><a href="profit_report.php" ><span>Profit Report</span></a>
                                    
                </li><?php }?>
            </ul>
        </li><?php }?>
       <?php if($menu10 == "10"){ ?>  <li><a href="#" class="parent"><span>Pharmacy</span></a>
            <ul>
              <?php if($menu101 == "101"){ ?>    <li><a href="salesentry_list.php"><span>Sales Entry</span></a></li>  <?php }?>
                <?php if($menu102 == "102"){ ?>   <li><a href="opdigitallab_reg1.php"><span>OP Digital Sales Entry</span></a></li>  <?php }?>
				
				<?php if($menu108 == "108"){ ?> <li><a href="opdigital_reg2.php"><span>Discharge Summary Entry</span></a></li><?php }?>
               <?php if($menu103 == "103"){ ?>  <li><a href="salesreturn.php"><span>Sales Return</span></a></li>  <?php }?>
               <?php if($menu104 == "104"){ ?>  <li><a href="duecustomer.php"><span>Due Patient/Customer</span></a></li>  <?php }?>
               <?php if($menu105 == "105"){ ?>  <li><a href="salestype_report_ind.php"><span>Sales Entry & Returns</span></a></li>  <?php }?>
              <?php if($menu106 == "106"){ ?>   <li><a href="salesentryreports.php"><span>Sales Entry Report</span></a></li>  <?php }?>
			 <?php if($menu107 == "107"){ ?>	<li><a href="salesreturnreports.php"><span>Sales Return Report</span></a></li> <?php }?>
            </ul>
        </li>
        <?php }?>
        
		
		
      
        
        
                
                
<?php if($menu12 == "12"){ ?><li><a href="#" class="parent"><span>Reports</span></a>
            <ul>
                <?php if($menu121 == "121"){ ?> <li><a href="#"><span>Reception</span></a>
                
                <ul>
                <?php if($menu122 == "122"){ ?><li><a href="hospitalpatients_report.php"><span>Total Patiens List</span></a></li><?php }?>
                <?php if($menu122 == "222"){ ?> <li><a href="hospitalpatients_cancel_report.php"><span>Total Cancellation List</span></a></li><?php }?>
                <?php if($menu123 == "123"){ ?> <li><a href="hamountcollection.php"><span>Amount Collection Report</span></a></li><?php }?>
                <?php if($menu124 == "124"){ ?><li><a href="patientpaymenthistory.php"><span>In Patient Payment History</span></a></li><?php }?>
               <?php if($menu125 == "125"){ ?> <li><a href="dischargepatients.php"><span>Discharged Patients List</span></a></li><?php }?>
                <?php if($menu126 == "126"){ ?><li><a href="admitpatients.php"><span>Admitted Patients List</span></a></li><?php }?>
                
                </ul>
                              
                </li><?php }?>
                <?php if($menu12902 == "12902"){ ?><li><a href="#"><span>Lab</span></a>
                
                <ul>
                 <?php if($menu127 == "127"){ ?><li><a href="patient_report.php"><span>Total Patiens List</span></a></li><?php }?>
                <?php if($menu128 == "128"){ ?> <li><a href="amountcollection.php"><span>Amount Collection Report</span></a></li><?php }?>
                <?php if($menu129 == "129"){ ?><li><a href="dueslist.php"><span>Dues List Report</span></a></li><?php }?>
               <?php if($menu1290 == "1290"){ ?>  <li><a href="testreports.php"><span>Test Reports</span></a></li><?php }?>
				<?php if($menu12901 == "12901"){ ?><li><a href="labbill.php"><span>Final Lab Bill Summary</span></a></li><?php }?>
                </ul>
                              
                </li><?php }?>
 <?php if($menu12903 == "12903"){ ?><li><a href="#"><span>Referal Doctor</span></a>
                
                <ul>
                 <?php if($menu1293 == "1293"){ ?><li><a href="referal_doctors_List.php" target="_blank"><span>Total Referal Doctors List</span></a></li><?php }?>
                <?php if($menu1294 == "1293"){ ?> <li><a href="referaldoctoramountcollection.php" ><span>Referal Doctors Amount Collection</span></a></li><?php }?>
               <?php if($menu1295 == "1295"){ ?>  <li><a href="datereferaldoctoramountcollection.php" ><span>Date WiseReferal Doctors Amount</span></a></li><?php }?>
                </ul>
                              
                </li><?php }?>
                
               <?php if($menu1296 == "1296"){ ?>  <li><a href="op_report.php"><span>Out Patient Report</span></a></li><?php }?>
                <?php if($menu1297 == "1297"){ ?>  <li><a href="op_report1.php"><span>Admitted Patient Report</span></a></li><?php }?>
				
				<?php if($menu1301 == "1301"){ ?>  <li><a href="dac.php"><span>D.A.C</span></a></li><?php }?>
				
				
				<?php if($menu1298 == "1298"){ ?>  <li><a href="daily_amount.php"><span>Daily Amount Collection</span></a></li><?php }?>
				<?php if($menu1300 == "1300"){ ?>  <li><a href="daily_amount1.php"><span>Daily Amount Pharmacy</span></a></li><?php }?>
			 
				
              <?php if($menu1299 == "1299"){ ?>   <li><a href="daily_amount_emp.php"><span>Day Amount Collection Summary</span></a></li><?php }?>
                
                
             </ul>
             
             
             
        </li><?php }?>
		
		
		
        
 <?php if($menu13 == "13"){ ?><li><a href="#" class="parent"><span>Certificates</span></a>
           <ul>
              <?php if($menu131 == "131"){ ?>   <li><a href="birth_cert.php"><span>Birth Certificate</span></a></li><?php }?>
              <?php if($menu132 == "132"){ ?>   <li><a href="view_deathcertificate.php"><span>Death Certificate</span></a></li><?php }?>
              <?php if($menu133 == "133"){ ?>   <li><a href="view_medicalcertificate.php"><span>Medical Certificate</span></a></li><?php }?>
                 
               <?php if($menu134 == "134"){ ?>   <li><a href="#" class="parent"><span>Brought Dead Certificate</span></a>
                    <ul>
                    <?php if($menu135 == "135"){ ?>    <li><a href="view_deathcertificate2.php"><span>Death Certificate </span></a></li><?php }?>
                   <?php if($menu136 == "136"){ ?> <li><a href="view_deathcertificate1.php"><span>Form No 4</span></a></li><?php }?>
					<?php if($menu137 == "137"){ ?>	<li><a href="view_deathcertificate3.php"><span>Form No 4A</span></a></li><?php }?>
                        	
						
                    </ul>
                </li><?php }?>
              <?php if($menu138 == "138"){ ?>   <li><a href="drugindent_view.php"><span>Drug Indent Certificate</span></a></li><?php }?>
               <?php if($menu139 == "139"){ ?>  <li><a href="view_essentiality.php"><span>Essentiality Certificate</span></a></li><?php }?>
              <?php if($menu1390 == "1390"){ ?>   <li><a href="view_emergency.php"><span>Emergency Certificate</span></a></li><?php }?>
          <?php if($menu1391 == "1391"){ ?>   <li><a href="view_medicalfitness.php"><span>Medical Fitness Certificate</span></a></li><?php }?>
              
            </ul>
        
        </li>
        <?php }?>
        
        
        <?php if($menu14 == "14"){ ?><li><a href="#" class="parent"><span>Accounts</span></a>
           <ul>
				 <?php if($menu141 == "141"){ ?><li><a href="#" class="parent"><span>Expenses</span></a>
                    <ul>
         <?php if($menu142 == "142"){ ?><li><a href="exptype_list.php"><span>Expenses Type</span></a></li><?php }?>
		<?php if($menu143 == "143"){ ?><li><a href="direct_expenses.php"><span>Expenses List</span></a></li><?php }?>
						
			<?php if($menu144 == "144"){ ?><li><a href="expenses_report.php"><span>Expenses Report</span></a></li><?php }?>
					
					</ul>
                </li><?php }?>
                 <?php if($menu145 == "145"){ ?> <li><a href="referaldoctoramountcollection1.php"><span>Referal Doctors Amount Paid</span></a></li><?php }?>
                <?php if($menu146 == "146"){ ?>  <li><a href="referaldoctoramountpaid_list.php"><span>Referal Doctors Amount PaidList</span></a></li><?php }?>
                
            </ul>
        </li>
        <?php }?>
		
		<?php if($menu8 == "8"){ ?>  <li><a href="#" class="parent"><span>Case Sheet</span></a>
            <ul>
              <?php if($menu81 == "81"){ ?>   <li><a href="pat_det.php"><span>Patient Details</span></a></li> <?php } ?>
               <?php if($menu82 == "82"){ ?>   <li><a href="int_det.php"><span>Initial Assessment Sheet</span></a></li> <?php } ?>
                <?php if($menu83 == "83"){ ?>   <li><a href="int_det1.php"><span>Admission Record</span></a></li> <?php } ?>
              <?php if($menu84 == "84"){ ?>   <li><a href="int_det2.php"><span>Clinical Finding</span></a></li> <?php } ?>
             <?php if($menu85 == "85"){ ?>     <li><a href="int_det7.php"><span>Diagnostics</span></a></li> <?php } ?>
             <?php if($menu86 == "86"){ ?>    <li><a href="int_det4.php"><span>Activity Chart</span></a></li> <?php } ?>
              <?php if($menu891 == "891"){ ?>    <li><a href="add_iplist.php"><span>Add Nurse Chart</span></a></li> <?php } ?>
             <?php if($menu87 == "87"){ ?>    <li><a href="int_det6.php"><span>Sugar Chart</span></a></li> <?php } ?>
            <?php if($menu88 == "88"){ ?>     <li><a href="discharge_view.php"><span>Discharge Summary</span></a></li>  <?php } ?>
             <?php if($menu89 == "89"){ ?>    <li><a href="int_det5.php"><span>Add Nurse Duty</span></a></li> <?php } ?>
              <?php if($menu892 == "892"){ ?>    <li><a href="blood_det.php"><span>Add Blood Component</span></a></li> <?php } ?>
            <?php if($menu890 == "890"){ ?>     <li><a href="pat_det1.php"><span>Case Sheet Reports</span></a></li> <?php } ?>
               
            </ul>
        </li>
        <?php } ?>
        
      </ul>
</nav>
</header>
<?php } ?>