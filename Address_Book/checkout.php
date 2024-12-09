<?php
include('header.php');
include('config.php');

?>
<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <div class="block billing-details">
                  <h4 class="widget-title">Place An Order</h4>
                  <form class="checkout-form" method="post" action="">
                     <div class="form-group">
                        <label for="full_name">Name</label>
                        <input type="text" class="form-control" namr="name" placeholder="">
                     </div>
                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="">
                     </div>
                    
                        <div class="form-group">
                           <label for="user_post_code">E-Mail</label>
                           <input type="email" class="form-control"vname="email" value="">
                        </div>
                        <div class="form-group" >
                           <label for="user_city">Work Phone No</label>
                           <input type="tel" class="form-control"  name="workphone" value="">
                        </div>
                   
                     <div class="form-group" >
                           <label for="user_city">Cell No</label>
                           <input type="tel" class="form-control"  name="cell" value="">
                        </div>
						
						<div class="form-group" >
                           <label for="user_city">D.O.B</label>
                           <input type="date" class="form-control"  name="dob" value="">
                        </div>
						
						<div class="form-group" >
                           <label for="user_city">Category</label>
                           <input type="text" class="form-control"  name="category" value="">
                        </div>
						
						<div class="form-group" >
                           <label for="user_city">Remarks</label>
                           <input type="text" class="form-control"  name="remarks" value="">
                        </div>
                  </form>
               </div>
               <div class="block">
                  <h4 class="widget-title">Payment Method</h4>
                  
                  <div class="checkout-product-details">
                     <div class="payment">
                        <div class="card-details">
                           <form  class="checkout-form">
						   <label class="radio-inline">
      <input type="radio" name="optradio" checked>Easy Paisa
    </label>
    <label class="radio-inline"   >
      <input type="radio" name="optradio" >Cash On Delivery
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio">Credit Card
    </label>
                            
                           </form>
						   <a href="confirmation.php" class="btn btn-main mt-20">Place Order</a >
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">
                     <h4 class="widget-title">Order Summary</h4>
                     <div class="media product-card">
                        <a class="pull-left" href="product-single.html">
                           <img class="media-object" src="images/shop/cart/cart-1.jpg" alt="Image" />
                        </a>
                        <div class="media-body">
                           <h4 class="media-heading"><a href="product-single.html">Ambassador Heritage 1921</a></h4>
                           <p class="price">1 x $249</p>
                           <span class="remove" >Remove</span>
                        </div>
                     </div>
                     <div class="discount-code">
                        <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
                     </div>
                     <ul class="summary-prices">
                        <li>
                           <span>Subtotal:</span>
                           <span class="price">$190</span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span>Free</span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Total</span>
                        <span>$250</span>
                     </div>
                     <div class="verified-icon">
                        <img src="images/shop/verified.png">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
   <!-- Modal -->
   <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-body">
               <form>
                  <div class="form-group">
                     <input class="form-control" type="text" placeholder="Enter Coupon Code">
                  </div>
                  <button type="submit" class="btn btn-main">Apply Coupon</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <?php
include('footer.php');
?>