<?php
include('../includee/connection.php'); 
if(isset($_GET['delete_order_list'])){
    $delete_order_id=$_GET['delete_order_list'];
    $delete_query="DELETE FROM `user_orders` WHERE order_id=$delete_order_id";
    $run_query=mysqli_query($con,$delete_query);
    if($run_query){
        echo "<script>alert('orders deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }




}
?>