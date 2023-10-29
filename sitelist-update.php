  <?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');

require 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

if (strlen($_SESSION['osemsuid']==0)) {
  header('location:logout.php');
  } else{
date_default_timezone_set('Asia/Dhaka');// change according timezone
//$currentTime = date( 'd-m-Y h:i:s A', time () );
//$currentDate=date( 'Y-m-d', time () );

if(isset($_POST['submit']))
{
$uid=$_SESSION['osemsuid'];
$uploadfile=$_FILES['uploadfile']['tmp_name'];
$objExcel=PHPExcel_IOFactory::load($uploadfile);
$worksheet=$objExcel->getWorksheetIterator();
$siteupdate=$objExcel->getSheetByName('All_TowerCo'); 
$sitelisthighestrow=$siteupdate->getHighestRow();

	for($row=2;$row<=$sitelisthighestrow;$row++)
	{
		$UniID = $siteupdate->getCellByColumnAndRow(1,$row)->getValue();
		$UniqueID = trim(addslashes($UniID));
		$RepID = $siteupdate->getCellByColumnAndRow(2,$row)->getValue();
		$ReportingID = trim(addslashes($RepID));
		$GenID = $siteupdate->getCellByColumnAndRow(3,$row)->getValue();
		$GenericID = trim(addslashes($GenID));
		$BLsID = $siteupdate->getCellByColumnAndRow(4,$row)->getValue();
		$BLsiteID = trim(addslashes($BLsID));
		$Twr_SID = $siteupdate->getCellByColumnAndRow(5,$row)->getValue();
		$TOWERCO_SiteID = trim(addslashes($Twr_SID));
		$Twr_name = $siteupdate->getCellByColumnAndRow(6,$row)->getValue();
		$TowerCo_name = trim(addslashes($Twr_name));
		$D1type = $siteupdate->getCellByColumnAndRow(7,$row)->getValue();
		$D1_Type = trim(addslashes(strtoupper($D1type)));
		$Roll_Cat = $siteupdate->getCellByColumnAndRow(8,$row)->getValue();
		$Rollout_Category = trim(addslashes($Roll_Cat));
		$Lon = $siteupdate->getCellByColumnAndRow(9,$row)->getValue();
		$Longitude = trim(addslashes($Lon));
		$Lat = $siteupdate->getCellByColumnAndRow(10,$row)->getValue();
		$Latitute = trim(addslashes($Lat));
		$Divi = $siteupdate->getCellByColumnAndRow(11,$row)->getValue();
		$Division = trim(addslashes($Divi));
		$Dist = $siteupdate->getCellByColumnAndRow(12,$row)->getValue();
		$District = trim(addslashes($Dist));
		$Thana_name = $siteupdate->getCellByColumnAndRow(13,$row)->getValue();
		$Thana = trim(addslashes($Thana_name));
		$Sales_Regi = $siteupdate->getCellByColumnAndRow(14,$row)->getValue();
		$Sales_Region = trim(addslashes($Sales_Regi));
		$site_Add = $siteupdate->getCellByColumnAndRow(15,$row)->getValue();
		$Detail_site_Address = trim(addslashes($site_Add));
		$Active_equip = $siteupdate->getCellByColumnAndRow(16,$row)->getValue();
		$Active_equipment = trim(addslashes($Active_equip));
		$SR_Assignment = $siteupdate->getCellByColumnAndRow(17,$row)->getValue();
		$SR_Assignment_Date = ($SR_Assignment) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($SR_Assignment)) : null;
		$Site_Rejection = $siteupdate->getCellByColumnAndRow(18,$row)->getValue();
		$Site_Rejection_Date =($Site_Rejection) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Site_Rejection)) : null;
		$Reasons_Rejection = $siteupdate->getCellByColumnAndRow(19,$row)->getValue();
		$Reasons_of_Rejection = trim(addslashes($Reasons_Rejection));
		$Site_Withdraw = $siteupdate->getCellByColumnAndRow(20,$row)->getValue();
		$Site_Withdraw_Date = ($Site_Withdraw) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Site_Withdraw)) : null;
		$Reasons_Withdraw = $siteupdate->getCellByColumnAndRow(21,$row)->getValue();
		$Reasons_of_Withdraw = trim(addslashes($Reasons_Withdraw));
		
		//To add Survey_Plan_Date in New Column	
		//$Survey_Plan_Date = ($SR_Assignment) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP(strtotime($SR_Assignment. '+ 7 days'))) : null;
		$Survey_Plan_Date = ($SR_Assignment_Date) ? (date("Y-m-d", strtotime($SR_Assignment_Date. "+ 7 days"))) : null;
		$Survey = $siteupdate->getCellByColumnAndRow(22,$row)->getValue();
		$Survey_Date = ($Survey) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Survey)): null;
		
		$Survey_Sts = $siteupdate->getCellByColumnAndRow(23,$row)->getValue();
		$Survey_Status = trim(addslashes(ucfirst($Survey_Sts))); //Convert the first character of "done" to uppercase:
		
		//To add `D2B_Plan_Date` in New Column	
		$D2B_Plan_Date = ($Survey_Date) ? date('Y-m-d', strtotime($Survey_Date.  "+ 3 days")) : null;
						
		$D2B_Submission = $siteupdate->getCellByColumnAndRow(24,$row)->getValue();
		$D2B_Submission_Date = ($D2B_Submission) ?  date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($D2B_Submission)): null;
		$Candidate_Name = $siteupdate->getCellByColumnAndRow(25,$row)->getValue();
		$D2B_Confirmation = $siteupdate->getCellByColumnAndRow(26,$row)->getValue();
		$D2B_Status_TowerCo_Confirmation = trim(addslashes(ucwords($D2B_Confirmation)));//Convert the first character of each word to uppercase:
		
		//To add `D2B_Approval_Plan_Date` in New Column	
		$D2B_Approval_Plan_Date = ($D2B_Submission_Date) ? date('Y-m-d', strtotime($D2B_Submission_Date. "+ 3 days")) : null;
		
		$D2BorColoApproval = $siteupdate->getCellByColumnAndRow(27,$row)->getValue();
		$D2BorColoApproval_rejection_holdDate = ($D2BorColoApproval) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($D2BorColoApproval)): null;
		$CommentsonD2B = $siteupdate->getCellByColumnAndRow(28,$row)->getValue();
		$Comments_on_D2B_Status = trim(addslashes($CommentsonD2B));
		$Draft_vendor_RSM = $siteupdate->getCellByColumnAndRow(29,$row)->getValue();
		$Draft_vendor_RSM_TN_BL = trim(addslashes($Draft_vendor_RSM));
		$Draft_vendor = $siteupdate->getCellByColumnAndRow(30,$row)->getValue();
		$Draft_vendor_CW = trim(addslashes($Draft_vendor));
		$DraftWk = $siteupdate->getCellByColumnAndRow(31,$row)->getValue();
		$Draft_Week = trim(htmlspecialchars(addslashes($DraftWk)));
		$Draft_plan = $siteupdate->getCellByColumnAndRow(32,$row)->getValue();
		$Draft_plan_date = ($Draft_plan) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Draft_plan)): null;
		$Draft_actual = $siteupdate->getCellByColumnAndRow(33,$row)->getValue();
		$Draft_actual_Date = ($Draft_actual) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Draft_actual)): null;
		$Draft_sts = $siteupdate->getCellByColumnAndRow(34,$row)->getValue();
		$Draft_status = trim(addslashes(ucfirst($Draft_sts)));
		$Draft_deta = $siteupdate->getCellByColumnAndRow(35,$row)->getValue();
		$Draft_details = trim(addslashes($Draft_deta));
		$Site_Type = $siteupdate->getCellByColumnAndRow(36,$row)->getValue();
		$Site_Type_GF_RTT_RTP = trim(addslashes($Site_Type));
		$Tower_HT = $siteupdate->getCellByColumnAndRow(37,$row)->getValue();
		$Tower_PoleHT_m = trim(addslashes($Tower_HT));
		$Building_HT = $siteupdate->getCellByColumnAndRow(38,$row)->getValue();
		$Building_Base_HT_m = trim(addslashes($Building_HT));
		$Total_HT = $siteupdate->getCellByColumnAndRow(39,$row)->getValue();
		$Total_HT_m = trim(addslashes($Total_HT));
		$BTS_roomType = $siteupdate->getCellByColumnAndRow(40,$row)->getValue();
		$BTS_roomType_OD_ID = trim(htmlspecialchars(addslashes($BTS_roomType)));
		$RNPO_HBA = $siteupdate->getCellByColumnAndRow(41,$row)->getValue();
		$RNPO_Requirements_HBA = trim(htmlspecialchars(addslashes($RNPO_HBA)));
		$TN_Requi = $siteupdate->getCellByColumnAndRow(42,$row)->getValue();
		$TN_Requirements = trim(htmlspecialchars(addslashes($TN_Requi)));
		$Comment_draft = $siteupdate->getCellByColumnAndRow(43,$row)->getValue();
		$Comment_on_draft = trim(addslashes($Comment_draft));
		//To add `Draft_Report_Submission_Plan_date` in New Column	
		$D2B_Approval_Plan_Date = ($D2B_Submission_Date) ? date('Y-m-d', strtotime($D2B_Submission_Date. "+ 3 days")) : null;
		 
				if (($Draft_actual_Date) && ($Draft_status == "Accepted")) 
				{
					$Draft_Report_Submission_Plan_date = ($Draft_actual_Date) ? date('Y-m-d', strtotime($Draft_actual_Date. "+ 3 days")) : Null;
				} else {
					$Draft_Report_Submission_Plan_date = ($Draft_status) ? date('Y-m-d', strtotime($D2BorColoApproval_rejection_holdDate. "+ 3 days")) : Null;				
				}
				
		$Draft_Report_Receive = $siteupdate->getCellByColumnAndRow(44,$row)->getValue();
		$Draft_Report_Receive_date = ($Draft_Report_Receive) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Draft_Report_Receive)): null;
		$Sent_for_validationRNPO_TN = $siteupdate->getCellByColumnAndRow(45,$row)->getValue();
		$Sent_for_validationRNPO_TNrequirement = ($Sent_for_validationRNPO_TN) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Sent_for_validationRNPO_TN)): null;
		$Sent_validat_wishList = $siteupdate->getCellByColumnAndRow(46,$row)->getValue();
		$Sent_for_edotco_validation_wishList = trim(htmlspecialchars(addslashes($Sent_validat_wishList)));
		$Received_feedbackOnRNPO = $siteupdate->getCellByColumnAndRow(47,$row)->getValue();
		$Received_feedbackOnRNPOreq = ($Received_feedbackOnRNPO) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Received_feedbackOnRNPO)): null;
		$Received_feedbackOnTN = $siteupdate->getCellByColumnAndRow(48,$row)->getValue();
		$Received_feedbackOnTNreq = ($Received_feedbackOnTN) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Received_feedbackOnTN)): null;
		$Revised_RNPO = $siteupdate->getCellByColumnAndRow(49,$row)->getValue();
		$Revised_RNPO_requirement_Colo = trim(htmlspecialchars(addslashes($Revised_RNPO)));
		$Revised_TN = $siteupdate->getCellByColumnAndRow(50,$row)->getValue();
		$Revised_TN_requirement_Colo = trim(htmlspecialchars(addslashes($Revised_TN)));
		$Validation_on_RNPO = $siteupdate->getCellByColumnAndRow(51,$row)->getValue();
		$Validation_on_RNPO_requirement = trim(htmlspecialchars(strtoupper($Validation_on_RNPO)));
		$Validation_on_TN_req = $siteupdate->getCellByColumnAndRow(52,$row)->getValue();
		$Validation_on_TN_requirement = trim(htmlspecialchars(strtoupper($Validation_on_TN_req)));
		$Combined_Valid = $siteupdate->getCellByColumnAndRow(53,$row)->getValue();
		$Combined_Validation = trim(htmlspecialchars(strtoupper($Combined_Valid)));
		$Comment_valid = $siteupdate->getCellByColumnAndRow(54,$row)->getValue();
		$Comment_on_validation = trim(htmlspecialchars(addslashes($Comment_valid)));
		$Agreed_RNPO = $siteupdate->getCellByColumnAndRow(55,$row)->getValue();
		$Agreed_RNPO_requirement = trim(htmlspecialchars(addslashes($Agreed_RNPO)));
		$Agreed_TN = $siteupdate->getCellByColumnAndRow(56,$row)->getValue();
		$Agreed_TN_requirement = trim(htmlspecialchars(addslashes($Agreed_TN)));
		$Battery_Backup = $siteupdate->getCellByColumnAndRow(57,$row)->getValue();
		$Battery_Backup_4hr_6hr = trim(htmlspecialchars(addslashes($Battery_Backup)));
		$Site_modal = $siteupdate->getCellByColumnAndRow(58,$row)->getValue();
		$Site_modality = trim(htmlspecialchars(addslashes($Site_modal)));
				
		if ($Border_Site == "YES" and $Border_status == "Permitted" and $Combined_Validation == "OK") 
				{				
				if ($Received_feedbackOnRNPOreq  > $Received_feedbackOnTNreq ) 
				{
						$SO_Issuance_Plan  = $Received_feedbackOnRNPOreq;
				} else {
						$SO_Issuance_Plan  = $Received_feedbackOnTNreq;
						}
				} 
				
			elseif (($Border_Site == '') and ($Border_Site != "YES") and ($Combined_Validation == "OK")) 			
				{				
				if ($Received_feedbackOnRNPOreq  > $Received_feedbackOnTNreq) 
				{
						$SO_Issuance_Plan  = $Received_feedbackOnRNPOreq;
				} else {
						$SO_Issuance_Plan  = $Received_feedbackOnTNreq;
						}
				} else { 
						$SO_Issuance_Plan  = null;
				} 
		
		$Request_for_HO_NOC_SO = $siteupdate->getCellByColumnAndRow(59,$row)->getValue();
		$Request_for_HO_NOC_SO_Issuance_Date = ($Request_for_HO_NOC_SO) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Request_for_HO_NOC_SO)): null;
		$NOC_Rejection = $siteupdate->getCellByColumnAndRow(60,$row)->getValue();
		$NOC_Rejection_Status = ($NOC_Rejection) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($NOC_Rejection)): null;
		$BorSite = $siteupdate->getCellByColumnAndRow(61,$row)->getValue();
		$Border_Site = trim(htmlspecialchars(strtoupper($BorSite)));
		$Border_St_Catg = $siteupdate->getCellByColumnAndRow(62,$row)->getValue();
		$Border_Site_Category = trim(htmlspecialchars(addslashes($Border_St_Catg)));
		$Bord_sts = $siteupdate->getCellByColumnAndRow(63,$row)->getValue();
		$Border_status = trim(htmlspecialchars(ucfirst($Bord_sts))); //ucwords Convert the first character of each word to uppercase:
		$Border_Permission = $siteupdate->getCellByColumnAndRow(64,$row)->getValue();
		$Border_Permission_Date = ($Border_Permission) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Border_Permission)): null;
		$HO_NOC = $siteupdate->getCellByColumnAndRow(65,$row)->getValue();
		$HO_NOC_Date = ($HO_NOC) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($HO_NOC)) : null;
		$CW_Starts_Date_RFC = $siteupdate->getCellByColumnAndRow(66,$row)->getValue();
		$CW_Starts_Date_RFC_Date_for_Colo = ($CW_Starts_Date_RFC) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($CW_Starts_Date_RFC)): null;
		$BTS_Base_Readiness = $siteupdate->getCellByColumnAndRow(67,$row)->getValue();
		$BTS_Base_Readiness_Date = ($BTS_Base_Readiness) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($BTS_Base_Readiness)): null;
		$Tower_Pole_Erection = $siteupdate->getCellByColumnAndRow(68,$row)->getValue();
		$Tower_Pole_Erection_Date = ($Tower_Pole_Erection) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Tower_Pole_Erection)): null;
		$CP_Application = $siteupdate->getCellByColumnAndRow(69,$row)->getValue();
		$CP_Application_Date = ($CP_Application) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($CP_Application)): null;
		$CP_connection_plan = $siteupdate->getCellByColumnAndRow(70,$row)->getValue();
		$CP_connection_plan_Date = ($CP_connection_plan) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($CP_connection_plan)): null;
		$CP_connection_actual = $siteupdate->getCellByColumnAndRow(71,$row)->getValue();
		$CP_connection_actual_Date = ($CP_connection_actual) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($CP_connection_actual)): null;
		$Pwr_Auth = $siteupdate->getCellByColumnAndRow(72,$row)->getValue();
		$Power_Authority = trim(htmlspecialchars(addslashes($Pwr_Auth)));
		$Pwer_off = $siteupdate->getCellByColumnAndRow(73,$row)->getValue();
		$Power_office = trim(htmlspecialchars(addslashes($Pwer_off)));
		$Sanct_ld = $siteupdate->getCellByColumnAndRow(74,$row)->getValue();
		$Sanction_load_KW = trim(htmlspecialchars(addslashes($Sanct_ld)));
		$Ph_Typ = $siteupdate->getCellByColumnAndRow(75,$row)->getValue();
		$Phase_Type	= trim(htmlspecialchars(addslashes($Ph_Typ)));
		$Metr_typ = $siteupdate->getCellByColumnAndRow(76,$row)->getValue();
		$Meter_type = trim(htmlspecialchars(addslashes($Metr_typ )));
		$Metr_Sl_No = $siteupdate->getCellByColumnAndRow(77,$row)->getValue();
		$Meter_Serial_No = trim(htmlspecialchars(addslashes($Metr_Sl_No)));
		$Custmr_Accnt_No = $siteupdate->getCellByColumnAndRow(78,$row)->getValue();
		$Customer_No_Account_No = trim(htmlspecialchars(addslashes($Custmr_Accnt_No)));
		$TwrCo_Sts = $siteupdate->getCellByColumnAndRow(79,$row)->getValue();
		$TowerCo_Status = trim(htmlspecialchars(addslashes($TwrCo_Sts)));
		$ColoTAS = $siteupdate->getCellByColumnAndRow(80,$row)->getValue();
		$ColoTAS_Requirement = trim(htmlspecialchars(addslashes($ColoTAS)));
		$Final_sts2 = $siteupdate->getCellByColumnAndRow(81,$row)->getValue();
		$Final_status02 = trim(htmlspecialchars(addslashes($Final_sts2)));
		$Rmrk_CloTAS_Acpted = $siteupdate->getCellByColumnAndRow(82,$row)->getValue();
		$Remarks_ColoTAS_Accepted = trim(htmlspecialchars(addslashes($Rmrk_CloTAS_Acpted)));
		$Rmrks_dtls = $siteupdate->getCellByColumnAndRow(83,$row)->getValue();
		$Remarks_details = trim(htmlspecialchars(addslashes($Rmrks_dtls)));
		$RFAI_Pln_Wk = $siteupdate->getCellByColumnAndRow(84,$row)->getValue();
		$RFAI_Plan_Week = trim(htmlspecialchars(addslashes($RFAI_Pln_Wk)));
		
		$RFAI_Plan = $siteupdate->getCellByColumnAndRow(85,$row)->getValue();
		$RFAI_Plan_Date = ($RFAI_Plan) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($RFAI_Plan)): null;
		$RFAI_Actual = $siteupdate->getCellByColumnAndRow(86,$row)->getValue();
		$RFAI_Actual_Date = ($RFAI_Actual) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($RFAI_Actual)): null;
		$RFAI_Mon = $siteupdate->getCellByColumnAndRow(87,$row)->getValue();
		$RFAI_Target_Month = trim(htmlspecialchars(addslashes($RFAI_Mon)));
		$Comnt_on_RFAI = $siteupdate->getCellByColumnAndRow(88,$row)->getValue();
		$Comment_on_RFAI = trim(htmlspecialchars(addslashes($Comnt_on_RFAI)));
		$BLCW_engr = $siteupdate->getCellByColumnAndRow(89,$row)->getValue();
		$BL_CW_engineer = trim(htmlspecialchars(addslashes($BLCW_engr)));
		$BLCW_Vndr = $siteupdate->getCellByColumnAndRow(90,$row)->getValue();
		$BL_CW_Vendor = trim(htmlspecialchars(addslashes($BLCW_Vndr)));
		$D6_plan = $siteupdate->getCellByColumnAndRow(91,$row)->getValue();
		$D6_plan_Date = ($D6_plan) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($D6_plan)): null;
		$D6_actual = $siteupdate->getCellByColumnAndRow(92,$row)->getValue();
		$D6_actual_Date = ($D6_actual) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($D6_actual)): null;
		$ComntD6 = $siteupdate->getCellByColumnAndRow(93,$row)->getValue();
		$Comment_on_D6 = trim(htmlspecialchars(addslashes($ComntD6)));
		$Planned_On_Air = $siteupdate->getCellByColumnAndRow(94,$row)->getValue();
		$Planned_On_Air_Date = ($Planned_On_Air) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Planned_On_Air)): null;
		$Actual_On_air = $siteupdate->getCellByColumnAndRow(95,$row)->getValue();
		$Actual_On_air_Date = ($Actual_On_air) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Actual_On_air)): null;
		$Onair_mnth = $siteupdate->getCellByColumnAndRow(96,$row)->getValue();
		$On_air_month = trim(htmlspecialchars(addslashes($Onair_mnth)));
		$OnAir_yr = $siteupdate->getCellByColumnAndRow(97,$row)->getValue();
		$On_air_year = trim(htmlspecialchars(addslashes($OnAir_yr)));
		$Mntly_rentBDT = $siteupdate->getCellByColumnAndRow(98,$row)->getValue();
		$Monthly_rent_BDT = trim(htmlspecialchars(addslashes($Mntly_rentBDT)));
		$Rental_month_BL = $siteupdate->getCellByColumnAndRow(99,$row)->getValue();
		$Rental_passthroughBDTper_month_BL = trim(htmlspecialchars(addslashes($Rental_month_BL)));
		$eco2Share = $siteupdate->getCellByColumnAndRow(100,$row)->getValue();
		$edotco2Share20 = trim(htmlspecialchars(addslashes($co2Share)));
		$Rent_effective_RFAI = $siteupdate->getCellByColumnAndRow(101,$row)->getValue();
		$Rent_effective_Date_RFAI = ($Rent_effective_RFAI) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Rent_effective_RFAI)): null;
		$Escltion = $siteupdate->getCellByColumnAndRow(102,$row)->getValue();
		$escalation = trim(htmlspecialchars(addslashes($Escltion)));
		$Yr_of_Escltion = $siteupdate->getCellByColumnAndRow(103,$row)->getValue();
		$Year_of_escalation = trim(htmlspecialchars(addslashes($Yr_of_Escltion)));
		$Addnal_itemBDT = $siteupdate->getCellByColumnAndRow(104,$row)->getValue();
		$Additional_item_costBDT = trim(htmlspecialchars(addslashes($Addnal_itemBDT)));
		$Addinal_item_confir = $siteupdate->getCellByColumnAndRow(105,$row)->getValue();
		$Additional_item_confirmation = trim(htmlspecialchars(addslashes($Addinal_item_confir)));
		$ItemDescrip = $siteupdate->getCellByColumnAndRow(106,$row)->getValue();
		$Item_description= trim(htmlspecialchars(addslashes($ItemDescrip)));
		$Monthly_provision = $siteupdate->getCellByColumnAndRow(107,$row)->getValue();
		$Monthly_provision_given_Date = ($Monthly_provision) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Monthly_provision)): null;
		$Planned_I_and_C = $siteupdate->getCellByColumnAndRow(108,$row)->getValue();
		$Planned_I_and_C_Date = ($Planned_I_and_C) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Planned_I_and_C)): null;
		$Actual_I_and_C = $siteupdate->getCellByColumnAndRow(109,$row)->getValue();
		$Actual_I_and_C_Date = ($Actual_I_and_C) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Actual_I_and_C)): null;
		$Planned_OnAir = $siteupdate->getCellByColumnAndRow(110,$row)->getValue();
		$Planned_OnAir_Date = ($Planned_OnAir) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Planned_OnAir)): null;
		$Actual_OnAir = $siteupdate->getCellByColumnAndRow(111,$row)->getValue();
		$Actual_OnAir_Date = ($Actual_OnAir) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Actual_OnAir)): null;
		$Remrk = $siteupdate->getCellByColumnAndRow(112,$row)->getValue();
		$Remarks = trim(htmlspecialchars(addslashes($Remrk)));
		$Dupli_Chk = $siteupdate->getCellByColumnAndRow(113,$row)->getValue();
		$Duplicate_Check = trim(htmlspecialchars(addslashes($Dupli_Chk)));
		$SharTag = $siteupdate->getCellByColumnAndRow(114,$row)->getValue();
		$Sharing_Tag = trim(htmlspecialchars(addslashes($SharTag)));
		$TwrCo_Iden = $siteupdate->getCellByColumnAndRow(115,$row)->getValue();
		$TowerCo_Identity = trim(htmlspecialchars(addslashes($TwrCo_Iden)));
		$currentDate=date('Y-m-d', time ()); //current Date insert 
		//$ctime=date('H:i:s', time ());
	
		//$twrcosite_query=mysqli_query($con,"select `id`,`UniqueID` from `new_site_assignment` where `UniqueID`='$UniqueID';");
		//$towrcosite=mysqli_fetch_array($twrcosite_query);
		$twrsiteid=$towrcosite['UniqueID'];
			
		//if($twrsiteid=="$UniqueID")
		//{
