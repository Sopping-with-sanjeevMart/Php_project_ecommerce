<?php

if(isset($_GET['edit_account'])){
    $user_session=$_SESSION['username'];
    $user_select_info="SELECT * FROM `user_table` WHERE `user_name`='$user_session'";

    $user_info_query=mysqli_query($con,$user_select_info);
    $user_info_fetch=mysqli_fetch_assoc($user_info_query);
    $user_id=$user_info_fetch['user_id'];
    $user_name=$user_info_fetch['user_name'];
    $user_email=$user_info_fetch['user_email'];
    $user_address=$user_info_fetch['user_address'];
    $user_mobile=$user_info_fetch['user_phone'];}
    if(isset($_POST['submit'])){
        $update_id= $user_id;
        $edit_username=$_POST['user_name'];
        $edit_email=$_POST['user_email'];
        $edit_address=$_POST['user_address'];
        $edit_phone=$_POST['user_mobile'];
       $image_name=$_FILES['user_image']['name'];
     $image_temp_name=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($image_temp_name,"../user_area/user_images/$image_name");
        $edit_user_info="UPDATE `user_table` set user_name='$edit_username',user_email='$edit_email',user_address='$edit_address',user_image='$image_name',user_phone='$edit_phone' WHERE user_id=$update_id";
        $edit_query=mysqli_query($con,$edit_user_info);
        if($edit_query){
            echo "<script>alert('user info updated successfully')</script>";
            echo "<script>window.open('user_logout.php','_self')</script>";
        }
        else{
            die(mysqli_error($con));
        }

        


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page</title>
     <!-- bootstrap js link -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center text-success">Edit Account Activation</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
       
      <input type="text"  class="form-control w-50 m-auto" value="<?php echo $user_name ?>" name="user_name">
    </div>
      
      <div class="form-outline mb-4">
    <input type="text"  class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
</div>
<div class="form-outline mb-4 d-flex w-50 m-auto ">
    <input type="file"  class="form-control" name="user_image">
    <img src="<?php echo $Image_src ;?>" style="width:100px;height:100px">
</div>
<div class="form-outline mb-4">
    <input type="text"  class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
</div>
<div class="form-outline mb-4">
    <input type="text"  class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
</div>
<input type="submit"  class=" btn btn-danger border-0 my-3" name="submit" value="submit">

</form>
</body>
</html>