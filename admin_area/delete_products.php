<?php 
include('../includee/connection.php');

if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    $delete_products="DELETE FROM `products` WHERE product_id=$delete_id";
    $delete_query=mysqli_query($con,$delete_products);
    if($delete_query){
        echo "<script>alert('product deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>
