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
    <title>D1 Analysis Dashboard - Rollout Master</title>
	
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
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>&nbsp;D1 Vendors Category</a></li>
					<li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            
<!--Start-->
  
                <!-- Title -->
           
                <!-- /Title -->

                <!-- Row -->
              
     
							
<!-- /My Code -->   
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
           
              <!--<li class="breadcrumb-item"><a href="d1-analysis-dashboard.php">Home</a></li>-->
              <span class="breadcrumb-item active" style="color:black;"> &nbsp; <i class="fa fa-tachometer"></i> &nbsp; D1 Vendors Category : Dashboard </span>
        
		  
          </div><!-- /.col -->
       
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         
		 <div class="col-lg-4">
            
			<div class="card" style=" border-left: 1px solid #b5b3b1;">
			<div class="card-header border-50">
                <div class="d-flex justify-content-between">
                  <!--<h6 class="card-title">D1 Analysis Dashboard</h6>-->
                  <?php 
				  		//$d1rt = mysqli_query($con,"SELECT COUNT(GenericID)AS totald1_sites FROM d1_site_list");
						//$num1 = mysqli_fetch_array($d1rt); 
						//echo htmlentities($num1['totald1_sites']); display:none;
						
					?>
                </div>
				
				<div id="loading">
				<img id="loading-image" src="images/ajax-loader.gif" alt="Loading..." width="450" height="350"/>
				</div>
				
				<table id="d1dashboard1" class="display nowrap cell-border compact table table-hover"  style="width:100%; display:none;">
				
				
				<thead>
						
					
					<tr><!-- Table Row & head-->
											
					<th style="font-size:12px;text-align:right; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;" colspan = "1" >Huawei Reuse<th>				
					</tr>
					
					<tr>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;">Category (A)</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;font-weight:bold;">Count of Generic ID</th>
							
					</tr>
					
				</thead>
					
					
<?php 

$cnt=1;

