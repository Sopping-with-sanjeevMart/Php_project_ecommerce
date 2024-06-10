<?php 
include('../includee/connection.php');
if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    //echo $edit_brand;
    $get_brand="SELECT * FROM `brands` WHERE brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brand);
    $row_data=mysqli_fetch_assoc($result);
    $brand_title=$row_data['brand_title'];
    //echo $brand_title;
}
if(isset($_POST['update_brand'])){
    $brand_title=$_POST['brand_title'];
    $update_query="UPDATE `brands` SET brand_title='$brand_title' WHERE brand_id=$edit_brand";
    $result_brand=mysqli_query($con,$update_query);
    if($result_brand){
        echo "<script>alert('brand updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }


}
?>
    <div class="container mt-3">
        <h1 class="text-center">Edit Brand </h1>
        <form action="" method="post" class="text-center">
            <div class="form-outline mb-4 m-auto w-50">
                <label for="brand_title" class="form-label">Brand title</label>
                <input type="text" name="brand_title" id="brand_title" class="form-control" required="required" value="<?php echo $brand_title; ?>">
            </div>
            <input type="submit" value="update Brand" class="btn btn-info px-3 mb-3" name="update_brand">
</form>
</div>
