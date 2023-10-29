<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
if (strlen($_SESSION['osemsuid']==0)) {
 header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $userid=$_SESSION['osemsuid'];
	$osemployeeID=$_POST['employeeID'];
    $fullname=$_POST['fullname'];
	$Design=$_POST['desi'];
	$email=$_POST['email'];
    $mobno=$_POST['contactnumber'];
 

     $query=mysqli_query($con, "update tbluser set employeeID='$osemployeeID',FullName='$fullname', Designation='$Design', Email='$email', MobileNumber='$mobno' where id='$userid'");
    if ($query) {
    //$msg="User profile has been updated.";
	
	echo "<script>alert('User details updated successfully.');</script>";   
	echo "<script>window.location.href='user-profile.php'</script>";
	
  }
  else
    {
      //$msg="Something Went Wrong. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>User profile - Rollout Master</title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
	<meta http-equiv="refresh" content="600; url="<?php echo $_SERVER['PHP_SELF']; ?>" />
	<meta http-equiv="refresh" content="900;url=logout.php"/>

<style type="text/css">
.btn-save {
		background: #03e9f4;
        background-color: #F00A7C;
        color: #FFFFFF;
        border-color: #F00A7C;
        border-radius: 10px;
    }

 .btn-save1:hover,
    .btn-info:focus,
    .btn-info:active    {
		background-color: #F00A7C;
        color: #FFF;
        border-color : solid #F00A7C;
		box-shadow:  	0 0 5px #F00A7C,
						0 0 25px #F00A7C,
						0 0 50px #03e9f4,
						0 0 100px #F00A7C;
    }
	
	.form-info:hover,
    .form-info:focus,
    .form-info:active {
   
		  box-shadow: 	0 0 5px rgba(240,10,124, 2);
    }
	
@-moz-keyframes bounceDown {
  0%, 20%, 50%, 80%, 100% {
    -moz-transform: translateY(0);
    transform: translateY(0);
  }
  40% {
    -moz-transform: translateY(-30px);
    transform: translateY(-30px);
  }
  60% {
    -moz-transform: translateY(-15px);
    transform: translateY(-15px);
  }
}
@-webkit-keyframes bounceDown {
  0%, 20%, 50%, 80%, 100% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  40% {
    -webkit-transform: translateY(-30px);
    transform: translateY(-30px);
  }
  60% {
    -webkit-transform: translateY(-15px);
    transform: translateY(-15px);
  }
}
@keyframes bounceDown {
  0%, 20%, 50%, 80%, 100% {
    -moz-transform: translateY(0);
    -ms-transform: translateY(0);
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  40% {
    -moz-transform: translateY(-30px);
    -ms-transform: translateY(-30px);
    -webkit-transform: translateY(-30px);
    transform: translateY(-30px);
  }
  60% {
    -moz-transform: translateY(-15px);
    -ms-transform: translateY(-15px);
    -webkit-transform: translateY(-15px);
    transform: translateY(-15px);
  }
}





@-webkit-keyframes bounceLeft {
  0%,
  20%,
  50%,
  80%,
  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
  40% {
    -webkit-transform: translateX(30px);
    transform: translateX(30px);
  }
  60% {
    -webkit-transform: translateX(15px);
    transform: translateX(15px);
  }
}
@-moz-keyframes bounceLeft {
  0%,
  20%,
  50%,
  80%,
  100% {
    transform: translateX(0);
  }
  40% {
    transform: translateX(30px);
  }
  60% {
    transform: translateX(15px);
  }
}
@keyframes bounceLeft {
  0%,
  20%,
  50%,
  80%,
  100% {
    -ms-transform: translateX(0);
    transform: translateX(0);
  }
  40% {
    -ms-transform: translateX(30px);
    transform: translateX(30px);
  }
  60% {
    -ms-transform: translateX(15px);
    transform: translateX(15px);
  }
}
/* /left bounce */


/* right bounce */
@-webkit-keyframes bounceRight {
  0%,
  20%,
  50%,
  80%,
  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
  40% {
    -webkit-transform: translateX(-30px);
    transform: translateX(-30px);
  }
  60% {
    -webkit-transform: translateX(-15px);
    transform: translateX(-15px);
  }
}
@-moz-keyframes bounceRight {
  0%,
  20%,
  50%,
  80%,
  100% {
    transform: translateX(0);
  }
  40% {
    transform: translateX(-30px);
  }
  60% {
    transform: translateX(-15px);
  }
}
@keyframes bounceRight {
  0%,
  20%,
  50%,
  80%,
  100% {
    -ms-transform: translateX(0);
    transform: translateX(0);
  }
  40% {
    -ms-transform: translateX(-30px);
    transform: translateX(-30px);
  }
  60% {
    -ms-transform: translateX(-15px);
    transform: translateX(-15px);
  }
}
/* /right bounce */


/* assign bounce */
.fa-arrow-right {
  -webkit-animation: bounceRight 2s infinite;
  animation: bounceRight 2s infinite;
  float:right;
}

.fa-arrow-left {
  -webkit-animation: bounceLeft 2s infinite;
  animation: bounceLeft 2s infinite;
}

.fa-chevron-down {
  -moz-animation: bounceDown 2s infinite;
  -webkit-animation: bounceDown 2s infinite;
  animation: bounceDown 2s infinite;
text-align:center;
  display:block;
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
                <!--<ol class="breadcrumb breadcrumb-light bg-transparent">-->
				 <ol class="breadcrumb breadcrumb-dark black bg-dark" style="border: 1px solid #F00A7C">
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>&nbsp;Profile</a></li>
					<li class="breadcrumb-item active" aria-current="page">My Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
				
				
                 <!--<div class="hk-pg-header">-->
                    <!--<h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Update Profile<span style="font-size:12px; color:solid" align="center"> &nbsp;( Update profile if the information is incorrect.)</span></h4>-->
					
				 <!-- </div>-->
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
				
                    <div class="col-xl-12">
		
<section class="hk-sec-wrapper">
		
<!--<div class="row" style="border-top: 1px solid #F00A7C;border-right: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">-->
<div class="" style="border: 1px solid #F00A7C;border-right: 1px solid #F00A7C; margin-top:auto; margin-bottom:auto;margin-left:auto; margin-right:auto;">
	
<div class="col-sm">
						
							<form role="form" class="needs-validation" method="post" novalidate>		

<div class="form-row">
<div class="col-md-12 mb-10">
<span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span><label><font face="arial" size="4">&nbsp;<b>My Profile</b></font></span><font style="font-size:12px; color:#F00A7C">&nbsp;(Update profile if the information is Incorrect or Incomplete.)</font><i class="fa fa-arrow-left"></i></label>
</div>
</div>

<?php
$userid=$_SESSION['osemsuid'];
$query=mysqli_query($con,"select employeeID,FullName,Email,MobileNumber,RegDate,LastPassUpdate,Designation,status from tbluser where id='$userid'");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>


<div class="form-row gt-2">
<div class="col-md-7 mb-0 mt-0">
<label for="validationCustom03"> Reg. Date:</label><font face="Calibri Light" size="2">
<?php echo $row['RegDate'];?></font>
<!--</div>
<!--</div>-->
<?php if($row['RegDate']!=""){?>&nbsp;
<!--<div class="form-row">
<div class="col-md-6 mb-10">-->
<label for="validationCustom03">||  Last Update:</label><font face="Calibri Light" size="2">
<?php echo $row['LastPassUpdate'];?></font>
</div>
</div>
<?php } ?>


<div class="form-row">
<div class="col-md-7 mb-10">
<span class="fa-stack fa-sm" style="color:#F00A7C;">
<i class="fa fa-file fa-stack-1x"></i>
<i class="fa-stack-1x fa-inverse">#</i>

</span>
<label for="validationCustom03"> Employee ID :</label><span style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;color:#F00A7C;"> (Non editable input field)</span>
<input type="text" class="form-control form-info" id="validationCustom03" value="<?php echo $row['employeeID'];?>" name="employeeID"  required readonly readonly="true">
<div class="invalid-feedback">Please provide a valid  name.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-7 mb-10">
<span class="fa-stack fa-sm" style="color:#F00A7C;">
<i class="fa fa-chevron-down fa-stack-1x"></i>
<i class="fa-stack-1x fa-inverse"></i>
</span>
<label for="validationCustom03"> Full Name :</label>
<input type="text" class="form-control form-info" id="validationCustom03" value="<?php echo $row['FullName'];?>" name="fullname"  required autofocus>
<div class="invalid-feedback">Please provide a valid  name.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-7 mb-10">
<span class="fa-stack fa-sm" style="color:#F00A7C;">
<i class="fa fa-user fa-stack-1x"></i>
<i class="fa-stack-1x fa-inverse">--</i>
</span>
<label for="validationCustom03"> Designation : </label><span style="text-align:center; vertical-align: middle;height:auto;width:auto;font-size:11px;color:red;"> (Do not write anything on it except Designation.)</span>
<input type="text" class="form-control form-info" id="validationCustom03" value="<?php echo $row['Designation'];?>" name="desi" required> 
</div> 
</div>

<div class="form-row">
<div class="col-md-7 mb-10">
<span class="fa-stack fa-sm" style="color:#F00A7C;">
<i class="fa fa-envelope fa-stack-1x"></i>
<i class="fa-stack-1x fa-inverse"></i>
</span>
<label for="validationCustom03">E-mail :</label>
<input type="email" class="form-control form-info" id="validationCustom03" value="<?php echo $row['Email'];?>" name="email" required>
<div class="invalid-feedback">Please provide a valid  E-mail id.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-7 mb-10">
<span class="fa-stack fa-sm" style="color:#F00A7C;">
<i class="fa fa-phone fa-stack-1x"></i>
<i class="fa-stack-1x fa-inverse"></i>
</span>
<label for="validationCustom03"> Mobile Number :</label>
<input type="text" class="form-control form-info" id="validationCustom03" value="<?php echo $row['MobileNumber'];?>" required name="contactnumber" maxlength="11">
<div class="invalid-feedback">Please provide a valid  mobile number.</div>
</div>
</div>



<?php } ?>
                                 
<!--<button class="btn btn-primary btn-block btn-flat" type="submit" name="submit">Update</button>-->

<!--<div class="login-horizental cancel-wp pull-left">
<!--<button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit">Save Change</button>-->
<!--<button class="btn btn-primary btn-block btn-flat" type="submit" name="submit">Save Change</button>
</div>-->

<div class="form-row">
<div class="col-md-6 mb-10">
 <div class="form-group pull-left">
<label></label>
<button  class="form-control btn btn-primary btn-save1" type="submit" name="submit" style="width:100px; position: relative; margin-left:1%;margin-top:-35%;">Save Change</button>

</div>

</div>
</div>


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

       <!-- /HK Wrapper -->

    <!-- jQuery -->
    <!--<script src="dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
	<!--<script src="dist/js/popper.min.js"></script>
    <!--<script src="dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <!--<script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <!--<script src="dist/js/dropdown-bootstrap-extended.js"></script>

 <!-- Owl JavaScript -->
    <!--<script src="dist/owl.carousel.min.js"></script>
 
     <!-- FeatherIcons JavaScript -->
    <!--<script src="dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <!--<script src="dist/js/init.js"></script>
    <script src="dist/js/login-data.js"></script>-->
	
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