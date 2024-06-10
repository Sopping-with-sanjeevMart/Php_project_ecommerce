<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>

    Admin dashboard</title>
    <!---bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font-awesome -->
    <script src="https://kit.fontawesome.com/1320ab3d4e.js" crossorigin="anonymous"></script>

    <!--css file-->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin-image{
    width:100px;
    height:7%;
    object-fit:contain;

}
.footer{
    position:absolute;
    bottom:0;
    left:0;
}
.product_img{
    width:20%;
    object-fit:contain;
}
        </style>

    </head>
<body>
    <!--navbar -->
<div class="container-fluid p-0">
    <!--first child -->

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
        
        <!--<img src="../image/logo2.png" alt="" class="logo">--><h1 style="display:inline-flex;background:#fff"><span style="font-size:16px;"><i>F</i></span><span style="font-size:23px;color:#ff004f">Mart</span></h1>
        <nav class="navbar navbar-expand-lg ">
            <ul class="navbar-nav">
               <!-- <li class="nav-item">
                    <a href="" class="nav-link">welcome guest</a>
</li>
<li class="nav-item">
                    <a href="admin_registration.php" class="nav-link">register</a>
</li>-->
<?php
        if(!isset($_SESSION['adminname'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }
        else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome   ".$_SESSION['adminname']."</a>
        </li>";
        }
        ?>
        <?php
        if(!isset($_SESSION['adminname'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='admin_login.php'>login</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='admin_logout.php'>Logout</a>
        </li>";
        }
          ?>
</ul>
</nav>
</div>
</nav>
<!--second child -->
<div  class="bg-light">
    <h3  class="text-center p-2"> Manage details</h3>
</div>
<!-- third child -->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div  class="px-4"> 
        <!--<a href="#"><img src="../image/strawberry.png" alt="" class="admin-image"></a>-->
        
            <p class="text-light text-center" style="margin-bottom:0"><?php echo $_SESSION['adminname'];?></p>
</div>
<!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
<div class="button text-center ">
    <button class="my-2 "><a href="insert_product.php" class="nav-link text-light bg-info my-1">
        Insert products</a></button>
    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a></button>
    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">insert categories</a></button>
    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View categories </a></button>
    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert brands</a></button>
    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View brands</a></button>
    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
    <button><a href="index.php?view_payment" class="nav-link text-light bg-info my-1">All payments</a></button>
    <button><a href="index.php?user_details" class="nav-link text-light bg-info my-1">LIst users</a></button>
    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
    
    
</div>
    </div>
</div>
<!--fourth child -->
<div class="container my-5">
    <?php
    if(isset($_GET['insert_category'])){
        include('insert_categories.php');

    }
    if(isset($_GET['insert_brand'])){
        include('insert_brands.php');

    }
    if(isset($_GET['view_products'])){
        include('view_products.php');

    }
    if(isset($_GET['edit_products'])){
        include('edit_products.php');

    }
    if(isset($_GET['delete_products'])){
        include('delete_products.php');

    }
    if(isset($_GET['view_categories'])){
        include('view_categories.php');

    }
    if(isset($_GET['view_brands'])){
        include('view_brands.php');
    }

    if(isset($_GET['view_brands'])){
        include('view_brands.php');

    }
    if(isset($_GET['edit_category'])){
        include('edit_category.php');

    }
    if(isset($_GET['edit_brand'])){
        include('edit_brand.php');

    }
    if(isset($_GET['delete_category'])){
        include('delete_category.php');

    }
    if(isset($_GET['delete_brand'])){
        include('delete_brand.php');

    }
    if(isset($_GET['list_orders'])){
        include('list_orders.php');

    }
     
     if(isset($_GET['delete_order_list'])){
        include('delete_order_list.php');

    }
    if(isset($_GET['view_payment'])){
        include('view_payment.php');

    }
    if(isset($_GET['delete_payment'])){
        include('delete_payment.php');

    }
    if(isset($_GET['user_details'])){
        include('user_details.php');

    }
    if(isset($_GET['remove_user_from_table'])){
        include('remove_user_from_table.php');

    }
     ?>

</div>
<!--last child -->

<?php include("../includee/footer.php") ?>


</div>
<!---bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>





</body>
</html>