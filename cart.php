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
   <!-- <img src="image/logo2.png" alt="" class="logo">--><h1 style="display:inline-flex;background:#fff"><span style="font-size:16px;"><i>F</i></span><span style="font-size:23px;color:#ff004f">Mart</span></h1>
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
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
        <sup style="color:red"><?php cart_items(); ?></sup></a>
        </li>
        
       
      </ul>
      
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
<!---fourth child -->
<div class="container">
    <form action="" method="post">
    <div class="row">
        <table class="table table-bordered text-center">
           <!-- <thead>
                <tr>
                    <th>Product title</th>
                    <th>Product image</th>
                    <th>Quantity</th>
                    <th>
                Total Price
                    </th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>

                </tr>
    </thead>-->
    <tboady>
        <!----php code to display dynamic data--->
        <?php 
        
        global $con;
    $get_ip_add=getIPAddress();
    $total_price=0;
    $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    $result_count=mysqli_num_rows($result);
    if($result_count>0){

      echo " <thead>
      <tr>
          <th>Product title</th>
          <th>Product image</th>
          <th>Quantity</th>
          <th>
      Total Price
          </th>
          <th>Remove</th>
          <th colspan='2'>Operations</th>

      </tr>
</thead>";

    
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_products="SELECT* FROM  `products` WHERE product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $product_table=$row_product_price['product_price'];
        $product_title=$row_product_price['product_title'];
        $product_image=$row_product_price['product_image1'];

        $product_values=array_sum($product_price);
        $total_price+=$product_values;
         
        ?>
        <tr>
            <td><?php echo  $product_title; ?></td>
            <td><img src="./admin_area/product_images/<?php echo $product_image;?>" style="width:80px;height:80px;object-fit:contain;" class="cart_img"></td>
            <td>
              <input type="text" class="form-input"  name="qty">
          </td>
            <?php
            global $con;
            $get_ip_add=getIPAddress();
            if(isset($_POST['update_cart'])){
                $quantities=$_POST['qty'];
                $update_carts="UPDATE `cart_details` SET quantity=$quantities WHERE ip_address= '$get_ip_add'";
                $result_Quantity=mysqli_query($con,$update_carts);
                $total_price=(int)$total_price*(int)$quantities;

            }
            ?>
            <td><?php echo $product_table; ?></td>
            <td><input type="checkbox" name="removeitem[]" value="<?php  echo $product_id; ?>"></td>
            <td >
                <!--<button class=" btn btn-info border-0 text-center">Update</button>-->
        <input type="submit" value="update" class="btn btn-info border-0 text-center"  name="update_cart">
        <input type="submit" value="remove" class="btn btn-info border-0 text-center"  name="remove_cart">

               <!--<button class=" btn btn-info border-0 text-center">Remove</button>-->
    </td>
    </td>
    </tr>
    <?php 
     }
    }}
    else{
      echo '<h2 class="text-center text-danger">Cart is Empty</h2>';

      
    }

    ?>

    </tboady>
        </table>
        <!-----subtotal----->
        <div class="d-flex mb-5">
          <?php 
          global $con;
          $get_ip_add=getIPAddress();
         // $total_price=0;
          $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0){
            echo "
            <h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price/</strong></h4>
            <a href='index.php' class='btn btn-info px-3 border-0 mx-3'>Continue Shopping</a>
            <a href='user_area/checkout.php' class='btn btn-secondary px-3 border-0 text-light'>Checkout </a>";
            
    

          }
          else{
  echo"<a href='index.php' class='btn btn-info px-3 border-0 mx-3'>Continue Shopping</a>";
          }
          
          ?>
           <!-- <h4 class="px-3">Subtotal:<strong class="text-info">'/</strong></h4>
            <a href="index.php"><button class="bg-info px-3  border-0 mx-3">Continue Shopping</button></a>
            <a href="#"><button class="bg-secondary px-3 border-0 text-light">Checkout</button></a>-->
    </div>

    </div>
</div>
</form>
<!-------------------------------------function to remove cart------------------------->

<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="DELETE FROM `cart_details` WHERE product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item=remove_cart_item();


?>
<!--last child -->
<!--include footer-->
<?php include("./includee/footer.php") ?>

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