<?php 
include ('../includes/connect.php');
include ('../functions/common_function.php');
//if this page is active only then  start the session
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_l0gin</title>
    <!----------------CSS FILE---------->
    <link rel="stylesheet" href="src/style.css">

    <!-------------BOOTSTRAP CSS LINK---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-------------FONT AWASOME LINK---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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
        <h2 class="text-center">User Login</h2>
        <div class="row ">
            <div class="col-lg-12">
            <form class="mt-4" action=""  method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 mb-2 m-auto">
          <label for="user_login_name" class="form-label">User Name</label>
          <input type="text" class="form-control" id="user_login_name" name="user_login_name" autocomplete="off" required="required" placeholder="Enter your Name">
        </div>
        
        <div class="form-outline w-50 mb-4 m-auto">
          <label for="login_Password" class="form-label">Password</label>
          <input type="login_password" class="form-control" id="login_Password" name="login_Password" autocomplete="off" required="required" placeholder="Enter your Password">
        </div>
        
        <div class="form-outline w-50 mb-3 m-auto">
         <p class="m-2"><a href="user_login.php">Forgot password</a></p>
        </div>
        
        <div class="form-outline w-50 mb-5 m-auto">
        <input type="submit" class="bg-info px-3 py-2 border-0" name="login" value="Login" id="login" autocomplete="off" required="required" class="btn btn-info">
         <p class="small fw-bold m-2">Don't have an account? <a href="user-registration.php">Register</a></p>
        </div>


        </form>
            </div>
        </div>
        


    </div>
    <!-------------BOOTSTRAP JS LINK---->  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>/
   <!-------------BOOTSTRAP JS LINK---->  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>

<?php
if(isset($_POST['login'])){
    $username = $_POST['user_login_name'];
    $password = $_POST['login_Password'];
    
    $select_query="Select * from `user_table` where user_name='$username' ";
      $result=mysqli_query($con,$select_query);
      $rows=mysqli_num_rows($result);
      $row_data=mysqli_fetch_assoc($result);
      $user_ip=getIPAddress();


     //cart item
     $select_query_cart="Select * from `cart_details` where ip_address='$user_ip' ";
     $result_cart=mysqli_query($con,$select_query_cart);
     $rows__cart=mysqli_num_rows($result_cart);
      
      if($rows> 0){
        $_SESSION['user_name']=$username;
         if(password_verify($password,$row_data['user_password'])){
            if($rows==1 and $rows_cart==1){
                $_SESSION['user_name']=$username;
             echo "<script>alert('Login successful')</script>";
             echo "<script>window.open('profile.php','_self')</script>";
              }else{
                $_SESSION['user_name']=$username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
              }
         }else{
            echo "<script>alert('Invalid password')</script>";
         }
      } else{
        echo"<script>alert('Invalid credentails')</script>";
      }

}
?>