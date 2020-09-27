<?php
error_reporting(0);
session_start();
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    include('db.php');  
$id=$_GET['id'];
$idd = $_SESSION['id'];
    // sql to delete a product
$sql = "DELETE FROM product WHERE pro_id=$id";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Product Deleted Successfully');</script>";
    echo "<script>window.location.assign('welcome.php')</script>";
} else {   
}

?>

<?php
// code to delete account permanently
$sid=$_GET['idd'];
$sql = "DELETE FROM shopregistration WHERE id=$sid";
  if (mysqli_query($conn, $sql)) {
    $sqll = "DELETE FROM product WHERE shop_id=$sid";
    if (mysqli_query($conn, $sqll)) {
    echo "<script>alert('Account Deleted Successfully');</script>";
    echo "<script>window.location.assign('login.php')</script>"; 
    }
    else {

    }     
}
else {   
}  
?>

<?php
//code to add new product
if(isset($_POST['add']))
{ 
  $target = "product-images/" .basename($_FILES['image']['name']);
  $target2 = "admin/product-images/" .basename($_FILES['image']['name']);
  $name = $_POST['name'];
  $price = $_POST['price'];
  $desc = $_POST['description'];
  $imgfile =$_FILES['image']['name'];
  $shop_id= $_SESSION['id'];

  $sql = "INSERT INTO product (name, price, description, product_image, shop_id)
  VALUES ('$name', '$price', '$desc', '$imgfile', '$shop_id')";

  if (mysqli_query($conn, $sql)) {
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    echo "$imgfile";
    copy($target, $target2);
    echo "<script>alert('Product Added Successfully');</script>";
    header("location:welcome.php");
  }   
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome </title>
    <link rel="stylesheet" href="welcome.css">
    <link href="https://fonts.googleapis.com/css?family=Noto Sans / Serif" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript">
    	function on() {
          document.getElementById("overlay").style.display = "block";
        }

        function off() {

          document.getElementById("overlay").style.display = "none";
        }

    </script> 
</head>
<body>
    <section>
    <nav class="nav-bar" role="navigation">
      <h4>Store Dashboard</h4>
    	<a href="logout.php">Logout</a>
    </nav>
    
    <div class="sidebar">
<?php

$sql = "SELECT * FROM shopregistration WHERE id = $idd";
$result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {      
?>      
        <a id="logo" href="welcome.php"><img src="shop-images/<?php echo $row['shopimage']; ?>"></a><br>
        <h2 id="spname"><?php echo $row['shopname']; ?></h2>
        <p id="spcat"><?php echo $row['category']; ?></p>      
        <ul>
            <li class="menu"><a href="welcome.php"><i class="fas fa-home"></i>
            Home</a></li>    
            <li class="menu" onclick="window.location.assign('editprofile.php?id=<?php echo $row['id']; ?>')"><i class="fas fa-edit"></i><span>Edit Profile</span></li>  
            <li class="menu"><a href="change-password.php"><i class="fas fa-users"></i><span>Change Password</span></a></li>
            <li class="menu"><a href="welcome.php?idd=<?php echo $row['id']; ?>"><span class="del" onClick="return confirm('Do you really want to delete');"><i class="fas fa-trash"></i>Delete Account</span></a></li>
            <li class="menu"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>
            Sign Out</a></li>
        </ul>
<?php
}
} 
?>          
        <button onclick="on();">Add Product</button>
      </div>

  </section>
  <section id="main-container">
    <div class="add-product"> 
      <button onclick="on();">Add Product</button>
    </div>
        
    <div class="product-wrapper">
        
<?php
$sql = "SELECT * FROM product WHERE shop_id=$idd";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="product-card">
            <img src="product-images/<?php echo $row['product_image']; ?>">
            <h1 class="name"><?php echo $row['name']; ?></h1>
            <p class="price"><b>₹&nbsp;<?php echo $row['price']; ?>/-</b></p>
            <a href="welcome.php?id=<?php echo $row['pro_id']; ?>"><button class="del" onClick="return confirm('Do you really want to delete');"><i class="fas fa-trash"></i></button></a>
            <button type="button" onclick="window.location.assign('update.php?id=<?php echo $row['pro_id']; ?>')" class="upt"><i class="fas fa-edit"></i></button>
            </li>
        </div>
<?php
}
} else {
    echo "No product added";
}
?> 

    </div> 
    </section>
    <!-- code for add product form -->
    <div id="overlay">
      <div class="form-box">
        <h2><span>product</span><span style="color:red;">Add your</span></h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="name">Product name</label><br>
                <input type="text" id="name" placeholder="product name" name="name" autofocus="" autocomplete="none">
            </div> 
            <div class="input-group">
                <label for="price">Price</label><br>
                <input type="text" id="price" placeholder="price" name="price" autocomplete="off">
            </div>
            <div class="input-group">
                <label for="description">Description</label><br>
                <textarea id="description" placeholder="type product details" rows="7" cold="48" maxlength="1000" name="description"></textarea>
            </div>
            <div class="input-group">
                <label>Upload product image</label><br>
                <input type="file" name="image" required="">
            </div>
              <button type="submit" onclick="off();" name ="add" class="">Submit</button>
              <span onclick="off();">Cancel</span>
        </form>
      </div>
    </div> 
</body>

</html>
<?php } ?>