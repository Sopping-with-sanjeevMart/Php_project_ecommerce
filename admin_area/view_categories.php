<?php
include('../includee/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
    <!---bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--------------------------font awesome kit link----------------------------->
<script src="https://kit.fontawesome.com/1320ab3d4e.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center text-success">All Categories</h1>
    <table class="table table-bordered text-center">
  <thead class="thead-dark text-muted">
    <tr>
      <th scope="col">SIno</th>
      <th scope="col">Category title</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <tbody>
    <?php 
    $select_cat="SELECT * FROM `categories`";
    $cat_result=mysqli_query($con,$select_cat);
    $number=0;
    while($cat_row=mysqli_fetch_assoc($cat_result)){
        $number++;
    $category_id=$cat_row['category_id'];
    $category_title=$cat_row['category_title'];


 ?>
   <tr> 
    <td><?php echo $number; ?></td>
    <td><?php echo $category_title; ?></td>
    <td><a href="index.php?edit_category=<?php echo $category_id; ?>" class="text-success"><i class='fa-solid fa-pen-to-square'></i> </a></td>
    <td><a href="index.php?delete_category=<?php echo $category_id; ?>" class="text-danger"><i class='fa-solid fa-trash'></i></td>
</tr>
<?php 
    }
?>
</tbody>
</table>
    
</body>
</html>