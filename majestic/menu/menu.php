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


<header>
<nav id='cssmenu'>

<div id="head-mobile"></div>
<div class="button"></div>
<ul>
<li class='active'><a href='#'>Settings</a>
<ul>
 <li><a href="org.php"><span>Hospital Details</span></a></li>
                <li><a href="pharmacydetailsview.php"><span>Pharmacy Details</span></a></li>
                <li><a href="lab_details.php"><span>Lab Details</span></a></li>
				<li><a href="locationview.php"><span>Location Setup</span></a></li>
                <li><a href="dept.php"><span>Add Department </span></a></li>
                 <li><a href="new_dept.php"><span>Add Test Department </span></a></li>
                 <li><a href="new_test.php"><span>Add Test </span></a></li>
                <li><a href="deptview.php"><span>Department Details</span></a></li>
              <!--  <li><a href="optheaterview.php"><span>Operation Theatre</span></a></li>-->
				<li><a href="concessionview.php"><span>Concession Type</span></a></li>
               <!-- <li><a href="disease_history.php"><span>Disease Details</span></a></li>
               
				<li><a href="validity_days.php"><span>Validity Days</span></a></li>
                <li><a href="customerview.php"><span>Add Customer</span></a></li>
                <li><a href="boxview.php"><span>Add Box</span></a></li>-->
                 <li><a href="insurance.php"><span>Add Insurance</span></a></li>
                  <li><a href="services_view.php"><span>Add Services</span></a></li>
                <li><a href="uom_list1.php"><span>Add Tariff</span></a></li>
 <li><a href="empdept.php"><span>Add Employee Department</span></a></li>
				<li><a href="pemployee.php"><span>Add Employees</span></a></li>
                
                
				<li><a href="change_pwd.php"><span>Change Password</span></a></li>
                <li><a href="userview.php"><span>User Management</span></a></li></ul>

</li>
<li><a href='#'>Ward</a>
<ul>
               
               <li><a href="package.php"><span>Create Package</span></a></li>
                <li><a href="room_type.php"><span>Room Types</span></a></li>
                <li><a href="bed_type.php"><span>Bed Types</span></a></li>
                <li><a href="room_tariff.php"><span>Room Tariff</span></a></li>
                <li><a href="bed_details.php"><span>Bed Details</span></a></li>
                 
                <!-- <li><a href="bed_details1.php"><span>Hospital Tariff</span></a></li>-->
            </ul>
</li>
<li><a href='#'>Doctor</a>
   <ul>
                <li><a href="doctor_list.php"><span>Doctor Info</span></a></li>
               
                <li><a href="outside_consultant.php"><span>Outside Consul. Tariff</span></a></li>
               <li><a href="referal_doctor.php"><span>Referal Doctor</span></a></li>
               <li><a href="servicelist.php"><span>Doctor service</span></a></li>
            </ul>
      </li>
      <li><a href='#'>Reception</a>
         <ul>
                 <li><a href="appointment_reg.php"><span>Doctor Appointment</span></a></li>
                <li><a href="patient-reg.php"><span>Patient Registration</span></a></li>
                 <li><a href="registration_card.php"><span>Registration Card</span></a></li>
                 <li><a href="in_patient_admit.php"><span>In Patient Admission</span></a></li>
                 <li><a href="casesheet.php"><span>In Patient Room Shifting</span></a></li>
                 
                 <!--<li><a href="discharge_patients1.php"><span>Discharge Patients Enquiry</span></a></li>
                  <li><a href="opdigital_reg.php"><span>Out patient Digital Form</span></a></li>
                   <li><a href="referalpatientslist.php"><span>Add Referal Patients Form</span></a></li>-->
                    <li><a href="op_cancel.php"><span>Op Cancellation</span></a></li>
                 
                 </ul>
      
</li>
<li><a href='#'>Billing</a>
<ul>
<li><a href="advance_collections.php"><span>Advances</span></a></li>
<li><a href="advance_collections1.php"><span>Advances Return</span></a></li>
<li><a href="add_pofinal_bill.php"><span>Package With Out Final Bill</span></a></li>
<li><a href="add_pfinal_bill.php"><span>Package With Final Bill</span></a></li>
<li><a href="ppatients.php"><span>Package Ip List</span></a></li>
<li><a href="ppaypatients.php"><span>Package payment Ip List</span></a></li>
<li><a href="prefundamountlist.php"><span>Package Refund Amount</span></a></li>

