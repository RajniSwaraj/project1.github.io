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
    <title>user registration</title>
    <!----------------CSS FILE---------->
    <link rel="stylesheet" href="src/style.css">

    <!-------------BOOTSTRAP CSS LINK---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-------------FONT AWASOME LINK---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body  class="bg-light">
    <div class="container my-3">
        <h2 class="text-center">New user registration</h2>
        <div class="row ">
            <div class="col-lg-12">
            <form class="mt-4" action=""  method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 mb-2 m-auto">
          <label for="user_name" class="form-label">User Name</label>
          <input type="text" class="form-control" id="user_name" name="user_name" autocomplete="off" required="required" placeholder="Enter your Name">
        </div>
        <div class="form-outline w-50 mb-2 m-auto">
          <label for="user_email" class="form-label">User Email</label>
          <input type="text" class="form-control" id="user_email" name="user_email" autocomplete="off" required="required" placeholder="Enter Email">
        </div>
        <div class=" outline mb-3 w-50 m-auto">
             <label for="user_image" class="form-label">User Image</label>
             <input class="form-control" type="file" required="required" name="user_image" id="user_image">
        </div>
        <div class="form-outline w-50 mb-2 m-auto">
          <label for="user_Password" class="form-label">Password</label>
          <input type="password" class="form-control" id="user_Password" name="user_Password" autocomplete="off" required="required" placeholder="Enter your Password">
        </div>
        <div class="form-outline w-50 mb-2 m-auto">
          <label for="confirm_Password" class="form-label">confirm Password</label>
          <input type="password" class="form-control" id="confirm_Password" name="confirm_Password" autocomplete="off" required="required" placeholder="confirm Password">
        </div>
        <div class="form-outline w-50 mb-2 m-auto">
          <label for="Address" class="form-label">Address</label>
          <input type="text" class="form-control" id="Address" name="Address" autocomplete="off" required="required" placeholder="Enter your Address">
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
          <label for="contact" class="form-label">Contact</label>
          <input type="text" class="form-control" id="contact" name="contact" autocomplete="off" required="required" placeholder="Enter your Address">
        </div>
        <div class="form-outline w-50 mb-5 m-auto">
        <input type="submit" class="bg-info px-3 py-2 border-0" name="register" value="Register" id="register" autocomplete="off" required="required" class="btn btn-info">
         <p class="small fw-bold m-2">Already have an account? <a href="user_login.php">Login</a></p>
        </div>


        </form>
            </div>
        </div>
        


    </div>
    <!-------------BOOTSTRAP JS LINK---->  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>

<?php

//if the register button is clicked then perform the below action

if(isset($_POST['register'])){
    
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_Password'];
    $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
    $cnf_password=$_POST['confirm_Password'];
    $user_address=$_POST['Address'];
    $user_contact=$_POST['contact'];
    $user_ip=getIPAddress();
    //accessing image  ..so we cant use post we use files
    $user_image=$_FILES['user_image']['name'];

    //accessing image temporary name
    $temp_image=$_FILES['user_image']['tmp_name'];
  
      //select query
      $select_query="Select * from `user_table` where user_name='$user_name' or user_email='$user_email' ";
      $result=mysqli_query($con,$select_query);
      $rows=mysqli_num_rows($result);
      if($rows> 0){
        echo "<script>alert('This Username and email is already registered....plz Login.. ')</script>";
      }else if($user_password!=$cnf_password){
        echo "<script>alert('password do not match ')</script>";
      }else{

      // query for move uploaded image into the product_image folder ,it take two param 
      move_uploaded_file($temp_image,"./user_image/$user_image");
      //insert query for userdetails intodatabase
      $insert_query="insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
      values ('$user_name', '$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact') ";
      //excute the query
      $sql_excute=mysqli_query($con,$insert_query);
       if($sql_excute){
        echo "<script>alert('Registration successfully ')</script>";
      //  }else{
      //   die(mysqli_error($con));
        }
      }


      //selecting cart-items
      $select_cart_item="Select * from `cart_details` where ip_address='$user_ip'";
      $result_cart=mysqli_query($con,$select_cart_item);
      $rows_cart=mysqli_num_rows($result_cart);
      if($rows_cart>0){
        $_SESSION['user_name']=$user_name;
        echo "<script>alert(' you have item in your cart')</script>";
        echo "<script>window.open('checkout.php', _self)</script>";
      }else {
        echo "<script>window.open('../index.php', _self)</script>";
      }


    }
?>