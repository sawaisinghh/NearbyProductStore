<?php
error_reporting(0);
session_start();
include'db.php';
// checking session is valid or not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting user
if(isset($_GET['id']))
{
$shopid=$_GET['id'];
$msg=mysqli_query($conn,"delete from shopregistration where id='$shopid'");
if($msg)
{
echo "<script>alert('User deleted');</script>";
echo "<script>window.location.assign('admin-dashboard.php')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin | Manage Users</title>
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
              <li class="menu"><i class="fas fa-users"></i><span>Manage Users</span></li>	  
              <li class="menu"><a href="umessages.php"><i class="fas fa-envelope"></i>Messages</a></li>
              <li class="menu"><a href="add-category.php"><i class="fas fa-list"></i>Add Shop category</a></li>   
              <li class="menu"><a class="addnew" href="addnewadmin.php"><i class="fas fa-plus-circle"></i>Add New Admin</a></li>
              <li class="menu" ><a class="logout" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>	  
            </ul>             
          </div>
     <section id="main-content">
        <section class="wrapper">
          	<h4> > All Shop Details </h4> 
	            <hr>
	        <table>    
                <thead style="background:#063146; color:white;">
                    <tr>
                      <th style="padding:7px;">&nbsp;Sno.</th>
                      <th>Image</th>
                      <th>Shop Name</th>
                      <th>Email</th>
                      <th>Action</th>      
                    </tr>
                </thead>  
                <tbody>
                    <?php $ret=mysqli_query($conn,"select * from shopregistration");
					   $cnt=1;
					while($row=mysqli_fetch_array($ret))
						 {?>
                    <tr>
                       <td>&nbsp;&nbsp;<?php echo $cnt;?></td>
                        <td><div class="pimg"><img src="shop-images/<?php echo $row['shopimage']; ?>"></div></td>
                        <td><span><?php echo $row['shopname'];?></span><br><span><?php echo $row['category'];?></span></td>
                        <td><?php echo $row['email'];?></td>
                        <td>        
                        <button id="pddetails" onclick="window.location.assign('shop-products.php?sid=<?php echo $row['id']; ?>')">View products</button>           
                        <a href="admin-dashboard.php?id=<?php echo $row['id'];?>">
                        <button id="del" onClick="return confirm('Do you really want to delete');">Delete</button></a>
                        </td>
                    </tr>

                    <?php $cnt=$cnt+1; }?>
                             
                </tbody>
             </table>
        </section> 
     </section>   
    </section>
  </body>
</html>
<?php } ?>  