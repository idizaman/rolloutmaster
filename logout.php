<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//$userid=$_SESSION['osemsuid']=="";
$_SESSION['login']=="";
date_default_timezone_set('Asia/Dhaka');
$ldate=date( 'Y-m-d H:i:s', time () );
mysqli_query($con,"UPDATE userlog_roc  SET logout = '$ldate' WHERE username = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
session_unset();
session_destroy();
//$_SESSION['login']="You have successfully logout";

//$msg="You have successfully logout";
//header('location:index.php');

?>
<script language="javascript">
document.location="index.php";
</script>
