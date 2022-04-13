<?php
include 'config.php';
session_start();

$msg="";
if(isset($_POST['login']))
{
   $Username = $_POST['Username'];
   $Password = $_POST['Password'];
   $Query_Select="Select * from tbl_user where User_Name = '$Username'";
   $Result_Select=mysqli_query($conn,$Query_Select);
   $Row_Verify=mysqli_fetch_array($Result_Select);

   $Pass = password_verify($Password ,$Row_Verify['User_Password']);


	$count=mysqli_num_rows($Result_Select);
  if($count>0)
  {
  if($Pass == $Row_Verify['User_Password'])
  {
  $_SESSION['Userid'] =$Row_Verify['User_id'];
header('location:cart.php');   
  }
  else
  {
    $msg="Invalid password";
  }
  }
 else
{

	$msg= "Login Failed";

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Famms| Login</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.html">
            <img src="images/logo.png" alt="">
          </a>
          <h2 class="text-center">Welcome Back</h2>
          <p class="text-center text-dark">
            <?php
             if(isset($_SESSION['message'])){
             echo $_SESSION['message'];
            }
            else{
              echo $_SESSION['message']="Login To Your Account";
               }
            ?>
            
          </p>
          <form class="text-left clearfix" action="" method="post" >
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Username" name="Username" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="Password"  required>
            </div>
            <div class="text-center">
              <button type="submit" name="login" class="btn btn-main text-center" >Login</button>
            </div>
            <div class="text-center text-danger">
                        <?php
                        echo $msg;
                      
                        ?>
                            </div>
          </form>
          <p class="mt-20">New in this site ?<a href="register.php"> Create New Account</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    


  </body>
  </html>