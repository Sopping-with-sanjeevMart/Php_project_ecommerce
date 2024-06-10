<?php
include('../includee/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
    <!--------------------------font awesome kit link----------------------------->
<script src="https://kit.fontawesome.com/1320ab3d4e.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center text-success">All Brands</h1>
    <table class="table table-bordered text-center">
  <thead class="thead-dark text-muted">
    <tr>
      <th scope="col">SIno</th>
      <th scope="col">Brands title</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <tbody>
    <?php 
    $select_brand="SELECT * FROM `brands`";
    $brand_result=mysqli_query($con,$select_brand);
    $number=0;
    while($brand_row=mysqli_fetch_assoc($brand_result)){
        $number++;
    $brand_id=$brand_row['brand_id'];
    $brand_title=$brand_row['brand_title'];


 ?>
   <tr> 
    <td><?php echo $number; ?></td>
    <td><?php echo $brand_title; ?></td>
    <td><a href="index.php?edit_brand=<?php  echo $brand_id; ?>" class="text-success"><i class='fa-solid fa-pen-to-square'></i> </a></td>
    <td><a href="index.php?delete_brand=<?php echo $brand_id; ?>" class="text-danger"><i class='fa-solid fa-trash'></i></td>
</tr>
<?php 
    }
?>
</tbody>
</table>
    
</body>
</html>