$insertqry="INSERT INTO `new_site_assignment`(`UserId`,`UniqueID`,`ReportingID`,`GenericID`,`BLsiteID`,`TOWERCO_SiteID`,`TowerCo_name`,`D1_Type`,`Rollout_Category`,`Longitude`,`Latitute`,`Division`,`District`,`Thana`,`Sales_Region`,`Detail_site_Address`,`Active_equipment`,`SR_Assignment_Date`,`Site_Rejection_Date`,`Reasons_of_Rejection`,`Site_Withdraw_Date`,`Reasons_of_Withdraw`,`Survey_Plan_Date`,`Survey_Date`,`Survey_Status`,`D2B_Plan_Date`,`D2B_Submission_Date`,`Candidate_Name`,`D2B_Status_TowerCo_Confirmation`,`D2B_Approval_Plan_Date`,`D2BorColoApproval_rejection_holdDate`,`Comments_on_D2B_Status`,`Draft_vendor_RSM_TN_BL`,`Draft_vendor_CW`,`draft_week`,`Draft_plan_date`,`Draft_actual_Date`,`Draft_status`,`Draft_details`,`Site_Type_GF_RTT_RTP`,`Tower_PoleHT_m`,`Building_Base_HT_m`,`Total_HT_m`,`BTS_roomType_OD_ID`,`RNPO_Requirements_HBA`,`TN_Requirements`,`Comment_on_draft`,`Draft_Report_Submission_Plan_date`,`Draft_Report_Receive_date`,`Sent_for_validationRNPO_TNrequirement`,`sent_for_edotco_validation_wishlist`,`Received_feedbackOnRNPOreq`,`Received_feedbackOnTNreq`,`Revised_RNPO_requirement_Colo`,`Revised_TN_requirement_Colo`,`Validation_on_RNPO_requirement`,`Validation_on_TN_requirement`,`Combined_Validation`,`Comment_on_validation`, `Agreed_RNPO_requirement`, `Agreed_TN_requirement`, `Battery_Backup_4hr_6hr`, `Site_modality`, `SO_Issuance_Plan`, `Request_for_HO_NOC_SO_Issuance_Date`, `NOC_Rejection_Status`, `Border_Site`, `Border_Site_Category`,`Border_status`,`Border_Permission_Date`,`HO_NOC_Date`,`CW_Starts_Date_RFC_Date_for_Colo`,`BTS_Base_Readiness_Date`,`Tower_Pole_Erection_Date`,`CP_Application_Date`,`CP_connection_plan_Date`, `CP_connection_actual_Date`,`Power_Authority`,`Power_office`,`Sanction_load_KW`,`Phase_Type`,`Meter_type`,`Meter_Serial_No`,`Customer_No_Account_No`,`TowerCo_Status`, `ColoTAS_Requirement`, `Final_status02`,`Remarks_ColoTAS_Accepted`,`Remarks_details`,`RFAI_Plan_Week`,`RFAI_Plan_Date`,`RFAI_Actual_Date`,`RFAI_Target_Month`,`Comment_on_RFAI`,`BL_CW_engineer`,`BL_CW_Vendor`,`D6_plan_Date`,`D6_actual_Date`,`Comment_on_D6`,`Planned_On_Air_Date`,`Actual_On_air_Date`,`On_air_month`,`On_air_year`,`monthly_rent_bdt`,`Rental_passthroughBDTper_month_BL`,`edotco2share20%_addi_amountabove60%`,`Rent_effective_Date_RFAI`,`%_escalation`,`Year_of_escalation`,`Additional_item_costBDT`, `Additional_item_confirmation`, `Item_description`, `Monthly_provision_given_Date`, `Planned_I_and_C_Date`, `Actual_I_and_C_Date`, `Planned_OnAir_Date`, `Actual_OnAir_Date`, `Remarks`, `Duplicate_Check`, `sharing_tag`, `TowerCo_Identity`,`updationDate`) VALUES ('$uid','$UniqueID','$ReportingID','$GenericID','$BLsiteID','$TOWERCO_SiteID','$TowerCo_name','$D1_Type','$Rollout_Category','$Longitude','$Latitute','$Division','$District','$Thana','$Sales_Region','$Detail_site_Address','$Active_equipment','$SR_Assignment_Date','$Site_Rejection_Date','$Reasons_of_Rejection','$Site_Withdraw_Date','$Reasons_of_Withdraw','$Survey_Plan_Date','$Survey_Date','$Survey_Status','$D2B_Plan_Date','$D2B_Submission_Date','$Candidate_Name','$D2B_Status_TowerCo_Confirmation','$D2B_Approval_Plan_Date','$D2BorColoApproval_rejection_holdDate','$Comments_on_D2B_Status','$Draft_vendor_RSM_TN_BL','$Draft_vendor_CW','$Draft_Week','$Draft_plan_date','$Draft_actual_Date','$Draft_status','$Draft_details','$Site_Type_GF_RTT_RTP','$Tower_PoleHT_m','$Building_Base_HT_m','$Total_HT_m','$BTS_roomType_OD_ID','$RNPO_Requirements_HBA','$TN_Requirements','$Comment_on_draft','$Draft_Report_Submission_Plan_date','$Draft_Report_Receive_date','$Sent_for_validationRNPO_TNrequirement','$Sent_for_edotco_validation_wishList','$Received_feedbackOnRNPOreq','$Received_feedbackOnTNreq','$Revised_RNPO_requirement_Colo','$Revised_TN_requirement_Colo','$Validation_on_RNPO_requirement','$Validation_on_TN_requirement','$Combined_Validation','$Comment_on_validation','$Agreed_RNPO_requirement','$Agreed_TN_requirement','$Battery_Backup_4hr_6hr','$Site_modality','$SO_Issuance_Plan','$Request_for_HO_NOC_SO_Issuance_Date','$NOC_Rejection_Status','$Border_Site','$Border_Site_Category','$Border_status','$Border_Permission_Date','$HO_NOC_Date','$CW_Starts_Date_RFC_Date_for_Colo','$BTS_Base_Readiness_Date','$Tower_Pole_Erection_Date','$CP_Application_Date','$CP_connection_plan_Date','$CP_connection_actual_Date','$Power_Authority','$Power_office','$Sanction_load_KW','$Phase_Type','$Meter_type','$Meter_Serial_No','$Customer_No_Account_No','$TowerCo_Status','$ColoTAS_Requirement','$Final_status02','$Remarks_ColoTAS_Accepted','$Remarks_details','$RFAI_Plan_Week','$RFAI_Plan_Date','$RFAI_Actual_Date','$RFAI_Target_Month','$Comment_on_RFAI','$BL_CW_engineer','$BL_CW_Vendor','$D6_plan_Date','$D6_actual_Date','$Comment_on_D6','$Planned_On_Air_Date','$Actual_On_air_Date','$On_air_month','$On_air_year','$Monthly_rent_BDT','$Rental_passthroughBDTper_month_BL','$edotco2Share20','$Rent_effective_Date_RFAI','$escalation','$Year_of_escalation','$Additional_item_costBDT','$Additional_item_confirmation','$Item_description','$Monthly_provision_given_Date','$Planned_I_and_C_Date','$Actual_I_and_C_Date','$Planned_OnAir_Date','$Actual_OnAir_Date','$Remarks','$Duplicate_Check','$Sharing_Tag','$TowerCo_Identity','$currentDate')";
$insertres=mysqli_query($con,$insertqry);
		} 
		
		//else {
 
		//}
