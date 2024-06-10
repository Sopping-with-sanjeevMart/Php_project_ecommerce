<?php
include('../includee/connection.php'); 
if(isset($_GET['delete_payment'])){
    $delete_payment_order_id=$_GET['delete_payment'];
    $delete_query="DELETE FROM `user_payments` WHERE order_id=$delete_payment_order_id";
    $run_query=mysqli_query($con,$delete_query);
    if($run_query){
        echo "<script>alert(' deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_payment','_self')</script>";
    }




}
?>