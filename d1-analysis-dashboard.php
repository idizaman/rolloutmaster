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
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>&nbsp;D1 Analysis Dashboard</a></li>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
           
              <!--<li class="breadcrumb-item"><a href="d1-analysis-dashboard.php">Home</a></li>-->
              <span class="breadcrumb-item active" style="color:black;"> &nbsp; <i class="fa fa-tachometer"></i> &nbsp; D1 Analysis : Dashboard</span>
        
		  
          </div><!-- /.col -->
       
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         
		 <div class="col-lg-12">
            
			<div class="card">
			<div class="card-header border-50">
                <div class="d-flex justify-content-between">
                  <!--<h6 class="card-title">D1 Analysis Dashboard</h6>-->
                  <?php 
				  		$d1rt = mysqli_query($con,"SELECT COUNT(GenericID)AS totald1_sites FROM d1_site_list");
						$num1 = mysqli_fetch_array($d1rt); 
						//echo htmlentities($num1['totald1_sites']);
						
					?>
                </div>
				
				<div id="loading">
				<img id="loading-image" src="images/ajax-loader.gif" alt="Loading..." width="450" height="350"/>
				</div>
				
				<table id="d1dashboard1" class="display nowrap cell-border compact table table-hover"  style="width:100%; display:none;">
				<!--<table id="datable_11lm" class="display  compact table  table-hover nowrap" style="width:100%;">-->
				<!--<table id="d1dashboard1" class="display table cell-border table-hover nowrap compact" style="width:100%;">-->
				
				<thead>
					<tr>
							
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" >SR</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;" ><?php echo htmlentities($ttld1site = $num1['totald1_sites']);?></th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: none;" ></th>-->
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" >Balance</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" >+</th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" >Balance</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" >+</th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Balance</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" >+</th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Working Bucket</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" >+</th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Success Rate</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" >+</th>
					</tr>
				</thead>
					
					
<?php 
$tblanalysis = mysqli_query($con,"SELECT `id`,`slno`, `Category_Name_a`, `Category_Name_b`, `Category_Name_c`, `Category_Name_d`, `Category_Name_e`,`Success_Rate`, `Equip_vendor` from d1_category_eqvendor");

