<?php 
include("../includee/connection.php");
include("../functions/common_function.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Page</title>
     <!-- bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
<div class="container-fluid my-3">
    <h3 class="text-center">New User Registration</h3>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
        <form action="" method="post" enctype="multipart/form-data">
            <!-------------username field---->
            <div class="form-outline mb-4">
       <label for="user_username" class="form-label" >Username</label>
      <input type="text" id="user_username" class="form-control" placeholder="enter your username" autocomplete="off"  required="required" name="user_username"></div>
      <!----------------------email field--------->
      <div class="form-outline mb-4">
      <label for="user_email" class="form-label" >Email</label>
      <input type="email" id="user_email" class="form-control" placeholder="enter your email" autocomplete="off"  required="required" name="user_email"></div>
       <!----------------------user images--------->
       <div class="form-outline mb-4">
      <label for="user_image" class="form-label" >Image</label>
      <input type="file" id="user_image" class="form-control" required="required" name="user_image"></div>


      <!---------------------password field------------------->
      <div class="form-outline mb-4">
      <label for="user_password" class="form-label" >Password</label>
      <input type="password" id="user_password" class="form-control" placeholder="enter your password" autocomplete="off"  required="required" name="user_password"></div>
      <!----------------------------confirm password----------------------->
      <div class="form-outline mb-4">
      <label for="confirm_password" class="form-label" >Confirm password</label>
      <input type="password" id="confirm_password" class="form-control" placeholder="enter confirm password" autocomplete="off"  required="required" name="confirm_password"></div>
      <!----------------------------address field----------------------->
      <div class="form-outline mb-4">
      <label for="user_address" class="form-label" >User Address</label>
      <input type="text" id="user_address" class="form-control" placeholder="enter your address" autocomplete="off"  required="required" name="user_address"></div>
      <!----------------------------Contact field----------------------->
      <div class="form-outline mb-4">
      <label for="user_contact" class="form-label" >User Contact </label>
      <input type="text" id="user_contact" class="form-control" placeholder="enter your contact number" autocomplete="off"  required="required" name="user_contact"></div>
      <!---------------------------------------Registration Button----------------------->
      <div class="mt-4 pt-2">
        <input type="submit" value="Register" class="btn btn-info py-2 px-3 border-0" name="register" >
        <p class="small fw-bold mt-2 pt-2 mb-0">Already have an account<a href="user_login.php" class="text-danger"> Login</a></p>
</div>




</form>
</div>
</div>
</div>
<?php 

global $con;
if(isset($_POST['register'])){
    $user_name=$_POST['user_username'];
    $_SESSION['username']=$user_name;
    echo $_SESSION['username'];


    
     $user_email=$_POST['user_email'];
     
     $user_password=$_POST['user_password'];
     $hash_password=password_hash("$user_password", PASSWORD_DEFAULT);//for password hashing
     $confirm_password=$_POST['confirm_password'];
     $user_address=$_POST['user_address'];
     $user_contact=$_POST['user_contact'];
     $user_ip=getIPAddress();
    
     $choose=$_FILES['user_image'];
     $img_name=$choose['name'];
     $img_type=$choose['type'];
     $img_tmp_name=$choose['tmp_name'];
     $filename_seperation=explode('.',$img_name);
     $img_index=strtolower(end($filename_seperation));
     $extension=array("jpeg","jpg","png");


     $sql="SELECT * FROM `user_table` WHERE user_name='$user_name' OR user_email='$user_email'";
$result=mysqli_query($con,$sql);
if($result){
    $num=mysqli_num_rows($result);
    if($num>0){

echo "<script>alert('username and email already exist')</script>";
    }
    elseif($user_password!=$confirm_password){
echo "<script>alert('password and confirm password doesn't match')</script>";
        
    }
    else{

        if(in_array($img_index,$extension)){
            $upload_image='./user_images/'.$img_name;
            move_uploaded_file($img_tmp_name,$upload_image);
    
         $sql="INSERT INTO `user_table`(`user_name`,`user_email`,`user_password`,`user_image`,`user_ip`,`user_address`,`user_phone`)VALUES('$user_name','$user_email','$hash_password','$upload_image','$user_ip','$user_address','$user_contact')";
         $result=mysqli_query($con,$sql);
         if($result){
             echo "<script>alert('user signed up successfully')</script>";
            echo "<script>window.open('user_login.php','_self')</script>";
         }
         else{
             die(mysqli_error($con));
         }
         
    }
    }
}
    
//selecting cart items
$select_cart_items="SELECT * `cart_details` FROM WHERE ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
if($result_cart){


$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
    $_SESSION['username'];
   // $_SESSION['username']='$user_name';
    
    
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}
else{
    echo "<script>window.open('../index.php')
    </script>";
}
}}

?>
</body>
</html>
