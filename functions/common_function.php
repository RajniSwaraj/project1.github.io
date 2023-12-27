<?php
  
 // require ('./includes/connect.php');
    //getting products
    function getproducts(){
        global $con;

        //condition to chech isset or not means agr index page me category or brand select nhi ho then all product list show hona chahiye
       if(!isset($_GET['category'])){
          if(!isset($_GET['brand'])){
            $select_query="Select * from `products` order by rand() LIMIT 0, 9 ";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_discription=$row['product_discription'];
              $product_category=$row['category_id'];
              $product_brand=$row['brand_id'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              echo "<div class='col-md-4 mb-2'>
                      <div class='card'>
                            <img src='./Admin_Area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                               <h5 class='card-title'>$product_title</h5>
                               <p class='card-text'>$product_discription</p>
                               <p class='card-text'>price : $product_price /-</p>
                               <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                               <a href='see_more.php?product_id=$product_id' class='btn btn-secondary'>See more</a>
                            </div>
                       </div>
                    </div> ";
           }
           }
        }
    }


    //getting unique category//
    function get_unique_category(){
      global $con;
      if(isset($_GET["category"])){
        $category_id=$_GET['category'];
        
            $select_query="Select * from `products` where category_id =$category_id";
            $result_query=mysqli_query($con,$select_query);
            //calcute the total row of category_id =$category_id and if the row==0 then dispaly out of stock otherwise show the product of that categegory product

            $num_of_row=mysqli_num_rows($result_query);
            if($num_of_row==0){
              echo "<h2 class='text-center text-danger'>OUT OF STOCK CATEGORY</h2>";
            }

            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_discription=$row['product_discription'];
              $product_category=$row['category_id'];
              $product_brand=$row['brand_id'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              echo "<div class='col-md-4 mb-2'>
                      <div class='card'>
                            <img src='./Admin_Area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                               <h5 class='card-title'>$product_title</h5>
                               <p class='card-text'>$product_discription</p>
                               <p class='card-text'> price : $product_price /-</p>
                               <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                               <a href='see_more.php?product_id=$product_id' class='btn btn-secondary'>See more</a>
                            </div>
                       </div>
                    </div> ";
          
            }
            }
        }

        //getting unique category//
    function get_unique_brand(){
      global $con;
      if(isset($_GET["brand"])){        //use url varaible
        $brand_id=$_GET['brand'];        //use url varaible
        
            $select_query="Select * from `products` where brand_id =$brand_id";
            $result_query=mysqli_query($con,$select_query);
 //calcute the total row of brand_id =$brand_id and if the row==0 then dispaly out of stock otherwise show the product of that brand product
            $num_of_row=mysqli_num_rows($result_query);
            if($num_of_row==0){
              echo "<h2 class='text-center text-danger'>OUT OF STOCK BRAND</h2>";
            }
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_discription=$row['product_discription'];
              $product_category=$row['category_id'];
              $product_brand=$row['brand_id'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              echo "<div class='col-md-4 mb-2'>
                      <div class='card'>
                            <img src='./Admin_Area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                               <h5 class='card-title'>$product_title</h5>
                               <p class='card-text'>$product_discription</p>
                               <p class='card-text'>price : $product_price /-</p>
                               <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                               <a href='see_more.php?product_id=$product_id' class='btn btn-secondary'>See more</a>
                            </div>
                       </div>
                    </div> ";
          
            }
          
          
              }
        }


       

    function displaybrand(){
        global $con;
        $select_brands="Select * from `brands`";
$result_brands=mysqli_query($con,$select_brands); 
while($row_data=mysqli_fetch_assoc($result_brands)){
  $brand_title=$row_data['brand_title'];
$brand_id=$row_data['brand_id'];
echo "<li class='nav-item'>
<a class='nav-link text-light' href='index.php?brand=$brand_id'>$brand_title</a>
</li>";
}       //to fatch the data from db by using query  

    }


    function displaycategory(){
        global $con;
         $select_category="Select * from `categories`";
$result_category=mysqli_query($con,$select_category); 
while($row_data=mysqli_fetch_assoc($result_category)){              //to fatch the data from db by using query   
  $category_title=$row_data['categories_title'];
$category_id=$row_data['categories_id'];
echo "<li class='nav-item'>
<a class='nav-link text-light' href='index.php?category=$category_id'>$category_title</a>    
</li>";
}  
    }


