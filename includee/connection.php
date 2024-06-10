<?php
$con=mysqli_connect("localhost","root","","mystore");
if($con){
    //echo "connection successfull";
    }
    else{
        die(mysqli_error($con));
    }
?>