<li><a href="pay_bill.php"><span>Lab Bill</span></a></li>
<li><a href="service_bill.php"><span>Doctor Service</span></a></li>
<li><a href="new_lab_bill.php"><span>View  Bill/Pay Balance</span></a></li>
<!--<li><a href="opdigitallab_reg.php"><span>OP Digital Lab Bill</span></a></li>
<li><a href="opdigitallab_regk.php"><span>IP  Lab Bill</span></a></li>-->
<!--<li><a href="hbill.php"><span>Hospital Cash Bill</span></a></li>
<li><a href="view_hbill.php"><span>Hospital Cash Bill View</span></a></li>-->

<li><a href="opbill.php"><span>General Cash  Bill</span></a></li>
<li><a href="view_opbill.php"><span>General Cash  Bill View</span></a></li>
<!--<li><a href="packagebill.php"><span>Package Extra Service Bill</span></a></li>
<li><a href="view_packagebill.php"><span>Package Extra Service Bill View</span></a></li>-->
<li><a href="discharge_view.php"><span>Dicharge Summary</span></a></li>
<li><a href="labbill.php"><span>Lab Final Bill Summary</span></a></li>

 </ul>
</li>
 <li><a href="#" class="parent"><span>Lab</span></a>
            <ul>
                 <li><a href="view_paitients.php"><span>View  Paitents List</span></a></li>
                 <li><a href="result_entry.php"><span>View  Result Entry</span></a></li>
                <li><a href="report_result.php"><span>Select Report Test Wise</span></a></li>
                
             </ul>
        </li>

<li><a href='#'>MHS Bills</a><ul>
                <li><a href="manual_bill.php"><span>Final Bill</span></a></li>
<li><a href="manual_lab_bill.php"><span>Lab Bill</span></a></li>
<li><a href="view_paitients1.php"><span>View  Paitents List</span></a></li>
<li><a href="result_entry1.php"><span>View  Result Entry</span></a></li>
                <!--<li><a href="emr_sheet.php"><span>EMR Sheet</span></a></li>-->
            </ul></li>

