<!--connection file -->
<?php
include('includee/connection.php');
include('functions/common_function.php');
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
      .card-img-top{
        width:100%;
        height:200px;
        object-fit:contain;
      }
      
      </style>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <!--<img src="image/logo2.png" alt="" class="logo">--><h1 style="display:inline-flex;background:#fff"><span style="font-size:16px;"><i>F</i></span><span style="font-size:23px;color:#ff004f">Mart</span></h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php 
        if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/profile.php'>My Account</a>
        </li> ";

        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
        </li>";
        }
        ?>
        <!--<li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
        <sup style="color:red;"><?php cart_items(); ?></sup></a>
          <!--<a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
        <sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:100/-</a>
        </li>-->
        <li class="nav-item">
        <a class="nav-link" href="#">Total price:<?php total_cart_price(); ?>/-</a>
    </li>
        
       
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      
       <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!--second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <ul class="navbar-nav me-auto">
 <!--- <li class="nav-item">
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
          <a class='nav-link' href='./user_area/user_login.php'>login</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/user_logout.php'>Logout</a>
        </li>";
        }
          ?>
        <!--<li class="nav-item">
          <a class="nav-link" href="#">login</a>
        </li>-->
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

<!--fourth child -->
<div  class="row" >
  <div class="col-md-10">
    <!--product -->
    <div class="row">
      <!---------------------------fetching products---------------------------->
      <?php 
      //calling functions
      get_all_products();
      getuniquecate();
      getuniquebrands();
      
      /*<$select_query="select * from `products` order by rand()";
      $result_query=mysqli_query($con,$select_query);
      $row=mysqli_fetch_assoc($result_query);
      echo $row['product_title'];
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        
        echo "<div class='col-md-4'>
        <div class='card' style='width: 18rem;'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'> $product_title</h5>
      <p class='card-text'> $product_description</p>
      <a href='#' class='btn btn-info'>Add to cart</a>
      <a href='#' class='btn btn-secondary'>View more</a>
    </div>
  </div>
        </div>";
        
      }*/
      
      
      ?>
      <!--<div class="col-md-4 ">
      <div class="card" style="width: 18rem;">
  <img src="image/strawberry.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
      </div>-->
      <!--
<div class="col-md-4">
<div class="card" style="width: 18rem">
  <img src="image/tomato.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-4">
<div class="card" style="width: 18rem;">
  <img src="image/strawberry.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-4">
<div class="card" style="width: 18rem;">
  <img src="image/strawberry.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-4">
<div class="card" style="width: 18rem;">
  <img src="image/strawberry.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-4">
<div class="card" style="width: 18rem;">
  <img src="image/strawberry.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>-->
<!------------------------row_ended div--------------------------------->
</div>
    <!------------------------column_ended div--------------------------------->

</div>
<div class="col-md-2 bg-secondary p-0">
  <!--sidenav -->
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info ">
      <a href="#" class="nav-link text-light">Delivery brands</a>
    </li>
    <?php
    // function calling
    brands();
    /*$select_brands="select * from `brands`";
    $result=mysqli_query($con,$select_brands);
    //$row_data=mysqli_fetch_assoc($result);
    //echo $row_data['brand_title'];
    while($row_data=mysqli_fetch_assoc($result)){
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      //echo $brand_title;
      echo "<li class='nav-item '>
      <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
    </li>";

    }*/

     ?>
    <!--<li class="nav-item ">
      <a href="#" class="nav-link text-light">Brand1</a>
    </li>
    <li class="nav-item ">
      <a href="#" class="nav-link text-light">Brand2</a>
    </li>
    <li class="nav-item ">
      <a href="#" class="nav-link text-light">Brand3</a>
    </li>
    <li class="nav-item ">
      <a href="#" class="nav-link text-light">Brand4</a>
    </li>
    <li class="nav-item ">
      <a href="#" class="nav-link text-light">Brand5</a>
    </li>-->
    </ul>
    <!--catogries -->
    <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info ">
      <a href="#" class="nav-link text-light">Categories
      </a>
    </li>
    <?php
    //function calling
    categories();
    /*$select_cats="select * from `categories`";
    $result=mysqli_query($con,$select_cats);
    //$row_data=mysqli_fetch_assoc($result);
    //echo $row_data['category_title'];
    while($row_data=mysqli_fetch_assoc($result)){
      $cat_title=$row_data['category_title'];
      $cat_id=$row_data['category_id'];
      //echo $cat_title;
      echo "<li class='nav-item '>
      <a href='index.php?cat=$cat_id' class='nav-link text-light'>$cat_title</a>
    </li>";

    }*/


     ?>
     <!--
    <li class="nav-item ">
      <a href="#" class="nav-link text-light">Categories1</a>
    </li>
    <li class="nav-item ">
      <a href="#" class="nav-link text-light">Categories2</a>
    </li>
    <li class="nav-item ">
      <a href="#" class="nav-link text-light">Categories3</a>
    </li>
    <li class="nav-item ">
      <a href="#" class="nav-link text-light">Categories4</a>
    </li>
    <li class="nav-item ">
      <a href="#" class="nav-link text-light">Categoreis5</a>
    </li>
  -->
    </ul>
  
</div>
  

</div>
<!--last child -->
<!----include footer----->
<?php include("./includee/footer.php") ?>



<!--<div  class="bg-info p-0 text-center">
    <p>
        All right reserved 0- Designed by Anjali-2023
    </p>
</div>-->


</div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>