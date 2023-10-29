  <?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['osemsuid']==0)) {
  header('location:logout.php');
  } else{
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
// Code for deletion   

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>User Log - Rollout Master</title>
	<link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">


<style>


.center {

  height: 35px; 
  margin: 0;
  position: absolute;
  top: 94%;
  left: 40%;
 -ms-transform: translate(-50%, -0%);
  transform: translate(-50%, -100%); 
 
}

.body {margin:10em;}
tfoot tr, thead td,thead tr,thead th {
	font-weight:bold;
	background: ;
}
tfoot td {
	font-weight:bold;
		background: ;
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
                <ol class="breadcrumb breadcrumb-dark bg-dark" style="border: 1px solid #F00A7C;">
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>&nbsp;User Management</a></li>
					<li class="breadcrumb-item active" aria-current="page">User Log</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">

                <!-- Title -->
<!--<div class="hk-pg-header">
 <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>User Log</h4>
              </div>-->
                <!-- /Title -->


                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        
										<div class="panel panel-default">
							
							<div class="Panel panel-heading" style="position:relative; margin-left:1.5%;margin-top:1%;"><b><span class="feather-icon"><i data-feather="database"></i></span>&nbsp; OS Employee User Log</b></div>	
							<div class="panel-body " style="border-top: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">  <!--table-->
                                     <!-- /My Code -->   
											<br>									

								<div class="table-responsive">
										
										<!--<table id="datable_11lm" class="display responsive-table table table-fit table-bordered table-striped wrap cell-border compact stripe" style="width:100%;">-->
										<table id="datable_11lm" class="display table table-fit table-bordered table-striped wrap cell-border compact stripe" style="width: 100%;">	
										<thead>
										<tr>
											<th style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;color:#F00A7C;" >Sl.#</th>
											<th style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;color:#F00A7C;" >Login ID</th>
											<th style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;color:#F00A7C;" >Office</th>
											<th style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;color:#F00A7C;" >User Source IP</th>
											<th style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;color:#F00A7C;" >PC Name</th>
											<th style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;color:#F00A7C;" >Login Time</th>
											<th style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;color:#F00A7C;" >Logout Time</th>
											<th style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;color:#F00A7C;" >Status</th>											
																			
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select usl.username,usr.bloffice,usl.userip,usl.remotehost,usl.loginTime,usl.logout,usl.status from userlog_roc usl
LEFT JOIN tbluser AS usr ON usr.loginid=usl.username");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;"><?php echo htmlentities($cnt);?></td>
											<td style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;"><?php echo htmlentities($row['username']);?></td>
											<td style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;"><?php echo htmlentities($row['bloffice']);?></td>
											<td style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;"><?php echo htmlentities($row['userip']);?></td>
											<td style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;"><?php echo htmlentities($row['remotehost']);?></td>
											<td style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;"><?php echo htmlentities($row['loginTime']);?></td>
											<!--<td style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;"><?php //echo date_format(new \DateTime(($row['logout'])), 'Y-m-d H:i:s'); ?></td>-->
											<td style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;"><?php echo htmlentities($row['logout']);?></td>
											
											<td style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;">
											<?php $st=$row['status'];

													if($st==1)
													{
														echo "Successfull";
													}
													else
													{
														echo "Failed";
													}
											?></td>
											
											
										<?php $cnt=$cnt+1; } ?>
										</tbody>
								</table>
								
								      </div>
                                </div>
                            </div>
								
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <!-- /Row -->

            </div>
            <!-- /Container -->

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
<?php } ?>