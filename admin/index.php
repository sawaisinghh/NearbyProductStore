<?php
error_reporting(0);
session_start();
include("db.php");
if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $pass=$_POST['password'];
$ret=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' and password='$pass'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="admin-dashboard.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']="*Invalid username or password";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin | Login</title>
  <link href="https://fonts.googleapis.com/css?family=Noto Sans / Serif" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
      <div class="form-box">
          <form class="admin-form" action="" method="post">
            <h2 ><span id="adm">Admin</span><span>login</span></h2>
                  <p style="color:#F00; padding-top:20px;" align="center">
                    <?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
            <div class="input-group">
                <input type="text" name="username" class="" placeholder="Username" autofocus autocomplete="off"><br>
                <input type="password" name="password" class="" placeholder="Password">               
            </div>
                 <input  name="login" id="btn" type="submit">
          </form>     
      </div>  
</body>
</html> 