$cnt=1;
while($user=mysqli_fetch_array($tblanalysis)){

$ttlCate_a = 0;
$ttlCate_b = 0;
$ttlCate_c = 0;
$ttlCate_d = 0;
$ttlCate_e = 0;

$Category_count_a = mysqli_query($con,"SELECT COUNT(`GenericID`) AS Cate_a FROM d1_site_list WHERE Category = '".($user['Category_Name_a'])."' ;");
while($Cat_count_a = mysqli_fetch_array($Category_count_a)){

$ttlCate_a = $Cat_count_a['Cate_a'];
$Ttl_Cat_count_a += $ttlCate_a;
$rest_Cat_Name_a = $ttld1site - $Ttl_Cat_count_a ;
}

$Category_count_b = mysqli_query($con,"SELECT COUNT(`GenericID`) AS Cate_b FROM d1_site_list WHERE Category = '".($user['Category_Name_b'])."' ;");
while($Cat_count_b = mysqli_fetch_array($Category_count_b)){

$ttlCate_b = $Cat_count_b['Cate_b'];
$Ttl_Cat_count_b += $ttlCate_b;
$rest_Cat_Name_b = $rest_Cat_Name_a - $Ttl_Cat_count_b;
}

$Category_count_c = mysqli_query($con,"SELECT COUNT(`GenericID`) AS Cate_c FROM d1_site_list WHERE Category = '".($user['Category_Name_c'])."' ;");
while($Cat_count_c = mysqli_fetch_array($Category_count_c)){

$ttlCate_c = $Cat_count_c['Cate_c'];
$Ttl_Cat_count_c += $ttlCate_c;
$rest_Cat_Name_c = $rest_Cat_Name_b - $Ttl_Cat_count_c;
}

$Category_count_d = mysqli_query($con,"SELECT COUNT(`GenericID`) AS Cate_d FROM d1_site_list WHERE Category = '".($user['Category_Name_d'])."' ;");
while($Cat_count_d = mysqli_fetch_array($Category_count_d)){

$ttlCate_d = $Cat_count_d['Cate_d'];
$Ttl_Cat_count_d += $ttlCate_d;
$rest_Cat_Name_d = $rest_Cat_Name_c - $Ttl_Cat_count_d;
}

$Category_count_e = mysqli_query($con,"SELECT COUNT(`GenericID`) AS Cate_e FROM d1_site_list WHERE Category = '".($user['Category_Name_e'])."' ;");
while($Cat_count_e = mysqli_fetch_array($Category_count_e)){

$ttlCate_e = $Cat_count_e['Cate_e'];
$Ttl_Cat_count_e += $ttlCate_e;
$rest_Cat_Name_e = $rest_Cat_Name_d - $Ttl_Cat_count_e;
}	
?>					
				<tbody>
				<tr>
					
					<td style="font-size:11px;text-align:left; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($user['Category_Name_a']);?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" > - <?php echo $ttlCate_a;?></td>
				<!--<td style="font-size:11px;text-align:left; vertical-align: middle;border-style: hidden;" ></td>-->
					<td style="font-size:11px;text-align:left; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($user['Category_Name_b']);?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" > - <?php echo $ttlCate_b;?></td>
				<!--<td style="font-size:11px;text-align:left; vertical-align: middle;border-style: hidden;" ></td>-->
					<td style="font-size:11px;text-align:left; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($user['Category_Name_c']);?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" > - <?php echo $ttlCate_c;?></td>
				<!--<td style="font-size:11px;text-align:left; vertical-align: middle;border-style: hidden;" ></td>-->
					<td style="font-size:11px;text-align:left; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($user['Category_Name_d']);?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" > - <?php echo $ttlCate_d;?></td>
				<!--<td style="font-size:11px;text-align:left; vertical-align: middle;border-style: hidden;" ></td>-->
					<td style="font-size:11px;text-align:left; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($Caty_Nem = $user['Category_Name_e']);?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" > - <?php echo $ttlCate_e;?></td>
				<!--<td style="font-size:11px;text-align:left; vertical-align: middle;border-style: hidden;" ></td>-->
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($succ_ret = $user['Success_Rate']);?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo sprintf('%0.2f',($ttlCate_e * $succ_ret/100)) ;?></td>
					
					
				</tr>
					</tbody>
										<?php 
										
										$Success_Ret += sprintf('%0.2f',($ttlCate_e * $succ_ret/100));
										
									$cnt=$cnt+1;	
										} ?>	
						
			<tfoot>									
				<tr >
					
					<!--<td style="font-size:11px;text-align:center; vertical-align: middle;middle;border-style: hidden;" ></td>-->
					<th style="font-size:11px;text-align:center; vertical-align: middle;font-weight: italic;" >Rest</th>
					<th style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo $rest_Cat_Name_a ;?></th>
					<!--<th style="font-size:11px;text-align:left; vertical-align: middle;border-style: hidden;" ></th>-->
					<th style="font-size:11px;text-align:center; vertical-align: middle;font-weight:  italic;" >Rest</th>
					<th style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo $rest_Cat_Name_b ;?></th>
					<!--<th style="font-size:11px;text-align:left; vertical-align: middle;border-style: hidden;" ></th>-->
					<th style="font-size:11px;text-align:center; vertical-align: middle;font-weight:  italic;" >Rest</th>
					<th style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo $rest_Cat_Name_c ;?></th>
					<!--<th style="font-size:11px;text-align:left; vertical-align: middle;border-style: hidden;" ></th>-->
					<th style="font-size:11px;text-align:center; vertical-align: middle;font-weight:  italic;" >Working Bucket</th>
					<th style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo $rest_Cat_Name_d ;?></th>
					<!--<th style="font-size:11px;text-align:left; vertical-align: middle;border-style: hidden;" ></th>-->
					<th style="font-size:11px;text-align:center; vertical-align: middle;font-weight:  italic;" >Balance (Not Assigned)</th>
					<th style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo $rest_Cat_Name_e ;?></th>
					<!--<th style="font-size:11px;text-align:left; vertical-align: middle;border-style: hidden;border-style:none" ></th>-->
					<th style="font-size:11px;text-align:center; vertical-align: middle;" >Possible :</th>
					<th style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo sprintf('%0.2f', $Success_Ret);?></th>
					
					
				</tr>	
			</tfoot>  
					
				</table>
			
			  </div>
            
            </div>
            <!-- /.card -->

           <div class="card">
              <div class="card-header">
                 
				<table id="d1dashboard2" class="display nowrap cell-border compact table table-hover stripe" style="width:100%; display:none;">
				
				<thead>
					<tr>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" >#</th>-->
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Equipment Type</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >RFAI Done</th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Active SO</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" >92%</th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Initial Stage</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" >75%</th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Feasibility Check Stage</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" >20%</th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Access not received</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" >30%</th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Lucky Case</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Optimistic Case</th>
							<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;color:#F00A7C;" >Realistic Case</th>
							
							
					</tr>
				</thead>
					
					
