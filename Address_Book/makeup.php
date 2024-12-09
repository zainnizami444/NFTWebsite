<?php
include('header.php');
include('config.php');
$query="select * from product where categoryid=2";
$result=mysqli_query($conn,$query);
?>
<section class="products section bg-gray">
<h2 class="text-center">Makeup Products</h2>
<hr>
	<div class="container">
<div class="row">
<!--makeup-->
	<!--div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<span class="bage">Sale</span>
						<img class="img-responsive" src="images\xs.jpg" alt="product-img" />
						<div class="preview-meta">
							<ul>
								<li>
									<span  data-toggle="modal" data-target="#product-modal">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								
								<li>
									<a href="#!"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.html">Rainbow Shoes</a></h4>
						<p class="price">$200</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">					
					<img class="img-responsive" src="images\xs (1).jpg" alt="product-img" />						<div class="preview-meta">
							<ul>
								<li>
									<span  data-toggle="modal" data-target="#product-modal">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								
								<li>
									<a href="#!"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.html">Rainbow Shoes</a></h4>
						<p class="price">$200</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
					<img class="img-responsive" src="images\xs (2).jpg" alt="product-img" />
						<div class="preview-meta">
							<ul>
								<li>
									<span  data-toggle="modal" data-target="#product-modal">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								
								<li>
									<a href="#!"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.html">Rainbow Shoes</a></h4>
						<p class="price">$200</p>
					</div>
				</div>
			</div>
		   <makeup-->
		   	<!--new products-->
			<!--start-->
			<?php  while($row=mysqli_fetch_array($result))
			{
                 ?>
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
					<img class="img-responsive" src="images/<?php echo $row['productimage']?>" alt="product-img" />
						<div class="preview-meta">
							<ul>
								
								<li>
									<a href="cart.php"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.html"><?php echo $row['productname']?></a></h4>
						<p class="price">Rs. <?php echo $row['productprice']?></p>
					</div>
				</div>
			 </div>
			<!--end-->
			<?php
}
	?>
</div>
</div>
</section>
<?php
include('footer.php');
?>