<?php 
error_reporting(0);
session_start();
include('db.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

$idd=$_GET['sid'];
// for deleting product
if(isset($_GET['pid']))
{
$pid=$_GET['pid'];
$msg=mysqli_query($conn,"delete from product where pro_id='$pid'");
if($msg)
{
echo "<script>alert('product deleted');</script>";
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
              <li class="menu"><a href="admin-dashboard.php"><i class="fas fa-users"></i><span>Manage Users</span></a></li>	  
              <li class="menu"><a href="umessages.php"><i class="fas fa-envelope"></i>Messages</a></li>
              <li class="menu"><a href="add-category.php"><i class="fas fa-list"></i>Add Shop category</a></li>   
              <li class="menu"><a class="addnew" href="addnewadmin.php"><i class="fas fa-plus-circle"></i>Add New Admin</a></li>
              <li class="menu" ><a class="logout" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>	  
            </ul>             
          </div>
     <section id="main-content">
        <section class="wrapper">
        	<?php $rett=mysqli_query($conn,"select shopname from shopregistration WHERE id = $idd");
                if (mysqli_num_rows($rett) > 0){
                while($row = mysqli_fetch_assoc($rett)) { 
            ?>
          	<h3><?php echo $row['shopname'];?></h3> 
          	<?php } } ?>
	            <hr>
	        <table>    
                <thead style="background:#063146; color:white;">
                    <tr>
                      <th style="padding:7px;">&nbsp;&nbsp;Sno.&nbsp;&nbsp;</th>
                      <th>&nbsp;&nbsp;Image&nbsp;&nbsp;</th>
                      <th>&nbsp;Name&nbsp;&nbsp;</th>
                      <th>&nbsp;Price&nbsp;&nbsp;</th>
                      <th>Details&nbsp;&nbsp;</th>
                      <th>&nbsp;&nbsp;Action&nbsp;&nbsp;</th>      
                    </tr>
                </thead>  
                <tbody>
                    <?php $ret=mysqli_query($conn,"select * from product WHERE shop_id = $idd");
					   $cnt=1;
					while($row=mysqli_fetch_array($ret))
						 {?>
                    <tr>
                       <td>&nbsp;&nbsp;<?php echo $cnt;?></td>
                        <td><div class="pimg">&nbsp;&nbsp;<img src="product-images/<?php echo $row['product_image']; ?>"></div></td>
                        <td>&nbsp;&nbsp;<?php echo $row['name'];?>&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;<?php echo $row['price'];?>/-&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $row['description'];?></td>
                        <td>&nbsp;&nbsp;
                        <a href="shop-products.php?pid=<?php echo $row['pro_id'];?>">      
                        <button id="del" onClick="return confirm('Do you really want to delete');">Delete</button></a>&nbsp;&nbsp;
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