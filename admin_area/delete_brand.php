<?php
include('../includee/connection.php'); 
if(isset($_GET['delete_brand'])){
    $brand_id=$_GET['delete_brand'];
    $delete_query="DELETE FROM `brands` WHERE brand_id=$brand_id";
    $run_query=mysqli_query($con,$delete_query);
    if($run_query){
        echo "<script>alert('brand deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }




}
?>