   <!--- connect file---->
<?php 
include ('../includes/connect.php');
include ('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <style>

    </style>
    <!----------------CSS FILE---------->
    <link rel="stylesheet" href="../src/style.css">

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
    <img src="../image/logo.png"  alt="logo" class="logo me-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Product</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php cart_price() ?>  </a>
        </li>
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" name="Search_data" aria-label="Search">
        <input class="btn btn-outline-light" type="submit" name="Search_data_product" value="Search">
        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
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
  <a class='nav-link' href='user_login.php'>Login</a>
</li>
  ";
 } else {
    echo "
    <li class='nav-item'>
    <a class='nav-link' href='logout.php'>Logout</a>
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
<div class="bg-light section-headline text-center underline">
  <h3 class="text-center">Product</h3>
   <p class="text-center">Shop now</p>
</div>

    <!---- start side nav----->


 <div class="row">
 <div class="col-md-2 bg-secondary p-0">
  <!---for brand--------->
 <ul class="navbar-nav me-auto  text-center">
<li class="nav-item bg-info ">
  <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
</li>

<?php
$username=$_SESSION['user_name'];    //use the session which we are created the session before 
$user_image="Select * from `user_table` where user_name='$username'";
$user_image=mysqli_query($con,$user_image);
$row_image=mysqli_fetch_array($user_image);
$user_image=$row_image['user_image'];
echo "
<li class='nav-item'>
  <img class=' border border-outline border-info my-4' src='./user_image/$user_image'>
</li>";
?>

<li class="nav-item">
  <a class="nav-link text-light" href="profile.php">Pending Order</a>
</li>
<li class="nav-item ">
  <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
</li>
<li class="nav-item ">
  <a class="nav-link text-light" href="profile.php?my_order">My order</a>
</li>
<li class="nav-item ">
  <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
</li>
<li class="nav-item ">
  <a class="nav-link text-light" href="logout.php">Logout</a>
</li>
</ul>

  
  <!----side nav--->
</div>
 
<div class="col md-10 text-center">
   <?php  get_user_order_details(); 

   if(isset($_GET['edit_account'])){
    include ('edit_account.php');
   }

   if(isset($_GET['my_order'])){
    include ('my_order.php');
   }
   if(isset($_GET['delete_account'])){
    include ('delete_account.php');
   }
   ?>
</div>
 </div>


</div>



</div>
    

    
 <!-------------BOOTSTRAP JS LINK---->  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>