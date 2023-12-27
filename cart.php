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
        <?php
        if(isset($_SESSION['user_name'])){
          echo "
          <li class='nav-item'>
          <a class='nav-link' href='./user_area/profile.php'>My Account</a>
        </li>
          ";
         } else {
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='./user_area/logout.php'>Register</a>
          </li>
            ";
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
        </li>
        
        
      </ul>
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
<div class="bg-light section-headline text-center underline">
  <h3 class="text-center">Cart Details</h3>
   <p class="text-center my-3">Shop now</p>
</div>


<!--------------------fourth child---------------->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            
                <!---------php code to display dynamic data of cart item--->
                <?php 
                 
                 $ip = getIPAddress();
                 $total_price=0;
                 $select_query="Select * from `cart_details` where ip_address='$ip'";
                 $result_query=mysqli_query($con,$select_query);
                 //chech the no of rows of result varaible and stored in a varaible
                 $result_count=mysqli_num_rows($result_query);
                 if($result_count> 0){
                  echo "<thead>
                  <tr>
                      <th>Product Title</th>
                      <th>Product Image</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Remove</th>
                      <th colspan='2'>Operation</th>
                  </tr>
              </thead>
               <tbody>";

                 while($row=mysqli_fetch_array($result_query)){
                 $product_id=$row['product_id'];
                 $select_product="Select * from `products` where product_id='$product_id'";
                 $result_product=mysqli_query($con,$select_product);
                 while($row_product_price=mysqli_fetch_array($result_product)){
                  $product_price=array($row_product_price['product_price']);
                  $product_price_table=$row_product_price['product_price'];
                  $product_title=$row_product_price['product_title'];
                  $product_image1=$row_product_price['product_image1'];
                  $product_value=array_sum($product_price);
                  $total_price+=$product_value;

                ?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./image/<?php echo $product_image1?>" height="50px;" width="50px;"alt=""></td>
                    <td><input type="text" class="w-50" name="qty" id=""></td>

                    <?php
                    $ip = getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantity=$_POST['qty'];
                        $update_cart="update `cart_details`  set quantity=$quantity where ip_address='$ip'";
                        $result_products=mysqli_query($con,$update_cart);
                        $total_price=$total_price*$quantity;
                    }

                    ?>
                    <td><?php echo $product_price_table?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id  ?>"></td>
                    <td>
                       <input class="bg-info p-2 border-0 mx-3" type="submit" name="update_cart" value="Update cart">

                       <input class="bg-secondary p-2 border-0 mx-3" type="submit" name="remove_cart" value="Remove">
                    </td>
                </tr>
                 <?php
                 }
                }}
                else{
                  echo"<h2 class='text-center text-danger'>Cart is Empty<?h2>";
                }
                ?>
             </tbody>
        </table>
        <!--------subtotal=-------------->
        <div class="d-flex mb-5">
          <?php 
           global $con;
           $ip = getIPAddress();
           $select_query="Select * from `cart_details` where ip_address='$ip'";
           $result_query=mysqli_query($con,$select_query);
           $result_count=mysqli_num_rows($result_query);
           if($result_count> 0){
            echo"
            <h4 class='px-3'>Subtotal:<strong class='text-info'>Rs. $total_price /-</strong></h4>
            <input class='bg-info px-2 py-2 border-0 mx-2' type='submit' name='Continue_shopping' value='Continue shopping'>
            <button class='bg-secondary p-2 border-0'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
           }else{
            echo"
            <input class='bg-info py-2 px-2 border-0 mx-2' type='submit' name='Continue_shopping' value='Continue shopping'>";
           }
           if(isset($_POST['Continue_shopping'])){
            echo" <script> window.open('index.php','_self')</script>";
           }
          
          ?>
    
        </div>
        <!--------subtotal=-------------->


        </div>
</div>
</form>

<!-----------function to remove------>
<?php
function removeitem(){
  global $con;
  if(isset($_POST["remove_cart"])){
    foreach ($_POST['removeitem'] as $remove_id) {
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php', '_self')</script>";
      }
    }
  }
}
      echo $remove_cart= removeitem();                                                                                                                                                                                                                                                                                                                                                                                                                             ;
?>



<!--------------------fourth child---------------->

<!-------------last child-------------->
<div class="bg-info p-3 text-center ">
  <p>All Right Reserved @ -desined by Rajni-2023</p>
</div>



</div>
    

    
 <!-------------BOOTSTRAP JS LINK---->  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>