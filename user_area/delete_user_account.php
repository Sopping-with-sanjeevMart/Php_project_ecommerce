<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete user account</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center text-danger">Delete Account</h3>
    <form action="" method="post" class="mt-5">
    <div class="form-outline mb-4" >
       
      <input type="submit"  class="form-control w-50 m-auto" value="Delete Account" name="delete">
    </div>
    <div class="form-outline mb-4" >
       
      <input type="submit"  class="form-control w-50 m-auto" value="Don't Delete Account" name="Dont_delete">
    </div>
    <?php 
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="DELETE FROM `user_table` WHERE user_name='$username_session'";
        $run_delete_query=mysqli_query($con,$delete_query);
        if($run_delete_query){
            session_destroy();
            echo "<script>alert('Account Deleted Successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
        

    }
    if(isset($_POST['Dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";


    }

    

    
    
    ?>
    
    
</body>
</html>