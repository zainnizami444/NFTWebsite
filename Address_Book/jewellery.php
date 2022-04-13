<?php
session_start();

include('config.php');
$category_id = $_GET['categoryid'];

$User_id = $_SESSION['Userid'];
$query="select * from tbl_product where Product_Category_id  =$category_id ";
$result=mysqli_query($conn,$query);
$Query_cat="select * from tbl_category where Category_id = $category_id";
$result_cat=mysqli_query($conn,$Query_cat);
$row=mysqli_fetch_array($result_cat);
if(isset($_POST['Btn_cart']))
{
	if($_SESSION['Userid']== null)
	{
		header('location:login.php');
	}
	else
	{
		
	
$Product_id=$_POST['Product_id'];

$Query_Insert="INSERT INTO `tbl_cart` VALUES (NULL,$User_id,$Product_id,1)";
$Result_Insert=mysqli_query($conn,$Query_Insert);
if($Result_Insert)
{
	
	header('location:cart.php');
}
else
{

}
	}


}
?>
<?php
include('header.php');
?>
<section class="products section bg-gray">
<h2 class="text-center"><?php echo $row['Category_Name']?> Products</h2>
<hr>
	<div class="container">
		
<!--jewellery-->
<!--div class="row">
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<span class="bage">Sale</span>
						<img class="img-responsive" src="images\MR-1141-min_85367729-0658-4398-bcf1-1c91603feae3_700x.webp" alt="product-img" />

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
						<h4><a href="product-single.html">Reef Boardsport</a></h4>
						<p class="price">Rs.200</p>
					</div>
				</div>
		    	</div>
			 <div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
					<img class="img-responsive" src="images\MB-74_700x.webp" alt="product-img" />
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
						<p class="price">Rs.200</p>
					</div>
				</div>
			 </div>
			 <div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<img class="img-responsive" src="images\Earings1_700x.webp" alt="product-img" />
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
						<h4><a href="product-single.html">Strayhorn SP</a></h4>
						<p class="price">Rs.230</p>
					</div>
					

				</div>
                </div>	
            
			</div>
			
			<jewellery-->
			<!--new products-->
			<!--start-->
			<?php  while($row=mysqli_fetch_array($result))
			{
                 ?>
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
					<img src="Pro_Images/<?php echo $row['Product_Image']?>" alt="product-img" />
						<div class="preview-meta">
							<ul>
								
								<li><form action="" method="post">
									<input type="hidden"  name="Product_id" value="<?php echo $row['Product_id']?>">
									<button type="submit" name="Btn_cart" class="btn btn-light btn-lg text-dark">
									<i class="tf-ion-android-cart"></i></button>
									<button type="submit" name="Btn_cart" class="btn btn-light btn-lg text-dark">
									<i class="tf-ion-ios-search-strong"></i></button>
			</form>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product.php"><?php echo $row['Product_Name']?></a></h4>
						<p class="price">Rs. <?php echo $row['Product_Price']?></p>
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