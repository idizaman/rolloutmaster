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
    <title>User Management - OSEAS</title>
	<link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">


<style>

.butcol1 {
  margin: 0px;
  text-decoration: none;
  cursor:pointer;
  border-radius:15px;
  border: solid 2px #ff7347; 
  color:white;
  text-align:center;
  text-decoration:none;
  background-color:none; 
  font-size: 12px; 
  text-align: center; 
}
  .butcol1:hover, focus {background:#F00A7C; background-color: #F00A7C;}


.button1 {
  left:21%;
  top:41%;
  margin:0px;
  position:fixed;
  cursor:pointer;
  border-radius:15px;
  color:#F00A7C;
  text-align:center;
  text-decoration:none;
  background-color:none; 
  border: none; 
  font-size: 9px; 
  text-align: center; 
}
  .button1:hover, focus {background:none; background-color: none;}
  

.button3 {

  left: 30%;
  top: 32%;
  margin: 0px;
  position: fixed;
  cursor: pointer;
  border: solid 2px #ff7347; 
  border-radius: 15px;
  color: white;
  text-align: center;
  text-decoration: none;
}
  .button3:hover, focus {background:#F00A7C; background-color: #F00A7C;}
  
	tr.tr-hover-class:hover {
      background: #F00A7C!important;
   }
   
   
   .tbl {
    display: table;
    height: 2px;
    width: px;
    font-size: 1px;
    line-height: 1px;
		}

.tbl .tr {
    display: table-row;
		}

.tbl .td {
    width: 12px;
    height: 4px;
    display: table-cell;
   
	input:focus,
select:focus,
textarea:focus,
button:focus {
    outline: none;
}

.tableNew {
  display: block;
  max-width: -moz-fit-content;
  max-width: fit-content;
  margin: 0 auto;
  overflow-x: auto;
  white-space: nowrap;
}
      
	
Table.dataTable td.center, table.dataTable td.dataTables_empty {   text-align: center; }	
	table.dataTable td.dataTables_empty {
    text-align: center;    
}  
	  

.left-col {
    float: left;
    width: 10%;
}
 
.center-col {
    float: left;
    width: 60%;
}
 
.right-col {
    float: left;
    width: 30%;
}

.body {margin:10em;}
tfoot tr, thead tr,thead td {
	font-weight:bold;
	background: orange;
}
tfoot td {
	font-weight:bold;
		background: orange;
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
					<li class="breadcrumb-item active" aria-current="page">Manage Users</li>
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
							
							<div class="Panel panel-heading" style="position:relative; margin-left:1.5%;margin-top:1%;"><span class="fa-passwd-reset fa-stack">
  <i class="fa fa-refresh fa-stack-2x fa-spin fa-1x"></i>
  <i class="fa fa-user fa-stack-1x"></i>
</span>&nbsp; OS Employee User Management</div>	
							<div class="panel-body " style="border-top: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">  <!--table-->
                                     <!-- /My Code -->   
											<br>									
							
										<table id="datable_11lm" class="display table table-fit table-bordered table-striped nowrap cell-border compact stripe" style="width: 100%;">
									
										<!--<table id="datable_11lm" class="display responsive-table table table-fit table-bordered table-striped wrap cell-border compact" style="width:100%;">-->
                                            <thead>
										<tr>
											<th style="text-align:center; vertical-align: middle;font-size:11px;color:#F00A7C;" >Sl.#</th>
											<th style="text-align:center; vertical-align: middle;font-size:11px;color:#F00A7C;" >Name & ID</th>
											<th style="text-align:center; vertical-align: middle;font-size:11px;color:#F00A7C;" >E-mail</th>
											<th style="text-align:center; vertical-align: middle;font-size:11px;color:#F00A7C;" >Mobile Number</th>
											<th style="text-align:center; vertical-align: middle;font-size:11px;color:#F00A7C;" >Login ID</th>
											<th style="text-align:center; vertical-align: middle;font-size:11px;color:#F00A7C;" >Office</th>
											<th style="text-align:center; vertical-align: middle;font-size:11px;color:#F00A7C;" >Region</th>											
											<th style="text-align:center; vertical-align: middle;font-size:11px;color:#F00A7C;" >Action</th>
											
											
											
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"SELECT usr.id,usr.FullName,usr.employeeID,usr.Email,usr.MobileNumber,usr.loginid,usr.password,usr.regionid,usr.officeid,usr.status,usr.bloffice,usr.ro,usr.roleid FROM tbluser AS usr 
WHERE usr.Emp_identity=2 order BY usr.id ASC;");
$cnt=1;
while($user=mysqli_fetch_array($query))
{
?>									
										<tr class="tr-hover-class">
											<td style="text-align:center; vertical-align: middle;font-size:11px;"><?php echo htmlentities($cnt);?></td>
											<td style="text-align:center; vertical-align: middle;font-size:11px;"><?php echo htmlentities($user['FullName']);?> (<?php echo htmlentities($user['employeeID']);?>)</td>
											<td style="text-align:center; vertical-align: middle;font-size:11px;"><?php echo htmlentities($user['Email']);?></td>
											<td style="text-align:center; vertical-align: middle;font-size:11px;"><?php echo htmlentities($user['MobileNumber']);?></td>
											<td style="text-align:center; vertical-align: middle;font-size:11px;"><?php echo htmlentities($user['loginid']);?></td>
											<td style="text-align:center; vertical-align: middle;font-size:11px;"><?php echo htmlentities($user['bloffice']);?></td>
											<td style="text-align:center; vertical-align: middle;font-size:11px;"><?php echo htmlentities($user['ro']);?></td>
																	

											<td style="text-align:center;">
																				
											<a href="edit-mypassword.php?myprid=<?php echo ($user['id']);?>" data-toggle="tooltip" data-original-title="Reset Password" type="button" class="btn btn-primary btn-rounded" style="text-align:center;font-size:9px;font-style: normal; font-variant: normal;">Reset</a>
										<span></span>
											<a href="user-resign-osems.php?resignid=<?php echo ($user['id']);?>" data-toggle="tooltip" data-original-title="Employee Resign Entry" type="button" class="btn btn-primary btn-rounded" style="text-align:center;font-size:9px;font-style: normal; font-variant: normal;">Resign</a>
											</td>
										
				
											
											
										<?php $cnt=$cnt+1; } ?>
										</tbody>
								</table>
								
								    
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