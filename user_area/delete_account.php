<?php
// if(isset($_GET['delete_account'])){
//     $user_session_name=$_SESSION['user_name'];     //by using the session variable we get the data of that username
//     $select_query="Select * from `user_table` where user_name='$user_session_name'";
//     $result=mysqli_query($con,$select_query);
//     //fetch all the details of user
//     $row_fetch=mysqli_fetch_assoc($result);
//     $user_id=$row_fetch['user_id'];
//     $user_name=$row_fetch['user_name'];
//     $user_email=$row_fetch['user_email'];
//     $user_phone=$row_fetch['user_mobile'];
//     $user_address=$row_fetch['user_address'];
// }

//     //here after fetching the data we update the editted data of user
//     if(isset($_POST['delete_account'])){
//      //delete the query
//      $delete_query="delete from `user_table` where user_id=$user_id  ";
//      $result_query=mysqli_query($con,$delete_query);
//      if($result_query){
//         echo "<script>alert('Your account deleted Successfully....plz register ')</script>";
//         echo "<script>window.open('../index.php','_self')</script>";

//      }
        

        
//     }



    if(isset($_POST['dont_delete_account'])){

        echo "<script>window.open('profile.php','_self')</script>";

    }
?>

<?php
//same code as above foe delete the account
if(isset($_POST['delete'])){
    $user_session_name=$_SESSION['user_name'];     //by using the session variable we get the data of that username
    $delete_query="delete from `user_table` where user_name='$user_session_name'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Your account deleted Successfully....plz register ')</script>";
        echo "<script>window.open('../index.php','_self')</script>";

     }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete Account</title>
</head>
<body>
   <div class="section-headline underline">
   <h3 class="text-success mb-4 mb-5 mt-5">Delete Account</h3>
   </div>
   <form action="" method="post" enctype="multipart/form-data">
     <div class="form-outline mb-4 ">
          <input type="submit" class="form-control  w-50 m-auto py-2 px-3 border-2 " name="delete" value="Delete  Account">
     </div>
     <div class="form-outline mb-4">
          <input type="submit" class="form-control w-50 m-auto py-2 px-3 border-2 " name="dont_delete_account" value="Don't delete Account">
     </div>
   </form>

</body>
</html>