<!--connection file -->
<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>

    Checkout page</title>
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
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        
        
       
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      
       <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

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
          <a class='nav-link' href='./user_area/user_login.php'>login</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/user_logout.php'>Logout</a>
        </li>";
        }
          ?>
       <!-- <li class="nav-item">
          <a class="nav-link" href="./user_area/user_login.php">login</a>
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
  <div class="col-md-12">
    
    <!--product -->

    <div class="row">
        <?php
        if(!isset($_SESSION['username'])){
            include("user_login.php");
        }
        else{
            include("payment.php");
        }
        ?>
    </div>
    <!---------------col end-------------------->
</div>
</div>
<!--last child -->
<!--include footer-->

<?php include("../includee/footer.php"); ?>



</div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>