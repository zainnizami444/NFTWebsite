<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Famms</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images\favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
<style>
	@keyframes slideInLeft {
        0% {
          transform: translateX(-100%);
        }
        100% {
          transform: translateX(0);
        }
      }
      h5{
        animation-duration: 3s;
        animation-timing-function: ease-in-out;
        animation-delay: 0s;
        animation-iteration-count: 8;
        animation-name: slideInLeft;
      }
	 
	  .img-hover-zoom {
  overflow: hidden;
}

/* [2] Transition property for smooth transformation of images */
.img-hover-zoom img {
  transition: transform .5s ease;
}

/* [3] Finally, transforming the image when container gets hovered */
.img-hover-zoom:hover img {
  transform: scale(1.1);
}

</style>
</head>

<body id="body">
<!--mesage start-->
<div class="container">
<div class="row">
<div class="col-md-12">
<h5 class="text-center ml-5">In Famms Store There Is Hot Summer Sale Save Upto 20% off on all items</h5>
<hr>
</div>
</div>
</div>

<!--message end-->
<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					
					<img src="images\logo (1).png" class="h-50 w-50"/>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="index.html">
						<!-- replace logo here -->
						<h4>A Perfect Solution Of All </h4>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="#!"  class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-android-cart a1 "></i>Cart</a>
						<div class="dropdown-menu cart-dropdown">
							<!-- Cart Item -->
							<?php
							include 'config.php';
							if($_SESSION['Userid'] == null)
							{
							header('location:login.php');
							}
							include('config.php');
							$User_id=$_SESSION['Userid'];
							$Query_Select="SELECT tbl_cart.Cart_id, tbl_cart.Cart_User_id,tbl_product.Product_Name,tbl_cart.Product_Quantity,tbl_product.Product_Image,tbl_product.Product_Price from tbl_cart inner join tbl_product on tbl_product.Product_id = tbl_cart.Cart_Product_id where tbl_cart.Cart_User_id = $User_id ";
							$Result_Select=mysqli_query($conn,$Query_Select);
							if(isset($_POST['Btn_Remove']))
							{
							  $Cart_id=$_POST['Cart_id'];
							  $Query_Delete="Delete from tbl_Cart  where Cart_id = $Cart_id";
							  $Result_Delete=mysqli_query($conn,$Query_Delete);
						
							}

							?>
							<div class="media">
								<a class="pull-left" href="#!">
									<img class="media-object" src="images/shop/cart/cart-1.jpg" alt="image" />
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#!">Ladies Bag</a></h4>
									<div class="cart-price">
										<span>1 x</span>
										<span>1250.00</span>
									</div>
									<h4><strong>$1200</strong></h4>
								</div>
								<a href="#!" class="remove"><i class="tf-ion-close"></i></a>
							</div><!-- / Cart Item -->
							<!-- Cart Item -->
							<!-- <div class="media">
								<a class="pull-left" href="#!">
									<img class="media-object" src="images/shop/cart/cart-2.jpg" alt="image" />
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#!">Ladies Bag</a></h4>
									<div class="cart-price">
										<span>1 x</span>
										<span>1250.00</span>
									</div>
									<h4><strong>$1200</strong></h4>
								</div>
								<a href="#!" class="remove"><i class="tf-ion-close"></i></a>
							</div>/ Cart Item -->

							<div class="cart-summary">
								<span>Total</span>
								<span class="total-price">$1799.00</span>
							</div>
							<ul class="text-center cart-buttons">
								<li><a href="cart.php" class="btn btn-small">View Cart</a></li>
								<li><a href="checkout.html" class="btn btn-small btn-solid-border">Checkout</a></li>
							</ul>
						</div>

					</li><!-- / Cart -->

					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="logout.php" ><i
								class="fa fa-sign-out"></i> logout</a>
					
					</li><!-- / Search -->

					

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="index.php">Home</a>
					</li><!-- / Home -->


					<!-- Elements -->
					<li class="dropdown dropdown-slide">
						<a href="#!"  class="dropdown-toggle a1" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Shop </a>
						<div class="dropdown-menu">
							<div class="row">
								<div class="col-lg-12 col-md-12 mb-sm-3">
									<ul>
									<?php
                                           include 'config.php';
                                           $select_category= "select * from tbl_category";
                                           $result_select=mysqli_query($conn,$select_category);
                                           while($row_select=mysqli_fetch_array($result_select)) 
                                           {
                
                                              echo'<li><a href="jewellery.php?categoryid='.$row_select['Category_id'].'">'.$row_select['Category_Name'].'</a></li>';
                        
                                               }
                                           ?>
									
										
										
									</ul>
								</div>							
							</div>
						</div>
					</li>
					
					<li class="dropdown dropdown-slide">
						<a href="about.php">About</a>
					</li>
					<li class="dropdown dropdown-slide">
						<a href="contact.php">Contact</a>
					</li>
					<li class="dropdown dropdown-slide">
						<a href="faq.php">FAQ'S</a>
					</li>
				</ul>

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
    </section>