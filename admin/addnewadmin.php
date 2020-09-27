<?php
session_start();
 require_once "db.php";
// checking session is valid or not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{


    if(isset($_POST['submit'])) 
    {   
        $username =$_POST['username'];
        $email =$_POST['email'];
        $password =$_POST['password'];
        if(mysqli_query($conn, "INSERT INTO admin(username, email, password) VALUES('$username', '$email', '$password')")) {
             echo "<script>alert('Register successfully');</script>";
             header("location:admin-dashboard.php");
             exit();
            	
            }

    }
        mysqli_close($conn);  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add new admin</title>
	
	<style>
		*{
      margin:0;
      padding:0;
    }
    body{
      font-family:'Noto Sans / Serif',sans-serif;
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
      background:white;
      height:100%;
    } 
    .form-box{
      background: radial-gradient(circle, rgba(6,6,6,1) 100%, rgba(252,176,69,1) 100%);
      position: absolute;
      top: 50%;
      left: 50%;
      width: 360px;
      height:420px; 
      background-color: white;
      box-shadow: 0 10px 6px -6px black;
      padding :40px 30px;
      transform: translate(-50%,-50%);
      -ms-transform: translate(-50%,-50%);

    }
    .form-box h2{
      text-align: center;
      font-size: 27px;
      color:white;
    }
    .form-box h2 #adm{
      color:#F4D03F;
    }
    .form-box .input-group{
      margin:25px 0;
      margin-right:20px;
    }
    .form-box .input-group input{
      width: 100%;
      height: 40px;
      color: white;
      outline:none;
      border:none;
      border-radius:20px;
      border:1px solid #d47f0f;
      background-color:black;
      padding:3px 0 3px 10px;
      margin:10px;
    }
    .form-box #btn{
      margin-left:110px;
      padding:8px 20px;
      outline:none;
      border:none;
      border-radius:17px;
      color:white;
      font-weight:bold;
      font-size:20px;
      border:1px solid #d47f0f;
      background:black;
    }
    .form-box #btn:hover{
      border:1px solid red;
      cursor:pointer;
    }

	</style>
	<script type="text/javascript">
		function validation(form){
		var returnvalue = true;	
		var username = formregister.username.value;
	    var email = formregister.email.value;
	    var password = formregister.password.value;
	     if(username == "")
		{
			returnvalue = false;
			document.getElementById("pid1").innerHTML="**please write username...";
			formregister.username.focus();
		}
		if(email == "")
	    {
	    	returnvalue = false;
	    	document.getElementById("pid2").innerHTML="**please enter your email...";
	    }
	    if(password.length < 8)
	    {
	    	returnvalue = false;
			document.getElementById("pid3").innerHTML="**your password must be atleast 8 digit\n please try again...";
			formregister.password.value="";
		}
		return returnvalue
	}
</script>
</head>
	<body>
		<div class="form-box">
		    <form name="formregister" onsubmit="return validation(this);"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
		    	<h2 ><span id="adm">Addnew</span><span>admin</span></h2>
			    <div class="input-group">
			        <input type="text" name="username" placeholder="Username" value="" autofocus="" autocomplete="off">
			        <br><p id="pid1" style="color:red; font-size:13px; padding-left:8px;"></p>
		        </div>
                <div class="input-group">
			        <input type="email"  name="email" placeholder="Email" value="" autocomplete="off">
			        <br><p id="pid2" style="color:red; font-size:13px; padding-left:8px;"></p>
                </div>
		        <div class="input-group">
			        <input type="password"  name="password" placeholder="Your password" value="">
			        <br><p id="pid3" style="color:red; font-size:13px; padding-left:8px;"></p>
		        </div>
		        <button type="submit" name="submit" id="btn">REGISTER</button>
		    </form>
        </div>
	</body>
</html>
<?php } ?> 	