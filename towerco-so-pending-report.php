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
if(isset($_POST['apply'])){
$loginid = $_SESSION['osemsuid'];
$vendor = trim($_POST['vendortype']);

//echo print_r($_POST, true);
//exit;
		   
if($vendor == 1 )
{					
$tbluser=mysqli_query($con,"SELECT `id`,`UserId`,`UniqueID`,`ReportingID`,`GenericID`,`BLsiteID`,`TOWERCO_SiteID`,`TowerCo_name`,`D1_Type`,`Rollout_Category`,`Longitude`,`Latitute`,`Division`,`District`,`Thana`,`Sales_Region`,`Detail_site_Address`,`Active_equipment`,`SR_Plan_Date`,`SR_Assignment_Date`,`Site_Rejection_Date`,`Reasons_of_Rejection`,`Site_Withdraw_Date`,`Reasons_of_Withdraw`,`Survey_Plan_Date`,`Survey_Date`,`Survey_Status`,`D2B_Plan_Date`,`D2B_Submission_Date`,`Candidate_Name`,`D2B_Status_TowerCo_Confirmation`,`D2B_Approval_Plan_Date`,`D2BorColoApproval_rejection_holdDate`,`Comments_on_D2B_Status`,`Draft_vendor_RSM_TN_BL`,`Draft_vendor_CW`,`draft_week`,`Draft_plan_date`,`Draft_actual_Date`,`Draft_status`,`Draft_details`,`Site_Type_GF_RTT_RTP`,`Tower_PoleHT_m`,`Building_Base_HT_m`,`Total_HT_m`,`BTS_roomType_OD_ID`,`RNPO_Requirements_HBA`,`TN_Requirements`,`Comment_on_draft`,`Draft_Report_Submission_Plan_date`,`Draft_Report_Receive_date`,`Sent_for_validationRNPO_TNrequirement`,`sent_for_edotco_validation_wishlist`,`Received_feedbackOnRNPOreq`,`Received_feedbackOnTNreq`,`Revised_RNPO_requirement_Colo`,`Revised_TN_requirement_Colo`,`Validation_on_RNPO_requirement`,`Validation_on_TN_requirement`,`Combined_Validation`,`Comment_on_validation`, `Agreed_RNPO_requirement`, `Agreed_TN_requirement`, `Battery_Backup_4hr_6hr`, `Site_modality`, `SO_Issuance_Plan`, `Request_for_HO_NOC_SO_Issuance_Date`, `NOC_Rejection_Status`, `Border_Site`, `Border_Site_Category`,`Border_status`,`Border_Permission_Date`,`HO_NOC_Date`,`CW_Starts_Date_RFC_Date_for_Colo`,`BTS_Base_Readiness_Date`,`Tower_Pole_Erection_Date`,`CP_Application_Date`,`CP_connection_plan_Date`, `CP_connection_actual_Date`,`Power_Authority`,`Power_office`,`Sanction_load_KW`,`Phase_Type`,`Meter_type`,`Meter_Serial_No`,`Customer_No_Account_No`,`TowerCo_Status`, `ColoTAS_Requirement`, `Final_status02`,`Remarks_ColoTAS_Accepted`,`Remarks_details`,`RFAI_Plan_Week`,`RFAI_Plan_Date`,`RFAI_Actual_Date`,`RFAI_Target_Month`,`Comment_on_RFAI`,`BL_CW_engineer`,`BL_CW_Vendor`,`D6_plan_Date`,`D6_actual_Date`,`Comment_on_D6`,`Planned_On_Air_Date`,`Actual_On_air_Date`,`On_air_month`,`On_air_year`,`monthly_rent_bdt`,`Rental_passthroughBDTper_month_BL`,`edotco2share20%_addi_amountabove60%`,`Rent_effective_Date_RFAI`,`%_escalation`,`Year_of_escalation`,`Additional_item_costBDT`, `Additional_item_confirmation`, `Item_description`, `Monthly_provision_given_Date`, `Planned_I_and_C_Date`, `Actual_I_and_C_Date`, `Planned_OnAir_Date`, `Actual_OnAir_Date`, `Remarks`, `Duplicate_Check`, `sharing_tag`, `TowerCo_Identity`,`updationDate` FROM new_site_assignment
WHERE !(Request_for_HO_NOC_SO_Issuance_Date) AND SO_Issuance_Plan IS NOT NULL and SO_Issuance_Plan != '0000-00-00'; ");

	
	} elseif ($vendor == ($_POST['vendortype'])) {

	 $tbluser=mysqli_query($con,"SELECT `id`,`UserId`,`UniqueID`,`ReportingID`,`GenericID`,`BLsiteID`,`TOWERCO_SiteID`,`TowerCo_name`,`D1_Type`,`Rollout_Category`,`Longitude`,`Latitute`,`Division`,`District`,`Thana`,`Sales_Region`,`Detail_site_Address`,`Active_equipment`,`SR_Plan_Date`,`SR_Assignment_Date`,`Site_Rejection_Date`,`Reasons_of_Rejection`,`Site_Withdraw_Date`,`Reasons_of_Withdraw`,`Survey_Plan_Date`,`Survey_Date`,`Survey_Status`,`D2B_Plan_Date`,`D2B_Submission_Date`,`Candidate_Name`,`D2B_Status_TowerCo_Confirmation`,`D2B_Approval_Plan_Date`,`D2BorColoApproval_rejection_holdDate`,`Comments_on_D2B_Status`,`Draft_vendor_RSM_TN_BL`,`Draft_vendor_CW`,`draft_week`,`Draft_plan_date`,`Draft_actual_Date`,`Draft_status`,`Draft_details`,`Site_Type_GF_RTT_RTP`,`Tower_PoleHT_m`,`Building_Base_HT_m`,`Total_HT_m`,`BTS_roomType_OD_ID`,`RNPO_Requirements_HBA`,`TN_Requirements`,`Comment_on_draft`,`Draft_Report_Submission_Plan_date`,`Draft_Report_Receive_date`,`Sent_for_validationRNPO_TNrequirement`,`sent_for_edotco_validation_wishlist`,`Received_feedbackOnRNPOreq`,`Received_feedbackOnTNreq`,`Revised_RNPO_requirement_Colo`,`Revised_TN_requirement_Colo`,`Validation_on_RNPO_requirement`,`Validation_on_TN_requirement`,`Combined_Validation`,`Comment_on_validation`, `Agreed_RNPO_requirement`, `Agreed_TN_requirement`, `Battery_Backup_4hr_6hr`, `Site_modality`, `SO_Issuance_Plan`, `Request_for_HO_NOC_SO_Issuance_Date`, `NOC_Rejection_Status`, `Border_Site`, `Border_Site_Category`,`Border_status`,`Border_Permission_Date`,`HO_NOC_Date`,`CW_Starts_Date_RFC_Date_for_Colo`,`BTS_Base_Readiness_Date`,`Tower_Pole_Erection_Date`,`CP_Application_Date`,`CP_connection_plan_Date`, `CP_connection_actual_Date`,`Power_Authority`,`Power_office`,`Sanction_load_KW`,`Phase_Type`,`Meter_type`,`Meter_Serial_No`,`Customer_No_Account_No`,`TowerCo_Status`, `ColoTAS_Requirement`, `Final_status02`,`Remarks_ColoTAS_Accepted`,`Remarks_details`,`RFAI_Plan_Week`,`RFAI_Plan_Date`,`RFAI_Actual_Date`,`RFAI_Target_Month`,`Comment_on_RFAI`,`BL_CW_engineer`,`BL_CW_Vendor`,`D6_plan_Date`,`D6_actual_Date`,`Comment_on_D6`,`Planned_On_Air_Date`,`Actual_On_air_Date`,`On_air_month`,`On_air_year`,`monthly_rent_bdt`,`Rental_passthroughBDTper_month_BL`,`edotco2share20%_addi_amountabove60%`,`Rent_effective_Date_RFAI`,`%_escalation`,`Year_of_escalation`,`Additional_item_costBDT`, `Additional_item_confirmation`, `Item_description`, `Monthly_provision_given_Date`, `Planned_I_and_C_Date`, `Actual_I_and_C_Date`, `Planned_OnAir_Date`, `Actual_OnAir_Date`, `Remarks`, `Duplicate_Check`, `sharing_tag`, `TowerCo_Identity`,`updationDate` FROM new_site_assignment
WHERE !(Request_for_HO_NOC_SO_Issuance_Date) AND SO_Issuance_Plan IS NOT NULL and SO_Issuance_Plan != '0000-00-00' and TowerCo_name = '$vendor';");

	
	 } else {
		 
$tbluser=mysqli_query($con,"");		 
//echo "<script>window.location.href='towerco-so-pending-report.php'</script>";		 
	 }

//echo var_dump($_POST) . "<br>";
//exit;

//echo print_r($tbluser, true). "<br>";
//echo print_r($tbluser, false);
//exit;

//
}



    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title> TowerCo SO Issuance Report - Rollout Master</title>
	
		<!-- Data Table CSS -->
	<link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
   
       <!-- Styles -->
       
	<link href="dist/css/style.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="dist/css/font-awesome.css" type="text/css"/>
	<link href="dist/css/font-awesome.min.css" rel="stylesheet">


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
					<li class="breadcrumb-item active" aria-current="page">TowerCo SO Issuance Report</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
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

						<div class="" style="border: 1px solid #F00A7C;border-right: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">  <!--table-wrap-->
			
							<div class="panel panel-default">
							
							<div class="Panel panel-heading" style="position:relative; margin-left:1.5%;margin-top:1%;" width="100%"><i class="fa fa-list-ul"></i>&nbsp; View Site wise SO Issuance Details: </div>	
							<div class="Panel panel-body "> <!--table-->
							
									
	<form  class="needs-validation" method="post" action="towerco-so-pending-report.php" enctype="form-data">
       
	   
<div class="form-row g-4">

<!--<div class="divider" style="border: 10px solid transparent; margin-top:auto; margin-bottom:auto; color:orange"></div>-->

<div class="form-row" style="position:relative; margin-left:1.5%;margin-top:1%;" width="100%">

<div class="col-md-12 mb-10">
 
 <div class="form-group pull-left">
<label class="text" style="font-weight:bold; color:#F00A7C; margin-top:0%; position: relative;">TowerCo Name :</label>

<select class="form-control" style="width:250px;height:40px;font-size:14px" name="vendortype"  required=""  autofocus="true" >
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
<label></label>
<button class="form-control btn btn-primary button3" type="submit" name="apply" style="width:100px;height:40px; position: relative; margin-left:32%; margin-top:7%;">Submit</button>
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

<div class="row justify-content-md-center">
<div class="col-xl-12">

						<div class="table-wrap">  <!--table-wrap-->
			
					
			
							<div class="panel panel-default">
							
							<div class="Panel panel-heading" style="position:relative; margin-left:1.5%;margin-top:1%;"><b><i class="fa fa-list-ul"></i>&nbsp; Site wise SO Issuance Details;</b></div>	
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
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#1d8c55;">SO Issuance Plan Date</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Request for HO NOC/SO Issuance Date</th>
										
											
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
		
		
		<?php
			if ($user['Survey_Plan_Date'] && ($user['Survey_Plan_Date'] != "0000-00-00")) {
				$survey_plan = $user['Survey_Plan_Date'];
			} else {
				$survey_plan = date("Y-m-d", strtotime($user['SR_Assignment_Date']. "+ 7 days"));
			}
		
		?>
		
			
		<?php	if ($user['D2B_Plan_Date'] && ($user['D2B_Plan_Date'] != "0000-00-00")) {
				$D2B_Submission_Plan = $user['D2B_Plan_Date'];
			} else {
				if ($user['Survey_Date'] && ($user['Survey_Date'] != "0000-00-00")) {
					$D2B_Submission_Plan = date("Y-m-d", strtotime($user['Survey_Date']. "+ 3 days"));
				} else {
					$D2B_Submission_Plan = date("Y-m-d", strtotime($survey_plan. "+ 3 days"));
				}
			}
		?>
		<?php	
		if ($user['D2B_Approval_Plan_Date'] && ($user['D2B_Approval_Plan_Date'] != "0000-00-00")) 
			{
				$D2B_Approval_Plan = $user['D2B_Approval_Plan_Date'];
				
			} else {
				
				if ($user['D2B_Submission_Date'] && ($user['D2B_Submission_Date'] != "0000-00-00")) 
				{
					$D2B_Approval_Plan = date("Y-m-d", strtotime($user['D2B_Submission_Date']. "+ 3 days"));
				
				} else {
					
					$D2B_Approval_Plan = date("Y-m-d", strtotime($D2B_Submission_Plan. "+ 3 days"));
				}
			}
		?>
			<?php
			if ($user['Draft_plan_date'] && ($user['Draft_plan_date'] != "0000-00-00")) 
			{
				 $Drft_plan = $user['Draft_plan_date'];
				
			} else {
				
				if (($user['D2BorColoApproval_rejection_holdDate']) && ($user['D2BorColoApproval_rejection_holdDate'] != "0000-00-00")) 
				{
					$Drft_plan = date("Y-m-d", strtotime($user['D2BorColoApproval_rejection_holdDate']. "+ 7 days"));
				} else {
					$Drft_plan = date("Y-m-d", strtotime($D2B_Approval_Plan. "+ 7 days"));
				}
			}
			;?>

			<?php	
				if ($user['Draft_Report_Submission_Plan_date'] && ($user['Draft_Report_Submission_Plan_date'] != "0000-00-00")) 
			{
				$Draft_Submission_plan = $user['Draft_Report_Submission_Plan_date'];

			} else {
				
				if ((($user['Draft_actual_Date']) && ($user['Draft_actual_Date'] != "0000-00-00")) && ($user['Draft_status'] == "Accepted")) 
				{
					$Draft_Submission_plan = date("Y-m-d", strtotime($user['Draft_actual_Date']. "+ 3 days"));
					
				} else {
					
					(trim($user['Draft_status'])) ? ($Draft_Submission_plan = date("Y-m-d", strtotime($Drft_plan. "+ 3 days"))) : $Draft_Submission_plan = '' ;
									
				}
			}
		;?>
		<?php
		if ($user['Combined_Validation'] && ($user['Combined_Validation'] != "")) 
			{
				 ($Comb_valid = $user['Combined_Validation']);
				
			} else {
				
				if ((trim($user['Validation_on_RNPO_requirement']) == "OK") && (trim($user['Validation_on_TN_requirement']) == "OK")) 
				{
					$Comb_valid = 'OK';
					
				} else {
				
					
				}
			}
		;?>
	
	<td style="font-size:11px;text-align:center; vertical-align: middle;color:#1d8c55;">
			
		<?php 

	if($RNPOreq = $user['Received_feedbackOnRNPOreq']!="0000-00-00") {($RNPOreq = $user['Received_feedbackOnRNPOreq']);} else {}
	if($TNPreq =$user['Received_feedbackOnTNreq']!="0000-00-00") {($TNPreq = $user['Received_feedbackOnTNreq']);} else {}

			
	if ($user['SO_Issuance_Plan'] && ($user['SO_Issuance_Plan'] != "0000-00-00")) 
			{
				 echo htmlentities ($SO_Isu_Plan = $user['SO_Issuance_Plan']);
				
			} else { 
				
			 if ((trim($user['Border_Site']) == "Yes") &&  (trim($user['Border_status'])== "Permitted") && ($Comb_valid = 'OK')) 
				{				
				if ($RNPOreq > $TNPreq) 
				{
						echo htmlentities ($SO_Isu_Plan  = $RNPOreq);
				} else {
						echo htmlentities ($SO_Isu_Plan  = $TNPreq);
						}
				} 
				
			elseif ( ($user['Border_Site']) == '' && (trim($user['Border_Site']) != "Yes") && ($Comb_valid = 'OK')) 
							
				{				
				if ($RNPOreq > $TNPreq) 
				{
						echo htmlentities ($SO_Isu_Plan  = $RNPOreq);
				} else {
						echo htmlentities ($SO_Isu_Plan  = $TNPreq);
						}
				} else { 
				echo '-';
					} 
				}
	
		?>
		</td>
		
	<td style="font-size:11px;text-align:center; vertical-align: middle;" >
	<?php if($user['Request_for_HO_NOC_SO_Issuance_Date']!="0000-00-00") {echo htmlentities($user['Request_for_HO_NOC_SO_Issuance_Date']);} else {echo "-";}?></td>	
	
	<?php 			
		//35 Days for Colo site.
		if ((trim($user['D1_Type'])) && (trim($user['D1_Type']) == "Colo"))
		{		
		if ($user['RFAI_Plan_Date'] && ($user['RFAI_Plan_Date'] != "0000-00-00")) 
			{
				 ( $RFAI_Plan = $user['RFAI_Plan_Date']);
				
			} else {
				
				if ($user['Request_for_HO_NOC_SO_Issuance_Date'] && ($user['Request_for_HO_NOC_SO_Issuance_Date'] != "0000-00-00")) 
				{
					$RFAI_Plan = date("Y-m-d", strtotime($user['Request_for_HO_NOC_SO_Issuance_Date']. "+ 35 days"));
				} else {
					
				}
			}
		
		} elseif ((trim($user['D1_Type'])) && (trim($user['D1_Type']) == "B2S"))		
		{
		//65 Days for B2S site.		
		if ($user['RFAI_Plan_Date'] && ($user['RFAI_Plan_Date'] != "0000-00-00")) 
			{
				 $RFAI_Plan = $user['RFAI_Plan_Date'];
				
			} else {
				
				if ($user['Request_for_HO_NOC_SO_Issuance_Date'] && ($user['Request_for_HO_NOC_SO_Issuance_Date'] != "0000-00-00")) 
				{
					$RFAI_Plan = date("Y-m-d", strtotime($user['Request_for_HO_NOC_SO_Issuance_Date']. "+ 65 days"));
				} else {
					
				}
			}
		
		} else {
			
		}
;?>	
		
	
	
	</tr>
										<?php $cnt=$cnt+1;
										
										} ?>
									</tbody>
									
																		
									
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

     <!-- <script src="vendors/jquery/dist/jquery.min.js"></script>-->
	  <script src="dist/js/jquery.min.js"></script>
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