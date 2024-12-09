<?php
include('../config.php');
if(isset($_GET['deleteproductid']))
{
$productid=$_GET['deleteproductid'];
$delete="delete from tbl_product where Product_id=$productid";
$result=mysqli_query($conn,$delete);
if($result)
{
   header('location:productdetails.php');
}
}
?>