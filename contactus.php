<?php
  include('db.php');
    if(isset($_POST['submit'])) 
    {   
        $uname =$_POST['uname'];
        $email =$_POST['email'];
        $message =$_POST['message'];
        $sql = "INSERT INTO user_messages(name, email, message) VALUES('$uname', '$email', '$message')";
        if(mysqli_query($conn, $sql)) {
             echo "<script>alert('Message sent successfully');</script>";
             echo "<script>window.location.assign('contactus.php')</script>";
             exit();
            	
            }
            else{
            	 echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
            }

    }
        mysqli_close($conn);  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Find your nearby product store</title>
	<style>
		*{
      margin:0;
      padding:0;
    }
    body{
      font-family:'Noto Sans / Serif',sans-serif;
      background-position: center;
      background-size: cover;
      background-color: #E5E8E8;
      height:100%;
    }
    nav .nav-bar .search-box{
    	display: none;
    }
    #pid{
    	color:#76717191;
    	font-size:12px;
    	padding-left:120px;
    	margin:15px 0;
    }
    #main-container{
    	width:100%;
    	height:auto;
    	margin:10px 0;
    	padding:20px 30px 70px 30px;
    	background:white;
    }
    #main-container h1{
    	text-align: center;
    	color:#000000cc;
    	padding:30px 0;
    	font-size:35px;
    }
    #main-container .contactus-form{
    	width:100%;
        height: 100%;
        max-width:1250px;
    	display:flex;
    	padding:40px;
        margin:5px auto;
    	border:1px solid #D6DBDF;
    }
    .contactus-form .address{
    	width:50%;
    	height:auto;
    	padding-left:40px;
    }
    .contactus-form .address h2{
        color:#000000cc;
        padding-bottom:30px;
    }
    .contactus-form .address p{
        color:#3c3b3bcf;
        font-size:14px;
        padding:2px 0;
    }
    .contactus-form .form-box{
    	width:50%;
    	height:auto;
    	padding-right:30px;
    }
    .contactus-form .form-box h4{
    	padding-bottom: 20px;
    	color:#000000cc;
    }
    .contactus-form .form-box .input-group{
    	padding:10px 0;
    }
    .form-box label{
    	color:#000000bf;
    }
    .form-box input{
    	width:100%;
    	height:40px;
    	border:1px solid #D6DBDF;
    	outline: none;
    	padding:3px 10px;
    }
    .form-box textarea{
    	width:100%;
    	height:100px;
    	outline: none;
    	border:1px solid #D6DBDF;
    	padding:10px;
    }
    .form-box button{
    	width:100%;
    	height:40px;
    	text-align: center;
    	text-transform: uppercase;
    	margin-top:20px;
    	background:red;
    	color:white;
    	border:none;
    	outline: none;
        cursor: pointer;
    }
    .form-box button:hover{
        background:linear-gradient(-90deg, #ff0000 , #ff5400f2);
    }
    @media only screen and (max-width: 800px) {
        #pid{
            margin-top:-10px;
        }
        #main-container .contactus-form{
            flex-direction: column;
        }
        .contactus-form .address{
            width:100%;
            margin-left:-40px;
        }
        .contactus-form .form-box{
            margin-top:40px;
            width: 100%;
        }
    }
	</style>
</head>
<body>
	<?php include('header.php'); ?>
	<p id="pid">Home / Contact Us</p>
	<section id="main-container">
	  <h1>Contact Us</h1>
	  <div class="contactus-form">
		<div class="address">
		<h2>OUR ADDRESS</h2>
        <p>Nearby Product Store Ltd.<br>Umang Tower, 5th Floor,<br>Mindspace, Ring Road,<br>Jodhpur, Rajasthan – 342005</p><br>
        <h4>Need Help!</h4><br>
        <p>Write to us<br>nbps@gmail.com for assistance.<br>Call us on 1100-413-6678</p>
        </div>
		<div class="form-box">
			<h4>Submit Your Query</h4>
			<form action="" method="post" enctype="multipart/form-data">   
                <div class="input-group">
                	<label>Name :</label><br>
                	<input type="text" name="uname" placeholder=" Your name*" required="" autofocus="" autocomplete="off">
                </div>
                <div class="input-group">
                	<label>Email :</label><br>
                	<input type="email" name="email" placeholder="Your email address*" required="" autocomplete="off">
                </div>
                <div class="input-group">
                	<label>Meassage</label><br>
                	<textarea name="message" placeholder="Write your message*" required=""></textarea>
                </div>
                <button type="submit" name="submit" id="btn">Submit</button>
            </form>
		</div>
	  </div>
    </section>
	<?php include('footer.php');?>
</body>
</html>