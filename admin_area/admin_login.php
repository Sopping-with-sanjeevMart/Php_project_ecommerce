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
    <title>Admin login page</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid my-3">
<h3 class="text-center"> Admin Login</h3>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
        <form action="" method="post">
            <!-------------------------------username----------------------------->
        
            <div class="form-outline mb-4">
       <label for="admin_name" class="form-label" >name</label>
      <input type="text" id="admin_name" class="form-control" placeholder="enter your username" autocomplete="off"  required="required" name="admin_name"></div>
             <!---------------------password field------------------->
      <div class="form-outline mb-4">
      <label for="admin_password" class="form-label" >Password</label>
      <input type="password" id="admin_password" class="form-control" placeholder="enter your password" autocomplete="off"  required="required" name="admin_password"></div>
      
      <!-----------------------------------Login button---------------------------->
      <div class="mt-4 pt-2">
        <input type="submit" value="Login" class="btn btn-info py-2 px-3 border-0" name="login">
        <p class="small fw-bold mt-2 pt-2 mb-0">Don't have an account<a href="admin_registration.php" class="text-danger"> Register</a></p>
</div>
 
</form>
</div>
</div>

</div>


    
</body>
</html>
<?php 
global $con;
if(isset($_POST['login'])){
    $username=$_POST['admin_name'];
    
    $password=$_POST['admin_password'];
    $sql="SELECT * FROM `admin_table` WHERE admin_name='$username'";
    $result=mysqli_query($con,$sql);
    $num_row=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    //$user_ip=getIPAddress();
    //cart item
    /*$select_query="SELECT * FROM `cart_details`  WHERE  ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query);
   $row_count_cart=mysqli_num_rows($select_cart);*/
    if($num_row>0){
        
        $_SESSION['adminname']=$username;
    
    
        if(password_verify($password,$row_data['admin_password'])){
            if($num_row==1){
               // $_SESSION['username'];
                 $_SESSION['adminname']=$username;
            echo "<script>alert('login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else{
           // $_SESSION['username'];
            $_SESSION['adminname']=$username;
            echo "<script>alert('login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }
        }
        else{
            echo "<script>alert('invalid credentials')</script>";
        }
        
    }
    else{
        echo "<script>alert('invalid credential')</script>";
    }


}


?>

