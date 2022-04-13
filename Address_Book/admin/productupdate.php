<?php
ob_start();
include('header.php');
include('../config.php');
$productid=$_GET['updateproductid'];
$Query_Select = "select tbl_product.Product_id,tbl_product.Product_Name,tbl_product.Product_Image ,tbl_product.Product_Price,tbl_category.Category_Name from tbl_product inner join tbl_category on tbl_product.Product_Category_id= tbl_category.Category_id   where Product_id=$productid ";
if(isset($_POST['updateproduct']))
{
$productname=$_POST['productname'];
$productimage=$_FILES['productimage']['name'];
$tempimage=$_FILES['productimage']['tmp_name'];
$productprice=$_POST['productprice'];
$productquantity=$_POST['productquantity'];
$category=$_POST['category'];
//UPDATE `product` SET `productname` = '1', `productprice` = '120000', `productimage` = 'Screenshot (6).png', `categoryid` = '18' WHERE `product`.`productid` = 24
$updateproduct="update tbl_product set Product_Name='$productname',Product_Image='$productimage',Product_Price='$productprice',Category_id='$category' where Product_id='$productid'";
$result=mysqli_query($conn,$updateproduct);
move_uploaded_file($tempimage,'../Pro_Images/'.$productimage);
if($result>0)
{
 
header('location:productdetails.php');
}
}

?>

<main class="content">
<div class="container-fluid p-0">
				<div class="input-group ml-5">
     
	 <input type="text" placeholder="Search..">
	  
	  <button type="button" class="btn btn-primary">Search
		<i class="fas fa-search"></i>
</button>
	  </div>
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3 text-center"><strong>Update</strong> Products</h1>
<div class= "content-body">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                            
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label><strong>Product</strong></label>
                                            <input type="text" name="productname" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label><strong>Price</strong></label>
                                            <input type="text" name="productprice" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Quantity</strong></label>
                                            <input type="number" name="productquantity" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Image</strong></label>
                                            <input type="file" name="productimage" class="form-control" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Select Category</strong></label>
                                         
                                            <select name="category" class="form-control">
                                            <option value="">None</option>
                                            <?php
        
                                           $selectcategory= "select * from category";
                                           $res=mysqli_query($conn,$selectcategory);
                                           while($row=mysqli_fetch_array($res)) 
                                           {
                
                                              echo '<option value='.$row['categoryid'].'>'.$row['categoryname'].'</option>';
                        
                                               }
                                           ?>
                                            </select>
                                           <br/>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                           
                                            
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="updateproduct" class="btn btn-primary btn-block">Update Product</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<?php
include('footer.php');
?>

