<?php
session_start();
include'db.php';
// checking session is valid or not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting shop category
if(isset($_GET['cid']))
{
$catid=$_GET['cid'];
$msg=mysqli_query($conn,"delete from shopcategory where id='$catid'");
if($msg)
{
echo "<script>alert('Shop category deleted successfully');</script>";
echo "<script>window.location.assign('add-category.php')</script>";
}
}
?>
<?php
// for adding the shop category
if(isset($_POST['submit'])) 
    {   
        $cat =$_POST['adcat'];
        $sql = "INSERT INTO shopcategory (shop_category) VALUES ('$cat')";
        if(mysqli_query($conn, $sql)) {
             echo "<script>alert('New shop category added successfully');</script>";
             echo "<script>window.location.assign('add-category.php')</script>";
             exit();
              
            }
            else{
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin | Shop Category</title>
    <link href="https://fonts.googleapis.com/css?family=Noto Sans / Serif" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="ad.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
  	<section id="container" >
            <div class="nav">
            	<ul class="log">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            	<h2>Admin</h2>
            </div>
          <div class="sidebar">
          	<header>Admin Dashboard</header>
            <a id="logo" href="admin-dashboard.php"><img src="assets/ui-sam.jpg" class="" width="60"></a><br>
            <h3><?php echo $_SESSION['login'];?></h3> 
            <ul> 	  
              <li class="menu"><a class="mngusr" href="admin-dashboard.php"><i class="fas fa-users"></i>Manage Users</a></li>   
              <li class="menu"><a href="umessages.php"><i class="fas fa-envelope"></i>Messages</a></li>
              <li class="menu"><a href="add-category.php"><i class="fas fa-list"></i>Add Shop category</a></li>   
              <li class="menu"><a class="addnew" href="addnewadmin.php"><i class="fas fa-plus-circle"></i>Add New Admin</a></li>
              <li class="menu" ><a class="logout" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>	  
            </ul>             
          </div>
     <section id="main-content">
        <section class="wrapper">
          	<h4> > Add shop category</h4> 
	            <hr>
	        <table>    
                <thead style="background:#063146; color:white;">
                    <tr>
                      <th style="padding:7px;">&nbsp;Sno.</th>
                      <th>Shop Category</th>
                      <th>Action</th>      
                    </tr>
                </thead>  
                <tbody>
                    <?php $ret=mysqli_query($conn,"select * from shopcategory");
					   $cnt=1;
					while($row=mysqli_fetch_array($ret))
						 {?>
                    <tr>
                        <td>&nbsp;&nbsp;<?php echo $cnt;?></td>                       
                        <td><span><?php echo $row['shop_category'];?></span></td>
                        <td>        
                        <a href="add-category.php?cid=<?php echo $row['id'];?>"> 
                        <button id="del" onClick="return confirm('Do you really want to delete');">Delete</button></a>
                        </td>
                    </tr>

                    <?php $cnt=$cnt+1; }?>
                    <tr>
                      <form action="" method="post" enctype="multipart/form-data">
                      <td colspan="2"><input type="text" name="adcat" placeholder="Enter category name" autofocus="" autocomplete="off" style="width:98%; height:30px; padding-left:10px; outline:none; border:1px solid #D6DBDF;"></td>
                      <td><button type="submit" id="ad" name="submit" style="background:#1781dcd4; border:none; height:27px; border-radius:2px; font-size:13px; padding:3px 8px; color:white;">Add Category</button></td>
                      </form>
                    </tr>         
                </tbody>
             </table>
        </section> 
     </section>   
    </section>
  </body>
</html>
<?php } ?>  