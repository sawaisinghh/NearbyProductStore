<?php
session_start();
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
}
include('db.php');
$id=$_GET['id'];
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['update']))
{ 
  $spname = $_POST['txtname'];
  $email = $_POST['txtemail'];
  $mobile = $_POST['txtmobileno'];
  $category =$_POST['txtcatgry'];
  $lat = $_POST['lat'];
  $lon = $_POST['lon'];
  $optime = $_POST['otime'];
  $cltime = $_POST['ctime'];
  $sql = "UPDATE shopregistration SET shopname='$spname', email='$email', mobile='$mobile', category='$category', opening_time='$optime', closing_time='$cltime', latitude='$lat', longitude='$lon' WHERE id = $id";

if (mysqli_query($conn, $sql)) {   
    echo "<script>alert('profile updated successfully');</script>";
    echo "<script>window.location.assign('welcome.php')</script>";
} else {
    echo "<script>alert('profile not updated');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <link href="https://fonts.googleapis.com/css?family=Noto Sans / Serif" rel="stylesheet">
  <script type="text/javascript">
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
 document.getElementById("pid").innerHTML="Location captured successfully";
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
      width:100%;
      height:100%;
    }   
    h2{
      text-align: center;
      margin:37px auto 10px;
    } 
    .form-container{
      width:100%;
      height:auto;
      padding:20px 10px 30px 10px;
    }
    .form-box{
      width:100%;
      max-width: 500px;
      box-shadow: 0 10px 6px -6px #808B96;
      border-radius:3px;
      margin:40px auto 0;
      background:white;
      padding:50px 40px;
    }
    .form-box .input-group{
      margin:25px auto;
    }
    .form-box .input-group input{
      width: 100%;
      height: 30px;
      outline:none;
      border:1px solid #D6DBDF;
      padding:3px 0 3px 10px;
    }
    .form-box .input-group label{
      color:#454545;
      margin:0 0 4px 2px;
      font-size: 13px;
    }
    .form-box .input-group select{
      border:1px solid #D6DBDF;
    }
    .form-box .input-group #set{
      padding:3px 10px;
      border:none;
      outline:none;
      float:right;
      border:1px solid #2E86C1;
      color:#2E86C1;
      border-radius:2px;
      margin-left:10px;

    }
    .form-box .input-group #set:hover{
      color:white;
      background:#2E86C1;
    }
    .form-box #submit{
      padding:10px 20px;
      border:none;
      border-radius:2px;
      font-weight: bold;
      cursor:pointer;
      background-color:red;
      color:#fff;
    }
    .form-box #submit:hover{
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
  <h2><span style="color:red;">Edit Your</span><span> Profile</span></h2>
  <div class="form-container"> 
  <div class="form-box">

  <form action="" method="post" enctype="multipart/form-data">   
      <div class="input-group">

<?php

$sql = "SELECT * FROM shopregistration WHERE id = $id";
$result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

?> 
     
        <label>Enter shop name</label><br>
        <input type="text" name="txtname" placeholder="Your shop name" value="<?php echo $row['shopname']; ?>">
      </div> 
      <div class="input-group">
        <label>Email address</label><br>
        <input type="email"  name="txtemail" placeholder="Your email address" value="<?php echo $row['email']; ?>">
      </div> 
      <div class="input-group">
        <label>Mobile no.</label><br>
        <input type="text" name="txtmobileno" placeholder="Enter mobile no." value="<?php echo $row['mobile']; ?>">
        </div> 
        <div class="shop-time">
          <label>Shop time</label><br>
          <label>Opening time:</label>
          <input type="time" name="otime" placeholder="Opening time" value="<?php echo $row['opening_time']; ?>">
          <label id="ctime">Closing time:</label>
          <input type="time" name="ctime" placeholder="Closing time" value="<?php echo $row['closing_time']; ?>">
        </div> 
        <div class="input-group">
          <label>Category</label><br>
          <select name="txtcatgry">
            <option selected="" value="<?php echo $row['category']; ?>">--Select shop category--</option>
            <option value="General Store">General Store</option>
            <option value="Electronic Store">Electronic Store</option>
            <option value="Grocery Store">Grocery Store</option>
            <option value="Jwellary Store">Jwellary Store</option>
            <option value="Fancy Store">Fancy Store</option>
            <option value="Dairy">Dairy</option>
            <option value="Cloth Store">Cloth Store</option>
            <option value="Hardware Store">Hardware Store</option>
            <option value="Stationary">Stationary</option>      
            <option value="Medical Store">Medical Store</option>
          </select>
        </div> 
        <div class="input-group">
          <label>Your shop address:</label>
          <button onclick="getLocation();" type="button" id="set">capture location</button>    
          <input type="hidden" value="<?php echo $row['latitude']; ?>" name="lat" id="lat" required>
          <input type="hidden" value="<?php echo $row['longitude']; ?>" name="lon" id="lon" required>
          <br><p id="pid" style="color:green; margin-top:3px; text-align:right; font-weight:bold; font-size:13px;"></p>
        </div>
        <button type="submit" id="submit" name="update">UPDATE</button>
        <span onclick="window.location.assign('welcome.php');">Cancel</span>
  </form> 
 </div> 
 </div>  
</body>
</html>