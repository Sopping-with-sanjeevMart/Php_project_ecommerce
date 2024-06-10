<?php 
include('../includee/connection.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status="true";
//accessing images
$product_image1=$_FILES['product_image1']['name'];
$product_image2=$_FILES['product_image2']['name'];
$product_image3=$_FILES['product_image3']['name'];
//accessing images tmp_name
$tmp_image1=$_FILES['product_image1']['tmp_name'];
$tmp_image2=$_FILES['product_image2']['tmp_name'];
$tmp_image3=$_FILES['product_image3']['tmp_name'];
//checking empty condition
if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or  $product_brands=='' or
$product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
    echo "<script>alert('please fill the all available fields')</script>";
    exit();
}
else{
    move_uploaded_file($tmp_image1,"./product_images/$product_image1");
    move_uploaded_file($tmp_image2,"./product_images/$product_image2");
    move_uploaded_file($tmp_image3,"./product_images/$product_image3");
}
//insert query
$insert_products="insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,
product_image1,product_image2,product_image3,product_price,date,status) values('$product_title','$description','$product_keywords'
,' $product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',
NOW(),'$product_status')";
$result=mysqli_query($con,$insert_products);
if($result){
    echo "<script>alert('added successfully')</script>";


}





}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Insert Products-admin_dashboard</title>
        <!---bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font-awesome -->
    <script src="https://kit.fontawesome.com/1320ab3d4e.js" crossorigin="anonymous"></script>

    <!--css file-->
    <link rel="stylesheet" href="../style.css">

</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert products</h1>
        <!--form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!--title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="enter product title" autocomplete="off" required="required">
            </div>
            <!--description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="enter product title" autocomplete="off" required="required">
            </div>
            <!--keywords-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="enter product title" autocomplete="off" required="required">
            </div>
            <!--categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">select category</option>
                    <?php 
                    $select_query="select * from `categories`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        
                        echo "<option value='$category_id'>$category_title</option>";
                        
                        
                    }
                    ?></select></div>
                    <!--brands -->
                 <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                <option value="">select brands</option>
                <?php 
                    $select_query="select * from `brands`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        
                        echo "<option value='$brand_id'>$brand_title</option>";
                        
                        
                    }
                    ?></select> </div>
 
                

                   <!-- <option value="">category1</option>
                    <option value="">category2</option>
                    <option value="">category3</option>
                    <option value="">category4</option>-->

                        
                 
                                   <!--
                    <option value="">brand1</option>
                    <option value="">brand2</option>
                    <option value="">brand3</option>
                    <option value="">brand4</option>
                -->


                 
                 <!--image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image1</label>
                <input type="file" name="product_image1" id="product_image1" 
                class="form-control" required="required">
            </div>
         
               <!--image 2-->
               <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image2</label>
                <input type="file" name="product_image2" id="product_image2" 
                class="form-control" required="required">
            </div>
             <!--image 3-->
               <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image3</label>
                <input type="file" name="product_image3" id="product_image3" 
                class="form-control" required="required">
            </div>
            <!--price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" 
                class="form-control" required="required">
            </div>
            <!--price-->
            <div class="form-outline mb-4  w-50 m-auto"><input type="submit" name="insert product" 
                class="btn btn-info mb-3 px-3" value="insert product"></div>


        </form>

</div>

</body>
</html>