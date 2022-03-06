<?php
session_start();
include 'connection.php';
include 'Header.php';

if($_SESSION['Username']!=null)
{
   $user= $_SESSION['Username']; 
    
}
else
{
    header("Location:Login.php");
}
$query_Select="select * from user where Username ='$user'";
$result_Select=mysqli_query($conn,$query_Select);
$row=mysqli_fetch_array($result_Select);
if(isset($_POST['save'])){
    $id=$_POST['Userid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $contact=$_POST['contact'];
    $Username=$_POST['Username'];
    
  
    $query_update_user = "update user set Fname='$fname',Lname='$lname',contact=$contact,Username = '$Username'where Userid = $id";

$result_update = mysqli_query($conn,$query_update_user);


}
if(isset($_POST['file']))
{
    $id=$_POST['Userid'];
    $imagename=$_FILES['Image_upload']['name'];
    $imgtype=$_FILES['Image_upload']['type'];
    $temp_name=$_FILES['Image_upload']['tmp_name'];
    if( $imgtype=="image/png"||$imgtype=="image/jpeg"||$imgtype=="image/jpg")
{
    $query_update_img="update user set 	img='$imagename' where Userid='$id'";
    move_uploaded_file($temp_name,'img/'.$imagename);
    $result_img=mysqli_query($conn,$query_update_img);
}
else{
    echo'<script> alert("Seleted image is not type of png or jpg or jpeg") </script>';
}
}
if(isset($_POST['Change_pass']))
{

    $id=$_POST['Userid'];
    $current_pass=$_POST['current_password'];
    $new_pass=$_POST['new_pass'];
    $confirm_pass=$_POST['confirm_pass'];
    $verify_pass=password_verify($current_pass,$row['Pass']);
    if( $verify_pass == $row['Pass'])
    {
        if($new_pass == $confirm_pass)
        {
            
            $hash=password_hash($new_pass,PASSWORD_DEFAULT);
            $query_update_pass="update user set Pass='$hash' where Userid='$id'";
            $result=mysqli_query($conn,$query_update_pass);
    

            

        }
        else {
            echo'<script> alert("New Passowrd and Confirm Password Does not match") </script>';
        }
    }
    else {
        echo'<script> alert("Current Password Does not match") </script>';
    }
}
if(isset($_POST['Change_Email'])){

    $id=$_POST['Userid'];
    $current_email=$_POST['current_email'];
    $new_email=$_POST['new_email'];
    if($current_email == $row['Email']){
    
    $query_update_pass="update user set Email='$new_email' where Userid='$id'";
    $result=mysqli_query($conn,$query_update_pass);
    }
}
?>

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user">
						<!-- User Image -->
						<div class="image d-flex justify-content-center">
							<img src="img/<?php echo $row['img']?>" alt="" class="">
                            <br/>
					</div>
						<!-- User Name -->
						<h5 class="text-center"><?php echo $row['Username']?></h5>
                        	<!-- File chooser -->
								<div class="form-group choose-file d-inline-flex">
								<form action="User_profile.php" method="post"enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $row['Userid']  ?> " name="Userid">
									<input type="file" class="form-control form-control-file mt-2 pt-1" id="input-file" name="Image_upload" >
                                    <input type="submit" class=" btn-transparent"name="file"value="Change">
								 </div>
					</div>
					<!-- Dashboard Links -->
					<div class="widget dashboard-links">
						<ul>
							<li><a class="my-1 d-inline-block" href="">Savings Dashboard</a></li>
							<li><a class="my-1 d-inline-block" href="">Saved Offer <span>(5)</span></a></li>
							<li><a class="my-1 d-inline-block" href="">Favourite Stores <span>(3)</span></a></li>
							<li><a class="my-1 d-inline-block" href="">Recommended</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Edit profile</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
				</div>
				<!-- Edit Personal Info -->
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Edit Personal Information</h3>
							<form action="User_profile.php" method="post" enctype="multipart/form-data">
								<!-- First Name -->
                                <input type="hidden" value="<?php echo $row['Userid']  ?> " name="Userid"/>
								<div class="form-group">
									<label for="first-name">First Name</label>
									<input type="text" class="form-control" id="first-name" name="fname" value="<?php echo $row['Fname'];?>">
								</div>
								<!-- Last Name -->
								<div class="form-group">
									<label for="last-name">Last Name</label>
									<input type="text" class="form-control" id="last-name" name="lname"value="<?php echo $row['Lname'];?>">
								</div>
								
								<!-- Comunity Name -->
								<div class="form-group">
									<label >Username</label>
									<input type="text" class="form-control" name="Username" Value="<?php echo $row['Username']?>">
								</div>
								<div class="form-group">
									<label >Contact</label>
									<input type="number" class="form-control" name="contact" Value="<?php echo $row['contact']?>">
								</div>
							
								
								<!-- Submit button -->
								<input class="btn btn-transparent" name="save"type="submit"value="Save My Changes"/>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Password -->
					<div class="widget change-password">
						<h3 class="widget-header user">Edit Password</h3>
						<form action="User_profile.php" method="post">
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-password">Current Password</label>
                    <input type="hidden" value="<?php echo $row['Userid']  ?> " name="Userid">
								<input type="password" class="form-control" id="current-password " name="current_password">
							</div>
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password">New Password</label>
								<input type="password" class="form-control" id="new-password" name="new_pass">
							</div>
							<!-- Confirm New Password -->
							<div class="form-group">
								<label for="confirm-password">Confirm New Password</label>
								<input type="password" class="form-control" id="confirm-password"
                                name="confirm_pass">
							</div>
							<!-- Submit Button -->
							<input type="submit"class="btn btn-transparent" name="Change_pass" value="Change Password">
						</form>
					</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Email Address -->
					<div class="widget change-email mb-0">
						<h3 class="widget-header user">Edit Email Address</h3>
						<form action="User_profile.php" method="post">
							<!-- Current Password -->
                            <input type="hidden" value="<?php echo $row['Userid']  ?> " name="Userid">
							<div class="form-group">
								<label for="current-email">Current Email</label>
								<input type="email" class="form-control" id="current-email" name="current_email">
							</div>
							<!-- New email -->
							<div class="form-group">
								<label for="new-email">New email</label>
								<input type="email" class="form-control" id="new-email" name="new_email">
							</div>
							<!-- Submit Button -->
							<input type="submit" class="btn btn-transparent" name="Change_Email"value="Change email">
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
include 'footer.php';
?>