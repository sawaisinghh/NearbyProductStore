<?php
    require_once "db.php";
    if(isset($_POST['submit'])) 
    {   $target = "shop-images/" .basename($_FILES['image']['name']);
        $target2 = "admin/shop-images/" .basename($_FILES['image']['name']);
        $spname = mysqli_real_escape_string($conn, $_POST['txtname']);
        $email = mysqli_real_escape_string($conn, $_POST['txtemail']);
        $password = mysqli_real_escape_string($conn, $_POST['txtpassword1']);
        $mobile = mysqli_real_escape_string($conn, $_POST['txtmobileno']);
        $category = mysqli_real_escape_string($conn, $_POST['txtcatgry']);
        $imgfile = mysqli_real_escape_string($conn, $_FILES['image']['name']);
        $lat= mysqli_real_escape_string($conn, $_POST['lat']);
	    $lon= mysqli_real_escape_string($conn, $_POST['lon']);
	    $otime= mysqli_real_escape_string($conn, $_POST['otime']);
	    $ctime= mysqli_real_escape_string($conn, $_POST['ctime']);

            if(mysqli_query($conn, "INSERT INTO shopregistration(shopname, email, password, mobile, category, opening_time, closing_time, latitude, longitude,
            	shopimage) VALUES('" . $spname . "', '" . $email . "', '" . $password . "', '" . $mobile . "', '" . $category . "', '" . $otime . "', '" . $ctime . "', '" . $lat . "', '" . $lon . "', '" . $imgfile . "')")) {
            	move_uploaded_file($_FILES['image']['tmp_name'], $target);
            	COPY($target, $target2);
             echo "<script>alert('Register successfully');</script>";
             echo "<script>window.location.assign('login.php')</script>";
             exit();
            	
            }

    }
        mysqli_close($conn);
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>registeration form</title>
	<link rel="stylesheet" href="register.css">
	<link href="https://fonts.googleapis.com/css?family=Noto Sans / Serif" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/fontawesome.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script type="text/javascript">
		function validation(form){
		var returnvalue = true;	
		var spname = formregister.txtname.value;
	    var emailid = formregister.txtemail.value;
	    var password1 = formregister.txtpassword1.value;
		var password2 = formregister.txtpassword2.value;
		var mobileno = formregister.txtmobileno.value;
		var catgry = formregister.txtcatgry.value;
		var otime = formregister.otime.value;
		var ctime = formregister.ctime.value;
		var lat = formregister.lat.value;
		var lon = formregister.lon.value;
		var imgfile = formregister.image.value;
	    if(spname == "")
		{
			returnvalue = false;
			document.getElementById("pid1").innerHTML="**your shop name can't be empty \n please try again...";
			formregister.txtname.focus();
		}
		if(emailid == "")
	    {
	    	returnvalue = false;
	    	document.getElementById("pid2").innerHTML="**please enter your email...";
	    }
	    if(password1.length < 8)
	    {
	    	returnvalue = false;
			document.getElementById("pid3").innerHTML="**your password must be atleast 8 digit\n please try again...";
			formregister.txtpassword1.value="";
			formregister.txtpassword2.value="";
			formregister.txtpassword1.focus();
	    }
	    if(password1 !== password2)
	    {
	    	returnvalue = false;
			document.getElementById("pid4").innerHTML="**your password enteries did not match\n please try again...";
			formregister.txtpassword1.value="";
			formregister.txtpassword2.value="";
			formregister.txtpassword1.focus();
	    }
	    if(isNaN(mobileno))
		{
			returnvalue = false;
			document.getElementById("pid6").innerHTML="**invalid mobile number \n please try again...";
		}
	    if(mobileno.length < 10 || mobileno.length > 10)  
		{
			returnvalue = false;
			document.getElementById("pid6").innerHTML="**invalid mobile number \n please try again...";
		}
		if(catgry == "Default")
		{   
			returnvalue = false;
			document.getElementById("pid7").innerHTML="**please select your shop category...";
		}
		if(otime == "")
		{   
			returnvalue = false;
			document.getElementById("pid8").innerHTML="**please enter your shop time...";
		}
		if(ctime == "")
		{   
			returnvalue = false;
			document.getElementById("pid8").innerHTML="**please enter your shop time...";
		}
		if(lat == "")
		{   
			returnvalue = false;
			document.getElementById("pid9").innerHTML="**please capture location...";
		}
		if(lon == "")
		{   
			returnvalue = false;
			document.getElementById("pid9").innerHTML="**please capture location...";
		}
	    if(imgfile == "")
	    {
	    	returnvalue = false;
	    	document.getElementById("pid5").innerHTML="**please upload image of your shop...";
	    }
	    return returnvalue;
	}

	function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
 document.getElementById('lat').value=  position.coords.latitude;
 document.getElementById('lon').value  = position.coords.longitude;
 alert('location is set');
 document.getElementById("pid10").innerHTML="Location captured successfully";
}
	</script>
