<!--- connect file---->
<?php 
require ('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
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
          <a class="nav-link" href="user-registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
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
<div class="bg-light section-headline underline">
  <h3 class="text-center">Product</h3>
   <p class="text-center">Shop now</p>
</div>

<!----------Section part------------->
<div class="row bg-light">
 <div class="col-md-12">
  <!----Product--->
  <div class="row">
    <?php
if(!isset($_SESSION['user_name'])){
    include('user_login.php');
}else{
    include('payment.php');
}

?>
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