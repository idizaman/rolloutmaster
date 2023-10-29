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
$dsiteupdate=$objExcel->getSheetByName('D1_File'); 
$dsitelisthighestrow=$dsiteupdate->getHighestRow();

	for($row=2;$row<=$dsitelisthighestrow;$row++)
	{
		$GenID = $dsiteupdate->getCellByColumnAndRow(0,$row)->getValue();
		$GenericID = trim(addslashes($GenID));
		$twoGSi = $dsiteupdate->getCellByColumnAndRow(1,$row)->getValue();
		$twoG_Site = trim(addslashes($twoGSi));
		$threeGSi = $dsiteupdate->getCellByColumnAndRow(2,$row)->getValue();
		$threeG_Site = trim(addslashes($threeGSi));
		$FourGSi = $dsiteupdate->getCellByColumnAndRow(3,$row)->getValue();
		$FourG_Site = trim(addslashes($FourGSi));
		$twoG_FourG = $dsiteupdate->getCellByColumnAndRow(4,$row)->getValue();
		$twoG_3G_4G = trim(addslashes($twoG_4G));
		$Lon = $dsiteupdate->getCellByColumnAndRow(5,$row)->getValue();
		$Longitude = trim($Lon);
		$Lat = $dsiteupdate->getCellByColumnAndRow(6,$row)->getValue();
		$Latitude = trim($Lat);
		$Divi = $dsiteupdate->getCellByColumnAndRow(7,$row)->getValue();
		$Division = trim(addslashes($Divi));
		$Dist = $dsiteupdate->getCellByColumnAndRow(8,$row)->getValue();
		$District = trim(addslashes($Dist));
		$Thana_name = $dsiteupdate->getCellByColumnAndRow(9,$row)->getValue();
		$Thana = trim(addslashes($Thana_name));
		$vendor_name = $dsiteupdate->getCellByColumnAndRow(10,$row)->getValue();
		$vendor = trim(addslashes($vendor_name));
		$Budget_site = $dsiteupdate->getCellByColumnAndRow(12,$row)->getValue();
		$Budget_site_Type = trim(addslashes($Budget_site));
		$twoG_Budget = $dsiteupdate->getCellByColumnAndRow(13,$row)->getValue();
		$twoG_Budget_year = trim(addslashes($twoG_Budget));
		$CoLocated_Stand = $dsiteupdate->getCellByColumnAndRow(17,$row)->getValue();
		$CoLocated_Stand_alone = trim(addslashes($CoLocated_Stand));
		$SharingInfo = $dsiteupdate->getCellByColumnAndRow(22,$row)->getValue();
		$Sharing_Info = trim(addslashes($SharingInfo));
		$CommentsNotes = $dsiteupdate->getCellByColumnAndRow(23,$row)->getValue();
		$Comments = trim(addslashes($CommentsNotes));
		$Date_NI2G = $dsiteupdate->getCellByColumnAndRow(24,$row)->getValue();
		$Date_of_Issue_to_NI2G = ($Date_NI2G) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Date_NI2G)) : null;
		$Date_NI3G = $dsiteupdate->getCellByColumnAndRow(25,$row)->getValue();
		$Date_of_Issue_to_NI43 = ($Date_NI3G) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Date_NI3G)) : null;
		$Date_NI4G = $dsiteupdate->getCellByColumnAndRow(26,$row)->getValue();
		$Date_of_Issue_to_NI4G = ($Date_NI4G) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Date_NI4G)) : null;
		$Sales_Regi = $dsiteupdate->getCellByColumnAndRow(27,$row)->getValue();
		$Sales_Region = trim(addslashes($Sales_Regi));
		$Other_Operator = $dsiteupdate->getCellByColumnAndRow(28,$row)->getValue();
		$Other_Operator_Code = trim(addslashes($Other_Operator));
		$Sharing_Op = $dsiteupdate->getCellByColumnAndRow(29,$row)->getValue();
		$Sharing_Operator = trim(addslashes($Sharing_Op));
		$Border_Si = $dsiteupdate->getCellByColumnAndRow(30,$row)->getValue();
		$Border_Sites = trim(addslashes($Border_Si));
		$Prior = $dsiteupdate->getCellByColumnAndRow(31,$row)->getValue();
		$Priority = trim(addslashes($Prior));
		$revisedTag = $dsiteupdate->getCellByColumnAndRow(34,$row)->getValue();
		$revised_Tag = trim(addslashes($revisedTag));
		$TowerCo_Assign = $dsiteupdate->getCellByColumnAndRow(35,$row)->getValue();
		$TowerCo_Assignment_Status = trim(addslashes($TowerCo_Assign));
		$TowerCo_Buk = $dsiteupdate->getCellByColumnAndRow(36,$row)->getValue();
		$TowerCo_Bucket = trim(addslashes($TowerCo_Buk));
		$Rollout_Sts = $dsiteupdate->getCellByColumnAndRow(37,$row)->getValue();
		$Rollout_Status = trim(addslashes($Rollout_Sts));
		$Date_of_Assign = $dsiteupdate->getCellByColumnAndRow(38,$row)->getValue();
		$Date_of_Assignment = ($Date_of_Assign) ? date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Date_of_Assign)) : null;
		$Days_Pas = $dsiteupdate->getCellByColumnAndRow(39,$row)->getValue();
		$Days_Passed = trim(addslashes($Days_Pas));
		$Site_Tp = $dsiteupdate->getCellByColumnAndRow(40,$row)->getValue();
		$Site_Type = trim(addslashes($Site_Tp));
		$Allocat = $dsiteupdate->getCellByColumnAndRow(46,$row)->getValue();
		$Allocation = trim(addslashes($Allocat));
		$Categ = $dsiteupdate->getCellByColumnAndRow(47,$row)->getValue();
		$Category = trim(addslashes($Categ));
		$Final_Sts = $dsiteupdate->getCellByColumnAndRow(48,$row)->getValue();
		$Final_Status = trim(addslashes($Final_Sts));
		$RFAImnth = $dsiteupdate->getCellByColumnAndRow(52,$row)->getValue();
		$RFAI_month = trim(addslashes($RFAImnth));
		$currentDate=date('Y-m-d', time ()); //current Date insert 52

		$site_query=mysqli_query($con,"select `id`,`GenericID` from `d1_site_list` where `GenericID`='$GenericID';");
		$d1revisedsite=mysqli_fetch_array($site_query);
		$dsiteid=$d1revisedsite['GenericID'];
			
		if($dsiteid=="$GenericID")
		{
		$existing=mysqli_query($con,"update `d1_site_list` set `revised_Tag` = '$revised_Tag' where `GenericID` = '$dsiteid';");
		}
		else {
$dinsertqry="INSERT INTO `d1_site_list`(`UserId`,`GenericID`,`2G_Site`,`3G_Site`,`4G_Site`,`2G_3G_4G`,`Longitude`,`Latitude`,`Division`,`District`,`Thana`,`vendor`,`Budget_site_Type`,`2G_Budget_year`,`CoLocated_Stand_alone`,`Sharing_Info`,`Comments`,`Date_of_Issue_to_NI2G`,`Date_of_Issue_to_NI3G`,`Date_of_Issue_to_NI4G`,`Sales_Region`,`Other_Operator_Code`,`Sharing_Operator`,`Border_Sites`,`Priority`,`revised_Tag`,`TowerCo_Assignment_Status`,`TowerCo_Bucket`,`Rollout_Status`,`Date_of_Assignment`,`Days_Passed`,`Site_Type`,`Allocation`,`Category`,`Final_Status`,`RFAI_month`,`updationDate`) VALUES ('$uid','$GenericID','$twoG_Site','$threeG_Site','$FourG_Site','$twoG_3G_4G','$Longitude','$Latitude','$Division','$District','$Thana','$vendor','$Budget_site_Type','$twoG_Budget_year','$CoLocated_Stand_alone','$Sharing_Info','$Comments','$Date_of_Issue_to_NI2G','$Date_of_Issue_to_NI3G','$Date_of_Issue_to_NI4G','$Sales_Region','$Other_Operator_Code','$Sharing_Operator','$Border_Sites','$Priority','$revised_Tag','$TowerCo_Assignment_Status','$TowerCo_Bucket','$Rollout_Status','$Date_of_Assignment','$Days_Passed','$Site_Type','$Allocation','$Category','$Final_Status','$RFAI_month','$currentDate')";
$d1insertres=mysqli_query($con,$dinsertqry);
		}
		}