<li><a href="#" class="parent"><span>Stores</span></a>
            <ul>
                <li><a href="#" class="parent"><span>Masters</span></a>
                    <ul>
                        <!--<li><a href="uom_list.php"><span>UOM</span></a></li>-->
                        <li><a href="product_type_list.php"><span>Product Type</span></a></li>
						<li><a href="supplier_info_list.php"><span>Supplier Information</span></a></li>
						<li><a href="supplier_info_list2.php"><span>Supplier Amount</span></a></li>
                        <li><a href="packing_info_list.php"><span>Packing Information</span></a></li>
						<li><a href="product_details_list.php"><span>Product Details</span></a></li>
                        <li><a href="edit_product.php"><span>Product Details Edit</span></a></li>
                        <!--<li><a href="stock_position_report.php"><span>Stock Position</span></a></li>-->
						
                    </ul>
                </li>
                 <li><a href="#" class="parent"><span>Transactions</span></a>
                    <ul>
                        <li><a href="purchase_invoice_list.php"><span>Purchase Invoice</span></a></li>
                        <li><a href="purchase_return_list.php"><span>Purchase Return</span></a></li>
						<li><a href="stock_adjustment.php"><span>Stock Adjustment</span></a></li>
                        <li><a href="product_change.php"><span>Stock Adjustment Report</span></a></li>
                         <li><a href="purchase_invoice_list1.php"><span>Old Purchase Invoice List</span></a></li>
                    </ul>
                </li>
			<!--	<li><a href="stock_transfer.php"><span>Department Issues</span></a></li>-->
				<li><a href="#" class="parent"><span>Reports</span></a>
                    <ul>
                        <li><a href="purchase_entry_report.php"><span>Purchase Entry Report</span></a></li>
                        <li><a href="purchase_return_report.php"><span>Purchase Return Report</span></a></li>
						<li><a href="add_supplier_items.php"><span>Supplier Items</span></a></li>
                        <!--<li><a href="custwise_report.php"><span>Cust wise Sales Report</span></a></li>-->
					<li><a href="inv_report.php"><span>Invoice Report</span></a></li>
                        <li><a href="vat_report.php"><span>VAT Report</span></a></li>
                        <li><a href="stock_position_report.php"><span>Stock Position</span></a></li>
                        <li><a href="medicinelist.php" target="_blank"><span>Medicine Shortlist</span></a></li>
                        <li><a href="searchbox.php" class="parent"><span>Search Medicine</span></a></li>
                        <li><a href="searchbox1.php" class="parent"><span>Compare Medicine Price</span></a></li>
						<li><a href="pdf_report.php?report=11"><span>Drug Expiry Report</span></a></li>
                        <li><a href="FSN_productdetails_list.php"><span>FSN Analysis</span></a></li>
						<li><a href="ABC_Analysis.php"><span>ABC Analysis</span></a></li>
                        <li><a href="stock_position_report1.php"><span>Total Store Stock</span></a></li>
                         <li><a href="gstreport.php"><span>Purchase GST Report</span></a></li>
                         <li><a href="sagstreport.php"><span>Sales GST Report</span></a></li>
                         <li><a href="productwisereport.php"><span>Product Wise Profit Report</span></a></li>
                         <li><a href="moveproductreport.php"><span>Product Wise Moving Report</span></a></li>
						
                    </ul>
                </li>
                <li><a href="#" class="parent"><span>Reports New</span></a>
                    <ul>
                        <!--<li><a href="sales_entry_report.php"><span>Sales Entry Report</span></a></li>-->
                        <li><a href="salesentry_report.php"><span>DAY-SALES REPORT</span></a></li>
                        
                        <li><a href="sales_typesmonth_report.php"><span>M-Sales Entry Report</span></a></li>
                        <li><a href="druginspector_report.php" target="new"><span>Drug Inspector Report</span></a></li>
                          <li><a href="searchbox3.php" class="parent"><span>Pharmacy Bill Summery</span></a></li>
                          <li><a href="gst_report.php"><span>GST Report</span></a></li>
						  <li><a href="gst_report1.php"><span>Pharmacy GST Report</span></a></li>
                          
						<!--<li><a href="sales_data_report.php"><span>Am-Sales Entry Report</span></a></li>
                        <li><a href="salesentry_report.php"><span>Ch-Sales Entry Report</span></a></li>-->
                    </ul>
                </li>
                
                <li><a href="profit_report.php" ><span>Profit Report</span></a>
                                    
                </li>
                
            </ul>
        </li>
         <li><a href="#" class="parent"><span>Pharmacy</span></a>
            <ul>
                <li><a href="salesentry_list.php"><span>Sales Entry</span></a></li>
                <li><a href="opdigitallab_reg1.php"><span>OP Digital Sales Entry</span></a></li>
                <li><a href="opdigital_reg2.php"><span>Discharge Summary Entry</span></a></li>
                <li><a href="salesreturn.php"><span>Sales Return</span></a></li>
                <li><a href="duecustomer.php"><span>Due Patient/Customer</span></a></li>
                <li><a href="salestype_report_ind.php"><span>Sales Entry & Returns</span></a></li>
                <li><a href="salesentryreports.php"><span>Sales Entry Report</span></a></li>
                 <li><a href="salesentryreports2.php"><span>Sales Entry Excel Report</span></a></li>
				<li><a href="salesreturnreports.php"><span>Sales Return Report</span></a></li>
			<!--	 <li><a href="drugindent_view.php"><span>Drug Indent Form</span></a></li>-->
            </ul>
        </li>
        
