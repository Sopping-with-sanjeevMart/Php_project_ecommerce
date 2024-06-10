<?php 
include("../includee/connection.php");
include("../functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
    <!-------php code to access user id------------------------->
    <?php 
    $user_ip=getIPAddress();
    $sql="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
    $result=mysqli_query($con,$sql);
    $run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];
    
    
    ?>
    <div class="container ">
   <h2 class="text-center text-info my-5"> Payment Option</h2>
   <div class="row d-flex justify-content-center align-item-center">
    <div class="col-6">
        <a href="https://paypal.com"><img src="upi-image.jpg" style="width:100%;height:300px;" ></a>
</div>
<div class="col-6">
<a href="order.php?user_id=<?php  echo $user_id; ?>"><h2  class="text-center">Pay offline</h2></a>
</div>
</div>
</div>
   
    
</body>
</html>