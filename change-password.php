<?php
session_start();
error_reporting(0);
include'db.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

 // for  password change   
if(isset($_POST['change']))
{
$oldpassword=$_POST['oldpass'];
$sql=mysqli_query($conn,"SELECT password FROM shopregistration where password='$oldpassword'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$shopid=$_SESSION['id'];
$newpass=$_POST['newpass'];
 $ret=mysqli_query($conn,"update shopregistration set password='$newpass' where id='$shopid'");
    echo "<script>alert('Password changed successfully');</script>";
    echo "<script>window.location.assign('welcome.php')</script>";
}
else
{
    echo "<script>alert('Old Password not match !!');</script>";
    echo "<script>window.location.assign('change-password.php')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<script type="text/javascript">
  		function validation(form){
  			var returnvalue = true;	
		    var oldpass = changepass.oldpass.value;
	        var newpass = changepass.newpass.value;
	        var cpass = changepass.cpass.value;
	        if(oldpass == "")
	        {
	    	    returnvalue = false;
	    	    document.getElementById("pid1").innerHTML="**please enter your old password...";
	        }
	        if(newpass.length < 8)
	        {
	    	    returnvalue = false;
			    document.getElementById("pid2").innerHTML="**your password must be atleast 8 digit\n please try again...";
			    changepass.newpass.value="";
			    changepass.cpass.value="";
			    changepass.newpass.focus();
	        }
	        if(newpass !== cpass)
	        {
	    	returnvalue = false;
			document.getElementById("pid3").innerHTML="**your password enteries did not match\n please try again...";
			    changepass.newpass.value="";
			    changepass.cpass.value="";
			    changepass.newpass.focus();	
	        }
	        return returnvalue;
  		}
  	</script>
  	<style type="text/css">
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
    }
    body{
    font-family:'Noto Sans / Serif',sans-serif;
    background-position: center;
    background-size: cover;
    background-color: #E5E8E8;
    height:100%;
    width: 100%;
    } 

    h2{
      text-align: center;
      margin:40px 0;
    }   
    .form-container{
      width:100%;
      height:auto;
      padding:10px 10px 30px 10px;
    }
    .form-box{
      width:100%;
      max-width: 500px;
      box-shadow: 0 10px 6px -6px #808B96;
      border-radius:3px;
      margin:30px auto 0;
      background:white;
      padding:50px 40px;

    }
    .form-box .input-group{
      margin:25px auto;
    }
    .form-box .input-group input{
      width: 100%;
      height: 35px;
      outline:none;
      border:1px solid #D6DBDF;
      padding:3px 0 3px 10px;
    }
    .form-box .input-group label{
      color:#454545;
      margin:0 0 4px 2px;
      font-size: 13px;
    }
    .form-box .input-group textarea{
      padding: 10px;
      outline: none;
    }
    .form-box button{
      padding:10px 20px;
      border:none;
      border-radius:2px;
      font-weight: bold;
      cursor:pointer;
      background-color:red;
      color:#fff;
    }
    .form-box button:hover{
      opacity:0.9;
    }
    .form-box span{
      float:right;
      font-size:15px;
      color: #A6ACAF;
      cursor:pointer;
      margin-top:10px;
    }
    </style>
  </head>
  <body>
  	<h2><span style="color:red;">Change</span><span> Password</span></h2>
    <div class="form-container">
    <div class="form-box">
    	<form name="changepass" onsubmit="return validation(this);" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">   
            <div class="input-group">
            	<label for="password">Old password</label>
                <input type="password" placeholder="Old password" name="oldpass" value=""><br>
                <p id="pid1" style="color:red; font-size:13px;"></p>
            </div>
            <div class="input-group">
                <label for="password">New password</label>
                <input type="password" placeholder="New password" name="newpass" value=""><br>
                <p id="pid2" style="color:red; font-size:13px;"></p>
            </div>
            <div class="input-group">
                <label for="password">Confirm new password</label>
                <input type="password" placeholder="Confirm new password" name="cpass" value=""><br>
                <p id="pid3" style="color:red; font-size:13px;"></p>
            </div>
                <button type="submit" name ="change">Change</button>
                <span onclick="window.location.assign('welcome.php');">Cancel</span>
        </form>
    </div>
    </div>
  </body>
</html>
<?php } ?>