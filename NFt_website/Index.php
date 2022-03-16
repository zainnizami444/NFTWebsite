<?php
session_start();
include 'connection.php';
include 'Header.php';

if($_SESSION['Userid']!=null)
{
	$query_Select="SELECT product.Proid,product.Proimg,product.Proname,product.Description,product.Start_date,product.End_date,product.Userid,product.Bid_Price,product.Fees,status_bid.Status_name from product INNER join status_bid WHERE product.Status_bid=status_bid.Status_id limit 4";
   $Result_Select=mysqli_query($conn,$query_Select);
   $row_dat=mysqli_fetch_array($Result_Select);
  
if($row_dat['End_date'] < date("Y-m-d") )
{
	
	$query_update="update product set Status_bid = 2 where End_date < CURRENT_DATE";
	$Result_update=mysqli_query($conn,$query_update);
}
if($row_dat['Start_date'] == date("Y-m-d") ){
	$query_update_date="update product set Status_bid= 1 where Start_date = CURRENT_DATE";
	$Result_update_date=mysqli_query($conn,$query_update_date);
}
 $query="SELECT product.Proid,product.Proimg,product.Proname,product.Description,product.Start_date,product.End_date,product.Userid,product.Bid_Price,product.Fees,status_bid.Status_name from product INNER join status_bid WHERE product.Status_bid=status_bid.Status_id";
   $Result=mysqli_query($conn,$query);
   $row_dat=mysqli_fetch_array($Result);
}
else
{
    header("Location:Login.php");
}
?>

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Buy & Sell Near You </h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
					<div class="short-popular-category-list text-center">
						<h2>Popular Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-bed"></i> Hotel</a></li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-grav"></i> Fitness</a>
							</li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-car"></i> Cars</a>
							</li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-cutlery"></i> Restaurants</a>
							</li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-coffee"></i> Cafe</a>
							</li>
						</ul>
					</div>
					
				</div>
		
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<section class="section">
	<!-- Container Start -->
	<div class="container">		<!-- Section title -->
				<div class="section-title">
					<h2>Products</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
				</div>
						   
<?php
					
					while ($row=mysqli_fetch_array($Result_Select)) {
								  ?>
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


<?php
					}
?> 		

			
			

				
<!-- <script src="Bootstrap/js/jquery.js"></script>
<script src="Bootstrap/js/jquery.countdown.js"></script>
<script >
	
$("#getting-started")
.countdown("<?php echo  $row['End_date'];?>", function(event) {
$(this).text(
  event.strftime('%D days %H:%M:%S')
);
});
</tr>
</script> --> 
	
			
	
</section>



<?php
include 'Footer.php';
?>

