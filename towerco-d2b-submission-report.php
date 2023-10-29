<?php  
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['osemsuid']==0)) {
  header('location:logout.php');
  } else{
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


// Add Entry Code
if(isset($_POST['apply']))
{
$loginid = $_SESSION['osemsuid'];
$FromDate = $_POST['fromdate'];  
$ToDate = $_POST['todate'];
$vendor = trim($_POST['vendortype']);
$fDate = date("Y-m-d",strtotime($FromDate));
$tDate = date("Y-m-d",strtotime($ToDate));

//echo print_r($_POST, true);
//exit;
	
if($FromDate > $ToDate){
                //$error=" To Date should be greater than From Date ";
				echo "<script>alert('To Date should be greater than From Date.');</script>";   
				echo "<script>window.location.href='towerco-d2b-submission-report.php'</script>";	
           }

if($vendor == 1 ){

$tbluser=mysqli_query($con,"SELECT `id`,`UserId`,`UniqueID`,`ReportingID`,`GenericID`,`BLsiteID`,`TOWERCO_SiteID`,`TowerCo_name`,`D1_Type`,`Rollout_Category`,`Longitude`,`Latitute`,`Division`,`District`,`Thana`,`Sales_Region`,`Detail_site_Address`,`Active_equipment`,`SR_Plan_Date`,`SR_Assignment_Date`,`Site_Rejection_Date`,`Reasons_of_Rejection`,`Site_Withdraw_Date`,`Reasons_of_Withdraw`,`Survey_Plan_Date`,`Survey_Date`,`Survey_Status`,`D2B_Plan_Date`,`D2B_Submission_Date`,`Candidate_Name`,`D2B_Status_TowerCo_Confirmation`,`D2B_Approval_Plan_Date`,`D2BorColoApproval_rejection_holdDate`,`Comments_on_D2B_Status`,`Draft_vendor_RSM_TN_BL`,`Draft_vendor_CW`,`draft_week`,`Draft_plan_date`,`Draft_actual_Date`,`Draft_status`,`Draft_details`,`Site_Type_GF_RTT_RTP`,`Tower_PoleHT_m`,`Building_Base_HT_m`,`Total_HT_m`,`BTS_roomType_OD_ID`,`RNPO_Requirements_HBA`,`TN_Requirements`,`Comment_on_draft`,`Draft_Report_Submission_Plan_date`,`Draft_Report_Receive_date`,`Sent_for_validationRNPO_TNrequirement`,`sent_for_edotco_validation_wishlist`,`Received_feedbackOnRNPOreq`,`Received_feedbackOnTNreq`,`Revised_RNPO_requirement_Colo`,`Revised_TN_requirement_Colo`,`Validation_on_RNPO_requirement`,`Validation_on_TN_requirement`,`Combined_Validation`,`Comment_on_validation`, `Agreed_RNPO_requirement`, `Agreed_TN_requirement`, `Battery_Backup_4hr_6hr`, `Site_modality`, `SO_Issuance_Plan`, `Request_for_HO_NOC_SO_Issuance_Date`, `NOC_Rejection_Status`, `Border_Site`, `Border_Site_Category`,`Border_status`,`Border_Permission_Date`,`HO_NOC_Date`,`CW_Starts_Date_RFC_Date_for_Colo`,`BTS_Base_Readiness_Date`,`Tower_Pole_Erection_Date`,`CP_Application_Date`,`CP_connection_plan_Date`, `CP_connection_actual_Date`,`Power_Authority`,`Power_office`,`Sanction_load_KW`,`Phase_Type`,`Meter_type`,`Meter_Serial_No`,`Customer_No_Account_No`,`TowerCo_Status`, `ColoTAS_Requirement`, `Final_status02`,`Remarks_ColoTAS_Accepted`,`Remarks_details`,`RFAI_Plan_Week`,`RFAI_Plan_Date`,`RFAI_Actual_Date`,`RFAI_Target_Month`,`Comment_on_RFAI`,`BL_CW_engineer`,`BL_CW_Vendor`,`D6_plan_Date`,`D6_actual_Date`,`Comment_on_D6`,`Planned_On_Air_Date`,`Actual_On_air_Date`,`On_air_month`,`On_air_year`,`monthly_rent_bdt`,`Rental_passthroughBDTper_month_BL`,`edotco2share20%_addi_amountabove60%`,`Rent_effective_Date_RFAI`,`%_escalation`,`Year_of_escalation`,`Additional_item_costBDT`, `Additional_item_confirmation`, `Item_description`, `Monthly_provision_given_Date`, `Planned_I_and_C_Date`, `Actual_I_and_C_Date`, `Planned_OnAir_Date`, `Actual_OnAir_Date`, `Remarks`, `Duplicate_Check`, `sharing_tag`, `TowerCo_Identity`,`updationDate` FROM new_site_assignment
WHERE D2B_Submission_Date BETWEEN '$fDate' and '$tDate';");

	} elseif ($vendor == ($_POST['vendortype'])) {
	
	$tbluser=mysqli_query($con,"SELECT `id`,`UserId`,`UniqueID`,`ReportingID`,`GenericID`,`BLsiteID`,`TOWERCO_SiteID`,`TowerCo_name`,`D1_Type`,`Rollout_Category`,`Longitude`,`Latitute`,`Division`,`District`,`Thana`,`Sales_Region`,`Detail_site_Address`,`Active_equipment`,`SR_Plan_Date`,`SR_Assignment_Date`,`Site_Rejection_Date`,`Reasons_of_Rejection`,`Site_Withdraw_Date`,`Reasons_of_Withdraw`,`Survey_Plan_Date`,`Survey_Date`,`Survey_Status`,`D2B_Plan_Date`,`D2B_Submission_Date`,`Candidate_Name`,`D2B_Status_TowerCo_Confirmation`,`D2B_Approval_Plan_Date`,`D2BorColoApproval_rejection_holdDate`,`Comments_on_D2B_Status`,`Draft_vendor_RSM_TN_BL`,`Draft_vendor_CW`,`draft_week`,`Draft_plan_date`,`Draft_actual_Date`,`Draft_status`,`Draft_details`,`Site_Type_GF_RTT_RTP`,`Tower_PoleHT_m`,`Building_Base_HT_m`,`Total_HT_m`,`BTS_roomType_OD_ID`,`RNPO_Requirements_HBA`,`TN_Requirements`,`Comment_on_draft`,`Draft_Report_Submission_Plan_date`,`Draft_Report_Receive_date`,`Sent_for_validationRNPO_TNrequirement`,`sent_for_edotco_validation_wishlist`,`Received_feedbackOnRNPOreq`,`Received_feedbackOnTNreq`,`Revised_RNPO_requirement_Colo`,`Revised_TN_requirement_Colo`,`Validation_on_RNPO_requirement`,`Validation_on_TN_requirement`,`Combined_Validation`,`Comment_on_validation`, `Agreed_RNPO_requirement`, `Agreed_TN_requirement`, `Battery_Backup_4hr_6hr`, `Site_modality`, `SO_Issuance_Plan`, `Request_for_HO_NOC_SO_Issuance_Date`, `NOC_Rejection_Status`, `Border_Site`, `Border_Site_Category`,`Border_status`,`Border_Permission_Date`,`HO_NOC_Date`,`CW_Starts_Date_RFC_Date_for_Colo`,`BTS_Base_Readiness_Date`,`Tower_Pole_Erection_Date`,`CP_Application_Date`,`CP_connection_plan_Date`, `CP_connection_actual_Date`,`Power_Authority`,`Power_office`,`Sanction_load_KW`,`Phase_Type`,`Meter_type`,`Meter_Serial_No`,`Customer_No_Account_No`,`TowerCo_Status`, `ColoTAS_Requirement`, `Final_status02`,`Remarks_ColoTAS_Accepted`,`Remarks_details`,`RFAI_Plan_Week`,`RFAI_Plan_Date`,`RFAI_Actual_Date`,`RFAI_Target_Month`,`Comment_on_RFAI`,`BL_CW_engineer`,`BL_CW_Vendor`,`D6_plan_Date`,`D6_actual_Date`,`Comment_on_D6`,`Planned_On_Air_Date`,`Actual_On_air_Date`,`On_air_month`,`On_air_year`,`monthly_rent_bdt`,`Rental_passthroughBDTper_month_BL`,`edotco2share20%_addi_amountabove60%`,`Rent_effective_Date_RFAI`,`%_escalation`,`Year_of_escalation`,`Additional_item_costBDT`, `Additional_item_confirmation`, `Item_description`, `Monthly_provision_given_Date`, `Planned_I_and_C_Date`, `Actual_I_and_C_Date`, `Planned_OnAir_Date`, `Actual_OnAir_Date`, `Remarks`, `Duplicate_Check`, `sharing_tag`, `TowerCo_Identity`,`updationDate` FROM new_site_assignment
WHERE D2B_Submission_Date BETWEEN '$fDate' and '$tDate' and TowerCo_name = '$vendor';");

	 } else {
$tbluser=mysqli_query($con,"");		 
echo "<script>window.location.href='towerco-d2b-submission-report.php'</script>";			 
	 }
//echo var_dump($Emp_result) . "<br>";
	
}



    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title> TowerCo D2B Submission Report - Rollout Master</title>
	
		<!-- Data Table CSS -->
	<link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
   
       <!-- Styles -->
       
	<link href="dist/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="dist/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/font-awesome.min.css" type="text/css"/>

<style>

 .button3:hover, focus {background:#F00A7C; background-color: #F00A7C;}
 
 	.form-info:hover,focus,active {box-shadow: 	0 0 5px rgba(240,10,124, 2);}
	
	.tr:hover,
	.tr:focus,
	.tr:active	{
  background-color: #F00A7C;
	}
	
	tr.tr-hover-class:hover {
      background: #F00A7C!important;
   }
  
.pagination: hover {
    background: #F00A7C;
   
    text - decoration: none;
    color: #F00A7C;
    border: 1px solid # c6c6c6;
    font - weight: bold;
    border - radius: 3px;
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
                <ol class="breadcrumb breadcrumb-dark bg-dark" style="border: 1px solid #F00A7C">
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>&nbsp;Reports</a></li>
					<li class="breadcrumb-item active" aria-current="page">TowerCo D2B Submission Report</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container overflow-hidden">
                <!-- Title -->
                <!--<div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Attendance Entry Request</h4>
                </div>-->
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
					
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-xl-12">

						<div class="" style="border: 1px solid #F00A7C;border-right: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">  <!--table-wrap-->
			
							<div class="panel panel-default">
							
							<div class="Panel panel-heading" style="position:relative; margin-left:1.5%;margin-top:1%;" width="100%"><i class="fa fa-list-ul"></i>&nbsp; View TowerCo D2B Submission Details: </div>	
							<div class="Panel panel-body "> <!--table-->
							
									
	<form  class="needs-validation" method="post" action="towerco-d2b-submission-report.php" enctype="multipart/form-data">
       
	   
<div class="form-row g-4">

<!--<div class="divider" style="border: 10px solid transparent; margin-top:auto; margin-bottom:auto; color:orange"></div>-->

<div class="form-row" style="position:relative; margin-left:1.5%;margin-top:1%;" width="100%">

<div class="col-md-12 mb-10">
 
 <div class="form-group pull-left">
<label for="validationCustom03" class="text" style="font-weight:bold; color:#F00A7C; margin-top:0%; position: relative;">TowerCo Name :</label>
<select class="form-control" style="width:300px;height:40px;font-size:14px" name="vendortype"  required="" value="
<?php //echo isset($_POST['vendortype'])? ($_POST['vendortype']):'';
?>" autofocus="true" >
<option <?php if (isset($vendor) && $vendor == "Select All TowerCo") echo "selected"; ?> value= "1" style="color:#F00A7C;">Select All TowerCo</option>
<?php 
$queryAttn=mysqli_query($con,"SELECT distinct(TowerCo_name) AS TwrCo FROM new_site_assignment;");
while ($Company=mysqli_fetch_array($queryAttn)) {

?>
<option <?php if (isset($vendor) && $vendor == $Company['TwrCo'] ) echo "selected"; ?> value="<?php echo htmlentities($Company['TwrCo']);?>"><?php echo htmlentities($Company['TwrCo']);?></option>
<?php
}
?>	
</select>
<div class="invalid-feedback">Please select a status.</div>
</div>
  
  
<div class="form-group pull-left">
<label class="text" style="font-weight:bold; color:#F00A7C; margin-top:0%; position: relative;"> &nbsp; &nbsp; D2B Submission From Date :</label>
<input class="form-control" type="date" name="fromdate" style="width:231px;height:40px; position: relative; margin-left:5%;" required="" value="<?php echo isset($_POST['fromdate'])? date("Y-m-d",strtotime($_POST['fromdate'])):'';?>" />
<div class="invalid-feedback">Please provide a start Date.</div>
</div>

 <div class="form-group pull-left">
<label class="text" style="font-weight:bold; color:#F00A7C; margin-top:0%;margin-right:0%; position: relative;">&nbsp; &nbsp; &nbsp; D2B Submission To Date :</label>
<input class="form-control" type="date" name="todate" style="width:231px;height:40px; position: relative; margin-left:10%;"  required="" value="<?php echo isset($_POST['todate'])? date("Y-m-d",strtotime($_POST['todate'])):'';?>" />
<div class="invalid-feedback">Please provide an end Date.</div>
</div>


<div class="form-group pull-left">
<label></label>
<button class="form-control btn btn-primary button3" type="submit" name="apply" style="width:100px;height:40px position: relative; margin-left:32%; margin-top:7%;">Submit</button>
</div>

</div>
</div>

  
</div>


</form>

								</div>
							</div><!--panel-body table-->
						</div>	<!--panel-->


</div>
</div>
</section>
                     
</div>
</div>
</div>
<!--Start-->
<div class="container">
                <!-- Title -->
                <!--<div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Attendance Entry Request</h4>
                </div>-->
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
					
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-xl-12">

						<div class="table-wrap">  <!--table-wrap-->
			
					
			
							<div class="panel panel-default">
							
							<div class="Panel panel-heading" style="position:relative; margin-left:1.5%;margin-top:1%;"><b><i class="fa fa-list-ul"></i>&nbsp; TowerCo D2B Submission Details;</b></div>	
							<div class="Panel panel-body " style="border-top: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">  <!--table-->
                                     <!-- /My Code -->   
																				

			
								
<?php 
	
?>
								
								<br>										

								<div class="table-responsive">
								
								<table id="datable_11lm" class="display table table-fit table-bordered table-striped nowrap cell-border compact stripe" style="width:100%;">
									
									<thead>
										<tr>
										
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sl#</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Unique</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Reporting ID</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Generic ID</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">BL site ID</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TOWERCO Site ID</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TowerCo name</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D1 Type</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Rollout Category</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Longitude</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Latitute</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Division</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">District</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Thana</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sales Region</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Detail Site Address</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Active Eqnt</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">SR (Assignment) Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Site Rejection Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Reasons of Rejection</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Site Withdraw Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Reasons of Withdraw</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">Survey Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Survey Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Survey Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#0a5e35;">D2B Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D2B Report Submission Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Candidate Name</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D2B Status/ TowerCo Confirmation</th>
										
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">D2B Approval Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D2B or Colo approval/ rejection/ hold date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comments on D2B Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft vendor_RSM/TN_BL</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft vendor_CW</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft Week </th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">Draft plan date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft actual Date </th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft details</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Site Type(GF/RTT/RTP</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Tower/ Pole HT(m)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Building/Base HT(m)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Total HT(m)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">BTS room type(OD/ID)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">RNPO Requirements(HBA)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TN Requirements</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comment on draft</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">Draft Report Submission Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft Report Receive Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sent for validation_RNPO & TN requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sent for edotco validation (wishList)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Received feedback on RNPO req</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Received feedback on TN req</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Revised RNPO requirement (Colo)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Revised TN requirement (Colo)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Validation on RNPO requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Validation on TN requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">Combined Validation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comment on validation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Agreed RNPO requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Agreed TN requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Battery Backup (4hr/6hr)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Site modality</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">SO Issuance Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Request for HO NOC/SO Issuance Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">NOC Rejection Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Border Site</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Border Site Category</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Border status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Border Permission Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">HO NOC Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">CW Starts Date/ RFC Date for Colo</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">BTS Base Readiness Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Tower/ Pole Erection Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">CP Application Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">CP connection plan date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">CP connection actual date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Power Authority</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Power office</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sanction load(KW)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Phase Type</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Meter type</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Meter Serial No.</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Customer No/Account no</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TowerCo Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Colo TAS Requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Final status_02</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Remarks/Colo TAS Accepted</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Remarks details</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">RFAI Plan Week</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">RFAI Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">RFAI Actual date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">RFAI Target Month</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comment on RFAI</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">BL CW engineer</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">BL CW Vendor</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D6 plan date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D6 actual date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comment on D6</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Planned On Air Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Actual On air date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">On air month</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">On air year</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Monthly rent(BDT)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Rental passthrough(BDT)/month_BL</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">e.co to Share-20% (Additional amount Above 60%)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Rent effective date(RFAI date)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">% escalation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Year of escalation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Additional item cost(BDT)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Additional item confirmation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Item description</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Monthly provision given date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Planned I&C Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Actual I&C Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Planned On Air Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Actual On Air Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Remarks</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Duplicate Check</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sharing Tag</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TowerCo Identity</th>
											
										</tr>
										
	
									</thead>
									<tbody>

<?php 

$cnt=1;

while($user=mysqli_fetch_array($tbluser)){
	
?>								
<tr class="tr-hover-class">						
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($cnt);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['UniqueID']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['ReportingID']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['GenericID']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['BLsiteID']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['TOWERCO_SiteID']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['TowerCo_name']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['D1_Type']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Rollout_Category']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Longitude']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Latitute']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Division']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['District']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Thana']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Sales_Region']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Detail_site_Address']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Active_equipment']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['SR_Assignment_Date']!="0000-00-00") {echo htmlentities($user['SR_Assignment_Date']);} else {echo "-";};?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Site_Rejection_Date']!="0000-00-00") {echo htmlentities( $SiteRejectionDt = $user['Site_Rejection_Date']);} else {echo $SiteRejectionDt = "-";};?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Reasons_of_Rejection']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Site_Withdraw_Date']!="0000-00-00") {echo htmlentities($SiteWithdrawDt = $user['Site_Withdraw_Date']);} else {echo $SiteWithdrawDt = "-";};?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Reasons_of_Withdraw']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;color:#1d8c55;">
		<?php
			if ($user['Survey_Plan_Date'] && ($user['Survey_Plan_Date'] != "0000-00-00")) {
				echo $survey_plan = $user['Survey_Plan_Date'];
			} else {
				echo $survey_plan = date("Y-m-d", strtotime($user['SR_Assignment_Date']. "+ 7 days"));
			}
		?>
		</td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Survey_Date']!="0000-00-00") { echo htmlentities($user['Survey_Date']); } else {echo "-";};?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Survey_Status']);?></td>
		
		<td style="font-size:11px;text-align:center; vertical-align: middle;color:#1d8c55;">
		<?php 
		
		if ($user['D2B_Plan_Date'] && ($user['D2B_Plan_Date'] != "0000-00-00")) {
				echo $D2B_Submission_Plan = $user['D2B_Plan_Date'];
			} else {
				if ($user['Survey_Date'] && ($user['Survey_Date'] != "0000-00-00")) {
					echo $D2B_Submission_Plan = date("Y-m-d", strtotime($user['Survey_Date']. "+ 3 days"));
				} else {
					echo $D2B_Submission_Plan = date("Y-m-d", strtotime($survey_plan. "+ 3 days"));
				}
			}
		
			?>
		</td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['D2B_Submission_Date']!="0000-00-00") {echo htmlentities($user['D2B_Submission_Date']);} else {echo "-";};?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Candidate_Name']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['D2B_Status_TowerCo_Confirmation']);?></td>
		
		<td style="font-size:11px;text-align:center; vertical-align: middle;color:#1d8c55;">
		<?php	
		if ($user['D2B_Approval_Plan_Date'] && ($user['D2B_Approval_Plan_Date'] != "0000-00-00")) 
			{
				echo $D2B_Approval_Plan = $user['D2B_Approval_Plan_Date'];
				
			} else {
				
				if ($user['D2B_Submission_Date'] && ($user['D2B_Submission_Date'] != "0000-00-00")) 
				{
					echo $D2B_Approval_Plan = date("Y-m-d", strtotime($user['D2B_Submission_Date']. "+ 3 days"));
				
				} else {
					
					echo $D2B_Approval_Plan = date("Y-m-d", strtotime($D2B_Submission_Plan. "+ 3 days"));
				}
			}
		?>
		</td>
		
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['D2BorColoApproval_rejection_holdDate']!="0000-00-00") {echo htmlentities($user['D2BorColoApproval_rejection_holdDate']);} else {echo "-";};?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Comments_on_D2B_Status']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Draft_vendor_RSM_TN_BL']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Draft_vendor_CW']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Draft_Week']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;color:#1d8c55;">
		<?php 
			//if($user['Draft_plan_date']!="0000-00-00") {echo htmlentities($user['Draft_plan_date']);} else {echo "-";};
		
			if ($user['Draft_plan_date'] && ($user['Draft_plan_date'] != "0000-00-00")) 
			{
				 echo $Drft_plan = $user['Draft_plan_date'];
				
			} else {
				
				if (($user['D2BorColoApproval_rejection_holdDate']) && ($user['D2BorColoApproval_rejection_holdDate'] != "0000-00-00")) 
				{
					echo $Drft_plan = date("Y-m-d", strtotime($user['D2BorColoApproval_rejection_holdDate']. "+ 7 days"));
				} else {
					echo $Drft_plan = date("Y-m-d", strtotime($D2B_Approval_Plan. "+ 7 days"));
				}
			}
			
		?></td>
		
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Draft_actual_Date']!="0000-00-00") {echo htmlentities($user['Draft_actual_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Draft_status']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Draft_details']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Site_Type_GF_RTT_RTP']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Tower_PoleHT_m']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Building_Base_HT_m']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Total_HT_m']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['BTS_roomType_OD_ID']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['RNPO_Requirements_HBA']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['TN_Requirements']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Comment_on_draft']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle; color:#1d8c55;">
			
		<?php 
						
				if ($user['Draft_Report_Submission_Plan_date'] && ($user['Draft_Report_Submission_Plan_date'] != "0000-00-00")) 
			{
				echo $Draft_Submission_plan = $user['Draft_Report_Submission_Plan_date'];

			} else {
				
				if ((($user['Draft_actual_Date']) && ($user['Draft_actual_Date'] != "0000-00-00")) && ($user['Draft_status'] == "Accepted")) 
				{
					echo $Draft_Submission_plan = date("Y-m-d", strtotime($user['Draft_actual_Date']. "+ 3 days"));
					
				} else {
					
					echo  (trim($user['Draft_status'])) ? $Draft_Submission_plan = date("Y-m-d", strtotime($Drft_plan. "+ 3 days")) : $Draft_Submission_plan = '-' ;
									
				}
			}
		?>
		</td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Draft_Report_Receive_date']!="0000-00-00") {echo htmlentities($user['Draft_Report_Receive_date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Sent_for_validationRNPO_TNrequirement']!="0000-00-00") {echo htmlentities($user['Sent_for_validationRNPO_TNrequirement']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Sent_for_edotco_validation_wishList']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($RNPOreq = $user['Received_feedbackOnRNPOreq']!="0000-00-00") {echo htmlentities($RNPOreq = $user['Received_feedbackOnRNPOreq']);} else {echo $RNPOreq = "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($TNPreq =$user['Received_feedbackOnTNreq']!="0000-00-00") {echo htmlentities($TNPreq = $user['Received_feedbackOnTNreq']);} else {echo $TNPreq = "-";}?></td> 
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Revised_RNPO_requirement_Colo']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Revised_TN_requirement_Colo']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Validation_on_RNPO_requirement']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Validation_on_TN_requirement']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;color:#1d8c55;">
		<?php 
		
		if ($user['Combined_Validation'] && ($user['Combined_Validation'] != "")) 
			{
				 echo htmlentities($Comb_valid = $user['Combined_Validation']);
				
			} else {
				
				if ((trim($user['Validation_on_RNPO_requirement']) == "OK") && (trim($user['Validation_on_TN_requirement']) == "OK")) 
				{
					echo $Comb_valid = 'OK';
				} else {
				
					echo $Comb_valid = '-';
				}
			}
		?>
				
		</td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Comment_on_validation']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Agreed_RNPO_requirement']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Agreed_TN_requirement']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Battery_Backup_4hr_6hr']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Site_modality']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;color:#1d8c55;">
			
		<?php 
			
	if ($user['SO_Issuance_Plan'] && ($user['SO_Issuance_Plan'] != "0000-00-00")) 
			{
				 echo htmlentities ($SO_Isu_Plan = $user['SO_Issuance_Plan']);
				
			} else { 
				
			 if ((trim($user['Border_Site']) == "Yes") &&  (trim($user['Border_status'])== "Permitted") && ($Comb_valid = 'OK')) 
				{				
				if ($RNPOreq > $TNPreq) 
				{
						echo $SO_Isu_Plan = $RNPOreq;
				} else {
						echo $SO_Isu_Plan = $TNPreq;
						}
				} 
				
			elseif ( ($user['Border_Site']) == '' && (trim($user['Border_Site']) != "Yes") && ($Comb_valid = 'OK')) 
							
				{				
				if ($RNPOreq > $TNPreq) 
				{
						echo $SO_Isu_Plan = $RNPOreq;
				} else {
						echo $SO_Isu_Plan = $TNPreq;
						}
				} else { 
				echo '-';
					} 
				}
	
		?>
		</td>
		
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Request_for_HO_NOC_SO_Issuance_Date']!="0000-00-00") {echo htmlentities($user['Request_for_HO_NOC_SO_Issuance_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['NOC_Rejection_Status']!="0000-00-00") {echo htmlentities($user['NOC_Rejection_Status']);} else {echo "-";};?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Border_Site']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Border_Site_Category']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Border_status']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Border_Permission_Date']!="0000-00-00") {echo htmlentities($user['Border_Permission_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['HO_NOC_Date']!="0000-00-00") {echo htmlentities($user['HO_NOC_Date']);} else {echo "-";};?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['CW_Starts_Date_RFC_Date_for_Colo']!="0000-00-00") {echo htmlentities($user['CW_Starts_Date_RFC_Date_for_Colo']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['BTS_Base_Readiness_Date']!="0000-00-00") {echo htmlentities($user['BTS_Base_Readiness_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Tower_Pole_Erection_Date']!="0000-00-00") {echo htmlentities($user['Tower_Pole_Erection_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['CP_Application_Date']!="0000-00-00") {echo htmlentities($user['CP_Application_Date']);} else {echo "-";};?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['CP_connection_plan_date']!="0000-00-00") {echo htmlentities($user['CP_connection_plan_date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['CP_connection_actual_date']!="0000-00-00") {echo htmlentities($user['CP_connection_actual_date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Power_Authority']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Power_office']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Sanction_load_KW']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Phase_Type']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Meter_type']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Meter_Serial_No']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Customer_No_Account_No']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['TowerCo_Status']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['ColoTAS_Requirement']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;color:#1d8c55;">
		<?php echo htmlentities($user['Final_status_02']);?>
		
		<?php
		// Check points Column # S & U
		if ((($user['Site_Rejection_Date'])) ||($user['Site_Rejection_Date'] != "0000-00-00") && (($user['Site_Withdraw_Date'])) || ($user['Site_Withdraw_Date'] != "0000-00-00"))
		
			{	 
			
			if (($user['Site_Rejection_Date']) && ($user['Site_Rejection_Date'] != "0000-00-00")) // Column # S
				{
					echo $Final_sts02 = "Site Rejected";
					
					} else {	
						if (($user['Site_Withdraw_Date']) && ($user['Site_Withdraw_Date'] != "0000-00-00")) // Column # U
					{
					
						echo $Final_sts02 = "Site Withdrawal";
				
					} else {					
				
					if (($user['RFAI_Actual_Date']) && ($user['RFAI_Actual_Date'] != "0000-00-00")) // Column # CI
						{
						
						echo $Final_sts02 = "RFAI Done";
					
						} else {	
						
						//echo "Next Code";
						
						if (($user['RFAI_Actual_Date'] == "0000-00-00") && ($user['CW_Starts_Date_RFC_Date_for_Colo']) && ($user['CW_Starts_Date_RFC_Date_for_Colo'] != "0000-00-00")) // Column # BO
						{
						
						echo $Final_sts02 = "CW WIP";
						
						} else {
							
						//echo "Next Code_Test";
						
							if (($user['CW_Starts_Date_RFC_Date_for_Colo'] == "0000-00-00") && ($user['HO_NOC_Date']) && ($user['HO_NOC_Date'] != "0000-00-00")) // Column # BN
						{
						echo $Final_sts02 = "Mobilization Ongoing";
						
						} else {
							
						if (($user['HO_NOC_Date'] == "0000-00-00") && ($user['Request_for_HO_NOC_SO_Issuance_Date']) && ($user['Request_for_HO_NOC_SO_Issuance_Date'] != "0000-00-00")) // Column # BH
						{
						
						echo $Final_sts02 = "WF HO NOC";
						
						} else {
							
						//echo "Next Code_Test";
						
						
						if (($user['Request_for_HO_NOC_SO_Issuance_Date'] == "0000-00-00") && ($user['Border_Site'] == "YES") && (strrchr($user['Border_status'],' TowerCo || BTRC || CORA || LEA ' ) !== false)) 
							// Column # BJ, BL, Search Category:  At TowerCo, At BTRC, At CORA, At LEA. str_contains,strrchr,if ( preg_match("~\bBTRC\b~",$word) ) 
						
						{
						
						echo $Final_sts02 = "WF Border Permission";
						
						} else {
							
						//echo "Next Code_Test";
												
						if (($user['Request_for_HO_NOC_SO_Issuance_Date'] == "0000-00-00") && ($user['Border_status'] == "Permitted") && ($user['Border_Site'] == "YES")) 
							// Column # BJ, BL, Search Category in Border_Site:  Permitted. Avoid the obvious: when Border_Site is empty, return no matches.preg_match(
							{
									echo $Final_sts02 = "WF SO";
							}
						
							elseif (($user['Request_for_HO_NOC_SO_Issuance_Date'] == "0000-00-00") && ($user['Combined_Validation'] == "OK") && (empty($user['Border_Site']))) 
									// Column # BJ, BB, Search Category in Border_Site:  Permitted field is null. Avoid the obvious: when Border_Site is empty, return no matches.
									
								{
									echo $Final_sts02 = "WF SO";
						
												
						} else {
							
						//echo "Next Code_Test";
							
						
						if (($user['Combined_Validation'] == "NOK") && ($user['Draft_Report_Receive_date'] && $user['Draft_Report_Receive_date']!= "0000-00-00") ) 
							// Column # BB, AS
						{
						
							echo $Final_sts02 = "TSSR Rejected";
						
						} else {				
						
						//echo "Next Code_Test";
						
						if (empty($user['Combined_Validation']) && ($user['Draft_Report_Receive_date'] && $user['Draft_Report_Receive_date']!= "0000-00-00") ) 
							// Column # BB, AS
						{
							echo $Final_sts02 = "WF TSSR Validation";
						
						} else {				
						
						//echo "Next Code_Test";
						
						if (($user['Draft_Report_Receive_date'] == "0000-00-00") && ($user['Draft_actual_Date']!= "0000-00-00") && (strrchr($user['Draft_status'],'Accepted')) || (strrchr($user['Draft_status'],'Conditionally Accepted')) )
						//(strrchr(strpos($user['Draft_status'],'Accepted || Conditionally Accepted')) !== false) ) 
							// Column # AH,AI, ($user['Draft_Report_Receive_date'] !="0000-00-00"),strrchr,if ( preg_match("~\bBlocks\b~",$word)),strpbrk
						
						{
						echo $Final_sts02 = "WF TSSR Submission";
						
						} else {				
											
						//echo "Next Code_Test";
						
						if (($user['Draft_actual_Date']!= "0000-00-00") && (strrchr($user['Draft_status'],'On Hold')) || (strrchr($user['Draft_status'],'Rejected')) || (strrchr($user['Draft_status'],'Not Done'))) 
							// Column # AH,AI, if ( preg_match("~\bBlocks\b~",$word) ), preg_match_all('/Blocks/',$word,$matches); $found = count($matches[1]);
						
						{
						echo $Final_sts02 = "Draft Rejected";
						
						} else {				
						
						//echo "Next Code_Test";
						
						if (($user['Draft_actual_Date'] == "0000-00-00")  && ($user['D2BorColoApproval_rejection_holdDate'] != "0000-00-00") && ($user['D2B_Status_TowerCo_Confirmation'] == "Accepted") ) 
							// Column # AA,AB,AH. 
						
						{
						echo $Final_sts02 = "WF Draft";
						
						} else {				
						
						//echo "Next Code_Test";
						if (($user['D2BorColoApproval_rejection_holdDate'] == "0000-00-00") && ($user['D2B_Submission_Date'] != "0000-00-00") ) 
							// Column # AB,Y. 
						
						{
						echo $Final_sts02 = "WF D2B Approval";
						
						} else {				
						
												
						//echo "Next Code_Test";
						if (($user['D2BorColoApproval_rejection_holdDate'] == "0000-00-00") && ($user['Survey_Date'] != "0000-00-00") && ($user['Survey_Status'] == "Done")  ) 
							// Column # AB,W,X. 
						
						{
						echo $Final_sts02 = "WF D2B Submission";
						
						} else {				
						
						
						//echo "Next Code_Test";
						if (($user['Survey_Date'] == "0000-00-00") && ($user['SR_Assignment_Date'] != "0000-00-00")) 
							// Column # W,R. 
						
						{
						echo $Final_sts02 = "WF Survey";
						
						} else {				
						
						echo "WF Re-Survey";
						
						}
						
		}}}}}}}}}}}}}}}} else {
		
		echo "-";
				}
		?>
	
		</td>
		
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Remarks_ColoTAS_Accepted']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Remarks_details']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;color:#1d8c55;">
		
		<?php //echo htmlentities($user['RFAI_Plan_Week']);?>
		<?php 
		//echo htmlentities(strftime('%G-%V',strtotime($RFAI_act)));
		//$Week_number = ($user['RFAI_Actual_Date'] && ($user['RFAI_Plan_Date'] != "0000-00-00"))? date("W,Y", strtotime($user['RFAI_Actual_Date'])) : ''; // gives 201152
		
		// $Week_number = (($user['RFAI_Plan_Date'] != "0000-00-00"))? date("W", strtotime($user['RFAI_Plan_Date'])) : ''; // gives 201152
			//if(!empty($Week_number)) {echo "W-", $Week_number;} else {echo "-";}

			
		?>
		
	<?php 
	
	if ((trim($user['D1_Type']) == "Colo") || (trim($user['D1_Type']) == "B2S"))
		{	
			if ($user['RFAI_Plan_Date'] != "0000-00-00") 
			{
			  $RFAI_Plan = htmlentities($user['RFAI_Plan_Date']);
				
			} else {
		
				if (($user['Request_for_HO_NOC_SO_Issuance_Date'] != "0000-00-00") && (trim($user['D1_Type']) == "Colo"))
				   {
					$RFAI_Plan = date("Y-m-d", strtotime(htmlentities($user['Request_for_HO_NOC_SO_Issuance_Date']). "+ 35 days"));
				
				   } else {
					
						if (($user['Request_for_HO_NOC_SO_Issuance_Date'] != "0000-00-00") && (trim($user['D1_Type']) == "B2S"))
						{	
						$RFAI_Plan = date("Y-m-d", strtotime(htmlentities($user['Request_for_HO_NOC_SO_Issuance_Date']). "+ 65 days"));
					
						} else {
							$RFAI_Plan = '-';
						}
		
		}}} else {
						$RFAI_Plan = '-';
		}
		
		
		if (($user['RFAI_Plan_Date'] != "0000-00-00")) 
		{
			echo $Week_number = 'W-'. date("W", strtotime($user['RFAI_Plan_Date'])); // gives Week_number
		} else {
			
			if (($RFAI_Plan != "0000-00-00") && ($RFAI_Plan != '-'))
			{
				echo $Week_number = 'W-'. date("W", strtotime($RFAI_Plan)); // gives Week_number
			} else {
				echo $Week_number = '-';
			}
		}
			
		?>


		
		</td>
		
		<td style="font-size:11px;text-align:center; vertical-align: middle;color:#1d8c55;">
		<?php 
		
		//35 Days for Colo site and 65 Days for B2S site.	
		echo $RFAI_Plan;
		?>
		
		</td>
		
		
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['RFAI_Actual_Date']!="0000-00-00") {echo htmlentities($RFAI_act = $user['RFAI_Actual_Date']);} else {echo $RFAI_act = "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['RFAI_Target_Month']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Comment_on_RFAI']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['BL_CW_engineer']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['BL_CW_Vendor']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['D6_plan_date']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['D6_actual_date']!="0000-00-00") {echo htmlentities($user['D6_actual_date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Comment_on_D6']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Planned_On_Air_Date']!="0000-00-00") {echo htmlentities($user['Planned_On_Air_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Actual_On_air_Date']!="0000-00-00") {echo htmlentities($user['Actual_On_air_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['On_air_month']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['On_air_year']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Monthly_rent_BDT']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Rental_passthroughBDTper_month_BL']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['edotco2Share20%_Addi_amountAbove60%']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Rent_effective_Date_RFAI']!="0000-00-00") {echo htmlentities($user['Rent_effective_Date_RFAI']);} else {echo "-";}?>   </td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['%_escalation']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Year_of_escalation']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Additional_item_costBDT']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Additional_item_confirmation']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Item_description']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Monthly_provision_given_date']!="0000-00-00") {echo htmlentities($user['Monthly_provision_given_date']);} else {echo "-";}?> </td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Planned_I_and_C_Date']!="0000-00-00") {echo htmlentities($user['Planned_I_and_C_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Actual_I_and_C_Date']!="0000-00-00") {echo htmlentities($user['Actual_I_and_C_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Planned_OnAir_Date']!="0000-00-00") {echo htmlentities($user['Planned_OnAir_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Actual_OnAir_Date']!="0000-00-00") {echo htmlentities($user['Actual_OnAir_Date']);} else {echo "-";}?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Remarks']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Duplicate_Check']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Sharing_Tag']);?></td>
		<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['TowerCo_Identity']);?></td>

	
		
		
	</tr>
	
	
	
										<?php $cnt=$cnt+1;
										
										} ?>
									</tbody>
