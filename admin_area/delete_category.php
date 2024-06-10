<?php
include('../includee/connection.php'); 
if(isset($_GET['delete_category'])){
    $category_id=$_GET['delete_category'];
    $delete_query="DELETE FROM `categories` WHERE category_id=$category_id";
    $run_query=mysqli_query($con,$delete_query);
    if($run_query){
        echo "<script>alert('category deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }




}
?>