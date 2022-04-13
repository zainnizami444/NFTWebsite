<?php
include('header.php');
include('config.php');
$query="select * from product where categoryid=5";
$result=mysqli_query($conn,$query);
?>
<!--gift--->
<section class="products section bg-gray">
<h2 class="text-center">Gift Packs</h2>
<hr>
	<div class="container">
<div class="row">
<!--div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<img class="img-responsive" src="images\Benetton-Purple-Gift-Set-The-Perfume-Shop-330x396.jpg" alt="product-img" />
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
						<h4><a href="product-single.html">Bradley Mid</a></h4>
						<p class="price">$200</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<img class="img-responsive" src="images\White-Diamonds-Gift-Set-By-Elizabeth-Taylor-The-perfume-shop-pk-330x396.jpg" alt="product-img" />
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
						<img class="img-responsive" src="images\Sweet-Love-Shirley-May-The-Perfume-Shop-330x396.jpg" alt="product-img" />
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

			<gift-->
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