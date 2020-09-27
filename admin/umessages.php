<?php
session_start();
 include'db.php';

 if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
// for message message
if(isset($_GET['idd']))
{
$msgid=$_GET['idd'];
$msg=mysqli_query($conn,"delete from user_messages where id='$msgid'");
if($msg)
{
echo "<script>alert('Message Deleted');</script>";
echo "<script>window.location.assign('umessages.php')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin | Users Messages</title>
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
              <li onclick="messages();" class="menu"><i class="fas fa-envelope"></i><span>Messages</span></li>
              <li class="menu"><a href="add-category.php"><i class="fas fa-list"></i>Add Shop category</a></li>     
              <li class="menu"><a class="msg" href="addnewadmin.php"><i class="fas fa-plus-circle"></i>Add New Admin</a></li>
              <li class="menu" ><a class="logout" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>    
            </ul>             
          </div>
          <section id="main-content">
            <section class="wrapper" id="umessages">
           <h4> > All Messages </h4> 
              <hr>
          <table>    
                <thead style="background:#063146; color:white;">
                    <tr>
                      <th style="padding:7px;">&nbsp;Sno.&nbsp;&nbsp;</th>
                      <th>Name&nbsp;&nbsp;</th>
                      <th>&nbsp;&nbsp;Email&nbsp;&nbsp;</th>
                      <th>Message&nbsp;&nbsp;</th>
                      <th>&nbsp;&nbsp;Action&nbsp;&nbsp;</th>   
                    </tr>
                </thead>  
                <tbody>
                    <?php $rett=mysqli_query($conn,"select * from user_messages");
             $cnt=1;
          while($row=mysqli_fetch_array($rett))
             {?>
                    <tr>
                        <td>&nbsp;&nbsp;<?php echo $cnt;?>&nbsp;&nbsp;</td>
                        <td><?php echo $row['name'];?>&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;<?php echo $row['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $row['message'];?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>        
                        &nbsp;&nbsp;
                        <a href="umessages.php?idd=<?php echo $row['id'];?>"> 
                        <button id="del">Delete</button></a>
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