<tfoot>
	<tr>
										
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sl#</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Unique</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Reporting ID</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Generic ID</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">BL site ID</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TOWERCO Site ID</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TowerCo name</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D1 Type</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Rollout Category</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Longitude</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Latitute</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Division</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">District</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Thana</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sales Region</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Detail Site Address</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Active Eqnt</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">SR (Assignment) Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Site Rejection Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Reasons of Rejection</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Site Withdraw Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Reasons of Withdraw</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">Survey Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Survey Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Survey Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#0a5e35;">D2B Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D2B Report Submission Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Candidate Name</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D2B Status/ TowerCo Confirmation</th>
										
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">D2B Approval Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D2B or Colo approval/ rejection/ hold date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comments on D2B Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft vendor_RSM/TN_BL</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft vendor_CW</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft Week </th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">Draft plan date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft actual Date </th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft details</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Site Type(GF/RTT/RTP</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Tower/ Pole HT(m)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Building/Base HT(m)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Total HT(m)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">BTS room type(OD/ID)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">RNPO Requirements(HBA)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TN Requirements</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comment on draft</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">Draft Report Submission Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Draft Report Receive Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sent for validation_RNPO & TN requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sent for edotco validation (wishList)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Received feedback on RNPO req</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Received feedback on TN req</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Revised RNPO requirement (Colo)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Revised TN requirement (Colo)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Validation on RNPO requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Validation on TN requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">Combined Validation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comment on validation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Agreed RNPO requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Agreed TN requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Battery Backup (4hr/6hr)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Site modality</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">SO Issuance Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Request for HO NOC/SO Issuance Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">NOC Rejection Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Border Site</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Border Site Category</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Border status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Border Permission Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">HO NOC Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">CW Starts Date/ RFC Date for Colo</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">BTS Base Readiness Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Tower/ Pole Erection Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">CP Application Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">CP connection plan date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">CP connection actual date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Power Authority</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Power office</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sanction load(KW)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Phase Type</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Meter type</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Meter Serial No.</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Customer No/Account no</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TowerCo Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Colo TAS Requirement</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Final status_02</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Remarks/Colo TAS Accepted</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Remarks details</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">RFAI Plan Week</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">RFAI Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">RFAI Actual date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">RFAI Target Month</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comment on RFAI</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">BL CW engineer</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">BL CW Vendor</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D6 plan date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">D6 actual date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comment on D6</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Planned On Air Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Actual On air date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">On air month</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">On air year</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Monthly rent(BDT)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Rental passthrough(BDT)/month_BL</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">e.co to Share-20% (Additional amount Above 60%)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Rent effective date(RFAI date)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">% escalation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Year of escalation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Additional item cost(BDT)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Additional item confirmation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Item description</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Monthly provision given date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Planned I&C Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Actual I&C Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Planned On Air Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Actual On Air Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Remarks</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Duplicate Check</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sharing Tag</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TowerCo Identity</th>
											
										</tr>
	</tfoot>
									
																		
									
								</table>
										<!--Close result set-->
								</div>
								</div>
								<!--Close connection mysqli_close($con);-->
<!-- /My Code -->	
								
                                    </div>
                                <!--</div>-->
                            
						
						</div>	<!--panel-->


</div>
</div>
</section>
                     
</div>
</div>
</div>
<!--End--->








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