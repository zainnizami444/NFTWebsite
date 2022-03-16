<?php
session_start();
include 'connection.php';
include 'Header.php';

if($_SESSION['Userid']!=null)
{
	$query_Select="SELECT product.Proid,product.Proimg,product.Proname,product.Description,product.Start_date,product.End_date,product.Userid,product.Bid_Price,product.Fees,status_bid.Status_name from product INNER join status_bid WHERE product.Status_bid=status_bid.Status_id";
   $Result_Select=mysqli_query($conn,$query_Select);
  
}

?>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>All Products</h2>
					
				</div>
			</div>
		</div>
	
        <?php
					
					while ($row=mysqli_fetch_array($Result_Select)) {
								  ?>
				<!-- ad listing list  -->
				<div class="ad-listing-list mt-20">
						<div class="row p-lg-10 p-sm-5 p-4">
							<div class="col-lg-4 align-self-center">
								<a href="Products.html?id=<?php 
												echo $row['Proid'];
												?>">
									<img src="img/<?php 
												echo $row['Proimg'];
												?>" class="img-fluid" alt="">
								</a>
							</div>
							<div class="col-lg-8">
								<div class="row">
									<div class="col-lg-6 col-md-10">
										<div class="ad-listing-content">
											<div>
												<a href="Products.php?id=<?php 
												echo $row['Proid'];
												?>" class="font-weight-bold"><?php 
												echo $row['Proname'];
												?> </a>
											</div>
											<ul class="list-inline mt-2 mb-3">
												<li class="list-inline-item"><a href="Products.php?id=<?php 
												echo $row['Proid'];
												?>" class="font-weight-bold"> <i class="fa fa-dollar"> </i> <?php 
												echo $row['Bid_Price'];
												?> </a></li>
												<br/>
												<li class="list-inline-item"><a href="Products.php?id=<?php 
												echo $row['Proid'];
												?>"> <i class="fa fa-calendar"></i> Bid End Date is <?php 
												echo $row['End_date'] ;
												?>
												<br/>
												<?php 
												echo $row['Status_name'];
												?></a></li>
											</ul>
											<p class="pr-5"><?php 
												echo $row['Description'];
												?></p>
										</div>
									</div>
									<div class="col-lg-6 align-self-center">
										<div class="product-ratings float-lg-right pb-3">
											<ul class="list-inline">
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item"><i class="fa fa-star"></i></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				<!-- ad listing list  -->

			
<?php
					}
?> 		
			</div>
		</div>
	</div>
</section>


<?php
include 'Footer.php';
?>