//getting searched product function//
function get_searched_product(){
  global $con;
            if(isset($_GET["search_data_product"])){
            $Search_data_value=$_GET['search_data'];
            $search_query="Select * from `products` where product_keyword like '%$Search_data_value%' ";
            $result_query=mysqli_query($con,$search_query);

            //calcute the total row of searched keyword and if the row==0 then display no match found otherwise show the product of that brand product
            $num_of_row=mysqli_num_rows($result_query);
            if($num_of_row==0){
              echo "<h2 class='text-center text-danger'>OOPS!<br>No result match!<br> No any product available of this category.</h2>";
            }
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_discription=$row['product_discription'];
              $product_category=$row['category_id'];
              $product_brand=$row['brand_id'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              echo "<div class='col-md-4 mb-2'>
                      <div class='card'>
                            <img src='./Admin_Area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                               <h5 class='card-title'>$product_title</h5>
                               <p class='card-text'>$product_discription</p>
                               <p class='card-text'>price : $product_price /-</p>
                               <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                               <a href='see_more.php?product_id=$product_id' class='btn btn-secondary'>See more</a>
                            </div>
                       </div>
                    </div> ";
           }
           }
          }

          //function for see more products
          function see_more(){
              global $con;
             if(isset($_GET["product_id"])){
              if(!isset($_GET['category'])){
                if(!isset($_GET['brand'])){
                  $product_id=$_GET['product_id'];
                  $select_query="Select * from `products` where product_id=$product_id ";
                  $result_query=mysqli_query($con,$select_query);
                  while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_discription=$row['product_discription'];
                    $product_image1=$row['product_image1'];
                    $product_image2=$row['product_image2'];
                    $product_image3=$row['product_image3'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $brand_id=$row['brand_id'];
                    echo "
                   <div class='col-md-4 mb-2'>
                    <div class='card'>
                         <img src='./Admin_Area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
                         <div class='card-body'>
                           <h5 class='card-title'>$product_title</h5>
                           <p class='card-text'>$product_discription</p>
                           <p class='card-text'>price : $product_price /-</p>
                              <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                              <a href='index.php' class='btn btn-secondary'>Go Home</a>
                          </div>
                      </div>
                      </div>
              
                      <div class='col-md-8'>
  
                           <div class='row'>
                             <div class='col-md-12'>
                             <h3 class='text-center text-info mb-5'>Related product</h3>
                             </div>
                             <div class='col-md-6'>
                             <img src='./Admin_Area/product_image/$product_image2' class='card-img-top' alt='$product_title'>
                             </div>
                             <div class='col-md-6'>
                             <img src='./Admin_Area/product_image/$product_image3' class='card-img-top' alt='$product_title'>
                            </div>
                        </div>
                  </div>
                    ";
                 }
                 }
              }
          }
        }

        //get ip addreess function  
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



//function for cart
function cart(){
  global $con;
if(isset($_GET['add_to_cart'])){
  $ip = getIPAddress();
  $get_product_id=$_GET['add_to_cart'];
  $select_query="Select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
  $result_query=mysqli_query($con,$select_query);
  $num_of_row=mysqli_num_rows($result_query);
            if($num_of_row>0){
              echo "<script>
              alert('this item is already present inside the cart')
              </script>";
              echo "<script>window.open('index.php','_self')
              </script>";
            }
  else{
   $insert_query="insert into `cart_details` (product_id , ip_address, quantity) values ($get_product_id,'$ip' , 0)";
   $result_query=mysqli_query($con,$insert_query);
   echo "<script>
              alert('item is added inside the cart')
          </script>";
   echo "<script>window.open('index.php','_self')
              </script>";
}

}
}
//function for count the no of item in the cart
function cart_item(){
  global $con;
  if(isset($_GET['add_to_cart'])){
    $ip = getIPAddress();
    $select_query="Select * from `cart_details` where ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $cart_item=mysqli_num_rows($result_query);
  }
              
    else{
      global $con;
      $ip = getIPAddress();
      $select_query="Select * from `cart_details` where ip_address='$ip'";
      $result_query=mysqli_query($con,$select_query);
      $cart_item=mysqli_num_rows($result_query);
  }
  echo $cart_item;
  }



//total price function
  function cart_price(){
    global $con;
      $total_price=0;
      $ip = getIPAddress();
      $select_query="Select * from `cart_details` where ip_address='$ip'";
      $result_query=mysqli_query($con,$select_query);
      while($row=mysqli_fetch_array($result_query)){
      $product_id=$row['product_id'];
      $select_product="Select * from `products` where product_id='$product_id'";
      $result_product=mysqli_query($con,$select_product);
      while($row_product_price=mysqli_fetch_array($result_product)){
       $product_price=array($row_product_price['product_price']);
       $product_value=array_sum($product_price);
       $total_price+=$product_value;
     }
  }
  echo $total_price;
}






//get user order details in uder profile page
function get_user_order_details(){
   global $con;                     //make connection as a global
   $username=$_SESSION['user_name'];    //use the session which we are created the for the username that are logged in
   $get_details="Select * from `user_table` where user_name='$username'";       //access the id of the user
   $result=mysqli_query($con,$get_details);     //execute the above query
   while($row_query=mysqli_fetch_array($result)){
    $user_id=$row_query['user_id'];                        //store the user id 
    if(!isset($_GET['edit_account'])){                       //all the there adit and delete account and my order is no set only the display pending orders
       if(!isset($_GET['my_order'])){
          if(!isset($_GET['delete_account'])){
           $get_order="Select * from `user_orders` where user_id=$user_id and order_status='pending'";    //select the order that are pending and match the user id         
           $result_query=mysqli_query($con,$get_order);
           $row_count=mysqli_num_rows($result_query);          //count the total row of user pending order
           if($row_count> 0){
            echo " <h2 class='text-center text-success'> You have <span class='text-danger'>$row_count</span> pending Orders.</h2>
            <p class='text-center'><a href='profile.php?my_order'>Order details<a/></p>";
          } else {
            echo " <h2 class='text-center text-success'> You have not any pending Orders.</h2>
            <p class='text-center'><a href='../index.php'>Explore our products<a/></p>";
          }
        }
        } 
   }
  }
}
?>  