<li><a href="#" class="parent"><span>Reports</span></a>
            <ul>
                 <li><a href="#"><span>Reception</span></a>
                
                <ul>
                 <li><a href="hospitalpatients_report.php"><span>Total Patiens List</span></a></li>
                  <li><a href="hospitalpatients_cancel_report.php"><span>Total Cancellation List</span></a></li>
                 <li><a href="op_report_doct.php"><span>Doctor Wise Patient Report</span></a></li>
                 <li><a href="hamountcollection.php"><span>Amount Collection Report</span></a></li>
                  <li><a href="patientpaymenthistory.php"><span>In Patient Payment History</span></a></li>
                  <li><a href="dischargepatients.php"><span>Discharge Patients List</span></a></li>
                <li><a href="admitpatients.php"><span>Admitted Patients List</span></a></li>
                
                </ul>
                              
                </li>
                <li><a href="#"><span>Lab</span></a>
                
                <ul>
                 <li><a href="patient_report.php"><span>Total Patiens List</span></a></li>
                
                    
                 <li><a href="amountcollection.php"><span>Amount Collection Report</span></a></li>
                <li><a href="dueslist.php"><span>Dues List Report</span></a></li>
                 <li><a href="testreports.php"><span>Test Reports</span></a></li>
                 <li><a href="labbill.php"><span>Final Lab Bill Summary</span></a></li>
                </ul>
                              
                </li>
 <li><a href="#"><span>Referal Doctor</span></a>
                
                <ul>
                 <li><a href="referal_doctors_List.php" target="_blank"><span>Total Referal Doctors List</span></a></li>
                 <li><a href="referaldoctoramountcollection.php" ><span>Referal Doctors Amount Collection</span></a></li>
                 <li><a href="datereferaldoctoramountcollection.php" ><span>Date WiseReferal Doctors Amount</span></a></li>
                </ul>
                              
                </li>
                <li><a href="op_report.php"><span>Out Patient Report</span></a></li>
                
                
                <li><a href="op_report1.php"><span>Admitted Patient Report</span></a></li>
                <li><a href="referalpatients_report.php"><span>Referal Patients Report</span></a></li>
                
                
                <li><a href="daily_amount.php"><span>Daily Amount Collection</span></a></li>
                 <li><a href="dac.php"><span>D.A.C</span></a></li>
                <li><a href="daily_amount1.php"><span>Daily Amount Pharmacy</span></a></li>
                <li><a href="daily_amount_emp.php"><span>Day Amount Collection Summary</span></a></li>
                
               <!-- <li><a href="daily_amount_emp1.php"><span>Employee Amount Collection Report</span></a></li>-->
                
             </ul>
        </li>
        
         
        
 <li><a href="#" class="parent"><span>Certificates</span></a>
            <ul>
                <li><a href="birth_cert.php"><span>Birth Certificate</span></a></li>
                 <li><a href="view_deathcertificate.php"><span>Death Certificate</span></a></li>
                 <li><a href="view_medicalcertificate.php"><span>Medical Certificate</span></a></li>
                 
                <li><a href="#" class="parent"><span>Brought Dead Certificate</span></a>
                    <ul>
                        <li><a href="view_deathcertificate2.php"><span>Death Certificate </span></a></li>
                        <li><a href="view_deathcertificate1.php"><span>Form No 4</span></a></li>
						<li><a href="view_deathcertificate3.php"><span>Form No 4A</span></a></li>
                        	
						
                    </ul>
                </li>
                
                 <li><a href="view_essentiality.php"><span>Essentiality Certificate</span></a></li>
                 <li><a href="view_emergency.php"><span>Emergency Certificate</span></a></li>
                 <li><a href="view_medicalfitness.php"><span>Medical Fitness Certificate</span></a></li>
                 
            </ul>
                              
                </li>
               
            
       
        <li><a href="#" class="parent"><span>Accounts</span></a>
            <ul>
				<li><a href="#" class="parent"><span>Expenses</span></a>
                    <ul>
                        <li><a href="exptype_list.php"><span>Expenses Head</span></a></li>
						<li><a href="direct_expenses.php"><span>Expenses List</span></a></li>
						<li><a href="expenses_report.php"><span>Expenses Report</span></a></li>
                        <li><a href="referaldoctoramountpaid.php"><span>Referal Doctor Paid Amount List</span></a></li>
					</ul>
                </li>
                <li><a href="referaldoctoramountcollection1.php"><span>Referal Doctors Amount Paid</span></a></li>
                 <li><a href="referaldoctoramountpaid_list.php"><span>Referal Doctors Amount PaidList</span></a></li>
                 </ul></li>
         <!-- <li><a href='#'>Case Sheet</a><ul>
                <li><a href="pat_det.php"><span>Patient Details</span></a></li>
                 <li><a href="int_det.php"><span>Initial Assessment Sheet</span></a></li>
                  <li><a href="int_det1.php"><span>Admission Record</span></a></li>
                <li><a href="int_det2.php"><span>Clinical Finding</span></a></li>
                 <li><a href="int_det7.php"><span>Diagnostics</span></a></li>
                <li><a href="int_det4.php"><span>Activity Chart</span></a></li>
                <li><a href="add_iplist.php"><span>Add Nurse Chart</span></a></li>
                   <li><a href="int_det6.php"><span>Sugar Chart</span></a></li>
                    <li><a href="discharge_view.php"><span>Discharge Summary</span></a></li> 
                 <!--<li><a href="int_det8.php"><span>IP Room Transfers</span></a></li>-->
                 <!-- <li><a href="int_det5.php"><span>Add Nurse Duty</span></a></li>
                  <li><a href="blood_det.php"><span>Blood Component</span></a></li>
              <li><a href="casesheet1.php"><span>Diagnostics</span></a></li>
                <li><a href="pat_det1.php"><span>Case Sheet Reports</span></a></li>-->
               <!--   <li><a href="casesheet.php"><span>Case Sheet</span></a></li>-->
<!--<li><a href="opdigitallab_reg.php"><span>OP Digital Lab Bill</span></a></li>
<li><a href="new_lab_bill.php"><span>View  Bill/Pay Balance</span></a></li>
<li><a href="opbill.php"><span>OP Cash Bill</span></a></li>
<li><a href="view_opbill.php"><span>OP Cash  Bill View</span></a></li>
            </ul></li>-->
        
</ul>
</nav>
</header>
