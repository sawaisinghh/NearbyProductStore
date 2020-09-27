<?php 
// error_reporting(0);

$idd=$_GET['id'];
include('db.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Find your nearby product store</title>
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
	    #main-container .product-details{
	    	width:100%;
	    	max-width:1300px;
	    	height:auto;
	    	display:flex;
	    	margin:0 auto;
	    	padding:50px 30px;
	    	border:1px solid #D6DBDF;
	    }
	    .product-details .pro-img{
            width:50%;
            padding:0 30px;
	    }
	    .product-details .pro-img img{
	    	width:100%;
	    	height:100%;
	    }
	    .product-details .pro-bio{
	    	width:50%;
	    	padding:0 30px;
	    }
	    .product-details .pro-bio h1{
	    	color:#000000cc;
	    	padding-bottom: 5px;
	    }
	    .product-details .pro-bio h4{
	    	color:#000000cc;
	    	cursor: pointer;
	    }
	    .product-details .pro-bio h4:hover{
	    	color:#1944bccc;	
	    }
	    .product-details .pro-bio p{
	    	color:#8b8585;
	    	padding:4px 0;
	    }
	    .product-details .pro-bio .desc{
	    	border-bottom:1px solid #D6DBDF;
	    	padding-bottom:26px;
	    }
	    .product-details .pro-bio .dir-btn{
	    	color:#1944bccc;
	    	cursor: pointer;
	    }
	    @media only screen and (max-width: 800px){
	    	#main-container .product-details{
	    		flex-direction: column;
	    	}
	    	#main-container .product-details .pro-img{
	    		width:100%;	
	    	}
	    	#main-container .product-details .pro-bio{
	    		width:100%;
	    		margin-top:30px;	
	    	}
	    	
	    }

	</style>
</head>
<body>
	<?php include('header.php'); ?>
	<main id="main-container">
    <?php
    $sql =   <<<EOF
        SELECT shopregistration.id, shopregistration.shopname, shopregistration.category, shopregistration.opening_time, shopregistration.closing_time, shopregistration.latitude, shopregistration.longitude, product.pro_id, product.name, product.price, product.description, product.product_image  FROM shopregistration JOIN product ON shopregistration.id = product.shop_id WHERE pro_id = $idd;
    EOF;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) { 
    ?>
	<div class="product-details">
		<div class="pro-img">
		    <img src="product-images/<?php echo $row['product_image']; ?>">
        </div>
        <div class="pro-bio">
		    <h1><?php echo $row['name']; ?></h1>
		    <p><b>Price :&nbsp;</b><?php echo $row['price']; ?>rs.</p>
		    <p><b>Details :</b></p>
	     	<p class="desc"><?php echo $row['description']; ?></p><br><br>
	     	<h4 onclick="window.location.assign('view-shop.php?id=<?php echo $row['id']; ?>')"><i class="fas fa-home"></i>&nbsp;&nbsp;<?php echo $row['shopname']; ?></h4>
	     	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['category']; ?></p>
		    <p><i class="fas fa-clock">&nbsp;&nbsp;&nbsp;</i><span><?php echo $row['opening_time'];?></span> to <span><?php echo $row['closing_time']; ?></span></p><br>
		     <p class="dir-btn"><button class="get-direction" data-lat="<?php echo  $row["latitude"]  ?>" data-lng="<?php echo  $row["longitude"]  ?>">Get Location</button></p>
	    </div>
	</div>	
	<?php } } ?>
    </main>
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