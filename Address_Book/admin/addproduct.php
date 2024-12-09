<?php
ob_start();
include('header.php');
include ('../config.php');
?>
<?php

if(isset($_POST['addproduct']))
{
    $Product_Name=$_POST['Product_Name'];
    $Product_Image=$_FILES['Product_Image']['name'];
    $Product_type=$_FILES['Product_Image']['type'];
    $temp_name=$_FILES['Product_Image']['tmp_name'];
    $Product_Price=$_POST['Product_Price'];
    $Product_Category=$_POST['category'];
    if( $Product_type=="image/png"||$Product_type=="image/jpeg"||$Product_type=="image/jpg" )
{
    $Query_Insert="Insert into tbl_product values(null,'$Product_Name','$Product_Image',$Product_Price,$Product_Category)";
    $Result_Insert=mysqli_query($conn,$Query_Insert);
    move_uploaded_file($temp_name,'../Pro_Images/'.$Product_Image);
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
					<h1 class="h3 mb-3 text-center"><strong>Add</strong> Products</h1>
<div class= "content-body">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                            
                                    <form action="addproduct.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label><strong>Product</strong></label>
                                            <input type="text" name="Product_Name" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label><strong>Price</strong></label>
                                            <input type="text" name="Product_Price" class="form-control" required>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label><strong>Image</strong></label>
                                           
                                            <input type="file" name="Product_Image" class="form-control" required>
                                        </div>
                                        <div class="form-group" required>
                                            <label><strong>Select Category</strong></label>
                                            <select name="category" class="form-control" required>
                                            
                                            <?php
                                           
                                           $select_category= "select * from tbl_category";
                                           $result_select=mysqli_query($conn,$select_category);
                                           while($row_select=mysqli_fetch_array($result_select)) 
                                           {
                
                                              echo '<option value='.$row_select['Category_id'].'>'.$row_select['Category_Name'].'</option>';
                        
                                               }
                                           ?>
                                            </select>
                                           <br/>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                           
                                            
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="addproduct" class="btn btn-primary btn-block">Add Product</button>
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
<?php
ob_flush();
?>  