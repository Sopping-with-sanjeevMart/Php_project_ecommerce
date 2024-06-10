<?php
//include connect file
//include('./includee/connection.php');
//geeting products
function getproducts(){
    global $con;
    //condition to check isset or not
    if(!isset($_GET['cat'])){
     if(!isset($_GET['brand'])){



    

    $select_query="select * from `products` order by rand() LIMIT 0,2";
      $result_query=mysqli_query($con,$select_query);
      /*$row=mysqli_fetch_assoc($result_query);
      echo $row['product_title'];*/
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        
        echo "<div class='col-md-4'>
        <div class='card' style='width: 18rem;'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'> $product_title</h5>
      <p class='card-text'> $product_description</p>
      <p class='card-text'>Price:$product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
  </div>
        </div>";
        
      }
      
    }
      }
    }
    //getting all products
    function get_all_products(){
      global $con;
      if(!isset($_GET['cat'])){
        if(!isset($_GET['brand'])){
   
   
   
       
   
       $select_query="select * from `products` order by rand()";
         $result_query=mysqli_query($con,$select_query);
         /*$row=mysqli_fetch_assoc($result_query);
         echo $row['product_title'];*/
         while($row=mysqli_fetch_assoc($result_query)){
           $product_id=$row['product_id'];
           $product_title=$row['product_title'];
           $product_description=$row['product_description'];
           $product_keywords=$row['product_keywords'];
           $product_image1=$row['product_image1'];
           $product_price=$row['product_price'];
           $category_id=$row['category_id'];
           $brand_id=$row['brand_id'];
           
           echo "<div class='col-md-4'>
           <div class='card' style='width: 18rem;'>
       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
       <div class='card-body'>
         <h5 class='card-title'> $product_title</h5>
         <p class='card-text'> $product_description</p>
         <p class='card-text'>Price:$product_price/-</p>
         
         <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
         <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

       </div>
     </div>
           </div>";
           
         }
         
       }
         }
   
        }


    
//getting unique categories
function getuniquecate(){
  global $con;
  if(isset($_GET['cat'])){
    
$category_id=$_GET['cat'];



   

   $select_query="select * from `products` where category_id=$category_id";
     $result_query=mysqli_query($con,$select_query);
     $num_of_rows=mysqli_num_rows($result_query);
     if($num_of_rows==0){
      echo "<h2 class='text-center text-danger'>No Stock For This Category</h2>";
     }
     /*$row=mysqli_fetch_assoc($result_query);
     echo $row['product_title'];*/
     while($row=mysqli_fetch_assoc($result_query)){
       $product_id=$row['product_id'];
       $product_title=$row['product_title'];
       $product_description=$row['product_description'];
       $product_keywords=$row['product_keywords'];
       $product_image1=$row['product_image1'];
       $product_price=$row['product_price'];
       $category_id=$row['category_id'];
       $brand_id=$row['brand_id'];
       
       echo "<div class='col-md-4'>
       <div class='card' style='width: 18rem;'>
   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
   <div class='card-body'>
     <h5 class='card-title'> $product_title</h5>
     <p class='card-text'> $product_description</p>
     <p class='card-text'>Price:$product_price/-</p>
     <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

   </div>
 </div>
       </div>";
       
     }
     
   }
     }
     //Getting unique brands
     function getuniquebrands(){
      global $con;
      if(isset($_GET['brand'])){
        
    $brand_id=$_GET['brand'];
    
    
       
    
       $select_query="select * from `products` where brand_id=$brand_id";
         $result_query=mysqli_query($con,$select_query);
         $num_of_rows=mysqli_num_rows($result_query);
         if($num_of_rows==0){
          echo "<h2 class='text-center text-danger'>No Stock For This Brand</h2>";
         }
         /*$row=mysqli_fetch_assoc($result_query);
         echo $row['product_title'];*/
         while($row=mysqli_fetch_assoc($result_query)){
           $product_id=$row['product_id'];
           $product_title=$row['product_title'];
           $product_description=$row['product_description'];
           $product_keywords=$row['product_keywords'];
           $product_image1=$row['product_image1'];
           $product_price=$row['product_price'];
           $category_id=$row['category_id'];
           $brand_id=$row['brand_id'];
           
           echo "<div class='col-md-4'>
           <div class='card' style='width: 18rem;'>
       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
       <div class='card-body'>
         <h5 class='card-title'> $product_title</h5>
         <p class='card-text'> $product_description</p>
         <p class='card-text'>Price:$product_price/-</p>
         <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
         <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

       </div>
     </div>
           </div>";
           
         }
         
       }
         }
       

   





//displaying brands in sidenav

