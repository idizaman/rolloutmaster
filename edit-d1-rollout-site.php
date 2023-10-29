<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['osemsuid']==0)) {
  header('location:logout.php');
  } else{
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

// Add Entry Code

if(isset($_POST['d1_site_edit']))
{
$d1editid=$_POST['edit_id']; //Employee Table id number. 	
	
$loginid=$_SESSION['osemsuid']; // Login ID for d1-rollout-site edit Entry By
$logreq=mysqli_query($con,"SELECT FullName from tbluser where id='$loginid'");
$edrow=mysqli_fetch_array($logreq);
		$d1EditedBy = $edrow['FullName'];//ResignEntryBy
		$currentDateTime = date('Y-m-d h:i:s A', time ()); //current Date insert 
		$d1Edited_status=1;
	
		$GenericID = $_POST['GenericID'];
		$twoG_Site = $_POST['2G_Site'];
		$threeG_Site = $_POST['3G_Site'];
		$FourG_Site = $_POST['4G_Site'];
		$twoG_3G_4G = $_POST['2G_3G_4G'];
		$Longitude = $_POST['Longitude'];
		$Latitude = $_POST['Latitude'];
		$Division = $_POST['Division'];
		$District = $_POST['District'];
		$Thana = $_POST['Thana'];
		$vendor = $_POST['vendor'];
		$Budget_site_Type = $_POST['Budget_site_Type'];
		$twoG_Budget_year = $_POST['2G_Budget_year'];
		$CoLocated_Stand_alone = $_POST['CoLocated_Stand_alone'];
		$Sharing_Info = $_POST['Sharing_Info'];
		$Comments = $_POST['Comments'];
		$Date_of_Issue_to_NI2G = $_POST['Date_of_Issue_to_NI2G'];
		$Date_of_Issue_to_NI3G = $_POST['Date_of_Issue_to_NI3G'];
		$Date_of_Issue_to_NI4G = $_POST['Date_of_Issue_to_NI4G'];
		$Sales_Region = $_POST['Sales_Region'];
		$Other_Operator_Code = $_POST['Other_Operator_Code'];
		$Sharing_Operator = $_POST['Sharing_Operator'];
		$Border_Sites = $_POST['Border_Sites'];
		$Priority = $_POST['Priority'];
		$revised_Tag = $_POST['revised_Tag'];
		$TowerCo_Assignment_Status = $_POST['TowerCo_Assignment_Status'];
		$TowerCo_Bucket = $_POST['TowerCo_Bucket'];
		$Rollout_Status = $_POST['Rollout_Status'];
		$Date_of_Assignment = $_POST['Date_of_Assignment'];
		$Days_Passed = $_POST['Days_Passed'];
		$Site_Type = $_POST['Site_Type'];
		$Allocation = $_POST['Allocation'];
		$Category = $_POST['Category'];
		$Final_Status = $_POST['Final_Status'];

//$JoinDate=$_POST['empresigndate']; 
//$EmpLastDate=date("Y-m-d",strtotime($JoinDate));

if($edrow>0){
$ret=mysqli_query($con,"update `d1_site_list` set `GenericID` = '$GenericID',`2G_Site` = '$twoG_Site',`3G_Site` = '$threeG_Site',`4G_Site` = '$FourG_Site',`2G_3G_4G` = '$twoG_3G_4G',`Longitude` = '$Longitude',`Latitude` = '$Latitude',`Division` = '$Division',`District` = '$District',`Thana` = '$Thana',`vendor` = '$vendor',`Budget_site_Type` = '$Budget_site_Type',`2G_Budget_year` = '$twoG_Budget_year',`CoLocated_Stand_alone` = '$CoLocated_Stand_alone',`Sharing_Info` = '$Sharing_Info',`Comments` = '$Comments',`Date_of_Issue_to_NI2G` = '$Date_of_Issue_to_NI2G',`Date_of_Issue_to_NI3G` = '$Date_of_Issue_to_NI3G',`Date_of_Issue_to_NI4G` = '$Date_of_Issue_to_NI4G',`Sales_Region` = '$Sales_Region',`Other_Operator_Code` = '$Other_Operator_Code',`Sharing_Operator` = '$Sharing_Operator',`Border_Sites` = '$Border_Sites',`Priority` = '$Priority',`revised_Tag` = '$revised_Tag',`TowerCo_Assignment_Status` = '$TowerCo_Assignment_Status',`TowerCo_Bucket` = '$TowerCo_Bucket',`Rollout_Status` = '$Rollout_Status',`Date_of_Assignment` = '$Date_of_Assignment',`Days_Passed` = '$Days_Passed',`Site_Type` = '$Site_Type',`Allocation` = '$Allocation',`Category` = '$Category',`Final_Status` = '$Final_Status',`dataEditedBy`= '$d1EditedBy',`d1Edited_Date` = '$currentDateTime',`d1Edited_status`= '$d1Edited_status' WHERE id='$d1editid';");
		echo "<script>alert('The d1 Site information was updated successfully.!!!!.');</script>";  
//echo var_dump ($d1editid,$GenericID,$twoG_Site,$threeG_Site,$FourG_Site,$twoG_3G_4G,$Longitude,$Latitude,$Division,$District,$Thana,$vendor,$Budget_site_Type,$twoG_Budget_year,$CoLocated_Stand_alone,$Sharing_Info,$Comments,$Date_of_Issue_to_NI2G,$Date_of_Issue_to_NI3G,$Date_of_Issue_to_NI4G,$Sales_Region,$Other_Operator_Code,$Sharing_Operator,$Border_Sites,$Priority,$TowerCo_Assignment_Status,$TowerCo_Bucket,$Rollout_Status,$Date_of_Assignment,$Days_Passed,$Site_Type,$Allocation,$Category,$Final_Status,$currentDateTime); //"<br>";//"\n";
		//exit;		
		echo "<script>window.location.href='d1-rollout-site-list.php'</script>";
	       } else {
echo "<script>alert('Something went wrong. Please try again.');</script>"; 
echo "<script>window.location.href='edit-d1-rollout-site.php'</script>";
} 
}


//ALTER table d1_site_list
//ADD `dataEditedBy` VARCHAR(100) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
//ADD `d1Edited_Date` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
//ADD `d1Edited_status` INT(4) NULL DEFAULT NULL;
//htmlspecialchars vs htmlentities
//htmlspecialchars
//htmlspecialchars($strText, ENT_QUOTES)  
//'$dataEditedBy','$d1Edited_Date','$d1Edited_status'
//'$d1EditedBy','$currentDateTime','$d1Edited_status'
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Edite D1 Site Info. - Rollout Master</title>
	
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
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>&nbsp; Edit D1 Site</a></li>
					<li class="breadcrumb-item active" aria-current="page"></li>
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
							<div class="Panel panel-heading" style="position:relative; margin-left:1.5%;margin-top:1%;"><b><i class="fa fa-list-ul"></i>&nbsp; Edit D1 Site Details.</b></div>	
							<div class="Panel panel-body " style="border-top: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">  <!--table-->
                                     <!-- /My Code -->   
								
							   <form  class="needs-validation" method="post" name="d1-rollout-site-list" action="edit-d1-rollout-site.php" enctype="multipart/form-data" novalidate>								
<?php 

$Edit_d1site=intval($_GET['dsiteid']); 
$tbluser=mysqli_query($con,"SELECT `id`,`UserId`,`GenericID`,`2G_Site`,`3G_Site`,`4G_Site`,`2G_3G_4G`,`Longitude`,`Latitude`,`Division`,`District`,`Thana`,`vendor`,`Budget_site_Type`,`2G_Budget_year`,`CoLocated_Stand_alone`,`Sharing_Info`,`Comments`,`Date_of_Issue_to_NI2G`,`Date_of_Issue_to_NI3G`,`Date_of_Issue_to_NI4G`,`Sales_Region`,`Other_Operator_Code`,`Sharing_Operator`,`Border_Sites`,`Priority`,`TowerCo_Assignment_Status`,`TowerCo_Bucket`,`Rollout_Status`,`Date_of_Assignment`,`Days_Passed`,`Site_Type`,`Allocation`,`Category`,`Final_Status`,`revised_Tag`,`updationDate` FROM d1_site_list WHERE id='$Edit_d1site';");

?>							

									<table id="datable_ed1" class="display table table-fit table-bordered table-striped nowrap cell-border compact stripe" style="width:100%;">
									<thead>
										<tr>
										
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sl#</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Generic ID</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">2G Site Code</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">3G Site Code </th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">4G Site Code</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">2G/3G/4G</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Longitude</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Latitude</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Division</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">District</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Thana</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">vendor</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Budget site Type</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">2G Budget year</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Co-located/ Stand alone</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sharing info</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Comments</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Date of Issue to NI(2G)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Date of Issue to NI(3G)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Date of Issue to NI(4G)</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sales region</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Other Operator Code</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Sharing Operator</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Border Sites</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Priority</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TowerCo Assignment Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">TowerCo Bucket</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Rollout Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Date of Assignment</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Days Passed</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Site Type</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Allocation</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Category</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Final Status</th>
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Revised Tag</th>
										
										</tr>
											
									</thead>
									<tbody>

<?php 

$cnt=1;

while($user=mysqli_fetch_array($tbluser)){
	
?>								
									<tr class="tr-hover-class">						
										    <td style="font-size:11px;text-align:center; vertical-align: middle;" ><input type="hidden" id="custId" name="edit_id" value="<?php echo htmlentities($user['id']);?>"><?php echo htmlentities($user['id']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Generic ID Entry" id="GenericID" name="GenericID" value="<?php echo htmlentities($user['GenericID']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="2G Site Entry" id="2G Site" name="2G_Site" value="<?php echo htmlentities($user['2G_Site']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="3G Site Entry" id="3G Site" name="3G_Site" value="<?php echo htmlentities($user['3G_Site']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="4G Site Entry" id="4G Site" name="4G_Site" value="<?php echo htmlentities($user['4G_Site']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="2G 3G 4G Entry" id="2G_3G_4G Site" name="2G_3G_4G" value="<?php echo htmlentities($user['2G_3G_4G']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input type="number" class="form-control" style="width:auto;height:30px;text-align:center" title="Longitude Entry" id="lon"  name="Longitude" value="<?php echo htmlentities($user['Longitude']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input type="number" class="form-control" style="width:auto;height:30px;text-align:center" title="Latitude Entry" id="lat"  name="Latitude" value="<?php echo htmlentities($user['Latitude']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Name of Division Entry" id="Division" name="Division" value="<?php echo htmlentities($user['Division']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Name of District Entry" id="District" name="District" value="<?php echo htmlentities($user['District']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Name of Thana Entry" id="Thana" name="Thana" value="<?php echo htmlentities($user['Thana']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Name of Vendor Entry" id="vendor" name="vendor" value="<?php echo htmlentities($user['vendor']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Budget Site Type Entry" id="Budget_site_Type" name="Budget_site_Type" value="<?php echo htmlentities($user['Budget_site_Type']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="2G Budget Year Entry" id="2G_Budget_year" name="2G_Budget_year" value="<?php echo htmlentities($user['2G_Budget_year']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Co-Located Stand Alone Entry" id="CoLocated_Stand_alone" name="CoLocated_Stand_alone" value="<?php echo htmlentities($user['CoLocated_Stand_alone']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Sharing Information entry" id="Sharing_Info" name="Sharing_Info" value="<?php echo htmlentities($user['Sharing_Info']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Comments Entry" id="Comments" name="Comments" value="<?php echo htmlentities($user['Comments']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input type="date" class="form-control" style="width:auto;height:30px;text-align:center" title="Date" name="Date_of_Issue_to_NI2G" value="<?php echo htmlentities($user['Date_of_Issue_to_NI2G']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input type="date" class="form-control" style="width:auto;height:30px;text-align:center" title="Date" name="Date_of_Issue_to_NI3G" value="<?php echo htmlentities($user['Date_of_Issue_to_NI3G']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input type="date" class="form-control" style="width:auto;height:30px;text-align:center" title="Date" name="Date_of_Issue_to_NI4G" value="<?php echo htmlentities($user['Date_of_Issue_to_NI4G']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Name of Sales Region Entry" id="Sales_Region" name="Sales_Region" value="<?php echo htmlentities($user['Sales_Region']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Other Operator Code Entry" id="Other_Operator_Code" name="Other_Operator_Code" value="<?php echo htmlentities($user['Other_Operator_Code']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Sharing Operator Entry" id="Sharing_Operator" name="Sharing_Operator" value="<?php echo htmlentities($user['Sharing_Operator']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Border Sites Entry" id="Border_Sites" name="Border_Sites" value="<?php echo htmlentities($user['Border_Sites']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Priority Entry" id="Priority" name="Priority" value="<?php echo htmlentities($user['Priority']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Tower-Co Assignment Status Entry" id="TowerCo_Assignment_Status" name="TowerCo_Assignment_Status" value="<?php echo htmlentities($user['TowerCo_Assignment_Status']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Tower-Co Bucket Entry" id="TowerCo_Bucket" name="TowerCo_Bucket" value="<?php echo htmlentities($user['TowerCo_Bucket']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Rollout Status Entry" id="Rollout_Status" name="Rollout_Status" value="<?php echo htmlentities($user['Rollout_Status']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input type="date" class="form-control" style="width:auto;height:30px;" title="Date" name="Date_of_Assignment" value="<?php echo htmlentities($user['Date_of_Assignment']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Days Passed Entry" id="Days_Passed" name="Days_Passed" value="<?php echo htmlentities($user['Days_Passed']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Site Type Entry" id="Site_Type" name="Site_Type" value="<?php echo htmlentities($user['Site_Type']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Allocation Entry" id="Allocation" name="Allocation" value="<?php echo htmlentities($user['Allocation']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Name of Category Entry" id="Category" name="Category" value="<?php echo htmlentities($user['Category']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Final Status Entry" id="Final_Status" name="Final_Status" value="<?php echo htmlentities($user['Final_Status']);?>" required required="true"></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><input class="form-control" type="text" style="width:auto;height:30px;text-align:center" title="Revised Tag Entry" id="revised_Tag" name="revised_Tag" value="<?php echo htmlentities($user['revised_Tag']);?>" required required="true"></td>
											
										</tr>
										
									
										
										<?php $cnt=$cnt+1;
										
										} ?>
									</tbody>
								
									
								</table>
										<!--Close result set-->
								<table style="margin-left: auto; margin-right: auto;">
									
									<tr style="height: 74px;">
										<td style="font-size:13px;text-align:right; vertical-align: middle;" border="0" colspan="0">
										<input type="submit" name="d1_site_edit" value="Submit" style="" data-toggle="tooltip" data-original-title="Click this button to Submit your information" onClick="return confirm('Hi! \n Are you sure that are you want to submit this form?.');" class="btn btn-primary btn-flat">								
										</td>				
										<td>&nbsp;&nbsp;&nbsp;</td>
										<td style="font-size:13px;text-align:left; vertical-align: middle;" border="0" colspan="0">
										<a href="d1-rollout-site-list.php" type="button" class="btn btn-primary btn-flat" data-toggle="tooltip" data-original-title="Click cancel to abort" onClick="return confirm('Are you sure you want to Cancel this Entry?.');"> Cancel</a>
										</td>
										
									</tr>								
									
								</table>
									</form>
								<!--Close connection mysqli_close($con);-->
<!-- /My Code -->	
								
                                    </div>
                                </div>
                            
						
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