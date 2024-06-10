<?php
include('../includee/connection.php'); 
if(isset($_GET['remove_user_from_table'])){
    $user_id=$_GET['remove_user_from_table'];
    $delete_query="DELETE FROM `user_table` WHERE user_id=$user_id";
    $run_query=mysqli_query($con,$delete_query);
    if($run_query){
        echo "<script>alert(' removed successfully')</script>";
        echo "<script>window.open('./index.php?user_details','_self')</script>";
    }




}
?>