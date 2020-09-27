<!DOCTYPE html>
<html>
<head>
	<title>Footer of the website</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style>
		*{
	        margin:0;
	        padding:0;
	        box-sizing:border-box;
	        text-decoration:none;
	        list-style: none;
        }
        .site-header{
	        width:100%;
	        height:auto;
        }
        nav{
	        width: 100%;
	        height:170px;
        }
        nav .top-bar{
        	width:100%;
        	height:18%;
        	background:#000000cf;
        }
        nav .top-bar p{
        	float:left;
        	color:white;
        	font-size:12px;
        	margin-top:7px;
        	margin-left: 100px
        }
        nav .top-bar ul{
        	display:flex;
        	float:right;
        	margin-top:4px;
        	margin-right:85px;
            color:#ffffff61;
        }
        nav .top-bar ul li a{
        	font-size: 12px;
        	color:white;
            padding:8px;
            transition: .5s;
        }
        nav .top-bar ul li a:hover{
        	color:red;
        }
        nav .nav-bar{
	        width:100%;
       	    height:49%;
	        background:white;
	        display: flex;
	        justify-content:space-around;
	        align-items: center;
        }
        nav .nav-bar .logo{
	        margin-left: -60px;
            color:#000000cc;
        }
        nav .nav-bar .search-box{
	        width:400px;
	        height:40px;
	        border-radius:5px;
	        margin-left: -70px;
	        background:#000000c4;
	        align-items: center;
	        padding:5px;
        }
            nav .nav-bar .search-box input{
      	    width:89%;
      	    height:30px;
    	    padding:5px 5px 5px 15px;
       	    outline:none;
	        border:none;
	        color:white;
	        background:none;
        }
        nav .nav-bar .search-box .search-btn{
         	width:10%;
        	height:30px;
        	float:right;
        	cursor: pointer;
        	outline:none;
	        border:none;
	        background:none;
        }
        nav .nav-bar .search-box i{
	        color:red;
        }
        nav .nav-bar .user-option{
            margin-right:-50px;
        }
        nav .nav-bar .user-option ul{
	        display: flex;
	        justify-content: space-around;
        }
        .nav-bar .user-option ul li a{
         	color:#000000cc;
            padding:5px 8px;
            border-radius:3px;
            transition: .5s;
        }
        .nav-bar .user-option ul li a:hover{
	        color:red;
	        background:#000000c4;

        }

        /*second navigation bar menu*/

        nav .menu{
	        width:100%;
	        height:33%;
	        background:black;
	        box-shadow: 0 6px 22px -5px #d8dee2;
        }
        nav .menu ul{
        	display:flex;
	        flex-direction: row;
	        justify-content: space-around;
            align-items: center;
        }
        nav .menu ul li{
	        margin-top:18px;
	        transition: all .5s;
        }
        nav .menu ul li a{
	        /*color:#000000cc;*/
	        color:white;
	        transition: .5s;
        }
        nav .menu ul li a:hover{
	        color:red;
        }
        @media only screen and (max-width: 800px) {
           nav{
            height:140px;
           } 
           nav .top-bar{
            display: none;
           }
           nav .nav-bar .search-box{
               width:200px;
               height:30px;
           }
           nav .nav-bar .search-box input{
               height:20px;
           }
           nav .nav-bar .search-box .search-btn{
               height:23px;
           }
        }
	</style>
</head>
<body>
	<header class="site-header">
		<nav>
			<div class="top-bar">
                <p>Find your product in more then 1k+ nearby local stores</p> 
                <ul>
                    <li><a href="index.php">Home</a></li>
                	<li>|<a href="index.php#aboutus">About Us</a>|</li>
                	<li><a href="contactus.php">Contact Us</a></li>	
                </ul> 
		    </div>
			<div class="nav-bar">
			    <div class="logo">
				    <h1>Nearby Product Store</h1>
			    </div>
			    <div class="search-box">
			    	<form class="search-form" method="post" action="">
			    	    <input type="text" name="search" onclick="getLocation();" placeholder="Search Your Poduct">
			    	    <input type="hidden" value="" name="lat" id="lat" required>
                        <input type="hidden" value="" name="lon" id="lon" required>
                        <button type="submit" name="searcher" onclick="mapmarkers()" class="search-btn"><i class="fas fa-search"></i></button>
			        </form>
			    </div>
			    <div class="user-option">
				    <ul>
					   <li><a href="register.php">Register</a></li>
					   <li><a href="login.php">Login</a></li>
				    </ul>
			    </div>
			</div>
			<div class="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php#aboutus">About Us</a></li>
					<li><a href="contactus.php">Contact Us</a></li>
					<li><a href="privacypolicy.php">Privacy Policy</a></li>
				</ul>
			</div>
		</nav>
	</header>
</body>
</html>