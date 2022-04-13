<?php
include('../config.php');
if(isset($_GET['deletecategoryid']))
{
$categoryid=$_GET['deletecategoryid'];
$delete="delete from tbl_category where Category_id=$categoryid";
$result=mysqli_query($conn,$delete);
if($result)
{
   header('location:categorydetails.php');
}
}
?>