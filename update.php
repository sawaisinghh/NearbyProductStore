
<?php
session_start();
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
}

$id=$_GET['id'];
include('db.php');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// update product code
if(isset($_POST['update']))
{ 
  $target = "product-images/" .basename($_FILES['image']['name']);
  $name = $_POST['name'];
  $price = $_POST['price'];
  $desc = $_POST['description'];
  $imgfile = $_FILES['image']['name'];
  $shop_id= $_SESSION['id'];
  $sql = "UPDATE product SET name='$name', price='$price', description='$desc', product_image='$imgfile' WHERE pro_id = $id";

if (mysqli_query($conn, $sql)) {
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    echo "<script>alert('product updated successfully');</script>";
    echo "<script>window.location.assign('welcome.php')</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <link href="https://fonts.googleapis.com/css?family=Noto Sans / Serif" rel="stylesheet">
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
    .form-box .input-group textarea{
      padding: 10px;
      outline: none;
      border:1px solid #D6DBDF;
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
<h2><span style="color:red;">Edit Your</span><span> Product</span></h2>
<div class="form-container">
<div class="form-box">

  <form action="" method="post" enctype="multipart/form-data">   
      <div class="input-group">


         
<?php

$sql = "SELECT * FROM product WHERE pro_id = $id";
$result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

?>    
            <label for="name">Product name</label>
            <input type="text" placeholder="Product name" name="name" value="<?php echo $row['name']; ?>">
        </div>
    
        <div class="input-group">
            <label for="price">Price</label>
            <input type="text" placeholder="Price" name="price" value="<?php echo $row['price']; ?>">
        </div>
        <div class="input-group">
            <label for="description">Product drscription</label>
            <textarea id="description" placeholder="type product description" rows="7" cols="48" maxlength="1000" name="description"><?php echo $row['description']; ?></textarea>
        </div>
        <div class="input-group">
            <label >Upload product image</label>
            <input type="file" name="image" value="<?php echo $row['product_image']; ?>" required> 
        </div>
   
            <button type="submit" name ="update">Update</button>
            <span onclick="window.location.assign('welcome.php');">Cancel</span>
  </form>
</div>
</div>
</body>
</html>
