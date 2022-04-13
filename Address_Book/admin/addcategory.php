<?php
ob_start();
include('header.php');
include ('../config.php');
?>
<?php
if(isset($_POST['add_category']))
{
$categoryname=$_POST['category_name'];
$category="insert into tbl_category values('','$categoryname')";
$result=mysqli_query($conn,$category);
if($result>0)
{
header('location:categorydetails.php');
}
else
{
echo "Something went wrong";   
}
}

?>
<main class="content">

				<div class="container-fluid p-0">
					<h1 class="h3 mb-3 text-center"><strong>Add</strong> Category</h1>
<div class= "content-body">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                            
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label><strong>Category</strong></label>
                                            <input type="text" name="category_name" class="form-control" required>
                                        </div>
                                       
                                       
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                           
                                            
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="add_category" class="btn btn-primary btn-block">Add Category</button>
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