function brands(){
    global $con;
    $select_brands="select * from `brands`";
    $result=mysqli_query($con,$select_brands);
    //$row_data=mysqli_fetch_assoc($result);
    //echo $row_data['brand_title'];
    while($row_data=mysqli_fetch_assoc($result)){
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      //echo $brand_title;
      echo "<li class='nav-item '>
      <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
    </li>";

    }
}
//displaying categories in sidenav
global $con;
function categories(){
    global $con;

    $select_cats="select * from `categories`";
    $result=mysqli_query($con,$select_cats);
    //$row_data=mysqli_fetch_assoc($result);
    //echo $row_data['category_title'];
    while($row_data=mysqli_fetch_assoc($result)){
      $cat_title=$row_data['category_title'];
      $cat_id=$row_data['category_id'];
      //echo $cat_title;
      echo "<li class='nav-item '>
      <a href='index.php?cat=$cat_id' class='nav-link text-light'>$cat_title</a>
    </li>";

    }

}
//searching products function
function search_product(){

  global $con;
    //condition to check isset or not
    //if(!isset($_GET['cat'])){
     //if(!isset($_GET['brand'])){

if(isset($_GET['search_data_product'])){
  $search_data_value=$_GET['search_data'];
   $search_query="select * from `products` where product_keywords like '%$search_data_value%'";
      $result_query=mysqli_query($con,$search_query);
      /*$row=mysqli_fetch_assoc($result_query);
      echo $row['product_title'];*/
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
         $product_image3=$row['product_image3'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        
        echo "<div class='col-md-4'>
        <div class='card' style='width: 18rem;'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'> $product_title</h5>
      <p class='card-text'> $product_description</p>
      <p class='card-text'>Price:$product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

    </div>
  </div>
        </div>";
        
      }
      
    }
  }
    //  }
    //}

//view details functions
function view_details(){
  global $con;
    //condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['cat'])){
     if(!isset($_GET['brand'])){
      $product_id=$_GET['product_id'];



    

    $select_query="select * from `products` where product_id= $product_id";
      $result_query=mysqli_query($con,$select_query);
      /*$row=mysqli_fetch_assoc($result_query);
      echo $row['product_title'];*/
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        
        echo "<div class='col-md-4'>
        <div class='card' style='width: 18rem;'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'> $product_title</h5>
      <p class='card-text'> $product_description</p>
      <p class='card-text'>Price:$product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
  </div>
        </div>
        <div class='col-md-8'>

  
    <div class='row'>
        <div class='col-md-12'>
            <h4 class='text-center text-info mb-5'>Related Products</h4>
    </div>
    <div class='col-md-6'>
    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
        
    </div>
    <div class='col-md-6'>
    <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
        
    </div>
    </div>
    </div>";
        
      }
      
    }
      }
    }


}
//getting ip address
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{ 
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 
//adding cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress(); 
    $get_product_id=$_GET['add_to_cart'];
    $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip' AND product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
     if($num_of_rows>0){
      echo "<script>alert('this item is already present inside cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";}
      else{

        $insert_query="INSERT INTO `cart_details`(product_id,ip_address,quantity)VALUES($get_product_id,'$ip',0)";
        $result_query=mysqli_query($con,$insert_query);
        /*if($result){
          echo "query successull";
        }
        else{
          echo "query unsuccessfull";
        }*/
        
        echo "<script>alert('item is added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }



  }

}
 
//function to get cart items
function cart_items(){

  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress(); 
    
    $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
     }
      else{

        global $con;
    $ip = getIPAddress(); 
    
    $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
      }

echo $count_cart_items;
    
  }
  //total price function
  function total_cart_price(){
    global $con;
    $get_ip_add=getIPAddress();
    $total_price=0;
    $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_products="SELECT* FROM  `products` WHERE product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
      }
    }
    echo "$total_price";
  }
  //get user order details
  function get_user_order_details(){
    
    global $con;
    $username=$_SESSION['username'];
    $get_details="SELECT * FROM `user_table` WHERE user_name='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array( $result_query)){
      $user_id=$row_query['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
          if(!isset($_GET['delete_account'])){
            $get_orders="SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='pending'";
            
            $result_orders_query=mysqli_query($con,$get_orders);
            
            
          
           $row_count=mysqli_num_rows($result_orders_query);
            echo $row_count;
            if($row_count>0){
              echo "<h3 class='text-center'>You have<span class='text-danger'>$row_count</span>
              Pending orders</h3>
             <p class='text-center'><a href='profile.php?my_orders'>Orders Details</a></p>";
            }
            else{
              echo "<h3 class='text-center'>You have Zero orders</h3>
             <p class='text-center'><a href='../index.php'>Explore Products</a></p>";
            }
          

        }}
      }

    }
  }

?>