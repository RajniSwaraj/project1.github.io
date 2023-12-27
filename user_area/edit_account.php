<?php

//when the edit account is set then fetch the all details of user and show it to the editaccount form.....
//by putting variable details of user in the value attribute of html form

if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['user_name'];     //by using the session variable we get the data of that username
    $select_query="Select * from `user_table` where user_name='$user_session_name'";
    $result=mysqli_query($con,$select_query);
    //fetch all the details of user
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    $user_name=$row_fetch['user_name'];
    $user_email=$row_fetch['user_email'];
    $user_phone=$row_fetch['user_mobile'];
    $user_address=$row_fetch['user_address'];
}

    //here after fetching the data we update the editted data of user
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $user_name=$_POST['user_name'];
        $user_email=$_POST['user_email'];
        $user_phone=$_POST['user_mobile'];
        $user_address=$_POST['user_address'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_temp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_temp,"./user_image/$user_image");


    //update the query
     $update_query="update `user_table` set user_name='$user_name' ,user_email='$user_email' , user_image='$user_image', user_address='$user_address',user_mobile='$user_phone'  where user_id=$update_id  ";
     $result_query=mysqli_query($con,$update_query);
     if($result_query){
        echo "<script>alert('Data Updated Successfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";

     }
        

        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .edit_image{
            width: 100px;
            object-fit: contain;
        }

    </style>
</head>
<body>
   <div class="section-headline">
   <h3 class="text-success mb-4 mt-5">Edit Account</h3>
   </div>
   <form action="" method="post" enctype="multipart/form-data">
     <div class="form-outline mb-4">
          <input type="text" class="form-control w-50 m-auto" name="user_name" value="<?php echo $user_name ?>">
     </div>
     <div class="form-outline mb-4">
          <input type="email" class="form-control w-50 m-auto " name="user_email" value="<?php echo $user_email ?>">
     </div>
     <div class="form-outline mb-4 d-flex w-50 m-auto">
          <input type="file" class="form-control" name="user_image">
          <image src="./user_image/<?php echo $user_image ?>" alt="userimage" class="edit_image">
     </div>
     <div class="form-outline mb-4">
          <input type="text" class="form-control w-50 m-auto " name="user_address"value="<?php echo $user_address ?>">
     </div>
     <div class="form-outline mb-4">
          <input type="text" class="form-control w-50 m-auto " name="user_mobile" value="<?php echo $user_phone ?>">
     </div>
     <div class="form-outline mb-4">
          <input type="submit" class=" bg-info py-2 px-3 border-0 " name="user_update" value="Update Account">
     </div>
   </form>

</body>
</html>