<?php
session_start();
include 'connection.php';
include 'Header.php';
$bidder=$_SESSION['Userid'];
$date = date("Y-m-d");
$id=$_GET['id'];
$query_pro="SELECT * from product WHERE Proid = $id ";
$Result_pro=mysqli_query($conn,$query_pro);
$row_pro=mysqli_fetch_array($Result_pro);
$user=$row_pro['Userid'];
$query_user="SELECT * from user WHERE Userid = $user";
$Result_user=mysqli_query($conn,$query_user);
$row_user=mysqli_fetch_array($Result_user);
$Status=$row_pro['Status_bid'];
$query_stat="Select * from status_bid where Status_id = $Status";
$Result_stat=mysqli_query($conn,$query_stat);
$row_stat=mysqli_fetch_array($Result_stat);
$query_join="SELECT * FROM `bid` ORDER BY Price DESC;";
$Result_bid_select=mysqli_query($conn,$query_join);
$row_bid=mysqli_fetch_array($Result_bid_select);	$user_high=$row_bid['User_id'];
$query_max="Select * From user where Userid=$user_high";
$Result_max=mysqli_query($conn,$query_max);
$row_max=mysqli_fetch_array($Result_max);
if(isset($_POST['Place']))
{	
	$bid=$_POST['Price'];
	if($row_pro['Userid']!=$bidder && $row_pro['Bid_Price'] < $bid && $row_pro['Status_bid'] == 1)
	{
		
		$query_bid="insert into bid values(null,$bidder,$id,$bid,1,CURRENT_DATE)";
		$result_bid=mysqli_query($conn,$query_bid);
		$query_pro="update product set Bid_Price = $bid where Proid = $id";
		$Result_pro=mysqli_query($conn,$query_pro);

	}
}
		
	
?>
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title p-10" style="background-color:white;Font-size :60px;height:100px;"><?php echo $row_pro['Proname']?></h1>
			<!-- product slider -->
					<div class="product-slider">
						<div class="product-slider-item my-4" data-image="img/<?php echo $row_pro['Proimg']?>">
							<img class="img-fluid w-100" src="img/<?php echo $row_pro['Proimg']?>">
						</div>
						<div class="product-slider-item my-4" data-image="img/<?php echo $row_pro['Proimg']?>">
							<img class="d-block img-fluid w-100" src="img/<?php echo $row_pro['Proimg']?>" alt="Second slide">
						</div>
						<div class="product-slider-item my-4" data-image="img/<?php echo $row_pro['Proimg']?>">
							<img class="d-block img-fluid w-100" src="img/<?php echo $row_pro['Proimg']?>" alt="Third slide">
						</div>
						<div class="product-slider-item my-4" data-image="img/<?php echo $row_pro['Proimg']?>">
							<img class="d-block img-fluid w-100" src="img/<?php echo $row_pro['Proimg']?>" alt="Third slide">
						</div>
						<div class="product-slider-item my-4" data-image="img/<?php echo $row_pro['Proimg']?>">
							<img class="d-block img-fluid w-100" src="img/<?php echo $row_pro['Proimg']?>" alt="Third slide">
						</div>
					</div>
					<!-- product slider -->

					<div class="content mt-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
								 aria-selected="true">Product Details</a>
								 
							</li>
							<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
								 aria-selected="false">Specifications</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
								 aria-selected="false">Reviews</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Product Biding</h3>
								<form action="Products.php?id=<?php echo $row_pro['Proid']?>" method="post" >
                            <fieldset class="p-4">
                                <input type="number" name="Price"placeholder="Place your bid" class="border p-3 w-100 my-2"required>
								<!-- <input type= name="date"placeholder="Place your bid" class="border p-3 w-100 my-2"required  style="display:none;">
                                -->
                                <input type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold" name="Place" Value="Place"/>
                            </fieldset>
                        </form>
							</div>
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">Product Specifications</h3>
								<table class="table table-bordered product-table">
									<tbody>
										<tr>
											<td>Product Name</td>
											<td><?php echo $row_pro['Proname']?></td>
										</tr>
										<tr>
											<td>Price</td>
											<td>$ <?php echo $row_pro['Bid_Price']?></td>
										</tr>
										<tr>
											<td>Start Date</td>
											<td><?php echo $row_pro['Start_date']?></td>
										</tr>
										<tr>
											<td>End Date</td>
											<td><?php echo $row_pro['End_date']?></td>
										</tr>
										
										<tr>
											<td>Description</td>
											<td><?php echo $row_pro['Description']?></td>
										</tr>
										
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Product Review</h3>
								<div class="product-review">
									<div class="media">
										<!-- Avater -->
										<img src="images/user/user-thumb.jpg" alt="avater">
										<div class="media-body">
											<!-- Ratings -->
											<div class="ratings">
												<ul class="list-inline">
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
												</ul>
											</div>
											<div class="name">
												<h5>Jessica Brown</h5>
											</div>
											<div class="date">
												<p>Mar 20, 2018</p>
											</div>
											<div class="review-comment">
												<p>
													Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqe laudant tota rem ape
													riamipsa eaque.
												</p>
											</div>
										</div>
									</div>
									<div class="review-submission">
										<h3 class="tab-title">Submit your review</h3>
										<!-- Rate -->
										<div class="rate">
											<div class="starrr"></div>
										</div>
										<div class="review-submit">
											<fm action="#" class="row">
												<div class="col-lg-6">
													<input type="text" name="name" id="name" class="form-control" placeholder="Name">
												</div>
												<div class="col-lg-6">
													<input type="email" name="email" id="email" class="form-control" placeholder="Email">
												</div>
												<div class="col-12">
													<textarea name="review" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
												</div>
												<div class="col-12">
													<button type="submit" class="btn btn-main">Sumbit</button>
												</div>
											</fm>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget price text-center">
						<h4>Price</h4>
						<p>$ <?php echo $row_pro['Bid_Price']?></p>
					</div>
					<!-- User Profile widget -->
					<div class="widget user text-center">
						<img class="rounded-circle img-fluid mb-5 px-5" src="img/<?php echo $row_user['img']?>" alt="">
						<h4><a href=""><?php echo $row_user['Fname'].$row_user['Lname']?></a></h4>
						<p class="member-time"><?php echo $row_user['Username']?></p>
					
					</div>
					<!-- Map Widget -->
					<div class="widget map">
						<div class="map">
							<div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>
						</div>
					</div>
					<!-- Rate Widget -->
					<div class="widget rate">
						<!-- Heading -->
						<h5 class="widget-header text-center">What would you rate
							<br>
							this product</h5>
						<!-- Rate -->
						<div class="starrr"></div>
					</div>
					<!-- Safety tips widget -->
					<div class="widget disclaimer">
						<h5 class="widget-header">Highest Bid</h5>
						<ul>
							<li><?php echo $row_max['Username']; ?> Has bidded <?php echo $row_bid['Price']; ?></li>
							
						</ul>
					</div>
					<!-- Coupon Widget -->
					<div class="widget coupon text-center">
						<!-- Coupon description -->
						<p>Have a great product to post ? Share it with
							your fellow users.
						</p>
						<!-- Submii button -->
						<a href="" class="btn btn-transparent-white">Submit Listing</a>
					</div>

				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>
<?php
include 'Footer.php';
?>
