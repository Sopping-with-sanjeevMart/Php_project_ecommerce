<?php 
include('../includee/connection.php');

?>
<h1 class="text-center text-success">View All Payments</h1>
    <table class="table table-bordered text-center">
  <thead class="thead-dark text-muted">
    <?php 
    $view_payment="SELECT * FROM `user_payments`";
    $result=mysqli_query($con,$view_payment);
    $row_count=mysqli_num_rows($result);
    
  if($row_count==0){
    echo "<h2 class='text-danger  text-center'>No Payment</h1>";
  }
  else{
    echo "<tr>
    <th scope='col'>SI no</th>
    <th scope='col'>Invoice number</th>
    <th scope='col'>Amount</th>
    
    <th scope='col'>Payment mode</th>
    <th scope='col'>date</th>
    <th scope='col'>Delete</th>
  </tr>
  </thead>
  <tbody>";

    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        
$payment_id=$row_data['payment_id'];
$order_id=$row_data['order_id'];


$Invoice_no=$row_data['invoice_number'];
$amount=$row_data['amount'];
$payment_mode=$row_data['payment_mode'];
$date=$row_data['date'];
$number++;?>

        <tr>
        <td><?php echo  $number; ?></td>
    
        <td><?php echo $Invoice_no; ?></td>
        <td><?php echo $amount; ?></td>
        <td><?php echo $payment_mode; ?></td>
        <td><?php echo $date; ?></td>
        <td><a href='index.php?delete_payment=<?php echo $order_id; ?>' class='text-danger'><i class='fa-solid fa-trash'></i></td>
    </tr>
    <?php
    }
    
  }
    
    ?>
   
</tbody>
</table>