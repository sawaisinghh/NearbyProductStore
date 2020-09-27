<?php 
// error_reporting(0);

$idd=$_GET['id'];
include('db.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Shop Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<style>
		*{
			margin:0;
	        padding:0;
	        box-sizing:border-box;
	        text-decoration:none;
	        list-style: none;
		}
		body{
		    font-family:sans-serif;
	        background-position: center;
	        background-size: cover;
	        background-color: #e9efef66;
	        height:100%;
	        width: 100%;
        }
		nav .nav-bar .search-box{
	        display: none;
	    }
	    #main-container{
	    	width:100%;
	    	height:auto;
	    	padding:60px;
	    	background-color: white;
	    }
        #main-container .shop-profile{
            width:100%;
	    	max-width:1300px;
	    	height:auto;
	    	display:flex;
	    	margin:0 auto;
	    	padding:50px 30px;
	    	border:1px solid #D6DBDF
        }
        .shop-profile .shop-img{
            width:50%;
            padding:0 30px;
	    }
	    .shop-profile .shop-img img{
	    	width:100%;
	    	height:100%;
	    }
	    .shop-profile .shop-bio{
	    	width:50%;
	    	padding:0 30px;
	    }
	    .shop-profile .shop-bio h1{
	    	color:#000000cc;
	    	padding-bottom: 5px;
	    }
	    .shop-profile .shop-bio p{
	    	font-size:16px;
	    	color:#8b8585;
	    	padding:4px 0;
	    } 
	    .shop-profile .shop-bio .email:hover{
            color:#1944bccc;
	    	cursor: pointer;
	    }
	    .shop-profile .shop-bio .mobileno:hover{
	    	color:#1944bccc;
	    	cursor: pointer;
	    }
	    .shop-profile .shop-bio .dir-btn{
	    	color:#1944bccc;
	    	cursor: pointer;
	    }
	    @media only screen and (max-width: 800px){
	    	#main-container .shop-profile{
	    		flex-direction: column;
	    	}
	    	#main-container .shop-profile .shop-img{
	    		width:100%;
	    	}
	    	#main-container .shop-profile .shop-bio{
	    		width:100%;
	    		margin-top:30px;
	    	}
	    }
	    section{
	    	width:100%;
	    	height:auto;
	    	margin:20px 0;
            padding:30px 40px;
            background:white;
	    }
	    section .heading{
	    	font-size: 33px;
	        color:#000000cc;
	        margin:30px 0 25px 50px;
	    }
	    section .product-wrapper{
	    	width:100%;
	    	height:auto;
	    	/*background-color: #e9efef66;*/
	    	display:flex;
	    	flex-wrap: wrap;
	    	margin-top:20px;
	    	padding:20px 10px 20px 60px;
	    	
	    }
	    .product-wrapper .product-card{
            width:200px;
            height:260px;
            text-align: center;
            background:white;
	        box-shadow: 0 6px 6px -5px #85929E;
	        margin:40px 30px 0 30px;
	        padding-bottom:10px;
	        transition: .4s;

	    }
	    .product-wrapper .product-card:hover{
            opacity:0.7;
}
	    .product-wrapper .product-card img{
            width:100%;
            height:52%;
	    }
	    .product-wrapper .product-card .name{
	    	margin-top:15px;
	    	color:#000000cc;
 	        font-size: 22px;
	    }
	    .product-wrapper .product-card .price{
	    	font-weight: bold;
	    	color:#bebcbc;
	    	padding:12px 0;
	    }
	    .product-wrapper .product-card .details{
            font-size:16px;
            color:#000000cc;
	    }
	    .product-wrapper .product-card .details:hover{
	    	text-decoration: underline;
	    	color:black;
	    	cursor:pointer;
	    }


	</style>
</head>
<body>
	
	<?php include('header.php'); ?>
	<main id="main-container">
    <?php
    $sql = "SELECT * FROM shopregistration WHERE id = $idd";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) { 
    ?>
	<div class="shop-profile">
		<div class="shop-img">
	     	<img src="shop-images/<?php echo $row['shopimage']; ?>">
	    </div>
	    <div class="shop-bio">
		    <h1><?php echo $row['shopname']; ?></h1><br>
		    <p><?php echo $row['category']; ?></p><br>
		    <p><b>Email :</b></p>
		    <p class="email"><i class="fas fa-envelope"></i>&nbsp;&nbsp;&nbsp;<?php echo $row['email']; ?></p><br>
		    	<p><b>Call :</b></p>
		    <p class="mobileno"><i class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp;+91&nbsp;<?php echo $row['mobile']; ?></p><br><p><b>Shop Time :</b></p>
		    <p><i class="fas fa-clock"></i>&nbsp;&nbsp;&nbsp;<span><?php echo $row['opening_time'];?></span> to <span><?php echo $row['closing_time']; ?></span></p><br>
		    <p class="dir-btn"><button class="get-direction" data-lat="<?php echo  $row["latitude"]  ?>" data-lng="<?php echo  $row["longitude"]  ?>">Get Location</button></p>
		</div>
	</div>	
	<?php } } ?>
    </main>
    <section>
        <h1 class="heading">Available Products</h1>
        <hr>
        <div class="product-wrapper">
	<?php
        $sql = "SELECT * FROM product WHERE shop_id=$idd";
        $result = mysqli_query($conn, $sql);
       
        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="product-card">
        	<img src="product-images/<?php echo $row['product_image']; ?>">
        	<h1 class="name"><?php echo $row['name']; ?></h1>
        	<p class="price"><b>₹&nbsp;<?php echo $row['price']; ?>/-</b></p>
        	<p class="details" onclick="window.location.assign('product-details.php?id=<?php echo $row['pro_id']; ?>')">view details</p>
        </div>
        <?php 
        }
        } else {
            echo "No product available";
        }?>

 	</div> 
    </section>

	<?php include('footer.php'); ?>
<script>
$(function(){
    $('.get-direction').click(function(event) {
      var lat = $(this).data('lat');
      var lng = $(this).data('lng');
      showMap(lat,lng);
    });
});

function showMap(lat,lng){
   var url = "https://maps.google.com/maps/dir/Current+Location?q=" + lat + "," + lng;
   window.open(url);
}
</script>
</body>
</html>