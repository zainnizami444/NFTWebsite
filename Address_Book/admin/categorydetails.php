<?php
include('header.php');
include ('../config.php');

?>

<main class="content">
<div class="container-fluid p-0">
				<div class="input-group ml-5">
     
        <div class="container-fluid p-0">
				<div class="input-group ml-5">
          <?php
          
	$showcategory = "select * from tbl_category";
	$result_select = mysqli_query($conn,$showcategory);
          if(isset($_POST['Search']))
          {
            $search=$_POST['Search_category'];
            $showcategory="select * from tbl_category where Category_Name Like '%$search'";
            $result_select=mysqli_query($conn,$showcategory);
        
          }
          if(isset($_POST['reset']))
          {
            $showcategory = "select * from tbl_category";
            $result_select = mysqli_query($conn,$showcategory);
          }
          ?>
     <form action="categorydetails.php" method="post">
	 <input type="text" placeholder="Search.." name="Search_category">
	  
	  <input type="submit" class="btn btn-sm btn-primary" value="Search" name="Search"/>
    <input type="submit" class="btn btn-sm btn-primary" value="X" name="reset"/>
    </form>
    
	  </div>

	  </div>
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3 text-center"><strong>Category</strong> Details</h1>
  <div class= "content-body">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">

  <div class="col-md-12">
	
	<div class="table-responsive bg-white">
  <table class="table" >
      <thead>
      <tr>
        
        <th scope="col">Category Name</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        <th scope="col"> <a href="addcategory.php"  class="btn btn-primary" >Insert<a/></th>
      </tr>
      </thead>
     <tbody>
     <?php

   
        while($row=mysqli_fetch_array($result_select))
        {
            $categoryid=$row['Category_id'];
            $categoryname=$row['Category_Name'];
            echo ' <tr>
        
            <td>'.$categoryname.'</td>
        
            <td><a href="categoryupdate.php?updatecategoryid='.$categoryid.'"><button type="button" class="btn btn-success">Update</button></a></td>
            <td><a href="categorydelete.php?deletecategoryid='.$categoryid.'"><button type="button" class="btn btn-danger">Delete</button></a></td>
            <td></td>
            </tr>';
        }
    
    ?>
          </tbody>
	  
  </table>
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
