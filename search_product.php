<!--- connect file---->
<?php 
require ('./includes/connect.php');
include ('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <!----------------CSS FILE---------->
    <link rel="stylesheet" href="src/style.css">

    <!-------------BOOTSTRAP CSS LINK---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-------------FONT AWASOME LINK---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<!----------NAVBAR------------------------>
<div class="container-fluid p-0">
  <!--first child----->
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="image/logo.png"  alt="logo" class="logo me-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_area/user-registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:<?php cart_price()?></a>
        </li>
        
      </ul>
      <form class="d-flex" action="" method="get">
        <input class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
        <input class="btn btn-outline-light" type="submit"name="search_data_product" value="search">
      </form>
    </div>
  </div>
</nav>


<?php 

//function for cart
cart()
?>



<!--------Second child------------->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">
<?php
if(!isset($_SESSION['user_name'])){
  echo "
  <li class='nav-item'>
  <a class='nav-link' href='#'>Welcome Guest</a>
</li>
  ";
 } else {
    echo "
    <li class='nav-item'>
  <a class='nav-link' href='#'>Welcome ".$_SESSION['user_name']."</a>
</li>
    ";
}

if(!isset($_SESSION['user_name'])){
  echo "
  <li class='nav-item'>
  <a class='nav-link' href='./user_area/user_login.php'>Login</a>
</li>
  ";
 } else {
    echo "
    <li class='nav-item'>
    <a class='nav-link' href='./user_area/logout.php'>Logout</a>
  </li>
    ";
}
?>

</ul>
<ul class="navbar-nav">
<li class="nav-item me-3 text-light">
<?php
echo " " .date("d/m/y  l");
?>
</li>
</ul>

</nav>

<!--------------3rd child-------------->
<div class="bg-light">
  <h3 class="text-center">Product</h3>
   <p class="text-center">Shop now</p>
</div>

<!----------Section part------------->
<div class="row">
 <div class="col-md-10">
  <!----Product--->
  <div class="row m-auto">
 
  <?php
  //feching product from database to show in the index page
  //condition to chech isset or not means agr index page me category or brand select nhi ho then all product list show hona chahiye
        
//   if(!isset($_GET['category'])){
//     if(!isset($_GET['brand'])){
//   $select_query="Select * from `products` order by rand() LIMIT 0, 9 ";
//   $result_query=mysqli_query($con,$select_query);
//   while($row=mysqli_fetch_assoc($result_query)){
//     $product_id=$row['product_id'];
//     $product_title=$row['product_title'];
//     $product_discription=$row['product_discription'];
//     $product_category=$row['category_id'];
//     $product_brand=$row['brand_id'];
//     $product_image1=$row['product_image1'];
//     $product_price=$row['product_price'];
//     echo "<div class='col-md-4 mb-2'>
//             <div class='card'>
//                   <img src='./Admin_Area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
//                   <div class='card-body'>
//                      <h5 class='card-title'>$product_title</h5>
//                      <p class='card-text'>$product_discription</p>
//                      <a href='#' class='btn btn-primary'>Add to cart</a>
//                      <a href='#' class='btn btn-secondary'>See more</a>
//                   </div>
//              </div>
//           </div> ";

//   }
// }
// }

//getting searched product
get_searched_product();

//getting unique category////
get_unique_category();

//getting unique brand
get_unique_brand();



  //we also use get product function in place of these php code and call the function here getproduct(); then entire work will be looks same



  ?>
    <!---- start card-----
    
    <div class="col-md-4 mb-2">
      <div class="card" style="width: 18rem;">
  <img src="image/flour.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Flour</h5>
    <p class="card-text">100% pure</p>
    <a href="#" class="btn btn-primary">Add to cart</a>
    <a href="#" class="btn btn-secondary">See more</a>
  </div>
</div>
    </div>
    <div class="col-md-4 mb-2">
    <div class="card" style="width: 18rem;">
  <img src="image/rice.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Rice</h5>
    <p class="card-text">100% pure</p>
    <a href="#" class="btn btn-primary">Add to cart</a>
    <a href="#" class="btn btn-secondary">See more</a>
  </div>
</div>
    </div>
    <div class="col-md-4 mb-2">
    <div class="card" style="width: 18rem;">
  <img src="image/pulse.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Pulses</h5>
    <p class="card-text">100% pure</p>
    <a href="#" class="btn btn-primary">Add to cart</a>
    <a href="#" class="btn btn-secondary">See more</a>
  </div>
</div>
    </div>


  <div class="col-md-4 mb-2">
      <div class="card" style="width: 18rem;">
  <img src="image/flour.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Flour</h5>
    <p class="card-text">100% pure</p>
    <a href="#" class="btn btn-primary">Add to cart</a>
    <a href="#" class="btn btn-secondary">See more</a>
  </div>
</div>
    </div>
    <div class="col-md-4 mb-2">
    <div class="card" style="width: 18rem;">
  <img src="image/rice.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Rice</h5>
    <p class="card-text">100% pure</p>
    <a href="#" class="btn btn-primary">Add to cart</a>
    <a href="#" class="btn btn-secondary">See more</a>
  </div>
</div>
    </div>
    <div class="col-md-4 mb-2">
    <div class="card" style="width: 18rem;">
  <img src="image/dryfruits.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">dryfruits</h5>
    <p class="card-text">100% pure</p>
    <a href="#" class="btn btn-primary">Add to cart</a>
    <a href="#" class="btn btn-secondary">See more</a>
  </div>
</div>
    </div>
     

    <div class="col-md-4 mb-2">
      <div class="card" style="width: 18rem;">
  <img src="image/milk.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Milk</h5>
    <p class="card-text">100% pure</p>
    <a href="#" class="btn btn-primary">Add to cart</a>
    <a href="#" class="btn btn-secondary">See more</a>
  </div>
</div>
    </div>
    <div class="col-md-4 mb-2">
    <div class="card" style="width: 18rem;">
  <img src="image/oil.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Mustard Oil</h5>
    <p class="card-text">100% pure</p>
    <a href="#" class="btn btn-primary">Add to cart</a>
    <a href="#" class="btn btn-secondary">See more</a>
  </div>
</div>
    </div>
    <div class="col-md-4 mb-2">
    <div class="card" style="width: 18rem;">
  <img src="image/spices.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Spices</h5>
    <p class="card-text">100% pure</p>
    <a href="#" class="btn btn-primary">Add to cart</a>
    <a href="#" class="btn btn-secondary">See more</a>
  </div>
</div>
    </div>  
-->
  
  </div>
  <!--col end-->
 </div>

    <!---- end card----->

    <!---- start side nav----->


 <div class="col-md-2 bg-secondary p-0">
  <!---for brand--------->
 <ul class="navbar-nav me-auto  text-center">
<li class="nav-item bg-info ">
  <a class="nav-link text-light" href="#"><h4>Brand List</h4></a>
</li>



<?php
//jo v brand data base me rhega wo brandlist me add ho jaye
$select_brands="Select * from `brands`";
$result_brands=mysqli_query($con,$select_brands); 
while($row_data=mysqli_fetch_assoc($result_brands)){
  $brand_title=$row_data['brand_title'];
$brand_id=$row_data['brand_id'];
echo "<li class='nav-item'>
<a class='nav-link text-light' href='index.php?brand=$brand_id'>$brand_title</a>
</li>";
}       //to fatch the data from db by using query  

//we also use the display brand function in the place of above code and call displaybrand() func here
?>


<!--
<li class="nav-item">
  <a class="nav-link text-light" href="#">List 1</a>
</li>
<li class="nav-item">
  <a class="nav-link text-light" href="#">List 2</a>
</li>
<li class="nav-item ">
  <a class="nav-link text-light" href="#">List 3</a>
</li>
<li class="nav-item ">
  <a class="nav-link text-light" href="#">List 4</a>
</li>
-->
</ul>

<!---for category--------->
<ul class="navbar-nav me-auto  text-center">
<li class="nav-item bg-info ">
  <a class="nav-link text-light" href="#"><h4>Cateory</h4></a>
</li>

<!---- index file me category list me list item add krne ke liyr jo v data base me present ho------>
<?php
//jo v category data base me rhega wo brandlist me add ho jaye
$select_category="Select * from `categories`";
$result_category=mysqli_query($con,$select_category); 
while($row_data=mysqli_fetch_assoc($result_category)){              //to fatch the data from db by using query   
  $category_title=$row_data['categories_title'];
$category_id=$row_data['categories_id'];
echo "<li class='nav-item'>
<a class='nav-link text-light' href='index.php?category=$category_id'>$category_title</a>    
</li>";
}                         
?>
<!--
<li class="nav-item">
  <a class="nav-link text-light" href="#">List 1</a>
</li>
<li class="nav-item">
  <a class="nav-link text-light" href="#">List 2</a>
</li>
<li class="nav-item ">
  <a class="nav-link text-light" href="#">List 3</a>
</li>
<li class="nav-item ">
  <a class="nav-link text-light" href="#">List 4</a>
</li>

-->

</ul>
  
  <!----side nav--->

 </div>
</div>
<!-------------last child-------------->
<div class="bg-info p-3 text-center">
  <p>All Right Reserved @ -desined by Rajni-2023</p>
</div>



</div>
    

    
 <!-------------BOOTSTRAP JS LINK---->  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>