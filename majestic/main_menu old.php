<?php
$name=$_SESSION['name1'];
	if($name == "admin")
	{
	//echo "hi";
?>
<div id="menu">
    <ul class="menu">
    <li><a href="#" class="parent"><span>Settings</span></a>
            <ul>
                <li><a href="org.php"><span>Hospital Details</span></a></li>
                <li><a href="pharmacydetailsview.php"><span>Pharmacy Details</span></a></li>
                <li><a href="lab_details.php"><span>Lab Details</span></a></li>
				<li><a href="locationview.php"><span>Location Setup</span></a></li>
                <li><a href="dept.php"><span>Add Department </span></a></li>
                 <li><a href="new_dept.php"><span>Add Test Department </span></a></li>
                 <li><a href="new_test.php"><span>Add Test </span></a></li>
                <li><a href="deptview.php"><span>Department Details</span></a></li>
                <li><a href="optheaterview.php"><span>Operation Theatre</span></a></li>
				<li><a href="concessionview.php"><span>Concession Type</span></a></li>
                <li><a href="disease_history.php"><span>Disease Details</span></a></li>
               
				<li><a href="validity_days.php"><span>Validity Days</span></a></li>
                <li><a href="customerview.php"><span>Add Customer</span></a></li>
                <li><a href="boxview.php"><span>Add Box</span></a></li>
 <li><a href="empdept.php"><span>Add Employee Department</span></a></li>
				<li><a href="pemployee.php"><span>Add Employees</span></a></li>
                
                
				<!--<li><a href="pemployee.php"><span>Add Employees</span></a></li>-->
                <li><a href="userview.php"><span>User Management</span></a></li>
            </ul>
        </li>
        <li><a href="#" class="parent"><span>Ward</span></a>
            <ul>
                <li><a href="room_type.php"><span>Room Types</span></a></li>
                <li><a href="bed_type.php"><span>Bed Types</span></a></li>
                <li><a href="room_tariff.php"><span>Room Tariff</span></a></li>
                <li><a href="bed_details.php"><span>Bed Details</span></a></li>
                 <li><a href="uom_list1.php"><span>Add Tariff</span></a></li>
                 <li><a href="bed_details1.php"><span>Hospital Tariff</span></a></li>
            </ul>
        </li>
		 <li><a href="#" class="parent"><span>Doctor</span></a>
            <ul>
                <li><a href="doctor_list.php"><span>Doctor Info</span></a></li>
               
                <li><a href="outside_consultant.php"><span>Outside Consul. Tariff</span></a></li>
               <li><a href="referal_doctor.php"><span>Referal Doctor</span></a></li>
            </ul>
        </li>
        <li><a href="#" class="parent"><span>Reception</span></a>
            <ul>
                 <li><a href="appointment_reg.php"><span>Doctor Appointment</span></a></li>
                <li><a href="patient-reg.php"><span>Patient Registration</span></a></li>
                 <li><a href="registration_card.php"><span>Registration Card</span></a></li>
                 <li><a href="in_patient_admit.php"><span>In Patient Admission</span></a></li>
                 <li><a href="casesheet.php"><span>In Patient Room Shifting</span></a></li>
                 <li><a href="in_patient_enquiry.php"><span>In Patient Enquiry</span></a></li>
                 <li><a href="discharge_patients1.php"><span>Discharge Patients Enquiry</span></a></li>
                  <li><a href="opdigital_reg.php"><span>Out patient Digital Form</span></a></li>
                   <li><a href="referalpatientslist.php"><span>Add Referal Patients Form</span></a></li>
                 
                 </ul>
        </li>
        <li><a href="#" class="parent"><span>Billing</span></a>
            <ul>
<li><a href="advance_collections.php"><span>Advances</span></a></li>
<li><a href="final_bill.php"><span>Final Bill</span></a></li>
<li><a href="pay_bill.php"><span>Lab Bill</span></a></li>
<li><a href="opdigitallab_reg.php"><span>OP Digital Lab Bill</span></a></li>
<li><a href="opdigitallab_regk.php"><span>IP  Lab Bill</span></a></li>
<li><a href="new_lab_bill.php"><span>View  Bill/Pay Balance</span></a></li>
<li><a href="opbill.php"><span>OP Cash Bill</span></a></li>
<li><a href="view_opbill.php"><span>OP Cash  Bill View</span></a></li>
<li><a href="discharge_view.php"><span>Dicharge Summary</span></a></li>
<li><a href="labbill.php"><span>Lab Final Bill Summary</span></a></li>

 </ul>
        </li>
        <li><a href="#" class="parent"><span>DHS Bills</span></a>
            <ul>
                <li><a href="manual_bill.php"><span>Final Bill</span></a></li>
<li><a href="manual_lab_bill.php"><span>Lab Bill</span></a></li>
<li><a href="view_paitients1.php"><span>View  Paitents List</span></a></li>
<li><a href="result_entry1.php"><span>View  Result Entry</span></a></li>
                <!--<li><a href="emr_sheet.php"><span>EMR Sheet</span></a></li>-->
            </ul>
        </li>
        <li><a href="#" class="parent"><span>Case Sheet</span></a>
            <ul>
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
                   
               
               
                 <li><a href="int_det5.php"><span>Add Nurse Duty</span></a></li>
                  <li><a href="blood_det.php"><span>Blood Component</span></a></li>
                
              <!-- <li><a href="casesheet1.php"><span>Diagnostics</span></a></li>-->
                <li><a href="pat_det1.php"><span>Case Sheet Reports</span></a></li>
               <!--   <li><a href="casesheet.php"><span>Case Sheet</span></a></li>-->

<!--<li><a href="opdigitallab_reg.php"><span>OP Digital Lab Bill</span></a></li>
<li><a href="new_lab_bill.php"><span>View  Bill/Pay Balance</span></a></li>
<li><a href="opbill.php"><span>OP Cash Bill</span></a></li>
<li><a href="view_opbill.php"><span>OP Cash  Bill View</span></a></li>-->
 
                
                
                  
            </ul>
        </li>
        <!--<li><a href="#" class="parent"><span>MIS Reports</span></a>
            <ul>
                <li><a href="detailed_report.php"><span>Detail Report</span></a></li>
                <li><a href="pdf_report.php?report=1"><span>Out Patients</span></a></li>
                <li><a href="pdf_report.php?report=2"><span>Admitted Patients</span></a></li>
                <li><a href="pdf_report.php?report=3"><span>Discharged Patients</span></a></li>
                <li><a href="pdf_report.php?report=4"><span>IP & Discharge Patients</span></a></li>
				<li><a href="pdf_report.php?report=5"><span>Advance Summary</span></a></li>
                <li><a href="pdf_report.php?report=6"><span>Bed Occupy Summary</span></a></li>
                <li><a href="pdf_report.php?report=8"><span>ICU Utilization Summary</span></a></li>
                <li><a href="pdf_report1.php?report=6"><span>Final Bill Summary</span></a></li>
                <li><a href="stock_position_report.php"><span>Stock Position</span></a></li>
				<li><a href="Expiry_ProductDetails_List.php"><span>Expiry Product</span></a></li>
                <li><a href="ABC_Analysis.php"><span>ABC Analysis</span></a></li>
                <li><a href="FSN_productdetails_list.php"><span>FSN Report</span></a></li>
            </ul>
        </li>-->
        
        <li><a href="#" class="parent"><span>Stores</span></a>
            <ul>
                <li><a href="#" class="parent"><span>Masters</span></a>
                    <ul>
                        <li><a href="uom_list.php"><span>UOM</span></a></li>
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
                    </ul>
                </li>
			<!--	<li><a href="stock_transfer.php"><span>Department Issues</span></a></li>-->
				<li><a href="#" class="parent"><span>Reports</span></a>
                    <ul>
                        <li><a href="purchase_entry_report.php"><span>Purchase Entry Report</span></a></li>
                        <li><a href="purchase_return_report.php"><span>Purchase Return Report</span></a></li>
						<li><a href="add_supplier_items.php"><span>Supplier Items</span></a></li>
                        <!--<li><a href="custwise_report.php"><span>Cust wise Sales Report</span></a></li>-->
					
                        <li><a href="vat_report.php"><span>VAT Report</span></a></li>
                        <li><a href="stock_position_report.php"><span>Stock Position</span></a></li>
                        <li><a href="medicinelist.php" target="_blank"><span>Medicine Shortlist</span></a></li>
                        <li><a href="searchbox.php" class="parent"><span>Search Medicine</span></a></li>
                        <li><a href="searchbox1.php" class="parent"><span>Compare Medicine Price</span></a></li>
						<li><a href="pdf_report.php?report=11"><span>Drug Expiry Report</span></a></li>
                        <li><a href="FSN_productdetails_list.php"><span>FSN Analysis</span></a></li>
						<li><a href="ABC_Analysis.php"><span>ABC Analysis</span></a></li>
                        <li><a href="stock_position_report1.php"><span>Total Store Stock</span></a></li>
						
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
				<li><a href="salesreturnreports.php"><span>Sales Return Report</span></a></li>
				 <li><a href="drugindent_view.php"><span>Drug Indent Form</span></a></li>
            </ul>
        </li>
        
         <li><a href="#" class="parent"><span>Lab</span></a>
            <ul>
                 <li><a href="view_paitients.php"><span>View  Paitents List</span></a></li>
                 <li><a href="result_entry.php"><span>View  Result Entry</span></a></li>
                <li><a href="report_result.php"><span>Select Report Test Wise</span></a></li>
                
             </ul>
        </li>
<li><a href="#" class="parent"><span>Reports</span></a>
            <ul>
                 <li><a href="#"><span>Reception</span></a>
                
                <ul>
                 <li><a href="hospitalpatients_report.php"><span>Total Patiens List</span></a></li>
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
               
            
        </li>
        <li><a href="#" class="parent"><span>Accounts</span></a>
            <ul>
				<li><a href="#" class="parent"><span>Expenses</span></a>
                    <ul>
                        <li><a href="exptype_list.php"><span>Expenses Type</span></a></li>
						<li><a href="direct_expenses.php"><span>Expenses List</span></a></li>
						
						<li><a href="expenses_report.php"><span>Expenses Report</span></a></li>
                        <li><a href="referaldoctoramountpaid.php"><span>Referal Doctor Paid Amount List</span></a></li>
					
					</ul>
                </li>
                <li><a href="referaldoctoramountcollection1.php"><span>Referal Doctors Amount Paid</span></a></li>
                 <li><a href="referaldoctoramountpaid_list.php"><span>Referal Doctors Amount PaidList</span></a></li>
	
</ul>
</div>
<?php
	}
	else
	{
	//echo "welcome";
		include("main_menu1.php");
	}	
	?>
 