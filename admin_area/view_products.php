<?php
include('../includee/connection.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
<!--------------------------font awesome kit link----------------------------->
<script src="https://kit.fontawesome.com/1320ab3d4e.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center text-success">All Products</h1>
    <table class="table table-bordered text-center">
  <thead class="thead-dark text-muted">
    <tr>
      <th scope="col">Product Id</th>
      <th scope="col">Product title</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Price</th>
      <th scope="col">Total Sold</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $number=0;

$get_products="SELECT * FROM `products`";
$run_query=mysqli_query($con,$get_products);

while($row=mysqli_fetch_assoc($run_query)){
    
    $product_id=$row['product_id'];
    $product_tile=$row['product_title'];
    $product_image=$row['product_image1'];
    $product_price=$row['product_price'];
    $product_status=$row['status']; 
    $number++;
    ?>
    <tr>
    <td><?php echo $number; ?></td>
    <td><?php echo $product_tile; ?></td>
    <td><img src='./product_images/<?php echo $product_image; ?>' class='product_img'></td>
    <td><?php echo $product_price;?></td>
    <td><?php 
    $get_count="SELECT * FROM `order_pending` WHERE product_id=$product_id";
    $result_count=mysqli_query($con,$get_count);
    $rows_count=mysqli_num_rows($result_count);
    echo $rows_count;
    ?></td>
    <td><?php echo $product_status;?></td>
    <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-success'><i class='fa-solid fa-pen-to-square'></i></a></td>
    <td><a href='index.php?delete_products=<?php echo $product_id; ?>' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>
    
    
  </tr>
  <?php
}
?>
    
  </tbody>
</table>


    
</body>
</html>