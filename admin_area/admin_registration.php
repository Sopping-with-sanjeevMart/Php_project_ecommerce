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
    <title>Admin Registration Page</title>
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
       <label for="admiin_name" class="form-label" >Name</label>
      <input type="text" id="admin_name" class="form-control" placeholder="enter your name" autocomplete="off"  required="required" name="admin_name"></div>
      <!----------------------email field--------->
      <div class="form-outline mb-4">
      <label for="admin_email" class="form-label" >Email</label>
      <input type="email" id="admin_email" class="form-control" placeholder="enter your email" autocomplete="off"  required="required" name="admin_email"></div>
       
      <!---------------------password field------------------->
      <div class="form-outline mb-4">
      <label for="admin_password" class="form-label" >Password</label>
      <input type="password" id="admin_password" class="form-control" placeholder="enter your password" autocomplete="off"  required="required" name="admin_password"></div>
      <!----------------------------confirm password----------------------->
      <div class="form-outline mb-4">
      <label for="confirm_password" class="form-label" >Confirm password</label>
      <input type="password" id="confirm_password" class="form-control" placeholder="enter confirm password" autocomplete="off"  required="required" name="confirm_password"></div>
      <!---------------------------------------Registration Button----------------------->
      <div class="mt-4 pt-2">
        <input type="submit" value="Register" class="btn btn-info py-2 px-3 border-0" name="register" >
        <p class="small fw-bold mt-2 pt-2 mb-0">Already have an account<a href="admin_login.php" class="text-danger"> Login</a></p>
</div>
</div>
</div>
</div>
</form>
<?php 

global $con;
if(isset($_POST['register'])){
    $admin_name=$_POST['admin_name'];
    $_SESSION['adminname']=$admin_name;
    echo $_SESSION['adminname'];


    
     $admin_email=$_POST['admin_email'];
     
     $admin_password=$_POST['admin_password'];
     $hash_password=password_hash("$admin_password", PASSWORD_DEFAULT);//for password hashing
     $confirm_password=$_POST['confirm_password'];
        /*  $user_ip=getIPAddress();
    
     $choose=$_FILES['user_image'];
     $img_name=$choose['name'];
     $img_type=$choose['type'];
     $img_tmp_name=$choose['tmp_name'];
     $filename_seperation=explode('.',$img_name);
     $img_index=strtolower(end($filename_seperation));
     $extension=array("jpeg","jpg","png");*/


     $sql="SELECT * FROM `admin_table` WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
$result=mysqli_query($con,$sql);
if($result){
    $num=mysqli_num_rows($result);
    if($num>0){

echo "<script>alert('adminname and email already exist')</script>";
    }
    elseif($admin_password!=$confirm_password){
echo "<script>alert('password and confirm password doesn't match')</script>";
        
    }
    else{

       /* if(in_array($img_index,$extension)){
            $upload_image='./user_images/'.$img_name;
            move_uploaded_file($img_tmp_name,$upload_image);*/
    
         $sql="INSERT INTO `admin_table`(`admin_name`,`admin_email`,`admin_password`)VALUES('$admin_name','$admin_email','$hash_password')";
         $result=mysqli_query($con,$sql);
         if($result){
             echo "<script>alert('admin signed up successfully')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
         }
         else{
             die(mysqli_error($con));
         }
         
    }
    }
}

?>
</body>
</html>