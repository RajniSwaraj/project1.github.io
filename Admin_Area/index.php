<!--- connect file---->
<?php 
include ('../includes/connect.php');
include ('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!----------------CSS FILE---------->
    <link rel="stylesheet" href="../src/style.css">
    <style>
    .adminImage{
        width: 100%;
        object-fit: contain;
    }
    .footer{
        position: absolute;
        bottom: 0;
    }
    </style>    
    <!-------------BOOTSTRAP CSS LINK---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-------------FONT AWASOME LINK---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body style="overflow-x:hidden";>
  <div class="container-fluid p-0">

<!--admin 1st child---------->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
     <div class="container-fluid">
        <img src="../image/logo.png"  alt="logo" class="logo">
        <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
            <li class="nav-item">
          <a class="nav-link " href="#">Welcome Guest</a>
        </li>
            </ul>
        </nav>
     </div>
    </nav>

    <!----admin 2nd child---------->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <!----admin 3nd child---------->
    <div  class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-item-center">
           <div class="p-3">
            <a href="#"><img src="../image/person.jpeg"alt=".." class="adminImage"></a>
            <p class="text-light text-center">Admin Login</p>
           </div>

           <div class="button text-center">
           <button class="my-3"><a href="insertProduct.php" class="nav-link text-lght bg-info m-1">Insert product</a></button>
           <button><a href="index.php?viewproduct" class="nav-link text-lght bg-info m-1">View Product</a></button>
           <button><a href="index.php?insertCategory" class="nav-link text-lght bg-info m-1">Insert category</a></button>
           <button><a href="index.php?viewCategory" class="nav-link text-lght bg-info m-1">View category</a></button>
           <button><a href="index.php?insertBrand" class="nav-link text-lght bg-info m-1">Insert brand</a></button>
           <button><a href="index.php?viewbrand" class="nav-link text-lght bg-info m-1">View brand</a></button>
           <button><a href="index.php?allorder" class="nav-link text-lght bg-info m-1">All order</a></button>
           <button><a href="index.php?allpayment" class="nav-link text-lght bg-info m-1">All payment</a></button>
           <button><a href="index.php?listuser" class="nav-link text-lght bg-info m-1"> list user</a></button>
           <button><a href="" class="nav-link text-lght bg-info m-1">Logout</a></button>
           </div>
        </div>
    </div>


    <!-------------4th child-------------->
    <div class="container my-3">
        <?php
        if(isset($_GET['insertCategory'])){
            include('insertCategory.php');
        }
        
        if(isset($_GET['insertBrand'])){
            include('insertBrand.php');
        }

        if(isset($_GET['viewproduct'])){
            include('view_product.php');
        }
        ?>
    </div>

<!-------------last child--------------
<div class="bg-info p-3 text-center footer">
  <p>All Right Reserved @ -desined by Rajni-2023</p>
</div>
    -->


</div>
 <!-------------BOOTSTRAP JS LINK---->  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 

</body>
</html>