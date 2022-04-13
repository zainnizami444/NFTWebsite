<?php
include('header.php');
include ('../config.php');

?>

<main class="content">
<div class="container-fluid p-0">
				<div class="input-group ml-5">
        <?php
          $Query_Select = "select tbl_product.Product_id,tbl_product.Product_Name,tbl_product.Product_Image ,tbl_product.Product_Price,tbl_category.Category_Name from tbl_product inner join tbl_category on tbl_product.Product_Category_id= tbl_category.Category_id   ORDER BY Product_id ASC ";
$Result_Select = mysqli_query($conn,$Query_Select);
 
                  if(isset($_POST['Search']))
                  {
                  
                    $category=$_POST['category'];
                    $Product=$_POST['Product'];
                    if( $category && $Product){
                      
                    $Query_Select="select tbl_product.Product_id,tbl_product.Product_Name,tbl_product.Product_Image ,tbl_product.Product_Price,tbl_category.Category_Name from tbl_product inner join tbl_category on tbl_product.Product_Category_id= tbl_category.Category_id where Category_Name Like '%$category'And Product_Name Like '%$Product'  ORDER BY Product_id ASC";
                    $Result_Select=mysqli_query($conn,$Query_Select);
                  }  elseif ($Product && $category =="None") {
                      $Query_Select="select tbl_product.Product_id,tbl_product.Product_Name,tbl_product.Product_Image ,tbl_product.Product_Price,tbl_category.Category_Name from tbl_product inner join tbl_category on tbl_product.Product_Category_id= tbl_category.Category_id where  Product_Name Like '%$Product' ORDER BY Product_id ASC";
                      $Result_Select=mysqli_query($conn,$Query_Select);
                    }
                    elseif ($category) {
                      $Query_Select="select tbl_product.Product_id,tbl_product.Product_Name,tbl_product.Product_Image ,tbl_product.Product_Price,tbl_category.Category_Name from tbl_product inner join tbl_category on tbl_product.Product_Category_id= tbl_category.Category_id where  Category_Name Like '%$category'  ORDER BY Product_id ASC";
                      $Result_Select=mysqli_query($conn,$Query_Select);
                    }
                  
                    else
                    {

                    }
                    $Result_Select=mysqli_query($conn,$Query_Select);
                
                  }
                  if(isset($_POST['reset']))
                  {
                    $Query_Select = "select tbl_product.Product_id,tbl_product.Product_Name,tbl_product.Product_Image ,tbl_product.Product_Price,tbl_category.Category_Name from tbl_product inner join tbl_category on tbl_product.Product_Category_id= tbl_category.Category_id   ORDER BY Product_id ASC ";
                    $Result_Select = mysqli_query($conn,$Query_Select);
                     
                  }
                  ?>
          <form action="productdetails.php" method="post">
          <input type="text" class="form-control"  name="Product" placeholder=""/>
<br/>
    <select name="category" class="form-control" >
  <option value="None" > None </option>
 <?php
 
 $select_category= "select * from tbl_category";
 $result_select=mysqli_query($conn,$select_category);
 while($row_select=mysqli_fetch_array($result_select)) 
 {
                
    echo '<option value='.$row_select['Category_Name'].'>'.$row_select['Category_Name'].'</option>';
                        
     }
 ?>
  </select>  
  <br/>
          <input type="submit" class="btn btn-sm btn-primary" value="Search" name="Search"/>
          
           <input type="submit" class="btn btn-sm btn-primary" value="X" name="reset"/>
</form>  
  </div>
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3 text-center"><strong>Product</strong> Details</h1>
  <div class= "content-body">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">

  <div class="col-md-12">
	
	<div class="table-responsive bg-white">
  <table class="table" >
      <thead>
      <tr>
   
        <th scope="col">Image</th> 
        <th scope="col">Name</th>
       
        <th scope="col">Price</th>

        <th scope="col">Category</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        <th><a href="addproduct.php"><button type="button" class="btn btn-primary">Insert</button></a></th>
      </tr>
      </thead>
     <tbody>
       
     <?php
     while($row=mysqli_fetch_array($Result_Select))
        {
            $productid=$row['Product_id'];
            $productname=$row['Product_Name'];
            $productimage=$row['Product_Image'];
            $productprice=$row['Product_Price'];
            $categoryid=$row['Category_Name'];
            echo ' <tr>
           
            <td><img src="../Pro_Images/'.$productimage.'" width="100px" height="100px"></td>
             <th scope="row">'.$productname.'</th>
            <td>'.$productprice.'</td>
            <td>'.$categoryid.'</td>
            
            <td><a href="productupdate.php?updateproductid='.$productid.'"><button type="button" class="btn btn-success">Update</button></a></td>
            <td><a href="productdelete.php?deleteproductid='.$productid.'"><button type="button" class="btn btn-danger">Delete</button></a></td>
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
