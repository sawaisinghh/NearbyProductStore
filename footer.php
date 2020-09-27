<!DOCTYPE html>
<html>
<head>
	<title>Footer of the website</title>
    <style>
    	*{
	        margin:0;
	        padding:0;
	        box-sizing:border-box;
	        text-decoration:none;
	        list-style: none;
        }
    	footer{
    		height:auto;
    		width:100%;
    		color:white;
    		background:#000000f2;
    		margin-top:auto;
    		padding-bottom:10px;
    	}
    	
    	footer #btline{
    		text-align:center;
    		margin-top:45px;
    		font-size: 12px;
    		color:#ffffff5e;
    	}
    	footer #btline span:hover{
    		color:red;
    	}
    	footer .footer-wrapper{
    		width:100%;
    		max-width:1280px;
    		display: flex;
    		margin:10px auto;
    		flex-wrap:wrap;
    		padding:50px;
    	}
    	footer .footer-wrapper div{
           width:210px;
           height:auto;
           margin:30px 40px 10px 40px;
    	}
    	.footer-wrapper div h1{
    		font-size: 22px;
    		padding-bottom:15px;
    	}
    	.footer-wrapper div p{
            line-height: 25px;
            color:#d5d4d4;
    	}
    	.footer-wrapper div button{
    		color:white;
    		background:red;
    		border:none;
    		outline:none;
    		margin-top:17px;
    		padding:7px 10px;
    		cursor:pointer;
    	}
    	.footer-wrapper div button:hover{
    		opacity:0.8;
    	}
    	.footer-wrapper div li{
    		padding:8px 0;
    	}
    	.footer-wrapper div ul li a{
    		color:#d5d4d4;
    		transition: .5s;
    	}
    	.footer-wrapper div ul li a:hover{
    		color:red;
    	}	
    </style>
</head>
<body>
	<footer>
		<div class="footer-wrapper">
		    <div>
				<h1 class="heading">Product Locator</h1>
                <p>Product Locator help you to find your product in your nearby product store. And shopkeeper may register their shop here and get maximum customers reach locally.</p> 
		    </div>
		    <div>
			    <ul>
				    <li><h1 class="heading">Pages</h1></li>
				    <li><a href="index.php#aboutus">About Us</a></li>
				    <li><a href="contactus.php">Contact Us</a></li>
				    <li><a href="privacypolicy.php">Privacy Policy</a></li>
				    <li><a href="">Disclaimer</a></li>
			    </ul>
		    </div>
		    <div>
                    <h1 class="heading">Contact</h1></li>
                    <p>nbps@gmail.com<br>(888) 274-6511 8201<br>Mehta Tower Ring Road,<br> Jodhpur, Raj. 342005</p>
                    <button onclick="window.location.assign('contactus.php')">Send message</button>
		    </div>
		    <div>
			    <ul>
				    <li><h1 class="heading">Company</h1></li>
				    <li><a href="">AboutUs</a></li>
				    <li><a href="">ContactUs</a></li>
				    <li><a href="">Privacy Policy</a></li>
				    <li><a href="">Disclaimer</a></li>
			    </ul>
		    </div>
		</div>
		<p id="btline">
			© 2020 <span>Nearyproductstore</span>. All rights reserved.
		</p>
	</footer>
</body>
</html>