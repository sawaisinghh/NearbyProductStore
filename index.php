<?php
error_reporting(0);
include('db.php');
if(isset($_POST['searcher']))
  {
    // Bucaramanga Coordinates
    $lat = 31.1471375;
    $lon = 75.34121789999999;
        
    // show places according to nearby

    $lat = $_POST['lat'];
    $lon = $_POST['lon'];
    $category= $_POST['search'];
    $query = <<<EOF
    SELECT shopregistration.id, shopregistration.shopname, shopregistration.opening_time, shopregistration.closing_time, shopregistration.latitude, shopregistration.longitude, shopregistration.distance, product.pro_id, product.name, product.price, product.product_image  FROM (
        SELECT *, 
            (
                (
                    (
                        acos(
                            sin(( $lat * pi() / 180))
                            *
                            sin(( `latitude` * pi() / 180)) + cos(( $lat * pi() /180 ))
                            *
                            cos(( `latitude` * pi() / 180)) * cos((( $lon - `longitude`) * pi()/180)))
                    ) * 180/pi()
                ) * 60 * 1.1515 * 1.609344
            )
        as distance FROM `shopregistration`
    ) shopregistration JOIN product ON shopregistration.id = product.shop_id 
    WHERE `name` = '$category' order by distance asc
    LIMIT 15;
EOF;
}
?>
<?php 
// define("API_KEY","AIzaSyB8fLRjCXw957KJl-i_dypOsMG7wqWqArE")
define("API_KEY","AIzaSyBttCxn02lMbq2AiEHVRQNU_kBTyk3lWNk") ?>
<!DOCTYPE html>
<html>
<head>
	<title>Find your nearby product store</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/fontawesome.min.css">
	<!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
	<script
		src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap"
		async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
	var map;
    // var bounds = new google.maps.LatLngBounds();
	function initMap() {
		var mapLayer = document.getElementById("map-box");
		var centerCoordinates = new google.maps.LatLng(26.2569984, 73.0136576);
		var defaultOptions = { center: centerCoordinates, zoom: 4 }

		map = new google.maps.Map(mapLayer, defaultOptions);
	}
    </script>	
</head>
<body onload="initMap(); getLocation();">
	
		<?php include('header.php'); ?>
    <main>
        <section id="main-container">	
        	<div class="search-container">
        		<div class="search-heading">
        		    <h1>FIND YOUR PRODUCT</h1>
        		    <p>Search your product here, and get the list of your searched products<br>in your nearby product stores. And get the direction of that store.<br>So search here and find your neraby product store.</p>
        		    <form class="search-box" method="post" action="">
        		        <input type="text" name="search" onclick="getLocation()" placeholder="Search Your Poduct">
			    	    <input type="hidden" value="" name="lat" id="latitude" required>
                        <input type="hidden" value="" name="lon" id="longitude" required>
                        <button type="submit" name="searcher" class="search-btn"><i class="fas fa-search"></i></button>
        		    </form>
        	    </div>
        	    <div class="search-result">