//}
//echo "<script>alert('Something went wrong to update TowerCo site. Please try again.');</script>";
echo "<script>alert(' Your data request has been completed successfully.');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Import Tower-Co Site List - Rollout Master</title>
	
	<!-- Data Table CSS -->
	<link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
   
       <!-- Styles -->
       
	<link href="dist/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="dist/css/font-awesome.min.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/font-awesome.min.css" type="text/css"/>
<style>
	.tr:hover,
	.tr:focus,
	.tr:active	{
  background-color: #F00A7C;
	}
	
	tr.tr-hover-class:hover {
      background: #F00A7C!important;
   }
  


   </style>
</head>

<body>
    
    
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

<!-- Top Navbar -->
<?php include_once('includes/header.php');
include_once('includes/sidebar.php');
?>
       


        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->



        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
           <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-dark black bg-dark" style="border: 1px solid #F00A7C">
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>&nbsp;Tower-Co Rollout Site List</a></li>
					<li class="breadcrumb-item active" aria-current="page">Import</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            
<!--Start-->
   <div class="container">
                <!-- Title -->
           
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
					
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12">

						<div class="table-wrap">  <!--table-wrap-->
			
					
			
							<div class="panel panel-default">
							
							<div class="Panel panel-heading" style="position:relative; margin-left:1.5%;margin-top:1%;"><b><i class="fa fa-list-ul"></i>&nbsp;Tower-Co Site Details Import.</b></div>	
							<div class="Panel panel-body " style="border-top: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">  <!--table-->
                                     <!-- /My Code -->   
											<br>
									
								<p style="text-align:center; vertical-align: middle;"><em class="fa fa-database">&nbsp;</em><label>Tower-Co Site list update</label></p>
									<form  method="post" action="sitelist-update.php" enctype="multipart/form-data">
									
									<!--<table  class="table table-striped display" style="white-space:nowrap;height:auto; width:100%;">-->
									<table   class="table table-striped display" style="white-space:nowrap;height:auto; width:auto;vertical-align:top; margin-left: auto; margin-right: auto; margin-top: auto;">
									<tbody>
									
										<tr >
										<td><div class="form-group"></div></td>	
										
											<td><div class="form-group"></div></td>
											<td><div class="form-group"></div></td>
											<td style="text-align:left; vertical-align: middle;"><div class="form-group"><input class="form-control" type="file"  id="uploadfile" name="uploadfile" required="true" style="text-align:Left; vertical-align: middle;"></div><div class="form-group"><span><font size="2" class="form-data" face="Arial Narrow" color="#0000FF">** Click to Download Template: <a href="TowerCo_File to upload-Template.xlsx"><strong>TowerCo Site List Upload (.xlsx)</strong></a></font></span></div></td>
							
											<td style="text-align:center; vertical-align: middle;"><div class="form-group"><input type="submit" name="submit" class="btn btn-primary has-success" style="margin: 0; position: absolute;
											top: 58%;transform: translateY(-50%);-ms-transform: translateY(-50%);"/></div></td>
											<td><div class="form-group"></div></td>
											<td><div class="form-group"></div></td>
											<td><div class="form-group"></div></td>
										
										</tr>
										
									</tbody>
									
									</table>
									
									</form>							
								
								   </div>
                                </div>
                            
						
						</div>	<!--panel-->


<br>
<br>
<br>
<br>
</div>
</div>
</section>
                     
</div>
</div>
</div>
	
	
            <!-- Footer -->
<?php include_once('includes/footer.php');?>
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>
	
   
 <!-- /HK Wrapper -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    
	<script src="vendors/bootstrap-table/dist/bootstrap-table.min.js"></script>
	<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
	<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
   
		
   	<script src="vendors/materialize/js/materialize.min.js"></script>
	<script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	    
	<script src="dist/js/dataTables-data.js"></script>
   
	<script src="dist/js/feather.min.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>

</body>
</html>
<?php mysqli_close($con); } ?>