echo "<script>alert(' Well done!! D1 Site List successfully imported.');</script>";

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" Content-Type= "text/html" />
    <title>Import D1 Site List - Rollout Master</title>
	
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
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>&nbsp;D1 Site List</a></li>
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
							
							<div class="Panel panel-heading" style="position:relative; margin-left:1.5%;margin-top:1%;"><b><i class="fa fa-list-ul"></i>&nbsp;D1 Site Details Import.</b></div>	
							<div class="Panel panel-body " style="border-top: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">  <!--table-->
                                     <!-- /My Code -->   
											<br>
									
								<p style="text-align:center; vertical-align: middle;"><em class="fa fa-list">&nbsp;</em><label>D1 Site list update</label></p>
									<form  method="post" action="d1-sitelist-update.php" enctype="multipart/form-data">
									
									<!--<table  class="table table-striped display" style="white-space:nowrap;height:auto; width:100%;">-->
									<table   class="table table-striped display" style="white-space:nowrap;height:auto; width:auto;vertical-align:top; margin-left: auto; margin-right: auto; margin-top: auto;">
									<tbody>
									
										<tr >
										<td><div class="form-group"></div></td>	
										
											<td><div class="form-group"></div></td>
											<td><div class="form-group"></div></td>
											<td style="text-align:left; vertical-align: middle;"><div class="form-group"><input class="form-control" type="file"  id="uploadfile" name="uploadfile" required="true" style="text-align:Left; vertical-align: middle;"></div><div class="form-group"><span><font size="2" class="form-data" face="Arial Narrow" color="#0000FF">** Click to Download Template: <a href="D1_file upload-Template.xlsx"><strong>D1 Site List Upload (.xlsx)</strong></a></font></span></div></td>
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