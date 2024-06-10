
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_orders_table</title>
</head>
<body>
    <?php 
    $username=$_SESSION['username'];
    $get_user="SELECT * FROM `user_table` WHERE user_name='$username'";
    $run_query=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($run_query);
    $user_id=$row_fetch['user_id'];
    
    ?>


<table class="table table-info">
  <thead>
    <tr>

    <th scope="col">SI.no</th>
    <th scope="col">Order Id</th>
      <th scope="col">Amount Due</th>
      <th scope="col">Total Products</th>
      <th scope="col">Invoice Number</th>
      <th scope="col">Date</th>
      <th scope="col">Complete/Incomplete</th>
      <th scope="col">Status</th>
    </tr>
    
  </thead>
  <tbody>
  <?php 
$get_orders_details="SELECT * FROM `user_orders` WHERE user_id= $user_id";
$result_orders=mysqli_query($con,$get_orders_details);

$number=1;
while($row_orders=mysqli_fetch_assoc($result_orders)){
    $order_id=$row_orders['order_id'];
    
    $amount_due=$row_orders['amount_due'];
    $total_products=$row_orders['total_products'];
    $invoice_number=$row_orders['invoice_number'];
    $order_date=$row_orders['order_dates'];
$order_status=$row_orders['order_status'];
if($order_status=='pending'){
    $order_status='incomplete';
}
else{
    $order_status='complete';
}
//$number=1; 


echo "<tr>
<td>$number</td>
<td>$order_id</td>
<td>$amount_due</td>
<td>$total_products</td>
<td>$invoice_number</td>
<td>$order_date</td>
<td>$order_status</td>"

?>
<?php 
if($order_status=='complete'){
    echo "<td>Paid</td>";
}
else{
    echo "<td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>;


    </tr>";
}


$number++;

 
}
?> 

  </tbody>
</table>
    
</body>
</html>