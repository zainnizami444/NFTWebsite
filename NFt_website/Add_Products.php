<?php
session_start();
include 'connection.php';
include 'Header.php';
$user= $_SESSION['Userid']; 

if($_SESSION['Userid']!=null)
{
   
    
}
else
{
    header("Location:Login.php");
}
$query_select="Select * from user where Userid ='$user'";
$result_Select=mysqli_query($conn,$query_select);
$row=mysqli_fetch_array($result_Select);
if(isset($_POST['Add']))
{
$Userid=$user;
$Pro_Name=$_POST['Pro_Name'];
$Pro_img=$_FILES['Pro_img']['name'];
$Pro_type=$_FILES['Pro_img']['type'];
$temp_name=$_FILES['Pro_img']['tmp_name'];
$Pro_price=$_POST['Pro_price'];
$Start_date=$_POST['Start_date'];
$End_date=$_POST['End_date'];
$Description=$_POST['Description'];

if( $Pro_type=="image/png"||$Pro_type=="image/jpeg"||$Pro_type=="image/jpg" )
{
	if($Start_date == date("Y-m-d") && $End_date > date("Y-m-d"))
{
    $query_insert = "insert into product values(null,'$Pro_img','$Pro_Name','$Description','
	$Start_date','$End_date',$Userid,$Pro_price,4,1)";
    move_uploaded_file($temp_name,'img/'.$Pro_img);
    $result_insert = mysqli_query($conn,$query_insert);
	$query_sasa="select * from product where Proname='$Pro_Name'";
	$result_sasa = mysqli_query($conn,$query_sasa);
	$row_sasa= mysqli_query($conn,$result_sasa);
	$id=$row_['Proid'];
	$query_bid="insert into bid values(null,$Userid,$id,$Pro_price,1,CURRENT_DATE)";
	$result_bid=mysqli_query($conn,$query_bid);
	

}

elseif($Start_date > date("Y-m-d") && $End_date > date("Y-m-d"))
{
    $query_insert = "insert into product values(null,'$Pro_img','$Pro_Name','$Description','
	$Start_date','$End_date',$Userid,$Pro_price,4,3)";
    move_uploaded_file($temp_name,'img/'.$Pro_img);
    $result_insert = mysqli_query($conn,$query_insert);

}
else{
	echo'<script> alert("Date is invalid") </script>';
}

}}


?>
       
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
<!-- page title -->
<!--================================
=            Page Title            =
=================================-->
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>Add Products</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
<!-- page title -->

<!-- contact us start-->
<section class="section">
    <div class="container">
 

        <div class="row">
          
            
            <div class="col-md-12">
                    <form action="Add_Products.php" method="post" enctype=multipart/form-data>
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
									<label>Product Name</label>
                                        <input type="text" placeholder="Product Name" name="Pro_Name" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 pt-2">
									<label>Product Image</label>
                                        <input type="file" placeholder="Product image" name="Pro_img" class="form-control" required>
                                    </div><div class="col-lg-12 py-2">
									<label>Price</label>
                                        <input type="number" placeholder="Price" name="Pro_price"class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 pt-2">
									<label>Start Date</label>
									<input type="date" placeholder="Start_date" name="Start_date"class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 py-2">
									<label>End Date</label>  
									<input type="date" placeholder="End_date" name="End_date"class="form-control" required>
                                    </div>
                                </div>
                            </div>
							<label>Description</label>
                            <textarea name="Description" id=""  placeholder="Description" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                            <div class="btn-grounp">
                                <input type="submit"name="Add" class="btn btn-primary mt-2 float-right" value="Add"/>
                            </div>
                        </fieldset>
                    </form>
            </div>
        </div>
    </div>
</section>
<!-- contact us end -->

<?php

include 'footer.php';

?>