<?php
    $result = $conn->query($query);
    
    if (mysqli_num_rows($result) > 0){
        // output data of each row
    
?>
                    <table>
 
<?php 
        while($row = $result->fetch_assoc()) {

            ?>          <tr>
                            <td class="pdimg"><img src="product-images/<?php echo  $row["product_image"];?>"></td>
                            <td class="pdbio">
                                
                                	<h3 class="pdname"><?php echo $row["name"];?></h3>
                                	<p style="color:green;" class="price"><b>₹&nbsp;<?php echo $row["price"];?>/-</b></p>
                                	<p class="details" onclick="window.location.assign('product-details.php?id=<?php echo $row['pro_id']; ?>')">view details</p>
                                	<p class="spname" onclick="window.location.assign('view-shop.php?id=<?php echo $row['id']; ?>')"><i class="fas fa-home"></i>&nbsp;&nbsp;<b><?php echo $row["shopname"];?></b></p>
                                	<p class="sptime"><i class="fas fa-clock"></i>&nbsp;&nbsp;<?php echo $row["opening_time"];?>&nbsp;-&nbsp;<?php echo $row["closing_time"];?></p>
                                	<p class="spdistance"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $row["distance"];?></p>
                                    
                            </td>
                            <td class="dir-btn"><button class="get-direction" data-lat="<?php echo  $row["latitude"]  ?>" data-lng="<?php echo  $row["longitude"]  ?>">Direction</button></td>
                            <td><input type="hidden" id="storelat" value="<?php echo  $row["latitude"]  ?>"><input type="hidden" id="storelng" value="<?php echo  $row["longitude"]  ?>"></td>
                        </tr>


        <?php } ?>

                    </table>

    <h4>                
    <?php 
    } 
    else {
    echo "No product available";
    }   
    ?>
    </h4>
        	    </div>
        	</div>
        	<div class="map-container">
                <div id="map-box">
                </div>
        	</div>
          </div>	
        </section>
    </main> 
    <section id="info-container">
    	<div class="site-info">
    		<div class="img">
    			<img src="image/map-img.png">
    		</div>
            <div class="content">
            	<h1>Delightfully fast and easy</h1>
                <p id="para">Whenever you are whatever you are looking for, we make it easy to find<br> your product in your nearby stores.</p>
                <p id="pid"><i class="fas fa-search"></i>Find your product in your nearby area</p>
                <p id="pid"><i class="fas fa-search"></i>Find uncommon items in stores nearby</p>
                <p id="pid"><i class="fas fa-search"></i>Find essencial items when you're traveling</p>
            </div>            		
    	</div>
        <hr>
    	<div class="register-info">
    		<h1>Have a store?<img src="image/shop.png"></h1>
    		<p>Register your shop here and list all your available products here and get maximum customer reach localy. And help the<br> customers to find their products in their nearby stores.</p>
    		<a href="register.php">REGISTER HERE</a>
    	</div>
    </section>
    <section id="aboutus">
    	<h1 class="heading">Meat The Team</h1>
    	<div class="card-wrapper">
            <div class="card">
            	<img src="image/back.jpg" alt="card background" class="card-img">
            	<img src="image/profile.jpg" alt="profile image" class="profile-img">
            	<h1>Sawai Singh</h1>
            	<p class="job-title">Php Developer</p>
            	<p class="about">Register your shop here and list all your available products here and get maximum customer reach localy.</p>
            </div>
            <div class="card">
            	<img src="image/back.jpg" alt="card background" class="card-img">
            	<img src="image/profile.jpg" alt="profile image" class="profile-img">
            	<h1>Haren Sagar</h1>
            	<p class="job-title">UI/UX Designer</p>
            	<p class="about">Register your shop here and list all your available products here and get maximum customer reach localy.</p>
            </div>
            <div class="card">
            	<img src="image/back.jpg" alt="card background" class="card-img">
            	<img src="image/profile.jpg" alt="profile image" class="profile-img">
            	<h1>Chitra Suthar</h1>
            	<p class="job-title">Js Developer</p>
            	<p class="about">Register your shop here and list all your available products here and get maximum customer reach localy.</p>
            </div>
            <div class="card">
            	<img src="image/back.jpg" alt="card background" class="card-img">
            	<img src="image/profile.jpg" alt="profile image" class="profile-img">
            	<h1>Indra Singh</h1>
            	<p class="job-title">Sql Developer</p>
            	<p class="about">Register your shop here and list all your available products here and get maximum customer reach localy.</p>
            </div>
            <div class="card">
            	<img src="image/back.jpg" alt="card background" class="card-img">
            	<img src="image/profile.jpg" alt="profile image" class="profile-img">
            	<h1>Hemlata</h1>
            	<p class="job-title">Css Developer</p>
            	<p class="about">Register your shop here and list all your available products here and get maximum customer reach localy.</p>
            </div>
    	</div>
    </section>
    <?php include('footer.php');?>
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } 
        else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        document.getElementById('lat').value =  position.coords.latitude;
        document.getElementById('lon').value  = position.coords.longitude;
        document.getElementById('latitude').value = position.coords.latitude;
        document.getElementById('longitude').value = position.coords.longitude;
        var myLatLng = new google.maps.LatLng(document.getElementById('latitude').value,document.getElementById('longitude').value);
        var userMarker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'You',
            animation: google.maps.Animation.BOUNCE
        });
    }
</script>
<script>
    var bounds = new google.maps.LatLngBounds();
    function mapmarkers(){
      var markers = [
        <?php $result2 = $conn->query($query);
            if($result2->num_rows > 0){
            while($row = $result2->fetch_assoc()){
                echo '["'.$row['shopname'].'", '.$row['latitude'].', '.$row['longitude'].'],';
            }
        }
        ?>
    ];
     for( i = 0; i < markers.length; i++ ) {
        var p = markers[i];
        var positionn = new google.maps.LatLng(p[1], p[2]);
        bounds.extend(position);
        var marker = new google.maps.Marker({
            position: positionn,
            map: map,
            title: markers[i][0]
        });
}
</script>

<!-- google map link -->

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