<?php
session_start();
if($_SESSION['Userid'] == null)
{
header('location:login.php');
}
include('config.php');
$User_id=$_SESSION['Userid'];
$Query_Select="SELECT tbl_cart.Cart_id, tbl_cart.Cart_User_id,tbl_product.Product_Name,tbl_cart.Product_Quantity,tbl_product.Product_Image,tbl_product.Product_Price from tbl_cart inner join tbl_product on tbl_product.Product_id = tbl_cart.Cart_Product_id where tbl_cart.Cart_User_id = $User_id ";
$Result_Select=mysqli_query($conn,$Query_Select);
if(isset($_POST['Btn_Remove']))
{
  $Cart_id=$_POST['Cart_id'];
  $Query_Delete="Delete from tbl_Cart  where Cart_id = $Cart_id";
  $Result_Delete=mysqli_query($conn,$Query_Delete);
  header('location:cart.php');
}

if(isset($_POST['Btn_minus']))
{ 
  
  $Cart_id=$_POST['Cart_id'];
  $Product_Quantity=$_POST['Product_Quantity'];
  if($Product_Quantity > 0)
  {
  $Product=$Product_Quantity - 1;
  $Query_Minus="Update tbl_cart set Product_Quantity = $Product where Cart_id = $Cart_id";
  $Result_Minus=mysqli_query($conn,$Query_Minus);
  header('location:cart.php');
  }
}

include('header.php');
?>
<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
   
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                     <th class="">Item Quantity</th>
                      <th class="">Item Price</th>
                      
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  

                
                    <?php
                    while($Row_Select=mysqli_fetch_array($Result_Select)){
                    ?>
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          <img width="80" src="Pro_Images/<?php echo $Row_Select['Product_Image']?>" alt="" />
                          <a href="#!"><?php echo $Row_Select['Product_Name']?></a>
                        </div>
                      </td>
                      <td class="">
                      <form action="cart.php" method="post"> 
                      <input type="hidden" value="<?php echo $Row_Select['Cart_id']?>" name="Cart_id"/>
                     <!-- minus button
                      -->
                      <button type="submit" id="plus" name="Btn_minus<?php echo $Row_Select['Cart_id']?>" class="btn btn-light btn-lg text-dark">
								-</button>
           <input type="number" id="qty" value="<?php echo $Row_Select['Product_Quantity']?>"/>  
            
             <input type="hidden" value="<?php echo $Row_Select['Product_Quantity']?>" name="Product_Quantity"/>

             
									<button type="submit" id="minus" name="Btn_add" class="btn btn-light btn-lg text-dark">
                 
								+</button>
             
                        <form/>
                        <?php 

                     
                        if(isset($_POST['Btn_add']))  //.$Row_Select['Cart_id']]))
                          {
             //name="Btn_add<?php echo $Row_Select['Cart_id']            
                            echo $Row_Select['Cart_id'];
                            $Cart_id=$_POST['Cart_id'];
                            $Product_Quantity=$Row_Select['Product_Quantity'];
                            $Product=$Product_Quantity + 1;
                            $Query_Add="Update tbl_cart set Product_Quantity = $Product where Cart_id = $Cart_id";
                            $Result_Add=mysqli_query($conn,$Query_Add);
                           
                          
                          }
                        ?>
                      </td>
                      <td class=""><?php $Price = $Row_Select['Product_Price'] * $Row_Select['Product_Quantity'];
                     
                      ?> Rs. <?php echo $Price?> </td>
                      
                      <td class="">
                        <form action="cart.php" method="post"> 
                        <input type="hidden" value="<?php echo $Row_Select['Cart_id']?>" name="Cart_id"/>
                        <input type="Submit"  class="product-remove" href="#!" name="Btn_Remove"  value="Remove"/>
                        <form/>
                      </td>
                    </tr>
                   <?php
                    }
                   ?>
                  </tbody>
                </table>    
                 <a href="index.php" class="btn btn-main pull-left">Cancel</a>
                <a href="checkout.php" class="btn btn-main pull-right">Checkout</a>

       
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

$(document).ready(function(){
var x=0;
  $("#plus").click(function(){
    x++;
$("#qty").val(x);
  });

});

</script>
<?php
include('footer.php');
?>