<?php 
error_reporting(0);
session_start();
include('db.php');
if(isset($_POST['login']))
{   
$password=$_POST['password'];
$useremail=$_POST['uemail'];
$ret= mysqli_query($conn,"SELECT * FROM shopregistration WHERE email='$useremail' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
    
$extra="welcome.php";
$_SESSION['login']=$_POST['uemail'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['action1']="*Invalid username or password";
$extra="login.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
	<link rel="stylesheet" href="login.css">
	<link href="https://fonts.googleapis.com/css?family=Noto Sans / Serif" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/fontawesome.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="form-container">
		<a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
	<div class="form-box">
		<h2><span style="color:red;">Login</span><span>Here</span></h2>
		<form name="login" action="" method="post">
			 <p style="color:#F00; padding-top:20px;" align="center">
                    <?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
			<div class="input-group">
			  <span><i class="fas fa-user"></i></span>
			  <input type="email" name="uemail" placeholder="Enter email address">
		    </div>
			<div class="input-group">
			  <span><i class="fas fa-key"></i></span>
			  <input type="password" name="password" placeholder="Enter password">
		    </div>
			<button type="submit" name="login">Login</button>
			<a href="#" id="forgt">Forgot Password</a>
		</form>
		<p id="rgs">If you have not account? <a href="register.php">Register here.</a></p>
    </div>
    </div>
</body>
</html>
