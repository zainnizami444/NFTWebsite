<?php
include('header.php');
include('config.php');
$query="select * from product where categoryid=3";
$result=mysqli_query($conn,$query);
?>

<section class="products section bg-gray">
<h2 class="text-center">Perfume Products</h2>
<hr>
	<div class="container">
<div class="row">
<!--perfume-->
<!--div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<span class="bage">Sale</span>
						<img class="img-responsive" src="images\Good-Girl-By-Carolina-Herrera-the-perfume-shop-330x396.jpg" alt="product-img" />
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
						<img class="img-responsive" src="images\Bluebell-by-yardley-london-the-perfume-shop-330x396.jpg" alt="product-img" />
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
						<img class="img-responsive" src="images\Everywoman-by-Creation-Lamis-the-perfume-shop-330x396.jpg" alt="product-img" />
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
			<perfume--->
            
</div>
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
</section>
<?php
include('footer.php');
?>