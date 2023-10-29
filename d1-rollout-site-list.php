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


    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>D1 Site List - Rollout Master</title>
	
	<!-- Data Table CSS -->
	<link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!--<link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">-->
   
       <!-- Styles -->
       
	<link href="dist/css/style.css" rel="stylesheet" type="text/css"/>
	<!--<link href="dist/css/font-awesome.min.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/font-awesome.min.css" type="text/css"/>-->
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
							<div class="Panel panel-heading" style="position:relative; margin-left:1.5%;margin-top:1%;"><b><i class="fa fa-list-ul"></i>&nbsp;D1 Site Details.</b></div>	
							<div class="Panel panel-body " style="border-top: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">  <!--table-->
                                     <!-- /My Code -->   
											<br>									
<!--<form id="ot-regularization" name="ot-update"  action="ot-update.php" method="post">-->
			
								
<?php 
$tbluser=mysqli_query($con,"SELECT `id`,`UserId`,`GenericID`,`2G_Site`,`3G_Site`,`4G_Site`,`2G_3G_4G`,`Longitude`,`Latitude`,`Division`,`District`,`Thana`,`vendor`,`Budget_site_Type`,`2G_Budget_year`,`CoLocated_Stand_alone`,`Sharing_Info`,`Comments`,`Date_of_Issue_to_NI2G`,`Date_of_Issue_to_NI3G`,`Date_of_Issue_to_NI4G`,`Sales_Region`,`Other_Operator_Code`,`Sharing_Operator`,`Border_Sites`,`Priority`,`TowerCo_Assignment_Status`,`TowerCo_Bucket`,`Rollout_Status`,`Date_of_Assignment`,`Days_Passed`,`Site_Type`,`Allocation`,`Category`,`Final_Status`,`revised_Tag`,`updationDate` FROM d1_site_list;");
?>							

									<div id="loading">
									<img id="loading-image" src="images/ajax-loader.gif" alt="Loading..." width="450" height="350"/>
									</div>	
									
	<table id="datable_11lm" class="display nowrap cell-border table table-bordered table-sm compact stripe" style="width:100%; display:none;">
									
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
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Action</th>
										</tr>
											
									</thead>
									<tbody>

<?php 

$cnt=1;

while($user=mysqli_fetch_array($tbluser)){
	
?>								
									<tr class="tr-hover-class">						
										    <td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($cnt);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['GenericID']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['2G_Site']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['3G_Site']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['4G_Site']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['2G_3G_4G']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Longitude']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Latitude']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Division']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['District']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Thana']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['vendor']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Budget_site_Type']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['2G_Budget_year']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['CoLocated_Stand_alone']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Sharing_Info']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Comments']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if(($user['Date_of_Issue_to_NI2G'])!="0000-00-00") {echo htmlentities($user['Date_of_Issue_to_NI2G']);} else {echo "-";};?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if(($user['Date_of_Issue_to_NI3G'])!="0000-00-00") {echo htmlentities($user['Date_of_Issue_to_NI3G']);} else {echo "-";};?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if(($user['Date_of_Issue_to_NI4G'])!="0000-00-00") {echo htmlentities($user['Date_of_Issue_to_NI4G']);} else {echo "-";};?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Sales_Region']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Other_Operator_Code']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Sharing_Operator']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Border_Sites']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Priority']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['TowerCo_Assignment_Status']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['TowerCo_Bucket']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Rollout_Status']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php if($user['Date_of_Assignment']!="0000-00-00") {echo htmlentities($user['Date_of_Assignment']);} else {echo "-";};?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Days_Passed']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Site_Type']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Allocation']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Category']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['Final_Status']);?></td>
											<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($user['revised_Tag']);?></td>
											<td style="text-align:center;"><a href="edit-d1-rollout-site.php?dsiteid=<?php echo htmlentities($user['id']);?>" data-toggle="tooltip" data-original-title="Click to Edit the Site's information." type="button" class="btn btn-primary btn-rounded" style="text-align:center;font-size:9px;font-style: normal; font-variant: normal;">Edit</a></td>
										
										</tr>
										<?php $cnt=$cnt+1;
										
										} ?>
									</tbody>
									
									<tfoot>
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
										<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Action</th>
										</tr>
											
									 </tfoot>			
																		
									
								</table>
										<!--Close result set-->
								
								<!--</form>-->	
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
     <!--<script src="vendors/jquery-toggles/toggles.min.js"></script>-->
     <!--<script src="dist/js/toggle-data.js"></script>-->
    <script src="dist/js/init.js"></script>

<script>
  $(window).on('load', function () {
    $('#loading').hide();
  }) 
</script>

</body>
</html>
<?php mysqli_close($con); } ?>