</head>
<body>

	<div class="header-part">
		<a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
		<h2>Register your shop<img src="image/tent.png" style="width:35px; height:35px;"> here</h2>
		<p><b>Register your shop here <br>to get maximum customers locally</b></p>
	</div>
	<div class="form-container">
	<div class="form-box">
		<div class="img-container">
		    <img src="image/shop.png">
	    </div>
		<h2>REGISTER YOUR SHOP</h2>
		<form name="formregister" onsubmit="return validation(this);" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
			<div class="input-group">
			  <label>Enter shop name</label><br>
			  <input type="text" name="txtname" placeholder="Your shop name" value="">
			  <br><p id="pid1" style="color:red; font-size:13px;"></p>
		    </div>
			<div class="input-group">
			  <label>Email address</label><br>
			  <input type="email"  name="txtemail" placeholder="Your email address" value="">
			  <br><p id="pid2" style="color:red; font-size:13px;"></p>
		    </div>
		    <div class="input-group">
			  <label>Password</label><br>
			  <input type="password"  name="txtpassword1" placeholder="Your password" value="">
			  <br><p id="pid3" style="color:red; font-size:13px;"></p>
		    </div>
		    <div class="input-group">
			  <label>Confirm password</label><br>
			  <input type="password" name="txtpassword2" placeholder="Confirm password" value="">
			  <br><p id="pid4" style="color:red; font-size:13px;"></p>
		    </div>
		    <div class="input-group">
			  <label>Mobile no.</label><br>
			  <input type="text" name="txtmobileno" placeholder="Enter mobile no." value="">
			  <br><p id="pid6" style="color:red; font-size:13px;"></p>
		    </div>
		    <div class="shop-time">
		    	<label>Shop time</label><br>
		    	<label>Opening time:</label>
		    	<input type="time" name="otime" placeholder="Opening time">
		    	<label id="ctime">Closing time:</label>
		    	<input type="time" name="ctime" placeholder="Closing time">
		    	<br><p id="pid8" style="color:red; font-size:13px;"></p>
		    </div>
		    <div class="input-group">
			<label>Category</label><br>	
				
			<select name="txtcatgry">
				<option selected="" value="Default">--Select shop category--</option>
<?php
    include('db.php');
    $sql = "SELECT * FROM shopcategory";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) { ?>

                <option value="<?php echo $row['shop_category']; ?>"><?php echo $row['shop_category']; ?></option>
<?php } ?>               
			</select>
			<br><p id="pid7" style="color:red; font-size:13px;"></p>
		    </div>
		    <div class="input-group">
		      <label>Your shop address:</label>
		      <button onclick="getLocation()" type="button" id="set">capture location</button>    
			  <input type="hidden" value="" name="lat" id="lat" required>
              <input type="hidden" value="" name="lon" id="lon" required>
              <br><!-- <br><br> --><p id="pid10" style="color:green; text-align:center; font-weight:bold; float:right; font-size:13px; margin-right:5px;"></p>&nbsp;
              <p id="pid9" style="color:red; font-size:13px;"></p>
              
              </div>
              <div class="fileup">
			  <label>Upload shop image:</label>
			  <input type="file" name="image">
			  <br><p id="pid5" style="color:red; font-size:13px;"></p>
		    </div>
			<button type="submit" name="submit">REGISTER</button>
		</form>
		<p id="lgn">Already have an account? <a href="login.php">Sign in here.</a></p>
	</div>
</div>
</body>
</html>

