  <?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['osemsuid']==0)) {
  header('location:logout.php');
  } else{
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime=date('Y-m-d H:i:s', time ());

 
 //Change password code
if(isset($_POST['pwsubmit']))
{
//$loginid=$_SESSION['osemsuid'];
$usrid=$_GET['myprid'];
$newpassword=($_POST['newpassword']);

if(empty($_POST['newpassword'])) {
       echo "<script>alert('Password cannot be empty.');</script>";   
    } else {
$ret=mysqli_query($con,"update tbluser set password='$newpassword', LastPassUpdate='$currentTime' where id='$usrid'");
echo "<script>alert('Password Reset Successfully.');</script>";   
echo "<script>window.location.href='user-pwreset-osems.php'</script>";
} 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Reset Password - Rollout Maser</title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
<style>
   
	.button3:hover, focus {background:#F00A7C; background-color: #F00A7C;}
 
 	.form-info:hover,focus,active { box-shadow: 0 0 5px rgba(240,10,124, 2);}
</style> 

<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   
</script>  

  
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
				<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>&nbsp;User Management</a></li>
				<li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                </ol>
            </nav>
			
			
			
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <!--<div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Change Password</h4>
                </div>-->
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
<section class="hk-sec-wrapper">

<div class="row" style="border-top: 1px solid #F00A7C;border-right: 1px solid #F00A7C; border-left: 1px solid #F00A7C;border-bottom: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">
<div class="col-sm">



<form class="needs-validation" method="post" name="changepassword" novalidate onsubmit="return checkpass();" >
 
<div class="form-row">
<div class="col-md-12 mb-10">
<span class="fa-passwd-reset fa-stack">
  <i class="fa fa-undo fa-stack-2x"></i>
  <i class="fa fa-lock fa-stack-1x"></i>
</span> &nbsp; Reset Password :
</div>
</div>

<div class="col-md-10 mb-0">

<div class="form-row col-md-6 mb-10" style="border: 1px solid grey; margin-top:auto; margin-bottom:auto; color:#F00A7C" >
<div class="col-md-12 mb-10">
<label for="validationCustom03">New Password :</label>
<input type="password" class="form-control form-info" id="newpassword" placeholder="New Passsword" name="newpassword" required>
<div class="invalid-feedback">Please provide  new password.</div>
</div>
<!--</div>-->

<!--<div class="form-row col-md-6 mb-10" style="border: 1px solid grey; margin-top:auto; margin-bottom:auto; color:orange; border-bottom-right-radius:30px;" >-->
<div class="col-md-12 mb-10">
<label for="validationCustom03">Confirm Password :</label>
<input type="password" class="form-control form-info" id="confirmpassword" placeholder="Confirm Passsword" name="confirmpassword" required>
<div class="invalid-feedback">Please provide  confirm password.</div>
</div>
</div>
 </div>                                
<div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                         <!--<button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit">Save Change</button>-->
																		 <button class="form-control btn btn-primary button3" style="width:100px;" type="submit" name="pwsubmit">Save Change</button>&nbsp;&nbsp;
																																				
																		<a href="user-pwreset-osems.php" data-toggle="tooltip" data-original-title="Entry Cancel / Exit This Page" type="button" class="form-control btn btn-primary " onClick="return confirm('Are you sure you want to exit the Page?.');" style="width:100px;font-size:14px;font-style: normal; font-variant: normal;text-align:center; vertical-align: middle;">Cancel</a>
																		
                                                                        </div>
                                                                    </div>
																	<br>
																	<br>
</form>
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

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
    <script src="dist/js/validation-data.js"></script>

</body>
</html>
<?php } ?>