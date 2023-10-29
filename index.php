<?php
session_start();
error_reporting(0);
//include('includes/config.php');
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $loginid=$_POST['loginid'];
	$password=$_POST['password'];
    $query=mysqli_query($con,"select id,password from tbluser where loginid='$loginid' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    
	if($ret>0){
        $_SESSION['osemsuid']=$ret['id'];
		
		//$extra="profile.php";//
      $extra="user-profile.php";//
      //$extra="change-mypassword.php";//
	$_SESSION['login']=$_POST['loginid'];
	$_SESSION['id']=$ret['id'];
	$host=$_SERVER['HTTP_HOST'];
	//$uip=$_SERVER['REMOTE_ADDR']; // Obtains the IP address
	$uip=$_SERVER['HTTP_CLIENT_IP']?$_SERVER['HTTP_CLIENT_IP']:($_SERVER['HTTP_X_FORWARDED_FOR']?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);	// Obtains the IP address
	$computername=gethostbyaddr($_SERVER['REMOTE_ADDR']);   // Obtains the "remote host", which, on an intranet is the computer's name
	$status=1;
$log=mysqli_query($con,"insert into userlog_roc(UserId,username,userip,remotehost,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$computername','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();	
	}
    else{
		$_SESSION['login']=$_POST['loginid'];	
	//$uip=$_SERVER['REMOTE_ADDR']; // Obtains the IP address
	$uip=$_SERVER['HTTP_CLIENT_IP']?$_SERVER['HTTP_CLIENT_IP']:($_SERVER['HTTP_X_FORWARDED_FOR']?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);
	$status=0;
	mysqli_query($con,"insert into userlog_roc(username,userip,remotehost,status) values('".$_SESSION['login']."','$uip','$computername','$status')");	
    $msg="Oops!! -> Invalid Login Details.";
	$extra="index.php";//
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Rollout Master - Login</title>
	<meta name="description" content="this is the OS employee attendence mangement system." />
 <!-- Bootstrap CSS -->
	
	<link rel="stylesheet" href="dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="dist/css/bootstrap-responsive.min.css"type="text/css">
	
	<link rel="stylesheet" href="dist/css/styles.css" type="text/css"/>
	
	<link rel="stylesheet" href="dist/css/table-responsive.css"/>
	<link rel="stylesheet" href="dist/css/owl.carousel.min.css">
    <link rel="stylesheet" href="dist/css/slicknav.min.css">
	<link rel="stylesheet" href="dist/css/font-awesome.css"/>
    <link rel="stylesheet" href="dist/css/typography.css">  
<!--<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>-->
	<link rel="stylesheet" href="dist/css/pace-theme-flash.css"  type="text/css" media="screen"/>
	<link href="dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<link href="dist/css/animate.min.css" rel="stylesheet" type="text/css"/>




<style type="text/css">
body {
  background-color: light grey;
}

select:focus{
    border-color: green;
    outline:none;
}

.button333 {
  background-color: #F00A7C;
  
       
       border-color: #8e2889;
    }
 
.btn-info {
		background: #03e9f4;
        background-color: #F00A7C;
        color: #FFFFFF;
        border-color: #F00A7C;
        border-radius: 10px;
    }

 .btn-info:hover,
    .btn-info:focus,
    .btn-info:active    {

	    background-color: #F00A7C;
        color: #FFF;
        border-color : solid #F00A7C;
		  box-shadow: 	0 0 5px #F00A7C,
						0 0 25px #F00A7C,
						0 0 50px #F00A7C,
						0 0 100px #F00A7C;
    }

.form-info:hover,
    .form-info:focus,
    .form-info:active {
   
		  box-shadow: 	0 0 5px rgba(240,10,124, 2);
    }

html {
        overflow: auto;
}

/* Hide scrollbar for Chrome, Safari and Opera */
.example::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE and Edge */
.example {
  -ms-overflow-style: none;
}

 .content, .outer-border {
                width: 240px;
                height: 150px;
                text-align:justify;
                background-color:green;
                color:white;
                padding-left:10px;
                padding-right:10px;
            }
            .outer-border {
                border: 2px solid black;
                position: relative;
                overflow: hidden;
            }
            .inner-border {
               -ms-overflow-style: none;  /* IE and Edge */
				scrollbar-width: none;  /* Firefox */
             
               
            }
            .inner-border::-webkit-scrollbar {
             display: none;
				
            }
			
			.div-1 {
  width:100%;
  height:100%;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.16), 0 4px 6px rgba(0,0,0,0.45);
  border-radius: 10px;
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


.w3-spin{animation:w3-spin 2s infinite linear}@keyframes w3-spin{0%{transform:rotate(0deg)}100%{transform:rotate(359deg)}}



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

@keyframes example {
  from {top: 200px;}
  to {top: 0px;}
  0%   {background-color: red;}
  20% {background-color: orange;}
  35%  {background-color: yellow;}
  50%  {background-color: blue;}
  75% {background-color: #F00A7C;}
  100% {background-color:;}


@keyframes example
{from{transform:scale(0)} 
to{transform:scale(1)}}

</style>


</head>
<body>

<!--<h4 align="center" class="footer text-center" style="color:black;">ISM, RO</h4>-->
<div align="center" style="border: 1px solid #F00A7C;border-right: none;border-left: none; border-top: none;margin-top:auto; margin-bottom:auto;margin-left:2px;">
         
 <br />	
 <br />	
	

<div class="container" >	
	<div class="row ">
	
<div class="col-md-auto col-md-offset-auto" style="width:380px;overflow-y: hidden;" id="container">
	
		
			<div class="panel panel-default div-1" style="green-space:nowrap; width:100%;">
				<div class="panel-heading" align="left"><img src="images/cell-towerb.png" alt="rollout" style="width:55px;height:45px;" ><font face="Arial" size="3" text-align="center" vertical-align="middle" >&nbsp;&nbsp;<b>Rollout Master,&nbsp;ISM</b></font></div>
				
				<div class="panel-body login-box " align="center" style="green-space:nowrap; width:100%;">
					<p style="font-size:14px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
					<form  role="form" action="" method="post" id="" name="login">
						
						<div class="panel-body table ">
						<table class="table table-info " style="green-space:nowrap; width:100%;">
						
														
						  <div class="form-group has-feedback div-1">
								<input class="form-control form-info" placeholder="Login ID" name="loginid" type="loginid" autofocus="" required="true"/>
								<span class="glyphicon glyphicon-user form-control-feedback" style="text-align:center; height:auto;"></span>
							</div>
							
							
							<div class="form-group has-feedback div-1">
							<input class="form-control form-info" placeholder="Password" name="password" type="password"  required="true"/>						
							<span class="glyphicon glyphicon-lock form-control-feedback" style="text-align:center; height:auto;"></span>
							</div>
							
							<!--<span class="glyphicon glyphicon-lock form-control-feedback" align="center"><i data-feather="eye-on"></i></span>-->
							<!--</div>--    <span></span>
      <span></span>
      
      Submit form-control btn btn-info button1-->

  
   									
									
							<div class="form-group has-feedback">
							
								<button type="submit" value="login" name="login" class="form-control btn btn-info button1 div-1" style="text-align:center; vertical-align: middle;width:95px;height:38px;pxfont-size:14px;"><span class="glyphicon glyphicon-user"></span> Log Me In  &nbsp;<i class="fa fa-sign-in fa-arrow-right"></i></button>
								
							</div>
													
							
					
							</table>
						</div>
							
					</form>
					
										
					
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	</div>
			
		<!-- /Main Wrapper -->
	   <!--</div>/#footer-->
	   
<br />
<br />
<br />
<br />
<br />
<br />
	  </div>


<p class="text-center" style="font-size:12px; color:black; float:center; margin-top:auto; margin-bottom:auto; line-height: auto;"><i class="fa fa-spinner w3-spin" style="font-size:14px"></i> Application Design & Development: <a href="" style="background:;position: relative; animation-name: example;animation-duration:4s;animation-fill-mode:forwards;font-size:13px;"><strong>S. M. Idizaman</strong></a> &nbsp; <i class="fa fa-phone-square"></i> +8801962424698 &nbsp; <i class="fa fa-envelope" aria-hidden="true"></i> sm.idizaman@banglalink.net &nbsp;|&nbsp;ISM ,<a href="#" class="text-dark"> RSG V.1.0.0 | Y-<?php echo date("Y");?>&nbsp;</a></p>
	
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    
    <script src="dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Owl JavaScript -->
    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>

 
    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
    <script src="dist/js/login-data.js"></script>

</body>


</html>
<?php mysqli_close($con); ?>