<?php 
$tblanalysis_b = mysqli_query($con,"SELECT `id`,`slno`,`Category_Name_a`, `Category_Name_b`, `Category_Name_c`, `Category_Name_d`, `Category_Name_e`, `Equip_vendor` from d1_category_eqvendor");
$cnt=1;

while($user_eq=mysqli_fetch_array($tblanalysis_b)){

$ttlvendorCate_a = 0;
$ttlvendorCate_b = 0;
$ttlvendorCate_c = 0;
$ttlvendorCate_d = 0;
$ttlvendorCate_e = 0;

$vendorCategory_count_a = mysqli_query($con,"SELECT COUNT(`GenericID`) AS vendorCate_a FROM d1_site_list WHERE vendor = '".($user_eq['Equip_vendor'])."' and Category = 'RFAI Done' ;");
while($vendorCat_count_a = mysqli_fetch_array($vendorCategory_count_a)){

$ttlvendorCate_a = $vendorCat_count_a['vendorCate_a'];
$Ttl_vendorCat_count_a += $ttlvendorCate_a;
}


$vendorCategory_count_b = mysqli_query($con,"SELECT COUNT(`GenericID`) AS vendorCate_b FROM d1_site_list WHERE vendor = '".($user_eq['Equip_vendor'])."' and Category = 'Active SO' ;");
while($vendorCat_count_b = mysqli_fetch_array($vendorCategory_count_b)){

$ttlvendorCate_b = $vendorCat_count_b['vendorCate_b'];

$Ttl_vendorCat_count_b += $ttlvendorCate_b;
}


$vendorCategory_count_c = mysqli_query($con,"SELECT COUNT(`GenericID`) AS vendorCate_c FROM d1_site_list WHERE vendor = '".($user_eq['Equip_vendor'])."' and Category = 'Initial Stage' ;");
while($vendorCat_count_c = mysqli_fetch_array($vendorCategory_count_c)){

$ttlvendorCate_c = $vendorCat_count_c['vendorCate_c'];

$Ttl_vendorCat_count_c += $ttlvendorCate_c;
}


$vendorCategory_count_d = mysqli_query($con,"SELECT COUNT(`GenericID`) AS vendorCate_d FROM d1_site_list WHERE vendor = '".($user_eq['Equip_vendor'])."' and Category = 'Feasibility Check Stage' ;");
while($vendorCat_count_d = mysqli_fetch_array($vendorCategory_count_d)){

$ttlvendorCate_d = $vendorCat_count_d['vendorCate_d'];

$Ttl_vendorCat_count_d += $ttlvendorCate_d;
}

$vendorCategory_count_e = mysqli_query($con,"SELECT COUNT(`GenericID`) AS vendorCate_e FROM d1_site_list WHERE vendor = '".($user_eq['Equip_vendor'])."' and Category = 'Access not received' ;");
while($vendorCat_count_e = mysqli_fetch_array($vendorCategory_count_e)){

$ttlvendorCate_e = $vendorCat_count_e['vendorCate_e'];

$Ttl_vendorCat_count_e += $ttlvendorCate_e;
}
	
?>					
				<tbody>
				<tr >
					<!--<td style="font-size:11px;text-align:center; vertical-align: middle;middle;border-style: hidden;" ><?php //echo htmlentities($user_eq['slno']);?></td>-->
					<td style="font-size:11px;text-align:left; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($user_eq['Equip_vendor']);?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" > <?php echo $ttlvendorCate_a ;?></td>
			<!--<td style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></td>-->
					<td style="font-size:11px;text-align:center; vertical-align: middle;font-weight: normal;"><?php echo $ttlvendorCate_b ;?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo sprintf('%0.2f',($ttl92p = ($ttlvendorCate_b  * 92/100))) ;?></td>
			<!--<td style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></td>-->
					<td style="font-size:11px;text-align:center; vertical-align: middle;font-weight: normal;"><?php echo $ttlvendorCate_c ;?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo sprintf('%0.2f', ($ttl75p = ($ttlvendorCate_c  * 75/100))) ;?></td>
			<!--<td style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></td>-->
					<td style="font-size:11px;text-align:center; vertical-align: middle;font-weight: normal;"><?php echo $ttlvendorCate_d ;?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo sprintf('%0.2f', ($ttl20p = ($ttlvendorCate_d  * 20/100))) ;?></td>
			<!--<td style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></td>-->
					<td style="font-size:11px;text-align:center; vertical-align: middle;font-weight: normal;"><?php echo $ttlvendorCate_e ;?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo sprintf('%0.2f', ($ttl30p = ($ttlvendorCate_e  * 30/100))) ;?></td>
			<!--<td style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></td>-->
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities( $luky_case = ($ttlvendorCate_a + $ttlvendorCate_b + $ttlvendorCate_c + $ttlvendorCate_d + $ttlvendorCate_e) );?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($Optimistic_Case = ($ttlvendorCate_a + $ttl92p + $ttl75p + $ttl20p + $ttl30p));?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;"> <?php echo htmlentities($Realistic_Case = ($ttlvendorCate_a + $ttl92p + $ttl75p));?></td>
				
					
				
				</tr>
						</tbody>
						<?php 
						
						$ttl92per += $ttl92p;
						$ttl75per += $ttl75p;
						$ttl20per += $ttl20p;
						$ttl30per += $ttl30p;
						
						$sum_luky_case += $luky_case; 
						$sum_Optimistic_Case += $Optimistic_Case;
						$sum_Realistic_Case += $Realistic_Case;
						
						$cnt=$cnt+1;
										
										} ?>	
						
		<tfoot>									
					<tr>
							<!--<td style="font-size:11px;text-align:left; vertical-align: middle;height:auto;" ></td>-->
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" >Total</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" ><?php echo $Ttl_vendorCat_count_a ;?></th>
						<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" ><?php echo $Ttl_vendorCat_count_b ;?></th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;" ><?php echo sprintf('%0.2f', $ttl92per) ;?></th>
						<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" ><?php echo $Ttl_vendorCat_count_c ;?></th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;" ><?php echo sprintf('%0.2f', $ttl75per) ;?></th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" ><?php echo $Ttl_vendorCat_count_d ;?></th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;" ><?php echo sprintf('%0.2f', $ttl20per) ;?></th>
						<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" ><?php echo $Ttl_vendorCat_count_e ;?></th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;" ><?php echo sprintf('%0.2f', $ttl30per) ;?></th>
							<!--<th style="font-size:11px;text-align:left; vertical-align: middle;height:auto;border-style: hidden;" ></th>-->
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" ><?php echo sprintf('%0.2f', $sum_luky_case) ;?></th>			
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;"  ><?php echo sprintf('%0.2f', $sum_Optimistic_Case) ;?></th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;"  ><?php echo sprintf('%0.2f', $sum_Realistic_Case) ;?></th>
							
					</tr>
		</tfoot>									
			
				
					
				</table>
		 </div>
            
            </div>
            <!-- /.card -->
			
			 
			 <!-- Start.card 3-->
			 
	 <div class="card">
              <div class="card-header">
                 
				<table id="d1dashboard3" class="display nowrap cell-border compact table table-hover stripe" style="width:50%; display:none;">
				
				<thead>
					<tr>
							
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" >Equipment Type</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" >Equipment Plan</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" >Realistic Case</th>
							<th style="font-size:12px;text-align:center; vertical-align: middle;height:auto;font-weight:bold" >+ / -</th>
							
					</tr>
				</thead>
					
					
