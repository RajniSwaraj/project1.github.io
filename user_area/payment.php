<?php 
include ('../includes/connect.php');
include ('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <style>
        img{
            margin: auto;
            display: block;
        }
    </style>
    <!----------------CSS FILE---------->
    <link rel="stylesheet" href="src/style.css">

    <!-------------BOOTSTRAP CSS LINK---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-------------FONT AWASOME LINK---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<!---------php code to access user id--------------->
<?php
$user_ip=getIPAddress();
$get_user="Select * from `user_table` where user_ip='$user_ip'";
$result = mysqli_query($con,$get_user);
$run_query = mysqli_fetch_array($result);
$user_id=$run_query['user_id'];
?>
<body>
    <div class="container">
        <h2 class="text-center text-info mt-4">Payment Options</h2>
        <div class="row justify-content-center align-item-center mt-5">
            <div class="col-md-6">
            <a href="https://www.paypal.com"><img src="../image/upi.jpeg" alt="pay" target="_blank" height="300px;" width="500px;"></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>

    </div>
</body>
</html>