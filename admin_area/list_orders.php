<?php 
include('../includee/connection.php');

?>
<h1 class="text-center text-success">All orders</h1>
    <table class="table table-bordered text-center">
  <thead class="thead-dark text-muted">
    <?php 
    $view_orders="SELECT * FROM `user_orders`";
    $result=mysqli_query($con,$view_orders);
    $row_count=mysqli_num_rows($result);
    
  if($row_count==0){
    echo "<h2 class='text-danger text-center'>No Orders</h1>";
  }
  else{
    echo "<tr>
    <th scope='col'>SI no</th>
    <th scope='col'>
      Due amount
    </th>
    <th scope='col'>Invoice number</th>
    <th scope='col'>Total Products</th>
    
    <th scope='col'>Order Date</th>
    <th scope='col'>Status</th>
    <th scope='col'>Delete</th>
  </tr>
  </thead>
  <tbody>";

    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        
$order_id=$row_data['order_id'];
$user_id=$row_data['user_id'];

$Due_amount=$row_data['amount_due'];
$Invoice_no=$row_data['invoice_number'];
$total_products=$row_data['total_products'];
$order_dates=$row_data['order_dates'];
$status=$row_data['order_status'];
$number++;?>

        <tr>
        <td><?php echo  $number; ?></td>
        <td><?php echo $Due_amount; ?></td>
        <td><?php echo $Invoice_no; ?></td>
        <td><?php echo $total_products; ?></td>
        <td><?php echo $order_dates; ?></td>
        <td><?php echo $status; ?></td>
        <td><a href='index.php?delete_order_list=<?php echo $order_id; ?>' class='text-danger'><i class='fa-solid fa-trash'></i></td>
    </tr>
    <?php
    }
    
  }
    
    ?>
   
</tbody>
</table>