<!--connection file -->
<?php
include('../includee/connection.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>

    ecommerce webisite</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- fontsome link -->
    <script src="https://kit.fontawesome.com/1320ab3d4e.js" crossorigin="anonymous"></script>
    <!--css file -->
    <link rel="stylesheet" href="style.css">
    <style>
      .profile_img{
        width:100px;
        height:100px;
        margin:auto;
        display:block;
        border-radius:50%;
        
      }
      
      </style>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0" >
        <!--first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
   <!-- <img src="image/logo2.png" alt="" class="logo">--><h1 style="display:inline-flex;background:#fff"><span style="font-size:16px;"><i>F</i></span><span style="font-size:23px;color:#ff004f">Mart</span></h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i>
        <sup style="color:red;"><?php cart_items(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:<?php total_cart_price(); ?>/-</a>
        </li>
        
       
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      
       <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!--calling cart function-->
<?php  cart();?>
<!--second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <ul class="navbar-nav me-auto">
  <!--<li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>-->
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>".$_SESSION['username']."</a>
        </li>";
        }
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='user_login.php'>login</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='user_logout.php'>Logout</a>
        </li>";
        }
          ?>
        
</ul >
</nav>
<!--third child -->
<div  class="bg-light">
  <h3 class="text-center"> 
    Hidden store
</h3>
  <p class="text-center">
    communication is at the heart of e-commerce and community
</p>
</div>
<!--fourth child-->

<div class="row">
    <div class="col-md-2 p-0">
        <ul class="navbar-nav bg-secondary text-center " style="height:100%">
        <li class="nav-item bg-info my-3" >
          <a class="nav-link text-light" href="../index.php"><h4>Your Profile</h4></a>
        </li>
        <!--<li class="nav-item">
          <img src="../dresses/gown.jpg" class="profile_img" alt="">
        </li>-->
        <?php 
$username=$_SESSION['username'];
global $con;
$Image_query="SELECT * FROM `user_table` WHERE `user_name`='$username'";
    $Image_result=mysqli_query($con,$Image_query);
    
   $Image_row=mysqli_fetch_assoc($Image_result);

    $Image_src=$Image_row['user_image'];
    
    
    echo "<li class='nav-item'>
    <img src='$Image_src' class='profile_img' alt=''>

  </li>";
   
   

?>

        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php">Pending Orders</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="user_logout.php">Logout</a>
        </li>
        </ul>
    </div>
    <div class="col-md-10">
    <?php get_user_order_details(); 
    if(isset($_GET['edit_account'])){
      include('edit.php');
    }
    if(isset($_GET['my_orders'])){
      include('user_orders.php');
    }
    if(isset($_GET['delete_account'])){
      include('delete_user_account.php');
    }
    
    
    ?>
    </div>
</div>
<!--last child -->
<!--include footer-->
<?php include("../includee/footer.php") ?>

<!--
<div  class="bg-info p-0 text-center">
    <p>
        All right reserved 0- Designed by Anjali-2023
    </p>
</div>-->


</div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>