$ttlCate_a = 0;
$Category_count_a = mysqli_query($con,"SELECT Category, count(GenericID) AS catg_Hw_Reuse FROM d1_site_list
WHERE vendor='Huawei_Reuse' GROUP BY vendor, Category ORDER BY Category ASC;");
while($Cat_count_a = mysqli_fetch_array($Category_count_a)){

$Cate_a = $Cat_count_a['Category'];
$ttlCate_a = $Cat_count_a['catg_Hw_Reuse'];
$Ttl_Cat_count_a += $ttlCate_a;


?>					
				<tbody>
				
				<tr>
					<td style="font-size:10.5px;text-align:left; vertical-align: middle;" ><?php echo htmlentities($Cate_a) ;?></td>
					<td style="font-size:10.5px;text-align:center; vertical-align: middle;" ><?php echo $ttlCate_a ;?></td>

				</tr>
					
				</tbody>
										<?php 
										
									
									$cnt=$cnt+1;
										}
								//}}}}} ?>	
						
			<tfoot>									
				<tr >
				
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Total</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;"><?php echo htmlentities($Ttl_Cat_count_a) ;?> </th>	
				</tr>	
			</tfoot>  
					
				</table>
			
			  </div>
            
            </div>
            <!-- /.card -->
			<div class="card" style="border-left: 1px solid #b5b3b1;">
			<div class="card-header border-50">
                <div class="d-flex justify-content-between">
                  <!--<h6 class="card-title">D1 Analysis Dashboard</h6>-->
                  <?php 
				  		//$d1rt = mysqli_query($con,"SELECT COUNT(GenericID)AS totald1_sites FROM d1_site_list");
						//$num1 = mysqli_fetch_array($d1rt); 
						//echo htmlentities($num1['totald1_sites']); display:none;
						
					?>
                </div>
				
				<!--<div id="loading">
				<img id="loading-image" src="images/ajax-loader.gif" alt="Loading..." width="450" height="350"/>
				</div>-->
				
				<table id="d1dashboard2" class="display nowrap cell-border compact table table-hover"  style="width:100%; display:none;">
				
				
				<thead>
						
					
					<tr><!-- Table Row & head-->
											
					<th style="font-size:12px;text-align:right; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;" colspan = "1" >Nokia<th>				
					</tr>
					
					<tr>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;">Category (D)</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;font-weight:bold;">Count of Generic ID</th>
							
					</tr>
					
				</thead>
					
					
<?php 

$cnt=1;

$ttlCate_d = 0;
$Category_count_d = mysqli_query($con,"SELECT Category, count(GenericID) AS catg_Nokia FROM d1_site_list
WHERE vendor='Nokia' GROUP BY vendor, Category ORDER BY Category ASC;");
while($Cat_count_d = mysqli_fetch_array($Category_count_d)){

$Cate_d = $Cat_count_d['Category'];
$ttlCate_d = $Cat_count_d['catg_Nokia'];
$Ttl_Cat_count_d += $ttlCate_d;



?>					
				<tbody>
				
				<tr>
					<td style="font-size:11px;text-align:left; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($Cate_d) ;?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo $ttlCate_d ;?></td>

				</tr>
					
				</tbody>
										<?php 
										
									
									$cnt=$cnt+1;
										}
								//}}}}} ?>	
						
			<tfoot>									
				<tr >
				
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Total</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;"><?php echo htmlentities($Ttl_Cat_count_d) ;?> </th>	
				</tr>	
			</tfoot>  
					
				</table>
			
			  </div>
            
            </div>

            <!-- /.card -->
			
			
			

          </div>
          <!-- /.col-md-6 -->
         <div class="col-lg-4.5">
            
			<div class="card" style="border-left: 1px solid #b5b3b1;">
			<div class="card-header border-50">
                <div class="d-flex justify-content-between">
                  <!--<h6 class="card-title">D1 Analysis Dashboard</h6>-->
                  <?php 
				  		//$d1rt = mysqli_query($con,"SELECT COUNT(GenericID)AS totald1_sites FROM d1_site_list");
						//$num1 = mysqli_fetch_array($d1rt); 
						//echo htmlentities($num1['totald1_sites']); display:none;
						
					?>
                </div>
				
				<!--<div id="loading">
				<img id="loading-image" src="images/ajax-loader.gif" alt="Loading..." width="450" height="350"/>
				</div>-->
				
				<table id="d1dashboard3" class="display nowrap cell-border compact table table-hover"  style="width:100%; display:none;">
				
				
				<thead>
									
					
					<tr><!-- Table Row & head-->
											
					<th style="font-size:12px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;" colspan = "1" >Huawei New SWAP<th>				
					</tr>
					
					<tr>
						<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;">Category (B)</th>
						<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;font-weight:bold;">Count of Generic ID</th>	
					</tr>
					
				</thead>
					
					
<?php 

$cnt=1;

$ttlCate_b = 0;
$Category_count_b = mysqli_query($con,"SELECT Category, count(GenericID) AS catg_Hw_New_Swap FROM d1_site_list
WHERE vendor='Huawei_New_Swap' GROUP BY vendor, Category ORDER BY Category ASC;");
while($Cat_count_b = mysqli_fetch_array($Category_count_b)){

$Cate_b = $Cat_count_b['Category'];
$ttlCate_b = $Cat_count_b['catg_Hw_New_Swap'];
$Ttl_Cat_count_b += $ttlCate_b;

?>					
				<tbody>
				
				<tr>
					<td style="font-size:11px;text-align:left; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($Cate_b) ;?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo $ttlCate_b ;?></td>

				</tr>
					
				</tbody>
										<?php 
	
										
									$cnt=$cnt+1;
										}
								//}}}}} ?>	
						
			<tfoot>									
						<tr>
							<th style="font-size:12px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;">Total</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;"><?php echo htmlentities($Ttl_Cat_count_b) ;?> </th>
						</tr>	
			</tfoot>  
					
				</table>
			
			  </div>
            
            </div>
            <!-- /.card -->
		<div class="card" style=" border-left: 1px solid #b5b3b1;">
			<div class="card-header border-50">
                <div class="d-flex justify-content-between">
                  <!--<h6 class="card-title">D1 Analysis Dashboard</h6>-->
                  <?php 
				  		//$d1rt = mysqli_query($con,"SELECT COUNT(GenericID)AS totald1_sites FROM d1_site_list");
						//$num1 = mysqli_fetch_array($d1rt); 
						//echo htmlentities($num1['totald1_sites']); display:none;
						
					?>
                </div>
				
				<div id="loading">
				<img id="loading-image" src="images/ajax-loader.gif" alt="Loading..." width="450" height="350"/>
				</div>
				
				<table id="d1dashboard4" class="display nowrap cell-border compact table table-hover"  style="width:100%;">
				
				
				<thead>
									
					
					<tr><!-- Table Row & head-->
											
					<th style="font-size:12px;text-align:right; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;" colspan = "1" >ZTE<th>				
					</tr>
					
					<tr>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;">Category (E)</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;font-weight:bold;">Count of Generic ID</th>
							
					</tr>
					
				</thead>
					
					
<?php 

$cnt=1;

$ttlCate_e = 0;


$Category_count_e = mysqli_query($con,"SELECT Category, count(GenericID) AS catg_ZTE FROM d1_site_list
WHERE vendor='ZTE' GROUP BY vendor, Category ORDER BY Category ASC;");
while($Cat_count_e = mysqli_fetch_array($Category_count_e)){

$Cate_e = $Cat_count_e['Category'];
$ttlCate_e = $Cat_count_e['catg_ZTE'];
$Ttl_Cat_count_e += $ttlCate_e;

?>					
				<tbody>
				
				<tr>
					<td style="font-size:11px;text-align:left; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($Cate_e) ;?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo $ttlCate_e ;?></td>
					
					
				</tr>
					
				</tbody>
										<?php 
	
										
									$cnt=$cnt+1;
										}
								//}}}}} ?>	
						
			<tfoot>									
				<tr >
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;">Total</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;"><?php echo htmlentities ($Ttl_Cat_count_e) ;?> </th>
				</tr>	
			</tfoot>  
					
				</table>
			
			  </div>
            
            </div> <!-- /.card -->
          </div> <!-- /.col-md-6 -->

 <!-- /.col-md-6 -->

         <div class="col-lg-4">
            
			<div class="card" style=" border-left: 1px solid #b5b3b1;">
			<div class="card-header border-50">
                <div class="d-flex justify-content-between">
                  <!--<h6 class="card-title">D1 Analysis Dashboard</h6>-->
                  <?php 
				  		//$d1rt = mysqli_query($con,"SELECT COUNT(GenericID)AS totald1_sites FROM d1_site_list");
						//$num1 = mysqli_fetch_array($d1rt); 
						//echo htmlentities($num1['totald1_sites']); display:none;
						
					?>
                </div>
				
				<!--<div id="loading">
				<img id="loading-image" src="images/ajax-loader.gif" alt="Loading..." width="450" height="350"/>
				</div>-->
				
				<table id="d1dashboard5" class="display nowrap cell-border compact table table-hover"  style="width:100%; display:none;">
				
				
				<thead>
									
					
					<tr><!-- Table Row & head-->
											
					<th style="font-size:12px;text-align:right; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;" colspan = "1" >Huawei New<th>				
					</tr>
					
					<tr>
						<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;">Category (C)</th>
						<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;font-weight:bold;">Count of Generic ID</th>
							
					</tr>
					
				</thead>
					
					
<?php 

$cnt=1;

$ttlCate_c = 0;

$Category_count_c = mysqli_query($con,"SELECT Category, count(GenericID) AS catg_Huawei_New FROM d1_site_list
WHERE vendor='Huawei_New' GROUP BY vendor, Category ORDER BY Category ASC;");
while($Cat_count_c = mysqli_fetch_array($Category_count_c)){

$Cate_c = $Cat_count_c['Category'];
$ttlCate_c = $Cat_count_c['catg_Huawei_New'];
$Ttl_Cat_count_c += $ttlCate_c;

	
?>					
				<tbody>
				
				<tr>
					<td style="font-size:11px;text-align:left; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($Cate_c) ;?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo $ttlCate_c ;?></td>
					
					
				</tr>
					
				</tbody>
										<?php 
	
										
									$cnt=$cnt+1;
										}
								//}}}}} ?>	
						
			<tfoot>									
				<tr >
							<th style="font-size:12px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;font-weight:bold;">Total</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;"><?php echo htmlentities($Ttl_Cat_count_c) ;?> </th>
				</tr>	
			</tfoot>  
					
				</table>
			
			  </div>
            
            </div>
            <!-- /.card -->
	

            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->



		  
		</div> <!-- /.row -->
      </div>    <!-- /.container-fluid -->
    </div> <!-- Main content-->
    <!-- /.content -->
  </div>  <!-- /.content-wrapper -->	
<!-- /My Code -->	


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
	
	
<script>
  $(window).on('load', function () {
    $('#loading').hide();
  }) 
</script>

</body>
</html>
<?php mysqli_close($con); } ?>