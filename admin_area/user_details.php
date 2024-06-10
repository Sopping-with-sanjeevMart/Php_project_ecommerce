<?php 
include('../includee/connection.php');

?>
<h1 class="text-center text-success">User Details</h1>
    <table class="table table-bordered text-center">
  <thead class="thead-dark text-muted">
    <?php 
    $view_user="SELECT * FROM `user_table`";
    $result=mysqli_query($con,$view_user);
    $row_count=mysqli_num_rows($result);
    
  if($row_count==0){
    echo "<h2 class='text-danger  text-center'>No user </h1>";
  }
  else{
    echo "<tr>
    <th scope='col'>User Id</th>
    <th scope='col'>User name</th>
    <th scope='col'>User Email</th>
    
    
    <th scope='col'>User Image</th>
    
    <th scope='col'>User Address</th>
    <th scope='col'>User Phone</th>
    <th>Delete</th>
  </tr>
  </thead>
  <tbody>";

    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        
$user_id=$row_data['user_id'];
$user_name=$row_data['user_name'];

$user_email=$row_data['user_email'];
//$user_password=$row_data['user_password'];
$user_image=$row_data['user_image'];

//$user_ip=$row_data['user_ip'];
$user_address=$row_data['user_address'];
$user_phone=$row_data['user_phone'];
$number++;?>

        <tr>
        <td><?php echo  $number; ?></td>
    
        <td><?php echo $user_name; ?></td>
<td><?php echo $user_email; ?></td>
        <td><?php echo '<img src="user_area".$user_image>'; ?></td>
    
        <td><?php echo $user_address; ?></td>
        <td><?php echo $user_phone; ?></td>
        <td><a href='index.php?remove_user_from_table=<?php echo $user_id; ?>' class='text-danger'><i class='fa-solid fa-trash'></i></td>
    </tr>
    <?php
    }
    
  }
    
    ?>
   
</tbody>
</table>