<?php 
$tblanalysis_b_Plan = mysqli_query($con,"SELECT `id`,`slno`,`Category_Name_a`, `Category_Name_b`, `Category_Name_c`, `Category_Name_d`, `Category_Name_e`, `Equip_vendor`,`Equip_plan` from d1_category_eqvendor");
$cnt=1;

while($user_eq_Plan=mysqli_fetch_array($tblanalysis_b_Plan)){

$ttlvendorCate_a_Plan = 0;
$ttlvendorCate_b_Plan = 0;
$ttlvendorCate_c_Plan = 0;

$vendorCategory_count_a_Plan = mysqli_query($con,"SELECT COUNT(`GenericID`) AS vendorCate_a_Plan FROM d1_site_list WHERE vendor = '".($user_eq_Plan['Equip_vendor'])."' and Category = 'RFAI Done' ;");
while($vendorCat_count_a_Plan = mysqli_fetch_array($vendorCategory_count_a_Plan)){

$ttlvendorCate_a_Plan = $vendorCat_count_a_Plan['vendorCate_a_Plan'];
$Ttl_vendorCat_count_a_Plan += $ttlvendorCate_a_Plan;
}


$vendorCategory_count_b_Plan = mysqli_query($con,"SELECT COUNT(`GenericID`) AS vendorCate_b_Plan FROM d1_site_list WHERE vendor = '".($user_eq_Plan['Equip_vendor'])."' and Category = 'Active SO' ;");
while($vendorCat_count_b_Plan = mysqli_fetch_array($vendorCategory_count_b_Plan)){

$ttlvendorCate_b_Plan = $vendorCat_count_b_Plan['vendorCate_b_Plan'];

$Ttl_vendorCat_count_b_Plan += $ttlvendorCate_b_Plan;
}


$vendorCategory_count_c_Plan = mysqli_query($con,"SELECT COUNT(`GenericID`) AS vendorCate_c_Plan FROM d1_site_list WHERE vendor = '".($user_eq_Plan['Equip_vendor'])."' and Category = 'Initial Stage' ;");
while($vendorCat_count_c_Plan = mysqli_fetch_array($vendorCategory_count_c_Plan)){

$ttlvendorCate_c_Plan = $vendorCat_count_c_Plan['vendorCate_c_Plan'];

$Ttl_vendorCat_count_c_Plan += $ttlvendorCate_c_Plan;
}


?>					
				<tbody>
					
				
				<tr >
					
					<td style="font-size:11px;text-align:right; vertical-align: middle;font-weight: normal;" ><?php echo htmlentities($user_eq_Plan['Equip_vendor']);?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;" ><?php echo htmlentities($Eq_plan = $user_eq_Plan['Equip_plan']);?></td>
			
					<?php 
					//Calculation for Realistic Case
					
					sprintf('%0.2f',($ttl92p = ($ttlvendorCate_b_Plan  * 92/100)));
					sprintf('%0.2f', ($ttl75p = ($ttlvendorCate_c_Plan  * 75/100)));
					
					?>
					<td style="font-size:11px;text-align:center; vertical-align: middle;"> <?php echo htmlentities ($Realis_Case = ($ttlvendorCate_a_Plan + $ttl92p + $ttl75p));?></td>
					<td style="font-size:11px;text-align:center; vertical-align: middle;"> <?php echo htmlentities ($Plan_deviation = ($Realis_Case - $Eq_plan));?></td>
				
				</tr>
				
						</tbody>
						<?php 
						
						$Equipment_plan += $Eq_plan;
						$sum_Realis_Case += $Realis_Case;
						$sum_Plan_deviation += $Plan_deviation;
						
						$cnt=$cnt+1;
										
							} ?>	
						
		<tfoot>									
					<tr>
							
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" >Total</th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;" ><?php echo htmlentities($Equipment_plan);?></th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;height:auto;color:#F00A7C;"  ><?php echo sprintf('%0.2f', $sum_Realis_Case) ;?></th>
							<th style="font-size:11px;text-align:center; vertical-align: middle;"> <?php echo htmlentities($sum_Plan_deviation);?></th>
					
					</tr>
		</tfoot>									
			
				
					
				</table>
		 </div>
            
            </div>		 
			 
			 <!-- End .card -->
			
          </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        
				
		</div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div> <!-- Main content-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->	
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